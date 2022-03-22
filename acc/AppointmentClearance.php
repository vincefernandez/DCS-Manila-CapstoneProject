<?php
include_once('../app/class.php');
include_once('../template/header.php');
session_start();
$fullname = $_SESSION['FullName'];
?>

<!DOCTYPE html>
<html lang="en">




<?php
$student->AppointmentCLearanceAddRecords();
?>

<body class="hold-transition sidebar-mini fixed-position">
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
        <!-- <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" />
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li> -->

        <!-- Messages Dropdown Menu -->

        <!-- Notifications Dropdown Menu -->

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-user"></i>
            Profile
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header"><?php echo $fullname ?></span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
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
      <div href="../index3.html" class="brand-link">
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
              <h1 class="small">Appointment and Clearances / 201 Files</h1>
            </li>
            <li class="nav-item">
              <a href="AppointmentClearancelist.php" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  All Records
                  <!-- <i class="right fas fa-angle-left"></i> -->
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="AppointmentClearance.php" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Add Records
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
              <!-- <h1>Add record</h1> -->
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <!-- <li class="breadcrumb-item"><a href="AppointmentClearanceList.php">All Records</a></li> -->
                <li class="breadcrumb-item active">Add record</li>
              </ol>
            </div>
          </div>
        </div>

      </section>

      <!-- Main content -->


      <!-- START OF ADD RECORD-->
      <section class="add-record-flex-section content">
        <div class="container-add-record">

          <form action="AppointmentClearance.php" method="POST" enctype="multipart/form-data">
            <div class="user-details-add-record">
              <div class="input-box-add-record">
                <span class="add-record-details">Relase number</span>
                <input type="text" name="Release_Number" placeholder="Enter Release number.." required>
              </div>
              <!--END OF DIV-->
            </div>
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
                <span class="add-record-details">Source</span>
                <input type="text" name="Source" placeholder="Enter Source..">
              </div>
              <!--END OF DIV-->
              <div class="input-box-add-record">
                <span class="add-record-details">Document type</span>
                <input type="text" name="Document_Type" placeholder="Enter Document type..">
              </div>
              <!--END OF DIV-->
            </div>
            <div class="user-details-add-record">
              <div class="input-box-add-record">
                <span class="add-record-details ">Document Status</span>
                <select class="select-for-release form-control" name="Document_Status">
                  <option disabled> Select </option>
                  <option value="Active">Active</option>
                  <option value="Not-Active">Not Active</option>
                </select>
              </div>
              <!--END OF DIV-->
              <div class="input-box-add-record">
                <span class="add-record-details ">For release</span>
                <select class="select-for-release form-control" name="Purpose">
                  <option disabled> Select </option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
              </div>
              <!--END OF DIV-->
            </div>
            <div class="user-details-add-record">
              <div class="input-box-add-record">
                <span class="add-record-details">Date</span>
                <input type="date" name="Date" value="<?php echo Date('Y-m-d'); ?>" readonly>
              </div>
              <!--END OF DIV-->
            </div>
            <div class="upload-add-record">
              <div class="button-for-uploads">

                <label class="button-for-select">Select file
                  <input type="file" name="file" id="file" /></td>
                </label>
              </div>
              <div class="button-for-uploads" style="float: right !important;">
                <button class="add-record-button rounded-add-record-button" type="submit" value="submit">Reset</button>
                <button class="add-record-button rounded-add-record-button" type="submit" name="AppointmentClearanceSubmit">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <!--END OF CONTAINER-->
      </section>
    </div>
    <footer class="main-footer">

      <strong>Copyright &copy; 2021-2022
        <a href="#">Cerberus</a>Capstone Project</strong> All rights reserved.
    </footer>
  </div>




  <aside class="control-sidebar control-sidebar-dark">
    <div>
      Anything ADDED HERE
    </div>
  </aside>

  </div>




  <?php include_once('../template/footer.php'); ?>
</body>

</html>