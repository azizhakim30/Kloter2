-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Feb 2021 pada 15.34
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsepeda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `idcart` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`idcart`, `orderid`, `userid`) VALUES
(1, '16Zwn00yw/Sko', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cycle`
--

CREATE TABLE `cycle` (
  `idsepeda` int(11) NOT NULL,
  `nama_s` varchar(30) NOT NULL,
  `harga_s` int(11) NOT NULL,
  `stock_s` int(11) NOT NULL,
  `image_s` varchar(100) NOT NULL,
  `merkid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cycle`
--

INSERT INTO `cycle` (`idsepeda`, `nama_s`, `harga_s`, `stock_s`, `image_s`, `merkid`) VALUES
(1, 'Strom Wincycle', 2000000, 10, 'images/wincycle1.jpg', 1),
(2, 'Polygon XTRADA 5', 3000000, 5, 'images/polygon_xtrada5.png', 2),
(3, 'Atlantis AT69', 2500000, 2, 'images/atlantis_at69.jpg', 5),
(4, 'Odessy MTB', 2000000, 1, 'images/odessy_mtb.jpg', 4),
(5, 'United ELBRUZ', 2300000, 3, 'images/united_elbruz.jpg', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailorder`
--

CREATE TABLE `detailorder` (
  `detailid` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `idsepeda` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detailorder`
--

INSERT INTO `detailorder` (`detailid`, `orderid`, `idsepeda`, `qty`) VALUES
(9, '16Zwn00yw/Sko', 1, 2),
(10, '16Zwn00yw/Sko', 2, 1),
(11, '16Zwn00yw/Sko', 3, 1),
(12, '16Zwn00yw/Sko', 4, 2),
(13, '16Zwn00yw/Sko', 5, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `merk`
--

CREATE TABLE `merk` (
  `merkid` int(11) NOT NULL,
  `name_m` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `merk`
--

INSERT INTO `merk` (`merkid`, `name_m`) VALUES
(1, 'Wimcycle'),
(2, 'Polygon'),
(3, 'United'),
(4, 'Odessy'),
(5, 'Atlantis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `nama_u` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userid`, `nama_u`, `email`, `password`) VALUES
(1, 'Aziz', 'azizul.h@outlook.co.id', '$2y$10$hBO0Bkrnh6DByHSMt5QhluzuDYHugZ0MkDvmvePzIy6St/H6TFZje'),
(2, 'Alvin', 'alvin@gmail.com', '$2y$10$nR8EnXSM7jGHbQS3cT/PuOm5h/u0SpmlmrIfdlZTKDFStX/SoFg2e'),
(3, 'Mitha', 'mitha@gmail.com', '$2y$10$6.nLyLCGrJrSrPaKsMitJuf57VCuFTr5hWtCJPxBb2geDG3VwrKTa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idcart`);

--
-- Indeks untuk tabel `cycle`
--
ALTER TABLE `cycle`
  ADD PRIMARY KEY (`idsepeda`);

--
-- Indeks untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  ADD PRIMARY KEY (`detailid`);

--
-- Indeks untuk tabel `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`merkid`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `idcart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `cycle`
--
ALTER TABLE `cycle`
  MODIFY `idsepeda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `detailorder`
--
ALTER TABLE `detailorder`
  MODIFY `detailid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `merk`
--
ALTER TABLE `merk`
  MODIFY `merkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
