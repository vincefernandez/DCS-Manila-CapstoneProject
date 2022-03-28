<?php
include_once('../app/class.php');
$student->AddAccounts();
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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  <!-- ADD YOUR CSS HERE -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


  <!-- Modified and overide style -->
  <link rel="stylesheet" href="../dist/css/wyrlo.css">
  <!-- Ions Icon style -->
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>

</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
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

        <!-- Notifications Dropdown Menu -->

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
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
            <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
          </div>
          <div class="info">
            <a href="#" class="d-block">First Name Last Name</a>
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
            <li class="nav-header">Dashboard</li>
            <li class="nav-item">
              <a href="Administrator.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Add Accounts
                  <!-- <i class="right fas fa-angle-left"></i> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="AccountList.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Accounts List
                  <!-- <i class="right fas fa-angle-left"></i> -->
                </p>
              </a>
            </li>


            <li class="nav-item">
              <a href="RRM.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Receiving, Routing And Mailing
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Administrative Issuance
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Certificate, Authentication and Verification
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="AppointmentandClearances.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Appointment and Clearance and 201 Files
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tree"></i>
                <p>
                  Numerical
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../UI/general.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Communication</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Others</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Manage Queuing
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
          </ul>
        </nav>

      </div>

    </aside>


    <div class="content-wrapper">

      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <!-- Change This -->
              <h1>Manage Releasing</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="RRM.php">Back</a></li>
                <li class="breadcrumb-item active">Releasing</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <!-- Main content -->
      <section class="content">
        <!-- START OF RRMVIEW RELEASING-->
        <section class="releasing-section">
          <div class="container-releasing">
            <div class="row-releasing-page">
              <div class="col-md-10-releasing-page">
                <div class="col-md-6-releasing-page">
                  <div class="user-details-releasing">
              <div class="input-box-releasing-record">
              <span class="add-releasing-record">Release By</span>
              <input type="text" placeholder="Enter name..">
              </div>
            </div>  <!-- END OF DIV  -->
            <div class="user-details-releasing">
              <div class="input-box-releasing-record">
              <span class="add-releasing-record">Received By</span>
              <input type="text" placeholder="Enter name..">
              </div>
            </div>  <!-- END OF DIV  -->
            <div class="user-details-releasing">
              <div class="input-box-releasing-record">
              <span class="add-releasing-record">Client position</span>
              <input type="text" placeholder="Enter name..">
              </div>
            </div>  <!-- END OF DIV  -->
            <div class="user-details-releasing">
              <div class="input-box-releasing-record">
              <span class="add-releasing-record">Client received date</span>
              <input type="text" placeholder="Enter name..">
              </div>
            </div>  <!-- END OF DIV  -->
            <div class="user-details-view-record">
                <div class="input-box-view-record"><span class="view-record-details">Date</span>
                  <p class="input-view"> November 1, 2022</p>
                </div>
              </div>
              <!--END OF COLUMN-->

                <div class="button-for-uploads">
                <!-- <button class="add-record-button rounded-add-record-button" type="submit" value="submit">Reset</button> -->
                <button class="add-record-button rounded-add-record-button" type="submit" value="submit">Submit</button>
                </div>
                </div>
                <div class="col-md-4-releasing-page">
                  <div class="flex-container-camera">
                  <div id="camera"></div>
                  </div>
                  <!-- BUTTON FOR SNAPSHOT -->
                  <div class="button-wrapper-flex">
                  <input class="button-to-capture" type="button" value="Take a Snap and Download Picture" id="btPic" onclick="takeSnapShot()" />
                  </div>
                </div>
                <script>
                  Webcam.set({
                    width: 350,
                    height: 350,
                    image_format: 'jpeg',
                    jpeg_quality: 100
                  });
                  Webcam.attach('#camera');
                  takeSnapShot = function() {
                    Webcam.snap(function(data_uri) {
                      downloadImage('arun', data_uri);
                    });
                  }
                  downloadImage = function(name, datauri) {
                    var a = document.createElement('a');
                    a.setAttribute('download', name + '.png');
                    a.setAttribute('href', datauri);
                    a.click();
                  }
                </script>
                <!-- BUTTON FOR SNAPSHOT -->
              </div>
            </div>
          </div>
        </section>


        <!-- END OF RRM VIEW RELEASING -->

      </section>

    </div>


    <footer class="main-footer">
      <!-- <div class="float-right d-none d-sm-block"><b>Version</b> 3.2.0</div> -->
      <strong>Copyright &copy; 2014-2021
        <a href="#">Cerberus</a>Capstone Project</strong> All rights reserved.
    </footer>


    <aside class="control-sidebar control-sidebar-dark">
      <div>
        Anything ADDED HERE
      </div>
    </aside>

  </div>

  <script src="../plugins/jquery/jquery.min.js"></script>

  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="../dist/js/adminlte.min.js"></script>

  <script>
    if (typeof window.history.pushState == 'function') {
      window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF ']; ?>');
    }
  </script>
</body>

</html>