<?php
include_once('../app/class.php');
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    $query = $pdo->prepare("SELECT * FROM numerical WHERE id =$id");
    $query->execute();
    $fetch = $query->fetch();

    header("Content-Disposition: attachment; filename=".$fetch['file']);
    header("Content-Type: application/octet-stream;");
    readfile("../uploads/".$fetch['file']);
}
