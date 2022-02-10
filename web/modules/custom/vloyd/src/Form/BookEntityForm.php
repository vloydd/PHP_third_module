<?php

namespace Drupal\vloyd\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\RedirectCommand;
use Drupal\Core\Url;

/**
 * Our Book Entity Class for Setting and Adding Form And Shows Results.
 */
class BookEntityForm extends ContentEntityForm {

  /**
   * Func for Building Our Form and Connecting Ajax Into it.
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
        'type' => 'throbber',
      ],
    ];
    return $form;
  }

  /**
   * Func to Set how Ajax Should Work After Pushing Submit.
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
