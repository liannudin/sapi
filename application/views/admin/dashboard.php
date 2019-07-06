<?php
$this->load->view('template/admin/head');
$this->load->view('template/admin/topbar');
$this->load->view('template/admin/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Main row -->
    <div class="row">

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="glyphicon glyphicon-file"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Artikel</span>
                  <span class="info-box-number"><?php echo $artikel['count(*)'];?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-list"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Kategori</span>
                  <span class="info-box-number"><?php echo $kategori['count(*)'];?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-picture"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Gambar</span>
                  <span class="info-box-number"><?php echo $gambar['count(*)'];?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-user"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Users</span>
                  <span class="info-box-number"><?php echo $user['count(*)'];?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
                              

        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
        <!-- quick email widget -->
            <div class="box box-info">
                <div class="box-header">
                    <i class="ion ion-edit"></i>
                    <h3 class="box-title">Quick Post</h3>
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
                        <div>
                            <textarea class="textarea" placeholder="Your Posting Here" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                    </form>
                </div>
                <div class="box-footer clearfix">
                    <button class="pull-right btn btn-default" id="postNow">Post Now <i class="fa fa-arrow-circle-right"></i></button>
                </div>
            </div>

            

            
        </section><!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

            <!-- Map box -->
            <div class="box box-solid bg-light-blue-gradient">
                <div class="box-header">
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>
                        <button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                    </div><!-- /. tools -->

                    <i class="fa fa-map-marker"></i>
                    <h3 class="box-title">
                        Visitors
                    </h3>
                </div>
                <div class="box-body">
                    <div id="world-map" style="height: 250px; width: 100%;"></div>
                </div><!-- /.box-body-->
                <div class="box-footer no-border">
                    <div class="row">
                        <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                            <div id="sparkline-1"></div>
                            <div class="knob-label">Visitors</div>
                        </div><!-- ./col -->
                        <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                            <div id="sparkline-2"></div>
                            <div class="knob-label">Online</div>
                        </div><!-- ./col -->
                        <div class="col-xs-4 text-center">
                            <div id="sparkline-3"></div>
                            <div class="knob-label">Exists</div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->
                </div>
            </div>
            <!-- /.box -->

            
            
                </div>
            </div><!-- /.box -->

        </section><!-- right col -->
    </div><!-- /.row (main row) -->

</section><!-- /.content -->

<?php
$this->load->view('template/admin/foot');
?>