<link href="/css/style.css" rel="stylesheet">


<?php include_partial('present/header'); ?>

<!-- year -->
<div class="container">

    <ul id="country_menu" class="list-inline">

    </ul>
</div>
<div class="container">


<h2 id="country_name"></h2>
<?php // var_dump($stats); ?>

<div id=sales_dashboard class=sales_d_week>
    <!-- here will be the template -->
</div>

<div id="test_chart" style="height:200px;"></div>

    <?php include_partial('present/menu_month_by_id'); ?>


<script id="monthlyStats" type="text/template">

    <h1>{{monthName}} {{yearName}}</h1>

    <p/>        total actual sales
    <p/>            {{actualSales}}


    <p/>Difference
    <p/>{{actualSales - targetTotal}}

    <p/>total sales target
    <p/>     {{targetTotal}}


    <p/>total sales objective completed
    <p/>{{ percentageEnd }}%
</script>

<script src="js/jquery-1.10.2.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="js/mustache.js"></script>
<script src="js/stats_regional.module.js"></script>