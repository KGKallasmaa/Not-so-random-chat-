<title>Rando||Home</title>
<meta name="description" content="Choose your next bath wisely">
<div class="landing_page">
	<select onchange="javascript:window.location.href='<?php echo base_url(); ?>index.php/LanguageSwitcher/switchLang/'+this.value;">
		<option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>>ENG</option>
		<option value="estonian" <?php if($this->session->userdata('site_lang') == 'estonian') echo 'selected="selected"'; ?>>EST</option>   
	</select>
    <h1 title="Welcome to Rando"><?php echo lang("welcome_message"); ?></h1>

    <button onclick="location.href='<?php echo base_url();?>index.php/Pages/login'" id="landing_login"><?php echo lang("login"); ?></button>
    <button onclick="location.href='<?php echo base_url();?>index.php/Pages/test2'" id="landing_chat"><?php echo lang("chat"); ?></button>
    <button onclick="location.href='<?php echo base_url();?>index.php/Pages/register'" id="landing_register"><?php echo lang("register"); ?></button>

</div>


