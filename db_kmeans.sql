-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09 Jan 2020 pada 03.47
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kmeans`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'customer'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin Perusahaan', 'admin.perusahaan@yahoo.com', '081267771344', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(10) NOT NULL,
  `judul_buku` varchar(250) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `kategori`) VALUES
('B-0011', 'kacil Koya', 'Cerita'),
('B-0012', 'kehidupan Duafa', 'Agama'),
('B-0013', 'Puasa Sunnah', 'Agama'),
('B-0014', 'Kemerdekaan India', 'Sosial'),
('B-0015', 'Bakti Pahlawan', 'Sosial');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_dipinjam`
--

CREATE TABLE `buku_dipinjam` (
  `id_member` varchar(10) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `usia` int(4) NOT NULL,
  `kode_buku` varchar(100) NOT NULL,
  `jumlah_buku_dipinjam` int(4) NOT NULL,
  `jumlah_kategori_sosial` int(4) NOT NULL,
  `jumlah_kategori_agama` int(4) NOT NULL,
  `jumlah_kategori_cerita` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku_dipinjam`
--

INSERT INTO `buku_dipinjam` (`id_member`, `jenis_kelamin`, `usia`, `kode_buku`, `jumlah_buku_dipinjam`, `jumlah_kategori_sosial`, `jumlah_kategori_agama`, `jumlah_kategori_cerita`) VALUES
('82', '2', 2, 'B-0011 B-0012', 2, 0, 0, 0),
('082', '2', 2, 'B-0011 B-0012', 2, 0, 1, 1),
('098', '2', 3, 'B-0014 B-0012', 2, 0, 1, 0),
('0186', '2', 1, 'B-0012 B-0014', 2, 0, 0, 0),
('085', '2', 3, 'B-0011 B-0012 B-0013', 3, 0, 2, 1),
('123', '2', 4, 'B-123 A-432 A-768 ', 4, 0, 0, 0),
('137', '1', 1, 'B-0012 B-0013 B-0015', 3, 0, 0, 0),
('138', '2', 2, 'B-0012 B-0015 B-0014', 3, 0, 0, 0),
('139', '1', 4, 'B-0014', 1, 0, 0, 0),
('140', '2', 2, 'B-0014 B-0015 B-0012 B-0011', 4, 0, 0, 0),
('141', '1', 1, 'B-0013 B-0012 B-0014 B-0013 B-0014', 5, 0, 1, 0),
('142', '1', 2, 'B-0015 B-0011 B-0015 B-0014 B-0011', 5, 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `centroid`
--

CREATE TABLE `centroid` (
  `id_centroid` int(5) NOT NULL,
  `data_centroid` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `centroid`
--

INSERT INTO `centroid` (`id_centroid`, `data_centroid`) VALUES
(15, '1, 1, 2, 1, 2, 2'),
(16, '2, 3, 3, 2, 2, 1'),
(17, '1, 5, 5, 1, 2, 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dana`
--

CREATE TABLE `dana` (
  `dana_saat_ini` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dana`
--

INSERT INTO `dana` (`dana_saat_ini`) VALUES
(10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagram`
--

CREATE TABLE `diagram` (
  `id_diagram` int(5) NOT NULL,
  `x` text NOT NULL,
  `y` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diagram`
--

INSERT INTO `diagram` (`id_diagram`, `x`, `y`) VALUES
(1, '2,', ''),
(2, '1,', ''),
(3, '', ' 30,'),
(4, '', ' 23,');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagram_centroid`
--

CREATE TABLE `diagram_centroid` (
  `id_diagram_centroid` int(5) NOT NULL,
  `x` varchar(255) NOT NULL,
  `y` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diagram_centroid`
--

INSERT INTO `diagram_centroid` (`id_diagram_centroid`, `x`, `y`) VALUES
(1, '2,', ''),
(2, '1,', ''),
(3, '', ' 30,'),
(4, '', ' 22,');

-- --------------------------------------------------------

--
-- Struktur dari tabel `objek`
--

CREATE TABLE `objek` (
  `id_objek` int(5) NOT NULL,
  `nama_objek` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `objek`
--

INSERT INTO `objek` (`id_objek`, `nama_objek`, `data`) VALUES
(20, 'rewrew', '1,2,4,1,1,0'),
(19, 'irfan', '2,3,3,0,2,1'),
(21, 'nabil', '1,1,3,0,0,1'),
(22, 'fahri', '2,2,3,0,2,1'),
(23, 'Anastasya', '1,4,1,1,0,2'),
(24, 'Egi', '2,2,4,1,1,1'),
(25, 'Melani', '1,1,5,2,1,2'),
(26, 'Novita', '1,2,5,1,2,2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_member` varchar(10) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `usia` int(10) NOT NULL,
  `tanggal_sekarang` varchar(50) NOT NULL,
  `jumlah_buku_dipinjam` int(4) NOT NULL,
  `total_bayar` varchar(20) NOT NULL,
  `tanggal_pengembalian` varchar(50) NOT NULL,
  `buku_apa_saja` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pinjaman`
--

INSERT INTO `pinjaman` (`id_member`, `nama`, `jenis_kelamin`, `usia`, `tanggal_sekarang`, `jumlah_buku_dipinjam`, `total_bayar`, `tanggal_pengembalian`, `buku_apa_saja`) VALUES
('82', 'miftah', '2', 2, '0000-00-00', 2, '0', '0000-00-00', 'B-0011 B-0012'),
('082', 'miftah', '2', 2, '22-11-2019', 2, '10000', '29-11-2019', 'B-0011 B-0012'),
('098', 'miftah2', '2', 3, '27-11-2019', 2, '10000', '4-12-2019', 'B-0014 B-0012'),
('085', 'irfan', '2', 3, '26-12-2019', 3, '15000', '', 'B-0011 B-0012 B-0013'),
('123', 'rewrew', '2', 4, '02-01-2020', 4, '10000', '5-12-2019', 'B-123 A-432 A-768 '),
('137', 'nabil', '1', 1, '03-01-2020', 3, '15000', '08-01-2020', 'B-0012 B-0013 B-0015'),
('138', 'fahri', '2', 2, '03-01-2020', 3, '15000', '08-01-2020', 'B-0012 B-0015 B-0014'),
('139', 'Anastasya', '1', 4, '03-01-2020', 1, '5000', '08-01-2020', 'B-0014'),
('140', 'Egi', '2', 2, '03-01-2020', 4, '20000', '08-01-2020', 'B-0014 B-0015 B-0012 B-0011'),
('141', 'Melani', '1', 1, '03-01-2020', 5, '25000', '08-01-2020', 'B-0013 B-0012 B-0014 B-0013 B-0014'),
('142', 'Novita', '1', 2, '03-01-2020', 5, '25000', '08-01-2020', 'B-0015 B-0011 B-0015 B-0014 B-0011');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satukan`
--

CREATE TABLE `satukan` (
  `id` int(5) NOT NULL,
  `data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `satukan`
--

INSERT INTO `satukan` (`id`, `data`) VALUES
(1, '2,1,'),
(2, ' 30, 23,'),
(3, '2,1,'),
(4, ' 30, 22,');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `centroid`
--
ALTER TABLE `centroid`
  ADD PRIMARY KEY (`id_centroid`);

--
-- Indexes for table `diagram`
--
ALTER TABLE `diagram`
  ADD PRIMARY KEY (`id_diagram`);

--
-- Indexes for table `diagram_centroid`
--
ALTER TABLE `diagram_centroid`
  ADD PRIMARY KEY (`id_diagram_centroid`);

--
-- Indexes for table `objek`
--
ALTER TABLE `objek`
  ADD PRIMARY KEY (`id_objek`);

--
-- Indexes for table `satukan`
--
ALTER TABLE `satukan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `centroid`
--
ALTER TABLE `centroid`
  MODIFY `id_centroid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `diagram`
--
ALTER TABLE `diagram`
  MODIFY `id_diagram` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `diagram_centroid`
--
ALTER TABLE `diagram_centroid`
  MODIFY `id_diagram_centroid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `objek`
--
ALTER TABLE `objek`
  MODIFY `id_objek` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `satukan`
--
ALTER TABLE `satukan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
