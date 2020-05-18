<?php
   if(isset($_FILES['report'])){
      $errors= array();
      $file_name = $_FILES['report']['name'];
      $file_size = $_FILES['report']['size'];
      $file_tmp = $_FILES['report']['tmp_name'];
      $file_type = $_FILES['report']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['report']['name'])));

      $extensions= array("pdf","doc","docx");

      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a DOC or PDF file.";

      }

      if($file_size > 500000000) {
         $errors[]='File size must be excately 500 MB';
      }

      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"uploads/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
