<?php 
	require 'includes/head.php';
	require 'includes/nav.php';
	if(!isset($_SESSION['auth_user']['id'])){
		$_SESSION['response'] = "login First";
		$_SESSION['type'] = "danger";
		$_SESSION['mes'] = "Sorry";
		header("location: index.php");
	}

	if(isset($_POST['add_new'])){

		$userid = $_POST['userid'];
		$date = $_POST['date'];
		$application_type = $_POST['application_type'];
		$crop_type = $_POST['crop_type'];
		$lastname = $_POST['lname'];
		$firstname = $_POST['fname'];
		$middlename = $_POST['midname'];
		$pcici = $_POST['pcic'];
		$address = $_POST['address'];
		$dob = $_POST['dob'];
		$contact = $_POST['contact'];
		$sex = $_POST['sex'];
		$civil = $_POST['civil'];
		$indigeous = $_POST['indigeous'];
		$spouse = $_POST['spouse'];
		$pcic_id_no2 = $_POST['pcic_id_no2'];
		$primary = $_POST['primary'];
		$age = $_POST['age'];
		$relation = $_POST['relation'];
		$secondary = $_POST['secondary'];
		$age1 = $_POST['age1'];
		$relation1 = $_POST['relation1'];

		$north = $_POST['north'];
		$south = $_POST['south'];
		$east = $_POST['east'];
		$west = $_POST['west'];

		$area = $_POST['area'];
		$location = $_POST['location'];
		$variety = $_POST['variety'];
		$method = $_POST['method'];
		$sowing_date = $_POST['sowing_date'];
		$planting = $_POST['planting'];
		$harvesting = $_POST['harvesting'];
		$category = $_POST['category'];
		$type = $_POST['type'];
		$topography = $_POST['topography'];
		$source = $_POST['source'];
		$tenurial = $_POST['tenurial'];



		$sql = "INSERT INTO basic_info(`user_id`, `date`, `application_type`, `crop_type`,`lastname`,	`firstname`,	`middlename`,	`pcic_id_no`,	`address`,	`dob`,	`contact`,	`sex`,	`civilstatus`,	`indigenous`,	`spouse`,	`pcic_id_no2`,	`primary`,	`age`,	`relation`,	`secondary`,	`age1`,	`relation1`, `north`,`south`,`east`,`west`, `area`,	`farm_location`,  `variety`,	`planting_method`,	`date_of_sowing`,	`date_of_planting`,	`date_of_harvest`,	`category`,	`soil_type`, `topography`, `source`, `tenurial`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ";
		$stmt = $conn->prepare($sql);
		$stmt->execute([$userid, $date, $application_type, $crop_type,  $lastname, $firstname, $middlename, $pcici, $address, $dob, $contact, $sex, $civil, $indigeous,$spouse, $pcic_id_no2,  $primary, $age, $relation, $secondary,$age1,$relation1, $north, $south, $east, $west, $area,$location, $variety, $method,  $sowing_date, $planting, $harvesting, $category, $type, $topography, $source, $tenurial]);
		


		$_SESSION['response'] = "Application Form, Submitted";
		$_SESSION['type'] = "success";
		$_SESSION['mes'] = "Hi";
		echo '
			<script> setTimeout(function() {  location.replace("application-form.php"); }, 1500); </script>
			';
	}
 ?>


 <div class="container px-0 py-5" >
 	<div class="row">
 		<div class="col-md-12 col-lg-12 col-xl-12" >
 			<div class="card shadow-lg" >
 				<div class="card-header bg-dark text-white text-center">
 					<h5>Application Form<a class="btn btn-primary float-end" href="my-Request.php">Back</a></h5>
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
 				<?php 
 				$userid = $_SESSION['auth_user']['id'];
 				$sql = "SELECT * FROM tbl_user WHERE id = :userid ";
 				$query = $conn->prepare($sql);

 				$query->bindParam(':userid', $userid, PDO:: PARAM_INT);
 				$query->execute();

 				$result = $query->fetchAll(PDO::FETCH_OBJ);
 				if($query->rowCount() > 0){
 					foreach($result as $row){
 				 ?>	
 					<form method="POST">
 						<div class="row">
 							<input type="hidden" name="userid" value="<?= $row->id ?>">
 							<div class="row" style="position: relative; float: right;">
		 					<div class="col-lg-3 mb-3">
		 						<label>Application Type <span style="color: red;">*</span></label>
		 						<select class="form-select form-control" name="application_type" required>
		 							<option disabled hidden selected>Choose Here</option>
		 							<option value="New">New</option>
		 							<option value="Renewal">Renewal</option>
		 						</select>
		 					</div>
		 					<div class="col-lg-3 mb-3" >
		 						<label>Crop Specification <span style="color: red;">*</span></label>
		 						<select class="form-select form-control" name="crop_type" required>
		 							<option disabled hidden selected>Choose Here</option>
		 							<option value="Rice">Rice</option>
		 							<option value="corn">corn</option>
		 						</select>
		 					</div>
		 					<div class="col-lg-4 md-4 " >
		 						<label>Date: <span style="color: red;">*</span></label>
		 						<input class="form-control" type="date" name="date" required>
		 					</div>
 							</div>
 							
		 					<hr class="mt-2">
 							<div class="col-lg-4 mb-2">
		 						<label>Last Name <span style="color: red;">*</span></label>
		 						<input class="form-control" type="text" name="lname" value="<?= $row->userlname ?>" placeholder="Last Name" pattern="[a-zA-Z ]+" required>
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>First Name <span style="color: red;">*</span></label>
		 						<input class="form-control" type="text" name="fname" value="<?= $row->userfname ?>" placeholder="First Name" pattern="[a-zA-Z ]+" required>
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>Middle Name</label>
		 						<input class="form-control" type="text" name="midname" value="<?= $row->usermname ?>" placeholder="Middle Name" pattern="[a-zA-Z ]+">
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>PCIC ID NO</label>
		 						<input class="form-control" type="text" name="pcic" value="<?= $row->userpcic ?>" placeholder="PCIC ID NO">
		 					</div>
		 					<div class="col-lg-8 mb-2">
		 						<label>Address <span style="color: red;">*</span></label>
		 						<input class="form-control" type="text" name="address" value="<?= $row->uaddress ?>" placeholder="Sitio/Brangay/Municipality/Province" required>
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>Date of Birth</label>
		 						<input class="form-control" type="date" name="dob" value="<?= $row->userbdate ?>">
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>Contact Number <span style="color: red;">*</span></label>
		 						<input class="form-control" type="number" name="contact" placeholder="Contact Number" required>
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>Sex</label>
		 						<select class="form-select form-control" name="sex">
		 							<option selected></option>
		 							<option value="Male">Male</option>
		 							<option value="Female">Female</option>
		 							<option value="Not Determine">Not Determine</option>
		 						</select>
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>Civil Status <span style="color: red;">*</span></label>
		 						<select class="form-select form-control" name="civil" required>
		 							<option disabled hidden selected></option>
		 							<option value="Single">Single</option>
		 							<option value="Married">Married</option>
		 							<option value="Widow">Widow</option>
		 							<option value="Legally Seperated">Legally Seperated</option>
		 							<option value="Annulled">Annulled</option>
		 						</select>
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>Indigenous People?</label>
		 						<select class="form-select form-control" name="indigeous">
		 							<option selected></option>
		 							<option value="Yes">Yes</option>
		 							<option value="No">No</option>
		 						</select>
		 					</div>
		 					<div class="col-lg-6 mb-2">
		 						<label>Spouse</label>
		 						<input class="form-control" type="text" name="spouse" placeholder="Spouse Name">
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>PCIC ID NO</label>
		 						<input class="form-control" type="text" name="pcic_id_no2">
		 					</div>
		 					<hr class="mt-2">
		 					<h5>LEGAL BENEFICIARIES</h5>
		 					<div class="col-md-6 col-lg-6 mb-2">
		 						<label>Primary <span style="color: red;">*</span></label>
		 						<input class="form-control" type="text" name="primary" required>
		 					</div>
		 					<div class="col-md-2 col-lg-2 mb-2">
		 						<label>Age</label>
		 						<input class="form-control" type="text" name="age">
		 					</div>
		 					<div class="col-md-4 col-lg-4 mb-2">
		 						<label>Relationship <span style="color: red;">*</span></label>
		 						<input class="form-control" type="text" name="relation" required>
		 					</div>
		 					<div class="col-md-6 col-lg-6 mb-2">
		 						<label>Secondary</label>
		 						<input class="form-control" type="text" name="secondary">
		 					</div>
		 					<div class="col-md-2 col-lg-2 mb-2">
		 						<label>Age</label>
		 						<input class="form-control" type="text" name="age1">
		 					</div>
		 					<div class="col-md-4 col-lg-4 mb-2">
		 						<label>Relationship</label>
		 						<input class="form-control" type="text" name="relation1">
		 					</div>
		 					<hr class="mt-2">
		 					<h5>BOUNDERIES</h5>
		 					<div class="col-lg-6 mb-2">
		 						<label>North <span style="color: red;">*</span></label>
		 						<input class="form-control" type="text" name="north" required>
		 					</div>
		 					<div class="col-lg-6 mb-2">
		 						<label>South <span style="color: red;">*</span></label>
		 						<input class="form-control" type="text" name="south" required>
		 					</div>
		 					<div class="col-lg-6 mb-2">
		 						<label>East <span style="color: red;">*</span></label>
		 						<input class="form-control" type="text" name="east" required>
		 					</div>
		 					<div class="col-lg-6 mb-2">
		 						<label>West <span style="color: red;">*</span></label>
		 						<input class="form-control" type="text" name="west" required>
		 					</div>
		 					<hr class="mt-2">
		 					<h5>FARM</h5>
		 					<div class="col-lg-4 mb-2">
		 						<label>Area</label>
		 						<input class="form-control" type="text" name="area" placeholder="Hectare/s">
		 					</div>
		 					<div class="col-lg-8 mb-2">
		 						<label>Farm Location <span style="color: red;">*</span></label>
		 						<input class="form-control" type="text" name="location" placeholder="Sitio/Brangay/Municipality/Province" required>
		 					</div>
		 					<div class="col-lg-6 mb-2 ">
		 						<label>Variety</label>
		 						<input class="form-control" type="text" name="variety" placeholder="Variety">
		 					</div>
		 					<div class="col-lg-3 mb-2">
		 						<label>Planting Method</label>
		 						<select class="form-select form-control" name="method">
		 							<option selected>Select Here</option>
		 							<option value="Direct Seeding">Direct Seeding</option>
		 							<option value="Transplanting">Transplanting</option>
		 						</select>
		 					</div>
		 					<div class="col-lg-3 mb-2">
		 						<label>Date of Sowing <span style="color: red;">*</span></label>
		 						<input class="form-control" type="date" name="sowing_date" required>
		 					</div>
		 					<div class="col-lg-3 mb-2">
		 						<label>Date of Planting <span style="color: red;">*</span></label>
		 						<input class="form-control" type="date" name="planting" required>
		 					</div>
		 					<div class="col-lg-3 mb-2">
		 						<label>Date of Harvesting</label>
		 						<input class="form-control" type="date" name="harvesting">
		 					</div>
		 					<hr class="mt-2">
		 					<div class="col-lg-6 mb-2">
		 						<label>Land Category</label>
		 						<select class="form-select form-control" name="category">
		 							<option selected></option>
		 							<option value="IR">IR</option>
		 							<option value="RF">RF</option>
		 							<option value="UL">UL</option>
		 						</select>
		 					</div>
		 					<div class="col-lg-6 mb-2">
		 						<label>Soil Type</label>
		 						<select class="form-select form-control" name="type">
		 							<option selected></option>
		 							<option value="CL">CL</option>
		 							<option value="SCL">SCL</option>
		 							<option value="SiL">SiL</option>
		 							<option value="SaL">SaL</option>
		 						</select>
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>Topography</label>
		 						<select class="form-select form-control" name="topography">
		 							<option selected></option>
		 							<option value="Flat">Flat</option>
		 							<option value="Rolling">Rolling</option>
		 							<option value="Hilly">Hilly</option>
		 						</select>
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>Source of Irrigation</label>
		 						<select class="form-select form-control" name="source">
		 							<option selected></option>
		 							<option value="NIA/CIS">NIA/CIS</option>
		 							<option value="DW">DW</option>
		 							<option value="SWIP">SWIP</option>
		 							<option value="STW">STW</option>
		 						</select>
		 					</div>
		 					<div class="col-lg-4 mb-2">
		 						<label>Tenurial Status</label>
		 						<select class="form-select form-control" name="tenurial">
		 							<option selected></option>
		 							<option value="Owner">Owner</option>
		 							<option value="Lessee">Lessee</option>
		 						</select>
		 					</div>
		 					<table class="table table-bordered table-sm">
		 						<thead>
		 							<tr class="text-center">
		 								<th>Land Category</th>
			 							<th>Soil Type</th>
			 							<th>Source of Irrigation</th>
		 							</tr>
		 						</thead>
		 						<tbody>
		 							<tr class="text-center">
		 								<td>IR Irrigated<br> RF Rain Fed<br> UL Upland<br></td>
		 								<td>CL Clay Loam<br> SCL Silty Clay Loam <br> SiL Silty Loam<br> SaL Sandy Loam</td>
		 								<td> NIA/CIS National Irrigation Administration<br> DW Deep Well <br> SWIP Samll Water Impounding Project<br> STW Shallow Tube Well </td>
		 							</tr>
		 						</tbody>
		 					</table>
		 					
		 					<div class="form-group mt-2">
		 						<button class="btn btn-primary" type="submit" name="add_new">Submit Request</button>
		 					</div>
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


