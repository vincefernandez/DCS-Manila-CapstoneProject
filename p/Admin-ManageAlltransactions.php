<?php
include_once('../p/AdminHeader.php');
include_once('../app/class.php');
session_start();
$Employee_ID = $_SESSION['login'];
?>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <?php

    include_once('../p/navbar.php');
    include_once('Queueing-sidebar.php');
    ?>


    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Queueing Dashboard</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Manage-Queueing</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <!-- YOU CAN"T DELETE THIS WHOLE CONTENT FROM THE TOP -->



      <!-- YOU CAN EDIT AND DELETE THIS WHOLE CONTENT -->
      <!-- Main content -->
      <section class="content">


        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <?php
              $student->DisplayTransactions();
              ?>

            </tr>
          </tbody>
        </table>


      </section>

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