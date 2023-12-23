<?php
    session_start();
    if($_SESSION['statusAdmin'] == false || !isset($_SESSION['statusAdmin'])){
        header("location: ../../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin 5Byte-store</title>
    <link rel="shortcut icon" href="../assets/image/icons8-hamburger-100.png" type="image/x-icon">
    <link rel="stylesheet" href="../../../view/assets/fontawesome-free-6.3.0-web/css/all.css">
    <link rel="stylesheet" href="./assets/css/css.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="./assets/style.css"> -->
</head>
<body>
    <div class="model" id="model">
        <div class="box-model" id="box-model">
        Successfully added account!
        </div>
    </div>
    <div class="container">
        <div class="menu">
            <div class="logo text-center ">
                <img src="../assets/image/logo-night.png" alt="" height="48px">
            </div>
            <hr class="margin-bot">
            <ul>
                <li class="item active">
                    <i class="fa-solid fa-house-user"></i> <a href="index.php?act=home">Dashboard</a>
                </li>
                <li class="item">
                    <i class="fa-solid fa-shirt"></i> Products <i class="fa-solid fa-chevron-down"></i>
                    <ul>
                        <li><a href="index.php?act=addproduct">Add product</a></li>
                        <li><a href="index.php?act=listproduct">List product</a></li>
                    </ul>
                </li>
    
                <li class="item">
                    <i class="fa-solid fa-user"></i> Users <i class="fa-solid fa-chevron-down"></i>
                    <ul>
                        <li><a href="index.php?act=adduser">Add user</a></li>
                        <li><a href="index.php?act=listuser">List user</a></li>
                        <li>block user</li>
                    </ul>
                </li>
                <li class="item ">
                    <i class="fa-solid fa-file-invoice"></i><a href="index.php?act=bill">List bill</a>
                </li>
                <li class="item ">
                    <i class="fa-solid fa-ranking-star"></i>Sales
                </li>
                <li class="item"><i class="fa-solid fa-right-from-bracket"></i> <a href="../../../controller/logout-admin.php">Logout</a></li>
    
    
            <div id="action" class=""></div>
            </ul>
        </div>