<?php

namespace Drupal\required_api_test\Tests;

use Drupal\Tests\BrowserTestBase;

/**
 * Provides common functionality for the Field UI test classes.
 */
abstract class RequiredApiTestBase extends BrowserTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = [
    'node',
    'field_ui',
    'field_test',
    'required_api',
    'required_api_test',
  ];

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();

    // Create test user.
    $admin_user = $this->drupalCreateUser([
      'access content',
      'administer content types',
      'administer node fields',
      'administer node form display',
      'administer node display',
      'administer users',
      'administer account settings',
      'administer user display',
      'bypass node access',
      'administer required settings',
    ]);
    $this->drupalLogin($admin_user);

    // Create Article node type.
    $this->type = 'article';
    $this->type_label = 'Article';
    $this->drupalCreateContentType([
      'type' => $this->type,
      'name' => $this->type_label,
    ]);
  }

}
