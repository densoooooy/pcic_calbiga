<?php 
	require 'includes/head.php';
	require 'includes/nav.php';
	if(!isset($_SESSION['auth_user']['id'])){
		$_SESSION['response'] = "login First";
		$_SESSION['type'] = "danger";
		$_SESSION['mes'] = "Sorry";
		header("location: index.php");
	}
?>
	
	<div class="container px-5 py-5 mt-3">
		<div class="card">
			<div class="card-header bg-dark text-white">
				<h4>My Request<a class="btn btn-primary float-end" href="application-form.php">Request Now</a></h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table" id="example">
						<thead>
							<tr>
								<th>Name</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$user_id = $_SESSION['auth_user']['id']; 
						$sql = "SELECT *, concat(b.firstname,' ',b.middlename,' ',b.lastname) as fullname, b.status as status_of, b.id as req_id FROM basic_info b LEFT JOIN tbl_user u ON u.id = b.user_id WHERE b.user_id = :userid ";
						$stmt = $conn->prepare($sql);
						$stmt->bindParam(':userid', $user_id, PDO:: PARAM_STR);
                        $stmt->execute();

                        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                        if($stmt->rowCount() > 0)
                        {
                        foreach($result as $row)
	                        {
							 ?>
							<tr>
								<td><?= $row->fullname ?></td>
								<td><?= $row->status_of ?></td>
								<td>
									<a class="btn btn-info btn-sm" href="view-request.php?id=<?= $row->req_id ?>">View</a>
								</td>
							</tr>
							<?php 
							}
						}

						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>





 <?php 
	require 'includes/foot.php';
 ?>