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
                        <th>renewal</th>
                      </tr>


                    </thead>
                    <tbody>
                    <?php include ('connection/connection.php');


                            // process form when posted
                            if(isset($_POST['value'])) {
                                if($_POST['value'] == 'Pending') {

                                    //$query = "SELECT * FROM request WHERE approval='Pending'";

                                    $query = " SELECT *
                                    FROM request JOIN person
                                    join organization on
                                    organization.id = person.org_id
                                    where (request.id_number = person.id_number AND
                                     request.approval = 'Pending') " ;
                                }
                                elseif($_POST['value'] == 'Approved') {

                                    $query = " SELECT *
                                    FROM request JOIN person
                                    join organization on
                                    organization.id = person.org_id
                                    where (request.id_number = person.id_number AND
                                     request.approval = 'Approved') " ;
                                }
                                elseif($_POST['value'] == 'Denied'){
                                    $query = " SELECT *
                                    FROM request JOIN person
                                    join organization on
                                    organization.id = person.org_id
                                    where (request.id_number = person.id_number AND
                                     request.approval = 'Denied') " ;
                                }
                                else {
                                    // query to get all records
                                    $query = " SELECT  request.*,organization.*,request.name AS rName
                                    FROM request  JOIN person
                                    join organization on
                                    organization.id = person.org_id
                                    where request.id_number = person.id_number
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
                  <td>
                  <a href="#renew<?php echo $row['org_id']; ?>" data-toggle="modal" data-org_id="<?php echo $row['organization_name']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> Renew</a>
</td>
              <!-- Renewal -->
						    <div class="modal fade" id="renew<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						        <div class="modal-dialog">
						            <div class="modal-content">
						                <div class="modal-header">
						                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						                    <center><h4 class="modal-title" id="myModalLabel">Renew</h4></center>
						                </div>
						                <div class="modal-body">
          										<?php
          											$del=mysqli_query($conn,"select * from organization where id='".$row['id']."'");
          											$drow=mysqli_fetch_array($del);
          										?>
          										<div class="container-fluid">
          											<h5><center>Are you sure you want to renew the Agreement with : <strong><?php echo $drow['organization_name']; ?></strong></center></h5>
          						                </div>
          										</div>
                              <form action="renewal.php" method="POST" enctype="multipart/form-data">
                                 <input type="hidden" id="id" name="org_id" value="<?php echo $row['org_id']; ?>">
                                 <input type="hidden" id="id_number" name="id_number" value="<?php echo $row['id_number']; ?>">
						                <div class="modal-footer">
						                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						                    <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Renew</button>
						                </div>
                          </form>

						            </div>

						        </div>

						    </div>
                   </td>

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
	<!-- Delete -->
  <div class="modal fade" id="delete<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						        <div class="modal-dialog">
						            <div class="modal-content">
						                <div class="modal-header">
						                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						                    <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
						                </div>
						                <div class="modal-body">
										<?php
											$del=mysqli_query($conn,"select * from renew where id='".$row['id']."'");
											$drow=mysqli_fetch_array($del);
										?>
										<div class="container-fluid">
											<h5><center>Firstname: <strong><?php echo $drow['name']; ?></strong></center></h5>
						                </div>
										</div>
						                <div class="modal-footer">
						                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						                    <a href="deleteperson.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
						                </div>

						            </div>
						        </div>
						    </div>
    </div><!-- ./wrapper -->


<?php include 'footer.php'; ?>
