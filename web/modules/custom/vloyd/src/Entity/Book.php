<?php

namespace Drupal\vloyd\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\ContentEntityInterface;

/**
 * Defines the Book Review Entity.
 *
 * @ingroup book
 *
 * @ContentEntityType(
 *   id = "book",
 *   label = @Translation("Book"),
 *   base_table = "book",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *   },
 *    handlers = {
 *     "form" = {
 *       "default" = "Drupal\vloyd\Form\BookEntityForm",
 *     },
 *   },
 * )
 */
class Book extends ContentEntityBase implements ContentEntityInterface {

  /**
   * Func to set Our Basic Fields that Makes Book Review a Real Book Review.
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type): array {

    // SettingID.
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The ID of the Book Review.'))
      ->setReadOnly(TRUE);

    // SettingUUID.
    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(t('UUID'))
      ->setDescription(t('The UUID of the Book Review.'))
      ->setReadOnly(TRUE);

    // NameField.
    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('Enter Your Name'))
      ->setDefaultValue(NULL)
      ->setRequired(TRUE)
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setSetting('max_length', 100)
      ->setPropertyConstraints('value', [
        'Length' => [
          'max' => 100,
          'maxMessage' => 'Your Name is too Long. Max Length is 100 Symbols.',
          'min' => 2,
          'minMessage' => 'Your Name is too Short. Minimal Length is 2 Symbols.',
        ],
        'Regex' => [
          'pattern' => "/[a-z0-9 -'_]{2,100}/",
          'message' => 'Your Name Seems NOT to be Valid. Please, Use the Characters That are Valid.',
        ],
      ])
      ->setDisplayOptions('form', [
        'type' => 'string',
        'label' => 'hidden',
        'settings' => [
          'placeholder' => 'Enter Your Name: ',
        ],
      ])
      ->setDisplayOptions('view', [
        'type' => 'string',
        'label' => 'hidden',
      ]);

    // EmailField.
    $fields['email'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Email'))
      ->setDescription(t('Enter Your Email'))
      ->setDefaultValue(NULL)
      ->setRequired(TRUE)
      ->setSetting('max_length', 70)
      ->setPropertyConstraints('value', [
        'Length' => [
          'max' => 70,
          'maxMessage' => 'Your Email Should be Shorter. Please, Cut it off',
        ],
        'Regex' => [
          'pattern' => '/\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6}/',
          'message' => 'Your Email Seems NOT to be Valid',
        ],
      ])
      ->setDisplayOptions('form', [
        'type' => 'string',
        'label' => 'hidden',
        'settings' => [
          'placeholder' => 'Enter Your Email: ',
        ],
      ])
      ->setDisplayOptions('view', [
        'type' => 'string',
        'label' => 'hidden',
      ]);

    // PhoneNumberField.
    $fields['phone'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Phone'))
      ->setDescription(t('Enter Your Phone Number'))
      ->setDefaultValue(NULL)
      ->setRequired(TRUE)
      ->setSetting('max_length', 15)
      ->setPropertyConstraints('value', [
        'Length' => [
          'max' => 15,
          'maxMessage' => 'Your Phone Number Should NOT be Longer than 15 Symbols',
          'min' => 10,
          'minMessage' => 'Your Phone Number Should be Longer than 10 Symbols',
        ],
        'Regex' => [
          'pattern' => '/[0-9]/',
          'message' => 'Your Phone Number Seems NOT to be Valid. Please, Use Correct Symbols.',
        ],
      ])
      ->setDisplayOptions('form', [
        'type' => 'string',
        'label' => 'hidden',
        'settings' => [
          'placeholder' => 'Enter Your Phone Number',
        ],
      ])
      ->setDisplayOptions('view', [
        'type' => 'string',
        'label' => 'hidden',
      ]);

    // MessageField.
    $fields['review'] = BaseFieldDefinition::create('string_long')
      ->setLabel(t('Review'))
      ->setDescription(t('Enter Your Message Review.'))
      ->setDefaultValue(NULL)
      ->setRequired(TRUE)
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setSetting('max_length', 1000)
      ->setPropertyConstraints('value', [
        'Length' => [
          'max' => 1023,
          'maxMessage' => 'Your Review is too Long. It Should be Shorter Than 1023 Symbols.',
        ],
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_long',
        'label' => 'hidden',
      ])
      ->setDisplayOptions('view', [
        'type' => 'text_default',
        'label' => 'hidden',
      ]);

    // AvatarField.
    $fields['avatar'] = BaseFieldDefinition::create('image')
      ->setLabel(t('Your Avatar'))
      ->setDescription(t('Please, Upload Your Avatar.'))
      ->setRequired(FALSE)
      ->setDefaultValue(NULL)
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setSettings([
        'file_directory' => 'book/avatars/',
        'alt_field_required' => FALSE,
        'file_extensions' => 'png jpg jpeg',
        'max_filesize' => 2097152,
      ])
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'image',
      ])
      ->setDisplayOptions('form', [
        'type' => 'image',
      ]);

    // PhotoField.
    $fields['image'] = BaseFieldDefinition::create('image')
      ->setLabel(t('Your Photo Review'))
      ->setDescription(t('Please, Upload Your Photo Review.'))
      ->setRequired(FALSE)
      ->setDefaultValue(NULL)
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setSettings([
        'file_directory' => 'book/photos/',
        'alt_field_required' => FALSE,
        'file_extensions' => 'png jpg jpeg',
        'max_filesize' => 5242880,
      ])
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'image',
      ])
      ->setDisplayOptions('form', [
        'type' => 'image',
      ]);

    // CreatedDataTime.
    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The Date, When You Created This Review.'))
      ->setDisplayConfigurable('view', TRUE)
      ->setDisplayOptions('view', [
        'type' => 'datetime_custom',
        'label' => 'hidden',
        'settings' => [
          'data_format' => 'm/d/y h:i:s',
        ],
      ]);

    return $fields;
  }

}
