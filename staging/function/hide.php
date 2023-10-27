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
    if ($data['hide'] == 'no'){
        mysqli_query($con, "UPDATE form SET hide = 'yes' WHERE id = '$id'") or die (mysqli_error($con));
        echo "<script>alert('Customer hided!');window.location='../index.php';</script>";
    } elseif ($data['hide'] == 'yes'){
        mysqli_query($con, "UPDATE form SET hide = 'no' WHERE id = '$id'") or die (mysqli_error($con));
        echo "<script>alert('Customer unhided!');window.location='../index.php';</script>";
    }
}
?>