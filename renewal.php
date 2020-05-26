<?php
// Check if the form was submitted


  require 'connection/connection.php';
  $id = $_POST['org_id'];

  //echo $id;

    $sql = "UPDATE renewal SET count = count + 1  WHERE org_id='$id'";
    $result = mysqli_query($conn, $sql);
    header('Location: ' . $_SERVER['HTTP_REFERER']);




?>
