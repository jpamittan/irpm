jQuery(document).ready(function() {
    //------------------------------
    // Date Range Picker
    //------------------------------
    $('#daterangepicker2').daterangepicker({
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
            'Last 7 Days': [moment().subtract('days', 6), moment()],
            'Last 30 Days': [moment().subtract('days', 29), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
        },
        opens: 'right',
        startDate: moment().subtract('days', 29),
        endDate: moment()
    },
    function(start, end) {
        $('#daterangepicker2 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    });
    //------------------------------
    // Switch
    //------------------------------
    Switchery(document.querySelector('.js-switch-success'), {color: Utility.getBrandColor('success')});
    //------------------------------
    // Easy Pie Charts
    //------------------------------
    try {
        $('.easypiechart#bandwidth').easyPieChart({
            barColor: "rgba(255, 255, 255, 0.6)",
            trackColor: 'rgba(255, 255, 255, 0.2)',
            scaleColor: 'rgba(255, 255, 255, 0.8)',
            scaleLength: 0,
            lineCap: 'square',
            lineWidth: 4,
            size: 80,
            onStep: function(from, to, percent) {
                $(this.el).find('.percent').text(Math.round(percent));
            }
        });
        $('.easypiechart#ramusage').easyPieChart({
            barColor: "rgba(255, 255, 255, 0.6)",
            trackColor: 'rgba(255, 255, 255, 0.2)',
            scaleColor: 'rgba(255, 255, 255, 0.8)',
            scaleLength: 0,
            lineCap: 'square',
            lineWidth: 4,
            size: 80,
            onStep: function(from, to, percent) {
                $(this.el).find('.percent').text(Math.round(percent));
            }
        });
        $('.easypiechart#serverload').easyPieChart({
            barColor: "rgba(255, 255, 255, 0.6)",
            trackColor: 'rgba(255, 255, 255, 0.2)',
            scaleColor: 'rgba(255, 255, 255, 0.8)',
            scaleLength: 0,
            lineCap: 'square',
            lineWidth: 4,
            size: 80,
            onStep: function(from, to, percent) {
                $(this.el).find('.percent').text(Math.round(percent));
            }
        });
        $('.easypiechart#space').easyPieChart({
            barColor: "rgba(255, 255, 255, 0.6)",
            trackColor: 'rgba(255, 255, 255, 0.2)',
            scaleColor: 'rgba(255, 255, 255, 0.8)',
            scaleLength: 0,
            lineCap: 'square',
            lineWidth: 4,
            size: 80,
            onStep: function(from, to, percent) {
                $(this.el).find('.percent').text(Math.round(percent));
            }
        });
        $('#updatePieCharts').on('click', function() {
            $('.easypiechart#bandwidth').data('easyPieChart').update(Math.random()*100);
            $('.easypiechart#ramusage').data('easyPieChart').update(Math.random()*100);
            $('.easypiechart#serverload').data('easyPieChart').update(Math.random()*100);
            $('.easypiechart#space').data('easyPieChart').update(Math.random()*100);
            return false;
        });
    }
    catch(error) {}
    //------------------------------
    // Maps
    //------------------------------
    $mapusa = $(".map-world");
 	$mapusa.mapael({
		map : {
			name : "usa_states",
			zoom: {
				enabled: true,
				maxLevel : 10
			}
		},
		plots: {
			'ny' : {
				latitude: 40.717079,
                longitude: -74.00116,
                value : 200001, 
                tooltip: {content : "New York<br />Submissions: 530,000,000"}
			},
			'io' : {
				latitude :42.032974, 
                longitude :-93.581543, 
                value : 500000000, 
                tooltip: {content : "Iowa<br />Submissions: 500,000,000"}
			},
			'sf' : {
				latitude: 37.792032,
				longitude: -122.394613,
                value : 12000, 
                tooltip: {content : "San Francisco<br />Submissions: 600,000"}
			},
			'pa' : {
				latitude: 19.493204,
				longitude: -154.8199569,
                value : 450, 
                tooltip: {content : "Pahoa<br />Submissions: 600,000"}
            },
            'lo' : {
                latitude :30.391830, 
                longitude :-92.329102, 
                value : 600000, 
                tooltip: {content : "Louisiana<br />Submissions: 600,000"}
            },
            'mo' : {
                latitude :46.965260, 
                longitude :-109.533691, 
                value : 200000001, 
                tooltip: {content : "Montana<br />Submissions: 200,000,001"}
            },
            'or': {
                latitude :44.000000, 
                longitude :-120.500000, 
                value : 200001, 
                tooltip: {content : "Oregon<br />Submissions: 200,001"}
            }
		}
	});
	// Zoom on mousewheel with mousewheel jQuery plugin
	// $mapusa.on("mousewheel", function(e) {
	// 	if (e.deltaY > 0) {
	// 		$mapusa.trigger("zoom", $mapusa.data("zoomLevel") + 1);
	// 		console.log("zoom");
	// 	} else {
	// 		$mapusa.trigger("zoom", $mapusa.data("zoomLevel") - 1);
	// 	}
			
	// 	return false;
	// });
    //------------------------------
    // Flot
    //------------------------------
    var d1 = [];
    for (var i = 0; i <= 30; i += 1) {
        d1.push([i, parseInt(Math.random() * 70 + 135)]);
    }
    var d2 = [];
    for (var i = 0; i <= 30; i += 1) {
        d2.push([i, parseInt(Math.random() * 20) + 5]);
    }
    var d3 = [];
    for (var i = 0; i <= 30; i += 1) {
        d3.push([i, parseInt(Math.random() * 70 + 40)]);
    }
    var stack = false,
        bars = true,
        lines = true,
        steps = false;
    function plotWithOptions() {
        $.plot("#visitors-stats", [{
                data: d1, 
                label: "Quote",
                lines: {
                    show: lines,
                    fill: 0.1,
                    steps: steps,
                    lineWidth: 1.25
                },
                points: {
                    show: true,
                    radius: 2.5
                }
            }, {
                data: d2, 
                label: "Refer",
                lines: {
                    show: lines,
                    fill: 0.1,
                    steps: steps,
                    lineWidth: 1.25
                },
                points: {
                    show: true,
                    radius: 2.5
                }
            }, {
                data: d3, 
                label: "Decline",
                lines: {
                    show: lines,
                    fill: 0.1,
                    steps: steps,
                    lineWidth: 1.25
                },
                points: {
                    show: true,
                    radius: 2.5
                }
            }], {
            series: {
                shadowSize: 0,
                stack: stack
            },
            grid: {
                labelMargin: 10,
                hoverable: true,
                clickable: true,
                borderWidth: 0,
                borderColor: 'rgba(0, 0, 0, 0.06)'
            },
            yaxis: { 
                tickColor: 'rgba(0, 0, 0, 0.04)', 
                font: {
                    color: 'rgba(0, 0, 0, 0.4)'
                }
            },
            xaxis: { 
                tickColor: 'rgba(0, 0, 0, 0.04)',
                tickDecimals: 0,
                ticks: 20,
                font: {
                    color: 'rgba(0, 0, 0, 0.4)'
                }
            },
            colors: ["#52cda0", "#72a7d3", "#e98a72"],
            tooltip: true,
            tooltipOpts: {
                content: "%s: %y"
            }
        });
    }
    plotWithOptions();
    // flot 2
    var do1 = [];
    var do2 = [];
    var do3 = [];
    for (var i = 1; i < 13; i++) {
        do1.push([i, parseInt(Math.random() * 30 + 20)]);
        do2.push([i, parseInt(Math.random() * 30 + 10)]);
        do3.push([i, parseInt(Math.random() * 10 + 10)]);
    }
    var dos = new Array();
    dos.push({
        data:do1,
        label: "Quote",
        bars: {
            show: true,
            barWidth: 0.125,
            lineWidth: 1,
            fill: 0.4,
            order: 1
        }
    });
    dos.push({
        data:do2,
        label: "Refer",
        bars: {
            show: true,
            barWidth: 0.125,
            lineWidth: 1,
            fill: 0.4,
            order: 2,
        }
    });
    dos.push({
        data:do3,
        label: "Decline",
        bars: {
            show: true,
            barWidth: 0.1,
            lineWidth: 1,
            fill: 0.4,
            order: 3,
        }
    });
    var stack = false,
        bars = true,
        lines = true,
        steps = false;
    function plotWithOptions2() {
        $.plot($("#revenues-stats"), dos, {
            series: {
                bars: {
                    show: true,
                    //lineWidth: 0.75
                }
            },
            grid: {
                labelMargin: 10,
                hoverable: true,
                clickable: true,
                tickColor: 'rgba(0, 0, 0, 0.06)',
                borderWidth: 0,
                borderColor: 'rgba(0, 0, 0, 0.06)'
            },
            colors: ["#52cda0", "#72a7d3", "#e98a72"],
            tooltip: true,
            tooltipOpts: {
                content: "%s: %y"
            },
            xaxis: {
                autoscaleMargin: 0.05,
                tickColor: 'rgba(0, 0, 0, 0.00)',
                ticks: [[1, "Jan"], [2, "Feb"], [3, "Mar"], [4, "Apr"],[5, "May"], [6, "Jun"], [7, "Jul"], [8, "Aug"],[9, "Sep"], [10, "Oct"], [11, "Nov"], [12, "Dec"]],
                tickDecimals: 0,
                font: {
                    color: 'rgba(0, 0, 0, 0.4)'
                }
            },
            yaxis: {
                tickColor: 'rgba(0, 0, 0, 0.04)',
                font: {
                    color: 'rgba(0, 0, 0, 0.4)'
                },
                tickFormatter: function (val, axis) {
                    return val;
                }
            },
        });
    }
    plotWithOptions2();
});
//Info Tiles: Sparkline Variant
$("#tileorders").sparkline([112,182,130,191,75,214,159,138,156,120], {
    type: 'bar',
    barColor: 'rgba(255, 255, 255, 0.3)',
    barSpacing: 1,
    height: '13',
    barWidth: 3
});
$("#tilemembers").sparkline([41,38,73,49,51,20,55,13,35,23], {
    type: 'bar',
    barColor: 'rgba(255, 255, 255, 0.3)',
    barSpacing: 1,
    height: '13',
    barWidth: 3
});
$("#tiletickets").sparkline([50,100,78], { 
    type: 'pie',
    sliceColors: ['rgba(255, 255, 255, 0.75)','rgba(255, 255, 255, 0.5)','rgba(255, 255, 255, 0.25)'],
    height: '13',
    width: '13'
});
$("#tilerevenues").sparkline([11270,17257,15014,13107,15538,13439,17915,23874,16677,12003], {
    type: 'line',
    lineColor: 'rgba(255, 255, 255, 0.3)',
    lineWidth: '1.5',
    fillColor: 'transparent',
    height: '13',
    minSpotColor: false,
    maxSpotColor: false,
    spotColor: false,
    spotRadius: '0',
    highlightSpotColor: '#fff',
    highlightLineColor: '#fff',
    width: '40'
});
$("#tileprofits").sparkline([412,382,130,191,215,204,559,738,456,239], {
    type: 'line',
    lineColor: 'rgba(255, 255, 255, 0.3)',
    lineWidth: '1.5',
    fillColor: 'transparent',
    height: '13',
    minSpotColor: false,
    maxSpotColor: false,
    spotColor: false,
    spotRadius: '0',
    highlightSpotColor: '#fff',
    highlightLineColor: '#fff',
    width: '48'
});
