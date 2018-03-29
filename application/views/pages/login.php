

<!------ Include the above in your HEAD tag ---------->


<!--Pulling Awesome Font -->



<title>Rando||Login</title>
<meta name="description" content="Logging in enables you to read past chats">




<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <?php
            //TODO: add validation error display
            //<?php echo validation_errors();
            ?>
            <div class="form-login">

                <?php echo form_open('index.php/Auth/login'); ?>
                <h3>Welcome back to Rando</h3>
                <form action="" method="post" autocomplete="on" target="_top" accept-charset="utf-8">
                    <div class="form-group">
                        <label for = "email">Email: </label>
                        <input class="form-control input-sm chat-input" name="email"type="text" placeholder="email">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for = "password">Password: </label>
                        <input class="form-control input-sm chat-input" name="password" type="password" placeholder="password">
                    </div>
                    <br>
                    <div class="text-center">
						<a href = "<?php echo base_url(); ?>index.php/Auth/fblogin"><img alt="" src="<?php echo base_url(); ?>images/fblogin.png" width="230" height="28"/></a>
						<br>
                        <br>
                        <br>
                        <button class="btn btn-primary btn-md" name="login" type="submit" value="login">Login</button>
                        <a href="<?php echo base_url();?>index.php/Pages/register">Not a user? Register</a>
                    </div>
                </form>
                </div>
            </div>

        </div>
    </div>
</div>


