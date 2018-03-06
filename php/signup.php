<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="signup">
      <h2>Signup</h2>
      <form class="signup_form" action="includes/signup.inc.php" method="post">
        <input type="text" name="nickname" value="Nickname(max 50)">
        <input type="text" name="email" value="Email">
        <input type="password" name="password" value="password (max 128)">
        <input type="password" name="repassword" value="repassword">
        <button type="submit" name="submit">Sign up</button>
      </form>
      <input type="button" value="Login(katki)" onclick="window.location.href='index.php'" />
    </div>
  </body>
</html>
