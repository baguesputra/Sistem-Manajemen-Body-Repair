<?php $this->load->view('include/navbar'); ?>
 <br>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
                <h5><i class='fa fa-cube fa-fw'></i> Persediaan <i class='fa fa-angle-right fa-fw'></i> Stok</h5>
                <a href="<?= base_url('stok/bahan/'); ?>" class="btn btn-dark mb-3">Bahan</a>
                <a href="<?= base_url('stok/part/'); ?>" class="btn btn-dark mb-3">Part</a>
            <div class="table-responsive">
               <h3>Data Bahan</h3>
                <table id="example" class="table table-striped table-bordered" style="text-align:center;">
                    <thead>
                        <tr>
                            <th scope="col">Kode Bahan</th>
                            <th scope="col">Nama</th>
                            <th scope="col">stok</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Kartu Stok</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($bahan as $b): ?>
                        <tr>
                                <td><?= $b['kd_bahan']; ?></td>
                                <td><?= $b['nama']; ?></td>
                                <td><?= $b['jumlah']; ?></td>
                                <td><?= $b['harga']; ?></td>
                                <td>
                                    <a href="<?= base_url('stok/kartubahan/'); ?><?= $b['kd_bahan']; ?>" class="btn btn-success">Detail</a>
                                </td>
                        </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
             
            </div>

           
        </div>
    </div>
</div>
</body>

<script src="<?= base_url('assets') ?>/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.2/js/dataTables.fixedHeader.min.js"></script>
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<?php ini_set('display_errors','off'); ?>
<?php
  error_reporting(0);
?>
