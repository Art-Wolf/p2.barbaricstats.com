<?php

$attributes = array('class' => '', 'id' => '');

?>

<?php echo form_open('posts', $attributes); ?>

	<legend>Post Message</legend>
	
	<label>Message</label>
	<textarea id="message" name="message" class="field span12" id="textarea" rows="4" placeholder="Enter a message"></textarea>
	<?php echo form_error('message'); ?>

	<button type="submit" class="btn">Submit</button></td>

<?php echo form_close(); ?>

