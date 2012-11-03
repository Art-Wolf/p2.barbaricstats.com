<?php

$attributes = array('class' => '', 'id' => '');

?>

<h1>Profile</h1>

<div class="container span12">
        <div class="span1">
                <div class="pagination-centered"><img src="/img/user.png" width="60px" class="img-rounded"></div>
        </div>

        <div class="span5">
                <dl class="dl-horizontal">
                        <dt>User Name</dt>
                        <dd>TBD</dd>
                        <dt>Location</dt>
                        <dd>TBD</db>
                        <dt>Home Page</dt>
                        <dd>TBD</dd>
                        <dt>Messages</dt>
                        <dd><?php echo count($posts); ?></dd>
                        <dt>Followers</dt>
                        <dd>TBD</dd>
                        <dt>Follows</dt>
                        <dd>TBD</dd>
                        <dt>Last Login</dt>
                        <dd>TBD</dd>
                        <dt>Message to the World!</dt>
                        <dd>Something or other...</dd>
                </dl>
        </div>
</div>

