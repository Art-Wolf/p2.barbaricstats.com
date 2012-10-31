<?php

$attributes = array('class' => '', 'id' => '');

?>

<h1>Users Posts</h1>

<div class="row-fluid well well-large">
	<div class="span1">
		<div class="pagination-centered"><img src="/img/user.png" width="60px" class="img-rounded"></div>
	</div>

	<div class="span5">
		<dl class="dl-horizontal">
			<dt>User Name</dt>
			<dd>TBD</dd>
			<dt>Location</dt>
			<dd>TBD</db>
			<dt>Home Page</dt>
			<dd>TBD</dd>
			<dt>Messages</dt>
			<dd><?php echo count($posts); ?></dd>
			<dt>Followers</dt>
			<dd>TBD</dd>
			<dt>Follows</dt>
			<dd>TBD</dd>
			<dt>Last Login</dt>
			<dd>TBD</dd>
			<dt>Message to the World!</dt>
			<dd>Something or other...</dd>
		</dl>
	</div>
</div>

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
