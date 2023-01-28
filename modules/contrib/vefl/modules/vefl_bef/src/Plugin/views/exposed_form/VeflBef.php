<?php

namespace Drupal\vefl_bef\Plugin\views\exposed_form;

use Drupal\better_exposed_filters\Plugin\BetterExposedFiltersWidgetManager;
use Drupal\better_exposed_filters\Plugin\views\exposed_form\BetterExposedFilters;
use Drupal\vefl\Plugin\views\exposed_form\VeflTrait;
use Drupal\vefl\Vefl;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Exposed form plugin that provides a better exposed filters form with layout.
 *
 * @ingroup views_exposed_form_plugins
 *
 * @ViewsExposedForm(
 *   id = "vefl_bef",
 *   title = @Translation("Better Exposed Filters (with layout)"),
 *   help = @Translation("Adds layout settings for Better Exposed Filters")
 * )
 */
class VeflBef extends BetterExposedFilters {
  use VeflTrait;

  /**
   * BEF filters widget plugin manager.
   *
   * @var \Drupal\better_exposed_filters\Plugin\BetterExposedFiltersWidgetManager
   */
  public $filterWidgetManager;

  /**
   * BEF pager widget plugin manager.
   *
   * @var \Drupal\better_exposed_filters\Plugin\BetterExposedFiltersWidgetManager
   */
  public $pagerWidgetManager;

  /**
   * BEF sort widget plugin manager.
   *
   * @var \Drupal\better_exposed_filters\Plugin\BetterExposedFiltersWidgetManager
   */
  public $sortWidgetManager;

  /**
   * The vefl layout helper.
   *
   * @var \Drupal\vefl\Vefl
   */
  protected $vefl;

  /**
   * BetterExposedFilters constructor.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\better_exposed_filters\Plugin\BetterExposedFiltersWidgetManager $filter_widget_manager
   *   The better exposed filter widget manager for filter widgets.
   * @param \Drupal\better_exposed_filters\Plugin\BetterExposedFiltersWidgetManager $pager_widget_manager
   *   The better exposed filter widget manager for pager widgets.
   * @param \Drupal\better_exposed_filters\Plugin\BetterExposedFiltersWidgetManager $sort_widget_manager
   *   The better exposed filter widget manager for sort widgets.
   * @param \Drupal\vefl\Vefl $vefl
   *   The vefl layout helper.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, BetterExposedFiltersWidgetManager $filter_widget_manager, BetterExposedFiltersWidgetManager $pager_widget_manager, BetterExposedFiltersWidgetManager $sort_widget_manager, Vefl $vefl) {
    parent::__construct(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $this->filterWidgetManager = $filter_widget_manager,
      $this->pagerWidgetManager = $pager_widget_manager,
      $this->sortWidgetManager = $sort_widget_manager
    );

    $this->vefl = $vefl;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('plugin.manager.better_exposed_filters_filter_widget'),
      $container->get('plugin.manager.better_exposed_filters_pager_widget'),
      $container->get('plugin.manager.better_exposed_filters_sort_widget'),
      $container->get('vefl.layout')
    );
  }

  /**
   * {@inheritdoc}
   */
  private function getRegionElements($layout_id, array $layouts = []) {
    $element = [
      '#prefix' => '<div id="edit-block-region-wrapper">',
      '#suffix' => '</div>',
    ];
    // Outputs regions selectbox for each filter.
    $types = [
      'filters' => $this->view->display_handler->getHandlers('filter'),
      'actions' => $this->vefl->getFormActions(),
    ];

    // Add option for secondary exposed form.
    $types['actions']['secondary'] = t('Secondary exposed form options');

    // Add additional action for combined sort.
    $types['actions']['sort_bef_combine'] = t('Combine sort order with sort by');

    $regions = [];
    foreach ($layouts[$layout_id]->getRegions() as $region_id => $region) {
      $regions[$region_id] = $region['label'];
    }

    foreach ($types as $type => $fields) {
      foreach ($fields as $id => $filter) {
        if ($type == 'filters') {
          if (!$filter->options['exposed']) {
            continue;
          }
          elseif ($filter->options['is_grouped']) {
            $id = $filter->options['group_info']['identifier'];
            $label = $filter->options['group_info']['label'];
          }
          else {
            $id = $filter->options['expose']['identifier'];
            $label = $filter->options['expose']['label'];
          }
        }
        else {
          $label = $filter;
        }

        // Check if the operator is exposed for this filter.
        if (isset($filter->options['expose']['use_operator'])
          && $filter->options['expose']['use_operator']
        ) {
          $operator_id = $filter->options['expose']['operator_id'];
          $element[$operator_id] = $this->createSelectElementForVeflForm($operator_id, $this->t('Expose operator') . ' - ' . $label, $regions);
        }

        $element[$id] = $this->createSelectElementForVeflForm($id, $label, $regions);

        // Add states if secondary.
        if ($id == 'secondary') {
          $element[$id]['#states'] = [
            'visible' => [
              ':input[name="exposed_form_options[bef][general][allow_secondary]"]' => ['checked' => TRUE],
            ],
          ];
        }

        // Add states if combined sort.
        if ($id == 'sort_bef_combine') {
          $element[$id]['#states'] = [
            'visible' => [
              ':input[name="exposed_form_options[bef][sort][advanced][combine]"]' => ['checked' => TRUE],
            ],
          ];
        }
      }
    }

    return $element;
  }

}
