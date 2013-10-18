<?php

/**
 * Day form.
 *
 * @package    esmya
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DayForm extends BaseDayForm
{
  public function configure() {

      $this->useFields(array('sales_date','actual_sales','sales_person_id'));

      $this->widgetSchema['sales_person_id'] = new  sfWidgetFormInputHidden();
  }

}
