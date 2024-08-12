<?php $this->load->view('include/navbar2'); ?>

<html>
<head>
<script langauge="javascript">
function post_value(s,d){
opener.document.getElementById('customer').value = s;
opener.document.getElementById('pembayar').value = d;

self.close();
}
</script>
<title>Data Customer</title>
</head>
<body>
  <table id="example" class="table table-striped table-bordered"  style="text-align:center;">
      <thead>
          <?php $no = 1; ?>
          <tr>
              <th scope="col">ID Customer</th>
              <th scope="col">Nama Customer</th>
              <th scope="col">No. Telpon</th>
              <th scope="col"> </th>
          </tr>
      </thead>
      <tbody>
          <?php foreach ($cst as $m) : ?>
              <tr>
                  <td><?= $m['kd_customer']; ?></td>
                  <td><?= $m['nama_customer']; ?></td>
                  <td><?= $m['telpon']; ?></td>
                  <td><a href='#' onclick="post_value('<?= $m['nama_customer'];?>','<?= $m['nama_customer'];?>');"  class="badge badge-primary"> Pilih  <i class="fa fa-angle-down"></i></a></td>

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
