<?php

namespace Drupal\required_api_test\Tests\Plugin\Required;

use Drupal\required_api\RequiredManager;
use Drupal\Tests\UnitTestCase;

/**
 * Tests the breadcrumb manager.
 *
 * @group Drupal
 * @group Required API
 */
class RequiredManagerTest extends UnitTestCase {

  /**
   * The tested required manager.
   *
   * @var \Drupal\required_api\RequiredManager
   */
  protected $requiredManager;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {

    parent::setUp();

    $namespaces = new \ArrayObject([]);

    $cache_backend = $this->getMockBuilder('Drupal\Core\Cache\MemoryBackend')
      ->disableOriginalConstructor()
      ->getMock();

    $module_handler = $this->createMock('Drupal\Core\Extension\ModuleHandlerInterface');

    $this->requiredManager = new RequiredManager($namespaces, $cache_backend, $module_handler);
  }

  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return [
      'name' => 'Required manager',
      'description' => 'Tests the required manager.',
      'group' => 'Required API',
    ];
  }

  /**
   * Tests creating a Required Manager instance.
   */
  public function testCreateManagerInstance() {

    $is_object = is_object($this->requiredManager);
    $is_instance_of_required_manager = $this->requiredManager instanceof RequiredManager;

    $this->assertTrue($is_object, 'The requiredManager property is an object');
    $this->assertTrue($is_instance_of_required_manager, 'The requiredManager is instance of RequiredManager');

  }

}
