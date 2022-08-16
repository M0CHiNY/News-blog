<?php

namespace Drupal\custom_weather_module\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

/**
 * This trait using connect from API.
 */
trait ConnectApi {

  /**
   * Function add settings API.
   */
  public function getApiWeather($token, $city_name) {
    $url = "http://api.weatherapi.com/v1/current.json?key={$token}&q={$city_name}";
    $client = new Client();
    try {
      $response = $client->get($url);
      return [
        'status' => TRUE,
        'data' => json_decode($response->getBody(), TRUE),
      ];
    }
    catch (RequestException $e) {
      return [
        'status' => FALSE,
        'data' => $e,
      ];
    }
  }

}
