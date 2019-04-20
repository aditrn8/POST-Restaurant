<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= @$title?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="<?= base_url('vendor/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('css/sb-admin.css') ?>" rel="stylesheet">

</head>

<body>
  
<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="">Restoranku</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
          Hi, <?= $this->session->userdata('nama_user') ?>
          
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="<?= base_url('c_login/logout') ?>" >Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

  <?php if($this->session->userdata('akses') == 1){?>
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/c_home') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Halaman Input</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Registrasi :</h6>
          <a class="dropdown-item" href="<?= base_url('admin/c_user') ?>">List User</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Entry Referensi :</h6>
          <a class="dropdown-item" href="<?= base_url('admin/c_masakan') ?>"><i class="fa fa-circle"></i> List Makanan</a>
          <a class="dropdown-item" href="<?= base_url('admin/c_meja') ?>"><i class="fa fa-circle"></i> List Meja</a>
          <!-- <div class="dropdown-divider"></div> -->
          <!-- <h6 class="dropdown-header">Order :</h6>
          <a class="dropdown-item" href="<?= base_url('admin/c_order') ?>">Order Menu</a>
          <div class="dropdown-divider"></div> -->
          <h6 class="dropdown-header">Edit Order :</h6>
          <a class="dropdown-item" href="<?= base_url('admin/c_editOrderKoki') ?>">- Koki Order Menu</a>
          <a class="dropdown-item" href="<?= base_url('admin/c_editOrderWaiter') ?>">- Waiter Order Menu</a>
          <div class="dropdown-divider"></div>
          
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/c_transaksi')?>">
          <i class="fas fa-fw fa-shopping-cart"></i>
          <span>Transaksi</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Report</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?= base_url('admin/c_home/hari') ?>"><i class="fa fa-folder"></i> Report Transaksi</a>
          <a class="dropdown-item" href="<?= base_url('admin/c_home/makanan') ?>"><i class="fa fa-folder"></i> Report Makanan</a>
          <a class="dropdown-item" href="<?= base_url('admin/c_home/meja') ?>"><i class="fa fa-folder"></i> Report Meja Rusak</a>
        </div>
      </li>
    </ul>
  <?php }else if($this->session->userdata('akses') == 2){ ?>
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('kasir/c_transaksi')?>">
          <i class="fas fa-fw fa-circle"></i>
          <span>Transaksi</span>
        </a>
      </li>
    </ul>
  <?php }else if($this->session->userdata('akses') == 3){?>
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('waiter/c_editOrderWaiter') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Waiter Order Menu</span>
        </a>
      </li>
    </ul>
  <?php }elseif($this->session->userdata('pelanggan')==5){?>
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('pelanggan/c_home') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('pelanggan/c_orderDetail') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Order</span>
        </a>
      </li>
    </ul>
  <?php }elseif($this->session->userdata('akses')==6){?>
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('koki/c_editOrderKoki') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Koki Order Menu</span>
        </a>
      </li>
    </ul>
  <?php }?>
  <div id="content-wrapper">
    <div class="container-fluid">
