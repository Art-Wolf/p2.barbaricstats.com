<?php

$attributes = array('class' => '', 'id' => '');

?>

<h1>User List</h1>

<ul>
<?php

foreach ($users as $user) :

?>
	<li><a href=""><?php echo $user->user_name; ?></a></li>
<?php

endforeach;

?>

</ul>
