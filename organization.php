
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
            <li class="active treeview">
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
            Organization
            <small>Dashboard</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            	<div class="box-header">
              <form method="post" action="export.php">
                  <input type="submit" name="excel2" class="btn btn-success" value="EXCEL" />
                  
               </form>
                  <h3 class="box-title"></h3>
                  <div class="pull-right">
                      <button class="btn btn-success" data-toggle="modal"
                       data-target="#add_organization">Add New Organization</button>
                  </div>
                </div><!-- /.box-header -->
              <div class="box">
                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Organization Name</th>
                        <th>AG Registration</th>
                        <th>Office Space Address</th>
                        <th>Previous Activity</th>
                        <th>Action</th>
                      </tr>
                    </thead>
					<?php

						require 'connection/connection.php';


						$sql = "SELECT * FROM organization ORDER BY id";
						$result = mysqli_query($conn, $sql);

 					?>
                    <tbody>
                    	<?php while($row=mysqli_fetch_assoc($result)){ ?>
                    <tr>

                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['organization_name']; ?></td>
                        <td><?php echo $row['ag_registration_no']; ?></td>
                        <td><?php echo $row['office_space_address']; ?></td>
                        <td><?php echo $row['previous_activities']; ?></td>


                       <td>
                         <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"
                            class="btn btn-warning"
                            data-target=#edit data-id="<?php echo $row['id']; ?>"  data-region="<?php echo $row['region']; ?>"
                            data-organization_name="<?php echo $row['organization_name']; ?>"   data-ag_registration_no="<?php echo $row['ag_registration_no']; ?>"
                            data-office="<?php echo $row['office_space_address']; ?>"   data-previous_activities="<?php echo $row['previous_activities']; ?>">
                         <span class="glyphicon glyphicon-edit"></span> Edit</a> ||
         							   <a href="#delete<?php echo $row['id']; ?>" data-toggle="modal"
                           class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash"></span> Delete</a>
                        <a href="organizationDetails.php?id=<?php echo $row['id']; ?>" data-toggle="modal"
                          class="btn btn-primary">
                       <span class="glyphicon glyphicon-eye-open"></span> Details</a>
                      </td>

                                  <!-- <td><a href="editperson.php<?php echo $row['id']?>" class="btn btn-warning"><i class="icon-pencil icon-large"></i>&nbsp;Edit</a></td>  -->


                    </tr>
                    <!-- Delete  Organisation-->
      						    <div class="modal fade" id="delete<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      						        <div class="modal-dialog">
      						            <div class="modal-content">
      						                <div class="modal-header">
      						                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      						                    <center><h4 class="modal-title" id="myModalLabel">Delete Organization</h4></center>
      						                </div>
      						                <div class="modal-body">
      										<?php
      											$del=mysqli_query($conn,"select * from organization where id='".$row['id']."'");
      											$drow=mysqli_fetch_array($del);
      										?>
      										<div class="container-fluid">
      											<h5><center>Ag. Registration: <strong><?php echo $drow['ag_registration_no']; ?></strong></center></h5>
      						                </div>
      										</div>
      						                <div class="modal-footer">
      						                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
      						                    <a href="deleteOrganization.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
      						                </div>

      						            </div>
      						        </div>
      						    </div>
                      <!-- END Delete Organisation-->


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


      <!-- Modals add organization  -->

        <!--  add organization  -->
      <div class="modal fade" id="add_organization" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-dialog-scrollable " role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title" id="myModalLabel">Add New Organization</h4>
            </div>
          <div class="modal-body">
            <div class="form-style-2">
              <form action="addOrganization.php" method="POST">
                <table >
                  <tbody>
                    <input type="hidden" id="number" name="number"  value=""/>
                    <tr>
                      <td>

                         <label for="field1"><span>Organization Name <span class="required">*</span></span>
                             <input type="text" class="input-field" id="organization_name" name="organization_name" value="" required/>
                         </label>
                      </td>
                      <td>
                       <label for="field1"><span>Ag Registration <span class="required">*</span></span>
                         <input type="text" class="input-field" id="ag_registration_no" name="ag_registration_no" value="" required/>
                       </label>
                     </td>
                   </tr>
                   <tr>
                     <td>
                       <label for="field1"><span>Office Space Address <span class="required">*</span></span>
                         <input type="text" class="input-field" id="office" name="office_space_address" value="" required/>
                       </label>
                     </td>
                     <td>
                      <label for="field1"><span>Previous Activity </span>
                       <input type="text" class="input-field" id="previous_activities" name="previous_activities" value="" />
                      </label>
                    </td>
                   </tr>
                   <tr>
                     <td>
                         <label for="field1"><span>Region <span class="required">*</span></span>

                          <select type="text" class="select-field" id="region" name="region" required>
                           <option disabled selected value> -- select a region  -- </option>
                           <option value="region 1">1</option>;
                           <option value="region 2">2</option>;
                           <option value="region 3">3</option>;
                           <option value="region 4">4</option>;
                           <option value="region 5">5</option>;
                           <option value="region 6">6</option>;
                          </select>
                     </td>
                   </tr>
                   <!-- <tr>
                     <td>
                       <div class="form-style-2-heading">Sponsors </div>
                     </td>
                   </tr>
                   <tr>
                     <td>

                        <label for="field1"><span>Sponsoring Organization Name <span class="required">*</span></span>
                            <input type="text" class="input-field" id="Sponsor_name" name="Sponsor_name" value="" required/>
                        </label>
                     </td>
                     <td>
                      <label for="field1"><span>Country <span class="required">*</span></span>
                        <input type="text" class="input-field" id="country" name="country" value="" required/>
                      </label>
                    </td>
                   </tr> -->
<!-- 
                     <td>
                       <button id="addSponsor" type="button" class="btn btn-info">Add Sponsor</buttom>
                     </td>
                     <tr id="newSponsor">

                     </tr> -->


                    <tr>
                      <td>
                        <div class="form-style-2-heading">Executive Members</div>
                      </td>
                    </tr>


                </tbody>
              </table>
              <table>
                <tbody>

                    <tr id="newRow">

                    </tr>
                    <td>
                      <button id="addRow" type="button" class="btn btn-info">Add</buttom>
                    </td>


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
      <!--  End add organization  -->
      <!-- Edit  organization Modal -->
            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel">Update Organization Details</h4>
            </div>
            <div class="modal-body">


            <form method="POST" action="editOrganization.php">
              <table>
                <tbody>
                  <tr>
                    <input type="hidden" id="orgid" name="id"  value=""/>
                    <td>
                      <div class="form-style-2">
                        <?php

                          require 'connection/connection.php';

                          $sql1 = "SELECT * FROM organization ORDER BY id";
                          $result1 = mysqli_query($conn, $sql1);

                        ?>
                      <label for="field1"><span>Organization Name <span class="required">*</span></span>
                      <select type="text" class="select-field" id="organization_name" name="organization_name" required>
                      <?php  while ($row = mysqli_fetch_array($result1)) {
                           echo "<option value='" . $row['organization_name'] . "'>" . $row['organization_name'].  "--"  .$row['office_space_address'] ."----Donates----". $row['previous_activities']. "</option>";
                       }
                       ?>
                     </select>
                      </div>
                    </td>

                    <td>
                      <div class="form-style-2">
                      <label for="last_name">Ag Registration</label>
                      <input type="text" id="ag_registration_no" name="ag_registration_no"  class="input-field" value="" required/>
                      </div>
                    </td>

                  </tr>

                  <tr>

                    <td>
                      <div class="form-style-2">
                      <label for="dob">Office Address </label>
                      <input type="text" id="office" name="office_space_address"  class="input-field" value="" required/>
                      </div>
                    </td>

                    <td>
                      <div class="form-style-2">
                      <label for="address">Previous Activity </label>
                      <input type="text" id="previous_activities" name="previous_activities"  class="input-field" value="" />
                      </div>
                    </td>

                  </tr>
                  <tr>
                    <td>
                      <div class="form-style-2">
                        <label for="field1"><span>Region <span class="required">*</span></span>
                          <select type="text" class="select-field" id="region" name="region" required>
                          <option disabled selected value> -- select a region  -- </option>
                          <option value="region 1">1</option>;
                          <option value="region 2">2</option>;
                          <option value="region 3">3</option>;
                          <option value="region 4">4</option>;
                          <option value="region 5">5</option>;
                          <option value="region 6">6</option>;
                         </select>
                      </div>
                  </td>
                  </tr>
                </tbody>
              </table>

              <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
              </div>

            </form>
            </div>
            </div>
            </div>
          </div>
            <!-- /.END EDIT Organization -->



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
        .form-style-2-heading{
        	font-weight: bold;
        	font-style: italic;
        	border-bottom: 2px solid #ddd;
        	margin-bottom: 20px;
        	font-size: 15px;
        	padding-bottom: 3px;
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
        var organization_name = button.data('organization_name')
        var ag_registration_no = button.data('ag_registration_no')
        var office = button.data('office')
        var previous_activities = button.data('previous_activities')
        var region = button.data('region')


        var orgid = button.data('id')


        console.log('modal open');

        var modal = $(this)

        modal.find('.modal-body #organization_name').val(organization_name)
        modal.find('.modal-body #ag_registration_no').val(ag_registration_no)
        modal.find('.modal-body #office').val(office)
        modal.find('.modal-body #previous_activities').val(previous_activities)
        modal.find('.modal-body #previous_activities').val(previous_activities)
        modal.find('.modal-body #region').val(region)

        modal.find('.modal-body #orgid').val(orgid)

        });

    </script>
    <script type="text/javascript">

      var $count = 1;
      var $rowCount = 0;
    // add row
      $("#addRow").click(function () {

        var html = '';

        html +=  '<tr id="inputFormRowz">';
        html += ' <td>';
        html += ' <label for="field1"><span>Name <span class="required">*</span></span>';
        html += '<input type="text" class="input-field" id="name" name="name'+$count+'" value="" required/>';
        html += '</label>'  ;
        html += '</td>';
        html +=  ' <td>';
        html +=   ' <label for="field1"><span>Surname <span class="required">*</span></span>';
        html +=    '<input type="text" class="input-field" id="surname" name="surname'+$count+'" value="" required/>' ;
        html +=    '</label>';
        html +=  '</td>';
        html +=  ' <td>';
        html +=   '<label for="field1"><span>Designation <span class="required">*</span></span>';
        html +=   '<input type="text" class="input-field" id="position" name="position'+$count+'" value="" required/>';
        html +=   ' </label>';
        html +=  '</td>';

        html +=  '</tr>';
        html +=  '<tr id="inputFormRow">';
        html +=  '<td>';
        html +=   '<label for="field1"><span>DOB <span class="required">*</span></span>';
        html +=   '<input type="date" class="input-field" id="dob" name="dob'+$count+'" value="" required/>';
        html +=   ' </label>';
        html +=  '</td>';
        html +=  '<td>';
        html +=   '<label for="field1"><span>ID Number <span class="required">*</span></span>';
        html +=   '<input type="text" class="input-field" id="id_number" name="id_number'+$count+'" value="" />';
        html +=   ' </label>';
        html +=  '</td>';
        html +=  '<td>';
        html +=   '<label for="field1"><span>Address <span class="required">*</span></span>';
        html +=   '<input type="text" class="input-field" id="address" name="address'+$count+'" value="" required/>';
        html +=   ' </label>';
        html +=  '</td>';
        html +=  ' <td>';
        html +=  ' <button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
        html +=  ' </td>';
        html +=  '<tr>';

        $count++;
        $rowCount++;
        $("#number").val($rowCount);
          $('#newRow').append(html);

      });
      console.log($rowCount);
      console.log($count);

      // remove row
      $(document).on('click', '#removeRow', function () {
          $('#inputFormRowz').remove() && $(this).closest('#inputFormRow').remove();


            $rowCount--;
            $("#number").val($rowCount);
      });
      /// add Sponsors
      $("#addSponsor").click(function () {

        var html = '';

        html +=  '<tr id="inputFormRowz">';
        html += ' <td>';
        html += '<label for="field1"><span> Organization Name <span class="required">*</span></span>';
        html += ' <input type="text" class="input-field" id="Sponsor_name" name="Sponsor_name" value="" required/>';
        html += ' </label>';
        html += ' <td>';
        html += '<label for="field1"><span>Country <span class="required">*</span></span>';
        html += '<input type="text" class="input-field" id="country" name="country" value="" required/>'
        html += ' </label>';

        html +=  ' </td>';
        html +=  '<tr>';

        $('#newSponsor').append(html);



      });
      console.log($rowCount);
      console.log($count);

      // remove row
      $(document).on('click', '#removeSponsor', function () {



            $rowCount--;
            $("#number").val($rowCount);
      });

    </script>
   </body>
</html>
