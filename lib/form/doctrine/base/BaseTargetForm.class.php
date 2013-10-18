<?php

/**
 * Target form base class.
 *
 * @method Target getObject() Returns the current form's model object
 *
 * @package    esmya
 * @subpackage form
 * @author     Duncan Watson duncan@duncanwatson.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTargetForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'sales_target'    => new sfWidgetFormInputText(),
      'time_period'     => new sfWidgetFormDate(),
      'sales_person_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SalesPerson'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'sales_target'    => new sfValidatorInteger(array('required' => false)),
      'time_period'     => new sfValidatorDate(array('required' => false)),
      'sales_person_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SalesPerson'))),
    ));

    $this->widgetSchema->setNameFormat('target[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Target';
  }

}
