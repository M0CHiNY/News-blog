<?php

namespace Drupal\custom_weather_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
// Use Drupal\Core\Render\Element\Link;.
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

  /*
   * The constant is the cache id.
   */
  const ID = 'weather_id';

  /**
   * {@inheritDoc}
   *
   * @throws \Exception
   */
  public function build() {

    $location = $this->getData()['location']['name'];
    foreach ($this->getCountValue($location) as $key => $value) {
      if ($key === $location) {
        $count_loc = "Users use the location ({$value})";
      }
    }
    return [
      '#theme' => 'custom_weather_module_style',
      '#location' => $location ?? '',
      '#temp_c' => $this->getData()['current']['temp_c'] ?? '',
      '#icon' => $this->getData()['current']['condition']['icon'] ?? '',
      '#location_count' => $count_loc ?? '',

    ];
  }

  /**
   * Function setCache set API data and write this in cache.
   */
  public function setCacheWeather() {

    /*
    @todo phpcs.
    variable $citi get from config value city name.
    variable $token get from config value.
    return dataAPI;
     */
    // phpcs:ignore
    $city = \Drupal::config('custom_weather_module.settings')->get('city');
    // phpcs:ignore
    $token = \Drupal::config('custom_weather_module.settings')->get('token');
    if (!isset($city)) {
      $city = $this->getIpUser()['city'] ?? '';
    }
    $dataAPI = $this->getApiWeather($token, $city);
    /*
    @todo phpcs.
     */
    // phpcs:ignore
    \Drupal::cache()->set(self::ID, $dataAPI, time() + 3600);
    // phpcs:ignore
    return \Drupal::cache()->get(self::ID)->data;
  }

  /**
   * The function checks whether an entry exists in the cache.
   */
  public function getCacheWeather() {
    // phpcs:ignore
    if ($cache = \Drupal::cache()->get(self::ID)) {
      $data = $cache->data;
    }
    else {
      $data = $this->setCacheWeather();
    }
    return $data;
  }

  /**
   * Function get cache with data or return false.
   */
  public function getData() {
    if ($arr = $this->getCacheWeather()) {
      $data = $arr['data'] ?? '';
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
    // phpcs:ignore
    $ip = \Drupal::request()->getClientIp();
    // $ip = "176.241.140.177";
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

  /**
   * Connect database and fill the table with data.
   */
  public function setTableBase($location) {
    // phpcs:ignore
    $id = \Drupal::currentUser()->id();
    /** @var \Drupal\mysql\Driver\Database\mysql\Connection $connection */
    // phpcs:ignore
    $connection = \Drupal::service('database');
    $select = $connection->select('custom_weather_module', 'w')
      ->fields('w');
    $select->condition('uid', $id);
    $result = $select->execute()->fetchAssoc();

    if ($result) {
      $connection->update('custom_weather_module')
        ->fields([
          'location' => $location,
        ])->condition('uid', $id)->execute();
    }
    else {
      $connection->insert('custom_weather_module')
        ->fields([
          'uid' => $id,
          'location' => $location,
        ])->execute();
    }
  }

  /**
   * Get an associative array with location data and their number.
   */
  public function getCountValue($location): array {
    $this->setTableBase($location);
    // phpcs:ignore
    $connection = \Drupal::service('database');
    $sql = $connection->select('custom_weather_module', 'v')
      ->fields('v', ['location'])
      ->execute()->fetchCol();
    return array_count_values($sql);
  }

}
