<?php
require_once "config/conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css?v=1.2.0" />
    <link rel="icon" href="img/book.png" type="image/x-icon">

    <!-- Bootstrap CSS -->

    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.0/css/all.min.css" integrity="sha512-AyOHI/tIMgoG+32apAs3OdqFowPSDqiz5vLcD2wdhBJ4J/xF1PI6UITcyhS5HCmsiioapRaONqYBvimxzFfnoA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Start Datatable -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <!-- End Datatable -->
    <title>Selly Fajarini - Warna Warni Cinta </title>

</head>

<body>
    <?php
    session_start();
    error_reporting(0);
    ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="img/logo.svg" alt="" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php#buku">Buku</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php#penulis">Tentang&nbsp;Penulis</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="index.php#list">Pemesanan</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="whitelist.php#whitelist">Whitelist</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="contactUs.php#contact">Hubungi&nbsp;Kami</a>
                    </li>
                </ul>

                <li class="nav-item active mt-1 mb-3">
                    <a href="konfirmasi.php" class="btn-confirm" style="color:#F18DA5">
                        Konfirmasi&nbsp;Pembayaran
                    </a>
                </li>

            </div>
        </div>
    </nav>