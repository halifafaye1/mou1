<?php
// Check if the form was submitted


  require 'connection/connection.php';
  $id = $_POST['org_id'];
  $id_number = $_POST['id_number'];

  //echo $id;

    $sql = "UPDATE renewal SET count = count + 1  WHERE org_id='$id'";
    $result = mysqli_query($conn, $sql);

    $sql = "INSERT INTO report ( org_id, report_1, report_2, report_3)
     VALUES ('$id ','NA','NA','NA')";
    $resultP = mysqli_query($conn, $sql);

    $sql = "UPDATE request SET expire = DATE_ADD(expire, INTERVAL 3 YEAR)  WHERE id_number='$id_number'";
    $result = mysqli_query($conn, $sql);

    header('Location: ' . $_SERVER['HTTP_REFERER']);




?>
