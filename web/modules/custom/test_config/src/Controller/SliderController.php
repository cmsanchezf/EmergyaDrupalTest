<?php

namespace Drupal\test_config\Controller;


use Drupal\Core\Controller\ControllerBase;
use Drupal\test_config\Form\SliderConfigForm;


/**
 * Class SliderController.
 *
 *  Returns responses for Sitewide Alert routes.
 */
class SliderController extends ControllerBase {

  public function content() {

		$simpleform = \Drupal::formBuilder()->getForm('Drupal\test_config\Form\SliderConfigForm');

		return $simpleform;

	}
}
