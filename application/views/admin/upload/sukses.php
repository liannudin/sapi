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
    <!-- Main row -->
    <div class="row">
       


  <!-- Left col -->
        <section class="col-lg-12 col-md-3">
        <!-- quick email widget -->
            <div class="box box-info">
                <div class="box-header">
                    <i class="ion ion-edit"></i>
                    <h3 class="box-title">Upload Sukses !</h3>
                    <!-- tools box -->
                    <br>
                    
                </div>
                <div class="box-body">
                  <?php foreach ($gambar as $row):?>

                  Your Image <?php echo $row['nama']; ?> Successfully Upload !

                  <?php endforeach; ?>

<!--
                 <?php echo $error;?>

                    <?php echo form_open_multipart('admin/do_upload');?>


                <table class="table table-striped">

                         <tr>
                          <td style="width:15%;">File Foto</td>
                          <td>
                            <div class="col-sm-6">
                                <input type="file" name="foto" class="form-control">
                            </div>
                            </td>
                         </tr>
                         <tr>
                          <td style="width:15%;">Judul Foto</td>
                          <td>
                            <div class="col-sm-6">
                                <input name="judul" placeholder="Judul Foto" class="form-control" type="text">
                            </div>
                            </td>
                         </tr>
                         
                         <tr>
                          <td style="width:15%;">Keterangan Foto</td>
                          <td>
                            <div class="col-sm-10">
                                <textarea name="keterangan" class="form-control"></textarea>
                            </div>
                            </td>
                         </tr>
                         <tr>
                          <td colspan="2">
                            <input type="submit" class="btn btn-success" value="Simpan">
                            <button type="reset" class="btn btn-default">Batal</button>
                          </td>
                         </tr>
                       </table>

                <br /><br />



                </form>
                </div>
                <div class="box-footer clearfix">

                    
                </div>
            </div>

           -->


            
        </section><!-- /.Left col -->
    </div><!-- /.row (main row) -->

</section><!-- /.content -->
<?php
$this->load->view('template/admin/foot');
?>