<?php $this->load->view('include/navbar'); ?>

<div class="container-fluid">
  <form action="" method="post">
    <h3><i class="fa fa-edit"></i> UPDATE JOB STATUS</h3>
    <div class="row">
      <div class="col-sm-8">
        <div class="card border-secondary">
          <div class="card-header text-white bg-secondary"><i class="fa fa-info-circle"></i>
            Informasi Transaksi
          </div>
          <div class="card-body">
            <div class="form-inline"> 
                <label class="col-sm-2" for="id">NO. SPK</label> &nbsp &nbsp &nbsp
                <div class="input-group sm-6">
                  <input class="form-control" type="text" name="no_est" value="<?= $spk['no_est']; ?>" style="width:180px;" readonly>
                  <input class="form-control" type="text" name="no_spk" id="no_spk" value="<?= $spk['no_spk']; ?>"  style="width:188px;"  readonly hidden>
                </div>
            </div>
            <br>
            <div class="form-inline">
              <label class="col-sm-2" for="id" style="text-align: right;">Status Terakhir  </label>
              &nbsp &nbsp &nbsp
              <div class="input-group sm-6">
                <input class="form-control" type="text" name="sa" value="<?= $spk['status']; ?>" style="width:180px;" readonly>
              </div>
            </div>
            <br>
            <div class="form-group">
              &nbsp<label class="col-sm-2" for="id" style="text-align: right;">Status Baru  </label>
              &nbsp
              <select class="custom-select custom-select-md sm-6" name="status" style="width:185px;" >
                <option selected hidden value="<?= $spk['status']; ?>">Pilih Status Baru</option>
                <option value="Batal SPK">Batal SPK</option>
                <option value="Pengajuan Asuransi">Pengajuan Asuransi</option>
                <option value="Unit Belum Masuk">Unit Belum Masuk</option>
                <option value="Antrian Masuk">Antrian Masuk</option>
                <option value="Antrian Bongkar">Antrian Bongkar</option>
                <option value="Bongkar">Bongkar</option>
                <option value="Tarik Body">Tarik Body</option>
                <option value="Tunggu Parts">Tunggu Parts</option>
                <option value="Welding">Welding</option>
                <option value="Antrian Dempul">Antrian Dempul</option>
                <option value="Dempul">Dempul</option>
                <option value="Epoxy">Epoxy</option>
                <option value="Persiapan Cat">Persiapan Cat</option>
                <option value="Pengecatan">Pengecatan</option>
                <option value="Antrian Pasang">Antrian Pasang</option>
                <option value="Pemasangan">Pemasangan</option>
                <option value="Antrian Poles">Antrian Poles</option>
                <option value="Poles">Poles</option>
                <option value="Finishing">Finishing</option>
                <option value="Rawat Jalan">Rawat Jalan</option>
                <option value="Tambahan SPK">Tambahan SPK</option>
                <option value="Delivery">Delivery</option>
              </select>
            </div>
            <div class="form-inline">
              <label class="col-sm-2" for="id">Dari Tanggal</label>
              <div class="col-sm-3">
                <input class="form-control" type='date' name='mulai' value="<?= $spk['mulai']; ?>" style="resize:none; width:225px;" readonly>
              </div>

              <div class="col-sm-6">
                <input class="form-control" type='local-date' name='akhir' value="<?php echo date('Y-m-d H:i:s'); ?>" style="resize:none; width:225px;" readonly>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-4">
      </div>
      <div class="col-sm-2" style="text-align: right;">
        <button type="submit" class="btn btn-dark float-right btn-block" name="tambah"><i class="fa fa-edit"></i>  Update</button>
      </div>
      <div class="col-sm-2" style="text-align: right;">
        <button type="button" class="btn btn-danger float-right btn-block"  onclick="history.back();"><i class="fa fa-undo"></i>  Kembali</button>
      </div>
    </div>
  </form>
</div>
<?php ini_set('display_errors','off'); ?>
<?php
  error_reporting(0);
?>
