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
                <form method="post" action="<?= base_url('profile/save') ?>">
                    <div class="card card-info"> 
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3 class="card-title">Profile Details</h3>    
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Name <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="name" placeholder="Name" value="<?php echo set_value('name',_profile()['name']); ?>" autocomplete="off" >
                                            <?php echo form_error('name'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Email <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="email" placeholder="Email" value="<?php echo set_value('email',_profile()['email']); ?>" autocomplete="off" >
                                            <?php echo form_error('email'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Mobile <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="mobile" placeholder="Mobile" value="<?php echo set_value('mobile',_profile()['mobile']); ?>" autocomplete="off" >
                                            <?php echo form_error('mobile'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control form-control-sm" type="password" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>" autocomplete="off" >
                                            <?php echo form_error('password'); ?>
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


