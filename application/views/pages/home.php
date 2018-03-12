
<div>
    <h1>WELCOME to RANDO</h1>
    <h3>Will you be my Rando?</h3>

    <!---TODO: fix this-->
    <div class = "login">
        <form action="application/views/pages/login.php" method="post">
            <input type="submit" name="login" value="LOGIN" />
        </form>
    </div>
    <div class = "chat">
        <form action="application/views/pages/chat.php" method="post">
            <input type="submit" name="chat" value="CHAT" />
        </form>
    </div>
    <div class = "signup">
        <form action="application/views/pages/register.php" method="post">
            <input type="submit" name="register" value="REGISTER" />
        </form>
    </div>
</div>



<!---
IT WORKS!
 <form action="application/views/pages/login.php" method="post">
    <input type="submit" name="someAction" value="GO" />
</form>

IT SHOULD LOOK SOMETTHING LIKE THIS

<button type="button" class="btn btn-success" onclick="<?php echo base_url(); ?>/chat">



https://www.youtube.com/watch?v=pG1rOs8vz1Q

 --->



