<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            	<?php $client = $this->general_model->_get_client($project['client']) ?>        
                                                
                <h1 class="m-0 text-dark"><?php echo $page_title; ?> - <?= $client['cname'] ?> (<small><?= $client['bname'] ?></small>)</h1>
            </div>
            <div class="col-sm-6 text-right">
            	<a href="<?= base_url('project') ?>" class="btn btn-danger btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
    </div>
</div>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
            	<div class="card card-primary card-outline">
              		<div class="card-body box-profile">
                		
                		<h3 class="profile-username text-center">Project Details</h3>
                		

                		<ul class="list-group list-group-unbordered mb-3">
                  			<li class="list-group-item">
                    			<b>Name/Code</b> 
                    			<p style="margin-bottom: 0;"><?= $project['name'] ?></p>
                  			</li>
                  			<li class="list-group-item">
                  				<b>Start Date</b> 
                  				<a class="float-right"><?= _vdate($project['start_date']) ?></a>
                  			</li>
                  			<li class="list-group-item">
                    			<b>Remarks</b> 
                    			<p style="margin-bottom: 0;"><?= nl2br($project['remarks']) ?></p>
                  			</li>
                		</ul>

                		<button type="button" onclick="exportCsv();" class="btn btn-primary btn-block"  style="display: none;" id="export_btn"><b>Export CSV</b></button>
              		</div>
            	</div>
        	</div>

        	<div class="col-md-9" id="no-data" style="display: none;">
        		<div class="card card-primary card-outline">
        			<div class="card-body box-profile">
        				<h3 class="text-center">No data found. Please try again later</h3>		
        			</div>
        		</div>
        	</div>
        	<div class="col-md-9" id="container-loader-view">
        		<div id="loader-view"></div>
        	</div>

        	<div class="col-md-9" style="display: none;" id="result_block">
        		<div class="row">
        			<div class="col-md-4 col-sm-6 col-12">
		            	<div class="info-box bg-info-gradient">
		              		<span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>
		              		<div class="info-box-content">
		                		<span class="info-box-text">Impressions</span>
		                		<span class="info-box-number" id="impressions_val">41,410</span>
		                		<div class="progress">
		                  			<div class="progress-bar" style="width: 100%"></div>
		                		</div>
		                		<span class="progress-description text-center date-show-box">
		                  			20 Sep 2020 - 20 Sep 2021
		                		</span>
		              		</div>
		            	</div>
		          	</div>

		          	<div class="col-md-4 col-sm-6 col-12">
		            	<div class="info-box bg-success-gradient">
		              		<span class="info-box-icon"><i class="fa fa-hand-pointer-o"></i></span>
		              		<div class="info-box-content">
		                		<span class="info-box-text">Clicks</span>
		                		<span class="info-box-number" id="click_val">500</span>
		                		<div class="progress">
		                  			<div class="progress-bar" style="width: 100%"></div>
		                		</div>
		                		<span class="progress-description text-center date-show-box">
		                  			20 Sep 2020 - 20 Sep 2021
		                		</span>
		              		</div>
		            	</div>
		          	</div>

		          	<div class="col-md-4 col-sm-6 col-12">
		            	<div class="info-box bg-warning-gradient">
		              		<span class="info-box-icon"><i class="fa fa-usd"></i></span>
		              		<div class="info-box-content">
		                		<span class="info-box-text">Amount Spent</span>
		                		<span class="info-box-number" id="spend_val">$500</span>
		                		<div class="progress">
		                  			<div class="progress-bar" style="width: 100%"></div>
		                		</div>
		                		<span class="progress-description text-center date-show-box">
		                  			20 Sep 2020 - 20 Sep 2021
		                		</span>
		              		</div>
		            	</div>
		          	</div>
        		</div>
        	</div>
        	

        </div>
    </div>
</section>


<style type="text/css">
    #loader-view { position: relative; left: 0; top: 0; z-index: 2000; width: 100%; height: 100%; overflow: visible; background: #F0F0FC url('<?=base_url();?>/image/loader.gif') no-repeat center center; }
</style>


<script type="text/javascript">
	fetchReports();
    var project_id = "<?= $project['id'] ?>";
    var imp     = "";
    var click   = "";
    var spend   = "";
    var start   = "";
    var end     = "";
	function fetchReports() {
		$.ajax({
            type: "POST",
            url : "<?= base_url('project/fetch_report'); ?>",
            data: { add_id : "<?= $project['add_id'] ?>" } ,
            cache : false,
            dataType : "json",
            success: function(out)
            {
            	setTimeout(function() {
            		if(out['_retun'] == "true"){
	            		$('#result_block').show();
	            		$('#container-loader-view').hide();
	            		$('#no-data').hide();
	            		$('#export_btn').show();

	            		$('#impressions_val').html(out['data']['imp']);
	            		$('#click_val').html(out['data']['clicks']);
	            		$('#spend_val').html(out['data']['spend']);
                        $('.date-show-box').html(out['data']['start']+' - '+out['data']['end']);

                        imp     = out['data']['imp'];
                        click   = out['data']['clicks'];
                        spend   = out['data']['spend'];
                        start   = out['data']['start'];
                        end     = out['data']['end'];
	            	}else{
	            		$('#export_btn').hide();
	            		$('#result_block').hide();
	            		$('#container-loader-view').hide();
	            		$('#no-data').show();
	            	}	
            	},2000);
            }
        });
	}

    function exportCsv(_this) {
       $.ajax({
            type: "POST",
            url : "<?= base_url('project/export'); ?>",
            data:   { 
                        project : project_id, 
                        imp     : imp, 
                        click   : click, 
                        spend   : spend, 
                        start   : start, 
                        end     : end
                    } ,
            cache : false,
            beforeSend: function() {
                $('#export_btn').html('<i class="fa fa-circle-o-notch fa-spin"></i>');
                $('#export_btn').attr('disabled',true);
            },
            success: function(data)
            {
                setTimeout(function() {
                    $('#export_btn').html('<b>Export CSV</b>');      
                    $('#export_btn').removeAttr('disabled');
                    var downloadLink = document.createElement("a");
                      var fileData = ['\ufeff'+data];

                      var blobObject = new Blob(fileData,{
                         type: "text/csv;charset=utf-8;"
                       });

                      var url = URL.createObjectURL(blobObject);
                      downloadLink.href = url;
                      downloadLink.download = "Report.csv";

                      /*
                       * Actually download CSV
                       */
                      document.body.appendChild(downloadLink);
                      downloadLink.click();
                      document.body.removeChild(downloadLink);
                },2000);
            }
        }); 
    }
</script>