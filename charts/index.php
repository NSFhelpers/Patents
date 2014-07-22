<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>NSF Highcharts</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script type="text/javascript">
$(function () {
    var pchart;
    var gchart;
    
    $(document).ready(function() {
		
		var pOptions = 	{
			chart: {
	            renderTo: 'pcontainer',
	            type: 'line',
	            marginRight: 130,
				marginBottom: 25
	         },
	        title: {
				text: 'Patents per Year',
	            x: -20 //center
	        },
	        subtitle: {
				text: '',
	            x: -20
	        },
	        xAxis: {
				categories: []
	        },
	        yAxis: {
				title: {
					text: 'Amount'
	            },
	            plotLines: [{
					value: 0,
	                width: 1,
	                color: '#808080'
	            }]
	        },
	        tooltip: {
				formatter: function() {
					return '<b>'+ this.series.name +'</b><br/>'+ this.x +': '+ this.y;
	            }
	        },
	        legend: {
				layout: 'vertical',
	            align: 'right',
	            verticalAlign: 'top',
	            x: -10,
	            y: 100,
	            borderWidth: 0
	        },
	        series: [],
	        
	        plotOptions: {
				series: {
					cursor: 'pointer',
					point: {
						events: {
							click: function (e) {
								location.href = this.options.url;
							}
						}
					}
				}
			}
		}
		
        $.getJSON("pdata.php", function(json) {
			pOptions.xAxis.categories = json[0]['categories'];
			pOptions.series[0] = json[1];
		    pchart = new Highcharts.Chart(pOptions);
	    });
		
		
		var gOptions = {
			chart: {
				renderTo: 'gcontainer',
				type: 'line',
	            marginRight: 130,
	            marginBottom: 25
	        },
	        title: {
				text: 'Grants per Year',
	            x: -20 //center
	        },
	        subtitle: {
				text: '',
	            x: -20
	        },
	        xAxis: {
				categories: []
	        },
	        yAxis: {
				title: {
					text: 'Amount'
	            },
	            plotLines: [{
					value: 0,
	                width: 1,
					color: '#808080'
	            }]
	        },
	        tooltip: {
				formatter: function() {
					return '<b>'+ this.series.name +'</b><br/>'+ this.x +': '+ this.y;
	            }
	        },
	        legend: {
				layout: 'vertical',
	            align: 'right',
	            verticalAlign: 'top',
	            x: -10,
	            y: 100,
	            borderWidth: 0
	        },
	        series: [],
	        
	        plotOptions: {
				series: {
					cursor: 'pointer',
					point: {
						events: {
							click: function (e) {
								location.href = this.options.url;
							}
						}
					}
				}
			}
		}
		
		$.getJSON("gdata.php", function(json) {
			gOptions.xAxis.categories = json[0]['categories'];
            gOptions.series[0] = json[1];
			gchart = new Highcharts.Chart(gOptions);
	    });
		
    });
    
});

		</script>
		
		
	</head>
	<body>
  <script src="http://code.highcharts.com/highcharts.js"></script>
  <script src="http://code.highcharts.com/modules/exporting.js"></script>

<div id="pcontainer" style="min-width: 400px; height: 400px; margin: 0 auto"></div>

<div id="gcontainer" style="min-width: 400px; height: 400px; margin: 0 auto"></div>

	</body>
</html>
