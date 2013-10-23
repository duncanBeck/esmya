<?php include_partial('present/header'); ?>


    <!-- year -->
    <nav class="black" id="year">
        <div class="container">
            <ul id="month_selection" class="list-inline">
                <li class="col-md-1"><a href="<?php  echo url_for('race') ?>?month_code=jan&month_id=1">Jan</a></li>
                <li class="col-md-1"><a href="<?php  echo url_for('race') ?>?month_code=feb&month_id=2">Feb</a></li>
                <li class="col-md-1"><a href="<?php  echo url_for('race') ?>?month_code=mar&month_id=3">Mar</a></li>
                <li class="col-md-1"><a href="<?php  echo url_for('race') ?>?month_code=apr&month_id=4">Apr</a></li>
                <li class="col-md-1"><a href="<?php  echo url_for('race') ?>?month_code=may&month_id=5">May</a></li>
                <li class="col-md-1"><a href="<?php  echo url_for('race') ?>?month_code=jun&month_id=6">Jun</a></li>
                <li class="col-md-1"><a href="<?php  echo url_for('race') ?>?month_code=jul&month_id=7">Jul</a></li>
                <li class="col-md-1"><a href="<?php  echo url_for('race') ?>?month_code=aug&month_id=8">Aug</a></li>
                <li class="col-md-1"><a href="<?php  echo url_for('race') ?>?month_code=sep&month_id=9">Sep</a></li>
                <li class="col-md-1"><a href="<?php  echo url_for('race') ?>?month_code=oct&month_id=10">Oct</a></li>
                <li class="col-md-1"><a href="<?php  echo url_for('race') ?>?month_code=nov&month_id=11">Nov</a></li>
                <li class="col-md-1"><a href="<?php  echo url_for('race') ?>?month_code=dec&month_id=12">Dec</a></li>
            </ul>
        </div>
        <div class="container">
            <ul id="year_selection" class="list-inline">
                <li class="col-md-1"><a href="<?php  echo url_for('people') ?>">Back to Dashboard | </a></li>
                <li class="col-md-1">2013</li>
            </ul>
        </div>



    </nav>

<!-- track -->
<div class="black" id="track">
    <div id="section_racer" style="visibility:hidden;">
        <!-- Everything for this section here after this -->

        <div id="racer_container">
            <div class="play_wrapper">
                <div class="play_holder">
                    <div id="play_btn"></div>
                </div>
            </div>
            <div id="cars_holder"></div>
            <div id="start_line">
                <img src="/images/start_line.png">
            </div>
            <canvas id="canvas" width="1280" height="750"></canvas>
        </div>

        <!-- end of content for this section -->
    </div>
</div>


<!-- timer -->
<div class="black" id="timer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p id="countdown" class="pull-left black">
                    TIME LEFT UNTIL NEXT RACE:
                    <span class="days">00</span>:
                    <span class="hours">00</span>:
                    <span class="minutes">00</span>:
                    <span class="seconds">00</span>
                </p>
                <div id="FS_trigger"><img src="/images/fullscreen.png" class="pull-right" style="margin-top: 12px;"></div>
            </div>
        </div>
    </div>
</div>

<!-- about -->
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
            <div class="col-md-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et metus vel turpis fringilla aliquet ut et ipsum. Vivamus vestibulum lorem enim, pretium rutrum est varius eu. Proin non velit vel felis blandit facilisis. In porttitor, arcu vitae rhoncus vestibulum, nulla dui sollicitudin odio, vel lobortis mi leo eget lectus.</p>
                <p>Suspendisse pellentesque auctor lorem nec malesuada. Nullam placerat ante quis dui accumsan, eu auctor justo vehicula. Proin ac tristique nunc. Etiam laoreet lectus et bibendum ornare. Duis ac odio vitae nulla consectetur varius. Vivamus varius gravida vestibulum. Morbi felis dui, semper quis cursus sollicitudin, placerat sit amet nisi.</p>
            </div>
            <div class="col-md-4">
                <p>Integer in rutrum libero. Duis mauris dolor, malesuada sit amet libero non, auctor hendrerit urna. Sed ultricies mauris at ultricies rutrum. Donec et magna tellus. Suspendisse et quam luctus, elementum metus sed, venenatis ante.</p>
                <p>Curabitur auctor dapibus purus, nec semper enim laoreet nec. Integer sagittis vehicula nulla, ut consectetur mi laoreet et. Morbi euismod condimentum elementum. Donec mollis nec sem hendrerit dignissim. Suspendisse potenti. Suspendisse varius turpis enim, sed porta turpis interdum a. Proin varius tortor et neque suscipit sagittis. Nunc egestas et velit eget eleifend. In hac habitasse platea dictumst. </p>
            </div>
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
    </div>
</div>


<script src="/js/jquery-1.10.2.min.js"></script>
<script src="/js/greensock/TweenMax.min.js"></script>
<script src="/js/jquery.fullscreen-0.3.5.min.js"></script>
<script src="/js/racer.module.js"></script>
<script src="/js/countdown.js"></script>

<?php
$d = new DateTime();
$d->modify( 'first day of next month' );
$firstOfMonth = $d->format( 'd F Y H:i:s' );
?>
<script>

    $(document).ready(function(){
        $("#countdown").countdown({
                    date: "<?php echo $firstOfMonth; ?>",
                    format: "on"
                },

                function() {  });


        var url = window.location;

       // console.log(url);
// Will also work for relative and absolute hrefs
        $('ul#month_selection a').filter(function() {
        //    console.log(this.href);

            return this.href == url;
        }).parent().addClass('active');


    });

</script>
<?php /*
var url = window.location;
// Will only work if string in href matches with location
$('ul.nav a[href="'+ url +'"]').parent().addClass('active');

// Will also work for relative and absolute hrefs
$('ul.nav a').filter(function() {
return this.href == url;
}).parent().addClass('active');
*/
?>

</body>
</html>