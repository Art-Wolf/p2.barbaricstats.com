<?php

$attributes = array('class' => '', 'id' => '');

?>

<h1>User List</h1>

<ul>
<?php

foreach ($users as $user) :

?>
	<li>
		<a href="/users/display/<?php echo $user->id; ?>"><?php echo $user->user_name; ?></a>
<?php
if ($this->session->userdata('user_id')) {
	if (is_null($user->followed_id)) {
?>
		<a href="/users/follow/<?php echo $user->id; ?>" class="btn btn-primary">Follow</a>
<?php
	} else {
?>
	        <a href="/users/unfollow/<?php echo $user->id; ?>" class="btn">Unfollow</a>
<?php
	}
}
?>
	</li>
<?php

endforeach;

?>

</ul>
