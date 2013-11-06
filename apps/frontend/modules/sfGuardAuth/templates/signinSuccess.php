<!doctype html>
<html>
<head>
    <title>ESMYA</title>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,700' rel='stylesheet' type='text/css'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>
<body>
<!-- nav -->
<?php use_helper('I18N') ?>
<?php /*
<nav id="year">
    <div class="container">
        <ul id="year_selection" class="list-inline">
            <li class="col-md-1"><a href="<?php  echo url_for('race') ?>">Race </a></li>
            <li class="col-md-1">  <a href="<?php  echo url_for('stats') ?>">My Stats</a></li>
            <li class="col-md-1">  <a href="<?php  echo url_for('monthly_regional_stats') ?>">Country Stats</a></li>

            <?php    if (($sf_user->getGuardUser() && $sf_user->getGuardUser()->getSalesPerson()->getIsAdmin()==1)) { ?>
            <li >  <a href="<?php  echo url_for('people') ?>">Admin</a></li>


            <?php } ?>
            <li > <?php echo link_to('Logout', 'sf_guard_signout') ?></li>

        </ul>
    </div>
</nav>
 <?php */ ?>
<?php include_partial('present/esmyaMenu'); ?>



<div class="row">
    <div class="container">

    <div class="col-md-2 col-md-offset-5"  style="top:100px">
<h1><?php echo __('Login', null, 'sf_guard') ?></h1>


<?php echo get_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>
        <br>
<h3><a href="/register">Register!</a></h3>
</div>
        </div>
</div>