
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
          <?php

						require 'connection/connection.php';

            $id = $_GET['id'];
						$sql = "SELECT * FROM organization where id = $id  ";
						$result = mysqli_query($conn, $sql);

 					?>
        <?php while($row=mysqli_fetch_assoc($result)){ ?>
          <h1>
            <?php echo $row['organization_name']; ?>
            <small>DETAILS</small>
            <?php }   ?>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
            	<div class="box-header">
                  <h3 class="box-title">ACTIVITY</h3>
                  <button class="btn btn-success" style="float:right"
              data-toggle="modal"
              data-target="#add_activity"
              type="button" name="button">Add Activity</button>
                </div><!-- /.box-header -->
              <div class="box">
                <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>SUPPORT TYPE</th>
                        <th>COST</th>
                        <th>FROM </th>
                        <th>TO</th>

                      </tr>
                    </thead>
                    <?php

          						require 'connection/connection.php';

                      $id = $_GET['id'];
          						$sql = "SELECT * FROM activity where organization_id = $id  ";
          						$result = mysqli_query($conn, $sql);

           					?>

                    <tbody>
                    	<?php while($row=mysqli_fetch_assoc($result)){ ?>
                    <tr>

                        <!-- <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['person_id']; ?></td>
                        <td><?php echo $row['ag_registration_no']; ?></td>
                        <td><?php echo $row['office_space_address']; ?></td>
                        <td><?php echo $row['previous_activities']; ?></td> -->

                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['support_type']; ?></td>
                        <td><?php echo $row['cost']; ?></td>
                        <td><?php echo $row['period_date']; ?></td>
                        <td><?php echo $row['end_date']; ?></td>





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
      											<h5><center>Ag. Registration: <strong><?php echo $drow['name']; ?></strong></center></h5>
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
            <button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
         </div>
        </div>
      </form>
    </div>
   </div>
  </div>
          </div><!-- /.row -->

          <div class="box-header">
              <h3 class="box-title">EXECUTIVE MEMBERS</h3>
              <button class="btn btn-success" style="float:right"
              data-toggle="modal"
              data-target="#add_person"
              type="button" name="button">Add Executive Member</button>

            </div><!-- /.box-header -->
          <div class="box">
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Designation</th>
                    <th>DOB</th>
                    <th>ID #</th>
                    <th>Action</th>
                  </tr>
                </thead>
      <?php

        require 'connection/connection.php';


        $sql = "SELECT * FROM person where org_id  = $id  ";
        $result = mysqli_query($conn, $sql);

      ?>
                <tbody>
                  <?php while($row=mysqli_fetch_assoc($result)){ ?>
                <tr>

                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['surname']; ?></td>
                    <td><?php echo $row['position']; ?></td>
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['id_number']; ?></td>
                    <td><a href="#edit<?php echo $row['id']; ?>" data-toggle="modal"  data-id="<?php echo $row['id']; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a> ||
                      <a href="#delete<?php echo $row['id']; ?>" data-toggle="modal"
                               class="btn btn-danger">
                            <span class="glyphicon glyphicon-trash"></span> Delete</a></td>

                    <!-- <td>Alhassan</td>
                    <td>Alhassan</td>
                    <td>Houmaini</td>
                    <td>Chairman</td>
                    <td>20/01/86</td>
                    <td>1827192030302929</td> -->


                                                <!-- <td><a href="editperson.php<?php echo $row['id']?>" class="btn btn-warning"><i class="icon-pencil icon-large"></i>&nbsp;Edit</a></td>  -->


                </tr>
                <!-- Delete  Organisation-->
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
                        $del=mysqli_query($conn,"select * from person where id='".$row['id']."'");
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
                  <!-- END Delete Organisation-->

                  <!--Edit  Modal -->
              <div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title" id="myModalLabel">Update Executive Details</h4>
              </div>
              <div class="modal-body">

              <?php
              $edit=mysqli_query($conn,"select * from person where id ='".$row['id']."'");
              $erow=mysqli_fetch_array($edit);
              ?>
              <form method="POST" action="editperson.php?id=<?php echo $erow['id']; ?>">
              <div class="form-style-2">
              <label for="first_name">Name </label>
              <input type="text" id="name" name="name" placeholder="First Name" class="input-field" value="<?php echo $erow['name']; ?>"/>
              </div>

              <div class="form-style-2">
              <label for="last_name">Surname </label>
              <input type="text" id="surname" name="surname" placeholder="Surname" class="input-field" value="<?php echo $erow['surname']; ?>"/>
              </div>

              <div class="form-style-2">
              <label for="last_name">Designation </label>
              <input type="text" id="designation" name="designation" placeholder="designation" class="input-field" value="<?php echo $erow['position']; ?>"/>
              </div>

              <div class="form-style-2">
              <label for="dob">Date of Birth</label>
              <input type="date" id="dob" name="dob" placeholder="DOB" class="input-field" value="<?php echo $erow['dob']; ?>"/>
              </div>

              <div class="form-style-2">
              <label for="address">Identification Number (ID)</label>
              <input type="text" id="id_number" name="id_number" class="input-field" value="<?php echo $erow['id_number']; ?>" />
              </div>
              <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                    </div>

              </form>
              </div>
              </div>
              </div>
              <!-- /.modal -->


                <?php }   ?>

                </tbody>
              </table>


            </div><!-- /.box-body -->

          </div><!-- /.box -->
          <div class="box-header">
              <h3 class="box-title">Reports</h3>
              <button class="btn btn-success" style="float:right"
              data-toggle="modal"
              data-target="#add_report"
              type="button" name="button">Upload Report</button>

            </div><!-- /.box-header -->
          <div class="box">
            <div class="box-body">
              <?php

                require 'connection/connection.php';

                $id = $_GET['id'];
                $sql = "SELECT * FROM report where org_id = $id
                ORDER BY id DESC LIMIT 1";
                $result = mysqli_query($conn, $sql);

              ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>

                    <th>Status</th>
                    <th>Report</th>
                    <th>Title</th>
                    <th>Actions</th>


                  </tr>
                </thead>


                <tbody>
                  <?php while($row=mysqli_fetch_assoc($result)){ ?>
                  <tr>

                    <td>Submitted</td>
                    <td ><strong>Year 1: </strong></td>
                    <td><?php echo $row['report_1']; ?></td>
                    <td><a  href="viewReport.php?id=<?php echo $row['id']; ?>&report=report_1" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> View Report</a> ||
                    <a class="btn btn-danger" href="deleteReport.php?id=<?php echo $row['id']; ?>&report=report_1"
                     data-toggle="modal"><span class="glyphicon glyphicon-trash" ></span> Delete Report</a></td>


                  </tr>
                  <tr>

                    <td>Submitted</td>
                    <td ><strong>Year 2: </strong></td>
                    <td><?php echo $row['report_2']; ?></td>
                    <td><a  href="viewReport.php?id=<?php echo $row['id']; ?>&report=report_2" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> View Report</a> ||
                    <a class="btn btn-danger" href="deleteReport.php?id=<?php echo $row['id']; ?>&report=report_2"
                     data-toggle="modal"><span class="glyphicon glyphicon-trash" ></span> Delete Report</a></td>


                  </tr>
                  <tr>

                    <td>Submitted</td>
                    <td ><strong>Year 3: </strong></td>
                    <td><?php echo $row['report_3']; ?></td>
                    <td><a  href="viewReport.php?id=<?php echo $row['id']; ?>&report=report_3" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> View Report</a> ||
                    <a class="btn btn-danger" href="deleteReport.php?id=<?php echo $row['id']; ?>&report=report_3"
                     data-toggle="modal"><span class="glyphicon glyphicon-trash" ></span> Delete Report</a></td>


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
                          <form action="viewReport.php" method="POST">
                            <input type="hidden" id="rid" name="rid"  value="<?php echo $row['id']; ?>"/>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                    <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                                </div>
                                </form

                            </div>
                        </div>
                    </div>
                    <!-- END Delete Organisation-->
                  <?php }   ?>

              </tbody>
            </thead>
          </table>

        </div><!-- /.box-body -->

      </div><!-- /.box -->
      <div class="box-header">
          <h3 class="box-title">Archives</h3>
          <button class="btn btn-success" style="float:right"
          data-toggle="modal"
          data-target="#add_report"
          type="button" name="button">Previous Report</button>

        </div><!-- /.box-header -->
      <div class="box">
        <div class="box-body">
          <?php

            require 'connection/connection.php';

            $id = $_GET['id'];
            $sql = "SELECT * FROM report where org_id = $id
            ORDER BY id DESC LIMIT 1,99999999";



            $result = mysqli_query($conn, $sql);

          ?>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>

                <th>Status</th>
                <th>Report</th>
                <th>Title</th>
                <th>Actions</th>


              </tr>
            </thead>


            <tbody>
              <?php while($row=mysqli_fetch_assoc($result)){ ?>
              <tr>

                <td>Archive</td>
                <td ><strong>Year 1: </strong></td>
                <td><?php echo $row['report_1']; ?></td>
                <td><a  href="viewReport.php?id=<?php echo $row['id']; ?>&report=report_1" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> View Report</a>


              </tr>
              <tr>

                <td>Archive</td>
                <td ><strong>Year 2: </strong></td>
                <td><?php echo $row['report_2']; ?></td>
                <td><a  href="viewReport.php?id=<?php echo $row['id']; ?>&report=report_2" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> View Report</a>


              </tr>
              <tr>

                <td>Archive</td>
                <td ><strong>Year 3: </strong></td>
                <td><?php echo $row['report_3']; ?></td>
                <td><a  href="viewReport.php?id=<?php echo $row['id']; ?>&report=report_3" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> View Report</a>

              </tr>
              <tr>
                <td colspan="4"><h1>End Of Year 1</h1></td>
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
                      <form action="viewReport.php" method="POST">
                        <input type="hidden" id="rid" name="rid"  value="<?php echo $row['id']; ?>"/>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                            </div>
                            </form

                        </div>
                    </div>
                </div>
                <!-- END Delete Organisation-->
              <?php }   ?>

          </tbody>
        </thead>
      </table>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      </div>
    </div>




      <!--  upload report  -->
    <div class="modal fade" id="add_report" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel">Upload Reports</h4>
          </div>
        <div class="modal-body">
          <div class="form-style-2">
            <form action="addReport.php" method="post" enctype="multipart/form-data">


               <input type="hidden" id="id" name="org_id" value="<?php echo $_GET['id'];?>">




               <label ><span>Report 1 </span>
                <input type="radio" id="report_1" name="report" value="report1">
               </label>

                <label ><span>Report 2 </span>
                 <input type="radio" id="report_2" name="report" value="report2">
                </label>

                 <label ><span>Report 3 </span>
                  <input type="radio" id="report_3" name="report" value="report3">
                 </label>

                 <label for="field1"><span>Report 1 </span>
                  <input type="file" class="input-field" id="report1" name="report_2" value="" required/>
                 </label>

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
    <!--  End upload report  -->

    <div class="modal fade" id="add_person" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
    <h4 class="modal-title" id="myModalLabel">Add Executive Member</h4>
    </div>
    <div class="modal-body">
      <form method="POST" action="addExecutive.php">
      <input type="hidden" id="org_id" name="org_id" class="input-field" value="<?php echo $_GET['id']?>"/>


      <div class="form-style-2">
      <label for="first_name">Name </label>
      <input type="text" id="name" name="name" placeholder="First Name" class="input-field" value=""/>
      </div>

      <div class="form-style-2">
      <label for="last_name">Surname </label>
      <input type="text" id="surname" name="surname" placeholder="Surname" class="input-field" value=""/>
      </div>

      <div class="form-style-2">
      <label for="last_name">Designation </label>
      <input type="text" id="position" name="position" placeholder="designation" class="input-field" value=""/>
      </div>

      <div class="form-style-2">
      <label for="dob">Date of Birth</label>
      <input type="date" id="dob" name="dob" placeholder="DOB" class="input-field" value=""/>
      </div>

      <div class="form-style-2">
      <label for="address">Identification Number (ID)</label>
      <input type="text" id="id_number" name="id_number" placeholder="Identification Number" class="input-field" value="" />
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
        var person_id = button.data('person_id')
        var ag_registration_no = button.data('ag_registration_no')
        var office = button.data('office')
        var previous_activities = button.data('previous_activities')


        var orgid = button.data('id')


        console.log('modal open');

        var modal = $(this)

        modal.find('.modal-body #person_id').val(person_id)
        modal.find('.modal-body #ag_registration_no').val(ag_registration_no)
        modal.find('.modal-body #office').val(office)
        modal.find('.modal-body #previous_activities').val(previous_activities)

        modal.find('.modal-body #orgid').val(orgid)

        });



    </script>
   </body>
</html>
