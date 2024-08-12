<?php $this->load->view('include/navbar'); ?>

<body>
<br>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <h5><i class='fa fa-cube fa-fw'></i> Data Transaksi <i class='fa fa-angle-right fa-fw'></i> SPK</h5>
            <a href="<?= base_url('spk/tambah/'); ?>" class="btn btn-dark mb-3">Tambah Data</a>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%; font-size:11px;">
                    <thead>
                        <tr>
                            <th scope="col">No EST</th>
                            <th scope="col">No SPK</th>
                            <th scope="col">Tanggal SPK</th>
                            <th scope="col">No Polisi</th>
                            <th scope="col">No Rangka</th>
                            <th scope="col">No Mesin</th>
                            <th scope="col">Model</th>
                            <th scope="col">SA</th>
                            <th scope="col">Pembayar</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($spk as $m) :?>
                            <tr>    
                                <td><?= $m['no_est']; ?></td>
                                <td><?= $m['no_spk']; ?></td>
                                <td><?= date('d-m-y', strtotime($m['tgl_spk']) );?></td>
                                <?php foreach ($kendaraan as $k):?>
                                <?php if ($k['kd_kendaraan']==$m['kd_kendaraan']){?>
                                <td><?= $k['no_polisi']; ?></td>
                                <td><?= $k['no_rangka']; ?></td>
                                <td><?= $k['no_mesin']; ?></td>
                                <td><?= $k['model']; ?></td>
                                <?php } endforeach ?>
                                <?php foreach ($sa as $s):?>
                                <?php if ($s['kd_sa']==$m['kd_sa']){?>
                                <td><?= $s['nama_sa'] ?></td>
                                <?php } endforeach?>
                                <td><?= $m['pembayar']; ?></td>
                                <td><?= $m['status']; ?></td>
                                <td>

                                <?php
                                    if ($m['status'] == "Estimasi" || $m['status'] == "SPK" ||$m['status'] == "Pengajuan Asuransi"||$m['status'] == "Unit Belum Masuk"||$m['status'] == "Antrian Masuk"||$m['status'] == "Antrian Bongkar"||$m['status'] == "Bongkar"||$m['status'] == "Tarik Body"
                                    ||$m['status'] == "Tunggu Parts"||$m['status'] == "Welding"||$m['status'] == "Antrian Dempul"||$m['status'] == "Dempul"||$m['status'] == "Epoxy"||$m['status'] == "Persiapan Cat"||$m['status'] == "Pengecatan"||$m['status'] == "Antrian Pasang"
                                    ||$m['status'] == "Pemasangan"||$m['status'] == "Antrian Poles"||$m['status'] == "Poles"||$m['status'] == "Finishing"||$m['status'] == "Rawat Jalan"||$m['status'] == "Tambahan SPK"||$m['status'] == "Delivery" ){ 
                                ?>

                                        <a href="<?= base_url('spk/ubah/'); ?><?= $m['no_est']; ?>" class="badge badge-primary">Edit</a>

                                <?php } else { ?>

                                        <a href="<?= base_url('spk/printSpk/'); ?><?= $m['no_est']; ?>" class="badge badge-warning pl-2 pr-2" target="_blank">Print SPK</a>
                                
                                <?php } ?>
                                
                                <?php 
                                    if ($m['status'] == "SPK" ||$m['status'] == "Pengajuan Asuransi"||$m['status'] == "Unit Belum Masuk"||$m['status'] == "Antrian Masuk"||$m['status'] == "Antrian Bongkar"||$m['status'] == "Bongkar"||$m['status'] == "Tarik Body"
                                    ||$m['status'] == "Tunggu Parts"||$m['status'] == "Welding"||$m['status'] == "Antrian Dempul"||$m['status'] == "Dempul"||$m['status'] == "Epoxy"||$m['status'] == "Persiapan Cat"||$m['status'] == "Pengecatan"||$m['status'] == "Antrian Pasang"
                                    ||$m['status'] == "Pemasangan"||$m['status'] == "Antrian Poles"||$m['status'] == "Poles"||$m['status'] == "Finishing"||$m['status'] == "Rawat Jalan"||$m['status'] == "Tambahan SPK"||$m['status'] == "Delivery"||$m['status'] == "Finish" || $m['status'] == 'BATAL INVOICE'){
                                ?>

                                <?php } else {?>

                                        <a href="<?= base_url('spk/updateStatus/'); ?><?= $m['no_est']; ?>" class="badge badge-danger pl-2 pr-2" onclick="return confirm('Apakah Data sudah siap untuk di SPK?');">SPK</a>
                                        <a href="<?= base_url('spk/printEst/'); ?><?= $m['no_est']; ?>" class="badge badge-secondary pl-2 pr-2" target="_blank">Print Est</a>
                                
                                <?php }?>

                                <?php if ($m['status'] == 'Estimasi' || $m['status'] == 'Finish' || $m['status'] == 'BATAL INVOICE') {?>

                                <?php } else { ?>

                                        <a href="<?= base_url('spk/editstatus/'); ?><?=$m['no_est']?>" class="badge badge-secondary">Status</a>
                                        <a href="<?= base_url('spk/statusFinish/'); ?><?=$m['no_est']?>" class="badge badge-success" onclick="return confirm('Apakah yakin mengubah status menjadi Finish?');">Finish</a>
                                        <a href="<?= base_url('spk/printSpk/'); ?><?= $m['no_est']; ?>" class="badge badge-warning pl-2 pr-2" target="_blank">Print SPK</a>
                                
                                <?php } ?>
                            </td>
                            </tr>
                        <?php  endforeach; ?>
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

// $(document).ready(function () {
//     // Setup - add a text input to each footer cell
//     $('#example thead tr')
//         .clone(true)
//         .addClass('filters')
//         .appendTo('#example thead');
 
//     var table = $('#example').DataTable({
//         orderCellsTop: true,
//         fixedHeader: true,
//         initComplete: function () {
//             var api = this.api();
 
//             // For each column
//             api
//                 .columns()
//                 .eq(0)
//                 .each(function (colIdx) {
//                     // Set the header cell to contain the input element
//                     var cell = $('.filters th').eq(
//                         $(api.column(colIdx).header()).index()
//                     );
//                     var title = $(cell).text();
//                     $(cell).html('<input type="text" placeholder="' + title + '" />');
 
//                     // On every keypress in this input
//                     $(
//                         'input',
//                         $('.filters th').eq($(api.column(colIdx).header()).index())
//                     )
//                         .off('keyup change')
//                         .on('keyup change', function (e) {
//                             e.stopPropagation();
 
//                             // Get the search value
//                             $(this).attr('title', $(this).val());
//                             var regexr = '({search})'; //$(this).parents('th').find('select').val();
 
//                             var cursorPosition = this.selectionStart;
//                             // Search the column for that value
//                             api
//                                 .column(colIdx)
//                                 .search(
//                                     this.value != ''
//                                         ? regexr.replace('{search}', '(((' + this.value + ')))')
//                                         : '',
//                                     this.value != '',
//                                     this.value == ''
//                                 )
//                                 .draw();
 
//                             $(this)
//                                 .focus()[0]
//                                 .setSelectionRange(cursorPosition, cursorPosition);
//                         });
//                 });
//         },
//     });
// });
</script> 
<?php ini_set('display_errors','off'); ?>
<?php
  error_reporting(0);
?>

