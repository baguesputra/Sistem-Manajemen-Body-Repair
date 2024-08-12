<?php $this->load->view('include/navbar'); ?>

<div class="container-fluid">
	<form class="" action="" method="post">
		<h3><i class="fa fa-bookmark"></i>  INPUT KAS KELUAR</h3>
		<div class="row">
			<div class="col-lg-12">
				<div class="card border-secondary" >
					<div class="card-header text-white bg-secondary"><i class="fa fa-info-circle"></i>
						Bukti Kas Keluar
					</div>
					<div class="card-body">
						<div class="row">
							<div class="form-inline">
									&nbsp &nbsp<label class="col-sm-2" for="id" style="text-align: right;">No Dok</label>
									<div class="col-xs-3">
										<input class="form-control" type="text" name="no_dok" id="no_dok" value="<?= $bkk['no_dok'] ?>" style="width:188px;" readonly>
										<!-- <input class="form-control" type="text" name="kodebank" id="kodebank" value="<?= $kodebank ?>" hidden>
										<input class="form-control" type="text" name="kodekas" id="kodekas" value="<?= $kodekas ?>" hidden> -->
									</div>
									<label class="col-sm-2" for="id">Tanggal</label>
									<div class="col-sm-2">
										<input class="form-control" type="date" name="tgl" id="tgl" value="<?= $bkk['tgl'] ?>" style="width:188px;">
									</div>
							</div>
						</div>
						<hr>

						<div class="row">
							<div class="col">

							<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Bank Tujuan  </label>
								<div class="input-group sm-3">
									<input class="form-control" type="text" name="kd_bank" id="kd_bank" value="<?= $bkk['kd_bank'] ?>"  style="width:190px;" readonly>
								<div class="input-group-append">
									<a href="javascript:void(0);" NAME="My Window Name" title=" My title here "
										onClick='javascript:window.open("<?= base_url('bbkk/popbank'); ?>","Ratting",
										"width=550,height=230,left=350,top=200,toolbar=1,status=1,menubar=no,location=no");'>
										<button class="btn btn-primary" type="button" style="height: 38px;" ><i class="fa fa-search"></i></button>
									</a>
								</div>
								</div>
									<?php foreach($bank as $b): {?>
									<?php if ($b['kd_bank'] == $bkk['kd_bank']){?>
									<div class="col-sm-2">
										<input class="form-control" type="text" name="nama" id="nama" value="<?= $b['nama'] ?>" style="width:250px;" readonly>
									</div>
									<?php }} endforeach ?>
								</div>

								</div>

							<div class="col">
								<div class="form-inline">

									<label class="col-sm-2" for="id" style="text-align: right;">Tipe Pembayaran</label>&nbsp&nbsp
									<select class="form-control" name="tipe" id="tipe" style="width:435px;">
										<option value="<?= $bkk['tipe'] ?>" selected hidden><?= $bkk['tipe'] ?></option>
										<option value="Debit Card">Debit Card</option>
										<option value="Transfer">Transfer</option>
									</select>
							
								</div>
								</div>

								

								<div class="form-inline">

								</div>
							</div>
							<br>

						<div class="row">
							<div class="col">
								<div class="form-inline">
								<?php foreach($bank as $b): {?>
									<?php if ($b['kd_bank'] == $bkk['kd_bank']){?>
									<label class="col-sm-2" for="id" style="text-align: right;">No Rek </label>
								<div class="input-group sm-3">
									<input class="form-control" type="text" name="account" id="account" value="<?= $b['account'] ?>"  style="width:230px;" readonly>
							
								</div>

									
									<div class="col-sm-2">
										<input class="form-control" type="text" name="no_account" id="no_account" value="<?= $b['no_account'] ?>" style="width:250px;" readonly>
									</div>
								</div>
								<?php }} endforeach ?>
								
								<br>

							
							</div>

							<div class="col">
								<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Bayar</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" name="bayar" id="bayar" value="<?= $bkk['bayar'] ?>" onkeyup="sum();" style="width:430px;">
								</div>
								</div>
							</div>
</div>
							
							<div class="row">
							<div class="col">

						<div class="form-inline">
							<label class="col-sm-2 " style="text-align: right;">Pemasok</label>
						<div class="input-group sm-3">
							<input class="form-control"  type="text" name="pemasok" id="pemasok" value="<?= $bkk['pemasok'] ?>" style="width:435px;" readonly>
							<input class="form-control"  type="text" name="kode_pemasok" id="kode_pemasok" value="<?= $bkk['kode_pemasok'] ?>" style="width:455px;" readonly hidden>
							<a href="javascript:void(0);" NAME="My Window Name" title="My title here"
								onClick='javascript:window.open("<?= base_url('bbkk/poppemasok'); ?>","Ratting",
								"width=550,height=400,left=450,top=200,toolbar=1,status=1,");'>
								<button class="btn btn-primary" type="button" style="height: 38px;" ><i class="fa fa-search"></i></button>
							</a>
						</div>
						</div>
						</div>
							<div class="col">
								<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Selisih</label>&nbsp &nbsp
								<div class="input-group sm-3">
									<input class="form-control" type="text" name="selisih" id="selisih" value="<?= $bkk['selisih'] ?>"  style="width:430px;" readonly>
								
								</div>
								</div>
								<br>

								<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Jumlah</label>&nbsp &nbsp
								<div class="input-group sm-3">
									<input class="form-control" type="text" name="jumlah" id="jumlah" value="<?= $bkk['jumlah'] ?>" onkeyup="sum();"  style="width:430px;" readonly>
								
								</div>
								
								</div>
								<br>

								<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Ket</label>
								<div class="col-sm-6">
									<input class="form-control" type="text" name="ket" id="ket" value="<?= $bkk['ket'] ?>"  style="width:430px;">
								</div>
								</div>
								<br>

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
</div>
</div>


							<div class="row">

								<div class="col-sm-7">
								</div>&nbsp &nbsp

								<div class="col-sm-2" style="text-align: right;">
									<button type="submit" class="btn btn-dark float-right btn-block" name="tambah"><i class="fa fa-plus-circle"></i>  Ubah</button>
								</div>
								<div class="col-sm-2" style="text-align: right;">
									<a href="/body-repair/bbkk/indexBkk" class="btn btn-danger float-right btn-block"><i class="fa fa-undo"></i>Kembali</a>
								</div>
							</div>
							<br>


	</form>

<script src="<?= base_url('assets') ?>/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.2/js/dataTables.fixedHeader.min.js"></script>
<script>
	function sum() {
		var txtFirstNumberValue = document.getElementById('bayar').value;
	
			document.getElementById('jumlah').value = txtFirstNumberValue;
	}
	function myFunction() {
		var x = document.getElementById("kodekas").value;
		var y = document.getElementById("myDIV2"); //field input customer
		var w = document.getElementById("myDIV3");
		var z = document.getElementById("myDIV4");
		document.getElementById('no_dok').value = x;
	}
	
</script>
<?php ini_set('display_errors','off'); ?>
<?php
  error_reporting(0);
?>
