<div class="container">
    <div class="col-md-2 col-md-offset-5"></div>
        <div class="span4">
            <img id="profile-img" class="profile-img-card" src="<?php echo base_url('images/profile_pictures/login_pic.svg');?>" />
            <p id="profile-name" class="profile-name-card"></p>
        </div>

        <?php echo validation_errors(); ?>
        <?php echo form_open('index.php/Auth/login'); ?>
        <h3 title="login to Rando"><?php echo lang("welcome_back"); ?></h3>
        <form action="" method="post" autocomplete="on" target="_top" accept-charset="utf-8">
            <div class="form-group">
                <label for = "email"><?php echo lang("email"); ?>:</label>
                <input class="form-control input-sm chat-input" name="email"type="text" placeholder="<?php echo lang("email"); ?>" required>
                <br>
                <label for = "password"><?php echo lang("password"); ?>:</label>
                <input class="form-control input-sm chat-input" name="password" type="password" placeholder="<?php echo lang("password"); ?>"
                       required>
            </div>
            <br>
            <?php
            /*
            <div class="fb_button">
                <a href = "<?php echo base_url(); ?>index.php/Auth/fblogin"><img alt="" src="<?php echo base_url(); ?>images/fblogin.png"></a>
            </div>
             */
            ?>
            <br>
            <button class="btn btn-primary btn-md" name="login" type="submit" value="login"><?php echo lang("login"); ?></button>
            <a href="<?php echo base_url();?>index.php/Pages/register"><?php echo lang("not_a_user"); ?></a>
</div><!-- /col-md-2 col-md-offset-5 -->

