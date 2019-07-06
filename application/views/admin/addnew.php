<?php
$this->load->view('template/admin/head');
$this->load->view('template/admin/topbar');
$this->load->view('template/admin/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>New Post</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('admin')?>">Dashboard</a></li>
        <li>Add New Post</li>
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
                    <div class="pull-right box-tools">
                        <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div><!-- /. tools -->
                </div>
                <div class="box-body">
                    <form action="#" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control" name="title" placeholder="Judul Post"/>
                        </div>
                    <h5><b>Slug</b></h5>
                        <div>
                            <textarea class="textarea" placeholder="Your Posting Here" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                    </form>
                </div>
                <div class="box-footer clearfix">
                </div>
            </div>
            <div class='box'>
                <div class='box-header'>
                <i class="ion ion-edit"></i>
                  <h3 class='box-title'>Create New Post <small>Simple and fast</small></h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-default btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class='box-body pad'>
                  <form>
                    <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  </form>
                </div>
              </div>

            

            
        </section><!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-3 connectedSortable">         
            <div class="thumbnail">

                <div class="btn-group">
                      <button type="button" class="btn btn-primary">Publish</button>
                </div>
                <div class="btn-group">
                      <button type="button" class="btn btn-warning">Draft</button>
                </div>
              <div class="btn-group">
                      <button type="button" class="btn btn-danger">Cancel</button>
                </div>
            </div>


                <div class="thumbnail">
            <img class="img-responsive" src="#" alt="">
                <div class="caption">
                <h4>Thumbnail label</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, soluta, eligendi doloribus sunt minus amet sit debitis repellat. Consectetur, culpa itaque odio similique suscipit</p>
                <p><a href="#" class="btn btn-danger btn-xs" role="button">Delete</a></p>
                </div>
               </div>
               
               <h5><b>Kategori</b></h5>
                    <div class="form-group">
                    <label>
                      <input type="checkbox" class="minimal"/>
                    </label>
                    
                    </div>

            


            
        </section><!-- right col -->

    </div><!-- /.row (main row) -->

</section><!-- /.content -->
    


<?php
$this->load->view('template/admin/js');

$this->load->view('template/admin/foot');
?>