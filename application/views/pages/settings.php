<title>Rando||Setting</title>
<meta name="description" content="Customise your user experience">


<div class="nav_bar">
    <button onclick="location.href='<?php echo base_url();?>index.php/Pages/history'" id="chat_history">History</button>
    <button onclick="location.href='<?php echo base_url();?>index.php/Pages/chat'" id="chat_main">Chat</button>
    <button onclick="location.href='<?php echo base_url();?>index.php/Pages/settings'" id="chat_settings">Settings</button>
</div>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

//siia tuleb su nimi, email, pilt ning hobide loetelu

<div class="table-responsive">
    <table class="table">

        <tr>
            <td><img src="<?php echo base_url('images/profile_pictures/'.$_SESSION['user_picture']);?> ?> alt="Profile_picture" /></td>

            <tr></tr>
            <td><?php echo ("User name: ".$_SESSION['user_name'])?></td>
            <tr></tr>
            <td><?php echo ("User email: ".$_SESSION['user_email'])?></td>
            <tr></tr>
			<td>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
				<script src="<?php echo base_url(); ?>js/huvid.js"></script>
				<button id="lisaHuvi">Lisa</button>
				<p id="huvid">Huvid: </p>
				
			</td>
			<tr></tr>

        </tr>
    </table>
</div>
