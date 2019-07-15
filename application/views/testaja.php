<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Sapi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url("assets/dist/css/adminlte.min.css")?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
 
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="<?php echo base_url() ?>assets/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="<?php echo base_url() ?>crud/testing" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Data
                </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>crud/logout" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Logout
                </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Sapi</h1>
          </div>
          </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              
				<?php echo anchor("crud/testing_tambah/", '<i class="fas fa-check"></i> Tambah Baru', 'class="btn btn-sm btn-primary float-right"') ?>
			</div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                	<th>Nama</th>
                  <th>Berat</th>
                  <th>Umur</th>
                  <th>Tinggi</th>
                  <th>Panjang Tanduk</th>
                  <th>Kondisi</th>
                  <th>Nilai
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                	<?php foreach ($sapi as $sp): ?>
                <tr>
                	<td><?php echo $sp->jenis_sapi ?></td>
                  <td><?php echo $sp->berat ?></td>
                  <td><?php echo $sp->umur ?>
                  </td>
                  <td><?php echo $sp->tinggi ?></td>
                  <td><?php echo $sp->panjang_tanduk ?></td>
                  <td><?php echo $sp->kondisi ?></td>
                  <td><?php echo $sp->nilai ?></td>
                  <td>
                  	<?php echo anchor("crud/testing_edit/$sp->id_kriteria", '<i class="fas fa-edit"></i> Edit', 'class="btn btn-sm btn-warning"') ?>
                  	<?php echo anchor("crud/testing_delete/$sp->id_kriteria", '<i class="fas fa-times"></i> Delete', 'class="btn btn-sm btn-danger"') ?>
                  </td>
                </tr>
            <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

 

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
  });
</script>
</body>
</html>
