<?php
	include('connection/connection.php');
	$id=$_GET['id'];
	mysqli_query($conn,"delete from person where id='$id'");
	header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
