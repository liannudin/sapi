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
        <li>Profile</li>
        
    </ol>
</section>

<!-- Main content -->


<section class="content">
<div class="row">
      <section class="col-lg-4 col-md-6"><!-- RIGHT CONTENT -->
             
             <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Edit Profile</h3>
                </div>
                <div class="box-body">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" placeholder="<?php echo $users['username'];?>" disabled>
                  </div>
                  <br/>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" placeholder="<?php echo $users['password'];?>" disabled>
                  </div>
                  <br/>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-flash"></i></span>
                    <input type="text" class="form-control" placeholder="<?php echo $users['nama'];?>" disabled>
                  </div>
                  <br/>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-home"></i></span>
                    <input type="text" class="form-control" placeholder="<?php echo $users['alamat'];?>" disabled>

                  </div>
                  <br/>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                    <input type="text" class="form-control" placeholder="<?php echo $users['website'];?>" disabled>
                  </div>
                  <br/>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="email" class="form-control" placeholder="<?php echo $users['email'];?>" disabled>
                  </div>
                  <br/>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input  type="text" name="tgl" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" placeholder="<?php echo $users['tgl'];?>" data-mask disabled/>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  
                  <br/>
                   <a href="<?php echo base_url('admin/profile/edit/').$users['id_user'];?>" class="btn btn-warning btn-xs" role="button">Edit</a>
                   
           
     </section> <!-- /.RIGHT CONTENT -->

     <section class="col-lg-4 col-md-6 connectedSortable">  
        <div class="box box-success">
                <div class='box-header'>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
            <div class="thumbnail">
            <img class="img-responsive" src="<?php echo base_url('/assets/uploads/avatar/'.$users['avatar']); ?>" alt="">
                
               </div>                                                       
                </div>
        </div>
       

            


            
        </section><!-- right col -->

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
