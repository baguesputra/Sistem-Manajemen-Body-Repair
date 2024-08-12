<?php $this->load->view('include/navbar'); ?>
<br>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <h5><i class='fa fa-cube fa-fw'></i> Data Master <i class='fa fa-angle-right fa-fw'></i> Customer</h5>
            <a href="<?= base_url('customer/tambah/'); ?>" class="btn btn-dark mb-3">Tambah Data</a>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="text-align:center;">
                    <thead>
                        <tr>
                            <th scope="col">Nama Customer</th>
                            <th scope="col">Telpon</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($customer as $m) : ?>
                            <tr>
                                <td><?= $m['nama_customer']; ?></td>
                                <td><?= $m['telpon']; ?></td>
                                <td><?= $m['alamat']; ?></td>
                                <td><a href="<?= base_url('customer/ubah/'); ?><?= $m['kd_customer']; ?>" class="badge badge-primary"><i class="fa fa-edit"></i>  Edit</a></td>
                                <td><a href="<?= base_url('customer/hapus/'); ?><?= $m['kd_customer']; ?>" class="badge badge-danger pl-2 pr-2" onclick="return confirm('Apakah kamu ingin menghapus data ini?');"><i class="fa fa-trash"></i> Hapus</a></td>
                            </tr>
                        <?php endforeach; ?>
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