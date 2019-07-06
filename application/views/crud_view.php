<html>
<head>
	<title>SAPI</title>


<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert/sweetalert.css'); ?>">
<script type="text/javascript" src="<?php echo base_url('assets/js.cookie.min.js')?>"></script>

<script type="text/javascript">
	var base_url = 'http://localhost/x/index.php/crud/'
</script>
<script type="text/javascript">
</script>
<script type="text/javascript" src="<?php echo base_url('assets/jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/page.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/sweetalert/sweetalert.min.js'); ?>"></script>

<style type="text/css">

td {
	cursor: pointer;
}

.editor{
	display: none;
}
select.selectpicker {
      display: block;
      margin: 0 auto;
      padding-left: 20px;
}
.btn-new {
      background-color: #2A3F54;
}
.img-center {margin:0 auto;}

</style>



</head>
<body>


<div class="container">

<div class="row">
<h2>Penentuan Bibit SAPI</h2>
	<div class="col-md-6" >
		<img src="<?php echo base_url();?>/assets/loader.gif" id="loading" class="img-responsive img-center" style="display:none;margin-top:70px"/>
		<div id="show-tables-matriks" style="display: none">					
		</div>
	</div>
	<div class="col-md-3">
		<h3>Matrik</h3>
		<?php if($this->security->get_csrf_hash() == $cook->cookie) {?>
					<table id="table-data-matrik" class="table table-striped table-bordered" >
						<thead>
							<tr>
								<th>Alternatif</th>
								<th>C1</th>
								<th>C2</th>
								<th>C3</th>
								<th>C4</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody id="table-body-matriks">
							<?php foreach ($matriksInput as $matriks => $mi) { ?>
							<tr>
								<td><span><?php echo $mi->id_alternatif?></span></td>
								<td><span><?php echo $mi->c1?></span></td>
								<td><span><?php echo $mi->c2?></span></td>
								<td><span><?php echo $mi->c3?></span></td>
								<td><span><?php echo $mi->c4?></span></td>
								<td><a class="btn btn-xs btn-danger hapus-matriks" data-id="<?php echo $mi->id_input ?>"><i class='glyphicon glyphicon-remove'></i> Hapus</a></td>
							</tr>
							<?php } ?>
							
						</tbody>

					</table>
					<button class="btn btn-info" id="tambah-data"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Matrik</button>
			<?php }else {?>
					<table id="table-data-matrik" class="table table-striped table-bordered" >
					<thead>
						<tr>
							<th>Alternatif</th>
							<th>C1</th>
							<th>C2</th>
							<th>C3</th>
							<th>C4</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="table-body-matriks">
						<tr>
							<td colspan="6" id="loader-table"  style="display:none;margin-top:70px">
								<img src="<?php echo base_url();?>/assets/loader-table.gif" class="img-responsive img-center"/>
							</td>
						</tr>
					</tbody>
					</table>
					<button class="btn btn-info" id="tambah-data"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Matrik</button>
		<?php } ?>
			
		<h3>Bobot (W)</h3>
		<?php if($this->security->get_csrf_hash() == $cook->cookie) {?>
				<table id="table-data" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Berat</th>
							<th>Umur</th>
							<th>Tinggi</th>
							<th>Panjang Tanduk</th>
						</tr>
					</thead>
					<tbody id="table-body-bobot">
					<?php foreach ($bobotW as $b => $bw) { ?>
						<tr>
							<td><span><?php echo $bw->berat?></span></td>
							<td><span><?php echo $bw->umur?></span></td>
							<td><span><?php echo $bw->tinggi?></span></td>
							<td><span><?php echo $bw->panjang_tanduk?></span></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
		<?php }else {?>
				<table id="table-data" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Berat</th>
							<th>Umur</th>
							<th>Tinggi</th>
							<th>Panjang Tanduk</th>
						</tr>
					</thead>
					<tbody id="table-body-bobot">
						<tr>
							<td colspan="6" id="loader-table-bobot"  style="display:none;margin-top:70px">
								<img src="<?php echo base_url();?>/assets/loader-table.gif" class="img-responsive img-center"/>
							</td>
						</tr>
					</tbody>
				</table>
		<?php } ?>
		<?php if(!empty($bobotW)){?>
			<button class="btn btn-success" id="next-step"><i class="glyphicon glyphicon-plus-sign"></i> Submit</button>
		<?php }else{ ?>
			<button class="btn btn-info" id="tambah-bobot"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Bobot</button>
			<button class="btn btn-success" id="next-step" style="display: none"><i class="glyphicon glyphicon-plus-sign"></i> Submit</button>
		<?php } ?>
				
	</div>
	<div class="col-md-3 pull-right" style="">
		<button class="btn btn-danger btn-md pull-right" id="reset"><i class="glyphicon glyphicon-plus-sign"></i> Reset</button>
		<a href="<?php echo base_url("index.php/login") ?>" class="btn btn-primary btn-md pull-right"><i class="glyphicon glyphicon-plus-sign"></i> Login</a></br>
	</div>
</div>
<div clas="col-md-5">
<?php if (!empty($x) || !empty($xij)) { ?>
	<div id="matrik_x" style="display: none">
	</div>	
<?php } ?>
			
</div>
<div>
<?php if (!empty($xij)) { ?>
	<h3>Matrik R </h3>
			<table id="table-data" class="table table-striped table-bordered">

				<thead>
					<tr>
						<th>Alternatif</th>
						<th>C1</th>
						<th>C2</th>
						<th>C3</th>
						<th>C4</th>
					</tr>
				</thead>

				<tbody id="table-body">
					<?php foreach ($xij as $xij => $nilai) { ?>
					<tr>
						<td><?php echo $nilai->id_alternatif ?></td>

						<td><?php echo $nilai->c1/$max_c1->c1 ?></td>
						<td><?php echo $nilai->c2/$max_c2->c2 ?></td>
						<td><?php echo $nilai->c3/$max_c3->c3 ?></td>
						<td><?php echo $nilai->c4/$max_c4->c4 ?></td>
					</tr>
					<?php } ?>
				</tbody>

			</table>
<?php } ?>

</div>

<div>
<?php if (!empty($x) && !empty($w)) { ?>
	<h3>Perangkingan</h3>
<table id="table-data" class="table table-striped table-bordered">

				<thead>
				<tr>
				<th>Alternatif</th>
				<th>Nilai</th>
				</tr>
				</thead>



				<tbody id="table-body">
				<?php if (!empty($x)) {
					if (!empty($w)) { ?>
						<?php foreach ($x as $xij => $nilai) {  ?>
							<tr>
								<td><?php echo $nilai->id_alternatif ?></td>
								<td><?php echo $hasil = (($w->berat) * ($nilai->c1/$max_c1->c1))+(($w->umur)*($nilai->c2/$max_c2->c2))+(($w->tinggi)*($nilai->c3/$max_c3->c3))+(($w->panjang_tanduk)*($nilai->c2/$max_c4->c4))?></td>
							</tr>
				<?php 		}
					}else{ ?>
					<tr>
						<td colspan="2"><h4 class="text-center text-danger">Matriks X sudah dimasukkan, namun Anda belum memasukkan W(bobot) Silahkan input terlebih dahulu kemudian coba lagi</h4></td>
					</tr>
					<?php }
				}else{ ?>
					<tr>
						<td colspan="2"><h4 class="text-center text-danger">Anda belum memasukkan Matriks X Silahkan input terlebih dahulu kemudian coba lagi</h4></td>
					</tr>
				<?php	} ?>
				
				</tbody>

				</table>
<?php } ?>

</div>

</div>








</body>
</html>