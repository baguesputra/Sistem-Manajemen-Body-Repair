<?php $this->load->view('include/navbar2'); ?>

<html>
<head>
<script langauge="javascript">
function post_value(s){
  opener.document.getElementById('supplier').value = s;
self.close();
}
</script>
<title>Data Supplier</title>
</head>
<body>
  <table id="example" class="table table-striped table-bordered"  style="text-align:center;">
      <thead>
          <tr>
              <th scope="col">Kode Supplier</th>
              <th scope="col">Nama</th>
              <th scope="col">Aksi</th>
          </tr>
      </thead>
      <tbody>
          <?php foreach ($supplier as $s) : ?>
              <tr>
                  <td><?= $s['kd_supplier']; ?></td>
                  <td><?= $s['nama']; ?></td>
                  <td><a href='#' onclick="post_value('<?= $s['nama'];?>');"  class="badge badge-primary"> Pilih<i class="fa fa-angle-down"></i></a></td>
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
