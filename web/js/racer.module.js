
function racerModule(){
    'use strict'
    var racer_container = document.getElementById('racer_container');
    var section_racer = document.getElementById('section_racer');
    var cars_holder = document.getElementById('cars_holder');
    var play_btn = document.getElementById('play_btn');
    var FS_trigger = document.getElementById('FS_trigger');
    var AvgLapDuration = 2; // in seconds; the lower the number, the faster the race
    var laps = 1;
    var track;
    var track_startLine = 0.1;
    var track_startPosition = 0.075;
    var cars = [];
    var car;
    var json;
    var jsonUrl = "/race_json";
    var audioStart = [];
    var audioMiddle = [];
    var carAni = [];
    var raceResults ='';

//tracks
    /* TRACK 1*/
    var track_1_raw = [71,383,71,232,193,110,344,110,344,110,937,110,937,110,1088,110,1210,232,1210,383,1210,383,1210,383,1210,383,1210,534,1088,656,937,656,937,656,344,656,344,656,193,656,71,534,71,383,71,383,71,383,71,383];
    var track_1 = [];
    for(var i=0; i < track_1_raw.length; i+=2){
        track_1.push({x:parseInt(track_1_raw[i]),y:parseInt(track_1_raw[i+1])});
    };
    /* TRACK 2*/
    var track_2_raw = [550,372,406,463,578,523,519,618,448,731,225,656,160,591,160,591,160,591,160,591,95,526,95,421,160,357,160,357,398,119,398,119,451,66,531,56,594,90,594,90,648,125,667,136,686,149,704,147,704,147,704,147,788,149,838,147,873,146,895,121,895,121,924,90,966,70,1013,70,1101,70,1173,142,1173,230,1173,319,1101,390,1013,390,965,390,913,372,894,338,874,303,831,266,793,266,650,264,662,302,550,372];
    var track_2 = [];
    for(var i=0; i < track_2_raw.length; i+=2){
        track_2.push({x:parseInt(track_2_raw[i]),y:parseInt(track_2_raw[i+1])});
    };
    /* TRACK 3*/
    var track_3_raw = [631,371,631,371,377,626,377,626,308,695,196,695,127,626,127,626,127,626,127,626,58,557,57,445,127,376,127,376,381,121,381,121,438,64,524,54,591,91,591,91,649,128,669,140,690,153,708,151,708,151,708,151,798,153,851,151,889,151,913,124,913,124,944,90,989,69,1038,69,1133,69,1210,146,1210,240,1210,335,1133,412,1038,412,988,412,942,390,911,355,911,355,900,336,859,336,828,335,698,336,698,336,698,336,665,334,631,371];
    var track_3 = [];
    for(var i=0; i < track_3_raw.length; i+=2){
        track_3.push({x:parseInt(track_3_raw[i]),y:parseInt(track_3_raw[i+1])});
    };
    /* TRACK 4*/
    var track_4_raw = [966,664,824,673,721,663,598,589,514,539,422,512,346,448,269,385,185,313,144,225,105,140,158,85,257,82,301,81,354,86,391,109,426,131,419,173,450,198,540,269,616,266,730,270,793,273,1021,317,1063,267,1159,184,1237,301,1148,372,1090,418,1067,481,1059,548,1047,641,1026,657,966,664];
    var track_4 = [];
    for(var i=0; i < track_4_raw.length; i+=2){
        track_4.push({x:parseInt(track_4_raw[i]),y:parseInt(track_4_raw[i+1])});
    };
    /* TRACK 5*/
    var track_5_raw = [958,122,1089,122,1196,242,1196,373,1196,505,1123,638,958,638,843,638,748,563,725,456,725,456,712,353,649,352,595,355,574,456,574,456,539,554,446,625,336,625,197,625,85,512,85,373,85,234,197,122,336,122,336,122,958,122,958,122];
    var track_5 = [];
    for(var i=0; i < track_5_raw.length; i+=2){
        track_5.push({x:parseInt(track_5_raw[i]),y:parseInt(track_5_raw[i+1])});
    };
    /* TRACK 6*/
    var track_6_raw = [760,433,714,433,677,397,677,351,677,351,677,211,677,211,677,166,641,135,594,129,594,129,189,89,189,89,143,89,106,126,106,171,106,171,106,555,106,555,106,555,102,641,189,641,261,641,1099,581,1099,581,1099,581,1187,588,1187,505,1187,425,1099,433,1099,433,996,433,760,433,760,433];
    var track_6 = [];
    for(var i=0; i < track_6_raw.length; i+=2){
        track_6.push({x:parseInt(track_6_raw[i]),y:parseInt(track_6_raw[i+1])});
    };
    /* TRACK 7*/
    var track_7_raw = [390,89,295,37,104,73,104,264,104,515,332,490,394,441,471,380,499,307,603,348,786,421,708,479,763,566,817,653,905,673,963,673,1020,673,1177,619,1176,442,1175,265,1034,221,907,267,795,308,804,317,707,266,674,249,541,173,541,173,467,130,390,89,390,89];
    var track_7 = [];
    for(var i=0; i < track_7_raw.length; i+=2){
        track_7.push({x:parseInt(track_7_raw[i]),y:parseInt(track_7_raw[i+1])});
    };
    /* TRACK 8*/
    var track_8_raw = [995,108,995,108,845,108,680,108,579,108,494,131,494,290,494,439,451,420,329,420,182,420,121,422,121,512,120,652,107,666,247,666,387,666,390,666,436,666,586,666,645,728,645,415,645,260,880,246,880,382,880,477,748,497,857,625,1062,865,1296,108,995,108];
    var track_8 = [];
    for(var i=0; i < track_8_raw.length; i+=2){
        track_8.push({x:parseInt(track_8_raw[i]),y:parseInt(track_8_raw[i+1])});
    };
    /* TRACK 9*/
    var track_9_raw = [960,227,960,227,844,220,712,196,637,183,591,166,565,155,519,134,446,68,293,118,164,161,72,182,99,258,135,364,118,319,133,357,147,394,158,430,244,422,329,415,342,376,423,306,504,236,736,447,421,484,360,492,294,527,317,595,340,663,348,682,502,629,583,601,658,481,822,503,1000,527,1167,430,1161,330,1155,231,960,227,960,227];
    var track_9 = [];
    for(var i=0; i < track_9_raw.length; i+=2){
        track_9.push({x:parseInt(track_9_raw[i]),y:parseInt(track_9_raw[i+1])});
    };
    /* TRACK 10*/
    var track_10_raw = [1109,655,218,653,218,653,218,653,216,653,214,653,212,653,174,653,138,637,111,611,85,584,70,548,70,510,70,478,80,448,99,423,108,411,120,400,131,389,133,387,136,384,139,381,156,364,169,351,181,339,184,336,187,333,190,330,190,330,194,326,194,326,198,322,206,314,218,307,231,299,245,295,259,295,260,295,262,295,263,295,282,296,297,299,311,306,322,313,331,322,340,331,340,331,340,331,340,331,342,333,344,336,346,338,359,350,372,359,387,362,393,364,400,365,406,365,409,365,411,365,414,364,427,363,440,357,452,349,454,347,457,345,459,343,459,343,459,343,459,343,459,343,688,114,688,114,689,113,691,111,693,110,709,98,729,92,749,92,773,92,796,101,813,116,815,118,817,120,818,121,818,121,1174,474,1174,474,1197,494,1211,522,1211,553,1211,609,1165,655,1109,655];
    var track_10 = [];
    for(var i=0; i < track_10_raw.length; i+=2){
        track_10.push({x:parseInt(track_10_raw[i]),y:parseInt(track_10_raw[i+1])});
    };
    /* TRACK 11*/
    var track_11_raw = [509,233,466,175,405,143,405,143,330,109,232,146,232,146,135,169,80,248,101,346,101,346,114,403,114,403,135,493,245,555,462,492,462,492,463,492,463,492,508,480,544,462,593,482,671,514,664,566,750,614,751,614,816,646,873,633,930,620,1058,592,1058,592,1150,571,1205,479,1184,389,1184,389,1172,332,1172,332,1151,242,1071,220,978,241,978,241,803,276,803,276,803,276,587,326,509,233];
    var track_11 = [];
    for(var i=0; i < track_11_raw.length; i+=2){
        track_11.push({x:parseInt(track_11_raw[i]),y:parseInt(track_11_raw[i+1])});
    };
    /* TRACK 10*/
    var track_12_raw = [698,247,698,247,583,222,517,206,488,199,419,181,358,115,316,70,182,62,121,156,60,250,116,351,258,359,387,367,475,458,437,532,394,613,404,652,483,675,545,693,634,676,636,585,637,492,708,324,922,408,1091,476,1149,382,1168,354,1188,326,1198,229,1098,181,997,134,921,174,890,216,855,264,785,267,698,247];
    var track_12 = [];
    for(var i=0; i < track_12_raw.length; i+=2){
        track_12.push({x:parseInt(track_12_raw[i]),y:parseInt(track_12_raw[i+1])});
    };


// LOAD DATA
    $.getJSON(jsonUrl,function(data) {
        json = data;
    }).done(function(json){
// After Json loads, build track and cars
// load track
            (function loadTrack(){
                var monthScope = json.month;
                switch(monthScope){
                    case 'jan' : track = track_1;break;
                    case 'feb' : track = track_2;break;
                    case 'mar' : track = track_3;break;
                    case 'apr' : track = track_4;break;
                    case 'may' : track = track_5;break;
                    case 'jun' : track = track_6;break;
                    case 'jul' : track = track_7;break;
                    case 'aug' : track = track_8;break;
                    case 'sep' : track = track_9;break;
                    case 'oct' : track = track_10;break;
                    case 'nov' : track = track_11;break;
                    case 'dec' : track = track_12;break;
                };
                drawTrack();
            }());
            /* sorting function */
            function compare(a,b) {
                if (a.start_position < b.start_position)
                    return -1;
                if (a.start_position > b.start_position)
                    return 1;
                return 0;
            }
// get cars info
            var pos;
            for(i=0;i<json.data.length;i++){
// grabs data, creates an array of cars;
                car = new Object();
                car.country = json.data[i].country;
                car.country_id = json.data[i].country_id;
                car.start_position = json.data[i].start_position;
                car.finish_position = json.data[i].finish_position;
                car.sales = json.data[i].sales;
                car.div = "<div id='car_container"+[i]+"' class='car_container car_"+car.country_id+" "+car.country+"'></div>"; // this gives the graphic by class
                car.container = 'car_container'+[i];
                car.speed = (AvgLapDuration * car.finish_position / json.data.length) + (AvgLapDuration/1.2);
                cars.push(car);// adds to the array of cars
                cars.sort(compare);/* sorts the cars in starting position order */
                pos = i+1;
                raceResults+='<p>'+pos+': '+json.data[i].country+'</p>';

            };
            /* add cars to stage, already ordered in starting position */
            for(i=0;i<cars.length;i++){
                $(cars_holder).append(cars[i].div);
                cars[i].container = document.getElementById(cars[i].container);
            }
// groups them in 4
            var a = $('.car_container');
            do $(a.slice(0,4)).wrapAll('<div class="column"> </div>');
            while((a = a.slice(4)).length>0)
            loadCars();
        }); /* end of json done */

// load cars

    function loadCars(){
        audioLoad();

        for (i=0;i<cars.length;i++){



            audioStart[i] = document.createElement('audio');
            audioStart[i].setAttribute('src', '/assets/car_start.ogg');
            //audioElement.load()


            audioMiddle[i] = document.createElement('audio');
            audioMiddle[i].setAttribute('src', '/assets/cars_drive_by.ogg');
            audioMiddle[i].loop=true;

            /* master animation definition */
            carAni[i] = new TweenMax(cars[i].container, cars[i].speed, {bezier:{type:"cubic",curviness:1.2, values:track,autoRotate:true},ease:Linear.easeNone, repeat: laps});

            carAni[i].eventCallback("onStart", function () { audioMiddle[i].play() });


            // sets car position
            TweenMax.to(carAni[i],0,{timeScale:0,progress:track_startPosition});


        };

        var playTimes = 0;

        function audioLoad () {
            /*
             audioStart = document.createElement('audio');
             audioStart.setAttribute('src', '/assets/car_start.ogg');
             //audioElement.load()


             audioMiddle = document.createElement('audio');
             audioMiddle.setAttribute('src', '/assets/cars_drive_by.ogg');
             //audioElement.load()


             //   $.get();

             audioStart.addEventListener("ended", function() {
             audioMiddle.play();
             });


             audioMiddle.addEventListener("ended", function() {
             audioMiddle.play();
             });
             */
        }

        audioLoad(); // putting it here as there is an audio pause in showPlayBtn



        runTheMiddle();
    };/* end of load cars */


    var showPlayBtn = function(){
        TweenMax.to(play_btn,0.5,{autoAlpha:1,ease:Linear.easeNone});
        $(play_btn).on('mouseover',function(){TweenMax.to(this,0.5,{autoAlpha:0.5});}).on('mouseleave',function(){TweenMax.to(this,0.5,{autoAlpha:1});});
    }




// draw track
    function drawTrack(){
// start/end line
        var startLine = document.getElementById('start_line');
        var startLinePosition = TweenMax.to(startLine,AvgLapDuration,{bezier:{type:"cubic",curviness:1.2,values:track,autoRotate:true},ease:Linear.easeNone,paused:true});
        TweenMax.to(startLinePosition,0,{progress:track_startLine});
        /* start/end line adjust for each track */
        var lineOffset = (function() {
            if (track == track_1){$(startLine).css('top','-55px')};
            if (track == track_2){$(startLine).css('top','-50px')};
            if (track == track_3){$(startLine).css('top','-60px')};
            if (track == track_4){$(startLine).css('top','-45px')};
            if (track == track_5){$(startLine).css('top','-35px').css('left','-8px')};
            if (track == track_6){$(startLine).css('top','-50px').css('left','-12px')};
            if (track == track_7){$(startLine).css('top','-50px').css('left','-12px')};
            if (track == track_8){$(startLine).css('top','-50px').css('left','0')};
            if (track == track_9){$(startLine).css('top','-50px').css('left','-10px')};
            if (track == track_10){$(startLine).css('top','-50px').css('left','-10px')};
            if (track == track_11){$(startLine).css('top','-50px').css('left','-10px')};
            if (track == track_12){$(startLine).css('top','-50px').css('left','-10px')};
        }());
// draw track
        var canvas = document.getElementById("canvas"),
            trackLineOuter = canvas.getContext("2d");
        trackLineOuter.strokeStyle = '#242424';
        trackLineOuter.lineWidth = 100;
        trackLineOuter.lineCap = 'round';
        trackLineOuter.beginPath();
        for(var i = 0;i < track.length-1; i+=3) {
            trackLineOuter.lineTo(track[i].x, track[i].y);
            trackLineOuter.bezierCurveTo(track[i+1].x, track[i+1].y, track[i+2].x, track[i+2].y, track[i+3].x, track[i+3].y);
        };
        trackLineOuter.stroke();
    }; /*end of draw track*/
    var playTimes = 0;

    function runTheMiddle() {
        var thisCar = [];
        var i;
        $(play_btn).unbind('mouseleave');
        TweenMax.to(play_btn,0.5,{autoAlpha:0,ease:Linear.easeNone})
        for (i=0;i<cars.length;i++){
            if (playTimes != 0) {
                TweenMax.to(carAni[i],0,{timeScale:0,progress:track_startPosition});
            }
            /* plays the car */
            TweenMax.to(carAni[i],0,{timeScale:1,delay:1});
            /* stops the car */
            (function(){
                thisCar[i] = TweenMax.to(carAni[i],cars[i].speed/2,{timeScale:0,delay:(cars[i].speed+1)*(laps)});
            }());
        }

        thisCar[cars.length-1].eventCallback("onComplete", finishRace);

        function finishRace()  {
            for (i=0;i<cars.length;i++){
                audioMiddle[i].loop = false; audioMiddle[i].pause(); audioMiddle[i].currentTime = 0; audioStart[i].play();
            }
            $('#race_results').html(raceResults);
        }

        var lastCarComplete = (cars[cars.length-1].speed+cars.length)*(laps)-10;
        //console.log(lastCarComplete)
        TweenMax.delayedCall(lastCarComplete,showPlayBtn);
        playTimes++;
    }




    play_btn.onclick = function(){
        $('#race_results').html('');

        runTheMiddle();
    };


// Full Screen trigger
    FS_trigger.onclick = function(){
        $(section_racer).fullscreen();
    }



};

racerModule();

// FADE IN WHEN DOCUMENT IS READY
var readyStateCheckInterval = setInterval(function() {
    if (document.readyState === "complete") {
        var section_racer = document.getElementById('section_racer');
        TweenMax.to(section_racer,0.5,{autoAlpha:1,delay:0.5})
        clearInterval(readyStateCheckInterval);
    };
}, 10);



/*
 You can control audio by clicking these button:

 <div class="play">Play</div>

 <div class="pause">Stop</div>

 And you must put this script to <body>

 <script>
 $(document).ready(function() {
 var audioElement = document.createElement('audio');
 audioElement.setAttribute('src', 'audio.mp3');
 audioElement.setAttribute('autoplay', 'autoplay');
 //audioElement.load()

 $.get();

 audioElement.addEventListener("load", function() {
 audioElement.play();
 }, true);

 $('.play').click(function() {
 audioElement.play();
 });

 $('.pause').click(function() {
 audioElement.pause();
 });
 });
 </script>
 */
