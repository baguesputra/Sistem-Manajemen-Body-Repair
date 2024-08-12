<body>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
    <?php
        $bulan =date('F', strtotime($tgl_awal));
        header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment; filename=BAHAN-MJM-$bulan.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        header("Cache-Control: max-age=0");
        header("Cache-Control: private",false);
    ?>
    <h2 align="center">Laporan Bulanan Bahan</h2>
    <p align="center"><?= date('F - Y', strtotime($tgl_awal)) ?></p>
<br>
<br>
    
            <table border="1">

            <thead>          
                <tr>
                    <td style="font-size:0.9rem;">Kode Detail</td>
                    <td style="font-size:0.9rem;">No Polisi</td>
                    <td style="font-size:0.9rem;">Nama Bahan</td>
                    <td style="font-size:0.9rem;">Qty</td>
                    <td style="font-size:0.9rem;">Harga</td>
                    <td style="font-size:0.9rem;">Diskon</td>
                    <td style="font-size:0.9rem;">Total</td>
            
                    
                </tr>
                </thead>
                <?php $jumlah= 0;?>
                <?php foreach ($spk->result() as $s):?>
                    <?php foreach ($bahan as $b): ?>
                    <?php foreach($detail as $d): 
                        if($s->no_est == $d['no_spk']){
                            if($b['kd_bahan']== $d['kd_jenis']){
                        ?>
                <tr>
                        <td><?= $d['kd_detail'] ?></td>
                        <?php foreach($dataspk as $spk):
                                if($spk['no_est']==$d['no_spk']){
                                    foreach($kendaraan as $k)
                                    if($k['kd_kendaraan']==$spk['kd_kendaraan']){
                        ?>
                        <td><?= $k['no_polisi'] ?></td>
                        <?php }} endforeach ?> 
                        <td><?= $b['nama'] ?></td>
                        <td><?= $d['jumlah'] ?></td>
                        <td><?= number_format($d['harga'], 0, ',', '.') ?></td>
                        <td><?= $d['diskon'] ?>%</td>
                        <td><?= number_format($d['total'], 0, ',', '.') ?></td>
                    
                </tr>
                <?php $jumlah += $d['total']; ?>
                
                <?php }} endforeach ?>
                <?php  endforeach ?>
                <?php  endforeach;?>
                
                <tr>
                              <td colspan="5">Total</td>
                              <td colspan="1"><?= number_format($jumlah, 0, ',', '.') ?></td>
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