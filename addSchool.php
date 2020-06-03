<?php
       // include Database connection file
    require 'connection/connection.php';


        $name = $_POST['name'];
        $sch_name = $_POST['school_name'];
        $sch_code = $_POST['sch_code'];
        $sch_type = $_POST['sch_type'];
        $district = $_POST['district'];
        $cluster = $_POST['cluster'];
        $region = $_POST['region'];
        $ward = $_POST['ward'];
        $settlement = $_POST['settlement'];

        /*mysqli_query($conn,"insert into person (name, surname,dob, address) values ('$name', '$surname','$dob', '$address')");
         header('location:person.php');*/

        $sql = "INSERT INTO school (name, sch_code, sch_type ,district, cluster, region, ward, settlement) VALUES ('$sch_name','$sch_code','$sch_type','$district','$cluster', '$region','$ward','$settlement')";
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
