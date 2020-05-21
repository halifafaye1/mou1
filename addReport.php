<?php
// Check if the form was submitted

  $radioVal = $_POST["report"];

  if($radioVal == "report2")
          {
              echo("You chose the first button. Good choice. :D");
              if($_SERVER["REQUEST_METHOD"] == "POST"){
                  // Check if file was uploaded without errors
                  if(isset($_FILES["report_2"]) && $_FILES["report_2"]["error"] == 0){
                      $allowed = array("pdf" => "application/pdf","jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                      $filename = $_FILES["report_2"]["name"];
                      $filetype = $_FILES["report_2"]["type"];
                      $filesize = $_FILES["report_2"]["size"];

                      $filename = "Report 2 ".rand(10, 20).$filename;

                      // Verify file extension
                      $ext = pathinfo($filename, PATHINFO_EXTENSION);
                      if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

                      // Verify file size - 5MB maximum
                      $maxsize = 5 * 1024 * 10241;
                      if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

                      // Verify MYME type of the file
                      if(in_array($filetype, $allowed)){
                          // Check whether file exists before uploading it
                          if(file_exists("upload/" . $filename)){
                              echo $filename . " is already exists.";
                          } else{
                              move_uploaded_file($_FILES["report_2"]["tmp_name"], "upload/" . $filename);


                              require 'connection/connection.php';
                              $id=$_POST['org_id'];
                              $report_2="upload/".$filename;


                              $sql = "UPDATE report SET
                               report_2 = '$report_2' WHERE org_id = '$id' ";
                              $result = mysqli_query($conn, $sql);

                              echo "Your file was uploaded successfully.";
                              //header('Location: ' . $_SERVER['HTTP_REFERER']);
                              $filename = $report_2;

                              header('Content-type: application/pdf');
                              readfile($report_2);


                          }
                      } else{
                          echo "Error: There was a problem uploading your file. Please try again.";
                      }
                  } else{
                      echo "Error: " . $_FILES["report_1"]["error"];
                  }
              }
          }
          else if ($radioVal == "report3")
          {
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                // Check if file was uploaded without errors
                if(isset($_FILES["report_2"]) && $_FILES["report_2"]["error"] == 0){
                    $allowed = array("pdf" => "application/pdf","jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                    $filename = $_FILES["report_2"]["name"];
                    $filetype = $_FILES["report_2"]["type"];
                    $filesize = $_FILES["report_2"]["size"];

                    $filename = "Report 3 ".rand(10, 20).$filename;

                    // Verify file extension
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

                    // Verify file size - 5MB maximum
                    $maxsize = 5 * 1024 * 10241;
                    if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

                    // Verify MYME type of the file
                    if(in_array($filetype, $allowed)){
                        // Check whether file exists before uploading it
                        if(file_exists("upload/" . $filename)){

                            echo $filename . " is already exists.";
                        } else{
                            move_uploaded_file($_FILES["report_2"]["tmp_name"], "upload/" . $filename);


                            require 'connection/connection.php';
                            $id=$_POST['org_id'];
                            $report_3="upload/".$filename;


                            $sql = "UPDATE report SET
                             report_3 = '$report_3' where org_id = '$id'";
                            $result = mysqli_query($conn, $sql);

                            echo "Your file was uploaded successfully.";
                            //header('Location: ' . $_SERVER['HTTP_REFERER']);


                            header('Content-type: application/pdf');
                            readfile($report_3);


                        }
                    } else{
                        echo "Error: There was a problem uploading your file(Report 3). Please try again.";
                    }
                } else{
                    echo "Error: " . $_FILES["report_2"]["error"];
                }
            }

           }
           else{
             if($_SERVER["REQUEST_METHOD"] == "POST"){
                 // Check if file was uploaded without errors
                 if(isset($_FILES["report_2"]) && $_FILES["report_2"]["error"] == 0){
                     $allowed = array("pdf" => "application/pdf","jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                     $filename = $_FILES["report_2"]["name"];
                     $filetype = $_FILES["report_2"]["type"];
                     $filesize = $_FILES["report_2"]["size"];

                     $filename = "Report 1 ".rand(10, 1000).$filename;

                     // Verify file extension
                     $ext = pathinfo($filename, PATHINFO_EXTENSION);
                     if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

                     // Verify file size - 5MB maximum
                     $maxsize = 5 * 1024 * 10241;
                     if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

                     // Verify MYME type of the file
                     if(in_array($filetype, $allowed)){
                         // Check whether file exists before uploading it
                         if(file_exists("upload/" . $filename)){

                             echo $filename . " is already exists.";
                         } else{
                             move_uploaded_file($_FILES["report_2"]["tmp_name"], "upload/" . $filename);

                             $id=$_POST['org_id'];
                             require 'connection/connection.php';

                             $report_1="upload/".$filename;


                             $sql = "UPDATE report SET
                              report_1 = '$report_1'where org_id = '$id' ";
                             $result = mysqli_query($conn, $sql);

                             echo "Your file was uploaded successfully.";
                             //header('Location: ' . $_SERVER['HTTP_REFERER']);


                             header('Content-type: application/pdf');
                             readfile($report_1);


                         }
                     } else{
                         echo "Error: There was a problem uploading your file(Report 3). Please try again.";
                     }
                 } else{
                     echo "Error: " . $_FILES["report_2"]["error"];
                 }
             }
           }






      // if($_FILES['report_1']['size'] != 0 && $_FILES['report_2']['size'] != 0 && $_FILES['report_3']['size'] == 0) {
      //   echo "only 3 is empty";
      // }
      //
      // if($_FILES['report_1']['size'] != 0 && $_FILES['report_2']['size'] != 0 && $_FILES['report_3']['size'] != 0) {
      //   echo "Non is empty";
      // }
?>
