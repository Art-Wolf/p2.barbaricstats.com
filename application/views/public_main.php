<?php

$attributes = array('class' => '', 'id' => '');

?>
<div class="container span4">
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

<div class="container span1">
</div>

<div class="container span7">
	<h1>Latest Public Posts</h1>

<?php

$posts = array_reverse($posts);

foreach ($posts as $msg) :

?>

<div class="well" style="background-color: rgb(245, 245, 245); ">
	<section>
		<div class="my-well">
			<h3><a href="/users/display/<?php echo $msg->user_id; ?>"><?php echo $msg->user_name; ?></a></h3>
			<span>
                                <button class="btn btn-mini btn-success"><i class="icon-thumbs-up"><?php if ($msg->karma_up > 0) { echo $msg->karma_up;} ?></i></a>
                                <button class="btn btn-mini btn-danger"><i class="icon-thumbs-down"><?php if ($msg->karma_down > 0) { echo $msg->karma_down;} ?></i></a>
                        </span>
		</div>
	</section>
	<section>
		<div class="modal-header">
			<p><?php echo $msg->message; ?></p>
		</div>
	</section>
	<section>
		<div class="my-well">
			<span><?php echo date('F d, Y h:mA', strtotime($msg->insert_tmstmp)); ?></span>
		</div>
	</section>
</div>

<?php

endforeach;

?>
</div>
