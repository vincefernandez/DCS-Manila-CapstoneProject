<?php
include_once('../app/class.php');
include_once('../template/header.php');
// $ID = $_GET['Add'];
// print_r($ID);
session_start();
$fullname = $_SESSION['FullName'];
// if ($_SESSION['Account_Type'] !== 'RRMElementary') {

//     header('location: ../p/403.php');
// }
?>

<!DOCTYPE html>
<html lang="en">




<?php
$student->UpdateRRM();
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
                        <span class="dropdown-header"><?php echo $fullname; ?></span>
                        <div class="dropdown-divider"></div>
                        <a href="../p/profilepage.php" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Profile

                        </a>

                        <div class="dropdown-divider"></div>
                        <a href="../app/logout.php" class="dropdown-item">
                            <!-- <i class="fas fa-file mr-2"></i> -->
                            <i class="fas fa-sign-out-alt mr-2"> </i>Logout

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
                        <img src="<?php $student->view1() ?>" class="img-circle elevation-2" alt="User Image" />
                    </div>
                    <div class="info">
                        <a href="../p/profilepage.php" class="d-block"><?php echo $fullname ?></a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-header">Receiving Routing and Mailing</li>
                        <li class="nav-item">
                            <a href="RRMlist.php" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    All Records

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="RRM.php" class="nav-link active">
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
                            <h1>Add record</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="RRMList.php">All Records</a></li>
                                <li class="breadcrumb-item active">Edit record</li>
                            </ol>
                        </div>
                    </div>
                </div>

            </section>

            <!-- Main content -->


            <!-- START OF ADD RECORD-->
            <section class="add-record-flex-section content">
                <div class="container-add-record">

                    <form action="RRMadd.php" method="POST" enctype="multipart/form-data">
                        <?php if (isset($_GET['Release'])) {

                            $Release = $_GET['Release'];
                            $getUsers = $pdo->prepare("SELECT * FROM filesrecord where Files_ID =$Release");
                            $getUsers->execute();
                            $users = $getUsers->fetchAll();
                            foreach ($users as $user)
                        ?>
                            <div class="user-details-add-record">
                                <div class="input-box-add-record">
                                    <span class="add-record-details">Control number</span>
                                    <input type="hidden" name="ID" value="<?php echo $ID ?>" required>
                                    <input type="text" name="Control_Number" value="<?php echo "$user[Control_Number]"; ?>" required readonly>
                                </div>

                            </div>


                            <div class="user-details-add-record">
                                <div class="input-box-add-record">
                                    <span class="add-record-details">First name</span>
                                    <input type="text" name="First_Name" value="<?php echo "$user[First_Name]"; ?>" readonly>
                                </div>
                                <!--END OF DIV-->
                                <div class="input-box-add-record">
                                    <span class="add-record-details">Middle name</span>
                                    <input type="text" name="Middle_Name" value="<?php echo "$user[Middle_Name]"; ?>" readonly>
                                </div>
                                <!--END OF DIV-->
                            </div>
                            <div class="user-details-add-record">
                                <div class="input-box-add-record">
                                    <span class="add-record-details">Last name</span>
                                    <input type="text" name="Last_Name" value="<?php echo "$user[Last_Name]"; ?>" readonly>
                                </div>
                                <!--END OF DIV-->
                                <div class="input-box-add-record">
                                    <span class="add-record-details">Suffix</span>
                                    <input type="text" name="Suffix" value="<?php echo "$user[Suffix]"; ?>" readonly>
                                </div>
                                <!--END OF DIV-->
                            </div>
                            <div class="user-details-add-record">
                                <div class="input-box-add-record">
                                    <span class="add-record-details">Document Type</span>
                                    <input type="text" name="Document_Type" value="<?php echo "$user[Document_Type]"; ?>" readonly>
                                </div>
                            </div>

                            <div class="user-details-add-record">
                                <div class="input-box-add-record">
                                    <span class="add-record-details">Date</span>
                                    <input type="date" name="Date" value="<?php echo Date('Y-m-d'); ?>" readonly>
                                </div>

                            </div>
                            <div class="upload-add-record">
                                <div class="button-for-uploads">

                                    <label>Selected file
                                        <a href='../p/download1.php?filename=$user[File]'><?php echo "$user[File]"; ?></a>
                                        <!-- <input type="file" name="file" id="file" /></td> -->
                                    </label>
                                </div>
                                <!-- <div class="button-for-uploads" style="float: right !important;">
                                    <button class="add-record-button rounded-add-record-button" type="submit" value="submit">Reset</button>
                                    <button class="add-record-button rounded-add-record-button" type="submit" name="RRMUpdate">Submit</button>
                                </div> -->
                            </div>
                            <!-- ============================================================================================================================================ -->
                            <div class="divider"></div>
                            <div class="user-details-add-record">

                                <div class="input-box-add-record">
                                    <span class="add-record-details">Release By</span>
                                    <input type="text" name="Release_By" value=" <?php echo $fullname ?>" readonly>
                                </div>
                            </div>
                            <div class="user-details-add-record">
                                <div class="input-box-add-record">
                                    <span class="add-record-details">Received By</span>
                                    <input type="text" name="Received_By" value=" <?php echo $fullname ?>" readonly>
                                </div>

                            </div>
                            <div class="user-details-add-record">
                                <div class="input-box-add-record">
                                    <span class="add-record-details">Client Position</span>
                                    <input type="text" name="Client_Position" required>
                                </div>

                            </div>
                            <div class="user-details-add-record">
                                <div class="input-box-add-record">
                                    <span class="add-record-details">Client Received Date</span>
                                    <input type="date" name="Client_Position" value="<?php echo Date('Y-m-d'); ?>">
                                </div>

                            </div>
                            <div class="user-details-add-record">
                                <label>Date : <?php echo Date('Y-m-d'); ?></label>

                            </div>
                            <div class="col-md-4-releasing-page">
                                <div class="flex-container-camera">
                                    <div id="camera1"></div>
                                </div>
                                <!-- BUTTON FOR SNAPSHOT -->
                                <div class="button-wrapper-flex">
                                    <input class="button-to-capture" type="button" value="Take a Snap and Download Picture" id="btPic" onclick="takeSnapShot()" />
                                </div>
                            </div>

                        <?php } ?>

                    </form>
                </div>
                <!--END OF CONTAINER-->
            </section>


            <div class="col-md-4-releasing-page">
                <div class="flex-container-camera">
                    <div id="camera"></div>
                </div>
                <!-- BUTTON FOR SNAPSHOT -->
                <div class="button-wrapper-flex">
                    <!-- <input class="button-to-capture" type="button" value="Take a Snap and Download Picture" id="btPic" onclick="takeSnapShot()" /> -->
                </div>
                <div id="results" style="visibility:hidden; position:absolute;"></div>
            </div>
            <div class="col-md-4-releasing-page">
                <button class="btn btn-primary" onclick="saveSnap();">Save</button>

                <a href="image.php"><button type="button" name="button">Go to Image Database</button></a>
            </div>
        </div>

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

        function saveSnap() {
            Webcam.snap(function(data_uri) {
                document.getElementById('results').innerHTML =
                    '<img id = "webcam" src = "' + data_uri + '">';
            });

            Webcam.reset();

            var base64image = document.getElementById("webcam").src;
            Webcam.upload(base64image, 'function.php', function(code, text) {
                alert('Save Successfully');
                document.location.href = 'image.php';
            });
        }

        // takeSnapShot = function() {
        //     Webcam.snap(function(data_uri) {
        //         // document.getElementById('results');
        //         downloadImage('unname', data_uri);
        //     });
        // }
        // downloadImage = function(name, datauri) {
        //     var a = document.createElement('a');
        //     a.setAttribute('download', name + '.png');
        //     a.setAttribute('href', datauri);
        //     a.click();


        // }
    </script>

    <?php include_once('../template/footer.php'); ?>
</body>

</html>