<?php

namespace Drupal\mycustommodule\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class GetSystemSettingController.
 */
class GetSystemSettingController extends ControllerBase {

  /**
   * Content.
   *
   * @return string
   *   Return Hello string.
   */
  public function content() {
    $system = array();
    $a=\Drupal::config('system.site');
    $system['siteName'] = \Drupal::config('system.site')->get('name');
    $system['siteSlogan'] = \Drupal::config('system.site')->get('slogan');
    $system['siteEmail'] = \Drupal::config('system.site')->get('mail');
    $system['siteFront'] = \Drupal::config('system.site')->get('page.front');
    $system['site403'] = \Drupal::config('system.site')->get('page.403');
    $system['site404'] = \Drupal::config('system.site')->get('page.404');
    $result_json = json_encode($system);
    print $result_json;
    return $system;
  }

}
