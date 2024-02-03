<?php
	include "config.php";

	$id = $_GET["id"];
	$sql = "DELETE FROM todo
			WHERE id = '".$id."' ";

	$query = mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)) {
		 header('location: volunteer.php');
	}
	mysqli_close($conn);
?>
