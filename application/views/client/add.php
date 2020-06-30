<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo $page_title; ?></h1>
            </div>
        </div>
    </div>
</div>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="<?= base_url('client/save') ?>">
                    <div class="card card-info"> 
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Business Name <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="business_name" placeholder="Business Name" value="<?php echo set_value('business_name'); ?>" autocomplete="off" >
                                            <?php echo form_error('business_name'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Client Name <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="client_name" placeholder="Client Name" value="<?php echo set_value('client_name'); ?>" autocomplete="off" >
                                            <?php echo form_error('client_name'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Email <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>" autocomplete="off" >
                                            <?php echo form_error('email'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Password <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" type="password" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>" autocomplete="off" >
                                            <?php echo form_error('password'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Mobile <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="mobile" placeholder="Mobile" value="<?php echo set_value('mobile'); ?>" autocomplete="off" >
                                            <?php echo form_error('mobile'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Country <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="country" placeholder="Country" value="<?php echo set_value('country'); ?>" autocomplete="off" >
                                            <?php echo form_error('country'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>State <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="state" placeholder="State" value="<?php echo set_value('state'); ?>" autocomplete="off" >
                                            <?php echo form_error('state'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>City <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="city" placeholder="City" value="<?php echo set_value('city'); ?>" autocomplete="off" >
                                            <?php echo form_error('city'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Zip <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="zip" placeholder="Zip" value="<?php echo set_value('zip'); ?>" autocomplete="off" >
                                            <?php echo form_error('zip'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Address <span class="astrick">*</span></label>
                                            <textarea class="form-control form-control-sm" type="text" name="address" placeholder="Address" value="" autocomplete="off" ><?php echo set_value('address'); ?></textarea>
                                            <?php echo form_error('address'); ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="<?= base_url('client') ?>" class="btn btn-danger btn-sm">
                                <i class="fa fa-arrow-left"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="fa fa-plus"></i> Add
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>