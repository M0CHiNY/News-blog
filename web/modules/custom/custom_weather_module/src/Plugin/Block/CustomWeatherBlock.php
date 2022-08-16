<?php

namespace Drupal\custom_weather_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\custom_weather_module\Traits\ConnectApi;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

/**
 * Provides a "Custom weather module" block.
 *
 * @Block(
 *   id = "custom_weather_block",
 *   admin_label = @Translation("Custom weather block"),
 *   category = @Translation("Test weather block for the DB project")
 * )
 */
class CustomWeatherBlock extends BlockBase {

  use ConnectApi;

  /**
   * {@inheritDoc}
   */
  public function build() {
    if ($this->getConfigSettings() !== NULL) {
      $config = $this->getConfigSettings();
      $temp = $config['current']['temp_c'];
      $icon = $this->getConfigSettings()['current']['condition']['icon'];
    }
    return [
      '#theme' => 'custom_weather_module_style',
      '#location' => $this->getIpUser()['city'] ?? "",
      '#temp_c' => $temp,
      '#icon' => $icon,
    ];
  }

  /**
   * Function get config settings & connect API.
   *
   * @todo dependency injection.
   */
  public function getConfigSettings(): array {
    // $city = \Drupal::config('custom_weather_module.settings')->get('city');
    // $token = \Drupal::config('custom_weather_module.settings')->get('token');
    $token = "75b555a648604b3fb3a84430221108";
    $city = "lutsk";
    if ($this->getApiWeather($token, $city)['status']) {
      $data = $this->getApiWeather($token, $city)['data'];
    }
    else {
      $data = FALSE;
    }
    return $data;
  }

  /**
   * Function get IP current user.
   *
   * @todo This function needed dependency.
   */
  public function getIpUser() {
    // $ip = \Drupal::request()->getClientIp();
    $ip = '46.164.130.92';
    $client = new Client();
    try {
      $url = "http://ip-api.com/json/{$ip}?fields=24593";
      $response = $client->get($url);
      return json_decode($response->getBody(), TRUE);
    }
    catch (RequestException $e) {
      return FALSE;
    }

  }

}
