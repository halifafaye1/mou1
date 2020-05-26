<?php
session_start();
?>
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
      </body>
</html>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>
                  	<?php 
                  	include 'connection/connection.php'; 


					$sql="SELECT * FROM organization";

					if ($result=mysqli_query($conn,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount=mysqli_num_rows($result);
					  printf($rowcount);
					  // Free result set
					  mysqli_free_result($result);
					  }
                  	?>
                  		
                  	</h3>
                  <p>Organization</p>
                </div>
                <div class="icon">
                  <i class="glyphicon glyphicon-home"></i>
                </div>
                <a href="organization.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>
                  	<?php 
                  	include 'connection/connection.php'; 


					$sql="SELECT * FROM activity";

					if ($result=mysqli_query($conn,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount=mysqli_num_rows($result);
					  printf($rowcount);
					  // Free result set
					  mysqli_free_result($result);
					  }
                  	?>
                  		
                  	</h3>
                  <p>Activity</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="activity.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>
                  	<?php 
                  	include 'connection/connection.php'; 


					$sql="SELECT * FROM person";

					if ($result=mysqli_query($conn,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount=mysqli_num_rows($result);
					  printf($rowcount);
					  // Free result set
					  mysqli_free_result($result);
					  }
                  	?>
                  		
                  	</h3>     
                  <p>Person</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="person.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>
                  <?php 
                  	include 'connection/connection.php'; 


					$sql="SELECT * FROM school";

					if ($result=mysqli_query($conn,$sql))
					  {
					  // Return the number of rows in result set
					  $rowcount=mysqli_num_rows($result);
					  printf($rowcount);
					  // Free result set
					  mysqli_free_result($result);
					  }
                  	?>


                  </h3>
                  <p>School</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="school.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php include 'footer.php'; ?>          
