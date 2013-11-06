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
var selectedMonth={};

function accumulateFigures() {

    for (i = 0; i < rawData.countries.length; i += 1) {
        var totalSales =0;
        var totalTarget = 0;
        for (j = 0; j < 12; j += 1) { // months always equals 12
            totalSales+=rawData.countries[i].months[j].actualSales;
            rawData.countries[i].months[j].totalSales = totalSales;
            totalTarget+=rawData.countries[i].months[j].targetTotal;
            rawData.countries[i].months[j].totalTarget = totalTarget;
        }
        rawData.countries[i].yearTarget = totalTarget;
        rawData.countries[i].yearSales = totalSales;
    }

}

function countryAndMonth(c,m) {


    selectedMonth.name=rawData.countries[c].name;
    selectedMonth.yearSales=rawData.countries[c].yearSales;
    selectedMonth.yearTarget=rawData.countries[c].yearTarget;

    selectedMonth.month = rawData.countries[c].months.filter(function(elem) {
        return elem.monthName==m;
    });


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


$(document).ready(function(){
    drawLine();
    loadStats();
    setTemplate(1);
    accumulateFigures();
    countryAndMonth(2,'July');
});