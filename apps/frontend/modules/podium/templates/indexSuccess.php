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
                        <td class="grey ">
                            <div id="podium_1" >
                            <div id="messages">
                            </div>
                                <div id="messageBox">

                                    <input id="inputMessage"  type="text" placeholder="enter message here"  data-podium_id='1_2013_4'>
                                    <span  ></span>
                                </div>
                            </div>
                            </p></td>
                    </tr>
                </table>
            </div>

</div>


<script id="messageLine" type="text/template">
    {{#messages}}
    <p/>{{userName}}: {{timeEntered}}
    <br/>{{message}}
    {{/messages}}
</script>


<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/mustache.js"></script>
<script src="js/podium.module.js"></script>
