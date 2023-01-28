<?php

namespace Drupal\required_api_test\Tests;

use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Tests the functionality of the 'Manage fields' screen.
 */
class RequiredApiTest extends RequiredApiTestBase {
  use StringTranslationTrait;

  /**
   * {@inheritdoc}
   */
  public function setUp() {

    parent::setUp();

    // Create a test field and instance.
    $this->field_name = 'test';

    $this->container->get('entity_type.manager')
      ->getStorage('field_entity')
      ->create([
        'name' => $this->field_name,
        'entity_type' => 'node',
        'type' => 'test_field',
      ])
      ->save();

    $this->instance = $this->container->get('entity_type.manager')
      ->getStorage('field_instance')
      ->create([
        'field_name' => $this->field_name,
        'entity_type' => 'node',
        'bundle' => $this->type,
      ])
      ->save();

    $this->instance->save();

    $form_display = $this->container->get('entity_display.repository')
      ->getFormDisplay('node', $this->type, 'default');
    $form_display->setComponent($this->field_name)->save();

    $this->manager = $form_display->get('pluginManager')->getRequiredManager();

    $this->admin_path = 'admin/structure/types/manage/' . $this->type . '/fields/' . $this->instance->id();

  }

  /**
   * Tests that default value is correctly validated and saved.
   */
  public function testExpectedPluginDefinitions() {

    $expected_definitions = [
      // Core behavior plugin replacement.
      'default',
      // Testing plugins.
      'required_true',
    ];

    $diff = array_diff($this->manager->getDefinitionsIds(), $expected_definitions);
    $this->assertEqual([], $diff, 'Definitions match expected.');

  }

  /**
   * Tests the default Required Plugin.
   */
  public function testRequiredDefaultPlugin() {

    // Setting default (FALSE) and checking the form.
    $this->setRequiredPlugin('default', FALSE);

    $add_path = 'node/add/' . $this->type;
    $this->drupalGet($add_path);
    $title = $this->randomString();

    $edit = [
      'title[0][value]' => $title,
    ];

    $this->drupalPostForm(NULL, $edit, $this->t('Save'));

    $message = $this->t('!label !title has been created.', [
      '!label' => $this->type_label,
      '!title' => $title,
    ]
    );

    $this->assertText($message);
  }

  /**
   * Tests that default value is correctly validated and saved.
   */
  public function testRequiredTestTruePlugin() {

    // Setting true and checking the form.
    $this->setRequiredPlugin('required_true', 1);
    $this->drupalGet('node/add/' . $this->type);

    $edit = [
      'title[0][value]' => $this->randomString(),
    ];

    $this->drupalPostForm(NULL, $edit, $this->t('Save'));
    $this->assertText($this->t('!field field is required.', ['!field' => $this->field_name]));
  }

  /**
   * Helper function to set the required Plugin.
   *
   * @param string $plugin_id
   *   The plugin ID.
   * @param bool $plugin_value
   *   TRUE if the plugin is required.
   */
  public function setRequiredPlugin($plugin_id, $plugin_value) {

    $fieldname = "required_api[third_party_settings][required_plugin]";

    $edit = [
      $fieldname => $plugin_id,
      'instance[required]' => $plugin_value,
    ];

    $this->drupalPostForm($this->admin_path, $edit, $this->t('Save settings'));

  }

}
