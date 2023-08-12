<?php 
	require 'includes/head.php';
	require 'includes/nav.php';

if(isset($_SESSION['auth'])){
	header("location: my-Request.php");
}

if(isset($_POST["login"]))  
      {  
           if(empty($_POST["username"]) || empty($_POST["password"]))  
           {  
                $_SESSION['response'] = "Username and Password is Empty";
                $_SESSION['type'] = "warning"; 
                $_SESSION['mes'] = "Sorry"; 
           }  
           else  
           {  
                $query = "SELECT * FROM tbl_user WHERE username = :username AND password = :password";  
                $stmt = $conn->prepare($query);  
                $stmt->execute(  
                     array(  
                          'username'     =>     $_POST["username"],  
                          'password'     =>     md5($_POST["password"])  
                     )  
                );  
                $count = $stmt->rowCount();  
                if($count > 0)  
                {  
                  foreach($stmt as $data){
                        $user_id = $data['id'];
                        $session_name = $data['username'];

                      }
                      $_SESSION['auth'] = true;
                      $_SESSION['auth_user'] = [
                        'id' =>$user_id,
                        'username' =>$session_name,
                      ];
                      	$_SESSION['response'] = "Login, Successfully";
                      	$_SESSION['type'] = "success";
                      	$_SESSION['mes'] = "Hi"; 
                        echo '
						<script> setTimeout(function() {  location.replace("application-form.php"); }, 1500); </script>
						';
                }  
                else  
                {  
                     $_SESSION['response'] = "Invalid Credentails";
                     $_SESSION['type'] = "danger"; 
                     $_SESSION['mes'] = "Sorry"; 
                }  
           }  
      }  

 ?>

<div class="container py-5 px-3" >
	<div class="row justify-content-center">
		<div class="col-md-6">
			</--div class="card shadow-lg"style="background-image: url(bg1.png); background-size: cover; background-repeat: no-repeat;">
				<div class="card-header bg-primary text-white text-center">
					<h4>Login</h4>
				</div>
				<div class="card-body">
					<?php 
					if(isset($_SESSION['response']))
					{
						?>
						<div class="alert alert-<?= $_SESSION['type'] ?> alert-dismissible fade show" role="alert">
						  <strong><?= $_SESSION['mes'] ?>&nbsp;</strong><?= $_SESSION['response'] ?>
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
						<?php
					}
					unset($_SESSION['response']);
					?>
					<form method="POST">
						<div class="form-group mt-2 mb-3">
							<label>Username</label>
							<input class="form-control" type="text" name="username" placeholder="Username">
						</div>
						<div class="form-group mt-2 mb-3">
							<label>Password</label>
							<input class="form-control" type="password" name="password" placeholder="Password">
						</div>
						<div class="form-group">
							<button class="btn btn-primary" name="login" type="submit">Login</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>




 <?php 
	require 'includes/foot.php';
 ?>