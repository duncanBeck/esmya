$(function () {


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