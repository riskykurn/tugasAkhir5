-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2018 at 01:23 PM
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
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahanbaku`
--

INSERT INTO `bahanbaku` (`idBB`, `nama`, `harga_beli`, `stok`, `satuan`) VALUES
(3, 'Tepung Gaplek: Premium', 750000, 38, 'Kuintal'),
(4, 'Tepung Terigu: Rajaku', 660000, 31, 'Kuintal'),
(5, 'Masako', 1000, 13, 'Buah'),
(6, 'Tepung Kanji: Cap Dara', 550000, 13, 'Kg'),
(7, 'Sumbo / Pewarna', 2300, 19, 'Buah'),
(8, 'Sajikuh', 1000, 40, 'Buah');

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
(3, 1, 50),
(5, 1, 10),
(8, 1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `bahanbaku_has_spk`
--

CREATE TABLE `bahanbaku_has_spk` (
  `bahanbaku_idBB` int(11) NOT NULL,
  `spk_idSpk` int(11) NOT NULL,
  `harga` double NOT NULL,
  `jumlah_digunakan` int(11) NOT NULL,
  `histori_harga` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(5, '123213', 123124, 231, 0),
(6, 'asda', 242, 123, 0);

-- --------------------------------------------------------

--
-- Table structure for table `barang_has_nota_jual`
--

CREATE TABLE `barang_has_nota_jual` (
  `barang_idBarang` int(11) NOT NULL,
  `nota_jual_idJual` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(7, 'asdas'),
(8, 'Bijib');

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
  `supplier_idSupplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_beli`
--

INSERT INTO `nota_beli` (`idBeli`, `tgl_beli`, `tgl_bayar`, `status_bayar`, `total_harga`, `supplier_idSupplier`) VALUES
(1, '2018-06-01', '2018-06-05', 1, 2152000, 1),
(2, '2018-06-04', '2018-06-08', 0, 2178000, 2),
(16, '2018-06-04', '0000-00-00', 0, 18360000, 1),
(18, '2018-06-05', '2018-06-30', 1, 3960000, 2),
(19, '2018-06-05', '2018-06-20', 1, 2640000, 1),
(20, '2018-06-05', '2018-06-14', 1, 1870000, 1),
(24, '2018-06-05', '2018-06-20', 1, 752000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `nota_beli_has_bahanbaku`
--

CREATE TABLE `nota_beli_has_bahanbaku` (
  `nota_beli_idBeli` int(11) NOT NULL,
  `bahanbaku_idBB` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota_beli_has_bahanbaku`
--

INSERT INTO `nota_beli_has_bahanbaku` (`nota_beli_idBeli`, `bahanbaku_idBB`, `jumlah`) VALUES
(1, 3, 2),
(1, 4, 3),
(1, 5, 23),
(1, 6, 5),
(2, 4, 2),
(2, 5, 28),
(2, 8, 25),
(16, 3, 4),
(16, 4, 7),
(18, 4, 6),
(19, 6, 2),
(20, 4, 2),
(20, 6, 2),
(24, 3, 1),
(24, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `nota_jual`
--

CREATE TABLE `nota_jual` (
  `idJual` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

CREATE TABLE `pemasok` (
  `idSupplier` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `telp` varchar(20) NOT NULL,
  `kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`idSupplier`, `nama`, `alamat`, `telp`, `kota`) VALUES
(1, 'Sumber Agungz', 'Sukodono', '085446799255', 'Sidoarjo'),
(2, 'Kencono Sejahtera', 'Sepanjang', '0852301571241', 'Sidoarjo'),
(3, 'Satrio Bina Nusantara', 'Kejambon', '0315911577', 'Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `prosesproduksi`
--

CREATE TABLE `prosesproduksi` (
  `idProsesproduksi` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `lama_proses` int(11) NOT NULL,
  `mesin_idMesin` int(11) NOT NULL,
  `barang_idBarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spk`
--

CREATE TABLE `spk` (
  `idSpk` int(11) NOT NULL,
  `tgl_spk` date NOT NULL,
  `rencana_produksi` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `barang_idBarang` int(11) NOT NULL,
  `nota_jual_idJual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `nota_jual`
--
ALTER TABLE `nota_jual`
  ADD PRIMARY KEY (`idJual`);

--
-- Indexes for table `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`idSupplier`);

--
-- Indexes for table `prosesproduksi`
--
ALTER TABLE `prosesproduksi`
  ADD PRIMARY KEY (`idProsesproduksi`),
  ADD KEY `fk_prosesproduksi_mesin1_idx` (`mesin_idMesin`),
  ADD KEY `fk_prosesproduksi_barang1_idx` (`barang_idBarang`);

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
  MODIFY `idBB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
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
  MODIFY `idJenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `lahan`
--
ALTER TABLE `lahan`
  MODIFY `idLahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `idBeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `nota_jual`
--
ALTER TABLE `nota_jual`
  MODIFY `idJual` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `idSupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `prosesproduksi`
--
ALTER TABLE `prosesproduksi`
  MODIFY `idProsesproduksi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `spk`
--
ALTER TABLE `spk`
  MODIFY `idSpk` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tenagakerja`
--
ALTER TABLE `tenagakerja`
  MODIFY `idTenagakerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
