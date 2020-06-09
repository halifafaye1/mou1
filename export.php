<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "mou");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT request.*,organization.*,organization.id AS Oid,
 request.id AS id
 FROM request
 join organization On
 organization.id = request.organization_id";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
  <table  class="table table-bordered table-striped">
   <tr>


                        <th>Request Name</th>
                        <th>Organization</th>
                        <th>Person Name</th>
                        <th>AG Registration #</th>
                        <th>Address</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>Reference #</th>
                        <th>MOU 1st Signed</th>
                        <th>Approval</th>
   
 </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["name"].'</td>  
                         <td>'.$row["organization_name"].'</td>  
                         <td>'.$row["person_name"].'</td>  
                        <td>'.$row["ag_registration_no"].'</td>  
                         <td>'.$row["address"].'</td>   
                         <td>'.$row["telephone"].'</td>  
                         <td>'.$row["email"].'</td>  
                         <td>'.$row["file_ref_no"].'</td>  
                        <td>'.$row["date_time"].'</td>  
                         <td>'.$row["approval"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  $fileName = "Request_".date('Ymd') . ".xls";			
	header("Content-Type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=\"$fileName\"");
//   header('Content-Type: application/xls');
//   header('Content-Disposition: attachment; filename=download.xls');

  echo $output;
 }
}elseif (isset($_POST["excel"])) 
{
  $query = "SELECT school_id, support_type, quantity, cost, period_date, activity.id as id, organization_id,
  organization.organization_name, organization.id as Oid, school.name, school.id as Sid
  FROM activity

  JOIN organization ON
  activity.organization_id = organization.id
  JOIN School ON
  activity.school_id = school.sch_code 
  JOIN support_type ON
  activity.support_type1 = support_type.id";
  $result = mysqli_query($connect, $query);
  if(mysqli_num_rows($result) > 0)
  {
   $output .= '
   <table  class="table table-bordered table-striped">
    <tr>
 
 
    <th>Organisation Name</th>
    <th>School Name</th>
    <th>Support Type</th>
    <th>Quantity</th>
    <th>Cost</th>
    <th>Period</th>
    
  </tr>
   ';
   while($row = mysqli_fetch_array($result))
   {
    $output .= '
     <tr>  
                          
                          <td>'.$row["organization_name"].'</td>  
                          <td>'.$row["name"].'</td>  
                         <td>'.$row["support_type"].'</td>  
                          <td>'.$row["quantity"].'</td>   
                          <td>'.$row["cost"].'</td>  
                          <td>'.$row["period_date"].'</td>  
                       
                     </tr>
    ';
   }
   $output .= '</table>';
   $fileName = "Activity_".date('Ymd') . ".xls";			
   header("Content-Type: application/vnd.ms-excel");
   header("Content-Disposition: attachment; filename=\"$fileName\"");
 //   header('Content-Type: application/xls');
 //   header('Content-Disposition: attachment; filename=download.xls');
   echo $output;
}
}elseif (isset($_POST["excel1"]))
{
  $query = "SELECT school_id, support_type, quantity, cost, period_date, activity.id as id, organization_id,
  organization.organization_name, organization.id as Oid, school.name, school.id as Sid
  FROM activity

  JOIN organization ON
  activity.organization_id = organization.id
  JOIN School ON
  activity.school_id = school.sch_code 
  JOIN support_type ON
  activity.support_type1 = support_type.id";
  $result = mysqli_query($connect, $query);
  if(mysqli_num_rows($result) > 0)
  {
   $output .= '
   <table  class="table table-bordered table-striped">
    <tr>
 
 
    <th>Organisation Name</th>
    <th>School Name</th>
    <th>Support Type</th>
    <th>Quantity</th>
    <th>Cost</th>
    <th>Period</th>
    
  </tr>
   ';
   while($row = mysqli_fetch_array($result))
   {
    $output .= '
     <tr>  
                          
                          <td>'.$row["organization_name"].'</td>  
                          <td>'.$row["name"].'</td>  
                         <td>'.$row["support_type"].'</td>  
                          <td>'.$row["quantity"].'</td>   
                          <td>'.$row["cost"].'</td>  
                          <td>'.$row["period_date"].'</td>  
                       
                     </tr>
    ';
   }
   $output .= '</table>';
   $fileName = "Organization_".date('Ymd') . ".xls";			
   header("Content-Type: application/vnd.ms-excel");
   header("Content-Disposition: attachment; filename=\"$fileName\"");
 //   header('Content-Type: application/xls');
 //   header('Content-Disposition: attachment; filename=download.xls');
   echo $output;
  
}

elseif (isset($_POST["excel2"]))
{
  $query = "SELECT * FROM organization ORDER BY id";
  $result = mysqli_query($connect, $query);
  if(mysqli_num_rows($result) > 0)
  {
   $output .= '
   <table  class="table table-bordered table-striped">
    <tr>
 
 
    <th>Organization Name</th>
    <th>AG Registration</th>
    <th>Office Space Address</th>
    <th>Previous Activity</th>
    
  </tr>
   ';
   while($row = mysqli_fetch_array($result))
   {
    $output .= '
     <tr>  
                          
                          <td>'.$row["organization_name"].'</td>  
                          <td>'.$row["ag_registration_no"].'</td>  
                         <td>'.$row["office_space_address"].'</td>  
                          <td>'.$row["previous_activities"].'</td>  
                       
                     </tr>
    ';
   }
   $output .= '</table>';
   $fileName = "Organization_".date('Ymd') . ".xls";			
   header("Content-Type: application/vnd.ms-excel");
   header("Content-Disposition: attachment; filename=\"$fileName\"");
 //   header('Content-Type: application/xls');
 //   header('Content-Disposition: attachment; filename=download.xls');
   echo $output;
  
}

}
}
?>