<?php
$this->load->view('template/admin/head');
$this->load->view('template/admin/topbar');
$this->load->view('template/admin/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Edit Profile</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('admin/dashboard')?>">Dashboard</a></li>
        <li><a href="<?php echo base_url('admin/profile')?>">Profile</a></li>
        <li>Edit Profile</li>
    </ol>
</section>

<!-- Main content -->


<section class="content">
<div class="row">
      <section class="col-lg-4 col-md-6"><!-- RIGHT CONTENT -->
             <form enctype="multipart/form-data" action="<?php echo base_url('profile/save')?>" method="post">
             <input type="hidden" name="id" value="<?php echo $record['id_user']?>">
             <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Edit Profile</h3>
                </div>
                <div class="box-body">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $record['username'];?>">
                  </div>
                  <br/>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $record['password'];?>">
                  </div>
                  <br/>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-flash"></i></span>
                    <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $record['nama'];?>">
                  </div>
                  <br/>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-home"></i></span>
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $record['alamat'];?>">

                  </div>
                  <br/>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                    <input type="text" name="website" class="form-control" placeholder="Website" value="<?php echo $record['website'];?>">
                  </div>
                  <br/>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $record['email'];?>">
                  </div>
                  <br/>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="tgl" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php echo $record['tgl'];?>"/>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
                    <input type="file" name="avatar" class="form-control" placeholder="Website" >
                  </div>
                  <br/>
                   <button type="submit" class="btn btn-primary btn-sm btn-flat right">Save</button>
            </form>
     </section> <!-- /.RIGHT CONTENT -->
</div>
</section><!-- /.content -->

<?php
$this->load->view('template/admin/foot');
?>
<script type="text/javascript">
      $(function () {
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        $("[data-mask]").inputmask();
        $('#daterange-btn').daterangepicker(
                {
                  ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                  },
                  startDate: moment().subtract('days', 29),
                  endDate: moment()
                },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

      });
    </script>
