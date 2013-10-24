$(function () {
    
        var colors = Highcharts.getOptions().colors,
            categories = ['Something....'],
            name = 'Something else....',
            data = [{
	                    y: 51.11,
	                    color: colors[0],
	                    drilldown: {
	                        name: 'Year',
	                        categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September'],
	                        data: [8.33, 8.33, 8.33, 8.33, 8.33, 8.33, 3, 8.33, 18],
	                        color: colors[0]
	                    }
	                }];
    
    
        // Build the data arrays
        var browserData = [];
        var versionsData = [];
        for (var i = 0; i < data.length; i++) {
    
            // add browser data
            browserData.push({
                name: categories[i],
                y: data[i].y,
                color: data[i].color
            });
    
            // add version data
            for (var j = 0; j < data[i].drilldown.data.length; j++) {
                var brightness = 0.2 - (j / data[i].drilldown.data.length) / 5 ;
                versionsData.push({
                    name: data[i].drilldown.categories[j].toUpperCase(),
                    y: data[i].drilldown.data[j],
                    color: Highcharts.Color(data[i].color).brighten(brightness).get()
                });
            }
        }
    
        // Create the chart
        $('#big_pie').highcharts({
            chart: {
                type: 'pie',
                backgroundColor: '#272A2D'
            },
            title: {
                text: ''
            },
            credits: false,
            yAxis: {
                title: {
                    text: 'blah123'
                }
            },
            plotOptions: {
                pie: {
                    shadow: false,
                    center: ['50%', '50%'],
                    borderColor: '#272A2D',
                    allowPointSelect: true
                }
            },
            tooltip: {
        	    useHTML: true,
                headerFormat: '<table class="tooltip_table">',
                pointFormat: '<tr class="top"><td>236</td><td>500</td><td>13<sup>%</sup></td></tr><tr class="bottom"><td>Predicted Sales</td><td>Actual Sales</td><td>Increase</td></tr>',
                footerFormat: '</table>',
                backgroundColor: '#fff',
                borderColor: '#fff'
            },
            series: [{
                name: '456852753159',
                data: versionsData,
                size: '80%',
                innerSize: '70%',
                dataLabels: {
                    color: '#56C6FF',
                    connectorWidth: 0,
                    connectorPadding: -20,
                    style: {
                        fontSize: '12px'
                    }
                }
            }]
        });

    $('.little_pie_1').highcharts({
        chart: {
            type: 'pie',
            backgroundColor: '#F2F2F2'
        },
        title: {
            text: ''
        },
        credits: false,
        yAxis: {
            title: {
                text: 'blah123'
            }
        },
        plotOptions: {
            pie: {
                shadow: false,
                center: ['50%', '50%'],
                borderColor: '#F2F2F2'
            }
        },
        tooltip: {
            enabled: false
        },
        series: [{
                data: [{
                    y: 20,
                    color: '#323d31'
                }],
                dataLabels: {enabled: false},
                size: '70%',
                borderColor: '#323d31'
            },{
            name: '456852753159',
            data: [
                65,
                {
                    y: 35,
                    color: '#F2F2F2'
                }
            ],
            size: '80%',
            innerSize: '70%',
            dataLabels: {
                enabled: false
            }
        }]
    });
    $('.little_pie_2').highcharts({
        chart: {
            type: 'pie',
            backgroundColor: '#F2F2F2'
        },
        title: {
            text: ''
        },
        credits: false,
        yAxis: {
            title: {
                text: 'blah123'
            }
        },
        plotOptions: {
            pie: {
                shadow: false,
                center: ['50%', '50%'],
                borderColor: '#F2F2F2'
            }
        },
        tooltip: {
            enabled: false
        },
        series: [{
                data: [{
                    y: 20,
                    color: '#323d31'
                }],
                dataLabels: {enabled: false},
                size: '70%',
                borderColor: '#323d31'
            },{
            name: '456852753159',
            data: [
                65,
                {
                    y: 35,
                    color: '#F2F2F2'
                }
            ],
            size: '80%',
            innerSize: '70%',
            dataLabels: {
                enabled: false
            }
        }]
    });





});

