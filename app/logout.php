<?php
    session_start();
    $_SESSION['Account_Type'];
    unset($_SESSION['Account_Type']);

    header("location: ../login");
    ?>