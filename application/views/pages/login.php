<link rel = 'stylesheet' href="css/bootstrap.min.css" type="text/css">
<div class="col-md-4">
    <h1>Log in</h1>
    <?php echo form_open('index.php/Auth/login'); ?>
    <form action="" method="post" autocomplete="on" target="_top">
        <div class="form-group">
            <label for = "email">Email: </label>
            <input class="forms-control" name="email"type="text" placeholder="email">
        </div>
        <br>
        <div class="form-group">
            <label for = "password">Password: </label>
            <input class="forms-control" name="password" type="password" placeholder="password">
        </div>
        <br>
        <div class="text-center">
            <button class="btn btn-primary" name="login" type="submit" value="login">Login</button>
            <a href='#register'>Not a user? Register</a>
        </div>
    </form>
</div>


<!--


onclick="location.href='<?php echo base_url();?>index.php/Auth/register'"

-->