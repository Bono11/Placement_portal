<?php

session_start();

if (empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
}

require_once("../db.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Placement Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


</head>

<body class="hold-transition skin-green sidebar-mini" style="background-color:#ecf0f5">
  <div class="wrapper">

    <?php

    include 'header.php';

    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="margin-left: 0px;">

      <section id="candidates" class="content-header">
        <div class="container">
          <div class="row">
            <div class="col-md-3 ">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Welcome <b>Admin</b></h3>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <!-- <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li> -->
                    <li><a href="active-jobs.php"><i class="fa fa-briefcase"></i> Active Drives</a></li>
                    <li><a href="applications.php"><i class="fa fa-address-card-o"></i> Students Profile</a></li>
                    <!-- <li><a href="companies.php"><i class="fa fa-building"></i> Drives</a></li> -->
                    <li><a href="companies.php"><i class="fa fa-arrow-circle-o-right"></i> Co - Ordinators</a></li>
                    <li class="active"><a href="queries.php"><i class="fa fa-arrow-circle-o-right"></i> Queries</a></li>
                    <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-9 bg-white padding-2">

              <h3>TCS placements</h3>
              <div class="row margin-top-20">
                <div class="col-md-12">
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                    <thead>
                                            <th>For the past three years:</th>
                                        </thead>
                                    <thead>
                                            <th>Student Name</th>
                                            <th>Student Email</th>
                                            <th>Company Name</th>
                                            <th>Role</th>
                                            <th>CTC</th>
                                            <th>Date of placement</th>
                                         



                                        </thead>
                      <tbody>
                                        <?php
                                        // selecting student record via option 
                                        // fetching placed students from placed table &user table

                                        //CAHNGE THIS TO PLACE OR NOT(0 OR 1)
                                        // STATUS = 2 MEANS IT IS PLACED , ELSE NOT YET PLACED IN IT
                                        $sql = "select * from users inner join apply_job_post INNER JOIN job_post where users.id_user = apply_job_post.id_user AND apply_job_post.id_jobpost = job_post.id_jobpost AND apply_job_post.status = 2 AND year(createdat)>=2021 AND jobtitle='TCS';";
                                        $_SESSION['QUERY'] = $sql;
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {

                                            while ($row = $result->fetch_assoc()) {


                                        ?>
                                                <tr>
                                                    <td><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['jobtitle']; ?></td>
                                                    <td><?php echo $row['experience']; ?></td>
                                                    <td><?php echo $row['minimumsalary']; ?></td>
                                                    <td><?php echo $row['createdat']; ?></td>

                                                </tr>


                                        <?php

                                            }
                                        }

                                        ?>
                                    </tbody>
                    </table>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-md-9 bg-white padding-2">

<h3>Expensive package</h3>
<div class="row margin-top-20">
  <div class="col-md-12">
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
      <thead>
                              <th>[Top 3]</th>
                          </thead>
                      <thead>
                      <th style="width:20%;">Company Name</th>
                                        <th style="width:20%;">Role</th>
                                        <th style="width:20%;">CTC</th>



                          </thead>
                          <tbody>
                                        <?php
                                        // selecting student record via option 
                                        // fetching placed students from placed table &user table

                                        //CAHNGE THIS TO PLACE OR NOT(0 OR 1)
                                        // STATUS = 2 MEANS IT IS PLACED , ELSE NOT YET PLACED IN IT
                                        // $sql = "select * from users inner join apply_job_post INNER JOIN job_post where users.id_user = apply_job_post.id_user AND apply_job_post.id_jobpost = job_post.id_jobpost AND apply_job_post.status = 2;";
                                        $sql = "select * from job_post order by minimumsalary desc limit 3;";
                                        $_SESSION['QUERY'] = $sql;
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {

                                            while ($row = $result->fetch_assoc()) {


                                        ?>
                                                <tr>
                                                    <td><?php echo $row['jobtitle']; ?></td>
                                                    <td><?php echo $row['experience']; ?></td>
                                                    <td><?php echo $row['minimumsalary']; ?></td>


                                                </tr>


                                        <?php

                                            }
                                        }

                                        ?>
                                    </tbody>
      </table>
    </div>
  </div>
</div>
<h3>Companies on campus in 2020</h3>
<div class="row margin-top-20">
  <div class="col-md-12">
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
      <thead>
                          </thead>
                      <thead>
                      <th style="width:20%;">Company Name</th>
                    <th style="width:20%;">Role</th>
                    <th style="width:20%;">CTC</th>


                          </thead>
                          <tbody>
                    <?php
                    // selecting student record via option 
                    // fetching placed students from placed table &user table

                    //CAHNGE THIS TO PLACE OR NOT(0 OR 1)
                    // STATUS = 2 MEANS IT IS PLACED , ELSE NOT YET PLACED IN IT
                    $sql = "select * from job_post where year(createdat) = 2020;";
                    $_SESSION['QUERY'] = $sql;
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {


                    ?>
                            <tr>
                                <td><?php echo $row['jobtitle']; ?></td>
                                <td><?php echo $row['experience']; ?></td>
                                <td><?php echo $row['minimumsalary']; ?></td>


                            </tr>


                    <?php

                        }
                    }

                    ?>
                </tbody>
      </table>
    </div>
  </div>
</div>

<h3>Candidates eligible for Mercedes</h3>
<div class="row margin-top-20">
  <div class="col-md-12">
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
      <thead>
          
                          </thead>
                          <thead>
                                            <th>Student Name</th>
                                            <th>Student Email</th>
                                         
                                            <th>Current CTC</th>
                                      
                                         



                                        </thead>
                      <tbody>
                                        <?php
                                        // selecting student record via option 
                                        // fetching placed students from placed table &user table

                                        //CAHNGE THIS TO PLACE OR NOT(0 OR 1)
                                        // STATUS = 2 MEANS IT IS PLACED , ELSE NOT YET PLACED IN IT
                                        $sql = "select * from users where CTC<=4000000 and hsc>=80 and ssc>=80 and ug>=80 and pg>=80;";
                                        $_SESSION['QUERY'] = $sql;
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {

                                            while ($row = $result->fetch_assoc()) {


                                        ?>
                                                <tr>
                                                    <td><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></td>
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['CTC']; ?></td>
                                                

                                                </tr>


                                        <?php

                                            }
                                        }

                                        ?>
                                    </tbody>
      </table>
    </div>
  </div>
</div>
</div>
          </div>
        </div>
      </section>

      <div class="modal modal-success fade" id="modal-success">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Job Title</h4>
            </div>
            <div class="modal-body">
              <h3><b>Created On</b></h3>
              <p>24/04/2017</p>
              <br>
              <h3><b>Company Name</b></h3>
              <p>XYX Private Limited</p>
              <br>
              <h3><b>Company Email</b></h3>
              <p>test@test.com</p>
              <br>
              <h3><b>Location</b></h3>
              <p>India</p>
              <br>
              <h3><b>Application Message</b></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


    </div>
    <!-- /.content-wrapper -->

    <!-- <footer class="main-footer" style="margin-left: 0px;">
      <div class="text-center">
        <strong>Copyright &copy; 2022 <a href="learningfromscratch.online">Placement Portal</a>.</strong> All rights
        reserved.
      </div>
    </footer> -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../js/adminlte.min.js"></script>

  <script>
    $(function() {
      $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
      });
    });
  </script>
</body>

</html>