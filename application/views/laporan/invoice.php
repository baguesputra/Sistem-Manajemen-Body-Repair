<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<style>
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
    <h5 style="position:absolute;margin-top:-1px;margin-left:280px;" >FAKTUR PENJUALAN</h5>

    <br>
    
            <table style="margin-top:5px;">

                <?php foreach ($dataspk as $row):
                foreach ($customer as $cst):
                foreach ($dataspk as $data):

                if ($row['no_est'] == $spk['no_est']){
                    if ($cst['kd_customer']==$row['kd_customer']){ 
                
                        ?>
                        <?php  if ($data['no_est'] == $spk['no_est']){ ?>
                <tr>
                    <td style="font-size:0.9rem; width:60px">No INV</td>
                    <td style="font-size:0.9rem; width:300px">: <?= $row['no_inv']; ?></td>
                  
                        
                </tr>
                <tr>
                    <td style="font-size:0.9rem;">No SPK</td>
                    <td style="font-size:0.9rem;">: <?= $row['no_spk']; ?></td>
                </tr>

                <tr>
                    <td style="font-size:0.9rem;">Tanggal</td>
                    <td style="font-size:0.9rem;">: <?= $row['tgl_spk']; ?></td>
                </tr>
            </table>

           <table style="position:absolute;margin-left:400px;margin-top:-70px;">
                <tr>
                    <td style="font-size:0.9rem;">Nama Customer</td>
                    <td style="font-size:0.9rem;">: <?= $cst['nama_customer'] ?></td>
                </tr>
                <tr>
                    <td style="font-size:0.9rem;">No Telpon</td>
                    <td style="font-size:0.9rem;">: <?= $cst['telpon'] ?></td>
                </tr>
                <tr>
                    <td style="font-size:0.9rem;">N.P.W.P</td>
                    <td style="font-size:0.9rem;">: <?= $cst['no_npwp'] ?></td>
                </tr>
                <tr>
                    <td style="font-size:0.9rem;">NIK</td>
                    <td style="font-size:0.9rem;">: <?= $cst['no_ktp'] ?></td>
                </tr>
                <tr>
                <?php foreach ($asuransi as $asr):
                
                if ($asr['kd_asuransi']==$row['kd_asuransi']){
                ?>
                    <td style="font-size:0.9rem;">Pembayar</td>
                    <td style="font-size:0.9rem;">: <?= $row['pembayar'] ?></td>
                </tr>
                <?php } endforeach; ?>

                
                           
           </table>

    <table style="position:absolute;margin-left:180px;margin-top:-68px;">
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
        <tr>
            <td style="font-size:0.9rem;">Type</td>
            <td style="font-size:0.9rem;">: <?= $kdr['model'];?></td>
        </tr>
        <tr>
            <td style="font-size:0.9rem;">Tahun</td>
            <td style="font-size:0.9rem;">: <?= $kdr['tahun'];?></td>
        </tr>
        <?php } endforeach;?>
    </table>
    <hr style="margin-top:50px;">

    <table>
        
        <tr>
            <td>Jasa dan Pemasangan Part</td>
        </tr>
        <tr>
            <td style="font-size:0.9rem; width:3400px;">Perbaikan</td>
            <td style="font-size:0.9rem">Jumlah</td>
            <td style="font-size:0.9rem">Harga</td>
            <td style="font-size:0.9rem">Diskon</td>
            <td style="font-size:0.9rem">Total</td>
        </tr>
        <tr>
								<td colspan="6"><b>Jasa</td>
		</tr>
      
        <tr>
        <?php
        $jumlah = 0;
        $kesjenis = 0;
        foreach ($detail as $dtl):
            if ($dtl['no_spk']== $spk['no_est']){ 
                foreach ($jenis as $pekerjaan):
              
                              if ($pekerjaan['kd_jenis']== $dtl['kd_jenis']){
                            ?>
                                <td style="font-size:0.9rem"><?= $pekerjaan['nama']; ?></td>
                           
            <?php $result = $dtl['harga'] * $dtl['jumlah'] ?>
            <?php $diskon = ($result * $dtl['diskon']) / 100 ?>
            <?php $totaljasa = $result - $diskon ?>
                            
                          
                           
                          
            <td style="font-size:0.9rem" align="center"><?= $dtl['jumlah']; ?></td>
            <td style="font-size:0.9rem" ><?= number_format($dtl['harga'], 0, ',', '.') ?></td>
            <td style="font-size:0.9rem" align="center"><?= $dtl['diskon']; ?>%</td>
            <td style="font-size:0.9rem"><?= number_format($totaljasa, 0, ',', '.') ?></td>
            <?php $jumlah += $totaljasa; ?>
            <?php $kesjenis += $totaljasa; ?>

            

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
         <tr>
            <td style="font-size:0.9rem">Total</td>
            <td style="font-size:0.9rem"></td>
            <td style="font-size:0.9rem"></td>
            <td style="font-size:0.9rem"></td>
            <td style="font-size:0.9rem"><?= number_format($jumlah, 0, ',', '.') ?></td>
        </tr>
        <tr>
								<td colspan="6" ><b>Spare Part</td>
		</tr>
        <tr>
        <?php
        $jumlahp = 0;
        $kespart = 0;
        foreach ($detail as $dtl):
            if ($dtl['no_spk']== $spk['no_est']){ 
                foreach ($part as $p):
              
                              if ($p['kd_part']== $dtl['kd_jenis']){
                            ?>
                                <td style="font-size:0.9rem"><?= $p['nama']; ?></td>
                           
            <?php $resultp = $dtl['harga'] * $dtl['jumlah'] ?>
            <?php $diskonp = ($resultp * $dtl['diskon']) / 100 ?>
            <?php $totalpart = $resultp - $diskonp ?>
                          
                           
                          
            <td style="font-size:0.9rem" align="center"><?= $dtl['jumlah']; ?></td>
            <td style="font-size:0.9rem" ><?= number_format($dtl['harga'], 0, ',', '.') ?></td>
            <td style="font-size:0.9rem" align="center"><?= $dtl['diskon']; ?>%</td>
            <td style="font-size:0.9rem"><?= number_format($totalpart, 0, ',', '.') ?></td>
            <?php $jumlahp += $totalpart; ?>
            <?php $kespart += $totalpart; ?>
            <?php  } endforeach ?>

           
        </tr>
       
        <?php } endforeach?>

        <?php
        $jumlah = 0;
        $keseluruhan = 0;
        foreach ($detail as $dtl):
            foreach ($part as $p):
                foreach ($jenis as $pekerjaan):
            if ($dtl['no_spk']== $spk['no_est']){ 
              
                              if ($p['kd_part']== $dtl['kd_jenis'] || $pekerjaan['kd_jenis']== $dtl['kd_jenis']){

                            ?>
                          <?php $keseluruhan += $dtl['total']; ?>  
        <?php   } } endforeach ?>
       
        <?php   endforeach ?>
        <?php   endforeach ?>
        
        
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
            <td style="font-size:0.9rem"><?= number_format($jumlahp, 0, ',', '.') ?></td>
        </tr>
        <tr>
            <td style="font-size:0.9rem; border-top:1px solid;" ></td>
            <td style="font-size:0.9rem; border-top:1px solid;" ></td>
            <td style="font-size:0.9rem; border-top:1px solid;" ></td>
            <td style="font-size:0.9rem; border-top:1px solid;" ></td>
            <td style="font-size:0.9rem; border-top:1px solid;" ></td>
        </tr>
        <tr>
            <?php
                $totalkeseluruhan = $kesjenis + $kespart;

            ?>
            <td style="font-size:0.9rem">Total Keseluruhan</td>
            <td style="font-size:0.9rem"></td>
            <td style="font-size:0.9rem"></td>
            <td style="font-size:0.9rem"></td>
            <td style="font-size:0.9rem"><?= number_format($totalkeseluruhan, 0, ',', '.') ?></td>
        </tr>
    </table>

    <div class="footer" style="position:relative;">
    <table align="right">
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
    <?php }}} endforeach;?>
                <?php  endforeach;?>
                <?php  endforeach; ?>
</div>
   


    
</body>

</html>
<script>
    window.print();
</script>
<?php ini_set('display_errors','off'); ?>
<?php
  error_reporting(0);
?>