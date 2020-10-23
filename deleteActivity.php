<?php
	include('connection/connection.php');
	$id=$_GET['id'];
	mysqli_query($conn,"delete from activity where id='$id'");
	header('location:activity.php?delete=successfully');

?>
