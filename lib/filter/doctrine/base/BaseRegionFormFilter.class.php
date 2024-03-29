<?php

/**
 * Region filter form base class.
 *
 * @package    esmya
 * @subpackage filter
 * @author     Duncan Watson duncan@duncanwatson.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRegionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'       => new sfWidgetFormFilterInput(),
      'co_code'    => new sfWidgetFormFilterInput(),
      'country_id' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'       => new sfValidatorPass(array('required' => false)),
      'co_code'    => new sfValidatorPass(array('required' => false)),
      'country_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('region_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Region';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'name'       => 'Text',
      'co_code'    => 'Text',
      'country_id' => 'Number',
    );
  }
}
