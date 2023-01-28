<?php

namespace Drupal\dv_contact\Form;

use Drupal\dv_contact\Helper\Helper;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\Core\Site\Settings;
/**
 * Flatchr settings form.
 */
class ContactSubConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'tele_rdv_conf_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      Helper::SETTINGS,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config(Helper::SETTINGS);

    $form['c_mail'] = array(
      '#type' => 'fieldset',
      '#title' => $this
        ->t('Mail'),
    );
    $form['c_sms'] = array(
      '#type' => 'fieldset',
      '#title' => $this
        ->t('SMS'),
    );
    $form['c_mail']['contact_subject'] = array(
      '#title' => $this->t('Subject'),
      '#type' => 'textfield',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Subject')),
      '#default_value' => $config->get('contact_subject'),

    );
	
	$form['c_mail']['contact_reception'] = array(
      '#title' => $this->t('Message de confirmation la reception de demande de rdv '),
      '#type' => 'text_format',
      '#format' => 'full_html',
      '#description' => '[code] => code de Suivi </br> [name] => nom complet ',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Message E-mail')),
      '#default_value' => $config->get('contact_reception')['value'],
    );

	$form['c_mail']['contact_reply'] = array(
      '#title' => $this->t('Message De verification de demande '),
      '#type' => 'text_format',
      '#format' => 'full_html',
      '#description' => '[code] => code de Suivi </br> [name] => nom complet </br>  [date_rdv] => date de rdv  </br>  [commenatire] => commentaire  ',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Message E-mail')),
      '#default_value' => $config->get('contact_reply')['value'],
    );
	

    $form['c_mail']['contact_footer1'] = array(
      '#title' => $this->t('Footer 1'),
      '#type' => 'textfield',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Footer 1')),
      '#default_value' => $config->get('contact_footer1'),

    );
    $form['c_mail']['contact_footer2'] = array(
      '#title' => $this->t('Footer 2'),
      '#type' => 'textfield',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Footer 2')),
      '#default_value' => $config->get('contact_footer2'),

    );
	$form['c_sms']['sms_reception'] = array(
      '#title' => $this->t('Message De confirmation demande de rdv (sms)'),
      '#type' => 'textarea',
      '#format' => 'full_html',
      '#description' => '[code] => code de Suivi ',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Message SMS')),
      '#default_value' => $config->get('sms_reception'),
    );
    $form['c_sms']['sms_reply'] = array(
      '#title' => $this->t('Message De confirmation la date proposer pour le rdv (sms)'),
      '#type' => 'textarea',
      '#format' => 'full_html',
      '#description' => '[code] => code de Suivi',
      '#attributes' => array('class' => array('text-input', 'mauticform-input'), 'placeholder' => $this->t('Message SMS')),
      '#default_value' => $config->get('sms_reply'),
    );

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

       $this->configFactory->getEditable(Helper::SETTINGS)
      ->set('contact_subject', $form_state->getValue('contact_subject'))
	  ->set('contact_reception', $form_state->getValue('contact_reception'))
	  ->set('contact_reply', $form_state->getValue('contact_reply'))
	  ->set('contact_footer1', $form_state->getValue('contact_footer1'))
      ->set('contact_footer2', $form_state->getValue('contact_footer2'))
	  ->set('sms_reception', $form_state->getValue('sms_reception'))
      ->set('sms_reply', $form_state->getValue('sms_reply'))
	  ->save();

    parent::submitForm($form, $form_state);
  }


}
