<?php

namespace Drupal\client_url\Plugin\Field\FieldWidget;

use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Define the "client url widget".
 *
 * @FieldWidget(
 *   id = "client_url_widget",
 *   label = @Translation("Client URL Widget"),
 *   description = @Translation("Description for Client URL Widget"),
 *   field_types = {
 *     "client_url_type"
 *   }
 * )
 */

class ClientUrlWidget extends WidgetBase {

    /**
     * {@inheritdoc}
     */

     public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
      /* $modulepath = \Drupal::service('extension.list.module')->getPath('client_url');
      $filePath = $modulepath.'/config/client_urls.txt';
      $urls = file($filePath); */
      $urls = [
        0 => 'googe.com',
        1 => 'www.google.com',
        2 => 'google.co.in',
        3 => 'test.google.co.in',
        4 => 'bing.com',
        5 => 'qed42.net',
        6 => 'test.qed42.net',
        7 => 'two.qed42.net'
      ];
      $element['value'] = $element + array(
          '#type' => 'select',
          '#options' => $urls,
          '#empty_value' => '',
          '#default_value' => (isset($items[$delta]->value) && isset($urls[$items[$delta]->value])) ? $items[$delta]->value : NULL,
        );
      return $element;
     }

     /**
      * {@inheritdoc}
      */
      public static function defaultSettings() {
        return parent::defaultSettings();
      }

      /**
       * {@inheritdoc}
       */
      public function settingsForm(array $form, FormStateInterface $form_state) {
        $element['placeholder'] = [
            '#type' => 'textfield',
            '#title' => 'Placeholder text',
            '#default_value' => $this->getSetting('placeholder'),
        ];
        return $element;
      }

      /**
       * {@inheritdoc}
       */
      public function settingsSummary() {
        $summary = [];
        $summary[] = $this->t("placeholder text: @placeholder", array("@placeholder" => $this->getSetting("placeholder")));
        return $summary;
      }


}
