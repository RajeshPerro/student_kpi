$(document).ready(function() {

    console.log("got it");

    $('#std_search').click(function(){

        var sID = $("#linkonn").val();
        $.ajax({
            type: 'get',
            url: 'http://localhost/edu_kpi/graph_request.php?std_id='+sID,
            dataType: "json",
            error: function (data) {console.log(data)},
            success: function (data) {

               console.log(data);



               //console.log(hello.htmlcss);
                $('#graph_place').highcharts({
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: 'Strong Zone'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                }
                            }
                        }
                    },
                    series: [{
                        name: "Brands",
                        colorByPoint: true,
                        data: [{
                            name: "Html & CSS",
                            y: data.htmlcss
                        }, {
                            name: "Bootstrap",
                            y: data.bootstrap
                        }, {
                            name: "JS & Jquery",
                            y: data.js
                        }, {
                            name: "PHP & MySQL",
                            y: data.php
                        }, {
                            name: "Wordpress",
                            y: data.wordpress
                        }]
                    }]
                });


                //new graph start
                $('#graph_place2').highcharts({
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: 'Skills Result'
                    },

                    xAxis: {
                        categories: ['Html & CSS', 'Bootstrap', 'JS & Jquery', 'PHP & MySQL',
                            'Wordpress']
                    },
                    yAxis: {
                        title: {
                            text: 'Marks'
                        }
                    },
                    plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: true
                            },
                            enableMouseTracking: false
                        }
                    },
                    series: [{
                        name: 'skill name',
                        data: [data.htmlcss, data.bootstrap, data.js, data.php, data.wordpress]
                    }]
                });
                //end new graph
                var total_hours = [];
                var weeks = [];
                $.ajax({
                    type: 'get',
                    url: 'http://localhost/edu_kpi/weekly_worksnap.php?std_id=' + sID,
                    dataType: "json",
                    error: function (data) {
                        console.log(data)
                    },
                    success: function (data) {
                        //console.log("weekly worksnap");
                        console.log(data.length);

                        for(var i = 0; i< data.length ; i++)
                        {
                            //console.log(data[i].total+" "+data[i].week);
                            total_hours.push(parseFloat(data[i].total));
                            weeks.push(data[i].week);
                        }

                        console.log(total_hours);
                        //another graph
                        $('#graph_place3').highcharts({
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Weekly Worksnap Update'
                            },
                            xAxis: {
                                categories: weeks
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Hours'
                                },
                                stackLabels: {
                                    enabled: true,
                                    style: {
                                        fontWeight: 'bold',
                                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                                    }
                                }
                            },
                            legend: {
                                align: 'right',
                                x: -30,
                                verticalAlign: 'top',
                                y: 25,
                                floating: true,
                                backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                                borderColor: '#CCC',
                                borderWidth: 1,
                                shadow: false
                            },
                            tooltip: {
                                headerFormat: '<b>{point.x}</b><br/>',
                                pointFormat: 'Total: {point.stackTotal}'
                            },
                            plotOptions: {
                                column: {
                                    stacking: 'normal',
                                    dataLabels: {
                                        enabled: true,
                                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                                        style: {
                                            textShadow: '0 0 3px black'
                                        }
                                    }
                                }
                            },
                            series: [{
                                name: 'John',
                                data: total_hours
                            }]
                        });
                        //end up


                    }
                });


            }
        })
    });
});