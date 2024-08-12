
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
        <?php
        $bulan1 =date('F', strtotime($tgl_awal));
        $bulan2 =date('F', strtotime($tgl_akhir));
        header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment; filename=REKAPITULASI-INCENTIVE-MJM-$bulan1/$bulan2.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        header("Cache-Control: max-age=0");
        header("Cache-Control: private",false);
    ?>

    <h2 align="center">Laporan Rekapitulasi Perincian Incentive (Service Advisor)</h2>
    <p align="center">Periode : <?= date('d-M-y', strtotime($tgl_awal)) ?> s/d <?= date('d-M-y', strtotime($tgl_akhir)) ?></p>
    <br>
<br>
    <div class="table-responsive">
        <table border="1" >
       
            <thead align="center">          
                <tr align="center">
                    <td style="font-size:0.9rem;width:200px;">Nama SA</td>
                    <td style="font-size:0.9rem;width:200px;">Jasa</td>
                    <td style="font-size:0.9rem;width:200px;">Potongan</td>
                    <td style="font-size:0.9rem;width:200px;">DPP</td>
                    <td style="font-size:0.9rem;width:200px;">Part</td>
                    <td style="font-size:0.9rem;width:200px;">Potongan</td>
                    <td style="font-size:0.9rem;width:200px;">DPP</td>
                </tr>
            </thead>
                <tr align="center">
                    <td style="font-size:0.9rem;">AHYAT NOOR</td>

                     <!-- ---------------------------------JASA------------------------------------- -->
                    <?php 
                        $jumlahjasa2 = 0;
                        $jumlahjasapotongan2 = 0;
                        foreach ($spk->result() as $s):
                        foreach ($detail as $d): 
                        foreach ($jenis as $j): 
                            if($s->status== "Finish"){
                                if($s->kd_sa == "SA-0002"){
                                    if($d['no_spk'] == $s->no_est){
                                        if($j['kd_jenis'] == $d['kd_jenis']){

                    ?>
                     <?php  $jumlahjasa2 += $d['harga'];?>
                     <?php  $jumlahjasapotongan2 += $d['total'];?>
                    <?php }}}} endforeach;?>
                    <?php  endforeach ?>
                    <?php  endforeach ?>
                    <td style="font-size:0.9rem;"><?= $jumlahjasa2 ?></td>

                    <?php 
                        $jasapotongan2 =  ($jumlahjasa2) - ($jumlahjasapotongan2) ;
                    ?>
                    
                    <td style="font-size:0.9rem;"><?= $jasapotongan2 ?></td>
                    <td style="font-size:0.9rem;"><?= $jumlahjasapotongan2 ?></td>




                       <!-- ---------------------------------Part------------------------------------- -->
                    <?php 
                        $jumlahpart2 = 0;
                        $jumlahpartpotongan2 = 0;
                        foreach ($spk->result() as $s):
                        foreach ($detail as $d): 
                        foreach ($part as $p): 
                            if($s->status== "Finish"){
                                if($s->kd_sa == "SA-0002"){
                                    if($d['no_spk'] == $s->no_est){
                                        if($p['kd_part'] == $d['kd_jenis']){

                    ?>
                     <?php  $jumlahpart2 += $d['harga'];?>
                     <?php  $jumlahpartpotongan2 += $d['total'];?>
                    <?php }}}} endforeach;?>
                    <?php  endforeach ?>
                    <?php  endforeach ?>
                    <td style="font-size:0.9rem;"><?= $jumlahpart2 ?></td>

                    <?php 
                        $partpotongan2 =  ($jumlahpart2) - ($jumlahpartpotongan2) ;
                    ?>
                    
                    <td style="font-size:0.9rem;"><?= $partpotongan2 ?></td>
                    <td style="font-size:0.9rem;"><?= $jumlahpartpotongan2 ?></td>

                </tr>
                <tr align="center">
                    <td style="font-size:0.9rem;">ZULKIFLIE</td>
                     <!-- ---------------------------------JASA------------------------------------- -->
                    <?php 
                        $jumlahjasa1 = 0;
                        $jumlahjasapotongan1 = 0;
                        foreach ($spk->result() as $s):
                        foreach ($detail as $d): 
                        foreach ($jenis as $j): 
                            if($s->status== "Finish"){
                                if($s->kd_sa == "SA-0001"){
                                    if($d['no_spk'] == $s->no_est){
                                        if($j['kd_jenis'] == $d['kd_jenis']){

                    ?>
                     <?php  $jumlahjasa1 += $d['harga'];?>
                     <?php  $jumlahjasapotongan1 += $d['total'];?>
                    <?php }}}} endforeach;?>
                    <?php  endforeach ?>
                    <?php  endforeach ?>
                    <td style="font-size:0.9rem;"><?= $jumlahjasa1 ?></td>

                    <?php 
                        $jasapotongan1 =  ($jumlahjasa1) - ($jumlahjasapotongan1) ;
                    ?>
                    
                    <td style="font-size:0.9rem;"><?= $jasapotongan1 ?></td>
                    <td style="font-size:0.9rem;"><?= $jumlahjasapotongan1 ?></td>


                    <!-- ---------------------------------Part------------------------------------- -->
                    <?php 
                        $jumlahpart1 = 0;
                        $jumlahpartpotongan1 = 0;
                        foreach ($spk->result() as $s):
                        foreach ($detail as $d): 
                        foreach ($part as $p): 
                            if($s->status== "Finish"){
                                if($s->kd_sa == "SA-0001"){
                                    if($d['no_spk'] == $s->no_est){
                                        if($p['kd_part'] == $d['kd_jenis']){

                    ?>
                     <?php  $jumlahpart1 += $d['harga'];?>
                     <?php  $jumlahpartpotongan1 += $d['total'];?>
                    <?php }}}} endforeach;?>
                    <?php  endforeach ?>
                    <?php  endforeach ?>
                    <td style="font-size:0.9rem;"><?= $jumlahpart1 ?></td>
                    <?php 
                        $partpotongan1 =  ($jumlahpart1) - ($jumlahpartpotongan1) ;
                    ?>
                    
                    <td style="font-size:0.9rem;"><?= $partpotongan1 ?></td>
                    <td style="font-size:0.9rem;"><?= $jumlahpartpotongan1 ?></td>
                </tr>








                <tr align="center">
                    <?php
                        $totaljasa = $jumlahjasa1 + $jumlahjasa2;
                        $totalpotonganjasa = $jasapotongan1 + $jasapotongan2;
                        $totaldppjasa = $jumlahjasapotongan1 + $jumlahjasapotongan2;

                        $totalpart = $jumlahpart1 + $jumlahpart2;
                        $totalpotonganpart = $partpotongan1 + $partpotongan2;
                        $totaldpppart = $jumlahpartpotongan1 + $jumlahpartpotongan2;

                    ?>
                    <td style="font-size:0.9rem;">Total</td>
                    <td style="font-size:0.9rem;"><?= $totaljasa ?></td>
                    <td style="font-size:0.9rem;"><?= $totalpotonganjasa ?></td>
                    <td style="font-size:0.9rem;"><?= $totaldppjasa ?></td>
                    <td style="font-size:0.9rem;"><?= $totalpart ?></td>
                    <td style="font-size:0.9rem;"><?= $totalpotonganpart ?></td>
                    <td style="font-size:0.9rem;"><?= $totaldpppart ?></td>
                </tr>

             
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