<?php

/**
 * SalesPerson form.
 *
 * @package    esmya
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SalesPersonForm extends BaseSalesPersonForm
{
  public function configure()
  {

      $this->useFields(array('name','region_id','is_active','is_admin'));
//     $this->widgetSchema['user_id'] = new  sfWidgetFormInputHidden();

  }
}
