<?php

/**
 * podium actions.
 *
 * @package    esmya
 * @subpackage podium
 * @author     Duncan Watson duncan@duncanwatson.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class podiumActions extends myActions
{

    public function executeChatJson(sfWebRequest $request)
    {
        $chats = Doctrine_Core::getTable('Chat')
            ->createQuery('a')
            ->execute();

        sfConfig::set('sf_web_debug', false);

        $this->getResponse()->setHttpHeader('Content-type', 'application/json');

        $arr = array();
        foreach ($chats as $key=>$message) {
            $arr[] = array('userName' => $message->SalesPerson->getName(), 'message' => $message->getMessage());
        }
        $messages = array('messages' => $arr);
        return $this->renderText(json_encode($messages));


    }


    public function executeChatPost(sfWebRequest $request)
    {


        $message= new Chat();
        $message->setMessage($request->getParameter('message'));
        $message->setSalesPerson($this->selected_user);
        $message->setChatRoom($request->getParameter('chatroom'));
        $message->setTimeEntered(date( 'Y-m-d H:i:s'));
        $message->save();

        sfConfig::set('sf_web_debug', false);

        $this->getResponse()->setHttpHeader('Content-type', 'application/json');

        return $this->renderText('
        {
            "messages":{
                "userName": "'.$message->getSalesPerson()->getName().'",
                "message": "'.$message->getMessage().'",
                "timeEntered": "'.$message->getTimeEntered().'"

                }
        }
        ');

    }



  public function executeIndex(sfWebRequest $request)
  {
    $chats = Doctrine_Core::getTable('Chat')
      ->createQuery('a')
      ->execute();

  }

  public function executeShow(sfWebRequest $request)
  {
    $this->chat = Doctrine_Core::getTable('Chat')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->chat);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ChatForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ChatForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($chat = Doctrine_Core::getTable('Chat')->find(array($request->getParameter('id'))), sprintf('Object chat does not exist (%s).', $request->getParameter('id')));
    $this->form = new ChatForm($chat);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($chat = Doctrine_Core::getTable('Chat')->find(array($request->getParameter('id'))), sprintf('Object chat does not exist (%s).', $request->getParameter('id')));
    $this->form = new ChatForm($chat);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($chat = Doctrine_Core::getTable('Chat')->find(array($request->getParameter('id'))), sprintf('Object chat does not exist (%s).', $request->getParameter('id')));
    $chat->delete();

    $this->redirect('podium/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $chat = $form->save();

      $this->redirect('podium/edit?id='.$chat->getId());
    }
  }
}
