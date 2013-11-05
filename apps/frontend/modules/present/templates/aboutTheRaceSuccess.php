<?php include_partial('present/header',array('class'=>'white')); ?>
<script>
var monthName = 'chatroom';
</script>


<div class="" id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>About the race</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h3>THE FACTS</h3>
            </div>
            <div class="col-md-4">
                <h3>THE RULES</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et metus vel turpis fringilla aliquet ut et ipsum. Vivamus vestibulum lorem enim, pretium rutrum est varius eu. Proin non velit vel felis blandit facilisis. In porttitor, arcu vitae rhoncus vestibulum, nulla dui sollicitudin odio, vel lobortis mi leo eget lectus.</p>
                <p>Suspendisse pellentesque auctor lorem nec malesuada. Nullam placerat ante quis dui accumsan, eu auctor justo vehicula. Proin ac tristique nunc. Etiam laoreet lectus et bibendum ornare. Duis ac odio vitae nulla consectetur varius. Vivamus varius gravida vestibulum. Morbi felis dui, semper quis cursus sollicitudin, placerat sit amet nisi.</p>

                <p>Integer in rutrum libero. Duis mauris dolor, malesuada sit amet libero non, auctor hendrerit urna. Sed ultricies mauris at ultricies rutrum. Donec et magna tellus. Suspendisse et quam luctus, elementum metus sed, venenatis ante.</p>
                <p>Curabitur auctor dapibus purus, nec semper enim laoreet nec. Integer sagittis vehicula nulla, ut consectetur mi laoreet et. Morbi euismod condimentum elementum. Donec mollis nec sem hendrerit dignissim. Suspendisse potenti. Suspendisse varius turpis enim, sed porta turpis interdum a. Proin varius tortor et neque suscipit sagittis. Nunc egestas et velit eget eleifend. In hac habitasse platea dictumst. </p>
            </div>


            <!-- a podium -->

            <div class="col-md-6">
                <table>
                    <tr>
                        <td class="blue"><h3>Chat Room</h3></td>
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
                </table>
            </div>
        </div>

        <div class="row">


<div class="col-md-4">
    <ol>
        <li><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span></li>
        <li><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span></li>
        <li><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span></li>
        <li><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span></li>
        <li><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span></li>
    </ol>
    <p>&nbsp;</p>
    <p><a href="#">SIGN UP AND RACE NOW &#9654;</a></p>
</div>
            </div>

        <?php include_partial('present/menu_month_by_id', array('noMonths')); ?>




<script id="messageLine" type="text/template">
    {{#messages}}
    <p/>{{userName}}: {{timeEntered}}
    <br/>{{message}}
    {{/messages}}
</script>

<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/mustache.js"></script>
<script src="js/podium.module.js"></script>

<script>
        $(document).ready(function(){

        });
</script>


