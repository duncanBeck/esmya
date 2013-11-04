<?php

/**
 * Chat filter form base class.
 *
 * @package    esmya
 * @subpackage filter
 * @author     Duncan Watson duncan@duncanwatson.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseChatFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sales_person_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SalesPerson'), 'add_empty' => true)),
      'chat_month'      => new sfWidgetFormFilterInput(),
      'chat_podium'     => new sfWidgetFormFilterInput(),
      'time_entered'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'message'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'sales_person_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SalesPerson'), 'column' => 'id')),
      'chat_month'      => new sfValidatorPass(array('required' => false)),
      'chat_podium'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'time_entered'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'message'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('chat_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Chat';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'sales_person_id' => 'ForeignKey',
      'chat_month'      => 'Text',
      'chat_podium'     => 'Number',
      'time_entered'    => 'Date',
      'message'         => 'Text',
    );
  }
}
