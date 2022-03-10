<?php
include_once('../app/class.php');
include_once('AdminHeader.php');
session_start();
$Account_ID = $_SESSION['login'];

$student->NumericalAddRecords();
$student->NumericalDelete();
// $student->N);
// $student->AddAccounts();
// $student->delAccounts();

// THIS WILL BE USE IN PROFILE SETTINGS ADD PICTURE

// if (isset($_POST['submit'])) {

//     // Count total files
//     $countfiles = count($_FILES['files']['name']);

//     // Prepared statement
//     $query = "INSERT INTO images (name,image) VALUES(?,?)";

//     $statement = $pdo->prepare($query);

//     // Loop all files
//     for ($i = 0; $i < $countfiles; $i++) {

//         // File name
//         $filename = $_FILES['files']['name'][$i];

//         // Location
//         $target_file = '../upload/' . $filename;

//         // file extension
//         $file_extension = pathinfo(
//             $target_file,
//             PATHINFO_EXTENSION
//         );

//         $file_extension = strtolower($file_extension);

//         // Valid image extension
//         $valid_extension = array("png", "jpeg", "jpg");

//         if (in_array($file_extension, $valid_extension)) {

//             // Upload file
//             if (move_uploaded_file(
//                 $_FILES['files']['tmp_name'][$i],
//                 $target_file
//             )) {

//                 // Execute query
//                 $statement->execute(
//                     array($filename, $target_file)
//                 );
//             }
//         }
//     }

//     echo "File upload successfully";
// }
?>


<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include_once('navbar.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        include_once('AdminSidebar.php');
        ?>

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Manage numerical</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="AdminAccount.php">Home</a></li>
                                <li class="breadcrumb-item active">Manage numerical</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid w-new-style">


                    <h5 class="mb-2 mt-4">title</h5>







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

                                <form action="Numerical.php" method="POST" enctype='multipart/form-data'>>
                                    <div class="card-body">
                                        <div class="card">
                                            <div class="row">


                                                <!-- <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">First Name</label>
                                                        <input type="text" class="form-control" name="First_Name" placeholder="Enter First Name">
                                                    </div>
                                                </div> -->

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
                                                    <label for="">Source</label>
                                                    <input type="text" class="form-control" name="Source" placeholder="Enter Source">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Release number</label>
                                                    <input type="text" class="form-control" name="ReleaseNumber" placeholder="Enter ReleaseNumber">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Document type</label>
                                                    <input type="text" class="form-control" name="DocumentType" placeholder="Enter DocumentType">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Classification number</label>
                                                    <input type="text" class="form-control" name="ClassificationNumber" placeholder="Enter ClassificationNumber">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Document status</label>
                                                    <input type="text" class="form-control" name="DocumentStatus" placeholder="Enter Document Status">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="ForRelease">For</label>
                                                    <select class="form-control" name="ForRelease">
                                                        <option value="For_Release">For Release</option>
                                                        <option value="For_Receive">For Receive</option>
                                                    </select>
                                                </div>
                                            </div>








                                            <div class="col-12">


                                                <input type="file" name="file" id="file" /></td>
                                                <label for="fileupload"> Select a file to upload</label>



                                            </div>



                                        </div>
                                        <div class="row">
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary" name="NumericalADD">Submit</button>
                                            </div>
                                        </div>
                                    </div>



                                </form>

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
                                            <th>Full Name</th>
                                            <th>Source</th>
                                            <th>Release Number</th>
                                            <th>Document Type</th>
                                            <th>Classification Number</th>
                                            <th>Document Status</th>
                                            <th>Purpose</th>
                                            <th>File</th>
                                            <th>Date</th>
                                            <th>Edit</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody id="NumericalRecords">

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
        function NumericalRecords() {
            setInterval(function() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("NumericalRecords").innerHTML = this.responseText;

                    }
                };
                // xhttp.open("GET", "../app/Waitinglist.php", true);
                xhttp.open("GET", "../app/NumericalRecords.php", true);
                xhttp.send();
            }, 1000);


        }
        NumericalRecords();


        if (typeof window.history.pushState == 'function') {
            window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF']; ?>');
        }
    </script>
    <?php

    include_once('footer.php'); ?>