<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ERating| Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>templates/adminlte/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo base_url(); ?>templates/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>templates/adminlte/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?php echo base_url(); ?>templates/adminlte/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">   
    <div class="login-box">
      <?php if (isset($reason)) { ?>
      <div class="alert alert-danger" align="center"><h5>
        <i class="icon fa fa-warning fa-lg"></i>
        <?php echo $reason;  ?></h5>
        <?php //echo $details; ?>
      </div>
      <?php } ?>       
      <div class="login-box-body">
        <div class="login-logo">
          <img src="<?php echo base_url(); ?>templates/images/login-header.jpg">
        </div>        
        <p class="login-box-msg">Log Masuk untuk memulakan sesi anda</p>
        <form action="<?php echo base_url(); ?>index.php/login-validate" method="post">
          <!--<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">-->
          <input type="hidden" name="login-key" id="login-key" value="<?php echo uniqid(); ?>">
          <div class="form-group has-feedback">
            <!-- <input type="email" name="email" class="form-control" placeholder="Email" /> -->
            <input type="text" name="loginname" class="form-control" placeholder="Kad Pengenalan / Nama Pengguna" />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Kata Laluan" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
<!--               <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div> -->
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
            </div><!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center" style="display:none;">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div><!-- /.social-auth-links -->

        <div class="forgot-pwd-register-new" style="display:block;">
          <a href="#">Lupa Katalaluan? Hubungi Pentadbir Sistem</a><br>
          <!-- <a href="<?php echo base_url(); ?>index.php/user/register" class="text-center">Register a new membership</a> -->
        </div>

        <div class="login-logo">
          <img src="<?php echo base_url(); ?>templates/images/login-footer.jpg">
        </div>   
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>templates/adminlte/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url(); ?>templates/adminlte/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>templates/adminlte/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        console.log('datetime: '+ $('#login-key').val());

        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
