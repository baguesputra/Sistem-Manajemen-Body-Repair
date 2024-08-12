<?php $this->load->view('include/navbar'); ?>

<body>
<br>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <h5><i class='fa fa-cube fa-fw'></i> Finance <i class='fa fa-angle-right fa-fw'></i> Bukti Bank Keluar</h5>
            <a href="<?= base_url('bbkk/tambahBbk/'); ?>" class="btn btn-dark mb-3">Tambah Data</a>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%;">
                    <thead>
                        <tr>
                            <th scope="col">No Dok</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Tipe Pembayaran</th>
                            <th scope="col">Bank Tujuan</th>
                            <th scope="col">Bayar</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Selisih</th>
                            <th scope="col">Ket</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bbk as $b) :?>
                            <tr>    
                                <td><?= $b['no_dok']; ?></td>
                                <td><?= $b['tgl']; ?></td>
                                <td><?= $b['tipe']; ?></td>
                                <td><?= $b['kd_bank']; ?></td>
                                <td><?= $b['bayar']; ?></td>
                                <td><?= $b['jumlah']; ?></td>
                                <td><?= $b['selisih']; ?></td>
                                <td><?= $b['ket']; ?></td>
                                <td>
                                        <?php if($b['status']=='0') {?>
                                        <a href="<?= base_url('bbkk/ubahBbk/'); ?><?= $b['no_dok']; ?>" class="badge badge-primary">Edit</a>     
                                        <a href="<?= base_url('bbkk/postingBbk/'); ?><?=$b['no_dok']?>" class="badge badge-success" onclick="return confirm('Apakah yakin data akan di posting?');">Posting</a>    
                                        <a href="<?= base_url('bbkk/printBbk/'); ?><?= $b['no_dok']; ?>" class="badge badge-warning pl-2 pr-2" target="_blank">Print Bukti Terima</a>
                                        <?php } else { ?>
                                            <a href="<?= base_url('bbkk/printBbk/'); ?><?= $b['no_dok']; ?>" class="badge badge-warning pl-2 pr-2" target="_blank">Print Bukti Terima</a>
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
    $('#example').DataTable();
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

