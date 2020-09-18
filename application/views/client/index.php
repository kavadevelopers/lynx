<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo $page_title; ?></h1>
            </div>

            <div class="col-sm-6 text-right">
            	<a href="<?= base_url('client/add') ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Client</a>
            </div>
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
                                        <th>Business Name</th>
                                        <th>Client Name</th>
                                        <th class="text-center">Projects</th>
                                        <th>Email</th>
                                        <th class="text-center">Mobile</th>
                                        <th>Address</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($clients as $key => $value) { ?>
                                        <tr>
                                            <td><?= $value['bname'] ?></td>
                                            <td><?= $value['cname'] ?></td>
                                            <td class="text-center"><?= $this->db->get_where('project',['df' => '','client' => $value['id']])->num_rows(); ?></td>
                                            <td><?= $value['email'] ?></td>
                                            <td class="text-center"><?= $value['mobile'] ?></td>
                                            <td>
                                                <?= nl2br($value['address']) ?><br>
                                                <?= nl2br($value['city']) ?> - <?= nl2br($value['state']) ?> - <?= nl2br($value['country']) ?> - <?= nl2br($value['zip']) ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url('client/edit/').$value['id'] ?>" class="btn btn-primary btn-xs" title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="<?= base_url('client/delete/').$value['id'] ?>" class="btn btn-danger btn-xs btn-delete" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
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