<?php 
    session_start();
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart']= [];

    }
    $qty = 0;
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        if(array_key_exists($id, $_SESSION['cart'])){
            $_SESSION['cart'][$id]['quantity'] ++ ;
        }
        else{
            $_SESSION['cart'][$id] = [
                'product_id' => $id,
                'quantity' => 1
            ];
        }
        $qty = count($_SESSION['cart']);
        echo $qty;
    }

?>