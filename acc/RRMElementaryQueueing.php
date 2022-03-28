<?php
include_once('../app/class.php');
include_once('../template/header.php');
$student->DeleteFirstRow();
session_start();
$fullname = $_SESSION['FullName'];
if ($_SESSION['Account_Type'] !== 'RRMElementary') {

    header('location: ../p/403.php');
}
?>
<style>
    body {
        height: 100vh !important;
    }

    /* .container {
       height: 100% !important;
    } */
</style>

<body>
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
                        <img src="<?php $student->view1() ?>" class="img-circle elevation-2" alt="User Image" />
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $fullname ?></a>
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
                            <a href="RRMElementaryQueueing.php" class="nav-link active">
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
                            <a href="RRMAdministrative.php" class="nav-link">
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


        <?php
        $student->AddDatabaseToQueeing(); ?>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">

                        <a href='../acc/RRM.php'><button class="btn btn-primary">Add Records</button></a>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="RRMList.php">All Records</a></li> -->
                                <li class="breadcrumb-item active">Add record</li>
                            </ol>
                        </div>
                    </div>
                </div>

            </section>


            <div class="container-fluid ">

                <div class="row">
                    <div class="col-3">
                        <div class="card">
                            <div class="card-header text-center b bg-primary">
                                <p class="lead">Waiting List</p>
                            </div>
                            <div class="card-body" id="Processed">


                            </div>

                            <!-- <p class="badge bg-primary text-center text-wrap" style="width: 6rem;">Window 1</p> -->

                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card bg-light" style="height: 20rem !important;">
                            <div class="card-header text-center b bg-primary">
                                <p class="lead">Now Serving</p>
                            </div>
                            <div class="card-body" id="NowServing">

                                <!-- <a href="#" class="btn btn-primary bottom">Go somewhere</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-header text-center b bg-primary">
                                <p class="lead">Next</p>
                            </div>
                            <div class="card-body" id="Waitinglist">
                                <?php /* $student->DisplayWaitingQue(); */ ?>
                                <p class="badge bg-primary text-wrap" style="width: 6rem;">Window 1</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="d-flex justify-content-center">

                            <div>
                                <a href='RRMElementaryQueueing.php?Delete' class="btn btn-primary text-center" style="text-align: center !important;">Next</a>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- <div class="row" style="text-align:center !important;">
                    <h4 class="btn btn-primary" style="text-align: center !important;">Next</h4>
                </div> -->
            </div>
        </div>
    </div>
    <script>
        function WaitingList() {
            setInterval(function() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("Waitinglist").innerHTML = this.responseText;

                    }
                };
                xhttp.open("GET", "../app/Waitinglist.php", true);
                // xhttp.open("GET", "../app/Processed.php", true);
                xhttp.send();
            }, 1000);


        }
        WaitingList();

        function Processed() {
            setInterval(function() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("Processed").innerHTML = this.responseText;

                    }
                };
                // xhttp.open("GET", "../app/Waitinglist.php", true);
                xhttp.open("GET", "../app/Processed.php", true);
                xhttp.send();
            }, 1000);


        }
        Processed();

        function NowServing() {
            setInterval(function() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("NowServing").innerHTML = this.responseText;

                    }
                };
                // xhttp.open("GET", "../app/Waitinglist.php", true);
                xhttp.open("GET", "../app/NowServing.php", true);
                xhttp.send();
            }, 1000);


        }
        NowServing();

        function RandomQuotes() {
            setInterval(function() {
                const quotes = document.getElementById('Quotes');
                quotes1 = "Awit";
                quotes2 = "awit2";
                quotes3 = "awit3";
                const things = [quotes1, quotes2, quotes3];
                let thing = things[Math.floor(Math.random() * things.length)];

                quotes.innerHTML = thing;
            }, 30000);

        }
        RandomQuotes();
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <?php
    include_once('../p/footer.php');
    ?>