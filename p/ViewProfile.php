<?php
include_once('../app/class.php');
// $student->AddAccounts();
session_start();
$Employee_ID = $_SESSION['login'];
// print_r($Employee_ID);

// $student->Fileupload1();
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


    <!-- Modified and overide style -->
    <link rel="stylesheet" href="../dist/css/wyrlo.css">
    <!-- Ions Icon style -->
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

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
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link" onclick="history.back()">Back</a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle" />
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted">
                                        <i class="far fa-clock mr-1"></i> 4 Hours Ago
                                    </p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3" />
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted">
                                        <i class="far fa-clock mr-1"></i> 4 Hours Ago
                                    </p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3" />
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted">
                                        <i class="far fa-clock mr-1"></i> 4 Hours Ago
                                    </p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                        Profile
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">FIRSTNAME LASTNAME</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
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
                        <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">First Name Last Name</a>
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
                        <!-- <li class="nav-header">Dashboard</li>
                        <li class="nav-item">
                            <a href="Administrator.php" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Add Accounts

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="AccountList.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Accounts List

                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Receiving, Routing And Mailing

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Administrative Issuance

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Certificate, Authentication and Verification

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Appointment and Clearance and 201 Files

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
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Others</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Manage Queuing

                                </p>
                            </a>
                        </li> -->
                    </ul>
                </nav>

            </div>

        </aside>


        <div class="content-wrapper">

            <!-- <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">

                            <h1>Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>

            </section> -->

            <!-- Main content -->
            <section class="content">

                <!-- START OF PROFILE PAGE -->
                             <?php
							$Account_ID = $_SESSION['login'];
                            $ID = $_GET['View'];
							$getUsers = $pdo->prepare("SELECT * FROM users_tbl where Employee_No ='$ID'");
							$getUsers->execute();
							$users = $getUsers->fetchAll();
							foreach ($users as $user) {

							?>



                <section class="section-profile-page">
                    <div class="container-fluid-profile-page">
                        <div class="row-profile-page">
                            <div class="col-md-10-profile-page-flex">
                                <div class="col-md-4-profile-page">
                                    <div class="border-bottom-profilepage"></div>
                                    <div class="profile-img-profile-page"><img src="<?php echo "$user[images]";?>"></div>
                                    <div class="button-for-uploads">
                                    <!-- <form method='post' action='profilepage.php' enctype='multipart/form-data'>
                                                <input type='file' name='files[]' multiple />
												<input type='submit' value='Submit' name='Fileupload' />

                                     </form> -->
                                    </div>
                                </div>
                                <div class="col-md-6-profile-page">
                                    <div class="border-bottom-profilepage"></div>
                                    <div class="profile-head-profile-page">
                                        <h5>
                                            Basic information
                                        </h5>
                                        <h6 class="details-profilepage">
                                            Full name:
                                            <span class="info-profile-page"><?php echo "$user[First_Name] $user[Last_Name]"?></span>
                                        </h6>
                                        <!--END OF DETAILS INFO-->
                                        <h6 class="details-profilepage">
                                            Position:
                                            <span class="info-profile-page"><?php echo "$user[Position]"; ?></span>
                                        </h6>
                                        <!--END OF DETAILS INFO-->
                                        <h6 class="details-profilepage">
                                            Section:
                                            <span class="info-profile-page"><?php echo "$user[Section]"; ?></span>
                                        </h6>
                                        <!--END OF DETAILS INFO-->
                                    </div>
                                </div>
                                <!--END OF COLUMN-->
                                <div class="col-md-4-profile-page">
                                    <div class="profile-head-profile-page">
                                        <h5>
                                            Full information
                                        </h5>
                                        <h6 class="details-profilepage">
                                            Employee number:
                                            <span class="info-profile-page"> <?php echo "$user[Employee_No]"; ?></span>
                                        </h6>
                                        <!--END OF DETAILS INFO-->
                                        <h6 class="details-profilepage">
                                            First name:
                                            <span class="info-profile-page"><?php echo "$user[First_Name]"; ?></span>
                                        </h6>
                                        <!--END OF DETAILS INFO-->
                                        <h6 class="details-profilepage">
                                            Middle name:
                                            <span class="info-profile-page"> <?php echo "$user[Middle_Name]"; ?></span>
                                        </h6>
                                        <!--END OF DETAILS INFO-->
                                        <h6 class="details-profilepage">
                                            Last name:
                                            <span class="info-profile-page"><?php echo "$user[Last_Name]"; ?></span>
                                        </h6>
                                        <!--END OF DETAILS INFO-->
                                        <h6 class="details-profilepage">
                                            Suffix:
                                            <span class="info-profile-page"><?php echo "$user[Suffix]"; ?></span>
                                        </h6>
                                        <!--END OF DETAILS INFO-->
                                        <h6 class="details-profilepage">
                                            Date of Birth:
                                            <span class="info-profile-page"><?php echo "$user[Date_Birth]"; ?></span>
                                        </h6>
                                        <!--END OF DETAILS INFO-->
                                        <h6 class="details-profilepage">
                                            Age:
                                            <span class="info-profile-page"> 26</span>
                                        </h6>
                                        <!--END OF DETAILS INFO-->
                                    </div>
                                </div>
                                <div class="col-md-6-profile-page">
                                    <div class="md-6-profile-head-profile-page">
                                        <h6 class="details-profilepage">
                                            Position:
                                            <span class="info-profile-page"><?php echo "$user[Position]"; ?></span>
                                        </h6>
                                        <!--END OF DETAILS INFO-->
                                        <h6 class="details-profilepage">
                                            Employment date:
                                            <span class="info-profile-page"> <?php echo "$user[Employment_Date]"; ?></span>
                                        </h6>
                                        <!--END OF DETAILS INFO-->
                                        <h6 class="details-profilepage">
                                            Email:
                                            <span class="info-profile-page"><?php echo "$user[Email]"; ?></span>
                                        </h6>
                                        <!--END OF DETAILS INFO-->
                                        <h6 class="details-profilepage">
                                            Passowrd:

                                               <span class="info-profile-page"><?php echo "$user[Password]"; ?></span>
                                        </h6>
                                        <!--END OF DETAILS INFO-->
                                        <h6 class="details-profilepage">
                                            Contact number:
                                            <span class="info-profile-page"> <?php echo "$user[Contact_Number]"; ?></span>
                                        </h6>
                                        <!--END OF DETAILS INFO-->
                                        <h6 class="details-profilepage">
                                            Account type:
                                            <span class="info-profile-page"><?php echo "$user[Account_Type]";?></span>
                                        </h6>
                                        <!--END OF DETAILS INFO-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php }?>
                <!-- END OF PROFILE PAGE -->

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

    <script src="../plugins/jquery/jquery.min.js"></script>

    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../dist/js/adminlte.min.js"></script>

    <script>
        if (typeof window.history.pushState == 'function') {
            window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF ']; ?>');
        }
    </script>
</body>

</html>