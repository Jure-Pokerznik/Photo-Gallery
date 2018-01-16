-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2018 at 06:56 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foto_album`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `ID` int(10) NOT NULL,
  `naslov_albuma` varchar(500) NOT NULL,
  `opis_albuma` varchar(1000) NOT NULL,
  `slika` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`ID`, `naslov_albuma`, `opis_albuma`, `slika`, `status`) VALUES
(28, 'Lisice', 'NavÃ¡dna lisÃ­ca ali rdÃ©Äa lisÃ­ca (znanstveno ime Vulpes vulpes) je zelo prilagodljiva Å¾ival, saj naseljuje razliÄne Å¾ivljenjske prostore. Naseljuje predele Evrope, Severne Amerike, Severne Afrike in veÄjega dela Azije.', '404680971animals.jpg', 'procesiranje'),
(29, 'Rakuni', 'Rakun (znanstveno ime Procyon lotor), znan tudi kot severnoameriÅ¡ki rakun je srednje velik sesalec, ki izvira iz Severne Amerike. Po velikosti je najveÄji iz druÅ¾ine Procyonidae, saj je njegovo telo dolgo od 40 do 70 cm in tehta od 3,5 do 9 kg.', '822171672rakun.jpg', 'procesiranje'),
(30, 'Podgane', 'Podgane (znanstveno ime Rattus) spadajo med sesalce (natanÄneje med glodavce). Od miÅ¡i se razlikujejo po velikosti, saj so velike vsaj 12 centimetrov, in imajo daljÅ¡i rep.', '608493103podgana.jpg', 'procesiranje'),
(31, 'Ptice', 'PtÃ­Äi ali ptÃ­ce (znanstveno ime Aves) so dvonoÅ¾ni, toplokrvni vretenÄarji (Vertebrata), pokriti s perjem, s sprednjimi udi spremenjenimi v peruti z lahkimi in votlimi kostmi.', '584639458ptica.jpg', 'procesiranje'),
(35, 'etsteststest', 'test', '2021762455404680971animals.jpg', 'zbrisano'),
(36, '4535345', 'test3345345', '1398093077744789670rakun.jpg', 'zbrisano');

-- --------------------------------------------------------

--
-- Table structure for table `galerija`
--

CREATE TABLE `galerija` (
  `ID` int(11) NOT NULL,
  `album_id` varchar(10) NOT NULL,
  `naslov_galerije` varchar(1000) NOT NULL,
  `slika_galerija` varchar(1000) NOT NULL,
  `tagi` varchar(500) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galerija`
--

INSERT INTO `galerija` (`ID`, `album_id`, `naslov_galerije`, `slika_galerija`, `tagi`, `status`) VALUES
(1, '28', 'Lisice', '0208823638087795701.jpg', 'lisice,Å¾ivali,lisica', 'procesiranje'),
(2, '28', 'Lisice', '11286974758lisica-1-960x600.jpg', 'lisice,Å¾ivali,lisica', 'procesiranje'),
(3, '28', 'Lisice', '270212813cute-baby-foxes-cubs-17-574436be67482__880.jpg', 'lisice,Å¾ivali,lisica', 'procesiranje'),
(4, '28', 'Lisice', '31655453314DOav3fdUIAAX-Rh.jpg', 'lisice,Å¾ivali,lisica', 'procesiranje'),
(5, '28', 'Lisice', '4476469106foxtales_growingup.jpg', 'lisice,Å¾ivali,lisica', 'procesiranje'),
(6, '29', 'Rakuni', '0366825881Raccoon-5.jpg', 'rakun,Å¾ivali,raccoon,trash panda,rakuni', 'procesiranje'),
(7, '29', 'Rakuni', '11269128368Raccoon-1-1040x520.jpg', 'rakun,Å¾ivali,raccoon,trash panda,rakuni', 'procesiranje'),
(8, '29', 'Rakuni', '21342485241Raccoon-06.jpg', 'rakun,Å¾ivali,raccoon,trash panda,rakuni', 'procesiranje'),
(9, '29', 'Rakuni', '31860580962How-to-get-rid-of-raccoons.jpg', 'rakun,Å¾ivali,raccoon,trash panda,rakuni', 'procesiranje'),
(10, '29', 'Rakuni', '41983811862raccoon-grass.ngsversion.1396530745057.jpg', 'rakun,Å¾ivali,raccoon,trash panda,rakuni', 'procesiranje'),
(11, '29', 'Rakuni', '51093841939567341681.jpg', 'rakun,Å¾ivali,raccoon,trash panda,rakuni', 'procesiranje'),
(12, '30', 'Podgane', '0998391339city_rat_DurHM125_hqhbmc.jpg', 'podgane,podgana,miÅ¡,miÅ¡i,miÅ¡ke,Å¾ivali', 'procesiranje'),
(13, '30', 'Podgane', '12060051007rat-tunnel.jpg', 'podgane,podgana,miÅ¡,miÅ¡i,miÅ¡ke,Å¾ivali', 'procesiranje'),
(14, '30', 'Podgane', '2112264277image_5268025_1.jpg', 'podgane,podgana,miÅ¡,miÅ¡i,miÅ¡ke,Å¾ivali', 'procesiranje'),
(15, '30', 'Podgane', '316788374044241977404_b4d18ee67c_b.jpg', 'podgane,podgana,miÅ¡,miÅ¡i,miÅ¡ke,Å¾ivali', 'procesiranje'),
(16, '30', 'Podgane', '4116175921Whiterat-GettyImages-120691475-590f12573df78c92832783ae.jpg', 'podgane,podgana,miÅ¡,miÅ¡i,miÅ¡ke,Å¾ivali', 'procesiranje'),
(17, '30', 'Podgane', '51122339235lab-rats-cancer-orig-1.jpg', 'podgane,podgana,miÅ¡,miÅ¡i,miÅ¡ke,Å¾ivali', 'procesiranje'),
(18, '31', 'Ptice', '01783019541yxeok4wpwe54cn9y05j1.jpg', 'ptice,ptiÄi,Å¾ivali', 'procesiranje'),
(19, '31', 'Ptice', '1105766478prow-featured.jpg', 'ptice,ptiÄi,Å¾ivali', 'procesiranje'),
(20, '31', 'Ptice', '2280273245blue-birds.jpg.824x0_q71-e1468919609567.jpg', 'ptice,ptiÄi,Å¾ivali', 'procesiranje'),
(21, '31', 'Ptice', '3547467403ss-bird_honeycreeper.jpg', 'ptice,ptiÄi,Å¾ivali', 'procesiranje'),
(22, '31', 'Ptice', '41528317400sun-conure.jpg', 'ptice,ptiÄi,Å¾ivali', 'procesiranje');

-- --------------------------------------------------------

--
-- Table structure for table `prijava`
--

CREATE TABLE `prijava` (
  `ID` int(11) NOT NULL,
  `uporabnisko_ime` varchar(20) NOT NULL,
  `geslo` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prijava`
--

INSERT INTO `prijava` (`ID`, `uporabnisko_ime`, `geslo`, `status`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'uporabnik', 'geslo', 'admin'),
(3, 'test', 'test', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `galerija`
--
ALTER TABLE `galerija`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `prijava`
--
ALTER TABLE `prijava`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `galerija`
--
ALTER TABLE `galerija`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `prijava`
--
ALTER TABLE `prijava`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
