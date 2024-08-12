<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">

    <h2 align="center">Laporan Bulanan</h2>
    <p align="center">Periode : <?= date('d-M-y', strtotime($tgl_awal)) ?> s/d <?= date('d-M-y', strtotime($tgl_akhir)) ?></p>
    <!-- <a href="<?php echo base_url("cetak/export/"); ?>" class="btn btn-dark mb-3">Export Excel</a> -->
    <br>
<br>
    <div class="table-responsive">
    <?php
        $bulan =date('F', strtotime($tgl_awal));
        header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment; filename=MJM-$bulan.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        header("Cache-Control: max-age=0");
        header("Cache-Control: private",false);
    ?>
        <table border="1">
            <thead>          
                <tr>
                    <td style="font-size:0.9rem;">No</td>
                    <td style="font-size:0.9rem;">No Polisi</td>
                    <td style="font-size:0.9rem;">SA</td>
                    <td style="font-size:0.9rem;">Foreman</td>
                    <td style="font-size:0.9rem;">Customer</td>
                    <td style="font-size:0.9rem;">Pembayar</td>
                    <td style="font-size:0.9rem;">Kontak Pemilik</td>
                    <td style="font-size:0.9rem;">No Spk</td>
                    <td style="font-size:0.9rem;">Tipe Kendaraan</td>
                    <td style="font-size:0.9rem;">Jasa</td>
                    <td style="font-size:0.9rem;">Part</td>
                    <td style="font-size:0.9rem;">Panel Jasa</td>
                    <td style="font-size:0.9rem;">Panel Part</td>
                    <td style="font-size:0.9rem;">Diskon Jasa</td>
                    <td style="font-size:0.9rem;">Diskon Part</td>
                    <td style="font-size:0.9rem;">Total Invoice</td>
                    <td style="font-size:0.9rem;">Tanggal Masuk</td>
                    <td style="font-size:0.9rem;">Tanggal Keluar</td>
                    <td style="font-size:0.9rem;">Status Hari ini</td>
                    <td style="font-size:0.9rem;">Last Update</td>
                    <td style="font-size:0.9rem;">Vendor</td>
                    
                  
                    
                </tr>
                </thead>
                <?php 
                $no = 1;
                foreach ($spk->result() as $s):
                  {
                    ?>
                <tr>
                    
                    <td style="font-size:0.9rem;"><?= $no++ ?></td>
                    <?php foreach ($kendaraan as $kdr):
                    if ($kdr['kd_kendaraan']== $s->kd_kendaraan){
                    ?>
                    <td style="font-size:0.9rem;"><?= $kdr['no_polisi'];?></td>
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
                    <?php foreach ($customer as $cst):
                        if ($cst['kd_customer']==$s->kd_customer){ 
                        ?>
                    <td style="font-size:0.9rem;"><?= $cst['nama_customer'] ?></td>
                    <?php } endforeach;?>
                    <td style="font-size:0.9rem;"><?= $s->pembayar ?></td>
                    <?php foreach ($customer as $cst):
                        if ($cst['kd_customer']==$s->kd_customer){ 
                        ?>
                    <td style="font-size:0.9rem;"><?= $cst['telpon'] ?></td>
                    <?php } endforeach;?>
                    <td style="font-size:0.9rem;"><?= $s->no_spk ?></td>
                    <?php foreach ($kendaraan as $kdr):
                    if ($kdr['kd_kendaraan']== $s->kd_kendaraan){
                    ?>
                    <td style="font-size:0.9rem;"><?= $kdr['model'];?></td>
                    <?php } endforeach;?>
                    <?php $panel=0; 
                        foreach ($detail as $dtl):
                            if ($dtl['no_spk']== $s->no_est){ 
                                foreach ($jenis as $pekerjaan):
                                    if ($pekerjaan['kd_jenis']== $dtl['kd_jenis']){
                    ?>
                    
                    <?php  $panel += $dtl['jumlah'];?>
                    <?php  } endforeach ?>
                    <?php  } endforeach ?>
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
                    <td><?= $panel ?></td>
                    <td style="font-size:0.9rem;"><?= $s->mulai ?></td>
                    <td style="font-size:0.9rem;"><?= $s->akhir ?></td>
                    <td style="font-size:0.9rem;"><?= $s->status ?></td>
                    <td style="font-size:0.9rem;"><?= $s->tgl_pengerjaan ?></td>
                    <td style="font-size:0.9rem;"><?= $s->vendor ?></td>
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