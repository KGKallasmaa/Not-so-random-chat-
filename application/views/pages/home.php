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

        <script>
            var display=setInterval(function(){Time()},0);

            function Time() {
                var date=new Date();
                var time=date.toLocaleTimeString();
                document.getElementById("currenttime").innerHTML=time;
            }
        </script>

        <div class="action_buttons">
            <button onclick="document.getElementById('general_info').blur(); document.getElementById('modal_login').style.display='block' ;  " id="landing_login"><?php echo lang("login"); ?></button>
            <button onclick="location.href='<?php echo base_url();?>index.php/Pages/chat'" id="landing_chat"><?php echo lang("chat"); ?></button>
            <button onclick="location.href='<?php echo base_url();?>index.php/Pages/register'" id="landing_register"><?php echo lang("register"); ?></button>

        </div>
    </div>



    <!-- The Modal -->
    <div id="modal_login" class="modal">
            <div class="modal-dialog modal-lg">
                <!-- Modal Content -->
                <div class="imgcontainer">
                    <img src="<?php echo base_url('images/profile_pictures/login_pic.png');?> ?> alt="Your opponents picture" />
                </div>

                <?php echo validation_errors(); ?>
                <?php echo form_open('index.php/Auth/login'); ?>
                <h3 title="login to Rando"><?php echo lang("welcome_back"); ?></h3>
                <form class="modal-content animate" action="" method="post" autocomplete="on" target="_top" accept-charset="utf-8">
                    <div class="form-group">
                        <label for = "email"><?php echo lang("email"); ?>:</label>
                        <input class="form-control input-sm chat-input" name="email" type="text" placeholder=<?php echo lang("email"); ?> required>
                        <br>
                        <label for = "password"><?php echo lang("password"); ?>:</label>
                        <input class="form-control input-sm chat-input" name="password" type="password" placeholder=<?php echo lang("password"); ?> required>
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
                    <a href="<?php echo base_url();?>index.php/Pages/register" alt="register"><?php echo lang("not_a_user"); ?></a>
                </form>
            </div>

            <script>
                // Get the modal
                var modal = document.getElementById('modal_login');
                // General info
                var info = document.getElementById('general_info');

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                        info.style.display = "block";
                    }
                }

            </script>
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


