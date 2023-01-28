<?php

namespace Drupal\ckeditor_bootstrap_tools\Plugin\CKEditorPlugin;

use Drupal\ckeditor\CKEditorPluginBase;
use Drupal\ckeditor\CKEditorPluginConfigurableInterface;
use Drupal\ckeditor\CKEditorPluginContextualInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\editor\Entity\Editor;

/**
 * Defines the "CKEditor Bootstrap Tools" plugin.
 *
 * @CKEditorPlugin(
 *   id = "jsplusBootstrapTools",
 *   label = @Translation("CKEditor Bootstrap Tools"),
 *   module = "ckeditor_bootstrap_tools"
 * )
 */
class ckeditor_bootstrap_tools extends CKEditorPluginBase implements CKEditorPluginConfigurableInterface, CKEditorPluginContextualInterface {

  public $plugins = array(
          'jsplusShowBlocks' => array(
         'buttons' => array(array('label' => 'Highlight Bootstrap blocks (containers, rows, columns)')),
         'urlDoc' => 'http://js.plus/products/bootstrap-tools/configuration',
         'params' => array(
             array(
                 'name' => 'enabledByDefault',
                 'inside' => 'jsplusShowBlocks',
                 'default' => TRUE,
                 'type' => 'bool',
                 'order' => 2010,
                 'title' => 'Enable highlighting Bootstrap structure on start',
                 'hint' => '',
                 'widget' => 'checkbox'
             ),
             array(
                  'name' => 'addPaddings',
                  'inside' => 'jsplusShowBlocks',
                  'default' => TRUE,
                  'type' => 'bool',
                  'order' => 2020,
                  'title' => 'Add paddings to Bootstrap blocks',
                  'hint' => '',
                  'widget' => 'checkbox'
              )
         )
     ),

     'jsplusBootstrapToolsContainerEdit' => array(
        'buttons' => array(array('label' => 'Edit the container')),
        'urlDoc' => 'http://js.plus/products/bootstrap-tools/configuration',
     ),
     'jsplusBootstrapToolsContainerAdd' => array(
        'buttons' => array(array('label' => 'Add a container at cursor')),
        'urlDoc' => 'http://js.plus/products/bootstrap-tools/configuration',
     ),
     'jsplusBootstrapToolsContainerAddBefore' => array(
        'buttons' => array(array('label' => 'Add a container before')),
        'urlDoc' => 'http://js.plus/products/bootstrap-tools/configuration',
     ),
     'jsplusBootstrapToolsContainerAddAfter' => array(
        'buttons' => array(array('label' => 'Add a container after')),
        'urlDoc' => 'http://js.plus/products/bootstrap-tools/configuration',
     ),
     'jsplusBootstrapToolsContainerDelete' => array(
        'buttons' => array(array('label' => 'Delete the container')),
        'urlDoc' => 'http://js.plus/products/bootstrap-tools/configuration',
     ),
     'jsplusBootstrapToolsContainerMoveUp' => array(
        'buttons' => array(array('label' => 'Move the container up')),
        'urlDoc' => 'http://js.plus/products/bootstrap-tools/configuration',
     ),
     'jsplusBootstrapToolsContainerMoveDown' => array(
        'buttons' => array(array('label' => 'Move the container down')),
        'urlDoc' => 'http://js.plus/products/bootstrap-tools/configuration',
     ),

     'jsplusBootstrapToolsRowEdit' => array(
         'buttons' => array(array('label' => 'Insert Bootstrap row and columns before selected row')),
         'urlDoc' => 'http://js.plus/products/bootstrap-tools/configuration',
     ),
     'jsplusBootstrapToolsRowAddBefore' => array(
         'buttons' => array(array('label' => 'Insert Bootstrap row and columns before selected row')),
         'urlDoc' => 'http://js.plus/products/bootstrap-tools/configuration',
     ),
     'jsplusBootstrapToolsRowAdd' => array(
         'buttons' => array(array('label' => 'Insert Bootstrap row and columns at cursor')),
         'urlDoc' => 'http://js.plus/products/bootstrap-tools/configuration',
     ),
     'jsplusBootstrapToolsRowAddAfter' => array(
         'buttons' => array(array('label' => 'Insert Bootstrap row and columns after selected row')),
         'urlDoc' => 'http://js.plus/products/bootstrap-tools/configuration',
     ),
     'jsplusBootstrapToolsRowMoveUp' => array(
         'buttons' => array(array('label' => 'Move Bootstrap row up')),
         'urlDoc' => 'http://js.plus/products/bootstrap-tools/configuration'
     ),
     'jsplusBootstrapToolsRowMoveDown' => array(
         'buttons' => array(array('label' => 'Move Bootstrap row down')),
         'urlDoc' => 'http://js.plus/products/bootstrap-tools/configuration'
     ),
     'jsplusBootstrapToolsRowDelete' => array(
         'buttons' => array(array('label' => 'Delete Bootstrap row')),
         'urlDoc' => 'http://js.plus/products/bootstrap-tools/configuration'
     ),

      'jsplusBootstrapToolsColEdit' => array(
         'buttons' => array(array('label' => 'Edit the column')),
         'urlDoc' => 'http://js.plus/products/bootstrap-tools/configuration',
      ),
      'jsplusBootstrapToolsColAddBefore' => array(
         'buttons' => array(array('label' => 'Add a column before')),
         'urlDoc' => 'http://js.plus/products/bootstrap-tools/configuration',
      ),
      'jsplusBootstrapToolsColAddAfter' => array(
         'buttons' => array(array('label' => 'Add a column after')),
         'urlDoc' => 'http://js.plus/products/bootstrap-tools/configuration',
      ),
      'jsplusBootstrapToolsColAdd' => array(
         'buttons' => array(array('label' => 'Add a column at cursor')),
         'urlDoc' => 'http://js.plus/products/bootstrap-tools/configuration',
      ),
      'jsplusBootstrapToolsColMoveLeft' => array(
         'buttons' => array(array('label' => 'Move the column left')),
         'urlDoc' => 'http://js.plus/products/bootstrap-tools/configuration',
      ),
      'jsplusBootstrapToolsColMoveRight' => array(
         'buttons' => array(array('label' => 'Move the column right')),
         'urlDoc' => 'http://js.plus/products/bootstrap-tools/configuration',
      ),
      'jsplusBootstrapToolsColDelete' => array(
         'buttons' => array(array('label' => 'Delete the column')),
         'urlDoc' => 'http://js.plus/products/bootstrap-tools/configuration',
      ),
  );

