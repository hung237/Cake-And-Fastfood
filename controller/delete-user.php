<?php 
	include_once "../model/database/db.php";
	$this_user = $_GET['this_user'];
	del_user($this_user);
	$url = $_GET['url'];
	unlink("../view/assets/image/user/".$url);
	header('location: ../view/admin/index.php?act=listuser');
?>