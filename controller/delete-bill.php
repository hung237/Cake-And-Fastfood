<?php
    include_once "../model/database/db.php";
	$id = $_GET['id'];
	del_order($id);
    del_order_detail($id);
	header('location: ../view/admin/index.php?act=bill');
?>