<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse">
		<?php if (isset($_SESSION['logged_in'])) { ?>
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item active">
				<li><a class="nav-link" href="<?php echo base_url();?>Pages/chat"><?php echo lang("chat"); ?></a></li>
			</li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>history"><?php echo lang("history"); ?></a></li>
            </li>
			<li class="nav-item">
				<li><a class="nav-link" href="<?php echo base_url();?>settings"><?php echo lang("settings"); ?></a></li>
			</li>
		</ul>
		<?php echo form_open('index.php/Auth/logout'); ?>
            <form action="" method="post" autocomplete="on" target="_top">
                <button class="btn btn-primary btn-md" name="message_sent" type="submit" value=log_out"  onclick="return confirm('Are you sure you want to logout?')"><?php echo lang("log_out"); ?></button>
            </form>
		<?php form_close();?>
		<?php } else{?>
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo base_url();?>login"><?php echo lang("login"); ?></a></li>
			</li>
			<li class="nav-item">
				<li><a class="nav-link" href="<?php echo base_url();?>register"><?php echo lang("register"); ?></a></li>
			</li>
			<li class="nav-item">
				<li><a class="nav-link" href="<?php echo base_url();?>chat"><?php echo lang("chat"); ?></a></li>
			</li>
		</ul>
		<?php }?>
		<select onchange="window.location.href='<?php echo base_url(); ?>index.php/LanguageSwitcher/switchLang/'+this.value;">
			<option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>>ENG</option>
			<option value="estonian" <?php if($this->session->userdata('site_lang') == 'estonian') echo 'selected="selected"'; ?>>EST</option>   
		</select>
	</div>
</nav>
