<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo $page_title; ?></h1>
            </div>

            <?php if($this->session->userdata('id') == '1'){ ?>
                <div class="col-sm-6 text-right">
                	<a href="<?= base_url('project/add') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Project</a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="">
                    <div class="card card-info"> 
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-sm table-dt">
                                <thead>
                                    <tr>
                                        <th>Project Name</th>
                                        <th class="text-center">Start Date</th>
                                        <th>Client</th>
                                        <th>Remarks</th>
                                        <?php if($this->session->userdata('id') == '1'){ ?>
                                            <th class="text-center">Action</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($projects as $key => $value) { ?>
                                        <tr>
                                            <td><?= $value['name'] ?></td>
                                            <td class="text-center"><?= _vdate($value['start_date']) ?></td>
                                            <td>
                                                <?php $client = $this->general_model->_get_client($value['client']) ?>        
                                                <?= $client['cname'] ?> - <?= $client['bname'] ?>
                                            </td>
                                            <td>
                                                <?= nl2br($value['remarks']) ?>
                                            </td>
                                            <?php if($this->session->userdata('id') == '1'){ ?>
                                                <td class="text-center">
                                                    <a href="<?= base_url('project/view/').$value['id'] ?>" class="btn btn-success btn-xs" title="View Report">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="<?= base_url('project/edit/').$value['id'] ?>" class="btn btn-primary btn-xs" title="Edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="<?= base_url('project/delete/').$value['id'] ?>" class="btn btn-danger btn-xs btn-delete" title="Delete">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>