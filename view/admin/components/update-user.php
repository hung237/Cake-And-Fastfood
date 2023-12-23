<?php
include_once "../../model/database/db.php";
$list_order = listBill();
$total_order = count($list_order);
$total_revenue = 0;
foreach($list_order as $bill){
	$total_revenue += $bill["total"];
}
$count = count(listUser());

$id = $_GET['id'];
$user = showUser($id);
if (isset($_POST['update-user'])) {
	$name_user = $_POST['name-user'];
	$role = $_POST['role'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$phone = $_POST['phone'];

	$image = basename($_FILES['image']['name']) ?: false;
	if($image){
		if (!empty(trim($name_user)) && !empty(trim($role)) && !empty(trim($email)) && !empty(trim($pass)) && !empty(trim($image))) {
			$imageArr = explode(".", $image); // tạo mảng gồm gác phần tủ cách nhau dấu.
			$ext = end($imageArr);        // Lấy phàn tử cuối mảng(png,jpg...)
			$newimage = uniqid() . "." . $ext; // tạo tên file mới
			//Tên mới= random chuỗi.phần tử cuối bên trên
	
			$target_dir = "../assets/image/user/"; // Nơi lưu file khi upload
			$target_file = $target_dir . $newimage; // tên file upload
			unlink("../../assets/image/user/".$user[0]["avatar"]);
			do {
				$newimage = uniqid() . "." . $ext;
				$target_file = $target_dir . $newimage;
				$checkUrl =  checkAvt($newimage);
			} while ($checkUrl != 1);
			updateUser($email,$name_user,$pass,$phone,$role,$newimage);
			move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
			echo '<script>document.getElementById("model").style.display = "block"
							document.getElementById("box-model").style.display = "block"
							document.getElementById("box-model").innerText = "Successfully updated information";
							setInterval(endError(), 3000);
							setInterval();
							</script>';
			echo "<meta http-equiv='refresh' content='0;url=index.php?act=listuser'>";
		} else {
			echo '<script>document.getElementById("model").style.display = "block"
							document.getElementById("box-model").style.display = "block"
							document.getElementById("box-model").innerText = "Fill in all the information";
							setInterval(endError(), 3000);
							setInterval();
							</script>';
		}
	}
	else{
		if (!empty(trim($name_user)) && !empty(trim($role)) && !empty(trim($email)) && !empty(trim($pass))) {
			updateUserNoAvt($email,$name_user,$pass,$phone,$role);
			echo '<script>document.getElementById("model").style.display = "block"
							document.getElementById("box-model").style.display = "block"
							document.getElementById("box-model").innerText = "Successfully updated information";
							setInterval(endError(), 3000);
							setInterval();
							</script>';
							echo "<meta http-equiv='refresh' content='0;url=index.php?act=listuser'>";
		} else {
			echo '<script>document.getElementById("model").style.display = "block"
							document.getElementById("box-model").style.display = "block"
							document.getElementById("box-model").innerText = "Fill in all the information";
							setInterval(endError(), 3000);
							setInterval();
							</script>';
		}
	}


}
?>


<div class="right col10">
	<div class="box-update">
		<div class="title margin-top-40px">
			<h1>Add user</h1>
		</div>
		<div class="form margin-top-40px">
			<form action="index.php?act=edituser" method="post" class="box-update" enctype="multipart/form-data">
				<div class="form-control flex col12">
					<div class="form-group col6">
						<label for="name-user"></label>
						<input type="text" name="name-user" value="<?php echo $user[0]["name"]?>">
					</div>
					<div class="col6 form-group">
						<?php
							if($user[0]["role"]==1){
								echo'
									<select name="role" id="">
									<option value="1">User</option>
									<option value="0">Admin</option>
									</select>
								';
							}
							else{
								echo'
									<select name="role" id="">
									<option value="0">Admin</option>
									<option value="1">User</option>
									</select>
								';
							}
						?>
					</div>
				</div>
				<div class="form-control flex col12">
					<div class="form-group col6">
						<div class="form-group col12">
							<label for="email"></label>
							<input readonly="true" id="email" type="text" name="email" value="<?php echo $user[0]["email"]?>">
						</div>
						<div class="col12 form-group">
							<label for="pass"></label>
							<input type="text" name="pass" value="<?php echo $user[0]["pass"]?>">
							<label for=""></label>
							<input type="text" name="phone" value="<?php echo $user[0]["phone_number"]?>">
						</div>
					</div>
					<div class="form-group col6 flex align-item-center">
						<div class="col6">
							<label for="avatar"></label>
							<input type="file" id="avatar" name="image" accept="image/*">
						</div>
						<div class="img col6">
							<img id="avatar-preview" src="../assets/image/user/<?php echo $user[0]["avatar"]?>" width="200px" height="200px">
						</div>
					</div>
				</div>
				<button name="update-user" type="submit">Update</button>
				<div class="clear"></div>
			</form>
		</div>
	</div>
</div>
<script>
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