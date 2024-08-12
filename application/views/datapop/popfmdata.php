<?php $this->load->view('include/navbar2'); ?>

<html>
<head>
<script langauge="javascript">
function post_value(s,t){
  opener.document.getElementById('kd_fm').value = s;
  opener.document.getElementById('nama_fm').value = t;
self.close();
}
</script>
<title>Data Foreman</title>
</head>
<body>
  <table id="example" class="table table-striped table-bordered"  style="text-align:center;">
      <thead>
          <?php $no = 1; ?>
          <tr>
              <th scope="col">ID Foreman</th>
              <th scope="col">Nama Foreman</th>
              <th scope="col"> </th>
          </tr>
      </thead>
      <tbody>
          <?php foreach ($fm as $m) : ?>
              <tr>
                  <td><?= $m['kd_fm']; ?></td>
                  <td><?= $m['nama_fm']; ?></td>
                  <td><a href='#' onclick="post_value('<?= $m['kd_fm'];?>','<?= $m['nama_fm'];?>');"  class="badge badge-primary"> Pilih  <i class="fa fa-angle-down"></i></a></td>

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
