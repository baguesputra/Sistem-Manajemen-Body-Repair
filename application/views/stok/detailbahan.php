<?php $this->load->view('include/navbar'); ?>
<br>
<div class="container-fluid">
		<form class="" action="" method="post">
		<h3><i class="fa fa-bookmark"></i>  KARTU STOK</h3>
	<div class="row">
		<div class="col-lg-12">
			<div class="card border-secondary" >
				<div class="card-header text-white bg-secondary"><i class="fa fa-info-circle"></i>
					Informasi Bahan
				</div>
				<div class="card-body">
					<div class="row">
							<div class="form-inline">
									&nbsp &nbsp<label class="col-sm-2" for="id" style="text-align: right;">Kode Bahan</label>
									<div class="col-xs-3">
										<input class="form-control" type="text" name="no_est" id="no_est" value="<?= $bahan['kd_bahan']; ?>"  style="width:188px;"  readonly>
									</div>
									<label class="col-sm-2" for="id">Nama</label>
									<div class="col-sm-2">
										<input class="form-control" type="text" name="tgl_spk" id="tgl_spk" value="<?= $bahan['nama']; ?>"  style="width:188px;" readonly>
									</div>
							</div>
					</div>
				</form>
			<br>
				<div class="class table-responsive">
					<table class="table table-bordered" style="text-align:center;">
						<thead>
							<tr>
								<th>Kode Detail</th>
								<th>Jumlah</th>
								<th>Harga</th>
								<th>Total</th>
								<th>Tipe</th>
							</tr>
						</thead>
						<tbody>
						<?php
									$jumlah = 0;
									foreach ($stok as $b):
                                        if($b['kd_jenis'] == $bahan['kd_bahan']){
										
								?>
							<?php if($b['tipe']== "pengeluaran"){?>
							<tr bgcolor='#F08080'>
								
								<td style="font-size:0.9rem"><?= $b['kd_detail']; ?></td>
                                <td style="font-size:0.9rem"><?= $b['jumlah']; ?></td>
								<td style="font-size:0.9rem" ><?= number_format($b['harga'], 0, ',', '.') ?></td>
								<td style="font-size:0.9rem"><?= number_format($b['total'], 0, ',', '.') ?></td>
                                <td style="font-size:0.9rem"><?= $b['tipe']; ?></td>
            					
        					</tr>
							<?php } else { ?>
								<tr bgcolor='#7CFC00'>
								
								<td style="font-size:0.9rem"><?= $b['kd_detail']; ?></td>
                                <td style="font-size:0.9rem"><?= $b['jumlah']; ?></td>
								<td style="font-size:0.9rem" ><?= number_format($b['harga'], 0, ',', '.') ?></td>
								<td style="font-size:0.9rem"><?= number_format($b['total'], 0, ',', '.') ?></td>
                                <td style="font-size:0.9rem"><?= $b['tipe']; ?></td>
            					
        					</tr>
							
								<?php } ?>
								<?php $jumlah += $b['total']; ?>
								<?php } endforeach?>
        				
                         	<tr>
                              <td colspan="3">Total</td>
                              <td colspan="3"><?= number_format($jumlah, 0, ',', '.') ?></td>
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
							<a href="/body-repair/stok/bahan" class="btn btn-danger float-right btn-block"><i class="fa fa-undo"></i> Kembali</a>
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
		var diskon = (parseInt(result) * parseInt(diskon))/ 100;
		var jumlah = parseInt(result)-parseInt(diskon);
		

			if (!isNaN(result)) {
				document.getElementById('total').value = jumlah;
				document.getElementById('jumlah3').value = stok;
			}
				}
</script>
<?php ini_set('display_errors','off'); ?>
<?php
  error_reporting(0);
?>