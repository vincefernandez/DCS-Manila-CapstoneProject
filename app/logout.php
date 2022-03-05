<?php
    session_start();
    $_SESSION['login'];
    unset($_SESSION['login']);

    header("location: ../login");
    ?>