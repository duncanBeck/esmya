<?php

/**
 * DayTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class DayTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object DayTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Day');
    }



    public function allMyDays ($user_id) {

        $q = Doctrine_Query::create()
            ->select('*')
            ->from('Day d')
            ->where ('d.sales_person_id = ?', $user_id)
        ->execute();

        return $q;
    }

    public function myTotalSales ($user_id) {

        $q = Doctrine_Query::create()
            ->select('SUM(actual_sales) as total')
            ->from('Day d')
            ->where ('d.sales_person_id = ?', $user_id)
            ->execute();

        return $q;
    }

    public function monthlyTotalsForRegions ($date) {

        // change the first group  by to s.name if you want to see the individuals

        settype($s_date, "string");
        settype($f_date, "string");

        $s_date = "2013-".$date."-01";
        $f_date = "2013-".$date."-31";
// echo ($s_date);

        $q = Doctrine_Query::create()
            ->select(' YEAR(d.sales_date ) AS Year, MONTH(d.sales_date ) AS Month, SUM(d.actual_sales ) AS units_sold,r.name AS my_name,r.country_id as c_id, d.id,s.id,r.id')
            ->from('Day d')
            ->innerJoin('d.SalesPerson s')
            ->innerJoin('s.Region r')
            ->where('d.sales_date > "'.$s_date.'"')
            ->andWhere('d.sales_date < "'.$f_date.'" ')
            ->addgroupBy('r.name')
            ->addGroupBy('YEAR (sales_date)')
            ->addgroupBy('MONTH (sales_date)')
            ->orderBy('units_sold DESC');

            ;
 // echo $q->getSqlQuery();

        return $q->execute();
    }



}
/*
 * I was looking around for this, so when I found it I thought I would post it here. One of those simple things that you dont always remember how to do.

For when you need to select a date grouping by Month and Year and get a sum of a value for that month.

SELECT YEAR( sales_date ) AS 'Year', MONTH( sales_date ) AS 'Month', SUM( actual_sales ) AS "Units sold"
FROM DAY
GROUP BY YEAR( sales_date ) , MONTH( sales_date )
ORDER BY YEAR( sales_date ) , MONTH( sales_date )



 */