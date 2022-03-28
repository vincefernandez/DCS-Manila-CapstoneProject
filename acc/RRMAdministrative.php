<?php
include_once('../app/class.php');
session_start();
$fullname = $_SESSION['FullName'];
if ($_SESSION['Account_Type'] !== 'RRMElementary') {

    header('location: ../p/403.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Receiving Routing and Mailing</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <!-- ADD YOUR CSS HERE -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

</head>
<style>
    #example_filter {
        float: right !important;
    }
</style>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->


                <!-- Messages Dropdown Menu -->

                <!-- Notifications Dropdown Menu -->

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                        Profile
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header"><?php echo $fullname; ?></span>
                        <div class="dropdown-divider"></div>
                        <a href="../p/profilepage.php" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Profile

                        </a>

                        <div class="dropdown-divider"></div>
                        <a href="../app/logout.php" class="dropdown-item">
                            <!-- <i class="fas fa-file mr-2"></i> -->
                            <i class="fas fa-sign-out-alt mr-2"> </i>Logout

                        </a>

                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <div href="../index3.html" class="brand-link">
                <img src="../dist/img/dcslogo.png" alt="Record Services Manila" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
                <h6 class="brand-text font-weight-light h6">
                    Record Services Manila
                </h6>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php $student->view1()?>" class="img-circle elevation-2" alt="User Image" />
                    </div>
                    <div class="info">
                        <a href="../p/profilepage.php" class="d-block"><?php echo $fullname ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <!-- <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
                        </div>
                    </div>
                </div> -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-header">Receiving Routing and Mailing</li>
                        <li class="nav-item">
                            <a href="RRMElementaryQueueing.php" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Queuing
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="RRMlist.php" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    All Records
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="RRMAdministrative.php" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Administrative Issuance
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="CAVRRM.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Certification Authentication Verification
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#NotYetDone" class="nav-link">
                                <i class="nav-icon fas fa-tree"></i>
                                <p>
                                    Numerical
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="RRMNumerical.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Communication</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="RRMNumericalOthers.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Others</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="201FilesRRM.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Appointment and Clearance / 201 FIles
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>

            </div>

        </aside>


        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <!-- Change This -->
                            <a href='../acc/RRM.php'><button class="btn btn-primary">Add Records</button></a>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="RRM.php">Add Record</a></li> -->
                                <li class="breadcrumb-item active">All Records</li>
                            </ol>
                        </div>
                    </div>
                </div>

            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid table-responsive">
                    <table id="example" class="table table-bordered dt-responsive" style="width:100%">
                        <thead>
                            <tr>


                                <th>Control Number</th>
                                <th>Memorandum Number</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Middle Name</th>
                                <th>Suffix</th>
                                <th>Document Type</th>
                                <!-- <th>Release Number</th> -->


                                <th>File</th>
                                <th>Date</th>



                            </tr>
                        </thead>

                        <tbody>
                            <?php $student->DisplayAdministrativeIssuanceRecordsRRM() ?>
                        </tbody>
                    </table>
                </div>
            </section>

        </div>


        <footer class="main-footer">
            <!-- <div class="float-right d-none d-sm-block"><b>Version</b> 3.2.0</div> -->
            <strong>Copyright &copy; 2014-2021
                <a href="#">Cerberus</a>Capstone Project</strong> All rights reserved.
        </footer>


        <aside class="control-sidebar control-sidebar-dark">
            <div>
                Anything ADDED HERE
            </div>
        </aside>

    </div>

    <?php include_once('../template/footer.php'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({
                scrollCollapse: true,
                scrollY: 500,
                scrollX: true,
                "processing": true,
                fixedHeader: true,
                "ordering": false,
                // "ajax": "../app/AllRecords.php",
                // "columns": [{
                //         "data": "Control_Number"
                //     },
                //     {
                //         "data": "First_Name"
                //     },
                //     {
                //         "data": "Last_Name"
                //     },
                //     {
                //         "data": "Middle_Name"
                //     },
                //     {
                //         "data": "Suffix"
                //     },
                //     {
                //         "data": "Document_Type"
                //     },
                //     {
                //         "data": "Release_Number"
                //     },
                //     {
                //         "data": "Source"
                //     },
                //     {
                //         "data": "Document_Status"
                //     },
                //     {
                //         "data": "Purpose"
                //     },
                //     {
                //         "data": "Classification_Number"
                //     },
                //     {
                //         "data": "District"
                //     },
                //     {
                //         "data": "Academic"
                //     },
                //     {
                //         "data": "Year"
                //     },
                //     {
                //         "data": "Grade_Level"
                //     },
                //     {
                //         "data": "CAV_ID"
                //     },
                //     {
                //         "data": "Date_Administrative"
                //     },
                //     {
                //         "data": "Memorandum_Number"
                //     },
                //     {
                //         "data": "File"
                //     },
                //     {
                //         "data": "Release_By"
                //     },
                //     {
                //         "data": "Received_By"
                //     },
                //     {
                //         "data": "Date_Received"
                //     },
                //     {
                //         "data": "Photo"
                //     },
                //     {
                //         "data": "Date"
                //     },


                // ]
            });
        });


        let table = document.getElementById('example');
        setInterval(function() {
            table.ajax.reload();
        }, 30000);
    </script>
</body>

</html>