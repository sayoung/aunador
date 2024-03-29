<?php

namespace Drupal\printable\Tests;

use Drupal\Tests\BrowserTestBase;

/**
 * Tests the printable module functionality.
 *
 * @group printable
 */
class PrintablePdfFormTest extends BrowserTestBase {

  /**
   * Modules to install.
   *
   * @var array
   */
  public static $modules = ['printable'];

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * A simple user with 'administer printable' permission.
   *
   * @var \Drupal\user\Entity\User
   */
  private $user;

  /**
   * Perform any initial set up tasks that run before every test method.
   */
  public function setUp() {
    parent::setUp();
    $this->user = $this->drupalCreateUser(['administer printable']);
    $this->drupalLogin($this->user);
  }

  /**
   * Tests the PDF form.
   */
  public function testPdfFormWorks() {
    $this->drupalLogin($this->user);
    $this->drupalGet('admin/config/user-interface/printable/pdf');
    $this->assertSession()->statusCodeEquals(200);

    $config = $this->config('printable.settings');
    $this->assertSession()->fieldValueEquals('print_pdf_pdf_tool', $config->get('printable.pdf_tool'), 'The field was found with the correct value.');
    $this->assertSession()->fieldValueEquals('print_pdf_content_disposition', $config->get('printable.save_pdf'), 'The field was found with the correct value.');
    $this->assertSession()->fieldValueEquals('print_pdf_paper_size', $config->get('printable.paper_size'), 'The field was found with the correct value.');
    $this->assertSession()->fieldValueEquals('print_pdf_page_orientation', $config->get('printable.page_orientation'), 'The field was found with the correct value.');
    $this->assertSession()->fieldValueEquals('print_pdf_filename', $config->get('printable.pdf_location'), 'The field was found with the correct value.');

    $this->submitForm(NULL, [
      'print_pdf_pdf_tool' => 'wkhtmltopdf',
      'print_pdf_content_disposition' => 1,
      'print_pdf_paper_size' => 'A10',
      'print_pdf_page_orientation' => 'landscape',
      'print_pdf_filename' => 'test_pdf',
    ], t('Submit'));
    $this->drupalGet('admin/config/user-interface/printable/pdf');
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()->fieldValueEquals('print_pdf_pdf_tool', 'wkhtmltopdf', 'The field was found with the correct value.');
    $this->assertSession()->fieldValueEquals('print_pdf_content_disposition', 1, 'The field was found with the correct value.');
    $this->assertSession()->fieldValueEquals('print_pdf_paper_size', 'A10', 'The field was found with the correct value.');
    $this->assertSession()->fieldValueEquals('print_pdf_page_orientation', 'landscape', 'The field was found with the correct value.');
    $this->assertSession()->fieldValueEquals('print_pdf_filename', 'test_pdf', 'The field was found with the correct value.');
  }

}
