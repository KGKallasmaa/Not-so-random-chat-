
<div>
    <h1>WELCOME to RANDO</h1>
    <h3>Will you be my Rando?</h3>

    <!---TODO: fix this-->
    <div class = "login">
        <button onclick="location.href='<?php echo base_url();?>index.php/Pages/login'">login</button>
    </div>
    <div class = "chat">
        <button onclick="location.href='<?php echo base_url();?>index.php/Pages/chat'">Chat</button>
    </div>
    <div class = "signup">
        <button onclick="location.href='<?php echo base_url();?>index.php/Pages/register'">Register</button>
    </div>
</div>



<!---
IT WORKS!
 <form action="application/views/pages/login.php" method="post">
    <input type="submit" name="someAction" value="GO" />
</form>
form action="application/views/pages/register.php" method="post">
            <input type="submit" name="register" value="REGISTER" />
        </form>

IT SHOULD LOOK SOMETTHING LIKE THIS

<button type="button" class="btn btn-success" onclick="<?php echo base_url(); ?>/chat">

<button onclick="location.href='<?php echo base_url();?>index.php/Pages/chat'">Chat</button>
https://www.youtube.com/watch?v=pG1rOs8vz1Q

 --->



