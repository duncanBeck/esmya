<?php

/**
 * BaseChat
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $sales_person_id
 * @property integer $chat_room
 * @property date $time_entered
 * @property string $message
 * @property SalesPerson $SalesPerson
 * 
 * @method integer     getSalesPersonId()   Returns the current record's "sales_person_id" value
 * @method integer     getChatRoom()        Returns the current record's "chat_room" value
 * @method date        getTimeEntered()     Returns the current record's "time_entered" value
 * @method string      getMessage()         Returns the current record's "message" value
 * @method SalesPerson getSalesPerson()     Returns the current record's "SalesPerson" value
 * @method Chat        setSalesPersonId()   Sets the current record's "sales_person_id" value
 * @method Chat        setChatRoom()        Sets the current record's "chat_room" value
 * @method Chat        setTimeEntered()     Sets the current record's "time_entered" value
 * @method Chat        setMessage()         Sets the current record's "message" value
 * @method Chat        setSalesPerson()     Sets the current record's "SalesPerson" value
 * 
 * @package    esmya
 * @subpackage model
 * @author     Duncan Watson duncan@duncanwatson.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseChat extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('chat');
        $this->hasColumn('sales_person_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('chat_room', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('time_entered', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('message', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('SalesPerson', array(
             'local' => 'sales_person_id',
             'foreign' => 'id'));
    }
}