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
    <h5 align="center">HARGA POKOK PEMBELIAN</h5>
<br>

    
            <table>

                <?php foreach ($pembelian as $p):
                        if($p['kd_pemb'] == $pemb['kd_pemb']){
                        ?>
                <tr>
                
                    <td style="font-size:0.9rem; width:100px">Kode Pembelian</td>
                    <td style="font-size:0.9rem;">: <?= $p['kd_pemb']; ?></td>
                </tr>
                <tr>
                    
              
                    <td style="font-size:0.9rem;">Tanggal</td>
                    <td style="font-size:0.9rem;">: <?= $p['tgl_pemb']; ?></td>
                </tr>
                <tr>
                   
                    <td style="font-size:0.9rem;">Supplier</td>
                    <td style="font-size:0.9rem;">: <?= $p['supplier'];?></td>
                 
                </tr>
                <tr>
                 
                    <td style="font-size:0.9rem;">Status</td>
                    <td style="font-size:0.9rem;">: <?= $p['status'];?></td>
                 
                </tr>
            </table>
               
              
                <?php } endforeach;?>
    <hr>
    <table >
        <tr>
            <td style="width:3400px; border-bottom:1px solid;">Barang</td>
            <td style="border-bottom:1px solid;">Qty</td>
            <td style="border-bottom:1px solid;">Harga</td>
            <td style="border-bottom:1px solid;">Total</td>
        </tr>
        <tr>
            
        </tr>
       
        <tr>
        <?php
        $jumlah = 0;
        $no = 1;
        foreach ($detail as $d):
            if ($d['kd_pemb']== $pemb['kd_pemb']){ 
                foreach ($bahan as $pekerjaan):
              
                              if ($pekerjaan['kd_bahan']== $d['kd_jenis']){
                            ?>
                                <td style="font-size:0.9rem"><?= $no++ ?>. <?= $pekerjaan['nama']; ?></td>
                           
                            
                          
                           
                          
            <td style="font-size:0.9rem"><?= $d['jumlah']; ?></td>
            <td style="font-size:0.9rem" ><?= number_format($d['harga'], 0, ',', '.') ?></td>
            <td style="font-size:0.9rem"><?= number_format($d['total'], 0, ',', '.') ?></td>
            <?php  } endforeach ?>
        </tr>
        <?php $jumlah += $d['total']; ?>
        <?php } endforeach?>

        <tr>
        <?php
        $jumlah = 0;
        $no = 1;
        foreach ($detail as $dtl):
            if ($dtl['kd_pemb']== $pemb['kd_pemb']){ 
                foreach ($part as $p):
              
                              if ($p['kd_part']== $dtl['kd_jenis']){
                            ?>
                                <td style="font-size:0.9rem"><?= $no++ ?>. <?= $p['nama']; ?></td>
                           
                            
                          
                           
                          
            <td style="font-size:0.9rem"><?= $dtl['jumlah']; ?></td>
            <td style="font-size:0.9rem" ><?= number_format($dtl['harga'], 0, ',', '.') ?></td>
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
            <td style="font-size:0.9rem; border-bottom:1px solid;" >YULIANITA EFFENDI</td>                             
        </tr>
        <tr align="center">
            <td style="font-size:0.9rem;" >ADMINISTRASI</td>
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