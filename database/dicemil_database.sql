-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jul 2019 pada 08.56
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dicemil_database`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin_tbl`
--

INSERT INTO `admin_tbl` (`id_admin`, `username`, `password`, `nama`, `alamat`) VALUES
(1, 'diki', 'diki', 'diki herliansyah', 'bekasi'),
(2, 'nunu', 'nunu', 'nunu', 'jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon_tbl`
--

CREATE TABLE `diskon_tbl` (
  `id_diskon` int(11) NOT NULL,
  `keterangan_diskon` varchar(30) NOT NULL,
  `kategori_diskon` varchar(30) NOT NULL,
  `status` varchar(3) NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diskon_tbl`
--

INSERT INTO `diskon_tbl` (`id_diskon`, `keterangan_diskon`, `kategori_diskon`, `status`, `diskon`) VALUES
(3, 'gender', 'laki-laki', '1', 50),
(4, 'gender', 'perempuan', '1', 10),
(5, 'tanggal_lahir', 'laki-laki dan perempuan', '0', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_tbl`
--

CREATE TABLE `kategori_tbl` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(15) NOT NULL,
  `keterangan_kategori` varchar(10) NOT NULL,
  `gambar_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_tbl`
--

INSERT INTO `kategori_tbl` (`id_kategori`, `nama_kategori`, `keterangan_kategori`, `gambar_kategori`) VALUES
(3, 'PIZZA ', 'MAKANAN', 'pizza-logo.jpg'),
(4, 'PASTA ', 'MAKANAN', 'pasta-logo.jpg'),
(5, 'ES KRIM ', 'MINUMAN', 'es-logo.png'),
(6, 'COFFE ', 'MINUMAN', 'coffee-logo.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member_tbl`
--

CREATE TABLE `member_tbl` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `createdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member_tbl`
--

INSERT INTO `member_tbl` (`id_member`, `nama`, `username`, `password`, `email`, `no_telp`, `gender`, `tanggal_lahir`, `alamat`, `createdate`) VALUES
(22, 'sasa', 'sasa', 'sasa', 'sasa@gmail.com', '082114314831', 'perempuan', '2019-05-17', 'bekasi timur', '2019-04-02'),
(23, 'diki', 'diki', 'diki', 'dikiherliansyah123@gmail.com', '082114314831', 'laki-laki', '2019-05-17', 'Jl. Mekar Sari RT06/03 No.36', '2019-04-02'),
(24, 'dodo', 'dodo', 'didi', 'dodo@gmail.com', '082114314876', 'laki-laki', '1999-12-12', 'bekasi barat', '2019-04-10'),
(25, 'sisi', 'dina', 'dudu', 'sisi@gmail.com', '08138877655', 'perempuan', '2019-05-17', 'bekasi', '2019-04-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir_tbl`
--

CREATE TABLE `ongkir_tbl` (
  `id_ongkir` int(11) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `harga_ongkir` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir_tbl`
--

INSERT INTO `ongkir_tbl` (`id_ongkir`, `kecamatan`, `kelurahan`, `harga_ongkir`) VALUES
(2, 'pancoran', 'cikoko', '5000'),
(3, 'pancoran', 'duren tiga', '5000'),
(4, 'pancoran', 'kalibata', '5000'),
(5, 'pancoran', 'pancoran', '5000'),
(6, 'pancoran', 'pengadegan', '5000'),
(7, 'pancoran', 'rawajati', '5000'),
(8, 'tebet', 'bukit duri', '10000'),
(9, 'tebet', 'kebon baru', '10000'),
(10, 'tebet', 'manggarai', '10000'),
(11, 'tebet', 'manggarai selatan', '10000'),
(12, 'tebet', 'menteng dalam', '10000'),
(13, 'tebet', 'tebet barat', '10000'),
(14, 'tebet', 'tebet timur', '10000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail_tbl`
--

CREATE TABLE `order_detail_tbl` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `produk` varchar(100) NOT NULL,
  `status_pengiriman` varchar(30) NOT NULL,
  `keterangan_pengiriman` varchar(30) NOT NULL,
  `jam_pengiriman` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `jumlah_harga` varchar(20) DEFAULT NULL,
  `no_telp` varchar(15) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `ongkos_kirim` int(10) NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_detail_tbl`
--

INSERT INTO `order_detail_tbl` (`order_detail_id`, `order_id`, `produk`, `status_pengiriman`, `keterangan_pengiriman`, `jam_pengiriman`, `qty`, `jumlah_harga`, `no_telp`, `kecamatan`, `kelurahan`, `alamat`, `ongkos_kirim`, `diskon`) VALUES
(55, 55, 'CHICKEN FETTUCCINE ALLA ITALIA', 'delivery', 'sekarang', '', 2, '200000', '082114314831', 'pancoran', 'pancoran', 'Jl. raya pancoran jaya no.20', 5000, 0),
(56, 56, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 2, '80000', '232323', 'tebet', 'manggarai selatan', 'egege', 10000, 0),
(57, 57, 'POCKET BITES PIZZA        ', 'delivery', 'nanti', '17.00', 1, '25000', '081398870871', 'tebet', 'manggarai selatan', 'Jl. manggarai selatan raya no.20', 10000, 0),
(58, 58, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '40000', '082114314831', 'pancoran', 'cikoko', 'jl. pancoran raya no.20', 5000, 0),
(59, 59, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '25000', '082114314831', 'pancoran', 'pancoran', 'Jl. pancoran raya no.20', 5000, 0),
(60, 60, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '35000', '081398870871', 'tebet', 'bukit duri', 'jl. bukit duri no.20', 10000, 0),
(61, 61, 'SPILTZA SIGNATURE', 'delivery', 'sekarang', '', 1, '70000', '082114314831', 'tebet', 'menteng dalam', 'jl. menteng dalam no.20', 10000, 0),
(62, 62, 'POCKET BITES PIZZA        ', 'delivery', 'nanti', '17.30', 1, '35000', '081398870871', 'pancoran', 'duren tiga', 'Jl. duren tiga blok.A no.20', 5000, 0),
(63, 63, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '35000', '082114314831', 'pancoran', 'cikoko', 'Jl. Cikoko Raya No.23', 5000, 0),
(64, 64, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '135000', '02112121212', 'tebet', 'menteng dalam', 'Jl. Menteng dalam no.20', 10000, 0),
(65, 64, 'SPILTZA SIGNATURE', 'take_away', 'nanti', '18.00', 1, '135000', '02112121212', 'tebet', 'menteng dalam', 'Jl. Menteng dalam no.20', 10000, 0),
(66, 74, 'POCKET BITES PIZZA        ', 'take_away', 'nanti', '18.30', 1, '45000', '676767', '-', '-', '-', 0, 0),
(67, 75, 'POCKET BITES PIZZA        ', 'take_away', 'nanti', '18.00', 1, '45000', '3353535', '-', '-', '-', 0, 0),
(68, 76, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '45000', '765765', 'pancoran', 'pancoran', 'iuhkjhkj', 5000, 0),
(69, 77, 'POCKET BITES PIZZA        ', 'delivery', 'nanti', '18.00', 1, '45000', '987987987', 'tebet', 'menteng dalam', 'kjhkh', 10000, 0),
(70, 78, 'POCKET BITES PIZZA        ', 'take_away', 'sekarang', '', 1, '45000', '876876878667', '-', '-', '-', 0, 0),
(71, 79, 'POCKET BITES PIZZA        ', 'take_away', 'nanti', '18.30', 1, '45000', 'jhgjhgjhg', '-', '-', '-', 0, 0),
(72, 80, 'POCKET BITES PIZZA        ', 'take_away', 'nanti', '17.00', 1, '45000', 'kjhkjhkjh', '-', '-', '-', 0, 0),
(73, 81, 'POCKET BITES PIZZA        ', 'take_away', 'sekarang', '', 1, '45000', '8768768', 'pancoran', 'pancoran', 'lkjlkjlkj', 5000, 0),
(74, 82, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '45000', '2234234', 'tebet', 'manggarai', 'sdsvsdsdvsdvv', 10000, 0),
(75, 83, 'POCKET BITES PIZZA        ', 'delivery', 'nanti', '17.30', 1, '45000', '346346436', 'tebet', 'manggarai selatan', 'dvdvdvxvxcvxc', 10000, 0),
(76, 84, 'POCKET BITES PIZZA        ', 'take_away', 'sekarang', '', 1, '45000', 'sdbdffdb', 'tebet', 'kebon baru', 'sbsdbdssdbsdb', 10000, 0),
(77, 85, 'POCKET BITES PIZZA        ', 'take_away', 'nanti', '17.00', 1, '45000', '3433434', 'pancoran', 'kalibata', 'dfbdfbfdbd', 5000, 0),
(78, 86, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '35000', '082114314831', 'pancoran', 'pancoran', 'Jl. Pancoran raya no.20', 5000, 0),
(79, 87, 'CHICKEN FETTUCCINE ALLA ITALIA', 'delivery', 'sekarang', '', 1, '70000', '081398870871', 'tebet', 'kebon baru', 'bekasi barat ', 10000, 0),
(80, 89, 'POCKET BITES PIZZA        ', 'delivery', 'nanti', '17.00', 1, '35000', '082114314831', 'pancoran', 'duren tiga', 'bekasi', 5000, 0),
(81, 90, 'POCKET BITES PIZZA        ', 'delivery', 'nanti', '17.00', 1, '35000', '082114314831', 'pancoran', 'duren tiga', 'bekasi', 5000, 0),
(82, 92, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '35000', '081398870871', 'pancoran', 'pengadegan', 'bekasi', 5000, 0),
(83, 93, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '35000', '082114314831', 'pancoran', 'pengadegan', 'lkmlkmlk', 5000, 0),
(84, 95, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 4, '200000', '081398870871', 'tebet', 'manggarai selatan', 'lklklj', 10000, 0),
(85, 96, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 4, '200000', '081398870871', 'tebet', 'manggarai selatan', 'lklklj', 10000, 0),
(86, 98, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 2, '100000', '082114314831', 'pancoran', 'pancoran', 'aasasas', 5000, 0),
(87, 99, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 2, '100000', '082114314831', 'pancoran', 'pancoran', 'aasasas', 5000, 0),
(88, 101, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '35000', '082114314831', 'pancoran', 'cikoko', 'ergrgrg', 5000, 0),
(89, 102, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '35000', '082114314831', 'pancoran', 'cikoko', 'ergrgrg', 5000, 0),
(90, 104, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '35000', '082114314831', 'pancoran', 'kalibata', 'aasascasc', 5000, 0),
(91, 105, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '35000', '082114314831', 'pancoran', 'kalibata', 'aasascasc', 5000, 0),
(92, 107, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '35000', '082114314831', 'pancoran', 'pancoran', 'dsvsdv', 5000, 0),
(93, 108, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '35000', '082114314831', 'pancoran', 'pancoran', 'dsvsdv', 5000, 0),
(94, 110, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 5, '250000', '082114314831', 'pancoran', 'pancoran', 'asseewf', 5000, 0),
(95, 111, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 5, '250000', '082114314831', 'pancoran', 'pancoran', 'asseewf', 5000, 0),
(96, 113, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '35000', '081398870871', 'pancoran', 'duren tiga', 'askjaskj', 5000, 0),
(97, 114, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '35000', '081398870871', 'pancoran', 'duren tiga', 'askjaskj', 5000, 0),
(98, 116, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '35000', '082114314831', 'pancoran', 'pengadegan', 'dvv', 5000, 0),
(99, 117, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '35000', '082114314831', 'pancoran', 'pengadegan', 'dvv', 5000, 0),
(100, 119, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '35000', '081398870871', 'pancoran', 'pengadegan', 'ssgs', 5000, 0),
(101, 120, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '35000', '081398870871', 'pancoran', 'pancoran', 'asvsdv', 5000, 0),
(102, 121, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 4, '140000', '082114314831', 'pancoran', 'pancoran', 'jl.pancoran raya no.20', 5000, 0),
(103, 122, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 4, '200000', 'dsc', 'pancoran', 'cikoko', 'sgdfgfdgdf', 5000, 0),
(104, 123, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 2, '50000', '082114314831', 'pancoran', 'duren tiga', 'Jl. duren tiga no.20', 5000, 0),
(105, 124, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '150000', '082114314831', 'pancoran', 'duren tiga', 'sdsdvsdvsdvsd', 5000, 0),
(106, 124, 'CHICKEN FETTUCCINE ALLA ITALIA', 'delivery', 'sekarang', '', 1, '150000', '082114314831', 'pancoran', 'duren tiga', 'sdsdvsdvsdvsd', 5000, 0),
(107, 125, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 2, '400000', '0812121212', 'pancoran', 'kalibata', 'bekasi', 5000, 0),
(108, 125, 'POCKET BITES CHICKEN PIZZA', 'delivery', 'sekarang', '', 2, '400000', '0812121212', 'pancoran', 'kalibata', 'bekasi', 5000, 0),
(109, 126, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '150000', '082114314831', 'pancoran', 'kalibata', 'Jl. kalibata no.20', 5000, 0),
(110, 126, 'CHICKEN FETTUCCINE ALLA ITALIA', 'delivery', 'sekarang', '', 1, '150000', '082114314831', 'pancoran', 'kalibata', 'Jl. kalibata no.20', 5000, 0),
(111, 127, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '75000', '0813878172', 'tebet', 'kebon baru', 'Jl. kebon jeruk no.20', 10000, 0),
(112, 127, 'CHICKEN FETTUCCINE ALLA ITALIA', 'delivery', 'sekarang', '', 1, '75000', '0813878172', 'tebet', 'kebon baru', 'Jl. kebon jeruk no.20', 10000, 0),
(113, 128, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '75000', '081398870871', 'pancoran', 'kalibata', 'bekasi', 5000, 0),
(114, 128, 'SPILTZA SIGNATURE', 'delivery', 'sekarang', '', 1, '75000', '081398870871', 'pancoran', 'kalibata', 'bekasi', 5000, 0),
(115, 129, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '75000', '08121212', 'tebet', 'tebet barat', 'bekasi', 10000, 0),
(116, 129, 'SPILTZA SIGNATURE', 'delivery', 'sekarang', '', 1, '75000', '08121212', 'tebet', 'tebet barat', 'bekasi', 10000, 0),
(117, 130, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '0', '08121212', 'tebet', 'tebet barat', 'bekasi', 10000, 0),
(118, 130, 'SPILTZA SIGNATURE', 'delivery', 'sekarang', '', 1, '0', '08121212', 'tebet', 'tebet barat', 'bekasi', 10000, 0),
(119, 131, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '25000', '081398870871', 'tebet', 'menteng dalam', 'bekasi', 10000, 25000),
(120, 132, 'POCKET BITES PIZZA        ', 'delivery', 'sekarang', '', 1, '75000', '08121212', 'tebet', 'tebet barat', 'bekasi', 10000, 25000),
(121, 132, 'SPILTZA SIGNATURE', 'delivery', 'sekarang', '', 1, '75000', '08121212', 'tebet', 'tebet barat', 'bekasi', 10000, 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_tbl`
--

CREATE TABLE `order_tbl` (
  `order_id` int(11) NOT NULL,
  `customer_username` varchar(50) NOT NULL,
  `total` double NOT NULL,
  `status` varchar(30) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_tbl`
--

INSERT INTO `order_tbl` (`order_id`, `customer_username`, `total`, `status`, `no_rekening`, `order_date`) VALUES
(55, 'diki', 205000, 'sudah dikonfirmasi', '111111111111111', '2019-05-27'),
(56, 'diki', 90000, 'sudah dikonfirmasi', '333333333333333', '2019-05-27'),
(57, 'sasa', 35000, 'sudah dikonfirmasi', '111111111111111', '2019-05-28'),
(58, 'diki', 45000, 'sudah dikonfirmasi', '111111111111111', '2019-05-28'),
(59, 'sasa', 30000, 'sudah dikonfirmasi', '333333333333333', '2019-05-28'),
(60, 'diki', 45000, 'Belum Transfer', '111111111111111', '2019-06-15'),
(61, 'diki', 80000, 'sudah dikonfirmasi', '111111111111111', '2019-06-15'),
(62, 'diki', 40000, 'Belum Transfer', '222222222222222', '2019-06-26'),
(63, 'diki', 40000, 'sudah dikonfirmasi', '333333333333333', '2019-06-28'),
(64, 'sasa', 145000, 'sudah dikonfirmasi', '111111111111111', '2019-07-05'),
(65, 'sasa', 0, 'Belum Transfer', '111111111111111', '2019-07-05'),
(66, 'sasa', 0, 'Belum Transfer', '111111111111111', '2019-07-05'),
(67, 'sasa', 0, 'Belum Transfer', '111111111111111', '2019-07-05'),
(68, 'sasa', 0, 'Belum Transfer', '111111111111111', '2019-07-05'),
(69, 'sasa', 0, 'Belum Transfer', '111111111111111', '2019-07-05'),
(70, 'sasa', 0, 'Belum Transfer', '111111111111111', '2019-07-05'),
(71, 'sasa', 0, 'Belum Transfer', '111111111111111', '2019-07-05'),
(72, 'sasa', 0, 'Belum Transfer', '111111111111111', '2019-07-05'),
(73, 'sasa', 0, 'Belum Transfer', '333333333333333', '2019-07-05'),
(74, 'sasa', 0, 'Belum Transfer', '333333333333333', '2019-07-05'),
(75, 'sasa', 45000, 'Belum Transfer', '333333333333333', '2019-07-05'),
(76, 'sasa', 50000, 'Belum Transfer', '333333333333333', '2019-07-05'),
(77, 'sasa', 55000, 'Belum Transfer', '333333333333333', '2019-07-05'),
(78, 'sasa', 45000, 'Belum Transfer', '222222222222222', '2019-07-05'),
(79, 'sasa', 45000, 'Belum Transfer', '111111111111111', '2019-07-05'),
(80, 'sasa', 45000, 'Belum Transfer', '111111111111111', '2019-07-05'),
(81, 'sasa', 50000, 'Belum Transfer', '333333333333333', '2019-07-05'),
(82, 'sasa', 55000, 'Belum Transfer', '333333333333333', '2019-07-05'),
(83, 'sasa', 55000, 'Belum Transfer', '333333333333333', '2019-07-05'),
(84, 'sasa', 55000, 'Belum Transfer', '222222222222222', '2019-07-05'),
(85, 'sasa', 50000, 'Belum Transfer', '333333333333333', '2019-07-05'),
(86, 'diki', 40000, 'sudah dikonfirmasi', '333333333333333', '2019-07-16'),
(87, 'diki', 80000, 'Belum Transfer', '222222222222222', '2019-07-16'),
(88, 'diki', 80000, 'Belum Transfer', '222222222222222', '2019-07-16'),
(89, 'diki', 40000, 'Belum Transfer', '333333333333333', '2019-07-16'),
(90, 'diki', 40000, 'Belum Transfer', '333333333333333', '2019-07-16'),
(91, 'diki', 40000, 'Belum Transfer', '333333333333333', '2019-07-16'),
(92, 'diki', 40000, 'Belum Transfer', '333333333333333', '2019-07-16'),
(93, 'diki', 40000, 'Belum Transfer', '333333333333333', '2019-07-16'),
(94, 'diki', 40000, 'Belum Transfer', '333333333333333', '2019-07-16'),
(95, 'diki', 210000, 'Belum Transfer', '333333333333333', '2019-07-16'),
(96, 'diki', 210000, 'Belum Transfer', '333333333333333', '2019-07-16'),
(97, 'diki', 210000, 'Belum Transfer', '333333333333333', '2019-07-16'),
(98, 'diki', 105000, 'Belum Transfer', '222222222222222', '2019-07-16'),
(99, 'diki', 105000, 'Belum Transfer', '222222222222222', '2019-07-16'),
(100, 'diki', 105000, 'Belum Transfer', '222222222222222', '2019-07-16'),
(101, 'diki', 40000, 'Belum Transfer', '333333333333333', '2019-07-16'),
(102, 'diki', 40000, 'Belum Transfer', '333333333333333', '2019-07-16'),
(103, 'diki', 40000, 'Belum Transfer', '333333333333333', '2019-07-16'),
(104, 'diki', 40000, 'Belum Transfer', '111111111111111', '2019-07-16'),
(105, 'diki', 40000, 'Belum Transfer', '111111111111111', '2019-07-16'),
(106, 'diki', 40000, 'Belum Transfer', '111111111111111', '2019-07-16'),
(107, 'diki', 40000, 'Belum Transfer', '111111111111111', '2019-07-16'),
(108, 'diki', 40000, 'Belum Transfer', '111111111111111', '2019-07-16'),
(109, 'diki', 40000, 'Belum Transfer', '111111111111111', '2019-07-16'),
(110, 'diki', 255000, 'Belum Transfer', '333333333333333', '2019-07-16'),
(111, 'diki', 255000, 'Belum Transfer', '333333333333333', '2019-07-16'),
(112, 'diki', 255000, 'Belum Transfer', '333333333333333', '2019-07-16'),
(113, 'diki', 40000, 'Belum Transfer', '333333333333333', '2019-07-16'),
(114, 'diki', 40000, 'Belum Transfer', '333333333333333', '2019-07-16'),
(115, 'diki', 40000, 'Belum Transfer', '333333333333333', '2019-07-16'),
(116, 'diki', 40000, 'Belum Transfer', '333333333333333', '2019-07-16'),
(117, 'diki', 40000, 'Belum Transfer', '333333333333333', '2019-07-16'),
(118, 'diki', 40000, 'Belum Transfer', '333333333333333', '2019-07-16'),
(119, 'diki', 40000, 'sudah transfer', '333333333333333', '2019-07-16'),
(120, 'diki', 40000, 'Belum Transfer', '111111111111111', '2019-07-16'),
(121, 'diki', 145000, 'sudah dikonfirmasi', '333333333333333', '2019-07-17'),
(122, 'assfd', 205000, 'sudah transfer', '333333333333333', '2019-07-18'),
(123, 'diki', 55000, 'sudah dikonfirmasi', '222222222222222', '2019-07-26'),
(124, 'dodo', 155000, 'Belum Transfer', '333333333333333', '2019-07-26'),
(125, 'arif', 405000, 'Belum Transfer', '333333333333333', '2019-07-26'),
(126, 'arif budiman', 155000, 'Belum Transfer', '111111111111111', '2019-07-26'),
(127, 'diki', 85000, 'Belum Transfer', '333333333333333', '2019-07-26'),
(128, 'diki', 80000, 'Belum Transfer', '111111111111111', '2019-07-26'),
(129, 'diki', 85000, 'Belum Transfer', '333333333333333', '2019-07-26'),
(130, 'diki', 85000, 'Belum Transfer', '333333333333333', '2019-07-26'),
(131, 'diki', 35000, 'Belum Transfer', '333333333333333', '2019-07-26'),
(132, 'diki', 85000, 'Belum Transfer', '333333333333333', '2019-07-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_tbl`
--

CREATE TABLE `pembayaran_tbl` (
  `id_pembayaran` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `nomor_invoice` varchar(20) NOT NULL,
  `jumlah_transfer` varchar(10) NOT NULL,
  `gambar_transfer` varchar(150) NOT NULL,
  `tanggal_upload` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran_tbl`
--

INSERT INTO `pembayaran_tbl` (`id_pembayaran`, `order_id`, `nama_pengirim`, `nomor_invoice`, `jumlah_transfer`, `gambar_transfer`, `tanggal_upload`) VALUES
(38, '55', 'diki', 'DICEMIL/55', '210000', '26-18-PB1.jpg', '2019-05-27 00:00:00'),
(39, '57', 'sasa', 'DICEMIL/57', '100000', 'wallpaper_garuda9.png', '2019-05-28 00:00:00'),
(40, '58', 'diki', 'DICEMIL/58', '100000', 'wallpaper_garuda10.png', '2019-05-28 00:00:00'),
(41, '59', 'sasa', 'DICEMIL/59', '50000', 'wallpaper_garuda11.png', '2019-05-28 00:00:00'),
(42, '56', 'jono', 'DICEMIL/56', '10000', 'wallpaper_garuda12.png', '2019-05-28 00:00:00'),
(43, '61', 'jopi', 'DICEMIL/61', '100000', 'f78309c7b13c2e251ce1b5e2dd79ffcb3.png', '2019-06-15 00:00:00'),
(44, '63', 'diki', 'DICEMIL/63', '50000', 'wallpaper_garuda13.png', '2019-06-28 00:00:00'),
(45, '64', 'diki', 'DICEMIL/64', '100000', 'f78309c7b13c2e251ce1b5e2dd79ffcb4.png', '2019-07-05 00:00:00'),
(46, '86', 'diki', 'DICEMIL/86', '50000', 'f78309c7b13c2e251ce1b5e2dd79ffcb5.png', '2019-07-16 00:00:00'),
(47, '119', 'diki', 'DICEMIL/119', '100000', 'f78309c7b13c2e251ce1b5e2dd79ffcb6.png', '2019-07-16 00:00:00'),
(48, '121', 'diki', 'DICEMIL/121', '150000', 'f78309c7b13c2e251ce1b5e2dd79ffcb7.png', '2019-07-17 00:00:00'),
(49, '122', 'sdsdv', 'zvxcvxcv', '2323232', 'f78309c7b13c2e251ce1b5e2dd79ffcb8.png', '2019-07-18 00:00:00'),
(50, '123', 'diki', 'DICEMIL/123', '100000', 'f78309c7b13c2e251ce1b5e2dd79ffcb9.png', '2019-07-26 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_tbl`
--

CREATE TABLE `product_tbl` (
  `id_product` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_diskon` int(11) NOT NULL,
  `nama_product` varchar(50) NOT NULL,
  `gambar_product` varchar(50) NOT NULL,
  `description_product` varchar(200) NOT NULL,
  `harga_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_tbl`
--

INSERT INTO `product_tbl` (`id_product`, `id_kategori`, `id_diskon`, `nama_product`, `gambar_product`, `description_product`, `harga_product`) VALUES
(26, 3, 0, 'POCKET BITES PIZZA        ', 'pizza1.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 50000),
(27, 3, 0, 'POCKET BITES CHICKEN PIZZA', 'pizza2.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 100000),
(28, 3, 0, 'SPILTZA SIGNATURE', 'pizza3.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 100000),
(29, 4, 0, 'CHICKEN FETTUCCINE ALLA ITALIA', 'pasta1.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 100000),
(30, 4, 0, 'MEDITERRANEAN SEAFOOD FUSILLI', 'pasta2.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 100000),
(31, 4, 0, 'BEEF LASAGNA', 'pasta3.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 100000),
(32, 4, 0, 'PEPPERONI CHEESE FUSILLI', 'pasta4.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 100000),
(33, 4, 0, 'BEEF SPAGHETTI ', 'pasta6.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 100000),
(34, 4, 0, 'BEEF FETTUCCINE  ', 'pasta5.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 100000),
(35, 3, 0, 'SPLITZA CLASSIC', 'pizza4.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 100000),
(36, 3, 0, 'VEGGIE GARDEN', 'pizza5.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 100000),
(37, 3, 0, 'MEAT LOVERS', 'pizza6.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 100000),
(38, 3, 0, 'MEAT LOVERS CHEESY MAYO', 'pizza7.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 100000),
(39, 3, 0, 'MEAT LOVERS CHICKEN', 'pizza8.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 100000),
(40, 3, 0, 'SUPER SUPREME', 'pizza9.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 100000),
(41, 3, 0, 'AMERICAN FAVOURITE', 'pizza10.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', 100000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `diskon_tbl`
--
ALTER TABLE `diskon_tbl`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indeks untuk tabel `kategori_tbl`
--
ALTER TABLE `kategori_tbl`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `member_tbl`
--
ALTER TABLE `member_tbl`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `ongkir_tbl`
--
ALTER TABLE `ongkir_tbl`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `order_detail_tbl`
--
ALTER TABLE `order_detail_tbl`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indeks untuk tabel `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `pembayaran_tbl`
--
ALTER TABLE `pembayaran_tbl`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `diskon_tbl`
--
ALTER TABLE `diskon_tbl`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategori_tbl`
--
ALTER TABLE `kategori_tbl`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `member_tbl`
--
ALTER TABLE `member_tbl`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `ongkir_tbl`
--
ALTER TABLE `ongkir_tbl`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `order_detail_tbl`
--
ALTER TABLE `order_detail_tbl`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT untuk tabel `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT untuk tabel `pembayaran_tbl`
--
ALTER TABLE `pembayaran_tbl`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
