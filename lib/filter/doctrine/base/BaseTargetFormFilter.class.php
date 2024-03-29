<?php

/**
 * Target filter form base class.
 *
 * @package    esmya
 * @subpackage filter
 * @author     Duncan Watson duncan@duncanwatson.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTargetFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sales_target'    => new sfWidgetFormFilterInput(),
      'time_period'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'sales_person_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SalesPerson'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'sales_target'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'time_period'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'sales_person_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SalesPerson'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('target_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Target';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'sales_target'    => 'Number',
      'time_period'     => 'Date',
      'sales_person_id' => 'ForeignKey',
    );
  }
}
