<?php

namespace Drupal\md_org\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\Core\Site\Settings;
/**
 * Flatchr settings form.
 */
class BlocConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'block_conf_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      "md_org.setting",
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

	$config = $this->config("md_org.setting");
    $form['dir_nom_au'] = array(
      '#type' => 'textfield',
	  '#title' => 'Directeur :',
	  '#prefix' => '<div class="layout-column layout-column--half"><div class="panel">',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Subject')),
      '#default_value' => $config->get('dir_nom_au'),
    );
    $form['dir_title_au'] = array(
      '#type' => 'textfield',
	  '#title' => 'fonction :',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Subject')),
      '#default_value' => $config->get('dir_title_au'),
    );
    $form['dir_desc_au'] = array(
       '#type' => 'text_format',
      '#format' => 'full_html',
	  '#title' => 'description de service :',
	  '#suffix' => '</div></div>',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Subject')),
      '#default_value' => $config->get('dir_desc_au')['value'],
    );
	/**************************** charger de mission **************/ 
	    $form['ch_mis_nom_au'] = array(
      '#type' => 'textfield',
	  '#title' => 'charger de mission :',
	  '#prefix' => '<div class="layout-column layout-column--half"><div class="panel">',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Subject')),
      '#default_value' => $config->get('ch_mis_nom_au'),
    );
    $form['ch_mis_title_au'] = array(
      '#type' => 'textfield',
	  '#title' => 'fonction :',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Subject')),
      '#default_value' => $config->get('ch_mis_title_au'),
    );
    $form['ch_mis_desc_au'] = array(
      '#type' => 'text_format',
      '#format' => 'full_html',
	  '#title' => 'description de service :',
	  '#suffix' => '</div></div>',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Subject')),
      '#default_value' => $config->get('ch_mis_desc_au')['value'],
    );
	/****************************  Département des Etudes et de la Topographie  **************/ 
	    $form['dep_et_tp_nom_au'] = array(
      '#type' => 'textfield',
	  '#prefix' => '<div class="layout-column layout-column--half"><div class="panel">',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Subject')),
      '#default_value' => $config->get('dep_et_tp_nom_au'),
    );
    $form['dep_et_tp_title_au'] = array(
      '#type' => 'textfield',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Subject')),
      '#default_value' => $config->get('dep_et_tp_title_au'),
    );
    $form['dep_et_tp_desc_au'] = array(
      '#type' => 'text_format',
      '#format' => 'full_html',
	  '#suffix' => '</div></div>',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Subject')),
      '#default_value' => $config->get('dep_et_tp_desc_au')['value'],
    );
	/****************************  Division des Affaires Administratives et Financières  **************/ 
	    $form['div_aaf_nom_au'] = array(
      '#type' => 'textfield',
	  '#prefix' => '<div class="layout-column layout-column--half"><div class="panel">',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Subject')),
      '#default_value' => $config->get('div_aaf_nom_au'),
    );
    $form['div_aaf_title_au'] = array(
      '#type' => 'textfield',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Subject')),
      '#default_value' => $config->get('div_aaf_title_au'),
    );
    $form['div_aaf_desc_au'] = array(
      '#type' => 'text_format',
      '#format' => 'full_html',
	  '#suffix' => '</div></div>',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Subject')),
      '#default_value' => $config->get('div_aaf_desc_au')['value'],
    );
	/****************************  Chef du Département de la Gestion Urbaine et de la Réglementation   **************/ 
	    $form['cdgur_nom_au'] = array(
      '#type' => 'textfield',
	  '#prefix' => '<div class="layout-column layout-column--half"><div class="panel">',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Subject')),
      '#default_value' => $config->get('cdgur_nom_au'),
    );
    $form['cdgur_title_au'] = array(
      '#type' => 'textfield',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Subject')),
      '#default_value' => $config->get('cdgur_title_au'),
    );
    $form['cdgur_desc_au'] = array(
      '#type' => 'text_format',
      '#format' => 'full_html',
	  '#suffix' => '</div></div>',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Subject')),
      '#default_value' => $config->get('cdgur_desc_au')['value'],
    );
	/****************************  Chef du Service de l’Informatique   **************/ 
	    $form['csi_nom_au'] = array(
      '#type' => 'textfield',
	  '#prefix' => '<div class="layout-column layout-column--half"><div class="panel">',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Subject')),
      '#default_value' => $config->get('csi_nom_au'),
    );
    $form['csi_title_au'] = array(
      '#type' => 'textfield',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Subject')),
      '#default_value' => $config->get('csi_title_au'),
    );
    $form['csi_desc_au'] = array(
      '#type' => 'text_format',
      '#format' => 'full_html',
	  '#suffix' => '</div></div>',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Subject')),
      '#default_value' => $config->get('csi_desc_au')['value'],
    );
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

	   $this->configFactory->getEditable("md_org.setting")
      ->set('dir_nom_au', $form_state->getValue('dir_nom_au'))
       ->set('dir_title_au', $form_state->getValue('dir_title_au'))
       ->set('dir_desc_au', $form_state->getValue('dir_desc_au'))
	   ->set('ch_mis_nom_au', $form_state->getValue('ch_mis_nom_au'))
       ->set('ch_mis_title_au', $form_state->getValue('ch_mis_title_au'))
       ->set('ch_mis_desc_au', $form_state->getValue('ch_mis_desc_au'))
	   ->set('dep_et_tp_nom_au', $form_state->getValue('dep_et_tp_nom_au'))
       ->set('dep_et_tp_title_au', $form_state->getValue('dep_et_tp_title_au'))
       ->set('dep_et_tp_desc_au', $form_state->getValue('dep_et_tp_desc_au'))
	   ->set('div_aaf_nom_au', $form_state->getValue('div_aaf_nom_au'))
       ->set('div_aaf_title_au', $form_state->getValue('div_aaf_title_au'))
       ->set('div_aaf_desc_au', $form_state->getValue('div_aaf_desc_au'))
	   ->set('cdgur_nom_au', $form_state->getValue('cdgur_nom_au'))
       ->set('cdgur_title_au', $form_state->getValue('cdgur_title_au'))
       ->set('cdgur_desc_au', $form_state->getValue('cdgur_desc_au'))
	   ->set('csi_nom_au', $form_state->getValue('csi_nom_au'))
       ->set('csi_title_au', $form_state->getValue('csi_title_au'))
       ->set('csi_desc_au', $form_state->getValue('csi_desc_au'))
	  ->save();
    parent::submitForm($form, $form_state);
  }


}
