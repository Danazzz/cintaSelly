<?php
require_once "../config/conn.php";

unset($_SESSION['choose_bank']);
unset($_SESSION['count']);
unset($_SESSION['amount']);

// var_dump($_SESSION);die;

if (isset($_SESSION['user'])) {
  echo "<script>window.location='" . base_url('') . "';</script>";
} else {
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
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- Header icon-->
    <link rel="icon" href="../../img/book2.png" type="image/x-icon">
  </head>

  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="login.php"><b>Admin</b>WarnaWarni</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Welcome to Admin Panel WarnaWarni</p>

          <?php
          if (isset($_POST['login'])) {
            $user = trim(mysqli_real_escape_string($con, $_POST['user']));
            $password = trim(mysqli_real_escape_string($con, $_POST['password']));
            $sql = "SELECT * FROM admin WHERE username = '$user' AND password = '$password'";
            $result = mysqli_query($con, $sql);
            $data = mysqli_fetch_array($result);
            if (mysqli_num_rows($result) > 0) {
              $_SESSION['user'] = $data['role'];
              echo "<script>window.location='" . base_url('') . "';</script>";
            }
          } ?>

          <form action="" method="post">
            <div class="input-group mb-3">
              <input type="type" class="form-control" name="user" id="user" placeholder="Username" required autofocus>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>

            <!-- /.col -->
            <div class="col-12">
              <button type="submit" name="login" id="login" class="btn btn-primary btn-block">Log In</button>
            </div>
            <!-- /.col -->
        </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
  </body>

  </html>
<?php
}
?>