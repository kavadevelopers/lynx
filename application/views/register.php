<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign Up | <?=$this->config->config["projectTitle"]?></title>
    <link rel="icon" href="<?= base_url() ?>image/favicon.ico">
    <link rel="stylesheet" href="<?= base_url() ?>theme/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>theme/css/responsive.css">
    <link rel="stylesheet" href="<?= base_url() ?>plugins/general.css">
</head>

<body>
    <!--====== Preloader Area Start ======-->
    <div id="loader">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
    <!--====== Preloader Area End ======-->

    <style type="text/css">
        .form-group {
            margin-bottom: 5px;
        }
        .fa-circle-o-notch:before {
            content: "\f1ce" !important;
        }
    </style>

    <!--====== Login Area Start ======-->
    <section class="section login-area h-100vh py-4">
        <div class="container h-100">
            <div class="row align-items-center justify-content-center h-100">
                <div class="col-12 col-sm-10 col-md-6 col-lg-6 mx-auto d-none d-md-block">
                    <div class="login-slider owl-carousel">
                        <img src="<?= base_url() ?>theme/img/welcome/login-1.svg" alt="">
                        <img src="<?= base_url() ?>theme/img/welcome/login-2.svg" alt="">
                        <img src="<?= base_url() ?>theme/img/welcome/login-3.svg" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5">
                    <!-- Appo Modal -->
                    <div class="appo-modal py-4 p-lg-4">
                        <!-- Modal Content -->
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header p-0 border-0" style="display: block;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a class="k-head-title active" id="login-tab" data-toggle="pill" href="#login">Sign Up</a>  
                                        </div>
                                        <div class="col-md-6">
                                            <p class="k-head-title" style="text-align: right;">Step <span id="current-step">1 </span> / 3</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Body -->
                            <div class="modal-body">
                                <div class="tab-content" id="pills-tabContent">
                                    <!-- Login Form -->
                                    <div class="tab-pane fade show active" id="login">
                                        <form action="<?= base_url('register/submit')?>" method="post" id="login_form" class="login-form">
                                            <div class="" id="step-1">
                                                <div class="col-12 col-md-12">
                                                    <div class="form-group">
                                                        <input class="form-control form-control-sm" type="text" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>" autocomplete="off" >
                                                        <p class="error-inline" id="email-error"></p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <div class="form-group">
                                                        <input class="form-control form-control-sm" id="pass" type="password" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>" autocomplete="off" >
                                                        <p class="error-inline" id="password-error"></p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <div class="form-group">
                                                        <input class="form-control form-control-sm" type="text" name="name" placeholder="Business Name" value="<?php echo set_value('name'); ?>" autocomplete="off" >
                                                        <p class="error-inline" id="name-error"></p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <div class="form-group">
                                                        <input class="form-control form-control-sm" type="text" name="reg_no" placeholder="Business Reg No." value="<?php echo set_value('reg_no'); ?>" autocomplete="off">
                                                        <p class="error-inline" id="reg_no-error"></p>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="margin-top:15px; ">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button class="btn btn-bordered d-block"  type="button" style="display: none !important;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Previous</button>
                                                        </div>
                                                        <div class="col-md-6 text-right">
                                                            <button class="btn btn-bordered d-block float-right" type="button" id="btn-next-1"><span id="main-1">Next <i class="fa fa-arrow-right" aria-hidden="true"></i></span><span id="process-1" style="display: none;"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="" id="step-2" style="display: none;">
                                                <div class="col-12 col-md-12">
                                                    <div class="form-group">
                                                        <input class="form-control form-control-sm numners" type="text" name="phone" placeholder="Business Phone NO." value="<?php echo set_value('phone'); ?>" autocomplete="off" >
                                                        <p class="error-inline" id="phone-error"></p>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-12">
                                                    <div class="form-group">
                                                        <input class="form-control form-control-sm" type="text" name="poc_no" placeholder="POC NO." value="<?php echo set_value('poc_no'); ?>" autocomplete="off" >
                                                        <p class="error-inline" id="poc_no-error"></p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <div class="form-group">
                                                        <input class="form-control form-control-sm" id="country" type="text" name="country" placeholder="Country" value="<?php echo set_value('country'); ?>" autocomplete="off" >
                                                        <p class="error-inline" id="country-error"></p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <div class="form-group">
                                                        <input class="form-control form-control-sm" id="state" type="text" name="state" placeholder="State" value="<?php echo set_value('state'); ?>" autocomplete="off" >
                                                        <p class="error-inline" id="state-error"></p>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="margin-top:15px; ">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button class="btn btn-bordered d-block"  type="button" id="previus-2">
                                                                <i class="fa fa-arrow-left" aria-hidden="true"></i> 
                                                                Previous
                                                            </button>
                                                        </div>
                                                        <div class="col-md-6 text-right">
                                                            <button class="btn btn-bordered d-block float-right" type="button" id="btn-next-2"><span id="main-2">Next <i class="fa fa-arrow-right" aria-hidden="true"></i></span><span id="process-2" style="display: none;"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="" id="step-3" style="display: none;">

                                                <div class="col-12 col-md-12">
                                                    <div class="form-group">
                                                        <input class="form-control form-control-sm" type="text" name="city" placeholder="City" value="<?php echo set_value('city'); ?>" autocomplete="off" >
                                                        <p class="error-inline" id="city-error"></p>
                                                    </div>
                                                </div>
                                            

                                                <div class="col-12 col-md-12">
                                                    <div class="form-group">
                                                        <input class="form-control form-control-sm" id="pin" type="text" name="pin" placeholder="PIN Code" value="<?php echo set_value('pin'); ?>" autocomplete="off" >
                                                        <p class="error-inline" id="pin-error"></p>
                                                    </div>
                                                </div>
                                            

                                                <div class="col-12 col-md-12">
                                                    <div class="form-group">
                                                        <input class="form-control form-control-sm" id="street" type="text" name="street" placeholder="Street" value="<?php echo set_value('street'); ?>" autocomplete="off" >
                                                        <p class="error-inline" id="street-error"></p>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-12">
                                                    <?php $packages = $this->db->get_where('packages',['df' => 0])->result_array(); ?>
                                                    <div class="form-group">
                                                        <select class="form-control" name="package">
                                                            <option value="">Select Package</option>
                                                            <?php foreach ($packages as $key => $value) { ?>
                                                                <option value="<?= $value['id'] ?>" <?= set_value('package') == $value['id']?'selected':''; ?>><?= $value['name'] ?> - $<?= $value['price'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <p class="error-inline" id="package-error"></p>
                                                    </div>
                                                </div>


                                                <div class="form-group" style="margin-top:15px; ">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button class="btn btn-bordered d-block"  type="button" id="previus-3">
                                                                <i class="fa fa-arrow-left" aria-hidden="true"></i> 
                                                                Previous
                                                            </button>
                                                        </div>
                                                        <div class="col-md-6 text-right">
                                                            <button class="btn btn-bordered d-block float-right" type="submit" id="btn-next-3"><span id="main-3">Submit <i class="fa fa-arrow-right" aria-hidden="true"></i></span><span id="process-3" style="display: none;"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="profile-login mb-2 p-2" >
                                                <span class="bg-white p-2">or</span>
                                            </div>

                                            <a href="<?= base_url() ?>" class="btn btn-bordered d-block">Sign In</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script src="<?= base_url() ?>theme/js/jquery/jquery-3.3.1.min.js"></script>
    <script>
        $(function () {
        
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
                
                })// End Function //////
            </script>
    <!-- Bootstrap js -->
    <script src="<?= base_url() ?>theme/js/bootstrap/popper.min.js"></script>
    <script src="<?= base_url() ?>theme/js/bootstrap/bootstrap.min.js"></script>

    <!-- Plugins js -->
    <script src="<?= base_url() ?>theme/js/plugins/plugins.min.js"></script>

    <!-- Active js -->
    <script src="<?= base_url() ?>theme/js/active.js"></script>
    <!-- Notify js -->
    <script src="<?php echo base_url(); ?>plugins/notifyjs/bootstrap-notify.js"></script>
    <script src="<?php echo base_url(); ?>plugins/notifyjs/bootstrap-notify.min.js"></script>
    <script src="<?php echo base_url(); ?>plugins/general.js"></script>
    
    <style type="text/css">
        .k-head-title{
            font-size: 17px;
            font-weight: 500;
            color: #444 !important;
            display: block;
            padding: 10px 15px;
        }
    </style>



    <script type="text/javascript">
        $('#btn-next-1').click(function(){
            error = 0;
            if($('[name ="email"]').val() == ""){
                error++;
                $('#email-error').html('Email Is Required');
            }
            else if(!isValidEmailAddress($('[name ="email"]').val())){
                $('#email-error').html('Please Enter Valid Email');
            }
            else{
                $('#email-error').html('');
            }
            if($('[name ="password"]').val() == ""){
                error++;
                $('#password-error').html('Password Is Required');
            }else{
                $('#password-error').html('');
            }
            if($('[name ="name"]').val() == ""){
                error++;
                $('#name-error').html('Name Is Required');
            }else{
                $('#name-error').html('');
            }
            if($('[name ="reg_no"]').val() == ""){
                error++;
                $('#reg_no-error').html('Reg No. Is Required');
            }else{
                $('#reg_no-error').html('');
            }

            if(error == 0){

                $.ajax({
                    type: 'POST',
                    url: '<?= base_url() ?>/register/check_email',
                    data: {
                        "email"    : $('[name ="email"]').val()
                    },
                    beforeSend: function() {
                        $('#main-1').hide();
                        $('#process-1').show();
                        $('#btn-next-1').attr('disabled',true);
                    },
                    success: function (data) {
                        $('#main-1').show();
                        $('#process-1').hide();
                        $('#btn-next-1').removeAttr('disabled');
                        if(data == 'ok'){
                            $('#email-error').html('Email Already Exists');
                        }
                        else{
                            $('#step-1').hide('fast');
                            $('#step-2').show('fast');
                            $('#current-step').html('2 ');
                        }
                    }
                });
            }
        })


        $('#btn-next-2').click(function(){
            error = 0;
            if($('[name ="phone"]').val() == ""){
                error++;
                $('#phone-error').html('Phone Is Required');
            }else{
                $('#phone-error').html('');
            }

            if($('[name ="poc_no"]').val() == ""){
                error++;
                $('#poc_no-error').html('POC No. Is Required');
            }else{
                $('#poc_no-error').html('');
            }

            if($('[name ="country"]').val() == ""){
                error++;
                $('#country-error').html('Country Is Required');
            }else{
                $('#country-error').html('');
            }

            if($('[name ="state"]').val() == ""){
                error++;
                $('#state-error').html('State Is Required');
            }else{
                $('#state-error').html('');
            }

            if(error == 0){
                $('#step-2').hide('fast');
                $('#step-3').show('fast');
                $('#current-step').html('3 ');
            }
        })

        $('#login_form').submit(function(){
            error = 0;
            if($('[name ="city"]').val() == ""){
                error++;
                $('#city-error').html('City Is Required');
            }else{
                $('#city-error').html('');
            }

            if($('[name ="pin"]').val() == ""){
                error++;
                $('#pin-error').html('Pin Is Required');
            }else{
                $('#pin-error').html('');
            }

            if($('[name ="street"]').val() == ""){
                error++;
                $('#street-error').html('Street Is Required');
            }else{
                $('#street-error').html('');
            }

            if($('[name ="package"]').val() == ""){
                error++;
                $('#package-error').html('Please Select Package');
            }else{
                $('#package-error').html('');
            }

            if(error == 0){
                return true;
            }else{
                return false;
            }
        });

        // previous


        $('#previus-2').click(function(){
            $('#step-1').show('fast');
            $('#step-2').hide('fast');
            $('#current-step').html('1 ');
        });

        $('#previus-3').click(function(){
            $('#step-2').show('fast');
            $('#step-3').hide('fast');
            $('#current-step').html('2 ');
        });
        function isValidEmailAddress(emailAddress) {
            var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
            return pattern.test(emailAddress);
        }
    </script>



</body>
</html>