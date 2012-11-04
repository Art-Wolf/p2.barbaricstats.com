<?php

$attributes = array('class' => '', 'id' => '');

?>
<div class="container span4">
	<div class="nav-panel">
		<h1>Karma Stats</h1>
		<div class="span3" id="karmastats"></div>
<?php
$day_index = 0;
$column_up = "";
$column_down = "";
$total_up_count = 0;
$total_down_count = 0;

foreach($karma as $daily_karma) {
        while ($daily_karma->day != date('l', strtotime ( '-' . $day_index . ' day -5 hour', time()))) {
                if (empty($column_up)) {
                        $column_up = "0,";
                } else {
                        $column_up .= "0";
			if ($day_index < 7) {
                                $column_up .= ",";
                        }
                }

                if (empty($column_down)) {
                        $column_down = "0,";
                } else {
                        $column_down .= "0";
			if ($day_index < 7) {
                        	$column_down .= ",";
			}
                }

                $day_index++;

                if ($day_index > 7) {
                        break;
                }
        }

        if (empty($column_up)) {
                $column_up = $daily_karma->up_count;
        } else {
                $column_up .= $daily_karma->up_count;
        }

        if (empty($column_down)) {
                $column_down = $daily_karma->down_count;
        } else {
                $column_down .= $daily_karma->down_count;
        }

        if ($day_index < 7) {
                $column_up .= ",";
                $column_down .= ",";
                $day_index++;
        }

	$total_up_count += $daily_karma->up_count;
	$total_down_count += $daily_karma->down_count;
}

while ($day_index < 8) {
        if ($day_index < 7) {
                $column_up .= "0,";
                $column_down .= "0,";
        } else {
                $column_up .= "0";
                $column_down .= "0";
        }

        $day_index++;
}
?>
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'karmastats'
            },
            title: {
                text: 'Daily Breakdown'
            },
            xAxis: {
                categories: ['<?php echo date('D', strtotime ( '-5 hour', time())); ?>', '<?php echo date('D', strtotime ( '-1 day -5 hour', time())); ?>', '<?php echo date('D', strtotime ( '-2 day -5 hour', time())); ?>', '<?php echo date('D', strtotime ( '-3 day -5 hour', time())); ?>', '<?php echo date('D', strtotime ( '-4 day -5 hour', time())); ?>', '<?php echo date('D', strtotime ( '-5 day -5 hour', time())); ?>', '<?php echo date('D', strtotime ( '-6 day -5 hour', time())); ?>',]
            },
            tooltip: {
                formatter: function() {
                    var s;
                    if (this.point.name) { // the pie chart
                        s = ''+
                            this.point.name +': '+ this.y +' karma';
                    } else {
                        s = ''+
                            this.x  +': '+ this.y;
                    }
                    return s;
                }
            },
            labels: {
                items: [{
                    html: 'Weekly Breakdown',
                    style: {
                        left: '40px',
                        top: '8px',
                        color: 'black'
                    }
                }]
            },
            series: [{
                type: 'column',
                name: 'Up',
                data: [<?php echo $column_up; ?>]
            }, {
                type: 'column',
                name: 'Down',
                data: [<?php echo $column_down; ?>]
            }, {
                type: 'pie',
                name: 'Total consumption',
                data: [{
                    name: 'Up',
                    y: <?php echo $total_up_count; ?>,
                    color: '#4572A7' // Up color
                }, {
                    name: 'Down',
                    y: <?php echo $total_down_count; ?>,
                    color: '#AA4643' // Down color
                }],
                center: [100, 80],
                size: 100,
                showInLegend: false,
                dataLabels: {
                    enabled: false
                }
            }]
        });
    });
    
});
</script>
	</div>
	<div class="nav-panel">
		<h1>Word Cloud</h1>
		<div class="span3" id="wordcloud"></div>
<script type="text/javascript">
var word_list = new Array(
<?php

$wordcloud = array();

foreach ($posts as $msg) :
	$words = explode(" ",$msg->message);

	foreach ($words as $word) :
		array_push($wordcloud, $word);
	endforeach;
endforeach;


$wordcloud = array_count_values($wordcloud);
$last_key = end(array_keys($wordcloud));

$ordered_weight_array = array();

foreach ($wordcloud as $word => $weight) :

if ($last_key != $word) {
?>
        {text: "<?php echo $word; ?>", weight: <?php echo $weight; ?>, link: "/search/tag/<?php echo $word; ?>"},
<?php
} else {
?>
        {text: "<?php echo $word; ?>", weight: <?php echo $weight; ?>, link: "/search/tag/<?php echo $word; ?>"}
<?php
}

endforeach;

?>
      );
      $(document).ready(function() {
        $("#wordcloud").jQCloud(word_list);
      });
</script>
<style type="text/css">

	#karmastats {
		width: 300px;
		margin: 30px auto;
		border: none;
	}

      #wordcloud {
        margin: 30px auto;
        width: 200px;
        height: 100px;
        border: none;
      }

<?php

$word_index = 0;

arsort($wordcloud);

foreach ($wordcloud as $key => $value) :
$color = array("990000", "d0d571", "7b2ce4", "6a2683", "aa6cbc", "029607", "132e11", "7ec642", "fd5ff8", "4ded89", "e68b39");
?>
#wordcloud_word_<?php echo $word_index; ?> a { font-size: <?php echo $value; ?>00%; color: #<?php echo $color[$value % count($color)]; ?>;} 
<?php
$word_index++;
endforeach;

?>

      #wordcloud span.w10, #wordcloud span.w9, #wordcloud span.w8, #wordcloud span.w7 {
        text-shadow: 0px 1px 1px #ccc;
      }
      #wordcloud span.w3, #wordcloud span.w2, #wordcloud span.w1 {
        text-shadow: 0px 1px 1px #fff;
      }
    </style>
	</div>
</div>
