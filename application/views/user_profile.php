<?php

$attributes = array('class' => '', 'id' => '');

?>

<h1>Profile</h1>

<div class="container span12">
        <div class="span1">
                <div class="pagination-centered"><img src="/img/<?php if ($profile->photo) { ?>user.png<?php } else { echo $profile->photo; } ?>" width="60px" class="img-rounded"></div>
        </div>

        <div class="span5">
		<table class="table table-striped">
                        <tr>
				<td>User Name</td>
                        	<td><?php echo $profile->user_name; ?></td>
			</tr>
			<tr>
				<td>Location</td>
				<td><?php echo $profile->location; ?></td>
			</tr>
			<tr>
				<td>Home Page</td>
				<td><?php echo $profile->website; ?></td>
			</tr>
                        <tr>
				<td>Messages</td>
                        	<td><?php echo count($posts); ?></td>
			</tr>
                        <tr>
				<td>Followers</td>
                        	<td><?php echo $profile->followed_count; ?></td>
			</tr>
			<tr>
                        	<td>Follows</td>
                        	<td><?php echo count($follows); ?></td>
			</tr>
			<tr>
                        	<td>Last Login</td>
                        	<td><?php if ($profile->last_login) {echo date('F d, Y h:mA', strtotime($profile->last_login));} ?></td>
			</tr>
			<tr>
                        	<td>Bio</td>
                        	<td><?php echo $profile->bio; ?></td>
			</tr>
                </table>
        </div>
</div>

