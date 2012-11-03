<?php

$attributes = array('class' => '', 'id' => '');

?>

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
			<span>
				<?php if ($this->session->userdata('user_id') == $msg->user_id) { ?>
                                <a href="/posts/edit/<?php echo $msg->id; ?>" class="btn btn-mini btn-warning"><i class="icon-edit"></i></a>
                                <a href="/posts/delete/<?php echo $msg->id; ?>" class="btn btn-mini btn-warning"><i class="icon-trash"></i></a>
				<?php } if (($this->session->userdata('user_id')) && $this->session->userdata('user_id') != $msg->user_id) {  ?>
				<a href="/karma/up/<?php echo $msg->id; ?>" class="btn btn-mini btn-success"><i class="icon-thumbs-up"></i><?php if ($msg->karma_up > 0) { echo $msg->karma_up;} ?></a>
                                <a href="/karma/down/<?php echo $msg->id; ?>" class="btn btn-mini btn-danger"><i class="icon-thumbs-down"></i><?php if ($msg->karma_down > 0) { echo $msg->karma_down;} ?></a>
				<?php } else { ?>
                                <button class="btn btn-mini btn-success"><i class="icon-thumbs-up"></i><?php if ($msg->karma_up > 0) { echo $msg->karma_up;} ?></button>
                                <button class="btn btn-mini btn-danger"><i class="icon-thumbs-down"></i><?php if ($msg->karma_down > 0) { echo $msg->karma_down;} ?></button>
				<?php } ?>
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
