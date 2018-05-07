<html>
<title>Rando||Setting</title>
<meta name="description" content="Customise your user experience">



<!DOCTYPE html>

<div class="table-responsive">
    <table class="table">
        <!DOCTYPE html>

        <body>
        <form action="<?php echo base_url();?>upload/upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload image" name="submit">
        </form>
        </body>

        <tr>
            <td><img src="<?php echo base_url('images/profile_pictures/'.$_SESSION['user_picture']);?> ?> alt="Profile_picture" /></td>

            <tr></tr>
            <td><?php echo ("User name: ".$_SESSION['user_name'])?></td>
            <tr></tr>
            <td><?php echo ("User email: ".$_SESSION['user_email'])?></td>
            <tr></tr>
			<td>
			<div class = "container">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
				<script src="<?php echo base_url(); ?>js/huvid.js"></script>
				<input id ="interest" type = "text" name="interest">
				<button id="addInterest">Lisa</button>
				<br>
				<div id ="interestLine">Huvid: </div>
				<br>
				<button id="save">save</button>
			</div>
			</td>
			<tr></tr>

        </tr>
    </table>
</div>
