<?php $this->load->view('include/navbar'); ?>
<body>
<br>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <h5><i class='fa fa-cube fa-fw'></i> FAD <i class='fa fa-angle-right fa-fw'></i> Register</h5>
            <a href="#" class="btn btn-dark mb-3">Tambah Data</a>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No. Polisi</th>
                            <th scope="col">Brand</th>
                            <th scope="col">No Rangka</th>
                            <th scope="col">No Mesin</th>
                            <th scope="col">Transisi</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Warna</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Edit</th>
                            <?php if($this->session->userdata['username']=="22.02.2179" || $this->session->userdata['username']=="11.11.259" || $this->session->userdata['username']=="12.07.471" ) {?>
                            <th scope="col">Hapus</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><a href="" class="badge badge-primary">Edit</a></td>

                                <?php if($this->session->userdata['username']=="22.02.2179" || $this->session->userdata['username']=="11.11.259" || $this->session->userdata['username']=="12.07.471" ) ?>
                                <td><a href="" class="badge badge-danger pl-2 pr-2" onclick="return confirm('Apakah kamu ingin menghapus data ini?');">Hapus</a></td>
                            </tr>
                        <?php  ?>
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