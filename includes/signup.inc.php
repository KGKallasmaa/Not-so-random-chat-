<?php


//security
if (isset($_POST['submit'])){
  include_once 'dbh.inc.php';

  $nickname = mysqli_real_escape_string($conn,$_POST['nickname']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);
  $repassword = mysqli_real_escape_string($conn,$_POST['repassword']);


  //Error handling
  //Check for empy fields
  if (empty($nickname) || empty($email) || empty($password) || empty($repassword)){
    header("Location: ../signup.php?signup=empty");
    exit();
  }
  else {
    //check if input characters are valid
    if (!preg_match('/[^A-Za-z0-9.#\\-$]/', $nickname)||!preg_match('/[^A-Za-z0-9.#\\-$]/', $password)||!preg_match('/[^A-Za-z0-9.#\\-$]/', $repassword)||) {
      header("Location: ../signup.php?signup=invalid");
      exit();
    }
    else {
      //is email valid?
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?signup=email");
        exit();
      }
      else {
        //check if password and repassword are the samme
        if ($password != $repassword){
          header("Location: ../signup.php?signup=invalidpasswords");
          exit();
        }
        else{
          //Check, if email is unique
          $sql_email = "SELECT * FROM Users WHERE email='$email'";
          $result_email = mysqi_query($conn,$sql_email);
          $result_email_check = mysqli_num_rows($result_email);

          if($result_email_check >0){
            header("Location: ../signup.php?signup=emailtaken");
            exit();
          }
          else {
            //hasing the password
            $hashed_password = password_hash($password,PASSWORD_DEFAULT);

            //Incert the user into the database

            $sql = "INSERT INTO Users (nickname,email,password) Values ('$nickname','$email','$hashed_password')";
            mysqli_query($conn,$sql);
            header("Location: ../signup.php?signup=sucess");
            exit();

          }


      }
    }
  }



}
else {
  header("Location: ../signup.php");
  exit();
}
