
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Pemilik - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ?>assets_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>assets_admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #fd7792;">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pemilik INDEKOS</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('index.php/pemilik/') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <li class="nav-item active">
        <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('index.php/pemilik/booking') ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Booking</span>
        </a>
      </li>

      <li class="nav-item active">
        <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('index.php/pemilik/data_tamu') ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Tamu</span>
        </a>
      </li>

       <li class="nav-item active">
        <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('index.php/pemilik/pemasukan') ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pemasukan</span>
        </a>
      </li>

       <li class="nav-item active">
        <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url('index.php/pemilik/pengeluaran') ?>">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pengeluaran</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Data Kos</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu:</h6>
            <a class="collapse-item" href="<?php echo base_url('index.php/pemilik/input_data_kos'); ?>">Input Data Kos</a>
            <a class="collapse-item" href="<?php echo base_url('index.php/pemilik/view_data_kos'); ?>">View Data Kos</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Tables -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
