<?php 
include "connect.php";

// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	$user_id = $_GET['id'];

	// write delete query
	$sql = "DELETE FROM `numeros_tel` WHERE `id`='$user_id'";

	// Execute the query

	$result = $con->query($sql);

	if ($result == TRUE) {
		header('location: company.php');
	}else{
		echo "Error:" . $sql . "<br>" . $con->error;
	}
}

?>