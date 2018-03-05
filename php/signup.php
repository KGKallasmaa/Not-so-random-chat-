<?php

/*
Sample info
*/
$host = "localhost";
$user ="root";
$password = "";
$db = "demo";


mysql_connect($host,$user,$password);
mysql_select_db($db);

if (isset(['password'] == isset('')){
  $uname = $_POST['username']
  $password = $_POST['password']

  /*
  todo: add real values
  */

  $sql = "select * from loginfrom where user ='".$uname."' AND Pass = '"$password"' limit 1";

  $result = mysql_query($sql);

  if(mysql_num_rows($result) ==1){
    echo "you have successfully logged in";
  }
}
 ?>
