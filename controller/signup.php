<?php
  $errorName = null;
  $errorEmail = null;
  $errorPhone = null;
  $errorPass = null;
  $errorConfirnPass = null;
  if(isset($_POST['signup'])){
    echo '<script>alert("dfsdfa")</script>';
    $name = $_POST['name'];
    $email = $_POST['emailSignin'];
    $phone = $_POST['phoneSignin'];
    $pass = $_POST['pass'];
    $confirnPass = $_POST['confpass'];
    if(empty(trim($name))){
      $errorName = '
      you have not entered your name';
    }
    else{
      $errorName = '';
    }
    if(empty(trim($email))){
      $errorEmail = '
      you have not entered your email';
    }
    else{
      $errorEmail = '';
    }
    if(empty(trim($phone))){
      $errorPhone = '
      you have not entered your phone number';
    }
    else{
      $errorPhone = '';
    }
    if(empty(trim($pass))){
      $errorPass = '
      you have not entered your password';
    }
    else{
      $errorPass = '';
    }
    if(empty(trim($confirnPass))){
      $errorConfirnPass = '
      you have not entered your confirn password';
    }
    else{
      $errorConfirnPass = '';
    }
    $arrError = [$errorName,$errorEmail,$errorPhone,$errorPass,$errorConfirnPass];
    echo $arrError;
  }
?>