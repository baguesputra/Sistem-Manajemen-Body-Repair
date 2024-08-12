<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
            <td style="font-size:0.9rem; width:590px"><b>PT. MULTI JAYA MOTOR</td>
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


<h5 align="center">Surat Perintah Kerja</h5>
<br>
    
            <table>

                <?php foreach ($dataspk as $row):
                foreach ($customer as $cst):
                foreach ($dataspk as $data):

                if ($row['no_est'] == $spk['no_est']){
                    if ($cst['kd_customer']==$row['kd_customer']){ 
                       
                        ?>
                        <?php  if ($data['no_est'] == $spk['no_est']){ ?>
                <tr>
                    <td style="font-size:0.9rem; width:60px">No Spk</td>
                    <td style="font-size:0.9rem; width:300px">: <?= $row['no_spk']; ?></td>
                    <td style="font-size:0.9rem;">Nama Customer</td>
                    <td style="font-size:0.9rem;">: <?= $cst['nama_customer'] ?></td>
                        
                </tr>
                <tr>
                    <td style="font-size:0.9rem;">Tanggal</td>
                    <td style="font-size:0.9rem;">: <?= $row['tgl_spk']; ?></td>
                    <td style="font-size:0.9rem;">No Telpon</td>
                    <td style="font-size:0.9rem;">: <?= $cst['telpon'] ?></td>
                </tr>
               
                <?php foreach ($asuransi as $asr):
                
                        if ($asr['kd_asuransi']==$row['kd_asuransi']){
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="font-size:0.9rem;">Pembayar</td>
                    <td style="font-size:0.9rem;">: <?= $row['pembayar'] ?></td>
                    
                </tr>
                <?php } endforeach; ?>
            </table>
     
    <table>
        <?php foreach ($kendaraan as $kdr):
            if ($kdr['kd_kendaraan']==$row['kd_kendaraan']){
        ?>
        <tr>
            <td style="font-size:0.9rem;">No Polisi</td>
            <td style="font-size:0.9rem;">: <?= $kdr['no_polisi'];?></td>
        </tr>
        <tr>
            <td style="font-size:0.9rem;">No Mesin</td>
            <td style="font-size:0.9rem;">: <?= $kdr['no_mesin'];?></td>
        </tr>
        <tr>
            <td style="font-size:0.9rem;">No Rangka</td>
            <td style="font-size:0.9rem;">: <?= $kdr['no_rangka'];?></td>
        </tr>
        <?php } endforeach;?>
    </table>
    <hr>
    <table >
        <tr>
            <td>Keluhan</td>
        </tr>
        <tr>
        
            <td style="font-size:0.9rem; "><?= $data['pekerjaan'];?></td>
        </tr>
        <tr>
            <td style="font-size:0.9rem; width:500px; border-top:1px solid;">Perbaikan</td>
            <td style="font-size:0.9rem; width:80px; border-top:1px solid;">Qty</td>
            <td style="font-size:0.9rem; width:80px; border-top:1px solid;">Harga</td>
            <td style="font-size:0.9rem; width:80px; border-top:1px solid;">Diskon</td>
            
            <td style="font-size:0.9rem; border-top:1px solid;" >Total</td>
        </tr>
       
        <tr>
            <td style="border-top:1px solid;">Jasa dan Pemasangan Part</td>
            <td style="border-top:1px solid;"></td>
            <td style="border-top:1px solid;"></td>
            <td style="border-top:1px solid;"></td>
            <td style="border-top:1px solid;"></td>
        </tr>
       
      
       
       <tr>
        <?php
        $jumlahj = 0;
        $no = 1;
        foreach ($detail as $dtl):
            if ($dtl['no_spk']== $spk['no_est']){ 
                foreach ($jenis as $pekerjaan):
              
                              if ($pekerjaan['kd_jenis']== $dtl['kd_jenis']){
                            ?>
                                <td style="font-size:0.9rem"><?= $no++ ?>. <?= $pekerjaan['nama']; ?></td>
                           
                                <?php $result = $dtl['harga'] * $dtl['jumlah'] ?>
            <?php $diskon = ($result * $dtl['diskon']) / 100 ?>
            <?php $totaljasa = $result - $diskon ?> 
                          
                           
                          
            <td style="font-size:0.9rem"><?= $dtl['jumlah']; ?></td>
            <td style="font-size:0.9rem" ><?= number_format($dtl['harga'], 0, ',', '.') ?></td>
            <td style="font-size:0.9rem" align="center"><?= $dtl['diskon']; ?>%</td>
            <td style="font-size:0.9rem"><?= number_format($totaljasa, 0, ',', '.') ?></td>
            <?php $jumlahj += $totaljasa; ?>
            <?php  } endforeach ?>
        </tr>
        
        <?php } endforeach?>

        <tr>
        <?php
        $jumlah = 0;
        $no = 1;
        foreach ($detail as $dtl):
            if ($dtl['no_spk']== $spk['no_est']){ 
                foreach ($part as $p):
              
                              if ($p['kd_part']== $dtl['kd_jenis']){
                            ?>
                                <td style="font-size:0.9rem"><?= $no++ ?>. <?= $p['nama']; ?></td>
                           
                                <?php $resultp = $dtl['harga'] * $dtl['jumlah'] ?>
            <?php $diskonp = ($resultp * $dtl['diskon']) / 100 ?>
            <?php $totalpart = $resultp - $diskonp ?>
                          
                           
                          
            <td style="font-size:0.9rem"><?= $dtl['jumlah']; ?></td>
            <td style="font-size:0.9rem" ><?= number_format($dtl['harga'], 0, ',', '.') ?></td>
            <td style="font-size:0.9rem" align="center"><?= $dtl['diskon']; ?>%</td>
            <td style="font-size:0.9rem"><?= number_format($totalpart, 0, ',', '.') ?></td>
            <?php $jumlah += $totalpart; ?>
            <?php  } endforeach ?>
        </tr>
        
        <?php } endforeach?>
        <tr>
            <td style="font-size:0.9rem; border-top:1px solid;" ></td>
            <td style="font-size:0.9rem; border-top:1px solid;" ></td>
            <td style="font-size:0.9rem; border-top:1px solid;" ></td>
            <td style="font-size:0.9rem; border-top:1px solid;" ></td>
            <td style="font-size:0.9rem; border-top:1px solid;" ></td>
        </tr>

        <?php
            $total = $jumlah + $jumlahj;

        ?>
      
        <tr>
            <td style="font-size:0.9rem">Total</td>
            <td style="font-size:0.9rem;" ></td>
            <td style="font-size:0.9rem; " ></td>
            <td style="font-size:0.9rem; " ></td>
            <td style="font-size:0.9rem"><?= number_format($total, 0, ',', '.') ?></td>
        </tr>
    </table>

   


    
</body>
<footer>
    <table align="right">
        <tr align="center">
            <td style="font-size:0.9rem; height:170px;" >Banjarmasin, <?php echo date("d-M-Y"); ?></td>
            
        </tr>
        <tr align="center">
            <td style="font-size:0.9rem; border-bottom:1px solid; text-transform: uppercase;" ><?= $cst['nama_customer'] ?></td>                             
        </tr>
        <tr align="center">
            <td style="font-size:0.9rem;" >PELANGGAN</td>
        </tr>
    </table>
    <?php }}} endforeach;?>
                <?php  endforeach;?>
                <?php  endforeach; ?>
</footer>
</html>
<script>
    window.print();
</script>
<?php ini_set('display_errors','off'); ?>
<?php
  error_reporting(0);
?>