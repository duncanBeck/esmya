<?php

/**
 * Chat form.
 *
 * @package    esmya
 * @subpackage form
 * @author     Duncan Watson duncan@duncanwatson.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ChatForm extends BaseChatForm
{
    var $user_id;

  public function configure()
  {
      $this->useFields(array('message'));

  }
}
