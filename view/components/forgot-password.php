<?php

use PHPMailer\PHPMailer\PHPMailer;

    session_start();
    $error = null;
    if(isset($_POST['submit'])){
        $email = htmlspecialchars_decode($_POST['email']);
        include "../../model/database/db.php";
        if(empty(trim($email))){
            $error = 'you have not entered your Email';
        }
        else{
            $check = checkEmail($email);
            if(!$check){
                $error = "Email does not exist";
            }
            else{
                $error = "";
                $_SESSION['emailForget'] = $email;
                $code = strval(rand(1000,9999));
                $_SESSION['code'] = $code;
                function sendEmail($email,$code){
                    $name = "Bùi Phi Hùng";  // Name of your website or yours
                    $to = $email;  // mail of reciever
                    $subject = "Confirm password change
                    ";
                    $body = "Your password change confirmation code is: ".$code;
                    $from = "hungdt2307@gmail.com";  // you mail

                    require '../../PHPMailer/src/EXception.php';
                    require '../../PHPMailer/src/PHPmailer.php';
                    require '../../PHPMailer/src/SMTP.php';

                    $mail = new PHPMailer(true);


                    try{
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = $from;
                        $mail->Password = 'fkveonmsarceezfg';
                        $mail->SMTPSecure = "tls";
                        $mail->Port = '587';

                        $mail->setFrom($from);
                        $mail->addAddress($to);

                        $mail->isHTML(true);
                        $mail->Subject = $subject;
                        $mail->Body = $body;

                        $mail->send();
                    }
                    catch(Exception $e){
                        
                    }

                }
                sendEmail($email,$code);
                header("location: handle_password.php");
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
            background-color: #fff;
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
            margin: 30px 0 5px 0;
        }
        input{
            height: 44px;
            border: solid 2px #f7954b;
            width: 70%;
            margin: 5px 15% 0 15%;
            outline: none;
            padding-left: 24px;
            border-radius: 5px;
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
            border: solid 2px #f7954b;
            background-color: white;
            color: #FF8C32;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="box">
            <h2>ENTER YOUR EMAIL TO RESET <br> YOUR PASSWORD</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <p><?php echo $error; ?></p>
                <input name="email" type="text" placeholder="Email">
                <button name="submit" type="submit">Submit</button>
            </form>
            <p style="color: black; font-size: 18px;">Comeback to <a style="color: #FF8C32; text-decoration: none;" href="./login.php">home page</a></p>
        </div>
    </div>
</body>
</html>
