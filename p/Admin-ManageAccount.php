<?php
include_once('../app/class.php');
include_once('AdminHeader.php');
session_start();
$Account_ID = $_SESSION['login'];
// $student->SessionValidation();
$student->AddAccounts();
$student->delAccounts();

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
                            <h1 class="m-0">Starter Page</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="AdminAccount.php">Home</a></li>
                                <li class="breadcrumb-item active">Manage Account</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">


                    <h5 class="mb-2 mt-4">title</h5>







                    <div class="row">
                        <div class="col-md-6">
                            <!-- small card -->
                            <div class="small-box bg-secondary">
                                <div class="inner">
                                    <h2>Add Accounts</h2>

                                    <p>This will allow you to create an Account for the Employee</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <button class="small-box-footer btn bg-success w-100" onclick="showForms();">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- small card -->
                            <div class="small-box bg-secondary">
                                <div class="inner">
                                    <h2>Show All Accounts</h2>

                                    <p>This will allow you to Show All created accounts for Employee</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <button class="small-box-footer btn bg-primary w-100" onclick="showTables();">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </button>
                            </div>
                        </div>

                        <!-- /.row -->
                    </div>
                    <div class="row" id="CreateAccounts" style="display: none;">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Accounts</h3>
                                </div>

                                <form action="Admin-ManageAccount.php" method="POST">
                                    <div class="card-body">
                                        <div class="card">
                                            <div class="row">


                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="">First Name</label>
                                                        <input type="text" class="form-control" name="First_Name" placeholder="Enter First Name">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="">Middle Name</label>
                                                        <input type="text" class="form-control" name="Middle_Name" placeholder="Enter Middle Name">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="">Last Name</label>
                                                        <input type="text" class="form-control" name="Last_Name" placeholder="Enter Last Name">
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="">Suffix(Jr,Sr)</label>
                                                        <input type="text" class="form-control" name="Suffix" placeholder="Enter Suffix">
                                                    </div>
                                                </div>



                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Email</label>
                                                        <input type="email" class="form-control" name="Email" placeholder="Enter email">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group1">
                                                        <label for="">Password</label>
                                                        <input type="password" class="form-control" name="Password">
                                                    </div>
                                                </div>


                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Section</label>
                                                        <input type="text" class="form-control" name="Section" placeholder="Enter Section">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Position</label>
                                                        <input type="text" class="form-control" name="Position" placeholder="Enter Position">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="">Contact Number</label>
                                                        <input type="number" class="form-control" name="ContactNumber" placeholder="Enter Contact Number">
                                                    </div>
                                                </div>







                                                <div class="col-12">

                                                    <div class="form-group">
                                                        <label>User Permission</label>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=" Administrative Issuance" id="flexCheckChecked" name="AdministrativeIssuance" checked>
                                                            <label class="form-check-label" for="flexCheckChecked">
                                                                Administrative Issuance
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="Numerical" id="flexCheckChecked" name="Numerical" checked>
                                                            <label class="form-check-label" for="flexCheckChecked">
                                                                Numerical
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="RRM" id="flexCheckChecked" name="RRM" checked>
                                                            <label class="form-check-label" for="flexCheckChecked">
                                                                RRM
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="201 Files" id="flexCheckChecked" name="201Files" checked>
                                                            <label class="form-check-label" for="flexCheckChecked">
                                                                201 Files
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>



                                            </div>
                                            <div class="row">
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary" name="AddAccountsSubmit">Submit</button>
                                                </div>
                                            </div>
                                        </div>





                                    </div>
                                    <!-- /.card-body -->


                                </form>
                                <!-- <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <div class="input-group">
                                                <form method='post' action='' enctype='multipart/form-data'>
                                                    <input type='file' name='files[]' multiple />
                                                    <input type='submit' value='Submit' name='submit' />
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->



                            </div>
                        </div>
                        <!-- /.container-fluid -->
                    </div>

                    <div class="row" id="AllAccountsTable" style="display: none;">
                        <div class="col-12">

                            <form action="Admin-ManageAccount.php" method="get">
                                <div class="table-responsive">
                                    <table id="myTable" class="table-responsive">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Middle Name</th>
                                                <th>Last Name</th>
                                                <th>Suffix</th>
                                                <th>Position</th>
                                                <th>Section</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Date Created</th>
                                                <th>Delete</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php $student->get_employee(); ?>
                                            </tr>

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
        <?php

        include_once('footer.php'); ?>