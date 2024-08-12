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


<h5 align="center">NOTA KREDIT PIUTANG</h5>
<table>
    <tr>
        
            <td style="font-size:0.9rem">No Dokumen</td>
            <td style="font-size:0.9rem">: <?= $nota['no_dok'] ?></td>
       
    </tr>
    <tr>
        
            <td style="font-size:0.9rem">Tanggal</td>
            <td style="font-size:0.9rem">: <?= $nota['tgl'] ?></td>
       
    </tr>
    
    <tr>
        
        <td style="font-size:0.9rem">Total</td>
        <td style="font-size:0.9rem">: <?= $nota['penerimaan'] ?></td>
   
    </tr>
</table>
<hr>
    
                <table width="100%">
                    <tr>
                        <td style="border-bottom:1px solid;"scope="col">No Invoice</th>
                        <td style="border-bottom:1px solid;"scope="col">Tanggal</th>
                        <td style="border-bottom:1px solid;"scope="col">Keterangan</th>
                    </tr>
                        <tr>    
                        <?php foreach ($detailnota as $detail) : 
                            if ($detail['kode_nota'] == $nota['no_dok']){    
                        ?>
                            <td style="font-size:0.9rem"><?= $detail['no_inv']; ?></td>
                            <td style="font-size:0.9rem"><?= $detail['tgl']; ?></td>
                            <td style="font-size:0.9rem"><?= $detail['ket']; ?></td>
                        </tr>
                <?php } endforeach ?>
            </table>
    
</body>
<footer>
    <!-- <table align="right">
        <tr align="center">
            <td style="font-size:0.9rem; height:170px;" >Banjarmasin, <?php echo date("d-M-Y"); ?></td>
            
        </tr>
        <tr align="center">
            <td style="font-size:0.9rem; border-bottom:1px solid; text-transform: uppercase;" ></td>                             
        </tr>
        <tr align="center">
            <td style="font-size:0.9rem;" >PELANGGAN</td>
        </tr>
    </table> -->
  
</footer>
</html>
<script>
    window.print();
</script>
<?php ini_set('display_errors','off'); ?>
<?php
  error_reporting(0);
?>