<?php
    error_reporting(4);
    session_start();
    include "./model/database/db.php"
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>5Byte-store</title>
<link rel="shortcut icon" href="./view/assets/image/icons8-hamburger-100.png" type="image/x-icon">
<link rel="stylesheet" href="./view/assets/css/blog.css">
<link rel="stylesheet" href="./view/assets/css/style.css">
<link rel="stylesheet" href="./view/assets/themify-icons/themify-icons.css">
<link rel="stylesheet" href="./view/assets/fontawesome-free-6.3.0-web/css/all.css">
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body id="body">
    <div class="model" id="model">
        <div id="box-model" class="box-model"></div>
    </div>
    <header id="header">
        <div class="container">
            <div class="row header">
                <div class="col3 logo">
                    <img src="./view/assets/image/logo-night.png" alt="">
                </div>
                <div class="col6 menu">
                    <ul class="menu-items">
                        <a href="index.php?act=home">
                            <li>Home</li>
                        </a>
                        <a href="index.php?act=about">
                            <li>About Us</li>
                        </a>
                        <a href="index.php?act=menu">
                            <li>Menu</li>
                        </a>
                        <a href="index.php?act=contact">
                            <li>Contact</li>
                        </a>
                        <a href="index.php?act=blog">
                            <li>Blog</li>
                        </a>
                    </ul>
                </div>
                <div class="col3 icon t-2 m-6">
                    <div class="cart">
                        <a href="index.php?act=cart">
                            <ion-icon style="margin: 0 8px;" name="cart-outline"></ion-icon>
                        </a>
                        <div class="qty" id="qty">
                            <?php
                                if(!isset($_SESSION['cart'])){
                                    echo '0';
                                }
                                else{
                                    echo count($_SESSION['cart']);
                                }
                            ?>
                        </div>
                    </div>
                    <?php
                        if(!isset($_SESSION['statusUser']) || $_SESSION['statusUser'] == false){
                            echo'
                                <button id="login-btn" class="login-btn" onclick="login()">Login</button>
                            ';
                        }
                        else{
                            echo'
                                <div class="user-login">
                                    <div class="user-login-avatar">
                                        <a href="index.php?act=edit-user">';
                                        if($_SESSION['user'][0]['avatar'] == null || $_SESSION['user'][0]['avatar']==''){
                                            echo '<img src="./view/assets/image/user/no-avatar.png" alt="">';
                                        }
                                        else{
                                            echo '<img src="./view/assets/image/user/'.$_SESSION['user'][0]['avatar'].'" alt="">';
                                        }
                                        echo '
                                        </a>
                                    </div>
                                    <div class="user-login-name">
                                    '.$_SESSION['user'][0]['name'].'
                                    </div>
                                    <div class="logout">
                                        <a href="./controller/logout-user.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                                    </div>
            
                                </div>
                            ';
                        }
                    ?>
                </div>
            </div>
        </div>
    </header>

    