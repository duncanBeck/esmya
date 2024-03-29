<?php

/**
 * RegionTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class RegionTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object RegionTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Region');
    }


    public function monthlySalesPerRegionForAYear ($year, $region_id) {



        // change the first group  by to s.name if you want to see the individuals

        settype($s_date, "string");
        settype($f_date, "string");

        $s_date = $year."-01-01";
        $f_date = ($year<date('Y'))? $year.'12-31 23:59:59' : date('Y-m-d');

        $q = Doctrine_Query::create()
            ->select('MONTH(d.sales_date ) AS Month, SUM(d.actual_sales ) AS units_sold,r.id as region_id,s.id, d.id')
            ->from('Region r')
            ->innerJoin('r.SalePeople s')
            ->leftJoin('s.Days d')
            ->where ('r.id = ?', $region_id)
            ->andWhere('d.sales_date >= "'.$s_date.'"')
            ->andWhere('d.sales_date <= "'.$f_date.'" ')
            ->groupBy('MONTH (sales_date)')
            ->orderBy('Month ASC');
        ;


        $query ="SELECT r.id AS r__id, s.id AS s__id, d.id AS d__id, MONTH(d.sales_date) AS month, SUM(d.actual_sales) AS units_sold, r.id AS r__2 FROM region r INNER JOIN sales_person s ON r.id = s.region_id LEFT JOIN day d ON s.id = d.sales_person_id WHERE (r.id = ".$region_id." AND d.sales_date >= '".$s_date."' AND d.sales_date <= '".$f_date."') GROUP BY MONTH (sales_date) ORDER BY month ASC";


        $p = Doctrine_Manager::getInstance()->getCurrentConnection();
        $result = $p->execute($query);

        return $result->fetchAll();
    }

    public function monthlyTargetsPerRegionForAYear ($year, $region_id) {
        settype($s_date, "string");
        settype($f_date, "string");

        $s_date = $year."-01-01";
        $f_date = ($year<date('Y'))? $year.'12-31 23:59:59' : date('Y-m-d');

        $q = Doctrine_Query::create()
            ->select('MONTH(t.time_period ) AS Month, SUM(t.sales_target) as target, r.id as region_id, t.id,s.id')
            ->from('Region r')
            ->innerJoin('r.SalePeople s')
            ->leftJoin('s.Targets t')
            ->where ('r.id = ?', $region_id)
            ->andWhere('t.time_period >= "'.$s_date.'"')
            ->andWhere('t.time_period <= "'.$f_date.'" ')
            ->groupBy('MONTH (time_period)')
            ->orderBy('Month ASC');
        ;



  $query="SELECT r.id AS r__id, s.id AS s__id, t.id AS t__id, MONTH(t.time_period) AS month, SUM(t.sales_target) AS target, r.id AS r__2 FROM region r INNER JOIN sales_person s ON r.id = s.region_id LEFT JOIN target t ON s.id = t.sales_person_id WHERE (r.id =".$region_id." AND t.time_period >= '".$s_date."' AND t.time_period <= '".$f_date."') GROUP BY MONTH (time_period) ORDER BY month ASC";

        $p = Doctrine_Manager::getInstance()->getCurrentConnection();
        $result = $p->execute($query);

        return $result->fetchAll();
    }



}