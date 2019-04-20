<div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">List Order</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-stripped" id="dataTable">
                        <thead>
                            <tr> 
                                <th>#</th>
                                <th>No Meja</th>
                                <th>Tanggal Pesan</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;foreach ($list_orderDetail as $a) :?>
                            <tr>
                                <td><?= $no?></td>
                                <td><?= $a['no_meja']?></td>
                                <td><?= $a['tanggal']?></td>
                                <td><?= $a['keterangan']?></td>
                                <td>
                                    <a href="<?= base_url('kasir/c_transaksi/proses/'.$a['id_order']) ?>" class="btn btn-warning"><i class="fa fa-shopping-cart"></i></a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>