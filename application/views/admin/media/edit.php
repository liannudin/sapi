<?php
$this->load->view('template/admin/head');
$this->load->view('template/admin/topbar');
$this->load->view('template/admin/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Edit Media Description</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('admin/dashboard')?>">Dashboard</a></li>
        <li><a href="<?php echo base_url('admin/media')?>">Media</a></li>
        <li>Edit</li> 
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Main row -->
    <div class="row">
       
  <!-- Left col -->
        <section class="col-lg-8 col-md-6 connectedSortable">
        <!-- quick email widget -->
            <div class="box box-info">
                <div class="box-header">
                    <i class="ion ion-edit"></i>
                    <h3 class="box-title">Edit Media</h3>
                    <!-- tools box -->
                   
                </div>
            </div>

            <div class="box box-success">
                <div class='box-header'>
                  <h3 class='box-title'>Judul</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
            <form enctype="multipart/form-data" action="<?php echo base_url('/admin/library/edit')?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $record['id']?>">
                        <div class="form-group">
                            <input type="text" class="form-control" name="judul" placeholder="Judul Media" value="<?php echo $record['judul']?>"/>
                        </div>                                                              
                </div>
            </div>

            
            <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Keterangan</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class='box-body pad'>
                    <textarea  class="textarea" name="keterangan" placeholder="Place some text here" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ><?php echo $record['keterangan']?>
                    	
                    </textarea>
                  
                </div>
              </div>
            
        </section><!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-4 col-md-6 connectedSortable">  
        <div class="box box-success">
                <div class='box-header'>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                 <div class="btn-group">
                    <input type="submit" name="submit" value="Save" class="btn btn-primary btn-sm"/>
                    
                 </div>   
                 <div class="btn-group">
                   
                    <a href="<?php echo base_url('admin/media'); ?>" class="btn btn-danger btn-sm" role="button">Cancel</a> 
                 </div>                                                           
                </div>
        </div>
       <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="thumbnail">
            <img class="img-responsive" src="<?php echo base_url('assets/uploads/'.$record['nama']); ?>" alt="">
            <div class="form-group">
                         <h3>Provinsi</h3>
                        <?php foreach ($provinsi as $p) {
                        #<input type="radio" name="kategori">
                            echo "<input type='radio' name='provinsi' value='$p->id'";
                            echo $record['provinsi']==$p->id?'checked':'';
                            echo ">$p->nama_prov"  ;  
                            echo "<br>";                          
                        } 
                        ?>
                        </div>

                        </div>
                   
                         
             </div>
            

            


            
        </section><!-- right col -->

    </div><!-- /.row (main row) -->

</section><!-- /.content -->
<?php
$this->load->view('template/admin/foot');
?>

<script>
            var $imageupload = $('.imageupload');
            $imageupload.imageupload();

            $('#imageupload-disable').on('click', function() {
                $imageupload.imageupload('disable');
                $(this).blur();
            })

            $('#imageupload-enable').on('click', function() {
                $imageupload.imageupload('enable');
                $(this).blur();
            })

            $('#imageupload-reset').on('click', function() {
                $imageupload.imageupload('reset');
                $(this).blur();
            });
        </script>

