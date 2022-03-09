<?php
include_once('../app/class.php');
include_once('../p/AdminHeader.php');

?>
<style>
    body {
        height: 100vh !important;
    }

    /* .container {
       height: 100% !important;
    } */
</style>

<body>


    <?php
    $student->AddDatabaseToQueeing(); ?>

    <div class="card">
        <div class="card-header">
            <p class="lead text-center font-italic"> Welcome </p>
        </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0 text-center">
                <p id="Quotes">We are the best keme keme XD</p>
                <footer class="blockquote-footer">Records Services Manila </footer>
            </blockquote>
        </div>
    </div>


    <div class="container-fluid ">

        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-header text-center b bg-success">
                        <p class="lead">Processed</p>
                    </div>
                    <div class="card-body" id="Processed">


                    </div>

                    <p class="badge bg-primary text-center text-wrap" style="width: 6rem;">Window 1</p>

                </div>
            </div>

            <div class="col-6">
                <div class="card bg-secondary bg-gradient" style="height: 20rem !important;">
                    <div class="card-header text-center b bg-warning">
                        <p class="lead">Now Serving</p>
                    </div>
                    <div class="card-body" id="NowServing">

                        <a href="#" class="btn btn-primary bottom">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header text-center b bg-danger">
                        <p class="lead">Waiting</p>
                    </div>
                    <div class="card-body" id="Waitinglist">
                        <?php /*$student->DisplayWaitingQue();*/ ?>
                        <p class="badge bg-primary text-wrap" style="width: 6rem;">Window 1</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        function WaitingList() {
            setInterval(function() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("Waitinglist").innerHTML = this.responseText;

                    }
                };
                xhttp.open("GET", "../app/Waitinglist.php", true);
                // xhttp.open("GET", "../app/Processed.php", true);
                xhttp.send();
            }, 1000);


        }
        WaitingList();

        function Processed() {
            setInterval(function() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("Processed").innerHTML = this.responseText;

                    }
                };
                // xhttp.open("GET", "../app/Waitinglist.php", true);
                xhttp.open("GET", "../app/Processed.php", true);
                xhttp.send();
            }, 1000);


        }
        Processed();

        function NowServing() {
            setInterval(function() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("NowServing").innerHTML = this.responseText;

                    }
                };
                // xhttp.open("GET", "../app/Waitinglist.php", true);
                xhttp.open("GET", "../app/NowServing.php", true);
                xhttp.send();
            }, 1000);


        }
        NowServing();

        function RandomQuotes() {
            setInterval(function() {
                const quotes = document.getElementById('Quotes');
                quotes1 = "Awit";
                quotes2 = "awit2";
                quotes3 = "awit3";
                const things = [quotes1, quotes2, quotes3];
                let thing = things[Math.floor(Math.random() * things.length)];

                quotes.innerHTML = thing;
            }, 30000);

        }
        RandomQuotes();
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <?php
    include_once('footer.php');
    ?>