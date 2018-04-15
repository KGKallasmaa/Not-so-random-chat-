
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
					<label for = "username">Nickname: </label>
                    <img src="<?php echo base_url();?>images/tooltip.ico" title="Be creative"/>
                    <input class="form-control input-sm chat-input" name="username" id="username" type="text">
				</div>
				<div class="form-group">
					<label for = "email">Email: </label>
                    <img src="<?php echo base_url();?>images/tooltip.ico" title="10 minute email is fine"/>
					<input class="form-control input-sm chat-input" name="email" id="email" type="text">
				</div>
				<div class="form-group">
                    <img src="<?php echo base_url();?>images/tooltip.ico" title="minimum 6 characters"/>
					<label for = "password">Password: </label>
					<input class="form-control input-sm chat-input" name="password" id="password" type="password">
				</div>
				<div class="form-group">
					<label for = "username">Confirm password: </label>
					<input class="form-control input-sm chat-input" name="password2" id="password2" type="password">
				</div>
				<div class="form-group">
					<label for = "checkbox">By clicking this box you agree to our <a href="<?php echo base_url();?>index.php/Pages/tos">Terms of Service</a></label>
					<input class="form-control input-sm chat-input" name="agree_to_tos" id="agree_to_tos" type="checkbox">
				</div>
				<div class="text-center">
					<button class="btn btn-primary btn-md" name = "register" value="register"> Register</button>
				</div>
			</form>
			<a href="<?php echo base_url();?>index.php/Pages/login">Already a user? Login</a>
		</div>
	</div>

</div>



