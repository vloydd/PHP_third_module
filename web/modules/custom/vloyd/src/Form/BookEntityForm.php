<?php

namespace Drupal\vloyd\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Ajax\RedirectCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Url;
use Drupal\file\Entity\File;
/**
 * Our Enity Class.
 */
class BookEntityForm extends ContentEntityForm {

  /**
   * Func for Building Our Form.
   *
   * @param array $form
   *   Hello.
   *   Hello.
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {
    $form = parent::buildForm($form, $form_state);
    $form['#prefix'] = '<div id="form_wrapper"';
    $form['#suffix'] = '</div>';
    $form['actions']['submit']['#ajax'] = [
      'callback' => '::setMessage',
      'wrapper' => 'form_wrapper',
      'effect' => 'fade',
      'progress' => [
        'type' => 'fading_circle',
      ],
    ];
    $form['name']['widget'][0]['value']['#ajax'] = [
      'disable-refocus' => TRUE,
      'event' => 'change',
      'progress' => [
        'type' => 'none',
      ],
    ];

    $form['email']['widget'][0]['value']['#ajax'] = [
      'disable-refocus' => TRUE,
      'event' => 'change',
      'progress' => [
        'type' => 'throbber',
      ],
    ];

    $form['phone']['widget'][0]['value']['#ajax'] = [
      'disable-refocus' => TRUE,
      'event' => 'change',
      'progress' => [
        'type' => 'throbber',
      ],
    ];
    return $form;
  }

  /**
   * HEllo.
   * @param array $form
   *
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *
   * @return void
   */
  public function submitForm(array &$form, FormStateInterface $form_state):void {
    parent::submitForm($form, $form_state);
  }

  /**
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *
   * @return array|\Drupal\Core\Ajax\AjaxResponse
   */
  public function setMessage(array &$form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    if (!$form_state->hasAnyErrors()) {
      $url = Url::fromRoute('vloyd.main-page');
      $command = new RedirectCommand($url->toString());
      $response->addCommand($command);
      return $response;
    }
    return $form;
  }

}
