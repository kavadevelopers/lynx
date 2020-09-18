<section class="content" style="margin-top: 13px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="<?= base_url('setting/save') ?>">
                    <div class="card card-info"> 
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3 class="card-title"><?php echo $page_title; ?></h3>    
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Company Name <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="name" placeholder="Company Name" value="<?php echo set_value('name',getSetting()['project_name']); ?>" autocomplete="off" >
                                            <?php echo form_error('name'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Company Website Link<span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="web_address" placeholder="Company Website Link" value="<?php echo set_value('web_address',getSetting()['company_web_link']); ?>" autocomplete="off" >
                                            <?php echo form_error('web_address'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Alerts Email <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="alert_email" placeholder="Alerts Email" value="<?php echo set_value('alert_email',getSetting()['alert_email']); ?>" autocomplete="off" >
                                            <?php echo form_error('alert_email'); ?>
                                        </div>
                                    </div>

                                    <h5 style="width: 100%; ">Email Credentials</h5>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Email Host <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="mhost" placeholder="Email Host" value="<?php echo set_value('mhost',getSetting()['mhost']); ?>" autocomplete="off" >
                                            <?php echo form_error('mhost'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Email Port <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="mport" placeholder="Email Port" value="<?php echo set_value('mport',getSetting()['mport']); ?>" autocomplete="off" >
                                            <?php echo form_error('mport'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Email User <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="muser" placeholder="Email User" value="<?php echo set_value('muser',getSetting()['muser']); ?>" autocomplete="off" >
                                            <?php echo form_error('muser'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Email Password <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="mpass" placeholder="Email Password" value="<?php echo set_value('mpass',getSetting()['mpass']); ?>" autocomplete="off" >
                                            <?php echo form_error('mpass'); ?>
                                        </div>
                                    </div>

                                    <h5 style="width: 100%; ">Facebook Credentials</h5>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Facebook Access Token <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="access_token" placeholder="Facebook Access Token" value="<?php echo set_value('access_token',getSetting()['access_token']); ?>" autocomplete="off" >
                                            <?php echo form_error('access_token'); ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="fa fa-save"></i> Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


