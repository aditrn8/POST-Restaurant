<?php error_reporting(0)?>
<form action="" method="post">
<div class="row">
    <div class="col-md-4">
        <?php if($this->session->flashdata('msg')==true):?>
        <div class="card bg-success text-white shadow">
            <div class="card-body">
                <?= $this->session->flashdata('msg') ?>
            </div>
        </div>
        <br>
        <?php endif;?>
        <div class="card">
            <div class="card-header">Input Data</div>
            <div class="card-body">
                <input type="submit" class="btn btn-primary btn-block" value="Tambah" name="simpan">
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">List Meja</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-stripped" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nomor Meja</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_meja as $a) : $no += 1?>
                            <tr>
                                <td><?= $no?></td>
                                <td><?= $a['id_meja']?></td>
                                <td>
                                    <?php if($a['status_meja']==1):?>
                                    <p class="badge badge-success">Tersedia</p>
                                    <?php elseif($a['status_meja']==2):?>
                                    <p class="badge badge-warning">TerBooking</p>
                                    <?php else :?>
                                    <p class="badge badge-danger">Tidak Tersedia</p>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <?php if($a['status_meja']==1):?>
                                    <a href="<?= base_url('admin/c_meja/update/'.$a['id_meja']) ?>" class="btn btn-primary"><i class="fa fa-recycle"></i></a>
                                    <?php elseif($a['status_meja']==0):?>
                                    <a href="<?= base_url('admin/c_meja/updatee/'.$a['id_meja']) ?>" class="btn btn-primary"><i class="fa fa-recycle"></i></a>
                                    <?php endif?>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</form>