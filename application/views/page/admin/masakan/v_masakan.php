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
                            <input type="text" id="nama_masakan" class="form-control" placeholder="Masakan" required="required" autofocus="autofocus" name="nama_masakan" value="<?= $edit['nama_masakan'] ?>">
                            <label for="nama_masakan">Masakan</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="number" id="harga" class="form-control" placeholder="Harga" required="required" autofocus="autofocus" name="harga" value="<?= $edit['harga'] ?>">
                            <label for="harga">Harga</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-label-group">
                            <select name="status_masakan" class="form-control" required="required">
                                <?php if ($edit['status_masakan'] == 1) : ?>
                                    <option value="1" selected>Habis</option>
                                    <option value="2">Tersedia</option>
                                <?php elseif ($edit['status_masakan'] == 2) : ?>
                                    <option value="1">Habis</option>
                                    <option value="2" selected>Tersedia</option>
                                <?php else : ?>
                                    <option selected disabled>-- Pilih Status --</option>
                                    <option value="1">Habis</option>
                                    <option value="2">Tersedia</option>
                                <?php endif ?>
                            </select>
                        </div>
                    </div>
                    <?php if ($val != 1) : ?>
                        <input type="submit" class="btn btn-primary btn-block" value="Simpan" name="simpan">
                    <?php else : ?>
                        <input type="submit" class="btn btn-warning btn-block" value="Update" name="update">
                        <a href="<?= base_url('admin/c_masakan') ?>" class="btn btn-danger btn-block">Cancel</a>
                    <?php endif; ?>
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
                                <th>Masakan</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list_masakan as $a) : $no += 1 ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $a['nama_masakan'] ?></td>
                                    <td>Rp.<?= number_format($a['harga']) ?>,-</td>

                                    <td>
                                        <?php if ($a['status_masakan'] == 1) : ?>
                                            <p class="badge badge-danger">Habis</p>
                                        <?php else : ?>
                                            <p class="badge badge-success">Tersedia</p>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('admin/c_masakan/delete/' . $a['id_masakan']) ?>" onclick="return confirm('Yakin ingin menghapus data? Data yang dihapus tidak bisa dikembalikan.')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        <a href="<?= base_url('admin/c_masakan/edit/' . $a['id_masakan']) ?>" class="btn btn-success"><i class="fa fa-pen"></i></a>
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