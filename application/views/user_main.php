<?php

$attributes = array('class' => '', 'id' => '');

?>

<div class="container span1">
</div>

<div class="container span7">
	<h1>Followed Users Posts</h1>

<?php if (count($posts) < 1) { ?> 

<div class="well" style="background-color: rgb(245, 245, 245); ">
        <section>
                <div class="my-well">
                        <h3>No Followed Users</h3>
                </div>
        </section>
        <section>
                <div class="modal-header">
                        <p>Welcome to a pretty barbaric chat! To begin you should look up some users to follow - check out the <a href="/lists">User List</a> or check out the latest <a href="/wall">public posts</a>.</p>
                </div>
        </section>
</div>

<?php } else {

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
                                <a href="/posts/edit/<?php echo $msg->id; ?>" class="btn btn-mini btn-warning"><i class="icon-edit"></i></a>
                                <a href="/posts/delete/<?php echo $msg->id; ?>" class="btn btn-mini btn-warning"><i class="icon-trash"></i></a>
                        </span>
                        <?php } else { ?>
                        <span>
                                <a href="/karma/up/<?php echo $msg->id; ?>" class="btn btn-mini btn-success"><i class="icon-thumbs-up"></i><?php if ($msg->karma_up > 0) { echo $msg->karma_up;} ?></a>
                                <a href="/karma/down/<?php echo $msg->id; ?>" class="btn btn-mini btn-danger"><i class="icon-thumbs-down"></i><?php if ($msg->karma_down > 0) { echo $msg->karma_down;} ?></a>
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

}
?>
</div>
