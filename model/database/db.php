<?php
    function connectdb(){
    $servername = "localhost";
    $user = "root";
    $pass = "";
    $dbName = "da-1";
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $user, $pass);
    return  $conn;
    }

    function addItem($name,$price,$des,$kind,$image){
    $conn = connectdb();
    $sql = "INSERT INTO products (product_name, price, des, kind, image)
    VALUES ('$name', '$price', '$des', '$kind', '$image')";
    $conn->exec($sql);
    }
    function checkItems($file){
        $conn = connectdb();
        $stmt = $conn -> prepare("SELECT * FROM products WHERE image='".$file."'");
        $stmt -> execute();
        $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt -> fetchAll();
        if(count($kq)>0){
            return 0;
        }
        else return 1;
    }

?>