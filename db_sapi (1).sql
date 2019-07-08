-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 Jul 2019 pada 16.34
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sapi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(2) NOT NULL,
  `id_alternatif` varchar(2) NOT NULL,
  `jenis_sapi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id`, `id_alternatif`, `jenis_sapi`) VALUES
(1, 'A1', 'Sapi Bali'),
(2, 'A2', 'Sapi Limousin'),
(3, 'A3', 'Sapi Submetal'),
(4, 'A4', 'Sapi Jawa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `cookie` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `data`
--

INSERT INTO `data` (`id`, `cookie`) VALUES
(34, '022206ed8ca06c5db1d681ce3987745d'),
(38, '06c81e02220272cfc651bf27c67e3f94'),
(35, '0e232ae89a8584d3a2b6618290ba450d'),
(32, '4ddeabb67cf7f9765e0e05abb9133d88'),
(33, '52e586cd07a0ede53abd947e564b0428'),
(37, '541606bad6f319b1540594f7931f2598'),
(31, '5633aec72e557ac8d6f465a927834322'),
(39, '73c70ac01f33ef869cfae48bc26aeb74'),
(28, '78c3ab4ee6f34f63b0ccf21e6df7b100'),
(36, 'a652c5e336e5ac690be12ef640b30c03'),
(29, 'aa18442ecf9ff13a1b26647dad82b520'),
(30, 'be5288ad344b93ad2175e70fa6f61382'),
(40, 'ccc1959f235ef336579ec36bba55595a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `input`
--

CREATE TABLE `input` (
  `id_input` int(2) NOT NULL,
  `id_alternatif` varchar(2) DEFAULT NULL,
  `cookie` varchar(512) DEFAULT NULL,
  `c1` int(1) NOT NULL DEFAULT '0',
  `c2` int(1) NOT NULL DEFAULT '0',
  `c3` int(1) NOT NULL DEFAULT '0',
  `c4` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `input`
--

INSERT INTO `input` (`id_input`, `id_alternatif`, `cookie`, `c1`, `c2`, `c3`, `c4`) VALUES
(17, 'A1', '78c3ab4ee6f34f63b0ccf21e6df7b100', 1, 2, 3, 2),
(18, 'A2', '78c3ab4ee6f34f63b0ccf21e6df7b100', 2, 3, 1, 1),
(19, 'A1', 'aa18442ecf9ff13a1b26647dad82b520', 3, 2, 3, 2),
(20, 'A2', 'aa18442ecf9ff13a1b26647dad82b520', 2, 3, 2, 1),
(21, 'A1', '5633aec72e557ac8d6f465a927834322', 1, 3, 4, 4),
(22, 'A2', '5633aec72e557ac8d6f465a927834322', 3, 3, 2, 4),
(23, 'A3', '5633aec72e557ac8d6f465a927834322', 3, 3, 4, 4),
(44, 'A2', '4ddeabb67cf7f9765e0e05abb9133d88', 1, 2, 2, 2),
(45, 'A1', '4ddeabb67cf7f9765e0e05abb9133d88', 4, 2, 2, 0),
(46, 'A2', '4ddeabb67cf7f9765e0e05abb9133d88', 1, 3, 2, 1),
(50, 'A3', '022206ed8ca06c5db1d681ce3987745d', 0, 0, 0, 0),
(61, 'A1', '0e232ae89a8584d3a2b6618290ba450d', 0, 0, 0, 0),
(62, 'A2', '541606bad6f319b1540594f7931f2598', 1, 1, 1, 1),
(63, 'A1', '541606bad6f319b1540594f7931f2598', 2, 2, 2, 3),
(64, 'A3', '541606bad6f319b1540594f7931f2598', 1, 2, 3, 3),
(70, 'A1', '06c81e02220272cfc651bf27c67e3f94', 1, 1, 2, 0),
(71, 'A2', '06c81e02220272cfc651bf27c67e3f94', 2, 2, 2, 2),
(72, 'A3', '06c81e02220272cfc651bf27c67e3f94', 2, 4, 3, 3),
(80, 'A2', '73c70ac01f33ef869cfae48bc26aeb74', 2, 2, 2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(3) NOT NULL,
  `id_alternatif` varchar(2) NOT NULL,
  `berat` varchar(10) NOT NULL,
  `umur` varchar(10) NOT NULL,
  `tinggi` varchar(10) NOT NULL,
  `panjang_tanduk` varchar(10) NOT NULL,
  `kondisi` varchar(15) NOT NULL,
  `nilai` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `id_alternatif`, `berat`, `umur`, `tinggi`, `panjang_tanduk`, `kondisi`, `nilai`) VALUES
(1, 'A3', '177-400', '2-3', '74-95', '10', 'Sangat Buruk', 4),
(3, 'A2', '170-400', '2-6', '40-71', '2', 'Baik', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hasil`
--

CREATE TABLE `tbl_hasil` (
  `id_hasil` int(2) NOT NULL,
  `id_alternatif` varchar(2) NOT NULL,
  `id_user` int(11) NOT NULL,
  `c1` int(1) NOT NULL,
  `c2` int(1) NOT NULL,
  `c3` int(1) NOT NULL,
  `c4` int(1) NOT NULL,
  `hasil` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_w`
--

CREATE TABLE `tbl_w` (
  `id_w` int(2) NOT NULL,
  `cookie` varchar(512) NOT NULL,
  `berat` int(1) NOT NULL DEFAULT '0',
  `umur` int(1) NOT NULL DEFAULT '0',
  `tinggi` int(1) NOT NULL DEFAULT '0',
  `panjang_tanduk` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_w`
--

INSERT INTO `tbl_w` (`id_w`, `cookie`, `berat`, `umur`, `tinggi`, `panjang_tanduk`) VALUES
(5, '78c3ab4ee6f34f63b0ccf21e6df7b100', 2, 2, 2, 2),
(6, 'aa18442ecf9ff13a1b26647dad82b520', 2, 2, 2, 2),
(7, '5633aec72e557ac8d6f465a927834322', 2, 2, 2, 2),
(15, '4ddeabb67cf7f9765e0e05abb9133d88', 1, 1, 1, 1),
(16, '541606bad6f319b1540594f7931f2598', 2, 2, 2, 2),
(18, '06c81e02220272cfc651bf27c67e3f94', 3, 3, 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cookie` (`cookie`);

--
-- Indexes for table `input`
--
ALTER TABLE `input`
  ADD PRIMARY KEY (`id_input`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `id_temp` (`cookie`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD KEY `id_alternatif` (`id_alternatif`);

--
-- Indexes for table `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `id_alternatif_2` (`id_alternatif`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_w`
--
ALTER TABLE `tbl_w`
  ADD PRIMARY KEY (`id_w`),
  ADD KEY `id_temp` (`cookie`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `input`
--
ALTER TABLE `input`
  MODIFY `id_input` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_w`
--
ALTER TABLE `tbl_w`
  MODIFY `id_w` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `input`
--
ALTER TABLE `input`
  ADD CONSTRAINT `input_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `input_ibfk_2` FOREIGN KEY (`cookie`) REFERENCES `data` (`cookie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD CONSTRAINT `kriteria_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  ADD CONSTRAINT `tbl_hasil_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id_alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_hasil_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_w`
--
ALTER TABLE `tbl_w`
  ADD CONSTRAINT `tbl_w_ibfk_1` FOREIGN KEY (`cookie`) REFERENCES `data` (`cookie`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
