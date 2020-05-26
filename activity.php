
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
            <li class="treeview">
              <a href="school.php">
                <i class="fa fa-institution"></i>
                <span>School</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>
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
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            	<div class="box-header">
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
                        <th>Organisation ID</th>
                        <th>School ID</th>
                        <th>Support Type</th>
                        <th>Quantity</th>
                        <th>Cost</th>
                        <th>Period</th>
                        <th>Action</th>
                      </tr>
                    </thead>
					<?php

						require 'connection/connection.php';


						$sql = "SELECT school_id, support_type, quantity, cost, period_date, activity.id as id, organization_id,
            organization.organization_name, organization.id as Oid, school.name, school.id as Sid
            FROM activity

            JOIN organization ON
            activity.organization_id = organization.id
            JOIN School ON
            activity.school_id = school.id ";
						$result = mysqli_query($conn, $sql);

 					?>
                    <tbody>
                    	<?php while($row=mysqli_fetch_assoc($result)){ ?>
                    <tr>


                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['organization_name']; ?></td>
                        <td><?php echo $row['name']; ?></td>
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
                           <h5><center>Are you sure you want to <br>Delete</br>  <strong><?php echo $drow['support_type']; ?> ? ?  </div>
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

                         $sql2 = "SELECT * FROM school  ORDER BY id";
                         $result2 = mysqli_query($conn, $sql2);

                       ?>
                      <label for="field1"><span>School Name <span class="required">*</span></span>
                        <select type="text" class="select-field" id="" name="school_id"  required>
                           <option disabled selected value> -- select a school  -- </option>
                          <?php  while ($row = mysqli_fetch_array($result2)) {
                               echo "<option value='" . $row['id'] . "'>" . $row['name'].  "-(code)-"  .$row['sch_code'].  "</option>";
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

                         $sql3 = "SELECT * FROM support_type  ORDER BY id";
                         $result3 = mysqli_query($conn, $sql3);

                       ?>
                      <label for="field1"><span>Support Type <span class="required">*</span></span>
                        <select type="text" class="select-field" id="" name="id"  required>
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
                    <label for="field1"><span>End Date <span class="required">*</span></span>
                     <input type="date" class="input-field" id="edate" name="edate" value="" />
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

                       $sql2 = "SELECT * FROM school  ORDER BY id";
                       $result2 = mysqli_query($conn, $sql2);

                     ?>
                    <label for="field1"><span>School Name <span class="required">*</span></span>
                      <select type="text" class="select-field" id="school_id" name="school_id"  required>
                        <?php  while ($row = mysqli_fetch_array($result2)) {
                             echo "<option value='" . $row['id'] . "'>" . $row['name'].  "-(code)-"  .$row['sch_code'].  "</option>";
                         }
                         ?>
                      </select>
                    </label>
                  </td>
                  <td  colspan="4">
                    <label for="field1"><span>Support Type <span class="required">*</span></span>
                      <input type="text" class="input-field" id="support_type" name="support_type" value="" required/>
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
                  <label for="field1"><span>End Date <span class="required">*</span></span>
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
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Update Resume
                    <span class="label label-success pull-right">95%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Laravel Integration
                    <span class="label label-warning pull-right">50%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked />
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked />
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked />
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked />
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right" />
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
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
