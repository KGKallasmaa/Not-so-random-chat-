<div class="col-lg-8 col-lg-offset-2">
    <?php echo form_open('index.php/Auth/login'); ?>
    <form action="" method="post" autocomplete="on" target="_top">
        <div class="form-group">
            <label for = "email">Email: </label>
            <input class="forms-control" name="email"type="text" placeholder="email">
        </div>
        <div class="form-group">
            <label for = "password">Password: </label>
            <input class="forms-control" name="password" type="password" placeholder="password">
        </div>
        <div class="text-center">
            <button class="btn btn-primary" name="login" type="submit" value="login">Login</button>
        </div>
    </form>
</div>

<!--


onclick="location.href='<?php echo base_url();?>index.php/Auth/register'"

-->