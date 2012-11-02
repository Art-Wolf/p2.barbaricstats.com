<?php

$attributes = array('class' => '', 'id' => '');

?>

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
