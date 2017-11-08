-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.100
-- Generation Time: Mar 11, 2016 at 06:57 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kodebarang` varchar(10) NOT NULL,
  `nmbarang` varchar(45) DEFAULT NULL,
  `harga` varchar(20) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `tglupdatestok` date DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`kodebarang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kodebarang`, `nmbarang`, `harga`, `stok`, `tglupdatestok`, `status`) VALUES
('dtg', 'Detergen', '10000', 50, '2016-03-11', ''),
('ex', 'example', '1000', NULL, NULL, 'danger'),
('pfm', 'Parfum', '1000', 50, '2016-03-11', ''),
('sbn', 'Sabun', '1500', 50, '2016-03-11', ''),
('smp', 'sampo', '1000', 50, '2016-03-11', '');

-- --------------------------------------------------------

--
-- Table structure for table `jenislaundry`
--

CREATE TABLE IF NOT EXISTS `jenislaundry` (
  `idjenislaundry` varchar(10) NOT NULL,
  `nmjenislaundry` varchar(20) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`idjenislaundry`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenislaundry`
--

INSERT INTO `jenislaundry` (`idjenislaundry`, `nmjenislaundry`, `status`) VALUES
('cb', 'Cuci Basah', ''),
('ch', 'Cuci Harum', ''),
('ck', 'Cuci Kering', ''),
('cs', 'Cuci Strika', ''),
('Sh', 'Super Harum', 'danger');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `nik` varchar(20) NOT NULL,
  `nmkaryawan` varchar(50) DEFAULT NULL,
  `almtkaryawan` varchar(50) DEFAULT NULL,
  `telpkaryawan` varchar(20) DEFAULT NULL,
  `genderkaryawan` enum('L','P') DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nmkaryawan`, `almtkaryawan`, `telpkaryawan`, `genderkaryawan`, `status`) VALUES
('00000000000', 'master', 'master', 'master', 'L', ''),
('20160310081', 'Alvin Hidayatullah', 'Kunir', '0334 58217', 'L', 'danger'),
('20160310829', 'Rafsan Jackson', 'Sumberjo', '082143161314', 'L', '');

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE IF NOT EXISTS `konsumen` (
  `kodekonsumen` varchar(10) NOT NULL,
  `nmkonsumen` varchar(50) DEFAULT NULL,
  `almkonsumen` varchar(50) DEFAULT NULL,
  `telpkonsumen` varchar(20) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`kodekonsumen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`kodekonsumen`, `nmkonsumen`, `almkonsumen`, `telpkonsumen`, `status`) VALUES
