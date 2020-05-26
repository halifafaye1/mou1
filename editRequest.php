<?php
  require 'connection/connection.php';

  $id=$_REQUEST['id'];


  //$organization_id=$_POST['organization_id'];
  $id_number= $_POST['id_number'];
  $name=$_POST['name'];
  $address= $_POST['address'];
  $telephone=$_POST['telephone'];
  $email=$_POST['email'];
  $file_ref_no= $_POST['file_ref_no'];
  $date_time=$_POST['date_time'];
  $approval=$_POST['approval'];



 /* mysqli_query($conn,"update user set firstname='$firstname', lastname='$lastname', address='$address' where userid='$id'");
  header('location:index.php');*/
   $sql = "UPDATE request SET id_number = '$id_number', name = '$name', address = '$address', telephone = '$telephone',
         email='$email', file_ref_no='$file_ref_no', date_time='$date_time', approval='$approval' WHERE id='$id'";

        $result = mysqli_query($conn, $sql);



        if ($result)
        {

          echo '<script>alert("Data Updated")</script>';
          header('Location:request.php');
        }
        else
        {
            echo '<script>alert("Data Not Saved")</script>';
        }

?>
