<h1><?php echo $selected_user; ?>'s </h1>
<?php // var_dump($stats); ?>

<div id=sales_dashboard class=sales_d_week>
    <p/>     Week 2/ total week

    <p/>        total actual sales
    <p/>            <?php echo $sales->getTotalsales(); ?>


    <p/>Difference
    <p/><?php echo $target->getTotaltarget()-$sales->getTotalsales(); ?>

    <p/>total sales target
    <p/>     <?php echo $target->getTotaltarget(); ?>


    <p/>total sales objective completed
    <p/><?php echo ($sales->getTotalsales()/$target->getTotaltarget())*100; ?>%


</div>