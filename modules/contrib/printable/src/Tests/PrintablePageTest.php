<?php

namespace Drupal\printable\Tests;

use Drupal\Tests\node\Functional\NodeTestBase;

/**
 * Tests the printable module functionality.
 *
 * @group printable
 */
class PrintablePageTest extends NodeTestBase {

  /**
   * Modules to install.
   *
   * @var array
   */
  public static $modules = [
    'printable',
    'node_test_exception',
    'dblog',
    'system',
  ];

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * Perform any initial set up tasks that run before every test method.
   */
  public function setUp() {
    parent::setUp();
    $web_user = $this->drupalCreateUser([
      'create page content',
      'edit own page content',
      'view printer friendly versions',
      'administer printable',
    ]);
    $this->drupalLogin($web_user);
  }

  /**
   * Tests that the node/{node}/printable/print path returns the right content.
   */
  public function testCustomPageExists() {
    global $base_url;
    $node_type_storage = \Drupal::entityTypeManager()->getStorage('node_type');

    // Test /node/add page with only one content type.
    $node_type_storage->load('article')->delete();
    $this->drupalGet('node/add');
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()->addressEquals('node/add/page');
    // Create a node.
    $edit = [];
    $edit['title[0][value]'] = $this->randomMachineName(8);
    $bodytext = $this->randomMachineName(16) . 'This is functional test which I am writing for printable module.';
    $edit['body[0][value]'] = $bodytext;
    $this->submitForm('node/add/page', $edit, t('Save'));

    // Check that the Basic page has been created.
    $this->assertSession()->responseContains(t('@post %title has been created.', [
      '@post' => 'Basic page',
      '%title' => $edit['title[0][value]'],
    ]), 'Basic page created.');

    // Check that the node exists in the database.
    $node = $this->drupalGetNodeByTitle($edit['title[0][value]']);
    $this->assertTrue($node, 'Node found in database.');

    // Verify that pages do not show submitted information by default.
    $this->drupalGet('node/' . $node->id());
    $this->assertSession()->statusCodeEquals(200);
    $this->drupalGet('node/' . $node->id() . '/printable/print');
    $this->assertSession()->statusCodeEquals(200);
    // Checks the presence of header in the page.
    $this->assertSession()->responseContains($edit['title[0][value]'], 'Title discovered successfully in the printable page');
    // Checks the presence of image in the header.
    $this->assertSession()->responseContains(theme_get_setting('logo.url'), 'Image discovered successfully in the printable page');
    // Checks the presence of body in the page.
    $this->assertSession()->responseContains($edit['body[0][value]'], 'Body discovered successfully in the printable page');
    // Check if footer is rendering correctly.
    $this->assertSession()->responseContains($base_url . '/node/' . $node->id(), 'Source Url discovered in the printable page');
    $this->dump($base_url);
    // Enable the option of showing links present in the footer of page.
    $this->drupalGet('admin/config/user-interface/printable/print');
    $this->submitForm(NULL, [
      'print_html_display_sys_urllist' => 1,
    ], t('Submit'));

    // Check that the printable URL can be retrieved without error.
    $this->drupalGet('node/' . $node->id() . '/printable/print');
    $this->assertSession()->statusCodeEquals(200);

    // Check that invalid plugin URLs throw a 404.
    $this->drupalGet('node/' . $node->id() . '/printable/UNDEFINED');
    $this->assertSession()->statusCodeEquals(404);

    // Checks whether the URLs in the footer region are rendering properly.
    $this->assertSession()->responseContains('List of links present in page', 'Main heading for displaying URLs discovered in the printable page');
    $this->assertSession()->responseContains($base_url . '/node/' . $node->id(), 'First link discovered successfully');
    $this->assertSession()->responseContains('/user/1', 'Second link discovered successfully');
    $this->assertSession()->responseContains('/node/' . $node->id() . '/printable/print', 'Third link discovered successfully');
  }

}
