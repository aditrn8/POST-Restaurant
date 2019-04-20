<?php error_reporting(0)?>
<div class="col-md-8 offset-md-2">
        <?php if($this->session->flashdata('msg')==true):?>
        <div class="card bg-success text-white shadow">
            <div class="card-body">
                <?= $this->session->flashdata('msg') ?>
            </div>
        </div>
        <br>
        <?php endif;?>
        <div class="card">
            <div class="card-header">Report Meja</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-stripped" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No Meja</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;foreach ($meja as $a) : ?>
                            <tr>
                                <td><?= $no++?></td>
                                <td><?= $a['id_meja']?></td>
                                <td><p class="badge badge-danger">Rusak</p></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>