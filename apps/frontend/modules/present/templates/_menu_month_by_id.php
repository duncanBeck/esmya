<nav id="year">

    <?php if (!isset($noMonths)) { ?>
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
        <?php } ?>
    <div class="container text-center">
        <ul id="year_selection" class="list-inline">
            <li class="col-md-1"><a href="<?php  echo url_for('about_race') ?>">About Race </a></li>

            <li class="col-md-1"><a href="<?php  echo url_for('race') ?>">Race </a></li>
            <li class="col-md-1">  <a href="<?php  echo url_for('stats') ?>">My Stats</a></li>
            <li class="col-md-1">  <a href="<?php  echo url_for('monthly_regional_stats') ?>">Country Stats</a></li>
            <li class="col-md-1">  <a href="<?php  echo url_for('podium') ?>">Podium</a></li>
            <li class="col-md-1">  <a href="<?php  echo url_for('leaderboard') ?>">Leader Board</a></li>

            <?php    if ($sf_user->getGuardUser()->getSalesPerson()->getIsAdmin()==1): ?>
            <li >  <a href="<?php  echo url_for('people') ?>">Admin</a></li>


            <?php endif ?>
            <li > <?php echo link_to('Logout', 'sf_guard_signout') ?></li>

        </ul>
    </div>
</nav>