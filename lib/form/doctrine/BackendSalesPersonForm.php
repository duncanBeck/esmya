<?php

/**
 * SalesPerson form.
 *
 * @package    esmya
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BackendSalesPersonForm extends BaseSalesPersonForm
{
    public function configure()
    {
        parent::configure();


        $user = new sfGuardUser();
        $user->setSalesPerson($this->getObject());
        $form = new BackendSfGuardUserForm($user);

        $this->embedForm('loginUser', $form);
    }

}
