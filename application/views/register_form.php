<?php

$attributes = array('class' => '', 'id' => '');

?>

<?php echo form_open_multipart('users/register', $attributes); ?>

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

	<label>Home Page</label>
        <input id="website" type="text" name="website" maxlength="255" value="<?php echo set_value('website'); ?>"  />
        <?php echo form_error('website'); ?>

	<label>Bio</label>
        <textarea id="bio" name="bio" class="field span12" id="textarea" rows="4" placeholder="Who? What? Where? WHY?!"><?php echo set_value('bio'); ?></textarea>
        <?php echo form_error('bio'); ?>

	<label>Photo</label>
	<input type="file" id="photo" name="photo" size="20" />
        <?php echo form_error('photo'); ?>

	<button type="submit" class="btn">Register</button></td>

<?php echo form_close(); ?>

