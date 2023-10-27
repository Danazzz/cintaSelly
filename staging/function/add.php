<?php
require_once "../config/conn.php";
if (!isset($_SESSION['user'])) {
    echo "<script>window.location='" . base_url('auth/login.php') . "';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel WarnaWarni</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- Icon Logo -->
    <link rel="icon" href="../../img/book2.png" type="image/x-icon">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <span class="brand-text font-weight-light">Admin Panel</span>
                <small>Warna Warni</small>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fa fa-plus"></i>
                                <p>Whitelist</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="message.php" class="nav-link">
                                <i class="nav-icon fa fa-envelope"></i>
                                <p>Message</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="auth/logout.php" class="nav-link">
                                <i class="nav-icon fa fa-power-off"></i>
                                <p>LogOut</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add Customer</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <?php
            if (isset($_POST['add'])) {
                $name = trim(mysqli_real_escape_string($con, $_POST['name']));
                $wallet = trim(mysqli_real_escape_string($con, $_POST['wallet']));
                $email = trim(mysqli_real_escape_string($con, $_POST['email']));
                $phone = trim(mysqli_real_escape_string($con, $_POST['phone']));
                $amount = trim(mysqli_real_escape_string($con, $_POST['amount']));
                $price = $amount * 500000;
                // $price = ($amount * 500000) + rand(100, 999);
                // $i = 1;
                // while ($i >= 1) {
                //     $sql = "SELECT * FROM uniq_code WHERE total = '$price'";
                //     $result = mysqli_query($con, $sql);
                //     if (mysqli_num_rows($result) > 0) {
                //         $i++;
                //     } else {
                //         $query = mysqli_query($con, "INSERT INTO uniq_code (total) VALUE ('$price')") or die(mysqli_error($con));
                //         if ($query) {
                //             $query2 = mysqli_query($con, "SELECT * FROM uniq_code
                //         WHERE total ='$price'");
                //             if (mysqli_num_rows($query2) > 0) {
                //                 $priceUniq = $price;
                //                 $i = 0;
                //             }
                //         } else {
                //             echo "Something went wrong";
                //         }
                //     }
                // }

                $currentDateTime = date('Y-m-d H:i:s');

                $path = "../../storage/img/";
                $image = upload($path);
                if (!$image) {
                    return false;
                }

                mysqli_query($con, "INSERT INTO form ( name, wallet, email, phone_number, book_amount, priceUnique, hide, receive_book, status, image, bank, created_at) VALUES ( '$name', '$wallet', '$email', '$phone', '$amount', '$price', 'no', 'no', 'pending', '$image', '-', '$currentDateTime')") or die(mysqli_error($con));
                echo "<script>alert('Customer added successfully!');window.location='../index.php';</script>";
            }
            ?>
            <!-- Main content -->
            <section class="content">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Profile</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Wallet</label>
                                        <input type="text" name="wallet" id="wallet" class="form-control" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Phone Number</label>
                                        <input type="tel" name="phone" id="phone" pattern="[+]{1}[0-9]{11,14}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Amount of NFT</label>
                                        <input type="number" name="amount" id="amount" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 mx-auto">
                                        <input type="submit" name="add" value="Add Customer" class="btn btn-success">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <a href="../../index.html" class="btn btn-secondary float-right">Cancel</a>
                        </div>
                    </div>
                </form>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0-rc
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
</body>

</html>