<?php
       // include Database connection file
    require 'connection/connection.php';


        //$organization_id = $_POST['organization_id'];
        $id_number = $_POST['id_number'];
        $name = $_POST['name'];
        $person_name = $_POST['person_name'];
        $address = $_POST['address'];
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $file_ref_no = $_POST['file_ref_no'];
        $date_time = $_POST['date_time'];

        $nxtDtate = strtotime($date_time);

        $expire = date('Y-m-d', strtotime('+3 years',$nxtDtate));
        $approval = $_POST['approval'];



        /*mysqli_query($conn,"insert into person (name, surname,dob, address) values ('$name', '$surname','$dob', '$address')");
         header('location:person.php');*/

        $sql = "INSERT INTO request (name,person_name,id_number, address, telephone, email, file_ref_no, date_time,expire, approval)
         VALUES ('$name','$person_name','$id_number','$address','$telephone','$email','$file_ref_no','$date_time','$expire','$approval')";
        $result = mysqli_query($conn, $sql);

        if ($result)
        {
          echo '<script>alert("Data Saved")</script>';
          header('Location:request.php');
        }
        else
        {
            echo  $result ."\n"." your query result ";
            echo  $id_number ."\n". $name ." \n". $address ."\n". $telephone ."\n". $email ."\n". $file_ref_no ."\n". $date_time ."\n".$approval;

              ;
            echo '<script>alert("Data Not Saved")</script>';

        }


?>
