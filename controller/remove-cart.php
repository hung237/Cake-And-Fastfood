<?php
    ob_start();
    session_start();
    if(isset($_POST["id"]) && isset($_POST["id"])){
        $id = $_POST["id"];
        unset($_SESSION['cart'][$id]);
        $qty = count($_SESSION['cart']);
    }
    echo $qty;
?>