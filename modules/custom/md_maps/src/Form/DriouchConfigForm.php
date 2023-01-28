<?php

namespace Drupal\md_maps\Form;

use Drupal\md_maps\Helper\Helper;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\Core\Site\Settings;
/**
 * Flatchr settings form.
 */
class DriouchConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'maps_driouch_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      "md_maps_prov_d.setting",
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

	$config = $this->config("md_maps_prov_d.setting");
    for($i=1; $i<=26; $i++){
    $form['md_maps_prov_d']['title_'. $i] = array(
      '#title' => $this->t('Titre de la Bloc : '. $i),
	  '#prefix' => '<div class="layout-column layout-column--half"><div class="panel">',
      '#type' => 'textfield',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Remplire le champs')),
      '#default_value' => $config->get('title_'. $i),
    );
	$form['md_maps_prov_d']['info_'. $i] = array(
      '#type' => 'text_format',
      '#format' => 'full_html',
	  '#suffix' => '</div></div>',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Remplire le champs')),
      '#default_value' => $config->get('info_'. $i)['value'],
	 
    );
	
	}
	
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
for($i=1; $i<=26; $i++){
	   $this->configFactory->getEditable("md_maps_prov_d.setting")
      ->set('title_'. $i, $form_state->getValue('title_'. $i))
	  ->set('info_'. $i, $form_state->getValue('info_'. $i))
	  ->save();
}
    parent::submitForm($form, $form_state);
  }


}
