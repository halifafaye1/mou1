<?php
session_start();
?>
 <!--  Header (Page header) -->
 <?php include'header.php';?>
 <style type="text/css">
      h4,h5{
        text-align:center;
      }
		

      @media print {
          .btn-print {
            display:none !important;
		  }
		  .main-footer	{
			display:none !important;
		  }
		  .box.box-primary {
			  border-top:none !important;
		  }
		  
          
      }
    </style>
 <!--  sidebar (Page sidebar) -->
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
         
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..." />
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
              
            </li>
            <li class="treeview">
              <a href="request.php">
                <i class="fa fa-external-link"></i>
                <span>Request</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>
            <li class="treeview">
              <a href="support_type.php">
                <i class="fa fa-files-o"></i>
                <span>Support Type</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>
            <li class="treeview">
              <a href="person.php">
                <i class="fa fa-user"></i>
                <span>Person</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>
            <li class="treeview">
              <a href="organization.php">
                <i class="glyphicon glyphicon-home"></i>
                <span>Organisation</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>
            <li class="treeview">
              <a href="school.php">
                <i class="fa fa-institution"></i>
                <span>School</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>
            <li class="treeview">
              <a href="activity.php">
                <i class="fa fa-bar-chart"></i>
                <span>Activity</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>

            <li class="treeview">
              <a href="activity_report.php">
                <i class="fa fa-folder-open"></i>
                <span>Activity Report</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>
            <li class="active treeview">
              <a href="request_report.php">
                <i class="fa fa-folder-open"></i>
                <span>Request Report</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>
            <li class="treeview">
              <a href="Verification.php">
                <i class="fa fa-files-o"></i>
                <span>Verification</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>

        </section>
        <!-- /.sidebar -->
      </aside>
      </body>
</html>
<div class="wrapper">
      <?php 
      include('connection/connection.php');
      ?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
         

          <!-- Main content -->
          <section class="content">
            <div class="row">
	    <div class="col-xs-12">
              <div class="box box-primary">
					
              
                <div class="box-body">
				<?php
include('connection/connection.php');


    $query=mysqli_query($conn,"SELECT * FROM request ");
  
        $row=mysqli_fetch_array($query);
        
?>      
                   <h4><b>MINISTRY OF BASIC AND SECONDARY EDUCATION MOU REQUEST REPORT</b> </h4>  
                  <h5><b>Address: WILLY THROPE PLACE BANJUL</b></h5>
                  <h5><b>Contact #:</b></h5>
				  <h4><b>REQUEST REPORT as of today, <?php echo date("M d, Y h:i a");?></b></h4>
                  
				  <a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i> Print</a>
                            <a class = "btn btn-primary btn-print" href = "index.php"><i class ="glyphicon glyphicon-arrow-left"></i> Back to Homepage</a> 
                            <br>
                            <br>
                            
                            <form action=""  method='POST' name='form_filter' > 
                                <select class="form-control" name="value"> 
                                    <option value="All">All</option> 
                                    <option value="Pending">Pending</option> 
                                    <option value="Approved">Approved</option> 
                                    <option value="Denied">Denied</option>
                                </select> 
                                <br /> 
                                <input type='submit' value = 'Filter'> 
                            </form>
                           
                  <table class="table table-bordered table-striped">
                    <thead>
					
                      
                    <tr>
                        
                        <th>Organisation Name</th>
                        <th>Request Name</th>
                        <th>Address</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>Reference #</th>
                        <th>Date/Time</th>
                        <th>Status</th>
                      </tr>
                       
                 
                    </thead>
                    <tbody>
                    <?php include ('connection/connection.php');
                            

                            // process form when posted
                            if(isset($_POST['value'])) {
                                if($_POST['value'] == 'Pending') {
                                     
                                    //$query = "SELECT * FROM request WHERE approval='Pending'";  
                                    
                                    $query = " SELECT name, address, telephone, email, file_ref_no, date_time, approval,organization_id,
                                    request.id as id, organization.organization_name, organization.id as Oid
                                    FROM request JOIN organization
                                    ON request.organization_id = organization.id
                                    where request.approval = 'Pending' " ; 
                                }  
                                elseif($_POST['value'] == 'Approved') {  

                                    $query = " SELECT name, address, telephone, email, file_ref_no, date_time, approval,organization_id,
                                    request.id as id, organization.organization_name, organization.id as Oid
                                    FROM request JOIN organization
                                    ON request.organization_id = organization.id
                                    where request.approval='Approved'";  
                                } 
                                elseif($_POST['value'] == 'Denied'){
                                    $query = " SELECT name, address, telephone, email, file_ref_no, date_time, approval,organization_id,
                                    request.id as id, organization.organization_name, organization.id as Oid
                                    FROM request JOIN organization
                                    ON request.organization_id = organization.id
                                    where request.approval = 'Denied' " ; 
                                }
                                else {  
                                    // query to get all records  
                                    $query = " SELECT name, address, telephone, email, file_ref_no, date_time, approval,organization_id,
                                    request.id as id, organization.organization_name, organization.id as Oid
                                    FROM request JOIN organization
                                    ON request.organization_id = organization.id
                                    ";  
                                }  
                                $result = mysqli_query($conn,$query);  
                                
                                
                            
                                while ($row = mysqli_fetch_assoc($result)){
                                ?>
              <tbody>
                  
              <tr>

                  <td><?php echo $row['organization_name']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['address']; ?></td>
                  <td><?php echo $row['telephone']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['file_ref_no']; ?></td>
                  <td><?php echo $row['date_time']; ?></td>
                  <td><?php echo $row['approval']; ?></td>

                       
                      </tr>

<?php }?>		
			  
                    </tbody>
                    <tfoot>
                     
                      <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr> 
                      <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr> 
                      <tr>
                        <th>Prepared by:</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr> 
                      <?php }?>	  
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->

	      </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      
    </div><!-- ./wrapper -->
    

<?php include 'footer.php'; ?>          