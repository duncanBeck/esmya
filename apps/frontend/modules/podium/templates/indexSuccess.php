<?php include_partial('present/header',array('class'=>'white')); ?>
<script>
    var monthName = '2013_1';

</script>
<!-- podium -->
<div id="podiums" class="">
    <div class="container">
        <h1>Podium Positions</h1>
        <h3>Race 4 Positions</h3>
        <h3>May 15 2013</h3>
        <div class="row" class="">
            <!-- a podium -->



            <div class="col-md-3">
                <table class="podium">
                    <tr>
                        <td class="blue"><h1>Italy</h1></td>
                    </tr>
                    <tr>
                        <td class="grey ">
                            <div id="podium_1" >
                                <div class="messages">
                                </div>
                                <div class="messageBox">
                                    <input class="inputMessage"  type="text" placeholder="enter message here"  data-podium_id=1>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><div class="chart_1" style="height: 200px"></div></td>
                    </tr>
                </table>
            </div>


            <div class="col-md-3">
                <table class="podium">
                    <tr>
                        <td class="blue"><h1>Italy</h1></td>
                    </tr>
                    <tr>
                        <td class="grey ">
                            <div id="podium_2" >
                                <div class="messages">
                                </div>
                                <div class="messageBox">
                                    <input class="inputMessage"  type="text" placeholder="enter message here"  data-podium_id=2>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><div class="chart_2" style="height: 200px"></div></td>
                    </tr>
                </table>
            </div>


            <div class="col-md-3">
                <table class="podium">
                    <tr>
                        <td class="blue"><h1>Italy</h1></td>
                    </tr>
                    <tr>
                        <td class="grey ">
                            <div id="podium_3" >
                                <div class="messages">
                                </div>
                                <div class="messageBox">
                                    <input class="inputMessage"  type="text" placeholder="enter message here" data-podium_id=3>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><div class="chart_3" style="height: 200px"></div></td>
                    </tr>
                </table>
            </div>


</div> <!-- end of the podiums -->
        <?php include_partial('present/menu_month_by_id'); ?>


<script id="messageLine" type="text/template">
    {{#messages}}
    <p/>{{userName}}: {{timeEntered}}
    <br/>{{message}}
    {{/messages}}
</script>


<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/mustache.js"></script>
<script src="js/podium.module.js"></script>
