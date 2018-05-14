<title>Rando||Home</title>
<meta name="description" content="Choose your next bath wisely">
<div  id = "landing_page"class="landing_page">
	<div id="general_info">
        <select onchange="window.location.href='<?php echo base_url(); ?>index.php/LanguageSwitcher/switchLang/'+this.value;">
            <option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>>ENG</option>
            <option value="estonian" <?php if($this->session->userdata('site_lang') == 'estonian') echo 'selected="selected"'; ?>>EST</option>
        </select>
        <h1 title="Welcome to Rando"><?php echo lang("welcome_message"); ?></h1>

        <p id="currenttime"></p>
        <script src="<?php echo base_url(); ?>js/time.js"></script>

        <div class="action_buttons">
            <button onclick="document.getElementById('general_info').blur(); document.getElementById('modal_login').style.display='block'; document.getElementById('modal_register').blur()" id="landing_login"><?php echo lang("login"); ?></button>
            <button onclick="location.href='<?php echo base_url();?>index.php/Pages/chat'" id="landing_chat"><?php echo lang("chat"); ?></button>
            <button onclick="document.getElementById('general_info').blur();document.getElementById('modal_login').blur(); document.getElementById('modal_register').style.display='block';" id="landing_register"><?php echo lang("register"); ?></button>
        </div>
    </div>

    <!-- The Modal Login-->
    <div id="modal_login" class="modal">
            <div class="modal-dialog modal-lg">
                <!-- Modal Content -->
                <div class="imgcontainer">
                    <img src="<?php echo base_url('images/profile_pictures/login_pic.png');?> ?> alt="Login img" />
                </div>
                <?php echo validation_errors(); ?>
                <?php echo form_open('index.php/Auth/login'); ?>
                <h3 title="login to Rando"><?php echo lang("welcome_back"); ?></h3>
                <form class="modal-content animate" action="" method="post" autocomplete="on" target="_top" accept-charset="utf-8">
                    <div class="form-group">
                        <label for = "email"><?php echo lang("email"); ?>:</label>
                        <input  class="form-control input-sm chat-input" name="email" type="text" placeholder=<?php echo lang("email"); ?> required autofocus>
                        <br>
                        <label for = "password"><?php echo lang("password"); ?>:</label>
                        <input class="form-control input-sm chat-input" name="password" type="password" placeholder=<?php echo lang("password"); ?> required autofocus>
                    </div>
                    <br>
                    <?php
                    /*
                     *  <div id="fb_button" class="fb_button">
                         <a href = "<?php echo base_url(); ?>index.php/Auth/fblogin"><img alt="Fb login" src="<?php echo base_url(); ?>images/fblogin.png"></a>
                     </div>
                     */
                    ?>
                    <br>
                    <button class="btn btn-primary btn-md" name="login" type="submit" value="login"><?php echo lang("login"); ?></button>
                    <a href="#modal_register" alt="register"><?php echo lang("not_a_user"); ?></a>
                </form>
            </div>

        <script src="<?php echo base_url(); ?>js/time.js"></script>
        <script src="<?php echo base_url(); ?>js/modal.js"></script>

    </div>
        <!-- The Modal Register -->
        <div id="modal_register" class="modal">
            <div class="modal-dialog modal-lg">
                <!-- Modal Content -->
                <div class="imgcontainer">
                    <img src="<?php echo base_url('images/profile_pictures/login_pic.png');?> ?> alt="Your opponents picture" />
                </div>

                <?php echo validation_errors(); ?>
                <?php echo form_open('index.php/Auth/register'); ?>

                <form class="modal-content animate" action="" method="post" autocomplete="on" target="_top" accept-charset="utf-8">
                    <div class="form-group">
                        <label for = "username"><?php echo lang("nickname"); ?>:</label>
                        <img src="<?php echo base_url();?>images/tooltip.ico" title="Be creative"/>
                        <input class="form-control input-sm chat-input" name="username" id="username" type="text">
                        <label for = "email"><?php echo lang("email"); ?>:</label>
                        <img src="<?php echo base_url();?>images/tooltip.ico" title="10 minute email is fine"/>
                        <input class="form-control input-sm chat-input" name="email" id="email" type="text">
                        <label for = "password"><?php echo lang("password"); ?>:</label>
                        <label for = "password">Password: </label>
                        <img src="<?php echo base_url();?>images/tooltip.ico" title="minimum 6 characters"/>
                        <input class="form-control input-sm chat-input" name="password" id="password" type="password">
                        <label for = "username"><?php echo lang("confirm_password"); ?>:</label>
                        <input class="form-control input-sm chat-input" name="password2" id="password2" type="password">
                        <label for = "checkbox"><?php echo lang("agree_terms"); ?> <a href="<?php echo base_url();?>index.php/Pages/tos"><?php echo lang("terms_agreeing"); ?></a></label>
                        <input class="form-control input-sm chat-input" name="agree_to_tos" id="agree_to_tos" type="checkbox">
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary btn-md" name = "register" value="register"> Register</button>
                    </div>
                </form>
                <a href="<?php echo base_url();?>index.php/Pages/login"><?php echo lang("already_user"); ?></a>
                <?php
                /*
                 * <script>
                // Get the modal register
                var modal_register = document.getElementById('modal_register');
                // General info
                var info = document.getElementById('general_info');

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal_register) {
                        modal_register.style.display = "none";
                        info.style.display = "block";
                    }
                }
            </script>
                 */
                ?>
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


