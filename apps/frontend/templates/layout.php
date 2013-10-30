<!DOCTYPE html>
<head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/bootstrap_old/css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/js/jquery-1.10.2.min.js"></script>

    <?php include_javascripts()
    // <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
    ?>
</head>
<body>
<!-- dummy row for layout during development -->
<div class="row-fluid">
    <div class="span12">
    </div>



    <!-- the row for the navigation -->
    <div class="row-fluid">
        <div class="span12">
            <!-- menu bar -->
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container">

                        <ul class="nav nav-tabs">

                            <?php if ($sf_user->isAuthenticated())

                               if ($sf_user->getGuardUser()->getSalesPerson()->getIsAdmin()==1): ?>
                                    <li >  <a href="<?php  echo url_for('people') ?>">People</a></li>
                                    <li >  <a href="<?php  echo url_for('target') ?>">Targets</a></li>
                               <?php endif ?>

                            <li >  <a href="<?php  echo url_for('stats') ?>">My Stats</a></li>
                            <li >  <a href="<?php  echo url_for('monthly_regional_stats') ?>">Country Stats</a></li>

                            <li >  <a href="<?php  echo url_for('race') ?>">Race</a>
                            <li > <?php echo link_to('Logout', 'sf_guard_signout') ?></li>


                        </ul>

                    </div>
                </div>
            </div>


        </div>

    </div>

    <!--  the user flashes! -->

    <?php  if ($sf_user->hasFlash('notice')): ?>
    <div class="row-fluid">
        <div class="span12">
            <div class="flash_notice"><?php echo $sf_user->getFlash('notice')
                ?></div></div></div>
    <?php endif ?>
    <?php if ($sf_user->hasFlash('error')): ?>
    <div class="row-fluid">
        <div class="span12">  <div class="flash_error"><?php echo $sf_user->getFlash('error') ?></div></div></div>
    <?php endif ?>
</div>
</div>


<!-- Main content -->
<div class="row-fluid">
    <div class="span12">
        <?php echo $sf_content ?>
    </div>
</div>


</body>
</html>
