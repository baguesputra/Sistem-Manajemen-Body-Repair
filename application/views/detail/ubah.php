<?php $this->load->view('include/navbar'); ?>

   <div class="container-fluid">
           <div class="col-md-12">
               <h3>Detail Pekerjaan</h3>
               <div class="card border-secondary">
                   <div class="card-header text-white bg-secondary">
                       Tambah Data Detail Pekerjaan
                   </div>
                   <div class="card-body">
                       <form action="" method="post">


                        
                         <div class="form-inline">
               							<label class="col-sm-1d" for="kode">No. Estimasi</label>
               							<div class="col-sm-2">

                            <?php 
                              if (isset($_GET['spk'])){
                            ?>
                              <input class="form-control" type="text" name="no_spk" value="<?= $_GET['spk']; ?>" id="no_spk" readonly>

                            <?php } ?>
                              <input class="form-control" type="text" name="kd_detail" value="<?= $kodeunik; ?>" id="kd_detail" hidden>
               							</div>
                            <label class="col-sm-2" for="kode">Tanggal</label>
                            <?php
                              $tgl=date('Y-m-d');
                              ?>
                            <div class="col-sm-3">
                              <input class="form-control datepicker" type="date" name="" id="tgl_spk" value="<?php echo $tgl ?>" style="width:225px;" readonly>
                            </div>
                             <a href="javascript:void(0);" NAME="My Window Name" title=" My title here "
                              onClick='javascript:window.open("<?= base_url('detail/popjenis'); ?>","Ratting",
                              "width=900,height=300,left=170,top=120,toolbar=1,status=1,");'>
                              <button class="btn btn-primary" type="button" style="height: 38px;" ><i class="fa fa-search"></i></button>
                            </a>
               					</div>
                        <br>
                        <!-- <div class="form-inline">
                          <label class="col-sm-2" for="id">No. Polisi</label>
                          <div class="col-sm-3">
                            <input class="form-control" type="text" name="" value="" id="nama_customer" readonly>
                          </div>
                           <label class="col-sm-2" for="id">Pembayar</label>
                           <div class="col-sm-3">
                             <input class="form-control" type="text" name="" value="" id="telpon" readonly>
                           </div>
                       </div> -->
                     
                       <div class="form-inline">
                           
                          <div class="input-group sm-4">
                            <input class="form-control" type="text" name="kd_jenis" value="" id="kd_jenis" hidden style="width:225px;">
                           
                            <div class="input-group-append">

                            </div>
                          </div>
                      </div>
                     
                      
            
                      <br>
                      <div class="form-inline">
                      <label class="" for="kode">Pekerjaan/Part</label>&nbsp &nbsp
                        <div class="col-xs-1">
                          <input class="form-control" type="text" name="jenis" value="" id="jenis" style="width:160px;">
                         
                        </div>
                      <label class="col-sm" for="tipe">Tipe</label>
                         <div class="col-xs-1">
                           <input class="form-control" type="text" name="tipe" value="" id="tipe" style="width:140px;">
                         </div>
                         <label class="col-sm" for="kode">Harga</label>
                         <div class="col-xs-1">
                           <input class="form-control" type="text" name="harga" value="" id="harga" style="width:120px;" onkeyup="sum();">
                         </div>
                         <label class="col-sm" for="id">Jumlah</label>
                         <div class="col-xs-1">
                           <input class="form-control" type="text" name="jumlah" value="" id="jumlah" style="width:60px;" onkeyup="sum();">
                         </div>
                         <label class="col-sm" for="id">Diskon</label>
                         <div class="col-xs-1">
                           <input class="form-control" type="text" name="diskon" value="0" id="diskon" style="width:60px;" onkeyup="sum();">
                         </div>
                         <label class="col-sm" for="id">Total</label>
                         <div class="col-xs-1">
                           <input class="form-control" type="text" name="total" value="" id="total" style="width:150px;" readonly>
                         </div>
                         
                     </div>
                     <br>
                     <div class="form-inline">
                     
                         </div>
                     <br>
                           <div class="row">
                             <div class="col-sm-8">
                             </div>
                             <div class="col-sm-2">
                               <button type="submit" class="btn btn-dark float-right btn-block" name="tambah"><i class="fa fa-plus-circle"></i>  Tambah</button>
                             </div>
                             <div class="col-sm-2">
                               <!-- <button type="button" class="btn btn-danger float-right btn-block"  onclick="history.back();"><i class="fa fa-undo"></i>  Selesai</button> -->
                               <a href="/body-repair/spk" class="btn btn-danger float-right btn-block"><i class="fa fa-undo"></i>Kembali</a>
                             </div>
                           </div>
                       </form>

                      <div class="class table-responsive">
                       <table class="table table-striped table-bordered" style="text-align:center;">
                         <thead>
                            <tr>
                              <th>Pekerjaan/Part</th>
                              <th>Tipe</th>
                              <th>Harga</th>
                              <th>Jumlah</th>
                              <th>Diskon</th>
                              <th>Total</th>
                              <th>Aksi</th>
                            </tr>
                         </thead>
                       
                         <tbody>
                         <?php 
                         
                         $jumlah = 0;
                         foreach ($detail as $data):
                          if ($data['no_spk']== $_GET['spk']){
                          ?>
                          <tr>
                            <?php foreach ($jenis as $pekerjaan):
                              if ($pekerjaan['kd_jenis']== $data['kd_jenis']){
                            ?>
                            <td><?= $pekerjaan['jenis']; ?></td>

                            <?php } endforeach?>
                            
                            <td><?= $data['kd_jenis']; ?></td>
                            <td><?= $data['harga']; ?></td>
                            <td><?= $data['jumlah']; ?></td>
                            <td><?= $data['diskon']; ?></td>
                            <td><?= number_format($data['total'], 0, ',', '.') ?></td>
                            <td>
                            <a href="<?= base_url('detail/hapus/'); ?><?= $data['kd_detail']; ?>" class="badge badge-danger pl-2 pr-2" onclick="return confirm('Apakah kamu ingin menghapus data ini?');">Hapus</a>
                            </td>
                          
                         </tr>
                         <?php $jumlah += $data['total']; ?>
                         <?php } ?>
                         <?php endforeach; ?>  
                         <tr>
                              
                              <td colspan="5">Total</td>
                              <td colspan="2"><?= number_format($jumlah, 0, ',', '.') ?></td>
                            </tr> 
                         </tbody>
                         
                       </table>
                       </div>
                   </div>
               </div>
           </div>
   </div>

   <!-- Optional JavaScript -->
   <script src="<?= base_url('assets') ?>/js/bootstrap.min.js"></script>
   <script>
      function sum() {
      var txtFirstNumberValue = document.getElementById('harga').value;
      var txtSecondNumberValue = document.getElementById('jumlah').value;
      var txtThirdNumberValue = document.getElementById('diskon').value;
      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
      var diskon = (parseInt(result) * parseInt(txtThirdNumberValue))/ 100;
      var jumlah = parseInt(result)-parseInt(diskon);
      if (!isNaN(result)) {
         document.getElementById('total').value = jumlah;
      }
          }
   </script>
</body>

</html>
<?php ini_set('display_errors','off'); ?>
<?php
  error_reporting(0);
?>