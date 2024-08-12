<?php $this->load->view('include/navbar'); ?>
<br>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <h5><i class='fa fa-cube fa-fw'></i> Data Master <i class='fa fa-angle-right fa-fw'></i> Sparepart</h5>
            <a href="<?= base_url('part/tambah/'); ?>" class="btn btn-dark mb-3">Tambah Data</a>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="text-align:center;">
                    <thead>
                        <?php $no = 1; ?>
                        <tr>
                            <th scope="col">Kode Part</th>
                            <th scope="col">Nama Sparepart</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Edit</th>
                            <?php if($this->session->userdata['username']=="22.02.2179" || $this->session->userdata['username']=="11.11.259" || $this->session->userdata['username']=="12.07.471" ) {?>
                            <th scope="col">Hapus</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($part as $m) : ?>
                            <tr>
                                <td><?= $m['kd_part']; ?></td>
                                <td><?= $m['nama']; ?></td>
                                <td><?= $m['harga']; ?></td>
                                <td><?= $m['stok']; ?></td>
                                <td><a href="<?= base_url('part/ubah/'); ?><?= $m['kd_part']; ?>" class="badge badge-primary"><i class="fa fa-edit"></i>  Edit</a></td>

                                <?php if($this->session->userdata['username']=="22.02.2179" || $this->session->userdata['username']=="11.11.259" || $this->session->userdata['username']=="12.07.471" ) {?>
                                <td><a href="<?= base_url('part/hapus/'); ?><?= $m['kd_part']; ?>" class="badge badge-danger pl-2 pr-2" onclick="return confirm('Apakah kamu ingin menghapus data ini?');"><i class="fa fa-trash"></i> Hapus</a></td>
                            </tr>
                        <?php } endforeach; ?>
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
