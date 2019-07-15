<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit Data Sapi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/ion-rangeslider/css/ion.rangeSlider.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url("assets/dist/css/adminlte.min.css")?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="<?php echo base_url() ?>assets/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
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
            <h1>Tambah Baru</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6 offset-md-3">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action='<?php echo base_url("index.php/crud/testing_edit/") ?>' method="post">
                <div class="card-body">
                  <input type="hidden" name='id_kriteria' value="<?php echo $sapi['kriteria']->id_kriteria ?>">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alternatif</label>
                    <select class="form-control" name="id_alternatif">
                  <?php foreach($sapi['alternatif'] as $sp): ?>
                  <?php $selected = $sp->id_alternatif === $sapi['kriteria']->id_alternatif ? 'selected="selected"' : '' ?>
                      <option <?php echo $selected ?> value="<?php echo $sp->id_alternatif ?>"><?php echo $sp->jenis_sapi ?></option>
                <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Berat</label>
                    <input id="berat" type="text" name="berat" value="">
                    <!-- <input type="email" class="form-control" placeholder="Berat"> -->
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Umur</label>
                    <input id="umur" type="text" name="umur" value="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tinggi</label>
                    <input id="tinggi" type="text" name="tinggi" value="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Panjang Tanduk</label>
                    <input type="number" class="form-control" name="panjang_tanduk" value="<?php echo $sapi['kriteria']->panjang_tanduk ?>" placeholder="Panjang Tanduk">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kondisi</label>
                    <select class="form-control" name="kondisi">

                      <option <?php echo $selected = $sapi['kriteria']->kondisi === 'Sangat Buruk' ? 'selected' : '' ?> value="Sangat Buruk">Sangat Buruk</option>
                      <option <?php echo $selected = $sapi['kriteria']->kondisi === 'Buruk' ? 'selected' : '' ?> value="Buruk">Buruk</option>
                      <option <?php echo $selected = $sapi['kriteria']->kondisi === 'Baik' ? 'selected' : '' ?> value="Baik">Baik</option>
                      <option <?php echo $selected = $sapi['kriteria']->kondisi === 'Sangat Baik' ? 'selected' : '' ?> value="Sangat Baik">Sangat Baik</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nilai</label>
                    <select class="form-control" name="nilai">
                      <option <?php echo $selected = $sapi['kriteria']->nilai === '1' ? 'selected' : '' ?> >1</option>
                      <option <?php echo $selected = $sapi['kriteria']->nilai === '2' ? 'selected' : '' ?> >2</option>
                      <option <?php echo $selected = $sapi['kriteria']->nilai === '3' ? 'selected' : '' ?> >3</option>
                      <option <?php echo $selected = $sapi['kriteria']->nilai === '4' ? 'selected' : '' ?> >4</option>
                    </select>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

          </div>
          <!--/.col (left) -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>




</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/dist/js/demo.js"></script>
<!-- page script -->
<script type="text/javascript" defer="defer">
  
  $(function() {
     $('#umur').ionRangeSlider({
          min     : 1,
          max     : 22,
          from    : <?php echo $sapi['kriteria']->umur[0] ?>,
          to      : <?php echo $sapi['kriteria']->umur[1] ?>,
          type    : 'double',
          step    : 1,
          postfix : ' bulan',
          prettify: false,
          hasGrid : true
        });
     $('#tinggi').ionRangeSlider({
          min     : 0,
          max     : 150,
          from    : <?php echo $sapi['kriteria']->tinggi[0] ?>,
          to      : <?php echo $sapi['kriteria']->tinggi[1] ?>,
          type    : 'double',
          step    : 1,
          postfix : ' cm',
          prettify: false,
          hasGrid : true
        });
     $('#berat').ionRangeSlider({
          min     : 0,
          max     : 1200,
          from    : <?php echo $sapi['kriteria']->berat[0] ?>,
          to      : <?php echo $sapi['kriteria']->berat[1] ?>,
          type    : 'double',
          step    : 1,
          postfix : ' kg',
          prettify: false,
          hasGrid : true
        });
  })
</script>
</body>
</html>
