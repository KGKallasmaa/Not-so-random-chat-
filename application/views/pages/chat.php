<link rel = "stylesheet" href="bootstrap.min.css"/>
<link href="css/chatapp.css" rel="stylesheet"/>


<div class="chat">
    <div class="nav_bar" id="nav_bar">
        <button onclick="location.href='<?php echo base_url();?>index.php/Pages/history'" id="chat_history">History</button>
        <button onclick="location.href='<?php echo base_url();?>index.php/Pages/chat'" id="chat_main">Chat</button>
        <button onclick="location.href='<?php echo base_url();?>index.php/Pages/settings'" id="chat_settings">Settings</button>
    </div>
    <div class="chat_application" id="chat_application">
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
        //TODO: fix the topic variable in the future
        $_SESSION['topic'] = 'Random';
        ?>

        <div class="chat_log" id="chat_log">
            <?php echo form_open('index.php/Message/display_conversation'); ?>
            <?php echo form_close(); ?>

        </div>
        <div class="send_message" id="send_message">
            <?php echo form_open('index.php/Message/send_message'); ?>
            <form action="" method="post" autocomplete="on" target="_top">
                <textarea name="message" placeholder="Type to send a message ..."></textarea>
                <button class="btn btn-primary btn-md" name="message_sent" type="submit" value=message_sent">Send</button>
            </form>
            <?php form_close();?>
        </div>

    </div>
    <div class="info" id="info">
        <div class="logout">
            <?php echo form_open('index.php/Auth/logout'); ?>
            <form action="" method="post" autocomplete="on" target="_top">
                <button class="btn btn-primary btn-md" name="message_sent" type="submit" value=log_out">Log out</button>
            </form>
            <?php form_close();?>
        </div>
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
            <button>Save</button>
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