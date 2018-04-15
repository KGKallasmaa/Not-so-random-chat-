<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<title>Rando||Chat</title>
<meta name="description" content="Chatting with random people is as easy as 1,2,3">

<div class="nav_bar">
    <?php if (isset($_SESSION['logged_in'])) { ?>
        <button onclick="location.href='<?php echo base_url();?>index.php/Pages/history'" id="chat_history">History</button>
        <button onclick="location.href='<?php echo base_url();?>index.php/Pages/chat'" id="chat_main">Chat</button>
        <button onclick="location.href='<?php echo base_url();?>index.php/Pages/settings'" id="chat_settings">Settings</button>
    <?php }?>
</div>



<div class="row">
<div class = ".col-xs-12 .col-md-8">
<?php
    $_SESSION['topic'] = 'Random';
    //TODO: fix the topic variable in the future
    ?>
    <!-- -->
	<?php if (isset($_SESSION['conversation_id'])){
       echo "<h3>"."Your conversationID is: ".$_SESSION['conversation_id']."</h3>";
    }?>

        <?php
        //TODO: move it to a javascript file

        if (isset($_SESSION['conversation_id'])){
            $file_name = "application/conversations/" . $_SESSION['conversation_id'] . ".txt";

            if (file_exists($file_name)) {
                if ($file = fopen($file_name, "r")) {
                    while (!feof($file)) {
                        $line = fgets($file);
                        echo $line . "<br>";
                    }
                    fclose($file);
                }
            }
        }
        if (!isset($_SESSION['conversation_id'])){
            echo "Chat will appear here(currently you can only talk with yourself)";
        }

        ?>

	<!-- -->
	
	<?php echo form_open('index.php/Message/send_message'); ?>
        <form action="" method="post" autocomplete="on" target="_top">
            <textarea name="message" placeholder="Type to send a message ..."></textarea>
            <button class="btn btn-primary btn-md" name="message_sent" type="submit" value=message_sent">Send</button>
            <?php form_close();?>
        </form>

</div>

<div class = ".col-xs-6 .col-md-4">
    <?php if (!isset($_SESSION['logged_in'])) { ?>
        <button onclick="location.href='<?php echo base_url();?>index.php/Pages/login'">Login</button>
        <button onclick="location.href='<?php echo base_url();?>index.php/Pages/register'">Register</button>
    <?php } else{?>
	<?php echo form_open('index.php/Auth/logout'); ?>
            <form action="" method="post" autocomplete="on" target="_top">
                <button class="btn btn-primary btn-md" name="message_sent" type="submit" value=log_out"  onclick="return confirm('Are you sure you want to logout?')">Log out</button>
            </form>
            <?php form_close();?>
    <?php }?>
    <?php
    /*
     * <img src="<?php echo base_url('images/profile_pictures/'.$_SESSION['opponent_picture']);?> ?> alt="Your opponents picture" />
     */
    ?>
    <p>Your opponents picture (we're working on it):></p>


	<p>You're chatting with: <?php echo $_SESSION['other_sender_name'];?></p>
    <p>Topic: <?php echo $_SESSION['topic']?></p>

	<form>
        <?php echo form_open('index.php/Message/next_chat'); ?>
        <button class="btn btn-primary btn-md" name="next" type="submit" value=next">Next</button>
    </form>
        <br>
    <form>
        <button class="btn btn-primary btn-md" name="save" type="submit" value=save">Save</button>
    </form>
	<div id="gmap">
        <div id="map"></div>
    <script src="<?php echo base_url(); ?>js/gmap.js">
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXFGiuUMrmP1Gm9jn4FcbgSnX9ZwD0Aa0&callback=initMap">
    </script>
	</div>
</div>

