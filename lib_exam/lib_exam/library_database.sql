-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 12:56 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `authorID` int(11) NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `middlename` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `nationality` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`authorID`, `fname`, `middlename`, `lname`, `gender`, `nationality`, `email`) VALUES
(1, 'Kofi', 'Afari', 'Bonsu', 'Male', 'Ghanaian', 'kbonsu@gmail.com'),
(2, 'Keziah', 'Afari', 'ivory', 'Female', 'Nigerian', 'kivory@gmail.com'),
(3, 'Karen', 'Mensah', 'safi', 'Male', 'Burkinabe', 'ksafi@gmail.com'),
(4, 'Kudus', 'Afei', 'Mensah', 'Male', 'French', 'kmensah@gmail.com'),
(5, 'Haren', 'Sebi', 'Melanky', 'Female', 'American', 'hmelanky@gmail.com'),
(6, 'asdf', NULL, NULL, NULL, NULL, NULL),
(7, '', NULL, NULL, NULL, NULL, NULL),
(8, '', NULL, NULL, NULL, NULL, NULL),
(9, '', NULL, NULL, NULL, NULL, NULL),
(10, '', NULL, NULL, NULL, NULL, NULL),
(11, '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookID` int(11) DEFAULT NULL,
  `booktitle` varchar(40) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `publishDate` date NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `noOfCopies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookID`, `booktitle`, `ISBN`, `publishDate`, `publisher`, `noOfCopies`) VALUES
