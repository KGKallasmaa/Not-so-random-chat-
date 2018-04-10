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
			<h3 title="login to Rando">Welcome back to Rando</h3>
			<form action="" method="post" autocomplete="on" target="_top" accept-charset="utf-8">
				<div class="form-group">
					<label for = "email">Email: </label>
					<input class="form-control input-sm chat-input" name="email"type="text" placeholder="email">
					<br>
					<label for = "password">Password: </label>
					<input class="form-control input-sm chat-input" name="password" type="password" placeholder="password">
				</div>
				<br>
				<div class="fb_button">
					<a href = "<?php echo base_url(); ?>index.php/Auth/fblogin"><img alt="" src="<?php echo base_url(); ?>images/fblogin.png"></a>
				</div>
                <br>
					<button class="btn btn-primary btn-md" name="login" type="submit" value="login">Login</button>
					<a href="<?php echo base_url();?>index.php/Pages/register" alt="register">Not a user? Register</a>
			</form>
		</div>

	</div>
</div>



