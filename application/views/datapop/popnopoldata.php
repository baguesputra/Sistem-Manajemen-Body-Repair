<?php $this->load->view('include/navbar2'); ?>

<html>
<head>
<script langauge="javascript">
function post_value(z,a,b,c,d,e,f,g,h,i,j,x,y){
opener.document.getElementById('kd_kendaraan').value = z;
opener.document.getElementById('no_polisi').value = a;
opener.document.getElementById('brand').value = b;
opener.document.getElementById('kd_rangka').value = c;
opener.document.getElementById('no_rangka').value = d;
opener.document.getElementById('kd_mesin').value = e;
opener.document.getElementById('no_mesin').value = f;
opener.document.getElementById('model').value = g;
opener.document.getElementById('trans').value = h;
opener.document.getElementById('warna').value = i;
opener.document.getElementById('tahun').value = j;
opener.document.getElementById('kd_customer').value = x;
opener.document.getElementById('nama_customer').value = y;

self.close();
}
</script>
<title>Data Kendaraan</title>
</head>
<body>
  <table id="example" class="table table-striped table-bordered"  style="text-align:center;">
      <thead>
          <?php $no = 1; ?>
          <tr>
              <th scope="col">No. Polisi</th>
              <th scope="col">Brand</th>
              <th scope="col">Kode Rangka</th>
              <th scope="col">No. Rangka</th>
              <th scope="col">Kode Mesin</th>
              <th scope="col">No. Mesin</th>
              <th scope="col">Basic Model</th>
              <th scope="col">Transisi</th>
              <th scope="col">Tahun</th>
              <th scope="col">Warna</th>
              <th scope="col">Pemilik</th>
              <th scope="col"> </th>
          </tr>
      </thead>
      <tbody>
          <?php foreach ($knd as $m) : ?>
              <tr>
                <td><?= $m['no_polisi']; ?></td>
                <td><?= $m['brand']; ?></td>
                <td><?= $m['kd_rangka']; ?></td>
                <td><?= $m['no_rangka']; ?></td>
                <td><?= $m['kd_mesin']; ?></td>
                <td><?= $m['no_mesin']; ?></td>
                <td><?= $m['model']; ?></td>
                <td><?= $m['trans']; ?></td>
                <td><?= $m['tahun']; ?></td>
                <td><?= $m['warna']; ?></td>
                <td><?= $m['nama_customer']; ?></td>
                <td><a href='#' onclick="post_value
                ('<?= $m['kd_kendaraan'];?>','<?= $m['no_polisi'];?>','<?= $m['brand'];?>','<?= $m['kd_rangka'];?>','<?= $m['no_rangka'];?>',
                '<?= $m['kd_mesin'];?>','<?= $m['no_mesin'];?>','<?= $m['model'];?>','<?= $m['trans'];?>','<?= $m['tahun'];?>','<?= $m['warna'];?>','<?= $m['kd_customer'];?>','<?= $m['nama_customer'];?>');"
                class="badge badge-primary"> Pilih  <i class="fa fa-angle-down"></i></a></td>

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
