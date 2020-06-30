
<?php 
//$result = $CI->someModel->somefunction()
	$user  		= $this->session->userdata('id');

	function menu($path,$array)
	{
	  	foreach($array as $a)
		{
			if($path === $a)
			{
			  print_r(array("active","menu-open",));
			  break;  
			}
	 	}
	}
?> 
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="<?= base_url() ?>" class="brand-link text-center">
      	<span class="brand-text font-weight-light"><?= getSetting()['project_name'] ?></span>
    </a>
	<div class="sidebar">
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
			  	<img src="<?= base_url('uploads/user/') ?><?= profile_image()?>" style="width: 40px; height:40px;" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
			  	<a href="#" class="d-block"><?= _profile()['name'] ?></a>
			</div>
	  	</div>
	  	<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		  		<li class="nav-item">
					<a href="<?php echo base_url('dashboard'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("dashboard"))[0]; ?>">
					  	<i class="nav-icon fa fa-dashboard"></i>
					  	<p>Dashboard</p>
					</a>
			  	</li>

			  	<?php if ($this->session->userdata('id') == '1') { ?>
			  	
				  	<li class="nav-item">
						<a href="<?php echo base_url('client'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("client"))[0]; ?>">
						  	<i class="nav-icon fa fa-users"></i>
						  	<p>Manage Client</p>
						</a>
				  	</li>

			  	<?php } ?>

			  	<?php if ($this->session->userdata('id') == '1') { ?>
			  	
				  	<li class="nav-item">
						<a href="<?php echo base_url('project'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("project"))[0]; ?>">
						  	<i class="nav-icon fa fa-industry"></i>
						  	<p>Manage Project</p>
						</a>
				  	</li>

			  	<?php }else{ ?>
					<li class="nav-item">
						<a href="<?php echo base_url('project'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("project"))[0]; ?>">
						  	<i class="nav-icon fa fa-industry"></i>
						  	<p>My Projects</p>
						</a>
				  	</li>			  		
			  	<?php } ?>

			  	<li class="nav-item">
					<a href="<?php echo base_url('profile'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("profile"))[0]; ?>">
					  	<i class="nav-icon fa fa-user"></i>
					  	<p>Profile</p>
					</a>
			  	</li>

			  	<?php if ($this->session->userdata('id') == '1') { ?>
					<li class="nav-item">
						<a href="<?php echo base_url('setting'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("setting"))[0]; ?>">
						  	<i class="nav-icon fa fa-cog"></i>
						  	<p>Setting</p>
						</a>
				  	</li>			  	
				<?php } ?>
			  	
			  	<li class="nav-item">
					<a href="<?php echo base_url('dashboard/logout'); ?>" class="nav-link <?php menu($this->uri->segment(1),array("dashboard/logout"))[0]; ?>">
					  	<i class="nav-icon fa fa-power-off"></i>
					  	<p>Logout</p>
					</a>
			  	</li>
            </ul>
	  	</nav>
	</div>
  </aside>

  <div class="content-wrapper">
