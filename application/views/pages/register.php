
<title>Rando||Register</title>
<meta name="description" content="Signing up for a chat app has never been easier">

<div class="row">
	<div class="col-md-offset-5 col-md-3">
		<div class="form-login">
			<h3 title="register to Rando">Register</h3>

            <?php echo validation_errors(); ?>
			<?php echo form_open('index.php/Auth/register'); ?>

			<form action="" method="post" autocomplete="on" target="_top" accept-charset="utf-8">
				<div class="form-group">
					<label for = "username"><?php echo lang("nickname"); ?>:</label>
                    <img src="<?php echo base_url();?>images/tooltip.ico" title="Be creative"/>
                    <input class="form-control input-sm chat-input" name="username" id="username" type="text">
				</div>
				<div class="form-group">
					<label for = "email"><?php echo lang("email"); ?>:</label>
                    <img src="<?php echo base_url();?>images/tooltip.ico" title="10 minute email is fine"/>
					<input class="form-control input-sm chat-input" name="email" id="email" type="text">
				</div>
				<div class="form-group">
					<label for = "password"><?php echo lang("password"); ?>:</label>
					<label for = "password">Password: </label>
                    <img src="<?php echo base_url();?>images/tooltip.ico" title="minimum 6 characters"/>
					<input class="form-control input-sm chat-input" name="password" id="password" type="password">
				</div>
				<div class="form-group">
					<label for = "username"><?php echo lang("confirm_password"); ?>:</label>
					<input class="form-control input-sm chat-input" name="password2" id="password2" type="password">
				</div>
				<div class="form-group">
					<label for = "checkbox"><?php echo lang("agree_terms"); ?> <a href="<?php echo base_url();?>index.php/Pages/tos"><?php echo lang("terms_agreeing"); ?></a></label>
					<input class="form-control input-sm chat-input" name="agree_to_tos" id="agree_to_tos" type="checkbox">
				</div>
				<div class="text-center">
					<button class="btn btn-primary btn-md" name = "register" value="register"> Register</button>
				</div>
			</form>
			<a href="<?php echo base_url();?>index.php/Pages/login"><?php echo lang("already_user"); ?></a>
		</div>
	</div>

</div>



