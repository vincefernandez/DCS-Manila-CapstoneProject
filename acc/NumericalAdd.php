<?php
include_once('../app/class.php');
include_once('../template/header.php');
// $ID = $_GET['Add'];
// print_r($ID);
session_start();
$fullname = $_SESSION['FullName'];
if ($_SESSION['Account_Type'] !== 'NumericalCommunication' AND ($_SESSION['Account_Type'] !== 'NumericalOthers')) {


    header('location: ../p/403.php');
}
?>

<!DOCTYPE html>
<html lang="en">




<?php
$student->UpdateNumericalRecords();
?>

<body class="hold-transition sidebar-mini fixed-position">
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
                        <img src="<?php $student->view1() ?>" class="img-circle elevation-2" alt="User Image" />
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
                        <li class="nav-header">
                            <h1 class="small">Numerical</h1>
                        </li>
                        <li class="nav-item">
                            <a href="Numericallist.php" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    All Records

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
                                    <a href="NumericallistRecords.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Communication</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="NumericalOthersRecords.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Others</p>
                                    </a>
                                </li>
                            </ul>
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
                            <h1>Add record</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="Numericallist.php">All Records</a></li>
                                <li class="breadcrumb-item active">Edit record</li>
                            </ol>
                        </div>
                    </div>
                </div>

            </section>

            <!-- Main content -->


            <!-- START OF ADD RECORD-->
            <section class="add-record-flex-section content">
                <div class="container-add-record">

                    <form action="NumericalAdd.php" method="POST" enctype="multipart/form-data">
                        <?php if (isset($_GET['Add'])) {
                            $ID = $_GET['Add'];
                            $Edit = $_GET['Add'];
                            $getUsers = $pdo->prepare("SELECT * FROM filesrecord where Files_ID =$Edit");
                            $getUsers->execute();
                            $users = $getUsers->fetchAll();
                            foreach ($users as $user)
                        ?>
                            <div class="user-details-add-record">
                                <div class="input-box-add-record">
                                    <span class="add-record-details">Release number</span>
                                    <input type="hidden" name="ID" value="<?php echo $ID ?>" required>
                                    <input type="text" name="Release_Number" value="<?php echo "$user[Release_Number]"; ?>" required>
                                </div>

                            </div>
                            <!-- <div class="user-details-add-record">
                            <div class="input-box-add-record">
                                <span class="add-record-details">First name</span>
                                <input type="text" name="First_Name" placeholder="Enter First name..">
                            </div>

                            <div class="input-box-add-record">
                                <span class="add-record-details">Middle name</span>
                                <input type="text" name="Middle_Name" placeholder="Enter Middle name..">
                            </div>

                        </div>
                        <div class="user-details-add-record">
                            <div class="input-box-add-record">
                                <span class="add-record-details">Last name</span>
                                <input type="text" name="Last_Name" placeholder="Enter Last name..">
                            </div>

                            <div class="input-box-add-record">
                                <span class="add-record-details">Suffix</span>
                                <input type="text" name="Suffix" placeholder="Enter Suffix..">
                            </div>

                        </div> -->


                            <div class="user-details-add-record">

                                <!--END OF DIV-->
                                <!-- <div class="input-box-add-record">
                                <span class="add-record-details">Document type</span>
                                <input type="text" name="Document_Type" placeholder="Enter Document type..">
                            </div> -->
                                <div class="input-box-add-record">
                                    <span class="add-record-details">Source</span>
                                    <input type="text" name="Source" value="<?php echo "$user[Source]"; ?>">
                                </div>
                                <!--END OF DIV-->
                            </div>
                            <div class="user-details-add-record">
                                <div class="input-box-add-record">
                                    <span class="add-record-details ">Classification Number</span>
                                    <input type="text" name="Classification_Number" value="<?php echo "$user[Classification_Number]"; ?>">
                                </div>
                                <!--END OF DIV-->
                                <div class="input-box-add-record">
                                    <span class="add-record-details ">For release</span>
                                    <select class="select-for-release form-control" name="Purpose">
                                        <option disabled> <?php echo "$user[Source]"; ?></option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <!--END OF DIV-->
                            </div>
                            <div class="user-details-add-record">
                                <div class="input-box-add-record">
                                    <span class="add-record-details">Date</span>
                                    <input type="date" name="Date" value="<?php echo Date('Y-m-d'); ?>" readonly>
                                </div>
                                <!--END OF DIV-->
                            </div>
                            <div class="upload-add-record">
                                <!-- <div class="button-for-uploads">

                                <label class="button-for-select">Select file
                                    <input type="file" name="file" id="file" /></td>
                                </label>
                            </div> -->
                                <div class="button-for-uploads" style="float: right !important;">
                                    <!-- <button class="add-record-button rounded-add-record-button" type="submit" value="submit">Reset</button> -->
                                    <button class="add-record-button rounded-add-record-button" type="submit" name="NumericalUpdate">Submit</button>
                                </div>
                            </div>
                        <?php } ?>
                    </form>
                </div>
                <!--END OF CONTAINER-->
            </section>
        </div>
    </div>




    <aside class="control-sidebar control-sidebar-dark">
        <div>
            Anything ADDED HERE
        </div>
    </aside>

    </div>




    <footer class="main-footer">

        <strong>Copyright &copy; 2021-2022
            <a href="#">Cerberus</a>Capstone Psadasroject</strong> All rights reserved.
    </footer>




    <?php include_once('../template/footer.php'); ?>
</body>

</html>