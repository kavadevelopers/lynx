<?php 
    $user   = $this->session->userdata('id');
    //$user   = $this->auth->get_admin($user);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  
  <title><?= $page_title ?> | <?= getSetting()['project_name'] ?></title>
    
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>image/<?= getSetting()['favicon'] ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/custom_add.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/font-awesome/css/font-awesome.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/iCheck/flat/blue.css">
  <!-- Minimal Drop down -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/select2/select2.min.css"> 
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/iCheck/all.css">
  <!-- jQuery UI style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/jQueryUI/jquery-ui.css">

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/jquery/jquery_new.js"></script>

  
  <!-- Data Table -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/extra/buttons.bootstrap4.min.css">

  <!--Croopie-->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>dist\croppie\croppie.css">


</head>
<body class="hold-transition sidebar-mini">
    <div id="_preloader"></div>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
    </ul>

    <style type="text/css">
        .kava-scroller::-webkit-scrollbar{
            width: 0px;  /* Remove scrollbar space */
            background: transparent;  /* Optional: just make scrollbar invisible */
        }
    </style>
        
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link sign-out-custom" title="Sign Out" href="<?php echo base_url('dashboard/logout'); ?>"><i class="fa fa-power-off"></i></a>
        </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
  </script>
  <script type="text/javascript">
        $(function (){

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


  

  <style type="text/css">
    #_preloader { position: fixed; left: 0; top: 0; z-index: 2000; width: 100%; height: 100%; overflow: visible; background: #ffffff url('<?=base_url();?>/image/loading.gif') no-repeat center center; }
  </style>

  <script type="text/javascript">
    $(document).ready(function(){
          $('#_preloader').fadeOut('slow');
          $('#_preloader').remove();
    })
  </script>