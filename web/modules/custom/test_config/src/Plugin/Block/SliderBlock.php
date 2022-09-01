<?php

namespace Drupal\test_config\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a Slider Block.
 *
 * @Block(
 *   id = "slider_block",
 *   admin_label = @Translation("Slider block"),
 *   category = @Translation("Slider"),
 * )
 */
class SliderBlock extends BlockBase {

   /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return ['label_display' => FALSE];
  }

  /**
   * {@inheritdoc}
   */
  public function build() {

    $config = \Drupal::config('test_config.settings');

    return [
      '#markup' => $this->t($config->get('testconfig.title') . " " . $config->get('testconfig.number')),
    ];
  }

}
