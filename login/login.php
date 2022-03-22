
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

</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  

      <!-- Main content -->
      
      <section class="content bg-home-tracker" style="background-image: url(../dist/img/bg-tracker.jpg)">
      <div class="bg-overlay-login"></div>

        <!-- START OF RRM -->


        <div class="w-flex-row">


  <div class="w-item w-dvider w-sm-item">

    <div class="w-wrap">
      <img src="../dist/img/dcslogo.png" width="150">
      <p class="w-logo-text">&nbsp;&nbsp;DCS-RMIS</p>
    </div>
  </div>
  <div class="w-dvider"></div>



  <div class="w-item smwidth-item">
    <div class="w-wrap ">
      <form class="w-login-form" action="" style="background-color: rbga(168, 204, 215, 0.6);">
        <div class="w-form-header">

          <p class="w-text-form">Login to access your dashboard</p>
        </div>
        <!--Email Input-->
        <div class="w-form-group">
          <input type="text" class="w-form-input" placeholder="email@example.com">
        </div>
        <!--Password Input-->
        <div class="w-form-group">
          <input type="password" class="w-form-input" placeholder="password">
        </div>
        <!--Login Button-->
        <div class="w-form-group">
          <button class="w-form-button" type="submit">Login</button>
        </div>

      </form>
    </div>
    <!--/.wrap-->

  </div>
</div>


<div id="particles-js">

  <script type="text/javascript" src="../dist/js/particles.js"></script>
  <script type="text/javascript" src="../dist/js/app.js"></script>
</div>
        <!-- END OF RRM -->

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

