<?php

require_once dirname(__FILE__).'/../lib/sales_peopleGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/sales_peopleGeneratorHelper.class.php';

/**
 * sales_people actions.
 *
 * @package    esmya
 * @subpackage sales_people
 * @author     Duncan Watson duncan@duncanwatson.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sales_peopleActions extends autoSales_peopleActions
{
    public function executeListDactivate(sfWebRequest $request) {
            $person = $this->getRoute()->getObject();
            $person->setIsActive(!$person->getIsActive());
            $person->save();
            $this->getUser()->setFlash('notice', 'User has been (d)activated');
            $this->redirect('sales_person');
    }




}
