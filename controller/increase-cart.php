<?php
    ob_start();
    session_start();
    if(isset($_POST["id"]) && isset($_POST["id"])){
        $id = $_POST["id"];
        $_SESSION['cart'][$id]["quantity"]++;
    }
?>