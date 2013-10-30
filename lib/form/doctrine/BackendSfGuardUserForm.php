<?php

/**
 * sfGuardUser form.
 *
 * @package    esmya
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BackendSfGuardUserForm extends PluginsfGuardUserForm
{
    public function configure()
    {
        parent::configure();
        $this->useFields(array('email_address','username','password','is_super_admin'));

        $user = new SalesPerson();
        $user->User = $this->getObject();
        $form = new SalesPersonForm($user);

        $this->embedForm('SalesPerson', $form );

        $this->embedRelation('SalesPerson');

//        $this->widgetSchema['sales_person_id'] = new  sfWidgetFormInputHidden();
    }
}
