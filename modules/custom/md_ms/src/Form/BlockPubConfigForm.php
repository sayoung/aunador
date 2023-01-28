<?php

namespace Drupal\md_ms\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\Core\Site\Settings;
/**
 * Flatchr settings form.
 */
class BlockPubConfigForm extends ConfigFormBase {

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
    
		$form['pub_link'] = array(
      '#type' => 'textfield',
	  '#title' => $this->t('Lien de la Geoportail'),
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Geoportail')),
      '#default_value' => $config->get('pub_link'),
    );
	
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
	   $this->configFactory->getEditable("ms_custom.setting")
	  ->set('pub_link', $form_state->getValue('pub_link'))
	  ->save();
    parent::submitForm($form, $form_state);
  }


}
