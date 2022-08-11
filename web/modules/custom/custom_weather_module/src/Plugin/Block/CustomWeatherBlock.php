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
      '#markup' => "{$this->getAPIweather()} district. Your IP is:  {$this->getIpUser()}",
    ];
  }

  /**
   * Function get IP current user.
   */

  // @todo This function needed dependency.
  public function getIpUser() {
//    return \Drupal::request()->getClientIp();
    return '172.21.0.6';
  }

  /**
   * Function add settings API.
   */
  public function getApiWeather() {
    $url = 'http://api.weatherapi.com/v1/current.json?key=75b555a648604b3fb3a84430221108&q=lutsk Volyn&aqi=no';
    $client = new Client();
    $response = $client->get($url);
    $response_data = json_decode($response->getBody()->getContents(), TRUE);
    $result = $response_data['location']['name'];
    return $result;

  }

}
