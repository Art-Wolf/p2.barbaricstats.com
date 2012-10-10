<?php

$attributes = array('class' => '', 'id' => '');

?>

<h1>Latest Public Posts</h1>

<?php

$posts = array_reverse($posts);

foreach ($posts as $msg) :

?>
	<blockquote>
		<p><?php echo $msg->message; ?></p>
		<small><?php echo $msg->user_name; ?> - <?php echo $msg->insert_tmstmp; ?></small>
	</blockquote>
<?php

endforeach;

?>
