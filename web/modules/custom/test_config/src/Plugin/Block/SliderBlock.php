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
class SliderBlock extends BlockBase
{

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration()
  {
    return ['label_display' => FALSE];
  }

  /**
   * {@inheritdoc}
   */
  public function build()
  {

    $config = \Drupal::config('test_config.settings');

    return [
        '#theme' => 'slider_block',
        '#attached' => [
          'library' => [
            'test_config/test_config_data',
          ],
        ],
        '#title' => $config->get('testconfig.title'),
        '#number' => $config->get('testconfig.number'),
    ];
  }
}
