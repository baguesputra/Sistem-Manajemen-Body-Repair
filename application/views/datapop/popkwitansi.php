<?php $this->load->view('include/navbar2'); ?>

<html>
<head>
<script langauge="javascript">
function post_value(x,y,z){
  opener.document.getElementById('no_inv').value = x;
  opener.document.getElementById('tgl_inv').value = y;
  opener.document.getElementById('total').value = z;
  
self.close();
}
</script>
<title>Data Kwitansi</title>
</head>
<body>
  <table id="example" class="table table-striped table-bordered"  style="text-align:center;">
      <thead>
          <?php $no = 1; ?>
          <tr>
              <th scope="col">Kode Kwitansi</th>
              <th scope="col">Dari</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Total</th>
              <th scope="col"> </th>
          </tr>
      </thead>
      <tbody>
          <?php foreach ($kwitansi as $k) : ?>
              <tr>
                  <td><?= $k['no_kwitansi']; ?></td>
                  <td><?= $k['dari']; ?></td>
                  <td><?= $k['tgl']; ?></td>
                  <td><?= $k['jumlah']; ?></td>
                  <td><a href='#' onclick="post_value('<?= $k['no_kwitansi'];?>','<?= $k['tgl'];?>','<?= $k['jumlah'];?>');"  class="badge badge-primary"> Pilih  <i class="fa fa-angle-down"></i></a></td>

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
