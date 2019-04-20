<?php error_reporting(0)?>
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
                            <select name="id_masakan" class="form-control" required autofocus="autofocus">
                                <?php if($val != 1){?>
                                <option selected disabled>--Daftar Menu--</option>
                                <?php foreach ($cek_masakan as $a) : ?>
                                <option value="<?= $a['id_masakan']?>"><?= $a['nama_masakan'] ?> = Rp.<?= number_format($a['harga'])?>,- </option>
                                <?php endforeach ?>
                                <?php }else{ ?>
                                <option value="<?= $edit['id_masakan']?>"><?= $edit['nama_masakan']?></option>
                                <?php foreach ($cek_masakan as $a) : ?>
                                <option value="<?= $a['id_masakan']?>"><?= $a['nama_masakan'] ?> = Rp.<?= number_format($a['harga'])?>,- </option>
                                <?php endforeach ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="number" id="qty" class="form-control" placeholder="Jumlah" required="required" name="qty" value="<?= $edit['qty'] ?>">
                            <label for="qty">Jumlah</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-label-group">
                            <textarea name="keterangan" cols="30" rows="10" placeholder="Tambahkan catatan anda disini!" class="form-control"><?= $edit['keterangan'] ?></textarea>
                        </div>
                    </div>

                    <?php if ($val != 1) : ?>
                    <input type="submit" class="btn btn-primary btn-block" value="Simpan" name="simpan">
                    <?php else : ?>
                    <input type="submit" class="btn btn-warning btn-block" value="Update" name="update">
                    <a href="<?= base_url('admin/c_order') ?>" class="btn btn-danger btn-block">Cancel</a>
                    <?php endif;?>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">List Order Detail</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-stripped" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Pesanan</th>
                                <th>Keterangan</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Sub Total</th>
                                <th>Status</th>
                                <?php foreach ($list_orderDetail as $a): ?><?php endforeach;?>
                                <?php if($a['status_detail_order'] == 1 ||$a['status_detail_order'] == 2 ) :?>
                                <th></th>
                                <?php else: ?>
                                <th>Action</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;foreach ($list_orderDetail as $a) : $total += $a['harga'] * $a['qty']?>
                            <tr>
                                <td><?= $no++?></td>
                                <td><?= $a['nama_masakan']?></td>
                                <td><?= $a['keterangan']?></td>
                                <td>Rp.<?= number_format($a['harga'])?>,-</td>
                                <td><?= $a['qty']?></td>
                                <td>Rp.<?= number_format($a['harga'] * $a['qty'])?>,-</td>
                                <td>
                                <?php if($a['status_detail_order'] == 0): ?>
                                <p class="badge badge-danger">Sedang Dimasak!</p>
                                <?php elseif($a['status_detail_order'] == 1): ?>
                                <p class="badge badge-warning">Sudah Matang!</p>
                                <?php else: ?>
                                <p class="badge badge-success">Sudah Diterima!</p>
                                <?php endif;?>
                                </td>
                                
                                    <?php if($a['status_detail_order'] == 1 || $a['status_detail_order'] == 2 ): ?>
                                    <td></td>
                                    <?php else :?>
                                    <td>
                                    <a href="<?= base_url('waiter/c_order/deleteOrder/'.$a['id_detail_order'].'/?order='.$a['id_order']) ?>" onclick="return confirm('Yakin ingin menghapus data? Data yang dihapus tidak bisa dikembalikan.')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <a href="<?= base_url('waiter/c_order/editOrder/'.$a['id_detail_order'].'/?order='.$a['id_order']) ?>" class="btn btn-success"><i class="fa fa-pen"></i></a>
                                    </td>
                                    <?php endif ;?>
                                
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>Total:</td>
                                <td><b>Rp.<?= number_format($total) ?>,-</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>