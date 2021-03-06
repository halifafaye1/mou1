
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
            <li class="treeview">
              <a href="logout.php">
                <i class="fa fa-users"></i>
                <span>Log Out</span>
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


        <?php

                if (isset($_GET['status'])) {
                    $status = $_GET['status'];
                    $result = '<div class="alert alert-success alert-dismissable">
                                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                 Request has been '.$status.  ' added.
                               </div>';
                    echo $result;
                }

                if (isset($_GET['update'])) {
                    $status = $_GET['update'];
                    $result = '<div class="alert alert-success alert-dismissable">
                                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                         Request has been '.$status.  ' updated.
                                       </div>';
                    echo $result;
                }

                if (isset($_GET['delete'])) {
                    $status = $_GET['delete'];
                    $result = '<div class="alert alert-danger alert-dismissable">
                                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                                         Request has been '.$status.  ' deleted.
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
                  <input type="submit" name="export" class="btn btn-success" value="EXCEL" />
               </form>
                  <h3 class="box-title"></h3>
               
                  <div class="pull-right">
                      <button class="btn btn-success" data-toggle="modal"
                       data-target="#add_request">Add New Request</button>
                       
                  </div>
                </div><!-- /.box-header -->
              <div class="box">
                <div style="overflow-x:auto;" class="box-body">
                <form action=""  method='POST' name='form_filter' >
                                <select class="form-control" name="value">
                                    <option value="All">All</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Denied">Denied</option>
                                </select>
                                <br />
                                <button class="btn btn-success" type="submit">Filter</button>
                            </form>
                            <br>
                <table  id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>

                        <!-- <th>Organisation ID</th> -->
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
                        <th>Action</th>
                      </tr>
                    </thead>
					<?php

						require 'connection/connection.php';


						 // query to get all records
             $query = "SELECT request.*,organization.*,organization.id AS Oid,
             request.id AS id
             FROM request
             join organization On
             organization.id = request.organization_id
             ";

						$result = mysqli_query($conn, $query);

            // process form when posted
                if(isset($_POST['value'])) {
                  if($_POST['value'] == 'Pending') {

                      //$query = "SELECT * FROM request WHERE approval='Pending'";

                      $query = " SELECT request.*,organization.*,organization.id AS Oid,
                      request.id AS id
                      FROM request
                      join organization On
                      organization.id = request.organization_id
                      where approval = 'Pending' " ;
                  }
                  elseif($_POST['value'] == 'Approved') {

                      $query = " SELECT request.*,organization.*,organization.id AS Oid,
                      request.id AS id
                      FROM request
                      join organization On
                      organization.id = request.organization_id
                      where approval = 'Approved' " ;
                  }
                  elseif($_POST['value'] == 'Denied'){
                      $query = " SELECT request.*,organization.*,organization.id AS Oid,
                      request.id AS id
                      FROM request
                      join organization On
                      organization.id = request.organization_id
                      where approval = 'Denied' " ;
                  }


                    $result = mysqli_query($conn,$query);
              }



                ?>
<tbody>

                <?php while ($row = mysqli_fetch_assoc($result)){
                  ?>

                <tr>

                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['organization_name']?></td>
                <td><?php echo $row['person_name']?></td>
                <td><?php echo $row['ag_registration_no']?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['telephone']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['file_ref_no']; ?></td>
                <td><?php echo $row['expire']; ?></td>
                <td><?php echo $row['approval']; ?></td>
                <td>
                  <?php
                  if ( 'Not Due'== $row['approval'] || 'Expired'== $row['approval']){
                        echo "<a href='#delete".$row['id']."' data-toggle='modal'
                        class='btn btn-danger'>
                       <span class='glyphicon glyphicon-trash'></span> Delete</a>
                   ";


                  }
                  else{

                    echo "<a href='#edit".$row['id']."' data-toggle='modal'
                      data-target='#edit'  data-id='".$row['id']."'
                      data-organization_id='".$row['organization_id']."' data-person_name='".$row['person_name']."'
                      data-name='".$row['name']."' data-address='".$row['address']."'
                      data-telephone='".$row['telephone']."' data-email='".$row['email']."'
                      data-reference='".$row['file_ref_no']."'  data-date_time='".$row['date_time']."'
                      data-approval='".$row['approval']."' data-ag_registration_no='".$row['ag_registration_no']."'
                       class='btn btn-warning'>
                    <span class='glyphicon glyphicon-edit'></span> Edit</a> ||
                    <a href='#delete".$row['id']."' data-toggle='modal'
                      class='btn btn-danger'>
                    <span class='glyphicon glyphicon-trash'></span> Delete</a>";

                  }
                  ?>


                        <?php if ( $row['approval']!="Approved" ){
                          // echo " || <a  data-toggle='modal'
                          //    class='btn btn-success'disabled>
                          // <span class='glyphicon glyphicon-ok'></span> Approve</a> ";
                        }
                        else{

                          echo "<a href='#approve".$row['id']."' data-toggle='modal'
                             class='btn btn-success'>
                          <span class='glyphicon glyphicon-ok'></span> Approve</a> ";

                        }
                        ?>

                       </td>

                                  <!-- <td><a href="editperson.php<?php echo $row['id']?>" class="btn btn-warning"><i class="icon-pencil icon-large"></i>&nbsp;Edit</a></td>  -->


                    </tr>
                    <!---APPROVAL MODAL---->
                    <div class="modal fade" id="approve<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						        <div class="modal-dialog">
						            <div class="modal-content">
						                <div class="modal-header">
						                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						                    <center><h4 class="modal-title" id="myModalLabel">Approval</h4></center>
						                </div>
						                <div class="modal-body">
          										<?php
          											$app=mysqli_query($conn,"select * from request where id='".$row['id']."'");
          											$drow=mysqli_fetch_array($app);
          										?>
          										<div class="container-fluid">
          											<h5><center>Are you sure you want to Approve this Request for : </center><?php echo $drow['name']; ?></center><strong></strong></h5>
                                </div>



                              <form action="requestContract.php" method="POST" enctype="multipart/form-data">
                                 <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
                                 <input type="hidden" id="id" name="org_id" value="<?php echo $row['organization_id']; ?>">
                                 <center> <div>
                                     <div class="form-style-2">
                                     <label style="width:200px;" for="field1"><span>Date <span class="required">*</span></span>
                                       <input style="width:200px;" type="date" class="input-field"  id="approved_date" name="approved_date" value=""  required />

                                     </label>

                                   </div></center>
             										</div>

						                <div class="modal-footer">
						                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Approve</button>
						                </div>
                          </form>

						            </div>

						        </div>

						    </div>
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
                             <h5><center>Are you sure you want to <br>delete</br></center>  <center><strong><?php echo $drow['name']; ?>  Request ? ?  </center></div>
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

                    <td colspan="4">
                       <label for="field1"><span>Request Name <span class="required">*</span></span>
                         <input type="text" class="input-field" id="name" name="name" value="" required />

                       </label>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="4">
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
                                // $orgid = $_GET['organization_id'];
                            }
                            ?>
                         </select>

                       </label>
                    </td>
                  </tr>

                  <tr>
                    <td >
                       <label for="field1"><span>Person Name <span class="required">*</span></span>
                         <input type="text" class="input-field" id="person_name" name="person_name" value="" required/>

                       </label>
                    </td>

                      <td>
                         <label for="field1"><span>Ag. Registration Number <span class="required">*</span></span>
                           <input type="text" class="input-field" id="id_number" name="id_number" value="" required/>

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
                    <label for="field1"><span>File Reference # <span class="required">*</span></span>
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
                  <td colspan="4">
                     <label for="field1"><span>Request Name <span class="required">*</span></span>
                       <input type="text" class="input-field" id="name" name="name" value="" required readonly/>

                     </label>
                  </td>

                </tr>
                <tr>
                  <td colspan="4">
                     <label for="field1"><span>Organization Name <span class="required">*</span></span>
                       <?php

                         require 'connection/connection.php';

                         $sql1 = "SELECT * FROM organization ORDER BY id";
                         $result1 = mysqli_query($conn, $sql1);



                       ?>
                       <select  type="text" class="select-field" id="organization_id" name="organization_id"  required disabled>
                          <option disabled selected value> -- select an organization  -- </option>
                         <?php  while ($row3 = mysqli_fetch_array($result1)) {
                              echo "<option value='" . $row3['id'] . "'>" . $row3['organization_name'].  "--"  .$row3['ag_registration_no'] . "</option>";
                              // $orgid = $_GET['organization_id'];
                          }
                          ?>
                       </select>
                     </label>
                  </td>
                </tr>
                <tr>
                    <input type="hidden" id="id" name="id"  value=""/>

                    <td >
                       <label for="field1"><span>Person Name <span class="required">*</span></span>
                         <input type="text" class="input-field" id="person_name" name="person_name" value="" required readonly/>

                       </label>
                    </td>

                    <td>
                       <label for="field1"><span>Ag. Registration Number <span class="required">*</span></span>
                         <input type="text" class="input-field" id="ag_registration_no" name="ag_registration_no" value="" required readonly/>

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
                  <label for="field1"><span>File Reference # <span class="required">*</span></span>
                   <input type="text" class="input-field" id="reference" name="file_ref_no" value="" readonly/>
                  </label>
                </td>
               </tr>
               <tr>
                 <td>
                   <label for="field1"><span>Date <span class="required">*</span></span>
                     <input type="date" class="input-field" id="date_time" name="date_time" value="" readonly/>
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
        var person_name = button.data('person_name')
        var id_number = button.data('ag_registration_no')
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
        modal.find('.modal-body #person_name').val(person_name)
        modal.find('.modal-body #ag_registration_no').val(id_number)
        modal.find('.modal-body #address').val(address)
        modal.find('.modal-body #telephone').val(telephone)
        modal.find('.modal-body #email').val(email)
        modal.find('.modal-body #reference').val(reference)
        modal.find('.modal-body #date_time').val(date_time)
        modal.find('.modal-body #approval').val(approval)

        modal.find('.modal-body #id').val(id)

        });

 

   

    </script>
    <!-- <script>  
 $(document).ready(function(){  
      $('#create_excel').click(function(){  
           var excel_data = $('#request').html();  
           var page = "export.php?data=" + excel_data;  
           window.location = page;  
      });  
 });  
 </script> -->


   </body>
</html>
