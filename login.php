<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SIPSUDOM | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
</head>
<?php 
if(isset($_GET['pesan'])){
  if($_GET['pesan'] == "gagal"){
    echo "
    <script>
    alert('Username Atau Password Salah');
    document.location.href = 'login.php';
    </script>
    ";
  }
}
?>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">POLITEKNIK NEGERI CILACAP</p>

        <form action="cek_login.php" method="POST">
          <center><h1 style="color: black;">L O G I N</h1></center><br><br>
          <!-- css/bootstrap.css -->
          <div class="mb-3">
            <!-- css/bootstrap.css -->
            <label style="color: black;">Username</label>
            <!-- css/bootstrap.css -->
            <input type="username" class="form-control" autofocus="" name="username">
            <!-- css/bootstrap.css -->
          </div>
          <div class="mb-3">
            <label style="color: black;">Password</label>
            <input type="password" class="form-control" name="password">
          </div>
          <a href="index.php" class="btn btn-danger">Kembali</a>
          <button type="submit" class="btn btn-secondary" name="login">Login</button>
        </form>    
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="AdminLTE/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="AdminLTE/dist/js/adminlte.min.js"></script>
</body>
</html>
