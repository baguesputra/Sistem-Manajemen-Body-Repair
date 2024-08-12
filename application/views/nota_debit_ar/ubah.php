<?php $this->load->view('include/navbar'); ?>

<div class="container-fluid">
		<form class="" action="" method="post">
		<h3><i class="fa fa-bookmark"></i>	Detail Nota Debit AR</h3>
	<div class="row">
		<div class="col-lg-12">
			<div class="card border-secondary" >
				<div class="card-header text-white bg-secondary"><i class="fa fa-info-circle"></i>
					Informasi Transaksi
				</div>
				<div class="card-body">
				<div class="row">
							<div class="form-inline">
									&nbsp &nbsp<label class="col-xs-2" for="id" style="text-align: right;">No Dok</label>
									<div class="col-sm">
										<input class="form-control" type="text" name="no_dok" id="no_dok" value="<?= $nota['no_dok'] ?>" style="width:188px;" readonly>
		
									</div>
									<label class="col-sm" for="id">Tanggal</label>
									<div class="col-xs-2">
										<input class="form-control" type="date" name="tgl" id="tgl" value="<?= $nota['tgl'] ?>" style="width:188px;" readonly>
									</div>
									<label class="col-sm" for="id">Tanggal GL</label>
									<div class="col-xs-2">
										<input class="form-control" type="date" name="tgl_gl" id="tgl_gl" value="<?= $nota['tgl_gl'] ?>" style="width:188px;" readonly>
									</div>
							</div>
							<div class="custom-control custom-switch" style="margin-left:20px;">
								<input type="checkbox" class="custom-control-input" id="customSwitch1" onclick="myFunction()">
								<label class="custom-control-label" for="customSwitch1">Detail</label>
								
							</div>
						</div>
						<hr>
						<div id="row1" style="display:none;">
								<div class="row">
							<div class="col">

						<div class="form-inline">
							<label class="col-sm-2 " style="text-align: right;">Customer</label>
						<div class="input-group sm-3">
							<input class="form-control"  type="text" name="customer" id="customer" style="width:475px;" value="<?= $nota['customer'] ?>" readonly>
							<input class="form-control"  type="text" name="kode_cust" id="kode_cust" style="width:455px;" readonly hidden>
							
						</div>
						</div>
						</div>

						<div class="col">

						<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Penerimaan</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" name="penerimaan" id="penerimaan" value="<?= $nota['penerimaan'] ?>" onkeyup="sum();" style="width:430px;" readonly>
								</div>
								</div>
								<br>
								<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Jumlah </label>&nbsp &nbsp
								<div class="input-group sm-3">
									<input class="form-control" type="text" name="jumlah" id="jumlah" value="<?= $nota['jumlah'] ?>"  style="width:430px;" readonly>
								
								</div>
								</div>
								<br>

								<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Selisih</label>&nbsp &nbsp
								<div class="input-group sm-3">
									<input class="form-control" type="text" name="selisih" id="selisih" value="<?= $nota['selisih'] ?>" onkeyup="sum();"  style="width:430px;" readonly>
								
								</div>
								
								</div>
								<br>

								<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Ket</label>
								<div class="col-sm-6">
									<input class="form-control" type="text" name="ket" id="ket" value="<?= $nota['ket'] ?>"  style="width:430px;" readonly>
								</div>
								</div>
								<br>
							</div>
						</div>
