<?php $this->load->view('include/navbar2'); ?>

<html>
<head>
<script langauge="javascript">
function post_value(d,s){
opener.document.getElementById('kode_pemasok').value = d;
opener.document.getElementById('pemasok').value = s;
self.close();
}
</script>
<title>Data Supplier</title>
</head>
<body>
  <table id="example" class="table table-striped table-bordered"  style="text-align:center;">
      <thead>
          <?php $no = 1; ?>
          <tr>
              <th scope="col">Kode</th>
              <th scope="col">Nama Supplier</th>
              <th scope="col"> </th>
          </tr>
      </thead>
      <tbody>
          <?php foreach ($asr as $m) : ?>
              <tr>
                  <td><?= $m['kd_supplier']; ?></td>
                  <td><?= $m['nama']; ?></td>
                  <td><a href='#' onclick="post_value('<?= $m['kd_supplier'];?>','<?= $m['nama'];?>');"  class="badge badge-primary"> Pilih  <i class="fa fa-angle-down"></i></a></td>

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
