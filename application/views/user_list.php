<?php

$attributes = array('class' => '', 'id' => '');

?>

<h1>User List</h1>

<table class="table table-hover">
<?php

foreach ($users as $user) :

?>
	<tr>
		<td><a class="pull-right" href="/users/display/<?php echo $user->id; ?>"><?php echo $user->user_name; ?></a></td>
		<?php if ($this->session->userdata('user_id')) { ?>
		<td>
		<?php if (is_null($user->followed_id)) { ?>
			<a href="/users/follow/<?php echo $user->id; ?>" class="btn btn-primary">Follow</a>
		<?php } else { ?>
	        	<a href="/users/unfollow/<?php echo $user->id; ?>" class="btn">Unfollow</a>
		<?php } ?>
		</td>
		<?php } ?>
	</tr>
<?php

endforeach;

?>
</table>
