-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2020 at 09:28 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Username` varchar(111) NOT NULL,
  `Password` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Username`, `Password`) VALUES
(2, 'kabelomighty@gmail.com', 'kabelo#10');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appoint_id` int(111) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(6) NOT NULL,
  `info` varchar(255) NOT NULL,
  `payment` varchar(25) NOT NULL,
  `patient_id` int(111) NOT NULL,
  `doctor_id` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appoint_id`, `date`, `time`, `info`, `payment`, `patient_id`, `doctor_id`) VALUES
(55, '2020-06-30', '8:15', 'Sambo', 'Medical Aid', 8, 9),
(56, '2020-06-30', '10:00', 'Sambo', 'Medical Aid', 8, 9),
(58, '2020-07-01', '8:15', 'Asthma', 'Medical Aid', 0, 9);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(111) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `doctor_type` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cellno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `name`, `surname`, `doctor_type`, `email`, `cellno`, `password`) VALUES
(9, 'Kabelo', 'Sambo', 'general', 'kabelomighty@gmail.com', '0727780512', 'Kabelo#10');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(111) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cellno` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `name`, `surname`, `email`, `cellno`, `password`) VALUES
(8, 'Kabelo', 'Sambo', 'kabelomighty@gmail.com', '0727780512', '$2y$10$WkIlV9nuCU.XUX0Ky8QHgOwt2sV4z/Obsv6ENn.gMPf12Z7FZwJii');

-- --------------------------------------------------------

--
-- Table structure for table `uappointment`
--

CREATE TABLE `uappointment` (
  `uAppoint_id` int(11) NOT NULL,
  `Surname` varchar(55) NOT NULL,
  `Name` varchar(55) NOT NULL,
  `idNumber` varchar(13) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(8) NOT NULL,
  `info` varchar(55) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `ref_no` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uappointment`
--

INSERT INTO `uappointment` (`uAppoint_id`, `Surname`, `Name`, `idNumber`, `date`, `time`, `info`, `doctor_id`, `ref_no`) VALUES
(23, 'Hlungwani', 'kabelo', '9608015696082', '2020-06-24', '', 'Nose', 4, ''),
(24, 'Hlungwani', 'hlamalani', '8804015696082', '2020-06-24', '', 'Gold Tooth', 5, ''),
(25, 'Sambo', 'kabelo', '8804015696082', '2020-06-25', '', 'Flu', 4, ''),
(27, 'Hlungwani', 'Kabelo', '9608015696082', '2020-06-30', '8:45', 'Asthma', 9, ''),
(28, 'Hlungwani', 'Kabelo', '9608015696082', '2020-06-30', '16:00', 'Cold', 9, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appoint_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `uappointment`
--
ALTER TABLE `uappointment`
  ADD PRIMARY KEY (`uAppoint_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appoint_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `uappointment`
--
ALTER TABLE `uappointment`
  MODIFY `uAppoint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
