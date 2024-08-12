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
    <?php 
function penyebut($nilai) {
     $nilai = abs($nilai);
     $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
     $temp = "";
     if ($nilai < 12) {
         $temp = " ". $huruf[$nilai];
     } else if ($nilai <20) {
         $temp = penyebut($nilai - 10). " belas";
     } else if ($nilai < 100) {
         $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
     } else if ($nilai < 200) {
         $temp = " seratus" . penyebut($nilai - 100);
     } else if ($nilai < 1000) {
         $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
     } else if ($nilai < 2000) {
         $temp = " seribu" . penyebut($nilai - 1000);
     } else if ($nilai < 1000000) {
         $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
     } else if ($nilai < 1000000000) {
         $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
     } else if ($nilai < 1000000000000) {
         $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
     } else if ($nilai < 1000000000000000) {
         $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
     }     
     return $temp;
 }

 function terbilang($nilai) {
     if($nilai<0) {
         $hasil = "minus ". trim(penyebut($nilai));
     } else {
         $hasil = trim(penyebut($nilai));
     }     		
     return $hasil;
 }
 ?>

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


<h5 align="center">BUKTI BANK TERIMA</h5>
<table>
    <tr>
        
            <td style="font-size:0.9rem">No Dokumen</td>
            <td style="font-size:0.9rem">: <?= $bbt['no_dok'] ?></td>
       
    </tr>
    <tr>
        
            <td style="font-size:0.9rem">Tanggal</td>
            <td style="font-size:0.9rem">: <?= date('d M Y', strtotime($bbt['tgl'])); ?></td>
       
    </tr>
    <tr>
        
        <td style="font-size:0.9rem">Customer</td>
        <td style="font-size:0.9rem">: <?= $bbt['customer'] ?></td>
   
    </tr>
  
</table>
<table style="position:absolute;margin-left:400px;margin-top:-70px;">
                <tr>
                    <td style="font-size:0.9rem;">Account GL</td>
                    <td style="font-size:0.9rem;">: <?= $bbt['gl_account'] ?></td>
                </tr>
                <tr>
                    <td style="font-size:0.9rem;">Deskripsi</td>
                    <?php foreach($account as $acc){
                        if($acc['no_account'] == $bbt['gl_account']){ ?>
                    <td style="font-size:0.9rem;">: <?= $acc['ket'] ?></td>
                    <?php }} ?>
                </tr>
              
           
                
                           
           </table>
<hr>
                <table width="100%">
                    <tr>
                        <td style="border-bottom:1px solid;"scope="col">No</th>
                        <td style="border-bottom:1px solid;"scope="col">Rincian</th>
                        <td style="border-bottom:1px solid;"scope="col">Total</th>
                        <td style="border-bottom:1px solid;"scope="col">Account Ket</th>
                    </tr>
                        <tr>    
                        <?php 
                        $no = 1;
                        foreach ($detailbbkt as $detail) : 
                            if ($detail['kode_bbkt'] == $bbt['no_dok']){    
                        ?>
                            <td style="font-size:0.9rem"><?= $no++; ?></td>
                            <td style="font-size:0.9rem"><?= $detail['ket']; ?></td>
                            <td style="font-size:0.9rem"><?= $detail['total']; ?></td>
                            <?php 
                                foreach ($account as $acc): 
                                if ($detail['gl_account'] == $acc['no_account']){
                            ?>
                            <td style="font-size:0.9rem"><?= $detail['gl_account']; ?> - <?= $acc['ket']; ?></td>
                            <?php } endforeach ?>
                        </tr>
                <?php } endforeach ?>
            </table>
<hr>
<table>
    <tr>
        
        <td style="font-size:0.9rem">Total</td>
        <td style="font-size:0.9rem">: Rp.<?= number_format($bbt['penerimaan'], 0, ',', '.') ?></td>
   
    </tr>
    <tr>
        
        <td style="font-size:0.9rem">Terbilang</td>
        <td style="font-size:0.9rem">: <?= strtoupper(terbilang($bbt['penerimaan'])) ?> RUPIAH</td>
   
    </tr>
</table>
<table align="right">
        <tr align="center">
        <td style="font-size:0.9rem; " >Banjarmasin, <?php echo date("d-M-Y"); ?></td>
            
        </tr>
        <tr align="center">
            
            <td style="font-size:0.9rem; padding-bottom:70px" >Diperiksa Oleh:</td>                             
        </tr>
        <tr align="center">
            <td style="font-size:0.9rem; ; text-transform: uppercase;" ></td>                             
        </tr>
        <tr align="center">
            <td style="font-size:0.9rem; border-top:1px solid" >Coordinator Finance</td>
        </tr>
    </table>
    <table align="left">
        <tr align="center">
            <td style="font-size:0.9rem; padding-bottom:70px;padding-top:20px;" >Dibuat Oleh :</td>
            
        </tr>
        <tr align="center">
            <td style="font-size:0.9rem; text-transform: uppercase;" ></td>                             
        </tr>
        <tr align="center">
            <td style="font-size:0.9rem; border-top:1px solid" >Staff Administrasi</td>
        </tr>
    </table>
</body>
<footer>
 
  
</footer>
</html>
<script>
    window.print();
</script>
<?php ini_set('display_errors','off'); ?>
<?php
  error_reporting(0);
?>