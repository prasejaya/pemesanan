-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2019 at 11:21 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pesanan`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_beli`
--

CREATE TABLE IF NOT EXISTS `detail_beli` (
`id` int(11) NOT NULL,
  `id_beli` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `detail_beli`
--

INSERT INTO `detail_beli` (`id`, `id_beli`, `id_produk`, `jumlah`) VALUES
(29, 10, 18, 5),
(30, 11, 19, 9),
(31, 11, 17, 6),
(32, 12, 16, 9),
(33, 13, 15, 5),
(34, 14, 18, 8),
(35, 14, 19, 3),
(36, 15, 15, 3),
(37, 15, 18, 9);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE IF NOT EXISTS `jenis` (
`id_jenis` int(11) NOT NULL,
  `jenis` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `jenis`) VALUES
(1, 'Martabak'),
(2, 'Terang Bulan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id_kategori` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE IF NOT EXISTS `keranjang` (
`id_belanja` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_session` varchar(100) NOT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_belanja`, `id_produk`, `id_session`, `jumlah`) VALUES
(3, 18, 'jk7fdvv0mmnplmpr0kmto41r26', 4),
(4, 17, 'jk7fdvv0mmnplmpr0kmto41r26', 4),
(5, 15, 'a5sdchkkpkk78cd5fbvhuotoe5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
`id_beli` int(11) NOT NULL,
  `tgl_beli` date NOT NULL,
  `nama` varchar(25) NOT NULL,
  `no_meja` varchar(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `bayar` bigint(20) NOT NULL,
  `kd_kasa` varchar(10) NOT NULL,
  `ket` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_beli`, `tgl_beli`, `nama`, `no_meja`, `kode`, `bayar`, `kd_kasa`, `ket`) VALUES
(10, '2016-04-07', 'Wawan', '12', 'PYN02', 10000, 'KASA01', 'Lunas'),
(11, '2016-04-07', 'Popi', '4', 'PYN02', 123000, 'KASA02', 'Lunas'),
(12, '2016-04-07', 'Nida', '8', 'PYN02', 180000, 'KASA02', 'Lunas'),
(13, '2016-04-07', 'Endi', '3', 'PYN01', 65000, 'KASA02', 'Lunas'),
(14, '2016-04-08', 'Roro', '8', 'PYN02', 46000, 'KASA01', 'Lunas'),
(15, '2016-04-08', 'Dodo', '15', 'PYN01', 57000, 'ADM2016', 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
`id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_kategori` varchar(5) NOT NULL,
  `harga` int(20) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_jenis`, `id_kategori`, `harga`, `gambar`, `deskripsi`) VALUES
(15, 'Ayam Penyet', 1, '1', 13000, 'Ayam Penyet.jpg', 'Ayam Penyet diambil dari daging ayam kampung pilihan.'),
(16, 'Pizza Sosis', 2, '1', 20000, 'Pizza Sosis.jpg', 'Pizza dari sosis '),
(17, 'Susu Murni', 1, '2', 5500, 'susu-murni.jpeg', 'Susu murni nikmat'),
(18, 'Sorabi', 1, '1', 2000, 'sorabi.jpg', 'Sorabi rasa original dengan texture empuk'),
(19, 'Paket Nasi 1', 1, '1', 10000, 'paket1.jpg', 'Paket Nasi 1. Nasi dengan ayam bakar ditambah sambel dan lalab. Dijamin kenyang.'),
(20, 'Jjajangmyeon', 3, '1', 15000, 'Jjajangmyeon.jpg', 'Terbuat dari mie khas Korea Selatan'),
(21, 'Tea Omijacha', 3, '2', 7000, 'Tea-Omijacha.jpg', 'Teh dengan warna merah delima khas Korea Selatan'),
(22, 'Onigiri', 4, '1', 12000, 'onigiri.jpg', 'Nasi dengan balutan rumput laut'),
(23, 'Tea Ocha', 4, 'Kateg', 5500, 'Ocha.jpg', 'Teh asli Jepang'),
(24, 'Nicoise Salad', 2, '1', 20000, 'Nicoise Salad.jpg', 'Terbuat dari sayuran segar dicampur daging dan telur rebus'),
(25, 'Eggnog', 2, '2', 10000, 'Eggnog.jpg', 'Minuman terbuat dari telur'),
(26, 'Mugicha', 4, '2', 7000, 'mugicha.jpg', 'Terbuat dari gandum bakar'),
(27, 'Sushi', 4, '1', 10000, 'sushi.jpg', 'Nasi dan daging ikan'),
(28, 'Kelapa Muda', 1, '2', 5000, 'Es kelapa muda.png', 'Kelapa hijau yang masih segar');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `kode` varchar(8) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` enum('Admin','Kasir','Pelayan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kode`, `nama_user`, `username`, `password`, `level`) VALUES
('ADM2016', 'Vita', 'admin', '1234', 'Admin'),
('KASA01', 'Coba', 'kasa1', '1234', 'Kasir'),
('KASA02', 'Budi', 'kasa2', '1234', 'Kasir'),
('PYN01', 'Udin', 'udin', '1234', 'Pelayan'),
('PYN02', 'Budiman', 'budi', '1234', 'Pelayan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_beli`
--
ALTER TABLE `detail_beli`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
 ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
 ADD PRIMARY KEY (`id_belanja`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
 ADD PRIMARY KEY (`id_beli`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_beli`
--
ALTER TABLE `detail_beli`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
MODIFY `id_belanja` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
MODIFY `id_beli` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
