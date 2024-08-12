<?php $this->load->view('include/navbar'); ?>

<div class="container-fluid">
		<form class="" action="" method="post">
		<h3><i class="fa fa-bookmark"></i>  EDIT SPK BODY REPAIR</h3>
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
										<input class="form-control" type="text" name="no_est" id="no_est" value="<?= $spk['no_est']; ?>"  style="width:188px;"  readonly>
										<input class="form-control" type="text" name="no_spk" id="no_spk" value="<?= $spk['no_spk']; ?>"  style="width:188px;"  readonly hidden>
									</div>
									<label class="col-sm-2" for="id">Tanggal</label>
									<div class="col-sm-2">
										<input class="form-control" type="date" name="tgl_spk" id="tgl_spk" value="<?= $spk['tgl_spk']; ?>"  style="width:188px;" readonly>
									</div>
							</div>
							<div class="custom-control custom-switch">
								<input type="checkbox" class="custom-control-input" id="customSwitch1" onclick="myFunction()">
								<label class="custom-control-label" for="customSwitch1">Detail</label>
								
							</div>
					</div>
					<hr>
					<div id="row1" style="display:none;">
					<div class="row	">
						<div class="col">
							<div class="form-inline">
								<label class="col-sm-2" for="id" style="text-align: right;">Pembayar</label>
								<div class="input-group sm-3">
								<input class="form-control" type="text" name="pembayar" id="pembayar" value="<?= $spk['pembayar']; ?>"  style="width:499px;" readonly>
								</div>
							</div>
						</div>

						<div class="col">
							<div class="form-inline">
								<div class="input-group ">
								</div>
							</div>
							<div class="form-inline">
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col">
							<div class="form-inline">
								<?php foreach ($kendaraan as $kdr):

									if ($kdr['kd_kendaraan'] == $spk['kd_kendaraan']){
								?>
								<label class="col-sm-2" for="id" style="text-align: right;">No. Polisi  </label>
									<div class="input-group sm-3">
										<input class="form-control" type="hidden" name="kd_kendaraan" id="kd_kendaraan" value="<?= $kdr['kd_kendaraan']; ?>" id="kd_kendaraan" readonly style="width:190px;">
										<input class="form-control" type="text" name="no_polisi" id="no_polisi" value="<?= $kdr['no_polisi']; ?>"  style="width:190px;" readonly>
									</div>
								<label class="col-sm-2" for="id">Brand</label>
									<div class="col-sm-2">
										<input class="form-control" type="text" name="brand" id="brand" value="<?= $kdr['brand']; ?>" style="width:188px;" readonly>
									</div>
							</div>
						<br>
							<div class="form-inline">
								<label class="col-sm-2" for="id" style="text-align: right;">Kode Rangka</label>
									<div class="col-xs-3">
										<input class="form-control" type="text" name="kd_rangka" id="kd_rangka" value="<?= $kdr['kd_rangka']; ?>" style="width:188px;" readonly>
									</div>
								<label class="col-sm-2" for="id" style="text-align: right;">No.Rangka</label>
									<div class="col-sm-2">
										<input class="form-control" type="text" name="no_rangka" id="no_rangka" value="<?= $kdr['no_rangka']; ?>" style="width:188px;" readonly>
									</div>
							</div>
						<br>
							<div class="form-inline">
								<label class="col-sm-2" for="id" style="text-align: right;">Kode Mesin</label>
									<div class="col-xs-3">
										<input class="form-control" type="text" name="kd_mesin" id="kd_mesin" value="<?= $kdr['kd_mesin']; ?>" style="width:188px;" readonly>
									</div>
								<label class="col-sm-2" for="id" style="text-align: right;">No. Mesin</label>
									<div class="col-sm-2">
										<input class="form-control" type="text" name="no_mesin" id="no_mesin" value="<?= $kdr['no_mesin']; ?>" style="width:188px;" readonly>
									</div>
							</div>
						<br>
							<div class="form-inline">
								<label class="col-sm-2" for="id" style="text-align: right;">Basic Model</label>
									<div class="col-xs-3">
										<input class="form-control" type="text" name="model" id="model" value="<?= $kdr['model']; ?>" style="width:188px;" readonly>
									</div>
								<label class="col-sm-2" for="id" style="text-align: right;">Transisi</label>
									<div class="col-sm-2">
										<input class="form-control" type="text" name="trans" id="trans" value="<?= $kdr['trans']; ?>" style="width:188px;" readonly>
									</div>
							</div>
						<br>
							<div class="form-inline">
								<label class="col-sm-2" for="id" style="text-align: right;">Tahun</label>
									<div class="col-xs-3">
										<input class="form-control" type="text" name="tahun" id="tahun" value="<?= $kdr['tahun']; ?>" style="width:188px;" readonly>
									</div>
								<label class="col-sm-2" for="id" style="text-align: right;">Warna</label>
									<div class="col-sm-2">
										<input class="form-control" type="text" name="warna" id="warna" value="<?= $kdr['warna']; ?>" style="width:188px;" readonly>	
									</div>
							</div>
						<br>
							<div class="form-inline">
								<label class="col-sm-2" for="id" style="text-align: right;">Kode Pemilik</label>
									<div class="col-xs-3">
										<input class="form-control" type="text" name="kd_customer" id="kd_customer" value="<?= $kdr['kd_customer']; ?>" style="width:188px;" readonly>
									</div>
								<label class="col-sm-2" for="id">Pemilik</label>
								<div class="col-sm-2">
									<input class="form-control" type="text" name="nama_customer" id="nama_customer" value="<?= $kdr['nama_customer']; ?>" style="width:188px;" readonly>
								</div>
							</div>
							<?php } endforeach?>
						</div>

				  		<div class="col">
				  			<div class="form-inline">
								<label class="col-sm-2" for="id" style="text-align: right;">Pekerjaan</label>
									<div class="col-sm-2">
										<textarea	readonly class="form-control" name='pekerjaan' id="pekerjaan" style="resize:none; width:435px;height:212px;"><?= $spk['pekerjaan']; ?></textarea>
									</div>
							</div>
						<br>
							<div class="form-inline">
								<label class="col-sm-2" for="id" style="text-align: right;">Jenis</label>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="jenis" id="jenis" value="<?= $spk['jenis']; ?>" style="resize:none; width:435px;" readonly>
									</div> &nbsp
							</div>
						<br>
							<div class="form-inline">
								<label class="col-sm-2" for="id" style="text-align: right;">SA </label>&nbsp &nbsp
									<div class="input-group sm-3">
										<?php foreach ($serviceadvisor as $sa):

											if ($sa['kd_sa'] == $spk['kd_sa']){
										?>
										<input class="form-control" type="text" name="kd_sa" id="kd_sa" value="<?= $sa['kd_sa']; ?>"  style="width:140px;" readonly>
									</div>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="nama_sa" id="nama_sa" value="<?= $sa['nama_sa']; ?>"  style="width:280px;" readonly>
										<?php } endforeach?>
									</div>
							</div>
						<br>
							<div class="form-inline">
								<label class="col-sm-2" for="id" style="text-align: right;">Foreman</label>&nbsp &nbsp
									<div class="input-group sm-3">
										<?php foreach ($foreman as $fm):

										if ($fm['kd_fm'] == $spk['kd_fm']){
										?>
										<input class="form-control" type="text" name="kd_fm" id="kd_fm" value="<?= $fm['kd_fm']; ?>"  style="width:140px;" readonly>
									</div>
									<div class="col-sm-6">
										<input class="form-control" type="text" name="nama_fm" id="nama_fm" value="<?= $fm['nama_fm']; ?>" style="width:280px;" readonly>
										<?php } endforeach?>
									</div>
							</div>
						<br>
							<div class="form-inline">
								<label class="col-sm-2" for="id" style="text-align: right;">Vendor</label>
									<div class="col-sm-3">
										<input class="form-control" type="text" name="vendor" id="vendor" value="<?= $spk['vendor']; ?>" style="width:435px;" readonly>
									</div>
							</div>
						<br>
							<div class="form-inline">
								<label class="col-sm-2" for="id" style="text-align: right;">Estimasi</label> &nbsp &nbsp
									<div class="">
										<input class="form-control" type='date' name='mulai' id="mulai" value="<?= $spk['mulai']; ?>" style="resize:none; width:216px;" readonly>
									</div> &nbsp
									<div class="">
										<input class="form-control" type='date' name='akhir' id="mulai" value="<?= $spk['akhir']; ?>" style="resize:none; width:215px;" readonly>
										<input class="form-control" type='hidden' name='status' id="status"  value="<?= $spk['status']; ?>" style="resize:none; width:225px;" readonly>
									</div>

							</div>
						<br>
				  	</div>
					  </div>
				<br>
			</div>
			<!-- <label class="col-sm-2" for="id" style="text-align: right;" hidden>Total</label>
									<div class="col-sm-3">
										<input class="form-control" type="text" name="ttl" id="ttl" value="<?= $spk['total']; ?>" style="width:435px;" onkeyup="sum();" readonly hidden>
										<input class="form-control" type="text" name="ttl2" id="ttl2" value="" style="width:435px;" onkeyup="sum();" readonly hidden>
									</div> -->



						<h6>Detail Pekerjaan</h6>
						<hr>

                         	<div class="form-inline">
               					<div class="col-sm-2">
									<input class="form-control" type="text" name="no_spk" value="<?= $spk['no_est']; ?>" id="no_spk" readonly hidden>
									<input class="form-control" type="text" name="kd_stok" value="<?= $kodeunik2 ?>" id="kd_stok" readonly hidden>
									<input class="form-control" type="text" name="kd_detail" value="<?= $kodeunik; ?>" id="kd_detail" readonly hidden>
               					</div>
                           
								<?php $tgl=date('Y-m-d');?>
								<div class="col-sm-3">
									<input class="form-control datepicker" type="date" name="" id="tgl_spk" value="<?php echo $tgl ?>" style="width:225px;" readonly hidden >
								</div>
									<a href="javascript:void(0);" NAME="My Window Name" title=" My title here "
										onClick='javascript:window.open("<?= base_url('spk/popjenis'); ?>","Ratting",
										"width=900,height=300,left=170,top=120,toolbar=1,status=1,");'>
										<button class="btn btn-primary" type="button" style="height: 40px;width: 150px;">Jasa</button>
									</a>
									<a href="javascript:void(0);" NAME="My Window Name" title=" My title here "
										onClick='javascript:window.open("<?= base_url('spk/poppart'); ?>","Ratting",
										"width=900,height=300,left=170,top=120,toolbar=1,status=1,");'>
										<button class="btn btn-success" type="button" style="height: 40px;width: 150px;">Part</button>
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
								<label class="" for="kode">Pekerjaan/Part</label>&nbsp &nbsp
									<div class="col-xs-1">
										<input class="form-control" type="text" name="jenis_pekerjaan" value="" id="jenis_pekerjaan" style="width:230px;" autocomplete="off" readonly>
									</div>
								<label class="col-sm" for="kode">Harga</label>
									<div class="col-xs-1">
										<input class="form-control" type="text" name="harga" value="" id="harga" style="width:120px;" onkeyup="sum();" autocomplete="off">
									</div>
								<label class="col-sm" for="id">Jumlah</label>
									<div class="col-xs-1">
										<input class="form-control" type="text" name="jumlah" value="" id="jumlah" style="width:60px;" onkeyup="sum();" autocomplete="off">
										<input class="form-control" type="text" name="jumlah2" value="" id="jumlah2" style="width:60px;" onkeyup="sum();" autocomplete="off" hidden>
										<input class="form-control" type="text" name="jumlah3" value="" id="jumlah3" style="width:60px;" onkeyup="sum();" autocomplete="off" hidden>
									</div>
								<label class="col-sm" for="id">Diskon</label>
									<div class="col-xs-1">
										<input class="form-control" type="text" name="diskon" value="0" id="diskon" style="width:60px;" onkeyup="sum();" autocomplete="off">
									</div>
								<label class="col-sm" for="id">Total</label>
									<div class="col-xs-1">
										<input class="form-control" type="text" name="total" value="" id="total" style="width:150px;">
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
								<th>Pekerjaan/Part</th>
								<th>Harga</th>
								<th>Jumlah</th>
								<th>Diskon (%)</th>
								<th>Total</th>
								<th>Hapus</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="6"><b>Jasa Pekerjaan</td>
							</tr>
							<tr>
								<?php
									$jumlah = 0;
									$panel = 0;
									foreach ($detail as $dtl):
										if ($dtl['no_spk']== $spk['no_est']){ 
											foreach ($jenis as $pekerjaan):
												if ($pekerjaan['kd_jenis']== $dtl['kd_jenis']){
								?>
								<td style="font-size:0.9rem"><?= $pekerjaan['nama']; ?></td>
								<td style="font-size:0.9rem" ><?= number_format($dtl['harga'], 0, ',', '.') ?></td>
								<td style="font-size:0.9rem"><?= $dtl['jumlah']; ?></td>
								<td style="font-size:0.9rem" align="center"><?= $dtl['diskon']; ?>%</td>
								<td style="font-size:0.9rem"><?= number_format($dtl['total'], 0, ',', '.') ?></td>
								<td  style="width:50px;">
								<a href="<?= base_url('spk/ubahDetailJasa/'); ?><?= $spk['no_est']; ?>/<?= $dtl['kd_detail']; ?>" class="badge badge-secondary pl-2 pr-2">Edit</a>
									<a href="<?= base_url('detail/hapus/'); ?><?= $dtl['kd_detail']; ?>" class="badge badge-danger pl-2 pr-2" onclick="return confirm('Apakah kamu ingin menghapus data ini?');">Hapus</a>
								</td>
							
								<?php $panel += $dtl['jumlah']; ?>
								<?php $jumlah += $dtl['total']; ?>
            					<?php  } endforeach ?>
        					</tr>
								
								<?php } endforeach?>
								<tr>
                            <td colspan="2">Total Panel</td>
							  <td colspan="4"><?= number_format($panel, 0, ',', '.') ?></td>
                              
                            </tr>
							<tr>
								<td colspan="6"><b>Spare Part</td>
							</tr>
							
        					<tr>
								<?php
									$jumlahp = 0;
									
									foreach ($detail as $dtl):
										if ($dtl['no_spk']== $spk['no_est']){ 
											foreach ($part as $p):
												if ($p['kd_part']== $dtl['kd_jenis']){
								?>
								<td style="font-size:0.9rem"><?= $p['nama']; ?></td>
								<td style="font-size:0.9rem" ><?= number_format($dtl['harga'], 0, ',', '.') ?></td>
								<td style="font-size:0.9rem"><?= $dtl['jumlah']; ?></td>
								<td style="font-size:0.9rem" align="center"><?= $dtl['diskon']; ?>%</td>
								<td style="font-size:0.9rem"><?= number_format($dtl['total'], 0, ',', '.') ?></td>
								<td  style="width:50px;">
								<a href="<?= base_url('spk/ubahDetailPart/'); ?><?= $spk['no_est']; ?>/<?= $dtl['kd_detail']; ?>" class="badge badge-secondary pl-2 pr-2">Edit</a>
                            		<a href="<?= base_url('detail/hapus/'); ?><?= $dtl['kd_detail']; ?>" class="badge badge-danger pl-2 pr-2" onclick="return confirm('Apakah kamu ingin menghapus data ini?');">Pilih</a>
                            	</td>
								<?php  ?>
								<?php $jumlahp += $dtl['total']; ?>
            					<?php  } endforeach ?>
        					</tr>

							

								<?php } endforeach?>
                         	<tr>
                              <td colspan="4">Total</td>
							<?php $total= $jumlah + $jumlahp ?>
                              <td colspan="3"><?= number_format($total, 0, ',', '.') ?></td>
                            </tr>
                        </tbody>
                    </table>
					
				</div>
					<div class="row">
						<div class="col-sm-8">
						</div>
						<div class="col-sm-2">
						</div>
						<div class="col-sm-2">
							<a href="/body-repair/spk" class="btn btn-danger float-right btn-block"><i class="fa fa-undo"></i> Kembali</a>
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
		var stok = parseInt(jumlah2)-parseInt(jumlah);
		var result = parseInt(harga) * parseInt(jumlah);
		var diskon = (parseInt(result) * parseFloat(diskon))/ 100;
		var jumlah = parseInt(result)-parseFloat(diskon);
		// var result2 = parseInt(ttl) + parseInt(jumlah);
		

			if (!isNaN(result)) {
				document.getElementById('total').value = jumlah;
				// document.getElementById('ttl2').value = result2;
				
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
