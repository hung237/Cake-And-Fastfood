<?php
    include_once "../../model/database/db.php";
    if(isset($_POST['add-user'])){
        $name_user = $_POST['name-user'];
        $role = $_POST['role'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $phone = $_POST['phone'];
        $image = basename($_FILES['image']['name']);

        if(!empty(trim($name_user)) && !empty(trim($role)) && !empty(trim($email)) && !empty(trim($pass)) && !empty(trim($image))){
            $checkEmail = checkEmail($email);
            if($checkEmail){
                echo '<script>document.getElementById("model").style.display = "block"
            document.getElementById("box-model").style.display = "block"
            document.getElementById("box-model").innerText = "Email already exists";
            setInterval(endError(), 3000);
            setInterval();
            </script>'; 
            }
            else{
                $imageArr = explode(".",$image); // tạo mảng gồm gác phần tủ cách nhau dấu.
                $ext = end($imageArr);        // Lấy phàn tử cuối mảng(png,jpg...)
                $newimage = uniqid().".".$ext; // tạo tên file mới
                                    //Tên mới= random chuỗi.phần tử cuối bên trên
                
                $target_dir = "../assets/image/user/"; // Nơi lưu file khi upload
                $target_file = $target_dir . $newimage; // tên file upload
                do{
                    $newimage = uniqid().".".$ext;
                    $target_file = $target_dir . $newimage;
                    $checkUrl =  checkAvt($newimage);
                }
                while($checkUrl!=1);
                addUserAvt($name_user,$email,$phone,$pass,$newimage,$role);
                move_uploaded_file($_FILES['image']['tmp_name'],$target_file);
                echo '<script>document.getElementById("model").style.display = "block"
                document.getElementById("box-model").style.display = "block"
                document.getElementById("box-model").innerText = "Successfully added account";
                setInterval(endError(), 3000);
                setInterval();
                </script>';
                // echo "<meta http-equiv='refresh' content='0;url=index.php?act=adduser'>";
                
            }

        }
        else{
            echo '<script>document.getElementById("model").style.display = "block"
            document.getElementById("box-model").style.display = "block"
            document.getElementById("box-model").innerText = "Fill in all the information";
            setInterval(endError(), 3000);
            setInterval();
            </script>';
        }
    }
?>


<div class="right col10">
    <div class="box-update">
        <div class="title margin-top-40px">
            <h1>Add user</h1>
        </div>
        <div class="form margin-top-40px">
            <form action="index.php?act=adduser" method="post" class="box-update" enctype="multipart/form-data">
                <div class="form-control flex col12">
                    <div class="form-group col6">
                        <label for="name-user"></label>
                        <input type="text" name="name-user"placeholder="Name">
                    </div>
                    <div class="col6 form-group">
                        <select name="role" id="">=
                            <option value="1">User</option>
                            <option value="0">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="form-control flex col12">
                    <div class="form-group col6">
                        <div class="form-group col12">
                            <label for="email"></label>
                            <input id="email"type="text" name="email"placeholder="Email">
                        </div>
                        <div class="col12 form-group">
                            <label for="pass"></label>
                            <input type="text" name="pass" placeholder="Password">
                            <label for="comfirmpass"></label>
                            <input type="text" name="phone" placeholder="Phone number">
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
                <button name="add-user" type="submit">Submit</button>
                <div class="clear"></div>
            </form>
        </div>
    </div>
</div>
<script>
    function errorAnimation(){
        document.getElementById("model").style.display = "block"
        document.getElementById("box-model").style.display = "block"
        document.getElementById("box-model").innerText = "Fill in all the information";
    }

    function endError(){
        document.getElementById("model").style.display = "none"
        document.getElementById("box-model").style.display = "none"
    }
    setInterval(function(){
        document.getElementById("model").style.display = "none"
        document.getElementById("box-model").style.display = "none"
    }, 3000);
</script>
