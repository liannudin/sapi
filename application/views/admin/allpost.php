<?php
$this->load->view('template/admin/head');
$this->load->view('template/admin/topbar');
$this->load->view('template/admin/sidebar');
 ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>All Post</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('admin')?>">Dashboard</a></li>
        <li>All Post</li>
    </ol>
</section>

<!-- Main content -->


<section class="content">
<div class="row">
<div class="col-xs-12">

              <div class="box">
                <div class="box-header">                

                  <br/>
                  <a href="<?php echo base_url('admin/artikel/create')?>" class=" btn btn-success">
                  <i class="glyphicon glyphicon-plus"></i>Tambah Artikel</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="nomer1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Slug</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th>Provinsi</th>
                        <th>Gambar</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                     

                      
                      <?php $no=1;
                      foreach ($record as $row) {
                      echo "<tr>
                      <td>$no</td>
                      <td>$row->judul</td>
                      <td>$row->slug</td>
                      <td>$row->deskripsi</td>
                      <td>$row->nama_kategori</td>
                      <td>$row->nama_prov</td>
                      <td><img src='$row->thumb'></td>
                      <td>
                      ".anchor('admin/artikel/edit/'.$row->id,'Edit')."<br>
                      ".anchor('admin/artikel/hapus/'.$row->id,'Hapus')."<br>  
                      ".anchor('admin/artikel/view/'.$row->slug,'Lihat')."
                      </td>
                      </tr>";

                        $no++;}

                      ?>
                   

                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Slug</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th>Provinsi</th>
                        <th>Gambar</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
         
</div>
</section><!-- /.content -->

<?php
$this->load->view('template/admin/foot');
?>

<script type="text/javascript">
  $(document).ready( function () {
      $('#nomer1').DataTable();
  } );
</script>