(2, 'Mentos', 23234, '1981-05-14', 'Mekory Company', 30),
(3, 'Shine', 53234, '1989-03-12', 'Kwame su Limited', 40),
(4, 'You', 22834, '2000-03-12', 'Kwame Ofosu Limited', 50),
(5, 'How are', 23454, '1987-03-23', 'Menya Limited', 10),
(NULL, 'hi', 23523, '2000-03-17', 'oufuogbo', 7),
(NULL, 'hi', 23523, '2000-03-17', 'oufuogbo', 7),
(NULL, 'hi', 23523, '2000-03-17', 'oufuogbo', 8),
(7, 'hi', 23523, '2000-03-17', 'oufuogbo', 5),
(8, 'hi', 23523, '2000-03-17', 'oufuogbo', 5),
(9, 'hi', 23523, '2000-03-17', 'oufuogbo', 5),
(10, 'hi', 23523, '2000-03-17', 'oufuogbo', 5),
(11, 'th', 452, '2021-12-01', '4grgrr', 323),
(12, 'kmomkok', 25456, '0000-00-00', 'longare house', 15663),
(14, 'asdf', 123, '2002-06-06', 'safds', 5),
(17, '', 0, '0000-00-00', '', 1),
(18, '', 0, '0000-00-00', '', 1),
(19, '', 0, '0000-00-00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bookauthor`
--

CREATE TABLE `bookauthor` (
  `baID` int(11) DEFAULT NULL,
  `noofBooks` int(11) DEFAULT NULL,
  `authID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookauthor`
--

INSERT INTO `bookauthor` (`baID`, `noofBooks`, `authID`) VALUES
(1, 5, 1),
(2, 2, 2),
(3, 8, 3),
(4, 10, 4),
(5, 3, 5),
(14, NULL, 6),
(15, NULL, 7),
(16, NULL, 8),
(17, NULL, 9),
(18, NULL, 10),
(19, NULL, 11);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genreID` int(11) NOT NULL,
  `genreType` varchar(20) NOT NULL,
  `genreCategory` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genreID`, `genreType`, `genreCategory`) VALUES
(1, 'Action', 3),
(2, 'Love', 2),
(3, 'Tragedy', 3),
(4, 'Adventure', 2),
(5, 'Science fiction', 3),
(6, 'love', 2),
(7, 'comedy', 9),
(8, 'comedy', 9),
(9, 'comedy', 9),
(10, 'comedy', 9),
(11, 'love', 1),
(12, 'comedy', 5),
(13, 'comedy', 2),
(14, 'tragedy', 2),
(15, 'love', 0),
(16, 'love', 0),
(17, 'love', 0),
(18, 'love', 0),
(19, 'love', 0);

-- --------------------------------------------------------

--
-- Table structure for table `librarystaff`
--

CREATE TABLE `librarystaff` (
  `staffID` int(11) DEFAULT NULL,
  `staffPosition` varchar(40) DEFAULT NULL,
  `SSN` int(11) NOT NULL,
  `salary` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `librarystaff`
--

INSERT INTO `librarystaff` (`staffID`, `staffPosition`, `SSN`, `salary`) VALUES
(65, 'staff', 99, '65.00'),
(67, 'locz', 54655, '4.00'),
(2, 'Librarian', 2323433, '3000.00'),
(4, 'Libarian', 2332524, '3000.00'),
(1, 'Receptionist', 2332533, '2000.00'),
(5, 'Intern', 2335633, '500.00');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `personID` int(11) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `middlename` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `contact` varchar(15) NOT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `pasword` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`personID`, `fname`, `middlename`, `lname`, `DOB`, `gender`, `contact`, `nationality`, `email`, `pasword`) VALUES
(1, 'Kofi', 'Ofosu', 'Kyei', '1990-02-06', 'Male', '233509483234', 'Ghanaian', 'kkyei@ashesi.edu.gh', ''),
(2, 'Alvin', 'Ofosu', 'Kyei', '1990-03-06', 'Male', '233579253234', 'Ghanaian', 'akyei@ashesi.edu.gh', ''),
(3, 'Mavis', 'Ofosu', 'Ampadu', '1990-02-03', 'Female', '23354489934', 'Ghanaian', 'mampadu@ashesi.edu.gh', ''),
(4, 'Gabriella', 'Ofosu', 'Owusu', '1995-02-06', 'Female', '23350948334', 'Ghanaian', 'gowusu@ashesi.edu.gh', ''),
(5, 'Gabriella', 'Yemi', 'Ogue', '1999-02-06', 'Female', '233248334234', 'Nigerian', 'gogue@ashesi.edu.gh', ''),
(6, 'Kwesi', 'Yemi', 'Afari', '1999-02-09', 'Male', '233248433234', 'Ghanaian', 'kafari@ashesi.edu.gh', ''),
(7, 'Kwame', 'Owuah', 'Osei', '1999-02-07', 'Male', '233248663234', 'Ghanaian', 'kosei@ashesi.edu.gh', ''),
(8, 'Katalina', 'ash', 'Asecry', '1999-02-06', 'Female', '233222483234', 'Zimbabwe', 'kasecry@ashesi.edu.gh', ''),
(9, 'Esther', 'D', 'Mensah', '0000-00-00', '', '0545452221', 'congo', 'esther.mensah@ashesi.edu.gh', ''),
(10, 'Esther', 'Dzifa Ama', 'Mensah', '2021-12-16', '', '1646894515', 'congo', 'esther.mensah@ashesi.edu.gh', ''),
(11, 'Esther', 'D', 'Mensah', '0000-00-00', '', '46135468986413', 'congo', 'esther.mensah@ashesi.edu.gh', ''),
(12, 'Esther', 'Dzifa Ama', 'Mensah', '0000-00-00', '', '56498461541', 'ghanaian', 'esther.mensah@ashesi.edu.gh', ''),
(14, 'Esther', 'Dzifa Ama', 'Mensah', '0000-00-00', 'Male', '4886454', 'congo', 'esther.mensah@ashesi.edu.gh', ''),
(15, 'Esther', 'Dzifa Ama', 'Mensah', '0000-00-00', 'Male', '02314568', 'ghanaian', 'esther.mensah@ashesi.edu.gh', ''),
(19, 'Esther', 'Dzifa Ama', 'Mensah', '0000-00-00', 'Male', '0245165163', 'ghanaian', 'esther.mensah@ashesi.edu.gh', ''),
(21, 'Esther', 'Dzifa Ama', 'Mensah', '0000-00-00', 'Male', '0241968196', 'ghanaian', 'esther.mensah@ashesi.edu.gh', ''),
(23, 'dorcas', 'osei', 'appiah', '1992-06-05', 'Male', '0249875324', 'angola', 'dorcasosei@gmail.com', ''),
(25, 'dorcas', 'osei', 'appiah', '1992-06-05', 'Male', '0249865324', 'angola', 'dorcasosei@gmail.com', ''),
(27, 'dorcas', 'osei', 'appiah', '1992-06-05', 'Male', '0549865324', 'angola', 'dorcasosei@gmail.com', ''),
(28, 'dorcas', 'osei', 'appiah', '0000-00-00', 'Male', '0242584121', 'angola', 'dorcasosei@gmail.com', '641635156'),
(30, 'dorcas', 'osei', 'appiah', '0000-00-00', 'Male', '0286584121', 'angola', 'dorcasosei@gmail.com', '641635156'),
(31, 'dorcas', 'osei', 'appiah', '0000-00-00', 'Male', '02834364121', 'angola', 'dorcasosei@gmail.com', '641635156'),
(32, 'dorcas', 'osei', 'appiah', '0000-00-00', 'Male', '02835364121', 'angola', 'dorcasosei@gmail.com', '641635156'),
(33, 'Esther', 'Dzifa Ama', 'Mensah', '0000-00-00', 'Male', '111111111111111', 'congo', 'esther.mensah@ashesi.edu.gh', '686485'),
(34, 'Esther', 'Dzifa Ama', 'Mensah', '0000-00-00', 'Male', '12345666', 'ghanaian', 'esther.mensah@ashesi.edu.gh', '646'),
(38, 'dorcas', 'osei', 'appiah', '0000-00-00', 'Male', '1234569', 'angola', 'dorcasosei@gmail.com', '6543523bh'),
(40, 'Esther', 'Dzifa Ama', 'Mensah', '0000-00-00', 'Male', '165465312', 'ghanaian', 'esther.mensah@ashesi.edu.gh', '686485'),
(42, 'Esther', 'Dzifa Ama', 'Mensah', '0000-00-00', 'Male', '1654653123', 'ghanaian', 'esther.mensah@ashesi.edu.gh', '686485'),
(44, 'Esther', 'Dzifa Ama', 'Mensah', '0000-00-00', 'Male', '0000000000', 'ghanaian', 'esther.mensah@ashesi.edu.gh', '686485'),
(46, 'Esther', 'Dzifa Ama', 'Mensah', '0000-00-00', 'Male', '000000087', 'ghanaian', 'esther.mensah@ashesi.edu.gh', '686485'),
(48, 'Esther', 'Dzifa Ama', 'Mensah', '0000-00-00', 'Male', '1', 'ghanaian', 'esther.mensah@ashesi.edu.gh', '686485#'),
(52, 'dorcas', 'osei', 'appiah', '0000-00-00', 'Male', '638', '988', 'dorcasosei@gmail.com', '896'),
(54, 'Esther', 'Dzifa Ama', 'Mensah', '0000-00-00', 'Male', '13213213', 'ghanaian', 'esther.mensah@ashesi.edu.gh', '646'),
(56, 'Esther', 'Dzifa Ama', 'Mensah', '2021-12-22', 'Male', '13213213444', 'ghanaian', 'esther.mensah@ashesi.edu.gh', '6465'),
(60, 'Ama', 'Dzifa Ama', 'Ama', '0000-00-00', 'Female', '727', 'congo', 'esther.mensah@ashesi.edu.gh', '6465'),
(61, 'Ama', 'Dzifa Ama', 'Ama', '0000-00-00', 'Female', '727', 'congo', 'esther.mensah@ashesi.edu.gh', '6465'),
(62, 'dorcas', 'osei', 'appiah', '0000-00-00', 'Male', '638', '988', 'dorcasosei@gmail.com', '896'),
(63, 'dorcas', 'osei', 'appiah', '0000-00-00', 'Male', '638', '988', 'dorcasosei@gmail.com', '896'),
(64, 'Esther', 'Dzifa Ama', 'Mensah', '0000-00-00', 'Male', '1', 'ghanaian', 'esther.mensah@ashesi.edu.gh', '686485#'),
(65, 'Esther', 'D', 'Mensah', '0000-00-00', 'Male', '123654789', 'congo', 'esther.mensah@ashesi.edu.gh', '25962652985'),
(66, 'Lord ', 'israel', 'Mensah', '0000-00-00', 'Male', '02456', 'congo', 'esther.mensah@ashesi.edu.gh', '6465'),
(67, 'dorcas', 'osei', 'appiah', '0000-00-00', 'Male', '1234569', 'angola', 'dorcasosei@gmail.com', '6543523bh'),
(68, 'dorcas', 'osei', 'appiah', '0000-00-00', 'Male', '1234569', 'angola', 'dorcasosei@gmail.com', '6543523bh'),
(69, 'Hanet', 'osei', 'appiah', '0000-00-00', 'Male', '123456789', 'angola', 'dorcasosei@gmail.com', '5959'),
(70, 'Hanet', 'osei', 'appiah', '0000-00-00', 'Male', '123456789', 'angola', 'dorcasosei@gmail.com', '5959'),
(71, 'Lord', 'osei', 'appiah', '0000-00-00', 'Male', '123456789', 'angola', 'dorcasosei@gmail.com', '5959');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportNum` int(11) DEFAULT NULL,
  `dateIssued` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`reportNum`, `dateIssued`) VALUES
(1, '2021-04-14 00:00:00'),
(2, '2021-05-15 00:00:00'),
(3, '2021-04-16 00:00:00'),
(4, '2021-03-17 00:00:00'),
(5, '2021-02-18 00:00:00'),
(6, '2021-02-12 00:00:00'),
(7, '2021-01-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `shelf`
--

CREATE TABLE `shelf` (
  `shelfNo` int(11) DEFAULT NULL,
  `rowno` int(11) DEFAULT NULL,
  `laneno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shelf`
--

INSERT INTO `shelf` (`shelfNo`, `rowno`, `laneno`) VALUES
(1, 1, 1),
(2, 3, 2),
(3, 2, 4),
(4, 4, 3),
(5, 5, 1),
(14, NULL, NULL),
(15, NULL, NULL),
(16, NULL, NULL),
(17, NULL, NULL),
(18, NULL, NULL),
(19, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) DEFAULT NULL,
  `yeargroup` varchar(4) DEFAULT NULL,
  `major` varchar(40) DEFAULT NULL,
  `hostelname` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `yeargroup`, `major`, `hostelname`) VALUES
(5, '2022', 'Computer Engineering', 'Wangari'),
(6, '2023', 'Business Adminstration', 'Colombiana'),
(8, '2025', 'Management Information Systems', 'Walter Sisulu'),
(30, '2022', 'CE', 'hall5'),
(31, '2022', 'CE', 'hall5'),
(32, '2022', 'CE', 'hall5'),
(33, '2021', 'CE', 'wan'),
(69, '2022', 'CE', 'dorcas osei appiah'),
(70, '2022', 'CE', 'dorcas osei appiah');

-- --------------------------------------------------------

--
-- Table structure for table `studentbook`
--

CREATE TABLE `studentbook` (
  `SID` int(11) DEFAULT NULL,
  `BID` int(11) DEFAULT NULL,
  `noofborrowedBooks` int(11) DEFAULT NULL,
  `dateborrowed` date DEFAULT NULL,
  `dateReturned` date DEFAULT NULL,
  `submissiondate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentbook`
--

INSERT INTO `studentbook` (`SID`, `BID`, `noofborrowedBooks`, `dateborrowed`, `dateReturned`, `submissiondate`) VALUES
(6, 2, 4, '2020-03-19', '2021-08-13', '2020-08-14'),
(7, 3, 3, '2009-02-13', NULL, '2009-04-13'),
(8, 4, 3, '2019-01-23', NULL, '2019-03-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`authorID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD KEY `bookID` (`bookID`);

--
-- Indexes for table `bookauthor`
--
ALTER TABLE `bookauthor`
  ADD KEY `baID` (`baID`),
  ADD KEY `authID` (`authID`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genreID`);

--
-- Indexes for table `librarystaff`
--
ALTER TABLE `librarystaff`
  ADD UNIQUE KEY `SSN` (`SSN`),
  ADD KEY `staffID` (`staffID`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`personID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD KEY `reportNum` (`reportNum`);

--
-- Indexes for table `shelf`
--
ALTER TABLE `shelf`
  ADD KEY `shelfNo` (`shelfNo`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `studentbook`
--
ALTER TABLE `studentbook`
  ADD KEY `SID` (`SID`),
  ADD KEY `BID` (`BID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `authorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `personID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`bookID`) REFERENCES `genre` (`genreID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bookauthor`
--
ALTER TABLE `bookauthor`
  ADD CONSTRAINT `bookauthor_ibfk_1` FOREIGN KEY (`baID`) REFERENCES `genre` (`genreID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookauthor_ibfk_2` FOREIGN KEY (`authID`) REFERENCES `author` (`authorID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `librarystaff`
--
ALTER TABLE `librarystaff`
  ADD CONSTRAINT `librarystaff_ibfk_1` FOREIGN KEY (`staffID`) REFERENCES `person` (`personID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`reportNum`) REFERENCES `person` (`personID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shelf`
--
ALTER TABLE `shelf`
  ADD CONSTRAINT `shelf_ibfk_1` FOREIGN KEY (`shelfNo`) REFERENCES `genre` (`genreID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `person` (`personID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentbook`
--
ALTER TABLE `studentbook`
  ADD CONSTRAINT `studentbook_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `person` (`personID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentbook_ibfk_2` FOREIGN KEY (`BID`) REFERENCES `book` (`bookID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
