<?php

namespace Drupal\required_api\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines an field required api annotation object.
 *
 * @see hook_required_api_info_alter()
 *
 * @Annotation
 */
class Required extends Plugin {

  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The human-readable name of the api.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $label;

  /**
   * A brief description of the api.
   *
   * @var \Drupal\Core\Annotation\Translationoptional
   *
   * @ingroup plugin_translatable
   */
  public $description = '';

}
