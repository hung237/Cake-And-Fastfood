<?php
    function connectdb(){
    $servername = "localhost:3308";
    $user = "root";
    $pass = "";
    $dbName = "DA-1";
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $user, $pass);
    return  $conn;
    }

    function addItem($name_product,$price,$des,$kind,$image){
    $conn = connectdb();
    $sql = "INSERT INTO products (product_name, price, des, kind, image)
    VALUES ('$name_product', '$price', '$des', '$kind', '$image')";
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
    function listItems(){
        $conn = connectdb();
        $sql = "SELECT * FROM products";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }
    function listItemsMenus($item_per_page,$offset){
        $conn = connectdb();
        $sql = "SELECT * FROM products  ORDER BY product_id ASC LIMIT $item_per_page OFFSET $offset";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }
    function listItemsMenusKind($item_per_page,$offset,$kind){
        $conn = connectdb();
        $sql = "SELECT * FROM products WHERE kind='$kind'  ORDER BY product_id ASC LIMIT $item_per_page OFFSET $offset";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }
    function totalItem(){
        $conn = connectdb();
        $sql = "SELECT * FROM products";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return count($kq);
    }
    function totalItemOfKind($kind){
        $conn = connectdb();
        $sql = "SELECT * FROM products WHERE kind ='$kind'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return count($kq);
    }
    function del_product($id){
        $conn = connectdb();
        $sql = "DELETE FROM products WHERE product_id=$id";
        // // use exec() because no results are returned
        $conn->exec($sql);
    }

    function showItems($id){
            $conn = connectdb();
            $sql = "SELECT * FROM products  WHERE product_id=$id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
            $kq = $stmt->fetchAll();
            return $kq;
    }
    function updateItems($id,$name_product,$price,$des,$kind,$newimage){
        $conn = connectdb();
        $sql = "UPDATE products SET  kind='$kind' , des='$des'
        , product_name='$name_product' , price='$price' , image='$newimage' WHERE product_id='$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function updateItemsNoImg($id,$name_product,$price,$des,$kind){
        $conn = connectdb();
        $sql = "UPDATE products SET  kind='$kind' , des='$des'
        , product_name='$name_product' , price='$price' WHERE product_id='$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    function checkUser($email,$pass){
        $conn = connectdb();
        $stmt = $conn -> prepare("SELECT * FROM user WHERE email=? AND pass =?");
        $stmt -> bindParam(1,$email);
        $stmt -> bindParam(2,$pass);
        $stmt -> execute();
        $kq = $stmt -> fetchAll();
        if(count($kq)>0){
            return $kq[0]['role'];
        }
        else return 2;
    }
    function checkAvt($avt){
        $conn = connectdb();
        $stmt = $conn -> prepare("SELECT * FROM user WHERE avatar='".$avt."'");
        $stmt -> execute();
        $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt -> fetchAll();
        if(count($kq)>0){
            return 0;
        }
        else return 1;
    }
    function showUser($email){
        $conn = connectdb();
        $sql = "SELECT * FROM user  WHERE email='$email'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }
    function checkEmail($email){
        $conn = connectdb();
        $stmt = $conn -> prepare("SELECT * FROM user WHERE email=?");
        $stmt -> bindParam(1,$email);
        $stmt -> execute();
        $kq = $stmt -> fetchAll();
        if(count($kq)>0){
            return true;
        }
        else return false;
    }
    function resetPassword($email,$pass){
        $conn = connectdb();
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
        $sql = "UPDATE user SET pass='$pass' WHERE email='$email'";
        // Prepare statement
        $stmt = $conn->prepare($sql);
      
        // execute the query
        $stmt->execute();
    }
    function addUser($name, $email, $phone, $pass){
        $conn = connectdb();
        $sql = $conn -> prepare("INSERT INTO user (name, email, phone_number, pass)
        VALUES (?, ?, ?, ?)");
        $sql -> bindParam(1,$name);
        $sql -> bindParam(2,$email);
        $sql -> bindParam(3,$phone);
        $sql -> bindParam(4,$pass);
        $sql->execute();
    }
    function addUserAvt($name, $email, $phone, $pass, $avt, $role){
        $conn = connectdb();
        $sql = $conn -> prepare("INSERT INTO user (name, email, phone_number, pass, avatar,role)
        VALUES (?, ?, ?, ?, ?, ?)");
        $sql -> bindParam(1,$name);
        $sql -> bindParam(2,$email);
        $sql -> bindParam(3,$phone);
        $sql -> bindParam(4,$pass);
        $sql -> bindParam(5,$avt);
        $sql -> bindParam(6,$role);
        $sql->execute();
    }
    function listUser(){
        $conn = connectdb();
        $sql = "SELECT * FROM user";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }
    function updateUser($email,$name,$pass,$phone,$role,$avt){
        $conn = connectdb();
        $sql = "UPDATE user SET  name='$name' , pass='$pass'
        , phone_number='$phone' , role='$role' , avatar='$avt' WHERE email='$email'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function updateUserNoAvt($email, $name, $pass, $phone, $role){
        $conn = connectdb();
        $sql = "UPDATE user SET  name='$name' , pass='$pass'
        , phone_number='$phone' , role='$role' WHERE email='$email'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function del_user($email){
        $conn = connectdb();
        $sql = "DELETE FROM user WHERE email='$email'";
        $conn->exec($sql);
    }
    
    function addBill($total,$name,$email,$phoneNumber,$address,$user_id){
        $conn = connectdb();
        $sql = $conn -> prepare("INSERT INTO bill (total, name, email, phone, address,user_id)
        VALUES (?,?,?,?,?,?)");
        $sql -> bindParam(1,$total);
        $sql -> bindParam(2,$name);
        $sql -> bindParam(3,$email);
        $sql -> bindParam(4,$phoneNumber);
        $sql -> bindParam(5,$address);
        $sql -> bindParam(6,$user_id);
        $sql -> execute();
        $order_id = $conn ->lastInsertId();
        return $order_id;
    }
    function listBill(){
        $conn = connectdb();
        $sql = "SELECT * FROM bill";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }
    function listBillComplete(){
        $conn = connectdb();
        $sql = "SELECT * FROM bill WHERE status='5'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }
    function listBillToday(){
        $conn = connectdb();
        $sql = "SELECT * FROM bill WHERE status='5' AND DATE(date) = CURDATE()";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }
    function listBillUser($id){
        $conn = connectdb();
        $sql = "SELECT * FROM bill WHERE user_id='$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }
    function showOrder($id){
        $conn = connectdb();
        $sql = "SELECT * FROM bill  WHERE bill_id=$id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }
    function del_order($id){
        $conn = connectdb();
        $sql = "DELETE FROM bill WHERE bill_id='$id'";
        $conn->exec($sql);
    }
    function del_order_detail($id){
        $conn = connectdb();
        $sql = "DELETE FROM detail_bill WHERE id='$id'";
        $conn->exec($sql);
    }
    function updateOder($id,$status){
        $conn = connectdb();
        $sql = "UPDATE bill SET  status='$status' WHERE bill_id='$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    function addBillDetail($product_id,$quantity,$bill_id,$price){
        $conn = connectdb();
        $sql = $conn -> prepare("INSERT INTO detail_bill (product_id, quantity, bill_id, price)
        VALUES (?,?,?,?)");
        $sql -> bindParam(1,$product_id);
        $sql -> bindParam(2,$quantity);
        $sql -> bindParam(3,$bill_id);
        $sql -> bindParam(4,$price);
        $sql -> execute();
    }
    function showBillDetail($id){
        $conn = connectdb();
        $sql = "SELECT * FROM detail_bill  WHERE bill_id=$id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }

    function bestSale(){
        $conn = connectdb();
        $sql = "SELECT product_id, SUM(quantity) as total_quantity FROM detail_bill GROUP BY product_id ORDER BY total_quantity DESC LIMIT 4;";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }
?>