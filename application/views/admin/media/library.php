<?php
$this->load->view('template/admin/head');
$this->load->view('template/admin/topbar');
$this->load->view('template/admin/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Library</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('admin')?>">Dashboard</a></li>
        <li>Library</li>
    </ol>
</section>
   

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">Image Library</h1>
            </div>
            <div class="col-lg-12">
                <a href="<?php echo base_url('/admin/media/upload/mass_upload');?>" class="btn btn-sm btn-success btn-flat" role="button">Add Media</a><br/><br/>
            </div>

            <table >
            <?php if(!empty($gambar)): foreach ($gambar as $n):?>
            
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="thumbnail">
            <img class="img-responsive" src="<?php echo base_url('assets/uploads/'.$n->nama); ?>" alt="<?php echo $n->nama; ?>">
                <div class="caption">
                <h4><?php echo $n->judul; ?></h4>
                <p style="font-size:10px;">Provinsi - <?php echo $n->nama_prov;?></p>
                <p><?php echo $n->keterangan;?></p>
                <i><p style="font-size:10px;color:blue;">Uploaded On <?php echo date("j M Y H:i:m",strtotime($n->created)); ?></p></i>

                <p><a href="<?php echo base_url('admin/media/edit/').$n->id; ?>" class="btn btn-info btn-xs" role="button">Edit</a> 
                <a href="<?php echo base_url('admin/media/delete/').$n->id; ?>" class="btn btn-danger btn-xs" role="button">Hapus</a></p>
                </div>
               </div>
             </div>
         <?php endforeach;  else:?>
         <H3>No File Found in here....</H3>
                    <?php endif; ?>
<!--
            <?php if(!empty($data)): foreach ($data as $n):?>
            
            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-12">
                <div class="thumbnail">
            <img class="img-responsive" src="<?php echo base_url('assets/uploads/'.$n['nama']); ?>" alt="">
                <div class="caption">
                <h4><?php echo $n['judul']; ?></h4>
                <p><?php echo $n['keterangan'];?></p>
                <i><p >Uploaded On <?php echo date("j M Y H:i:m",strtotime($n['created'])); ?></p></i>

                <p><a href="<?php echo base_url('admin/media/edit/').$n['id']; ?>" class="btn btn-info btn-xs" role="button">Edit</a> 
                <a href="<?php echo base_url('admin/media/delete/').$n['id']; ?>" class="btn btn-danger btn-xs" role="button">Hapus</a></p>
                </div>
               </div>
             </div>
         <?php endforeach;  else:?>
         <H3>No File Found in here....</H3>
                    <?php endif; ?>-->
                    </table>
     </div>

    </div>
    <!-- /.container -->
</section><!-- /.content -->



<?php
$this->load->view('template/admin/foot');
?>
