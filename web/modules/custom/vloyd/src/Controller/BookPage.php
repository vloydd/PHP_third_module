<?php

namespace Drupal\vloyd\Controller;

use Drupal\Core\Entity\EntityTypeManager;
use Drupal\Core\Entity\EntityFormBuilder;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Our Class to Perform Content.
 */
class BookPage extends ControllerBase {

  protected $entityManager;
  protected $formBuilder;

  /**
   * Func for Use Dependency Injection.
   */
  public static function create(ContainerInterface $container): BookPage {
    $instance = parent::create($container);
    $instance->entityManager = $container->get('entity_type.manager');
    $instance->formBuilder = $container->get('entity.form_builder');
    return $instance;
  }

  /**
   * Outputting module data.
   */
  public function content(): array {
    $entity = $this->entityManager
      ->getStorage('book')
      ->create();
    $form = $this->formBuilder->getForm($entity, 'default');

    $storage = $this->entityManager->getStorage('book');
    $query = $storage->getQuery()
      ->sort('id', "DESC")
      ->pager(5);
    $pager = [
      '#type' => 'pager',
    ];

    $reviews = $query->execute();

    $review = $storage->loadMultiple($reviews);
    $get_view = $this->entityManager->getViewBuilder('book');
    $render = $get_view->viewMultiple($review);
    return [
      '#theme' => 'vloyd-theme',
      '#form' => $form,
      '#book_reviews' => $render,
      '#pager' => $pager,
    ];
  }

}
