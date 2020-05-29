<?php

namespace Drupal\load_external_libs\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'SliderBlock' block.
 *
 * @Block(
 *  id = "slider_block",
 *  admin_label = @Translation("Slider block"),
 * )
 */
class SliderBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['slider'] = [
      '#theme' => 'slider_theme',
      '#attached' => [
        'library'=> [
          'libraries/flexslider',
          'load_external_libs/load_external_libs'
        ]
      ]
    ];


    return $build;
  }

}
