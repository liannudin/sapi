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


!-- Main content -->


<section class="content">
<div class="row">
<div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">All Post</h3><br/>
                

                  <br/>
                  <button class="btn btn-success" onclick="tambahData()"><i class="glyphicon glyphicon-plus"></i> Tambah Artikel</button>
                </div><!-- /.box-header -->
                <div class="box-body">
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
         
</div>
</section><!-- /.content -->

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
                    <h3 class="box-title">Single Uploader</h3>
                    <!-- tools box -->
                    <br>
                    
                </div>
                <div class="box-body">

                     <p><?php echo $this->session->flashdata('statusMsg'); ?></p>
                 
                <form enctype="multipart/form-data" action="<?php echo base_url('library/single_upload');?>" method="post">
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
                                <?php echo form_error('judul'); ?>
                            </div>
                            </td>
                         </tr>
                         
                         <tr>
                          <td style="width:15%;">Keterangan Foto</td>
                          <td>
                            <div class="col-sm-10">
                                <textarea name="keterangan" placeholder="Keterangan Foto" class="form-control"></textarea>
                                <?php echo form_error('keterangan'); ?>
                            </div>
                            </td>
                         </tr>
                         <tr>
                          <td colspan="2">
                            <input type="submit" class="btn btn-success" value="Simpan">
                            <button type="reset" class="btn btn-default">Batal</button>
                          </td>
                         </tr>
                       </table>            </form>
            <p>Tidak bisa upload menggunakan single uploader ? Coba <a href="<?php echo base_url('admin/mass_upload_library');?>">mass upload</a> dari kami</p>
            
        </section><!-- /.Left col -->
    </div><!-- /.row (main row) -->

</section><!-- /.content -->
<?php
$this->load->view('template/admin/foot');
?>

<script type="text/javascript">
  $(document).ready( function () {
      $('#nomer1').DataTable();
  } );
    var save_method; //for save method string
    var table;


    function tambahData()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function edit_artikel(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('admin/artikel_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="judul"]').val(data.judul);
            $('[name="deskripsi"]').val(data.deskripsi);
            $('[name="kategori"]').val(data.kategori);
            $('[name="provinsi"]').val(data.provinsi);


            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Artikel'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }



    function save()
    {
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('admin/artikel_add')?>";
      }
      else
      {
        url = "<?php echo site_url('admin/artikel_update')?>";
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

    function delete_artikel(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('admin/artikel_delete')?>/"+id,
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
        <h3 class="modal-title">New Post Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Judul Artikel</label>
              <div class="col-md-9">
                <input name="judul" placeholder="Judul Artikel" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Deskripsi</label>
              <div class="col-md-9">
                <input name="deskripsi" placeholder="Deskripsi" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Kategori</label>
              <div class="col-md-9">
                                <input name="kategori" placeholder="Kategori" class="form-control" type="text">

              </div>
            </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Provinsi</label>
                            <div class="col-md-9">
                                <input name="provinsi" placeholder="Provinsi" class="form-control" type="text">

                            </div>
                        </div>

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
  <!-- End Bootstrap modal -->