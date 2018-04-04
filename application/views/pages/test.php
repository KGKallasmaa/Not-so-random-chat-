<link rel = "stylesheet" href="bootstrap.min.css"/>
<link href="css/chatapp.css" rel="stylesheet"/>

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      #gmap {
        height: 200px;
        margin: 0;
        padding: 0;
      }
    </style>

<title>Rando||Chat</title>
<meta name="description" content="Chatting with random people is as easy as 1,2,3">

<div class="chat">
    <div class="nav_bar" id="nav_bar">
        <?PHP
        //TODO: it dose not work
        if (!isset($_POST['logged_in'])){
            $chat_history = 'disabled';
            $settings = 'disabled';
        }
        ;
        ?>

        <button onclick="location.href='<?php echo base_url();?>index.php/Pages/history'" id="chat_history" <?php $chat_history ? 'disabled' : ''; ?>>History</button>
        <button onclick="location.href='<?php echo base_url();?>index.php/Pages/chat'" id="chat_main">Chat</button>
        <button onclick="location.href='<?php echo base_url();?>index.php/Pages/settings'" id="chat_settings" <?php $settings ? 'disabled' : ''; ?>>Settings</button>



    </div>
    <div class="chat_application" id="chat_application">
        <?php
        //1. The user has, on average, 50% chance to start a brand new conversation, on another time he/she will join an excising one.
        $random = rand(1,1);
        //TODO:  $random = rand(0,1);
        if ($random == 1){
            //A brand new conversation is started
            //Is the current user logged in?
            if (!isset($_SESSION["user_id"])){
                $random = rand(1,PHP_INT_MAX);
                if (!isset($_COOKIE["sender_id"])){
                    setcookie("sender_id",$random,time()); //0 days
                }
                $_SESSION['topic'] = 'Random';
            }
            //Random conversation id
            $random = rand(1,PHP_INT_MAX);
            if (!isset($_SESSION["conversation_id"])){
                $_SESSION['conversation_id'] = $random;
            }
            $_SESSION['topic'] = 'Random';

        }
        else{
            $_SESSION['topic'] = 'Random';
            //Existing conversation is joined

            //TODO

        }
        //TODO: fix the topic variable in the future
        ?>


        <div class="chat_log" id="chat_log">
            <h3>Chat is here ...</h3>
            <?php
            //TODO: move it to a model file
            $file_name = "application/conversations/".$_SESSION['conversation_id'].".txt";

            if (file_exists($file_name)){
                if ($file = fopen($file_name, "r")) {
                    while(!feof($file)) {
                        $line = fgets($file);
                        echo $line."<br>";
                    }
                    fclose($file);
                }
            }



            ?>

        </div>

        <div class="chat_box" id="chat_box">
            <?php echo form_open('index.php/Message/send_message'); ?>

            <form action="" method="post" autocomplete="on" target="_top">
                <textarea name="message" placeholder="Type to send a message ..."></textarea>
                <button class="btn btn-primary btn-md" name="message_sent" type="submit" value=message_sent">Send</button>
            </form>
            <?php form_close();?>
        </div>
        <?php form_close();?>



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
            <form>
                <button class="btn btn-primary btn-md" name="save" type="submit" value=next">Save</button>
            </form>


        </div>
		<div id="gmap">
        <div id="map"></div>
    <script src="<?php echo base_url(); ?>js/googlemaps.js">
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXFGiuUMrmP1Gm9jn4FcbgSnX9ZwD0Aa0&callback=initMap">
    </script>
	</div>
    </div>
</div>

<!--
        <a href="<?php echo base_url();?>index.php/Pages/history"><img border="0" alt="History" src="images/blue_book.png" width="100" height="100"> </a>
     <li><a href=""><img src="images/blue_book.png"></a></li>


      <?php echo form_open('index.php/Message/display_conversation'); ?>

-->