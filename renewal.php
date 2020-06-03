<?php
// Check if the form was submitted


  require 'connection/connection.php';
  $id = $_POST['request_id'];
  $org_id = $_POST['org_id'];


  //echo $id;

  $date = $_POST['approved_date'];

  $nxtDtate = strtotime($date);

  $expiry = date('Y-m-d', strtotime('+3 years',$nxtDtate));

  //echo $id;

  //if request contract is null, set selected date as the date 1st MOU was signed;
  // then create a new report row for that request, with the report_id as FK. ( Report Table)
  //  create a new renew for for that request, with the report_id as FK. ( Renewal Table)
  // change status from approval to Not Due

    $sql = "UPDATE request SET  approval = 'Not Due'  WHERE id='$id'";
    $result = mysqli_query($conn, $sql);



    $sql = "INSERT INTO renewal (org_id,request_id,approve_date,expiry_date)
     VALUES ('$org_id','$id','$date','$expiry' )
         ";
    $result = mysqli_query($conn, $sql);

    $sql = "INSERT INTO report ( org_id,request_id, report_1, report_2, report_3,approval_date,expiry_date)
     VALUES ('$org_id ','$id','NA','NA','NA','$date','$expiry')";
    $resultP = mysqli_query($conn, $sql);


    header('Location: ' . $_SERVER['HTTP_REFERER']);





?>
