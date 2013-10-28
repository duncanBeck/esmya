<?php include_partial('present/header'); ?>

<!-- year -->
<nav id="year">
    <div class="container">
        <ul id="st_month_selection" class="list-inline">
            <li class="col-md-1"><a href=# data-month_id="1">Jan</a></li>
            <li class="col-md-1"><a href=# data-month_id="2">Feb</a></li>
            <li class="col-md-1"><a href=# data-month_id="3">Mar</a></li>
            <li class="col-md-1"><a href=# data-month_id="4">Apr</a></li>
            <li class="col-md-1"><a href=# data-month_id="5">May</a></li>
            <li class="col-md-1"><a href=# data-month_id="6">Jun</a></li>
            <li class="col-md-1"><a href=# data-month_id="7">Jul</a></li>
            <li class="col-md-1"><a href=# data-month_id="8">Aug</a></li>
            <li class="col-md-1"><a href=# data-month_id="9">Sep</a></li>
            <li class="col-md-1"><a href=# data-month_id="10">Oct</a></li>
            <li class="col-md-1"><a href=# data-month_id="11">Nov</a></li>
            <li class="col-md-1"><a href=# data-month_id="12">Dec</a></li>
        </ul>
    </div>
    <div class="container">
        <ul id="year_selection" class="list-inline">
            <li class="col-md-1"><a href="<?php  echo url_for('people') ?>">Back to Dashboard | </a></li>
            <li class="col-md-1">2013</li>
        </ul>
    </div>



</nav>

<h1><?php echo $selected_user; ?>'s </h1>
<?php // var_dump($stats); ?>

<div id=sales_dashboard class=sales_d_week>
    <!-- here will be the template -->
</div>

<div id="test_chart" style="height:200px;"></div>

<!-- podium -->
<div id="podiums" class="">
    <div class="container">
        <h1>Podium Positions</h1>
        <h3><?php echo $month; ?></h3>
        <div class="row">
            <!-- a podium -->
            <div class="col-md-3">
                <table class="podium">
                    <tr>
                        <td class="blue"><h1>Italy</h1></td>
                    </tr>
                    <tr>
                        <td class="grey"><p><b>Congratulations!</b><br>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        </p></td>
                    </tr>
                    <tr>
                        <td class="blue targets">Targets Completed &#9650;</td>
                    </tr>
                    <tr>
                        <td><div class="little_pie_1" style="height: 200px"></div></td>
                    </tr>
                </table>
            </div>

            <!-- a podium -->
            <div class="col-md-3 ">
                <table class="podium">
                    <tr>
                        <td class="blue"><h1>India</h1></td>
                    </tr>
                    <tr>
                        <td class="grey"><p><b>Congratulations!</b><br>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        </p></td>
                    </tr>
                    <tr>
                        <td class="blue targets">Targets Completed &#9650;</td>
                    </tr>
                    <tr>
                        <td><div class="little_pie_2" style="height:200px;"></div></td>
                    </tr>
                </table>
            </div>

            <!-- a podium -->
            <div class="col-md-3 ">
                <table class="podium">
                    <tr>
                        <td class="blue"><h1>Russia</h1></td>
                    </tr>
                    <tr>
                        <td class="grey"><p><b>Congratulations!</b><br>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        </p></td>
                    </tr>
                    <tr>
                        <td class="blue targets">Targets Completed &#9650;</td>
                    </tr>
                </table>
            </div>

            <div class="col-md-3">
                <table class="podium">
                    <tr>
                        <td>
                            <ul>
                                <li>04 - Sweden</li>
                                <li>05 - Nigeria</li>

                            </ul>


                        </td>
                    </tr>
                </table>
            </div>
    </div>
</div>
</div>

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
<script src="js/stats.module.js"></script>
