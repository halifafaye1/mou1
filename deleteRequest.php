<?php
	include('connection/connection.php');
	$id=$_GET['id'];
	mysqli_query($conn,"delete from request where id='$id'");
	mysqli_query($conn,"delete from report where request_id='$id'");
	mysqli_query($conn,"delete from renewal where request_id='$id'");
	header('location:request.php?delete=successfully');

?>
