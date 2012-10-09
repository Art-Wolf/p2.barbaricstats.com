<?php

$attributes = array('class' => '', 'id' => '');

?>

<h1>Latest Public Posts</h1>

<?php

foreach ($posts as $msg) :

?>
	<blockquote>
		<p><?php echo $msg->message; ?></p>
		<small><?php echo $msg->user_name; ?> </small>
	</blockquote>
<?php

endforeach;

?>
