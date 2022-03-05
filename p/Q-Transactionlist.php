<?php
include_once('../p/AdminHeader.php');
include_once('../app/class.php');
$student->AddTransactionType();
session_start();
$Employee_ID = $_SESSION['login'];
?>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php

        include_once('navbar.php');
        include_once('Queueing-Sidebar.php');
        ?>


        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Queueing Section</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="Q-Home.php">Home</a></li>
                                <li class="breadcrumb-item active">Manage-Queueing</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <form action="Q-Transactionlist.php" method="post">
                    <div class="mb-3">

                        <label for="exampleFormControlInput1" class="form-label">Add Transaction Type</label>
                        <input type="text" class="form-control" placeholder="Example@ Secondary" name="Transaction_Type">
                    </div>
                    <div class="mb-3">

                        <label for="exampleFormControlInput1" class="form-label">Window Name </label>
                        <input type="text" class="form-control" placeholder="EXAMPLE@ 1" name="WindowName">
                    </div>
                    <div class="mb-3">
                        <button type="Submit" class="btn btn-primary" name="AddTransactionTypeSubmit">Submit</button>
                    </div>
                </form>

                <table class="table mb-10">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Transaction_Type</th>
                            <th scope="col">Window_Name</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $student->DisplayQueueTransactions();
                            ?>

                        </tr>
                    </tbody>
                </table>


            </section>

        </div>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>

    <?php

    include_once('../p/footer.php'); ?>