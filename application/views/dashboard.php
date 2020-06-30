
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div>
        </div>
    </div>
</div>


<section class="content">
    <div class="container-fluid">
        <div class="row">
        	<?php if($this->session->userdata('id') == '1'){ ?>
	            <div class="col-md-3">
	            	<div class="small-box bg-info">
	              		<div class="inner">
	                		<h3><?= $this->general_model->count_client() ?></h3>
	                		<p>Clients</p>
	              		</div>
	              		<div class="icon">
	                		<i class="ion ion-bag"></i>
	              		</div>
	              		<a href="<?= base_url('client') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
	            	</div>
	        	</div>
        	<?php } ?>
        	<div class="col-md-3">
            	<div class="small-box bg-warning">
              		<div class="inner">
                		<h3><?= $this->general_model->count_project() ?></h3>
                		<p>Projects</p>
              		</div>
              		<div class="icon">
                		<i class="ion ion-bag"></i>
              		</div>
              		<a href="<?= base_url('project') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            	</div>
        	</div>
        </div>
    </div>
</section>





