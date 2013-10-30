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
        $this->month = date("F", mktime(0, 0, 0, $request->getParameter('month_id'), 10));


        $this->sales  = Doctrine::getTable('SalesPerson')->totalSalesUpToTheWeekForOneSalePerson  (date("Y-m-d H:i:s"), $this->selected_user->getId() , '2013')->getFirst();
        $this->target  = Doctrine::getTable('SalesPerson')->totalTargetUpToTheWeekForOneSalePerson  (date("Y-m-d H:i:s"), $this->selected_user->getId() , '2013')->getFirst();
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


    public function executeChartData(sfWebRequest $request)
    {


        sfConfig::set('sf_web_debug', false);

        $this->getResponse()->setHttpHeader('Content-type', 'application/json');

        return $this->renderText('
        [
[1,86],
[2,14]
]
        ');

    }


    public function executeMonthlyRegionalStats (sfWebRequest $request) {

    }


    public function executeMonthlyRegionalStatsData (sfWebRequest $request) {
$countriesJSON =array();
    $countries = Doctrine::getTable('Region')->createQuery('a')->orderBy('name')->execute();

        foreach($countries as $country){


                $salesByMonth =  Doctrine::getTable('Region')->monthlySalesPerRegionForAYear('2013', $country->getId());
                $targetByMonth =  Doctrine::getTable('Region')->monthlyTargetsPerRegionForAYear('2013', $country->getId());

  //          print_r($salesByMonth);
    //        print_r($targetByMonth);

//            die;
        //        var_dump($salesByMonth);
        //        var_dump($targetByMonth);

        //        print_r($salesByMonth[0]['SalePeople'][0]['Days']);

        //        print_r($targetByMonth[0]['SalePeople'][0]['Targets']);

                $month = statsHelper::createSalesTargetsJSON($salesByMonth,$targetByMonth);

            $countriesJSON[] = array(
                    "name" => "$country",
                    "year" => 2013,
                    "months"=> $month
            );
        } // end for each


        sfConfig::set('sf_web_debug', false);

        $this->getResponse()->setHttpHeader('Content-type', 'application/json');

        $countriesJSON = array('countries' => $countriesJSON);
        return $this->renderText(json_encode($countriesJSON));

                return $this->renderText('
     {
    "countries": [
        {
            "name": "uk",
            "year": 2013,
            "months": [
                {
                    "monthName": "January",
                    "yearName": 2013,
                    "actualSales": 141,
                    "targetTotal": 120,
                    "percentageEnd": 87
                },
                {
                    "monthName": "February",
                    "yearName": "2013",
                    "actualSales": 14,
                    "targetTotal": 150,
                    "percentageEnd": 90
                },
                {
                    "monthName": "March",
                    "yearName": "2013",
                    "actualSales": 91,
                    "targetTotal": 170,
                    "percentageEnd": 160
                }
            ]
        },
        {
            "name": "Germany",
            "year": 2013,
            "months": [
                {
                    "monthName": "January",
                    "yearName": 2013,
                    "actualSales": 141,
                    "targetTotal": 120,
                    "percentageEnd": 87
                },
            ]
        }
    ]
}
                ');



            }


            public function executeMonthlyIndividualStats(sfWebRequest $request)
            {

                // monthly stats by year for one salesperson.

                $salesByMonth =  Doctrine::getTable('Day')->monthlySalesForOneSalespersonForAYear('2013', $this->selected_user->getId());


                $targetByMonth =  Doctrine::getTable('Day')->monthlyTargetsForOneSalespersonForAYear('2013', $this->selected_user->getId());

                $month = statsHelper::createSalesTargetsJSON($salesByMonth,$targetByMonth);

                sfConfig::set('sf_web_debug', false);

                $this->getResponse()->setHttpHeader('Content-type', 'application/json');

        return $this->renderText(json_encode($month));

        /*

                return $this->renderText('
        [
                    {
                        "monthName": "January",
                        "yearName": 2013,
                        "actualSales": 141,
                        "targetTotal": 120,
                        "percentageEnd" : 87
                    },
                    {
                        "monthName": "February",
                        "yearName": "2013",
                        "actualSales": 14,
                        "targetTotal": 150,
                        "percentageEnd" : 90
                    },

                    {
                        "monthName": "March",
                        "yearName": "2013",
                        "actualSales": 91,
                        "targetTotal": 170,
                        "percentageEnd" : 160
                    }
                    ]



                ');
        */
    }




}
