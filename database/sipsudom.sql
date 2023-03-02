-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2022 at 04:01 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipsudom`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(10) NOT NULL,
  `nama_jurusan` varchar(50) DEFAULT NULL,
  `npak` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `npak`) VALUES
(5, 'Teknik Informatika', '1231'),
(7, 'Teknik Elektronika', '919191'),
(8, 'Teknik Mesin', '13111'),
(9, 'Teknik Listrik', '111121'),
(10, 'Teknik Pengendalian Pencemaran Lingkungan', '828282'),
(11, 'Pengembangan Produk Agroindustri', '9991');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `npm` char(9) NOT NULL,
  `nama_mahasiswa` varchar(50) DEFAULT NULL,
  `id_prodi` int(10) DEFAULT NULL,
  `id_jurusan` int(10) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `kelas` enum('A','B','C','D') DEFAULT NULL,
  `semester` int(2) DEFAULT NULL,
  `no_telepon` varchar(14) DEFAULT NULL,
  `status_mhs` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `nama_mahasiswa`, `id_prodi`, `id_jurusan`, `alamat`, `jenis_kelamin`, `kelas`, `semester`, `no_telepon`, `status_mhs`) VALUES
('019314', 'Micheal', 5, 7, 'jl bebas', 'Laki-Laki', 'C', 6, '085713344768', '1'),
('099009', 'Ujang Udin', 1, 5, 'Jl Juanda', 'Laki-Laki', 'C', 6, '085713344768', '0'),
('190202066', 'Amirrul Muwafaq', 1, 5, 'Jl. Juanda No 28', 'Laki-Laki', 'C', 6, '085713344768', '3'),
('1902131', 'udin123', 4, 8, 'jl aman', 'Laki-Laki', 'C', 6, '123141', '0'),
('912930132', 'Kurban Hewan', 5, 7, 'Jl Islam', 'Laki-Laki', 'B', 3, '12391241231', '0');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_meninggal`
--

CREATE TABLE `mahasiswa_meninggal` (
  `id` int(10) NOT NULL,
  `npm` char(9) DEFAULT NULL,
  `id_jurusan` int(10) DEFAULT NULL,
  `id_prodi` int(10) DEFAULT NULL,
  `tgl_pendataan` date DEFAULT NULL,
  `akta_kematian` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa_meninggal`
--

INSERT INTO `mahasiswa_meninggal` (`id`, `npm`, `id_jurusan`, `id_prodi`, `tgl_pendataan`, `akta_kematian`) VALUES
(21, '019314', 7, 5, '2022-09-15', 'TA_AMIRRUL MUWAFAQ-1-21 (1).pdf');

--
-- Triggers `mahasiswa_meninggal`
--
DELIMITER $$
CREATE TRIGGER `delete` AFTER DELETE ON `mahasiswa_meninggal` FOR EACH ROW update mahasiswa set mahasiswa.status_mhs = '0' where mahasiswa.npm=old.npm
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `npak` char(20) NOT NULL,
  `nama_pegawai` varchar(100) DEFAULT NULL,
  `jabatan` enum('Direktur','Bagian Jurusan','Ketua Jurusan TI','Ketua Jurusan TE','Ketua Jurusan TM','Koordinator TPPL','Koordinator TL','Koordinator PPA','Bagian Umum','Bagian Akademik','Bagian Keuangan','Administrator') DEFAULT NULL,
  `no_telepon` varchar(14) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `foto_pegawai` varchar(255) DEFAULT NULL,
  `ttd_pegawai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`npak`, `nama_pegawai`, `jabatan`, `no_telepon`, `email`, `username`, `password`, `foto_pegawai`, `ttd_pegawai`) VALUES
