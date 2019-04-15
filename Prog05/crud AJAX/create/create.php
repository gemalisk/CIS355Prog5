<?php 

require '../database/database.php'; 

 if (isset($_POST['insert'])) {
 // Removed Error Initialization
	// Gathering Values
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
		$sql = "INSERT INTO customers (name, email, mobile) values(?, ?, ?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($name, $email, $mobile));
		Database::disconnect();
		// Removed Header Change
	}
}

?> 
