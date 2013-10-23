<?php include_partial('present/header'); ?>


<h1><?php echo $selected_user; ?>'s </h1>
<?php // var_dump($stats); ?>

<div id=sales_dashboard class=sales_d_week>
    <p/>     Week 2/ total week

    <p/>        total actual sales
    <p/>            <?php echo $sales->getTotalsales(); ?>


    <p/>Difference
    <p/><?php echo $sales->getTotalsales()-$target->getTotaltarget(); ?>

    <p/>total sales target
    <p/>     <?php echo $target->getTotaltarget(); ?>


    <p/>total sales objective completed
    <p/><?php echo ($sales->getTotalsales()/$target->getTotaltarget())*100; ?>%


</div>

<!-- podium -->
<div id="podiums" class="">
    <div class="container">
        <h1>Podium Positions</h1>
        <h3>Race 4 Positions</h3>
        <h3>May 15 2013</h3>
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


<script src="js/jquery-1.10.2.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="js/podium_charts.js"></script>
