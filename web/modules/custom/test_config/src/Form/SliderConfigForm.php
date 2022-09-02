<?php

namespace Drupal\test_config\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure example settings for this site.
 */
class SliderConfigForm extends ConfigFormBase {

  /**
   * Config settings.
   *
   * @var string
   */
  const SETTINGS = 'test_config.settings';

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'test_config_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'test_config.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('test_config.settings');

    $form['testconfig'] = [
      '#tree' => TRUE,
      '#type' => 'fieldset',
      '#title' => $this->t('Test config settings'),
    ];

    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('title'),
      '#default_value' => $config->get('testconfig.title'),
    ];

    $form['number'] = [
      '#type' => 'number',
      '#title' => $this->t('Number of slides'),
      '#default_value' => $config->get('testconfig.number'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Retrieve the configuration.
    $this->configFactory->getEditable('test_config.settings')
      // Set the submitted configuration setting.
      ->set('testconfig.title', $form_state->getValue('title'))
      ->set('testconfig.number', $form_state->getValue('number'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}
