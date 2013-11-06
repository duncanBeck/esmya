<?php include_partial('present/header'); ?>


<!-- track -->
<div class="black" id="track">
    <div id="section_racer" style="visibility:hidden;">
        <!-- Everything for this section here after this -->

        <div id="racer_container">
            <div class="play_wrapper">
                <div class="play_holder">
                    <div id="play_btn"></div>
                    <div id="race_results" class="container" style="position:relative; top:0; left:5;"></div>

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
    <div class="container text-center class="col-md-12"">
    <ul id="year_selection" class="list-inline">
        <li><a href="<?php  echo url_for('about_race') ?>">About Race </a></li>

        <li><a href="<?php  echo url_for('race') ?>">Race </a></li>
        <li>  <a href="<?php  echo url_for('stats') ?>">My Stats</a></li>
        <li>  <a href="<?php  echo url_for('monthly_regional_stats') ?>">Country Stats</a></li>
        <li>  <a href="<?php  echo url_for('podium') ?>">Podium</a></li>
        <li>  <a href="<?php  echo url_for('leaderboard') ?>">Leader Board</a></li>

        <?php    if ($sf_user->getGuardUser()->getSalesPerson()->getIsAdmin()==1): ?>
        <li >  <a href="<?php  echo url_for('people') ?>">Admin</a></li>


        <?php endif ?>
        <li > <?php echo link_to('Logout', 'sf_guard_signout') ?></li>

    </ul>
    </div>

</nav>

<script id="resultLine" type="text/template">
Standings
    <hr>
    <table class="table table-striped">
    <thead class="ranking_head">
    <th>Rank</th>
    <th>Country</th>
    <th>Score</th>
    </thead>
    {{#cars}}

        <tr>
    <td>{{position}}</td><td><a href=#>{{country}}</a></td><td>{{score}}</td>
</tr>
    {{/cars}}
</table>
</script>



<script src="/js/jquery-1.10.2.min.js"></script>
<script src="/js/greensock/TweenMax.min.js"></script>
<script src="/js/greensock/TimelineLite.min.js"></script>

<script src="/js/jquery.fullscreen-0.3.5.min.js"></script>
<script src="js/mustache.js"></script>
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