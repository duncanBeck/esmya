<?php
class myActions extends sfActions
{
    // $this->getUser()->getAttribute('selected_user')
    public function preExecute() {
        /*
         * users login
         * set the selected_user to the sfguarduser
         * what about the admin?
         *
         */

        if ($this->request->getParameter('sale_id')!=null) {
            $this->getUser()->setAttribute('selected_user', $this->request->getParameter('sale_id') );
            $this->selected_user  = Doctrine::getTable('SalesPerson')->findOneById($this->getUser()->getAttribute('selected_user'));
        } else {
            $this->getUser()->setAttribute('selected_user',
            $this->getUser()->getGuardUser()->getSalesPerson()->getId() );
            $this->selected_user  = Doctrine::getTable('SalesPerson')->findOneById($this->getUser()->getAttribute('selected_user'));
        }

    }

}