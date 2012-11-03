<?php

$attributes = array('class' => '', 'id' => '');

?>

<?php echo form_open('posts/delete/' . $post[0]->id, $attributes); ?>

	<legend>Delete Message</legend>
	
	<label>Message</label>
	<span class="field span12 uneditable-input"><?php echo $post[0]->message; ?></span>
	<input type="hidden" id="message" name="message" value="<?php echo $post[0]->message; ?>">
	<?php echo form_error('message'); ?>

	<button type="submit" class="btn">Confirm Delete</button></td>

<?php echo form_close(); ?>

