<link rel = 'stylesheet' href="/css/bootstrap.min.css" type="text/css">
<link rel = 'stylesheet' href="css/chat_app.css" type="text/css">
<div class="chat">
    <div class="nav_bar">
        <button onclick="location.href='<?php echo base_url();?>index.php/Pages/history'" id="chat_history">History</button>
        <button onclick="location.href='<?php echo base_url();?>index.php/Pages/chat'" id="chat_main">Chat</button>
        <button onclick="location.href='<?php echo base_url();?>index.php/Pages/settings'" id="chat_settings">Settings</button>
    </div>
    <div class="chat_application">
      <!-- TODO: form open-->
        <form action="" method="post" autocomplete="on" target="_top">
            <textarea name="message" placeholder="Type to send a message ..."></textarea>
            <input type="submit" value="Send" placeholder="Send">
        </form>
    </div>
    <div class="info">
        <div id="profile_picture">
            Your opponents picture
        </div>
        <div id="name">
            Your opponents name
        </div>
       <div id="topic">
           On what topic did we match?
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