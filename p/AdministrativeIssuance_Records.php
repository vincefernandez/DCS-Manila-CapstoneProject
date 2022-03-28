<?php
include_once('../app/class.php');
session_start();
$fullname = $_SESSION['FullName'];
if ($_SESSION['Account_Type'] !== 'Admin'){

    header('location: ../p/403.php');
  }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Administrator</title>

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
    <?php
$student->DeleteAdministrativeIssuanceRecords();
?>
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
                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                        Profile
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header"><?php echo " $fullname"; ?></span>
                        <div class="dropdown-divider"></div>
                        <a href="../p/profilepage.php" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> Profile

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> Settings

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="../app/logout.php" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> Logout

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
                        <a href="../p/profilepage.php" class="d-block"><?php echo $fullname; ?></a>
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

               <li class="nav-header">Administrator</li>
                        <!-- <li class="nav-item">
                            <a href="Administrator.php" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Add Accounts

                                </p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="AccountList.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Accounts List
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Receiving, Routing And Mailing
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="AdministrativeIssuance_Records.php" class="nav-link active">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Administrative Issuance
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="CavRecords.php" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Certificate, Authentication and Verification
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Appointment and Clearance and 201 Files
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tree"></i>
                                <p>
                                    Numerical
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="Numerical-Communications.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Communication</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../UI/icons.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Others</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="../widgets.html" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Manage Queuing
                                    <!-- <span class="right badge badge-danger">New</span> -->
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
                            <!-- <a href='../acc/AdministrativeIssuance.php'><button class="btn btn-primary">Add Record</button></a> -->
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="AdministrativeIssuance.php">Add Record</a></li> -->
                                <li class="breadcrumb-item active">Administrative Issuance Records</li>
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
                                <th>Action</th>
                                <th>Control Number</th>
                                <th>Memorandum Number</th>

                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Middle Name</th>
                                <th>Suffix</th>
                                <th>Document Type</th>
                                <th>Date</th>

                                <th>File</th>







                            </tr>
                        </thead>

                        <tbody>
                            <?php $student->DisplayAdministrativeIssuanceRecordsAdmin() ?>
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