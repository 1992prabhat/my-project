<?php

namespace Drupal\mycustommodule\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the mycustommodule module.
 */
class GetSystemSettingControllerTest extends WebTestBase {


  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return [
      'name' => "mycustommodule GetSystemSettingController's controller functionality",
      'description' => 'Test Unit for module mycustommodule and controller GetSystemSettingController.',
      'group' => 'Other',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
  }

  /**
   * Tests mycustommodule functionality.
   */
  public function testGetSystemSettingController() {
    // Check that the basic functions of module mycustommodule.
    $this->assertEquals(TRUE, TRUE, 'Test Unit Generated via Drupal Console.');
  }

}
