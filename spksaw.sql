-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08 Feb 2017 pada 02.56
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spksaw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bobot`
--

CREATE TABLE `tb_bobot` (
  `B_UAS` double NOT NULL,
  `B_UTS` double NOT NULL,
  `B_nilairapot` double NOT NULL,
  `B_tesmasuk` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bobot`
--

INSERT INTO `tb_bobot` (`B_UAS`, `B_UTS`, `B_nilairapot`, `B_tesmasuk`) VALUES
(0.3, 0.2, 0.2, 0.2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `NIS` varchar(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `UAS` int(11) NOT NULL,
  `UTS` int(11) NOT NULL,
  `nilairapot` int(11) NOT NULL,
  `nilaitesmasuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nilai`
--

INSERT INTO `tb_nilai` (`NIS`, `nama`, `UAS`, `UTS`, `nilairapot`, `nilaitesmasuk`) VALUES
('S001', 'Fafa', 90, 85, 80, 90),
('S002', 'Ffa', 75, 90, 85, 90),
('S003', 'llo', 75, 90, 90, 90);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `NIS` varchar(20) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `tgllahir` date NOT NULL,
  `asalsekolah` varchar(35) NOT NULL,
  `notelp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`NIS`, `nama`, `tgllahir`, `asalsekolah`, `notelp`) VALUES
('S001', 'Fafay', '2017-02-23', 'NFBS', '09872635271'),
('S002', 'Ffa', '2017-02-20', 'll', '019280917412'),
('S003', 'llo', '2017-02-21', 'llll', '091823212101');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`NIS`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`NIS`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `tb_nilai_ibfk_1` FOREIGN KEY (`NIS`) REFERENCES `tb_siswa` (`NIS`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
