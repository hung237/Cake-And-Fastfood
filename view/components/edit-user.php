<?php
    session_start();
    include_once "../model/database/db.php";
    $listBill = listBillUser($_SESSION["user"][0]["user_id"]);
    $user = showUser($_SESSION["user"][0]["email"]);
    $quantity = count($listBill);
    
    if (isset($_POST['save'])) {
        $name_user = $_POST['name'];
        $role = 1;
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $phone = $_POST['phoneNumber'];
        $image = basename($_FILES['image']['name']) ?: false;
    
        if($image){
            if (!empty(trim($name_user)) && !empty(trim($role)) && !empty(trim($email)) && !empty(trim($pass)) && !empty(trim($image))) {
                $imageArr = explode(".", $image); // tạo mảng gồm gác phần tủ cách nhau dấu.
                $ext = end($imageArr);        // Lấy phàn tử cuối mảng(png,jpg...)
                $newimage = uniqid() . "." . $ext; // tạo tên file mới
                //Tên mới= random chuỗi.phần tử cuối bên trên
        
                $target_dir = "./view/assets/image/user/"; // Nơi lưu file khi upload
                $target_file = $target_dir . $newimage; // tên file upload
                unlink("./view/assets/image/user/".$user[0]["avatar"]);
                do {
                    $newimage = uniqid() . "." . $ext;
                    $target_file = $target_dir . $newimage;
                    $checkUrl =  checkAvt($newimage);
                } while ($checkUrl != 1);
                updateUser($email,$name_user,$pass,$phone,$role,$newimage);
                move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                $_SESSION['user'] = showUser($email);
            } else {
            }
        }
        else{
            if (!empty(trim($name_user)) && !empty(trim($role)) && !empty(trim($email)) && !empty(trim($pass))) {
                updateUserNoAvt($email,$name_user,$pass,$phone,$role);
                $_SESSION['user'] = showUser($email);
                
            } else {
            }
        }
        echo header("refresh: 0");
        
    }


