<?php
require_once "../config/conn.php";

$id = @$_GET['id'];
$sql = "SELECT * FROM form
WHERE id = '$id'
";
$query = mysqli_query($con, $sql);
$data = mysqli_fetch_array($query);
$currentDateTime = date('Y-m-d H:i:s');

if ($data['status'] == 'pending') {
    echo "<script>alert('customer needs to be approved first!');window.location='../index.php';</script>";
} elseif ($data['status'] == 'approved') {
    if ($data['receive_book'] == 'no'){
        mysqli_query($con, "UPDATE form SET receive_book = 'yes' WHERE id = '$id'") or die (mysqli_error($con));
        echo "<script>alert('Customer approved!');window.location='../index.php';</script>";
    } elseif ($data['receive_book'] == 'yes') {
        mysqli_query($con, "UPDATE form SET receive_book = 'no' WHERE id = '$id'") or die (mysqli_error($con));
        echo "<script>alert('Customer unapproved!');window.location='../index.php';</script>";
    }
}

?>