var months = [];
var options = {
    chart: {
        type: 'column',
        renderTo:"test_chart"
    },
    title: {
        text: 'Month Sales'
    },
    xAxis: {
        categories: ['Jan', 'Feb']
    },
    yAxis: {
        title: {
            text: 'Sales Units'
        }
    },
    credits: false,
    series: [{
        events: {
            click: function(e) {
                location.href = e.point.options.url;
            }
        },
        name: 'Actual',
        data : []
    }, {
        name: 'Target',
        data: []
    }]
};

    $.getJSON('monthly_stats', function(data) {
                //  console.log(data);

            months = data;
console.log(data.length);
        for (i = 0; i < data.length; i += 1) {
            options.xAxis.categories.push(months[i].monthName);
            options.series[0].data.push(months[i].actualSales);
            options.series[1].data.push(months[i].targetTotal);

        }
    })
        .done(setTemplate)
        .fail(function( jqxhr, textStatus, error ) {
            var err = textStatus + ", " + error;
            console.log( "Request Failed: " + err );
        });

    function setTemplate(month_id) {

   //     console.log(month_id);
        if (month_id=='undefined') month_id=0;
        var template = $('#monthlyStats').html();
        var html = Mustache.to_html(template, months[month_id-1]);
        $('#sales_dashboard').html(html);


    }

    function setChart() {
        console.log(months[0].actualSales);
        var chart = new Highcharts.Chart(options);
    }










$(document).ready(function(){

var menu = $('ul#st_month_selection a');
    menu.click(function(elem) {
        console.log(this.dataset.month_id);
        setTemplate(this.dataset.month_id);
        menu.parent().removeClass('active');

        $(this).parent().addClass('active');
       setChart();
    })
//    console.log(months);
});

