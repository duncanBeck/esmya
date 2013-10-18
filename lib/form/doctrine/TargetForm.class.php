<?php

/**
 * Target form.
 *
 * @package    esmya
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TargetForm extends BaseTargetForm
{
  public function configure()
  {
      $this->useFields(array('time_period','sales_target','sales_person_id'));


      $this->widgetSchema['time_period'] = new sfWidgetFormDate(
          array(
          'format'       => '%year% - %month% - %day%',
          )

      );

      $this->setDefault('time_period', '2013/10/01');
      $this->widgetSchema['sales_person_id'] = new  sfWidgetFormInputHidden();


  }
}
