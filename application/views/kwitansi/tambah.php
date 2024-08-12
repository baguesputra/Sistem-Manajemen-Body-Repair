<?php $this->load->view('include/navbar'); ?>

<div class="container">
  <div class="col-md-12">
      <h3>Data Customer</h3>
    <div class="card border-secondary">
      <div class="card-header text-white bg-secondary">
                    Tambah Data Kwitansi
      </div>
      <div class="card-body">
        <form action="" method="post">

          <div class="form-inline">
            <label class="col-sm-2" for="kode">No Kwitansi</label>
              <div class="col-sm-3">
                <input class="form-control" type="text" name="no_kwitansi" value="<?= $kode; ?>" id="no_kwitansi" readonly>
              </div>
            <label class="col-sm-2" for="id">Tanggal</label>
              <div class="col-sm-3">
                <input class="form-control" type="date" name="tgl" value="<?php echo date("Y-m-d"); ?>" id="tgl" autocomplete="off">
              </div>
          </div>
          <br>

          <div class="form-inline">
            <label class="col-sm-2" for="kode">Sudah Terima Dari</label>
              <div class="col-sm-3">
                <input class="form-control" type="text" name="dari" value="" id="dari" autocomplete="off">
              </div>
            <label class="col-sm-2" for="id">No Ref</label>
              <div class="col-sm-3">
                <input class="form-control" type="text" name="ref" value="" id="ref" autocomplete="off">
              </div>
          </div>
          <br>

          <div class="form-inline">
          <label class="col-sm-2" for="kode">Jumlah</label>
              <div class="col-sm-3">
                <input class="form-control" type="text" name="jumlah" value="" id="jumlah" autocomplete="off">
              </div>
           
            <label class="col-sm-2" for="id">Tempo</label>
              <div class="col-sm-3">
                <input class="form-control" type="text" name="tempo" value="" id="tempo" autocomplete="off">
              </div>
          </div>
          <br>

          <div class="form-inline">
            
              <label class="col-sm-2" for="kode">Untuk Pembayaran</label>
              <div class="col-sm-3">
                <!-- <input class="form-control" type="textarea" name="untuk" value="" id="untuk" autocomplete="off" style="width:720px;"> -->
                <textarea class="form-control" name="untuk" id="untuk" cols="30" rows="5" style="width:720px;"></textarea>
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
                <button type="submit" class="btn btn-dark float-right btn-block" name="tambah"><i class="fa fa-plus-circle"></i>  Tambah</button>
              </div>

              <div class="col-sm-2">
                <button type="button" class="btn btn-danger float-right btn-block"  onclick="history.back();"><i class="fa fa-undo"></i>  Kembali</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<script src="<?= base_url('assets') ?>/js/bootstrap.min.js"></script>
<?php ini_set('display_errors','off'); ?>
<?php
  error_reporting(0);
?>