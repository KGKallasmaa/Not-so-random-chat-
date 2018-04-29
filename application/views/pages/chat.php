<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<title>Rando||Chat</title>
<meta name="description" content="Chatting with random people is as easy as 1,2,3">

<div class="row">
<div class = ".col-xs-12 .col-md-8">
<?php
    $_SESSION['topic'] = 'Random';
    //TODO: fix the topic variable in the future
    ?>


    <!-- -->
	<?php if (isset($_SESSION['conversation_id'])){
       echo "<h3>".lang("Your conversationID is:").$_SESSION['conversation_id']."</h3>";
    }?>

    <?php
    if(file_exists(base_url().'application/conversations/'.$_SESSION['conversation_id'].'.json')){
        $data = file_get_contents (base_url().'application/conversations/'.$_SESSION['conversation_id'].'.json');
        $json = json_decode($data, true);
        foreach ($json as $key => $value) {
            if (is_array($value)) {
                $i = 0;
                foreach ($value as $key => $val) {
                    echo $val;
                    if ($i%3){
                        echo '<br/>';
                        $i = 0;
                    }
                    else{
                        $i = $i+1;
                    }

                }
            }


        }
    }



    ?>

    <p id="chat_log"></p>

    <!--TODO-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/chat.js"></script>

	<!-- -->

	<?php echo form_open('index.php/Message/send_message'); ?>
        <form action="" method="post" autocomplete="on" target="_top">
            <textarea name="message" placeholder=<?php echo lang("type_to_send"); ?>></textarea>
            <button value="message_sent" type="submit"><?php echo lang("send") ?></button>
            <?php form_close();?>
        </form>

</div>

<div class = ".col-xs-6 .col-md-4">
	

    <?php
    /*
     * <img src="<?php echo base_url('images/profile_pictures/'.$_SESSION['opponent_picture']);?> ?> alt="Your opponents picture" />
     */
    ?>


    <p>Your opponents picture (we're working on it):></p>

    <?php echo base_url()."images/profile_pictures/".$_SESSION['opponent_picture'] ?>

    <img src="<?php echo base_url()."images/profile_pictures/".$_SESSION['opponent_picture'] ?> >


	<p><?php echo lang("chatting_with"); ?> <?php echo $_SESSION['other_sender_name'];?></p>
    <p><?php echo lang("topic"); ?>: <?php echo $_SESSION['topic']?></p>

	<form>
        <?php echo form_open('index.php/Message/next_chat'); ?>
        <button class="btn btn-primary btn-md" type="submit" value=next"><?php echo lang("next"); ?></button>
        <?php form_close();?>
    </form>

        <br>
    <form>
        <button class="btn btn-primary btn-md" name="save" type="submit" value=save"><?php echo lang("save"); ?></button>
    </form>
	<div class= "container">
		<div id="gmap">
			<div id="map"></div>
		<script src="<?php echo base_url(); ?>js/gmap.js">
		</script>
		<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXFGiuUMrmP1Gm9jn4FcbgSnX9ZwD0Aa0&callback=initMap">
		</script>
		</div>
	</div>
</div>
</div>

