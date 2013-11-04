var months = [];
var firstTime =  true;
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
    $.ajax({
        type: 'GET',
        url: 'monthly_stats',
        dataType: 'json',
        data: {},
        async: false,
        success: function(data) {
            months = data;


            for (i = 0; i < data.length; i += 1) {

                if (months[i].actualSales>0 && months[i].targetTotal>0) {
                    months[i].percentageEnd = months[i].actualSales / months[i].targetTotal *100;
                    months[i].percentageEnd = months[i].percentageEnd.toFixed(1);
                }

                options.xAxis.categories.push(months[i].monthName);
                options.series[0].data.push(months[i].actualSales);
                options.series[1].data.push(months[i].targetTotal);

            }
        }

    })
};
/*
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
}
*/

    function setTemplate(month_id) {

   //     console.log(month_id);
        var template = $('#monthlyStats').html();
        var html = Mustache.to_html(template, months[month_id-1]);
        $('#sales_dashboard').html(html);
    }

    function setChart() {
//        console.log(months[0].actualSales);
        var chart = new Highcharts.Chart(options);
    }


$(document).ready(function(){
loadStats();
if (firstTime) {
    setTemplate(1);
    setChart();
    firstTime = false;
}

var menu = $('ul#st_month_selection a');
    menu.click(function(elem) {
//        console.log(this.dataset.month_id);
        setTemplate(this.dataset.month_id);
        menu.parent().removeClass('active');

        $(this).parent().addClass('active');
    })
//    console.log(months);
});

