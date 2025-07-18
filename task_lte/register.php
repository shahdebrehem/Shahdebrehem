<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location:index.php");
    exit();
}
?>
<script>
  if (window.history && window.history.replaceState) {
    window.history.replaceState({}, document.title, "register.php");
  }
</script>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>
       <?php
      if (isset($_SESSION['error'])) {
       echo '<div style="
        background-color: #f8d7da;
        color: #721c24;
        padding: 10px 15px;
        border: 1px solid #f5c6cb;
        border-radius: 5px;
        margin-bottom: 15px;
        font-family: Arial, sans-serif;
        text-align: center;
    ">
        ' . htmlspecialchars($_SESSION['error']) . '
    </div>';
    unset($_SESSION['error']);
     }
     ?>
      <form action="register_process.php" method="post">
  <!-- First Name -->
  <div class="input-group mb-3">
    <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-user"></span>
      </div>
    </div>
  </div>

  <!-- Second Name -->
  <div class="input-group mb-3">
    <input type="text" name="second_name" class="form-control" placeholder="Second Name" required>
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-user"></span>
      </div>
    </div>
  </div>

  <!-- Password -->
  <div class="input-group mb-3">
    <input type="password" name="password" class="form-control" placeholder="Password" required>
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-lock"></span>
      </div>
    </div>
  </div>

  <!-- Confirm Password -->
  <div class="input-group mb-3">
    <input type="password" name="confirm_password" class="form-control" placeholder="Retype password" required>
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-lock"></span>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-8">
      <div class="icheck-primary">
        <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
        <label for="agreeTerms">
          I agree to the <a href="#">terms</a>
        </label>
      </div>
    </div>
    <div class="col-4">
      <button type="submit" class="btn btn-primary btn-block">Register</button>
    </div>
  </div>
      </form>

      <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
