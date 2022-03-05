<?php
include_once('class.php');
session_start();
$Account_ID = $_SESSION['login'];
$student->AddAccounts();
$student->FileUpload();
$student->SessionValidation();
$student->UpdateAccounts();
?>