('01203123', 'Maman', 'Bagian Keuangan', '12123123', 'uang@gmail.com', 'uang', 'uang', 'qr.jpg', 'qr.jpg'),
('0191010', 'Amirrul', 'Administrator', '08912931312', 'udin@gmail.com', 'adam', 'adam', '', ''),
('1111', 'Udianto', 'Ketua Jurusan TI', '123123123', 'kajurti@gmail.com', 'kajurti', 'kajurti', 'qr.jpg', 'qr.jpg'),
('111121', 'Koor TL', 'Koordinator TL', '32112', 'koortl@gmail.com', 'koortl', 'koortl', 'qr.jpg', 'qr.jpg'),
('1231', 'Amirrul', 'Administrator', '085713344768', 'admin@gmail.com', 'admin', 'admin', 'qr.JPG', 'banner keyvisual_VSGA-01.png'),
('12311', 'udin', 'Bagian Umum', '021201', 'yurnero080902@gmail.com', 'umum', 'umum', 'banner keyvisual_VSGA-01.png', 'qr.JPG'),
('1238128412', 'Wahyu Nur Hidayat', 'Direktur', '412312', 'direktur@gmail.com', 'direktur', 'direktur', 'qr.jpg', 'qr.jpg'),
('12391294', 'Jurusan', 'Bagian Jurusan', '213131', 'jurusan@gmail.com', 'jurusan', 'jurusan', 'qr.jpg', 'qr.jpg'),
('12931284', 'BAAK', 'Bagian Akademik', '321123', 'baak@gmail.com', 'baak', 'baak', 'qr.jpg', 'qr.jpg'),
('13111', 'KAJUR TM', 'Ketua Jurusan TM', '1231', 'kajurtm@gmail.com', 'kajurtm', 'kajurtm', 'qr.jpg', 'qr.jpg'),
('828282', 'KOOR TPPL', 'Koordinator TPPL', '21391919', 'koortppl@gmail.com', 'koortppl', 'koortppl', 'qr.jpg', 'qr.jpg'),
('919191', 'KAJUR TE', 'Ketua Jurusan TE', '12312313', 'kajurte@gmail.com', 'kajurte', 'kajurte', 'qr.jpg', 'qr.jpg'),
('9991', 'KOOR PPA', 'Koordinator PPA', '11221', 'koorppa@gmail.com', 'koorppa', 'koorppa', 'qr.jpg', 'qr.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(10) NOT NULL,
  `nama_prodi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`) VALUES
(1, 'D3 Teknik Informatika'),
(4, 'D3 Teknik Mesin'),
(5, 'D3 Teknik Elektronika'),
(6, 'D4 Teknik Listrik'),
(7, 'D4 Teknik Pengendalian Pencemaran Linkungan'),
(8, 'D4 ');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan`
--

CREATE TABLE `surat_keterangan` (
  `id_sk` int(10) NOT NULL,
  `id_sp` int(10) DEFAULT NULL,
  `npm` char(9) DEFAULT NULL,
  `id_prodi` int(10) DEFAULT NULL,
  `status` char(5) DEFAULT NULL,
  `no_sk` varchar(30) DEFAULT NULL,
  `tahun_akademik` varchar(10) DEFAULT NULL,
  `tgl_sk` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_keterangan`
--

INSERT INTO `surat_keterangan` (`id_sk`, `id_sp`, `npm`, `id_prodi`, `status`, `no_sk`, `tahun_akademik`, `tgl_sk`) VALUES
(13, 50, '190202066', 1, '1', '12/AC/ID', '2021/2022', '2022-09-15');

--
-- Triggers `surat_keterangan`
--
DELIMITER $$
CREATE TRIGGER `delete_sk` AFTER DELETE ON `surat_keterangan` FOR EACH ROW update mahasiswa set mahasiswa.status_mhs = '2' where mahasiswa.npm=old.npm
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `surat_pengajuan`
--

