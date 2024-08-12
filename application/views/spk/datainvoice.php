<?php $this->load->view('include/navbar'); ?>
<body>
    <br>
   <div class="container">
     <div class="panel panel-default">
   		<div class="panel-body"> 
            <h5><i class='fa fa-cube fa-fw'></i> Data Transaksi <i class='fa fa-angle-right fa-fw'></i> INVOICE</h5>
               <div class="table-responsive">
                   <table id="example" class="table table-striped table-bordered">
                       <thead>
                           <tr>
                               <th scope="col">No Est</th>
                               <th scope="col">No SPK</th>
                               <th scope="col">Tanggal SPK</th>
                               <th scope="col">No Polisi</th>
                               <th scope="col">No Rangka</th>
                               <th scope="col">No Mesin</th>
                               <th scope="col">Model</th>
                               <th scope="col">SA</th>
                               <th scope="col">Panel</th>
                               <th scope="col">Pembayar</th>
                               <th scope="col">Status</th>
                               <th scope="col">Aksi</th>
                           </tr>
                       </thead>
                       <tbody>
                            <?php foreach ($spk as $m) : 
                            
                                if ($m['status'] == 'Finish'){
                            ?>
                            <tr>
                                <td><?= $m['no_est']; ?></td>
                                <td><?= $m['no_spk']; ?></td>
                                <td><?= date('d-m-y', strtotime($m['tgl_spk']) );?></td>

                                <?php foreach($kendaraan as $k): 
                                    if($k['kd_kendaraan']==$m['kd_kendaraan']){
                                    ?>
                                <td><?= $k['no_polisi']; ?></td>
                                <td><?= $k['no_rangka']; ?></td>
                                <td><?= $k['no_mesin']; ?></td>
                                <td><?= $k['model']; ?></td>
                                <?php } endforeach ?>
                                <?php foreach ($sa as $s):?>
                                <?php if ($s['kd_sa']==$m['kd_sa']){?>
                                <td><?= $s['nama_sa'] ?></td>
                                <?php } endforeach?>

                                <?php $panel=0; 
                                    foreach ($detail as $dtl):
										if ($dtl['no_spk']== $m['no_est']){ 
										
                                ?>
                                <?php  $panel += $dtl['jumlah'];?>
                                <?php  } endforeach ?>
                                
                                <td><?= $panel ?></td>

                                <td><?= $m['pembayar']; ?></td>
                                <td><?= $m['status']; ?></td>
                                <td>
                                    <a href="<?= base_url('spk/invoice/'); ?><?= $m['no_est']; ?>" class="badge badge-success" target="_blank">Print</a>
                                </td>
                            </tr>
                           <?php } endforeach; ?>
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
   </div>
</body>
<script src="<?= base_url('assets') ?>/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.2/js/dataTables.fixedHeader.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
    "order": [[0,'desc']],
    lengthMenu: [[20, 50, 100, -1], [20, 50, 100, 'Todos']]
});
} );
</script>
<?php ini_set('display_errors','off'); ?>
<?php
  error_reporting(0);
?>