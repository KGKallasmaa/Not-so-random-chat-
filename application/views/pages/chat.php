<link rel = 'stylesheet' href="bootstrap.min.css" type="text/css">
<link rel= 'stylesheet' href="chatapp.css" type="text/css">

<div class="chat">
    <div class="nav_bar">
        <button onclick="location.href='<?php echo base_url();?>index.php/Pages/history'" id="chat_history">History</button>
        <button onclick="location.href='<?php echo base_url();?>index.php/Pages/chat'" id="chat_main">Chat</button>
        <button onclick="location.href='<?php echo base_url();?>index.php/Pages/settings'" id="chat_settings">Settings</button>
    </div>
    <div class="chat_application">
        <!--TODO: broken-->
        <?php
        //Is the current user logged in?
        if (!isset($_SESSION["user_id"])){
            $random = rand(1,PHP_INT_MAX);
            setcookie("sender_id",$random,time()+864000); //1 day
            $_SESSION['topic'] = 'Random';

        }
        //Random conversation id
        $random = rand(1,PHP_INT_MAX);
        $_SESSION['conversation_id'] = $random;



        ?>

        <div class="chat_log">

        </div>
        <div class="send_message">
            <?php echo form_open('index.php/Message/send_message'); ?>
            <form action="" method="post" autocomplete="on" target="_top">
                <textarea name="message" placeholder="Type to send a message ..."></textarea>
                <input type="submit" value="message_sent" placeholder="Send">
            </form>
        </div>

    </div>
    <div class="info">
        <div id="profile_picture">
            Your opponents picture
        </div>
        <div id="name">
            Your opponents name
        </div>
        <div id="topic">
            <?php echo "Topic: ".$_SESSION['topic']?>
        </div>
        <div id="action">
            <button>Next</button>
            <!-- DO you want to save this conversation?-->
            <button>Save</button>
            <!-- Save button: is the user logged in-> yes(conversation can be saved)-- no (registration is required, cookie is used for saving the current progress))>
        </div>
        <div id="map">
            Google maps goes here
        </div>
    </div>
</div>

<!--
        <a href="<?php echo base_url();?>index.php/Pages/history"><img border="0" alt="History" src="images/blue_book.png" width="100" height="100"> </a>
     <li><a href=""><img src="images/blue_book.png"></a></li>
-->