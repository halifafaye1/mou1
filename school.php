
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
            <li class="active treeview">
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
            School
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
                       data-target="#add_school">Add New School</button>
                  </div>
                </div><!-- /.box-header -->
              <div class="box">
                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                   
                        <th>Name</th>
                        <th>School Type</th>
                        <th>School Code</th>
                        <th>Region</th>
                        <th>Cluster</th>
                        <th>District</th>
                        <th>Ward</th>
                        <th>Settlement</th>          
                        <th>Action</th>
                      </tr>
                    </thead>
					<?php

						require 'connection/connection.php';


						$sql = "SELECT * FROM school ORDER BY id";
						$result = mysqli_query($conn, $sql);

 					?>
                    <tbody>
                    	<?php while($row=mysqli_fetch_assoc($result)){ ?>
                    <tr>

                      
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['sch_type']; ?></td>
                        <td><?php echo $row['sch_code']; ?></td>
                        <td><?php echo $row['region']; ?></td>
                        <td><?php echo $row['cluster']; ?></td>
                        <td><?php echo $row['district']; ?></td>
                        <td><?php echo $row['ward']; ?></td>
                        <td><?php echo $row['settlement']; ?></td>


                       <td>
                         

                           

                           
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
                                     <center><h4 class="modal-title" id="myModalLabel">Delete School</h4></center>
                                 </div>
                                 <div class="modal-body">
                         <?php
                           $del=mysqli_query($conn,"select * from school where id='".$row['id']."'");
                           $drow=mysqli_fetch_array($del);
                         ?>
                         <div class="container-fluid">
                           <h5><center>Are you sure you want to <br>delete</br>  <strong><?php echo $drow['name']; ?> ? ?  </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                     <a href="deleteSchool.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
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

      <!-- Modals add/edit/delete school  -->

        <!--  add school  -->
      <div class="modal fade" id="add_school" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title" id="myModalLabel">Add New School</h4>
            </div>
          <div class="modal-body">
            <div class="form-style-2">
              <form action="addSchool.php" method="POST">
                <table>
                  <tbody>
                    <tr>
                       <input type="hidden" id="schid" name="id"  value=""/>
                       <input type="hidden" id="school_name" name="school_name"  value=""/>
                      <td colspan="5">
                        <?php

              						require 'connection/connection.php';


              						$sql = "SELECT * FROM sch_list ORDER BY sid";
              						$result = mysqli_query($conn, $sql);

               					?>
                         <label for="field1"><span>School Name <span class="required">*</span></span>
                           <!-- <input class="input-field" id="name" name="name" list="schoolid" > -->
                               <select class="select-field" id="schoolid">
                                 <?php  while ($row = mysqli_fetch_array($result)) {
                                      echo "<option value='" . $row['sid'] . "'>" . $row['sch_name']."  " .$row['sch_type']."</option>";
                                  }
                                  ?>

                               </select>

                         </label>
                      </td>
                      <td >
                       <label for="field1"><span>School Type <span class="required">*</span></span>
                         <input type="text"   class="input-field" id="sch_type" name="sch_type" value="" readonly/>
                       </label>
                     </td>
                     
                   </tr>
                   <tr>
                     <td style="width:20%">
                      <label for="field1"><span>School Code <span class="required">*</span></span>
                        <input type="text" class="input-field" id="sch_code" name="sch_code" value="" readonly/>
                      </label>
                    </td>

                    <td colspan="5" style="padding-left:60px">
                      <label for="field1"><span>District <span class="required">*</span></span>
                        <input type="text" data-type="district"  class="input-field" id="district" name="district" value="" readonly/>
                      </label>
                    </td>

                   </tr>
                   <tr>
                     <td colspan="3">
                      <label for="field1"><span>Cluster <span class="required">*</span></span>
                       <input type="text" data-type="cluster"  class="input-field" id="cluster" name="cluster" value="" readonly/>
                      </label>
                    </td>


                      <td colspan="5">
                       <label for="field1"><span>Settlement <span class="required">*</span></span>
                        <input type="text" data-type="settlement"  class="input-field" id="settlement" name="settlement" value="" readonly/>
                       </label>
                     </td>


                 </tr>


                 <tr>

                   <td colspan="3">
                    <label for="field1"><span>Ward <span class="required">*</span></span>
                     <input type="text" class="input-field" id="ward" name="ward" value="" readonly/>
                    </label>
                  </td>

                   <td style="width:15%">
                    <label for="field1"><span>Region <span class="required">*</span></span>
                     <input type="text" class="input-field" id="region" name="region" value="" readonly/>
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
      <!--  End add organization  -->
      <!--  Edit school  -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit School</h4>
          </div>
        <div class="modal-body">
          <div class="form-style-2">
            <form action="editSchool.php" method="POST">
              <table>
                <tbody>
                  <tr>

                   <input type="hidden" id="schid" name="schid"  value=""/>
                    <td >
                       <label for="field1"><span>School Name <span class="required">*</span></span>
                         <input type="text" class="input-field" id="name" name="name" value="" />
                       </label>
                    </td>
                    <td>
                     <label for="field1"><span>School Code <span class="required">*</span></span>
                       <input type="text" class="input-field" id="sch_code" name="sch_code" value="" />
                     </label>
                   </td>

                 </tr>
                 <tr>
                   <td>
                     <label for="field1"><span>District <span class="required">*</span></span>
                       <input type="text" class="input-field" id="district" name="district" value="" />
                     </label>
                   </td>
                   <td>
                    <label for="field1"><span>Cluster <span class="required">*</span></span>
                     <input type="text" class="input-field" id="cluster" name="cluster" value="" />
                    </label>
                  </td>
                  <td>
                   <label for="field1"><span>Region <span class="required">*</span></span>
                    <input type="text" class="input-field" id="region" name="region" value="" />
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
    <!--  End edit organization  -->

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
    <link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.min.css" />
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script>
    $('#edit').on('show.bs.modal',function(event){
        var button = $(event.relatedTarget)
        var name = button.data('name')
        var sch_code = button.data('sch_code')
        var district = button.data('district')
        var cluster = button.data('cluster')
        var region = button.data('region')


        var schid = button.data('id')


        console.log('modal open');

        var modal = $(this)

        modal.find('.modal-body #name').val(name)
        modal.find('.modal-body #sch_code').val(sch_code)
        modal.find('.modal-body #district').val(district)
        modal.find('.modal-body #cluster').val(cluster)
        modal.find('.modal-body #region').val(region)

        modal.find('.modal-body #schid').val(schid)

        });
</script>


<script>
$('#schoolid').change(function(){
var name = $(this).val();
console.log(name);
$.ajax({
   type:'POST',
   data:{name:name},
   url:'Ajax.php',
   success:function(data){
       var inputs = data.split('|');
       $('#sch_type').val(inputs[0]);
       $('#sch_code').val(inputs[1]);
       $('#district').val(inputs[2]);
       $('#cluster').val(inputs[3]);
       $('#region').val(inputs[4]);
       $('#ward').val(inputs[5]);
       $('#settlement').val(inputs[6]);
       $('#school_name').val(inputs[7]);
   }
})
});

</script>

   </body>
</html>
