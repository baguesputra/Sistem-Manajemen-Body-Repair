<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>" />
   <link href="<?= base_url('assets/image/logo.png') ?>"  type='image/x-icon' rel='shortcut icon' >
   <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
   <!-- <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script> -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
   <title>Body Repair System</title>

   <style>
    ul li a{
       color:white;
    }
     li a:hover{ 
    color: #FFA07A;
    } 
    .dropdown-menu li {
    position: relative;
    }
    .dropdown-menu .dropdown-submenu {
    display: none;
    position: absolute;
    left: 100%;
    top: -7px;
    }
    .dropdown-menu .dropdown-submenu-left {
    right: 100%;
    left: auto;
    }
    .dropdown-menu > li:hover > .dropdown-submenu {
    display: block;
    }
   </style>
</head>
<?php
$this->simple_login->cek_login();
?>
   <nav class="navbar fixed-top navbar-expand-lg bg-dark">
  <a class="navbar-brand" style="color:white" href="">
  <img src="<?php echo base_url(); ?>assets/image/logo.png" width="25" height="25" class="d-inline-block align-top" alt="">
  BRS</a>
  <button style="color:white;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">
    <i class="fa fa-navicon" style="color:#fff; font-size:28px;"></i>
    </span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <?php $rows = $this->db->query("SELECT * FROM user where username='".$this->session->username."'")->row_array();?>


      <!-- Administrator -->
      <?php if($this->session->userdata['username']=="admin" || $this->session->userdata['username']=="11.11.259" || $this->session->userdata['username']=="12.07.471" || $this->session->userdata['username']=="20.08.1997" 
      || $this->session->userdata['username']=="14.03.813" || $this->session->userdata['username']=="19.08.1825"|| $this->session->userdata['username']=="22.11.2368" || $this->session->userdata['username']=="22.11.2350" ) 
      
      {?>
      <li class="nav-item dropdown" >
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-server"></i>
          Data Master
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?= base_url('asuransi'); ?>" >Data Asuransi</a>
          <a class="dropdown-item" href="<?= base_url('customer'); ?>" >Data Customer</a>
          <a class="dropdown-item" href="<?= base_url('Kendaraan'); ?>">Data Kendaraan</a>
          <a class="dropdown-item" href="<?= base_url('jenis'); ?>">Data Jasa</a>
          <a class="dropdown-item" href="<?= base_url('part'); ?>">Data Part</a>
          <a class="dropdown-item" href="<?= base_url('bahan'); ?>">Data Bahan</a>
          <a class="dropdown-item" href="<?= base_url('sa'); ?>">Data SA</a>
          <a class="dropdown-item" href="<?= base_url('fm'); ?>">Data Foreman</a>
          <a class="dropdown-item" href="<?= base_url('supplier'); ?>">Data Supplier</a>
          <a class="dropdown-item" href="<?= base_url('bank'); ?>">Data Bank/Kas</a>
          <a class="dropdown-item" href="<?= base_url('account'); ?>">Data Account</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-edit"></i>
          Transaksi
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= base_url('spk/'); ?>">Transaksi Estimasi</a>
          <a class="dropdown-item" href="<?= base_url('spk/maintenance'); ?>">Maintenance SPK</a>
          <a class="dropdown-item" href="<?= base_url('spk/datainvoice'); ?>">Invoice</a>
          <a class="dropdown-item" href="<?= base_url('spk/bahan'); ?>">Detail Bahan</a>
          <a class="dropdown-item" href="<?= base_url('spk/wip'); ?>">Work In Progress</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-cubes"></i>
          Persediaan
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= base_url('pembelian/part'); ?>">Pembelian Part</a>
          <a class="dropdown-item" href="<?= base_url('pembelian'); ?>">Pembelian Bahan</a>
          <a class="dropdown-item" href="<?= base_url('pengeluaran'); ?>">Pengeluaran</a>
          <a class="dropdown-item" href="<?= base_url('stok'); ?>">Stok</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-bar-chart"></i>
          Finance AR
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <!-- <a class="dropdown-item" href="<?= base_url('bkt'); ?>">Account Payable</a>
        <a class="dropdown-item" href="<?= base_url('nota_ar'); ?>">Acocunt Receivable</a> -->
        <a class="dropdown-item" href="<?= base_url('bbkt/indexBkt'); ?>">Bukti Kas Terima</a>
        <a class="dropdown-item" href="<?= base_url('bbkt/indexBbt'); ?>">Bukti Bank Terima</a>
        <a class="dropdown-item" href="<?= base_url('nota_ar/indexDebit'); ?>">Nota Debet AR</a> 
        <a class="dropdown-item" href="<?= base_url('nota_ar/indexKredit'); ?>">Nota Kredit AR</a> 
        <a class="dropdown-item" href="<?= base_url('kwitansi'); ?>">Kwitansi</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-bar-chart"></i>
          Finance AP
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <!-- <a class="dropdown-item" href="<?= base_url('bkt'); ?>">Account Payable</a>
        <a class="dropdown-item" href="<?= base_url('nota_ar'); ?>">Acocunt Receivable</a> -->
        <a class="dropdown-item" href="<?= base_url('bbkk/indexBkk'); ?>">Bukti Kas Keluar</a>
        <a class="dropdown-item" href="<?= base_url('bbkk/indexBbk'); ?>">Bukti Bank Keluar</a>
        <a class="dropdown-item" href="<?= base_url('nota_ap/indexDebit'); ?>">Nota Debet AP</a> 
        <a class="dropdown-item" href="<?= base_url('nota_ap/indexKredit'); ?>">Nota Kredit AP</a> 
        
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-file"></i>
          Report
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="<?= base_url('cetak/jasa'); ?>">Jasa Report</a>
          <a class="dropdown-item" href="<?= base_url('cetak/part'); ?>">Sparepart Report</a>
          <a class="dropdown-item" href="<?= base_url('cetak/bahan'); ?>">Bahan Report</a>
          <a class="dropdown-item" href="<?= base_url('cetak'); ?>">Monthly Report</a>
          <a class="dropdown-item" href="<?= base_url('cetak/invoice'); ?>">Invoice Report</a>
          <a class="dropdown-item" href="<?= base_url('cetak/incentive'); ?>">Incentive</a>
        </div>
      </li>
      <?php } ?>


       <!-- Manager -->
      <?php if($this->session->userdata['username']=="20.08.199799" ) 
      
      {?>
      <li class="nav-item dropdown" >
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-server"></i>
          Data Master
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?= base_url('asuransi'); ?>" >Data Asuransi</a>
          <a class="dropdown-item" href="<?= base_url('customer'); ?>" >Data Customer</a>
          <a class="dropdown-item" href="<?= base_url('Kendaraan'); ?>">Data Kendaraan</a>
          <a class="dropdown-item" href="<?= base_url('jenis'); ?>">Data Jasa</a>
          <a class="dropdown-item" href="<?= base_url('part'); ?>">Data Part</a>
          <a class="dropdown-item" href="<?= base_url('bahan'); ?>">Data Bahan</a>
          <a class="dropdown-item" href="<?= base_url('sa'); ?>">Data SA</a>
          <a class="dropdown-item" href="<?= base_url('fm'); ?>">Data Foreman</a>
          <a class="dropdown-item" href="<?= base_url('supplier'); ?>">Data Supplier</a>
         
          
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-edit"></i>
          Transaksi
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= base_url('spk/'); ?>">Transaksi Estimasi</a>
          <a class="dropdown-item" href="<?= base_url('spk/maintenance'); ?>">Maintenance SPK</a>
          <a class="dropdown-item" href="<?= base_url('spk/datainvoice'); ?>">Invoice</a>
          <a class="dropdown-item" href="<?= base_url('spk/bahan'); ?>">Detail Bahan</a>
          <a class="dropdown-item" href="<?= base_url('spk/wip'); ?>">Work In Progress</a>
         
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-cubes"></i>
          Persediaan
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Pre Order</a>
          <a class="dropdown-item" href="<?= base_url('pembelian'); ?>">Pembelian</a>
          <a class="dropdown-item" href="<?= base_url('pengeluaran'); ?>">Pengeluaran</a>
          <a class="dropdown-item" href="<?= base_url('stok'); ?>">Stok</a>
        </div>
      </li>
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-file"></i>
          Report
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="<?= base_url('cetak/jasa'); ?>">Jasa Report</a>
          <a class="dropdown-item" href="<?= base_url('cetak/part'); ?>">Sparepart Report</a>
          <a class="dropdown-item" href="<?= base_url('cetak/bahan'); ?>">Bahan Report</a>
          <a class="dropdown-item" href="<?= base_url('cetak'); ?>">Monthly Report</a>
          <a class="dropdown-item" href="<?= base_url('cetak/invoice'); ?>">Invoice Report</a>
          <a class="dropdown-item" href="<?= base_url('cetak/incentive'); ?>">Incentive</a>
        </div>
      </li>
      <?php } ?>




      <!-- User-SA -->
      <?php if($this->session->userdata['username']=="06.03.055" || $this->session->userdata['username']=="22.08.2291") 
      
      {?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-server"></i>
          Data Master
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= base_url('asuransi'); ?>" >Data Asuransi</a>
          <a class="dropdown-item" href="<?= base_url('customer'); ?>" >Data Customer</a>
          <a class="dropdown-item" href="<?= base_url('Kendaraan'); ?>">Data Kendaraan</a>
          <a class="dropdown-item" href="<?= base_url('jenis'); ?>">Data Jasa</a>
          <a class="dropdown-item" href="<?= base_url('part'); ?>">Data Part</a>
          <a class="dropdown-item" href="<?= base_url('sa'); ?>">Data SA</a>
          <a class="dropdown-item" href="<?= base_url('fm'); ?>">Data Foreman</a>
          
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-edit"></i>
          Transaksi
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= base_url('spk/'); ?>">Transaksi Estimasi</a>
          <a class="dropdown-item" href="<?= base_url('spk/maintenance'); ?>">Maintenance SPK</a>
          <a class="dropdown-item" href="<?= base_url('spk/datainvoice'); ?>">Invoice</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-file"></i>
          Report
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="<?= base_url('cetak/jasa'); ?>">Jasa Report</a>
          <a class="dropdown-item" href="<?= base_url('cetak/part'); ?>">Sparepart Report</a>
          <a class="dropdown-item" href="<?= base_url('cetak/bahan'); ?>">Bahan Report</a>
          <a class="dropdown-item" href="<?= base_url('cetak'); ?>">Monthly Report</a>
          <a class="dropdown-item" href="<?= base_url('cetak/incentive'); ?>">Insentive</a>
        </div>
      </li>
      <?php } ?>

      
  



        <!-- User-Admin (Mba Nita) -->
        <?php if($this->session->userdata['username']=="20.12.2010" || $this->session->userdata['username']=="12.01.312") 
      
      {?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-server"></i>
          Data Master
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= base_url('jenis'); ?>">Data Jasa</a>
          <a class="dropdown-item" href="<?= base_url('part'); ?>">Data Part</a>
          <a class="dropdown-item" href="<?= base_url('bahan'); ?>">Data Bahan</a>
          <a class="dropdown-item" href="<?= base_url('supplier'); ?>">Data Supplier</a>
          
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-edit"></i>
          Transaksi
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= base_url('spk/bahan'); ?>">Detail Bahan</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-cubes"></i>
          Persediaan
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Pre Order</a>
          <a class="dropdown-item" href="<?= base_url('pembelian/part'); ?>">Pembelian Part</a>
          <a class="dropdown-item" href="<?= base_url('pembelian'); ?>">Pembelian Bahan</a>
          <a class="dropdown-item" href="<?= base_url('pengeluaran'); ?>">Pengeluaran</a>
          <a class="dropdown-item" href="<?= base_url('stok'); ?>">Stok</a>
        </div>
      </li>
      <?php } ?>




      <!-- User-Qc -->
      <?php if($this->session->userdata['username']=="11.12.300") 
      
      {?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-edit"></i>
          Transaksi
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="<?= base_url('spk/wip'); ?>">Work In Progress</a>
        </div>
      </li>
      <?php } ?>

    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user"></i>
          <?= $rows['nama'] ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php if($this->session->userdata['username']=="admin" || $this->session->userdata['username']=="11.11.259" || $this->session->userdata['username']=="12.07.471") { ?>
          <a class="dropdown-item" href="<?= site_url('user') ?>">User</a>
        <?php } ?>
          <a class="dropdown-item" href="<?= site_url('auth/logout') ?>">Log Out</a>
        </div>
      </li>
      </ul>
  </div>
</nav>
<br>
<br>
<br>
