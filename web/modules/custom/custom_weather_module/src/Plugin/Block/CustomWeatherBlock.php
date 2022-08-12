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
      '#markup' => "district. Your IP is:  {$this->getIpUser()}",
    ];
  }

  /**
   * Function get IP current user.
   *
   * @todo This function needed dependency.
   */
  public function getIpUser() {
    // Return \Drupal::request()->getClientIp();
    return '172.21.0.6';
  }

  /**
   * Function add settings API.
   */
  public static function getApiWeather($token, $city_name) {
    $url = "http://api.weatherapi.com/v1/current.json?key={$token}&q={$city_name}";
    $client = new Client();
    $response = $client->get($url);
    return json_decode($response->getBody()->getContents(), TRUE);
  }

}
