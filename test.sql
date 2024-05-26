-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2024 at 04:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `confirmpass` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `companyID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `confirmpass` varchar(20) NOT NULL,
  `companyname` varchar(100) NOT NULL,
  `contactperson` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contactphone` varchar(20) DEFAULT NULL,
  `userID` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`companyID`, `username`, `password`, `confirmpass`, `companyname`, `contactperson`, `email`, `contactphone`, `userID`) VALUES
(2, '', '', '', 'shell', 'patrick', 'rick@fes', '02545324', NULL),
(3, 'petronas', '555', '', '', NULL, 'petronas@fds', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(3) DEFAULT NULL,
  `location` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `firstname`, `lastname`, `email`, `age`, `location`, `date`) VALUES
(36486720, 'Muhammad', 'Haziq', 'faris.mohdnizam@gmail.com', 24, 'Shah Alam', '2024-01-08 06:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `internship_jobs`
--

CREATE TABLE `internship_jobs` (
  `jobID` int(11) NOT NULL,
  `companyID` int(11) DEFAULT NULL,
  `jobtitle` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `location` varchar(20) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `internship_jobs`
--

INSERT INTO `internship_jobs` (`jobID`, `companyID`, `jobtitle`, `description`, `requirements`, `location`, `duration`) VALUES
(1, NULL, 'daw', 'fes', 'fesf', 'fesf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobapplications`
--

CREATE TABLE `jobapplications` (
  `applicationID` int(11) NOT NULL,
  `studentID` int(11) DEFAULT NULL,
  `jobID` int(11) DEFAULT NULL,
  `studentname` varchar(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `CVfile` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jobapplications`
--

INSERT INTO `jobapplications` (`applicationID`, `studentID`, `jobID`, `studentname`, `status`, `CVfile`) VALUES
(15, NULL, 1, 'patrick', 'Accepted', 0x6d756c7469757365726c6f67696e5f757064617465642e646f6378),
(21, NULL, 1, 'Muhd', 'Accepted', 0x6d756c7469757365726c6f67696e5f757064617465642e646f6378),
(22, NULL, 1, 'yoo', 'Accepted', 0x4c616220457865726369736520352d20494d533630372e646f6378),
(23, NULL, 1, 'yoo', 'Accepted', 0x4c616220457865726369736520352d20494d533630372e646f6378),
(24, NULL, 1, 'yoo', 'Accepted', 0x4c616220457865726369736520352d20494d533630372e646f6378),
(25, NULL, 1, 'rick', 'Pending', 0x6d756c7469757365726c6f67696e5f757064617465642e646f6378);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `confirmpass` varchar(20) NOT NULL,
  `studentname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `studentphone` varchar(20) DEFAULT NULL,
  `studentcourse` varchar(20) NOT NULL,
  `studentcgpa` float NOT NULL,
  `supervisorID` int(11) DEFAULT NULL,
  `userID` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `username`, `password`, `confirmpass`, `studentname`, `email`, `studentphone`, `studentcourse`, `studentcgpa`, `supervisorID`, `userID`) VALUES
(1, '', '', '', 'gorgon', 'dfsf2fa@fs', '02545324', 'mass com', 3.43, 2, NULL),
(2, '', '', '', 'riki', 'kfsd@fs', '08534', 'engineering', 3.23, 1, NULL),
(3, '', '', '', 'toron', 'gdf@bd', '0832', 'IT', 3.41, 3, NULL),
(5, 'jab', '111', '', '', '', NULL, '', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

CREATE TABLE `supervisors` (
  `supervisorID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `confirmpass` varchar(20) NOT NULL,
  `supervisorname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `supervisorphone` varchar(20) DEFAULT NULL,
  `userID` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`supervisorID`, `username`, `password`, `confirmpass`, `supervisorname`, `email`, `supervisorphone`, `userID`) VALUES
(1, '', '', '', 'kamal', 'kamal@ca', '05434232', NULL),
(2, '', '', '', 'ayu', 'ay@grge', '064525', NULL),
(3, '', '', '', 'nabil', 'nabil@co', '095486', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supervisorstudent`
--

CREATE TABLE `supervisorstudent` (
  `supervisorID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `supervisorstudent`
--

INSERT INTO `supervisorstudent` (`supervisorID`, `studentID`) VALUES
(1, 1),
(2, 3),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `usertype` enum('student','supervisor','company','admin') NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `confirmpass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `usertype`, `username`, `email`, `password`, `confirmpass`) VALUES
(2, 'student', '', 'dada@dsad', '2222', ''),
(10, 'supervisor', '', 'csdcs@da', '3333', ''),
(14, 'supervisor', 'petronas', 'pet@43', '999', ''),
(15, 'student', 'flako', 'mende@fe', '4444', ''),
(16, 'supervisor', 'Blackkiller9876', '543@gtrh', '1212', ''),
(19, 'student', 'kpmg1', 'kpmg@gm', '534', ''),
(20, 'company', 'jun12', 'junn12@gd', '0000', ''),
(21, 'supervisor', 'pat', 'rick@fes', '1234', '1234'),
(22, 'company', 'shell', 'shell@com', '4444', '4444'),
(28, 'admin', 'vex', 've@df', '222', '222'),
(29, 'student', 'frr', 'gdf@bd', '111', '111'),
(30, 'student', 'pat', 'bafa@d', '222', '222'),
(31, 'student', 'frr', 'gdf@bd', '222', '222'),
(32, 'student', 'pat', 'ew@fe', '333', '333'),
(33, 'student', 'hello', 'das@e', '2222', '2222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`companyID`),
  ADD KEY `ResID Relationship2` (`userID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internship_jobs`
--
ALTER TABLE `internship_jobs`
  ADD PRIMARY KEY (`jobID`),
  ADD KEY `CompanyID` (`companyID`);

--
-- Indexes for table `jobapplications`
--
ALTER TABLE `jobapplications`
  ADD PRIMARY KEY (`applicationID`),
  ADD KEY `StudentID` (`studentID`),
  ADD KEY `JobID` (`jobID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `students_ibfk_1` (`supervisorID`),
  ADD KEY `students_ibfk_2` (`userID`);

--
-- Indexes for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD PRIMARY KEY (`supervisorID`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- Indexes for table `supervisorstudent`
--
ALTER TABLE `supervisorstudent`
  ADD PRIMARY KEY (`supervisorID`,`studentID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `companyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36486721;

--
-- AUTO_INCREMENT for table `internship_jobs`
--
ALTER TABLE `internship_jobs`
  MODIFY `jobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobapplications`
--
ALTER TABLE `jobapplications`
  MODIFY `applicationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supervisors`
--
ALTER TABLE `supervisors`
  MODIFY `supervisorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `ResID Relationship2` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `internship_jobs`
--
ALTER TABLE `internship_jobs`
  ADD CONSTRAINT `internship_jobs_ibfk_1` FOREIGN KEY (`CompanyID`) REFERENCES `companies` (`companyID`);

--
-- Constraints for table `jobapplications`
--
ALTER TABLE `jobapplications`
  ADD CONSTRAINT `jobapplications_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `students` (`StudentID`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`supervisorID`) REFERENCES `supervisors` (`supervisorID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD CONSTRAINT `ResID Relationship` FOREIGN KEY (`userID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `supervisorstudent`
--
ALTER TABLE `supervisorstudent`
  ADD CONSTRAINT `supervisorstudent_ibfk_1` FOREIGN KEY (`supervisorID`) REFERENCES `supervisors` (`supervisorID`),
  ADD CONSTRAINT `supervisorstudent_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
