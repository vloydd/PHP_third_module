<?php

namespace Drupal\book\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;
use Drupal\file\Entity\File;

/**
 * Controller Class for Our Book Guets List and Form and Much More.
 */
class BookPage extends ControllerBase {

/**
   * This Func Shows Our Content.
   *
   * @return array
   *   returns Our Book Theme.
   */
  public function content(): array {
    return [
      '#theme' => 'book-theme',
    ];
  }
}
