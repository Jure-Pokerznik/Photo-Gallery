-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 05, 2018 at 10:24 PM
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
(35, 'etsteststest', 'test', '2021762455404680971animals.jpg', 'procesiranje');

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
(16, '35', 'etsteststest', '2764245943156945887WHDQ-513188548.jpg', 'test3', 'procesiranje'),
(17, '35', 'etsteststest', '01179159148964068134WHDQ-513188548.jpg', 'test', 'procesiranje'),
(18, '31', 'Ptice', '0197460362964068134WHDQ-513188548.jpg', 'test342', 'procesiranje'),
(19, '29', 'Rakuni', '0617723345744789670rakun.jpg', 'rakun', 'procesiranje'),
(20, '35', 'etsteststest', '094596737744789670rakun.jpg', 'test', 'procesiranje'),
(21, '35', 'etsteststest', '01486008387822171672rakun.jpg', 'test,test43,eeso,ewtr,est,ertesta,aw34rta,aw3t', 'procesiranje'),
(25, '35', 'etsteststest', '0245715889', 'a,b,c,d,e,f,g', 'procesiranje'),
(26, '31', 'Ptice', '01906389073', 't,e,s', 'procesiranje'),
(27, '31', 'Ptice', '0897590031', '', 'procesiranje'),
(28, '31', 'Ptice', '015811864821819789355WHDQ-513188548.jpg', 't,e', 'procesiranje');

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `galerija`
--
ALTER TABLE `galerija`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `prijava`
--
ALTER TABLE `prijava`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
