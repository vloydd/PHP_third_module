<?php

namespace Drupal\vloyd\Form;

use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\Entity\ContentEntityConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Our Entity Delete Class.
 */
class BookEntityDelete extends ContentEntityConfirmFormBase {

  /**
   * Func to Set Description.
   *
   * @return \Drupal\Core\StringTranslation\TranslatableMarkup
   *   It's Translatable Comment.
   */
  public function getQuestion():TranslatableMarkup {
    return $this->t('Do You Really Wanna Delete this Review?');
  }

  /**
   * Func to Set Description.
   */
  public function getDescription():TranslatableMarkup {
    return $this->t("Please, Note That You Can't Cancel This Action.");
  }

  /**
   * Cancelling Button Text.
   */
  public function getCancelText():TranslatableMarkup {
    return $this->t("No Please");
  }

  /**
   * Confirming Button Text.
   */
  public function getConfirmText():TranslatableMarkup {
    return $this->t("Sure");
  }

  /**
   * Func to Set Redirect After Cancelling.
   */
  public function getCancelUrl():Url {
    return new Url('vloyd.main-page');
  }

  /**
   * Func to Delete a Review, Redirect After.
   *
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  public function submitForm(array &$form, FormStateInterface $form_state):void {
    $this->entity->delete();
    $form_state->setRedirect('vloyd.main-page');
  }

}
