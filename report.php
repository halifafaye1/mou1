<?php 
include ('connection/connection.php');
                            //connect to database, checking, etc 

                            // process form when posted
                            if(isset($_POST['value'])) {
                                if($_POST['value'] == 'Pending') {
                                     
                                    $query = "SELECT * FROM request WHERE approval='Pending'";  
                                }  
                                elseif($_POST['value'] == 'Approved') {  

                                    $query = "SELECT * FROM request WHERE approval='Approved'";  
                                } 
                                elseif($_POST['value'] == 'Denied'){
                                    $query = "SELECT * FROM request WHERE approval='Denied'"; 
                                }
                                else {  
                                    // query to get all records  
                                    $query = " SELECT name, address, telephone, email, file_ref_no, date_time, approval,organization_id,
                                    request.id as id, organization.organization_name, organization.id as Oid
                                    FROM request JOIN organization
                                    ON request.organization_id = organization.id";  
                                }  
                                $sql = mysqli_query($conn,$query);  
                             
                                while ($row = mysqli_fetch_assoc($sql)){ 
                                
                                    

                                   // $organization_name = $row['organization_name']; 
                                    $name =$row['name'];
                                    $address = $row['address']; 
                                    $telephone = $row['telephone'];
                                    $email = $row['email']; 
                                    $file_ref_no = $row['file_ref_no'];
                                    $date_time = $row['date_time']; 
                                    $approval = $row['approval']; 
                                    // Echo your rows here... 
                                    echo 'The user ID is:' . $row['id'];
                                }
                                mysqli_close($conn); 
                            }
                            ?>