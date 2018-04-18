<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.bundle.js"></script>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse">
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <?php if (isset($_SESSION['logged_in'])) { ?>
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo base_url();?>index.php/Pages/history" alt="register"><?php echo lang("history"); ?></a></li>
			</li>
			<li class="nav-item">
				<li><a class="nav-link" href="<?php echo base_url();?>index.php/Pages/chat" alt="register"><?php echo lang("chat"); ?></a></li>
			</li>
			<li class="nav-item">
				<li><a class="nav-link" href="<?php echo base_url();?>index.php/Pages/settings" alt="register"><?php echo lang("settings"); ?></a></li>
			</li>
            <?php }?>
		</ul>
		<select onchange="window.location.href='<?php echo base_url(); ?>index.php/LanguageSwitcher/switchLang/'+this.value;">
			<option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>>ENG</option>
			<option value="estonian" <?php if($this->session->userdata('site_lang') == 'estonian') echo 'selected="selected"'; ?>>EST</option>   
		</select>
	</div>
</nav>
