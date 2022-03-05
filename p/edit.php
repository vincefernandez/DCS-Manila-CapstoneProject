<?php
include_once('../app/class.php');
include_once('AdminHeader.php');
session_start();
$Employee_ID = $_SESSION['login'];
$student->UpdateAccounts();
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
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Manage Account</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">


                    <h5 class="mb-2 mt-4">title</h5>








                    <div class="row" id="CreateAccounts" style="display: block;">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Accounts</h3>
                                </div>

                                <form action="../app/function.php" method="POST">

                                    <?php


                                    if (isset($_GET['Edit'])) {

                                        $Edit = $_GET['Edit'];
                                        $getUsers = $pdo->prepare("SELECT * FROM users_tbl where Employee_ID =$Edit");
                                        $getUsers->execute();
                                        $users = $getUsers->fetchAll();
                                        foreach ($users as $user) {


                                    ?>
                                            <div class="card-body">
                                                <div class="card">
                                                    <div class="row">


                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">First Name</label>
                                                                <input type="text" class="form-control" name="First_Name" value="<?php echo " $user[First_Name]"; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Middle Name</label>
                                                                <input type="text" class="form-control" name="Middle_Name" value="<?php echo " $user[Middle_Name]"; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Last Name</label>
                                                                <input type="text" class="form-control" name="Last_Name" value="<?php echo " $user[Last_Name]"; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Suffix(Jr,Sr)</label>
                                                                <input type="text" class="form-control" name="Suffix" value="<?php echo " $user[Suffix]"; ?>">
                                                            </div>
                                                        </div>



                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Email</label>
                                                                <input type="email" class="form-control" name="Email" value="<?php echo " $user[Email]"; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Password</label>
                                                                <input type="text" class="form-control" name="Password" value="<?php echo " $user[Password]"; ?>">
                                                            </div>
                                                        </div>



                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Section</label>
                                                                <input type="text" class="form-control" name="Section" value="<?php echo " $user[Section]"; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Position</label>
                                                                <input type="text" class="form-control" name="Position" value="<?php echo " $user[Position]"; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Contact Number</label>
                                                                <input type="text" class="form-control" name="ContactNumber" value="<?php echo " $user[ContactNumber]"; ?>">
                                                            </div>
                                                        </div>




                                                        <!--
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <label for="exampleInputFile">File input</label>

                                                            </div>
                                                            <div class="d-inline-block">
                                                                <img src="../dist/img/avatar2.png" class="img-fluid" alt="...">

                                                            </div>
                                                            <div class="mt-2">
                                                                <button class="btn btn-info w-50">Update</button>
                                                            </div>

                                                        </div> -->




                                                        <div class="col-12">

                                                            <div class="form-group">
                                                                <label>User Permission</label>
                                                                <div class="input-group">
                                                                    <div class="form-group form-check">

                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                                                        <label class="form-check-label" for="flexCheckChecked">
                                                                            Checked checkbox
                                                                        </label> <br>
                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                                                        <label class="form-check-label" for="flexCheckChecked">
                                                                            Checked checkbox
                                                                        </label> <br>
                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                                                        <label class="form-check-label" for="flexCheckChecked">
                                                                            Checked checkbox
                                                                        </label> <br>
                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                                                        <label class="form-check-label" for="flexCheckChecked">
                                                                            Checked checkbox
                                                                        </label>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="card-footer">
                                                            <button type="submit" class="btn btn-primary" name="UpdateAccounts">Update & Save</button>
                                                        </div>

                                                    </div>
                                                </div>





                                            </div>
                                            <!-- /.card-body -->


                                </form>
                        <?php }
                                    }
                                    if (empty($_GET)) {
                                        echo "<div class='alert alert-primary d-flex align-items-center' role='alert'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-exclamation-triangle-fill flex-shrink-0 me-2' viewBox='0 0 16 16' role='img' aria-label='Warning:'>
                                      <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
                                    </svg>
                                    <div>
                                      An example alert with an icon
                                    </div>
                                  </div>";
                                    }

                        ?>
                            </div>
                        </div>
                        <!-- /.container-fluid -->
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