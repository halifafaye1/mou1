<?php
	include('connection/connection.php');
	$id=$_GET['id'];
	mysqli_query($conn,"delete from organization where id='$id'");
	mysqli_query($conn,"delete from report where org_id='$id'");
	header('location:organization.php');

?>
