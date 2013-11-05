var months = [];
var firstTime =  true;
var country;
var selectedCountry = 0;
var coMoData = [];
var coMenu =   [];

var options = {
    chart: {
        type: 'column',
        renderTo:"test_chart"
    },
    title: {
        text: 'Month Sales'
    },
    xAxis: {
        categories: [],
        labels: {
            formatter: function() {
                return '<a id="month_selector" href="#" data-month-id="' +this.value +'">'+
                    this.value +'</a>';
            }
        }
    },
    yAxis: {
        title: {
            text: 'Sales Units'
        }
    },
    credits: false,
    series: [{
        name: 'Actual',
        data : []
    }, {
        name: 'Target',
        data: []
    }]
};

function loadStats() {
    var countries;

    $.ajax({
        type: 'GET',
        url: 'regional_stats_data',
        dataType: 'json',
        data: {},
        async: false,
        success: function(data) {
            $.each(data, function() {
                $.each(this, function(k, v) {
//                    console.log(v);
                    coMenu[k] = [];
                    coMenu[k]['name'] = v.name;

                    coMoData[k]  = jQuery.extend(true, {}, options); // clone my base chart
                    months[k] = v.months;
                    for (i = 0; i < v.months.length; i += 1) {
       //                 console.log(v.months.length);
    // console.log (coMoData[k]);

                        if (v.months[i].actualSales>0 && v.months[i].targetTotal>0) {
                            months[k][i].percentageEnd = v.months[i].actualSales / v.months[i].targetTotal *100;
                            months[k][i].percentageEnd = months[k][i].percentageEnd.toFixed(1);

                        }

                        coMoData[k].xAxis.categories.push(v.months[i].monthName);
                        coMoData[k].series[0].data.push(v.months[i].actualSales);
                        coMoData[k].series[1].data.push(v.months[i].targetTotal);
                    }
                });
            });
        }

    })
};

function setTemplate(month_id) {

    //     console.log(month_id);
    $('.country_name').html(coMenu[selectedCountry].name);

    var template = $('#monthlyStats').html();
    var html = Mustache.to_html(template, months[selectedCountry][month_id-1]);
    $('#sales_dashboard').html(html);
}

function setChart(c) {
//        console.log(months[0].actualSales);
    var chart = new Highcharts.Chart(coMoData[c]);
}

function redrawChart(c) {
//        console.log(months[0].actualSales);
    var chart = new Highcharts.Chart(coMoData[c]);
}

function buildCountryMenu() {
    var menu = '';
//    console.log(coMenu);

    for (i = 0; i < coMenu.length; i += 1) {

//            console.log(i);
            menu+='<li class="col-md-1"><a href=# data-country_id="'+i+'">'+ coMenu[i].name+'</a></li>';
    }

// console.log (menu);
    $('ul#country_menu').append(menu);
}


$(document).ready(function(){
    loadStats();
    if (firstTime) {
        setTemplate(1);
        setChart(selectedCountry);
        firstTime = false;
        buildCountryMenu();
    }

    var menu = $('ul#st_month_selection a');
    menu.click(function(elem) {
//        console.log(this.dataset.month_id);
        setTemplate(this.dataset.month_id);
        menu.parent().removeClass('active');

        $(this).parent().addClass('active');
    })

    var c_menu = $('ul#country_menu a');
    c_menu.click(function(elem) {
        console.log(this.dataset.country_id);
        selectedCountry = this.dataset.country_id;
        menu.parent().removeClass('active');
        $(this).parent().addClass('active');
        setTemplate(1);
        setChart(selectedCountry);

    })

//    console.log(months);
});

