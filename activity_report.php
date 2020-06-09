<?php
session_start();
?>
 <!--  Header (Page header) -->
 <?php include'header.php';?>
 <!--  sidebar (Page sidebar) -->
 <style type="text/css">
      h4,h5{
        text-align:center;
      }


      @media print {
          .btn-print {
            display:none !important;
		  }
      .hideForm{
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
            <li class="active treeview">
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


    $query=mysqli_query($conn,"SELECT * FROM activity ");

        $row=mysqli_fetch_array($query);

?>
                  <h4><img src="Coat_of_arms_of_The_Gambia.png" alt="" width="15%" height="15%"></h4>
                  <h4><b>MINISTRY OF BASIC AND SECONDARY EDUCATION MOU ACTIVITY REPORT</b> </h4>
                  <h5><b>Address: WILLY THROPE PLACE BANJUL</b></h5>
                  <h5><b>Contact #:	(00220) 4228232 - 4228233 - 4228234 - 4228235</b></h5>
				  <h4><b>ACTIVITY REPORT as of today, <?php echo date("M d, Y h:i a");?></b></h4>

				  <a class = "btn btn-success btn-print" href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i> Print</a>
							<a class = "btn btn-primary btn-print" href = "index.php"><i class ="glyphicon glyphicon-arrow-left"></i> Back to Homepage</a>
        <br>
        <br>

        <form  action=""  method='POST' name='form_filter' class="hideForm" >
        <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                      <?php

                        require 'connection/connection.php';

                        $sql1 = "SELECT * FROM organization  ORDER BY id";
                        $result1 = mysqli_query($conn, $sql1);

                      ?>
                        <select class="form-control" name="value">
                          <option disabled selected value> -- select an organization  -- </option>
                          <?php  while ($row = mysqli_fetch_array($result1)) {
                               echo "<option value='" . $row['id'] . "'>" . $row['organization_name'].  "--"  .$row['office_space_address'] ."---Donates----". $row['previous_activities']. "</option>";
                           }
                           ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                      <?php

                        require 'connection/connection.php';

                        $sql2 = "SELECT * FROM sch_list  ORDER BY sch_name";
                        $result2 = mysqli_query($conn, $sql2);

                      ?>
                        <select class="form-control" name="school">
                          <option disabled selected value> -- select a school  -- </option>
                          <?php  while ($row = mysqli_fetch_array($result2)) {
                               echo "<option value='" . $row['sch_code'] . "'>" . $row['sch_name'].  " --- ". $row['sch_type'].  " --- "  .$row['sch_code'] ." --- region "  . $row['region'].  "</option>";
                           }
                           ?>
                            </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <select class="form-control" name="region">
                          <option disabled selected value> -- select a region  -- </option>
                            <option value="All">All</option>
                            <option value="1">Region 1</option>
                            <option value="2">Region 2</option>
                            <option value="3">Region 3</option>
                            <option value="4">Region 4</option>
                            <option value="5">Region 5</option>
                            <option value="6">Region 6</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                      <input  type="text" class="form-control" placeholder=" From Date" onfocus="(this.type='date')"/>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                      <input  type="text" class="form-control" placeholder=" To Date" onfocus="(this.type='date')"/>
                    </div>
                </div>
            </div>
            <input type='submit' value = 'Filter'>
            </form>

                  <table class="table table-bordered table-striped">
                    <thead>


                      <tr>

                        <th>Organisation Name</th>
                        <th>School Name</th>
                        <th>Region</th>
                        <th>District</th>
                        <th>support Type</th>
                        <th>Quantity</th>
                        <th>Cost</th>
                        <th>Period</th>

                      </tr>


                    </thead>
                    <tbody>

<?php

    $sql =
    "SELECT activity.*,organization.*,sch_list.*,support_type.*,
     activity.id as id,  organization.id as Oid
    FROM activity
    JOIN organization ON
    activity.organization_id = organization.id
    JOIN sch_list ON
    activity.school_id = sch_list.sch_code
    JOIN support_type ON
    activity.support_type1 = support_type.id ";

      if(isset($_POST['value'])&& !isset($_POST['school']) && !isset($_POST['region'])) {

             $org = $_POST['value'];

              //$query = "SELECT * FROM request WHERE approval='Pending'";

              $sql =
              "SELECT activity.*,organization.*,sch_list.*,support_type.*,
               activity.id as id,  organization.id as Oid
              FROM activity
              JOIN organization ON
              activity.organization_id = organization.id
              JOIN sch_list ON
              activity.school_id = sch_list.sch_code
              JOIN support_type ON
              activity.support_type1 = support_type.id
               where organization_id = '$org' ";

               echo $sql;
             }
             elseif (isset($_POST['value'])&& isset($_POST['school']) && !isset($_POST['region'])) {


               $org = $_POST['value'];
               $sch = $_POST['school'];
               $sql =
               "SELECT activity.*,organization.*,sch_list.*,support_type.*,
                activity.id as id,  organization.id as Oid
               FROM activity
               JOIN organization ON
               activity.organization_id = organization.id
               JOIN sch_list ON
               activity.school_id = sch_list.sch_code
               JOIN support_type ON
               activity.support_type1 = support_type.id
                where organization_id = '$org' AND
                school_id ='$sch'
                 ";
                 echo $sql;
             }
             elseif (isset($_POST['value'])&& isset($_POST['school']) && isset($_POST['region'])) {


               $org = $_POST['value'];
               $sch = $_POST['school'];
               $reg = $_POST['region'];
               $sql =
               "SELECT activity.*,organization.*,sch_list.*,support_type.*,
                activity.id as id,  organization.id as Oid
               FROM activity
               JOIN organization ON
               activity.organization_id = organization.id
               JOIN sch_list ON
               activity.school_id = sch_list.sch_code
               JOIN support_type ON
               activity.support_type1 = support_type.id
                where organization_id = '$org' AND
                school_id ='$sch' AND sch_list.region = '$reg'
                 ";
                 echo $sql;
             }
             elseif (!isset($_POST['value'])&& isset($_POST['school']) && !isset($_POST['region'])) {


               $org = $_POST['value'];
               $sch = $_POST['school'];
               $reg = $_POST['region'];
               $sql =
               "SELECT activity.*,organization.*,sch_list.*,support_type.*,
                activity.id as id,  organization.id as Oid
               FROM activity
               JOIN organization ON
               activity.organization_id = organization.id
               JOIN sch_list ON
               activity.school_id = sch_list.sch_code
               JOIN support_type ON
               activity.support_type1 = support_type.id
                where  school_id ='$sch'
                 ";
                 echo $sql;
             }
             elseif (!isset($_POST['value'])&& !isset($_POST['school']) && isset($_POST['region'])) {



               $reg = $_POST['region'];
               $sql =
               "SELECT activity.*,organization.*,sch_list.*,support_type.*,
                activity.id as id,  organization.id as Oid
               FROM activity
               JOIN organization ON
               activity.organization_id = organization.id
               JOIN sch_list ON
               activity.school_id = sch_list.sch_code
               JOIN support_type ON
               activity.support_type1 = support_type.id
                where  sch_list.region ='$reg'
                 ";
                 echo $sql;
             }



         $result = mysqli_query($conn, $sql);

		while($row=mysqli_fetch_array($result)){

?>
                      <tr>
                        <td><?php echo $row['organization_name']; ?></td>
                        <td><?php echo $row['sch_name']; ?></td>
                        <td><?php echo $row['region']; ?></td>
                        <td><?php echo $row['district']; ?></td>
                        <td><?php echo $row['support_type']; ?></td>
                        <td><?php echo $row['quantity'];?></td>
                        <td><?php echo $row['cost']; ?></td>
                        <td><?php echo $row['period_date']; ?></td>

                      </tr>

<?php }?>
                    </tbody>
                    <tfoot>

                      <tr>
                        <th colspan="8"></th>

                      </tr>
                      <tr>
                        <th colspan="5">Prepared by: <span>Planning Department</span></th>
                        <th colspan="3"></th>


                      </tr>

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
