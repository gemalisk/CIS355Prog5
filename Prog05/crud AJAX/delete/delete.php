<?php
 require '../database/database.php';

 if (isset($_POST['delete'])) {
//Removed Post Empty Check
	// keep track post values
	$id = $_POST['id'];
	
	$valid = true; // Initialize Valid to True
	if (empty($id)) { $valid = false; } // Valid Check
	// delete data
	if ($valid) { // If Valid Do
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM customers  WHERE id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		Database::disconnect();
	}
}

?> 
