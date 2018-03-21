<div class="col-lg-8 col-lg-offset-2">
    <h1>Registration</h1>
    <?php echo form_open('index.php/Auth/register'); ?>

    <form action="" method="post" autocomplete="on" target="_top">
    <div class="form-group">
        <label for = "username">Nickname: </label>
        <input class="forms-control" name="username" id="username" type="text">
    </div>
    <div class="form-group">
        <label for = "email">Email: </label>
        <input class="forms-control" name="email" id="email" type="text">
    </div>
    <div class="form-group">
        <label for = "password">Password: </label>
        <input class="forms-control" name="password" id="password" type="password">
    </div>
    <div class="form-group">
        <label for = "username">Confirm password: </label>
        <input class="forms-control" name="password2" id="password2" type="password">
    </div>
    <div class="text-center">
        <button class="btn btn-primary" name = "register" value="register"> Register</button>
    </div>
    </form>
</div>