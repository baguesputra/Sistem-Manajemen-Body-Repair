<?php $this->load->view('include/navbar'); ?>
<br>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
                <h5><i class='fa fa-cube fa-fw'></i> Data Transaksi <i class='fa fa-angle-right fa-fw'></i> Kwitansi</h5>
                <a href="<?= base_url('kwitansi/tambah/'); ?>" class="btn btn-dark mb-3">Tambah Data</a>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="text-align:center;">
                    <thead>
                        <?php $no = 1; ?>
                        <tr>
                            <th scope="col">No Kwitansi</th>
                            <th scope="col">Terima Dari</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Aksi</th>
                            <?php if($this->session->userdata['username']=="22.02.2179" || $this->session->userdata['username']=="11.11.259" || $this->session->userdata['username']=="12.07.471" ) {?>
                            <th scope="col">Hapus</th>
                            <?php }?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kwitansi as $k) : ?>
                            <tr>
                                <td><?= $k['no_kwitansi']; ?></td>
                                <td><?= $k['dari']; ?></td>
                                <td><?= $k['tgl']; ?></td>
                                <td><?= number_format($k['jumlah'], 0, ',', '.') ?></td>
                                <td>
                                <?php if($k['posisi']=="buka"){ ?>
                                <a href="<?= base_url('kwitansi/ubah/'); ?><?= $k['no_kwitansi']; ?>" class="badge badge-primary"><i class="fa fa-edit"></i>  Edit</a>
                                <?php } elseif($k['posisi']=="post") { ?>
                                    <a href="<?= base_url('kwitansi/view/'); ?><?= $k['no_kwitansi']; ?>" class="badge badge-success"><i class="fa fa-eye"></i>  Lihat</a>
                                    <a href="<?= base_url('kwitansi/laporan/'); ?><?= $k['no_kwitansi']; ?>" class="badge badge-secondary" target="_blank"><i class="fa fa-edit"></i>  Print</a>
                                <?php } ?>
                                </td>
                                

                                <?php if($this->session->userdata['username']=="22.02.2179" || $this->session->userdata['username']=="11.11.259" || $this->session->userdata['username']=="12.07.471" ) {?>
                                <td><a href="<?= base_url('kwitansi/hapus/'); ?><?= $k['no_kwitansi']; ?>" class="badge badge-danger pl-2 pr-2" onclick="return confirm('Apakah kamu ingin menghapus data ini?');"><i class="fa fa-trash"></i> Hapus</a></td>
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
        $('#example').DataTable({
    "order": [[0,'desc']],
    lengthMenu: [[20, 50, 100, -1], [20, 50, 100, 'Todos']]
});
} );
</script>
<?php ini_set('display_errors','off'); ?>
<?php
  error_reporting(0);
?>