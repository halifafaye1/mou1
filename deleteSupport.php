<?php
	include('connection/connection.php');
	$id=$_GET['id'];
	mysqli_query($conn,"delete from support_type where id='$id'");
	header('location:support_type.php?delete=successfully');
?>