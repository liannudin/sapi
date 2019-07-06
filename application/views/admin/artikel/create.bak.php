<?php
$this->load->view('template/admin/head');
$this->load->view('template/admin/topbar');
$this->load->view('template/admin/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Create New Post</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('admin/dashboard')?>">Dashboard</a></li>
        <li><a href="<?php echo base_url('admin/artikel/semua')?>">Artikel</a></li>
        <li>Create</li> 
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Main row -->
    <div class="row">
       
  <!-- Left col -->
        <section class="col-lg-8 connectedSortable">
        <!-- quick email widget -->
            <div class="box box-info">
                <div class="box-header">
                    <i class="ion ion-edit"></i>
                    <h3 class="box-title">Add New Post</h3>
                    <!-- tools box -->
                   
                </div>
            </div>

            <div class="box box-success">
                <div class="box-body">
                    <form action="<?php echo base_url('article/create')?>" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="judul" placeholder="Judul Post"/>
                        </div>                                                              
                </div>
            </div>

            
            <div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>Your Posting Here</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class='box-body pad'>
                  
                    <textarea class="textarea" name="deskripsi" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  
                </div>
              </div>
            
        </section><!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-3 connectedSortable">         
            <div class="thumbnail">
                <div class="btn-group">
                <input type="submit" name="submit" value="Publish" class="btn btn-primary"/>
                </div>

                <div class="btn-group">
                      <button type="button" class="btn btn-warning">Draft</button>
                </div>
              <div class="btn-group">
                      <button type="button" class="btn btn-danger">Cancel</button>
                </div>
            </div>
            <div class="box box-success">
                <div class='box-header'>
                  <h3 class='box-title'>Image</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                          <div class="thumbnail">
                            <img class="img-responsive" src="#" alt="">                            
                          </div>
                          <p><a href="#" class="btn btn-danger btn-xs " role="button">Delete</a></p>
                    </div>
                                           
                </div>
            </div>
            
            <div class="box box-success">
                <div class='box-header'>
                  <h3 class='box-title'>Kategori</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                        <div class="form-group">
                        
                        <?php foreach ($kategori as $k) {
                        #<input type="radio" name="kategori">
                            echo "<input type='radio' name='kategori' value='$k->id_kategori'>
                            $k->nama_kategori"  ;  
                            echo "<br>";                          
                        } 
                        ?>
                        </div>
                   
                          <a href="#" class="btn btn-primary btn-xs " role="button">Add New Category</a>                 
                </div>
            </div>

            <div class="box box-success">
                <div class='box-header'>
                  <h3 class='box-title'>Provinsi</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                        <div class="form-group">
                        
                        <?php foreach ($provinsi as $p) {
                        #<input type="radio" name="kategori">
                            echo "<input type='radio' name='provinsi' value='$p->id'>
                            $p->nama_prov"  ;  
                            echo "<br>";                          
                        } 
                        ?>
                        </div>


                   
                          <a href="#" class="btn btn-primary btn-xs " role="button">Add New Provinsi</a>                 
                </div>
            </div>
        
               
        </form>
            


            
        </section><!-- right col -->

    </div><!-- /.row (main row) -->

</section><!-- /.content -->
<?php
$this->load->view('template/admin/foot');
?>