<?php

namespace Drupal\custom_weather_module\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Provides a "StatisticsBlock" block.
 *
 * @Block(
 *   id = "StatisticsBlock",
 *   admin_label = @Translation("Statistics Block"),
 *   category = @Translation("Statistics Block")
 * )
 */
class StatisticsBlock extends BlockBase {

  /**
   * {@inheritDoc}
   */
  public function build() {

    return [
      '#theme' => 'statistics',
      '#list' => $this->getUserStatistics() ?? '',
    ];
  }

  /**
   * Create join tables and enter list username and user locations.
   */
  public function getUserStatistics(): array {
      // phpcs:ignore
      /** @var \Drupal\Core\Database\Connection $connection */
      // phpcs:ignore
      $connection = \Drupal::service('database');
    $query = $connection->select('custom_weather_module', 'u');
    $query->innerJoin('users_field_data', 'ufd', 'u.uid = ufd.uid');
    $query->fields('u', ['uid', 'location']);
    $query->fields('ufd', ['name']);
    $users = $query->execute()->fetchAll();
    $res = [];
    foreach ($users as $value) {
      $location = $value->location;
      $name = $value->name;
      $id = $value->uid;
      // phpcs:ignore
      $link = Link::fromTextAndUrl($name, Url::fromUri("base:/user/$id"))->toString();
      $res[] = $link . " - " . $location;

    }
    return $res;
  }

}
