<?php

namespace Drupal\Tests\printable\Unit;

use Drupal\Tests\UnitTestCase;
use Drupal\printable\PrintableCssInclude;

/**
 * Tests the print format plugin.
 *
 * @group Printable
 */
class PrintableCssIncludeTest extends UnitTestCase {

  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return [
      'name' => 'Printable CSS Include',
      'descriptions' => 'Tests the printable CSS include class.',
      'group' => 'Printable',
    ];
  }

  /**
   * Tests getting the plugin label from the plugin.
   *
   * @covers PrintableCssInclude::getCssIncludePath
   *
   * @dataProvider providerTestGetCssIncludePath
   */
  public function testGetCssIncludePath($include, $expected) {
    $config = $this->getConfigFactoryStub(['printable.settings' => ['css_include' => $include]]);

    $map = [
      ['bartik', 'core/themes/bartik'],
      ['foobar', ''],
      ['', ''],
    ];

    $themeExtensionList = $this->getMockBuilder('Drupal\Core\Extension\ThemeExtensionList')
      ->disableOriginalConstructor()
      ->getMock();
    $themeExtensionList->expects($this->any())
      ->method('getPath')
      ->will($this->returnValueMap($map));

    $css_include = new PrintableCssInclude($config, $themeExtensionList);

    $this->assertEquals($expected, $css_include->getCssIncludePath());
  }

  /**
   * Data provider for testGetCssIncludePath().
   */
  public function providerTestGetCssIncludePath() {
    return [
      ['[theme:bartik]/css/test.css', 'core/themes/bartik/css/test.css'],
      ['[theme:foobar]/css/test.css', '/css/test.css'],
      ['foo/bar/css/test.css', 'foo/bar/css/test.css'],
    ];
  }

}
