<?php
       // include Database connection file
    require 'connection/connection.php';


        $name = $_POST['name'];
        $sch_code = $_POST['sch_code'];
        
        $district = $_POST['district'];
        $cluster = $_POST['cluster'];
        $region = $_POST['region'];

        /*mysqli_query($conn,"insert into person (name, surname,dob, address) values ('$name', '$surname','$dob', '$address')");
         header('location:person.php');*/

        $sql = "INSERT INTO school (name, sch_code, district, cluster, region) VALUES ('$name','$sch_code','$district','$cluster', '$region')";
        $result = mysqli_query($conn, $sql);

        if ($result)
        {
          echo '<script>alert("Data Saved")</script>';
          header('Location:school.php');
        }
        else
        {
            echo '<script>alert("Data Not Saved")</script>';
        }


?>
