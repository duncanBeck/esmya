<?php include_partial('present/header'); ?>

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

                <div  class="col-lg-2 pie_text"><h2 class="country_name"></h2> </div>

                <div class="col-lg-10" style="position:relative">
                    <div  style="position:absolute; left:5px; z-index:0">
                        <canvas id="canvas_1" width="1280" height="10" ></canvas>
                    </div>
                    <div style="position:absolute; top:-18px; left:354px; font-size:28px; z-index:2"><img class="car_size_stats"></div>
                </div>
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
<!--

    <h1> Difference</h1>
    <h2> {{actualSales - targetTotal}} </h2>
    -->


<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/highcharts.js"></script>
<script src="js/mustache.js"></script>
<script src="js/stats_regional.module.js"></script>

<script src="js/leader_regional.module.js"></script>

    <script>
        var url = window.location;

        $(document).ready(function(){
          //  drawLine();
            loadStats();
            setTemplate(1);
        });

    </script>
