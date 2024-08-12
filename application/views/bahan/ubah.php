<?php $this->load->view('include/navbar'); ?>

<div class="container">
    <div class="row mt-2">
        <div class="col-md-5">
            <h3>Ubah Data Bahan</h3>
            <div class="card border-secondary">
                <div class="card-header text-white bg-secondary">
                    Ubah Data
                </div>
            <div class="card-body">
                <form action="" method="post">

                    <input type="hidden" value="<?= $bahan['kd_bahan']; ?>" name="kd_bahan">
                    <div class="form-group">
                        <label for="nama">Nama Bahan</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $bahan['nama']; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="nama">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?= $bahan['jumlah']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="nama">Keterangan</label>
                        <input type="text" class="form-control" id="ket" name="ket" value="<?= $bahan['ket']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="nama">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="<?= $bahan['harga']; ?>">
                    </div>

                        <!-- <input type="text" class="form-control" id="created_at" name="created_at" value="<?= $asuransi['created_at'];?>" autocomplete="off">
                        <?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>     
                            
                        <input type="text" class="form-control" id="created_by" name="created_by" value="<?= $asuransi['created_by'];?>" autocomplete="off" >
                        <?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?> -->
                        
                        <input type="datetime-local" class="form-control" id="updated_at" name="updated_at" value="<?php echo Date('Y-m-d\TH:i:s',time()) ?>" autocomplete="off" hidden>
                        <?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>
                        
                        <input type="text" class="form-control" id="updated_by" name="updated_by" value="<?php echo $this->session->userdata("username"); ?>" autocomplete="off" hidden>
                        <?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>

                    <div class="row">

                        <div class="col-sm-3">
                        </div>

                        <div class="col-sm-4">
                        <button type="submit" class="btn btn-dark float-right btn-block" name="tambah"><i class="fa fa-edit"></i>  Ubah</button>
                        </div>

                        <div class="col-sm-4">
                        <button type="button" class="btn btn-danger float-right btn-block"  onclick="history.back();"><i class="fa fa-undo"></i>  Kembali</button>
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