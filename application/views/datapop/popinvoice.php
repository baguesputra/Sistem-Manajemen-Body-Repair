<?php $this->load->view('include/navbar2'); ?>

<html>
<head>
<script langauge="javascript">
function post_value(a,b,c){
  opener.document.getElementById('no_inv').value = a;
  opener.document.getElementById('tgl_inv').value = b;
  opener.document.getElementById('total').value = c;
  
self.close();
}
</script>
<title>Data Invoice</title>
</head>
<body>
  <table id="example" class="table table-striped table-bordered"  style="text-align:center;">
      <thead>
          <?php $no = 1; ?>
          <tr>
                               <th scope="col">No Inv</th>
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
                               <th scope="col">Total</th>
                               <th scope="col">Aksi</th>
                           </tr>
      </thead>
      <tbody>
      <?php foreach ($spk as $m) : 
                            
                            if ($m['status'] == 'Finish'){
                        ?>
                        <tr>
                            <td><?= $m['no_inv']; ?></td>
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

                            <?php 
                            $total = 0;
                                foreach ($detail as $dtl):
                                    if ($dtl['no_spk'] == $m['no_est']){
                            ?>
                            <?php $total += $dtl['total'] ?>
                            <?php } endforeach ?>
                            <td><?= $total ?> </td>

                            <td><a href='#' onclick="post_value('<?= $m['no_inv'];?>','<?= $m['tgl_spk'];?>','<?= $total;?>');"  class="badge badge-primary"> Pilih  <i class="fa fa-angle-down"></i></a></td>

             </tr>
          <?php }endforeach ?>
      </tbody>
  </table>
</form>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/fixedheader/3.2.2/js/dataTables.fixedHeader.min.js"></script>
   <script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</html>
