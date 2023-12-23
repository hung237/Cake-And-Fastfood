<?php 
    include_once "../../model/database/db.php";
    $list_order = listBill();
    $list_order_complete =  listBillComplete();
    $total_order = count($list_order);
    $total_revenue = 0;
    foreach($list_order_complete as $bill){
        $total_revenue += $bill["total"];
    }
    $count_user = count(listUser());

    $list_order_today = listBillToday();
    $total_revenue_today = 0;
    foreach($list_order_today as $bill){
        $total_revenue_today += $bill["total"];
    }
?>
<div class="sale">
    <div class="box-sale">
        <div class="title">
            <h1>Dashboard</h1>
        </div>
        <div class="container-sale flex">
            <div class="sale-items flex">
                <div class="sale-des">
                    <p>Members</p>
                    <p>0<?php echo $count_user;?></p>
                </div>
                <div class="sale-img">
                    <img src="../assets/image/icon-sale-member.png" alt="" width="60px">
                </div>
            </div>
            <div class="sale-items flex">
                <div class="sale-des">
                    <p>Orders</p>
                    <p>0<?php echo $total_order;?></p>
                </div>
                <div class="sale-img">
                    <img src="../assets/image/icon-sale-bill.png" alt="" width="60px">
                </div>
            </div>
            <div class="sale-items flex">
                <div class="sale-des">
                    <p>Total coin</p>
                    <p>$<?php echo $total_revenue;?></p>
                </div>
                <div class="sale-img">
                    <img src="../assets/image/icon-coin.png" alt="" width="60px">
                </div>
            </div>
            <div class="sale-items flex">
                <div class="sale-des">
                    <p>Total coin for day</p>
                    <p>$<?php echo $total_revenue_today;?></p>
                </div>
                <div class="sale-img">
                    <img src="../assets/image/icon-coin.png" alt="" width="60px">
                </div>
            </div>
        </div>

    </div>
</div>

<div>
    <!-- <img style="width: 600px; height: auto; margin: 100px 0 0 250px;" src="../assets/image/hamburger.gif" alt=""> -->
    <img src="../assets/image/hamburger.gif" alt="" width="40%">
    <img src="../assets/image/hamburger.gif" alt="" width="50%">

    
</div>


