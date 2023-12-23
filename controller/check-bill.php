<?php
	include_once "../model/database/db.php";
	if(isset($_POST["id"])){
		$id = $_POST['id'];
		$bill = showOrder($id);
		echo $bill[0]["status"];
	}
?>