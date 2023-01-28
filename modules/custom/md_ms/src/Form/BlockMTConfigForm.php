<?php

namespace Drupal\md_ms\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\Core\Site\Settings;
/**
 * Flatchr settings form.
 */
class BlockMTConfigForm extends ConfigFormBase {

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
    
		$form['node_id_nm'] = array(
      '#type' => 'textfield',
	  '#title' => $this->t('id de la article'),
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('node numero')),
      '#default_value' => $config->get('node_id_nm'),
    );
    $form['ns_title'] = array(
      '#title' => $this->t('Titre de la Bloc :'),
      '#type' => 'textfield',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Remplire le champs')),
      '#default_value' => $config->get('ns_title'),
    );	
	
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
	   $this->configFactory->getEditable("ms_custom.setting")
	  ->set('node_id_nm', $form_state->getValue('node_id_nm'))
	  ->set('ns_title', $form_state->getValue('ns_title'))
	  ->save();
    parent::submitForm($form, $form_state);
  }


}
