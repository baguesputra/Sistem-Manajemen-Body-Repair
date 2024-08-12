<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>" />

<style>
    footer{
        position:absolute;
        bottom:0;
        width: 99%
    }
</style>
</head>
<body>

    <table >
        <tr>
            <td style="font-size:0.9rem; width:890px"><b>PT. MULIA JAYA MOTOR</td>
            <td style="font-size:0.9rem"><b>TGL : <?php echo date("d-M-Y"); ?></td>
        </tr>
        <tr>
            <td style="font-size:0.9rem"><b>JL. JEND. A. YANI KM. 5,5 NO. 1 RT.22</td>
            <td style="font-size:0.9rem"><b>JAM : <?php echo date("H:i:s");?></td>
        </tr>
        <tr>
            <td style="font-size:0.9rem"><b>BANJARMASIN</td>
        </tr>
        <tr>
            <td style="font-size:0.9rem"><b>TELP : 0511-3253355, FAX : 0511-3250067</td>
        </tr>
    </table>
    <br>
    <br>
    <h2 align="center">Laporan Bulanan</h2>
    <h6 align="center"><?= date('F - Y', strtotime($tgl_awal)) ?></h6>
<br>
<br>
    
            <table id="example" class="table table-striped table-bordered" >

            <thead>          
                <tr>
                    <td style="font-size:0.9rem;">No Est</td>
                    <td style="font-size:0.9rem;">No Spk</td>
                    <td style="font-size:0.9rem;">Tanggal Spk</td>
                    <td style="font-size:0.9rem;">No Polisi</td>
                    <td style="font-size:0.9rem;">Customer</td>
                    <td style="font-size:0.9rem;">SA</td>
                    <td style="font-size:0.9rem;">Foreman</td>
                    <td style="font-size:0.9rem;">Status</td>
                    <td style="font-size:0.9rem;">Vendor</td>
                    <td style="font-size:0.9rem;">Pembayar</td>
                    <td style="font-size:0.9rem;">Tanggal Masuk</td>
                    <td style="font-size:0.9rem;">Tanggal Keluar</td>
                    
                </tr>
                </thead>
                <?php foreach ($spk->result() as $s):
                    
                    if($s->status== "Estimasi"){
                ?>

                <?php } else { ?>
                <tr>
                    
                    <td style="font-size:0.9rem;"><?= $s->no_est ?></td>
                    <td style="font-size:0.9rem;"><?= $s->no_spk ?></td>
                    <td style="font-size:0.9rem;"><?= $s->tgl_spk ?></td>

                    <?php foreach ($kendaraan as $kdr):
                    if ($kdr['kd_kendaraan']== $s->kd_kendaraan){
                    ?>
                    <td style="font-size:0.9rem;"><?= $kdr['no_polisi'];?></td>
                    <?php } endforeach;?>

                    <?php foreach ($customer as $cst):
                        if ($cst['kd_customer']==$s->kd_customer){ 
                        ?>
                    <td style="font-size:0.9rem;"><?= $cst['nama_customer'] ?></td>
                    <?php } endforeach;?>

                    <?php foreach ($serviceadvisor as $sa):
                        if ($sa['kd_sa']==$s->kd_sa){ 
                        ?>
                    <td style="font-size:0.9rem;"><?= $sa['nama_sa'] ?></td>
                    <?php } endforeach;?>

                    <?php foreach ($foreman as $fm):
                        if ($fm['kd_fm']==$s->kd_fm){ 
                        ?>
                    <td style="font-size:0.9rem;"><?= $fm['nama_fm'] ?></td>
                    <?php } endforeach;?>
                    <td style="font-size:0.9rem;"><?= $s->status ?></td>
                    <td style="font-size:0.9rem;"><?= $s->vendor ?></td>
                    <td style="font-size:0.9rem;"><?= $s->pembayar ?></td>
                    <td style="font-size:0.9rem;"><?= $s->mulai ?></td>
                    <td style="font-size:0.9rem;"><?= $s->akhir ?></td>
                </tr>
          
                <?php } endforeach;?>
            </table>
                
   
</body>
<footer>
    <table align="right">
        <tr>
            <td></td>
        </tr>
        <tr align="center">
            <td style="font-size:0.9rem; height:170px;" >Banjarmasin, <?php echo date("d-M-Y"); ?></td>
            
        </tr>
        <tr align="center">
            <td style="font-size:0.9rem; border-bottom:1px solid;" >FELIX SUTANTO</td>                             
        </tr>
        <tr align="center">
            <td style="font-size:0.9rem;" >BODY REPAIR MANAGER</td>
        </tr>
    </table>
</footer>
</html>
<script>
    window.print();
</script>
<?php ini_set('display_errors','off'); ?>
<?php
  error_reporting(0);
?>