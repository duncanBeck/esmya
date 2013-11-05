<?php include_partial('present/header'); ?>

<!-- pie -->
<div id="pie" class="dark">
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h1>Sales Dashboard 2013</h1>
            <div class="container">
                <ul id="country_menu" class="list-inline">
                </ul>
            </div>

        <div class="year_selection outset">
            <div class="inset">
                <div class="container">
                    <div class="col-md-1">&#9664; &nbsp; 2012</div>
                    <div class="col-md-3 col-md-offset-4 active">2013 | Total Sales Objectives</div>
                    <div class="col-md-1 col-md-offset-3">2014 &nbsp; &#9654;</div>
                </div>
            </div>
        </div>

        <div class="pie_text text-center">
            <h1 id="country_name"></h1>
            <div id=sales_dashboard>
                <!-- here will be the template -->
            </div>
        </div>

    </div>
</div>
    </div>

<!-- year -->
<br>
    <br>
<div class="container">


<?php // var_dump($stats); ?>



<div id="test_chart" style="height:200px;"></div>

    <?php include_partial('present/menu_month_by_id'); ?>
</div>

<script id="monthlyStats" type="text/template">

    <h1>{{monthName}} {{yearName}}</h1>

    <h1>        total actual sales</h1>
    <h2>            {{actualSales}}</h2>



    <h1> total sales target </h1>
    <h2>      {{targetTotal}}</h2>


    <h1>total sales objective completed</h1>
    <h2>{{ percentageEnd }}%</h2>
</script>
<!--

    <h1> Difference</h1>
    <h2> {{actualSales - targetTotal}} </h2>
    -->


<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/highcharts.js"></script>
<script src="js/mustache.js"></script>
<script src="js/stats_regional.module.js"></script>


