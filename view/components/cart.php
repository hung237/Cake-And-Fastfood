<?php
    if(isset($_POST['pay'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phone-number'];
        $address = $_POST['address'];
        if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0){
            echo '<script>document.getElementById("model").style.display = "block"
                    document.getElementById("box-model").style.display = "block"
                    document.getElementById("box-model").innerText = "Your cart is empty!";
                    
                    setInterval(function(){
                        document.getElementById("model").style.display = "none"
                        document.getElementById("box-model").style.display = "none"
                      }, 2000);
                    </script>';
        }
        else{
            if(!isset($_SESSION['statusUser']) || $_SESSION['statusUser'] == false){
                echo '<script>document.getElementById("model").style.display = "block"
                    document.getElementById("box-model").style.display = "block"
                    document.getElementById("box-model").innerText = "Please login to order!";
                    
                    setInterval(function(){
                        document.getElementById("model").style.display = "none"
                        document.getElementById("box-model").style.display = "none"
                      }, 2000);
                    </script>';
            }
            else{
                if(!trim(empty($name)) && !trim(empty($email)) && !trim(empty($phoneNumber)) && !trim(empty($address))){
                    $order_id = addBill(($_SESSION['total']+2),$name,$email,$phoneNumber,$address,$_SESSION["user"][0]["user_id"]);
                    foreach($_SESSION['cart'] as $item){
                        $product = showItems($item['product_id']);
                        $price = ($item['quantity'] * $product[0]['price']);
                        addBillDetail($item['product_id'],$item['quantity'],$order_id,$price);
                    }
                    echo '<script>document.getElementById("model").style.display = "block"
                    document.getElementById("box-model").style.display = "block"
                    document.getElementById("box-model").innerText = "Order Success";
                    setInterval(function(){
                        document.getElementById("model").style.display = "none"
                        document.getElementById("box-model").style.display = "none"
                      }, 2000);
                    </script>';
                    unset($_SESSION['cart']);
                    echo header("refresh: 2");
                }
                else{
                    echo '<script>document.getElementById("model").style.display = "block"
                    document.getElementById("box-model").style.display = "block"
                    document.getElementById("box-model").innerText = "Please complete all information!";
                    setInterval(function(){
                        document.getElementById("model").style.display = "none"
                        document.getElementById("box-model").style.display = "none"
                      }, 2000);
                    </script>';
                }

            }
        }

    }
?>
<!-- <section class="banner" style="margin: 100px;">
    <div class="banner-icon">
        <img src="./view/assets/image/icons8-cart-60 1.png" alt="">
    </div>
</section> -->
<section class="shopping-cart" style="margin-top: 120px;">
    <div class="container page-cart">
        <div class="row">
            <div class="col12">
                <div class="box-cart">
                    <div class="box-cart-left">
                        <div class="back-to-menu">
                            <a href=""><i style="margin-right: 8px;" class="ti-arrow-circle-left"></i>Continue shopping</a>
                        </div>
                        <div class="title-cart">
                            <p>Shopping cart</p>
                            <span>You have number items in your cart</span>
                        </div>
                        <div class="container-cart-items">
                            <?php
                            $_SESSION['total'] = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $row) {
                                    $item = showItems($row['product_id']);
                                    $_SESSION['total'] += $item[0]['price']*$row['quantity'];
                                    echo '
                                                <div class="item-of-cart">
                                                    <div class="img-item">
                                                        <img src="./view/assets/image/' . $item[0]['kind'] . '/' . $item[0]['image'] . '" alt="">
                                                    </div>
                                                    <div class="des-item">
                                                        <h2>' . $item[0]['product_name'] . '</h2>
                                                        <p>' . $item[0]['des'] . '.</p>
                                                    </div>
                                                    <div class="price-item">
                                                        $' . $item[0]['price']*$row['quantity'] . '.00
                                                    </div>
                                                    <div class="quantity-item">
                                                        <button onclick="reduceCart(' . $row['product_id'] . ')">-</button>
                                                        <p>' . $row['quantity'] . '</p>
                                                        <button onclick="increaseCart(' . $row['product_id'] . ')">+</button>
                                                    </div>
                                                    <div class="remove-item">
                                                        <button onclick="remove(' . $row['product_id'] . ')"><i class="ti-close"></i></button>
                                                    </div>
                                                </div>
                                            ';
                                }
                            }
                            ?>

                        </div>
                    </div>
                    <div class="box-cart-right">
                        <div class="title-shipping">
                            <h2>Payment orders</h2>
                            <div class="title-shipping-img">
                                <img src="./view/assets/image/ship-removebg-preview.png" alt="">
                            </div>
                        </div>
                        <form action="index.php?act=cart" method="post" class="pay-cart">
                            <input name="name" type="text" placeholder="Your name">
                            <input name="phone-number" type="text" placeholder="Your phone number">
                            <input name="email" type="email" placeholder="Your email">
                            <textarea name="address" type="text" placeholder="Your address"></textarea>
                            <hr>
                            <div class="prepare-bill">
                                <div class="box-prepare-bill">
                                    <h3>Subtotal</h3>
                                    <h3>
                                        <?php
                                            if(!isset($_SESSION['total'])||$_SESSION['total']==0){
                                                echo '$0.00';
                                            }
                                            else{
                                                echo '$'.$_SESSION['total'].'.00';
                                            }
                                        ?>
                                    </h3>
                                </div>
                                <div class="box-prepare-bill">
                                    <h3>Shipping</h3>
                                    <h3>
                                        <?php
                                            if(!isset($_SESSION['total'])||$_SESSION['total']==0){
                                                echo '$0.00';
                                            }
                                            else{
                                                echo '$2.00';
                                            }
                                        ?>
                                    </h3>
                                </div>
                                <div class="box-prepare-bill">
                                    <h3>Total</h3>
                                    <h3>
                                        <?php
                                            if(!isset($_SESSION['total'])||$_SESSION['total']==0){
                                                echo '$0.00';
                                            }
                                            else{
                                                echo '$'.($_SESSION['total']+2).'.00';
                                            }
                                        ?>
                                    </h3>
                                </div>
                            </div>
                            <button name="pay" type="submit">Pay Now</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>