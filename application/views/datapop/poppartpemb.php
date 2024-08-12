<?php $this->load->view('include/navbar2'); ?>

<html>
<head>
<script langauge="javascript">
function post_value(s,t,v,y){
  opener.document.getElementById('kd_jenis').value = s;
  opener.document.getElementById('jenis_pekerjaan').value = t;
  opener.document.getElementById('harga').value = v;
  opener.document.getElementById('jumlah2').value = y;

self.close();
}
</script>
<title>Data Part</title>
</head>
<body>
  <table id="example" class="table table-striped table-bordered"  style="text-align:center;">
      <thead>
          <?php $no = 1; ?>
          <tr>
              <th scope="col">Nama</th>
              <th scope="col">Harga</th>
              <th scope="col">Stok</th>
              <th scope="col"> </th>
          </tr>
      </thead>
      <tbody>
          <?php foreach ($part as $p) : ?>
              <tr>
                  <td><?= $p['nama']; ?></td>
                  <td><?= $p['harga']; ?></td>
                  <td><?= $p['stok']; ?></td>
                  <td><a href='#' onclick="post_value('<?= $p['kd_part'];?>','<?= $p['nama'];?>','<?= $p['harga'];?>','<?= $p['stok'];?>');"  class="badge badge-primary"> Pilih  <i class="fa fa-angle-down"></i></a></td>
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
