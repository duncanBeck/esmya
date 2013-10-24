<?php
class myActions extends sfActions
{
    // $this->getUser()->getAttribute('selected_user')
    public function preExecute() {

        // if there is an update to the selected user from the menu
        if ($this->request->getParameter('sale_id')!=null) {
            $this->getUser()->setAttribute('selected_user', $this->request->getParameter('sale_id') );
            $this->selected_user  = Doctrine::getTable('SalesPerson')->findOneById($this->request->getParameter('sale_id'));
        }
        // no update, then is there a cookie already, lets us that
        elseif ($this->getUser()->getAttribute('selected_user')!="") {
            $this->selected_user  = Doctrine::getTable('SalesPerson')->findOneById($this->getUser()->getAttribute('selected_user'));
        }
        else {
            // no update and no cookie, ok it's just a regular user - so lets set the cookie and the user object
            $this->selected_user  = Doctrine::getTable('SalesPerson')->findOneById($this->getUser()->getGuardUser()->getSalesPerson()->getId());
            $this->getUser()->setAttribute('selected_user', $this->getUser()->getGuardUser()->getSalesPerson()->getId() );

        }
       //  $this->getUser()->setAttribute('selected_user',
          //  $this->getUser()->getGuardUser()->getSalesPerson()->getId() );



    }

}