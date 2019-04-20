<?php error_reporting(0) ?>
<div class="row">
    <div class="col-md-4">
        <?php if ($this->session->flashdata('msg') == true) : ?>
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    <?= $this->session->flashdata('msg') ?>
                </div>
            </div>
            <br>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">Input Data</div>
            <div class="card-body">
                <form action="" method="post">

                    <div class="form-group">
                        <div class="form-label-group">
                            <select name="id_meja" class="form-control" required>
                                <?php if ($val != 1) : ?>
                                    <option selected disabled>-- Pilih Meja --</option>
                                    <?php foreach ($cek_meja as $a) : ?>
                                        <option value="<?= $a['id_meja'] ?>"><?= $a['id_meja'] ?></option>
                                    <?php endforeach ?>
                                <?php else : ?>
                                    <option value="<?= $edit['no_meja'] ?>"><?= $edit['no_meja'] ?></option>
                                    <?php foreach ($cek_meja as $a) : ?>
                                        <option value="<?= $a['id_meja'] ?>"><?= $a['id_meja'] ?></option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
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
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
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
                            <?php $no = 1;
                            foreach ($list_order as $a) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $a['no_meja'] ?></td>
                                    <td><?= $a['tanggal'] ?></td>
                                    <td><?= $a['keterangan'] ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/c_order/delete/' . $a['id_order'] . '/?meja=' . $a['no_meja']) ?>" onclick="return confirm('Yakin ingin menghapus data? Data yang dihapus tidak bisa dikembalikan.')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        <a href="<?= base_url('admin/c_order/edit/' . $a['id_order'] . '/?meja=' . $a['no_meja']) ?>" class="btn btn-success"><i class="fa fa-pen"></i></a>
                                        <a href="<?= base_url('admin/c_order/order/' . $a['id_order']) ?>" class="btn btn-warning"><i class="fa fa-shopping-cart"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>