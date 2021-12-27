-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2021 at 04:07 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sppd`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `IdPegawai` int(7) NOT NULL,
  `NIP` varchar(21) DEFAULT NULL,
  `Nama` varchar(40) DEFAULT NULL,
  `Golongan` text DEFAULT NULL,
  `tmt` date DEFAULT NULL,
  `jabatan` text DEFAULT NULL,
  `pendidikanT` varchar(5) DEFAULT NULL,
  `jurusan` text DEFAULT NULL,
  `univ` text DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `jenis` enum('PNS','Non PNS') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`IdPegawai`, `NIP`, `Nama`, `Golongan`, `tmt`, `jabatan`, `pendidikanT`, `jurusan`, `univ`, `ket`, `jenis`) VALUES
(1, '19690201 198803 1 003', 'RUDI, SE', 'IVc', '2020-04-01', 'Kepala Dinas', 'S-1', 'Manajemen', 'STIE Dharma Agung Bandung', NULL, 'PNS'),
(2, '19750502 199311 1 003', 'NUR CAHYONO, AP', 'IVb', '2020-01-04', 'Sekretaris Dinas', 'D-IV', 'Ahli Pemerintahan', 'STPDN', NULL, 'PNS'),
(3, '19660316 199302 2 001', 'NENIH ANZALA LAELAWATI, S.IP', 'IIId', '2020-01-10', 'Kasubag Umum dan Kepegawaian', 'S-1', 'Ilmu Administrasi Negara', 'UNIGAL Ciamis', NULL, 'PNS'),
(4, '19731224 200701 2 002', 'YANI HERYANI, S.AP', 'IIIa', '2019-01-10', 'Analis Sumber Daya Manusia Aparatur', 'S-1', 'Ilmu Administrasi Negara', 'UNIGAL Ciamis', NULL, 'PNS'),
(5, '19781116 200901 1 004', 'EDI MUHAMAD AL HIDAYAH, A.Ma', 'IId', '2019-01-04', 'Pengadministrasi Umum', 'D-2', 'PGSD', 'IAILM Suryalaya Tasikmalaya', NULL, 'PNS'),
(6, '19710107 199603 2 002', 'IIS JANUARTY, SE', 'IIId', '2005-01-10', 'Kasubag Keuangan', 'S-1', 'Manajemen Personalia', 'IKOPIN Bandung', NULL, 'PNS'),
(7, '19641209 198603 2 006', 'IIS HUSNUL CHOTIMAH', 'IIIb', '2005-01-10', 'Pengadministrasi Keuangan', 'SMEA', 'Tata Niaga', 'SMEA HEPWETI Ciamis', NULL, 'PNS'),
(8, '19740527 200901 1 001', 'IWAN RIDWAN, ST', 'IIIa', '2018-01-04', 'Pengelola Keuangan', 'S-1', 'Teknik Industri', 'UNIGAL Ciamis', NULL, 'PNS'),
(9, '19681114 199403 1 006', 'YOGAS NURYADI, SH', 'IIId', '2019-01-04', 'Kasubag Perencanaan', 'S-1', 'Ilmu Hukum', 'UNIGAL Ciamis', NULL, 'PNS'),
(10, '19700611 200003 1 004', 'DARYANA, S.IP', 'IIIa', '2019-01-10', 'Penyusun Program Anggaran dan Pelaporan', 'S-1', 'Ilmu Pemerintahan', 'UNIGAL Ciamis', NULL, 'PNS'),
(11, '19640519 198902 2 003', 'Dra. IKE MESTIKAYATI', 'IVa', '2009-12-04', 'Kabid Pelayanan Perizinan', 'S-1', 'Pekerjaan Sosial', 'STKS Bandung', NULL, 'PNS'),
(12, '19771002 200801 1 003', 'BUDI HERDIMAN, ST', 'IIIc', '2021-01-04', 'Kasi Verifikasi dan Penetapan', 'S-1', 'Teknik Sipil', 'UNIGAL Ciamis', NULL, 'PNS'),
(13, '19650323 198903 2 007', 'Hj. TATI ROHAETI, S.IP', 'IIId', '2018-01-04', 'Analis Dokumen Perizinan', 'S-1', 'Ilmu Pemerintahan', 'UNIGAL Ciamis', NULL, 'PNS'),
(14, '19640411 198812 2 001', 'SITI JENAB, SH', 'IIId', '2018-01-10', 'Pengelola Dokumen Perizinan', 'S-1', 'Ilmu Hukum', 'UNIGAL Ciamis', NULL, 'PNS'),
(15, '19710529 200701 2 003', 'INA SURYANI, S.IP', 'IIIb', '2020-01-10', 'Analis Dokumen Perizinan', 'S-1', 'Ilmu Administrasi Negara', 'UNIGAL Ciamis', NULL, 'PNS'),
(16, '19930106 202012 1 003', 'TAUFAN IHSAN YANUAR, SH', 'IIIa', '2020-01-12', 'Pelaksana', 'S-1', 'Ilmu Hukum', 'UNIGAL Ciamis', NULL, 'PNS'),
(17, '19930509 202012 2 006', 'SEFIRA SALSABILA ARIFAH, SH', 'IIIa', '2020-01-12', 'Pelaksana', 'S-1', 'Ilmu Hukum', 'UIN Sunan Gunung Djati Bandung', NULL, 'PNS'),
(18, '19730221 200701 1 006', 'EKA GUMELAR, S.IP, MM', 'IIIb', '2018-01-04', 'Kasi Dokumentasi dan Data', 'S-2', 'Manajemen Pemerintahan Daerah', 'UNIGAL Ciamis', NULL, 'PNS'),
(19, '19700802 199403 2 005', 'CICIH DARSIH, S.IP', 'IIIc', '2018-01-04', 'Pengelola Pemberi Ketatalaksanaan Pelayanan Perizinan', 'S-1', 'Ilmu Administrasi Negara', 'UNIGAL Ciamis', NULL, 'PNS'),
(20, '19760917 200212 1 006', 'YUDI WAHYUDI, S.Sos, MM', 'IVa', '2018-01-04', 'Kabid Penanaman Modal', 'S-2', 'Manajemen Pemerintahan', 'UNIGAL Ciamis', NULL, 'PNS'),
(21, '19830120 200112 1 003', 'TIGIN ARY GINANJAR, S.STP', 'IVa', '2020-01-04', 'Kasi Perencanaan dan Pengembangan Investasi', 'S-2', 'Manajemen', 'UNSIL Tasikmalaya', NULL, 'PNS'),
(22, '19640504 199112 1 001', 'H. AGUS YOSEP, S.Sos, MM', 'IVa', '2015-01-04', 'Kasi Pengendalian dan Promosi', 'S-2', 'Manajemen Pendidikan', 'STIE - ISM Jakarta', NULL, 'PNS'),
(23, '19631128 198303 2 007', 'NONOK NURHAYATI', 'IIIb', '2003-01-10', 'Pengadministrasi Program dan Kerjasama', 'SMA', 'IPS', 'SMA PGRI Ciamis', NULL, 'PNS'),
(24, '19770308 200604 1 002', 'YOYONG SOPYAN, SH, MH', 'IVa', '2020-01-04', 'Kabid Pengaduan dan Advokasi', 'S-2', 'Ilmu Hukum', 'STIH IBLAM Jakarta', NULL, 'PNS'),
(25, '19750518 199503 1 003', 'ARMAN ASRULLAH MAMUN, S.KM, MM', 'IIId', '2018-01-04', 'Kasi Advokasi dan Pelaporan', 'S-2', 'Manajemen Sumber Daya Manusia', 'UNIGAL Ciamis', NULL, 'PNS'),
(26, '19690517 200701 2 006', 'IDA WIDANINGSIH, S.IP', 'IIIb', '2017-10-01', 'Penyusun Bahan Penerapan Standar Wajib dan Penanganan Pengaduan', 'S-1', 'Ilmu Administrasi Negara', 'UNIGAL Ciamis', NULL, 'PNS'),
(27, '19721012 200212 2 001', 'ELLY SRI KUDUS, SE, M.Si', 'IVa', '2018-10-01', 'Kasi Pengaduan dan Informasi', 'S-2', 'Manajemen Pemerintahan Daerah', 'UNIGAL Ciamis', NULL, 'PNS'),
(28, '19720801 200701 2 015', 'TITIN, SH', 'IIIc', '2021-04-01', 'Pengelola Pengaduan Publik', 'S-1', 'Ilmu Hukum', 'UNIGAL Ciamis', NULL, 'PNS'),
(29, 'Non PNS', 'ANDRI SUBARKAH, A.md', 'Non PNS', NULL, 'Non PNS', NULL, NULL, NULL, 'Unit kerja: Sekretariat', 'Non PNS'),
(30, 'Non PNS', 'HERYANTO,S.AP.', 'Non PNS', NULL, 'Non PNS', NULL, NULL, NULL, 'Unit kerja: Sekretariat', 'Non PNS'),
(31, 'Non PNS', 'EKAWANGI MAYANG SUNDA,SH.', 'Non PNS', NULL, 'Non PNS', NULL, NULL, NULL, 'Unit kerja: Sekretariat', 'Non PNS'),
(32, 'Non PNS', 'IQBAL NUGRAHA ILAHI', 'Non PNS', NULL, 'Non PNS', NULL, NULL, NULL, 'Unit kerja: Sekretariat', 'Non PNS'),
(33, 'Non PNS', 'EKARAHMAT', 'Non PNS', NULL, 'Non PNS', NULL, NULL, NULL, 'Unit kerja: Sekretariat', 'Non PNS'),
(34, 'Non PNS', 'ENDANG SUPARMAN', 'Non PNS', NULL, 'Non PNS', NULL, NULL, NULL, 'Unit kerja: Sekretariat', 'Non PNS'),
(35, 'Non PNS', 'IDA ARYANTI AGUSTIN S,IP.', 'Non PNS', NULL, 'Non PNS', NULL, NULL, NULL, 'Unit kerja: Sekretariat', 'Non PNS'),
(36, 'Non PNS', 'CUCU SURYATI,S.Sy.', 'Non PNS', NULL, 'Non PNS', NULL, NULL, NULL, 'Unit kerja: Bidang Pelayanan Perizinan', 'Non PNS'),
(37, 'Non PNS', 'ABDUL ROHMAN DIKDIK P', 'Non PNS', NULL, 'Non PNS', NULL, NULL, NULL, 'Unit kerja: Bidang Pelayanan Perizinan', 'Non PNS'),
(38, 'Non PNS', 'YENI RAHMAWATI, SE.', 'Non PNS', NULL, 'Non PNS', NULL, NULL, NULL, 'Unit kerja: Bidang Pelayanan Perizinan', 'Non PNS'),
(39, 'Non PNS', 'DEWI ROSTIKA,ST.', 'Non PNS', NULL, 'Non PNS', NULL, NULL, NULL, 'Unit kerja: Bidang Pelayanan Perizinan', 'Non PNS'),
(40, 'Non PNS', 'DWI AYU ARDIANTI,SP.', 'Non PNS', NULL, 'Non PNS', NULL, NULL, NULL, 'Unit kerja: Bidang Pelayanan Perizinan', 'Non PNS'),
(41, 'Non PNS', 'SYIFA NURUL QOLBI', 'Non PNS', NULL, 'Non PNS', NULL, NULL, NULL, 'Unit kerja: Bidang Pelayanan Perizinan', 'Non PNS'),
(42, 'Non PNS', 'MUHAMAD IRPAN, ST.', 'Non PNS', NULL, 'Non PNS', NULL, NULL, NULL, 'Unit kerja: Bidang Pelayanan Perizinan', 'Non PNS'),
(43, 'Non PNS', 'NANDAMAS SUJIWO', 'Non PNS', NULL, 'Non PNS', NULL, NULL, NULL, 'Unit kerja: Bidang Pelayanan Perizinan', 'Non PNS'),
(44, 'Non PNS', 'YAN PERMANA', 'Non PNS', NULL, 'Non PNS', NULL, NULL, NULL, 'Unit kerja: Bidang Penanaman Modal', 'Non PNS'),
(45, 'Non PNS', 'PIPIT NURJANAH, S.IP.', 'Non PNS', NULL, 'Non PNS', NULL, NULL, NULL, 'Unit kerja: Bidang Penanaman Modal', 'Non PNS'),
(46, 'Non PNS', 'SUPARTIKA, SE', 'Non PNS', NULL, 'Non PNS', NULL, NULL, NULL, 'Unit kerja: Bidang Pengaduan dan Advokasi', 'Non PNS'),
(47, 'Non PNS', 'ERLY MARLIADI', 'Non PNS', NULL, 'Non PNS', NULL, NULL, NULL, 'Unit kerja: Bidang Pengaduan dan Advokasi', 'Non PNS'),
(48, 'Non PNS', 'ANDI RIAWAN, ST', 'Non PNS', NULL, 'Non PNS', NULL, NULL, NULL, 'Unit kerja: Bidang Pengaduan dan Advokasi', 'Non PNS');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `IdPengguna` int(7) NOT NULL,
  `Username` varchar(21) DEFAULT NULL,
  `Pass` varchar(41) DEFAULT NULL,
  `baru` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`IdPengguna`, `Username`, `Pass`, `baru`) VALUES
(1, '196902011988031000', '*DFFC395BCADF0637A26BF5E65C6FA339B9110111', 1),
(2, '197505021993111000', '*0B78029427D7E78180A59CF139CB421CA70AC378', 1),
(11, '196405191989022000', '*ED6B1B09192DEF7BC344C1A9665E0646DBA11BC5', 1),
(20, '197609172002121000', '*CA67F37358EA34F02A03A1CB303BB75B0F4E3559', 1),
(24, '197703082006041000', '*92A6832B55ADA2F40ED8553B4EBB93621E3D5F17', 1),
(3, 'uziadmin', '*15ACB92A5597E4CA77384982690CDD976D18CD09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sppd`
--

