<?php

$attributes = array('class' => '', 'id' => '');

?>

<h1>Success</h1>

<p>You are now registered</p>

<table>
	<tr>
		<td>User Name</td>
		<td><?php echo set_value('user_name'); ?></td>
	</tr>
	<tr>
                <td>Email Address</td>
                <td><?php echo set_value('email_address'); ?></td>
        </tr>
</table>

