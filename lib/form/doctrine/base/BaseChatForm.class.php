<?php

/**
 * Chat form base class.
 *
 * @method Chat getObject() Returns the current form's model object
 *
 * @package    esmya
 * @subpackage form
 * @author     Duncan Watson duncan@duncanwatson.com
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseChatForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'sales_person_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SalesPerson'), 'add_empty' => false)),
      'chat_room'       => new sfWidgetFormInputText(),
      'time_entered'    => new sfWidgetFormDate(),
      'message'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'sales_person_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SalesPerson'))),
      'chat_room'       => new sfValidatorInteger(array('required' => false)),
      'time_entered'    => new sfValidatorDate(array('required' => false)),
      'message'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('chat[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Chat';
  }

}
