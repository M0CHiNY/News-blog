<?php

namespace Drupal\custom_weather_module\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a form that configures forms module settings.
 */
class FormSettings extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'setting_weather_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'custom_weather_module.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildForm($form, $form_state);
    $config = $this->config('custom_weather_module.settings');

    $form['default_token'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your token'),
      '#required' => TRUE,
      '#default_value' => $config->get('token'),
    ];
    $form['default_city'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your city'),
      '#required' => TRUE,
      '#default_value' => $config->get('city'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $values = $form_state->getValues();

    $this->config('custom_weather_module.settings')

      ->set('token', $values['default_city'])
      ->set('city', $values['default_token'])
      ->save();

    parent::submitForm($form, $form_state);
  }

}
