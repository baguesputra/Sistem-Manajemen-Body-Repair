<?php $this->load->view('include/navbar'); ?>

<div class="container-fluid">
	<form class="" action="" method="post">
		<h3><i class="fa fa-bookmark"></i>  MAINTENANCE SPK</h3>
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
										<input class="form-control" type="text" name="no_spk" id="no_spk" value="<?= $spk['no_spk']; ?>" hidden>
										<input class="form-control" type="text" name="kd_customer" id="kd_customer" value="<?= $spk['kd_customer']; ?>" hidden>
									</div>
								<label class="col-sm-2" for="id">Tanggal</label>
									<div class="col-sm-2">
										<input class="form-control" type="date" name="tgl_spk" id="tgl_spk" value="<?= $spk['tgl_spk']; ?>"  style="width:188px;" readonly>
									</div>
							</div>
						</div>
						<hr>

						<div class="row">
						<?php if($this->session->userdata['username']=="admin" || $this->session->userdata['username']=="20.08.1997" ) {?>
							<div class="col">
								<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Pembayar</label>
										<div class="input-group sm-3">
											<input class="form-control" type="text" name="pembayar" id="pembayar" value="<?= $spk['pembayar']; ?>"  style="width:316px;">
											<a href="javascript:void(0);" NAME="My Window Name" title="My title here"
										onClick='javascript:window.open("<?= base_url('spk/popcustomerdata2'); ?>","Ratting",
										"width=550,height=400,left=450,top=200,toolbar=1,status=1,");'>
										<button class="btn btn-primary" type="button" style="height: 38px;" >Customer</button>
									</a>
									<a href="javascript:void(0);" NAME="My Window Name" title="My title here"
										onClick='javascript:window.open("<?= base_url('spk/popasuransidata2'); ?>","Ratting",
										"width=550,height=400,left=450,top=200,toolbar=1,status=1,");'>
										<button class="btn btn-primary" type="button" style="height: 38px;" >Asuransi</button>
									</a>
											<input class="form-control" type="text" name="kd_asuransi" id="kd_asuransi" value="<?= $spk['kd_asuransi']; ?>"  style="width:499px;" readonly hidden>
										</div>
								</div>
							</div>
							<?php } else { ?>

								<div class="col">
								<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Pembayar</label>
										<div class="input-group sm-3">
											<input class="form-control" type="text" name="pembayar" id="pembayar" value="<?= $spk['pembayar']; ?>"  style="width:499px;" readonly>
											<input class="form-control" type="text" name="kd_asuransi" id="kd_asuransi" value="<?= $spk['kd_asuransi']; ?>"  style="width:499px;" readonly hidden>
										</div>
								</div>
							</div>

							
							<?php } ?>

							<div class="col">
								<div class="form-inline">

								</div>
							</div>
								<div class="form-inline">

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
											<input class="form-control" type="text" name="kd_kendaraan" id="kd_kendaraan" value="<?= $kdr['kd_kendaraan']; ?>" id="kd_kendaraan" readonly style="width:190px;" hidden>
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
										<textarea class="form-control" name='pekerjaan' id="pekerjaan" style="resize:none; width:435px;height:212px;"><?= $spk['pekerjaan']; ?></textarea>
									</div>
								</div>
								<br>
								<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Jenis</label>
										<div class="col-sm-6">
											<input class="form-control" type="text" name="jenis" id="jenis" value="<?= $spk['jenis']; ?>" style="resize:none; width:435px;">
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
												<div class="input-group-append">
													<a href="javascript:void(0);" NAME="My Window Name" title=" My title here "
														onClick='javascript:window.open("<?= base_url('spk/popsadata'); ?>","Ratting",
														"width=550,height=400,left=450,top=200,toolbar=1,status=1,");'>
														<button class="btn btn-primary" type="button" style="height: 38px;" ><i class="fa fa-search"></i></button>
													</a>
												</div>
										</div>
										<div class="col-sm-6">
											<input class="form-control" type="text" name="nama_sa" id="nama_sa" value="<?= $sa['nama_sa']; ?>"  style="width:240px;" readonly>
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
												<div class="input-group-append">
													<a href="javascript:void(0);" NAME="My Window Name" title=" My title here "
														onClick='javascript:window.open("<?= base_url('spk/popfmdata'); ?>","Ratting",
														"width=550,height=400,left=450,top=200,toolbar=1,status=1,'>
														<button class="btn btn-primary" type="button" style="height: 38px;" ><i class="fa fa-search"></i></button>
													</a>
												</div>
										</div>
										<div class="col-sm-6">
											<input class="form-control" type="text" name="nama_fm" id="nama_fm" value="<?= $fm['nama_fm']; ?>" style="width:240px;" readonly>
											<?php } endforeach?>
										</div>
								</div>
								<br>
								<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Vendor</label>
										<div class="col-sm-6">
											<select class="form-control" name="vendor" id="vendor" style="width:435px;" >
												<option value="<?= $spk['vendor']; ?>" selected hidden><?= $spk['vendor']; ?></option>
												<option value="BORONGAN">BORONGAN</option>
												<option value="PT JOLOTUNDO PERKASA JAYA">PT JOLOTUNDO PERKASA JAYA</option>
											</select>
										</div>
								</div>
								<br>
								<div class="form-inline">
									<label class="col-sm-2" for="id" style="text-align: right;">Estimasi</label> &nbsp &nbsp
										<div class="">
											<input class="form-control" type='date' name='mulai' id="mulai" value="<?= $spk['mulai']; ?>" style="resize:none; width:216px;" >
										</div> &nbsp
										<div class="">
											<input class="form-control" type='date' name='akhir' id="mulai" value="<?= $spk['akhir']; ?>" style="resize:none; width:215px;" >
											<input class="form-control" type='hidden' name='status' id="status"  value="<?= $spk['status']; ?>" style="resize:none; width:225px;">
										</div>

											<!-- <input type="datetime-local" class="form-control" id="created_at" name="created_at" value="<?php echo Date('Y-m-d\TH:i:s',time()) ?>" autocomplete="off" hidden>
											<?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>

											<input type="text" class="form-control" id="created_by" name="created_by" value="<?php echo $this->session->userdata("username"); ?>" autocomplete="off" hidden>
											<?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?> -->

											<input type="datetime-local" class="form-control" id="updated_at" name="updated_at" value="<?php echo Date('Y-m-d\TH:i:s',time()) ?>" autocomplete="off" hidden>
											<?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>

											<input type="text" class="form-control" id="updated_by" name="updated_by" value="<?php echo $this->session->userdata("username"); ?>" autocomplete="off" hidden>
											<?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>

								</div>
								<br>
							</div>
							<br>
						</div>

						<div class="row">
							
							<div class="col-sm-8">
							</div>

							<div class="col-sm-2" style="text-align: right;">
								<button type="submit" class="btn btn-dark float-right btn-block" name="ubah" id="ubah"><i class="fa fa-plus-circle"></i>Ubah</button>
							</div>

							<div class="col-sm-2" style="text-align: right;">
								<a href="/body-repair/spk/maintenance" class="btn btn-danger float-right btn-block"><i class="fa fa-undo"></i> Kembali</a>
							</div>
						</div>
			</div>
		</div>
	</form>
</div>
<script src="<?= base_url('assets') ?>/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.2/js/dataTables.fixedHeader.min.js"></script>
<?php ini_set('display_errors','off'); ?>
<?php
  error_reporting(0);
?>
