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
                            <input type="text" id="nama_user" class="form-control" placeholder="Nama Lengkap" required="required" autofocus="autofocus" name="nama_user" value="<?= $edit['nama_user'] ?>">
                            <label for="nama_user">Nama Lengkap</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-label-group">
                            <select name="id_level" required="required" class="form-control">
                                <?php if($edit['id_level'] == 1) :?>
                                <option value="1" selected>Admin</option>
                                <option value="2">Kasir</option>
                                <option value="3">Waiter</option>
                                <option value="4">Owner</option>
                                <option value="5">Pelanggan</option>
                                <?php elseif($edit['id_level'] == 2) : ?>
                                <option value="1">Admin</option>
                                <option value="2" selected>Kasir</option>
                                <option value="3">Waiter</option>
                                <option value="4">Owner</option>
                                <option value="5">Pelanggan</option>
                                <?php elseif($edit['id_level'] == 3) : ?>
                                <option value="1">Admin</option>
                                <option value="2">Kasir</option>
                                <option value="3" selected>Waiter</option>
                                <option value="4">Owner</option>
                                <option value="5">Pelanggan</option>
                                <?php elseif($edit['id_level'] == 4) : ?>
                                <option value="1">Admin</option>
                                <option value="2">Kasir</option>
                                <option value="3">Waiter</option>
                                <option value="4" selected>Owner</option>
                                <option value="5">Pelanggan</option>
                                <?php elseif($edit['id_level'] == 5) : ?>
                                <option value="1">Admin</option>
                                <option value="2">Kasir</option>
                                <option value="3">Waiter</option>
                                <option value="4">Owner</option>
                                <option value="5" selected>Pelanggan</option>
                                <?php else : ?>
                                <option selected disabled>-- Pilih Level --</option>
                                <option value="1">Admin</option>
                                <option value="2">Kasir</option>
                                <option value="3">Waiter</option>
                                <option value="4">Owner</option>
                                <option value="5">Pelanggan</option>
                                <option value="6">Koki</option>
                                <?php endif;?>
                            </select>
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
                                <th>Nama User</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;foreach ($list_user as $a) :?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $a['username']?></td>
                                <td><?= $a['nama_user']?></td>
                                <td><?= $a['nama_level']?></td>
                                <td>
                                    <a href="<?= base_url('admin/c_user/delete/'.$a['id_user']) ?>" onclick="return confirm('Yakin ingin menghapus data? Data yang dihapus tidak bisa dikembalikan.')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                    <a href="<?= base_url('admin/c_user/edit/'.$a['id_user']) ?>" class="btn btn-success"><i class="fa fa-pen"></i></a>
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