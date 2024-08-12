<?php $this->load->view('include/navbar'); ?>

<div class="container-fluid">
		<form class="" action="" method="post">
		<h3><i class="fa fa-bookmark"></i>  TAMBAH DETAIL PEMBELIAN</h3>
	<div class="row">
		<div class="col-lg-12">
			<div class="card border-secondary" >
				<div class="card-header text-white bg-secondary"><i class="fa fa-info-circle"></i>
					Transaksi Pembelian
				</div>
				<div class="card-body">
				<a href="<?= base_url('pembelian/post/'); ?><?= $pembelian['kd_pemb'] ?>" class="btn btn-success" style="margin-left:1225px;position:absolute;">Post</a>
					<div class="row">
							<div class="form-inline">
									&nbsp &nbsp<label class="col-sm-2" for="id" style="text-align: right;">Kode Pembelian</label>
									<div class="col-xs-3">
										<input class="form-control" type="text" name="kd_pemb" id="kd_pemb" value="<?= $pembelian['kd_pemb'] ?>"  style="width:188px;"  readonly>
									</div>
									<label class="col-sm-2" for="id">Tanggal</label>
									<div class="col-sm-2">
										<input class="form-control" type="date" name="tgl" id="tgl" value="<?= $pembelian['tgl_pemb'] ?>"  style="width:188px;" readonly>
									</div>
									
							</div>
						

					</div>
					
					<br>
					<div class="row">
						<div class="col">
							<div class="form-inline">
								<label class="col-sm-2" for="id" style="text-align: right;">Supplier</label>
								<div class="input-group sm-3">
								<input class="form-control" type="text" name="supplier" id="supplier" value="<?= $pembelian['supplier'] ?>"  style="width:499px;" readonly>
								</div>
							</div>
						</div>

						<div class="col">
							<div class="form-inline">
								<label class="col-sm-2" for="id" style="text-align: right;">Status</label>
									<div class="sm-3">
										<input class="form-control" type="text" name="supplier" id="supplier" value="<?= $pembelian['status'] ?>" style="width:199px;" readonly>
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
							
								<label class="col-sm-2" for="id" style="text-align: right;">Tempo</label>
									<div class="input-group sm-2">
										<input class="form-control" type="text" name="top" id="top" value="<?= $pembelian['top'] ?> Hari" readonly style="width:190px;">
									</div>
								<label class="col-sm-2" for="id">Bayar</label>
									<div class="col-sm-2">
										<input class="form-control" type="text" name="bayar" id="bayar" value="<?= $pembelian['total'] ?>" onkeyup="sum();" style="width:188px;" readonly>
										<?php
										$jumlah =0;
										foreach ($detailpemb as $dtl):
										$jumlah += $dtl['total'];
										?>
										
										<?php endforeach ?>
										<input class="form-control" type="text" name="bayar2" id="bayar2" value="<?= $pembelian['total'] ?>" onkeyup="sum();" style="width:188px;" readonly hidden>
										<input class="form-control" type="text" name="bayar3" id="bayar3" value="" style="width:188px;" onkeyup="sum();" readonly hidden>
									</div>
							</div>
						<br>
						
							
						</div>

				  		<div class="col">
				  			<div class="form-inline">
								<label class="col-sm-2" for="id" style="text-align: right;">Sisa</label>
									<div class="col-sm-3">
										<input class="form-control" type="text" name="sisa" id="sisa" value="<?= $pembelian['sisa'] ?>" readonly>
									</div>
							</div>
						<br>
							
							
				  	</div>
				
				<br>
			</div>
			<br>


						<h6>Detail Pembelian</h6>
						<hr>

                         	<div class="form-inline">
               					<div class="col-sm-2">
									<input class="form-control" type="text" name="kd_detail" value="<?= $kodeunik1 ?>" id="kd_detail" readonly hidden>
									<input class="form-control" type="text" name="kd_stok" value="<?= $kodeunik2 ?>" id="kd_stok" readonly hidden>
									<input class="form-control" type="text" name="kd_jenis" value="" id="kd_jenis" readonly hidden>
               					</div>
                           
								<?php $tgl=date('Y-m-d');?>
								<div class="col-sm-3">
									<input class="form-control datepicker" type="date" name="" id="tgl_spk" value="	" style="width:225px;" readonly hidden >
								</div>
								
									<a href="javascript:void(0);" NAME="My Window Name" title=" My title here "
										onClick='javascript:window.open("<?= base_url('pembelian/popbahandata'); ?>","Ratting",
										"width=900,height=300,left=170,top=120,toolbar=1,status=1,");'>
										<button class="btn btn-primary" type="button" style="height: 40px;width: 150px;">Bahan</button>
								</a>
									
							
							
               					</div>

								<div class="form-inline">
									<div class="input-group sm-4">
									
									<div class="input-group-append">
								</div>
                          		</div>
                     	 	</div>
                      	<br>
							<div class="form-inline">
								<label class="" for="kode">Nama Barang</label>&nbsp &nbsp
									<div class="col-xs-1">
										<input class="form-control" type="text" name="jenis_pekerjaan" value="" id="jenis_pekerjaan" style="width:230px;" autocomplete="off" readonly>
									</div>
								<label class="col-sm" for="kode">Harga</label>
									<div class="col-xs-1">
										<input class="form-control" type="text" name="harga" value="" id="harga" style="width:120px;" onkeyup="sum();" autocomplete="off">
									</div>
								<label class="col-sm" for="id" hidden>Jumlah</label>
									<div class="col-xs-1">
										<input class="form-control" type="text" name="jumlah2" value="" id="jumlah2" style="width:60px;" onkeyup="sum();" autocomplete="off" readonly hidden>
										<input class="form-control" type="text" name="jumlah" value="" id="jumlah" style="width:60px;" onkeyup="sum();" autocomplete="off" readonly hidden>
									</div>
								<label class="col-sm" for="id">Diskon</label>
									<div class="col-xs-1">
										<input class="form-control" type="text" name="diskon" value="0" id="diskon" style="width:60px;" onkeyup="sum();"  autocomplete="off">
									</div>
								<label class="col-sm" for="id">Stok</label>
									<div class="col-xs-1">
										<input class="form-control" type="text" name="stok" value="" id="stok" style="width:60px;" onkeyup="sum();"  autocomplete="off">
									</div>
								<label class="col-sm" for="id">Total</label>
									<div class="col-xs-1">
										<input class="form-control" type="text" name="total" value="" id="total" style="width:150px;" readonly>
									</div>

									<input class="form-control" type="text" name="tipe" value="pembelian" id="tipe" style="width:150px;" readonly hidden>

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
					<table class="table table-striped table-bordered" style="text-align:center;">
						<thead>
							<tr>
								<th>Nama Barang</th>
								<th>Harga</th>
								<th>Jumlah</th>
								<th>Diskon (%)</th>
								<th>Total</th>
								<th>Hapus</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
									$jumlah = 0;
									foreach ($detailpemb as $dtl):
										if ($dtl['kd_pemb']== $pembelian['kd_pemb']){ 
											foreach ($bahan as $b):
												if ($b['kd_bahan'] == $dtl['kd_jenis']){
								?>
								<td style="font-size:0.9rem"><?= $b['nama']; ?></td>
								<td style="font-size:0.9rem" ><?= $dtl['harga']?></td>
								<td style="font-size:0.9rem"><?= $dtl['jumlah']; ?><?= $b['ket']; ?></td>
								<td style="font-size:0.9rem" align="center"><?= $dtl['diskon']; ?>%</td>
								<td style="font-size:0.9rem"><?= number_format($dtl['total'], 0, ',', '.') ?></td>
								<td  style="width:50px;">
									<a href="<?= base_url('pembelian/hapus/'); ?><?= $dtl['kd_detail']; ?>" class="badge badge-danger pl-2 pr-2" onclick="return confirm('Apakah kamu ingin menghapus data ini?');">Pilih</a>
								</td>
            					<?php  } endforeach ?>
        					</tr>
								<?php $jumlah += $dtl['total']; ?>
								<?php } endforeach?>
							<tr>
								<?php
									$jumlah = 0;
									foreach ($detailpemb as $dtl):
										if ($dtl['kd_pemb']== $pembelian['kd_pemb']){ 
											foreach ($part as $p):
												if ($p['kd_part'] == $dtl['kd_jenis']){
								?>
								<td style="font-size:0.9rem"><?= $p['nama']; ?></td>
								<td style="font-size:0.9rem" ><?= number_format($dtl['harga'], 0, ',', '.') ?></td>
								<td style="font-size:0.9rem"><?= $dtl['jumlah']; ?></td>
								<td style="font-size:0.9rem"><?= $dtl['diskon']; ?></td>
								<!-- <td style="font-size:0.9rem" align="center"><?= $dtl['diskon']; ?>%</td> -->
								<td style="font-size:0.9rem"><?= number_format($dtl['total'], 0, ',', '.') ?></td>
								<td  style="width:50px;">
									<a href="<?= base_url('pembelian/hapus/'); ?><?= $dtl['kd_detail']; ?>" class="badge badge-danger pl-2 pr-2" onclick="return confirm('Apakah kamu ingin menghapus data ini?');">Pilih</a>
								</td>
            					<?php  } endforeach ?>
        					</tr>
								<?php $jumlah += $dtl['total']; ?>
								<?php } endforeach?>
							<tr>
                              <td colspan="4">Total</td>
                              <td colspan="2"><?= number_format($jumlah, 0, ',', '.') ?></td>
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
							<a href="/body-repair/pembelian" class="btn btn-danger float-right btn-block"><i class="fa fa-undo"></i> Kembali</a>
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
			var stok = document.getElementById('stok').value;
			var jumlah2 = document.getElementById('jumlah2').value;
			var diskon = document.getElementById('diskon').value;
			var result = parseFloat(harga) * parseFloat(stok);
			var disk = (parseInt(result) / 100) * parseInt(diskon);
			var total = parseInt(result) - parseInt(disk);
			var bayar2 = document.getElementById('bayar2').value;
			var bayar = parseInt(total) + parseInt(bayar2);
			var stok = parseFloat(stok) + parseFloat(jumlah2);
			
				if (!isNaN(result)) {
					document.getElementById('total').value = total;
					document.getElementById('jumlah').value = stok;
					document.getElementById('bayar3').value = bayar;
				}
					}

	
</script>
<?php ini_set('display_errors','off'); ?>
<?php
  error_reporting(0);
?>