CREATE TABLE `surat_pengajuan` (
  `id_sp` int(10) NOT NULL,
  `no_sp` varchar(40) DEFAULT NULL,
  `npm` char(9) DEFAULT NULL,
  `npak` char(20) DEFAULT NULL,
  `id_jurusan` int(10) DEFAULT NULL,
  `id_prodi` int(10) DEFAULT NULL,
  `alasan` varchar(255) DEFAULT NULL,
  `no_surat_pemanggilan` varchar(40) DEFAULT NULL,
  `tgl_pengajuan` date DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `surat_pemanggilan_ortu` varchar(255) DEFAULT NULL,
  `berita_acara` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_pengajuan`
--

INSERT INTO `surat_pengajuan` (`id_sp`, `no_sp`, `npm`, `npak`, `id_jurusan`, `id_prodi`, `alasan`, `no_surat_pemanggilan`, `tgl_pengajuan`, `status`, `surat_pemanggilan_ortu`, `berita_acara`) VALUES
(50, '12314/AVN', '190202066', '1231', 5, 1, 'Nilai', '', '2022-09-15', '3', '', 'TA_AMIRRUL MUWAFAQ-22-28.pdf');

--
-- Triggers `surat_pengajuan`
--
DELIMITER $$
CREATE TRIGGER `delete_sp` AFTER DELETE ON `surat_pengajuan` FOR EACH ROW update mahasiswa set mahasiswa.status_mhs = '0' where mahasiswa.npm=old.npm
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_jurusan`
-- (See below for the actual view)
--
CREATE TABLE `v_jurusan` (
`id_jurusan` int(10)
,`nama_jurusan` varchar(50)
,`npak` char(20)
,`nama_pegawai` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_mahasiswa`
-- (See below for the actual view)
--
CREATE TABLE `v_mahasiswa` (
`npm` char(9)
,`nama_mahasiswa` varchar(50)
,`id_prodi` int(10)
,`nama_prodi` varchar(50)
,`id_jurusan` int(10)
,`nama_jurusan` varchar(50)
,`npak` char(20)
,`nama_pegawai` varchar(100)
,`alamat` varchar(255)
,`jenis_kelamin` enum('Laki-Laki','Perempuan')
,`kelas` enum('A','B','C','D')
,`semester` int(2)
,`no_telepon` varchar(14)
,`status_mhs` varchar(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_mm`
-- (See below for the actual view)
--
CREATE TABLE `v_mm` (
`id` int(10)
,`npm` char(9)
,`nama_mahasiswa` varchar(50)
,`status_mhs` varchar(1)
,`alamat` varchar(255)
,`jenis_kelamin` enum('Laki-Laki','Perempuan')
,`id_jurusan` int(10)
,`nama_jurusan` varchar(50)
,`id_prodi` int(10)
,`nama_prodi` varchar(50)
,`tgl_pendataan` date
,`akta_kematian` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_sk`
-- (See below for the actual view)
--
CREATE TABLE `v_sk` (
`id_sk` int(10)
,`id_sp` int(10)
,`no_sp` varchar(40)
,`tgl_pengajuan` date
,`npm` char(9)
,`nama_mahasiswa` varchar(50)
,`kelas` enum('A','B','C','D')
,`semester` int(2)
,`status_mhs` varchar(1)
,`id_prodi` int(10)
,`nama_prodi` varchar(50)
,`status` char(5)
,`no_sk` varchar(30)
,`tahun_akademik` varchar(10)
,`tgl_sk` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_sp`
-- (See below for the actual view)
--
CREATE TABLE `v_sp` (
`id_sp` int(10)
,`no_sp` varchar(40)
,`npm` char(9)
,`nama_mahasiswa` varchar(50)
,`status_mhs` varchar(1)
,`npak` char(20)
,`nama_pegawai` varchar(100)
,`ttd_pegawai` varchar(255)
,`id_jurusan` int(10)
,`nama_jurusan` varchar(50)
,`id_prodi` int(10)
,`nama_prodi` varchar(50)
,`alasan` varchar(255)
,`no_surat_pemanggilan` varchar(40)
,`tgl_pengajuan` date
,`status` varchar(1)
,`surat_pemanggilan_ortu` varchar(255)
,`berita_acara` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `v_jurusan`
--
DROP TABLE IF EXISTS `v_jurusan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jurusan`  AS SELECT `a`.`id_jurusan` AS `id_jurusan`, `a`.`nama_jurusan` AS `nama_jurusan`, `b`.`npak` AS `npak`, `b`.`nama_pegawai` AS `nama_pegawai` FROM (`jurusan` `a` join `pegawai` `b`) WHERE `a`.`npak` = `b`.`npak``npak`  ;

-- --------------------------------------------------------

--
-- Structure for view `v_mahasiswa`
--
DROP TABLE IF EXISTS `v_mahasiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mahasiswa`  AS SELECT `a`.`npm` AS `npm`, `a`.`nama_mahasiswa` AS `nama_mahasiswa`, `b`.`id_prodi` AS `id_prodi`, `b`.`nama_prodi` AS `nama_prodi`, `c`.`id_jurusan` AS `id_jurusan`, `c`.`nama_jurusan` AS `nama_jurusan`, `c`.`npak` AS `npak`, `c`.`nama_pegawai` AS `nama_pegawai`, `a`.`alamat` AS `alamat`, `a`.`jenis_kelamin` AS `jenis_kelamin`, `a`.`kelas` AS `kelas`, `a`.`semester` AS `semester`, `a`.`no_telepon` AS `no_telepon`, `a`.`status_mhs` AS `status_mhs` FROM ((`mahasiswa` `a` join `prodi` `b`) join `v_jurusan` `c`) WHERE `a`.`id_prodi` = `b`.`id_prodi` AND `a`.`id_jurusan` = `c`.`id_jurusan``id_jurusan`  ;

-- --------------------------------------------------------

--
-- Structure for view `v_mm`
--
DROP TABLE IF EXISTS `v_mm`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mm`  AS SELECT `a`.`id` AS `id`, `b`.`npm` AS `npm`, `b`.`nama_mahasiswa` AS `nama_mahasiswa`, `b`.`status_mhs` AS `status_mhs`, `b`.`alamat` AS `alamat`, `b`.`jenis_kelamin` AS `jenis_kelamin`, `c`.`id_jurusan` AS `id_jurusan`, `c`.`nama_jurusan` AS `nama_jurusan`, `d`.`id_prodi` AS `id_prodi`, `d`.`nama_prodi` AS `nama_prodi`, `a`.`tgl_pendataan` AS `tgl_pendataan`, `a`.`akta_kematian` AS `akta_kematian` FROM (((`mahasiswa_meninggal` `a` join `mahasiswa` `b`) join `jurusan` `c`) join `prodi` `d`) WHERE `a`.`npm` = `b`.`npm` AND `a`.`id_jurusan` = `c`.`id_jurusan` AND `a`.`id_prodi` = `d`.`id_prodi``id_prodi`  ;

-- --------------------------------------------------------

--
-- Structure for view `v_sk`
--
DROP TABLE IF EXISTS `v_sk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_sk`  AS SELECT `a`.`id_sk` AS `id_sk`, `b`.`id_sp` AS `id_sp`, `b`.`no_sp` AS `no_sp`, `b`.`tgl_pengajuan` AS `tgl_pengajuan`, `c`.`npm` AS `npm`, `c`.`nama_mahasiswa` AS `nama_mahasiswa`, `c`.`kelas` AS `kelas`, `c`.`semester` AS `semester`, `c`.`status_mhs` AS `status_mhs`, `d`.`id_prodi` AS `id_prodi`, `d`.`nama_prodi` AS `nama_prodi`, `a`.`status` AS `status`, `a`.`no_sk` AS `no_sk`, `a`.`tahun_akademik` AS `tahun_akademik`, `a`.`tgl_sk` AS `tgl_sk` FROM (((`surat_keterangan` `a` join `surat_pengajuan` `b`) join `mahasiswa` `c`) join `prodi` `d`) WHERE `a`.`id_sp` = `b`.`id_sp` AND `a`.`npm` = `c`.`npm` AND `a`.`id_prodi` = `d`.`id_prodi``id_prodi`  ;

-- --------------------------------------------------------

--
-- Structure for view `v_sp`
--
DROP TABLE IF EXISTS `v_sp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_sp`  AS SELECT `a`.`id_sp` AS `id_sp`, `a`.`no_sp` AS `no_sp`, `b`.`npm` AS `npm`, `b`.`nama_mahasiswa` AS `nama_mahasiswa`, `b`.`status_mhs` AS `status_mhs`, `c`.`npak` AS `npak`, `c`.`nama_pegawai` AS `nama_pegawai`, `c`.`ttd_pegawai` AS `ttd_pegawai`, `d`.`id_jurusan` AS `id_jurusan`, `d`.`nama_jurusan` AS `nama_jurusan`, `e`.`id_prodi` AS `id_prodi`, `e`.`nama_prodi` AS `nama_prodi`, `a`.`alasan` AS `alasan`, `a`.`no_surat_pemanggilan` AS `no_surat_pemanggilan`, `a`.`tgl_pengajuan` AS `tgl_pengajuan`, `a`.`status` AS `status`, `a`.`surat_pemanggilan_ortu` AS `surat_pemanggilan_ortu`, `a`.`berita_acara` AS `berita_acara` FROM ((((`surat_pengajuan` `a` join `mahasiswa` `b`) join `pegawai` `c`) join `jurusan` `d`) join `prodi` `e`) WHERE `a`.`npm` = `b`.`npm` AND `a`.`npak` = `c`.`npak` AND `a`.`id_jurusan` = `d`.`id_jurusan` AND `a`.`id_prodi` = `e`.`id_prodi``id_prodi`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `jurusan_ibfk_2` (`npak`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `mahasiswa_meninggal`
--
ALTER TABLE `mahasiswa_meninggal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `npm` (`npm`),
  ADD KEY `mahasiswa_meninggal_ibfk_2` (`id_jurusan`),
  ADD KEY `mahasiswa_meninggal_ibfk_3` (`id_prodi`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`npak`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `surat_keterangan`
--
ALTER TABLE `surat_keterangan`
  ADD PRIMARY KEY (`id_sk`),
  ADD KEY `id_sp` (`id_sp`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `npm` (`npm`);

--
-- Indexes for table `surat_pengajuan`
--
ALTER TABLE `surat_pengajuan`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `npm` (`npm`),
  ADD KEY `surat_pengajuan_ibfk_3` (`id_jurusan`),
  ADD KEY `surat_pengajuan_ibfk_2` (`npak`),
  ADD KEY `surat_pengajuan_ibfk_4` (`id_prodi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mahasiswa_meninggal`
--
ALTER TABLE `mahasiswa_meninggal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `surat_keterangan`
--
ALTER TABLE `surat_keterangan`
  MODIFY `id_sk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `surat_pengajuan`
--
ALTER TABLE `surat_pengajuan`
  MODIFY `id_sp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_2` FOREIGN KEY (`npak`) REFERENCES `pegawai` (`npak`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`),
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Constraints for table `mahasiswa_meninggal`
--
ALTER TABLE `mahasiswa_meninggal`
  ADD CONSTRAINT `mahasiswa_meninggal_ibfk_1` FOREIGN KEY (`npm`) REFERENCES `mahasiswa` (`npm`),
  ADD CONSTRAINT `mahasiswa_meninggal_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `mahasiswa_meninggal_ibfk_3` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `surat_keterangan`
--
ALTER TABLE `surat_keterangan`
  ADD CONSTRAINT `surat_keterangan_ibfk_1` FOREIGN KEY (`id_sp`) REFERENCES `surat_pengajuan` (`id_sp`),
  ADD CONSTRAINT `surat_keterangan_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`),
  ADD CONSTRAINT `surat_keterangan_ibfk_3` FOREIGN KEY (`npm`) REFERENCES `mahasiswa` (`npm`);

--
-- Constraints for table `surat_pengajuan`
--
ALTER TABLE `surat_pengajuan`
  ADD CONSTRAINT `surat_pengajuan_ibfk_1` FOREIGN KEY (`npm`) REFERENCES `mahasiswa` (`npm`),
  ADD CONSTRAINT `surat_pengajuan_ibfk_2` FOREIGN KEY (`npak`) REFERENCES `pegawai` (`npak`),
  ADD CONSTRAINT `surat_pengajuan_ibfk_3` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `surat_pengajuan_ibfk_4` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
