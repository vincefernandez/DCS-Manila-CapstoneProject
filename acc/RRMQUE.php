<?php

if ($_SESSION['Account_Type'] !== 'RRMElementary') {

    header('location: ../p/403.php');
}?>