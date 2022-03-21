<?php
include_once('../app/class.php');
include_once('AdminHeader.php');
session_start();
// $Account_ID = $_SESSION['login'];
// $student->SessionValidation();
$student->AddRRMRecords();


?>


<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include_once('navbar.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        // include_once('AdminSidebar.php');
        ?>

        <div class="content-wrapper">

            <div class="container-fluid ">

                <div class="row">
                    <div class="col-3">
                        <div class="card">
                            <div class="card-header text-center b bg-success">
                                <p class="lead">Processed</p>
                            </div>
                            <div class="card-body" id="Processed">


                            </div>

                            <p class="badge bg-primary text-center text-wrap" style="width: 6rem;">Window 1</p>

                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card bg-secondary bg-gradient" style="height: 20rem !important;">
                            <div class="card-header text-center b bg-warning">
                                <p class="lead">Now Serving</p>
                            </div>
                            <div class="card-body" id="NowServing">


                            </div>
                            <div class="text-center">
                                <a href="#" class="btn btn-primary  text-center bottom">Proceed</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-header text-center b bg-danger">
                                <p class="lead">Waiting</p>
                            </div>
                            <div class="card-body" id="Waitinglist">
                                <?php /*$student->DisplayWaitingQue();*/ ?>
                                <p class="badge bg-primary text-wrap" style="width: 6rem;">Window 1</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Manage Receiving, routing and mailing</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="AdminAccount.php">Home</a></li>
                                <li class="breadcrumb-item active">Manage R.R.M</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid w-new-style">








                    <div class="row">
                        <div class="col-md-6">
                            <!-- small card -->
                            <div class="small-box bg-secondary">
                                <!-- <div class="inner">
                                    <h2>Add Records</h2>

                                    <p>This will allow you to create an Account for the Employee</p>
                                </div> -->
                                <!-- <div class="icon">
                                    <i class="fas fa-user"></i>
                                </div> -->
                                <button class="small-box-footer btn bg-success w-100 w-new-bg-success" onclick="showForms();">
                                    Add Records <i class="fas fa-arrow-circle-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- small card -->
                            <div class="small-box bg-secondary">
                                <!-- <div class="inner">
                                    <h2>Show All Records</h2>

                                    <p>This will allow you to Show All created accounts for Employee</p>
                                </div> -->
                                <!-- <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div> -->
                                <button class="small-box-footer btn bg-primary w-100" onclick="showTables();">
                                    All records <i class="fas fa-arrow-circle-right"></i>
                                </button>
                            </div>
                        </div>

                        <!-- /.row -->
                    </div>
                    <div class="row" id="CreateAccounts" style="display: none;">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Records</h3>
                                </div>

                                <form action="RRM.php" method="POST" enctype='multipart/form-data'>
                                    <div class="card-body">
                                        <div class="card">





                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Control Number</label>
                                                    <input type="text" class="form-control" name="Control_Number" placeholder="Enter Control Number">
                                                </div>
                                            </div>


                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">First Name</label>
                                                    <input type="text" class="form-control" name="First_Name" placeholder="Enter First Name">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Last Name</label>
                                                    <input type="text" class="form-control" name="Last_Name" placeholder="Enter Last Name">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Middle Name</label>
                                                    <input type="text" class="form-control" name="Middle_Name" placeholder="Enter Middle Name">
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="">Suffix</label>
                                                    <input type="text" class="form-control" name="Suffix" placeholder="Enter Suffix">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Document type</label>
                                                    <input type="text" class="form-control" name="Document_Type" placeholder="Enter Document Type">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Date</label>
                                                    <input type="text" class="form-control" name="Date" value="<?php echo Date("Y-m-d"); ?>" disabled>
                                                </div>
                                            </div>










                                            <div class="col-12">


                                                <input type="file" name="file" id="file" /></td>
                                                <label for="fileupload"> Select a file to upload</label>



                                            </div>




                                        </div>
                                        <div class="row">
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary" name="RRMAddRecords">Submit</button>
                                            </div>
                                        </div>
                                    </div>





                            </div>




                        </div>
                    </div>

                </div>

                <div class="row" id="AllAccountsTable" style="display: none;">
                    <div class="col-12">

                        <form action="#" method="get">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-bordered dt-responsive">
                                    <thead>
                                        <tr>
                                            <th>Control Number</th>
                                            <th>Full Name</th>
                                            <th>Document Type</th>
                                            <!-- <th>Release Number</th>
                                            <th>Source</th>
                                            <th>Document Status</th>
                                            <th>Purpose</th>
                                            <th>Classification Number</th>
                                            <th>District</th>
                                            <th>Year</th>
                                            <th>Grade Level</th>
                                            <th>CAV ID</th>
                                            <th>Date Administrative</th>
                                            <th>Memorandum Number</th> -->
                                            <th>Date</th>
                                            <th>File</th>
                                            <th>Edit</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?Php $student->DisplayFilesRecordsRRM(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>


                </div>

            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->

        <!-- /.control-sidebar -->



    </div>
    <!-- Main Footer -->
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

        // function DisplayFilesRecords() {
        //     setInterval(function() {
        //         var xhttp = new XMLHttpRequest();
        //         xhttp.onreadystatechange = function() {
        //             if (this.readyState == 4 && this.status == 200) {
        //                 document.getElementById("DisplayFileRecords").innerHTML = this.responseText;

        //             }
        //         };
        //         // xhttp.open("GET", "../app/Waitinglist.php", true);
        //         xhttp.open("GET", "../app/DisplayFilesRecords.php", true);
        //         xhttp.send();
        //     }, 1000);


        // }
        // DisplayFilesRecords();
    </script>
    <?php

    include_once('footer.php'); ?>