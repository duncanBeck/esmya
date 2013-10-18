<?php

/**
 * Day filter form base class.
 *
 * @package    esmya
 * @subpackage filter
 * @author     Duncan Watson duncan@duncanwatson.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDayFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sales_date'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'actual_sales'    => new sfWidgetFormFilterInput(),
      'sales_person_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SalesPerson'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'sales_date'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'actual_sales'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sales_person_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SalesPerson'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('day_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Day';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'sales_date'      => 'Date',
      'actual_sales'    => 'Number',
      'sales_person_id' => 'ForeignKey',
    );
  }
}
