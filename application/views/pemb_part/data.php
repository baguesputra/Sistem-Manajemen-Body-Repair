<?php $this->load->view('include/navbar'); ?>

<body>
<br>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <h5><i class='fa fa-cube fa-fw'></i> Data Persediaan <i class='fa fa-angle-right fa-fw'></i> Pembelian Part</h5>
            <a href="<?= base_url('pembelian/tambahpart/'); ?>" class="btn btn-dark mb-3">Pembelian</a>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Kode Pembelian</th>
                            <th scope="col">Tanggal Pembelian</th>
                            <th scope="col">Supplier</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tempo</th>
                            <th scope="col">Sisa Bayar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pembelian as $p) :?>
                            <tr>    
                                <td><?= $p['kd_pemb']; ?></td>
                                <td><?= $p['tgl_pemb']; ?></td>
                                <td><?= $p['supplier']; ?></td>

                               
                                <td><?= $p['status']; ?></td>
                                <?php 
                                 $tgl1 = new DateTime($p["tgl_tempo"]);
                                $tgl2 = new DateTime($p["tgl_pemb"]);
                                $jarak = $tgl2->diff($tgl1)->days+1;

                               
                                ?>
                                 <?php if($p['status'] == "CASH"){ ?>
                                    <td>-</td>
                                <?php } else { ?>
                                <td><?= $jarak ?> Hari</td>
                                <?php } ?>
                                <td><?= $p['sisa']; ?></td>
                                <td>

                                    <?php if($p['posisi'] == "post") { ?>

                                    <?php } else { ?>
                                    <a href="<?= base_url('pembelian/ubahpart/'); ?><?= $p['kd_pemb']; ?>" class="badge badge-primary">Detail</a>
                                    <?php } ?>
                                    
                                    <?php if($p['posisi']== "post") { ?>
                                    <?php if($p['sisa'] > '0') {?>
                                        <a href="<?= base_url('pembelian/bayarpart/'); ?><?= $p['kd_pemb']; ?>" class="badge badge-success">Bayar</a> 
                                        <a href="<?= base_url('pembelian/printPembpart/'); ?><?= $p['kd_pemb']; ?>" class="badge badge-warning pl-2 pr-2" target="_blank">Print</a>
                                      <?php } else {  ?>

                                        
                                       
                                       
                                    <?php }} ?>

                                    <?php if($p['sisa']== "0") { ?>
                                    <a href="<?= base_url('pembelian/printPembpart/'); ?><?= $p['kd_pemb']; ?>" class="badge badge-warning pl-2 pr-2" target="_blank">Print</a>    
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

