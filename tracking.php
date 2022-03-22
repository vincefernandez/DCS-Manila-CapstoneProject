<?php
include_once('app/class.php');
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
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css" />
  <link rel="stylesheet" href="dist/css/wyrlo.css">
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
      <section class="content">

        <!-- START OF RRM -->

        <section class="bg-home-tracker" style="background-image: url(dist/img/bg-tracker.jpg);" id="home-tracker">
          <div class="bg-overlay-tracker"></div>
          <div class="home-center-tracker">
            <div class="home-desc-center-tracker">
              <div class="container-tracker">
                <div class="row-tracker justify-content-center-tracker">
                  <div class="col-lg-10-tracker title-perticle">
                    <div class="title-heading-tracker text-center-tracker mt-5-tracker pt-4-tracker">
                      <h1 class="heading-tracker text-white-tracker mb-3-tracker">Track your doument here</h1>
                      <p class="para-desc-tracker mx-auto-tracker text-light-tracker">Enter your tracking number to easily track your document.</p>
                      <div class="text-center-tracker tracking-form-tracker mt-5-tracker">
                        <form action="">
                          <input type="text" id="trackingforminput-id" name="" class=" rounded-tracker" placeholder="Enter tracking number..">
                          <button type="submit" class="btn-tracker btn-custom-tracker rounded-tracker">Track</button>
                        </form>

                        <!-- START OF DROPDOWN  -->

                        <div class='dropdown-tracker'>
                          <div class='title-tracker-dropdown pointerCursor-tracker'>What does tracking number look like ? <i class="fa fa-angle-right"></i></div>

                          <div class='menu-dropdown-tracker pointerCursor-tracker hide-dropdown-tracker'>
                            <div class='option-dropdown-tracker' id='option1'>
                              <h5><span class="Service-tracking-sample-title">Service</span> <i class="Service-tracking-sample-title">/</i> <span class="Service-tracking-sample-title">Sample Number</span></h5>
                              <span class="section-tracker-number">Numerical Tracking Number<sup>®</sup></span><br>
                              <span class="sample-tracking-number">9400 1000 0000 0000 0000 00</span>
                            </div>

                          </div>

                        </div>



                        <!-- SCRIPT FOR DROP DOWN -->
                        <script>
                          function toggleClass(elem, className) {
                            if (elem.className.indexOf(className) !== -1) {
                              elem.className = elem.className.replace(className, '');
                            } else {
                              elem.className = elem.className.replace(/\s+/g, ' ') + ' ' + className;
                            }

                            return elem;
                          }

                          function toggleDisplay(elem) {
                            const curDisplayStyle = elem.style.display;

                            if (curDisplayStyle === 'none' || curDisplayStyle === '') {
                              elem.style.display = 'block';
                            } else {
                              elem.style.display = 'none';
                            }

                          }

                          function toggleMenuDisplay(e) {
                            const dropdown = e.currentTarget.parentNode;
                            const menu = dropdown.querySelector('.menu-dropdown-tracker');
                            const icon = dropdown.querySelector('.fa-angle-right');

                            toggleClass(menu, 'hide-dropdown-tracker');
                            toggleClass(icon, 'rotate-90');
                          }

                          function handleOptionSelected(e) {
                            toggleClass(e.target.parentNode, 'hide-dropdown-tracker');

                            const id = e.target.id;
                            const newValue = e.target.textContent + ' ';
                            const titleElem = document.querySelector('.dropdown-tracker .title-tracker-dropdown');
                            const icon = document.querySelector('.dropdown-tracker .title-tracker-dropdown .fa');


                            titleElem.textContent = newValue;
                            titleElem.appendChild(icon);

                            //trigger custom event
                            document.querySelector('.dropdown-tracker .title-tracker-dropdown').dispatchEvent(new Event('change'));
                            //setTimeout is used so transition is properly shown
                            setTimeout(() => toggleClass(icon, 'rotate-90', 0));
                          }

                          function handleTitleChange(e) {
                            const result = document.getElementById('result');

                            result.innerHTML = 'The result is: ' + e.target.textContent;
                          }

                          //get elements
                          const dropdownTitle = document.querySelector('.dropdown-tracker .title-tracker-dropdown');
                          const dropdownOptions = document.querySelectorAll('.dropdown-tracker .option-dropdown-tracker');

                          //bind listeners to these elements
                          dropdownTitle.addEventListener('click', toggleMenuDisplay);

                          dropdownOptions.forEach(option => option.addEventListener('click', handleOptionSelected));

                          document.querySelector('.dropdown-tracker .title').addEventListener('change', handleTitleChange);
                        </script>

                        <!-- END OF DROPDOWN -->

                      </div>
                    </div>
                  </div> <!-- END OF COLUMN -->
                </div> <!-- END OF ROW -->
              </div> <!-- END OF CONTAINER -->
            </div>
          </div>
          <!-- START OF PARTICELS ANIMATION JS -->
          <!-- <div id="particles-js">

              <script type="text/javascript" src="../dist/js/particles.js"></script>
              <script type="text/javascript" src="../dist/js/app.js"></script>
            </div> -->
          <!-- END OF PARTICELS ANIMATION JS -->

        </section> <!-- END OF SECTION -->



        <section class="section-tracker bg-light-tracker" id="">
          <div class="container-tracker">
            <div class="row-tracker justify-content-center-tracker">
              <div class="col-12-tracker text-center-tracker">
                <div class="section-title-tracker">
                  <h4 class="title-tracker text-uppercase-tracker mb-4-tracker">How to track your document ?</h4>
                  <!-- <p class="text-muted-tracker mx-auto-tracker para-desc-tracker mb-0-tracker">Guide on how to track your document.</p> -->
                </div>
              </div>
            </div>
            <div class="row-tracker">
              <div class="col-lg-4-tracker col-md-6-tracker mt-5-tracker pt-4-tracker">
                <div class="services-tracker border-tracker pt-5-tracker p-4-tracker rounded-tracker bg-white-tracker">
                  <div class="icon-tracker position-relative-tracker border-tracker rounded-tracker bg-white-tracker mb-4-tracker">
                    <ion-icon name="checkmark-circle"></ion-icon>

                  </div>
                  <div class="content-tracker">
                    <h4 class="title-tracker mb-3-tracker">Get your tracking number</h4>
                    <p class="text-muted-tracker"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto molestiae est.</p>
                    <a href="javascript:void(0)" class="text-custom-tracker">Read More <i class="mdi-tracker mdi-chevron-right-tracker"></i> </a>
                  </div>

                </div>
              </div>
              <!--END OF COLUMN-->
              <div class="col-lg-4-tracker col-md-6-tracker mt-5-tracker pt-4-tracker">
                <div class="services-tracker border-tracker pt-5-tracker p-4-tracker rounded-tracker bg-white-tracker">
                  <div class="icon-tracker position-relative-tracker border-tracker rounded-tracker bg-white-tracker mb-4-tracker">
                    <ion-icon name="keypad"></ion-icon>

                  </div>
                  <div class="content-tracker">
                    <h4 class="title-tracker mb-3-tracker">Enter tracking number</h4>
                    <p class="text-muted-tracker"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto molestiae est.</p>
                    <a href="javascript:void(0)" class="text-custom-tracker">Read More <i class="mdi-tracker mdi-chevron-right-tracker"></i> </a>
                  </div>

                </div>
              </div>
              <!--END OF COLUMN-->
              <div class="col-lg-4-tracker col-md-6-tracker mt-5-tracker pt-4-tracker">
                <div class="services-tracker border-tracker pt-5-tracker p-4-tracker rounded-tracker bg-white-tracker">
                  <div class="icon-tracker position-relative-tracker border-tracker rounded-tracker bg-white-tracker mb-4-tracker">
                    <ion-icon name="done-all"></ion-icon>


                  </div>
                  <div class="content-tracker">
                    <h4 class="title-tracker mb-3-tracker">Wait for result</h4>
                    <p class="text-muted-tracker"> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto molestiae est.</p>
                    <a href="javascript:void(0)" class="text-custom-tracker">Read More <i class="mdi-tracker mdi-chevron-right-tracker"></i> </a>
                  </div>

                </div>
              </div>
              <!--END OF COLUMN-->

            </div>
          </div>
        </section>
        <!--END OF SECTION-->



        <section class="footer-tracker-section">
          <footer class="footer-tracker py-5-tracker bg-dark-tracker">
            <div class="container-tracker">
              <div class="row-tracker">
                <div class="col-lg-4-tracker col-md-6-tracker mt-4-tracker pt-2-tracker mt-lg-0-tracker pt-lg-0-tracker">
                  <h4 class="text-light text-uppercase footer-head">About</h4>
                  <p class="text-foot-tracker mt-3-tracker">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut earum, iure modi ab minima dolor dignissimos enim nobis perspiciatis eligendi exercitationem deleniti nemo provident? Porro nemo voluptatem delectus odio accusamus!</p>
                </div>
                <!--END OF COLUMUN-->

                <div class="col-lg-4-tracker col-md-6-tracker mt-4-tracker pt-2-tracker mt-lg-0-tracker pt-lg-0-tracker">
                  <h4 class="text-light-tracker text-uppercase-tracker footer-head-tracker">
                    <h4 class="text-light text-uppercase footer-head">Tags</h4>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247187.20170045312!2d120.8829577051376!3d14.524823352138915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ca221cd984c1%3A0x3d00de24aea4f5bd!2sDepartment%20of%20Education%20-%20Divisional%20Offices%20(Manila)!5e0!3m2!1sen!2sph!4v1643133487216!5m2!1sen!2sph" width="350" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <!--END OF COLUMUN-->

                <div class="col-lg-4-tracker col-md-6-tracker mt-4-tracker pt-2-tracker mt-lg-0-tracker pt-lg-0-tracker">
                  <h4 class="text-light text-uppercase footer-head">Business Hours</h4>
                  <ul class="list-unstyled-tracker text-foot-tracker mt-4-tracker mb-0-tracker">
                    <li>Monday - Friday : 9:00 to 17:00</li>
                    <li class="mt-2-tracker">Saturday : 10:00 to 15:00</li>
                    <li class="mt-2-tracker">Sunday : Day Off (Holiday)</li>
                  </ul>

                </div>
                <!--END OF COLUMUN-->

          </footer>

          <footer class="footer-tracker py-4-tracker footer-bar-tracker bg-dark-tracker">
            <div class="container-tracker text-foot-tracker text-center-tracker">
              <div class="row-tracker align-items-center-tracker">
                <div class="col-sm-8-tracker">
                  <div class="text-sm-center-tracker">
                    <p class="mb-0-tracker">2022 © CAPSTONE PROJECT.  TEAM CERBERUS</p>
                  </div>
                </div>
                <!--end col-->


              </div>
              <!--end row-->
            </div>
            <!--end container-->
    </div>
  </div>
  </footer>
  </section>

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

  <script src="plugins/jquery/jquery.min.js"></script>

  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="dist/js/adminlte.min.js"></script>

  <script>
    if (typeof window.history.pushState == 'function') {
      window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF ']; ?>');
    }
  </script>
</body>

</html>