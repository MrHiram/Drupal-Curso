<?php

namespace Drupal\country_field\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Locale\CountryManager;

/**
 * Implements plugin 'country_field_formatter_type'
 *
 * @FieldFormatter(
 *   id = "country_field_formatter_type",
 *   label = @Translation("Country Field - Formatter"),
 *   description = @Translation("Country Field - Formatter"),
 *   field_types = {
 *     "country_field_type",
 *   }
 * )
 */
class CountryFieldFormatter extends FormatterBase{

    public function viewElements(FieldItemListInterface $items, $langcode)
    {
        $elements = [];

        foreach($items as $delta => $item){
            $elements[$delta] = [
                "value" => [
                    "#markup" => $this->viewValue($item)
                ]
            ];
        }

        return $elements;
    }

    /**
     * Generate the output
     *
     * @param FieldItemInterface $item
     * @return void
     */
    private function viewValue(FieldItemInterface $item){
        /*$countryList = CountryManager::getList();
        *$countryLong = $countryList[$item->value];*/

        $countryList = CountryManager::getStandardList();
        return nl2br(Html::escape($countryList[$item->value]));
    }
}