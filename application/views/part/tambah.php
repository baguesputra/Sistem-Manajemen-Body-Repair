<?php $this->load->view('include/navbar'); ?>

<div class="container">
    <div class="row mt-2">
        <div class="col-md-5">
            <h3>Tambah Sparepart</h3>
            <div class="card border-secondary">
                <div class="card-header text-white bg-secondary">
                    Tambah Data
                </div>
                <div class="card-body">
                    <form action="" method="post">

                        <div class="form-group">
                            <label for="kode">Kode Sparepart</label>
                            <input type="text" class="form-control" id="kd_part" name="kd_part" value="<?= $kodeunik; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Sparepart</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>

                        <div class="form-group">
                            <label for="kode">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga">
                        </div>

                        <div class="form-group">
                            <label for="kode">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok">
                        </div>

                            <input type="datetime-local" class="form-control" id="created_at" name="created_at" value="<?php echo Date('Y-m-d\TH:i:s',time()) ?>" autocomplete="off" hidden>
                            <?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>

                            <input type="text" class="form-control" id="created_by" name="created_by" value="<?php echo $this->session->userdata("username"); ?>" autocomplete="off" hidden>
                            <?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>

                            <input type="datetime-local" class="form-control" id="updated_at" name="updated_at" value="<?php echo Date('Y-m-d\TH:i:s',time()) ?>" autocomplete="off" hidden>
                            <?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>

                            <input type="text" class="form-control" id="updated_by" name="updated_by" value="<?php echo $this->session->userdata("username"); ?>" autocomplete="off" hidden>
                            <?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>

                        <div class="row">

                            <div class="col-sm-3">
                            </div>
                            
                            <div class="col-sm-4">
                            <button type="submit" class="btn btn-dark float-right btn-block" name="tambah"><i class="fa fa-plus-circle"></i>  Tambah</button>
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