CREATE TABLE `sppd` (
  `IdSPPD` int(12) NOT NULL,
  `TanggalBerangkat` date DEFAULT NULL,
  `Maksud` text DEFAULT NULL,
  `Angkut` text DEFAULT NULL,
  `TempBerangkat` text DEFAULT NULL,
  `TempTujuan` text DEFAULT NULL,
  `Lama` int(2) DEFAULT NULL,
  `Instansi` varchar(50) DEFAULT NULL,
  `KodeRek` varchar(16) DEFAULT NULL,
  `Keterangan` text DEFAULT NULL,
  `pejabatBerwenang` text DEFAULT 'Kepala Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kab. Ciamis',
  `TanggalKembali` date DEFAULT NULL,
  `Biaya` text DEFAULT NULL,
  `IdSPT` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `spt`
--

CREATE TABLE `spt` (
  `IdSPT` int(12) NOT NULL,
  `Dasar` text DEFAULT NULL,
  `Kepada` int(7) NOT NULL,
  `kepada2` int(7) DEFAULT NULL,
  `kepada3` int(7) DEFAULT NULL,
  `kepada4` int(7) DEFAULT NULL,
  `Untuk` text DEFAULT NULL,
  `Keterangan` text DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `NomorS` text DEFAULT NULL,
  `Verifikasi` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`IdPegawai`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD KEY `IdPengguna` (`IdPengguna`);

--
-- Indexes for table `sppd`
--
ALTER TABLE `sppd`
  ADD PRIMARY KEY (`IdSPPD`),
  ADD UNIQUE KEY `one_spt` (`IdSPT`);

--
-- Indexes for table `spt`
--
ALTER TABLE `spt`
  ADD PRIMARY KEY (`IdSPT`),
  ADD KEY `Kepada` (`Kepada`),
  ADD KEY `kepada2` (`kepada2`),
  ADD KEY `kepada3` (`kepada3`),
  ADD KEY `kepada4` (`kepada4`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `IdPegawai` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `sppd`
--
ALTER TABLE `sppd`
  MODIFY `IdSPPD` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spt`
--
ALTER TABLE `spt`
  MODIFY `IdSPT` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`IdPengguna`) REFERENCES `pegawai` (`IdPegawai`);

--
-- Constraints for table `sppd`
--
ALTER TABLE `sppd`
  ADD CONSTRAINT `sppd_ibfk_1` FOREIGN KEY (`IdSPT`) REFERENCES `spt` (`IdSPT`);

--
-- Constraints for table `spt`
--
ALTER TABLE `spt`
  ADD CONSTRAINT `spt_ibfk_1` FOREIGN KEY (`Kepada`) REFERENCES `pegawai` (`IdPegawai`),
  ADD CONSTRAINT `spt_ibfk_2` FOREIGN KEY (`kepada2`) REFERENCES `pegawai` (`IdPegawai`),
  ADD CONSTRAINT `spt_ibfk_3` FOREIGN KEY (`kepada3`) REFERENCES `pegawai` (`IdPegawai`),
  ADD CONSTRAINT `spt_ibfk_4` FOREIGN KEY (`kepada4`) REFERENCES `pegawai` (`IdPegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
