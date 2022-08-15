<?php

namespace Drupal\custom_weather_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use GuzzleHttp\Client;

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

  /**
   * {@inheritDoc}
   */
  public function build() {
    return [
      '#theme' => 'custom_weather_module_style',
      '#location' => $this->getIpUser()['city'],
      '#temp_c' => $this->getConfigSettings()['current']['temp_c'],
      '#icon' => $this->getConfigSettings()['current']['condition']['icon'],
    ];
  }

  /**
   * Function get config settings & connect API.
   *
   * @todo dependency injection.
   */
  public function getConfigSettings(): array {
    $city = \Drupal::config('custom_weather_module.settings')
      ->get('city');
    $token = \Drupal::config('custom_weather_module.settings')
      ->get('token');
    return CustomWeatherBlock::getApiWeather($token, $city);
  }

  /**
   * Function get IP current user.
   *
   * @todo This function needed dependency.
   */
  public function getIpUser() {
    // \Drupal::request()->getClientIp();
    $ip = '46.164.130.92';
    $url = "http://ip-api.com/json/{$ip}?fields=24593";
    $client = new Client();
    $response = $client->get($url);
    return json_decode($response->getBody(), TRUE);
  }

  /**
   * Function add settings API.
   */
  public static function getApiWeather($token, $city_name) {
    $url = "http://api.weatherapi.com/v1/current.json?key={$token}&q={$city_name}";
    $client = new Client();
    $response = $client->get($url);
    return json_decode($response->getBody(), TRUE);
  }

}
