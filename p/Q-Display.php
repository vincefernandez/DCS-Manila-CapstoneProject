<?php
include_once('../app/class.php');
include_once('../p/AdminHeader.php');

?>
<style>
    body {
        height: 100vh !important;
    }

    .container {
        height: 100% !important;
    }
</style>

<body>
    <?php
    $student->AddDatabaseToQueeing(); ?>
    <div class="container d-flex align-items-center justify-content-center">


        <form action="Q-Display.php" method="POST" id="myForm">
            <div class="card text-center">
                <div class="card-header">
                    Enter Details
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <!-- <label for="exampleInputEmail1" class="form-label">Enter Name</label> -->
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="Name" aria-describedby="emailHelp">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <!-- <label for="exampleInputPassword1" class="form-label"></label> -->
                        <select class="form-select" name="Purpose" aria-label="Default select example">
                            <option selected>Please Select Transaction</option>
                            <?php $student->DisplayToSelect(); ?>

                        </select>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <button type="submit" name="Submit" class="btn btn-primary">Enter</button>

                </div>
            </div>
        </form>


    </div>
    <script>


        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <?php
    include_once('footer.php');
    ?>