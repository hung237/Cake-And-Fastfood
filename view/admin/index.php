<?php include_once('./path/header.php') ?>

<?php include_once('./path/slidebar.php') ?>

<?php
    include_once "../../model/database/db.php";
    if(isset($_POST['add-product'])){
        $name_product = $_POST['name-product'];
        $kind = $_POST['kind'];
        $price = $_POST['price'];
        $des = $_POST['des'];
        $image = basename($_FILES['image']['name']);

        if(!empty(trim($name_product)) && !empty(trim($kind)) && !empty(trim($price)) && !empty(trim($des)) && !empty(trim($image))){
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
            addItem($name,$price,$des,$kind,$newimage);
            move_uploaded_file($_FILES['image']['tmp_name'],"../".$target_file);
            echo "<script>
                alert('Thêm sản phẩm thành công');
            </script>";
        }
        else{
            echo "<script>alert('Nhập đầy đủ thông tin')</script>";
        }
    }
?>


<div class="right col10">
    <div class="box">
        <div class="title margin-top-40px">
            <h1>Add product</h1>
        </div>
        <div class="form margin-top-40px">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="box" enctype="multipart/form-data">
                <div class="form-control flex col12">
                    <div class="form-group col6">
                        <label for="name-product"></label>
                        <input type="text" name="name-product" id="name-product" placeholder="Name">
                    </div>
                    <div class="col6 form-group">
                        <select name="kind" id="">
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
                            <input type="text" name="price" id="price" placeholder="Price">
                        </div>
                        <div class="col12 form-group">
                            <label for="des"></label>
                            <textarea class="form-control" placeholder="Leave a comment here" style="height: 150px;" spellcheck="false" name="des" id="des"></textarea>
                        </div>
                    </div>
                    <div class="form-group col6 flex align-item-center">
                        <div class="col6">
                            <label for="avatar"></label>
                            <input type="file" id="avatar" name="image" accept="image/*">
                        </div>
                        <div class="img col6">
                            <img id="avatar-preview" src="default-avatar.jpg" width="200px" height="200px">
                        </div>
                    </div>
                </div>
                <button name="add-product" type="submit">Submit</button>
                <div class="clear"></div>
            </form>
        </div>
    </div>
</div>

<?php include_once('./path/footer.php') ?>