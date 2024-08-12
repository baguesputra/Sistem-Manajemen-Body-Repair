<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


</head>
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
<body>

    <table >
        <tr>
            <td style="font-size:0.9rem; width:565px"><b>PT. MULTI JAYA MOTOR</td>
            <td style="font-size:0.9rem"><b>TGL : <?= date('d-M-y', strtotime($kwitansi['tgl'])); ?></td>
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
    <table>
        <td style="width:100px">No Kwitansi</td>
        <td>: <?= $kwitansi['no_kwitansi']; ?></td>
    </table>
    <h4 align="center" style="margin-bottom:-3px;margin-top:-1px;">KWITANSI</h4>
            <table>
                <tr>
                
                    <td style="width:180px; ">SUDAH TERIMA DARI</td>
                    <td style="">: <?= $kwitansi['dari']; ?></td>
                </tr>
                <tr>
                
              
                    <td >JUMLAH UANG</td>
                    <td ><b>: <?= strtoupper(terbilang($kwitansi['jumlah'])) ?> RUPIAH</td>
                </tr>
                <tr>
                    
              
                    <td style="">UNTUK PEMBAYARAN</td>
                    <td style="">: <?= $kwitansi['untuk']; ?></td>
                </tr>
                <tr>
                   
                    <td >NO REF</td>
                    <td >: <?= $kwitansi['ref']; ?></td>
                 
                </tr>
                <tr>
                 
                    <td>JATUH TEMPO</td>
                    <td >: <?= $kwitansi['tempo']; ?></td>
                 
                </tr>
            </table>
            <p><b> Rp. <?= number_format($kwitansi['jumlah'], 0, ',', '.') ?> </b><br>
            Semua pembayaran yang dilakukan dengan Cek/Giro Bilyet baru dianggap sah jika telah diuangkan/clearing.</p>
    <table align="right">
        <tr>
            <td></td>
        </tr>
        <tr align="center">
            <td style="font-size:0.9rem;  ">Banjarmasin, <?= date('d-M-y', strtotime($kwitansi['tgl'])); ?></td>
            
        </tr>
        <tr align="center">
            <td style="font-size:0.9rem;" >Diterima Oleh :</td>                             
        </tr>
        <tr align="center">
            <td style="font-size:0.9rem; border-bottom:1px solid;height:70px;" ></td>                             
        </tr>
        <tr align="center">
            <td style="font-size:0.9rem; " >PT. Multi Jaya Motor</td>
        </tr>
    </table>
    </body>
</html>
<script>
    window.print();
</script>
<?php ini_set('display_errors','off'); ?>
<?php
  error_reporting(0);
?>