<?php

class myUser extends sfGuardSecurityUser
{
  public function signOut(){
      parent::signOut();

      $this->setAttribute('selected_user', '' );
      $this->forward('present/race');
  }



}
