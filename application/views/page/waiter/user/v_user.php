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
                            <input type="text" id="username" class="form-control" placeholder="Username" required="required" autofocus="autofocus" name="username" value="<?= $edit['username'] ?>">
                            <label for="username">Username</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" id="password" class="form-control" placeholder="Password" required="required" autofocus="autofocus" name="password" value="<?= base64_decode($edit['password']) ?>">
                            <label for="password">Password</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="hidden" name="id_level" value="5">
                            <!-- <select name="id_level" required="required" class="form-control" readonly>
                                <option selected value="5">Pelanggan</option>
                            </select> -->
                        </div>
                    </div>
                    <?php if ($val != 1) : ?>
                    <input type="submit" class="btn btn-primary btn-block" value="Register" name="simpan">
                    <?php else : ?>
                    <input type="submit" class="btn btn-warning btn-block" value="Update" name="update">
                    <a href="<?= base_url('admin/c_user') ?>" class="btn btn-danger btn-block">Cancel</a>
                    <?php endif;?>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">List User</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-stripped" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Nama Pelanggan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;foreach ($list_user as $a) :?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $a['username']?></td>
                                <td><?= $a['nama_user']?></td>
                                <td>
                                    <a href="<?= base_url('waiter/c_user/delete/'.$a['id_user'].'/?meja='.base64_decode($a['password']) ) ?>" onclick="return confirm('Yakin ingin menghapus data? Data yang dihapus tidak bisa dikembalikan.')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <!-- <a href="<?= base_url('admin/c_user/edit/'.$a['id_user'].'/?meja='.base64_decode($a['password'])) ?>" class="btn btn-success"><i class="fa fa-pen"></i></a> -->
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