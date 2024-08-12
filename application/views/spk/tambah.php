	<?php $this->load->view('include/navbar'); ?>

<div class="container-fluid">
	<form class="" action="" method="post">
		<h3><i class="fa fa-bookmark"></i>  INPUT SPK BODY REPAIR</h3>
		<div class="row">
			<div class="col-lg-12">
				<div class="card border-secondary" >
					<div class="card-header text-white bg-secondary"><i class="fa fa-info-circle"></i>
						Informasi Transaksi
					</div>
					<div class="card-body">
						<div class="row">
							<div class="form-inline">
									&nbsp &nbsp<label class="col-sm-2" for="id" style="text-align: right;">NO. ESTIMASI</label>
									<div class="col-xs-3">
										<input class="form-control" type="text" name="no_est" id="no_est" value="<?= $kodeunik1 ?>" style="width:188px;" >
										<!-- <input class="form-control" type="text" name="no_est" id="no_est" value="<?= $kodespk ?>" style="width:188px;" readonly> -->
										<input class="form-control" type="text" name="no_spk" id="no_spk" value="" hidden>
									</div>
									<label class="col-sm-2" for="id">Tanggal</label>
									<div class="col-sm-2">
										<input class="form-control" type="date" name="tgl_spk" id="tgl_spk" value="<?php echo date('Y-m-d') ?>" style="width:188px;">
									</div>
							</div>


							<div class="custom-control custom-switch">
								<input type="checkbox" class="custom-control-input" id="customSwitch1" onclick="myFunction()">
								<label class="custom-control-label" for="customSwitch1">Asuransi</label>
								
							</div>
						</div>
						<hr>

						<div class="row">
							<div class="col">

								<div class="form-inline">
									<label class="col-sm-2" for="id" id="myDIV3" style="text-align: right;">Customer</label>
								<div class="input-group sm-3" id="myDIV">
									<input class="form-control"  type="text" name="customer" id="customer" value="-" style="width:455px;" readonly>
									<a href="javascript:void(0);" NAME="My Window Name" title="My title here"
										onClick='javascript:window.open("<?= base_url('spk/popcustomerdata'); ?>","Ratting",
										"width=550,height=400,left=450,top=200,toolbar=1,status=1,");'>
										<button class="btn btn-primary" type="button" style="height: 38px;" ><i class="fa fa-search"></i></button>
									</a>
							</div>
							</div>

								<div class="form-inline">
									<label class="col-sm-2" for="id" id="myDIV4" style="text-align: right;display:none;">Asuransi</label>
								<div class="input-group sm-3" id="myDIV2" style="display:none;">

									<input class="form-control"  type="hidden" name="kd_asuransi" value="-" id='kd_asuransi' readonly>
									<input class="form-control"  type="text" name="nama_asurasni" id="nama_asuransi" value="-" style="width:455px;" readonly>

									<a href="javascript:void(0);" NAME="My Window Name" title="My title here"
										onClick='javascript:window.open("<?= base_url('spk/popasuransidata'); ?>","Ratting",
										"width=550,height=400,left=450,top=200,toolbar=1,status=1,");'>
										<button class="btn btn-primary" type="button" style="height: 38px;" ><i class="fa fa-search"></i></button>
									</a>
								</div>
								</div>
								</div>

							<div class="col">
								<div class="form-inline">

									<label class="col-sm-2" for="id" style="text-align: right;">Pembayar</label>&nbsp&nbsp
									<input class="form-control"  type="text" id="pembayar" name="pembayar" value=""  style="width:435px;" readonly>
							
								</div>
								</div>

								<div class="form-inline">

								</div>
							</div>
							<br>

						<div class="row">
							<div class="col">
								<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">No. Polisi  </label>
								<div class="input-group sm-3">
									<input class="form-control" type="hidden" name="kd_kendaraan" id="kd_kendaraan" value="" id="kd_kendaraan" readonly style="width:190px;">
									<input class="form-control" type="text" name="no_polisi" id="no_polisi" value=""  style="width:150px;" readonly>
								<div class="input-group-append">
									<a href="javascript:void(0);" NAME="My Window Name" title=" My title here "
										onClick='javascript:window.open("<?= base_url('spk/popnopoldata'); ?>","Ratting",
										"width=1350,height=400,left=450,top=100,toolbar=1,status=1,");'>
										<button class="btn btn-primary" type="button" style="height: 38px;" ><i class="fa fa-search"></i></button>
									</a>
								</div>
								</div>

									<label class="col-sm-2" for="id">Brand</label>
									<div class="col-sm-2">
										<input class="form-control" type="text" name="brand" id="brand" value="" style="width:188px;" readonly>
									</div>
								</div>
								<br>

								<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Kode Rangka</label>
								<div class="col-xs-3">
									<input class="form-control" type="text" name="kd_rangka" id="kd_rangka" value="" style="width:188px;" readonly >
								</div>
									<label class="col-sm-2" for="id">No.Rangka</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" name="no_rangka" id="no_rangka" value="" style="width:188px;" readonly>
								</div>
								</div>
								<br>

								<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Kode Mesin</label>
								<div class="col-xs-3">
									<input class="form-control" type="text" name="kd_mesin" id="kd_mesin" value="" style="width:188px;" readonly>
								</div>
									<label class="col-sm-2" for="id">No. Mesin</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" name="no_mesin" id="no_mesin" value="" style="width:188px;" readonly>
								</div>
								</div>
								<br>

								<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Basic Model</label>
								<div class="col-xs-3">
									<input class="form-control" type="text" name="model" id="model" value="" style="width:188px;" readonly>
								</div>
									<label class="col-sm-2" for="id">Transisi</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" name="trans" id="trans" value="" style="width:188px;" readonly>
								</div>
								</div>
								<br>

								<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Tahun</label>
								<div class="col-xs-3">
									<input class="form-control" type="text" name="tahun" id="tahun" value="" style="width:188px;" readonly>
								</div>
									<label class="col-sm-2" for="id">Warna</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" name="warna" id="warna" value="" style="width:188px;" readonly>
								</div>
								</div>
								<br>

								<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Kode Pemilik</label>
								<div class="col-xs-3">
									<input class="form-control" type="text" name="kd_customer" id="kd_customer" value="" style="width:188px;" readonly>
								</div>
									<label class="col-sm-2" for="id">Pemilik</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" name="nama_customer" id="nama_customer" value="" style="width:188px;" readonly>
								</div>
								</div>
							</div>

							<div class="col">
								<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Pekerjaan</label>
								<div class="col-sm-2">
									<textarea	 class="form-control" name='pekerjaan' id="pekerjaan" style="resize:none; width:435px;height:212px;"></textarea>
								</div>
								</div>
								<br>

								<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Jenis</label>
								<div class="col-sm-6">
									<input class="form-control" type="text" name="jenis" id="jenis" value="" style="resize:none; width:435px;" autocomplete="off" >
								</div>
								</div>
								<br>

								<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">SA </label>&nbsp &nbsp
								<div class="input-group sm-3">
									<input class="form-control" type="text" name="kd_sa" id="kd_sa" value=""  style="width:100px;" readonly>
								<div class="input-group-append">
									<a href="javascript:void(0);" NAME="My Window Name" title=" My title here "
										onClick='javascript:window.open("<?= base_url('spk/popsadata'); ?>","Ratting",
										"width=550,height=400,left=450,top=200,toolbar=1,status=1,");'>
									<button class="btn btn-primary" type="button" style="height: 38px;" ><i class="fa fa-search"></i></button>
									</a>
	     						</div>
								</div>
								<div class="col-sm-6">
									<input class="form-control" type="text" name="nama_sa" id="nama_sa" value=""  style="width:280px;" readonly>
								</div>
								</div>
								<br>

								<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Foreman</label>&nbsp &nbsp
								<div class="input-group sm-3">
									<input class="form-control" type="text" name="kd_fm" id="kd_fm" value=""  style="width:100px;" readonly>
								<div class="input-group-append">
									<a href="javascript:void(0);" NAME="My Window Name" title=" My title here "
										onClick='javascript:window.open("<?= base_url('spk/popfmdata'); ?>","Ratting",
										"width=550,height=400,left=450,top=200,toolbar=1,status=1,");'>
									<button class="btn btn-primary" type="button" style="height: 38px;" ><i class="fa fa-search"></i></button>
									</a>
								</div>
								</div>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="nama_fm" id="nama_fm" value="" style="width:280px;" readonly>
									</div>
								</div>
								<br>

								<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Vendor</label>
								<div class="col-sm-6">
									<select class="form-control" name="vendor" id="vendor" style="width:435px;" >
										<option value="" selected hidden>--Pilih--</option>
										<option value="BORONGAN">BORONGAN</option>
										<option value="PT JOLOTUNDO PERKASA JAYA">PT JOLOTUNDO PERKASA JAYA</option>
									</select>
								</div>
								</div>
								<br>

								<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Estimasi</label>&nbsp &nbsp
								<div class="">
									<input class="form-control" type='date' name='mulai' id="mulai" value="<?php echo date('Y-m-d') ?>" style="resize:none; width:216px;">
								</div> &nbsp
								<div class="">
									<input class="form-control" type='date' name='akhir' id="akhir" value="<?php echo date('Y-m-d') ?>" style="resize:none; width:215px;">
									<input class="form-control" type='hidden' name='status' id="status"  value="Estimasi" style="resize:none; width:225px;">
								</div>
								</div>

									<input type="datetime-local" class="form-control" id="created_at" name="created_at" value="<?php echo Date('Y-m-d\TH:i:s',time()) ?>" autocomplete="off" hidden>
									<?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>

									<input type="text" class="form-control" id="created_by" name="created_by" value="<?php echo $this->session->userdata("username"); ?>" autocomplete="off" hidden>
									<?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>

									<input type="datetime-local" class="form-control" id="updated_at" name="updated_at" value="<?php echo Date('Y-m-d\TH:i:s',time()) ?>" autocomplete="off" hidden>
									<?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>

									<input type="text" class="form-control" id="updated_by" name="updated_by" value="<?php echo $this->session->userdata("username"); ?>" autocomplete="off" hidden>
									<?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>
								<br>
				  				</div>
								<br>
							</div>



							<div class="row">

								<div class="col-sm-7">
								</div>&nbsp &nbsp

								<div class="col-sm-2" style="text-align: right;">
									<button type="submit" class="btn btn-dark float-right btn-block" name="tambah"><i class="fa fa-plus-circle"></i>  Tambah</button>
								</div>
								<div class="col-sm-2" style="text-align: right;">
									<a href="/body-repair/spk" class="btn btn-danger float-right btn-block"><i class="fa fa-undo"></i>Kembali</a>
								</div>
							</div>
							<br>
							<br>


	</form>

<script src="<?= base_url('assets') ?>/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.2/js/dataTables.fixedHeader.min.js"></script>
<script>
	function sum() {
		var txtFirstNumberValue = document.getElementById('harga').value;
		var txtSecondNumberValue = document.getElementById('jumlah').value;
		var txtThirdNumberValue = document.getElementById('diskon').value;
		var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
		var diskon = (parseInt(result) * parseInt(txtThirdNumberValue))/ 100;
		var jumlah = parseInt(result)-parseInt(diskon);
			if (!isNaN(result)) {
				document.getElementById('total').value = jumlah;
				}
			}

	function myFunction() {
		var x = document.getElementById("myDIV");//field input asuransi
		var y = document.getElementById("myDIV2"); //field input customer
		var w = document.getElementById("myDIV3");
		var z = document.getElementById("myDIV4");
		if (x.style.display === "none") {
			x.style.display = "block";
			w.style.display = "block";
			y.style.display = "none";
			z.style.display = "none";
		} else {
			x.style.display = "none";
			w.style.display = "none";
			y.style.display = "block";
			z.style.display = "block";
		}
	}
</script>
<?php ini_set('display_errors','off'); ?>
<?php
  error_reporting(0);
?>
