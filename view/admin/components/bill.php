
<div class="main">
    <div class="title margin-top-40px">
        <h1 style="margin: 30px;">List Oder</h1>
    </div>
    <div class="box-bill">
        <div class="bill-tile list-bill">
            <div>Index</div>
            <div>Total</div>
            <div>Order date</div>
            <div>orderer</div>
            <div>Update Orders</div>
            <div>Cancel order</div>
        </div>
        <div style="max-height: 500px; " class="box-list">
            <?php
                $index = 1;
                include "../../model/database/db.php";
                $bill = listBill(); 
                foreach($bill as $row){
                    echo '
                        <div class="list-bill list-bill-bg height40">
                            <div class="index">
                                '.$index.'
                            </div>
                            <div class="total">
                                $'.$row['total'].'.00
                            </div>
                            <div class="date">
                                '.$row['date'].'
                            </div>
                            <div class="orderer">
                                '.$row['name'].'
                            </div>
                            <div class="detail">';
                            if($row['status']==5){
                                echo'
                                <a class="update-orders max-update-order" href="index.php?act=orderdetail&id='.$row['bill_id'].'">Update</a>';
                            }
                            else{
                                echo'
                                <a class="update-orders" href="index.php?act=orderdetail&id='.$row['bill_id'].'">Update</a>';
                            }
                            echo '
                            </div>
                            <div class="detail">
                                <a class="cancel-order" href="../../../controller/delete-bill.php?id='.$row['bill_id'].'">Cancel</a>
                            </div>
                        </div>
                    ';
                    $index ++;
                }
            ?>
        </div>
    </div>
</div>