    /**
     * {@inheritdoc}
     */
    public function getButtons() {
        if (!$this->isInstalled())
            return array();

        $buttons = array();
        foreach ($this->plugins as $pluginName => $pluginDef) {

            if (isset($pluginDef['buttons'])) {
                foreach($pluginDef['buttons'] as $buttonName => $buttonDef) {
                    $image = 'https://cdn.n1ed.com/cdn/buttons/' . $pluginName . '.png';
                    $button = array(
                        'label' => $buttonDef['label'],
                        'image' => $image
                    );
                    $buttons[$pluginName] = $button;
                }
            }

        }
        return $buttons;
    }

  /**
   * {@inheritdoc}
   */
  public function getFile() {
    return '/libraries/jsplusBootstrapTools/plugin.js';
  }

  /**
   * {@inheritdoc}
   */
  public function getDependencies(Editor $editor) {
    return array();
  }

  /**
   * {@inheritdoc}
   */
  public function getLibraries(Editor $editor) {
    return array();
  }

  /**
   * {@inheritdoc}
   */
  public function isInternal() {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function isEnabled(Editor $editor) {
    return TRUE;
  }

  function getConfigParam($settings, $param, $default, $type, $inside) {
    $name = $param;
    if (isset($settings[$name]) && strlen($settings[$name]) > 0)
        $value = $settings[$name];
    else
        $value = $default;
    if (isset($type) && $type == 'int') {
        $value = intval($value);
    } else if (isset($type) && $type == 'bool') {
        if ($value == '1')
            $value = true;
        else if ($value == '0')
            $value = false;
    } else if (isset($type) && $type == 'json') {
        $value = json_decode($value);
    }
    return $value;
  }

  /**
   * {@inheritdoc}
   */
  public function getConfig(Editor $editor) {
      $settings = array();
      if (isset($editor->getSettings()['plugins']['jsplusBootstrapTools']))
        $settings = $editor->getSettings()['plugins']['jsplusBootstrapTools'];
      $result = array();
      foreach ($this->plugins as $pluginName => $pluginDef) {
          if (isset($pluginDef['params'])) {
              foreach ($pluginDef['params'] as $paramDef) {
                  $value = $this->getConfigParam($settings, $paramDef['name'], $paramDef['default'], $paramDef['type'], isset($paramDef['inside']) ? $paramDef['inside'] : null);
                  if (!array_key_exists('inside', $paramDef))
                      $result[$paramDef['name']] = $value;
                  else {
                      if (!isset($result[$paramDef['inside']]))
                          $result[$paramDef['inside']] = array();
                      $result[$paramDef['inside']][$paramDef['name']] = $value;
                  }
              }
          }
      }
      return $result;
  }

  function addSelectToForm(& $form, $settings, $param, $title, $default, $options, $inside, $urlHelp) {
      $form[$param] = array(
        '#type' => 'select',
        '#title' => $title,
        '#options' => $options,
        '#default_value' => $this->getConfigParam($settings, $param, $default, 'str', $inside),
        '#attributes' => array('data-url-help' => $urlHelp == '' ? '' : ($urlHelp . '#' . $param), 'data-param-name' => $param)
      );
  }

  function addTextboxToForm(& $form, $settings, $param, $title, $default, $desc, $inside, $urlHelp) {
        $form[$param] = array(
          '#type' => 'textfield',
          '#title' => $title,
          '#default_value' => $this->getConfigParam($settings, $param, $default, 'str', $inside),
          '#description' => $desc,
          '#attributes' => array('data-url-help' => $urlHelp == '' ? '' : ($urlHelp . '#' . $param), 'data-param-name' => $param)
        );
  }

  function addTextareaToForm(& $form, $settings, $param, $title, $default, $desc, $inside, $urlHelp) {
        $form[$param] = array(
          '#type' => 'textarea',
          '#title' => $title,
          '#default_value' => $this->getConfigParam($settings, $param, $default, 'str', $inside),
          '#description' => $desc,
          '#attributes' => array('data-url-help' => $urlHelp == '' ? '' : ($urlHelp . '#' . $param), 'data-param-name' => $param)
        );
  }

  function addCheckboxToForm(& $form, $settings, $param, $title, $default, $desc, $inside, $urlHelp) {
        $form[$param] = array(
          '#type' => 'checkbox',
          '#title' => $title,
          '#default_value' => $this->getConfigParam($settings, $param, $default, 'bool', $inside),
          '#description' => $desc,
          '#attributes' => array('data-url-help' => $urlHelp == '' ? '' : ($urlHelp . '#' . $param), 'data-param-name' => $param)
        );
  }

  public function isInstalled() {
    return file_exists($_SERVER['DOCUMENT_ROOT'] . '/libraries/jsplusBootstrapTools');
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state, Editor $editor) {
    $editor_settings = $editor->getSettings();
    if (isset($editor_settings['plugins']['jsplusBootstrapTools']))
      $settings = $editor_settings['plugins']['jsplusBootstrapTools'];

    $form['#attached']['library'][] = 'ckeditor_bootstrap_tools/ckeditor_bootstrap_tools.admin';

    if (!$this->isInstalled()) {
        $form['warning'] = array(
            '#markup' => 'Looks like CKEditor Bootstrap Tools (Drupal 8 module) is installed but CKEditor add-ons not found. In order to use this module please copy CKEditor add-ons into "libraries" forder in the root of your Drupal 8 installation (create the directory if it does not exist).'
        );
        return $form;
    }

    $params = array();
    foreach ($this->plugins as $pluginName => $pluginDef) {
        if (isset($pluginDef['params']))
            foreach ($pluginDef['params'] as $paramDef) {
                $paramDef['urlDoc'] = $pluginDef['urlDoc'];
                $params[$paramDef['order']] = $paramDef;
            }
    }
    ksort($params); // sort by key (order)

    if (count($params) > 0) {
        foreach ($params as $order => $paramDef) {
            $inside = isset($paramDef['inside']) ? $paramDef['inside'] : null;
            if ($paramDef['type'] == 'json')
                $paramDef['title'] = $paramDef['title'] . "<br/>\nImportant notice: this value needs to be in JSON format. So this is the must to use double quotes (not single ones) for all key names and all string values";
            if ($paramDef['widget'] == 'select') {
                $this->addSelectToForm($form, $settings, $paramDef['name'], t($paramDef['title']), $paramDef['default'], $paramDef['widgetOptions'], $inside, $paramDef['urlDoc']);
            } else if ($paramDef['widget'] == 'checkbox') {
                $this->addCheckboxToForm($form, $settings, $paramDef['name'], t($paramDef['title']), $paramDef['default'], $paramDef['hint'], $inside, $paramDef['urlDoc']);
            } else if ($paramDef['widget'] == 'textarea') {
                $this->addTextareaToForm($form, $settings, $paramDef['name'], t($paramDef['title']), $paramDef['default'], $paramDef['hint'], $inside, $paramDef['urlDoc']);
            } else {
                $this->addTextboxToForm($form, $settings, $paramDef['name'], t($paramDef['title']), $paramDef['default'], $paramDef['hint'], $inside, $paramDef['urlDoc']);
            }
        }
    } else {
        //$settings = array();
        $form['warning'] = array(
            '#markup' => 'This add-on does not have parameters.'
        );
    }

    return $form;
  }

}
