<?php
include_once('../app/class.php');
// $student->AddAccounts();
session_start();
$ID = $_SESSION['ID'];
// print_r($ID);
$Employee_ID = $_SESSION['login'];
$fullname = $_SESSION['FullName'];
// print_r($Employee_ID);
// uniqid();
// echo uniqid();
if ($_SESSION['Account_Type'] == null) {

    header('location: ../p/403.php');
}
$student->Fileupload1();
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
    <link rel="stylesheet" href="../dist/css/wyrlo1.css">
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


            </ul>


            <ul class="navbar-nav ml-auto">

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
                        <span class="dropdown-header"><?php echo $fullname;?></span>
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
                        <img src="<?php $student->view1();?>" class="img-circle elevation-2" alt="User Image" />
                    </div>
                    <div class="info">
                        <a href="../p/profilepage.php" class="d-block"><?php echo $fullname; ?></a>
                    </div>
                </div>


                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    </ul>
                </nav>

            </div>

        </aside>


        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">

                            <li class="nav-item d-none d-sm-inline-block">
                                <i class="fa fa-arrow-left fa-2x" aria-hidden="true" style="cursor:grabbing;" onclick="history.back()"></i>
                                <!-- <a class="nav-link" style="cursor:grabbing;" onclick="history.back()">Back</a> -->
                            </li>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">

                                <li class="breadcrumb-item active"><?php echo $fullname; ?></li>
                            </ol>
                        </div>
                    </div>
                </div>

            </section>

            <!-- Main content -->
            <section class="content">

                <!-- START OF PROFILE PAGE -->
                <?php
                $Account_ID = $_SESSION['login'];
                // $ID = $_GET['View'];
                $getUsers = $pdo->prepare("SELECT * FROM users_tbl where Employee_No ='$Account_ID'");
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
                                        <div class="profile-img-profile-page"><img src="<?php $student->view1(); ?>"></div>
                                        <div class="button-for-uploads1">
                                            <!--CHANGE THIS CLASS DONT GENERALIZE ALL FORM -->
                                            <form method='post' action='profilepage.php' enctype='multipart/form-data'>
                                                <input type='file' name='files[]' class=" text-center" multiple />
                                                <input type='submit' value='Submit' name='Fileupload' />

                                            </form>
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
                                                <span class="info-profile-page"><?php echo "$user[First_Name] $user[Last_Name]" ?></span>
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
                                                <span class="info-profile-page"><?php echo "$user[Account_Type]"; ?></span>
                                            </h6>
                                            <!--END OF DETAILS INFO-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php } ?>
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