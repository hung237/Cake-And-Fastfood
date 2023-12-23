<div class="main">
<?php
    include_once "../../model/database/db.php";
    $id = $_GET['id'];
    $order = showOrder($id);
?>

    <div class="order-detail">
        <div class="box-order-detail flex">
            <div class="order-left width70">
                <div class="order-customer">
                    <h2>Customer Detail</h2>
                    <hr>
                    <div class="flex container-order-customer">
                    <div class="name">
                        <p><?php echo $order[0]['name']?></p>
                        <p><?php echo $order[0]['phone']?></p>
                        <p><?php echo $order[0]['email']?></p>
                    </div>
                    <div class="address" style="width: 30%;">
                        <p><?php echo $order[0]['address']?></p>
                    </div>
                    </div>
                </div>
                <div class="order-product margin-top">
                    <h2>Order items</h2>
                    <hr>
                    <div class="container-cart-items">
                        <?php
                            $billDetail = showBillDetail($id);
                            foreach($billDetail as $row){
                                $product = showItems($row['product_id']);
                                echo'
                                <div class="item-of-cart">
                                    <div class="img-item">
                                        <img src="../assets/image/'.$product[0]['kind'].'/'.$product[0]['image'].'" alt="">
                                    </div>
                                    <div class="des-item">
                                        <h2>'.$product[0]['product_name'].'</h2>
                                        <p>'.$product[0]['des'].'!</p>
                                    </div>
                                    <div class="quantity-item">
                                        <span>x'.$row['quantity'].'</span>
                                    </div>
                                    <div class="price-item">
                                        $'.$row['price'].'.00
                                    </div>
                                </div>
                                ';
                            }
                        ?>
                    </div>
                    <hr>
                    <div class="prepare-bill">
                        <div class="box-prepare-bill">
                            <h3>Subtotal</h3>
                            <h3>$<?php echo ($order[0]['total'] - 2)?>.00</h3>
                        </div>
                        <div class="box-prepare-bill">
                            <h3>Shipping</h3>
                            <h3>
                                $2.00
                            </h3>
                        </div>
                        <div class="box-prepare-bill">
                            <h3>Total</h3>
                            <h3>
                                $<?php echo $order[0]['total']?>.00
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-status col3">
                <div class="box-order-status">
                    <h2>Order history</h2>
                    <hr>
                    <div class="container-order-status">
                        <div class="order-status-items flex margin-top">
                            <div class="order-icon">
                                <div class="order-icon-i check">
                                <i class="fa-solid fa-check"></i>
                                </div>
                                <div class="order-icon-dot"></div>
                            </div>
                            <div class="order-des">
                                <p>Confirmation</p>
                                <p>05 minutes</p>
                            </div>
                        </div>
                        <div class="order-status-items flex">
                            <div class="order-icon">
                                <div class="order-icon-i <?php
                                    if($order[0]['status']<2){
                                        echo 'no-check';
                                    }
                                    else{
                                        echo 'check';
                                    }?>">
                                <i class="fa-solid fa-check"></i>
                                </div>
                                <div class="order-icon-dot"></div>
                            </div>
                            <div class="order-des">
                                <p>Waiting for delivery</p>
                                <p>10 minutes</p>
                            </div>
                        </div>
                        <div class="order-status-items flex">
                            <div class="order-icon">
                                <div class="order-icon-i <?php
                                    if($order[0]['status']<3){
                                        echo 'no-check';
                                    }
                                    else{
                                        echo 'check';
                                    }?>">
                                <i class="fa-solid fa-check"></i>
                                </div>
                                <div class="order-icon-dot"></div>
                            </div>
                            <div class="order-des">
                                <p>Delivery</p>
                                <p>15 minutes</p>
                            </div>
                        </div>
                        <div class="order-status-items flex">
                            <div class="order-icon">
                                <div class="order-icon-i <?php
                                    if($order[0]['status']<4){
                                        echo 'no-check';
                                    }
                                    else{
                                        echo 'check';
                                    }?>">
                                <i class="fa-solid fa-check"></i>
                                </div>
                                <div class="order-icon-dot"></div>
                            </div>
                            <div class="order-des">
                                <p>Successful delivery</p>
                                <p>20 minutes</p>
                            </div>
                        </div>
                        <div class="order-status-items flex">
                            <div class="order-icon">
                                <div class="order-icon-i <?php
                                    if($order[0]['status']<5){
                                        echo 'no-check';
                                    }
                                    else{
                                        echo 'check';
                                    }?>">
                                <i class="fa-solid fa-check"></i>
                                </div>
                                <!-- <div class="order-icon-dot"></div> -->
                            </div>
                            <div class="order-des">
                                <p>Goods received</p>
                                <p>25 minutes</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex btn">
                    <button onclick="updateStatus(<?php echo $_GET['id']?>)">Update</button>
                    <button onclick="removeOrder(<?php echo $_GET['id']?>)">Remove</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function updateStatus(id) {
    $.post("../../controller/update-status.php", { id: id }, function (data) {
    // document.getElementById("qty").innerText = data;
    let arr = document.querySelectorAll(".order-icon-i")
    for(let i=0; i<data; i++){
        if(i<=data){
            arr[i].classList.remove("no-check");
            arr[i].classList.add("check");
        }
    }
    });
}
function removeOrder(id) {
    $.post("../../controller/remove-orders.php", { id: id }, function (data) {
    // document.getElementById("qty").innerText = data;
        document.getElementById("model").style.display = "block"
        document.getElementById("box-model").style.display = "block"
        document.getElementById("box-model").innerText = "Deleted order successfully";
        setInterval(endError(), 3000);
        window.location="index.php?act=bill";
    });
}
	function errorAnimation() {
		document.getElementById("model").style.display = "block"
		document.getElementById("box-model").style.display = "block"
		document.getElementById("box-model").innerText = "Fill in all the information";
	}

	function endError() {
		document.getElementById("model").style.display = "none"
		document.getElementById("box-model").style.display = "none"
	}
	setInterval(function() {
		document.getElementById("model").style.display = "none"
		document.getElementById("box-model").style.display = "none"
	}, 3000);
</script>