<div class="modal fade">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Login to Your Account</h1><br>
            <!--TODO: fix this-->
            <form method="post" action="Users/login_user">>
                <input type="text" name="user" placeholder="Username">
                <input type="password" name="pass" placeholder="Password">
                <input type="submit" name="login" class="login loginmodal-submit" value="Login">
            </form>

            <div class="login-help">
                <a href="register.php">Register</a> - <a href="#">Forgot Password(missing!)</a>
            </div>
        </div>
    </div>
</div>