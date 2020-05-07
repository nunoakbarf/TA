<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Registration</title>
  <link rel="shortcut icon" href="<?php echo base_url('assets/dist/img/favicon.png')?>">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css')?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page bg-dark">
<div class="col-md-6">
  <div class="register-logo bg-warning m-0 p-0">
    <div class="font-weight-bold" href="beranda">K⍜PIKU</div>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new Admin</p>
      <?php echo form_open('admin_register');?>
      <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" name="name" value="<?php echo set_value('name'); ?>" required/>
          <?php echo form_error('name'); ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo set_value('username'); ?>" required/>
          <?php echo form_error('username'); ?>
          <div class="input-group-append">
            <div class="input-group-text mr-2">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>" required/>
          <?php echo form_error('email'); ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>" required/>
          <?php echo form_error('password'); ?>
          <div class="input-group-append">
            <div class="input-group-text mr-2">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <input type="password" class="form-control" placeholder="Retype password" name="password_conf" value="<?php echo set_value('password_conf'); ?>" required/>
          <?php echo form_error('password_conf'); ?>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <div class="col-4">
            <input type="submit" class="btn btn-warning btn-block" name="btnSubmit" value="Daftar" />
            <?php echo form_close();?> 
          </div>
        </div>
        <div class="text-center mt-3">Kembali ke beranda, Silakan klik <a class="text-warning font-weight-bold" href="<?php echo base_url('beranda');?>">disini</a></div>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="<?php echo base_url('admin');?>" class="btn btn-md btn-outline-warning pr-5 pl-5">
          <i class="fas fa-user mr-1"></i> Log In
        </a>
      </div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js')?>"></script>
</body>
</html>