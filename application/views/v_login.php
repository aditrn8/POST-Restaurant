<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sign Up Here!</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('css/sb-admin.css') ?>" rel="stylesheet">

</head>

<body class="bg-dark">
  <form action="<?= base_url('c_login/auth') ?>" method="post">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="username" class="form-control" placeholder="Username" required="required" autofocus="autofocus" name="username">
              <label for="username">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" class="form-control" placeholder="Password" required="required" name="password">
              <label for="password">Password</label>
            </div>
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Login">
        </form>
        <br>
        <?php if($this->session->flashdata('msg')==true):?>
        <div class="card bg-danger text-white shadow">
          <div class="card-body">
            Gagal!
          <div class="text-white-50 small"><?= $this->session->flashdata('msg') ?></div>
          </div>
        </div>
        <?php endif;?>
      </div>
      </div>
    </div>
    </form>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js')?>"></script>

</body>

</html>
