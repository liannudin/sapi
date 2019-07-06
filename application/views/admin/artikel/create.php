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
        <section class="col-lg-8 col-md-6 connectedSortable">
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
    <form enctype="multipart/form-data" action="<?php echo base_url('/admin/article/create')?>" method="post">
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
        <section class="col-lg-4 col-md-6 connectedSortable">         
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

          <div class="box imageupload panel panel-default">
                <div class='box-header'>
                  <h3 class='box-title'>Image</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                <div class="panel-heading clearfix">

                    <h3 class="panel-title pull-left"></h3>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default active">File</button>
                        <button type="button" class="btn btn-default">URL</button>
                    </div>
                </div>
                <div class="file-tab panel-body">
                    <label class="btn btn-default btn-file">
                        <span>Browse</span>
                        <!-- The file is stored here. -->
                        <input type="file" name="foto">
                    </label>
                    <button type="button" class="btn btn-default">Remove</button>
                </div>
                <div class="url-tab panel-body">
                    <div class="input-group">
                        <input type="text" class="form-control hasclear" placeholder="Image URL">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-default">Remove</button>
                    <!-- The URL is stored here. -->
                    <input type="hidden" name="image-url">
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
                       <input type='radio' name='kategori' value='<?php echo $default_category['id_kategori'];?>' checked=""> <?php echo $default_category['nama_kategori'];?>
                       
                        </div>
                                   
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
                    <table id="provinsi">
                        <div class="form-group">
                        
                        <?php foreach ($provinsi as $p) {
                        #<input type="radio" name="kategori">
                            echo "<input type='radio' name='provinsi' value='$p->id'>
                            $p->nama_prov"  ;  
                            echo "<br>";                          
                        } 
                        ?>
                        <input type='radio' name='provinsi' value='<?php echo $default_provinsi['id'];?>' checked=""> <?php echo $default_provinsi['nama_prov'];?>
                       
                        </div>
                                          
                </table>

               
    </form>
                        <button class="btn btn-primary btn-xs" onclick="add_provinsi()">Add New Provinsi</button>
                       
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

 <script type="text/javascript">
  $(document).ready( function () {
      $('#provinsi').DataTable();
  } );
    var save_method; //for save method string
    var table;


    function add_provinsi()
    {
      save_method = 'add_provinsi';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }





    function save()
    {
      var url;
      if(save_method == 'add_provinsi')
      {
          url = "<?php echo site_url('/admin/provinsi/provinsi_add')?>";
      }
      
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

    function delete_provinsi(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('admin/provinsi/provinsi_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

      }
    }

  </script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Add New Category</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_kategori"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Kategori</label>
                            <div class="col-md-9">
                                <input name="nama_prov" placeholder="Nama Kategori" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                       <!-- <div class="form-group">
                            <label class="control-label col-md-3">Kategori</label>
                            <div class="col-md-9">
                                <input name="kategori" placeholder="kategori" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div> -->
                        <!--<div class="form-group">
                            <label class="control-label col-md-3">Deskripsi</label>
                            <div class="col-md-9">
                                <textarea name="deskripsi" placeholder="Deskripsi" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>-->
                      <!--  <div class="form-group" id="photo-preview">
                            <label class="control-label col-md-3">Image</label>
                            <div class="col-md-9">
                                (No photo)
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="label-photo">Upload Image</label>
                            <div class="col-md-9">
                                <input name="photo" type="file">
                                <span class="help-block"></span>
                            </div>
                        </div>-->
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal --