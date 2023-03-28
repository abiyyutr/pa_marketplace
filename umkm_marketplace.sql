-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2022 at 06:56 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umkm_marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `background`
--

CREATE TABLE `background` (
  `id_background` int(5) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `background`
--

INSERT INTO `background` (`id_background`, `gambar`) VALUES
(1, 'yellow');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id_header` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id_header`, `judul`, `url`, `gambar`, `tgl_posting`) VALUES
(31, 'Header3', '', 'header3.jpg', '2011-04-06'),
(32, 'Header2', '', 'header1.jpg', '2011-04-06'),
(33, 'Header1', '', 'header2.jpg', '2011-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(5) NOT NULL,
  `nama_website` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `facebook` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `rekening` varchar(100) NOT NULL,
  `no_telp` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `meta_deskripsi` varchar(250) NOT NULL,
  `meta_keyword` varchar(250) NOT NULL,
  `favicon` varchar(50) NOT NULL,
  `maps` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_website`, `email`, `url`, `facebook`, `rekening`, `no_telp`, `meta_deskripsi`, `meta_keyword`, `favicon`, `maps`) VALUES
(1, 'U-MART | Marketplace Produk Berkualitas', 'admin@gmail.com', 'http://localhost:8080/pa_marketplace', 'https://www.instagram.com/biyyuutr', '', '085271239466', 'U-MART adalah marketplace yang menawarkan pengalaman belanja online yang cepat, aman dan nyaman dengan kategori produk yang paling lengkap di Indonesia', 'U-MART,Marketplace, Belanja online', 'logoPA2.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `iklanatas`
--

CREATE TABLE `iklanatas` (
  `id_iklanatas` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `iklanatas`
--

INSERT INTO `iklanatas` (`id_iklanatas`, `judul`, `username`, `url`, `gambar`, `tgl_posting`) VALUES
(41, 'Mari berbelanja di Toko Fathia Rafa', 'slide', 'http://localhost:8080/pa_marketplace/', 'Screenshot_2021-07-19-13-17-57-181.jpg', '2021-09-02'),
(42, 'Iklan atas 3', 'default', 'http://localhost:8080/pa_marketplace/', 'ss_toko_fathia.PNG', '2022-03-22'),
(43, 'Iklan atas 4', 'default', 'http://localhost:8080/pa_marketplace/', 'indrayastore1.PNG', '2022-07-20'),
(44, 'Iklan atas 5', 'default', 'http://localhost:8080/pa_marketplace/', 'Screenshot_2021-07-19-13-24-39-22.jpg', '2021-09-02'),
(45, 'Iklan atas 6', 'default', 'http://localhost:8080/pa_marketplace/', 'bajukaos2.PNG', '2022-07-20'),
(47, 'Ayo berbelanja di Toko Berkah', 'slide', 'http://localhost:8080/pa_marketplace/', 'Screenshot_2021-07-19-13-24-39-222.jpg', '2022-06-02'),
(49, 'Ayo berbelanja di Indraya Store', 'slide', 'http://localhost:8080/pa_marketplace/', 'indrayastore.PNG', '2022-07-20'),
(48, 'Ayo berbelanja di Toko Ikhsan Jaya', 'slide', 'http://localhost:8080/pa_marketplace/', 'tokoikhsanjaya(1).PNG', '2022-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id_logo` int(5) NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id_logo`, `gambar`) VALUES
(15, 'logoPA2.png');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(5) NOT NULL,
  `id_parent` int(5) NOT NULL DEFAULT '0',
  `nama_menu` varchar(30) NOT NULL,
  `link` varchar(100) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL DEFAULT 'Ya',
  `position` enum('Top','Bottom') DEFAULT 'Bottom',
  `urutan` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_parent`, `nama_menu`, `link`, `aktif`, `position`, `urutan`) VALUES
(112, 22, 'Dalam Negeri', '#', 'Ya', 'Bottom', 20),
(151, 0, 'Semua Produk', 'produk', 'Ya', 'Bottom', 5),
(126, 22, 'Luar Negeri', '#', 'Ya', 'Bottom', 21),
(149, 0, 'Lacak Pesanan', 'konfirmasi/tracking', 'Ya', 'Bottom', 8),
(152, 0, 'Semua UMKM', 'produk/reseller', 'Ya', 'Bottom', 6),
(155, 0, 'Pesanan Saya', 'members/orders_report', 'Ya', 'Bottom', 9);

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(5) NOT NULL,
  `nama_modul` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `static_content` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `publish` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `status` enum('user','admin') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `urutan` int(5) NOT NULL,
  `link_seo` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `username`, `link`, `static_content`, `gambar`, `publish`, `status`, `aktif`, `urutan`, `link_seo`) VALUES
