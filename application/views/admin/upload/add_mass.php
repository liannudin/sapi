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
                    <i class="ion ion-upload"></i>
                    <h3 class="box-title">Mass Uploader</h3>
                    <!-- tools box -->
                    <br>
                    
                </div>
                <div class="box-body">

                     <p><?php echo $this->session->flashdata('statusMsg'); ?></p>
                 
                <form enctype="multipart/form-data" action="<?php echo base_url('admin/library/mass_upload');?>" method="post">
            <table class="table table-striped">

                         <tr>
                          <td style="width:15%;">File Foto</td>
                          <td>
                            <div class="col-sm-6">
                                <input type="file" name="userFiles[]" multiple class="form-control">
                            </div>
                            </td>
                         </tr>
                         <tr>
                           <td style="width:150px;">
                            <p>Select Provinsi</p>
                            <div class="col-sm-12 col-lg-12">
                             <?php foreach ($gambar as $p) {
                        #<input type="radio" name="kategori">
                            echo "<input type='radio' name='provinsi' value='$p->id'>$p->nama_prov";echo "<br/>";
                        } 
                        ?>
                        <input type='radio' name='provinsi' value='<?php echo $default_provinsi['id'];?>' checked=""> <?php echo $default_provinsi['nama_prov'];?>
                          </div>
                           </td>

                         </tr>
                         <tr>
                          <td colspan="2">
                            <input type="submit" class="btn btn-success" name="fileSubmit" value="Upload">
                            <button type="reset" class="btn btn-default">Batal</button>
                          </td>
                         </tr>
                       </table>
            
            </form>
            <p style="font-size:10px;color:red;">All Field Are Required</p>
            <p>Tidak bisa upload menggunakan mass uploader ? Coba <a href="<?php echo base_url('admin/media/upload/single_upload');?>">single upload</a> dari kami. </p>
            <p>Klik untuk melihat <a href="<?php echo base_url('admin/media');?>">media</a></p>

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