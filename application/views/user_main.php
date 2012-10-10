<?php

$attributes = array('class' => '', 'id' => '');

?>

<h1>Logged In</h1>

<p>Welcome back <?php echo $this->session->userdata('user_name'); ?>.</p>

<h2>Personal Feed</h2>

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
