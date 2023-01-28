/**
 * @file
 * CKEditor 'ckeditor_bootstrap_include' plugin admin behavior.
 */

(function ($, Drupal, drupalSettings) {

  'use strict';

  /**
   * Provides the summary for the "ckeditor_bootstrap_include" plugin settings vertical tab.
   *
   * @type {Drupal~behavior}
   *
   * @prop {Drupal~behaviorAttach} attach
   *   Attaches summary behaviour to the "ckeditor_bootstrap_include" settings vertical tab.
   */

  Drupal.behaviors.ckeditor_bootstrap_includeSettingsSummary = {
    attach: function () {
      $('[data-ckeditor-plugin-id="jsplusInclude"]').drupalSetSummary(function (context) {
        return 'JS+ Bootstrap Include configuration';
      });
      $('head').append('<style>' +
          '.jsplus_help_link { width: 15px;height: 15px;display: inline-block;border: 1px solid #7db8ff; border-radius: 8px; color: #0074ff; font-weight:bold; margin-left: 5px;text-align: center;font-size:13px }' +
          '.jsplus_help_link:hover, .jsplus_help_link:focus { background-color: #0074ff; border-color: #0074ff; color: white; text-decoration: none; }' +
          '</style>')
      $('details[data-ckeditor-plugin-id=jsplusInclude] [data-url-help]').each(
          function() {
              var url = this.getAttribute('data-url-help');
              var param = this.getAttribute('data-param-name');
              if (url == '')
                return;

              var div = $(this);
              if (div.prop('tagName') == 'TEXTAREA')
                div = div.parent().find(':first-child');
              else if (div.prop('tagName') == 'SELECT')
                div = div.parent().find(':last-child');
              else if (div.attr('type') == 'checkbox')
                div = div.next();
              div.after('<a href="' + url + '" ' +
                            'target="_blank" ' +
                            'class="jsplus_help_link" ' +
                            (param == '' ? '' : 'title="Parameter:  ' + param + '"') +
                         '>?</a>');
          }
      );
      $('details[data-ckeditor-plugin-id=jsplusInclude] [data-param-priority]').each(
          function() {
            var priority = this.getAttribute('data-param-priority');
            if (priority.length == 0)
                return;

            var name = this.getAttribute('data-param-name');

            var minPriority = 999;
            var controls = [];
            $('[data-param-name="' + name + '"]').each(
                function() {
                    controls.push(this);
                    var currPriority = parseInt(this.getAttribute('data-param-priority'));
                    if (currPriority < minPriority)
                        minPriority = currPriority;
                }
            );
            for (var i=0; i<controls.length; i++) {
                var control = controls[i];
                if (parseInt(control.getAttribute('data-param-priority')) > minPriority) {
                    control.parentNode.parentNode.removeChild(control.parentNode);
                }
            }
          }
      );
    }
  };

})(jQuery, Drupal, drupalSettings);
