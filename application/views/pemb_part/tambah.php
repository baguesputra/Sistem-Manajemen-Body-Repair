<?php $this->load->view('include/navbar'); ?>

<div class="container-fluid">
	<form class="" action="" method="post">
		<h3><i class="fa fa-bookmark"></i>  INPUT PEMBELIAN</h3>
		<div class="row">
			<div class="col-lg-12">
				<div class="card border-secondary" >
					<div class="card-header text-white bg-secondary"><i class="fa fa-info-circle"></i>
						Tambah Pembelian
					</div>
					<div class="card-body">
						<div class="row">
							<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Kode Pembelian</label>
									<div class="col-xs-3">
										<input class="form-control" type="text" name="kd_pemb" id="kd_pemb" value="<?= $kodeunik ?>" style="width:188px;" readonly>
										<input class="form-control" type="date" name="tgl" id="tgl" value="<?php echo date('Y-m-d') ?>" hidden>
									</div>
									<label class="col-sm" for="id">Tanggal Pembelian</label>
									<div class="col-sm-2">
										<input class="form-control" type="date" name="tgl_pemb" id="tgl_pemb" value="" style="width:188px;">
									</div>
									<label class="col-sm" for="id">Tanggal Tempo</label>
									<div class="col-sm-2">
										<input class="form-control" type="date" name="tgl_tempo" id="tgl_tempo" value="" style="width:188px;">
									</div>
							</div>
						</div>
						<br>

						<div class="row">
							<div class="col">

								<div class="form-inline">
									<label class="col-sm-2" for="id" id="myDIV3" style="text-align: right;">Supplier</label>
								<div class="input-group sm-3">
									<input class="form-control"  type="text" name="supplier" id="supplier" value="" style="width:455px;" readonly>
										<div class="input-group-append">
											<a href="javascript:void(0);" NAME="My Window Name" title="My title here"
												onClick='javascript:window.open("<?= base_url('pembelian/popsupplier'); ?>","Ratting",
												"width=550,height=400,left=450,top=200,toolbar=1,status=1,");'>
												<button class="btn btn-primary" type="button" style="height: 38px;" ><i class="fa fa-search"></i></button>
											</a>
										</div>
								</div>
							</div>
							</div>

							<div class="col">
								<div class="form-inline">

									<label class="col-sm-2" for="id" style="text-align: right;">Status</label>&nbsp&nbsp
									<select name="status" id="status" class="form-control">
										<option value="" hidden selected>-- Pilih --</option>
										<option value="CASH">CASH</option>
										<option value="KREDIT">KREDIT</option>
									</select>
							
								</div>
								<input class="form-control" type="text" name="bayar" id="bayar" value="0" style="width:188px;" hidden>
								<input class="form-control" type="text" name="sisa" id="sisa" value="0" style="width:188px;" hidden>
							</div>
						</div>

						<input class="form-control" type="text" name="posisi" id="posisi" value="buka" style="width:188px;" hidden>

									<input type="datetime-local" class="form-control" id="created_at" name="created_at" value="<?php echo Date('Y-m-d\TH:i:s',time()) ?>" autocomplete="off" hidden>
									<?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>

									<input type="text" class="form-control" id="created_by" name="created_by" value="<?php echo $this->session->userdata("username"); ?>" autocomplete="off" hidden>
									<?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>

									<input type="datetime-local" class="form-control" id="updated_at" name="updated_at" value="<?php echo Date('Y-m-d\TH:i:s',time()) ?>" autocomplete="off" hidden>
									<?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>

									<input type="text" class="form-control" id="updated_by" name="updated_by" value="<?php echo $this->session->userdata("username"); ?>" autocomplete="off" hidden>
									<?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>
				  				</div>



							<div class="row">

								<div class="col-sm-7">
								</div>&nbsp &nbsp

								<div class="col-sm-2" style="text-align: right;">
									<button type="submit" class="btn btn-dark float-right btn-block" name="tambah"><i class="fa fa-plus-circle"></i>  Tambah</button>
								</div>
								<div class="col-sm-2" style="text-align: right;">
									<a href="/body-repair/pembelian/part" class="btn btn-danger float-right btn-block"><i class="fa fa-undo"></i>Kembali</a>
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
</script>
<?php ini_set('display_errors','off'); ?>
<?php
  error_reporting(0);
?>