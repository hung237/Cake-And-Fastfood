
<?php
    include_once "../../model/database/db.php";
    session_start();
    $id = $_GET['this_id'];
    $_SESSION['this_id'] = $id;
    $item = showItems($id);

    if(isset($_POST['update-product'])){
        $id = $_GET['this_id'];
        echo '<script>alert("asfasaf")</script>';
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
                
                $target_dir = "../assets/image/".$kind."/"; // Nơi lưu file khi upload
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
                unlink('../assets/image/'.$item[0]['kind']).'/'.$item[0]['image'];
            }
        }
        else{
            if(!empty(trim($name_product)) && !empty(trim($kind)) && !empty(trim($price)) && !empty(trim($des))){
                updateItemsNoImg($_SESSION['this_id'],$name_product,$price,$des,$kind);
                echo '<script>alert("asfasaf")</script>';
            }
        }
    }

?>

<div class="main">
    <div class="box-update">
        <div class="title margin-top-40px">
            <h1>Update product</h1>
        </div>
        <div class="form margin-top-40px">
            <!-- ../../ -->
            <form action="../../controller/update-product.php" method="post" class="box-update" enctype="multipart/form-data">
                <div class="form-control flex col12">
                    <div class="form-group col6">
                        <label for="name-product"></label>
                        <input type="text" value="<?php echo $item[0]["product_name"]?>" name="name-product" id="name-product" placeholder="Name">
                    </div>
                    <div class="col6 form-group">
                        <select name="kind" id="">
                        <option value="<?php echo $item[0]["kind"]?>"><?php echo $item[0]["kind"]?></option>
                            <option value="Cracker">Cracker</option>
                            <option value="Cake">Cake</option>
                            <option value="Drink">Drink</option>
                            <option value="Cream">Cream</option>
                        </select>
                    </div>
                </div>
                <div class="form-control flex col12">
                    <div class="form-group col6">
                        <div class="form-group col12">
                            <label for="price"></label>
                            <input type="text" value="<?php echo $item[0]["price"]?>" name="price" id="price" placeholder="Price">
                        </div>
                        <div class="col12 form-group">
                            <label for="des"></label>
                            <input type="text" class="form-control" value="<?php echo $item[0]["des"]?>" placeholder="Leave a comment here" style="height: 150px;" spellcheck="false" name="des" id="des"></input>
                        </div>
                    </div>
                    <div class="form-group col6 flex align-item-center">
                        <div class="col6">
                            <label for="avatar"></label>
                            <input type="file" id="avatar" name="image" accept="image/*">
                        </div>
                        <div class="img col6">
                            <img id="avatar-preview" src="<?php echo "../../view/assets/image/".$item[0]["kind"]."/".$item[0]["image"] ?>" width="200px" height="200px">
                        </div>
                    </div>
                </div>
                <button name="update-product" type="submit">Submit</button>
                <div class="clear"></div>
            </form>
        </div>
    </div>
</div>


