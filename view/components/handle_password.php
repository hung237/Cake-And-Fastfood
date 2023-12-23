<?php
    session_start();
    $errorCode = null;
    $errorPass = null;
    $notification = null;
    if(isset($_POST['submit'])){
        $email = $_SESSION['emailForget'];
        $pass = htmlspecialchars_decode($_POST['password']);
        $code = htmlspecialchars_decode($_POST['code']);
        include "../../model/database/db.php";
        if($code != $_SESSION['code']){
            $errorCode = "Confirmation code is incorrect";
            $notification ='';
        }
        else{
            $errorCode = "";
            if(!empty(trim($pass))){
                $errorPass = "";
                resetPassword($email,$pass);
                $notification = "Change password successfully!";
            }
            else {
                $errorPass = "Please enter a new password";
                $notification ='';
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
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html{
            font-family: Arial, Helvetica, sans-serif;
        }
        body{
            background-color: #06113C;
        }
        .container{
            width: 100%;
            
        }
        .box{
            width: 40%;
            margin: 100px 30%;
            background-color: white;
            text-align: center;
            display: block;
            padding: 50px 0;
            border-radius: 20px;
        }
        h2{
            font-size: 22px;
            line-height: 1.4;
        }
        p{
            height: 14px;
            width: 100%;
            color: red;
            margin: 10px 0 5px 0;
        }
        input{
            height: 44px;
            border: solid 2px #e6e6e9;
            width: 70%;
            margin: 0 15%;
            outline: none;
            padding-left: 24px;
            border-radius: 5px;
            border: solid 1px #FF8C32;
        }
        button{
            height: 44px;
            border: solid 2px #f7954b;
            width: 70%;
            margin: 30px 15%;
            background-color: #f7954b;
            color: white;
            font-size: 18px;
            font-weight: bold;
            border-radius: 5px;
        }
        button:hover{
            cursor: pointer;
            background-color: white;
            color: #FF8C32;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="box">
            <p style="color: #00A9F8; margin-bottom: 10px;"><?php echo $notification; ?></p>
            <h2>RESET PASSWORD</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <p><?php echo $errorCode; ?></p>
                <input name="code" type="text" placeholder="Code">
                <p><?php echo $errorPass; ?></p>
                <input name="password" type="password" placeholder="New password">
                <button name="submit" type="submit">Reset Password</button>
            </form>
            <p style="color: black; font-size: 18px;">Comeback to <a style="color: #117e61; text-decoration: none;" href="./login.php">home page</a></p>
        </div>
    </div>
</body>
</html>
