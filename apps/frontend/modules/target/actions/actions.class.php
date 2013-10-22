<?php

/**
 * target actions.
 *
 * @package    esmya
 * @subpackage target
 * @author     Duncan Watson duncan@duncanwatson.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class targetActions extends myActions
{


  public function executeIndex(sfWebRequest $request)
  {
      if ($request->getParameter('sale_id')!=null)
          $this->getUser()->setAttribute('selected_user', $request->getParameter('sale_id') );

      $this->targets  = Doctrine::getTable('Target')->allMyTargets($this->getUser()->getAttribute('selected_user'));

  }

  public function executeShow(sfWebRequest $request)
  {
    $this->target = Doctrine_Core::getTable('Target')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->target);
  }

  public function executeNew(sfWebRequest $request)
  {

      $target = new Target();
      $target->setSalesPersonId($this->getUser()->getAttribute('selected_user'));
    $this->form = new TargetForm($target);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TargetForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($target = Doctrine_Core::getTable('Target')->find(array($request->getParameter('id'))), sprintf('Object target does not exist (%s).', $request->getParameter('id')));
    $this->form = new TargetForm($target);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($target = Doctrine_Core::getTable('Target')->find(array($request->getParameter('id'))), sprintf('Object target does not exist (%s).', $request->getParameter('id')));
    $this->form = new TargetForm($target);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($target = Doctrine_Core::getTable('Target')->find(array($request->getParameter('id'))), sprintf('Object target does not exist (%s).', $request->getParameter('id')));
    $target->delete();

    $this->redirect('target/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $target = $form->save();

      $this->redirect('target/edit?id='.$target->getId());
    }
  }
}
