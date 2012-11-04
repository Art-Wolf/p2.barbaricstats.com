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
					<li><a href="/">Home</a></li>
					<?php if($this->session->userdata('user_name')) { ?>
					<li><a href="/wall">Public</a></li>
					<?php } ?>
					<li><a href="/lists">User List</a></li>
					 <?php if($this->session->userdata('user_name')) { ?>
                                        <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Post <b class="caret"></b></a>
                                                <ul class="dropdown-menu">
                                                        <li><a href="/posts/">New</a></li>
                                                        <li><a href="/posts/history/">History</a></li>
                                                </ul>
                                        </li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">User Profile <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="/users/display/<?php echo $this->session->userdata('user_id'); ?>">View</a></li>
							<li><a href="/users/edit/">Edit</a></li>
						</ul>
					</li>
					<?php } ?>
				</ul>
				<ul class="nav pull-right">
				<?php if(!$this->session->userdata('user_name')) { ?>
					<li><a href="/users/signin">Signin</a></li>
					<li class="divider-vertical"></li>
					<li><a href="/users/register">Register</a></li>
				<?php } else { ?>
					<li><a href="/users/logout">Logout</a></li>
				<?php } ?>
				</ul>
				<form class="navbar-search pull-right" action="/search" method="post" accept-charset="utf-8" >
                                        <input id="search" name="search" type="text" class="search-query span2" placeholder="Search">
                                </form>
			</div>
		</div>
	</div>
</div>
<div class="container" style="margin-top: 40px">
	<header class="jumbotron subhead" id="overview">
		<div class="row">
			<div class="span12">
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
                text: 'Internet Facts Are Important Facts',
                x: -20
            },
            xAxis: {
                categories: ['<?php echo date('D', strtotime ( '-5 hour', time())); ?>', '<?php echo date('D', strtotime ( '-1 day -5 hour', time())); ?>', '<?php echo date('D', strtotime ( '-2 day -5 hour', time())); ?>', '<?php echo date('D', strtotime ( '-3 day -5 hour', time())); ?>', '<?php echo date('D', strtotime ( '-4 day -5 hour', time())); ?>', '<?php echo date('D', strtotime ( '-5 day -5 hour', time())); ?>', '<?php echo date('D', strtotime ( '-6 day -5 hour', time())); ?>']
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
                data: [
<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-5 hour', time())) . "' |awk '{print $1}' | sort | uniq | wc -l";

echo `$execute_string`;
?>
,<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-1 day -5 hour', time())) . "' |awk '{print $1}' | sort | uniq | wc -l";

echo `$execute_string`;
?>
,<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-2 day -5 hour', time())) . "' |awk '{print $1}' | sort | uniq | wc -l";

echo `$execute_string`;
?>
,<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-3 day -5 hour', time())) . "' |awk '{print $1}' | sort | uniq | wc -l";

echo `$execute_string`;
?>
,<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-4 day -5 hour', time())) . "' |awk '{print $1}' | sort | uniq | wc -l";

echo `$execute_string`;
?>
,<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-5 day -5 hour', time())) . "' |awk '{print $1}' | sort | uniq | wc -l";

echo `$execute_string`;
?>
,<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-6 day -5 hour', time())) . "' |awk '{print $1}' | sort | uniq | wc -l";

echo `$execute_string`;
?>
]
            }, {
                name: 'User Login',
                data: [
<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-5 hour', time())) . "' |grep 'POST /users/signin' |awk '{print $1}' | sort | uniq | wc -l";

echo `$execute_string`;
?>
,<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-1 day -5 hour', time())) . "' |grep 'POST /users/signin' |awk '{print $1}' | sort | uniq | wc -l";

echo `$execute_string`;
?>
,<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-2 day -5 hour', time())) . "' |grep 'POST /users/signin' |awk '{print $1}' | sort | uniq | wc -l";

echo `$execute_string`;
?>
,<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-3 day -5 hour', time())) . "' |grep 'POST /users/signin' |awk '{print $1}' | sort | uniq | wc -l";

echo `$execute_string`;
?>
,<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-4 day -5 hour', time())) . "' |grep 'POST/users/signin' |awk '{print $1}' | sort | uniq | wc -l";

echo `$execute_string`;
?>
,<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-5 day -5 hour', time())) . "' |grep 'POST /users/signin' |awk '{print $1}' | sort | uniq | wc -l";

echo `$execute_string`;
?>
,<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-6 day -5 hour', time())) . "' |grep 'POST /users/signin' |awk '{print $1}' | sort | uniq | wc -l";

echo `$execute_string`;
?>]
            }, {
                name: 'User Post',
                data: [
<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-5 hour', time())) . "' |grep 'POST /posts' |awk '{print $1}'  | wc -l";

echo `$execute_string`;
?>
,<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-1 day -5 hour', time())) . "' |grep 'POST /posts' |awk '{print $1}'  | wc -l";

echo `$execute_string`;
?>
,<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-2 day -5 hour', time())) . "' |grep 'POST /posts' |awk '{print $1}'  | wc -l";

echo `$execute_string`;
?>
,<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-3 day -5 hour', time())) . "' |grep 'POST /posts' |awk '{print $1}'  | wc -l";

echo `$execute_string`;
?>
,<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-4 day -5 hour', time())) . "' |grep 'POST/posts' |awk '{print $1}'  | wc -l";

echo `$execute_string`;
?>
,<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-5 day -5 hour', time())) . "' |grep 'POST /posts' |awk '{print $1}'  | wc -l";

echo `$execute_string`;
?>
,<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-6 day -5 hour', time())) . "' |grep 'POST /posts' |awk '{print $1}'  | wc -l";

echo `$execute_string`;
?>]
            }, {
                name: 'User Karma',
                data: [
<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-5 hour', time())) . "' |grep 'GET /karma/' |awk '{print $1}'  | wc -l";

echo `$execute_string`;
?>
,<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-1 day -5 hour', time())) . "' |grep 'GET /karma/' |awk '{print $1}'  | wc -l";

echo `$execute_string`;
?>
,<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-2 day -5 hour', time())) . "' |grep 'GET /karma/' |awk '{print $1}'  | wc -l";

echo `$execute_string`;
?>
,<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-3 day -5 hour', time())) . "' |grep 'GET /karma/' |awk '{print $1}'  | wc -l";

echo `$execute_string`;
?>
,<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-4 day -5 hour', time())) . "' |grep 'POST/posts' |awk '{print $1}'  | wc -l";

echo `$execute_string`;
?>
,<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-5 day -5 hour', time())) . "' |grep 'GET /karma/' |awk '{print $1}'  | wc -l";

echo `$execute_string`;
?>
,<?php
$execute_string = "cat /home/artwolf/barbaricstatslogs/access.log  | grep '\[" . date('d/M/Y', strtotime ( '-6 day -5 hour', time())) . "' |grep 'GET /karma/' |awk '{print $1}'  | wc -l";

echo `$execute_string`;
?>]
            }]
        });
    });
    
});</script>
			</div>
		</div>
	</header>
	<section id="public-post">
