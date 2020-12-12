-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 12 Des 2020 pada 08.24
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_waket3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `beastudi`
--

CREATE TABLE `beastudi` (
  `beastudi_id` int(11) NOT NULL,
  `nama_id` int(11) DEFAULT NULL,
  `jk` varchar(45) DEFAULT NULL,
  `semester_id` int(11) NOT NULL,
  `angkatan` char(4) DEFAULT NULL,
  `programstudi_id` int(11) DEFAULT NULL,
  `pic_id` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `status` varchar(45) NOT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `tgl` varchar(45) DEFAULT NULL,
  `kontribusi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beastudi`
--

INSERT INTO `beastudi` (`beastudi_id`, `nama_id`, `jk`, `semester_id`, `angkatan`, `programstudi_id`, `pic_id`, `keterangan`, `status`, `kelas_id`, `tgl`, `kontribusi_id`) VALUES
(110, 96, 'Laki-Laki', 222, '1111', 2, 96, 'asdas', 'Sudah Kontribusi', 1, '23-12-2020', 2),
(115, 4, 'Laki-Laki', 5, '2018', 1, 1, 'asdas', 'Sudah Kontribusi', 1, '  23-10-2020', 1),
(125, 2, 'Laki-Laki', 5, '2018', 1, 1, 'tidak ada', 'Sudah Kontribusi', 1, '28-10-2020', 4),
(126, 4, 'Laki-Laki', 5, '2018', 1, 2, 'dasd', 'Sudah Kontribusi', 1, '28-10-2020', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dana`
--

CREATE TABLE `dana` (
  `id` int(11) NOT NULL,
  `nama_donatur` varchar(45) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `dana` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dana`
--

INSERT INTO `dana` (`id`, `nama_donatur`, `perusahaan`, `alamat`, `dana`) VALUES
(7, 'Aswar S.Kom', 'PLN', 'Jakarta Pusat', ' 23.123.423'),
(8, 'Zulkifli Jufri', 'Pertamina', 'Jakarta Pusat', ' 2.312.332'),
(14, 'Muhammad Ardiansyah', 'PLN Pusat', 'Jakarta Timur', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail`
--

CREATE TABLE `detail` (
  `detail_id` int(11) NOT NULL,
  `detail_beastudi_id` int(11) DEFAULT NULL,
  `detail_kontribusi_id` int(11) DEFAULT NULL,
  `detail_package_id` int(11) NOT NULL,
  `detail_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail`
--

INSERT INTO `detail` (`detail_id`, `detail_beastudi_id`, `detail_kontribusi_id`, `detail_package_id`, `detail_product_id`) VALUES
(87, 100, 6, 0, 0),
(88, 101, 3, 0, 0),
(89, 101, 4, 0, 0),
(90, 102, 4, 0, 0),
(91, 102, 5, 0, 0),
(92, 103, 6, 0, 0),
(93, 103, 7, 0, 0),
(94, 104, 3, 0, 0),
(95, 105, 5, 0, 0),
(96, 105, 6, 0, 0),
(97, 106, 6, 0, 0),
(98, 107, 6, 0, 0),
(100, 109, 3, 0, 0),
(101, 109, 4, 0, 0),
(102, 109, 6, 0, 0),
(103, 110, 2, 0, 0),
(104, 110, 4, 0, 0),
(120, 111, 2, 0, 0),
(121, 112, 4, 0, 0),
(122, 112, 5, 0, 0),
(123, NULL, NULL, 30, 2),
(124, NULL, NULL, 31, 1),
(125, NULL, NULL, 31, 2),
(126, NULL, NULL, 31, 3),
(127, NULL, NULL, 31, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_upload`
--

CREATE TABLE `file_upload` (
  `id` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`) VALUES
(1, 'Reguler Pagi'),
(2, 'Reguler Sore'),
(3, 'Kelas Karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontribusi`
--

CREATE TABLE `kontribusi` (
  `id` int(11) NOT NULL,
  `kontribusi` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kontribusi`
--

INSERT INTO `kontribusi` (`id`, `kontribusi`) VALUES
(1, 'Content'),
(2, 'Upload Content'),
(3, 'Website Developer'),
(4, 'Design Graphic'),
(5, 'Video Content'),
(6, 'LPPM'),
(7, 'Inkubator'),
(8, 'LPMI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telp` char(15) NOT NULL,
  `nim` char(10) NOT NULL,
  `kontribusi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `email`, `telp`, `nim`, `kontribusi_id`) VALUES
(2, 'Muhammad Ardiansyah', 'dianbugasbugas@gmail.com', '0895702213410', '0110218049', 4),
(4, 'Zulkifli', 'zulkiflijufri54@gmail.com', '0895702213410', '0110218049', 4),
(5, 'Bayu', 'bayu@gmail.com', '0895702213410', '0110218049', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(100) DEFAULT NULL,
  `package_created_at` datetime DEFAULT NULL,
  `jk` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `package`
--

INSERT INTO `package` (`package_id`, `package_name`, `package_created_at`, `jk`) VALUES
(1, 'asdsad', '2020-11-09 17:09:28', ''),
(2, 'asdas', '2020-11-09 17:09:46', ''),
(3, 'sadsa', '2020-11-09 17:11:39', ''),
(4, 'dasdas', '2020-11-09 17:16:51', ''),
(5, 'asdas', '2020-11-09 17:17:11', ''),
(6, 'aaa', '2020-11-09 17:32:58', ''),
(7, 'asdas', '2020-11-09 20:58:20', ''),
(8, 'asdas', '2020-11-09 20:58:56', ''),
(9, '222', '2020-11-09 21:13:24', ''),
(11, 's', '2020-11-09 21:55:14', ''),
(13, 'asdsad', '2020-11-14 09:59:22', ''),
(14, 'asdas', '2020-11-14 10:20:14', ''),
(15, 'asdas', '2020-11-14 10:20:25', ''),
(16, 'asdsad', '2020-11-14 10:23:48', ''),
(18, 'asdas', '2020-11-14 11:18:10', ''),
(20, 'asdsad', '2020-11-14 11:58:05', ''),
(21, 'asdas', '2020-11-14 12:09:37', ''),
(22, 'sssssssssss', '2020-11-14 12:12:48', 'dddddddd'),
(23, 'asdasssss', '2020-12-07 13:46:23', 'dasd'),
(24, 'asdaswwwww', '2020-12-07 14:19:15', 'dasd'),
(26, 'asdsadss', '2020-12-07 14:21:11', 'd'),
(27, 'asdas', '2020-12-07 14:24:07', 'dasd'),
(28, 'asdas', '2020-12-07 14:25:31', 'dasd'),
(29, 'aas', '2020-12-07 16:00:50', ''),
(30, 'asdas', '2020-12-10 12:41:18', ''),
(31, 'asdas', '2020-12-11 11:18:20', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pic`
--

CREATE TABLE `pic` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `divisi` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pic`
--

INSERT INTO `pic` (`id`, `nama`, `divisi`, `email`) VALUES
(1, 'Muhammad Teguh', 'waket3', 'teguh.kun@gmail.com'),
(2, 'Kerisna Panji', 'waket3', 'ardiansyahbugas@gmail.com'),
(3, 'Chandra', 'waket3', 'dianynf20@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`product_id`, `product_name`) VALUES
(1, 'uuuuuuuuu'),
(2, 'eeeeeeeeee'),
(3, 'Product 3'),
(4, 'Website Developer'),
(5, 'Design Graphic'),
(6, 'Video Content'),
(7, 'LPPM'),
(8, 'Inkubator'),
(9, 'LPMI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `programstudi`
--

CREATE TABLE `programstudi` (
  `id` int(11) NOT NULL,
  `programstudi` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `programstudi`
--

INSERT INTO `programstudi` (`id`, `programstudi`) VALUES
(1, 'Teknik Informatika'),
(2, 'Sistem Informasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `semester` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`id`, `semester`) VALUES
(1, 'Satu'),
(2, 'Dua'),
(3, 'Tiga'),
(4, 'Empat'),
(5, 'Lima'),
(6, 'Enam'),
(7, 'Tujuh'),
(8, 'Delapan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `gambar`) VALUES
(49, 'Admin Utama', 'admin@gmail.com', 'github2.png', '$2y$10$QWomy7..tQcVybft13OhrOEafIjvo4xXjo4.qfAs0K5yKwDlc/9qS', 1, 1, 0, 'ok.xlsx'),
(50, 'Chandra', 'dianynf20@gmail.com', 'default.jpg', '$2y$10$nruVeUAhhV.3EHuUp8JdteHfWZjHcnA5ae7lfjq4c.w6qNE5q9wDO', 3, 1, 1570108049, ''),
(55, 'PIC', 'muhammadardiyansyah889@gmail.com', 'default.jpg', '$2y$10$Pi4Vqkh3Wuy.bOw4j47kJehdS.DjpfjL.oR.2Ffr40mrbv2WXfFau', 2, 1, 0, ''),
(56, 'Muhammad Ardiansyah', 'ardiansyahbugas@gmail.com', 'default.jpg', '$2y$10$qCPwYStF0994cLLzZMJeSezLFyFtiXoZhBNpvsHoLqW8wTiLN4tHi', 3, 1, 0, ''),
(57, 'Teguh', 'teguh.kun@gmail.com', 'default.jpg', '$2y$10$xnEyBXZ7Bh8VyVTF9hj/Uu69Pn9ERwIFAmnTOpcDQ6vephm3kaDBy', 3, 1, 1575365396, ''),
(58, 'Muhammad Ardiansyah', 'zulkiflijufri54@gmail.com', 'default.jpg', '$2y$10$mV2JKayeif8564YNBFhxZOn95ODS9dGcRMN7aBBCkY64is/73p1be', 2, 1, 1603809866, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(12, 2, 12),
(16, 1, 13),
(22, 1, 5),
(23, 1, 6),
(29, 1, 7),
(30, 1, 4),
(32, 1, 8),
(33, 2, 2),
(35, 2, 8),
(38, 3, 2),
(39, 3, 6),
(40, 3, 7),
(41, 3, 8),
(43, 1, 2),
(45, 1, 9),
(46, 1, 15),
(47, 1, 16),
(48, 1, 17),
(49, 1, 18),
(50, 1, 19),
(51, 1, 20),
(52, 3, 15),
(53, 3, 16),
(55, 3, 17),
(56, 3, 20),
(57, 2, 20),
(58, 1, 21),
(60, 2, 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'menu'),
(4, 'pic'),
(5, 'mahasiswa'),
(15, 'beastudi'),
(17, 'report'),
(20, 'dashboard');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Pic');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(12, 1, 'Users', 'admin/users', 'fas fa-fw fa-users', 1),
(27, 15, 'Beastudi', 'beastudi', 'fas fa-fw fa-users', 1),
(28, 17, 'Report', 'report', 'fas fa-fw fa-clipboard-list', 1),
(31, 4, 'Pic', 'pic ', 'fas fa-fw fa-comments', 1),
(32, 20, 'Informasi', 'dashboard', 'fas fa-fw fa-tachometer-alt', 1),
(33, 5, 'Mahasiswa', 'mahasiswa', 'fas fa-fw fa-users', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'aku@aku.aku', 's+q8JCFHahCbG+yuZkMYDAvP74cWddlH5GLAgtpI8f0=', 1562320292),
(2, 'dianbugas@gmail.das', 'NATPjcrQs1rbcOSl6iUQaAgCE1nu29dvv9Vore3NFMI=', 1562321218),
(3, 'dianynf20@gmail.com', 'pD6yddAH1wItZ0nmkxyijCnrQwA5c+PR2qOpxGywPII=', 1570108049),
(4, 'pic@gmail.com', 'hUYsUUhq/23Ja5Q4Pd+ZroI1SLCkbGlx5ms7H0vOCx8=', 1570976320),
(5, 'muhammadardiyansyah889@gmail.com', 'CeqUriDiQSn0qs+G8C8XS+TnAkLVGDFTIoNHdcrg9kQ=', 1570976373),
(6, 'muhammadardiyansyah889@gmail.com', 'Kj3jaxKcO6p4XMLdUwjXUqmN4NjKEqXkF+sn/fTvuoE=', 1570977122),
(7, 'muhammadardiyansyah889@gmail.com', '+UXOf+S0YnMwzx66i3zvzBBXaa11WEtYTpnOrmEysjw=', 1570977148),
(8, 'muhammadardiyansyah889@gmail.com', '405CdtrGgYAYvjVfoXM85l0/Sqmc6FfY216p8TXXcyc=', 1570977183),
(11, 'muhammadardiyansyah889@gmail.com', 'J7Dde2Vm/Yg9tvvb73hXG9kqdOZ8W45xlKe8F/hAOi8=', 1603809829),
(12, 'dianbugasbugas@gmail.com', 'eP3VkFBQI/jn9/Hkp45uoeF8YG2yLQxwLHTkMrKIdC0=', 1603809866);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `beastudi`
--
ALTER TABLE `beastudi`
  ADD PRIMARY KEY (`beastudi_id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `programstudi_id` (`programstudi_id`),
  ADD KEY `pic_id` (`pic_id`),
  ADD KEY `nama_id` (`nama_id`),
  ADD KEY `kontribusi_id` (`kontribusi_id`);

--
-- Indeks untuk tabel `dana`
--
ALTER TABLE `dana`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indeks untuk tabel `file_upload`
--
ALTER TABLE `file_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `kontribusi`
--
ALTER TABLE `kontribusi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kontribusi_id` (`kontribusi_id`);

--
-- Indeks untuk tabel `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indeks untuk tabel `pic`
--
ALTER TABLE `pic`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeks untuk tabel `programstudi`
--
ALTER TABLE `programstudi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `beastudi`
--
ALTER TABLE `beastudi`
  MODIFY `beastudi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT untuk tabel `dana`
--
ALTER TABLE `dana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `detail`
--
ALTER TABLE `detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT untuk tabel `file_upload`
--
ALTER TABLE `file_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kontribusi`
--
ALTER TABLE `kontribusi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT untuk tabel `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `pic`
--
ALTER TABLE `pic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `programstudi`
--
ALTER TABLE `programstudi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
