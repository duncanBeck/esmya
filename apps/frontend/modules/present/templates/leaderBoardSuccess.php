<?php include_partial('present/header'); ?>

<link rel="stylesheet" type="text/css" href="/css/BCA-CSS-Flag-Sprite/css/flags.css"/>

        <div class="row">

<div  class="col-lg-2">    This is my title</div>

<div class="col-lg-10" style="position:relative">
    <div  style="position:absolute; left:5px; z-index:0">
        <canvas id="canvas_1" width="1280" height="10" ></canvas>
    </div>
    <div style="position:absolute; top:-20px; left:100px; font-size:28px; z-index:2"><i class="flag-us"></i></div>
</div>
</div>

       <div class="row">

                    <div  class="col-lg-2">    This is my title</div>

<div  class="col-lg-10" style="position:relative">

    <div  style="position:absolute; left:5px; z-index:0">
        <canvas id="canvas_2" width="1280" height="10" ></canvas>
    </div>
    <div style="position:absolute; top:-20px; left:400px; font-size:28px; z-index:2"><i class="flag-gb"></i></div>


</div>
</div>
<div class="row">


<div  class="col-lg-2">    This is my title</div>

<div  class="col-lg-10" style="position:relative">

    <div  style="position:absolute; left:5px; z-index:0">
        <canvas id="canvas_3" width="1280" height="10" ></canvas>
    </div>
    <div style="position:absolute; top:-20px; left:400px; font-size:28px; z-index:2"><i class="flag-gb"></i></div>


</div>
</div>

<?php include_partial('present/menu_month_by_id'); ?>


<script src="/js/jquery-1.10.2.min.js"></script>


<script src="/js/jquery.fullscreen-0.3.5.min.js"></script>
<script src="/js/leaderboard.module.js"></script>



<script>
    var url = window.location;


    $(document).ready(function(){



        drawLine();
loadStats();

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