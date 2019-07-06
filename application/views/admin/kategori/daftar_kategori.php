<?php
$this->load->view('template/admin/head');
$this->load->view('template/admin/topbar');
$this->load->view('template/admin/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Kategori</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('admin')?>">Dashboard</a></li>
        <li>Kategori</li>
    </ol>
</section>

 <section class="content">
<div class="row">
<div class="col-xs-6 col-lg-6 col-md-6"> 

   
    <br />
    <button class="btn btn-success" onclick="add_category()"><i class="glyphicon glyphicon-plus"></i> Add Book</button>
    <br />
    <br />
    <table id="kategori" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Kategori</th>
          <th>Deskripsi</th>
          <th style="width:125px;">Action
          </p></th>
        </tr>
      </thead>
      <tbody>
          <tr> <td><?php $no=1; echo $no++ ?></td>
            <td><?php echo $default['nama_kategori']?></td>
            <td></td>
            <td></td>
          </tr>
    <?php $no=2;
    foreach($category as $kategori){?>
         <tr>
         <td><?php echo $no++ ?></td>
            <td><?php echo $kategori->nama_kategori;?></td>
            <td><?php echo $kategori->deskripsi;?></td>
            <td>
                <button class="btn btn-warning" onclick="edit_category(<?php echo $kategori->id_kategori;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
                <button class="btn btn-danger" onclick="delete_category(<?php echo $kategori->id_kategori;?>)"><i class="glyphicon glyphicon-remove"></i></button>


            </td>
          </tr>
         <?php }?>



      </tbody>

      <tfoot>
        <tr>
          <th>No</th>
          <th>Nama Kategori</th>
          <th>Deskripsi</th>
          <th style="width:125px;">Action
          </p></th>
        </tr>
      </tfoot>
    </table>
</div>
</section><!-- /.content -->

  <script type="text/javascript">
  $(document).ready( function () {
      $('#kategori').DataTable();
  } );
    var save_method; //for save method string
    var table;


    function add_category()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    //$('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title
    }

    function edit_category(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('/admin/kategori/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_kategori"]').val(data.id_kategori);
            $('[name="nama_kategori"]').val(data.nama_kategori);
            $('[name="deskripsi"]').val(data.deskripsi);
           
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Kategori'); // Set title to Bootstrap modal title

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
          url = "<?php echo site_url('admin/kategori/category_add')?>";
      }
      else
      {
        url = "<?php echo site_url('admin/kategori/category_update')?>";
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
               //$('#modal_form').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

    function delete_category(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('/admin/kategori/category_delete')?>/"+id,
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
                                <input name="nama_kategori" placeholder="Nama Kategori" class="form-control" type="text">
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
                        <div class="form-group">
                            <label class="control-label col-md-3">Deskripsi</label>
                            <div class="col-md-9">
                                <textarea name="deskripsi" placeholder="Deskripsi" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
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
<!-- End Bootstrap modal -->
<?php
$this->load->view('template/admin/foot');
?>