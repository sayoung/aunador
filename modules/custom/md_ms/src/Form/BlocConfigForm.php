<?php

namespace Drupal\md_ms\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\Core\Site\Settings;
use Drupal\file\Entity\File;
use Drupal\Core\Render\Element;
use Drupal\Core\Ajax\OpenModalDialogCommand;
use Drupal\Core\Ajax\HtmlCommand;
/**
 * Flatchr settings form.
 */
class BlocConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'mscustom_conf_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      "ms_custom.setting",
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

	$config = $this->config("ms_custom.setting");
    
		$form['node_id_ms'] = array(
      '#type' => 'textfield',
	  '#title' => $this->t('id de la article'),
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('node numero')),
      '#default_value' => $config->get('node_id_ms'),
    );
     $form['ms_title'] = array(
      '#title' => $this->t('Titre de la Bloc :'),
      '#type' => 'textfield',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Remplire le champs')),
      '#default_value' => $config->get('ms_title'),
    );	

	  $form['ms_image'] = [
  '#type' => 'managed_file',
  '#required' => TRUE,
  '#title' => $this->t('image'),
  '#upload_location' => 'public://myfile',
  '#default_value' => $config->get('ms_image'),
];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
      
      
      $form_file = $form_state->getValue('ms_image')[0];
	$file_object = File::load($form_file);
$file_object->setPermanent();
$file_object->save();
$file_uri = $file_object->getFileUri();
$file_url = Url::fromUri(file_create_url($file_uri))->toString();


	   $this->configFactory->getEditable("ms_custom.setting")
	  ->set('node_id_ms', $form_state->getValue('node_id_ms'))
	  ->set('ms_title', $form_state->getValue('ms_title'))
	  ->set('ms_image',$form_state->getValue('ms_image')[0])
	  ->save();
    parent::submitForm($form, $form_state);
  }


}
