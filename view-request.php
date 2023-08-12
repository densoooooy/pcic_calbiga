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
<div class="container px-3 py-5">
 	<div class="row">
 		<div class="col-md-12 col-lg-12 col-xl-12">
 			<div class="card">
 				<div class="card-header bg-dark text-white text-center">
 					<h5>Application Form<a class="btn btn-primary float-end" href="my-Request.php">Back</a></h5>
 				</div>
 				<div class="card-body">
 				<?php 
 				$id = $_SESSION['auth_user']['id'];
 				$sql = "SELECT *, b.status as form_stats FROM basic_info b LEFT JOIN tbl_user u ON u.id = b.user_id WHERE b.user_id = :id ";
 				$query = $conn->prepare($sql);

 				$query->bindParam(':id', $id, PDO:: PARAM_INT);
 				$query->execute();

 				$result = $query->fetchAll(PDO::FETCH_OBJ);
 				if($query->rowCount() > 0){
 					foreach($result as $row){
 				 ?>	
 				 <?php 
 				 if($row->form_stats = 'Approved')
 				 {
 				 	?>
 				 	<div class="alert alert-success">
 				 		<?= $row->form_stats ?>
 				 	</div>
 				 	<?php
 				 }else if($row->form_stats == 'Pending'){
 				 	?>
 				 	<div class="alert alert-warning">
 				 		<?= $row->form_stats ?>
 				 	</div>
 				 	<?php	
 				 }
 				  ?>
 					<form method="POST">
 						<div class="row">
 							<div class="col-lg-4">
 								<label>Date Submitted:</label>
 								<input disabled class="form-control" type="date" value="<?= $row->date_submitted ?>">
 							</div>
 						</div>
 						<div class="row">
 							<div class="col-lg-2 mb-2">
		 						<label>Applciation Type</label>
		 						<input disabled class="form-control" type="text" name="application_type" value="<?= $row->application_type ?>">
		 					</div>
		 					<div class="col-lg-2 mb-2">
		 						<label>Crop Type</label>
		 						<input disabled class="form-control" type="text" name="lname" value="<?= $row->crop_type ?>">
		 					</div>
 							<div class="col-lg-4 mb-2">
		 						<label>Last Name</label>
		 						<input disabled class="form-control" type="text" name="lname" value="<?= $row->lastname ?>">
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>First Name</label>
		 						<input disabled class="form-control" type="text" name="fname" value="<?= $row->firstname ?>">
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>Middle Name</label>
		 						<input disabled class="form-control" type="text" name="midname" value="<?= $row->middlename ?>">
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>PCIC ID NO</label>
		 						<input disabled class="form-control" type="number" name="pcic" value="<?= $row->pcic_id_no ?>">
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>Address</label>
		 						<input disabled class="form-control" type="text" name="address" value="<?= $row->address ?>">
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>Date of Birth</label>
		 						<input disabled class="form-control" type="date" name="dob" value="<?= $row->dob ?>">
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>Contact Number</label>
		 						<input disabled class="form-control" type="number" name="contact" value="<?= $row->contact ?>">
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>Sex</label>
		 						<select disabled class="form-select form-control" name="sex">
		 							<option selected value="<?= $row->sex ?>"><?= $row->sex ?></option>
		 						</select>
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>Civil Status</label>
		 						<select disabled class="form-select form-control" name="civil">
		 							<option value="<?= $row->civilstatus ?>"><?= $row->civilstatus ?></option>
		 						</select>
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>Indigenous People?</label>
		 						<select disabled class="form-select form-control" name="indigeous">
		 							<option selected value="<?= $row->indigenous ?>"><?= $row->indigenous ?></option>
		 						</select>
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>Spouse</label>
		 						<input disabled class="form-control" type="text" name="spouse" value="<?= $row->spouse ?>">
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>PCIC ID NO</label>
		 						<input disabled class="form-control" type="text" name="pcic_id_no2" value="<?= $row->pcic_id_no2 ?>">
		 					</div>
		 					<hr class="mt-2">
		 					<h5>LEGAL BENEFICIARIES</h5>
		 					<div class="col-md-6 col-lg-6 mb-2">
		 						<label>Primary</label>
		 						<input disabled class="form-control" type="text" name="primary" value="<?= $row->primary ?>">
		 					</div>
		 					<div class="col-md-2 col-lg-2 mb-2">
		 						<label>Age</label>
		 						<input disabled class="form-control" type="text" name="age" value="<?= $row->age ?>">
		 					</div>
		 					<div class="col-md-4 col-lg-4 mb-2">
		 						<label>Relationship</label>
		 						<input disabled class="form-control" type="text" name="relation" value="<?= $row->relation ?>">
		 					</div>
		 					<div class="col-md-6 col-lg-6 mb-2">
		 						<label>Secondary</label>
		 						<input disabled class="form-control" type="text" name="secondary" value="<?= $row->secondary ?>">
		 					</div>
		 					<div class="col-md-2 col-lg-2 mb-2">
		 						<label>Age</label>
		 						<input disabled class="form-control" type="text" name="age1" value="<?= $row->age1 ?>">
		 					</div>
		 					<div class="col-md-4 col-lg-4 mb-2">
		 						<label>Relationship</label>
		 						<input disabled class="form-control" type="text" name="relation1" value="<?= $row->relation1 ?>">
		 					</div>
                            <hr class="mt-2">
		 					<h5>BOUNDERIES</h5>
		 				    <div class="col-lg-6 mb-2">
		 						<label>North</label>
		 						<input disabled class="form-control" type="text" name="north" value="<?= $row->north ?>">
		 					</div>
		 					<div class="col-lg-6 mb-2">
		 						<label>South</label>
		 						<input disabled class="form-control" type="text" name="south" value="<?= $row->south ?>">
		 					</div>
 							<div class="col-lg-6 mb-2">
		 						<label>East</label>
		 						<input disabled class="form-control" type="text" name="east" value="<?= $row->east ?>">
		 					</div>
		 					<div class="col-lg-6 mb-2">
		 						<label>West</label>
		 						<input disabled class="form-control" type="text" name="west" value="<?= $row->west ?>">
		 					</div>
		 					<hr class="mt-2">
		 					<h5>FARM</h5>
		 					<div class="col-lg-4 mb-2">
		 						<label>Area</label>
		 						<input disabled class="form-control" type="text" name="area" value="<?= $row->area ?>">
		 					</div>
		 					<div class="col-lg-8 mb-2">
		 						<label>Farm Location</label>
		 						<input disabled class="form-control" type="text" name="location" placeholder="Sitio/Brangay/Municipality/Province" value="<?= $row->farm_location ?>">
		 					</div>
		 					
		 					<div class="col-lg-6 mb-2 ">
		 						<label>Variety</label>
		 						<input disabled class="form-control" type="text" name="variety" value="<?= $row->variety ?>">
		 					</div>
		 					<div class="col-lg-3 mb-2">
		 						<label>Planting Method</label>
		 						<select disabled class="form-select form-control" name="method">
		 							<option value="<?= $row->planting_method ?>"><?= $row->planting_method ?></option>
		 							<option value="Transplanting">Transplanting</option>
		 						</select>
		 					</div>
		 					<div class="col-lg-3 mb-2">
		 						<label>Date of Sowing</label>
		 						<input disabled class="form-control" type="date" name="sowing_date" value="<?= $row->date_of_sowing ?>">
		 					</div>
		 					<div class="col-lg-3 mb-2">
		 						<label>Date of Planting</label>
		 						<input disabled class="form-control" type="date" name="planting" value="<?= $row->date_of_planting ?>">
		 					</div>
		 					<div class="col-lg-3 mb-2">
		 						<label>Date of Harvesting</label>
		 						<input disabled class="form-control" type="date" name="harvesting" value="<?= $row->date_of_harvest ?>">
		 					</div>
		 					<hr class="mt-2">
		 					<div class="col-lg-6 mb-2">
		 						<label>Land Category</label>
		 						<select disabled class="form-select form-control" name="category">
		 							<option value="<?= $row->category ?>"><?= $row->category ?></option>
		 						</select>
		 					</div>
		 					<div class="col-lg-6 mb-2">
		 						<label>Soil Type</label>
		 						<select disabled class="form-select form-control" name="type">
		 							<option value="<?= $row->soil_type ?>"><?= $row->soil_type ?></option>
		 						</select>
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>Topography</label>
		 						<select disabled class="form-select form-control" name="topography">
		 							<option value="<?= $row->topography ?>"><?= $row->topography ?></option>
		 						</select>
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>Source of Irrigation</label>
		 						<select disabled class="form-select form-control" name="source">
		 							<option value="<?= $row->source ?>"><?= $row->source ?></option>
		 						</select>
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>Tenurial Status</label>
		 						<select disabled class="form-select form-control" name="tenurial">
		 							<option value="<?= $row->tenurial ?>"><?= $row->tenurial ?></option>
		 							<option value="Lessee">Lessee</option>
		 						</select>
		 					</div>
		 					<table class="table">
		 						<thead>
		 							<tr>
		 								<th>Land Category</th>
			 							<th>Soil Type</th>
			 							<th>Source of Irrigation</th>
		 							</tr>
		 						</thead>
		 						<tbody>
		 							<tr>
		 								<td>IR Irrigated<br> RF Rain Fed<br> UL Upland<br></td>
		 								<td>CL Clay Loam<br> SCL Silty Clay Loam <br> SiL Silty Loam<br> SaL Sandy Loam</td>
		 								<td> NIA/CIS National Irrigation Administration<br> DW Deep Well <br> SWIP Samll Water Impounding Project<br> STW Shallow Tube Well </td>
		 							</tr>
		 						</tbody>
		 					</table>
 						</div>
 					</form>
 				<?php 
 					}
 				}
 				 ?>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>

 

 <?php 
	require 'includes/foot.php';
 ?>