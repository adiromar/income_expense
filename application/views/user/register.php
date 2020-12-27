<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php base_url() ?>assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>User Register - Income Expense</title>
  </head>


<body class="  pace-done" style=""><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content pb-5">
      <div class="logo">
        <h1>Income Expense</h1>
      </div>
      <div class="login-box" style="min-height: 550px;">
        
          <?php echo validation_errors(); ?>

          <?php $attributes = array('class' => 'login-form', 'id' => 'myform');
          echo form_open('user/store_user', $attributes); ?>

          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Register New User</h3>
          <div class="form-group">
            <label class="control-label">Full Name</label>
            <input class="form-control" type="text" name="full_name" placeholder="Full Name" value="<?php echo set_value('full_name'); ?>" autofocus="">
          </div>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="email" name="email" placeholder="Email" >
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" name="password" type="password" placeholder="Password">
          </div>
          <div class="form-group">
            <label class="control-label">CONFIRM PASSWORD</label>
            <input class="form-control" name="confirm_password" type="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox"><span class="label-text">Stay Signed in</span>
                </label>
              </div>
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <!-- <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button> -->
            <input type="submit" name="btnsubmit" class="btn btn-primary btn-block" value="Register">
          </div>

        <p class="semibold-text mb-2 float-right mt-2"><a href="<?= base_url()?>login" ><i class="fa fa-user"></i> Go to Login</a></p>
        <?php echo form_close(); ?>
        
          
        
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo base_url() ?>assets/js/plugins/pace.min.js"></script>
  
</body>

</html>

