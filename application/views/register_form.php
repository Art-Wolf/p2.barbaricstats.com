<?php

$attributes = array('class' => '', 'id' => '');

?>

<?php echo form_open('users', $attributes); ?>

<table>
	<tr>
		<td>User Name</td>
		<td><input id="user_name" type="text" name="user_name" maxlength="30" value="<?php echo set_value('user_name'); ?>"  /></td>
		<td><b><?php echo form_error('user_name'); ?></b></td>
	</tr>
	<tr>
		<td>Email Address</td>
		<td><input id="email_address" type="text" name="email_address" maxlength="255" value="<?php echo set_value('email_address'); ?>"  /></td>
		<td><b><?php echo form_error('email_address'); ?></b></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><input id="password" type="password" name="password" maxlength="255" value="<?php echo set_value('password'); ?>"  /></td>
		<td><b><?php echo form_error('password'); ?></b></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" value="Submit" /></td>
	</tr>
</table>

<?php echo form_close(); ?>

