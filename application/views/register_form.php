<?php

$attributes = array('class' => '', 'id' => '');

?>

<?php echo form_open('users', $attributes); ?>

	<legend>Register</legend>
	
	<label>User Name</label>
	<input id="user_name" type="text" name="user_name" maxlength="30" value="<?php echo set_value('user_name'); ?>"  />
	<?php echo form_error('user_name'); ?>

	<label>Email Address</label>
	<input id="email_address" type="text" name="email_address" maxlength="255" value="<?php echo set_value('email_address'); ?>"  />
	<?php echo form_error('email_address'); ?></b>
	
	<label>Password</label>
	<input id="password" type="password" name="password" maxlength="255" value="<?php echo set_value('password'); ?>"  />
	<?php echo form_error('password'); ?>

	<button type="submit" class="btn">Submit</button></td>

<?php echo form_close(); ?>

