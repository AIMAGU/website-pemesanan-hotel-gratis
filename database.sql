-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2012 at 11:50 
-- Server version: 5.1.42
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tugas7`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `jenisid` varchar(10) NOT NULL,
  `noid` varchar(20) NOT NULL,
  `tlp` varchar(15) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`nama`, `email`, `username`, `jenisid`, `noid`, `tlp`) VALUES
('Nur Rochim', 'ochi.noor@ymail.com', 'admin', 'sim', '90223212132', '085647378544'),
('Alip Nasrul Hidayat', 'alip@student.fkip.uns.ac.id', 'alip', 'sim', '99120120123', '085647378222'),
('Linda Anugrah', 'linda@gmail.com', 'linda', 'ktp', '22222221111', '08882962724'),
('Rochim', 'rochim@gmail.com', 'ocim', 'ktp', '33121234', '085742974922');

-- --------------------------------------------------------

--
-- Table structure for table `detailtransaksi`
--

CREATE TABLE IF NOT EXISTS `detailtransaksi` (
  `iddetail` int(11) NOT NULL AUTO_INCREMENT,
  `idtransaksi` varchar(6) NOT NULL,
  `idkamar` varchar(4) NOT NULL,
  `tglmasuk` date NOT NULL,
  `tglkeluar` date NOT NULL,
  `lama` int(3) NOT NULL,
  PRIMARY KEY (`iddetail`),
  KEY `idtransaksi` (`idtransaksi`),
  KEY `idkamar` (`idkamar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `detailtransaksi`
--

INSERT INTO `detailtransaksi` (`iddetail`, `idtransaksi`, `idkamar`, `tglmasuk`, `tglkeluar`, `lama`) VALUES
(49, 'T00003', 'M007', '2012-06-23', '2012-06-24', 1),
(57, 'T00008', 'M001', '2012-06-27', '2012-06-29', 2);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `idberita` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(30) NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `berita` text NOT NULL,
  PRIMARY KEY (`idberita`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`idberita`, `judul`, `gambar`, `berita`) VALUES
(1, 'LIO ROOM RESERVATION', 'gambar/gam1.jpg', 'Lio room reservation. Harga bagus, fasilitas maju terus. Segera reservasi sekarang.'),
(2, 'MAWAR SUPERIOR ROOM', 'gambar/gam2.jpg', 'Merupakan salah satu kamar yang kami sediakan untuk memanjakan anda dengan kenyamanan ruangan dan fasilitas yang terjangkau. Segera reservasi sekarang.'),
(3, 'ANGGREK JUNIOR ROOMS', 'gambar/gam3.jpg', 'Fitur kamar kelas menengah yang tidak kalah dengan kamar hotel-hotel berbintang. Segera reservasi sekarang.'),
(4, 'ANGGREK SUPERIOR ROOMS', 'gambar/gam4.jpg', 'Tersedia 10 kamar yang terletak dibagian depan LIO ROOM RESERVATION. Segera reservasi sekarang.'),
(5, 'MELATI SUPERIOR ROOMS', 'gambar/gam5.jpg', 'Salah satu fitur terbaik yang banyak di gemari pengunjung. Segera reservasi sekarang.'),
(6, 'MELATI JUNIOR ROOMS', 'gambar/gam6.jpg', 'Tersedia 20 kamar yang dapat dijangkau oleh segala kalangan. Segera reservasi sekarang.');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE IF NOT EXISTS `kamar` (
  `idkamar` varchar(4) NOT NULL,
  `namakamar` varchar(30) NOT NULL,
  `harga` int(10) NOT NULL,
  `idkategorikamar` varchar(4) NOT NULL,
  PRIMARY KEY (`idkamar`),
  KEY `idkategorikamar` (`idkategorikamar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`idkamar`, `namakamar`, `harga`, `idkategorikamar`) VALUES
('M001', 'Mawar Superior', 300000, 'K001'),
('M002', 'Anggrek Superior', 250000, 'K002'),
('M003', 'Melati Superior', 225000, 'K003'),
('M004', 'Mawar Medium', 200000, 'K001'),
('M005', 'Anggrek Medium', 175000, 'K002'),
('M006', 'Melati Medium', 150000, 'K003'),
('M007', 'Mawar Junior', 150000, 'K001'),
('M008', 'Anggrek Junior', 125000, 'K002'),
('M009', 'Melati Junior', 100000, 'K003');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `idkategorikamar` varchar(4) NOT NULL,
  `namakategori` varchar(30) NOT NULL,
  PRIMARY KEY (`idkategorikamar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategorikamar`, `namakategori`) VALUES
('K001', 'Mawar'),
('K002', 'Anggrek'),
('K003', 'Melati');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE IF NOT EXISTS `kontak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `komentar` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `alamat`, `email`, `tanggal`, `komentar`) VALUES
(1, 'Rochim', 'Sukoharjo', 'mencoba@gmail.com', '24/06/2012 8:02:45', 'Bagaimana cara reservasi via fax?'),
(2, 'Ocim', 'solo', 'ocim@gmail.com', '24/06/2012 8:21:31', 'Apakah pada bulan puasa besuk ada promo? saya mau reservasi tapi nunggu ada promo dari lio rr :)'),
(3, 'linda', 'nganjuk', 'lindaaw@gmail.com', '24/06/2012 8:29:38', 'saya pengen reservasi lagi. harganya murah sebanding dengan fasilitas yang ditawarkan. terima kasih'),
(4, 'arkan', 'jogja', 'airsuci@gmail.com', '24/06/2012 8:30:26', 'iseng ngisi aja ya, sukses pokoke'),
(5, 'MOHAN', 'ponorogo', 'admin@mohanlink', '24/06/2012 8:30:28', 'Lebih diperbanyak promonya saja biar banyak pelanggan,hehehe'),
(6, 'WIWIK', 'sragen', 'wiwikmul@yahoo.com', '24/06/2012 10:41:13', 'makananya enak pak'),
(7, 'FAQIH ASYHARI', 'sukoharjo', 'faqih_asyhari@plasa.com', '25/06/2012 11:04:48', 'webnya bagus pak, sudah saya polling.');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `idtransaksi` varchar(6) NOT NULL,
  `pembeli` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`idtransaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `pembeli`, `tanggal`) VALUES
('T00006', 'admin', '2012-06-23'),
('T00007', 'linda', '2012-06-23'),
('T00008', 'ocim', '2012-06-23'),
('T00009', 'alip', '2012-06-25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `status`) VALUES
('admin', '69a52e326bddd04e73336e15694b7d6c', 'admin'),
('alip', 'a86c899398a60d79e0de9d8fa1ae9b04', 'customer'),
('linda', 'eaf450085c15c3b880c66d0b78f2c041', 'customer'),
('ocim', '65690462129f9fa945cc54162bae5803', 'customer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
