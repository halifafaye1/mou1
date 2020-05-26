<?php
       // include Database connection file
    require 'connection/connection.php';

          // code...
          $name = $_POST['name'];
          $surname = $_POST['surname'];
          $position = $_POST['position'];
          $dob = $_POST['dob'];
          $id_number = $_POST['id_number'];

          $id = $_POST['org_id'];

          $orgid = $id;

          $sql2 = "INSERT INTO person (org_id, name, surname, position, dob,id_number)
           VALUES ('$orgid','$name','$surname','$position','$dob','$id_number')";

          $result2 = mysqli_query($conn, $sql2);


          if($result2 ){

            echo '<script>alert("Data Saved")</script>';
            header('Location: ' . $_SERVER['HTTP_REFERER']);

          }
          else{
          echo '<script>alert("Person Data Not Saved")</script>';

         }



?>
