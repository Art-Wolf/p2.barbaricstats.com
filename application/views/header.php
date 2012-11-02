<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="John Doyle" />
	<meta name="keywords" content="csci e-75" />
	<meta name="description" content="A demonstration of a twitter like website." />
	<meta name="robots" content="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="/css/united.min.css" rel="stylesheet">

	<script src="/js/jquery-1.8.2.min.js" type="text/javascript"></script>
	<script src="/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/js/jqcloud-1.0.0.min.js" type="text/javascript"></script>

	<title>Barbaicstats!</title>
</head>
<body>
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>

			<a class="brand" href="/">Barbaric Chats</a>

			<div class="nav-collapse">
				<ul class="nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#">Link</a></li>
					<li><a href="#">Link</a></li>
					<li><a href="#">Link</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li class="divider"></li>
							<li><a href="#">Separated link</a></li>
						</ul>
					</li>
				</ul>
				<form class="navbar-search pull-left" action="">
					<input type="text" class="search-query span2" placeholder="Search">
				</form>
				<ul class="nav pull-right">
					<li><a href="/users/signin">Signin</a></li>
					<li class="divider-vertical"></li>
					<li><a href="/users/register">Register</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="container" style="margin-top: 40px">
	<header class="jumbotron subhead" id="overview">
		<div class="row">
			<div class="span12">
				<h1>Superhero</h1>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

<div id="container" style="min-width: 400px; height: 200px; margin: 0 auto"></div>
<script>
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'line',
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Statistics',
                x: -20 //center
            },
            subtitle: {
                text: 'Internet Facts',
                x: -20
            },
            xAxis: {
                categories: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
            },
            yAxis: {
                title: {
                    text: 'Count'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y;
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
            series: [{
                name: 'Visitor',
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2]
            }, {
                name: 'User Login',
                data: [0, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8]
            }, {
                name: 'User Post',
                data: [0, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6]
            }, {
                name: 'User Karma',
                data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0]
            }]
        });
    });
    
});</script>
			</div>
		</div>
	</header>
	<section id="public-post">
