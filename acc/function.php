<?php
$conn = mysqli_connect('localhost', "root", "", "records");

if(isset($_FILES["webcam"]["tmp_name"])){
    $tmpName = $_FILES["webcam"]["tmp_name"];
    $imageName = date('Y.m.d') . "  - " . date("h.i.sa") . '  .jpeg';
    move_uploaded_file($tmpName, 'img/' . $imageName);

    $date = date("Y/m/d") . " & " . date("h:i:sa");
    $query = "Insert into images values('','$tmpName','$imageName')";
    mysqli_query($conn, $query);



}
?>