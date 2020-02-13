<?php

namespace Drupal\mycustommodule\Plugin\rest\resource;

use Drupal\rest\ModifiedResourceResponse;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 * Provides a resource to get view modes by entity and bundle.
 *
 * @RestResource(
 *   id = "get_system_settings",
 *   label = @Translation("Get system settings"),
 *   uri_paths = {
 *     "canonical" = "/get-system-settings"
 *   }
 * )
 */
class GetSystemSettings extends ResourceBase {

  /**
   * A current user instance.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  protected $currentUser;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    $instance = parent::create($container, $configuration, $plugin_id, $plugin_definition);
    $instance->logger = $container->get('logger.factory')->get('mycustommodule');
    $instance->currentUser = $container->get('current_user');
    return $instance;
  }

    /**
     * Responds to GET requests.
     *
     * @param string $payload
     *
     * @return \Drupal\rest\ResourceResponse
     *   The HTTP response object.
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     *   Throws exception expected.
     */
    public function get($payload) {

        // You must to implement the logic of your REST Resource here.
        // Use current user after pass authentication to validate access.
        if (!$this->currentUser->hasPermission('access content')) {
            throw new AccessDeniedHttpException();
        }

        $system = array();
        $a=\Drupal::config('system.site');
        $system['siteName'] = \Drupal::config('system.site')->get('name');
        $system['siteSlogan'] = \Drupal::config('system.site')->get('slogan');
        $system['siteEmail'] = \Drupal::config('system.site')->get('mail');
        $system['siteFront'] = \Drupal::config('system.site')->get('page.front');
        $system['site403'] = \Drupal::config('system.site')->get('page.403');
        $system['site404'] = \Drupal::config('system.site')->get('page.404');
        //$result_json = json_encode($system);
        return new ResourceResponse($system, 200);
    }

}
