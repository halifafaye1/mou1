<?php
// Check if the form was submitted


  require 'connection/connection.php';
  $rid = $_GET['id'];
  $report_type = $_GET['report'];
  $rid = $_GET['id'];

  global $report;


  $sql = "SELECT * from report WHERE id = '$rid' ";
  $report = mysqli_query($conn, $sql);

  $row=mysqli_fetch_assoc($report);

  if($report_type == report_1 ){
    $report  = $row['report_1'];
    echo $report;

  }
  else if($report_type == report_2){
    $report  = $row['report_2'];
    echo $report;
  }
  else{
    $report  = $row['report_3'];
    echo $report;

  }



header('Content-type: application/pdf');
readfile($report);

?>
