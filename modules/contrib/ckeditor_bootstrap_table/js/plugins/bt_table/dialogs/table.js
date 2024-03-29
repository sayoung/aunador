/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
// phpcs:ignoreFile -- this is a ckeditor plugin.
(function() {
  var defaultToPixel = CKEDITOR.tools.cssLength;

  var commitValue = function(data) {
    //console.lo
    var id = this.id;
    if (!data.info)
      data.info = {};
    data.info[id] = this.getValue();
  };

  function tableColumns(table) {
    var cols = 0,
      maxCols = 0;
    for (var i = 0, row, rows = table.$.rows.length; i < rows; i++) {
      row = table.$.rows[i], cols = 0;
      for (var j = 0, cell, cells = row.cells.length; j < cells; j++) {
        cell = row.cells[j];
        cols += cell.colSpan;
      }

      cols > maxCols && (maxCols = cols);
    }

    return maxCols;
  }

  // Whole-positive-integer validator.
  function validatorNum(msg) {
    return function() {
      var value = this.getValue(),
        pass = !!(CKEDITOR.dialog.validate.integer()(value) && value > 0);

      if (!pass) {
        alert(msg); // jshint ignore:line
        this.select();
      }

      return pass;
    };
  }

  function tableDialog(editor, command) {
    var makeElement = function(name) {
      return new CKEDITOR.dom.element(name, editor.document);
    };

    var editable = editor.editable();

    var dialogadvtab = editor.plugins.dialogadvtab;

    return {
      title: editor.lang.table.title,
      minWidth: 340,
      minHeight: CKEDITOR.env.ie ? 340 : 280,

      onShow: function() {
        // Detect if there's a selected table.
        var selection = editor.getSelection(),
          ranges = selection.getRanges(),
          table;

        var rowsInput = this.getContentElement('info', 'txtRows'),
          colsInput = this.getContentElement('info', 'txtCols');

        if (command == 'tableProperties') {
          var selected = selection.getSelectedElement();
          if (selected && selected.is('table'))
            table = selected;
          else if (ranges.length > 0) {
            // Webkit could report the following range on cell selection (#4948):
            // <table><tr><td>[&nbsp;</td></tr></table>]
            if (CKEDITOR.env.webkit)
              ranges[0].shrink(CKEDITOR.NODE_ELEMENT);

            table = editor.elementPath(ranges[0].getCommonAncestor(true)).contains('table', 1);
          }

          // Save a reference to the selected table, and push a new set of default values.
          this._.selectedElement = table;
        }

        // Enable or disable the row, cols, width fields.
        if (table) {
          this.setupContent(table);
          rowsInput && rowsInput.disable();
          colsInput && colsInput.disable();
        } else {
          rowsInput && rowsInput.enable();
          colsInput && colsInput.enable();
        }

        // Call the onChange method for the width field so
        // this get reflected into the Advanced tab.
        //  widthInput && widthInput.onChange();
      },
      onOk: function() {
        //  console.log('onOk: react on table insertion/change');
        var selection = editor.getSelection(),
          bms = this._.selectedElement && selection.createBookmarks();

        // If table variable doesn't exist create table with content additionally create data variable.
        var table = this._.selectedElement || makeElement('table'),
          data = {};
        // commitContent is CKeditor provided function.
        // Get all the info from dialog and assigns it to data variable.
        this.commitContent(data, table);

        if (data.info) {
          var info = data.info;

          // Generate the rows and cols.
          if (!this._.selectedElement) {
            var tbody = table.append(makeElement('tbody')),
              rows = parseInt(info.txtRows, 10) || 0,
              cols = parseInt(info.txtCols, 10) || 0;

            for (var i = 0; i < rows; i++) {
              var row = tbody.append(makeElement('tr'));
              for (var j = 0; j < cols; j++) {
                var cell = row.append(makeElement('td'));
                cell.appendBogus();
              }
            }
          }

          // Modify the table headers. Depends on having rows and cols generated
          // correctly so it can't be done in commit functions.

          // Should we make a <thead>?
          var headers = info.selHeaders;
          var theadStyle = info.theadStyle;
          if (!table.$.tHead && (headers == 'row' || headers == 'both')) {
            var thead = new CKEDITOR.dom.element(table.$.createTHead());
            tbody = table.getElementsByTag('tbody').getItem(0);
            var theRow = tbody.getElementsByTag('tr').getItem(0);

            // Change TD to TH:
            for (i = 0; i < theRow.getChildCount(); i++) {
              var th = theRow.getChild(i);
              // Skip bookmark nodes. (#6155)
              if (th.type == CKEDITOR.NODE_ELEMENT && !th.data('cke-bookmark')) {
                th.renameNode('th');
                th.setAttribute('scope', 'col');
              }
            }
            thead.append(theRow.remove());
            if (theadStyle == 'thead-dark' || theadStyle == 'thead-light') {
              thead.addClass(theadStyle);
            }
          }

          if (table.$.tHead !== null && !(headers == 'row' || headers == 'both')) {
            // Move the row out of the THead and put it in the TBody:
            thead = new CKEDITOR.dom.element(table.$.tHead);
            tbody = table.getElementsByTag('tbody').getItem(0);

            var previousFirstRow = tbody.getFirst();
            while (thead.getChildCount() > 0) {
              theRow = thead.getFirst();
              for (i = 0; i < theRow.getChildCount(); i++) {
                var newCell = theRow.getChild(i);
                if (newCell.type == CKEDITOR.NODE_ELEMENT) {
                  newCell.renameNode('td');
                  newCell.removeAttribute('scope');
                }
              }
              theRow.insertBefore(previousFirstRow);
            }
            thead.remove();
          }

          // Should we make all first cells in a row TH?
          if (!this.hasColumnHeaders && (headers == 'col' || headers == 'both')) {
            for (row = 0; row < table.$.rows.length; row++) {
              newCell = new CKEDITOR.dom.element(table.$.rows[row].cells[0]);
              newCell.renameNode('th');
              newCell.setAttribute('scope', 'row');
            }
          }

          // Should we make all first TH-cells in a row make TD? If 'yes' we do it the other way round :-)
          if ((this.hasColumnHeaders) && !(headers == 'col' || headers == 'both')) {
            for (i = 0; i < table.$.rows.length; i++) {
              row = new CKEDITOR.dom.element(table.$.rows[i]);
              if (row.getParent().getName() == 'tbody') {
                newCell = new CKEDITOR.dom.element(row.$.cells[0]);
                newCell.renameNode('td');
                newCell.removeAttribute('scope');
              }
            }
          }

        }

        // Insert the table element if we're creating one.
        if (!this._.selectedElement) {
          editor.insertElement(table);
          // Override the default cursor position after insertElement to place
          // cursor inside the first cell (#7959), IE needs a while.
          setTimeout(function() {
            var firstCell = new CKEDITOR.dom.element(table.$.rows[0].cells[0]);
            var range = editor.createRange();
            range.moveToPosition(firstCell, CKEDITOR.POSITION_AFTER_START);
            range.select();
          }, 0);
        }
        // Properly restore the selection, (#4822) but don't break
        // because of this, e.g. updated table caption.
        else {
          try {
            selection.selectBookmarks(bms);
          } catch (er) {}
        }
        // There should be table. So lets add our classes.
        table.addClass('table');
        table.addClass('cke_show_border');
        table.setStyle('width', '100%');
        if (info.tableStriped)
          table.addClass('table-striped');
        else
          table.removeClass('table-striped');

        if (info.tableHover)
          table.addClass('table-hover');
        else
          table.removeClass('table-hover');

        if (info.tableBordered)
          table.addClass('table-bordered');
        else
          table.removeClass('table-bordered');

        if (info.tableDark)
          table.addClass('table-dark');
        else
          table.removeClass('table-dark');

        if (info.tableSmall)
          table.addClass('table-sm');
        else
          table.removeClass('table-sm');

        if (!table.getParent().hasClass('table-responsive')) {
          var tablewrapper = makeElement('div');
          tablewrapper.addClass('table-responsive');
          tablewrapper.append(table);
          editor.insertElement(tablewrapper);
        }
      },
      contents: [{
        id: 'info',
        label: editor.lang.table.title,
        elements: [{
          type: 'hbox',
          widths: ['50%', '50%'],
          styles: ['vertical-align:top'],
          children: [{
            type: 'vbox',
            padding: 0,
            children: [{
              type: 'text',
              id: 'txtRows',
              'default': 3,
              label: editor.lang.table.rows,
              required: true,
              controlStyle: 'width:5em',
              validate: validatorNum(editor.lang.table.invalidRows),
              setup: function(selectedElement) {
                this.setValue(selectedElement.$.rows.length);
              },
              commit: commitValue
            }, {
              type: 'text',
              id: 'txtCols',
              'default': 2,
              label: editor.lang.table.columns,
              required: true,
              controlStyle: 'width:5em',
              validate: validatorNum(editor.lang.table.invalidCols),
              setup: function(selectedTable) {
                this.setValue(tableColumns(selectedTable));
              },
              commit: commitValue
            }, {
              type: 'html',
              html: '&nbsp;'
            }, {
              type: 'select',
              id: 'selHeaders',
              requiredContent: 'th',
              'default': '',
              label: editor.lang.table.headers,
              items: [
                [editor.lang.table.headersNone, ''],
                [editor.lang.table.headersRow, 'row'],
                [editor.lang.table.headersColumn, 'col'],
                [editor.lang.table.headersBoth, 'both']
              ],
              setup: function(selectedTable) {
                // Fill in the headers field.
                var dialog = this.getDialog();
                dialog.hasColumnHeaders = true;

                // Check if all the first cells in every row are TH
                for (var row = 0; row < selectedTable.$.rows.length; row++) {
                  // If just one cell isn't a TH then it isn't a header column
                  var headCell = selectedTable.$.rows[row].cells[0];
                  if (headCell && headCell.nodeName.toLowerCase() != 'th') {
                    dialog.hasColumnHeaders = false;
                    break;
                  }
                }

                // Check if the table contains <thead>.
                if ((selectedTable.$.tHead !== null))
                  this.setValue(dialog.hasColumnHeaders ? 'both' : 'row');
                else
                  this.setValue(dialog.hasColumnHeaders ? 'col' : '');
              },
              commit: commitValue
            }, {
              type: 'select',
              id: 'theadStyle',
              requiredContent: 'th',
              label: 'Headers style',
              items: [ ['None', '' ], ['Dark theme', 'thead-dark' ], [ 'Light theme', 'thead-light' ] ],
              'default': '',
              setup: function (selectedTable) {
                this.enable();
                var val = selectedTable.hasClass(this.getValue());
                this.setValue(val);
              },
              commit: commitValue
            },
              {
                type: 'html',
                id: 'txtBorder',
                html: '&nbsp;',
                commit: function() {
                  // We can remove it after changing the name of this plugin.
                }
              }
            ]
          }, {
            type: 'hbox',
            padding: 0,
            children: [{
              type: 'vbox',
              widths: ['12em'],
              children: [
                {
                  type: 'checkbox',
                  id: 'tableStriped',
                  labelStyle: 'display: inline',
                  label: 'Add stripes',
                  'default': '',
                  setup: function(selectedTable) {
                    var val = selectedTable.hasClass('table-striped');
                    this.setValue(val);
                  },
                  commit: commitValue
                }, {
                  type: 'checkbox',
                  id: 'tableHover',
                  labelStyle: 'display: inline',
                  label: 'Add hover effect',
                  'default': '',
                  setup: function(selectedTable) {
                    var val = selectedTable.hasClass('table-hover');
                    this.setValue(val);
                  },
                  commit: commitValue
                }, {
                  type: 'checkbox',
                  id: 'tableBordered',
                  labelStyle: 'display: inline',
                  label: 'Add borders',
                  'default': '',
                  setup: function(selectedTable) {
                    var val = selectedTable.hasClass('table-bordered');
                    this.setValue(val);
                  },

                  commit: commitValue
                }, {
                  type: 'checkbox',
                  id: 'tableDark',
                  labelStyle: 'display: inline',
                  label: 'Table dark',
                  'default': '',
                  setup: function (selectedTable) {
                    this.enable();
                    var val = selectedTable.hasClass('table-dark');
                    this.setValue(val);
                  },
                  commit: commitValue
                }, {
                  type: 'checkbox',
                  id: 'tableSmall',
                  labelStyle: 'display: inline',
                  label: 'Table small',
                  'default': '',
                  setup: function (selectedTable) {
                    this.enable();
                    var val = selectedTable.hasClass('table-small');
                    this.setValue(val);
                  },
                  commit: commitValue
                }]
            }]
          }]
        }, {
          type: 'vbox',
          padding: 0,
          children: [{
            type: 'text',
            id: 'txtCaption',
            requiredContent: 'caption',
            label: editor.lang.table.caption,
            setup: function(selectedTable) {
              this.enable();

              var nodeList = selectedTable.getElementsByTag('caption');
              if (nodeList.count() > 0) {
                var caption = nodeList.getItem(0);
                var firstElementChild = caption.getFirst(CKEDITOR.dom.walker.nodeType(CKEDITOR.NODE_ELEMENT));

                if (firstElementChild && !firstElementChild.equals(caption.getBogus())) {
                  this.disable();
                  this.setValue(caption.getText());
                  return;
                }

                caption = CKEDITOR.tools.trim(caption.getText());
                this.setValue(caption);
              }
            },
            commit: function(data, table) {
              if (!this.isEnabled())
                return;

              var caption = this.getValue(),
                captionElement = table.getElementsByTag('caption');
              if (caption) {
                if (captionElement.count() > 0) {
                  captionElement = captionElement.getItem(0);
                  captionElement.setHtml('');
                } else {
                  captionElement = new CKEDITOR.dom.element('caption', editor.document);
                  if (table.getChildCount())
                    captionElement.insertBefore(table.getFirst());
                  else
                    captionElement.appendTo(table);
                }
                captionElement.append(new CKEDITOR.dom.text(caption, editor.document));
              } else if (captionElement.count() > 0) {
                for (var i = captionElement.count() - 1; i >= 0; i--)
                  captionElement.getItem(i).remove();
              }
            }
          }]
        }]
      },
      ]
    };
  }

  CKEDITOR.dialog.add('bt_table', function(editor) {
    // Helper function call.
    return tableDialog(editor, 'table');
  });
  CKEDITOR.dialog.add('bt_tableProperties', function(editor) {
    // Helper function call.
    return tableDialog(editor, 'tableProperties');
  });
})();
