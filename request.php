
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
            <li class="active treeview">
              <a href="request.php">
                <i class="fa fa-files-o"></i>
                <span>Request</span>
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
                <i class="fa fa-files-o"></i>
                <span>Organisation</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>
            <li class="treeview">
              <a href="school.php">
                <i class="fa fa-files-o"></i>
                <span>School</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>
            <li class="treeview">
              <a href="activity.php">
                <i class="fa fa-files-o"></i>
                <span>Activity</span>
                <span class="label label-primary pull-right"></span>
              </a>
            </li>

            <li class="treeview">
              <a href="report.php">
                <i class="fa fa-files-o"></i>
                <span>Report</span>
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
            Request
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
                       data-target="#add_request">Add New Request</button>
                  </div>
                </div><!-- /.box-header -->
              <div class="box">
                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Organisation ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Telephone</th>
                        <th>Email</th>
                        <th>Reference #</th>
                        <th>Date/Time</th>
                        <th>Approval</th>
                        <th>Action</th>
                      </tr>
                    </thead>
					<?php

						require 'connection/connection.php';


						//$sql = "SELECT * FROM request JOIN organization on request.organization_id = organization.id";

            $sql= " SELECT name, address, telephone, email, file_ref_no, date_time, approval,organization_id,
              request.id as id, organization.organization_name, organization.id as Oid
              FROM request JOIN organization
              ON request.organization_id = organization.id";

						$result = mysqli_query($conn, $sql);

 					?>
                    <tbody>
                    	<?php while($row=mysqli_fetch_assoc($result)){ ?>
                    <tr>

                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['organization_name']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['telephone']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['file_ref_no']; ?></td>
                        <td><?php echo $row['date_time']; ?></td>
                        <td><?php echo $row['approval']; ?></td>

                       <td>
                         <a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"
                           data-target="#edit"  data-id="<?php echo $row['id']; ?>"
                           data-organization_id="<?php echo $row['organization_id']; ?>"
                           data-name="<?php echo $row['name']; ?>" data-address="<?php echo $row['address']; ?>"
                           data-telephone="<?php echo $row['telephone']; ?>" data-email="<?php echo $row['email']; ?>"
                           data-reference="<?php echo $row['file_ref_no']; ?>"  data-date_time="<?php echo $row['date_time']; ?>"
                             data-approval="<?php echo $row['approval']; ?>"
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
                                     <center><h4 class="modal-title" id="myModalLabel">Delete Request</h4></center>
                                 </div>
                                 <div class="modal-body">
                         <?php
                           $del=mysqli_query($conn,"select * from request where id='".$row['id']."'");
                           $drow=mysqli_fetch_array($del);
                         ?>
                         <div class="container-fluid">
                           <h5><center>Are you sure you want to <br>delete</br>  <strong><?php echo $drow['name']; ?> ? ?  </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                     <a href="deleteRequest.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
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

      <!-- Modals add/edit/delete request  -->


      <!--  add request  -->
    <div class="modal fade" id="add_request" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel">Add New Request</h4>
          </div>
        <div class="modal-body">
          <div class="form-style-2">
            <form action="addRequest.php" method="POST">
              <table>
                <tbody>
                  <tr>
                    <td>
                       <label for="field1"><span>Organization Name <span class="required">*</span></span>
                         <?php

                           require 'connection/connection.php';

                           $sql1 = "SELECT * FROM organization ORDER BY id";
                           $result1 = mysqli_query($conn, $sql1);



                         ?>
                         <select type="text" class="select-field" id="organization_id" name="organization_id"  required>
                            <option disabled selected value> -- select an organization  -- </option>
                           <?php  while ($row3 = mysqli_fetch_array($result1)) {
                                echo "<option value='" . $row3['id'] . "'>" . $row3['organization_name'].  "--"  .$row3['ag_registration_no'] . "</option>";
                                 $orgid = $_GET['organization_id'];
                            }
                            ?>
                         </select>

                       </label>
                    </td>
                    <td>
                       <label for="field1"><span>Person Name <span class="required">*</span></span>
                         <input type="text" class="input-field" id="name" name="name" value="" required/>

                       </label>
                    </td>

                 </tr>
                 <tr>
                   <td>
                     <label for="field1"><span>Address <span class="required">*</span></span>
                       <input type="text" class="input-field" id="address" name="address" value="" required/>
                     </label>
                   </td>
                   <td>
                    <label for="field1"><span>Telephone <span class="required">*</span></span>
                     <input type="tel" class="input-field" id="telephone" name="telephone" value="" required/>
                    </label>
                  </td>
                 </tr>
                 <tr>
                   <td>
                     <label for="field1"><span>Email <span class="required">*</span></span>
                       <input type="text" class="input-field" id="email" name="email" value="" required/>
                     </label>
                   </td>
                   <td>
                    <label for="field1"><span>Reference # <span class="required">*</span></span>
                     <input type="text" class="input-field" id="file_ref_no" name="file_ref_no" value="" required/>
                    </label>
                  </td>
                 </tr>
                 <tr>
                   <td>
                     <label for="field1"><span>Date <span class="required">*</span></span>
                       <input type="date" class="input-field" id="date_time" name="date_time" value=""required />
                     </label>
                   </td>
                   <!-- <td>
                     <label for="field1"><span>End Date <span class="required">*</span></span>
                       <input type="date" class="input-field" id="edate" name="edate" value="" />
                     </label>
                   </td> -->

                   <td>
                    <label for="field1"><span>Approval <span class="required">*</span></span>

                     <select class="select-field" id="approval" name="approval" required>

                        <option value="Pending">Pending </option>
                        <option value="Denied">Denied </option>
                        <option value="Approved">Approved </option>

                     </select>
                    </label>
                  </td>
                 </tr>
                 <!-- <tr style="width:60px"> -->


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
    <!--  End add request  -->
    <!--  edit request  -->
  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Request</h4>
        </div>
      <div class="modal-body">
        <div class="form-style-2">
          <form action="editRequest.php" method="POST">
            <table>
              <tbody>
                <tr>
                    <input type="hidden" id="id" name="id"  value=""/>
                  <td>
                     <label for="field1"><span>Organization ID <span class="required">*</span></span>
                       <?php

                         require 'connection/connection.php';

                         $sql1 = "SELECT * FROM organization ORDER BY id";
                         $result1 = mysqli_query($conn, $sql1);

                       ?>
                       <select type="text" class="select-field" id="organization_id" name="organization_id"  >
                         <?php  while ($row3 = mysqli_fetch_array($result1)) {
                              echo "<option value='" . $row3['id'] . "'>" . $row3['organization_name'].  "--"  .$row3['ag_registration_no'] . "</option>";

                          }
                          ?>
                       </select>

                     </label>
                  </td>

                  <td>
                   <label for="field1"><span>Person Name <span class="required">*</span></span>
                     <input type="text" class="input-field" id="name" name="name" value="" />
                   </label>
                 </td>
               </tr>
               <tr>
                 <td>
                   <label for="field1"><span>Address <span class="required">*</span></span>
                     <input type="text" class="input-field" id="address" name="address" value="" />
                   </label>
                 </td>
                 <td>
                  <label for="field1"><span>Telephone <span class="required">*</span></span>
                   <input type="text" class="input-field" id="telephone" name="telephone" value="" />
                  </label>
                </td>
               </tr>
               <tr>
                 <td>
                   <label for="field1"><span>Email <span class="required">*</span></span>
                     <input type="text" class="input-field" id="email" name="email" value="" />
                   </label>
                 </td>
                 <td>
                  <label for="field1"><span>Reference # <span class="required">*</span></span>
                   <input type="text" class="input-field" id="reference" name="file_ref_no" value="" />
                  </label>
                </td>
               </tr>
               <tr>
                 <td>
                   <label for="field1"><span>Date <span class="required">*</span></span>
                     <input type="date" class="input-field" id="date_time" name="date_time" value="" />
                   </label>
                 </td>
                 <td>
                  <label for="field1"><span>Approval <span class="required">*</span></span>
                    <select class="select-field" id="approval" name="approval" required>

                       <option value="Pending">Pending </option>
                       <option value="Denied">Denied </option>
                       <option value="Approved">Approved </option>

                    </select>
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
  <!--  End edit request  -->

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
        var name = button.data('name')
        var address = button.data('address')
        var telephone = button.data('telephone')
        var email = button.data('email')
        var reference = button.data('reference')
        var date_time = button.data('date_time')
        var approval = button.data('approval')


        var id = button.data('id')


        console.log('modal open');

        var modal = $(this)

        modal.find('.modal-body #organization_id').val(organization_id)
        modal.find('.modal-body #name').val(name)
        modal.find('.modal-body #address').val(address)
        modal.find('.modal-body #telephone').val(telephone)
        modal.find('.modal-body #email').val(email)
        modal.find('.modal-body #reference').val(reference)
        modal.find('.modal-body #date_time').val(date_time)
        modal.find('.modal-body #approval').val(approval)

        modal.find('.modal-body #id').val(id)

        });



    </script>

   </body>
</html>
