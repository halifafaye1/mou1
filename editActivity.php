<?php
  require 'connection/connection.php';

  $id=$_REQUEST['id'];


  $organization_id=$_POST['organization_id'];
  $school_id=$_POST['school_id'];
  //$support_type= $_POST['support_type'];
  $quantity = $_POST['quantity'];
  $cost=$_POST['cost'];
  $period_date=$_POST['period_date'];

 /* mysqli_query($conn,"update user set firstname='$firstname', lastname='$lastname', address='$address' where userid='$id'");
  header('location:index.php');*/
   $sql = "UPDATE activity SET organization_id = '$organization_id', school_id = '$school_id',
   quantity = '$quantity', cost = '$cost', period_date='$period_date' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);

        if ($result)
        {
          echo '<script>alert("Data Updated")</script>';
          header('Location:activity.php?update=successfully');
        }
        else
        {
            echo '<script>alert("Data Not Saved")</script>';
        }

?>
