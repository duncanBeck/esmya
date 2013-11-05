var months = [];
var firstTime =  true;
var country;
var selectedCountry = 0;
var coMoData = [];
var coMenu  =   [];
var rawData =  [];

    function drawLine() {

        var canvas = document.getElementById('canvas_1');

        var context = canvas.getContext('2d');
        context.beginPath();
        context.moveTo(2, 0);
        context.lineTo(1000, 2);
        context.lineWidth = 3;

        context.strokeStyle='grey';
        context.stroke();


        var context = canvas.getContext('2d');
        context.beginPath();
        context.moveTo(0, 0);
        context.lineTo(200, 0);
        context.lineWidth = 7;

        context.strokeStyle='yellow';
        context.stroke();


        var canvas = document.getElementById('canvas_2');

        var context = canvas.getContext('2d');
        context.beginPath();
        context.moveTo(2, 0);
        context.lineTo(1000, 2);
        context.lineWidth = 3;

        context.strokeStyle='grey';
        context.stroke();


        var context = canvas.getContext('2d');
        context.beginPath();
        context.moveTo(0, 0);
        context.lineTo(600, 0);
        context.lineWidth = 7;

        context.strokeStyle='yellow';
        context.stroke();


        var canvas = document.getElementById('canvas_3');

        var context = canvas.getContext('2d');
        context.beginPath();
        context.moveTo(2, 0);
        context.lineTo(1000, 2);
        context.lineWidth = 3;

        context.strokeStyle='grey';
        context.stroke();


        var context = canvas.getContext('2d');
        context.beginPath();
        context.moveTo(0, 0);
        context.lineTo(600, 0);
        context.lineWidth = 7;

        context.strokeStyle='yellow';
        context.stroke();

    }


function setTemplate(month_id) {

    //     console.log(month_id);
//    $('#country_name').html(coMenu[selectedCountry].name);

    var template = $('#leaderLine').html();
    var html = Mustache.to_html(template, months[selectedCountry][month_id-1]);
    $('#leaderLines').append(html);
}


/*
json
countries: {
     country:'uk': {
       [{month
 */

function accumulateFigures(data) {
var formattedData = {};

    formattedData.name=data.name;
    return formattedData;
}


    function loadStats() {

    $.ajax({
        type: 'GET',
        url: 'regional_stats_data',
        dataType: 'json',
        data: {},
        async: false,
        success: function(data) {
            rawData = data;
            $formattedData = accumulateFigures(data);
            $.each(data, function() {
                $.each(this, function(k, v) {
//                    console.log(v);
                    coMenu[k] = [];
                    coMenu[k]['months'] = v.months;
                    months[k] = v.months;
                });
            });
        }
    })
    };