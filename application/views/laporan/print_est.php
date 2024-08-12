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
    <h5 align="center">PERKIRAAN BIAYA PERBAIKAN</h5>
<br>

    
            <table>

                <?php foreach ($dataspk as $row):
                foreach ($customer as $cst):

                if ($row['no_est'] == $spk['no_est']){
                    if ($cst['kd_customer']==$row['kd_customer']){ 
                
                        ?>
                <tr>
                    <td style="font-size:0.9rem;">Kepada Yth</td>
                   
                    <td style="font-size:0.9rem; width:430px">: <?= $cst['nama_customer'] ?></td>
                    <td style="font-size:0.9rem; width:60px">Nomor</td>
                    <td style="font-size:0.9rem;">: <?= $row['no_est']; ?></td>
                </tr>
                <tr>
                    
                    <td style="font-size:0.9rem;"></td>
                    <td style="font-size:0.9rem;"> <?= $cst['alamat'] ?></td>
                    <td style="font-size:0.9rem;">Tanggal</td>
                    <td style="font-size:0.9rem;">: <?= $row['tgl_spk']; ?></td>
                </tr>
                <tr>
                <?php foreach ($kendaraan as $kdr):
                    if ($kdr['kd_kendaraan']==$row['kd_kendaraan']){
                    ?>
                    
                    <td style="font-size:0.9rem;"></td>
                    <td style="font-size:0.9rem;"> <?= $cst['telpon'] ?></td>
                    <td style="font-size:0.9rem;">No Polisi</td>
                    <td style="font-size:0.9rem;">: <?= $kdr['no_polisi'];?></td>
                 
                </tr>
                <tr>
               
                    
                    <td style="font-size:0.9rem;">Pembayar</td>
                    <td style="font-size:0.9rem;">: <?= $row['pembayar']; ?></td>
                    <td style="font-size:0.9rem;">Model/Tipe</td>
                    <td style="font-size:0.9rem;">: <?= $kdr['model'];?></td>
                 
                </tr>
            </table>
                <?php } endforeach;?>
                <?php }} endforeach;?>
                <?php  endforeach;?>
    <hr>
    <table >
        <tr>
            <td style="width:3400px; border-bottom:1px solid;">Perbaikan</td>
            <td style="border-bottom:1px solid;">Qty</td>
            <td style="border-bottom:1px solid;">Harga</td>
            <td style="border-bottom:1px solid;">Diskon</td>
            <td style="border-bottom:1px solid;">Total</td>
        </tr>
        <tr>
            <td style="font-size:0.9rem">Jasa dan Pemasangan Part</td>
        </tr>
       
        <tr>
        <?php
        $jumlah = 0;
        $no = 1;
        foreach ($detail as $dtl):
            if ($dtl['no_spk']== $spk['no_est']){ 
                foreach ($jenis as $pekerjaan):
              
                              if ($pekerjaan['kd_jenis']== $dtl['kd_jenis']){
                            ?>
                                <td style="font-size:0.9rem"><?= $no++ ?>. <?= $pekerjaan['nama']; ?></td>
                           
                            
                          
                           
                          
            <td style="font-size:0.9rem"><?= $dtl['jumlah']; ?></td>
            <td style="font-size:0.9rem" ><?= number_format($dtl['harga'], 0, ',', '.') ?></td>
            <td style="font-size:0.9rem" align="center"><?= $dtl['diskon']; ?>%</td>
            <td style="font-size:0.9rem"><?= number_format($dtl['total'], 0, ',', '.') ?></td>
            <?php  } endforeach ?>
        </tr>
        <?php $jumlah += $dtl['total']; ?>
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
                           
                            
                          
                           
                          
            <td style="font-size:0.9rem"><?= $dtl['jumlah']; ?></td>
            <td style="font-size:0.9rem" ><?= number_format($dtl['harga'], 0, ',', '.') ?></td>
            <td style="font-size:0.9rem" align="center"><?= $dtl['diskon']; ?>%</td>
            <td style="font-size:0.9rem"><?= number_format($dtl['total'], 0, ',', '.') ?></td>
            <?php  } endforeach ?>
        </tr>
        <?php $jumlah += $dtl['total']; ?>
        <?php } endforeach?>
        <tr>
            <td style="font-size:0.9rem; border-top:1px solid;" ></td>
            <td style="font-size:0.9rem; border-top:1px solid;" ></td>
            <td style="font-size:0.9rem; border-top:1px solid;" ></td>
            <td style="font-size:0.9rem; border-top:1px solid;" ></td>
            <td style="font-size:0.9rem; border-top:1px solid;" ></td>
        </tr>
      
        <tr>
            <td style="font-size:0.9rem">Total</td>
            <td style="font-size:0.9rem"></td>
            <td style="font-size:0.9rem"></td>
            <td style="font-size:0.9rem"></td>
            <td style="font-size:0.9rem"><?= number_format($jumlah, 0, ',', '.') ?></td>
        </tr>
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