('KSM0000001', 'Rafi', 'asdsa', 'asdsad', ''),
('KSM0000002', 'Aldhan', 'Jln', '0123123', ''),
('KSM0000003', 'Ahmad Dhani', 'Ini TalkShow', '123', 'danger'),
('KSM0000004', 'Sule', 'asdsa', 'asdsda', ''),
('terhapus', 'terhapus', 'terhapus', 'terhapus', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) DEFAULT NULL,
  `typeuser` varchar(10) DEFAULT NULL,
  `karyawan_nik` varchar(20) NOT NULL,
  PRIMARY KEY (`username`,`karyawan_nik`),
  UNIQUE KEY `username` (`username`),
  KEY `fk_login_karyawan_idx` (`karyawan_nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `typeuser`, `karyawan_nik`) VALUES
('admin', 'admin', 'admin', '00000000000'),
('alvin', 'alvin123', 'admin', '20160310081'),
('user', 'user', 'user', '00000000000');

-- --------------------------------------------------------

--
-- Table structure for table `pemakaianbarang`
--

CREATE TABLE IF NOT EXISTS `pemakaianbarang` (
  `kodepengeluaran` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `karyawan_nik` varchar(20) NOT NULL,
  `barang_kodebarang` varchar(5) NOT NULL,
  PRIMARY KEY (`kodepengeluaran`,`karyawan_nik`,`barang_kodebarang`),
  KEY `fk_pemakaianbarang_karyawan1_idx` (`karyawan_nik`),
  KEY `fk_pemakaianbarang_barang1_idx` (`barang_kodebarang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pemakaianbarang`
--

INSERT INTO `pemakaianbarang` (`kodepengeluaran`, `jumlah`, `karyawan_nik`, `barang_kodebarang`) VALUES
(1, 1, '00000000000', 'dtg'),
(2, 1, '00000000000', 'pfm'),
(3, 2, '00000000000', 'sbn'),
(4, 50, '00000000000', 'dtg'),
(5, 50, '00000000000', 'pfm'),
(6, 50, '00000000000', 'sbn'),
(7, 50, '00000000000', 'smp');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `nopembelian` varchar(10) NOT NULL,
  `tglpembelian` date DEFAULT NULL,
  `totalbiaya` int(11) DEFAULT NULL,
  `karyawan_nik` varchar(20) NOT NULL,
  `supplier_idsupplier` varchar(10) NOT NULL,
  `Keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`nopembelian`,`karyawan_nik`,`supplier_idsupplier`),
  KEY `fk_pembelian_karyawan1_idx` (`karyawan_nik`),
  KEY `fk_pembelian_supplier1_idx` (`supplier_idsupplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`nopembelian`, `tglpembelian`, `totalbiaya`, `karyawan_nik`, `supplier_idsupplier`, `Keterangan`) VALUES
('1', '2016-03-11', 10000, '00000000000', 'SPL0000001', ''),
('2', '2016-03-11', 1350000, '00000000000', 'SPL0000001', '');

-- --------------------------------------------------------

--
-- Table structure for table `rincianpembelian`
--

CREATE TABLE IF NOT EXISTS `rincianpembelian` (
  `norincian` int(13) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` varchar(20) NOT NULL,
  `barang_kodebarang` varchar(5) NOT NULL,
  `pembelian_nopembelian` varchar(13) NOT NULL,
  PRIMARY KEY (`norincian`,`barang_kodebarang`,`pembelian_nopembelian`),
  KEY `fk_rincianpembelian_barang1_idx` (`barang_kodebarang`),
  KEY `fk_rincianpembelian_pembelian1_idx` (`pembelian_nopembelian`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rincianpembelian`
--

INSERT INTO `rincianpembelian` (`norincian`, `jumlah`, `harga`, `barang_kodebarang`, `pembelian_nopembelian`) VALUES
(1001, 1, '10000', 'dtg', '1'),
(2002, 100, '1000000', 'dtg', '2'),
(2003, 100, '150000', 'sbn', '2'),
(2004, 100, '100000', 'pfm', '2'),
(2005, 100, '100000', 'smp', '2');

-- --------------------------------------------------------

--
-- Table structure for table `rinciantransaksi`
--

CREATE TABLE IF NOT EXISTS `rinciantransaksi` (
  `idrincian` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` varchar(20) NOT NULL,
  `transaksi_notransaksi` varchar(10) NOT NULL,
  `transaksi_konsumen_kodekonsumen` varchar(10) NOT NULL,
  `transaksi_karyawan_nik` varchar(20) NOT NULL,
  `tarif_idjenispakaian` varchar(10) NOT NULL,
  `tarif_jenislaundry_idjenislandry` varchar(5) NOT NULL,
  PRIMARY KEY (`idrincian`,`transaksi_notransaksi`,`transaksi_konsumen_kodekonsumen`,`transaksi_karyawan_nik`,`tarif_idjenispakaian`,`tarif_jenislaundry_idjenislandry`),
  KEY `fk_rinciantransaksi_transaksi1_idx` (`transaksi_notransaksi`,`transaksi_konsumen_kodekonsumen`,`transaksi_karyawan_nik`),
  KEY `fk_rinciantransaksi_tarif1_idx` (`tarif_idjenispakaian`,`tarif_jenislaundry_idjenislandry`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `idsupplier` varchar(10) NOT NULL,
  `nmsupplier` varchar(45) DEFAULT NULL,
  `almtsupplier` varchar(45) DEFAULT NULL,
  `telpsupplier` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`idsupplier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`idsupplier`, `nmsupplier`, `almtsupplier`, `telpsupplier`, `status`) VALUES
('SPL0000001', 'Matahari', 'Jln', '123', '');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE IF NOT EXISTS `tarif` (
  `idjenispakaian` varchar(10) NOT NULL,
  `nmpakaian` varchar(45) DEFAULT NULL,
  `tarif` int(11) DEFAULT NULL,
  `jenislaundry_idjenislandry` varchar(5) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`idjenispakaian`,`jenislaundry_idjenislandry`),
  UNIQUE KEY `idjenispakaian` (`idjenispakaian`),
  KEY `fk_tarif_jenislaundry1_idx` (`jenislaundry_idjenislandry`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`idjenispakaian`, `nmpakaian`, `tarif`, `jenislaundry_idjenislandry`, `status`) VALUES
('cbcd', 'Celana Dalam', 5000, 'cb', ''),
('cbcl', 'Celana', 2000, 'cb', ''),
('cbex', 'example', 2147483647, 'cb', 'danger'),
('cbhp', 'Handphone :v', 1000, 'cb', ''),
('cbjk', 'Jaket', 2500, 'cb', ''),
('cbks', 'Kaos', 1000, 'cb', ''),
('cbSlm', 'Selimut', 10000, 'cb', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `notransaksi` varchar(10) NOT NULL,
  `tgltransaksi` date DEFAULT NULL,
  `tglambil` date DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `totalbiaya` varchar(20) NOT NULL,
  `nmjenislaundry` varchar(20) NOT NULL,
  `konsumen_kodekonsumen` varchar(10) NOT NULL,
  `karyawan_nik` varchar(20) NOT NULL,
  PRIMARY KEY (`notransaksi`,`konsumen_kodekonsumen`,`karyawan_nik`),
  KEY `fk_transaksi_konsumen1_idx` (`konsumen_kodekonsumen`),
  KEY `fk_transaksi_karyawan1_idx` (`karyawan_nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`notransaksi`, `tgltransaksi`, `tglambil`, `diskon`, `totalbiaya`, `nmjenislaundry`, `konsumen_kodekonsumen`, `karyawan_nik`) VALUES
('0000000001', '2016-03-11', '2016-03-13', 10, '4500', 'Cuci Basah', 'KSM0000004', '00000000000');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_login_karyawan` FOREIGN KEY (`karyawan_nik`) REFERENCES `karyawan` (`nik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pemakaianbarang`
--
ALTER TABLE `pemakaianbarang`
  ADD CONSTRAINT `fk_pemakaianbarang_barang1` FOREIGN KEY (`barang_kodebarang`) REFERENCES `barang` (`kodebarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pemakaianbarang_karyawan1` FOREIGN KEY (`karyawan_nik`) REFERENCES `karyawan` (`nik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `fk_pembelian_karyawan1` FOREIGN KEY (`karyawan_nik`) REFERENCES `karyawan` (`nik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pembelian_supplier1` FOREIGN KEY (`supplier_idsupplier`) REFERENCES `supplier` (`idsupplier`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rincianpembelian`
--
ALTER TABLE `rincianpembelian`
  ADD CONSTRAINT `fk_rincianpembelian_barang1` FOREIGN KEY (`barang_kodebarang`) REFERENCES `barang` (`kodebarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rincianpembelian_pembelian1` FOREIGN KEY (`pembelian_nopembelian`) REFERENCES `pembelian` (`nopembelian`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rinciantransaksi`
--
ALTER TABLE `rinciantransaksi`
  ADD CONSTRAINT `fk_rinciantransaksi_tarif1` FOREIGN KEY (`tarif_idjenispakaian`, `tarif_jenislaundry_idjenislandry`) REFERENCES `tarif` (`idjenispakaian`, `jenislaundry_idjenislandry`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rinciantransaksi_transaksi1` FOREIGN KEY (`transaksi_notransaksi`, `transaksi_konsumen_kodekonsumen`, `transaksi_karyawan_nik`) REFERENCES `transaksi` (`notransaksi`, `konsumen_kodekonsumen`, `karyawan_nik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tarif`
--
ALTER TABLE `tarif`
  ADD CONSTRAINT `fk_tarif_jenislaundry1` FOREIGN KEY (`jenislaundry_idjenislandry`) REFERENCES `jenislaundry` (`idjenislaundry`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_karyawan1` FOREIGN KEY (`karyawan_nik`) REFERENCES `karyawan` (`nik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaksi_konsumen1` FOREIGN KEY (`konsumen_kodekonsumen`) REFERENCES `konsumen` (`kodekonsumen`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
