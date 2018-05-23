<title>Rando||Setting</title>
<meta name="description" content="Customise your user experience">

<div class="table-responsive">
    <script src="<?php echo base_url(); ?>js/settings.js"></script>
    <table class="table">
       //todo: upload

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
