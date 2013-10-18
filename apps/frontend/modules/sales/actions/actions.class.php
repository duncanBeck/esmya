<?php

/**
 * sales actions.
 *
 * @package    esmya
 * @subpackage sales
 * @author     Duncan Watson duncan@duncanwatson.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class salesActions extends sfActions
{
    // $this->getUser()->getAttribute('selected_user')

  public function executeIndex(sfWebRequest $request)
  {

    if ($request->getParameter('sale_id')!=null)
        $this->getUser()->setAttribute('selected_user', $request->getParameter('sale_id') );

        $this->days  = Doctrine::getTable('Day')->allMyDays($this->getUser()->getAttribute('selected_user'));


  }

  public function executeShow(sfWebRequest $request)
  {
    $this->day = Doctrine_Core::getTable('Day')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->day);
  }

  public function executeNew(sfWebRequest $request)
  {
    $day = new Day();
    $day->setSalesPersonId($this->getUser()->getAttribute('selected_user'));
    $this->form = new DayForm($day);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new DayForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($day = Doctrine_Core::getTable('Day')->find(array($request->getParameter('id'))), sprintf('Object day does not exist (%s).', $request->getParameter('id')));
    $this->form = new DayForm($day);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($day = Doctrine_Core::getTable('Day')->find(array($request->getParameter('id'))), sprintf('Object day does not exist (%s).', $request->getParameter('id')));
    $this->form = new DayForm($day);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($day = Doctrine_Core::getTable('Day')->find(array($request->getParameter('id'))), sprintf('Object day does not exist (%s).', $request->getParameter('id')));
    $day->delete();

    $this->redirect('sales/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $day = $form->save();

      $this->redirect('sales/edit?id='.$day->getId());
    }
  }
}
