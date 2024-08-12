<?php $this->load->view('include/navbar'); ?>

<div class="container-fluid">
  <div class="col-md-12">
      <h3>Data Pembayaran Kredit</h3>
    <div class="card border-secondary">
      <div class="card-header text-white bg-secondary">
                    Transaksi Pembayaran
      </div>
      <div class="card-body">
        <form action="" method="post">

        <div class="row">
        <div class="form-inline">
            <label class="col-sm" for="kode">Kode Pembelian</label>
              <div class="col-xs-3">
                <input class="form-control" type="text" name="kd_pemb" value="<?= $pembelian['kd_pemb'] ?>" id="kd_pemb" readonly>
                <input class="form-control" type="text" name="kd_kredit" value="<?= $kodeunik ?>" id="kd_kredit" readonly hidden>
              </div>
            <label class="col-sm" for="id">Supplier</label>
              <div class="col-xs-3">
                <input class="form-control" type="text" name="total" value="<?= $pembelian['supplier'] ?>" id="total" autocomplete="off" readonly>
              </div>
              <label class="col-sm" for="kode">Sisa</label>
              <div class="col-xs-3">
                <input class="form-control" type="text" name="sisa" value="<?= $pembelian['sisa'] ?>" id="sisa" onkeyup="sum();" readonly>
                <input class="form-control" type="text" name="sisa2" value="<?= $pembelian['sisa'] ?>" id="sisa2" onkeyup="sum();" readonly hidden>
                <input class="form-control" type="text" name="sisa3" value="" id="sisa3" onkeyup="sum();" readonly hidden>
               
              </div>
            <label class="col-sm" for="id">Total Bayar</label>
              <div class="col-xs-3">
                <input class="form-control" type="text" name="total" value="Rp.<?= number_format($pembelian['total'], 0, ',', '.') ?>" id="total" autocomplete="off" readonly>
              </div>
          </div>
          </div>
          <br>

          <div class="row">
          <div class="form-inline">
            <label class="col-sm" for="kode">Tanggal Bayar</label>
              <div class="col-xs-3">
                <input class="form-control" type="date" name="tgl_bayar" value="" id="tgl_bayar" autocomplete="off">
              </div>
            <label class="col-sm" for="kode">Bayar</label>
              <div class="col-xs-3">
                <input class="form-control" type="text" name="bayar" value="" id="bayar" onkeyup="sum();" autocomplete="off">
              </div>
           
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

            <div class="row">

              <div class="col-sm-3">
              </div>

              <div class="col-sm-2">
                <button type="submit" class="btn btn-dark float-right btn-block" name="tambah"><i class="fa fa-plus-circle"></i>Bayar</button>
              </div>

              <div class="col-sm-2">
                <button type="button" class="btn btn-danger float-right btn-block"  onclick="history.back();"><i class="fa fa-undo"></i> Kembali</button>
              </div>
            </div>
        </form>


        <table class="table table-striped table-bordered" style="text-align:center;">
						<thead>
							<tr>
								<th>Kode Kredit</th>
								<th>Tanggal Bayar</th>
								<th>Bayar</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php
									$jumlah = 0;
									foreach ($kredit as $k):
								
								?>
								<td style="font-size:0.9rem"><?= $k['kd_kredit']; ?></td>
								<td style="font-size:0.9rem"><?= date('d-M-Y' , strtotime($k['tgl_bayar'])); ?></td>
								<td style="font-size:0.9rem"><?= number_format($k['bayar'], 0, ',', '.') ?></td>
						
            				
        					</tr>
								<?php $jumlah += $k['bayar']; ?>
                <?php   endforeach ?>
							
						
                              <td colspan="2">Total</td>
                              <td colspan="2"><?= number_format($jumlah, 0, ',', '.') ?></td>
                            </tr>
              
                    </tbody>
                </table>




      </div>
    </div>
  </div>
</div>
</body>
</html>
<script src="<?= base_url('assets') ?>/js/bootstrap.min.js"></script>
<script>
     function sum() {
		var sisa2 = document.getElementById('sisa2').value;
		var bayar = document.getElementById('bayar').value;
		var result = parseInt(sisa2) - parseInt(bayar);
        
        if (!isNaN(result)) {
          document.getElementById('sisa3').value = result;
				}
     }
</script>
<?php ini_set('display_errors','off'); ?>
<?php
  error_reporting(0);
?>
