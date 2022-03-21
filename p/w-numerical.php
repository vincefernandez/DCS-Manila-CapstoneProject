<?php
// include_once('../app/class.php');
include_once('AdminHeader.php');
session_start();
// $Account_ID = $_SESSION['login'];
// $student->SessionValidation();
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

                                <form action="Admin-ManageAccount.php" method="POST">
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
                                                    <label for="">Name</label>
                                                    <input type="text" class="form-control" name="ContactNumber" placeholder="Enter Name">
                                                </div>
                                            </div>


                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Source</label>
                                                    <input type="text" class="form-control" name="ContactNumber" placeholder="Enter District">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Release number</label>
                                                    <input type="text" class="form-control" name="ContactNumber" placeholder="Enter Academic">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Document type</label>
                                                    <input type="text" class="form-control" name="ContactNumber" placeholder="Enter Source">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Classification number</label>
                                                    <input type="text" class="form-control" name="ContactNumber" placeholder="Enter Year">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">Document status</label>
                                                    <input type="text" class="form-control" name="ContactNumber" placeholder="Enter Year">
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="">For release</label>
                                                    <select class="form-control">
                                                        <option>yes</option>
                                                        <option>no</option>
                                                    </select>
                                                </div>
                                            </div>








                                            <div class="col-12">

                                                <form action="#" method="POST" enctype="multipart/form-data">
                                                    <input type="file" name="fileupload" value="fileupload" id="fileupload">
                                                    <label for="fileupload"> Select a file to upload</label>
                                                    <input type="submit" value="submit">
                                                </form>

                                            </div>



                                        </div>
                                        <div class="row">
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary" name="AddAccountsSubmit">Submit</button>
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
                            <div class="table-resposive">
                                <table id="myTable" class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Last Name</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>DONT MIND THIS</td>
                                            <td>DONT MIND THIS</td>
                                            <td>DONT MIND THIS</td>
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