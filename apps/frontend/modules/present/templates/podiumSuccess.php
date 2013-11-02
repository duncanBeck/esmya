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
                        <td class="grey "><p><b>Congratulations!</b><br>
                        <div id="podium_1">
                                         <div class="messages">


                                         </div>
                                          <div id="messageInput">


                                          </div>


                        </div>



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
            <div class="col-md-3 col-md-offset-1">
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
            <div class="col-md-3 col-md-offset-1">
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

        </div>
    </div>
</div>


<script id="messageShow" type="text/template">
{{#message}}
    <p/>{{user}}: {{time}} {{message}}
{{/message}}
</script>


<script src="js/jquery-1.10.2.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="js/mustache.js"></script>
<script src="js/podium.module.js"></script>
