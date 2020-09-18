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
                <form method="post" action="<?= base_url('project/update') ?>">
                    <div class="card card-info"> 
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Project Code/Name <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="project_name" placeholder="Project Code/Name" value="<?php echo set_value('project_name',$project['name']); ?>" autocomplete="off" >
                                            <?php echo form_error('project_name'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Ad campaign id <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm" type="text" name="add_id" placeholder="Ad campaign id" value="<?php echo set_value('add_id',$project['add_id']); ?>" autocomplete="off" >
                                            <?php echo form_error('add_id'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Start Date <span class="astrick">*</span></label>
                                            <input class="form-control form-control-sm datepicker" type="text" name="start_date" placeholder="Start Date" value="<?php echo set_value('start_date',_vdate($project['start_date'])); ?>" autocomplete="off" readonly>
                                            <?php echo form_error('start_date'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Client <span class="astrick">*</span></label>
                                            <select class="form-control form-control-sm select2" name="client">
                                                <option value="">-- Select Client --</option>
                                                <?php foreach ($this->general_model->get_clients() as $key => $value) { ?>
                                                    <option value="<?= $value['id'] ?>" <?= set_value('client',$project['client']) == $value['id']?'selected':'' ?>><?= $value['cname'] ?> - <?= $value['bname'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <?php echo form_error('client'); ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Remarks</label>
                                            <textarea class="form-control form-control-sm" type="text" name="remarks" placeholder="Remarks" value="" autocomplete="off" ><?php echo set_value('remarks',$project['remarks']); ?></textarea>
                                            <?php echo form_error('remarks'); ?>
                                        </div>
                                    </div>


                                    <input type="hidden" name="id" value="<?= $project['id'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="<?= base_url('project') ?>" class="btn btn-danger btn-sm">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
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