<meta name="description" content="Choose your next bath wisely">
<div  id = "landing_page" class="landing_page">
	<div id="general_info">
        <select onchange="window.location.href='<?php echo base_url(); ?>index.php/LanguageSwitcher/switchLang/'+this.value;">
            <option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>>ENG</option>
            <option value="estonian" <?php if($this->session->userdata('site_lang') == 'estonian') echo 'selected="selected"'; ?>>EST</option>
        </select>
        <h1 title="Welcome to Rando"><?php echo lang("welcome_message"); ?></h1>

        <p id="currenttime"></p>
        <script src="<?php echo base_url(); ?>js/time.js"></script>

        <div class="action_buttons">
            <button onclick="location.href='<?php echo base_url();?>login'" id="landing_login"><?php echo lang("login"); ?></button>
            <button onclick="location.href='<?php echo base_url();?>chat'" id="landing_chat"><?php echo lang("chat"); ?></button>
            <button onclick="location.href='<?php echo base_url();?>register'" id="landing_register"><?php echo lang("register"); ?></button>
        </div>

    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>
