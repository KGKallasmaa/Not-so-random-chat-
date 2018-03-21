<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!------ Include the above in your HEAD tag ---------->


<!--Pulling Awesome Font -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<?php if(validation_errors() != false): ?>
    <div class="alert alert-info">
        <strong>Info!</strong> <?php echo validation_errors();?>
    </div>
<?php endif; ?>

<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">
                <?php echo form_open('index.php/Auth/login'); ?>
                <h3>Welcome back to Rando</h3>
                <form action="" method="post" autocomplete="on" target="_top">
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
                        <button class="btn btn-primary btn-md" name="login" type="submit" value="login">Login</button>
                        <a href="<?php echo base_url();?>index.php/Pages/register">Not a user? Register</a>
                    </div>
                </form>
                </div>
            </div>

        </div>
    </div>
</div>


