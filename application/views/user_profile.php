<?php

$attributes = array('class' => '', 'id' => '');

?>

<h1>Profile</h1>

<div class="container span12">
        <div class="span1">
                <div class="pagination-centered"><img src="/img/<?php if (is_null($profile->photo)) { ?> user.png <?php } else { echo $profile->photo; } ?>" width="60px" class="img-rounded"></div>
        </div>

        <div class="span5">
                <dl class="dl-horizontal">
                        <dt>User Name</dt>
                        <dd><?php echo $profile->user_name; ?></dd>
                        <dt>Location</dt>
                        <dd><?php echo $profile->location; ?></db>
                        <dt>Home Page</dt>
                        <dd><?php echo $profile->website; ?></dd>
                        <dt>Messages</dt>
                        <dd><?php echo count($posts); ?></dd>
                        <dt>Followers</dt>
                        <dd>TBD</dd>
                        <dt>Follows</dt>
                        <dd>TBD</dd>
                        <dt>Last Login</dt>
                        <dd>TBD</dd>
                        <dt>Bio</dt>
                        <dd><?php echo $profile->bio; ?></dd>
                </dl>
        </div>
</div>

