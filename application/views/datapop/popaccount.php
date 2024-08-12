<?php $this->load->view('include/navbar2'); ?>

<html>
<head>
<script langauge="javascript">
function post_value(s,v){
  opener.document.getElementById('gl_account').value = s;
  opener.document.getElementById('keterangan').value = v;
  
self.close();
}
</script>
<title>Data Account</title>
</head>
<body>
  <table id="example" class="table table-striped table-bordered"  style="text-align:center;">
      <thead>
          <?php $no = 1; ?>
          <tr>
              <th scope="col">No Account</th>
              <th scope="col">Keterangan</th>
          </tr>
      </thead>
      <tbody>
          <?php foreach ($account as $a) : ?>
              <tr>
                  <td><?= $a['no_account']; ?></td>
                  <td><?= $a['ket']; ?></td>
                  <td><a href='#' onclick="post_value('<?= $a['no_account'];?>','<?= $a['ket'];?>');"  class="badge badge-primary"> Pilih  <i class="fa fa-angle-down"></i></a></td>

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
