<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $page_title ?> | <?= getSetting()['project_name'] ?></title>
  	<!-- Tell the browser to be responsive to screen width -->
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<link rel="shortcut icon" href="<?php echo base_url(); ?>image/<?= getSetting()['favicon'] ?>">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css">
 
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	 <style type="text/css">
		.login-page{
			background: #f7f7f7;
		}
		.my_text_error {
			color: red;
			font-weight: bold;
		}
	</style>
</head>



<body class="hold-transition login-page" >

	<div class="login-box" style="margin-top: 9.5%;">
		<div class="login-logo">
			<!--<a href="<?php echo base_url(); ?>" class="f-color">Log In</a>-->
			<a href="<?php echo base_url(); ?>" class="f-color">
				<h3><?= getSetting()['project_name'] ?></h3>
			</a>
		</div>
		  
			<!-- /.login-logo -->
			<div class="card">
			    <div class="card-body login-card-body">
			      	<p class="login-box-msg">Reset Password</p>

					    <form action="<?= base_url('login_auth/update_pass'); ?>" method="post" id="login">
					    
					        <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-control form-control-sm" type="password" name="new" placeholder="New Password" value="<?= set_value('new') ?>" autocomplete="off">
                                    <small><?= form_error('new'); ?></small>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="form-control form-control-sm" type="password" name="confirm" placeholder="Confirm Password" value="<?= set_value('confirm') ?>" autocomplete="off">
                                    <small><?= form_error('confirm'); ?></small>
                                </div>
                            </div>
					        <div class="row">
					           	<div class="col-8">
						          	<a href="<?= base_url('welcome'); ?>" class="f-color">Login</a> <br>
					            </div>
				          
					          	<div class="col-4">
					            	<button type="submit" id="login-button" class="btn btn-primary btn-block btn-flat">Submit</button>
					         	</div>
					        </div>

					        <input type="hidden" name="main_id" value="<?= $id ?>">
					    </form>

				    
				</div>
			

			</div>

	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- iCheck -->
	<script src="<?php echo base_url(); ?>plugins/iCheck/icheck.min.js"></script>
	<!-- Notify js -->
	<script src="<?php echo base_url(); ?>plugins/notifyjs/bootstrap-notify.js"></script>
	<script src="<?php echo base_url(); ?>plugins/notifyjs/bootstrap-notify.min.js"></script>
	
	
</body>
</html>
