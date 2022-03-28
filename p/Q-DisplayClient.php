<?php
include_once('../app/class.php');
include_once('../p/AdminHeader.php');

?>

<body>
    <div class="card">
        <div class="card-header bg-secondary ">

        <a class="nav-link" data-widget="fullscreen" href="#" role="button"><h1 class="font-italic display-3"> <img src="../dist/img/dcslogo.png" height="80px"> Record Management Services Office </h1>

                        <!-- <i class="fas fa-expand-arrows-alt"></i> -->
                    </a>
        </div>

    </div>
    <div class="container">

        <div class="row">
            <div class="col-sm-6">
                <div class="card border border-3 bg-light">
                    <div class="card-header bg-success">
                        <p class="lead text-center font-italic "> Now Serving </p>
                    </div>
                    <div class="card-body" id="NowServingElementary">
                        <!-- <p>
                        <h4 class="text-center"><b> Vincent Fernandez </b></h4>
                        </p>
                        <p class="text-center">Elementary</p>
                        <p class="text-center">Window 1</p>
                        <p class="text-center">Ticket Number : <b>0912342</b></p> -->
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card border border-3 bg-light">
                    <div class="card-header bg-success">
                        <p class="lead text-center font-italic "> Now Serving </p>
                    </div>
                    <div class="card-body" id="NowServingHighschool">
                        <!-- <p>
                        <h4 class="text-center"><b> Vincent Fernandez </b></h4>
                        </p>
                        <p class="text-center">High School</p>
                        <p class="text-center">Window 1</p>
                        <p class="text-center">Ticket Number : <b>0912342</b></p> -->
                    </div>
                </div>

            </div>

        </div>
        <div class="row">
            <div class="col-4 offset-1">
                <div class="card border border-2 bg-light d-flex justify-content-center">
                    <div class="card-header bg-danger">
                        <p class="lead text-center font-italic "> Waiting </p>
                    </div>
                    <div class="card-body " id="ElementaryWaitingList">
                        <!-- <p>
                        <h6 class="text-center"><b> Vincent Fernandez </b></h6>
                        </p>
                        <p class="text-center">Elementary</p>
                        <p class="text-center">Window 1</p>
                        <p class="text-center">Ticket Number : <b>0912342</b></p> -->
                    </div>
                    <p id="CountElementary" class="text-center"></p>
                </div>
            </div>

            <div class="col-4 offset-2">
                <div class="card border border-2 bg-light d-flex justify-content-center">
                    <div class="card-header bg-danger">
                        <p class="lead text-center font-italic "> Waiting </p>
                    </div>
                    <div class="card-body" id="HighSchoolWaitingList">

                        <!--
                            <p>
                        <h6 class="text-center"><b> Vincent Fernandez </b></h6>
                        </p>
                        <p class="text-center">Elementary</p>
                        <p class="text-center">Window 1</p>
                        <p class="text-center">Ticket Number : <b>0912342</b></p> -->
                    </div>
                    <p id="CountHighSchool" class="text-center"></p>
                </div>
            </div>





        </div>

    </div>
    <script>
        function CountHighSchool() {
            setInterval(function() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("CountHighSchool").innerHTML = this.responseText;

                    }
                };
                xhttp.open("GET", "../app/CountHighSchool.php", true);
                // xhttp.open("GET", "../app/Processed.php", true);
                xhttp.send();
            }, 1000);


        }
        CountHighSchool();
        function CountElementary() {
            setInterval(function() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("CountElementary").innerHTML = this.responseText;

                    }
                };
                xhttp.open("GET", "../app/CountElementary.php", true);
                // xhttp.open("GET", "../app/Processed.php", true);
                xhttp.send();
            }, 1000);


        }
        CountElementary();
        function WaitingListElementary() {
            setInterval(function() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("ElementaryWaitingList").innerHTML = this.responseText;

                    }
                };
                xhttp.open("GET", "../app/ElementaryWaiting.php", true);
                // xhttp.open("GET", "../app/Processed.php", true);
                xhttp.send();
            }, 1000);


        }
        WaitingListElementary();

        function WaitingListHighschool() {
            setInterval(function() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("HighSchoolWaitingList").innerHTML = this.responseText;

                    }
                };
                xhttp.open("GET", "../app/HighschoolWaiting.php", true);
                // xhttp.open("GET", "../app/Processed.php", true);
                xhttp.send();
            }, 1000);


        }
        WaitingListHighschool();

        function NowServingHighschool() {
            setInterval(function() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("NowServingHighschool").innerHTML = this.responseText;

                    }
                };
                xhttp.open("GET", "../app/NowServingHighschool.php", true);
                // xhttp.open("GET", "../app/Processed.php", true);
                xhttp.send();
            }, 1000);


        }
        NowServingHighschool();

        function NowServingElementary() {
            setInterval(function() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("NowServingElementary").innerHTML = this.responseText;

                    }
                };
                xhttp.open("GET", "../app/NowServingElementary.php", true);
                // xhttp.open("GET", "../app/Processed.php", true);
                xhttp.send();
            }, 1000);


        }
        NowServingElementary();


        // function Processed() {
        //     setInterval(function() {
        //         var xhttp = new XMLHttpRequest();
        //         xhttp.onreadystatechange = function() {
        //             if (this.readyState == 4 && this.status == 200) {
        //                 document.getElementById("Processed").innerHTML = this.responseText;

        //             }
        //         };

        //         xhttp.open("GET", "../app/Processed.php", true);
        //         xhttp.send();
        //     }, 1000);


        // }
        // Processed();



        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <?php include_once('footer.php'); ?>