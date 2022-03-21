<?php
include_once('../app/class.php');
include_once('AdminHeader.php');
session_start();
// $Employee_ID = $_SESSION['login'];
$student->UpdateNumericalRecords();
// $ID = $_GET['NumericalEdit'];

// print_r($ID);
$name = $_SESSION['FullName'];

// $student->UpdateAccounts();

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
                            <!-- <h1 class="m-0">Starter Page</h1> -->
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../p/Admin-ManageAccount.php">Home</a></li>
                                <li class="breadcrumb-item active">Manage Account</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">











                    <div class="row" id="CreateAccounts" style="display: block;">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Records</h3>
                                </div>

                                <form action="NumericalEdit.php" method="Post">

                                    <?php


                                    if (isset($_GET['NumericalEdit'])) {

                                        $Edit = $_GET['NumericalEdit'];
                                        $getUsers = $pdo->prepare("SELECT * FROM filesrecord where Files_ID =$Edit");
                                        $getUsers->execute();
                                        $users = $getUsers->fetchAll();
                                        foreach ($users as $user) {


                                    ?>
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


                                                    <div class="col-6" style="display: none;">
                                                        <div class="form-group">

                                                            <input type="text" class="form-control" name="ID" value="<?php echo $Edit; ?>">
                                                        </div>
                                                    </div>


                                                    <!-- <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">First Name</label>
                                                            <input type="text" class="form-control" name="First_Name" value="<?php echo "$user[First_Name]"; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Last Name</label>
                                                            <input type="text" class="form-control" name="Last_Name" value="<?php echo "$user[Last_Name]"; ?>">
                                                        </div>
                                                    </div> -->


                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Source</label>
                                                            <input type="text" class="form-control" name="Source" value="<?php echo "$user[Source]"; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Release number</label>
                                                            <input type="text" class="form-control" name="ReleaseNumber" value="<?php echo "$user[Release_Number]"; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Document type</label>
                                                            <input type="text" class="form-control" name="DocumentType" value="<?php echo "$user[Document_Type]"; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="">Classification number</label>
                                                            <input type="text" class="form-control" name="ClassificationNumber" value="<?php echo "$user[Classification_Number]"; ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="ForRelease">For</label>
                                                            <select class="form-control" name="DocumentStatus">
                                                                <option selected value="<?php echo "$user[Document_Status]"; ?>"> <?php echo "$user[Document_Status]"; ?></option>
                                                                <option value="Active">Active</option>
                                                                <option value="Not Active">Not Active</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="ForRelease">For</label>
                                                            <select class="form-control" name="Purpose">
                                                                <option selected value="<?php echo "$user[Purpose]"; ?>"> <?php echo "$user[Purpose]"; ?></option>
                                                                <option value="For_Release">For Release</option>
                                                                <option value="For_Receive">For Receive</option>
                                                            </select>
                                                        </div>
                                                    </div>








                                                    <!-- <div class="col-12">


                                                        <input type="file" name="file" id="file" disabled /></td>

                                                        <label class="text-danger">File can't be edited.</label>



                                                    </div> -->



                                                </div>
                                                <div class="row">
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary" name="UpdateNumerical">Submit</button>
                                                    </div>
                                                </div>
                                            </div>


                                    <?php }
                                    } else {
                                        echo "No data";
                                    } ?>
                                </form>

                            </div>




                        </div>
                    </div>




                </div>
                <!-- /.content -->
            </div>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->



    </div>
    <!-- Main Footer -->
    <?php
    include_once('footer.php');
    ?>