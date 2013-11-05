<?php include_partial('present/header'); ?>

<link rel="stylesheet" type="text/css" href="/css/BCA-CSS-Flag-Sprite/css/flags.css"/>


<h1>World LeaderBoard (DEV)</h1>
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

<hr>

<div id="leaderLines">

</div>


<?php include_partial('present/menu_month_by_id'); ?>






<script id="leaderLine" type="text/template">

<div class="row">
    <div  class="col-lg-2">    {{name}}</div>

    <div class="col-lg-10" style="position:relative">
        <div  style="position:absolute; left:5px; z-index:0">
            <canvas id="canvas_4" width="1280" height="10" ></canvas>
        </div>
        <div style="position:absolute; top:-20px; left:100px; font-size:28px; z-index:2"><i class="flag-us"></i></div>
    </div>
</div>
</script>

<script src="/js/jquery-1.10.2.min.js"></script>
<script src="js/mustache.js"></script>
<script src="/js/leaderboard.module.js"></script>

<script>
    var url = window.location;

    $(document).ready(function(){
        drawLine();
        loadStats();
        setTemplate(1);
    });

</script>

</body>
</html>