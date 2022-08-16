<?php

namespace Drupal\custom_weather_module\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\custom_weather_module\Traits\ConnectApi;

/**
 * Defines a form that configures forms module settings.
 */
class FormSettings extends ConfigFormBase {

  use ConnectApi;

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
      ->set('token', $values['default_token'])
      ->set('city', $values['default_city'])
      ->save();
    parent::submitForm($form, $form_state);
  }

  /**
   * {@inheritDoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $city = $form_state->getvalue('default_city');
    $token = $form_state->getvalue('default_token');

    /*
     *confirm the correct spelling of the city.
     */
    if (!preg_match("/^[a-zA-Z ,]{3,32}$/", $city)) {
      $form_state->setErrorByName('default_city', $this->t('Enter the city in the correct format or the city name is too short.'));
    }
    /*
     *confirm the correct spelling of strlen token.
     */
    $status = $this->getApiWeather($token, $city);
    if (!$status['status']) {
      $form_state->setErrorByName('default_token', "{$status['data']->getMessage()}");
    }
  }

}
