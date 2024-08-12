<?php $this->load->view('include/navbar'); ?>

<div class="container">
    <form action="" method="post">
        <div class="row mt-2">
            <div class="col-md-9">
                <h3>Ubah Data Kendaraan</h3>
                <div class="card border-secondary">
                    <div class="card-header text-white bg-secondary">
                        Ubah Data Kendaraan
                    </div>
                    <div class="card-body">

                        <div class="form-inline">
                            <input type="hidden" class="form-control" id="kd_kendaraan" name="kd_kendaraan" value="<?= $kendaraan['kd_kendaraan']; ?>" readonly>
                        </div>
                        <br>

                        <div class="form-inline">
                            <label class="col-sm-2" for="no_polisi">No. Polisi</label>
                            <input type="text" class="form-control" id="no_polisi" name="no_polisi" value="<?= $kendaraan['no_polisi']; ?>">

                            <label class="col-sm-2" for="brand">Brand</label>
                            <input type="text" class="form-control" id="brand" name="brand" value="<?= $kendaraan['brand']; ?>">
                        </div>
                        <br>

                        <div class="form-inline">
                            <label class="col-sm-2" for="kd_rangka">Kode Rangka</label>
                            <input type="text" class="form-control" id="kd_rangka" name="kd_rangka" value="<?= $kendaraan['kd_rangka']; ?>">

                            <label class="col-sm-2" for="no_rangka">No. Rangka</label>
                            <input type="text" class="form-control" id="no_rangka" name="no_rangka" value="<?= $kendaraan['no_rangka']; ?>">
                        </div>
                        <br>

                        <div class="form-inline">
                            <label class="col-sm-2" for="kd_mesin">Kode Mesin</label>
                            <input type="text" class="form-control" id="kd_mesin" name="kd_mesin" value="<?= $kendaraan['kd_mesin']; ?>">

                            <label class="col-sm-2" for="no_mesin">No. Mesin</label>
                            <input type="text" class="form-control" id="no_mesin" name="no_mesin" value="<?= $kendaraan['no_mesin']; ?>">
                        </div>
                        <br>

                        <div class="form-inline">
                            <label class="col-sm-2" for="model">Basic Model</label>
                            <input type="text" class="form-control" id="model" name="model" value="<?= $kendaraan['model']; ?>">

                            <label class="col-sm-2" for="trans">Transisi</label>
                            <input type="text" class="form-control" id="trans" name="trans" value="<?= $kendaraan['trans']; ?>">
                        </div>
                        <br>

                        <div class="form-inline">
                            <label class="col-sm-2" for="tahun">Tahun</label>
                            <input type="text" class="form-control" id="tahun" name="tahun" value="<?= $kendaraan['tahun']; ?>">

                            <label class="col-sm-2" for="warna">Warna</label>
                            <input type="text" class="form-control" id="warna" name="warna" value="<?= $kendaraan['warna']; ?>">
                        </div>
                        <br>

                        <div class="form-inline">
                            <label class="col-sm-2" for="kd_customer">ID Customer</label>
                            <input type="text" class="form-control" id="kd_customer" name="kd_customer" readonly style="width:187px; " value="<?= $kendaraan['kd_kendaraan']; ?>">
                                <div class="input-group-append">
                                    <a href="javascript:void(0);" NAME="My Window Name" title=" My title here "
                                        onClick='javascript:window.open("<?= base_url('kendaraan/popcustomer'); ?>","Ratting",
                                        "width=550,height=400,left=450,top=200,toolbar=1,status=1,");'>
                                        <button class="btn btn-primary" type="button" style="height: 38px;" ><i class="fa fa-search"></i></button>
                                    </a>
                                </div>
                            <label class="col-sm-2" for="kd_customer">Customer</label>
                            <input type="text" class="form-control" id="nama_customer" name="nama_customer" readonly value="<?= $kendaraan['nama_customer']; ?>">
                        </div>

                            <input type="datetime-local" class="form-control" id="created_at" name="created_at" value="<?php echo Date('Y-m-d\TH:i:s',time()) ?>" autocomplete="off" hidden>
                            <?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>
                            
                            <input type="text" class="form-control" id="created_by" name="created_by" value="<?php echo $this->session->userdata("username"); ?>" autocomplete="off" hidden>
                            <?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>
                            
                            <input type="datetime-local" class="form-control" id="updated_at" name="updated_at" value="<?php echo Date('Y-m-d\TH:i:s',time()) ?>" autocomplete="off" hidden>
                            <?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>
                            
                            <input type="text" class="form-control" id="updated_by" name="updated_by" value="<?php echo $this->session->userdata("username"); ?>" autocomplete="off" hidden>
                            <?= form_error('nama', '<small class="pl-3 text-danger">', '</small>'); ?>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <br>
            <div class="row">

                <div class="col-sm-5">
                </div>

                <div class="col-sm-2">
                <button type="submit" class="btn btn-dark float-right btn-block" name="Ubah"><i class="fa fa-plus-circle"></i>  Ubah</button>
                </div>

                <div class="col-sm-2">
                <button type="button" class="btn btn-danger float-right btn-block"  onclick="history.back();"><i class="fa fa-undo"></i>  Kembali</button>
                </div>
                
        </form>
    </div>
</div>
</body>
</html>
<script src="<?= base_url('assets') ?>/js/bootstrap.min.js"></script>
<?php ini_set('display_errors','off'); ?>
<?php
  error_reporting(0);
?>