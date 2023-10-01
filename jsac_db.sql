-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2023 at 06:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jsac_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `01_anc`
--

CREATE TABLE `01_anc` (
  `id` int(11) NOT NULL,
  `scheme` text NOT NULL,
  `project` text NOT NULL,
  `month` text NOT NULL,
  `district` text NOT NULL,
  `block` text NOT NULL,
  `sector` text NOT NULL,
  `anc_due` text NOT NULL,
  `anc_done` text NOT NULL,
  `anc2` text NOT NULL,
  `anc2_done` text NOT NULL,
  `anc3` text NOT NULL,
  `anc3_done` text NOT NULL,
  `anc4` text NOT NULL,
  `anc4_done` text NOT NULL,
  `date` text NOT NULL,
  `submitted` text NOT NULL,
  `submitedID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `01_anc`
--

INSERT INTO `01_anc` (`id`, `scheme`, `project`, `month`, `district`, `block`, `sector`, `anc_due`, `anc_done`, `anc2`, `anc2_done`, `anc3`, `anc3_done`, `anc4`, `anc4_done`, `date`, `submitted`, `submitedID`) VALUES
(3, 'PMYKJ', 'Sakhi Saheli', 'Feb', '1', '3', '5', '2581', '325', '5210', '3524', '2548', '1235', '6254', '4751', '2023-09-27', 'C.P Raju', 17);

-- --------------------------------------------------------

--
-- Table structure for table `1_immunization`
--

CREATE TABLE `1_immunization` (
  `id` int(11) NOT NULL,
  `schemename` varchar(200) NOT NULL,
  `district` int(6) NOT NULL,
  `block` int(6) NOT NULL,
  `sector` int(6) DEFAULT NULL,
  `month` text DEFAULT NULL,
  `projectName` varchar(200) DEFAULT NULL,
  `reg_preg_women` text DEFAULT NULL,
  `tt1_target` text DEFAULT NULL,
  `tt1_achieved` text DEFAULT NULL,
  `tt2_target` text DEFAULT NULL,
  `tt2_achieved` text DEFAULT NULL,
  `ttbooster_target` text DEFAULT NULL,
  `ttboster_achieved` text DEFAULT NULL,
  `submittedBy` text DEFAULT NULL,
  `submitedID` text DEFAULT NULL,
  `submittedOn` text DEFAULT NULL,
  `updatedBy` text DEFAULT NULL,
  `updatedOn` text DEFAULT NULL,
  `forYear` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `1_immunization`
--

INSERT INTO `1_immunization` (`id`, `schemename`, `district`, `block`, `sector`, `month`, `projectName`, `reg_preg_women`, `tt1_target`, `tt1_achieved`, `tt2_target`, `tt2_achieved`, `ttbooster_target`, `ttboster_achieved`, `submittedBy`, `submitedID`, `submittedOn`, `updatedBy`, `updatedOn`, `forYear`) VALUES
(8, 'PMYKJ', 1, 3, 5, 'Feb', 'Meri Behen', '2000', '1500', '500', '150', '50', '20', '3', 'Ramm', '11', '2023-08-27', NULL, NULL, '2021'),
(13, 'PMYKJ', 2, 1, 8, 'Sep', 'Meri Behen', '25', '12', '10', '25', '12', '35', '30', 'C.P Raju', '17', '2023-09-29', 'C.P Raju', '2023-10-01', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `02_delivery`
--

CREATE TABLE `02_delivery` (
  `id` int(10) NOT NULL,
  `project` text NOT NULL,
  `scheme` text NOT NULL,
  `month` text NOT NULL,
  `district` text NOT NULL,
  `block` text NOT NULL,
  `sector` text NOT NULL,
  `target` text NOT NULL,
  `archived` text NOT NULL,
  `skill` text NOT NULL,
  `non_assisted` text NOT NULL,
  `date` text NOT NULL,
  `submitted` text NOT NULL,
  `submitedID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `02_delivery`
--

INSERT INTO `02_delivery` (`id`, `project`, `scheme`, `month`, `district`, `block`, `sector`, `target`, `archived`, `skill`, `non_assisted`, `date`, `submitted`, `submitedID`) VALUES
(3, 'Namami Gange', 'RDS', 'Feb', '1', '3', '5', '5214', '3256', '8956', '5623', '2023-09-27', 'C.P Raju', 17);

-- --------------------------------------------------------

--
-- Table structure for table `03_bcg`
--

CREATE TABLE `03_bcg` (
  `id` int(11) NOT NULL,
  `project` text NOT NULL,
  `scheme` text NOT NULL,
  `month` text NOT NULL,
  `district` text NOT NULL,
  `block` text NOT NULL,
  `sector` text NOT NULL,
  `bcg1` text NOT NULL,
  `bcg2` text NOT NULL,
  `date` text NOT NULL,
  `submitted` text NOT NULL,
  `submitedID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `03_bcg`
--

INSERT INTO `03_bcg` (`id`, `project`, `scheme`, `month`, `district`, `block`, `sector`, `bcg1`, `bcg2`, `date`, `submitted`, `submitedID`) VALUES
(3, 'Namami Gange', 'PMYKJ', 'Feb', '2', '2', '10', '2563', '854', '2023-09-27', 'C.P Raju', 17);

-- --------------------------------------------------------

--
-- Table structure for table `04_opv`
--

CREATE TABLE `04_opv` (
  `id` int(11) NOT NULL,
  `project` text DEFAULT NULL,
  `scheme` text DEFAULT NULL,
  `month` text DEFAULT NULL,
  `district` text DEFAULT NULL,
  `block` text DEFAULT NULL,
  `sector` text DEFAULT NULL,
  `opv0` text DEFAULT NULL,
  `opv0_done` text DEFAULT NULL,
  `opv1` text DEFAULT NULL,
  `opv1_done` text DEFAULT NULL,
  `opv2` text DEFAULT NULL,
  `opv2_done` text DEFAULT NULL,
  `opv3` text DEFAULT NULL,
  `opv3_done` text DEFAULT NULL,
  `date` text DEFAULT NULL,
  `submitted` text DEFAULT NULL,
  `submitedID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `04_opv`
--

INSERT INTO `04_opv` (`id`, `project`, `scheme`, `month`, `district`, `block`, `sector`, `opv0`, `opv0_done`, `opv1`, `opv1_done`, `opv2`, `opv2_done`, `opv3`, `opv3_done`, `date`, `submitted`, `submitedID`) VALUES
(4, 'Meri Behen', 'PMYKJ', 'Mar', '2', '2', '10', '5485', '4522', '59625', '12357', '85423', '65231', '4528', '2500', '2023-09-27', 'C.P Raju', 17);

-- --------------------------------------------------------

--
-- Table structure for table `05_penta`
--

CREATE TABLE `05_penta` (
  `id` int(11) NOT NULL,
  `project` text NOT NULL,
  `scheme` text NOT NULL,
  `month` text NOT NULL,
  `district` text NOT NULL,
  `block` text NOT NULL,
  `sector` text NOT NULL,
  `penta1` text NOT NULL,
  `penta1_done` text NOT NULL,
  `penta2` text NOT NULL,
  `penta2_done` text NOT NULL,
  `penta3` text NOT NULL,
  `penta3_done` text NOT NULL,
  `date` text NOT NULL,
  `submitted` text NOT NULL,
  `submitedID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `05_penta`
--

INSERT INTO `05_penta` (`id`, `project`, `scheme`, `month`, `district`, `block`, `sector`, `penta1`, `penta1_done`, `penta2`, `penta2_done`, `penta3`, `penta3_done`, `date`, `submitted`, `submitedID`) VALUES
(3, 'Meri Behen', 'RDS', 'Jan', '1', '3', '5', '8542', '5241', '5241', '4023', '2541', '1400', '2023-09-27', 'C.P Raju', 17);

-- --------------------------------------------------------

--
-- Table structure for table `06_rota`
--

CREATE TABLE `06_rota` (
  `id` int(11) NOT NULL,
  `project` text NOT NULL,
  `scheme` text NOT NULL,
  `month` text NOT NULL,
  `district` text NOT NULL,
  `block` text NOT NULL,
  `sector` int(11) NOT NULL,
  `rota1` text NOT NULL,
  `rota1_done` text NOT NULL,
  `rota2` text NOT NULL,
  `rota2_done` text NOT NULL,
  `rota3` text NOT NULL,
  `rota3_done` text NOT NULL,
  `date` text NOT NULL,
  `submitted` text NOT NULL,
  `submitedID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `06_rota`
--

INSERT INTO `06_rota` (`id`, `project`, `scheme`, `month`, `district`, `block`, `sector`, `rota1`, `rota1_done`, `rota2`, `rota2_done`, `rota3`, `rota3_done`, `date`, `submitted`, `submitedID`) VALUES
(3, 'Meri Behen', 'RDS', 'May', '2', '2', 10, '8956', '5623', '4512', '3225', '3256', '1472', '2023-09-27', 'C.P Raju', 17);

-- --------------------------------------------------------

--
-- Table structure for table `07_pcv`
--

CREATE TABLE `07_pcv` (
  `id` int(11) NOT NULL,
  `project` text NOT NULL,
  `scheme` text NOT NULL,
  `month` text NOT NULL,
  `district` text NOT NULL,
  `block` text NOT NULL,
  `sector` text NOT NULL,
  `pcv1` text NOT NULL,
  `pcv1_done` text NOT NULL,
  `pcv2` text NOT NULL,
  `pcv2_done` text NOT NULL,
  `pcv3` text NOT NULL,
  `pcv3_done` text NOT NULL,
  `date` text NOT NULL,
  `submitted` text NOT NULL,
  `submitedID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `07_pcv`
--

INSERT INTO `07_pcv` (`id`, `project`, `scheme`, `month`, `district`, `block`, `sector`, `pcv1`, `pcv1_done`, `pcv2`, `pcv2_done`, `pcv3`, `pcv3_done`, `date`, `submitted`, `submitedID`) VALUES
(4, 'Meri Behen', 'RDS', 'Jan', '2', '1', '8', '8956', '4526', '4562', '3652', '4526', '2000', '2023-09-27', 'C.P Raju', 17);

-- --------------------------------------------------------

--
-- Table structure for table `08_ipv`
--

CREATE TABLE `08_ipv` (
  `id` int(11) NOT NULL,
  `project` text NOT NULL,
  `scheme` text NOT NULL,
  `month` varchar(50) NOT NULL,
  `district` int(4) NOT NULL,
  `block` int(4) NOT NULL,
  `sector` int(4) NOT NULL,
  `ipv1` text NOT NULL,
  `ipv1_done` text NOT NULL,
  `ipv2` text NOT NULL,
  `ipv2_done` text NOT NULL,
  `date` date NOT NULL,
  `submitted` text NOT NULL,
  `submitedID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `08_ipv`
--

INSERT INTO `08_ipv` (`id`, `project`, `scheme`, `month`, `district`, `block`, `sector`, `ipv1`, `ipv1_done`, `ipv2`, `ipv2_done`, `date`, `submitted`, `submitedID`) VALUES
(2, 'Namami Gange', 'PMYKJ', 'Feb', 1, 3, 5, '784', '520', '652', '500', '2023-09-27', 'C.P Raju', 17);

-- --------------------------------------------------------

--
-- Table structure for table `09_mr`
--

CREATE TABLE `09_mr` (
  `id` int(11) NOT NULL,
  `project` text NOT NULL,
  `scheme` text NOT NULL,
  `month` text NOT NULL,
  `district` int(11) NOT NULL,
  `block` int(11) NOT NULL,
  `sector` int(11) NOT NULL,
  `mr1` text NOT NULL,
  `mr1_done` text NOT NULL,
  `mr2` text NOT NULL,
  `mr2_done` text NOT NULL,
  `je1` text NOT NULL,
  `je1_done` text NOT NULL,
  `je2` text NOT NULL,
  `je2_done` text NOT NULL,
  `va1` text NOT NULL,
  `va1_done` text NOT NULL,
  `va2` text NOT NULL,
  `va2_done` text NOT NULL,
  `date` date NOT NULL,
  `submitted` text NOT NULL,
  `submitedID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `09_mr`
--

INSERT INTO `09_mr` (`id`, `project`, `scheme`, `month`, `district`, `block`, `sector`, `mr1`, `mr1_done`, `mr2`, `mr2_done`, `je1`, `je1_done`, `je2`, `je2_done`, `va1`, `va1_done`, `va2`, `va2_done`, `date`, `submitted`, `submitedID`) VALUES
(4, 'Namami Gange', 'PMYKJ', 'Apr', 1, 3, 5, '9897', '4524', '5652', '1452', '7854', '4523', '6548', '2445', '4521', '3265', '6552', '4000', '2023-09-29', 'C.P Raju', 17),
(5, 'Namami Gange', 'RDS', 'Mar', 1, 3, 5, '124', '100', '541', '325', '785', '652', '452', '214', '652', '450', '954', '752', '2023-10-01', 'Ramm', 11);

-- --------------------------------------------------------

--
-- Table structure for table `10_full`
--

CREATE TABLE `10_full` (
  `id` int(11) NOT NULL,
  `project` text NOT NULL,
  `scheme` text NOT NULL,
  `month` text NOT NULL,
  `district` int(11) NOT NULL,
  `block` int(11) NOT NULL,
  `sector` int(11) NOT NULL,
  `full` int(6) NOT NULL,
  `full1` int(6) NOT NULL,
  `date` date NOT NULL,
  `submitted` text NOT NULL,
  `submitedID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `10_full`
--

INSERT INTO `10_full` (`id`, `project`, `scheme`, `month`, `district`, `block`, `sector`, `full`, `full1`, `date`, `submitted`, `submitedID`) VALUES
(4, 'Meri Behen', 'RDS', 'Feb', 1, 3, 5, 2232, 1205, '2023-09-27', 'C.P Raju', 17);

-- --------------------------------------------------------

--
-- Table structure for table `11_child`
--

CREATE TABLE `11_child` (
  `id` int(11) NOT NULL,
  `project` varchar(100) NOT NULL,
  `scheme` varchar(100) NOT NULL,
  `month` varchar(50) NOT NULL,
  `district` int(11) NOT NULL,
  `block` int(11) NOT NULL,
  `sector` int(11) NOT NULL,
  `m1` int(11) NOT NULL,
  `f1` int(11) NOT NULL,
  `m2` int(11) NOT NULL,
  `f2` int(11) NOT NULL,
  `m3` int(11) NOT NULL,
  `f3` int(11) NOT NULL,
  `date` date NOT NULL,
  `submitted` varchar(50) NOT NULL,
  `submitedID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `11_child`
--

INSERT INTO `11_child` (`id`, `project`, `scheme`, `month`, `district`, `block`, `sector`, `m1`, `f1`, `m2`, `f2`, `m3`, `f3`, `date`, `submitted`, `submitedID`) VALUES
(2, 'Meri Behen', 'RDS', 'Feb', 2, 1, 8, 125, 52, 48, 23, 98, 27, '2023-09-29', 'C.P Raju', 17);

-- --------------------------------------------------------

--
-- Table structure for table `12_birth_death`
--

CREATE TABLE `12_birth_death` (
  `id` int(11) NOT NULL,
  `project` varchar(100) NOT NULL,
  `scheme` varchar(100) NOT NULL,
  `month` varchar(50) NOT NULL,
  `district` int(11) NOT NULL,
  `block` int(11) NOT NULL,
  `sector` int(11) NOT NULL,
  `live_born` int(11) NOT NULL,
  `birth_certificate` int(11) NOT NULL,
  `death` int(11) NOT NULL,
  `death_certificate` int(11) NOT NULL,
  `date` date NOT NULL,
  `submitted` varchar(70) NOT NULL,
  `submitedID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `12_birth_death`
--

INSERT INTO `12_birth_death` (`id`, `project`, `scheme`, `month`, `district`, `block`, `sector`, `live_born`, `birth_certificate`, `death`, `death_certificate`, `date`, `submitted`, `submitedID`) VALUES
(1, 'Namami Gange', 'PMYKJ', 'Jul', 2, 1, 8, 365, 458, 100, 56, '2023-09-29', 'C.P Raju', 17);

-- --------------------------------------------------------

--
-- Table structure for table `13_vhsnd`
--

CREATE TABLE `13_vhsnd` (
  `id` int(11) NOT NULL,
  `project` varchar(100) NOT NULL,
  `scheme` varchar(100) NOT NULL,
  `month` varchar(50) NOT NULL,
  `district` int(11) NOT NULL,
  `block` int(11) NOT NULL,
  `sector` int(11) NOT NULL,
  `angbanri` int(11) NOT NULL,
  `vhsnd` int(11) NOT NULL,
  `beneficiaries1` int(11) NOT NULL,
  `beneficiaries2` int(11) NOT NULL,
  `ls` int(11) NOT NULL,
  `cdpo` int(11) NOT NULL,
  `moic` int(11) NOT NULL,
  `date` date NOT NULL,
  `submitted` varchar(50) NOT NULL,
  `submitedID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `13_vhsnd`
--

INSERT INTO `13_vhsnd` (`id`, `project`, `scheme`, `month`, `district`, `block`, `sector`, `angbanri`, `vhsnd`, `beneficiaries1`, `beneficiaries2`, `ls`, `cdpo`, `moic`, `date`, `submitted`, `submitedID`) VALUES
(2, 'Namami Gange', 'PMYKJ', 'Feb', 1, 3, 5, 32, 15, 87, 36, 78, 56, 41, '2023-09-29', 'C.P Raju', 17);

-- --------------------------------------------------------

--
-- Table structure for table `14_snp`
--

CREATE TABLE `14_snp` (
  `id` int(11) NOT NULL,
  `project` varchar(100) NOT NULL,
  `scheme` varchar(70) NOT NULL,
  `month` varchar(50) NOT NULL,
  `district` int(11) NOT NULL,
  `block` int(11) NOT NULL,
  `sector` int(11) NOT NULL,
  `chld1` int(11) NOT NULL,
  `child1_done` int(11) NOT NULL,
  `child2` int(11) NOT NULL,
  `child2_done` int(11) NOT NULL,
  `women1` int(11) NOT NULL,
  `women1_done` int(11) NOT NULL,
  `women2` int(11) NOT NULL,
  `women2_done` int(11) NOT NULL,
  `date` date NOT NULL,
  `submitted` varchar(70) NOT NULL,
  `submitedID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `14_snp`
--

INSERT INTO `14_snp` (`id`, `project`, `scheme`, `month`, `district`, `block`, `sector`, `chld1`, `child1_done`, `child2`, `child2_done`, `women1`, `women1_done`, `women2`, `women2_done`, `date`, `submitted`, `submitedID`) VALUES
(3, 'Sakhi Saheli', 'PMYKJ', 'Aug', 2, 2, 10, 123, 25, 420, 145, 785, 452, 853, 421, '2023-10-01', 'C.P Raju', 17);

-- --------------------------------------------------------

--
-- Table structure for table `15_mal_nutrition`
--

CREATE TABLE `15_mal_nutrition` (
  `id` int(11) NOT NULL,
  `project` varchar(100) NOT NULL,
  `scheme` varchar(100) NOT NULL,
  `month` varchar(50) NOT NULL,
  `district` int(11) NOT NULL,
  `block` int(11) NOT NULL,
  `sector` int(11) NOT NULL,
  `0_6_Month_children` int(11) NOT NULL,
  `0_5_Year_children` int(11) NOT NULL,
  `wt_total_child` int(11) NOT NULL,
  `ht_total_child` int(11) NOT NULL,
  `undernourished_child` int(11) NOT NULL,
  `undernourished_child_treated` int(11) NOT NULL,
  `mtc` int(11) NOT NULL,
  `mtc_enroll` int(11) NOT NULL,
  `mtc_follow_up` int(11) NOT NULL,
  `date` date NOT NULL,
  `submitted` varchar(70) NOT NULL,
  `submitedID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `15_mal_nutrition`
--

INSERT INTO `15_mal_nutrition` (`id`, `project`, `scheme`, `month`, `district`, `block`, `sector`, `0_6_Month_children`, `0_5_Year_children`, `wt_total_child`, `ht_total_child`, `undernourished_child`, `undernourished_child_treated`, `mtc`, `mtc_enroll`, `mtc_follow_up`, `date`, `submitted`, `submitedID`) VALUES
(2, 'Sakhi Saheli', 'RDS', 'Mar', 1, 3, 5, 2325, 110, 1414, 417, 7575, 8224, 742, 857, 222, '2023-10-01', 'C.P Raju', 17);

-- --------------------------------------------------------

--
-- Table structure for table `16_mtc`
--

CREATE TABLE `16_mtc` (
  `id` int(11) NOT NULL,
  `project` varchar(100) NOT NULL,
  `scheme` varchar(100) NOT NULL,
  `month` varchar(50) NOT NULL,
  `district` int(11) NOT NULL,
  `block` int(11) NOT NULL,
  `sector` int(11) NOT NULL,
  `name_mtc` varchar(100) NOT NULL,
  `total_bed` int(11) NOT NULL,
  `occupied_bed` int(11) NOT NULL,
  `date` date NOT NULL,
  `submitted` varchar(70) NOT NULL,
  `submitedID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `16_mtc`
--

INSERT INTO `16_mtc` (`id`, `project`, `scheme`, `month`, `district`, `block`, `sector`, `name_mtc`, `total_bed`, `occupied_bed`, `date`, `submitted`, `submitedID`) VALUES
(2, 'Meri Behen', 'PMYKJ', 'Feb', 1, 3, 5, 'Raj Partap', 3254, 2341, '2023-10-01', 'C.P Raju', 17);

-- --------------------------------------------------------

--
-- Table structure for table `17_ifa`
--

CREATE TABLE `17_ifa` (
  `id` int(11) NOT NULL,
  `project` varchar(100) NOT NULL,
  `scheme` varchar(100) NOT NULL,
  `month` varchar(50) NOT NULL,
  `district` int(11) NOT NULL,
  `block` int(11) NOT NULL,
  `sector` int(11) NOT NULL,
  `pregnant_women_enroll` int(11) NOT NULL,
  `pregnant_women_iaf_180` int(11) NOT NULL,
  `nursing_women_enroll` int(11) NOT NULL,
  `nursing_women_iaf_180` int(11) NOT NULL,
  `girl_enroll` int(11) NOT NULL,
  `girl_iaf` int(11) NOT NULL,
  `date` date NOT NULL,
  `submitted` varchar(70) NOT NULL,
  `submitedID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `17_ifa`
--

INSERT INTO `17_ifa` (`id`, `project`, `scheme`, `month`, `district`, `block`, `sector`, `pregnant_women_enroll`, `pregnant_women_iaf_180`, `nursing_women_enroll`, `nursing_women_iaf_180`, `girl_enroll`, `girl_iaf`, `date`, `submitted`, `submitedID`) VALUES
(2, 'Sakhi Saheli', 'RDS', 'Feb', 1, 3, 5, 78452, 2356, 5623, 4512, 2356, 1243, '2023-10-01', 'C.P Raju', 17);

-- --------------------------------------------------------

--
-- Table structure for table `18_beneficiary`
--

CREATE TABLE `18_beneficiary` (
  `id` int(11) NOT NULL,
  `project` varchar(100) NOT NULL,
  `scheme` varchar(100) NOT NULL,
  `month` varchar(50) NOT NULL,
  `district` int(11) NOT NULL,
  `block` int(11) NOT NULL,
  `sector` int(11) NOT NULL,
  `m1` int(11) NOT NULL,
  `f1` int(11) NOT NULL,
  `m2` int(11) NOT NULL,
  `f2` int(11) NOT NULL,
  `m3` int(11) NOT NULL,
  `f3` int(11) NOT NULL,
  `m4` int(11) NOT NULL,
  `f4` int(11) NOT NULL,
  `m5` int(11) NOT NULL,
  `f5` int(11) NOT NULL,
  `m6` int(11) NOT NULL,
  `f6` int(11) NOT NULL,
  `m7` int(11) NOT NULL,
  `f7` int(11) NOT NULL,
  `m8` int(11) NOT NULL,
  `f8` int(11) NOT NULL,
  `date` date NOT NULL,
  `submitted` varchar(70) NOT NULL,
  `submitedID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `18_beneficiary`
--

INSERT INTO `18_beneficiary` (`id`, `project`, `scheme`, `month`, `district`, `block`, `sector`, `m1`, `f1`, `m2`, `f2`, `m3`, `f3`, `m4`, `f4`, `m5`, `f5`, `m6`, `f6`, `m7`, `f7`, `m8`, `f8`, `date`, `submitted`, `submitedID`) VALUES
(3, 'Namami Gange', 'PMYKJ', 'Feb', 1, 3, 5, 21, 23, 21, 44, 45, 65, 45, 56, 77, 56, 57, 54, 32, 76, 24, 54, '2023-10-01', 'C.P Raju', 17);

-- --------------------------------------------------------

--
-- Table structure for table `19_beneficiary_3_6`
--

CREATE TABLE `19_beneficiary_3_6` (
  `id` int(11) NOT NULL,
  `project` varchar(100) NOT NULL,
  `scheme` varchar(100) NOT NULL,
  `month` varchar(50) NOT NULL,
  `district` int(11) NOT NULL,
  `block` int(11) NOT NULL,
  `sector` int(11) NOT NULL,
  `m1` int(11) NOT NULL,
  `f1` int(11) NOT NULL,
  `m2` int(11) NOT NULL,
  `f2` int(11) NOT NULL,
  `m3` int(11) NOT NULL,
  `f3` int(11) NOT NULL,
  `m4` int(11) NOT NULL,
  `f4` int(11) NOT NULL,
  `m5` int(11) NOT NULL,
  `f5` int(11) NOT NULL,
  `m6` int(11) NOT NULL,
  `f6` int(11) NOT NULL,
  `date` date NOT NULL,
  `submitted` varchar(70) NOT NULL,
  `submitedID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `19_beneficiary_3_6`
--

INSERT INTO `19_beneficiary_3_6` (`id`, `project`, `scheme`, `month`, `district`, `block`, `sector`, `m1`, `f1`, `m2`, `f2`, `m3`, `f3`, `m4`, `f4`, `m5`, `f5`, `m6`, `f6`, `date`, `submitted`, `submitedID`) VALUES
(4, 'Meri Behen', 'PMYKJ', 'Jan', 1, 3, 5, 67, 88, 34, 64, 67, 21, 90, 12, 47, 89, 32, 56, '2023-10-01', 'C.P Raju', 17);

-- --------------------------------------------------------

--
-- Table structure for table `20_beneficiary_adol`
--

CREATE TABLE `20_beneficiary_adol` (
  `id` int(11) NOT NULL,
  `project` varchar(100) NOT NULL,
  `scheme` varchar(100) NOT NULL,
  `month` varchar(50) NOT NULL,
  `district` int(11) NOT NULL,
  `block` int(11) NOT NULL,
  `sector` int(11) NOT NULL,
  `m1` int(11) NOT NULL,
  `f1` int(11) NOT NULL,
  `m2` int(11) NOT NULL,
  `f2` int(11) NOT NULL,
  `date` date NOT NULL,
  `submitted` varchar(70) NOT NULL,
  `submitedID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `20_beneficiary_adol`
--

INSERT INTO `20_beneficiary_adol` (`id`, `project`, `scheme`, `month`, `district`, `block`, `sector`, `m1`, `f1`, `m2`, `f2`, `date`, `submitted`, `submitedID`) VALUES
(3, 'Namami Gange', 'PMYKJ', 'Feb', 1, 3, 5, 3256, 2354, 214, 2365, '2023-10-01', 'C.P Raju', 17);

-- --------------------------------------------------------

--
-- Table structure for table `21_infra`
--

CREATE TABLE `21_infra` (
  `id` int(11) NOT NULL,
  `project` varchar(100) NOT NULL,
  `scheme` varchar(100) NOT NULL,
  `month` varchar(50) NOT NULL,
  `district` int(11) NOT NULL,
  `block` int(11) NOT NULL,
  `sector` int(11) NOT NULL,
  `total_awc` int(11) NOT NULL,
  `gov_building` int(11) NOT NULL,
  `rent_building` int(11) NOT NULL,
  `other_rent` varchar(50) NOT NULL,
  `school` varchar(50) NOT NULL,
  `panchyat` varchar(50) NOT NULL,
  `open_area` varchar(50) NOT NULL,
  `water` varchar(50) NOT NULL,
  `toilet` int(11) NOT NULL,
  `rain_water` varchar(50) NOT NULL,
  `electricity` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `submitted` varchar(70) NOT NULL,
  `submitedID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `21_infra`
--

INSERT INTO `21_infra` (`id`, `project`, `scheme`, `month`, `district`, `block`, `sector`, `total_awc`, `gov_building`, `rent_building`, `other_rent`, `school`, `panchyat`, `open_area`, `water`, `toilet`, `rain_water`, `electricity`, `date`, `submitted`, `submitedID`) VALUES
(2, 'Meri Behen', 'PMYKJ', 'Feb', 1, 3, 5, 54, 42, 23, '87', '23', '97', '67', '12', 32, '54', '99', '2023-10-01', 'C.P Raju', 17);

-- --------------------------------------------------------

--
-- Table structure for table `checkdb`
--

CREATE TABLE `checkdb` (
  `id` int(4) DEFAULT NULL,
  `distirct` varchar(50) DEFAULT NULL,
  `project` varchar(50) DEFAULT NULL,
  `office name` varchar(50) DEFAULT NULL,
  `mobil` int(10) NOT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `userId` varchar(100) DEFAULT NULL,
  `usertype` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkdb`
--

INSERT INTO `checkdb` (`id`, `distirct`, `project`, `office name`, `mobil`, `designation`, `password`, `userId`, `usertype`) VALUES
(1, 'Ranchi', 'swo', 'headquter', 987456321, 'hq', '54321', '1', 'Headquater'),
(2, 'Ranchi', 'swo', 'SDPO', 987412365, 'SDPO', '54321', '2', 'SDPO'),
(3, 'Ranchi', 'swo', 'CDPO', 987564123, 'CDPO', '54321', '3', 'CDPO'),
(4, 'Ranchi', 'swo', 'PANCHYAT ', 987456332, 'PANCHYAT ', '54321', '4', 'PANCHYAT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_block`
--

CREATE TABLE `tbl_block` (
  `block_id` int(11) NOT NULL,
  `block_code` int(11) NOT NULL,
  `block_name` varchar(100) NOT NULL,
  `district_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_block`
--

INSERT INTO `tbl_block` (`block_id`, `block_code`, `block_name`, `district_code`) VALUES
(1, 1, 'ANGARA', 2),
(2, 2, 'BERO', 2),
(3, 3, 'Chas', 1),
(4, 4, 'Bermo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_code` int(11) NOT NULL,
  `district_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_code`, `district_name`) VALUES
(1, 1, 'Bokaro'),
(2, 2, 'Ranchi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `officerName` varchar(100) NOT NULL,
  `officerMObile` varchar(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `designation` varchar(25) NOT NULL,
  `dcodeb` varchar(10) DEFAULT NULL,
  `bcode` varchar(10) NOT NULL,
  `sector` varchar(10) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `userStatus` int(2) NOT NULL DEFAULT 0,
  `lastLogin` datetime DEFAULT NULL,
  `urole` int(2) DEFAULT NULL,
  `currentlogin` datetime DEFAULT NULL,
  `updatedon` datetime DEFAULT NULL,
  `updatedBy` int(10) DEFAULT NULL,
  `online` int(11) NOT NULL DEFAULT 0,
  `about` text NOT NULL,
  `fb` text NOT NULL,
  `insta` text NOT NULL,
  `twitter` text NOT NULL,
  `linkedin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `officerName`, `officerMObile`, `email`, `designation`, `dcodeb`, `bcode`, `sector`, `password`, `userStatus`, `lastLogin`, `urole`, `currentlogin`, `updatedon`, `updatedBy`, `online`, `about`, `fb`, `insta`, `twitter`, `linkedin`) VALUES
(1, 'Karuna Karan', '7463959117', 'karunakaran@email.com', 'Admin', '1', '3', '5', '2', 1, '2023-08-24 13:39:39', 1, '2023-08-24 13:39:39', NULL, NULL, 0, 'Hi I\'am a good boy 👦 ', 'https://www.facebook.com/yogesh.Anjali.jha', '', 'https://twitter.com/i_Yogeshjha', ''),
(2, 'Ram Kumar', '7845123698', 'ram@gmail.com', 'CDPO', '2', '1', '8', '1', 1, '2023-08-24 17:45:58', 2, '2023-08-24 17:45:58', NULL, NULL, 0, 'I\'am CDPO ', '', '', '', ''),
(9, 'KARUNA KARAN', '09060319668', '7870', 'DSWO', '2', '1', '9', '09060319668', 0, NULL, 0, NULL, NULL, NULL, 0, '', '', '', '', ''),
(10, 'Raman Kumar', '7845126932', '0', 'CDPO', '2', '2', '10', '7845126932', 0, NULL, 0, NULL, NULL, NULL, 0, '', '', '', '', ''),
(11, 'Ramm', '78945613236', 'rraaa@gmail.com', 'Sector', '2', '2', '10', '78945613236', 1, NULL, 0, NULL, NULL, NULL, 0, '', '', '', '', ''),
(12, 'KARUNA KARAN', '09060319668', '7870karuna@gmail.com', 'CDPO', '1', '3', '5', '09060319668', 1, NULL, 0, NULL, NULL, NULL, 0, '', '', '', '', ''),
(13, 'Susant Kumar', '6201207781', 'susantkubhagat@gmail.com', 'DSWO', '2', '1', '9', '6201207781', 1, NULL, 0, NULL, NULL, NULL, 0, 'I\'am a DSWO', '', '', '', ''),
(14, 'Kunal Kishor', '8956237485', 'kunal@gmail.com', 'CDPO', '2', '1', '8', '8956237485', 0, NULL, 0, NULL, NULL, NULL, 0, '', '', '', '', ''),
(17, 'C.P Raju', '784512369', 'raju@gmail.com', 'Sector', '2', '2', '10', '235647893', 1, NULL, 0, NULL, NULL, NULL, 1, 'I\'m Good', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `id` int(11) NOT NULL,
  `project` varchar(100) NOT NULL,
  `sdate` varchar(50) DEFAULT NULL,
  `edate` varchar(50) DEFAULT NULL,
  `budget` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_project`
--

INSERT INTO `tbl_project` (`id`, `project`, `sdate`, `edate`, `budget`, `status`) VALUES
(1, 'Meri Behen', '2023-02-22', '2023-06-22', '852258', 0),
(2, 'Namami Gange', '2023-08-18', '2023-08-17', '40000', 0),
(3, 'Sakhi Saheli', '2023-08-09', '2023-08-31', '2500', 0),
(4, 'Koshal Bharat', '2023-08-04', '2023-08-25', '14200', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scheme`
--

CREATE TABLE `tbl_scheme` (
  `id` int(11) NOT NULL,
  `scheme` varchar(100) NOT NULL,
  `sdate` varchar(50) NOT NULL,
  `edate` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_scheme`
--

INSERT INTO `tbl_scheme` (`id`, `scheme`, `sdate`, `edate`, `status`) VALUES
(1, 'PMYKJ', '2023-08-04', '2023-09-10', 0),
(2, 'RDS', '2023-08-18', '2023-09-07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sector`
--

CREATE TABLE `tbl_sector` (
  `id` int(11) NOT NULL,
  `sectorcode` varchar(10) NOT NULL,
  `sector_Name` varchar(100) NOT NULL,
  `dcode` varchar(11) NOT NULL,
  `bcode` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sector`
--

INSERT INTO `tbl_sector` (`id`, `sectorcode`, `sector_Name`, `dcode`, `bcode`) VALUES
(1, '5', 'BIADA', '1', '3'),
(2, '8', 'RWD', '2', '1'),
(3, '9', 'HEC', '1', '1'),
(4, '10', 'SAIL', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `issue` text NOT NULL,
  `msg` text NOT NULL,
  `status` text NOT NULL,
  `time` date NOT NULL,
  `date` date NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `name`, `email`, `subject`, `issue`, `msg`, `status`, `time`, `date`, `token`) VALUES
(1, 'yogeshjha0707@gmail.com', 'yogeshjha0707@gmail.com', 'MCA MED SEM EXAM', 'Server', 'Hi', 'Pending', '0000-00-00', '0000-00-00', 'UT7cVyXm'),
(6, 'Raja', 'yogeshjha0707@gmail.com', 'Student Details for Final Exam', 'use', 'I\'am god', 'Pending', '0000-00-00', '0000-00-00', '2MR5swVl');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `01_anc`
--
ALTER TABLE `01_anc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `1_immunization`
--
ALTER TABLE `1_immunization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `02_delivery`
--
ALTER TABLE `02_delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `03_bcg`
--
ALTER TABLE `03_bcg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `04_opv`
--
ALTER TABLE `04_opv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `05_penta`
--
ALTER TABLE `05_penta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `06_rota`
--
ALTER TABLE `06_rota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `07_pcv`
--
ALTER TABLE `07_pcv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `08_ipv`
--
ALTER TABLE `08_ipv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `09_mr`
--
ALTER TABLE `09_mr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `10_full`
--
ALTER TABLE `10_full`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `11_child`
--
ALTER TABLE `11_child`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `12_birth_death`
--
ALTER TABLE `12_birth_death`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `13_vhsnd`
--
ALTER TABLE `13_vhsnd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `14_snp`
--
ALTER TABLE `14_snp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `15_mal_nutrition`
--
ALTER TABLE `15_mal_nutrition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `16_mtc`
--
ALTER TABLE `16_mtc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `17_ifa`
--
ALTER TABLE `17_ifa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `18_beneficiary`
--
ALTER TABLE `18_beneficiary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `19_beneficiary_3_6`
--
ALTER TABLE `19_beneficiary_3_6`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `20_beneficiary_adol`
--
ALTER TABLE `20_beneficiary_adol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `21_infra`
--
ALTER TABLE `21_infra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_block`
--
ALTER TABLE `tbl_block`
  ADD PRIMARY KEY (`block_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_scheme`
--
ALTER TABLE `tbl_scheme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sector`
--
ALTER TABLE `tbl_sector`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subject` (`subject`,`msg`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `01_anc`
--
ALTER TABLE `01_anc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `1_immunization`
--
ALTER TABLE `1_immunization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `02_delivery`
--
ALTER TABLE `02_delivery`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `03_bcg`
--
ALTER TABLE `03_bcg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `04_opv`
--
ALTER TABLE `04_opv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `05_penta`
--
ALTER TABLE `05_penta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `06_rota`
--
ALTER TABLE `06_rota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `07_pcv`
--
ALTER TABLE `07_pcv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `08_ipv`
--
ALTER TABLE `08_ipv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `09_mr`
--
ALTER TABLE `09_mr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `10_full`
--
ALTER TABLE `10_full`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `11_child`
--
ALTER TABLE `11_child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `12_birth_death`
--
ALTER TABLE `12_birth_death`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `13_vhsnd`
--
ALTER TABLE `13_vhsnd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `14_snp`
--
ALTER TABLE `14_snp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `15_mal_nutrition`
--
ALTER TABLE `15_mal_nutrition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `16_mtc`
--
ALTER TABLE `16_mtc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `17_ifa`
--
ALTER TABLE `17_ifa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `18_beneficiary`
--
ALTER TABLE `18_beneficiary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `19_beneficiary_3_6`
--
ALTER TABLE `19_beneficiary_3_6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `20_beneficiary_adol`
--
ALTER TABLE `20_beneficiary_adol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `21_infra`
--
ALTER TABLE `21_infra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_block`
--
ALTER TABLE `tbl_block`
  MODIFY `block_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_scheme`
--
ALTER TABLE `tbl_scheme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sector`
--
ALTER TABLE `tbl_sector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
