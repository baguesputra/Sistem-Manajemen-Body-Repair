<?php $this->load->view('include/navbar'); ?>

<div class="container">
  <div class="row mt-2">
    <div class="col-md-12">
            <h3>Ubah Data Customer</h3>
      <div class="card border-secondary">
        <div class="card-header text-white bg-secondary">
            Ubah Data Customer
        </div>
        <div class="card-body">
          <form action="" method="post">

            <input type="hidden" value="<?= $customer['kd_customer']; ?>" name="kd_customer">
            <div class="form-inline">
                <label class="col-sm-2" for="id">Nama Customer</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="nama_customer" value="<?= $customer['nama_customer']; ?>" id="nama_customer" autocomplete="off">
                  </div>
            </div>
            <br>

            <div class="form-inline">
              <label class="col-sm-2" for="kode">Tipe Customer</label>
                <div class="col-sm-3">
                  <select class="custom-select custom-select-md sm-6" name="tipe" value="<?= $customer['tipe']; ?>" style="width:225px;" >
                    <option selected><?= $customer['tipe']; ?></option>
                    <option value="Network">Network</option>
                    <option value="Perorangan">Perorangan</option>
                    <option value="Perusahaan">Perusahaan</option>
                  </select>
                </div>
              <label class="col-sm-2" for="id">No. Telpon</label>
                <div class="col-sm-3">
                  <input class="form-control" type="text" name="telpon" value="<?= $customer['telpon']; ?>" id="telpon" autocomplete="off">
                </div>
            </div>
            <br>

            <div class="form-inline">
                <label class="col-sm-2" for="kode">No. KTP</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="no_ktp" value="<?= $customer['no_ktp']; ?>" id="no_ktp" autocomplete="off">
                  </div>
                <label class="col-sm-2" for="id">No. NPWP</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="text" name="no_npwp" value="<?= $customer['no_npwp']; ?>" id="no_npwp" autocomplete="off">
                  </div>
            </div>
            <br>

            <div class="form-inline">
              <label class="col-sm-2" for="kode">Tanggal Lahir</label>
              <?php $tgl=date('Y-m-d');?>
                <div class="col-sm-3">
                  <input class="form-control datepicker" type="date" name="lahir" id="lahir" value="<?= $customer['lahir']; ?>" style="width:225px;">
                </div>
              <label class="col-sm-2" for="id">Alamat</label>
              <div class="col-sm-3">
                  <input class="form-control" type="text" name="alamat" value="<?= $customer['alamat']; ?>" id="alamat" autocomplete="off">
              </div>
            </div>

                  <!-- <input type="text" class="form-control" id="created_at" name="created_at" value="<?= $asuransi['created_at'];?>" autocomplete="off">
                  <?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>
                  
                  <input type="text" class="form-control" id="created_by" name="created_by" value="<?= $asuransi['created_by'];?>" autocomplete="off" >
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