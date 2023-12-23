<?php
  session_start();
  include "../../model/database/db.php";
  $errorEmailLogin = null;
  $errorPassLogin = null;
  $errorLogin = null;
  if(isset($_POST['login'])){
    $emailLogin = $_POST['email-login'];
    $passLogin = $_POST['pass-login'];
    if(!trim(empty($emailLogin)) && !trim(empty($passLogin))){
      $userLogin = checkUser($emailLogin,$passLogin);
      if($userLogin == 2){
        $errorLogin ='Wrong login information';
      }
      else{
        if($userLogin == 0){
          $_SESSION['statusAdmin'] = true;
          header("location: ../admin/index.php");
        }
        else{
          if($userLogin == 1){
            $_SESSION['statusUser'] = true;
            $_SESSION['user'] = showUser($emailLogin);
            header("location: ../../index.php");
          }
        }
      }
    }
    else{
      if(trim(empty($emailLogin))){
        $errorEmailLogin ='You have not entered your email';
      }
      else{
        $errorEmailLogin ='';
      }
      if(trim(empty($passLogin))){
        $errorPassLogin = 'You have not entered your password';
      }
      else{
        $errorPassLogin = '';
      }
    }
  }
  $errorName = null;
  $errorEmail = null;
  $errorPhone = null;
  $errorPass = null;
  $errorConfirnPass = null;
  if(isset($_POST['signup'])){
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
    if(!empty(trim($name)) && !empty(trim($email)) && !empty(trim($phone)) && !empty(trim($pass)) && !empty(trim($pass)) && !empty(trim($confirnPass))){
      $checkEmail = checkEmail($email);
      if($checkEmail){
        $errorEmail = 'Registered email already exists';
      }
      else{
        if($pass != $confirnPass){
          $errorConfirnPass = 'Confirn password is incorrect';
        }
        else{
          addUser($name,$email,$phone,$pass);
        }
      }
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>5Byte-store Login/Registration</title>
  <link rel="shortcut icon" href="../assets/image/icons8-hamburger-100.png" type="image/x-icon">
  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins");

    * {
    box-sizing: border-box;
    }

    body {
    display: flex;
    background-color: #eee;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    font-family: "Poppins", sans-serif;
    overflow: hidden;
    height: 100vh;
    }

    h1 {
    font-size: 36px;
    font-weight: 700;
    letter-spacing: -1.5px;
    margin: 25px 0;
    }

    h1.title {
    font-size: 32px;
    line-height: 40px;
    margin: 0;
    text-shadow: 0 0 10px rgba(16, 64, 74, 0.5);
    }

    p {
    font-size: 16px;
    font-weight: 100;
    line-height: 20px;
    letter-spacing: 0.5px;
    margin: 40px 0 30px;
    text-shadow: 0 0 10px rgba(16, 64, 74, 0.5);
    }

    span {
    font-size: 14px;
    margin-top: 4px;
    }

    a {
    color: #333;
    font-size: 14px;
    text-decoration: none;
    margin: 15px 0;
    transition: 0.3s ease-in-out;
    }

    a:hover {
    color: #4bb6b7;
    }

    .content {
    display: flex;
    width: 100%;
    height: 50px;
    align-items: center;
    justify-content: space-around;
    }

    .content .checkbox {
    display: flex;
    align-items: center;
    justify-content: center;
    }

    .content input {
    accent-color: #FFFFF2;
    width: 20px;
    height: 20px;
    }

    .content label {
    font-size: 14px;
    user-select: none;
    padding-left: 5px;
    }

    button {
    position: relative;
    border-radius: 23px;
    border: 2px solid #FF8C32;
    background-color: #FF8C32;
    color: #fff;
    font-size: 15px;
    font-weight: 700;
    margin: 10px;
    padding: 0 80px;
    height: 44px;
    font-size: 22px;
    font-weight: bold;
    letter-spacing: 1px;
    text-transform: capitalize;
    transition: 0.3s ease-in-out;
    }

    button:hover {
    letter-spacing: 5px;
    }

    button:active {
    transform: scale(0.95);
    }

    button:focus {
    outline: none;
    }

    button.ghost {
    background-color: rgba(225, 225, 225, 0);
    border: 2px solid #fff;
    color: #fff;
    }

    button.ghost i{
    position: absolute;
    opacity: 0;
    transition: 0.3s ease-in-out;
    }

    button.ghost i.register{
    right: 70px;
    }

    button.ghost i.login{
    left: 70px;
    }

    button.ghost:hover i.register{
    right: 40px;
    opacity: 1;
    }

    button.ghost:hover i.login{
    left: 40px;
    opacity: 1;
    }

    form {
    background-color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 20px 80px;
    height: 100%;
    text-align: center;
    }

    input {
    background-color: #eee;
    border-radius: 24px;
    border: solid 1px #FF8C32;
    height: 44px;
    outline: none;
    background-color: #eee;
    padding: 0 15px;
    margin: 8px 0 0 0;
    width: 100%;
    }

    .container {
    background-color: #f7954b;
    border-radius: 25px;
    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
    position: relative;
    overflow: hidden;
    width: 1200px;
    max-width: 100%;
    min-height: 680px;
    }

    .form-container {
    position: absolute;
    top: 0;
    height: 100%;
    transition: all 0.6s ease-in-out;
    }

    .login-container {
    left: 0;
    width: 50%;
    z-index: 2;
    }

    .container.right-panel-active .login-container {
    transform: translateX(100%);
    }

    .register-container {
    left: 0;
    width: 50%;
    opacity: 0;
    z-index: 1;
    }

    .container.right-panel-active .register-container {
    transform: translateX(100%);
    opacity: 1;
    z-index: 5;
    animation: show 0.6s;
    }

    @keyframes show {
    0%,
    49.99% {
        opacity: 0;
        z-index: 1;
    }

    50%,
    100% {
        opacity: 1;
        z-index: 5;
    }
    }

    .overlay-container {
    position: absolute;
    top: 0;
    left: 50%;
    width: 50%;
    height: 100%;
    overflow: hidden;
    transition: transform 0.6s ease-in-out;
    z-index: 100;
    }

    .container.right-panel-active .overlay-container {
    transform: translate(-100%);
    }

    .overlay {
    background-image: url('../assets/image/bg-login.png');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: 0 0;
    color: #fff;
    position: relative;
    left: -100%;
    height: 100%;
    width: 200%;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
    }

    .overlay::before {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    
    background: linear-gradient(
        to top,
        rgba(59, 59, 59, 0.3) 30%,
        rgba(59, 59, 59, 0.2)
    );
    }

    .container.right-panel-active .overlay {
    transform: translateX(50%);
    }

    .overlay-panel {
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 40px;
    text-align: center;
    top: 0;
    height: 100%;
    width: 50%;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
    }

    .overlay-left {
    transform: translateX(-20%);
    }

    .container.right-panel-active .overlay-left {
    transform: translateX(0);
    }

    .overlay-right {
    right: 0;
    transform: translateX(0);
    }

    .container.right-panel-active .overlay-right {
    transform: translateX(20%);
    }

    .social-container {
    margin: 20px 0;
    display: flex;
    }

    .social-container a {
    border: 2px solid #dddddd;
    border-radius: 50%;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin: 0 5px;
    height: 40px;
    width: 40px;
    transition: 0.3s ease-in-out;
    }

    .social-container a:hover {
    border: 2px solid #FF8C32;
    color: #FF8C32;
    }
    .error{
      width: 100%;
      height: 12px;
      font-size: 12px;
      margin-bottom: 2px;
      color: red;
      text-align: left;
      padding-left: 16px;
    }
    .errorLogin{
      width: 100%;
      height: 12px;
      font-size: 12px;
      margin-bottom: 2px;
      color: red;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container" id="container">

    <div class="form-container register-container">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h1>Signup here</h1>
        <input type="text" placeholder="Name" name="name">
        <span class="error"><?php echo $errorName; ?></span>
        <input type="email" placeholder="Email" name="emailSignin">
        <span class="error"><?php echo $errorEmail; ?></span>
        <input type="text" placeholder="Phone Number" name="phoneSignin">
        <span class="error"><?php echo $errorPhone; ?></span>
        <input type="password" placeholder="Password" name="pass">
        <span class="error"><?php echo $errorPass; ?></span>
        <input type="password" placeholder="Confirn Password" name="confpass">
        <span class="error"><?php echo $errorConfirnPass; ?></span>
        <button type="submit" name="signup">Signup</button>
        <span>Or</span>
        <div class="social-container">
          <a href="#" class="social"><i class="lni lni-facebook-fill"></i></a>
          <a href="#" class="social"><i class="lni lni-google"></i></a>
          <a href="#" class="social"><i class="lni lni-instagram"></i></a>
        </div>
      </form>
    </div>

    <div class="form-container login-container">
      <form action="" method="post">
        <h1>Login here.</h1>
        <span class="errorLogin"><?php echo $errorLogin; ?></span>
        <input name="email-login" type="email" placeholder="Email">
        <span class="error"><?php echo $errorEmailLogin; ?></span>
        <input name="pass-login" type="password" placeholder="Password">
        <span class="error"><?php echo $errorPassLogin; ?></span>
        <div class="content">
          <div class="checkbox">
            <input type="checkbox" name="checkbox" id="checkbox">
            <label>Remember me</label>
          </div>
          <div class="pass-link">
            <a href="forgot-password.php">Forgot password?</a>
          </div>
        </div>
        <button type="submit" name="login">Login</button>
        <span>You don't have account?</span>
        <div class="social-container">
          <a href="#" class="social"><i class="lni lni-facebook-fill"></i></a>
          <a href="#" class="social"><i class="lni lni-google"></i></a>
          <a href="#" class="social"><i class="lni lni-instagram"></i></a>
        </div>
        <a href="../../index.php"></a>
      </form>
    </div>

    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1 class="title">Do you already <br> have an account</h1>
          <p>If you don't have account  join us <br> and start your journey</p>
          <button class="ghost" id="login">Login
            <i class="lni lni-arrow-left login"></i>
          </button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1 class="title">START YOUR <br> JOURNEY NOW</h1>
          <p>If you don't have account  join us <br> and start your journey</p>
          <button class="ghost" id="register">Register
            <i class="lni lni-arrow-right register"></i>
          </button>
        </div>
      </div>
    </div>

  </div>

  <script>
    const registerButton = document.getElementById("register");
    const loginButton = document.getElementById("login");
    const container = document.getElementById("container");

    registerButton.addEventListener("click", () => {
    container.classList.add("right-panel-active");
    });

    loginButton.addEventListener("click", () => {
    container.classList.remove("right-panel-active");
    });

    function signup() {
    $.post("../../controller/signup.php", { id: id }, function (data) {
      alert("Add to cart success");
      document.getElementById("qty").innerText = data;
    });
}
  </script>
  <?php
    if(isset($_POST['signup'])){
      echo '<script>container.classList.add("right-panel-active");</script>';
    }
  ?>
</body>
</html>