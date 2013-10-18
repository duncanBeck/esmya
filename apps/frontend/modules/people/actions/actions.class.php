<?php

/**
 * people actions.
 *
 * @package    esmya
 * @subpackage people
 * @author     Duncan Watson duncan@duncanwatson.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class peopleActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->sales_persons = Doctrine_Core::getTable('SalesPerson')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->sales_person = Doctrine_Core::getTable('SalesPerson')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->sales_person);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new SalesPersonForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SalesPersonForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($sales_person = Doctrine_Core::getTable('SalesPerson')->find(array($request->getParameter('id'))), sprintf('Object sales_person does not exist (%s).', $request->getParameter('id')));
    $this->form = new SalesPersonForm($sales_person);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($sales_person = Doctrine_Core::getTable('SalesPerson')->find(array($request->getParameter('id'))), sprintf('Object sales_person does not exist (%s).', $request->getParameter('id')));
    $this->form = new SalesPersonForm($sales_person);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($sales_person = Doctrine_Core::getTable('SalesPerson')->find(array($request->getParameter('id'))), sprintf('Object sales_person does not exist (%s).', $request->getParameter('id')));
    $sales_person->delete();

    $this->redirect('people/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $sales_person = $form->save();

      $this->redirect('people/edit?id='.$sales_person->getId());
    }
  }
}
