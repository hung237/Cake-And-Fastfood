<?php
    session_start();
    include "../model/database/db.php";
    // echo $_SESSION['this_id'];
    if(isset($_POST['update-product'])){
        $name_product = $_POST['name-product'];
        $kind = $_POST['kind'];
        $price = $_POST['price'];
        $des = $_POST['des'];
        $image = basename($_FILES['image']['name']);
        if(!empty(trim($image))){ //nếu chọn ảnh
            if(!empty(trim($name_product)) && !empty(trim($kind)) && !empty(trim($price)) && !empty(trim($des))){
                $imageArr = explode(".",$image); // tạo mảng gồm gác phần tủ cách nhau dấu.
                $ext = end($imageArr);        // Lấy phàn tử cuối mảng(png,jpg...)
                $newimage = uniqid().".".$ext; // tạo tên file mới
                                    //Tên mới= random chuỗi.phần tử cuối bên trên
                
                $target_dir = "../view/assets/image/".$kind."/"; // Nơi lưu file khi upload
                $target_file = $target_dir . $newimage; // tên file upload
                do{
                    $newimage = uniqid().".".$ext;
                    $target_file = $target_dir . $newimage;
                    $checkUrl =  checkItems($newimage);
                }
                while($checkUrl!=1);
                updateItems($_SESSION['this_id'],$name_product,$price,$des,$kind,$newimage);
                move_uploaded_file($_FILES['image']['tmp_name'],$target_file);
                $item = showItems($_SESSION['this_id']);
                unlink('../view/assets/image/'.$item[0]['kind']).'/'.$item[0]['image'];
                echo '<script>alert("Cập nhập sản phẩm thành công!")</script>';
            }
        }
        else{
            if(!empty(trim($name_product)) && !empty(trim($kind)) && !empty(trim($price)) && !empty(trim($des))){
                updateItemsNoImg($_SESSION['this_id'],$name_product,$price,$des,$kind);
                echo '<script>alert("Cập nhập sản phẩm thành công!")</script>';
            }
        }
        echo "<meta http-equiv='refresh' content='0;url=../view/admin/index.php?act=listproduct'>";
    }
?>