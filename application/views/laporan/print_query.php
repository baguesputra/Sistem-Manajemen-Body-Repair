<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
<?php 
        // $bulan1 =date('F', strtotime($tgl_awal));
        // $bulan2 =date('F', strtotime($tgl_akhir));
        // header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        // header("Content-Disposition: attachment; filename=MONTHLY-INVOICE-MJM-$bulan1/$bulan2.xls");
        // header("Pragma: no-cache");
        // header("Expires: 0");
        // header("Cache-Control: max-age=0");
        // header("Cache-Control: private",false); 
    ?> 
    <h2 align="center">Laporan Invoice</h2>
    <p align="center">Periode : <?= date('d-M-y', strtotime($tgl_awal)) ?> s/d <?= date('d-M-y', strtotime($tgl_akhir)) ?></p>
    <br>
    <div class="table-responsive">
        <table border="1">
            <thead>          
                <tr>
                    <td style="font-size:0.9rem;">No Invoice</td>
                    <td style="font-size:0.9rem;">No Spk</td>
                    <td style="font-size:0.9rem;">Tanggal Spk</td>
                    <td style="font-size:0.9rem;">Tanggal Inv</td>
                    <td style="font-size:0.9rem;">No Polisi</td>
                    <td style="font-size:0.9rem;">Kode Rangka</td>
                    <td style="font-size:0.9rem;">No Rangka</td>
                    <td style="font-size:0.9rem;">Kode Mesin</td>
                    <td style="font-size:0.9rem;">No Mesin</td>
                    <td style="font-size:0.9rem;">Basic Model</td>
                    <td style="font-size:0.9rem;">Kode Customer</td>
                    <td style="font-size:0.9rem;">Customer</td>
                    <td style="font-size:0.9rem;">Pembayar</td>
                    <td style="font-size:0.9rem;">Cabang</td>
                    <td style="font-size:0.9rem;">Jasa</td>
                    <td style="font-size:0.9rem;">Part</td>
                    <td style="font-size:0.9rem;">Panel Jasa</td>
                    <td style="font-size:0.9rem;">Panel Part</td>
                    <td style="font-size:0.9rem;">Diskon Jasa</td>
                    <td style="font-size:0.9rem;">Diskon Part</td>
                    <td style="font-size:0.9rem;">Total Invoice</td>
                    <td style="font-size:0.9rem;">SA</td>
                  
                    
                </tr>
                </thead>
                <?php foreach ($spk->result() as $s):
                    
                    if($s->status== "Estimasi"){
                ?>

                <?php } elseif ($s->status== "Finish") { ?>
                <tr>
                    
                    <td style="font-size:0.9rem;"><?= $s->no_inv ?></td>
                    <td style="font-size:0.9rem;"><?= $s->no_spk ?></td>
                    <td style="font-size:0.9rem;"><?= $s->tgl_spk ?></td>
                    <td style="font-size:0.9rem;"><?= $s->tgl_inv ?></td>

                    <?php foreach ($kendaraan as $kdr):
                    if ($kdr['kd_kendaraan']== $s->kd_kendaraan){
                    ?>
                    <td style="font-size:0.9rem;"><?= $kdr['no_polisi'];?></td>
                    <td style="font-size:0.9rem;"><?= $kdr['kd_rangka'];?></td>
                    <td style="font-size:0.9rem;"><?= $kdr['no_rangka'];?></td>
                    <td style="font-size:0.9rem;"><?= $kdr['kd_mesin'];?></td>
                    <td style="font-size:0.9rem;"><?= $kdr['no_mesin'];?></td>
                    <td style="font-size:0.9rem;"><?= $kdr['model'];?></td>
                    <?php } endforeach;?>

                    <?php foreach ($customer as $cst):
                        if ($cst['kd_customer']==$s->kd_customer){ 
                        ?>
                    <td style="font-size:0.9rem;"><?= $cst['kd_customer'] ?></td>
                    <td style="font-size:0.9rem;"><?= $cst['nama_customer'] ?></td>
                    <?php } endforeach;?>
                    <td style="font-size:0.9rem;"><?= $s->pembayar ?></td>
                    <td style="font-size:0.9rem;">MJM</td>

                    <?php 
                    $jumlah1 = 0;
                    $disk = 0;
                    $panelj = 0;
                    foreach ($detail as $d):
                            if ($d['no_spk'] == $s->no_est){
                                foreach ($jenis as $j):
                                    if ($j['kd_jenis'] == $d['kd_jenis']){
                                    
                    ?>
                    <?php $diskon= (($d['harga']*$d['jumlah'])*$d['diskon'])/100 ?>
                    <?php $jumlah1 += $d['total']; ?>
                    <?php $disk += $diskon; ?>
                    <?php $panelj += $d['jumlah']; ?>
                    <?php } endforeach ?>
                    <?php } endforeach ?>
                    <td style="font-size:0.9rem;"><?= $jumlah1 ?></td>

                    <?php 
                    $jumlah2 = 0;
                    $diskp = 0;
                    $panelp = 0;
                    foreach ($detail as $d):
                            if ($d['no_spk'] == $s->no_est){
                                foreach ($part as $p):
                                    if ($p['kd_part'] == $d['kd_jenis']){
                                    
                    ?>
                    <?php $diskonp= (($d['harga']*$d['jumlah'])*$d['diskon'])/100 ?>
                    <?php $jumlah2 += $d['total']; ?>
                    <?php $diskp += $diskon; ?>
                    <?php $panelp += $d['jumlah']; ?>
                    <?php } endforeach ?>
                    <?php } endforeach ?>
                    <td style="font-size:0.9rem;"><?= $jumlah2 ?></td>
                    <td style="font-size:0.9rem;"><?= $panelj ?></td>
                    <td style="font-size:0.9rem;"><?= $panelp?></td>
               
                   
                    <td style="font-size:0.9rem;"><?= $disk ?></td>
                 
                    <td style="font-size:0.9rem;"><?= $diskp ?></td>

                    <?php
                       $total = $jumlah1 + $jumlah2
                    ?>
                   
                    <td style="font-size:0.9rem;"><?= $total ?></td>

                    <?php 
                        foreach ($sa as $ser):
                            if ($ser['kd_sa'] == $s->kd_sa){

                    ?>
                     <td style="font-size:0.9rem;"><?= $ser['nama_sa'] ?></td>
                    <?php } endforeach ?>


                    
                 
                </tr>
          
                <?php } endforeach;?>
            </table>
                
   
</body>

    </div>
    </div>
    </div>
</div>
</body>
<?php ini_set('display_errors','off'); ?>
<?php
  error_reporting(0);
?>