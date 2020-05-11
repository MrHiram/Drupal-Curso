<?php

namespace Drupal\load_css_js\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class LoadCssAndJsController.
 */
class LoadCssJsController extends ControllerBase {

  /**
   * Index.
   *
   * @return string
   */
  public function index() {

    $items = [
      [
        'title' => $this->t('Title 1'),
        'description' => $this->t('Bacon ipsum dolor amet jerky fatback porchetta, pork belly sirloin bresaola t-bone burgdoggen kielbasa picanha buffalo. Fatback kielbasa pastrami, meatball chislic pork venison cupim ribeye jerky tri-tip tongue. Strip steak shoulder biltong, salami cupim burgdoggen capicola fatback. Frankfurter sausage pork chop tongue chicken. Salami cupim swine chicken pancetta beef ribs. Andouille pancetta ribeye chislic flank drumstick buffalo jowl porchetta fatback chuck shoulder cow cupim shankle.')
      ],
      [
        'title' => $this->t('Title 2
        '),
        'description' => $this->t('Bacon ipsum dolor amet jerky fatback porchetta, pork belly sirloin bresaola t-bone burgdoggen kielbasa picanha buffalo. Fatback kielbasa pastrami, meatball chislic pork venison cupim ribeye jerky tri-tip tongue. Strip steak shoulder biltong, salami cupim burgdoggen capicola fatback. Frankfurter sausage pork chop tongue chicken. Salami cupim swine chicken pancetta beef ribs. Andouille pancetta ribeye chislic flank drumstick buffalo jowl porchetta fatback chuck shoulder cow cupim shankle.')
      ],
      [
        'title' => $this->t('Title 3'),
        'description' => $this->t('Bacon ipsum dolor amet jerky fatback porchetta, pork belly sirloin bresaola t-bone burgdoggen kielbasa picanha buffalo. Fatback kielbasa pastrami, meatball chislic pork venison cupim ribeye jerky tri-tip tongue. Strip steak shoulder biltong, salami cupim burgdoggen capicola fatback. Frankfurter sausage pork chop tongue chicken. Salami cupim swine chicken pancetta beef ribs. Andouille pancetta ribeye chislic flank drumstick buffalo jowl porchetta fatback chuck shoulder cow cupim shankle.')
      ],
      [
        'title' => $this->t('Title 4'),
        'description' => $this->t('Bacon ipsum dolor amet jerky fatback porchetta, pork belly sirloin bresaola t-bone burgdoggen kielbasa picanha buffalo. Fatback kielbasa pastrami, meatball chislic pork venison cupim ribeye jerky tri-tip tongue. Strip steak shoulder biltong, salami cupim burgdoggen capicola fatback. Frankfurter sausage pork chop tongue chicken. Salami cupim swine chicken pancetta beef ribs. Andouille pancetta ribeye chislic flank drumstick buffalo jowl porchetta fatback chuck shoulder cow cupim shankle.')
      ]
    ];

    /**
     * <div clase="container">
     *    [items]
     * </div>
     */
    $build = [
      '#prefix' => '<div class="container">',
      '#suffix' => '</div>',
      'items' => [],
      '#attached' => [
        'library'=>[
          'load_css_js/css_js_module',
          'load_css_js/axios',
          'load_css_js/fontawesome'
        ]
      ]
    ];

    foreach($items as $item){
      $build['items'][] = [
        '#theme' => 'item_accordion',
        '#title' => $item['title'],
        '#description' => $item['description']
      ];
    }

    return $build;
  }

}
