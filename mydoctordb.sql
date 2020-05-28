-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2020 at 11:33 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydoctordb`
--

-- --------------------------------------------------------

--
-- Table structure for table `allergies`
--

CREATE TABLE `allergies` (
  `id` int(10) NOT NULL,
  `user` int(10) NOT NULL,
  `ousia` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `allergies`
--

INSERT INTO `allergies` (`id`, `user`, `ousia`) VALUES
(61, 23, 'Exetidini'),
(62, 23, 'Diklofainaki'),
(63, 23, 'Kitriki orfenadrini'),
(64, 23, 'Eukaluptos'),
(65, 23, 'Ivouprofaini');

-- --------------------------------------------------------

--
-- Table structure for table `farmaka`
--

CREATE TABLE `farmaka` (
  `onoma` varchar(50) NOT NULL,
  `symptoma` varchar(50) NOT NULL,
  `history` varchar(50) DEFAULT NULL,
  `dinatotita` varchar(1) DEFAULT NULL,
  `ousia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `farmaka`
--

INSERT INTO `farmaka` (`onoma`, `symptoma`, `history`, `dinatotita`, `ousia`) VALUES
('Algofren', 'Headache', 'Kardiako', 'B', 'Ivouprofaini'),
('Algofren', 'Toothache', NULL, 'E', 'Ivouprofaini'),
('Apotel', 'Fever', NULL, 'E', 'Paraketamoli'),
('Apotel', 'Headache', NULL, 'E', 'Paraketamoli'),
('Aspirin', 'Headache', 'Egkefaliko', 'B', 'Aletylosalikyliko oxy'),
('Biofenac', 'Muscle pain', NULL, 'E', 'Aseklofenaki'),
('Buscopan', 'Stomach ache', NULL, 'B', 'Boutiloskopolamini'),
('Comtrex cold', 'Runny nose', NULL, 'B', 'Paraketamoli,Pseudoefedrini,Xlwrofainamini'),
('Depon', 'Fever', NULL, 'E', 'Paraketamoli'),
('Depon', 'Headache', NULL, 'E', 'Paraketamoli'),
('Dulcolax', 'Constipation', NULL, 'B', 'Visakodili'),
('Dulcosoft', 'Constipation', NULL, 'E', 'Poliaithileniglukozi'),
('Ersefuryl', 'Diarrhea', NULL, 'B', 'Nifouroxazidi'),
('Eva lax', 'Constipation', NULL, 'B', 'Gloutaminiko oxy'),
('Gaviscon', 'Stomach ache', NULL, 'E', 'Algiko natrio,Dittanthrakiko natrio,Anthrakiko asbestio'),
('Hexalen', 'Sore throat', NULL, 'B', 'Exetidini'),
('Imodium', 'Diarrhea', NULL, 'B', 'Loperamidi'),
('Laxatol', 'Constipation', NULL, 'B', 'Pikotheiko natrio'),
('Lysopaine', 'Sore throat', NULL, 'E', 'Lusozumi,Papaini,Vakitrakini'),
('Maalox', 'Stomach ache', NULL, 'E', 'Ydroxidio tou argiliou,Ydroxidio tou magnisiou'),
('Musco-ril', 'Muscle pain', NULL, 'B', 'Theiokolxikosidi'),
('Norgesic', 'Muscle pain', NULL, 'B', 'Paraketamoli,Kitriki orfenadrini'),
('Nurofen', 'Fever', NULL, 'E', 'Ivouprofaini'),
('Otrivin', 'Runny nose', NULL, 'E', 'Ksylometazolini'),
('Panadol', 'Fever', NULL, 'E', 'Paraketamoli'),
('Panadol', 'Headache', NULL, 'E', 'Paraketamoli'),
('Panadol Extra', 'Fever', NULL, 'B', 'Paraketamoli,Kafeini'),
('Physiomer', 'Runny nose', NULL, 'E', 'Eukaluptos,Niaouli,Menta'),
('Ponstan', 'Fever', NULL, 'B', 'Mefainamiko oxy'),
('Ponstan', 'Toothache', NULL, 'B', 'Mefainamiko oxy'),
('Roiplon', 'Muscle pain', NULL, 'E', 'Etofainemath'),
('Ronal', 'Runny nose', NULL, 'E', 'Oxymetazolini'),
('Seractil', 'Toothache', NULL, 'E', 'Deksivouprofaini'),
('Simeco', 'Stomach ache', NULL, 'E', 'Ydroxidio tou magnisiou,Simethikoni'),
('Strepsils', 'Sore throat', NULL, 'E', 'Alkooliko dixlwrovenzolio,Amylmetacresol'),
('Tamarine', 'Constipation', NULL, 'E', 'Sennosides'),
('Tasectan', 'Diarrhea', NULL, 'E', 'Tanniko oxy'),
('Voltaren', 'Muscle pain', NULL, 'B', 'Diklofainaki');

-- --------------------------------------------------------

--
-- Table structure for table `medhistory`
--

CREATE TABLE `medhistory` (
  `id` int(10) NOT NULL,
  `user` int(10) NOT NULL,
  `history` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medhistory`
--

INSERT INTO `medhistory` (`id`, `user`, `history`) VALUES
(3, 23, 'Epilipsia,Kinitiki neurwsi,Xwlisterini,Egefaliko,Thromvwsi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `FName` varchar(40) NOT NULL,
  `LName` varchar(40) NOT NULL,
  `uname` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` char(10) NOT NULL,
  `age` int(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `weight` varchar(30) NOT NULL,
  `passwd_enc` varchar(42) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FName`, `LName`, `uname`, `password`, `gender`, `age`, `email`, `weight`, `passwd_enc`) VALUES
(23, 'A', 'A', 'admin', '123', 'Male', 2019, 'admin@dypa.com', '51 - 60', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allergies`
--
ALTER TABLE `allergies`
  ADD PRIMARY KEY (`id`,`user`);

--
-- Indexes for table `farmaka`
--
ALTER TABLE `farmaka`
  ADD PRIMARY KEY (`onoma`,`symptoma`);

--
-- Indexes for table `medhistory`
--
ALTER TABLE `medhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allergies`
--
ALTER TABLE `allergies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `medhistory`
--
ALTER TABLE `medhistory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
