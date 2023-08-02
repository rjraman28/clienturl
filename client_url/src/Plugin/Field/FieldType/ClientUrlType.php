<?php

namespace Drupal\client_url\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\TypedData\DataDefinition;
/**
 * Define the "client url type".
 *
 * @FieldType(
 *   id = "client_url_type",
 *   label = @Translation("Client URL"),
 *   description = @Translation("Description for Client URL Type"),
 *   category = @Translation("Text"),
 *   default_widget = "client_url_widget",
 *   default_formatter = "client_url_formatter",
 * )
 */

class ClientUrlType extends FieldItemBase
{
    /**
     * {@inheritdoc}
     */

     public static function schema(FieldStorageDefinitionInterface $field_definition) {
        return [
            'columns' => [
                'value' => [
                'type' => 'char',
                'length' => 10,
                'not null' => FALSE,
                ],
            ],
            'indexes' => [
                'value' => array('value'),
            ],
        ];
      }

    /**
     * {@inheritdoc}
     */
    public static function PropertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
        $properties['value'] = DataDefinition::create('string')->setLabel(t("URL"));

        return $properties;
    }
}
