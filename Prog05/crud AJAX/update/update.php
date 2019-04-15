<?php 
require '../database/database.php'; 
$id = null;
if (!empty($_GET['id'])) {
	$id = $_REQUEST['id'];
}

if (isset($_POST['update'])) {	
	// Gathering Values
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	
	$valid = true;
	if (empty($name) || empty($email) || empty($mobile)) { // Combined Empty Checks
		$valid = false;
	} 
	
	// update data
	if ($valid) {
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE customers  set name = ?, email = ?, mobile = ? WHERE id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($name,$email,$mobile,$id));
		Database::disconnect();
	}
} else {
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT id, name, email, mobile FROM customers where id = ?"; // Selecting Needed Categories, Not All
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	$name = $data['name'];
	$email = $data['email'];
	$mobile = $data['mobile'];
	Database::disconnect();
}
?> 
<div class="container">
	<div class="span10 offset1">
		<div class="row">
			<h3>Update a Customer</h3>
		</div>
		<form class="form-horizontal">
			<div class="control-group">
				<label class="control-label">Name</label>
				<div class="controls">
					<input id="name" type="text" placeholder="Name" value="<?php echo !empty($name)?$name:'';?>">
					<!-- Removed Php Error Echoing -->
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Email Address</label>
				<div class="controls">
					<input id="email" type="text" placeholder="Email Address" value="<?php echo !empty($email)?$email:'';?>">
					<!-- Removed Php Error Echoing -->
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Mobile Number</label>
				<div class="controls">
					<input id="mobile" type="text" placeholder="Mobile Number" value="<?php echo !empty($mobile)?$mobile:'';?>">
					<!-- Removed Php Error Echoing -->
				</div>
			</div>
			<!-- Removed form-actions Div Class -->
		</form>
	</div>
</div> <!-- /container -->

