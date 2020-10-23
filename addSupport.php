<?php
       // include Database connection file
    require 'connection/connection.php';


        $support_type = $_POST['support_type'];
        

        /*mysqli_query($conn,"insert into person (name, surname,dob, address) values ('$name', '$surname','$dob', '$address')");
         header('location:person.php');*/

        $sql = "INSERT INTO support_type (support_type) VALUES ('$support_type')";
        $result = mysqli_query($conn, $sql);

        if ($result)
        {
          echo '<script>alert("Data Saved")</script>';
          header('Location:support_type.php?status=successfully');
        }
        else
        {
            echo '<script>alert("Data Not Saved")</script>';
        }


?>
