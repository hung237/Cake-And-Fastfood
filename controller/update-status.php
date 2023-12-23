<?php
include_once "../model/database/db.php";
	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$bill = showOrder($id);
		$status = ++ $bill[0]['status'];
		updateOder($id,$status);
		
		echo $status;
	}
?>