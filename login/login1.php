<?php
include_once('../p/AdminHeader.php');
include_once('../app/class.php');
?>

<body class="hold-transition sidebar-mini">




                               <!-- START TO THIS CONTENT -->

  <div class="wrapper">

    <div class="main-content">
                          <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Blank Page</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#ROOTFILE">DCS Tracking</a></li>
                <li class="breadcrumb-item active">Login</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

                               <!-- Main content -->
      <section class="content bg-home-tracker"  style="background-image: url(../dist/img/bg-tracker.jpg);">
      <div class="bg-overlay-login"></div>
        <div class="#Sample">
          <!--YOU CAN ADD CLASS CSS HERE! -->

          <div class="w-flex-row">
          
           
      <div class="w-item w-dvider w-sm-item">
      
        <div class="w-wrap">
        <img src="../dist/img/dcslogo.png" width="150"> 
        <p class="w-logo-text">&nbsp;&nbsp;DCS-RMIS</p>
      </div>
      </div>
      <div class="w-dvider"></div>

      

      <div class="w-item smwidth-item">
        <div class="w-wrap">
          <form class="w-login-form" action="">
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
      </div><!--/.wrap-->

      </div>
    </div>
          
        
    <div id="particles-js">

<script type="text/javascript" src="../dist/js/particles.js"></script>
<script type="text/javascript" src="../dist/js/app.js"></script>
</div>
          
      
      <!--/.wrap-->
          <!-- <div class="mb-3">
            <label for="staticEmail" class="col-sm-2 col-form-label">Connect</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
            </div>
          </div>
          <div class="mb-3">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword">
            </div>
          </div> -->
        </div>


      </section>

    </div>




  </div>
  <?php

  include_once('../p/footer.php');
  ?>