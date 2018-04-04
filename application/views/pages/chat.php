<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<title>Rando||Chat</title>
<meta name="description" content="Chatting with random people is as easy as 1,2,3">

<div class="chat">
    <div class="nav_bar" id="nav_bar">

        <? if($_SESSION['logged_in'] == true) {?>
            <button onclick="location.href='<?php echo base_url();?>index.php/Pages/history'" id="chat_history">History</button>
        <? } ?>
        <button onclick="location.href='<?php echo base_url();?>index.php/Pages/chat'" id="chat_main">Chat</button>
        <? if($_SESSION['logged_in'] == true) {?>
            <button onclick="location.href='<?php echo base_url();?>index.php/Pages/settings'" id="chat_settings">Settings</button>
        <? } ?>


    </div>
    <div class="chat_application" id="chat_application">
        <?php

        //1. The user has, on average, 50% chance to start a brand new conversation, on another time he/she will join an excising one.
        $random = rand(1,1);
        //TODO: implement other people

        if ($random >= 0.5){
            //A brand new conversation is started
            //Random conversation id
            $random = rand(1,PHP_INT_MAX);
            if (!isset($_SESSION["conversation_id"])){
                $_SESSION['conversation_id'] = $random;
            }

        }
        else{
            //TODO
            //Existing conversation is joined
            /* require_once(APPPATH.'controllers/Message.php');
            $conversation_id = $this->Message->chat_to_join($_SESSION['sender_id']);
             *
             */
            include_once(APPPATH.'controllers/Message.php');
            $message = new Message;
            $_SESSION['conversation_id'] = $message->chat_to_join($_SESSION['sender_id']);
    }
    $_SESSION['topic'] = 'Random';
    //TODO: fix the topic variable in the future
    ?>

		<div class="chat_log" id="chat_log">

        <h3>"Your conversation"</h3>
        <?php
        //TODO: move it to a javascript file


        /*
         *$file_name = "application/conversations/".$_SESSION['conversation_id'].".txt";

        if (file_exists($file_name)){
            if ($file = fopen($file_name, "r")) {
                while(!feof($file)) {
                    $line = fgets($file);
                    echo $line."<br>";
                }
                fclose($file);
            }
        */
            ?>
            <p id="chat_log_area">Chat will appear here(currently you can only talk with yourself)</p>
            <script href="<?php echo base_url();?>js/print_chat_log.js"></script>

        </div>

        <div class="chat_box" id="chat_box">
            <?php echo form_open('index.php/Message/send_message'); ?>

            <form action="" method="post" autocomplete="on" target="_top">
                <textarea name="message" placeholder="Type to send a message ..."></textarea>
                <button class="btn btn-primary btn-md" name="message_sent" type="submit" value=message_sent" onclick="print_chat(<?php echo $_SESSION['conversation_id']?>)">"Send"</button>
                <?php form_close();?>
            </form>

        </div>

    </div>
    <div class="info" id="info">
        <div class="logout">
            <?php echo form_open('index.php/Auth/logout'); ?>
            <form action="" method="post" autocomplete="on" target="_top">
                <button class="btn btn-primary btn-md" name="message_sent" type="submit" value=log_out"  onclick="return confirm('Are you sure?')">Log out</button>
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
            <form>
                <button class="btn btn-primary btn-md" name="next" type="submit" value=next">Next</button>
            </form>
            <br>
            <form>
                <button class="btn btn-primary btn-md" name="save" type="submit" value=save">Save</button>
            </form>

        </div>
		<div id="map"></div>
		<script src="<?php base_url();?>js/gmap.js"></script>
		<script async defer
			src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXFGiuUMrmP1Gm9jn4FcbgSnX9ZwD0Aa0&callback=initMap">
		</script>
    </div>
</div>

<!--
      <?php echo form_open('index.php/Message/display_conversation'); ?>
-->