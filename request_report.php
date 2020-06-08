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

         $currentDate = date('Y-m-d');
         $run = " UPDATE request r
         JOIN report ON r.id = report.request_id
         set r.approval  = 'Expired'
         where expiry_date < '$currentDate'
         AND
         report.id IN (
             SELECT MAX(id)
             FROM report

             GROUP BY report.request_id
         )
          ";
          // SELECT *
          //             FROM report
          //             JOIN request ON request.id = report.request_id
          //             JOIN organization ON organization.id = report.org_id
          //
          //             WHERE report.id IN (
          //                 SELECT MAX(id)
          //                 FROM report
          //                 GROUP BY request_id
          //             )
          //             and
          //             expiry_date < '2020-06-02'

       $updateStatus=mysqli_query($conn,$run);

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
                                    <option value="Expired">Expired</option>
                                    <option value="Not Due">Not Due</option>
                                    <option value="All">Suggest other possible options</option>
                                </select>
                                <br />
                                <input type='submit' value = 'Filter'>
                            </form>

                  <table id="table" class="table table-bordered table-striped">
                    <thead>


                    <tr>

                        <th>Organisation Name</th>
                        <th>Request Name</th>
                        <th>Address</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>Reference #</th>
                        <th>Date MOU 1st Signed</th>
                        <th>Status</th>
                        <th>Expiry Date</th>
                        <th>Months Left</th>
                        <th>renewal</th>
                      </tr>


                    </thead>
                    <tbody>
                    <?php include ('connection/connection.php');


                            // process form when posted
                            if(isset($_POST['value'])) {
                                if($_POST['value'] == 'Expired') {

                                    //$query = "SELECT * FROM request WHERE approval='Pending'";

                                    $query =
                                    "SELECT *
                                    FROM report
                                    JOIN request ON request.id = report.request_id
                                    JOIN organization ON organization.id = report.org_id
                                    WHERE report.id IN (
                                        SELECT MAX(id)
                                        FROM report
                                        GROUP BY request_id

                                    )
                                    AND request.approval = 'Expired'
                                    ORDER BY report.expiry_date";
                                }
                                elseif($_POST['value'] == 'Not Due') {

                                    $query =  "SELECT *
                                    FROM report
                                    JOIN request ON request.id = report.request_id
                                    JOIN organization ON organization.id = report.org_id
                                    WHERE report.id IN (
                                        SELECT MAX(id)
                                        FROM report
                                        GROUP BY request_id

                                    )
                                    AND request.approval = 'Not Due'
                                    ORDER BY report.expiry_date";
                                }
                                elseif($_POST['value'] == 'Denied'){
                                    $query = " SELECT  request.*,organization.*,organization.id AS org_id,request.name AS rName
                                    FROM request
                                    join organization on
                                    request.ag_registration_no = organization.ag_registration_no
                                    where request.approval = 'Denied' " ;
                                }
                                else {
                                    // query to get all records
                                    $query =
                                    "SELECT *
                                    FROM report
                                    JOIN request ON request.id = report.request_id
                                    JOIN organization ON organization.id = report.org_id
                                    WHERE report.id IN (
                                        SELECT MAX(id)
                                        FROM report
                                        GROUP BY request_id

                                    )
                                    ORDER BY report.expiry_date";
                                    // "SELECT *
                                    // FROM report
                                    // JOIN request ON request.id = report.request_id
                                    // JOIN organization ON organization.id = report.org_id
                                    //
                                    // ORDER BY report.expiry_date";
                                }
                                $result = mysqli_query($conn,$query);



                                while ($row = mysqli_fetch_assoc($result)){
                                ?>
              <tbody>

              <tr class="item">

                  <td><?php echo $row['organization_name']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['address']; ?></td>
                  <td><?php echo $row['telephone']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['file_ref_no']; ?></td>
                  <td><?php echo $row['date_time']; ?></td>
                  <td class="approve"><?php echo $row['approval']; ?></td>
                  <td><?php echo $row['expiry_date']; ?></td>
                  <td>

                     <?php


                  $date2 = $row['expiry_date'];
                  $date1 = date('Y-m-d');

                  $ts1 = strtotime($date1);
                  $ts2 = strtotime($date2);

                  $year1 = date('Y', $ts1);
                  $year2 = date('Y', $ts2);

                  $month1 = date('m', $ts1);
                  $month2 = date('m', $ts2);

                  $diff = (($year2 - $year1) * 12) + ($month2 - $month1);

                  if ($diff < 1){
                    $diff = abs($diff);
                  echo "Expired " .$diff." Months Ago ";
                  }
                  else
                    echo $diff." Months ";




                    ?>

                  </td>
                  <td>


                     <?php if ( $row['approval']!="Expired" ){
                       echo " <button  href='#renew".$row['org_id']."'
                         data-toggle='modal'data-rid='".$row['request_id']."' id='btn' class='btn btn-success' disabled><span class='glyphicon glyphicon-plus' >
                          </span> Renew</buttom> " ;
                     }
                     else{
                       echo " <button  data-target='#renew'
                         data-toggle='modal' data-rid='".$row['request_id']."' id='btn' class='btn btn-success' ><span class='glyphicon glyphicon-plus' >
                          </span> Renew</buttom> " ;
                     }


                     ?>

                  </td>

              <!-- Renewal -->
						    <div class="modal fade" id="renew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

          										</div>
                              <form action="renewal.php" method="POST" enctype="multipart/form-data">
                                 <input type="hidden" id="id" name="org_id" value="<?php echo $row['org_id']; ?>">
                                 <input type="hidden" id="request_id" name="request_id" value="">
                                 <h5><center>Are you sure you want to renew the Agreement with : <strong><?php echo $drow['organization_name']; ?></strong></center></h5>
                                 <center> <div>
                                     <div class="form-style-2">
                                     <label style="width:200px;" for="field1"><span>Pick Renewal Date <span class="required">*</span></span>
                                       <input style="width:200px;" type="date" class="input-field"  id="approved_date" name="approved_date" value=""  required />

                                     </label>

                                   </div></center>
                            <div class="modal-footer">
						                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Renew</button>
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
<style type="text/css">
    .form-style-2{
      max-width: 500px;
      padding: 20px 12px 10px 20px;
      font: 13px Arial, Helvetica, sans-serif;
    }
    .form-style-2 label{
      display: block;
      margin: 0px 0px 15px 0px;
    }
    .form-style-2 label > span{
      width: auto;
      font-weight: bold;
      float: left;
      padding-top: 8px;
      padding-right: 5px;
    }
    .form-style-2 span.required{
      color:red;
    }
    .form-style-2 .tel-number-field{
      width: 40px;
      text-align: center;
    }
    .form-style-2 input.input-field, .form-style-2 .select-field{
      width: 86%;
    }
    .form-style-2 input.input-field,
    .form-style-2 .tel-number-field,
    .form-style-2 .textarea-field,
     .form-style-2 .select-field{
      box-sizing: border-box;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      border: 1px solid #C2C2C2;
      box-shadow: 1px 1px 4px #EBEBEB;
      -moz-box-shadow: 1px 1px 4px #EBEBEB;
      -webkit-box-shadow: 1px 1px 4px #EBEBEB;
      border-radius: 3px;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      padding: 7px;
      outline: none;
    }
    .form-style-2 .input-field:focus,
    .form-style-2 .tel-number-field:focus,
    .form-style-2 .textarea-field:focus,
    .form-style-2 .select-field:focus{
      border: 1px solid #0C0;
    }
    .form-style-2 .textarea-field{
      height:100px;
      width: 55%;
    }
    .form-style-2 input[type=submit],
    .form-style-2 input[type=button]{
      border: none;
      padding: 8px 15px 8px 15px;
      background: #FF8500;
      color: #fff;
      box-shadow: 1px 1px 4px #DADADA;
      -moz-box-shadow: 1px 1px 4px #DADADA;
      -webkit-box-shadow: 1px 1px 4px #DADADA;
      border-radius: 3px;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
    }
    .form-style-2 input[type=submit]:hover,
    .form-style-2 input[type=button]:hover{
      background: #EA7B00;
      color: #fff;
    }
</style>
<script>
$('#renew').on('show.bs.modal',function(event){
    var button = $(event.relatedTarget)
    var rid = button.data('rid')





    console.log('modal open');

    var modal = $(this)



    modal.find('.modal-body #request_id').val(rid)

    });



</script>
