<?php

class statsHelper {

    public static function createSalesTargetsJSON ($salesByMonth, $targetByMonth) {

        for ($i=0;$i<12;$i++) {
            $month[$i]['monthName'] = date("F", mktime(0, 0, 0, $i+1, 10));
            $month[$i]['monthNumber'] = $i+1;
            $month[$i]['targetTotal'] = 0;
            $month[$i]['actualSales'] = 0;
        }

        foreach($salesByMonth[0]['Days'] as $element) {
            $month[$element['Month']-1]['actualSales'] = (int)$element['units_sold'];

        }

        foreach($targetByMonth[0]['Targets'] as $element) {
            $month[$element['Month']-1]['targetTotal'] = (int)$element['target'];
        }

    //    if (isset($element['target']) && isset($element['units_sold']))
    //        $month[$element['Month']-1]['percentageEnd'] = (int)$element['target']/(int)$element['units_sold']*100;

    return $month;
    }


}