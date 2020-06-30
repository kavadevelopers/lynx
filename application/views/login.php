<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in | <?= getSetting()['project_name'] ?></title>
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
    </style>
</head>



<body class="hold-transition login-page" >

    <div class="login-box" style="margin-top: 9.5%;">
        <div class="login-logo">
            <a href="<?php echo base_url(); ?>" class="f-color">
                <h3><?= getSetting()['project_name'] ?></h3>
            </a>
        </div>
          
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                        <form action="<? base_url('login_auth/login')?>" method="post" id="login">
                        
                            <div class="form-group">
                                <input type="email" 


                                <?php if(isset($this->input->cookie()['username']) ){ ?> value="<?php echo $this->input->cookie()['username']; ?>" <?php } ?>


                                 name="username" id="user" class="form-control" placeholder="Email" autocomplete="off" required autofocus>
                                
                            </div>
                            <div class="form-group has-feedback">
                                
                                <input type="password" <?php if(isset($this->input->cookie()['password']) ){ ?> value="<?php echo $this->input->cookie()['password']; ?>" <?php } ?> name="password" id="pass" class="form-control" placeholder="Password" required >
                                
                            </div>
                            
                            <div class="row">
                               <div class="col-8">
                                  <a href="<?= base_url('login_auth/forgot_password'); ?>" class="f-color">Forgot Password ?</a>
                                </div>
                          
                                <div class="col-4">
                                    <button type="submit" id="login-button" class="btn btn-primary btn-block btn-flat">Sign In</button>
                                </div>
                            </div>

                        </form>

                    
                </div>
            <!-- /.login-card-body -->

            <!-- <p style="text-align: center;border-top:1px solid #17a2b8;margin: 5px 0;"><strong>Powered By : </strong><a href="http://kavadevelopers.com" target="_blank">Kava Developers</a> </p> -->


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
    
    <script>
      

      $(function () {


        $('#login').submit(function(){

            var user = $('#user').val();
            var pass = $('#pass').val();
        
        
            var checkbox = 0;     
            $('#login-button').attr('disabled',true);
            $.ajax({
              url : "<?php echo site_url('login_auth/login'); ?>",
              type : "POST",
              dataType: "JSON",
              data : "user="+user+"&pass="+pass+"&check="+checkbox,
              cache : false,
                beforeSend: function() {
                    $.notify({
                        title: '<strong></strong>',
                        icon: 'fa fa-search',
                        message: 'Checking User...'
                      },{
                        type: 'info'
                      });
                    },
                  success:function( out ){  
                    
                      if(out[0] == '0')
                      {

                          $.notify({
                            title: '<strong></strong>',
                            icon: 'fa fa-check',
                            message: out[1]
                          },{
                            type: 'success'
                          });
                          setTimeout(function(){
                                window.location.replace('<?php echo base_url(); ?>'+ out[2]); 
                            }, 1000
                          );
                      }
                      else
                      {
                        $('#login-button').removeAttr('disabled');
                            $.notify({
                              title: '<strong></strong>',
                              icon: 'fa fa-times-circle',
                              message: out[1]
                            },{
                              type: 'danger'
                            });
                      }
                  }
            });
            return false;
        }); 
        
    <?php if(!empty($this->session->flashdata('error'))){ ?>
    
          $.notify({
            title: '<strong></strong>',
            icon: 'fa fa-times-circle',
            message: '<?php echo $this->session->flashdata('error'); ?>'
          },{
            type: 'danger'
          });

        <?php $this->session->set_flashdata('error',''); } ?>

        <?php if(!empty($this->session->flashdata('msg'))){ ?>
    
          $.notify({
            title: '<strong></strong>',
            icon: 'fa fa-check',
            message: '<?php echo $this->session->flashdata('msg'); ?>'
          },{
            type: 'success'
          });

        <?php $this->session->set_flashdata('msg',''); } ?>
    
    })
</script>
</body>
</html>
