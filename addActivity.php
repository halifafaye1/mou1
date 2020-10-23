<?php
       // include Database connection file
    require 'connection/connection.php';

           $organization_id = $_POST['organization_id'];
            $school_id = $_POST['school_id'];
            $support_type = $_POST['support_type'];
            $quantity = $_POST['quantity'];
            $cost = $_POST['cost'];
            $period_date = $_POST['period_date'];
            $end_date = $_POST['end_date'];

            /*mysqli_query($conn,"insert into person (name, surname,dob, address) values ('$name', '$surname','$dob', '$address')");
            header('location:person.php');*/

            $sql = "INSERT INTO activity (organization_id, school_id,support_type1,quantity, cost, period_date, end_date)
            VALUES ('$organization_id','$school_id',$support_type,'$quantity','$cost','$period_date', '$end_date')";
            $result = mysqli_query($conn, $sql);

            if ($result)
            {
              echo '<script>alert("Data Saved")</script>';
                //header('Location: '.$_SERVER['HTTP_REFERER']);
                header('Location:activity.php?status=successfully');
            }
            else
            {
                echo '<script>alert("Data Not Saved")</script>';
            }


            


        


?>
