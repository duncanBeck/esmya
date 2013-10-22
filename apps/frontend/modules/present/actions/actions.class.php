<?php

/**
 * people actions.
 *
 * @package    esmya
 * @subpackage people
 * @author     Duncan Watson duncan@duncanwatson.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class presentActions extends myActions
{


    public function executeStats(sfWebRequest $request)
    {
 //       $this->totals  = Doctrine::getTable('Day')->monthlyTotalsForThisMonth($request->getParameter('month'));

    }


  public function executeRace(sfWebRequest $request)
  {
      sfConfig::set('sf_web_debug', false);
      if ($request->getParameter('month_code')!=null) {
          $this->getUser()->setAttribute('selected_month', $request->getParameter('month_code') );
          $this->getUser()->setAttribute('selected_month_id', $request->getParameter('month_id') );

      } else {
          $this->getUser()->setAttribute('selected_month', 'jan' );
          $this->getUser()->setAttribute('selected_month_id', '1' );


      }
  }

    public function executeRaceJSON(sfWebRequest $request)
    {
        $totals  = Doctrine::getTable('Day')->monthlyTotalsForRegions($this->getUser()->getAttribute('selected_month_id'));

        sfConfig::set('sf_web_debug', false);

        $this->getResponse()->setHttpHeader('Content-type', 'application/json');

        $arr = array();
        foreach ($totals as $key=>$total) {
            $arr[] = array('country_id' => $total->c_id, 'country' => $total->my_name, 'sales' => $total->units_sold, 'start_position' => $key+3, 'finish_position' => $key+1);
        }

        return $this->renderText('
        {
        "month":"'.$this->getUser()->getAttribute('selected_month').'",
        "year":"13",
        "last_month":"aug",
        "data":
          '.json_encode($arr).'
        }
        ');

    }

}
