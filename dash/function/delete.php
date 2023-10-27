<?php
require_once "../config/conn.php";

$id = @$_GET['id'];
$sql = "SELECT * FROM form
WHERE id = '$id'
";
$query = mysqli_query($con, $sql);
$data = mysqli_fetch_array($query);
$image = $data['image'];
$path = "../../storage/img/".$image;

unlink($path);
mysqli_query($con, "DELETE FROM form WHERE id = '$_GET[id]'") or die (mysqli_error($con));
echo "<script>alert('Customer deleted successfully!');window.location='../index.php';</script>";
?>