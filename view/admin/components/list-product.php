<div class="main">

    <div class="title margin-top-40px">
        <h1 style="margin: 30px;">List product</h1>
    </div>
    <div class="list-product">

        <div class="list-items" style="color:#595959; font-weight: bolder; font-size: 16px;">
            <div class="number ">ID</div>
            <div class="img">Image</div>
            <div class="name">Name</div>
            <div class="price">Price</div>
            <div class="kind">Kind</div>
            <div class="">Edit</div>
            <div class="">Remove</div>
        </div>
        <div class="box-list">
            <?php
            include_once "../../model/database/db.php";
            $listItems = listItems();
            $index = 1;
            foreach ($listItems as $item) {
                echo '

                <div class="list-items list-items-bg">
                    <div class="number">' . $index . '</div>
                    <div class="img">
                        <img src="../../view/assets/image/' . $item["kind"] . '/' . $item["image"] . '" alt="" width="100px">
                    </div>
                    <div class="name">' . $item["product_name"] . '</div>
                    <div class="price">$' . $item["price"] . '.00</div>
                    <div class="kind">' . $item["kind"] . '</div>
                    <div class="edit"><a href="index.php?act=editproduct&this_id=' . $item["product_id"] . '">Edit</a></div>
                    <div class="del"><a href="../../controller/delete-product.php?this_id=' . $item["product_id"] . '">Delete</a></div>
                </div>
                ';
                $index++;
            }
            ?>
        </div>

    </div>
</div>