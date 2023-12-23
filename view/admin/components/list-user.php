<div class="main">
	
<div class="main">

<div class="title margin-top-40px">
		<h1 style="margin: 30px;">List user</h1>
</div>
<div class="list-product">
		
				<div class="list-items">
						<div class="number ">ID</div>
						<div class="img">Image</div>
						<div class="price">Email</div>
						<div class="name">Name</div>
						<div class="kind">role</div>
						<div class="edit">Edit</div>
						<div class="del">Remove</div>
				</div>
				<div class="box-list">
				<?php 
				include_once "../../model/database/db.php";
					$listUser = listUser();
					$index = 1;
					foreach($listUser as $user){
						echo'
						<div class="list-items list-items-bg">
								<div>'.$index.'</div>
								<div>';
								if($user['avatar'] == null){
									echo '<img src="../assets/image/user/no-avatar.png" alt="" width="100px" height="100px">';
								}
								else{
									echo '
									<img src="../assets/image/user/'.$user['avatar'].'" alt="" width="100px" height="100px">
									';
								}
								
								echo'</div>
								<div>'.$user['email'].'</div>
								<div>'.$user['name'].'</div>	
								<div>';
									if($user['role'] == 0){
										echo 'admin';
									}
									else{
										if($user['role']== 1){
											echo 'user';
										}
									}
								echo '
								</div>
								<div class="edit"><a href="index.php?act=edituser&id='.$user['email'].'">Edit</a></div>
								<div class="del"><a href="../../../controller/delete-user.php?this_user='.$user['email'].'&url='.$user['avatar'].'">Remove</a></div>
						</div>
						';
						$index ++;
					}
				?>
		</div>
</div>
</div>
</div>