?>
<section class="container-edit-user-bg">
    <div class="container-edit-user">
        <div class="order-detail">
            <div class="box-order-detail flex">
                <div class="order-left width70">
                    <div class="order-customer">
                        <h2>Customer Detail</h2>
                        <hr>
                        <form action="index.php?act=edit-user" method="post" enctype="multipart/form-data">
                            <div class="flex container-order-customer">

                                <div class="order-customer-left ">
                                    <div class="box-order-customer-left align-item-center flex">
                                        <div class="img box-file-upload">
                                            <?php
                                                if($user[0]['avatar'] == null || $user[0]['avatar']==''){
                                                    echo '<img  id="avatar-preview" src="./view/assets/image/user/no-avatar.png" alt="">';
                                                }
                                                else{
                                                    echo '<img id="avatar-preview" src="./view/assets/image/user/'.$user[0]['avatar'].'" alt="">';
                                                }
                                            ?>

                                            <div class="file-upload">
                                                <div class="box-file-avt">
                                                    <i class="ti-pencil"></i>
                                                    <input type="file" id="avatar" name="image" accept="image/*">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="name">
                                            <p>
                                                <?php
                                                    echo $user[0]['name'];
                                                ?>
                                            </p>
                                            <p><?php
                                                if($quantity > 5){
                                                    echo "special member";
                                                }
                                                else{
                                                    echo 'normal member';
                                                }
                                            ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-customer-right">
                                    <form action="">
                                        <input type="text" value="<?php echo $user[0]['name'];?>" name="name" >
                                        <input readonly="true" value="<?php echo $user[0]['email'];?>" name="email">
                                        <input value="<?php echo $user[0]['phone_number'];?>" name="phoneNumber">
                                        <div class="box-eye">
                                            <input value="<?php echo $user[0]['pass'];?>" name="pass" type="password" id="pass-eye"><i onclick="eye()" id="eye" class="fa-solid fa-eye-slash"></i>
                                        </div>
                                        <button name="save" type="submit">Save</button>
                                    </form>

                                </div>

                            </div>
                        </form>
                    </div>
                    <div class="order-status margin-top">
                        <div class="box-order-status">
                            <!-- <h5>Your order status</h5> -->

                            <div class="container-order-status flex">
                                <div class="order-status-items margin-top">
                                    <div class="order-icon">
                                        <div class="order-icon-i check">
                                            <i class="fa-solid fa-check"></i>

                                            <div class="order-des">
                                                <p>Confirmation</p>
                                <p>05 minutes</p>
                                            </div>
                                        </div>
                                        <div class="order-icon-dot"></div>
                                    </div>
                                </div>
                                <div class="order-status-items margin-top">
                                    <div class="order-icon">
                                        <div class="order-icon-i no-check">
                                            <i class="fa-solid fa-check"></i>

                                            <div class="order-des">
                                                <p>Waiting for delivery</p>
                                <p>10 minutes</p>
                                            </div>
                                        </div>
                                        <div class="order-icon-dot"></div>
                                    </div>
                                </div>
                                <div class="order-status-items margin-top">
                                    <div class="order-icon">
                                        <div class="order-icon-i no-check">
                                            <i class="fa-solid fa-check"></i>

                                            <div class="order-des">
                                                <p>Delivery</p>
                                <p>15 minutes</p>
                                            </div>
                                        </div>
                                        <div class="order-icon-dot"></div>
                                    </div>
                                </div>
                                <div class="order-status-items margin-top">
                                    <div class="order-icon">
                                        <div class="order-icon-i no-check">
                                            <i class="fa-solid fa-check"></i>

                                            <div class="order-des">
                                                <p>Successful delivery</p>
                                <p>20 minutes</p>
                                            </div>
                                        </div>
                                        <div class="order-icon-dot"></div>
                                    </div>
                                </div>
                                <div class="order-status-items margin-top">
                                    <div class="order-icon">
                                        <div class="order-icon-i no-check">
                                            <i class="fa-solid fa-check"></i>

                                            <div class="order-des">
                                                <p>Goods received</p>
                                <p>25 minutes</p>
                                            </div>
                                        </div>
                                        <!-- <div class="order-icon-dot"></div> -->
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="order-product">
                    <h2>Order history</h2>
                    <hr>
                    <div class="order-history">
                        <?php
                            $index = 1;
                            foreach($listBill as $bill){
                                echo '
                                    <div class="order-history-items  flex">
                                        <button onclick="checkBill('.$bill["bill_id"].')" class="order-history-items-left col10">
                                            <div class="id-order">
                                                <p>'.$index.'</p>
                                            </div>
                                            <div class="date-order">
                                                <p>'.$bill["date"].'</p>
                                            </div>
                                            <div class="price-order">
                                                <p>$'.$bill["total"].'.00</p>
                                            </div>
                                        </button>
                                        <button onclick="detailBill('.$bill["bill_id"].')" class="order-history-items-right col2">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </div>
                                ';
                                $index ++;
                            }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="modal-bg">
    <div class="modal-flex flex">
        <div class="modal">
            <div class="box-modal">
                <div class="order-items">
                    <div class="order-items-title flex">
                        <h2>Order items</h2>
                        <i class="ti-close"></i>
                    </div>
                    
                    <div class="order-items-main flex">
                        <div class="container-order-items-product col7">
                            <div class="order-items-product">
                                <div class="img-item">
                                    <img src="./view/assets/image/Cake/1.png" alt="">
                                </div>
                                <div class="des-item">
                                    <h2>HUNGF NEF</h2>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit quis ratione odio sit consequuntur repudiandae repellat, </p>
                                </div>
                                <div class="price-item1">
                                    <span>x1</span>
                                </div>
                                <div class="price-item">
                                    $40.00
                                </div>
                            </div>

                        </div>
                        <div class="order-items-des col4">
                            <p>Bui Phi Hùng</p>
                            <p>123-456-789</p>
                            <p>hung@gmail.com</p>
                            <p>Do Xuan Hop, District 9, Ho Chi Minh city, Viet Nam</p>
                        </div>
                    </div>
                    <hr>
                    <div class="footer-order-items flex">
                        <div class="prepare-bill col7">
                            <div class="box-prepare-bill">
                                <h3>Subtotal</h3>
                                <h3>
                                    $40.00
                                </h3>
                            </div>
                            <div class="box-prepare-bill">
                                <h3>Shipping</h3>
                                <h3>
                                    $40.00
                                </h3>
                            </div>
                            <div class="box-prepare-bill">
                                <h3>Total</h3>
                                <h3>
                                    $40.00
                                </h3>
                            </div>
                        </div>
                        <div class="date-order col5 ">
                            <p>23:00 A.M</p>
                            <p>26/12/2012</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    let btnOrder = document.querySelectorAll(".order-history-items-left");
    let arrOrder = document.querySelectorAll(".order-history-items");
    console.log(arrOrder)
    function checkBill(id) {
    $.post("../controller/check-bill.php", { id: id }, function (data) {
        let arr = document.querySelectorAll(".order-icon-i")
        for(let i=0; i<5; i++){
            if(i<data){
                arr[i].classList.remove("no-check");
                arr[i].classList.add("check");
            }
            else{
                arr[i].classList.remove("check");
                arr[i].classList.add("no-check");
            }
        }
    });
    }
    btnOrder.forEach((button, index) => {
    button.addEventListener('click', event => {
        let buttonElement = event.target;
        while (buttonElement && !buttonElement.classList.contains("order-history-items-left")) {
        buttonElement = buttonElement.parentNode;
        }
        const buttonIndex = Array.from(btnOrder).indexOf(buttonElement);
        for(let i=0; i<btnOrder.length;i++){
            if(i == buttonIndex){
                arrOrder[i].classList.add("order-check-background");
            }
            else{
                arrOrder[i].classList.remove("order-check-background");
            }
        }
        console.log('Button clicked:', buttonIndex);
    });
});

    let indexEye = 0;
    function eye(){
        indexEye ++;
        let passEye = document.getElementById("pass-eye");
        let eye = document.getElementById("eye");
        if(indexEye == 1){
            passEye.type = "text";
            eye.classList.remove("fa-eye-slash");
            eye.classList.add("fa-eye");
        }
        else{
            passEye.type = "password";  
            eye.classList.remove("fa-eye");
            eye.classList.add("fa-eye-slash");
            indexEye = 0;
        }
    }
    
</script>

<?php
if ($_GET['act'] == 'edit-user') {
    echo '<script>document.getElementById("body").style.backgroundColor = "#eee"</script>';
} else {
    echo '<script>document.getElementById("body").style.backgroundColor = "none"</script>';
}
?>