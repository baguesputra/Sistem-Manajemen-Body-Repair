<?php $this->load->view('include/navbar2'); ?>

<html>
<head>
<script langauge="javascript">
function post_value(d,s,a){
opener.document.getElementById('kd_asuransi').value = d;
opener.document.getElementById('nama_asuransi').value = s;
opener.document.getElementById('pembayar').value = a;
self.close();
}
</script>
<title>Data Asuransi</title>
</head>
<body>
  <table id="example" class="table table-striped table-bordered"  style="text-align:center;">
      <thead>
          <?php $no = 1; ?>
          <tr>
              <th scope="col">Kode</th>
              <th scope="col">Nama Asuransi</th>
              <th scope="col"> </th>
          </tr>
      </thead>
      <tbody>
          <?php foreach ($asr as $m) : ?>
              <tr>
                  <td><?= $m['kd_asuransi']; ?></td>
                  <td><?= $m['nama_asuransi']; ?></td>
                  <td><a href='#' onclick="post_value('<?= $m['kd_asuransi'];?>','<?= $m['nama_asuransi'];?>','<?= $m['nama_asuransi'];?>');"  class="badge badge-primary"> Pilih  <i class="fa fa-angle-down"></i></a></td>

             </tr>
          <?php endforeach; ?>
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
