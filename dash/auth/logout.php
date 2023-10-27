<?php
require_once "../config/conn.php";

unset($_SESSION['user']);
echo "<script>window.location='".base_url('auth/login.php')."';</script>";
?>
