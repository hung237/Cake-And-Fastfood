<?php
    session_start();
    $_SESSION['statusAdmin'] = false;
    header("location: ../index.php");
?>