(2, 'Manajemen User', 'admin', 'manajemenuser', '', '', 'Y', 'user', 'Y', 0, ''),
(71, 'Background Website', 'admin', 'background', '', '', 'N', 'admin', 'N', 0, ''),
(10, 'Manajemen Modul', 'admin', 'manajemenmodul', '', '', 'Y', 'user', 'Y', 0, ''),
(45, 'Template Website', 'admin', 'templatewebsite', '', '', 'Y', 'user', 'Y', 0, ''),
(61, 'Identitas Website', 'admin', 'identitaswebsite', '', '', 'Y', 'user', 'Y', 0, ''),
(57, 'Menu Website', 'admin', 'menuwebsite', '', '', 'Y', 'user', 'Y', 0, ''),
(59, 'Halaman Baru', 'admin', 'halamanbaru', '', '', 'Y', 'user', 'Y', 0, ''),
(66, 'Logo Website', 'admin', 'logowebsite', '', '', 'Y', 'user', 'Y', 0, ''),
(67, 'Iklan Sidebar', 'admin', 'iklansidebar', '', '', 'N', 'admin', 'N', 0, ''),
(68, 'Iklan Home', 'admin', 'iklanhome', '', '', 'N', 'admin', 'N', 0, ''),
(69, 'Iklan Atas', 'admin', 'iklanatas', '', '', 'N', 'admin', 'N', 0, ''),
(75, 'Alamat Kontak', 'admin', 'alamat', '', '', 'Y', 'admin', 'Y', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `rb_kategori_produk`
--

CREATE TABLE `rb_kategori_produk` (
  `id_kategori_produk` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `kategori_seo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_kategori_produk`
--

INSERT INTO `rb_kategori_produk` (`id_kategori_produk`, `nama_kategori`, `kategori_seo`) VALUES
(1, 'Aksesoris & Komputer', 'aksesoris-gadget--komputer'),
(19, 'Makanan Hewan', 'makanan-hewan'),
(20, 'Baju Distro', 'baju-distro'),
(18, 'Bahan Pokok', 'bahan-pokok'),
(10, 'Tas, Koper & Perjalanan', 'tas-koper--perjalanan'),
(12, 'Rumah Tangga', 'rumah-tangga'),
(13, 'Taman dan Alat Dapur', 'taman-dan-alat-dapur'),
(16, 'Makanan & Minuman', 'makanan--minuman'),
(17, 'Baju Anak-Anak', 'baju-anakanak');

-- --------------------------------------------------------

--
-- Table structure for table `rb_kategori_produk_sub`
--

CREATE TABLE `rb_kategori_produk_sub` (
  `id_kategori_produk_sub` int(11) NOT NULL,
  `id_kategori_produk` int(11) NOT NULL,
  `nama_kategori_sub` varchar(255) NOT NULL,
  `kategori_seo_sub` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_kategori_produk_sub`
--

INSERT INTO `rb_kategori_produk_sub` (`id_kategori_produk_sub`, `id_kategori_produk`, `nama_kategori_sub`, `kategori_seo_sub`) VALUES
(7, 6, 'Baju Anak-Anak', 'baju-anakanak'),
(2, 2, 'Busana Wanita Muslimah', 'busana-wanita-muslimah'),
(6, 6, 'Busana Pria Muslim', 'busana-pria-muslim'),
(9, 17, 'Baju Anak Cowok', 'baju-anak-cowok'),
(10, 17, 'Baju Anak Cewek', 'baju-anak-cewek'),
(11, 16, 'Air Mineral', 'air-mineral'),
(12, 16, 'Teh', 'teh'),
(13, 16, 'Kopi', 'kopi'),
(14, 16, 'Minuman Energi & Isotonik', 'minuman-energi--isotonik'),
(15, 16, 'Minuman Bersoda', 'minuman-bersoda');

-- --------------------------------------------------------

--
-- Table structure for table `rb_keterangan`
--

CREATE TABLE `rb_keterangan` (
  `id_keterangan` int(5) NOT NULL,
  `id_reseller` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_posting` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_keterangan`
--

INSERT INTO `rb_keterangan` (`id_keterangan`, `id_reseller`, `keterangan`, `tanggal_posting`) VALUES
(1, 2, '<b>Informasi dari Toko :</b><p></p>\r\n<p>Pembayaran melalui COD dan transfer antar bank</p>', '2017-03-31'),
(4, 13, 'Toko yang menjual baju anak-anak.<div><div><b>Transfer Antar Bank ( Bank BRI A/N Ahmad Hamzah)</b></div><div><b>No Rekening : 1430839232343</b></div></div><div><br></div>', '2022-02-15'),
(5, 14, '<p>Menjual barang-barang pokok harian</p>', '2022-04-05'),
(6, 15, '<p>Kami menjual beragam kebutuhan harian dan aksesoris hewan peliharaan anda dengan kualitas terbaik dan harga yang terjangkau<br></p>', '2022-04-11'),
(7, 16, '<p>Menjual semua Produk Sembako, Reseller Resmi - Selempang, Baju Toga, Baju Pawai Anak, Handuk Bordir, Topi, Kaos<br></p>', '2022-04-11'),
(8, 17, '<p>Menjual makanan kucing</p>', '2022-06-01'),
(2, 6, '<p>asdasdasd</p>', '2019-09-07'),
(3, 1, '<p>Menjual barang-barang harian</p>', '2019-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `rb_konfirmasi_pembayaran_konsumen`
--

CREATE TABLE `rb_konfirmasi_pembayaran_konsumen` (
  `id_konfirmasi_pembayaran` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `total_transfer` varchar(20) NOT NULL,
  `id_rekening` int(11) NOT NULL,
  `nama_pengirim` varchar(255) NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `bukti_transfer` varchar(255) NOT NULL,
  `foto_brg_diterima` varchar(255) NOT NULL,
  `waktu_konfirmasi` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_konfirmasi_pembayaran_konsumen`
--

INSERT INTO `rb_konfirmasi_pembayaran_konsumen` (`id_konfirmasi_pembayaran`, `id_penjualan`, `total_transfer`, `id_rekening`, `nama_pengirim`, `tanggal_transfer`, `bukti_transfer`, `foto_brg_diterima`, `waktu_konfirmasi`) VALUES
(85, 388, 'Rp 24,000', 8, 'Abiyyu', '2022-07-18', 'bukti_transfer311.jpg', 'bukti_transfer311.jpg', '2022-07-20 20:45:03'),
(87, 391, 'Rp 35,000', 9, 'Akbar', '2022-07-18', 'bukti_transfer312.jpg', 'bukti_transfer312.jpg', '2022-07-20 21:04:23'),
(86, 393, 'Rp 14,000', 7, 'Akbar', '2022-07-20', 'bukti_transfer32.jpg', 'bukti_transfer32.jpg', '2022-07-20 21:03:57'),
(83, 386, 'Rp 62,000', 10, 'Abiyyu', '2022-07-20', 'bukti_transfer_phpmu12.jpeg', 'bukti_transfer_phpmu12.jpeg', '2022-07-20 20:38:05'),
(78, 376, 'Rp 22,500', 8, 'Muhammad Faishal', '2022-07-16', 'IMG-20190217-WA000221.jpg', 'IMG-20190217-WA000221.jpg', '2022-07-16 22:46:59'),
(81, 381, 'Rp 30,700', 8, 'Abiyyu', '2022-07-13', 'Screenshot_20190227-155933_BCA_mobile211.jpg', 'Screenshot_20190227-155933_BCA_mobile211.jpg', '2022-07-20 19:35:53'),
(84, 387, 'Rp 35,000', 9, 'Abiyyu', '2022-07-20', 'bukti_transfer_phpmu13.jpeg', 'bukti_transfer_phpmu13.jpeg', '2022-07-20 20:43:02'),
(88, 390, 'Rp 24,000', 11, 'Akbar', '2022-07-16', 'bukti_transfer3121.jpg', 'bukti_transfer3121.jpg', '2022-07-20 21:04:55'),
(89, 389, 'Rp 57,000', 10, 'Akbar', '2022-07-20', 'bajukaos2.PNG', 'bajukaos2.PNG', '2022-07-20 21:05:09'),
(90, 395, 'Rp 62,000', 8, 'Abiyyu', '2022-07-22', 'testprint.png', 'testprint.png', '2022-07-22 15:21:53'),
(91, 397, 'Rp 111,000', 8, 'Abiyyu', '2022-07-25', 'chart.png', 'chart.png', '2022-07-25 16:42:07'),
(92, 398, 'Rp 82,000', 8, 'Abiyyu', '2022-07-25', 'chart1.png', 'chart1.png', '2022-07-25 17:00:39'),
(96, 404, 'Rp 82,000', 8, 'Abiyyu', '2022-07-25', 'istockphoto-137538856-170667a1.jpg', 'istockphoto-137538856-170667a1.jpg', '2022-07-25 20:14:32'),
(95, 403, 'Rp 34,000', 8, 'gtg', '2022-07-25', 'istockphoto-137538856-170667a.jpg', 'istockphoto-137538856-170667a.jpg', '2022-07-25 19:48:54'),
(97, 407, 'Rp 111,000', 8, 'Abiyyu', '2022-07-28', 'logokwuindividu.PNG', 'logokwuindividu.PNG', '2022-07-28 15:30:54'),
(98, 408, 'Rp 34,000', 8, 'Biyyu', '2022-07-31', 'logokwuindividu1.PNG', 'logokwuindividu1.PNG', '2022-07-31 21:34:38'),
(99, 410, 'Rp 62,000', 10, 'Abiyyu', '2022-08-09', 'Sertifikat_Cognitiveclass_AbiyyuTR.PNG', 'Sertifikat_Cognitiveclass_AbiyyuTR.PNG', '2022-08-09 20:46:46'),
(100, 411, 'Rp 62,000', 8, 'Abiyyu', '2022-08-23', 'ss_nilai_smt_8.PNG', 'ss_nilai_smt_8.PNG', '2022-08-23 21:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `rb_konsumen`
--

CREATE TABLE `rb_konsumen` (
  `id_konsumen` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` text NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `kota_id` int(11) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tanggal_daftar` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_konsumen`
--

INSERT INTO `rb_konsumen` (`id_konsumen`, `username`, `password`, `nama_lengkap`, `email`, `jenis_kelamin`, `alamat_lengkap`, `kecamatan`, `kelurahan`, `kota_id`, `no_hp`, `foto`, `tanggal_daftar`) VALUES
(30, 'anti', '690df62f8da3979000f80567f4651a5499f8a69a4022268b36e11908642ede4c56ce7a842b09aaf558c9d50164174bcb68c7ba781c02714e3aa5f846fb2cb74e', 'Fitrianti', 'fitrianti18si@mahasiswa.pcr.ac.id', 'Perempuan', 'Jalan Umban Sari Rumbai', 'Rumbai', '', 350, '085241314421', '', '2022-04-06'),
(29, 'faishal', '7c3cd1704c4072f869bf9fd0db6afdcd994800ef6de316fd51a1252d7514a8f3205cca8a6b31220c9a0116f6acb88e5e5494156fd647d2a1364c64ebf5a06b27', 'Muhammad Faishal', 'faishal@gmail.com', 'Laki-laki', 'Jln Pemuda ', 'Payung Sekali', '', 350, '08121322311', '', '2022-02-15'),
(48, 'irwan', 'ff59927dd175d0e9e9eb0e789f1504add261ab5b44ba9b80e42d6877c7c5e24854d07def6f6c975623ce8bf9a1abf7f065fbcfe66f6f3ea755fc28dce3cc726e', 'Irwan Syahyus', 'irwansyahyus@gmail.com', 'Laki-laki', 'Jl. Sempurna', 'Payung Sekali', '', 350, '085271234567', '', '2022-07-04'),
(32, 'andika', '659c1d27a7193ea93899e46ddd0733c6c8c51382e35c11b80f5705947239cca92d423f0968ed5d881c69ac3ef0ee8ceb8b262508954cdc78cfb31a7026f1bd1b', 'Andika Tri Ramadhan', 'andika18si@mahasiswa.pcr.ac.id', 'Laki-laki', 'Rumbai', 'Rumbai', '', 350, '082385335854', '', '2022-04-12'),
(61, 'ayah', 'a297c7dd10527042694995d53a361edd1ec294605ef525cf776400724d5afa5401796696c9a186bc80cc84a9dc05ab871c5de73c5458f851ebd26635362fcf2e', 'Ayah', 'ayah@gmail.com', 'Laki-laki', 'Jln sempurna', 'Payung Sekaki', 'Tampan', 350, '0851332144', '', '2022-07-21'),
(60, 'abiyyu', 'f2bbe4fad945bcb82eed4b840ea6a02668e7e49019edcbad902be812d2bc659891d420fc20aff983403f774dbae9f90334c3ccb81bd274ace5f09ea4230ab51e', 'Abiyyu Taufiq Ramadhan', 'abiyyuteer123@gmail.com', 'Laki-laki', 'Jln. Pemuda no 25', 'Payung Sekali', 'Tampan', 350, '085271239466', '', '2022-07-20'),
(33, 'jijah', 'afca912d6988503c38317ffafccf726556d4e81f5f692dc3063c64493aefc9a41b97d2c006427f951e8d551c445ffb97ef1a6d4c3253fcf9c226c74148f7ff94', 'Hajijah Noor', 'hajijah@gmail.com', 'Perempuan', 'Jl. Rowo Sari Kel. Umban Sari', 'Rumbai', '', 350, '0852713114113', '', '2022-07-04'),
(34, 'romiramadani', 'ab448d4492a34524abd528334ba5639aa00a8b4ed91a16b7fe12f1c56baa3ed7452c006c7f6c08e89e0ba24846c47c86e647d7617e97a340b037ed79704285cc', 'Romi Ramadani', 'romiramadani@gmail.com', 'Laki-laki', 'Jl. Inti Sari Kel. Umban Sari', 'Rumbai', '', 350, '0813654271188', '', '2022-07-04'),
(35, 'akbar', '2df14ebc27de7900fc0b00a4ccb4c0c31cfe490260ae277221bfbb9b0c03e4cd6a69506e525f2591c6f6ba0d3027b4a8b842719f02beea4e67b808f360255026', 'Akbar Muzaki', 'akbarmuzaki18@gmail.com', 'Laki-laki', 'Jl. Inti Sari Kelurahan Umban Sari', 'Rumbai', '', 350, '0852613187138', '', '2022-07-04'),
(36, 'aminah', '779aae9374c4ec6869ac15700b72ca8736a4f9d1ea7d715374a6124d9412f6dc1eaa4853c729697f75500111bdcb1a4ec4fd985cf143f8164c6546e2987aafc0', 'Siti Aminah', 'sitiaminah@gmail.com', 'Perempuan', 'Jl. Rowo Sari Kel. Umban Sari', 'Rumbai', '', 350, '0852173174883', '', '2022-07-04'),
(37, 'milaseptiyori', 'a290a7ab426dd7267c6e3ea2800caeddde359e867ffd9f710f88cffe3e6218a95de074a4779af58b258eab02e9b73ddb9dc30703ee972923eed34bbd030c8ef8', 'Mila Septiyori', 'mila@gmail.com', 'Perempuan', 'Jl. Harapan Raya', 'Tangkerang', '', 350, '0812842628288', '', '2022-07-04'),
(38, 'fortun', '14e467ea2c170d38828653ea80506c0b967c6b1263a5f4bde7e5d83e175d478c33ba90f67f43f6cf9355bce03db38bdfaf6f7ad76c35aa226006dc35b6d2e235', 'Dewi Fortuna', 'fortun@gmail.com', 'Perempuan', 'Jl. Kaharudin Nasution', 'Marpoyan Damai', '', 350, '0852842713433', '', '2022-07-04'),
(39, 'yulyfadiahaya', '87475ea8a32933bb30c5a12a73154b7161d2156971ea42f046a172989b12fb22edba5ab55e0650c3395922c1741309fbe7aee3c137917e25a40dcc3328bb4737', 'Yuly Fadiahaya', 'yulyfadiahaya@gmail.com', 'Perempuan', 'Jl. Kembang Sari Kel. Umban Sari', 'Rumbai', '', 350, '0852542711831', '', '2022-07-04'),
(40, 'winda', '6c6428391e02981ff00b699f8e880e566f788d991b25b88a3999f5c2a8807ba030c6c500cdc8cdbb92fdc9cd1dbd0f606d60e561ffac31537038d1947f5e16c8', 'Winda Dewi A.H.', 'winda18si@mahasiswa.pcr.ac.id', 'Perempuan', 'Jl. Kembang Sari', 'Rumbai', '', 350, '0813871396453', '', '2022-07-04'),
(41, 'abghi', 'bcd09be038227c0547fa5d03b1fa1c0651b6e9275eb7952b94de5647c248d077a36620f4b3c28a3444de4204ce4e2a034dc32d3cd7fc8fb68091d53e32399f7d', 'Abghi Fadlan', 'abghifadlan@gmail.com', 'Laki-laki', 'Jl. Umban Sari Atas', 'Rumbai', '', 350, '08527123647577', '', '2022-07-04'),
(42, 'raihan', '6839aa28c9844ed270d38a7b205431f92d4c396ca33ab8ddc22a1efb48ffc9ee5071d1c3fbae7dc25cec8339a0007e43a96ab22bcc728bc87770668901c20827', 'Raihan Azizy', 'raihan@gmail.com', 'Laki-laki', 'Jl. Serayu', 'Labuh Baru', '', 350, '0852713188472', '', '2022-07-04'),
(43, 'satria', '69b52258a80bc180b7b1a55bd824b500dc41d9731a69593c438c2b71aee4b645327f6687a497ef9859dd26f7c7d0c97b717765a3ae6eeef02db0f977a7728d4f', 'Satria Yunirman', 'satriayunirman16@gmail.com', 'Laki-laki', 'Jl. Pramuka', 'Rumbai Pesisir', '', 350, '0813546771332', '', '2022-07-04'),
(44, 'dimas', '8a7cae049641affbc7af07a739b687e438e444493ea68a048407cf78c99a7278e9d74e61649567e9ba2fe5708eaacc652bc1ba94fa64d6f831efced4374f526e', 'Dimas Bahri', 'dimasbahri@gmail.com', 'Laki-laki', 'Jl. Tegal Sari Ujung', 'Rumbai', '', 350, '0813576428882', '', '2022-07-04'),
(45, 'demitra', 'ddbd007ba3f0625c00db882f4fb92a1d76b6ded6091ee0761d44be5318c73387c57f9679355c4fc3b738220b263e149fc07f08d649883033d5803ba85c58fa2a', 'Demitra', 'demitra@gmail.com', 'Perempuan', 'Jl. Pemuda Kel. Tampan', 'Payung Sekali', '', 350, '085217274268', '', '2022-07-04'),
(46, 'yulhendra', 'a1f9c9d0a3483dfc48f241633cfe51e9f19e25883add6038427bc5bedb23fd47f10bd37fac12b451437b8fc66e5713202a7ea06e84136cfab4f7f624705efec8', 'Yulhendra', 'yulhendra3@gmail.com', 'Laki-laki', 'Jl. Pemuda Kel. Tampan', 'Payung Sekali', '', 350, '0813748239224', '', '2022-07-04'),
(47, 'andre', '981b71f4eca24db8125ef6895a537bc7deb7f87110f19420ec5fa0b320899c206e6c1fa78bfec52e589e1c10aa27cd23e53c6f580285c0d6b8da526199a48f7d', 'Andre', 'gustiandre@gmail.com', 'Laki-laki', 'Jl. Bukit Sari ', 'Rumbai', '', 350, '0812643873299', '', '2022-07-04'),
(49, 'ahmad', 'd0e3f60d0298b42968299572026a159093fad8905d9555a63e4c0a71068d4b3051bb22223682805f3bdd1e4672b70237e9d5e804ab8dd304afe7e2d26df7d0a4', 'Ahmad Hamzah', 'ahmadhamzah@gmail.com', 'Laki-laki', 'Jl. Pemuda Kel. Tampan', 'Payung Sekali', '', 350, '0813724568976', '', '2022-07-04'),
(50, 'sucinurhikmah', '73a73c1972446dfeb26a83411b0e79ff94af324b3045265988274afbc79eba1d83818e4a6321f48e796e88346ee1efd92d8bc333cb559f1758db7208bb887217', 'Suci Nurhikmah', 'sucinurhikmah12@gmail.com', 'Perempuan', 'Jl. Bukit Sari', 'Rumbai', '', 350, '0852673541345', '', '2022-07-04'),
(51, 'ranianjeli', '5af39b6a26bbedca1b10021c599d05b86a93a0fb61d480f4fb1703d8be16318b12bd962a6cebce0e8459f42a4c677e8c956083bdb3deff7c1c0b5d5a51529fd6', 'Rani Anjeli', 'rani18si@mahasiswa.pcr.ac.id', 'Perempuan', 'Jl. Bukit Sari', 'Rumbai', '', 350, '085216386422', '', '2022-07-04'),
(52, 'adella', '36cfda49e601fa76d015ecb5ddc25037076ce5a3a97c2fe05db69d1feee3e0d1e02182136e103055e02403ad5532709e157c0ca3616d081e0111f39051966c50', 'Adella Syafira', 'adellasyaf@gmail.com', 'Perempuan', 'jl. Bukit Sari', 'Rumbai', '', 350, '0852413738976', '', '2022-07-04'),
(53, 'febyola', '43df61317be776ee0581ddc690cd6ff568bb5ad702a6c08ef9881f3b5ce898d0682638dc524ba64942b68c1e9ae1c3793c78868992008ba54b376ad92e250290', 'Febyola Dwi Putri', 'yola18@gmail.com', 'Perempuan', 'Jl. Kartika Sari', 'Rumbai', '', 350, '081352637865', '', '2022-07-04'),
(54, 'veramaghfiroh', '43c6255beca90d1cd831de9ba667c77bf56eaef63a8d45f10cfbb779cdb106ebbab8a59890c5278f641922e0283d340c54171c7a46ef89fda91eb50b29f64078', 'Vera Maghfiroh', 'veramagh@gmail.com', 'Perempuan', 'Gg. Permata Sari', 'Rumbai', '', 350, '08138136131', '', '2022-07-04'),
(55, 'beatrix', '75747c4029a4fc05e6b9fd32aeccf1864900c975f6af0adadea54fbff64d5511d3b0712567bd74de5278e7065262941d08c18f2bdb14f637342a95ac57063713', 'Beatrix', 'beatrix@gmail.com', 'Perempuan', 'Jl. Umban Sari gg. permata sari', 'Rumbai', '', 350, '081276543211', '', '2022-07-04'),
(56, 'nadilla', '54e836dc75b9e464d5c48d617d6fb0db327a68d3a8c93d45cffd2a08d0165ba6f7afaa4653dd89d2cc0522b1e832953c9abca325de6af91b851548ac6bd03033', 'Nadilla Rizal', 'nadilarizal15@gmail.com', 'Perempuan', 'Jl. Fajar', 'Labuh Baru', '', 350, '081343732653', '', '2022-07-04'),
(57, 'apriyanti', 'f8d77a89aa40cad757572d358868e333294925833c7480ea62b25e91b4e979bd72ca9d8c03915cc0645021dc2736018c3fee8e01e794c3bcc9e0d4df5aca18d1', 'Apriyanti', 'apriyanti18@gmail.com', 'Perempuan', 'Jl. Fajar', 'Labuh Baru', '', 350, '085243567896', '', '2022-07-04'),
(58, 'bella', '77335524042122768640b0bb4aa726851ff1e66d6042e3b17405220adde922654d752cf4924d48bc399cd61856cc9c625ab0816b2396f4728bf66a2aa64d9f51', 'Bella Vebyola', 'bellaveb@gmail.com', 'Perempuan', 'Jl. Umban Sari gg. permata sari', 'Rumbai', '', 350, '0813542137866', '', '2022-07-04'),
(59, 'roni', '112e59768d0bc5ab141b5a2db37371224f71d8ce707fdeee4a557a368388303d7dd526959dc7bb1ee75f49633d2952cd76434751ec6bd8ca487c7c40067ef51b', 'Roni', 'roni@gmail.com', 'Laki-laki', 'Jln soekarno hatta', 'Tampan  ', 'Sidomulyo', 350, '085261317744', '', '2022-07-14');

-- --------------------------------------------------------

--
-- Table structure for table `rb_kota`
--

CREATE TABLE `rb_kota` (
  `kota_id` int(11) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_kota`
--

INSERT INTO `rb_kota` (`kota_id`, `provinsi_id`, `nama_kota`) VALUES
(17, 1, 'Badung'),
(32, 1, 'Bangli'),
(94, 1, 'Buleleng'),
(114, 1, 'Denpasar'),
(128, 1, 'Gianyar'),
(161, 1, 'Jembrana'),
(170, 1, 'Karangasem'),
(197, 1, 'Klungkung'),
(447, 1, 'Tabanan'),
(27, 2, 'Bangka'),
(28, 2, 'Bangka Barat'),
(29, 2, 'Bangka Selatan'),
(30, 2, 'Bangka Tengah'),
(56, 2, 'Belitung'),
(57, 2, 'Belitung Timur'),
(334, 2, 'Pangkal Pinang'),
(106, 3, 'Cilegon'),
(232, 3, 'Lebak'),
(331, 3, 'Pandeglang'),
(402, 3, 'Serang'),
(403, 3, 'Serang'),
(455, 3, 'Tangerang'),
(456, 3, 'Tangerang'),
(457, 3, 'Tangerang Selatan'),
(62, 4, 'Bengkulu'),
(63, 4, 'Bengkulu Selatan'),
(64, 4, 'Bengkulu Tengah'),
(65, 4, 'Bengkulu Utara'),
(175, 4, 'Kaur'),
(183, 4, 'Kepahiang'),
(233, 4, 'Lebong'),
(294, 4, 'Muko Muko'),
(379, 4, 'Rejang Lebong'),
(397, 4, 'Seluma'),
(39, 5, 'Bantul'),
(135, 5, 'Gunung Kidul'),
(210, 5, 'Kulon Progo'),
(419, 5, 'Sleman'),
(501, 5, 'Yogyakarta'),
(151, 6, 'Jakarta Barat'),
(152, 6, 'Jakarta Pusat'),
(153, 6, 'Jakarta Selatan'),
(154, 6, 'Jakarta Timur'),
(155, 6, 'Jakarta Utara'),
(189, 6, 'Kepulauan Seribu'),
(77, 7, 'Boalemo'),
(88, 7, 'Bone Bolango'),
(129, 7, 'Gorontalo'),
(130, 7, 'Gorontalo'),
(131, 7, 'Gorontalo Utara'),
(361, 7, 'Pohuwato'),
(50, 8, 'Batang Hari'),
(97, 8, 'Bungo'),
(156, 8, 'Jambi'),
(194, 8, 'Kerinci'),
(280, 8, 'Merangin'),
(293, 8, 'Muaro Jambi'),
(393, 8, 'Sarolangun'),
(442, 8, 'Sungaipenuh'),
(460, 8, 'Tanjung Jabung Barat'),
(461, 8, 'Tanjung Jabung Timur'),
(471, 8, 'Tebo'),
(22, 9, 'Bandung'),
(23, 9, 'Bandung'),
(24, 9, 'Bandung Barat'),
(34, 9, 'Banjar'),
(54, 9, 'Bekasi'),
(55, 9, 'Bekasi'),
(78, 9, 'Bogor'),
(79, 9, 'Bogor'),
(103, 9, 'Ciamis'),
(104, 9, 'Cianjur'),
(107, 9, 'Cimahi'),
(108, 9, 'Cirebon'),
(109, 9, 'Cirebon'),
(115, 9, 'Depok'),
(126, 9, 'Garut'),
(149, 9, 'Indramayu'),
(171, 9, 'Karawang'),
(211, 9, 'Kuningan'),
(252, 9, 'Majalengka'),
(332, 9, 'Pangandaran'),
(376, 9, 'Purwakarta'),
(428, 9, 'Subang'),
(430, 9, 'Sukabumi'),
(431, 9, 'Sukabumi'),
(440, 9, 'Sumedang'),
(468, 9, 'Tasikmalaya'),
(469, 9, 'Tasikmalaya'),
(37, 10, 'Banjarnegara'),
(41, 10, 'Banyumas'),
(49, 10, 'Batang'),
(76, 10, 'Blora'),
(91, 10, 'Boyolali'),
(92, 10, 'Brebes'),
(105, 10, 'Cilacap'),
(113, 10, 'Demak'),
(134, 10, 'Grobogan'),
(163, 10, 'Jepara'),
(169, 10, 'Karanganyar'),
(177, 10, 'Kebumen'),
(181, 10, 'Kendal'),
(196, 10, 'Klaten'),
(209, 10, 'Kudus'),
(249, 10, 'Magelang'),
(250, 10, 'Magelang'),
(344, 10, 'Pati'),
(348, 10, 'Pekalongan'),
(349, 10, 'Pekalongan'),
(352, 10, 'Pemalang'),
(375, 10, 'Purbalingga'),
(377, 10, 'Purworejo'),
(380, 10, 'Rembang'),
(386, 10, 'Salatiga'),
(398, 10, 'Semarang'),
(399, 10, 'Semarang'),
(427, 10, 'Sragen'),
(433, 10, 'Sukoharjo'),
(445, 10, 'Surakarta (Solo)'),
(472, 10, 'Tegal'),
(473, 10, 'Tegal'),
(476, 10, 'Temanggung'),
(497, 10, 'Wonogiri'),
(498, 10, 'Wonosobo'),
(31, 11, 'Bangkalan'),
(42, 11, 'Banyuwangi'),
(51, 11, 'Batu'),
(74, 11, 'Blitar'),
(75, 11, 'Blitar'),
(80, 11, 'Bojonegoro'),
(86, 11, 'Bondowoso'),
(133, 11, 'Gresik'),
(160, 11, 'Jember'),
(164, 11, 'Jombang'),
(178, 11, 'Kediri'),
(179, 11, 'Kediri'),
(222, 11, 'Lamongan'),
(243, 11, 'Lumajang'),
(247, 11, 'Madiun'),
(248, 11, 'Madiun'),
(251, 11, 'Magetan'),
(256, 11, 'Malang'),
(255, 11, 'Malang'),
(289, 11, 'Mojokerto'),
(290, 11, 'Mojokerto'),
(305, 11, 'Nganjuk'),
(306, 11, 'Ngawi'),
(317, 11, 'Pacitan'),
(330, 11, 'Pamekasan'),
(342, 11, 'Pasuruan'),
(343, 11, 'Pasuruan'),
(363, 11, 'Ponorogo'),
(369, 11, 'Probolinggo'),
(370, 11, 'Probolinggo'),
(390, 11, 'Sampang'),
(409, 11, 'Sidoarjo'),
(418, 11, 'Situbondo'),
(441, 11, 'Sumenep'),
(444, 11, 'Surabaya'),
(487, 11, 'Trenggalek'),
(489, 11, 'Tuban'),
(492, 11, 'Tulungagung'),
(61, 12, 'Bengkayang'),
(168, 12, 'Kapuas Hulu'),
(176, 12, 'Kayong Utara'),
(195, 12, 'Ketapang'),
(208, 12, 'Kubu Raya'),
(228, 12, 'Landak'),
(279, 12, 'Melawi'),
(364, 12, 'Pontianak'),
(365, 12, 'Pontianak'),
(388, 12, 'Sambas'),
(391, 12, 'Sanggau'),
(395, 12, 'Sekadau'),
(415, 12, 'Singkawang'),
(417, 12, 'Sintang'),
(18, 13, 'Balangan'),
(33, 13, 'Banjar'),
(35, 13, 'Banjarbaru'),
(36, 13, 'Banjarmasin'),
(43, 13, 'Barito Kuala'),
(143, 13, 'Hulu Sungai Selatan'),
(144, 13, 'Hulu Sungai Tengah'),
(145, 13, 'Hulu Sungai Utara'),
(203, 13, 'Kotabaru'),
(446, 13, 'Tabalong'),
(452, 13, 'Tanah Bumbu'),
(454, 13, 'Tanah Laut'),
(466, 13, 'Tapin'),
(44, 14, 'Barito Selatan'),
(45, 14, 'Barito Timur'),
(46, 14, 'Barito Utara'),
(136, 14, 'Gunung Mas'),
(167, 14, 'Kapuas'),
(174, 14, 'Katingan'),
(205, 14, 'Kotawaringin Barat'),
(206, 14, 'Kotawaringin Timur'),
(221, 14, 'Lamandau'),
(296, 14, 'Murung Raya'),
(326, 14, 'Palangka Raya'),
(371, 14, 'Pulang Pisau'),
(405, 14, 'Seruyan'),
(432, 14, 'Sukamara'),
(19, 15, 'Balikpapan'),
(66, 15, 'Berau'),
(89, 15, 'Bontang'),
(214, 15, 'Kutai Barat'),
(215, 15, 'Kutai Kartanegara'),
(216, 15, 'Kutai Timur'),
(341, 15, 'Paser'),
(354, 15, 'Penajam Paser Utara'),
(387, 15, 'Samarinda'),
(96, 16, 'Bulungan (Bulongan)'),
(257, 16, 'Malinau'),
(311, 16, 'Nunukan'),
(450, 16, 'Tana Tidung'),
(467, 16, 'Tarakan'),
(48, 17, 'Batam'),
(71, 17, 'Bintan'),
(172, 17, 'Karimun'),
(184, 17, 'Kepulauan Anambas'),
(237, 17, 'Lingga'),
(302, 17, 'Natuna'),
(462, 17, 'Tanjung Pinang'),
(21, 18, 'Bandar Lampung'),
(223, 18, 'Lampung Barat'),
(224, 18, 'Lampung Selatan'),
(225, 18, 'Lampung Tengah'),
(226, 18, 'Lampung Timur'),
(227, 18, 'Lampung Utara'),
(282, 18, 'Mesuji'),
(283, 18, 'Metro'),
(355, 18, 'Pesawaran'),
(356, 18, 'Pesisir Barat'),
(368, 18, 'Pringsewu'),
(458, 18, 'Tanggamus'),
(490, 18, 'Tulang Bawang'),
(491, 18, 'Tulang Bawang Barat'),
(496, 18, 'Way Kanan'),
(14, 19, 'Ambon'),
(99, 19, 'Buru'),
(100, 19, 'Buru Selatan'),
(185, 19, 'Kepulauan Aru'),
(258, 19, 'Maluku Barat Daya'),
(259, 19, 'Maluku Tengah'),
(260, 19, 'Maluku Tenggara'),
(261, 19, 'Maluku Tenggara Barat'),
(400, 19, 'Seram Bagian Barat'),
(401, 19, 'Seram Bagian Timur'),
(488, 19, 'Tual'),
(138, 20, 'Halmahera Barat'),
(139, 20, 'Halmahera Selatan'),
(140, 20, 'Halmahera Tengah'),
(141, 20, 'Halmahera Timur'),
(142, 20, 'Halmahera Utara'),
(191, 20, 'Kepulauan Sula'),
(372, 20, 'Pulau Morotai'),
(477, 20, 'Ternate'),
(478, 20, 'Tidore Kepulauan'),
(1, 21, 'Aceh Barat'),
(2, 21, 'Aceh Barat Daya'),
(3, 21, 'Aceh Besar'),
(4, 21, 'Aceh Jaya'),
(5, 21, 'Aceh Selatan'),
(6, 21, 'Aceh Singkil'),
(7, 21, 'Aceh Tamiang'),
(8, 21, 'Aceh Tengah'),
(9, 21, 'Aceh Tenggara'),
(10, 21, 'Aceh Timur'),
(11, 21, 'Aceh Utara'),
(20, 21, 'Banda Aceh'),
(59, 21, 'Bener Meriah'),
(72, 21, 'Bireuen'),
(127, 21, 'Gayo Lues'),
(230, 21, 'Langsa'),
(235, 21, 'Lhokseumawe'),
(300, 21, 'Nagan Raya'),
(358, 21, 'Pidie'),
(359, 21, 'Pidie Jaya'),
(384, 21, 'Sabang'),
(414, 21, 'Simeulue'),
(429, 21, 'Subulussalam'),
(68, 22, 'Bima'),
(69, 22, 'Bima'),
(118, 22, 'Dompu'),
(238, 22, 'Lombok Barat'),
(239, 22, 'Lombok Tengah'),
(240, 22, 'Lombok Timur'),
(241, 22, 'Lombok Utara'),
(276, 22, 'Mataram'),
(438, 22, 'Sumbawa'),
(439, 22, 'Sumbawa Barat'),
(13, 23, 'Alor'),
(58, 23, 'Belu'),
(122, 23, 'Ende'),
(125, 23, 'Flores Timur'),
(212, 23, 'Kupang'),
(213, 23, 'Kupang'),
(234, 23, 'Lembata'),
(269, 23, 'Manggarai'),
(270, 23, 'Manggarai Barat'),
(271, 23, 'Manggarai Timur'),
(301, 23, 'Nagekeo'),
(304, 23, 'Ngada'),
(383, 23, 'Rote Ndao'),
(385, 23, 'Sabu Raijua'),
(412, 23, 'Sikka'),
(434, 23, 'Sumba Barat'),
(435, 23, 'Sumba Barat Daya'),
(436, 23, 'Sumba Tengah'),
(437, 23, 'Sumba Timur'),
(479, 23, 'Timor Tengah Selatan'),
(480, 23, 'Timor Tengah Utara'),
(16, 24, 'Asmat'),
(67, 24, 'Biak Numfor'),
(90, 24, 'Boven Digoel'),
(111, 24, 'Deiyai (Deliyai)'),
(117, 24, 'Dogiyai'),
(150, 24, 'Intan Jaya'),
(157, 24, 'Jayapura'),
(158, 24, 'Jayapura'),
(159, 24, 'Jayawijaya'),
(180, 24, 'Keerom'),
(193, 24, 'Kepulauan Yapen (Yapen Waropen)'),
(231, 24, 'Lanny Jaya'),
(263, 24, 'Mamberamo Raya'),
(264, 24, 'Mamberamo Tengah'),
(274, 24, 'Mappi'),
(281, 24, 'Merauke'),
(284, 24, 'Mimika'),
(299, 24, 'Nabire'),
(303, 24, 'Nduga'),
(335, 24, 'Paniai'),
(347, 24, 'Pegunungan Bintang'),
(373, 24, 'Puncak'),
(374, 24, 'Puncak Jaya'),
(392, 24, 'Sarmi'),
(443, 24, 'Supiori'),
(484, 24, 'Tolikara'),
(495, 24, 'Waropen'),
(499, 24, 'Yahukimo'),
(500, 24, 'Yalimo'),
(124, 25, 'Fakfak'),
(165, 25, 'Kaimana'),
(272, 25, 'Manokwari'),
(273, 25, 'Manokwari Selatan'),
(277, 25, 'Maybrat'),
(346, 25, 'Pegunungan Arfak'),
(378, 25, 'Raja Ampat'),
(424, 25, 'Sorong'),
(425, 25, 'Sorong'),
(426, 25, 'Sorong Selatan'),
(449, 25, 'Tambrauw'),
(474, 25, 'Teluk Bintuni'),
(475, 25, 'Teluk Wondama'),
(60, 26, 'Bengkalis'),
(120, 26, 'Dumai'),
(147, 26, 'Indragiri Hilir'),
(148, 26, 'Indragiri Hulu'),
(166, 26, 'Kampar'),
(187, 26, 'Kepulauan Meranti'),
(207, 26, 'Kuantan Singingi'),
(350, 26, 'Pekanbaru'),
(351, 26, 'Pelalawan'),
(381, 26, 'Rokan Hilir'),
(382, 26, 'Rokan Hulu'),
(406, 26, 'Siak'),
(253, 27, 'Majene'),
(262, 27, 'Mamasa'),
(265, 27, 'Mamuju'),
(266, 27, 'Mamuju Utara'),
(362, 27, 'Polewali Mandar'),
(38, 28, 'Bantaeng'),
(47, 28, 'Barru'),
(87, 28, 'Bone'),
(95, 28, 'Bulukumba'),
(123, 28, 'Enrekang'),
(132, 28, 'Gowa'),
(162, 28, 'Jeneponto'),
(244, 28, 'Luwu'),
(245, 28, 'Luwu Timur'),
(246, 28, 'Luwu Utara'),
(254, 28, 'Makassar'),
(275, 28, 'Maros'),
(328, 28, 'Palopo'),
(333, 28, 'Pangkajene Kepulauan'),
(336, 28, 'Parepare'),
(360, 28, 'Pinrang'),
(396, 28, 'Selayar (Kepulauan Selayar)'),
(408, 28, 'Sidenreng Rappang/Rapang'),
(416, 28, 'Sinjai'),
(423, 28, 'Soppeng'),
(448, 28, 'Takalar'),
(451, 28, 'Tana Toraja'),
(486, 28, 'Toraja Utara'),
(493, 28, 'Wajo'),
(25, 29, 'Banggai'),
(26, 29, 'Banggai Kepulauan'),
(98, 29, 'Buol'),
(119, 29, 'Donggala'),
(291, 29, 'Morowali'),
(329, 29, 'Palu'),
(338, 29, 'Parigi Moutong'),
(366, 29, 'Poso'),
(410, 29, 'Sigi'),
(482, 29, 'Tojo Una-Una'),
(483, 29, 'Toli-Toli'),
(53, 30, 'Bau-Bau'),
(85, 30, 'Bombana'),
(101, 30, 'Buton'),
(102, 30, 'Buton Utara'),
(182, 30, 'Kendari'),
(198, 30, 'Kolaka'),
(199, 30, 'Kolaka Utara'),
(200, 30, 'Konawe'),
(201, 30, 'Konawe Selatan'),
(202, 30, 'Konawe Utara'),
(295, 30, 'Muna'),
(494, 30, 'Wakatobi'),
(73, 31, 'Bitung'),
(81, 31, 'Bolaang Mongondow (Bolmong)'),
(82, 31, 'Bolaang Mongondow Selatan'),
(83, 31, 'Bolaang Mongondow Timur'),
(84, 31, 'Bolaang Mongondow Utara'),
(188, 31, 'Kepulauan Sangihe'),
(190, 31, 'Kepulauan Siau Tagulandang Biaro (Sitaro)'),
(192, 31, 'Kepulauan Talaud'),
(204, 31, 'Kotamobagu'),
(267, 31, 'Manado'),
(285, 31, 'Minahasa'),
(286, 31, 'Minahasa Selatan'),
(287, 31, 'Minahasa Tenggara'),
(288, 31, 'Minahasa Utara'),
(485, 31, 'Tomohon'),
(12, 32, 'Agam'),
(93, 32, 'Bukittinggi'),
(116, 32, 'Dharmasraya'),
(186, 32, 'Kepulauan Mentawai'),
(236, 32, 'Lima Puluh Koto/Kota'),
(318, 32, 'Padang'),
(321, 32, 'Padang Panjang'),
(322, 32, 'Padang Pariaman'),
(337, 32, 'Pariaman'),
(339, 32, 'Pasaman'),
(340, 32, 'Pasaman Barat'),
(345, 32, 'Payakumbuh'),
(357, 32, 'Pesisir Selatan'),
(394, 32, 'Sawah Lunto'),
(411, 32, 'Sijunjung (Sawah Lunto Sijunjung)'),
(420, 32, 'Solok'),
(421, 32, 'Solok'),
(422, 32, 'Solok Selatan'),
(453, 32, 'Tanah Datar'),
(40, 33, 'Banyuasin'),
(121, 33, 'Empat Lawang'),
(220, 33, 'Lahat'),
(242, 33, 'Lubuk Linggau'),
(292, 33, 'Muara Enim'),
(297, 33, 'Musi Banyuasin'),
(298, 33, 'Musi Rawas'),
(312, 33, 'Ogan Ilir'),
(313, 33, 'Ogan Komering Ilir'),
(314, 33, 'Ogan Komering Ulu'),
(315, 33, 'Ogan Komering Ulu Selatan'),
(316, 33, 'Ogan Komering Ulu Timur'),
(324, 33, 'Pagar Alam'),
(327, 33, 'Palembang'),
(367, 33, 'Prabumulih'),
(15, 34, 'Asahan'),
(52, 34, 'Batu Bara'),
(70, 34, 'Binjai'),
(110, 34, 'Dairi'),
(112, 34, 'Deli Serdang'),
(137, 34, 'Gunungsitoli'),
(146, 34, 'Humbang Hasundutan'),
(173, 34, 'Karo'),
(217, 34, 'Labuhan Batu'),
(218, 34, 'Labuhan Batu Selatan'),
(219, 34, 'Labuhan Batu Utara'),
(229, 34, 'Langkat'),
(268, 34, 'Mandailing Natal'),
(278, 34, 'Medan'),
(307, 34, 'Nias'),
(308, 34, 'Nias Barat'),
(309, 34, 'Nias Selatan'),
(310, 34, 'Nias Utara'),
(319, 34, 'Padang Lawas'),
(320, 34, 'Padang Lawas Utara'),
(323, 34, 'Padang Sidempuan'),
(325, 34, 'Pakpak Bharat'),
(353, 34, 'Pematang Siantar'),
(389, 34, 'Samosir'),
(404, 34, 'Serdang Bedagai'),
(407, 34, 'Sibolga'),
(413, 34, 'Simalungun'),
(459, 34, 'Tanjung Balai'),
(463, 34, 'Tapanuli Selatan'),
(464, 34, 'Tapanuli Tengah'),
(465, 34, 'Tapanuli Utara'),
(470, 34, 'Tebing Tinggi'),
(481, 34, 'Toba Samosir');

-- --------------------------------------------------------

--
-- Table structure for table `rb_penjualan`
--

CREATE TABLE `rb_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_penjual` int(11) NOT NULL DEFAULT '0',
  `status_pembeli` enum('reseller','konsumen') NOT NULL,
  `status_penjual` enum('admin','reseller') NOT NULL,
  `kurir` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `waktu_transaksi` datetime NOT NULL,
  `proses` enum('0','1','2','3') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_penjualan`
--

INSERT INTO `rb_penjualan` (`id_penjualan`, `kode_transaksi`, `id_pembeli`, `id_penjual`, `status_pembeli`, `status_penjual`, `kurir`, `service`, `ongkir`, `waktu_transaksi`, `proses`) VALUES
(370, 'TRX-20220716222634', 14, 1, 'reseller', 'admin', '', 'Stok Otomatis (Pribadi)', 0, '2022-07-16 22:26:34', '1'),
(369, 'TRX-20220716222453', 14, 1, 'reseller', 'admin', '', 'Stok Otomatis (Pribadi)', 0, '2022-07-16 22:24:53', '1'),
(368, 'TRX-20220716221748', 19, 1, 'reseller', 'admin', '', 'Stok Otomatis (Pribadi)', 0, '2022-07-16 22:17:48', '1'),
(367, 'TRX-20220716221112', 19, 1, 'reseller', 'admin', '', 'Stok Otomatis (Pribadi)', 0, '2022-07-16 22:11:12', '1'),
(366, 'TRX-20220713123312', 28, 13, 'konsumen', 'reseller', 'transfer antar bank', 'Cash on delivery', 1000, '2022-07-13 12:33:12', '0'),
(365, 'TRX-20220702180805', 28, 13, 'konsumen', 'reseller', 'transfer antar bank', '', 1000, '2022-07-02 18:08:05', '0'),
(363, 'TRX-20220629202609', 18, 1, 'reseller', 'admin', '', 'Stok Otomatis (Pribadi)', 0, '2022-06-29 20:26:09', '1'),
(362, 'TRX-20220629125847', 13, 1, 'reseller', 'admin', '', 'Stok Otomatis (Pribadi)', 0, '2022-06-29 12:58:47', '1'),
(361, 'TRX-20220629115342', 13, 1, 'reseller', 'admin', '', 'Stok Otomatis (Pribadi)', 0, '2022-06-29 11:53:42', '1'),
(386, 'TRX-20220720203730', 60, 18, 'konsumen', 'reseller', 'Transfer antar bank', 'Cash on delivery', 2000, '2022-07-20 20:37:30', '3'),
(357, 'TRX-20220601215400', 28, 13, 'konsumen', 'reseller', 'cod', 'Cash on delivery', 1000, '2022-06-01 21:54:00', '0'),
(356, 'TRX-20220601215323', 28, 13, 'konsumen', 'reseller', 'cod', 'Cash on delivery', 1000, '2022-06-01 21:53:23', '1'),
(355, 'TRX-20220601215217', 28, 13, 'konsumen', 'reseller', 'cod', 'Cash on delivery', 1000, '2022-06-01 21:52:17', '1'),
(354, 'TRX-20220601215143', 28, 13, 'konsumen', 'reseller', 'transfer antar bank', 'Cash on delivery', 1000, '2022-06-01 21:51:43', '1'),
(353, 'TRX-20220601212458', 17, 1, 'reseller', 'admin', '', 'Stok Otomatis (Pribadi)', 0, '2022-06-01 21:24:58', '1'),
(352, 'TRX-20220519154612', 28, 13, 'konsumen', 'reseller', 'cod', 'Cash on delivery', 1000, '2022-05-19 15:46:12', '1'),
(350, 'TRX-20220427162404', 28, 13, 'konsumen', 'reseller', 'transfer antar bank', 'Cash on delivery', 1000, '2022-04-27 16:24:04', '1'),
(388, 'TRX-20220720204350', 60, 14, 'konsumen', 'reseller', 'Transfer antar bank', 'Cash on delivery', 1000, '2022-07-20 20:43:50', '3'),
(389, 'TRX-20220720210211', 35, 18, 'konsumen', 'reseller', 'Transfer antar bank', 'Cash on delivery', 2000, '2022-07-20 21:02:11', '2'),
(345, 'TRX-20220413134858', 13, 1, 'reseller', 'admin', '', 'Stok Otomatis (Pribadi)', 0, '2022-04-13 13:48:58', '1'),
(346, 'TRX-20220413134904', 13, 1, 'reseller', 'admin', '', 'Stok Otomatis (Pribadi)', 0, '2022-04-13 13:49:04', '1'),
(343, 'TRX-20220413134848', 13, 1, 'reseller', 'admin', '', 'Stok Otomatis (Pribadi)', 0, '2022-04-13 13:48:48', '1'),
(344, 'TRX-20220413134853', 13, 1, 'reseller', 'admin', '', 'Stok Otomatis (Pribadi)', 0, '2022-04-13 13:48:53', '1'),
(342, 'TRX-20220413134843', 13, 1, 'reseller', 'admin', '', 'Stok Otomatis (Pribadi)', 0, '2022-04-13 13:48:43', '1'),
(341, 'TRX-20220413134838', 13, 1, 'reseller', 'admin', '', 'Stok Otomatis (Pribadi)', 0, '2022-04-13 13:48:38', '1'),
(371, 'TRX-20220716222918', 1, 1, 'reseller', 'admin', '', 'Stok Otomatis (Pribadi)', 0, '2022-07-16 22:29:18', '1'),
(372, 'TRX-20220716222923', 1, 1, 'reseller', 'admin', '', 'Stok Otomatis (Pribadi)', 0, '2022-07-16 22:29:23', '1'),
(373, 'TRX-20220716223510', 18, 1, 'reseller', 'admin', '', 'Stok Otomatis (Pribadi)', 0, '2022-07-16 22:35:10', '1'),
(374, 'TRX-20220716223556', 18, 1, 'reseller', 'admin', '', 'Stok Otomatis (Pribadi)', 0, '2022-07-16 22:35:56', '1'),
(376, 'TRX-20220716224550', 29, 14, 'konsumen', 'reseller', 'transfer antar bank', 'Cash on delivery', 1000, '2022-07-16 22:45:50', '2'),
(387, 'TRX-20220720204236', 60, 19, 'konsumen', 'reseller', 'Transfer antar bank', 'Cash on delivery', 2000, '2022-07-20 20:42:36', '3'),
(381, 'TRX-20220720193446', 60, 1, 'konsumen', 'reseller', 'transfer antar bank', 'Cash on delivery', 2000, '2022-07-20 19:34:46', '3'),
(407, 'TRX-20220728153024', 60, 13, 'konsumen', 'reseller', 'Transfer antar bank', 'Cash on delivery', 1000, '2022-07-28 15:30:24', ''),
(390, 'TRX-20220720210228', 35, 14, 'konsumen', 'reseller', 'Transfer antar bank', 'Cash on delivery', 1000, '2022-07-20 21:02:28', '2'),
(391, 'TRX-20220720210247', 35, 19, 'konsumen', 'reseller', 'Transfer antar bank', 'Cash on delivery', 2000, '2022-07-20 21:02:47', '1'),
(393, 'TRX-20220720210321', 35, 1, 'konsumen', 'reseller', 'Transfer antar bank', 'Cash on delivery', 2000, '2022-07-20 21:03:21', '2'),
(408, 'TRX-20220731213405', 60, 13, 'konsumen', 'reseller', 'Transfer antar bank', 'Cash on delivery', 1000, '2022-07-31 21:34:05', ''),
(411, 'TRX-20220823210325', 60, 18, 'konsumen', 'reseller', 'Transfer antar bank', 'Cash on delivery', 2000, '2022-08-23 21:03:25', '3'),
(405, 'TRX-20220725202553', 13, 1, 'reseller', 'admin', '', 'Stok Otomatis (Pribadi)', 0, '2022-07-25 20:25:53', '1'),
(406, 'TRX-20220725202558', 13, 1, 'reseller', 'admin', '', 'Stok Otomatis (Pribadi)', 0, '2022-07-25 20:25:58', '1'),
(404, 'TRX-20220725201415', 60, 13, 'konsumen', 'reseller', 'Transfer antar bank', 'Cash on delivery', 1000, '2022-07-25 20:14:15', '3'),
(410, 'TRX-20220809203325', 60, 18, 'konsumen', 'reseller', 'Transfer antar bank', 'Cash on delivery', 2000, '2022-08-09 20:33:25', '3'),
(412, 'TRX-20220919105009', 60, 18, 'konsumen', 'reseller', 'Transfer antar bank', 'Cash on delivery', 2000, '2022-09-19 10:50:09', '0'),
(413, 'TRX-20220919105332', 60, 18, 'konsumen', 'reseller', 'Transfer antar bank', 'Cash on delivery', 2000, '2022-09-19 10:53:32', '0');

-- --------------------------------------------------------

--
-- Table structure for table `rb_penjualan_detail`
--

CREATE TABLE `rb_penjualan_detail` (
  `id_penjualan_detail` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_penjualan_detail`
--

INSERT INTO `rb_penjualan_detail` (`id_penjualan_detail`, `id_penjualan`, `id_produk`, `jumlah`, `diskon`, `harga_jual`, `satuan`) VALUES
(488, 413, 71, 1, 0, 60000, 'pcs'),
(487, 412, 71, 1, 0, 60000, 'pcs'),
(486, 411, 71, 1, 0, 60000, 'pcs'),
(485, 410, 71, 1, 0, 60000, 'pcs'),
(479, 404, 63, 1, 0, 81000, 'pcs'),
(480, 405, 53, 5, 0, 0, 'pcs'),
(481, 406, 52, 5, 0, 0, 'pcs'),
(469, 393, 60, 1, 0, 12000, 'pack'),
(483, 408, 59, 1, 0, 33000, 'pcs'),
(467, 391, 66, 1, 0, 33000, 'pcs'),
(466, 390, 69, 1, 0, 23000, 'Kotak'),
(465, 389, 65, 1, 0, 55000, 'pcs'),
(464, 388, 69, 1, 0, 23000, 'Kotak'),
(463, 387, 66, 1, 0, 33000, 'pcs'),
(462, 386, 70, 1, 0, 60000, 'pcs'),
(461, 385, 66, 1, 0, 33000, 'pcs'),
(482, 407, 64, 1, 0, 110000, 'pcs'),
(457, 381, 61, 1, 0, 28700, 'pack'),
(456, 380, 66, 2, 0, 33000, 'pcs'),
(455, 379, 71, 1, 0, 60000, 'pcs'),
(453, 377, 60, 1, 0, 12000, 'pack'),
(452, 376, 68, 1, 0, 21500, 'Kotak'),
(450, 374, 71, 5, 0, 0, 'pcs'),
(449, 373, 70, 3, 0, 0, 'pcs'),
(448, 372, 60, 3, 0, 0, 'pack'),
(447, 371, 61, 3, 0, 0, 'pack'),
(446, 370, 69, 3, 0, 0, 'Kotak'),
(445, 369, 68, 3, 0, 0, 'pcs'),
(444, 368, 67, 4, 0, 0, 'Kotak'),
(443, 367, 66, 6, 0, 0, 'Gram'),
(442, 366, 64, 1, 0, 110000, 'pcs'),
(441, 365, 63, 1, 0, 81000, 'pcs'),
(439, 363, 65, 5, 0, 0, 'pcs'),
(438, 362, 64, 5, 0, 0, 'pcs'),
(437, 361, 63, 5, 0, 0, 'pcs'),
(434, 358, 57, 1, 0, 85000, 'pcs'),
(433, 357, 55, 1, 0, 40000, 'pcs'),
(432, 356, 54, 1, 0, 40000, 'pcs'),
(431, 355, 55, 1, 0, 40000, 'pcs'),
(430, 354, 57, 1, 0, 85000, 'pcs'),
(429, 353, 62, 5, 0, 0, 'G'),
(428, 352, 55, 1, 0, 40000, 'pcs'),
(426, 350, 58, 1, 0, 85000, 'pcs'),
(425, 349, 58, 1, 0, 85000, 'pcs'),
(424, 348, 59, 2, 0, 33000, 'pcs'),
(422, 346, 54, 5, 0, 0, 'pcs'),
(421, 345, 55, 5, 0, 0, 'pcs'),
(420, 344, 56, 5, 0, 0, 'pcs'),
(419, 343, 57, 5, 0, 0, 'pcs'),
(418, 342, 58, 5, 0, 0, 'pcs'),
(417, 341, 59, 5, 0, 0, 'pcs');

-- --------------------------------------------------------

--
-- Table structure for table `rb_penjualan_temp`
--

CREATE TABLE `rb_penjualan_temp` (
  `id_penjualan_detail` int(11) NOT NULL,
  `session` varchar(50) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ukuran` varchar(10) NOT NULL,
  `diskon` int(11) DEFAULT NULL,
  `harga_jual` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `waktu_order` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_penjualan_temp`
--

INSERT INTO `rb_penjualan_temp` (`id_penjualan_detail`, `session`, `id_produk`, `jumlah`, `ukuran`, `diskon`, `harga_jual`, `satuan`, `waktu_order`) VALUES
(98, 'TRX-20220722152014', 70, 1, '', NULL, 60000, 'pcs', '2022-07-22 15:20:14');

-- --------------------------------------------------------

--
-- Table structure for table `rb_pesanan_diterima`
--

CREATE TABLE `rb_pesanan_diterima` (
  `id_pesanan_diterima` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `bukti_diterima` varchar(255) NOT NULL,
  `total_bayar` varchar(255) NOT NULL,
  `komentar` varchar(255) NOT NULL,
  `waktu_pesanan_diterima` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_pesanan_diterima`
--

INSERT INTO `rb_pesanan_diterima` (`id_pesanan_diterima`, `id_penjualan`, `bukti_diterima`, `total_bayar`, `komentar`, `waktu_pesanan_diterima`) VALUES
(7, 376, 'prdk19.PNG', 'Rp 22,500', 'Barang bagus dan kemasan tidak ada yang rusak', '2022-07-16 22:48:03'),
(8, 377, 'prdk9.PNG', 'Rp 14,000', 'Kemasan barang bagus', '2022-07-16 22:50:31'),
(9, 379, 'prdk24.PNG', 'Rp 62,000', 'Bajunya bagus', '2022-07-16 22:53:36'),
(10, 380, 'prdk17.PNG', 'Rp 68,000', 'kemasan bagus', '2022-07-16 22:54:57'),
(11, 386, 'baju11.PNG', 'Rp 62,000', 'Barang bagus', '2022-07-20 20:39:16'),
(12, 387, 'baju12.PNG', 'Rp 35,000', 'barang bagus dan tidak ada rusak', '2022-07-20 20:43:31'),
(13, 388, 'bajukaos1.PNG', 'Rp 24,000', 'barang baguss', '2022-07-20 20:45:25'),
(14, 381, 'prdk171.PNG', 'Rp 30,700', 'barang tidak ada yang rusak', '2022-07-20 20:47:21'),
(15, 382, '14.PNG', 'Rp 111,000', 'barang bagus', '2022-07-20 20:47:59'),
(16, 393, 'bajukaos11.PNG', 'Rp 14,000', 'Barang bagus', '2022-07-20 21:05:23'),
(17, 391, 'baju111.PNG', 'Rp 35,000', 'barang bagus', '2022-07-20 21:05:39'),
(18, 390, 'baju121.PNG', 'Rp 24,000', 'mantap', '2022-07-20 21:05:51'),
(19, 389, 'CamScanner_05-01-2021_23_32_12.jpg', 'Rp 57,000', 'mantap barangnya', '2022-07-20 21:06:26'),
(20, 392, 'baju1111.PNG', 'Rp 82,000', 'barangnya bagus', '2022-07-20 21:07:29'),
(21, 402, '', 'Rp 82,000', 'aaaaaa', '2022-07-25 19:44:52'),
(22, 404, 'tokoviolin.PNG', 'Rp 82,000', 'bagus barangnya', '2022-07-25 20:20:54'),
(23, 388, 'tokoikhsanjaya.PNG', 'Rp 24,000', 'Barang bagus', '2022-07-25 20:28:35'),
(24, 387, 'logoKWU.PNG', 'Rp 35,000', 'mantap barangnya', '2022-07-25 20:28:53'),
(25, 386, 'istockphoto-137538856-170667a2.jpg', 'Rp 62,000', 'mantap barangnya', '2022-07-25 20:29:06'),
(26, 381, 'tokoviolin1.PNG', 'Rp 30,700', 'Barang bagus', '2022-07-25 20:29:20'),
(27, 411, 'ss_nilai_smt_81.PNG', 'Rp 62,000', 'Bagus', '2022-08-23 21:12:01'),
(28, 410, 'ss_nilai_smt_82.PNG', 'Rp 62,000', 'Bagus barangnya', '2022-08-23 21:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `rb_produk`
--

CREATE TABLE `rb_produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori_produk` int(11) NOT NULL,
  `id_kategori_produk_sub` int(11) NOT NULL,
  `id_reseller` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `produk_seo` varchar(255) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_reseller` int(11) NOT NULL,
  `harga_konsumen` int(11) NOT NULL,
  `berat` varchar(50) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `waktu_input` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_produk`
--

INSERT INTO `rb_produk` (`id_produk`, `id_kategori_produk`, `id_kategori_produk_sub`, `id_reseller`, `nama_produk`, `produk_seo`, `satuan`, `harga_beli`, `harga_reseller`, `harga_konsumen`, `berat`, `gambar`, `keterangan`, `username`, `waktu_input`) VALUES
(52, 17, 10, 13, 'Baju Setelan Anak Cewek Untuk Anak Umur 3-5 thn', 'baju-setelan-anak-cewek-untuk-anak-umur-35-thn', 'pcs', 30000, 0, 35000, '250 Gram', 'prdk1.PNG', '<p>\r\n\r\nStelan anak cewek.. Cocok utk anak 3th sd 5th..banyak warna lain ya...<br></p>', 'tokofathia', '2022-03-07 20:21:23'),
(53, 17, 9, 13, 'Baju Setelan Anak Cowok', 'baju-setelan-anak-cowok', 'pcs', 40000, 0, 45000, '250 Gram', 'prdk2.PNG', '<p>\r\n\r\nStelan harian anak cowok... Bahan dingin dan gak luntur ya... Harga 45k\r\n\r\n<br></p>', 'tokofathia', '2022-03-07 20:23:25'),
(54, 17, 10, 13, 'Baju Tidur Anak Cewek', 'baju-tidur-anak-cewek', 'pcs', 35000, 0, 40000, '250 Gram', 'prdk3.PNG', '<p>Baju tidur anaknya bund,, cocok banget dipake cuaca skrg ya\r\n\r\n<br></p>', 'tokofathia', '2022-03-07 20:24:35'),
(55, 17, 10, 13, 'Baju Setelan Harian Anak Cewek', 'baju-setelan-harian-anak-cewek', 'pcs', 35000, 0, 40000, '250 Gram', 'prdk4.PNG', '<p>setelan harian anak cewek.. Bahan adem dan lembut\r\n\r\n<br></p>', 'tokofathia', '2022-03-07 20:25:52'),
(56, 17, 10, 13, 'Baju Setelan Harian Anak Cewek', 'baju-setelan-harian-anak-cewek', 'pcs', 35000, 0, 40000, '250 Gram', 'prdk5.PNG', '<p>\r\n\r\nStelan harian anak cwek.. Super cwakeep ya..<br></p>', 'tokofathia', '2022-03-07 20:27:32'),
(57, 17, 9, 13, 'Baju Batman Anak 5-10 thn', 'baju-batman-anak-510-thn', 'pcs', 80000, 0, 85000, '250 Gram', 'prdk6.PNG', '<p>\r\n\r\nBaju hero batman..ukuran lengkap dari 3-10th..harga 85k\r\n\r\n<br></p>', 'tokofathia', '2022-03-07 20:29:19'),
(58, 17, 9, 13, 'Baju Spiderman Anak Umur 3-10 thn', 'baju-spiderman-anak-umur-310-thn', 'pcs', 80000, 0, 85000, '250 Gram', 'prdk7.PNG', '<p>Ready stock baju hero Spiderman ukuran lengkap dari umur 3-10th...harga 85k\r\n\r\n<br></p>', 'tokofathia', '2022-03-07 20:31:45'),
(59, 17, 9, 13, 'Baju Setelan Anak Cowok ', 'baju-setelan-anak-cowok-', 'pcs', 31000, 0, 33000, '250 Gram', 'prdk8.PNG', '<p>\r\n\r\nStelan anak cowok,, 3 pcs 100k\r\n\r\n<br></p>', 'tokofathia', '2022-03-07 20:34:21'),
(60, 16, 0, 1, 'Gery Chocolatos 9 gram (1 pack isi 24 pcs)', 'gery-chocolatos-9-gram-1-pack-isi-24-pcs', 'pack', 10000, 0, 12000, '9 gram', 'prdk9.PNG', '<p>\r\n\r\nHarga per box\r\n1 box isi 24 pcs @ 9 gram\r\n\r\n<br></p>', 'tokoajo', '2022-03-07 22:01:14'),
(61, 16, 0, 1, 'Beng Beng box isi 20 pcs', 'beng-beng-box-isi-20-pcs', 'pack', 28700, 0, 28700, '20 gram', 'prdk10.PNG', '<p>\r\n\r\nBeng Beng box\r\nisi 20 pcs x 20 gr\r\nexpired lama\r\nproduksi Mayora\r\n\r\n<br></p>', 'tokoajo', '2022-03-07 22:09:07'),
(63, 17, 10, 13, 'Baju Setelan Cewek', 'baju-setelan-cewek', 'pcs', 80000, 0, 81000, '200 G', 'prdk81.PNG', '', 'tokofathia', '2022-06-29 11:53:42'),
(70, 20, 0, 18, 'Kaos Distro Pria Warna Hijau', 'kaos-distro-pria-warna-hijau', 'pcs', 60000, 0, 60000, '', 'prdk25.PNG', '<p>\r\n\r\n? SPESIFIKASI PRODUK\r\n\r\n????Bahan 100% Catton Combed 30s\r\n????Sablon Plastisol High Quality Print\r\n????Hangtag label tebal barcode &amp; berhologram\r\n????Kualitas Outlet Distro\r\n????Size: M, L, dan XL (Tinggi x Lebar Dada)\r\n     @ M  69 x 48 cm\r\n     @ L   71 x 50 cm\r\n     @ XL 73 x 52 cm&nbsp;</p><p>&nbsp;Harga Tersebut adalah Harga Satuan\r\nAtau Untuk lebih Jelas, Silahkan Chat Kami Terlebih Dahulu.\r\n\r\n<br></p>', 'indrayastore', '2022-07-16 22:35:10'),
(71, 20, 0, 18, 'Kaos Distro Pria Warna Merah', 'kaos-distro-pria-warna-merah', 'pcs', 60000, 0, 60000, '', 'prdk24.PNG', '<p>\r\n\r\n? SPESIFIKASI PRODUK\r\n\r\n????Bahan 100% Catton Combed 30s\r\n????Sablon Plastisol High Quality Print\r\n????Hangtag label tebal barcode &amp; berhologram\r\n????Kualitas Outlet Distro\r\n????Size: M, L, dan XL (Tinggi x Lebar Dada)\r\n     @ M  69 x 48 cm\r\n     @ L   71 x 50 cm\r\n     @ XL 73 x 52 cm&nbsp;</p><p>&nbsp;Harga Tersebut adalah Harga Satuan\r\nAtau Untuk lebih Jelas, Silahkan Chat Kami Terlebih Dahulu.\r\n\r\n<br></p>', 'indrayastore', '2022-07-16 22:35:56'),
(64, 17, 10, 13, 'Baju Setelan Cowok', 'baju-setelan-cowok', 'pcs', 100000, 0, 110000, '200 G', 'prdk71.PNG', '<p>Baju anak anak</p>', 'tokofathia', '2022-06-29 12:58:47'),
(65, 20, 0, 18, 'Baju Kaos Polos H&M Size L', 'baju-kaos-polos-hm-size-l', 'pcs', 50000, 0, 55000, '200 G', 'prdk16.PNG', '<p>Baju kaos distro</p>', 'indrayastore', '2022-06-29 20:26:09'),
(66, 16, 0, 19, 'Apollo Coklat 1 kotak isi 24 pcs', 'apollo-coklat-1-kotak-isi-24-pcs', 'Kotak', 33000, 0, 33000, '400 g', 'prdk17.PNG', '<p>\r\n\r\nApollo apollo coklat cake 1 kotak isi 24 pc\r\nmade in malaysia\r\n\r\n<br></p>', 'tokoikhsanjaya', '2022-07-16 22:11:12'),
(67, 16, 11, 19, 'Aqua 600 ml 1 kotak', 'aqua-600-ml-1-kotak', 'Kotak', 44000, 0, 44000, '', 'prdk18.PNG', '<i></i>Merk aqua isi 24 botol 600 ml<br>', 'tokoikhsanjaya', '2022-07-16 22:17:48'),
(68, 16, 15, 14, 'Minuman Torpedo 1 kotak isi 24 pcs', 'minuman-torpedo-1-kotak-isi-24-pcs', 'Kotak', 21500, 0, 21500, '', 'prdk19.PNG', '<p>\r\n\r\nDIJUAL PER DUS\r\n\r\n1 DUS ISI 24 PCS expired masih lama<br></p>', 'tokoberkah', '2022-07-16 22:24:53'),
(69, 16, 15, 14, 'Okky Jelly Drink Rasa Jambu', 'okky-jelly-drink-rasa-jambu', 'Kotak', 23000, 0, 23000, '', 'prdk20.PNG', '<p>\r\n\r\nOkky Jelly Drink Jambu 150ml\r\nIsi: 24 pcs\r\n\r\nMinuman Jelly dengan rasa Jambu yang asik dan bisa menunda lapar\r\n\r\n<br></p>', 'tokoberkah', '2022-07-16 22:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `rb_produk_diskon`
--

CREATE TABLE `rb_produk_diskon` (
  `id_produk_diskon` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_reseller` int(11) NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_produk_diskon`
--

INSERT INTO `rb_produk_diskon` (`id_produk_diskon`, `id_produk`, `id_reseller`, `diskon`) VALUES
(1, 13, 2, 8000),
(2, 12, 2, 42000),
(3, 9, 2, 0),
(4, 7, 2, 10000),
(5, 4, 2, 89000),
(7, 2, 2, 100000),
(8, 14, 1, 10),
(9, 14, 2, 0),
(10, 16, 2, 342),
(11, 12, 1, 0),
(12, 11, 1, 0),
(13, 10, 1, 0),
(14, 26, 3, 0),
(15, 25, 3, 0),
(16, 24, 3, 0),
(17, 23, 3, 0),
(18, 21, 3, 0),
(19, 27, 1, 1000),
(20, 29, 10, 0),
(21, 35, 1, 0),
(22, 20, 1, 0),
(23, 32, 2, 0),
(24, 40, 1, 0),
(25, 39, 1, 0),
(26, 38, 1, 0),
(27, 49, 2, 0),
(28, 48, 2, 0),
(29, 47, 2, 0),
(30, 46, 2, 0),
(31, 45, 2, 0),
(32, 44, 2, 0),
(33, 50, 1, 1),
(34, 43, 1, 0),
(35, 42, 1, 0),
(36, 41, 1, 0),
(37, 37, 2, 0),
(38, 51, 13, 10000),
(39, 60, 1, 0),
(40, 59, 13, 0),
(41, 58, 13, 0),
(42, 57, 13, 0),
(43, 56, 13, 0),
(44, 55, 13, 0),
(45, 54, 13, 0),
(46, 53, 13, 0),
(47, 62, 17, 0),
(48, 64, 13, 0),
(49, 66, 19, 0),
(50, 68, 14, 0),
(51, 61, 1, 0),
(52, 52, 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rb_provinsi`
--

CREATE TABLE `rb_provinsi` (
  `provinsi_id` int(11) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_provinsi`
--

INSERT INTO `rb_provinsi` (`provinsi_id`, `nama_provinsi`) VALUES
(1, 'Bali'),
(2, 'Bangka Belitung'),
(3, 'Banten'),
(4, 'Bengkulu'),
(5, 'DI Yogyakarta'),
(6, 'DKI Jakarta'),
(7, 'Gorontalo'),
(8, 'Jambi'),
(9, 'Jawa Barat'),
(10, 'Jawa Tengah'),
(11, 'Jawa Timur'),
(12, 'Kalimantan Barat'),
(13, 'Kalimantan Selatan'),
(14, 'Kalimantan Tengah'),
(15, 'Kalimantan Timur'),
(16, 'Kalimantan Utara'),
(17, 'Kepulauan Riau'),
(18, 'Lampung'),
(19, 'Maluku'),
(20, 'Maluku Utara'),
(21, 'Nanggroe Aceh Darussalam (NAD)'),
(22, 'Nusa Tenggara Barat (NTB)'),
(23, 'Nusa Tenggara Timur (NTT)'),
(24, 'Papua'),
(25, 'Papua Barat'),
(26, 'Riau'),
(27, 'Sulawesi Barat'),
(28, 'Sulawesi Selatan'),
(29, 'Sulawesi Tengah'),
(30, 'Sulawesi Tenggara'),
(31, 'Sulawesi Utara'),
(32, 'Sumatera Barat'),
(33, 'Sumatera Selatan'),
(34, 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Table structure for table `rb_rekening_reseller`
--

CREATE TABLE `rb_rekening_reseller` (
  `id_rekening_reseller` int(11) NOT NULL,
  `id_reseller` int(11) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `pemilik_rekening` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_rekening_reseller`
--

INSERT INTO `rb_rekening_reseller` (`id_rekening_reseller`, `id_reseller`, `nama_bank`, `no_rekening`, `pemilik_rekening`) VALUES
(8, 13, 'Bank BRI', '14712132928791', 'Toko Fathia Rafa'),
(7, 1, 'Bank Mandiri', '1032378372637', 'Ajo'),
(9, 19, 'Bank Syariah Indonesia', '71652129452425', 'Toko Ikhsan Jaya'),
(10, 18, 'Bank Mandiri', '1018364515343', 'Indraya Store'),
(11, 14, 'Bank Syariah Indonesia', '70653139374622', 'Toko Berkah');

-- --------------------------------------------------------

--
-- Table structure for table `rb_reseller`
--

CREATE TABLE `rb_reseller` (
  `id_reseller` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_reseller` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `kota_id` int(11) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `validasi` enum('Sudah','Belum') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Belum'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_reseller`
--

INSERT INTO `rb_reseller` (`id_reseller`, `username`, `password`, `nama_reseller`, `jenis_kelamin`, `kota_id`, `kecamatan`, `kelurahan`, `alamat_lengkap`, `no_telpon`, `email`, `nik`, `keterangan`, `foto`, `nama_pemilik`, `tanggal_daftar`, `validasi`) VALUES
(1, 'tokoajo', '2d1a9349cbeddb10ecbb15c2e4d93a8abb830899a66a06529450c9f7dab53754e2ddf803a8c7b7fed07df25c1d14038d5ec7edfd2e69441f3e33ff446e58477a', 'Toko Ajo Alhamdulillah', 'Laki-laki', 350, 'Payung Sekaki', 'Tampan', 'Jl. Pemuda No. 27 Pekanbaru', '085213453456', 'tokoajo@gmail.com', '-', 'Menjual barang-barang pokok dan harian', 'Screenshot_2022-03-02-12-09-01-23.jpg', 'Ajo', '2021-12-26 00:00:00', 'Sudah'),
(14, 'tokoberkah', 'd81ea11e2a15780c8bdad809c33f46a84e8df88d9e63e58cac5111a2f6cd4c1ed00ab524ace972a5905c974b068f955a99def4ef380a2628987000986b631b27', 'Toko Berkah', 'Laki-laki', 350, 'Payung Sekaki', 'Tampan', 'Jalan Pemuda no 25', '081276360082', 'tokoberkah@gmail.com', '-', 'Menjual Barang Harian', 'Screenshot_2021-07-19-13-24-39-221.jpg', 'Yulhendra', '2022-02-14 22:57:33', 'Sudah'),
(13, 'tokofathia', '01d5d4a2cdf07e9d1cd7d3c8aab43d0195562a9ce5e8b43a0a98f67152fd9d473d3a4ee6f995a525b5d5ea00f6e97693eed93c5c08e244c82f22f70d03a1484a', 'Toko Fathia Rafa', 'Laki-laki', 350, 'Payung Sekaki', 'Tampan', 'Jalam Pemuda No.25 ', '085271239446', 'tokofathiarafa@gmail.com', '-', 'Toko yang menjual baju anak-anak', 'Screenshot_2021-07-19-13-17-57-181.jpg', 'Ahmad Hamzah', '2022-02-14 22:49:09', 'Sudah'),
(18, 'indrayastore', '5a6e1ed4040296d6451d2b904668fc1671430c60e8c692cf0be8d849a4cac3f3fc369291f529a7ef1e4defb3daab155a3666be0a15c975b7538d9088533d9b43', 'Indraya Store Distro', 'Perempuan', 350, 'Tampan', 'Tuah Karya', 'Jl. Bangun Karya, Panam', '081267573381', 'indrayastore@gmail.com', '-', 'Menjual baju distro', 'indrayastore.PNG', 'Ilbi Candra Yani', '2022-06-29 18:55:46', 'Sudah'),
(19, 'tokoikhsanjaya', '907c46d7243861f142487905d6a9fc476ea51b3628c2a66bd90ba9311525ca2474cc9c68f4c745c83078161757b7b48f709c7a4a4d2471523bf90776de436f58', 'Toko Ikhsan Jaya', 'Perempuan', 350, 'Payung Sekaki', 'Tampan', 'Jln pemuda no 37 kel tampan kota pekanbaru ', '08126547867', 'tokoikhsanjaya@gmail.com', '-', 'Menjual barang-barang harian', 'tokoikhsanjaya(1).PNG', 'Fitri Lestari', '2022-07-14 13:59:11', 'Sudah'),
(22, 'abiyyustore', '4110c6f9d3ceafdc895617b7b0e2932e182f70764ea72577cd087fccc2e8105f3521ab8d69b876f1db4946cee334b51ced3234122b757bb8b81aad6e487f275e', 'Abiyyu Store', 'Laki-laki', 350, 'Payung Sekaki', 'Tirta siak', 'jln', '085213453456', 'abiyyuteer123@gmail.com', '-', '', '', 'Abiyyu', '2022-07-23 12:49:34', 'Sudah'),
(23, 'andikastore', '57bf1a9d00db3434ed480eee6c3c9c2831064634f51c717a9b6a9daf0628df14a0487a05a353a8fc7768bca6486255f006ae618744355cbd010faa84fdcacf17', 'Andika Store', 'Laki-laki', 350, 'Rumbai', 'Umban sari', 'Jln Bukit Sari', '081276360082', 'andikatr@gmail.com', '-', '', '', 'Andika Tri', '2022-07-27 11:53:11', 'Sudah');

-- --------------------------------------------------------

--
-- Table structure for table `rb_reseller_cod`
--

CREATE TABLE `rb_reseller_cod` (
  `id_cod` int(11) NOT NULL,
  `id_reseller` int(11) NOT NULL,
  `nama_alamat` varchar(255) NOT NULL,
  `biaya_cod` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rb_reseller_cod`
--

INSERT INTO `rb_reseller_cod` (`id_cod`, `id_reseller`, `nama_alamat`, `biaya_cod`) VALUES
(1, 1, 'Transfer Antar Bank', 2000),
(8, 13, 'Transfer Antar Bank', 1000),
(7, 13, 'COD Kota Pekanbaru', 1000),
(5, 2, 'Area Pekanbaru', 1500),
(10, 14, 'Transfer Antar Bank', 1000),
(11, 18, 'Transfer Antar Bank', 2000),
(12, 18, 'COD Kota Pekanbaru', 2000),
(13, 19, 'Transfer Antar Bank', 2000),
(14, 14, 'COD Kota Pekanbaru', 2000),
(15, 19, 'COD Kota Pekanbaru', 2000),
(16, 1, 'COD Kota Pekanbaru', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id_templates` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `pembuat` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `folder` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id_templates`, `judul`, `username`, `pembuat`, `folder`, `aktif`) VALUES
(22, 'PHPMU-Tigo - Swarakalibata Template', 'admin', 'Robby Prihandaya', 'phpmu-tigo', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `foto`, `level`, `blokir`, `id_session`) VALUES
('admin', 'edbd881f1ee2f76ba0bd70fd184f87711be991a0401fd07ccd4b199665f00761afc91731d8d8ba6cbb188b2ed5bfb465b9f3d30231eb0430b9f90fe91d136648', 'Admin', 'admin@gmail.com', '085271239466', 'PicsArt_04-19-09_32_13.jpg', 'admin', '', 'q173s8hs1jl04st35169ccl8o7'),
('admin1', 'bd45a76b760c3d62ae42b09134be7b2bcced58598cc7dd1cbae962f9f56b10ba78c51e20506c8233c076c4d8ad023a218eb9c52bce85b7d99de2af5fc353a5b5', 'Admin Ganteng', 'admin1@gmail.com', '08527131324311', '', 'admin', '', 'e00cf25ad42683b3df678c61f42c6bda-20220524202817');

-- --------------------------------------------------------

--
-- Table structure for table `users_modul`
--

CREATE TABLE `users_modul` (
  `id_umod` int(11) NOT NULL,
  `id_session` varchar(255) NOT NULL,
  `id_modul` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_modul`
--

INSERT INTO `users_modul` (`id_umod`, `id_session`, `id_modul`) VALUES
(1, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 70),
(2, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 65),
(3, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 63),
(4, 'f76ad5ee772ac196cbc09824e24859ee', 70),
(5, 'f76ad5ee772ac196cbc09824e24859ee', 65),
(6, 'f76ad5ee772ac196cbc09824e24859ee', 63),
(7, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 18),
(8, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 66),
(9, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 33),
(10, '3460d81e02faa3559f9e02c9a766fcbd-20170124215625', 18),
(11, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 41),
(12, '6bec9c852847242e384a4d5ac0962ba0-20170406140423', 18),
(13, 'fa7688658d8b38aae731826ea1daebb5-20170521103501', 18),
(14, 'cfcd208495d565ef66e7dff9f98764da-20180421112213', 18),
(15, '8462a1a67fbed2bef22d490d88e35944-20200619140142', 18),
(16, '67cfd69a4e5fb27fc4aeb0fa8383161e-20201010235217', 44),
(22, '67cfd69a4e5fb27fc4aeb0fa8383161e-20201010235217', 62),
(18, '67cfd69a4e5fb27fc4aeb0fa8383161e-20201010235217', 18),
(19, '67cfd69a4e5fb27fc4aeb0fa8383161e-20201010235217', 43);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `background`
--
ALTER TABLE `background`
  ADD PRIMARY KEY (`id_background`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id_header`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `iklanatas`
--
ALTER TABLE `iklanatas`
  ADD PRIMARY KEY (`id_iklanatas`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id_logo`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indexes for table `rb_kategori_produk`
--
ALTER TABLE `rb_kategori_produk`
  ADD PRIMARY KEY (`id_kategori_produk`);

--
-- Indexes for table `rb_kategori_produk_sub`
--
ALTER TABLE `rb_kategori_produk_sub`
  ADD PRIMARY KEY (`id_kategori_produk_sub`);

--
-- Indexes for table `rb_keterangan`
--
ALTER TABLE `rb_keterangan`
  ADD PRIMARY KEY (`id_keterangan`);

--
-- Indexes for table `rb_konfirmasi_pembayaran_konsumen`
--
ALTER TABLE `rb_konfirmasi_pembayaran_konsumen`
  ADD PRIMARY KEY (`id_konfirmasi_pembayaran`);

--
-- Indexes for table `rb_konsumen`
--
ALTER TABLE `rb_konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indexes for table `rb_kota`
--
ALTER TABLE `rb_kota`
  ADD PRIMARY KEY (`kota_id`);

--
-- Indexes for table `rb_penjualan`
--
ALTER TABLE `rb_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `rb_penjualan_detail`
--
ALTER TABLE `rb_penjualan_detail`
  ADD PRIMARY KEY (`id_penjualan_detail`);

--
-- Indexes for table `rb_penjualan_temp`
--
ALTER TABLE `rb_penjualan_temp`
  ADD PRIMARY KEY (`id_penjualan_detail`);

--
-- Indexes for table `rb_pesanan_diterima`
--
ALTER TABLE `rb_pesanan_diterima`
  ADD PRIMARY KEY (`id_pesanan_diterima`),
  ADD KEY `id_penjualan` (`id_penjualan`),
  ADD KEY `id_penjualan_2` (`id_penjualan`);

--
-- Indexes for table `rb_produk`
--
ALTER TABLE `rb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `rb_produk_diskon`
--
ALTER TABLE `rb_produk_diskon`
  ADD PRIMARY KEY (`id_produk_diskon`);

--
-- Indexes for table `rb_provinsi`
--
ALTER TABLE `rb_provinsi`
  ADD PRIMARY KEY (`provinsi_id`);

--
-- Indexes for table `rb_rekening_reseller`
--
ALTER TABLE `rb_rekening_reseller`
  ADD PRIMARY KEY (`id_rekening_reseller`);

--
-- Indexes for table `rb_reseller`
--
ALTER TABLE `rb_reseller`
  ADD PRIMARY KEY (`id_reseller`);

--
-- Indexes for table `rb_reseller_cod`
--
ALTER TABLE `rb_reseller_cod`
  ADD PRIMARY KEY (`id_cod`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id_templates`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `users_modul`
--
ALTER TABLE `users_modul`
  ADD PRIMARY KEY (`id_umod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `background`
--
ALTER TABLE `background`
  MODIFY `id_background` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `id_header` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `iklanatas`
--
ALTER TABLE `iklanatas`
  MODIFY `id_iklanatas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id_logo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `rb_kategori_produk`
--
ALTER TABLE `rb_kategori_produk`
  MODIFY `id_kategori_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rb_kategori_produk_sub`
--
ALTER TABLE `rb_kategori_produk_sub`
  MODIFY `id_kategori_produk_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rb_keterangan`
--
ALTER TABLE `rb_keterangan`
  MODIFY `id_keterangan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rb_konfirmasi_pembayaran_konsumen`
--
ALTER TABLE `rb_konfirmasi_pembayaran_konsumen`
  MODIFY `id_konfirmasi_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `rb_konsumen`
--
ALTER TABLE `rb_konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `rb_kota`
--
ALTER TABLE `rb_kota`
  MODIFY `kota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT for table `rb_penjualan`
--
ALTER TABLE `rb_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=414;

--
-- AUTO_INCREMENT for table `rb_penjualan_detail`
--
ALTER TABLE `rb_penjualan_detail`
  MODIFY `id_penjualan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=489;

--
-- AUTO_INCREMENT for table `rb_penjualan_temp`
--
ALTER TABLE `rb_penjualan_temp`
  MODIFY `id_penjualan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `rb_pesanan_diterima`
--
ALTER TABLE `rb_pesanan_diterima`
  MODIFY `id_pesanan_diterima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `rb_produk`
--
ALTER TABLE `rb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `rb_produk_diskon`
--
ALTER TABLE `rb_produk_diskon`
  MODIFY `id_produk_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `rb_provinsi`
--
ALTER TABLE `rb_provinsi`
  MODIFY `provinsi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `rb_rekening_reseller`
--
ALTER TABLE `rb_rekening_reseller`
  MODIFY `id_rekening_reseller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rb_reseller`
--
ALTER TABLE `rb_reseller`
  MODIFY `id_reseller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rb_reseller_cod`
--
ALTER TABLE `rb_reseller_cod`
  MODIFY `id_cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id_templates` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users_modul`
--
ALTER TABLE `users_modul`
  MODIFY `id_umod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
