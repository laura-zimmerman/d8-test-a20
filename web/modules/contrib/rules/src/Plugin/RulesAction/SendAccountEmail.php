<?php

namespace Drupal\rules\Plugin\RulesAction;

use Drupal\rules\Core\RulesActionBase;
use Drupal\user\UserInterface;

/**
 * Provides a 'Send account email' action.
 *
 * @RulesAction(
 *   id = "rules_send_account_email",
 *   label = @Translation("Send account email"),
 *   category = @Translation("User"),
 *   context = {
 *     "user" = @ContextDefinition("entity:user",
 *       label = @Translation("User"),
 *       description = @Translation("The user to whom we send the email.")
 *     ),
 *     "email_type" = @ContextDefinition("string",
 *       label = @Translation("Email type"),
 *       description = @Translation("The type of the email to send.")
 *     ),
 *   }
 * )
 *
 * @todo Add access callback information from Drupal 7.
 */
class SendAccountEmail extends RulesActionBase {

  /**
   * Send account email.
   *
   * @param \Drupal\user\UserInterface $user
   *   User who should receive the notification.
   * @param string $email_type
   *   Type of email to be sent.
   */
  protected function doExecute(UserInterface $user, $email_type) {
    _user_mail_notify($email_type, $user);
  }

}
