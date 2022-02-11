<?php

namespace Drupal\vloyd\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Our Class to Perform Content.
 */
class BookPage extends ControllerBase {

  /**
   * Variable for Calling Entity Manager.
   */
  protected $entityManager;

  /**
   * Variable for Getting Entity Form.
   */
  protected $formBuilder;

  /**
   * Variable to Work with Pager.
   */
  protected $pagerManager;

  /**
   * Func for Use Dependency Injection.
   */
  public static function create(ContainerInterface $containerInterface): BookPage {
    $instance = parent::create($containerInterface);
    $instance->entityManager = $containerInterface->get('entity_type.manager');
    $instance->formBuilder = $containerInterface->get('entity.form_builder');
    $instance->pagerManager = $containerInterface->get('pager.manager');
    return $instance;
  }

  /**
   * Func for Building Our Content.
   */
  public function content(): array {

    // Form.
    $entity = $this->entityManager
      ->getStorage('book')
      ->create();

    // Reviews and Pagination.
    $form = $this->formBuilder->getForm($entity, 'default');
    $storage_usage = $this->entityManager->getStorage('book');
    $query = $storage_usage->getQuery()->sort('id', "DESC")->pager(5)->execute();
    $review = $storage_usage->loadMultiple($query);
    $view_mode = $this->entityManager->getViewBuilder('book');
    $render_items = $view_mode->viewMultiple($review);

    return [
      '#theme' => 'vloyd-theme',
      '#form' => $form,
      '#pager' => [
        '#type' => 'pager',
      ],
      '#book_reviews' => $render_items,
    ];
  }

}
