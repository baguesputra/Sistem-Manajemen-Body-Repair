<?php $this->load->view('include/navbar'); ?>

<div class="container">
  <div class="row mt-2">
    <div class="col-md-12">
            <h3>Ubah Data Kwitansi</h3>
      <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            Ubah Data Kwitansi
            <a href="<?= base_url('kwitansi/post/'); ?><?= $kwitansi['no_kwitansi'] ?>" class="btn btn-success" style="margin-left:800px;" onclick="return confirm('Apakah kamu yakin data akan di post?');">Post</a>
        </div>
        <div class="card-body">
       
          <form action="" method="post">

          <div class="form-inline">
            <label class="col-sm-2" for="kode">No Kwitansi</label>
              <div class="col-sm-3">
                <input class="form-control" type="text" name="no_kwitansi" value="<?= $kwitansi['no_kwitansi']; ?>" id="no_kwitansi" readonly>
              </div>
                <label class="col-sm-2" for="id">Tanggal</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="date" name="tgl" value="<?= $kwitansi['tgl']; ?>" id="tgl" autocomplete="off">
                  </div>
            </div>
            <br>

            <div class="form-inline">
            <label class="col-sm-2" for="kode">Sudah Terima Dari</label>
              <div class="col-sm-3">
                <input class="form-control" type="text" name="dari" value="<?= $kwitansi['dari']; ?>" id="dari" autocomplete="off">
              </div>
            <label class="col-sm-2" for="id">No Ref</label>
              <div class="col-sm-3">
                <input class="form-control" type="text" name="ref" value="<?= $kwitansi['ref']; ?>" id="ref" autocomplete="off">
              </div>
          </div>
          <br>

          <div class="form-inline">
          <label class="col-sm-2" for="kode">Jumlah</label>
              <div class="col-sm-3">
                <input class="form-control" type="text" name="jumlah" value="<?= $kwitansi['jumlah']; ?>" id="jumlah" autocomplete="off">
              </div>
            <label class="col-sm-2" for="id">Tempo</label>
              <div class="col-sm-3">
                <input class="form-control" type="text" name="tempo" value="<?= $kwitansi['tempo']; ?>" id="tempo" autocomplete="off" >
              </div>
          </div>
          <br>

          <div class="form-inline">
          
              <label class="col-sm-2" for="kode">Untuk Pembayar</label>
              <div class="col-sm-3">
                <!-- <input class="form-control" type="text" name="untuk" value="<?= $kwitansi['untuk']; ?>" id="untuk" autocomplete="off" style="width:730px;"> -->
                <textarea class="form-control" name="untuk" id="untuk" cols="30" rows="5" style="width:730px;"><?= $kwitansi['untuk']; ?></textarea>
              </div>
          </div>
          <br>
                  <!-- <input type="text" class="form-control" id="created_at" name="created_at" value="<?= $kwitansi['created_at'];?>" autocomplete="off">
                  <?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>
                  
                  <input type="text" class="form-control" id="created_by" name="created_by" value="<?= $kwitansi['created_by'];?>" autocomplete="off" >
                  <?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?> -->
                
                  <input type="datetime-local" class="form-control" id="updated_at" name="updated_at" value="<?php echo Date('Y-m-d\TH:i:s',time()) ?>" autocomplete="off" hidden>
                  <?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>
                  
                  <input type="text" class="form-control" id="updated_by" name="updated_by" value="<?php echo $this->session->userdata("username"); ?>" autocomplete="off" hidden>
                  <?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>
            <br>
            
            <div class="class='col-xs-6'">
              <div class="row">

                <div class="col-sm-8">
                </div>

                <div class="col-sm-2">
                  <button type="submit" class="btn btn-dark float-right btn-block" name="tambah"><i class="fa fa-edit"></i>  Ubah</button>
                </div>

                <div class="col-sm-2">
                  <button type="button" class="btn btn-danger float-right btn-block"  onclick="history.back();"><i class="fa fa-undo"></i>  Kembali</button>
                </div>
                
              </div>
            </div>
          </form>
        </div>
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