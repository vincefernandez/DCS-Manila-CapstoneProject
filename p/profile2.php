<?php
include_once('../app/class.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Administrator</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css" />
    <link rel="stylesheet" href="../dist/css/wyrlo.css">
    <!-- <link rel="stylesheet" href="../dist/css/wyrlo.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

</head>


<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <?php

    include_once('../p/navbar.php');
    // include_once('../p/AdminSidebar.php');
    ?>


    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <!-- YOU CAN"T DELETE THIS WHOLE CONTENT FROM THE TOP -->



      <!-- YOU CAN EDIT AND DELETE THIS WHOLE CONTENT -->
      <!-- Main content -->
      <section class="content">


        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Title</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body-profilepage">

            <!-- START OF PROFILE PAGE -->
            <section class="section-profile-page">
              <div class="container-fluid-profile-page">
                <div class="row-profile-page">
                  <div class="col-md-10-profile-page-flex">
                    <div class="col-md-4-profile-page">
                      <div class="border-bottom-profilepage"></div>
                      <div class="profile-img-profile-page"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""></div>
                      <div class="file-profile-page btn-profile-page btn-lg-profile-page btn-primary-profile-page">
                        Change Photo
                        <input type="file" name="file">
                      </div>
                    </div>
                    <div class="col-md-6-profile-page">
                      <div class="border-bottom-profilepage"></div>
                      <div class="profile-head-profile-page">
                        <h5>
                          Basic information
                        </h5>
                        <h6 class="details-profilepage">
                          Full name:
                          <span class="info-profile-page"> Ed I. Woah</span>
                        </h6>
                        <!--END OF DETAILS INFO-->
                        <h6 class="details-profilepage">
                          Position:
                          <span class="info-profile-page"> Administrative officer IV</span>
                        </h6>
                        <!--END OF DETAILS INFO-->
                        <h6 class="details-profilepage">
                          Section:
                          <span class="info-profile-page"> Administrative iisuance / Receiving, Routing and Mailing</span>
                        </h6>
                        <!--END OF DETAILS INFO-->
                      </div>
                    </div>
                    <!--END OF COLUMN-->
                    <div class="col-md-4-profile-page">
                      <div class="profile-head-profile-page">
                        <h5>
                          Full information
                        </h5>
                        <h6 class="details-profilepage">
                          Employee number:
                          <span class="info-profile-page"> 31274845</span>
                        </h6>
                        <!--END OF DETAILS INFO-->
                        <h6 class="details-profilepage">
                          First name:
                          <span class="info-profile-page"> Ed</span>
                        </h6>
                        <!--END OF DETAILS INFO-->
                        <h6 class="details-profilepage">
                          Middle name:
                          <span class="info-profile-page"> A</span>
                        </h6>
                        <!--END OF DETAILS INFO-->
                        <h6 class="details-profilepage">
                          Last name:
                          <span class="info-profile-page"> Woah</span>
                        </h6>
                        <!--END OF DETAILS INFO-->
                        <h6 class="details-profilepage">
                          Suffix:
                          <span class="info-profile-page"> N/A</span>
                        </h6>
                        <!--END OF DETAILS INFO-->
                        <h6 class="details-profilepage">
                          Date of Birth:
                          <span class="info-profile-page"> November 1, 1995</span>
                        </h6>
                        <!--END OF DETAILS INFO-->
                        <h6 class="details-profilepage">
                          Age:
                          <span class="info-profile-page"> 26</span>
                        </h6>
                        <!--END OF DETAILS INFO-->
                      </div>
                    </div>
                    <div class="col-md-6-profile-page">
                      <div class="md-6-profile-head-profile-page">
                        <h6 class="details-profilepage">
                          Position:
                          <span class="info-profile-page"> Administrative Officer IV</span>
                        </h6>
                        <!--END OF DETAILS INFO-->
                        <h6 class="details-profilepage">
                          Employment date:
                          <span class="info-profile-page"> November 1, 2017 - Present</span>
                        </h6>
                        <!--END OF DETAILS INFO-->
                        <h6 class="details-profilepage">
                          Email:
                          <span class="info-profile-page"> Ed.i.woah@gmial.com</span>
                        </h6>
                        <!--END OF DETAILS INFO-->
                        <h6 class="details-profilepage">
                          Passowrd:
                          <span class="info-profile-page"> *******</span>
                        </h6>
                        <!--END OF DETAILS INFO-->
                        <h6 class="details-profilepage">
                          Contact number:
                          <span class="info-profile-page"> 09568752269</span>
                        </h6>
                        <!--END OF DETAILS INFO-->
                        <h6 class="details-profilepage">
                          Account type:
                          <span class="info-profile-page"> Administrative Issuance / Receiving, Routing and Mailing</span>
                        </h6>
                        <!--END OF DETAILS INFO-->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- END OF PROFILE PAGE -->



          </div>



        </div>


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