</div>

						<h6>Detail Bank / Kas Terima</h6>
						<hr>

                         	<div class="form-inline">
               					<div class="col-sm-2">
									<input class="form-control" type="text" name="no_spk" value="" id="no_spk" readonly hidden>
									<input class="form-control" type="text" name="kd_stok" value="" id="kd_stok" readonly hidden>
									<input class="form-control" type="text" name="kd_detail" value="" id="kd_detail" readonly hidden>
               					</div>
                           
								<?php $tgl=date('Y-m-d');?>
								<div class="col-sm-3">
									<input class="form-control datepicker" type="date" name="" id="tgl_spk" value="" style="width:225px;" readonly hidden >
								</div>
									<a href="javascript:void(0);" NAME="My Window Name" title=" My title here "
										onClick='javascript:window.open("<?= base_url('nota_ar/popinvoice'); ?>","Ratting",
										"width=2000,height=500,left=270,top=70,toolbar=1,status=1,");'>
										<button class="btn btn-primary" type="button" style="height: 40px;width: 150px;">Invoice</button>
									</a>
									<a href="javascript:void(0);" NAME="My Window Name" title=" My title here "
										onClick='javascript:window.open("<?= base_url('nota_ar/popkwitansi'); ?>","Ratting",
										"width=2000,height=500,left=270,top=70,toolbar=1,status=1,");'>
										<button class="btn btn-success" type="button" style="height: 40px;width: 150px;">Kwitansi</button>
									</a>
               					</div>

								<div class="form-inline">
									<div class="input-group sm-4">
										<input class="form-control" type="text" name="kd_jenis" value="" id="kd_jenis" style="width:225px;" hidden>
									<div class="input-group-append">
								</div>
                          		</div>
                     	 	</div>
                      	<br>
							<div class="form-inline">
						
									<div class="col-xs-1">
										<input class="form-control" type="text" name="kode" value="<?= $kodedetail ?>" id="kode" style="width:100px;" autocomplete="off" readonly hidden>
									</div>
								<label class="col-sm" for="kode">No Invoice</label>
									<div class="col-xs-1">
										<input class="form-control" type="text" name="no_inv" value="" id="no_inv" style="width:120px;" autocomplete="off" readonly>
									</div>
								<label class="col-sm" for="id">tanggal</label>
									<div class="col-xs-1">
										<input class="form-control" type="date" name="tgl" value="" id="tgl_inv" style="width:120px;" autocomplete="off">
									</div>
								<label class="col-sm" for="id">tempo</label>
									<div class="col-xs-1">
										<input class="form-control" type="date" name="tgl_tempo" value="0" id="tgl_tempo" style="width:120px;" autocomplete="off">
									</div>
								<!-- <label class="col-sm" for="id">Total</label>
									<div class="col-xs-1">
										<input class="form-control" type="text" name="total" value="" id="total" style="width:150px;" readonly>
									</div> -->
									<label class="col-sm" for="id">Keterangan</label>
									<div class="col-xs-1">
										<input class="form-control" type="text" name="keterangan" value="" id="keterangan" style="width:150px;">
									</div>

									<input class="form-control" type="text" name="tipe" value="pengeluaran" id="tipe" style="width:150px;" readonly hidden>

									<input type="datetime-local" class="form-control" id="created_at" name="created_at" value="<?php echo Date('Y-m-d\TH:i:s',time()) ?>" autocomplete="off" hidden>
									<?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>

									<input type="text" class="form-control" id="created_by" name="created_by" value="<?php echo $this->session->userdata("username"); ?>" autocomplete="off" hidden>
									<?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>

									<input type="datetime-local" class="form-control" id="updated_at" name="updated_at" value="<?php echo Date('Y-m-d\TH:i:s',time()) ?>" autocomplete="off" hidden>
									<?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>

									<input type="text" class="form-control" id="updated_by" name="updated_by" value="<?php echo $this->session->userdata("username"); ?>" autocomplete="off" hidden>
									<?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>
                     		</div>
                     	<br>
                     		<div class="form-inline">
                         	</div>
                     	<br>
					<div class="row">
						<div class="col-sm-8">
						</div>
						<div class="col-sm-2">
						</div>
						<div class="col-sm-2">
							<button type="submit" class="btn btn-dark float-right btn-block" name="tambah"><i class="fa fa-plus-circle"></i> Tambah</button>
						</div>
					</div>
				</form>
			<br>
				<div class="class table-responsive">
					<table class="table table-bordered" style="text-align:center;">
						<thead>
							<tr>
								<th>No Inv</th>
								<th>Tanggal</th>
								<th>Tempo</th>
								<th>Hapus</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php 
								$jumlah = 0;
								foreach ($detailnota as $dtl): 
									if ($dtl['kode_nota'] == $nota['no_dok']){ ?>
								<td style="font-size:0.9rem"><?= $dtl['no_inv'] ?></td>
								<td style="font-size:0.9rem"><?= $dtl['tgl'] ?></td>
								<td style="font-size:0.9rem"><?= $dtl['tgl_gl'] ?></td>
								<td  style="width:50px;">
									<a href="" class="badge badge-danger pl-2 pr-2" onclick="return confirm('Apakah kamu ingin menghapus data ini?');">Pilih</a>
								</td>
							
                            </tr>
							<?php } endforeach ?>
						
                        </tbody>
                    </table>
					
				</div>
					<div class="row">
						<div class="col-sm-8">
						</div>
						<div class="col-sm-2">
						</div> 
						<div class="col-sm-2">
							<a href="<?= base_url('nota_ar/indexDebit'); ?>" class="btn btn-danger float-right btn-block"><i class="fa fa-undo"></i> Kembali</a>
						</div>
					</div>
				<br>
			</div>
		</div>
	</div>
<script src="<?= base_url('assets') ?>/js/bootstrap.min.js"></script>
<script>
      function sum() {
		var harga = document.getElementById('harga').value;
		var jumlah = document.getElementById('jumlah').value;
		var diskon = document.getElementById('diskon').value;
		var jumlah2 = document.getElementById('jumlah2').value;
		var ttl = document.getElementById('ttl').value;
		var stok = parseInt(jumlah2)-parseInt(jumlah);
		var result = parseInt(harga) * parseInt(jumlah);
		var diskon = (parseInt(result) * parseInt(diskon))/ 100;
		var jumlah = parseInt(result)-parseInt(diskon);
		var result2 = parseInt(ttl) + parseInt(jumlah);
		

			if (!isNaN(result)) {
				document.getElementById('total').value = jumlah;
				document.getElementById('ttl2').value = result2;
				
				document.getElementById('jumlah3').value = stok;
			}
				}


				function myFunction() {
		var x = document.getElementById("row1");
		var y = document.getElementById("row2"); 
		if (x.style.display === "none") {
			x.style.display = "block";
		} else {
			x.style.display = "none";
		}}
</script>
<?php ini_set('display_errors','off'); ?>
<?php
  error_reporting(0);
?>
