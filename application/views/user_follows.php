<?php

$attributes = array('class' => '', 'id' => '');

?>

<h1>User List</h1>

<ul>
<?php

if (count($follows) == 0 ) {
	?>
	<li>No current users being followed.</li>
	<?php
}
else {
	foreach ($follows as $user) :

	?>
	<li><a href="/users/display/<?php echo $user->id; ?>"><?php echo $user->user_name; ?></a></li>
	<?php

	endforeach;
}

?>

</ul>
