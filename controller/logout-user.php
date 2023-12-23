<?php
    session_start();
    $_SESSION['statusUser'] = false;
    header("location: ../index.php");
?>