<?php
  require 'connection/connection.php';

  $id=$_REQUEST['id'];


  $organization_name=$_POST['organization_name'];
  $ag_registration_no=$_POST['ag_registration_no'];
  $office_space_address= $_POST['office_space_address'];
  $previous_activities=$_POST['previous_activities'];
  $region=$_POST['region'];

 /* mysqli_query($conn,"update user set firstname='$firstname', lastname='$lastname', address='$address' where userid='$id'");
  header('location:index.php');*/
   $sql = "UPDATE organization SET organization_name = '$organization_name', ag_registration_no = '$ag_registration_no',
   office_space_address = '$office_space_address', previous_activities = '$previous_activities', region = '$region' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);

        if ($result)
        {
          echo '<script>alert("Data Updated")</script>';
          header('Location:organization.php');
        }
        else
        {
            echo '<script>alert("Data Not Saved")</script>';
        }

?>
