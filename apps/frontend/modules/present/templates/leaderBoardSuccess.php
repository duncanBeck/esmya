<?php include_partial('present/header'); ?>



<h1>World LeaderBoard (DEV)</h1>
        <div class="row">

<div  class="col-lg-2">USA</div>

<div class="col-lg-10" style="position:relative">
    <div  style="position:absolute; left:5px; z-index:0">
        <canvas id="canvas_1" width="1280" height="10" ></canvas>
    </div>
    <div style="position:absolute; top:-18px; left:100px; font-size:28px; z-index:2"><i class="flag-us"></i></div>
</div>
</div>

       <div class="row">

                    <div  class="col-lg-2">United Kingdom</div>

<div  class="col-lg-10" style="position:relative">

    <div  style="position:absolute; left:5px; z-index:0">
        <canvas id="canvas_2" width="1280" height="10" ></canvas>
    </div>
    <div style="position:absolute; top:-18px; left:400px; font-size:28px; z-index:2"><i class="flag-gb"></i></div>


</div>
</div>
<div class="row">


<div  class="col-lg-2">Germany</div>

<div  class="col-lg-10" style="position:relative">

    <div  style="position:absolute; left:5px; z-index:0">
        <canvas id="canvas_3" width="1280" height="10" ></canvas>
    </div>
    <div style="position:absolute; top:-18px; left:500px; font-size:28px; z-index:2"><i class="flag-de"></i></div>


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