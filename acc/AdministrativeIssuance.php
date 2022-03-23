<?php
include_once('../app/class.php');

include_once('../template/header.php');

session_start();
$fullname = $_SESSION['FullName'];
if ($_SESSION['Account_Type'] !== 'AdministrativeIssuance') {

  header('location: ../p/403.php');
}
$student->AdministrativeIssuanceAddRecords();
?>


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
        <!-- <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
            Profile
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header"><?php echo " $fullname"; ?></span>
            <div class="dropdown-divider"></div>
            <a href="../p/profilepage.php" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> Profile

            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> Settings

            </a>
            <div class="dropdown-divider"></div>
            <a href="../app/logout.php" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> Logout

            </a>

          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <div class="brand-link">
        <img src="../dist/img/dcslogo.png" alt="Record Services Manila" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
        <h6 class="brand-text font-weight-light h6">
          Record Services Manila
        </h6>
      </div>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $fullname ?></a>
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

            <li class="nav-header">
              <h1 class="small">Administrative Issuance</h1>
            </li>
            <li class="nav-item">
              <a href="Administrativeissuancelist.php" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  All Records
                  <!-- <i class="right fas fa-angle-left"></i> -->
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="AdministrativeIssuanceRecords.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p class="">
                  Administrative Issuance Records
                  <!-- <i class="right fas fa-angle-left"></i> -->
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
              <a href='' class="text-secondary"><i class="fas fa-arrow-left fa-2x"></i></a>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="Administrativeissuancelist.php">All Records</a></li>
                <li class="breadcrumb-item active text-secondary">Add Records</li>
              </ol>
            </div>
          </div>
        </div>

      </section>

      <!-- Main content -->


      <!-- START OF ADD RECORD-->
      <section class="add-record-flex-section">
        <div class="container-add-record">

          <form action="AdministrativeIssuance.php" method="post" enctype="multipart/form-data">
            <div class="user-details-add-record">
              <div class="input-box-add-record">
                <span class="add-record-details">First name</span>
                <input type="text" name="First_Name" placeholder="Enter First name..">
              </div>
              <!--END OF DIV-->
              <div class="input-box-add-record">
                <span class="add-record-details">Middle name</span>
                <input type="text" name="Middle_Name" placeholder="Enter Middle name..">
              </div>
              <!--END OF DIV-->
            </div>
            <div class="user-details-add-record">
              <div class="input-box-add-record">
                <span class="add-record-details">Last name</span>
                <input type="text" name="Last_Name" placeholder="Enter Last name..">
              </div>
              <!--END OF DIV-->
              <div class="input-box-add-record">
                <span class="add-record-details">Suffix</span>
                <input type="text" name="Suffix" placeholder="Enter Suffix..">
              </div>
              <!--END OF DIV-->
            </div>
            <div class="user-details-add-record">
              <div class="input-box-add-record">
                <span class="add-record-details">Control number</span>
                <input type="text" name="Control_Number" placeholder="Enter Control number..">
              </div>
              <!--END OF DIV-->
              <div class="input-box-add-record">
                <span class="add-record-details">Memorandum number</span>
                <input type="text" name="Memorandum_Number" placeholder="Enter Memorandum number..">
              </div>
              <!--END OF DIV-->
            </div>

            <div class="user-details-add-record">
              <div class="input-box-add-record">
                <span class="add-record-details">Document type</span>
                <input type="text" name="Document_Type" placeholder="Enter Document type..">
              </div>
              <!--END OF DIV-->
            </div>
            <div class="user-details-add-record">
              <div class="input-box-add-record">
                <span class="add-record-details">Date</span>
                <input type="text" name="Date" value="<?php echo Date('Y-m-d h-i-s') ?>" readonly>
              </div>
              <!--END OF DIV-->
            </div>
            <div class="upload-add-record mb-2">
              <input type="file" name="file" id="file" /></td>
            </div>
            <div class="button-for-uploads">
              <button class="add-record-button rounded-add-record-button" type="submit" value="submit">Reset</button>
              <button class="add-record-button rounded-add-record-button" type="submit" name="AdministrativeIssuanceSubmit">Submit</button>
            </div>
        </div>
        </form>
      </section>

    </div>
    <!--END OF CONTAINER-->
    <footer class="main-footer">
      <!-- <div class="float-right d-none d-sm-block"><b>Version</b> 3.2.0</div> -->
      <strong>Copyright &copy; 2014-2021
        <a href="#">Cerberus</a>Capstone Project</strong> All rights reserved.
    </footer>
  </div>










  <aside class="control-sidebar control-sidebar-dark">
    <div>
      Anything ADDED HERE
    </div>
  </aside>


  <?php
  include_once('../template/footer.php');
  ?>
  <script>
    if (typeof window.history.pushState == 'function') {
      window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF ']; ?>');
    }
  </script>
</body>

</html>