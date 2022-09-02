<?php

namespace Drupal\test_config\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\test_config\Form\SliderConfigForm;
use Drupal\block_content\Entity\BlockContent;
use Drupal\block\Entity\Block;


/**
 * Class SliderController.
 *
 * Provide responses for test_config.
 */
class SliderController extends ControllerBase
{

  /**
   * Returns a ConfigForm under route /admin/config/test_config'.
   */
  public function configForm()
  {

    $simpleform = \Drupal::formBuilder()->getForm('Drupal\test_config\Form\SliderConfigForm');

    return $simpleform;
  }

  /**
   * Returns a slider_block under route /slider.
   *
   * @return array
   *   A simple renderable array.
   */
  public function page()
  {

    // Rendering the slider_block Block.
    $block_manager = \Drupal::service('plugin.manager.block');
    $block_config = [];
    $block_plugin = $block_manager->createInstance('slider_block', $block_config);
    $block_build = $block_plugin->build();
    $block_content = render($block_build);

    return [
      '#theme' => 'slider_page',
      '#block' => $block_content,
    ];
  }
}
