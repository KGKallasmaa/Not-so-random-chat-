<title>Rando||Login</title>
<meta name="description" content="Login to have a more tailored experience">



<div class="row center-text">
	<div class="col-md-offset-5 col-md-3">
		<?php
		//TODO: add validation error display
		//<?php echo validation_errors();
		?>
		<div class="form-login">
            <?php echo validation_errors(); ?>
			<?php echo form_open('index.php/Auth/login'); ?>
			<h3 title="login to Rando"><?php echo lang("welcome_back"); ?></h3>
			<form action="" method="post" autocomplete="on" target="_top" accept-charset="utf-8">
				<div class="form-group">
					<label for = "email"><?php echo lang("email"); ?>:</label>
					<input class="form-control input-sm chat-input" name="email"type="text" placeholder=<?php echo lang("email"); ?> name="email" required>
					<br>
					<label for = "password"><?php echo lang("password"); ?>:</label>
					<input class="form-control input-sm chat-input" name="password" type="password" placeholder=<?php echo lang("password"); ?>>
				</div>
				<br>
				<div class="fb_button">
					<a href = "<?php echo base_url(); ?>index.php/Auth/fblogin"><img alt="" src="<?php echo base_url(); ?>images/fblogin.png"></a>
				</div>
                <br>
					<button class="btn btn-primary btn-md" name="login" type="submit" value="login"><?php echo lang("login"); ?></button>
					<a href="<?php echo base_url();?>index.php/Pages/register" alt="register"><?php echo lang("not_a_user"); ?></a>
			</form>
		</div>

	</div>
</div>



