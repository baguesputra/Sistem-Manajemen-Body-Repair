<?php $this->load->view('include/navbar'); ?>
<br>
<div class="container">
		<h3><i class="fa fa-bookmark"></i>  LAPORAN INCENTIVE</h3>
		<div class="row">
			<div class="col-lg-12">
				<div class="card border-secondary" >
					<div class="card-header text-white bg-secondary"><i class="fa fa-info-circle"></i>
						Input Tanggal
					</div>
					<div class="card-body">
							<?= form_open('cetak/cetakIncentive', ['target' => '_blank']) ?>
							<div class="form-inline">
									<label class="col-sm-2" for="id">Tanggal Awal</label>
									<div class="col-sm-2">
										<input class="form-control" type="date" name="tgl_awal" id="tgl_awal" value="" style="width:188px;" required>
									</div>
									
							</div>
							<br>
							<div class="form-inline">
									<label class="col-sm-2" for="id">Tanggal Akhir</label>
									<div class="col-sm-2">
										<input class="form-control" type="date" name="tgl_akhir" id="tgl_akhir" value="" style="width:188px;" required>
									</div>
									
							</div>

						
						<br>
						<br>


							<div class="row">

								<div class="col-sm-2" style="text-align: right;">
									<button type="submit" class="btn btn-success float-right btn-block" name="tambah" style="width:80px;"><i class="fa fa-file-excel-o"></i>  Excel</button>
								</div>
								<div class="col-sm-2" style="text-align: right;">
									<a href="/body-repair/cetak/" class="btn btn-danger float-right btn-block"><i class="fa fa-undo"></i>Kembali</a>
								</div>
							</div>
<?= form_close()?>
	

<script src="<?= base_url('assets') ?>/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.2/js/dataTables.fixedHeader.min.js"></script>
<script>
	
</script>
<?php ini_set('display_errors','off'); ?>
<?php
  error_reporting(0);
?>