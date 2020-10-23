
 <!--  Header (Page header) -->
 <?php include'header.php';?>
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
            <!-- <li class="treeview">
              <a href="school.php">
                <i class="fa fa-institution"></i>
                <span>School</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li> -->
            <li class="active treeview">
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
            <li class="treeview">
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
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Activity
            <small>Dashboard</small>
          </h1>

            <?php

            if (isset($_GET['status'])) {
                $status = $_GET['status'];
                $result = '<div class="alert alert-success alert-dismissable">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                 Activity has been '.$status.  ' added.
                               </div>';
                echo $result;
            }

            if (isset($_GET['update'])) {
                $status = $_GET['update'];
                $result = '<div class="alert alert-success alert-dismissable">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                 Activity has been '.$status.  ' updated.
                               </div>';
                echo $result;
            }

            if (isset($_GET['delete'])) {
                $status = $_GET['delete'];
                $result = '<div class="alert alert-danger alert-dismissable">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                 Activity has been '.$status.  ' deleted.
                               </div>';
                echo $result;
            }


            ?>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            	<div class="box-header">
              <form method="post" action="export.php">
                  <input type="submit" name="excel" class="btn btn-success" value="EXCEL" />
                 
               </form>
                  <h3 class="box-title"></h3>
                  <div class="pull-right">
                      <button class="btn btn-success" data-toggle="modal"
                       data-target="#add_activity">Add New Activity</button>
                  </div>
                </div><!-- /.box-header -->
              <div class="box">
                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Organisation Name</th>
                        <th>School Name</th>
                        <th>Support Type</th>
                        <th>Quantity</th>
                        <th>Cost</th>
                        <th>Period</th>
                        <th>Action</th>
                      </tr>
                    </thead>
					<?php

						require 'connection/connection.php';


						$sql = "SELECT activity.*,organization.*,sch_list.*,support_type.*,
             activity.id as id,  organization.id as Oid
            FROM activity
            JOIN organization ON
            activity.organization_id = organization.id
            JOIN sch_list ON
            activity.school_id = sch_list.sch_code
            JOIN support_type ON
            activity.support_type1 = support_type.id
            ";
						$result = mysqli_query($conn, $sql);

 					?>
                    <tbody>
                    	<?php while($row=mysqli_fetch_assoc($result)){ ?>
                    <tr>


                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['organization_name']; ?></td>
                        <td><?php echo $row['sch_name']; ?>, <?php echo $row['sch_type']; ?></td>
                        <td><?php echo $row['support_type']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['cost']; ?></td>
                        <td><?php echo $row['period_date']; ?></td>

                       <td>
                         <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal" data-id="<?php echo $row['id']; ?>"
                          data-target="#edit" data-organization_id="<?php echo $row['organization_id']; ?>"
                          data-school_id="<?php echo $row['school_id']; ?>"  data-support_type="<?php echo $row['support_type']; ?>"
                          data-cost="<?php echo $row['cost']; ?>"  data-period_date="<?php echo $row['period_date']; ?>"
                          data-quantity="<?php echo $row['quantity']; ?>"
                          class="btn btn-warning">
                         <span class="glyphicon glyphicon-edit"></span> Edit</a> ||
                         <a href="#delete<?php echo $row['id']; ?>" data-toggle="modal"
                           class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash"></span> Delete</a>
                       </td>

                                  <!-- <td><a href="editperson.php<?php echo $row['id']?>" class="btn btn-warning"><i class="icon-pencil icon-large"></i>&nbsp;Edit</a></td>  -->


                    </tr>
                    <!-- Delete SCHOOL-->
                     <div class="modal fade" id="delete<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                         <div class="modal-dialog">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                     <center><h4 class="modal-title" id="myModalLabel">Delete Activity</h4></center>
                                 </div>
                                 <div class="modal-body">
                         <?php
                           $del=mysqli_query($conn,"select * from activity where id='".$row['id']."'");
                           $drow=mysqli_fetch_array($del);
                         ?>
                         <div class="container-fluid">
                           <h5><center>Are you sure you want to <br>Delete</br>  <strong><?php echo $drow['id']; ?> ? ?  </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                     <a href="deleteActivity.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                 </div>

                             </div>
                         </div>
                     </div>
                     <!-- END Delete SCHOOL-->


                    <?php }   ?>

                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      </div>

      <!-- Modals add/edit/delete activity  -->

        <!--  add activity  -->
      <div class="modal fade" id="add_activity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title" id="myModalLabel">Add New Activity</h4>
            </div>
          <div class="modal-body">
            <div class="form-style-2">
              <form action="addActivity.php" method="POST">
                <table>
                  <tbody>
                    <tr>
                      <td colspan="4">
                        <?php

                          require 'connection/connection.php';

                          $sql1 = "SELECT * FROM organization  ORDER BY id";
                          $result1 = mysqli_query($conn, $sql1);

                        ?>
                         <label for="field1"><span>Organization Name <span class="required">*</span></span>
                           <select type="text" class="select-field" id="organization_id" name="organization_id" required >
                             <option disabled selected value> -- select an organization  -- </option>
                             <?php  while ($row = mysqli_fetch_array($result1)) {
                                  echo "<option value='" . $row['id'] . "'>" . $row['organization_name'].  "--"  .$row['office_space_address'] ."---Donates----". $row['previous_activities']. "</option>";
                              }
                              ?>
                           </select>
                         </label>
                      </td>

                   </tr>
                   <tr>
                     <td colspan="3">
                       <?php

                         require 'connection/connection.php';

                         $sql2 = "SELECT * FROM sch_list  ORDER BY sch_name";
                         $result2 = mysqli_query($conn, $sql2);

                       ?>
                      <label for="field1"><span>School Name <span class="required">*</span></span>

                        <select type="text" class="select-field" id="" name="school_id"  required>
                           <option disabled selected value> -- select a school  -- </option>
                          <?php  while ($row = mysqli_fetch_array($result2)) {
                               echo "<option value='" . $row['sch_code'] . "'>" . $row['sch_name'].  " --- ". $row['sch_type'].  " --- "  .$row['sch_code']. " --- ". $row['region'].  "</option>";
                           }
                           ?>
                        </select>
                        <input type="hidden" name="hidden_school" id="hidden_school" />

                      </label>
                    </td>
                   </tr>
                   <tr>
                     <td colspan="3">
                       <?php

                         require 'connection/connection.php';

                         $sql3 = "SELECT * FROM support_type  ORDER BY id";
                         $result3 = mysqli_query($conn, $sql3);

                       ?>
                      <label for="field1"><span>Support Type <span class="required">*</span></span>
                        <select type="text" class="select-field" id="" name="support_type"  required>
                           <option disabled selected value> -- select a support type  -- </option>
                          <?php  while ($row = mysqli_fetch_array($result3)) {
                               echo "<option value='" . $row['id'] . "'>" . $row['support_type']."</option>";
                           }
                           ?>
                        </select>
                      </label>
                    </td>
                   </tr>
                   <tr>
                     <td>
                      <label for="field1"><span>Quantity <span class="required">*</span></span>
                       <input type="number" class="input-field" id="quantity" name="quantity" value="" required/>
                      </label>
                    </td>

                     <td>
                      <label for="field1"><span>Cost <span class="required">*</span></span>
                       <input type="text" class="input-field" id="cost" name="cost" value="" required/>
                      </label>
                    </td>
                    <td>
                     <label for="field1"><span>Date <span class="required">*</span></span>
                      <input type="date" class="input-field" id="period_date" name="period_date" value="" required/>
                     </label>
                   </td>
                   <td>
                    <label for="field1"><span>End Date </span>
                     <input type="date" class="input-field" id="end_date" name="end_date" value="" />
                    </label>
                  </td>
                   </tr>
                </tbody>
              </table>
           </div>
           <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove">Cancel</button>
            <button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
         </div>
        </div>
      </form>
    </div>
   </div>
  </div>
      <!--  End add activity  -->
      <!--  Edit activity  -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Activity</h4>
          </div>
        <div class="modal-body">
          <div class="form-style-2">
            <form action="editActivity.php" method="POST">
              <table>
                <tbody>
                  <tr>
                     <input type="hidden" id="id" name="id"  value="" />
                    <td colspan="5">
                      <?php

                        require 'connection/connection.php';

                        $sql1 = "SELECT * FROM organization  ORDER BY id";
                        $result1 = mysqli_query($conn, $sql1);

                      ?>
                       <label for="field1"><span>Organization Name <span class="required">*</span></span>
                         <select type="text" class="select-field" id="organization_id" name="organization_id"  required>
                           <?php  while ($row = mysqli_fetch_array($result1)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['organization_name'].  "--"  .$row['office_space_address'] ."---Donates----". $row['previous_activities']. "</option>";
                            }
                            ?>
                         </select>
                       </label>
                    </td>

                 </tr>
                 <tr>
                   <td colspan="3">
                     <?php

                       require 'connection/connection.php';

                       $sql2 = "SELECT * FROM sch_list  ORDER BY sch_name";
                       $result2 = mysqli_query($conn, $sql2);

                     ?>
                    <label for="field1"><span>School Name <span class="required">*</span></span>
                      <select type="text" class="select-field" id="school_id" name="school_id"  required>
                        <?php  while ($row = mysqli_fetch_array($result2)) {
                             echo "<option value='" . $row['sch_code'] . "'>" . $row['sch_name'].  " --- ". $row['sch_type'].  " --- "  .$row['sch_code']. " --- ". $row['region'].  "</option>";
                         }
                         ?>
                      </select>
                    </label>
                  </td>
                  <tr>
                     <td colspan="3">
                       <?php

                         require 'connection/connection.php';

                         $sql3 = "SELECT * FROM support_type  ORDER BY id";
                         $result3 = mysqli_query($conn, $sql3);

                       ?>
                      <label for="field1"><span>Support Type <span class="required">*</span></span>
                        <select type="text" class="select-field" id="" name="support_type"  required>

                          <?php  while ($row = mysqli_fetch_array($result3)) {
                               echo "<option value='" . $row['id'] . "'>" . $row['support_type']."</option>";
                           }
                           ?>
                        </select>
                      </label>
                    </td>
                   </tr>
                 </tr>
                 <tr>
                   <td>
                    <label for="field1"><span>Quantity <span class="required">*</span></span>
                     <input type="number" class="input-field" id="quantity" name="quantity" value="" required/>
                    </label>
                  </td>

                   <td>
                    <label for="field1"><span>Cost <span class="required">*</span></span>
                     <input type="text" class="input-field" id="cost" name="cost" value="" required/>
                    </label>
                  </td>
                  <td>
                   <label for="field1"><span>Date <span class="required">*</span></span>
                    <input type="date" class="input-field" id="period_date" name="period_date" value="" required/>
                   </label>
                 </td>
                 <td>
                  <label for="field1"><span>End Date </span>
                   <input type="date" class="input-field" id="edate" name="edate" value="" />
                  </label>
                </td>
                 </tr>
              </tbody>
            </table>
         </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove">Cancel</button>
          <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
       </div>
      </div>
    </form>
  </div>
 </div>
</div>
    <!--  End edit activity  -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    </script>

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
    $('#edit').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var organization_id = button.data('organization_id')
        var school_id = button.data('school_id')
        var support_type = button.data('support_type')
        var cost = button.data('cost')
        var period_date = button.data('period_date')
        var quantity = button.data('quantity')

        var id = button.data('id')

        console.log('modal open');

        var modal = $(this)

        modal.find('.modal-body #organization_id').val(organization_id)
        modal.find('.modal-body #school_id').val(school_id)
        modal.find('.modal-body #support_type').val(support_type)
        modal.find('.modal-body #cost').val(cost)
        modal.find('.modal-body #period_date').val(period_date)
        modal.find('.modal-body #quantity').val(quantity)

        modal.find('.modal-body #id').val(id)

        });



    </script>

   </body>
</html>
