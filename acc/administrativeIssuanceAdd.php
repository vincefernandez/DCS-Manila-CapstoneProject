<?php
include_once('../app/class.php');
include_once('../template/header.php');
$ID = $_GET['Add'];
print_r($ID);
?>


<body class="hold-transition sidebar-mini">
    <?php $student->UpdateAdministrativeIssuance(); ?>
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
                    <a href="Administrator.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
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

                        <li class="nav-header">
                            <h1 class="small">Administrative Issuance</h1>
                        </li>
                        <li class="nav-item">
                            <a href="Administrativeissuancelist.php" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    All Records
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="AdministrativeIssuance.php" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Add Records
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
                            <h1>Add record</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="Administrativeissuancelist.php">All Records</a></li>
                                <li class="breadcrumb-item active">Edit record</li>
                            </ol>
                        </div>
                    </div>
                </div>

            </section>

            <!-- Main content -->


            <!-- START OF ADD RECORD-->
            <section class="add-record-flex-section">
                <div class="container-add-record">

                    <form action="AdministrativeIssuanceAdd.php" method="post" enctype="multipart/form-data">
                        <?php if (isset($_GET['Add'])) {

                            $Edit = $_GET['Add'];
                            $getUsers = $pdo->prepare("SELECT * FROM filesrecord where Files_ID =$Edit");
                            $getUsers->execute();
                            $users = $getUsers->fetchAll();
                            foreach ($users as $user)
                        ?>


                            <div class="user-details-add-record">
                                <div class="input-box-add-record">
                                    <span class="add-record-details">Control number</span>
                                    <input type="hidden" name="ID" value="<?php echo $ID?>">
                                    <input type="text" name="Control_Number" value="<?php echo "$user[Control_Number]"; ?>">
                                </div>

                                <div class="input-box-add-record">
                                    <span class="add-record-details">Memorandum number</span>
                                    <input type="text" name="Memorandum_Number" value="<?php echo "$user[Memorandum_Number]"; ?>">
                                </div>

                            </div>
                            <div class="user-details-add-record">
                                <div class="input-box-add-record">
                                    <span class="add-record-details ">Document Status</span>
                                    <select class="select-for-release form-control" name="Document_Status">
                                        <option disabled><?php echo "$user[Document_Status]"; ?> </option>
                                        <option value="Active">Active</option>
                                        <option value="Not-Active">Not Active</option>
                                    </select>
                                </div>
                                <!--END OF DIV-->
                                <div class="input-box-add-record">
                                    <span class="add-record-details ">For release</span>
                                    <select class="select-for-release form-control" name="Purpose">
                                        <option disabled><?php echo "$user[Purpose]"; ?> </option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <!--END OF DIV-->
                            </div>
                            <div class="user-details-add-record">
                                <div class="input-box-add-record">
                                    <span class="add-record-details">Date</span>
                                    <input type="text" name="Date" value="<?php echo Date('Y-m-d h-i-s') ?>" readonly>
                                </div>

                            </div>

                            <div class="button-for-uploads">
                                <button class="add-record-button rounded-add-record-button" type="submit" value="submit">Reset</button>
                                <button class="add-record-button rounded-add-record-button" type="submit" name="AdministrativeIssuanceUpdate">Submit</button>
                            </div>
                </div>

                </form>
            <?php } ?>
            </section>

        </div>
        <!--END OF CONTAINER-->

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


    <?php
    include_once('../template/footer.php');
    ?>
    <script>
        if (typeof window.history.pushState == 'function') {
            window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF ']; ?>');
        }
    </script>
</body>

</html>