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
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: content')
    ];
  }

}
