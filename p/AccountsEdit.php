<?php
include_once('../app/class.php');
// $student->AddAccounts();
$ID = $_GET['Edit'];

if ($ID === null) {
    echo "";
}
session_start();
$fullname = $_SESSION['FullName'];
if ($_SESSION['Account_Type'] !== 'Admin') {

    header('location: ../p/403.php');
}
// print_r($ID);
$student->UpdateAccounts();
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

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

</head>

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

                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="../p/profilepage.php">
                        <i class="far fa-user"></i>
                        Profile
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header"><?php echo $fullname ?></span>
                        <div class="dropdown-divider"></div>
                        <a href="../p/profilepage.php" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> Profile

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
            <a href="../index3.html" class="brand-link">
                <img src="../dist/img/dcslogo.png" alt="Record Services Manila" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
                <h6 class="brand-text font-weight-light h6">
                    Record Services Manila
                </h6>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php $student->view1()?>" class="img-circle elevation-2" alt="User Image" />
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $fullname?></a>
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
                        <li class="nav-header">Dashboard</li>
                        <li class="nav-item">
                            <a href="Administrator.php" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Add Accounts
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>
                        </li>
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
                            <a href="../widgets.html" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Receiving, Routing And Mailing
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../widgets.html" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Administrative Issuance
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../widgets.html" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Certificate, Authentication and Verification
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../widgets.html" class="nav-link">
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
                                    <a href="../UI/general.html" class="nav-link">
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
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <!-- <h1>Blank Page</h1> -->
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../p/AccountList.php">All Accounts</a></li>
                                <li class="breadcrumb-item active">Edit Accounts Records</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="row">
                    <div class="card col-12">
                        <div class="card-body">

                            <div class="shadow-lg mb-5 bg-body rounded">
                                <div class="card-header bg-secondary mb-3">
                                    <p>Add Account Form</p>
                                </div>


                                <form method="POST" action="AccountsEdit.php">

                                    <?php if (isset($_GET['Edit'])) {

                                        $Edit = $_GET['Edit'];
                                        $getUsers = $pdo->prepare("SELECT * FROM users_tbl where Employee_No = '$Edit'");
                                        $getUsers->execute();
                                        $users = $getUsers->fetchAll();
                                        foreach ($users as $user) {


                                    ?>

                                            <div class="card">
                                                <div class="row" style="background-color:#ffdd99">


                                                    <div class="col-8">
                                                        <div class="mb-3">
                                                            <!-- <label class="form-label">Employee No.</label> -->
                                                            <input type="hidden" class="form-control" name="Employee_No" value="<?php echo "$ID" ?>" />
                                                            <label class="form-label">Employee No.</label>
                                                            <input type="text" class="form-control" name="Employee_No" value="<?php echo "$user[Employee_No]"; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">First Name</label>
                                                            <input type="text" class="form-control" name="First_Name" value="<?php echo "$user[First_Name]"; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Middle Name</label>
                                                            <input type="text" class="form-control" name="Middle_Name" value="<?php echo "$user[Middle_Name]"; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Last Name</label>
                                                            <input type="text" class="form-control" name="Last_Name" value="<?php echo "$user[Last_Name]"; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Suffix</label>
                                                            <input type="text" class="form-control" name="Suffix" value="<?php echo "$user[Suffix]"; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Birth Date</label>
                                                            <input type="text" class="form-control" name="Birth_Date" value="<?php echo "$user[Date_Birth]"; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Age</label>
                                                            <input type="text" class="form-control" name="Age" value=" <?php echo "$user[Age]"; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Position</label>
                                                            <input type="text" class="form-control" name="Position" value="<?php echo "$user[Position]"; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Employment Date</label>
                                                            <input type="text" class="form-control" name="Employment_Date" value="<?php echo "$user[Employment_Date]"; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                                                            <input type="email" class="form-control" name="Email" value="<?php echo "$user[Email]"; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Password</label>
                                                            <input type="password" class="form-control" name="Password" value="<?php echo "$user[Password]"; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Contact Number</label>
                                                            <input type="text" class="form-control" name="Contact_Number" value="<?php echo "$user[Contact_Number]"; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label for="exampleInputEmail1" class="form-label">Account Type</label>
                                                            <select class="form-select form-control" name="Account_Type">
                                                                <option selected disabled><?php echo "$user[Account_Type]"; ?></option>
                                                                <option value="RRMElementary">Receing Routing And Mailing / Elementary</option>
                                                                <option value="RRMHighSchool">Receing Routing And Mailing / High School</option>
                                                                <option value="AdministrativeIssuance">Administrative Issuance</option>
                                                                <option value="CAV">Certification, Authentication and Verification</option>
                                                                <option value="NumericalCommunication">Numerical Files / Communication</option>
                                                                <option value="NumericalOthers">Numerical Files / Others </option>
                                                                <option value="AC">Appointment and Clearances / 201 Files</option>


                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-right">
                                                        <button type="Submit" name="UpdateAccount" class="btn btn-primary">
                                                            Submit
                                                        </button>
                                                        <button type="ResetSubmit" class="btn btn-danger">
                                                            Reset
                                                        </button>
                                                    </div>


                                                </div>
                                            </div>
                            </div>
                            </form>
                    <?php }
                                    } ?>
                        </div>

                    </div>
                </div>
        </div>
        <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block"><b>Version</b> 3.2.0</div>
        <strong>Copyright &copy; 2014-2021
            <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="../dist/js/demo.js"></script> -->
    <script>
        // if (typeof window.history.pushState == 'function') {
        //     window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF']; ?>');
        // }
    </script>
</body>

</html>