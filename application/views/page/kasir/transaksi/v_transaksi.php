<?php error_reporting(0)?>
<?php foreach ($list_orderDetail as $a) : $gtotal += $a['harga'] * $a['qty'] ?><?php endforeach ?>
<?php if($cek['status_order'] == 0) :?>
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
                <form action="" method="post">

                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="number" id="harga" class="form-control" placeholder="Harga" required="required" readonly name="total_harga" value="<?= $gtotal?>">
                            <label for="harga">Harga Total</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="number" id="bayar" class="form-control" placeholder="Bayar" required="required" autofocus="autofocus" name="total_bayar" value="<?= $edit['harga'] ?>">
                            <label for="bayar">Bayar</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="total" class="form-control" placeholder="Kembalian" required="required" name="kembalian" readonly>
                            <label for="total">Kembalian</label>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Simpan" name="simpan" id="simpann">
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">List Masakan</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-stripped" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Pesanan</th>
                                <th>Keterangan</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;foreach ($list_orderDetail as $a) : $total += $a['harga'] * $a['qty'] ?>
                                <td><?= $no++?></td>
                                <td><?= $a['nama_masakan']?></td>
                                <td><?= $a['keterangan']?></td>
                                <td>Rp.<?= number_format($a['harga'])?>,-</td>
                                <td><?= $a['qty']?></td>
                                <td>Rp.<?= number_format($a['harga'] * $a['qty'])?>,-</td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>Total :</td>
                                <td><b>Rp.<?= number_format($total)?>,-</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php else :?>
udah bayar oyy 
<?php endif ?>