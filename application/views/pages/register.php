<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!------ Include the above in your HEAD tag ---------->


<!--Pulling Awesome Font -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">
                <h3>Welcome back to Rando</h3>
                <?php echo form_open('index.php/Auth/register'); ?>

                <form action="" method="post" autocomplete="on" target="_top" accept-charset="utf-8">
                    <div class="form-group">
                        <label for = "username">Nickname: </label>
                        <input class="form-control input-sm chat-input" name="username" id="username" type="text">
                    </div>
                    <div class="form-group">
                        <label for = "email">Email: </label>
                        <input class="form-control input-sm chat-input" name="email" id="email" type="text">
                    </div>
                    <div class="form-group">
                        <label for = "password">Password: </label>
                        <input class="form-control input-sm chat-input" name="password" id="password" type="password">
                    </div>
                    <div class="form-group">
                        <label for = "username">Confirm password: </label>
                        <input class="form-control input-sm chat-input" name="password2" id="password2" type="password">
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary btn-md" name = "register" value="register"> Register</button>
                    </div>
                </form>
                <a href="<?php echo base_url();?>index.php/Pages/login">Already a user? Login</a>
            </div>
        </div>

    </div>
</div>
</div>


