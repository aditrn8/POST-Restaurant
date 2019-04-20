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
            <div class="card-header">List Order Detail</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-stripped" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No Meja</th>
                                <th>Id Order</th>
                                <th>Pesanan</th>
                                <th>Keterangan</th>
                                <th>Qty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;foreach ($list_orderDetail as $a) : $total += $a['harga'] * $a['qty']?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $a['no_meja']?></td>
                                <td><?= $a['id_order']?></td>
                                <td><?= $a['nama_masakan']?></td>
                                <td><?= $a['keterangan']?></td>
                                <td><?= $a['qty']?></td>
                                <td>
                                    <a href="<?= base_url('admin/c_editOrderWaiter/update/'.$a['id_detail_order']) ?>" class="btn btn-danger"><i class="fa fa-pen"></i></a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>