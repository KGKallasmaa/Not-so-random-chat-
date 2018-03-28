<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!------ Include the above in your HEAD tag ---------->


<!--Pulling Awesome Font -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


<title>Rando||Login</title>
<meta name="description" content="Logging in enables you to read past chats">




<?php if(validation_errors() != false): ?>
    <div class="alert alert-info">
        <strong>Info!</strong> <?php echo validation_errors();?>
    </div>
<?php endif; ?>

<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <?php
            //TODO: add validation error display 
            ?>
            <div class="form-login">
                <?php echo validation_errors('<div class= "alert alert-danger">','</div'); ?>
                <?php echo form_open('index.php/Auth/login'); ?>
                <h3>Welcome back to Rando</h3>
                <form action="" method="post" autocomplete="on" target="_top" accept-charset="utf-8">
                    <div class="form-group">
                        <label for = "email">Email: </label>
                        <input class="form-control input-sm chat-input" name="email"type="text" placeholder="email">
                        <?php echo validation_errors('email'); ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for = "password">Password: </label>
                        <input class="form-control input-sm chat-input" name="password" type="password" placeholder="password">
                        <?php echo validation_errors('password'); ?>
                    </div>
                    <br>
                    <div class="text-center">
						<a href = "<?php echo base_url(); ?>index.php/Auth/fblogin"><img alt="" src="<?php echo base_url(); ?>images/fblogin.png"/></a>			
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


