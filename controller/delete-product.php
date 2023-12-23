<?php 
    include_once('../model/database/db.php');
    $id=$_GET['this_id'];
    $item = showItems($id);
    unlink('../view/assets/image/'.$item[0]['kind']).'/'.$item[0]['image'];
    del_product($id);
    echo "<meta http-equiv='refresh' content='0;url=../view/admin/index.php?act=listproduct'>";
?>