<!DOCTYPE html>
<html lang="en">
<!-- ======= Head ======= -->
  <?php
  include "head.php";
  ?>
<!-- End Head -->

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Startup</b>Bisnis</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Input Email Anda yang terdaftar di Sistem</p>

      <form action="recover-password.html" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Kirim Password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="index.php?#login-daftar">Login</a>
      </p>
      <p class="mb-0">
        <a href="index.php?#login-daftar" class="text-center">Daftar Startup/Investor/Ide Bisnis</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.min.js"></script>
</body>
</html>
