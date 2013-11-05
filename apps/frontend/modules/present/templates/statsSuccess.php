<?php include_partial('present/header'); ?>

<!-- year -->

<!-- pie -->
<div id="pie" class="dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h1>Monthly Dashboard 2013</h1>
                <div class="container">
                    <ul id="country_menu" class="list-inline">
                    </ul>
                </div>

                <div class="row">

                    <div  class="col-lg-2 pie_text"><h2><?php echo $selected_user; ?>'s </h2></div>

                </div>

                <div class="pie_text text-center">
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

    <h2>        total actual sales</h2>
    <h1>            {{actualSales}}</h1>



    <h2> total sales target </h2>
    <h1>      {{targetTotal}}</h1>


    <h2>total sales objective completed</h2>
    <h1>{{ percentageEnd }}%</h1>
</script>

<script src="js/jquery-1.10.2.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="js/mustache.js"></script>
<script src="js/stats.module.js"></script>
