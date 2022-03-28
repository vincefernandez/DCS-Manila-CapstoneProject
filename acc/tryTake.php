<?php
include_once('../app/class.php');
include_once('../template/header.php');
// $ID = $_GET['Add'];
// print_r($ID);
session_start();
$student->UploadTakePhoto();
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
                // document.location.href = 'image.php';
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