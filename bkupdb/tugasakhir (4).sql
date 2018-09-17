-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2018 at 04:07 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasakhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahanbaku`
--

CREATE TABLE `bahanbaku` (
  `idBB` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga_beli` double NOT NULL,
  `stok` int(11) NOT NULL,
  `idSatuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahanbaku`
--

INSERT INTO `bahanbaku` (`idBB`, `nama`, `harga_beli`, `stok`, `idSatuan`) VALUES
(3, 'Tepung Gaplek: Premium', 700000, 25, 1),
(4, 'Tepung Terigu: Rajaku', 660000, 120, 1),
(5, 'Masako', 1000, 359, 6),
(6, 'Tepung Kanji: Cap Dara', 550000, 100, 1),
(7, 'Sumbo / Pewarna', 2300, 350, 6),
(8, 'Sajikuh', 1000, 250, 6),
(9, 'Telur', 1400, 170, 5);

-- --------------------------------------------------------

--
-- Table structure for table `bahanbaku_has_barang`
--

CREATE TABLE `bahanbaku_has_barang` (
  `bahanbaku_idBB` int(11) NOT NULL,
  `barang_idBarang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahanbaku_has_barang`
--

INSERT INTO `bahanbaku_has_barang` (`bahanbaku_idBB`, `barang_idBarang`, `jumlah`) VALUES
(3, 1, 4),
(3, 2, 5),
(3, 8, 2),
(5, 1, 5),
(6, 8, 11),
(8, 1, 10),
(9, 2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `bahanbaku_has_spk`
--

CREATE TABLE `bahanbaku_has_spk` (
  `bahanbaku_idBB` int(11) NOT NULL,
  `spk_idSpk` int(11) NOT NULL,
  `sisa` int(11) DEFAULT NULL,
  `jumlah_digunakan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahanbaku_has_spk`
--

INSERT INTO `bahanbaku_has_spk` (`bahanbaku_idBB`, `spk_idSpk`, `sisa`, `jumlah_digunakan`) VALUES
(3, 12, 0, 36),
(5, 12, 0, 65),
(8, 12, 0, 120);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idBarang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_jual` double NOT NULL,
  `idJenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idBarang`, `nama`, `stok`, `harga_jual`, `idJenis`) VALUES
(1, 'Tiga Bersaudara', 20, 55000, 4),
(2, 'Ratu Jerebet', 13, 71000, 2),
(3, 'Tunggal Serunuk', 8, 44000, 4),
(4, 'Cap Kembar', 10, 88000, 1),
(7, 'Nama tolong diperbaiki', 24, 12321, 1),
(8, 'Udang Super', 0, 5000, 9);

-- --------------------------------------------------------

--
-- Table structure for table `barang_has_nota_jual`
--

CREATE TABLE `barang_has_nota_jual` (
  `barang_idBarang` int(11) NOT NULL,
  `nota_jual_idJual` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_has_nota_jual`
--

INSERT INTO `barang_has_nota_jual` (`barang_idBarang`, `nota_jual_idJual`, `jumlah`) VALUES
(1, 1, 5),
(1, 2, 11),
(2, 1, 20),
(2, 2, 15),
(4, 1, 20),
(8, 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `hpp`
--

CREATE TABLE `hpp` (
  `idHpp` int(11) NOT NULL,
  `hpp` double NOT NULL,
  `biaya_tenaga_kerja` double NOT NULL,
  `biaya_mesin` double NOT NULL,
  `biaya_bahan_baku` double NOT NULL,
  `biaya_lahan` double NOT NULL,
  `jadwalproduksi_idJadwalproduksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwalproduksi`
--

CREATE TABLE `jadwalproduksi` (
  `idJadwalproduksi` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `tgl_mulai_real` date NOT NULL,
  `tgl_selesai_real` date NOT NULL,
  `hasil_produksi` int(11) NOT NULL,
  `hargaperkwh` double NOT NULL,
  `sewa_lahan` tinyint(4) NOT NULL,
  `lahan_idLahan` int(11) NOT NULL,
  `listrik_idListrik` int(11) NOT NULL,
  `spk_idSpk` int(11) NOT NULL,
  `prosesproduksi_idProsesproduksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `idJenis` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`idJenis`, `jenis`) VALUES
(1, 'Dadu'),
(2, 'Jari'),
(3, 'Manggar'),
(4, 'Persegi'),
(6, 'Kotak'),
(9, 'Udang');

-- --------------------------------------------------------

--
-- Table structure for table `keranjangbelanja`
--

CREATE TABLE `keranjangbelanja` (
  `idKeranjangBelanja` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subTotal` int(11) NOT NULL,
  `barang_idBarang` int(11) NOT NULL,
  `nota_jual_idJual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `konversi`
--

CREATE TABLE `konversi` (
  `idKonversi` int(11) NOT NULL,
  `dari_satuan` int(11) NOT NULL,
  `ke_satuan` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `tipe` tinyint(4) NOT NULL,
  `satuan_idSatuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lahan`
--

CREATE TABLE `lahan` (
  `idLahan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `biaya_sewa` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lahan`
--

INSERT INTO `lahan` (`idLahan`, `nama`, `biaya_sewa`) VALUES
(1, 'Pekarangan pak subagio', 1550000),
(2, 'Depan Halaman bu hajar', 900000);

-- --------------------------------------------------------

--
-- Table structure for table `listrik`
--

CREATE TABLE `listrik` (
  `idListrik` int(11) NOT NULL,
  `hargaperkwh` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mesin`
--

CREATE TABLE `mesin` (
  `idMesin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `watt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mesin`
--

INSERT INTO `mesin` (`idMesin`, `nama`, `watt`) VALUES
(1, 'Oven', 1500),
(2, 'Bolier', 5500),
(3, 'Mixer', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `nota_beli`
--

CREATE TABLE `nota_beli` (
  `idBeli` int(11) NOT NULL,
  `tgl_beli` date NOT NULL,
  `tgl_bayar` date NOT NULL,
  `status_bayar` tinyint(4) NOT NULL,
  `total_harga` double NOT NULL,
  `supplier_idSupplier` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_beli`
--

INSERT INTO `nota_beli` (`idBeli`, `tgl_beli`, `tgl_bayar`, `status_bayar`, `total_harga`, `supplier_idSupplier`, `deleted`) VALUES
(43, '2018-06-06', '0000-00-00', 1, 55000, 1, 0),
(44, '2018-07-20', '2018-07-01', 0, 16500000, 2, 0),
(49, '2018-08-05', '0000-00-00', 0, 9038000, 3, 0),
(50, '2018-08-05', '0000-00-00', 1, 1100000, 1, 0),
(51, '2018-08-05', '0000-00-00', 1, 14555000, 2, 0),
(52, '2018-08-05', '0000-00-00', 1, 11322000, 1, 0),
(53, '2018-08-05', '0000-00-00', 1, 7057500, 3, 0),
(54, '2018-08-05', '0000-00-00', 1, 7057500, 1, 0),
(55, '2018-08-05', '0000-00-00', 1, 25000, 3, 1),
(56, '2018-08-05', '0000-00-00', 1, 3757500, 1, 0),
(57, '2018-08-05', '0000-00-00', 1, 1515000, 3, 1),
(58, '2018-08-05', '0000-00-00', 1, 276000, 1, 0),
(59, '2018-08-06', '0000-00-00', 1, 7520000, 2, 0),
(60, '2018-08-06', '0000-00-00', 1, 16468500, 1, 0),
(61, '2018-08-06', '0000-00-00', 1, 8956000, 1, 0),
(62, '2018-08-06', '0000-00-00', 1, 3765000, 1, 0),
(63, '2018-08-06', '0000-00-00', 1, 2839200, 3, 0),
(64, '2018-08-06', '0000-00-00', 1, 40000, 1, 0),
(65, '2018-08-06', '0000-00-00', 1, 5000, 1, 0),
(66, '2018-08-07', '0000-00-00', 1, 156000, 2, 0),
(67, '2018-08-07', '0000-00-00', 0, 11335000, 1, 0),
(68, '2018-08-07', '0000-00-00', 1, 20000, 2, 1),
(69, '2018-08-08', '0000-00-00', 1, 1400000, 3, 0),
(70, '2018-08-31', '0000-00-00', 1, 0, 1, 0),
(71, '2018-08-31', '0000-00-00', 1, 402375, 4, 0),
(72, '2018-09-05', '0000-00-00', 1, 2500, 2, 0),
(73, '2018-09-07', '0000-00-00', 0, 0, 4, 0),
(74, '2018-09-07', '0000-00-00', 0, 0, 3, 0),
(75, '2018-09-07', '0000-00-00', 0, 0, 2, 0),
(76, '2018-09-07', '0000-00-00', 0, 0, 1, 0),
(77, '2018-09-07', '0000-00-00', 0, 880000, 4, 0),
(78, '2018-09-12', '0000-00-00', 0, 0, 4, 0),
(79, '2018-09-12', '0000-00-00', 0, 0, 4, 0),
(80, '2018-09-12', '0000-00-00', 0, 0, 1, 0),
(81, '2018-09-12', '0000-00-00', 0, 0, 1, 0),
(82, '2018-09-12', '0000-00-00', 0, 0, 3, 0),
(83, '2018-09-12', '0000-00-00', 0, 4050000, 1, 0),
(84, '2018-09-12', '0000-00-00', 0, 0, 2, 1),
(85, '2018-09-12', '0000-00-00', 0, 4252375, 3, 0),
(86, '2018-09-12', '0000-00-00', 0, 1205000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nota_beli_has_bahanbaku`
--

CREATE TABLE `nota_beli_has_bahanbaku` (
  `nota_beli_idBeli` int(11) NOT NULL,
  `bahanbaku_idBB` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `validasi` tinyint(1) NOT NULL,
  `harga_sekarang` double NOT NULL,
  `sudah_tertambah` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_beli_has_bahanbaku`
--

INSERT INTO `nota_beli_has_bahanbaku` (`nota_beli_idBeli`, `bahanbaku_idBB`, `jumlah`, `validasi`, `harga_sekarang`, `sudah_tertambah`) VALUES
(43, 5, 55, 1, 0, 0),
(44, 4, 15, 1, 0, 0),
(44, 6, 12, 1, 0, 0),
(49, 5, 2, 1, 475, 0),
(49, 6, 16, 1, 0, 0),
(49, 7, 20, 1, 0, 0),
(49, 8, 40, 1, 500, 0),
(49, 9, 100, 1, 0, 0),
(50, 6, 2, 1, 60000, 0),
(51, 3, 15, 1, 0, 0),
(51, 5, 5, 1, 500, 0),
(51, 6, 6, 1, 0, 0),
(52, 3, 15, 1, 85000, 0),
(52, 5, 15, 1, 0, 0),
(52, 7, 15, 1, 0, 0),
(52, 9, 15, 1, 0, 0),
(53, 3, 5, 1, 350000, 0),
(53, 4, 5, 1, 0, 0),
(53, 9, 5, 1, 0, 0),
(54, 3, 5, 1, 85000, 0),
(54, 4, 5, 1, 50000, 0),
(54, 9, 5, 1, 0, 0),
(55, 8, 10, 1, 500, 0),
(55, 9, 10, 1, 0, 0),
(56, 3, 5, 1, 85000, 0),
(56, 9, 5, 1, 0, 0),
(57, 3, 2, 1, 350000, 0),
(57, 9, 10, 1, 0, 0),
(58, 7, 20, 1, 0, 0),
(58, 8, 80, 1, 0, 0),
(58, 9, 100, 1, 0, 0),
(59, 3, 10, 1, 0, 0),
(59, 5, 20, 1, 500, 0),
(60, 3, 20, 1, 85000, 0),
(60, 4, 2, 1, 50000, 0),
(60, 9, 99, 1, 0, 0),
(61, 6, 16, 1, 60000, 0),
(61, 7, 20, 1, 0, 0),
(61, 8, 80, 1, 0, 0),
(61, 9, 20, 1, 0, 0),
(62, 3, 5, 1, 85000, 0),
(62, 5, 15, 1, 0, 0),
(63, 3, 2, 1, 350000, 0),
(63, 4, 2, 1, 0, 0),
(63, 7, 4, 1, 0, 0),
(63, 8, 4, 1, 500, 0),
(63, 9, 4, 1, 0, 0),
(64, 5, 15, 1, 0, 0),
(64, 8, 10, 1, 0, 0),
(64, 9, 10, 1, 0, 0),
(65, 5, 5, 1, 0, 0),
(66, 5, 6, 1, 500, 0),
(66, 9, 100, 1, 0, 0),
(67, 3, 15, 1, 85000, 0),
(67, 5, 55, 1, 0, 0),
(67, 9, 20, 1, 0, 0),
(68, 5, 20, 1, 500, 0),
(69, 3, 2, 1, 350000, 0),
(71, 4, 5, 1, 80000, 0),
(71, 5, 3, 1, 475, 1),
(72, 5, 5, 1, 500, 1),
(77, 4, 11, 0, 80000, 0),
(81, 3, 23, 0, 85000, 0),
(82, 3, 23, 0, 350000, 0),
(83, 4, 15, 0, 50000, 0),
(83, 6, 55, 0, 60000, 0),
(84, 6, 153, 0, 65000, 0),
(85, 3, 12, 0, 350000, 0),
(85, 5, 5, 0, 475, 0),
(85, 8, 100, 0, 500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nota_beli_has_spk`
--

CREATE TABLE `nota_beli_has_spk` (
  `nota_beli_idBeli` int(11) NOT NULL,
  `spk_idSpk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nota_jual`
--

CREATE TABLE `nota_jual` (
  `idJual` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `pelanggan_idPelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_jual`
--

INSERT INTO `nota_jual` (`idJual`, `tanggal`, `status`, `pelanggan_idPelanggan`) VALUES
(1, '2018-07-17', 0, 1),
(2, '2018-07-29', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idPelanggan` int(11) NOT NULL,
  `namaPelanggan` varchar(100) NOT NULL,
  `noHp` bigint(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idPelanggan`, `namaPelanggan`, `noHp`, `email`, `password`) VALUES
(1, 'Basuki', 87798216555, 'basuki@gmail.com', 'a'),
(2, 'Tjahaja', 81555987232, 'tjahajapurnama@gmail.com', 'a'),
(3, 'Purnama', 8879877765, 'btp@gmail.com', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

CREATE TABLE `pemasok` (
  `idSupplier` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `telp` varchar(20) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`idSupplier`, `nama`, `alamat`, `telp`, `kota`, `deleted`) VALUES
(1, 'Sumber Agungz', 'Sukodono', '085446799255', 'Sidoarjo', 0),
(2, 'Kencono Sejahtera', 'Sepanjang', '0852301571241', 'Sidoarjo', 0),
(3, 'Satrio Bina Nusantara', 'Kejambon', '0315911577', 'Surabaya', 0),
(4, 'Djiebrats', 'Wisma Mandala', '085123123213', 'Gresik', 0),
(5, '12', '12', '12', '12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemasok_has_bahanbaku`
--

CREATE TABLE `pemasok_has_bahanbaku` (
  `pemasok_idSupplier` int(11) NOT NULL,
  `bahanbaku_idBB` int(11) NOT NULL,
  `leadtime` int(11) NOT NULL,
  `harga_beli` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasok_has_bahanbaku`
--

INSERT INTO `pemasok_has_bahanbaku` (`pemasok_idSupplier`, `bahanbaku_idBB`, `leadtime`, `harga_beli`) VALUES
(1, 3, 4, 85000),
(1, 4, 3, 50000),
(1, 6, 4, 60000),
(2, 5, 4, 500),
(2, 6, 3, 65000),
(3, 3, 4, 350000),
(3, 5, 2, 475),
(3, 8, 1, 500),
(4, 4, 7, 80000),
(4, 5, 1, 500),
(4, 9, 1, 800);

-- --------------------------------------------------------

--
-- Table structure for table `prosesproduksi`
--

CREATE TABLE `prosesproduksi` (
  `idProsesproduksi` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `lama_proses` int(11) NOT NULL,
  `urutan` int(11) NOT NULL,
  `mesin_idMesin` int(11) NOT NULL,
  `barang_idBarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prosesproduksi`
--

INSERT INTO `prosesproduksi` (`idProsesproduksi`, `nama`, `lama_proses`, `urutan`, `mesin_idMesin`, `barang_idBarang`) VALUES
(3, 'Mengeringkan Kerupuks', 5, 1, 1, 1),
(4, 'Mengemas Kerupuk', 2, 2, 2, 1),
(6, 'Mengirimkan Kerupuk', 2, 1, 1, 2),
(8, 'Mengirimkan Kerupuk', 2, 3, 1, 1),
(11, 'Proses X', 2, 4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `idSatuan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`idSatuan`, `nama`) VALUES
(1, 'Kg'),
(2, 'Gram'),
(3, 'Liter'),
(4, 'Buah'),
(5, 'Butir'),
(6, 'Bungkus'),
(7, 'Mililiter'),
(8, 'Ton');

-- --------------------------------------------------------

--
-- Table structure for table `spk`
--

CREATE TABLE `spk` (
  `idSpk` int(11) NOT NULL,
  `tgl_spk` date NOT NULL,
  `tgl_perencanaan` date NOT NULL,
  `rencana_produksi` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `barang_idBarang` int(11) NOT NULL,
  `nota_jual_idJual` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spk`
--

INSERT INTO `spk` (`idSpk`, `tgl_spk`, `tgl_perencanaan`, `rencana_produksi`, `status`, `barang_idBarang`, `nota_jual_idJual`, `deleted`) VALUES
(2, '2018-07-29', '2018-08-17', 55, 0, 1, 1, 1),
(5, '2018-08-07', '2018-08-09', 2323, 0, 1, 1, 1),
(6, '2018-08-07', '2018-08-31', 69, 0, 8, 2, 1),
(7, '2018-08-07', '2018-09-03', 51, 0, 1, 1, 0),
(8, '2018-08-07', '2018-08-30', 69, 0, 7, 2, 1),
(9, '2018-08-07', '2017-11-25', 23, 0, 8, 1, 0),
(10, '2018-08-07', '2018-08-31', 51, 0, 3, 2, 1),
(11, '2018-08-10', '2018-10-10', 12, 0, 1, 2, 1),
(12, '2018-08-16', '2018-08-31', 12, 0, 1, 2, 0),
(13, '2018-09-13', '2018-09-14', 21, 0, 2, 1, 1),
(14, '2018-09-13', '2018-09-21', 5, 0, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tenagakerja`
--

CREATE TABLE `tenagakerja` (
  `idTenagakerja` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `gaji` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenagakerja`
--

INSERT INTO `tenagakerja` (`idTenagakerja`, `nama`, `alamat`, `telp`, `kota`, `status`, `gaji`) VALUES
(1, 'Suprapto', 'Semolowaru', '0315911577', 'Surabaya', 0, 150000),
(2, 'Danang Budiarto', 'Semolowaru', '0315975584', 'Surabaya', 1, 100000),
(3, 'Kuncoro', 'Ahmad Yani', '03172885621', 'Gresik', 1, 150000),
(4, 'Saritem', 'Pagesangan', '123', 'Sidoarjo', 0, 75000),
(5, 'Indrawijaya', 'Bendul Merisi', '992', 'Surabaya', 0, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `tenagakerja_has_jadwalproduksi`
--

CREATE TABLE `tenagakerja_has_jadwalproduksi` (
  `tenagakerja_idTenagakerja` int(11) NOT NULL,
  `jadwalproduksi_idJadwalproduksi` int(11) NOT NULL,
  `tugas` varchar(45) NOT NULL,
  `lama_kerja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `umkm`
--

CREATE TABLE `umkm` (
  `idUmkm` int(11) NOT NULL,
  `namaUmkm` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `telepon` int(12) NOT NULL,
  `nomorRekening` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `salt` varchar(50) NOT NULL,
  `hak_akses` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `username`, `password`, `salt`, `hak_akses`, `nama`) VALUES
(1, 'rizki', '090306b4e794d4125aa744539bf8dc1c', 'aa', 99, 'UD Kurn Jaya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahanbaku`
--
ALTER TABLE `bahanbaku`
  ADD PRIMARY KEY (`idBB`);

--
-- Indexes for table `bahanbaku_has_barang`
--
ALTER TABLE `bahanbaku_has_barang`
  ADD PRIMARY KEY (`bahanbaku_idBB`,`barang_idBarang`),
  ADD KEY `fk_bahanbaku_has_barang_barang1_idx` (`barang_idBarang`),
  ADD KEY `fk_bahanbaku_has_barang_bahanbaku1_idx` (`bahanbaku_idBB`);

--
-- Indexes for table `bahanbaku_has_spk`
--
ALTER TABLE `bahanbaku_has_spk`
  ADD PRIMARY KEY (`bahanbaku_idBB`,`spk_idSpk`),
  ADD KEY `fk_bahanbaku_has_spk_spk1_idx` (`spk_idSpk`),
  ADD KEY `fk_bahanbaku_has_spk_bahanbaku1_idx` (`bahanbaku_idBB`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idBarang`);

--
-- Indexes for table `barang_has_nota_jual`
--
ALTER TABLE `barang_has_nota_jual`
  ADD PRIMARY KEY (`barang_idBarang`,`nota_jual_idJual`),
  ADD KEY `fk_barang_has_nota_jual_nota_jual1_idx` (`nota_jual_idJual`),
  ADD KEY `fk_barang_has_nota_jual_barang1_idx` (`barang_idBarang`);

--
-- Indexes for table `hpp`
--
ALTER TABLE `hpp`
  ADD PRIMARY KEY (`idHpp`),
  ADD KEY `fk_hpp_jadwalproduksi1_idx` (`jadwalproduksi_idJadwalproduksi`);

--
-- Indexes for table `jadwalproduksi`
--
ALTER TABLE `jadwalproduksi`
  ADD PRIMARY KEY (`idJadwalproduksi`),
  ADD KEY `fk_jadwalproduksi_lahan1_idx` (`lahan_idLahan`),
  ADD KEY `fk_jadwalproduksi_listrik1_idx` (`listrik_idListrik`),
  ADD KEY `fk_jadwalproduksi_spk1_idx` (`spk_idSpk`),
  ADD KEY `fk_jadwalproduksi_prosesproduksi1_idx` (`prosesproduksi_idProsesproduksi`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`idJenis`);

--
-- Indexes for table `keranjangbelanja`
--
ALTER TABLE `keranjangbelanja`
  ADD PRIMARY KEY (`idKeranjangBelanja`),
  ADD KEY `fk_keranjangbelanja_barang1_idx` (`barang_idBarang`),
  ADD KEY `fk_keranjangbelanja_nota_jual1_idx` (`nota_jual_idJual`);

--
-- Indexes for table `konversi`
--
ALTER TABLE `konversi`
  ADD PRIMARY KEY (`idKonversi`);

--
-- Indexes for table `lahan`
--
ALTER TABLE `lahan`
  ADD PRIMARY KEY (`idLahan`);

--
-- Indexes for table `listrik`
--
ALTER TABLE `listrik`
  ADD PRIMARY KEY (`idListrik`);

--
-- Indexes for table `mesin`
--
ALTER TABLE `mesin`
  ADD PRIMARY KEY (`idMesin`);

--
-- Indexes for table `nota_beli`
--
ALTER TABLE `nota_beli`
  ADD PRIMARY KEY (`idBeli`),
  ADD KEY `fk_nota_beli_supplier1_idx` (`supplier_idSupplier`);

--
-- Indexes for table `nota_beli_has_bahanbaku`
--
ALTER TABLE `nota_beli_has_bahanbaku`
  ADD PRIMARY KEY (`nota_beli_idBeli`,`bahanbaku_idBB`),
  ADD KEY `fk_nota_beli_has_bahanbaku_bahanbaku1_idx` (`bahanbaku_idBB`),
  ADD KEY `fk_nota_beli_has_bahanbaku_nota_beli1_idx` (`nota_beli_idBeli`);

--
-- Indexes for table `nota_beli_has_spk`
--
ALTER TABLE `nota_beli_has_spk`
  ADD PRIMARY KEY (`nota_beli_idBeli`,`spk_idSpk`),
  ADD KEY `fk_nota_beli_has_spk_spk1_idx` (`spk_idSpk`),
  ADD KEY `fk_nota_beli_has_spk_nota_beli1_idx` (`nota_beli_idBeli`);

--
-- Indexes for table `nota_jual`
--
ALTER TABLE `nota_jual`
  ADD PRIMARY KEY (`idJual`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idPelanggan`);

--
-- Indexes for table `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`idSupplier`);

--
-- Indexes for table `pemasok_has_bahanbaku`
--
ALTER TABLE `pemasok_has_bahanbaku`
  ADD PRIMARY KEY (`pemasok_idSupplier`,`bahanbaku_idBB`),
  ADD KEY `fk_pemasok_has_bahanbaku_bahanbaku1_idx` (`bahanbaku_idBB`),
  ADD KEY `fk_pemasok_has_bahanbaku_pemasok1_idx` (`pemasok_idSupplier`);

--
-- Indexes for table `prosesproduksi`
--
ALTER TABLE `prosesproduksi`
  ADD PRIMARY KEY (`idProsesproduksi`),
  ADD KEY `fk_prosesproduksi_mesin1_idx` (`mesin_idMesin`),
  ADD KEY `fk_prosesproduksi_barang1_idx` (`barang_idBarang`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`idSatuan`);

--
-- Indexes for table `spk`
--
ALTER TABLE `spk`
  ADD PRIMARY KEY (`idSpk`),
  ADD KEY `fk_spk_barang1_idx` (`barang_idBarang`),
  ADD KEY `fk_spk_nota_jual1_idx` (`nota_jual_idJual`);

--
-- Indexes for table `tenagakerja`
--
ALTER TABLE `tenagakerja`
  ADD PRIMARY KEY (`idTenagakerja`);

--
-- Indexes for table `tenagakerja_has_jadwalproduksi`
--
ALTER TABLE `tenagakerja_has_jadwalproduksi`
  ADD PRIMARY KEY (`tenagakerja_idTenagakerja`,`jadwalproduksi_idJadwalproduksi`),
  ADD KEY `fk_tenagakerja_has_jadwalproduksi_jadwalproduksi1_idx` (`jadwalproduksi_idJadwalproduksi`),
  ADD KEY `fk_tenagakerja_has_jadwalproduksi_tenagakerja1_idx` (`tenagakerja_idTenagakerja`);

--
-- Indexes for table `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`idUmkm`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahanbaku`
--
ALTER TABLE `bahanbaku`
  MODIFY `idBB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idBarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `hpp`
--
ALTER TABLE `hpp`
  MODIFY `idHpp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jadwalproduksi`
--
ALTER TABLE `jadwalproduksi`
  MODIFY `idJadwalproduksi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `idJenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `konversi`
--
ALTER TABLE `konversi`
  MODIFY `idKonversi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lahan`
--
ALTER TABLE `lahan`
  MODIFY `idLahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `listrik`
--
ALTER TABLE `listrik`
  MODIFY `idListrik` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mesin`
--
ALTER TABLE `mesin`
  MODIFY `idMesin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `nota_beli`
--
ALTER TABLE `nota_beli`
  MODIFY `idBeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `nota_jual`
--
ALTER TABLE `nota_jual`
  MODIFY `idJual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `idPelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `idSupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `prosesproduksi`
--
ALTER TABLE `prosesproduksi`
  MODIFY `idProsesproduksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `idSatuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `spk`
--
ALTER TABLE `spk`
  MODIFY `idSpk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tenagakerja`
--
ALTER TABLE `tenagakerja`
  MODIFY `idTenagakerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `umkm`
--
ALTER TABLE `umkm`
  MODIFY `idUmkm` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bahanbaku_has_barang`
--
ALTER TABLE `bahanbaku_has_barang`
  ADD CONSTRAINT `fk_bahanbaku_has_barang_bahanbaku1` FOREIGN KEY (`bahanbaku_idBB`) REFERENCES `bahanbaku` (`idBB`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bahanbaku_has_barang_barang1` FOREIGN KEY (`barang_idBarang`) REFERENCES `barang` (`idBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bahanbaku_has_spk`
--
ALTER TABLE `bahanbaku_has_spk`
  ADD CONSTRAINT `fk_bahanbaku_has_spk_bahanbaku1` FOREIGN KEY (`bahanbaku_idBB`) REFERENCES `bahanbaku` (`idBB`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bahanbaku_has_spk_spk1` FOREIGN KEY (`spk_idSpk`) REFERENCES `spk` (`idSpk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `barang_has_nota_jual`
--
ALTER TABLE `barang_has_nota_jual`
  ADD CONSTRAINT `fk_barang_has_nota_jual_barang1` FOREIGN KEY (`barang_idBarang`) REFERENCES `barang` (`idBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_barang_has_nota_jual_nota_jual1` FOREIGN KEY (`nota_jual_idJual`) REFERENCES `nota_jual` (`idJual`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hpp`
--
ALTER TABLE `hpp`
  ADD CONSTRAINT `fk_hpp_jadwalproduksi1` FOREIGN KEY (`jadwalproduksi_idJadwalproduksi`) REFERENCES `jadwalproduksi` (`idJadwalproduksi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jadwalproduksi`
--
ALTER TABLE `jadwalproduksi`
  ADD CONSTRAINT `fk_jadwalproduksi_lahan1` FOREIGN KEY (`lahan_idLahan`) REFERENCES `lahan` (`idLahan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jadwalproduksi_listrik1` FOREIGN KEY (`listrik_idListrik`) REFERENCES `listrik` (`idListrik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jadwalproduksi_prosesproduksi1` FOREIGN KEY (`prosesproduksi_idProsesproduksi`) REFERENCES `prosesproduksi` (`idProsesproduksi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jadwalproduksi_spk1` FOREIGN KEY (`spk_idSpk`) REFERENCES `spk` (`idSpk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `keranjangbelanja`
--
ALTER TABLE `keranjangbelanja`
  ADD CONSTRAINT `fk_keranjangbelanja_barang1` FOREIGN KEY (`barang_idBarang`) REFERENCES `barang` (`idBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_keranjangbelanja_nota_jual1` FOREIGN KEY (`nota_jual_idJual`) REFERENCES `nota_jual` (`idJual`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nota_beli`
--
ALTER TABLE `nota_beli`
  ADD CONSTRAINT `fk_nota_beli_supplier1` FOREIGN KEY (`supplier_idSupplier`) REFERENCES `pemasok` (`idSupplier`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nota_beli_has_bahanbaku`
--
ALTER TABLE `nota_beli_has_bahanbaku`
  ADD CONSTRAINT `fk_nota_beli_has_bahanbaku_bahanbaku1` FOREIGN KEY (`bahanbaku_idBB`) REFERENCES `bahanbaku` (`idBB`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nota_beli_has_bahanbaku_nota_beli1` FOREIGN KEY (`nota_beli_idBeli`) REFERENCES `nota_beli` (`idBeli`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nota_beli_has_spk`
--
ALTER TABLE `nota_beli_has_spk`
  ADD CONSTRAINT `fk_nota_beli_has_spk_nota_beli1` FOREIGN KEY (`nota_beli_idBeli`) REFERENCES `nota_beli` (`idBeli`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nota_beli_has_spk_spk1` FOREIGN KEY (`spk_idSpk`) REFERENCES `spk` (`idSpk`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pemasok_has_bahanbaku`
--
ALTER TABLE `pemasok_has_bahanbaku`
  ADD CONSTRAINT `fk_pemasok_has_bahanbaku_bahanbaku1` FOREIGN KEY (`bahanbaku_idBB`) REFERENCES `bahanbaku` (`idBB`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pemasok_has_bahanbaku_pemasok1` FOREIGN KEY (`pemasok_idSupplier`) REFERENCES `pemasok` (`idSupplier`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prosesproduksi`
--
ALTER TABLE `prosesproduksi`
  ADD CONSTRAINT `fk_prosesproduksi_barang1` FOREIGN KEY (`barang_idBarang`) REFERENCES `barang` (`idBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prosesproduksi_mesin1` FOREIGN KEY (`mesin_idMesin`) REFERENCES `mesin` (`idMesin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `spk`
--
ALTER TABLE `spk`
  ADD CONSTRAINT `fk_spk_barang1` FOREIGN KEY (`barang_idBarang`) REFERENCES `barang` (`idBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_spk_nota_jual1` FOREIGN KEY (`nota_jual_idJual`) REFERENCES `nota_jual` (`idJual`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tenagakerja_has_jadwalproduksi`
--
ALTER TABLE `tenagakerja_has_jadwalproduksi`
  ADD CONSTRAINT `fk_tenagakerja_has_jadwalproduksi_jadwalproduksi1` FOREIGN KEY (`jadwalproduksi_idJadwalproduksi`) REFERENCES `jadwalproduksi` (`idJadwalproduksi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tenagakerja_has_jadwalproduksi_tenagakerja1` FOREIGN KEY (`tenagakerja_idTenagakerja`) REFERENCES `tenagakerja` (`idTenagakerja`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
