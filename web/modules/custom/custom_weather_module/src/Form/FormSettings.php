<?php

namespace Drupal\custom_weather_module\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\custom_weather_module\Plugin\Block\CustomWeatherBlock;
use GuzzleHttp\Exception\RequestException;

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
    if (strlen($token) < 10) {
      $form_state->setErrorByName('default_token', $this->t('The token is too short, min 10 symbols.'));
    }
    elseif (strlen($token) > 40) {
      $form_state->setErrorByName('default_token', $this->t("The token is too long, max 40 symbols."));
    }
    try {
      /*
       * We take data from the API
       */
      CustomWeatherBlock::getApiWeather($token, $city);
    }
    catch (RequestException $e) {
      $form_state->setErrorByName('default_token', $e->getMessage());
    }
  }

}
