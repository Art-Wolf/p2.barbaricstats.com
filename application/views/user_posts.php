<?php

$attributes = array('class' => '', 'id' => '');

?>

<h1>Profile</h1>

<div class="container span12">
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

<div class="container span12">
	<h1>Personal Posts</h1>

<?php

$posts = array_reverse($posts);

foreach ($posts as $msg) :

?>

<div class="well" style="background-color: rgb(245, 245, 245); ">
	<section>
		<div class="my-well">
			<h3><a href="/users/display/<?php echo $msg->user_id; ?>"><?php echo $msg->user_name; ?></a></h3>
<?php
                        if ($this->session->userdata('user_name')) {
                                if ($this->session->userdata('user_name') == $msg->user_name) {
                        ?>
                        <span>
                                <a href="/posts/edit/<?php echo $msg->id; ?>"><i class="icon-edit"></i></a>
                                <a href="/posts/delete/<?php echo $msg->id; ?>"><i class="icon-trash"></i></a>
                        </span>
                        <?php } else { ?>
                        <span>
                                <a href="/karma/up/<?php echo $msg->id; ?>"><i class="icon-thumbs-up"></i></a>
                                <a href="/karma/down/<?php echo $msg->id; ?>"><i class="icon-thumbs-down"></i></a>
                        </span>
			<?php } } ?>
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
