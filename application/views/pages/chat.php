<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<title>Rando||Chat</title>
<meta name="description" content="Chatting with random people is as easy as 1,2,3">

<div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <?php
                $_SESSION['topic'] = 'Random';
                //TODO: fix the topic variable in the future
                ?>
                <?php if (isset($_SESSION['conversation_id'])){
                    echo "<h3>".lang("Your conversationID is:").$_SESSION['conversation_id']."</h3>";
                }?>


                <p id="chat_log"></p>

                <!--TODO-->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                <script src="<?php echo base_url(); ?>js/chat.js"></script>

                <!-- -->

                <?php echo form_open('index.php/Message/send_message'); ?>
                <div class="form-group">
                    <form action="" method="post" autocomplete="on" target="_top">
                        <textarea class="form-control input-lg" name="message" id="inputMessage" placeholder=<?php echo lang("type_to_send"); ?>></textarea>
                        <button id ="send_button" class="form-control" value="message_sent" type="submit"><?php echo lang("send") ?></button>
                        <?php form_close();?>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                    <div class="opponent_picture">
                        <img src="<?php echo base_url('images/profile_pictures/'.$_SESSION['opponent_picture']);?> ?> alt="Your opponents picture" />
                    </div>

                    <h2><?php echo lang("chatting_with"); ?> <?php echo $_SESSION['other_sender_name'];?></h2>
                    <h2><?php echo lang("topic"); ?> <?php echo $_SESSION['topic']?></h2>

                    <form>
                        <?php echo form_open('index.php/Message/next_chat'); ?>
                        <button  id="next_button" class="form-control"  type="submit" value=next"><?php echo lang("next"); ?></button>
                        <?php form_close();?>
                    </form>

                    <br>
                    <form>
                        <button  id= "save_button" class="form-control" name="save" type="submit" value=save"><?php echo lang("save"); ?></button>
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
            </div>
