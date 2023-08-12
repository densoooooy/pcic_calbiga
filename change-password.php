<?php 
	require 'includes/head.php';
	require 'includes/nav.php';
	if(!isset($_SESSION['auth_user']['id'])){
		$_SESSION['response'] = "login First";
		$_SESSION['type'] = "danger";
		$_SESSION['mes'] = "Sorry";
		header("location: index.php");
	}

	if(isset($_POST['changepassword'])){
		$current_user = $_POST['current_user'];
		$current = md5($_POST['current']);
		$new = md5($_POST['new']);
		$retype = md5($_POST['retype']);

		$sql = "SELECT * FROM tbl_user WHERE id = :userid ";
		$stmt = $conn->prepare($sql);

		$stmt->bindParam(':userid', $current_user, PDO:: PARAM_INT);
		$stmt->execute();

		$result = $stmt->fetchAll(PDO::FETCH_OBJ);
		if($stmt->rowCount() > 0)
		{
			foreach($result as $row)
			{
				$current_pass = $row->password;
				$user_id = $row->id;
		
				if($current == $current_pass){
					$update = "UPDATE tbl_user SET password = ? WHERE id = ? ";
					$stmt = $conn->prepare($update);
					$stmt->execute([$new, $user_id]);
					$_SESSION['response'] = "New Password has been Save";
					$_SESSION['type'] = "success";
					$_SESSION['mes'] = "Hi";
					echo '
					<script> setTimeout(function() {  location.replace("change-password.php"); }, 1500); </script>
					';	
				}else{
					$_SESSION['response'] = "New Password and Cofirm Password does not match!";
					$_SESSION['type'] = "danger";
					$_SESSION['mes'] = "Sorry";
					echo '
					<script> setTimeout(function() {  location.replace("change-password.php"); }, 1500); </script>
					';	
				}
			}
		}


		
		}
	?>

	<div class="container py-5 px-3 mt-5">
		<div class="card">
			<div class="card-header bg-dark text-white">
				<h4>Change Password</h4>
			</div>
			<?php 
					if(isset($_SESSION['response']))
					{
						?>
						<div class="mt-2 alert alert-<?= $_SESSION['type'] ?> alert-dismissible fade show" role="alert">
						  <strong><?= $_SESSION['mes'] ?>&nbsp;</strong><?= $_SESSION['response'] ?>
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
						<?php
					}
					unset($_SESSION['response']);
					?>
			<div class="card-body">
				<form method="POST">
				<?php 
 				$userid = $_SESSION['auth_user']['id'];
 				$sql = "SELECT * FROM tbl_user WHERE id = :userid ";
 				$query = $conn->prepare($sql);

 				$query->bindParam(':userid', $userid, PDO:: PARAM_INT);
 				$query->execute();

 				$result = $query->fetchAll(PDO::FETCH_OBJ);
 				if($query->rowCount() > 0)
 				{
 					foreach($result as $row)
 					{
 				 		?>
 				 		<div class="row">
 				 			<div class="col-md-4">
 				 				<input type="hidden" name="current_user" value="<?= $_SESSION['auth_user']['id'] ?>">
 				 				<label>Current Password</label>
 				 				<input class="form-control" type="password" name="current">
	 				 		</div>
	 				 		<div class="col-md-4">
	 				 			<label>New Password</label>
	 				 			<input class="form-control" type="password" name="new">
	 				 		</div>
	 				 		<div class="col-md-4">
	 				 			<label>Retype Password</label>
	 				 			<input required class="form-control" type="password" name="retype">
	 				 		</div>
 				 		</div>
 				 		<div class="form-group mt-3">
 				 			<button class="btn btn-success" name="changepassword" type="submit">Submit</button>
 				 		</div>
 				 		<?php
 				 	}
 				}
 				 ?>	
				</form>
			</div>
		</div>
	</div>





	 <?php 
	require 'includes/foot.php';
 ?>