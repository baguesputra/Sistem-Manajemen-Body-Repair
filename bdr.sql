-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2022 at 08:19 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdr`
--

-- --------------------------------------------------------

--
-- Table structure for table `ms_asuransi`
--

CREATE TABLE `ms_asuransi` (
  `kd_asuransi` varchar(10) NOT NULL,
  `nama_asuransi` varchar(50) NOT NULL,
  `created_by` varchar(35) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(35) NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_asuransi`
--

INSERT INTO `ms_asuransi` (`kd_asuransi`, `nama_asuransi`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('INS_ASM_00', 'PT Asuransi Sinar Mas', '', '2022-03-15 10:11:41', '', NULL),
('INS_WHT_00', 'WAHANA TATA INSURANCE JAKARTA SELATAN', '', '2022-03-15 10:11:41', '', NULL),
('INS_WWG_00', 'WUWUNGAN INSURANCE NATION', '', '2022-03-15 10:11:41', '', NULL),
('INS_ZRH_00', 'ZURICH INSURANCE', '', '2022-03-15 10:11:41', '', NULL),
('x', 'lalalala', '22.02.2179', '2022-03-15 12:07:31', '21.07.2048', '2022-03-15 12:30:30');

-- --------------------------------------------------------

--
-- Table structure for table `ms_customer`
--

CREATE TABLE `ms_customer` (
  `kd_customer` varchar(25) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `telpon` varchar(25) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `no_npwp` varchar(25) NOT NULL,
  `lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_by` varchar(35) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(35) NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_customer`
--

INSERT INTO `ms_customer` (`kd_customer`, `nama_customer`, `tipe`, `telpon`, `no_ktp`, `no_npwp`, `lahir`, `alamat`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('CST-0001', 'Sandy', 'Perorangan', '085158856468', '6390604282909992', '1382828881818', '1996-02-24', 'Jl. Mabun', '', NULL, '', NULL),
('CST-0002', 'Bagues putra', 'Perorangan', '082251577759', '32323232', '8938938938', '2022-03-02', 'Jln Sutoyo s Gg 20', '', NULL, '', NULL),
('CST-0003', 'Tri Wicaksono', 'Perorangan', '081352637748', '3392892898291', '99039093093', '1989-02-08', 'Jln Kayutangi', '', NULL, '', NULL),
('CST-0004', 'Hairuddin', 'Perorangan', '081342536273', '3243434343', '989389283928', '2022-03-15', 'Jln Kayutangi', '22.02.2179', '2022-03-15 12:36:05', '22.02.2179', '2022-03-15 12:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `ms_fm`
--

CREATE TABLE `ms_fm` (
  `kd_fm` varchar(25) NOT NULL,
  `nama_fm` varchar(255) NOT NULL,
  `created_by` varchar(35) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(35) NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_fm`
--

INSERT INTO `ms_fm` (`kd_fm`, `nama_fm`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('FM-0001', 'MUHAMMAD IDEHAM', '', NULL, '', NULL),
('FM-0002', 'ZULKIPLI', '', NULL, '', NULL),
('FM-0003', 'AHYATNOOR', '', NULL, '', NULL),
('FM-0004', 'NAZIM', '22.02.2179', '2022-03-15 13:02:02', '22.02.2179', '2022-03-15 13:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `ms_jenis`
--

CREATE TABLE `ms_jenis` (
  `kd_jenis` varchar(25) NOT NULL,
  `jenis` varchar(150) NOT NULL,
  `harga` decimal(15,0) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `created_by` varchar(35) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(35) NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_jenis`
--

INSERT INTO `ms_jenis` (`kd_jenis`, `jenis`, `harga`, `tipe`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('JS-0001', 'Pengecatan Pintu Belakang', '300000', 'Jasa', '', NULL, '', NULL),
('JS-0002', 'Bumper', '500000', 'Part', '', NULL, '', NULL),
('JS-0003', 'Perbaikan body', '900000', 'Jasa', '', NULL, '', NULL),
('JS-0004', 'Ganti Knalpot', '35000', 'Jasa', '', NULL, '', NULL),
('JS-0005', 'Kaca Mobil', '67000', 'Part', '', NULL, '', NULL),
('JS-0006', 'Pemasangan Mesin', '780000', 'Jasa', '22.02.2179', '2022-03-15 12:48:57', '22.02.2179', '2022-03-15 12:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `ms_kendaraan`
--

CREATE TABLE `ms_kendaraan` (
  `kd_kendaraan` varchar(25) NOT NULL,
  `no_polisi` varchar(10) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `kd_rangka` varchar(20) NOT NULL,
  `no_rangka` varchar(20) NOT NULL,
  `kd_mesin` varchar(20) NOT NULL,
  `no_mesin` varchar(20) NOT NULL,
  `model` varchar(50) NOT NULL,
  `trans` varchar(20) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `kd_customer` varchar(25) NOT NULL,
  `created_by` varchar(35) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(35) NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_kendaraan`
--

INSERT INTO `ms_kendaraan` (`kd_kendaraan`, `no_polisi`, `brand`, `kd_rangka`, `no_rangka`, `kd_mesin`, `no_mesin`, `model`, `trans`, `tahun`, `warna`, `kd_customer`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('KND-00001', 'DA6145UAB', 'Honda', '1919811', '211AKSS0', '91919009', '11242222', 'HONDA', 'MATIC', '2015', 'WHITE', 'Sandy', '', NULL, '', NULL),
('KND-00002', 'DA6463YR', 'SUZUKI', '192898', '211AKSA', '1919199', '1262762', 'HONDA', 'MATIC', '2016', 'Merah', 'Bagues putra', '', NULL, '', NULL),
('KND-00003', 'DA3728AL', 'SUZUKI', '109209', '21JSIA873', '102083', '89389389', 'SUZUKI', 'MATIC', '2019', 'HIJAU', 'Bagues putra', '22.02.2179', '2022-03-15 12:39:36', '22.02.2179', '2022-03-15 12:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `ms_sa`
--

CREATE TABLE `ms_sa` (
  `kd_sa` varchar(25) NOT NULL,
  `nama_sa` varchar(255) NOT NULL,
  `created_by` varchar(35) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(35) NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_sa`
--

INSERT INTO `ms_sa` (`kd_sa`, `nama_sa`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('SA-0001', 'ZULKIPLI', '', NULL, '', NULL),
('SA-0002', 'AHYATNOOR', '', NULL, '', NULL),
('SA-0003', 'HAYATINISA', '', NULL, '', NULL),
('SA-0004', 'GUSTI NANDA', '22.02.2179', '2022-03-15 12:53:02', '22.02.2179', '2022-03-15 12:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `tr_spk`
--

CREATE TABLE `tr_spk` (
  `no_est` varchar(20) NOT NULL,
  `no_spk` varchar(20) NOT NULL,
  `tgl_spk` date NOT NULL,
  `tipe` varchar(25) NOT NULL,
  `kd_kendaraan` varchar(10) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `kd_sa` varchar(15) NOT NULL,
  `kd_fm` varchar(15) NOT NULL,
  `vendor` varchar(25) NOT NULL,
  `mulai` date NOT NULL,
  `akhir` date NOT NULL,
  `kd_customer` varchar(25) NOT NULL,
  `kd_asuransi` varchar(25) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_by` varchar(35) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(35) NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tr_spk`
--

INSERT INTO `tr_spk` (`no_est`, `no_spk`, `tgl_spk`, `tipe`, `kd_kendaraan`, `pekerjaan`, `jenis`, `kd_sa`, `kd_fm`, `vendor`, `mulai`, `akhir`, `kd_customer`, `kd_asuransi`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('EST-22-000001', '', '2022-02-24', '', 'KND-00002', 'Perbaikan lampu', 'Perbaikan ', 'SA-0002', 'FM-0003', 'MITRA SUZUKI', '2022-02-24', '2022-02-28', 'CST-0001', 'INS_WHT_00', 'Estimasi', '', NULL, '', NULL),
('EST-22-000002', '', '2022-03-11', '', 'KND-00002', 'jh', 'jhlf', 'SA-0003', 'FM-0002', 'Mitra', '2022-03-11', '2022-03-27', 'CST-0002', 'INS_WWG_00', 'Estimasi', '', NULL, '21.07.2048', '2022-03-16 15:15:59'),
('EST-22-000003', 'SPK-22-000001', '2022-03-11', '', 'KND-00002', 'wes', 'rer', 'SA-0001', 'FM-0003', 'Mitra', '2022-03-11', '2022-03-24', 'CST-0002', 'INS_WHT_00', 'Finish', '', NULL, '', NULL),
('EST-22-000004', '', '2022-03-13', 'as', '2323', 'wwewe', 'wee', 'SA-0001', 'FM-0001', 'mitra', '2022-03-14', '2022-03-24', 'CST-0001', '	 INS_WHT_00', 'Estimasi', '', NULL, '', NULL),
('EST-22-000005', 'SPK-22-000002', '2022-03-13', '', 'KND-00002', 'dd', 'dd', 'SA-0001', 'FM-0003', 'Mitra', '2022-03-13', '2022-03-27', 'CST-0002', 'INS_WWG_00', 'Finish', '', NULL, '', NULL),
('EST-22-000006', '', '2022-03-15', '', 'KND-00003', 'dedede', 'dedede', 'SA-0004', 'FM-0004', 'Mitra', '2022-03-15', '2022-03-30', 'CST-0001', 'INS_ASM_00', 'Estimasi', '', NULL, '', NULL),
('EST-22-000007', 'SPK-22-000003', '2022-03-15', '', 'KND-00003', 'dsdsds', 'sdsdsds', 'SA-0004', 'FM-0004', 'Mitra', '2022-03-15', '2022-03-30', 'CST-0003', 'x', 'SPK', '', NULL, '', NULL),
('EST-22-000008', '', '2022-03-15', '', 'KND-00003', 'aaaa', 'ssss', 'SA-0004', 'FM-0004', 'Mitra', '2022-03-15', '2022-03-30', 'CST-0002', 'INS_ZRH_00', 'Estimasi', '', NULL, '', NULL),
('EST-22-000009', '', '2022-03-15', '', 'KND-00003', 'assas', 'sasas', 'SA-0003', 'FM-0004', 'Mitra', '2022-03-15', '2022-03-30', 'CST-0001', 'INS_ZRH_00', 'Estimasi', '', NULL, '', NULL),
('EST-22-000010', 'SPK-22-000004', '2022-03-15', '', 'KND-00003', '32222222', '3333333', 'SA-0003', 'FM-0002', 'Mitra', '2022-03-15', '2022-03-31', 'CST-0003', 'INS_WWG_00', 'Tarik Body', '', NULL, '', NULL),
('EST-22-000011', '', '2022-03-15', '', 'KND-00003', 'd', 'd', 'SA-0004', 'FM-0002', 'Mitra', '2022-03-15', '2022-04-01', 'CST-0003', 'INS_WHT_00', 'Estimasi', '', NULL, '', NULL),
('EST-22-000012', '', '2022-03-15', '', 'KND-00003', 'sss', 'ssss', 'SA-0004', 'FM-0004', 'Mitra', '2022-03-15', '2022-03-30', 'CST-0002', 'INS_ZRH_00', 'Estimasi', '', NULL, '', NULL),
('EST-22-000013', '', '2022-03-15', '', 'KND-00003', 'sddd', 'ddd', 'SA-0004', 'FM-0003', 'Mitra', '2022-03-15', '2022-03-30', 'CST-0003', 'INS_ZRH_00', 'Estimasi', '', NULL, '', NULL),
('EST-22-000014', '', '2022-03-15', '', 'KND-00003', 'kkk', 'kkkk', 'SA-0004', 'FM-0003', 'Mitra', '2022-03-15', '2022-03-31', 'CST-0003', 'INS_WWG_00', 'Estimasi', '', NULL, '', NULL),
('EST-22-000015', '', '2022-03-15', '', 'KND-00002', 'zxxz', 'xzxzx', 'SA-0003', 'FM-0004', 'Mitra', '2022-03-15', '2022-03-31', 'CST-0004', 'INS_WWG_00', 'Estimasi', '', NULL, '', NULL),
('EST-22-000016', '', '2022-03-15', '', 'KND-00003', 'snmnmnm', 'mnmnm', 'SA-0003', 'FM-0003', 'Mitra', '2022-03-15', '2022-03-31', 'CST-0002', 'INS_WHT_00', 'Estimasi', '', NULL, '', NULL),
('EST-22-000017', '', '2022-03-16', '', 'KND-00002', 'cxcxcx', 'cxcxcw23', 'SA-0003', 'FM-0004', 'Mitra', '2022-03-16', '2022-03-31', 'CST-0001', 'INS_WWG_00', 'Estimasi', '22.02.2179', '2022-03-16 11:39:35', '21.07.2048', '2022-03-16 12:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `tr_spk_detail`
--

CREATE TABLE `tr_spk_detail` (
  `kd_detail` varchar(20) NOT NULL,
  `no_spk` varchar(20) NOT NULL,
  `kd_jenis` varchar(25) NOT NULL,
  `jumlah` decimal(10,0) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `diskon` varchar(10) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `created_by` varchar(35) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(35) NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tr_spk_detail`
--

INSERT INTO `tr_spk_detail` (`kd_detail`, `no_spk`, `kd_jenis`, `jumlah`, `harga`, `diskon`, `total`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('D-0001', 'EST-22-000001', 'JS-0001', '2', '300000', '', '600000', '', NULL, '', NULL),
('D-0007', 'EST-22-000001', 'JS-0003', '2', '900000', '', '1800000', '', NULL, '', NULL),
('D-0008', 'EST-22-000003', 'JS-0003', '2', '900000', '15', '1530000', '', NULL, '', NULL),
('D-0009', 'EST-22-000003', 'JS-0002', '3', '500000', '10', '1350000', '', NULL, '', NULL),
('D-0010', 'EST-22-000005', 'JS-0002', '2', '500000', '0', '1000000', '', NULL, '', NULL),
('D-0011', 'EST-22-000005', 'JS-0003', '2', '900000', '12', '1584000', '', NULL, '', NULL),
('D-0012', 'EST-22-000002', 'JS-0004', '5', '35000', '0', '175000', '', NULL, '', NULL),
('D-0013', 'EST-22-000002', 'JS-0005', '2', '67000', '12', '117920', '', NULL, '', NULL),
('D-0014', 'EST-22-000003', 'JS-0004', '1', '35000', '0', '35000', '', NULL, '', NULL),
('D-0016', 'EST-22-000001', 'JS-0004', '2', '35000', '0', '70000', '', NULL, '', NULL),
('D-0017', 'EST-22-000017', 'JS-0004', '2', '35000', '0', '70000', '22.02.2179', '2022-03-16 11:43:27', '22.02.2179', '2022-03-16 11:43:27'),
('D-0018', 'EST-22-000017', 'JS-0005', '2', '67000', '0', '134000', '21.07.2048', '2022-03-16 11:44:48', '21.07.2048', '2022-03-16 11:44:48'),
('D-0019', 'EST-22-000002', 'JS-0006', '1', '780000', '0', '780000', '21.07.2048', '2022-03-16 12:47:21', '21.07.2048', '2022-03-16 12:47:21'),
('D-0020', 'EST-22-000002', 'JS-0005', '2', '67000', '0', '134000', '21.07.2048', '2022-03-16 14:00:01', '21.07.2048', '2022-03-16 14:00:01'),
('D-0021', 'EST-22-000002', 'JS-0006', '1', '780000', '0', '780000', '21.07.2048', '2022-03-16 14:00:32', '21.07.2048', '2022-03-16 14:00:32'),
('D-0022', 'EST-22-000002', 'JS-0005', '5', '67000', '0', '335000', '21.07.2048', '2022-03-16 14:08:57', '21.07.2048', '2022-03-16 14:08:57'),
('D-0023', 'EST-22-000002', 'JS-0005', '1', '67000', '0', '67000', '21.07.2048', '2022-03-16 14:15:33', '21.07.2048', '2022-03-16 14:15:33'),
('D-0024', 'EST-22-000002', 'JS-0004', '2', '35000', '0', '70000', '21.07.2048', '2022-03-16 14:19:17', '21.07.2048', '2022-03-16 14:19:17'),
('D-0025', 'EST-22-000002', 'JS-0006', '2', '780000', '10', '1404000', '21.07.2048', '2022-03-16 14:26:21', '21.07.2048', '2022-03-16 14:26:21'),
('D-0027', 'EST-22-000002', 'JS-0004', '5', '35000', '0', '175000', '21.07.2048', '2022-03-16 14:33:05', '21.07.2048', '2022-03-16 14:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`) VALUES
(1, 'Bagues Putra Tawaqqal', '22.02.2179', '22.02.2179', '1'),
(2, 'Kurnia Sandy Pratama', '21.07.2048', '21.07.2048', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ms_asuransi`
--
ALTER TABLE `ms_asuransi`
  ADD PRIMARY KEY (`kd_asuransi`);

--
-- Indexes for table `ms_customer`
--
ALTER TABLE `ms_customer`
  ADD PRIMARY KEY (`kd_customer`);

--
-- Indexes for table `ms_fm`
--
ALTER TABLE `ms_fm`
  ADD PRIMARY KEY (`kd_fm`);

--
-- Indexes for table `ms_jenis`
--
ALTER TABLE `ms_jenis`
  ADD PRIMARY KEY (`kd_jenis`);

--
-- Indexes for table `ms_kendaraan`
--
ALTER TABLE `ms_kendaraan`
  ADD PRIMARY KEY (`kd_kendaraan`);

--
-- Indexes for table `ms_sa`
--
ALTER TABLE `ms_sa`
  ADD PRIMARY KEY (`kd_sa`);

--
-- Indexes for table `tr_spk`
--
ALTER TABLE `tr_spk`
  ADD PRIMARY KEY (`no_est`);

--
-- Indexes for table `tr_spk_detail`
--
ALTER TABLE `tr_spk_detail`
  ADD PRIMARY KEY (`kd_detail`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
