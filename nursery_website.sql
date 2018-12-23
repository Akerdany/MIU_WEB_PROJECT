-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2018 at 08:12 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nursery_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounting`
--

CREATE TABLE `accounting` (
  `id` int(11) NOT NULL,
  `taxes/year` int(11) NOT NULL,
  `expenses/year` int(11) NOT NULL,
  `fees/child` int(11) NOT NULL,
  `paymentMethod` varchar(100) NOT NULL,
  `profit/year` int(11) NOT NULL,
  `expenseDate/year` date NOT NULL,
  `paymentDescription` varchar(100) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounting`
--

INSERT INTO `accounting` (`id`, `taxes/year`, `expenses/year`, `fees/child`, `paymentMethod`, `profit/year`, `expenseDate/year`, `paymentDescription`, `total`) VALUES
(1, 11, 11, 11, '11', 11, '2018-12-04', '11', 11);

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `Region` varchar(100) NOT NULL,
  `streetName` varchar(100) NOT NULL,
  `buildingNumber` int(11) NOT NULL,
  `floorNumber` int(11) NOT NULL,
  `appartment` int(11) NOT NULL,
  `postalCode` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `Region`, `streetName`, `buildingNumber`, `floorNumber`, `appartment`, `postalCode`, `userId`) VALUES
(1, '', 'osadasd', 11, 1122, 1, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE `child` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `hobbies` varchar(100) NOT NULL,
  `medicalProblems` varchar(100) NOT NULL,
  `disability` varchar(100) NOT NULL,
  `parentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `child`
--

INSERT INTO `child` (`id`, `name`, `hobbies`, `medicalProblems`, `disability`, `parentId`) VALUES
(2, 'asdasd', 'asasdas', 'sadasdasd', 'asdasdasdasd', 1),
(5, 'ahmed', 'jhgnty', 'gfgfjh', 'fglkf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cid` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `userId`, `date`, `message`) VALUES
(9, 10, '2018-12-09 17:58:01', 's'),
(10, 10, '2018-12-09 18:05:38', '605\r\n'),
(11, 10, '2018-12-09 18:05:48', 'ss'),
(14, 10, '2018-12-09 18:08:57', '123\r\n'),
(15, 10, '2018-12-09 18:09:01', '1233\r\n\r\n\r\n\r\n\r\n\r\n'),
(18, 10, '2018-12-09 18:10:54', '12'),
(21, 10, '2018-12-11 17:50:05', 'sdsd'),
(22, 10, '2018-12-11 17:50:10', 'ss'),
(23, 10, '2018-12-11 18:00:25', 'aa'),
(24, 10, '2018-12-11 18:00:25', 'aa'),
(25, 17, '2018-12-11 18:46:36', 'hi '),
(26, 17, '2018-12-11 19:52:24', 'vdsfk'),
(27, 17, '2018-12-11 19:52:36', 'dsfsdf'),
(36, 10, '2018-12-12 01:49:28', 'sd'),
(37, 10, '2018-12-12 01:49:31', 'your child '),
(38, 10, '2018-12-12 01:50:09', 'my child is not'),
(39, 10, '2018-12-12 01:50:09', 'my child is not'),
(40, 10, '2018-12-12 01:50:35', 'it worked\r\n'),
(42, 17, '2018-12-18 15:45:07', 'foad'),
(43, 17, '2018-12-18 15:45:11', '345');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `workingHours` int(11) NOT NULL,
  `workingDays` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `salary` int(11) NOT NULL,
  `incomeMethod` varchar(100) NOT NULL,
  `universityDegree` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `bankAccount` varchar(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `medicalTest` blob NOT NULL,
  `category` varchar(100) NOT NULL COMMENT 'Is the employee partime or full time',
  `maximumInsuranceCost` int(11) NOT NULL,
  `yearOfGraduation` int(11) NOT NULL,
  `university` varchar(100) NOT NULL,
  `skills` varchar(100) NOT NULL,
  `cv` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `workingHours`, `workingDays`, `department`, `salary`, `incomeMethod`, `universityDegree`, `position`, `experience`, `bankAccount`, `userId`, `medicalTest`, `category`, `maximumInsuranceCost`, `yearOfGraduation`, `university`, `skills`, `cv`) VALUES
(1, 11, 11, '11', 11, '11', '11', '11', '11', '11', 10, 0x3131, '11', 11, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `itemName` varchar(100) NOT NULL,
  `itemSerialNumber` int(11) NOT NULL,
  `supplierName` varchar(100) NOT NULL,
  `supplierPhoneNumber` int(11) NOT NULL,
  `itemPrice` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `used` int(11) NOT NULL,
  `storedIn` int(11) NOT NULL COMMENT 'stored in warehouse',
  `expireDate` date NOT NULL,
  `bought` int(11) NOT NULL,
  `rented` int(11) NOT NULL,
  `department` varchar(100) NOT NULL COMMENT 'each item is categeriozed to somethnig(cleaning equipments etc)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `itemName`, `itemSerialNumber`, `supplierName`, `supplierPhoneNumber`, `itemPrice`, `quantity`, `used`, `storedIn`, `expireDate`, `bought`, `rented`, `department`) VALUES
(1, '11', 11, '11', 11, 11, 11, 11, 11, '2018-12-04', 11, 11, '11');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `durability` int(11) NOT NULL,
  `itemId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `type`, `price`, `time`, `durability`, `itemId`) VALUES
(1, '1', 11, 111, 111, 1);

-- --------------------------------------------------------

--
-- Table structure for table `marketing`
--

CREATE TABLE `marketing` (
  `id` int(11) NOT NULL,
  `advertisementType` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `advertisementCost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketing`
--

INSERT INTO `marketing` (`id`, `advertisementType`, `region`, `contact`, `advertisementCost`) VALUES
(1, '122', '1212', '12323', 123123);

-- --------------------------------------------------------

--
-- Table structure for table `medicalinsurance`
--

CREATE TABLE `medicalinsurance` (
  `id` int(11) NOT NULL,
  `disease` varchar(100) NOT NULL,
  `medicineType` varchar(100) NOT NULL,
  `medicalCardNumber` int(11) NOT NULL,
  `medicinePrice` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicalinsurance`
--

INSERT INTO `medicalinsurance` (`id`, `disease`, `medicineType`, `medicalCardNumber`, `medicinePrice`, `employeeId`) VALUES
(1, 'daasdas', 'sdasda', 23232, 2232, 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `toUserId` int(11) NOT NULL,
  `seen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messagetest`
--

CREATE TABLE `messagetest` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `toUserId` int(11) NOT NULL COMMENT 'it is the id of the person you are sending to him the message',
  `date` datetime NOT NULL,
  `seen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messagetest`
--

INSERT INTO `messagetest` (`id`, `message`, `userId`, `toUserId`, `date`, `seen`) VALUES
(40, 'a', 10, 17, '2018-12-21 23:44:26', 0),
(41, 'a', 10, 17, '2018-12-23 03:27:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `workPosition` varchar(100) NOT NULL,
  `workPlace` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `userId`, `workPosition`, `workPlace`) VALUES
(1, 10, '11', '11');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `class` varchar(100) NOT NULL,
  `timeFrom` int(11) NOT NULL,
  `timeTo` int(11) NOT NULL,
  `teacherName` int(11) NOT NULL,
  `dayOff` varchar(100) NOT NULL,
  `makeUpClass` varchar(100) NOT NULL,
  `limitOfChildren` int(11) NOT NULL,
  `room` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `scheduleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `class`, `timeFrom`, `timeTo`, `teacherName`, `dayOff`, `makeUpClass`, `limitOfChildren`, `room`, `subject`, `scheduleId`) VALUES
(2, '1', 1, 1, 1, '1', '1', 1, '1', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `scheduletypes`
--

CREATE TABLE `scheduletypes` (
  `id` int(11) NOT NULL,
  `scheduleName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scheduletypes`
--

INSERT INTO `scheduletypes` (`id`, `scheduleName`) VALUES
(0, 'class A');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `typeName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `typeName`) VALUES
(1, 'Manager'),
(2, 'Parent');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `familyName` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `workNumber` int(11) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `homeTelephoneNumber` int(11) NOT NULL,
  `ssn` int(11) NOT NULL,
  `typeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `firstName`, `lastName`, `familyName`, `gender`, `nationality`, `dateOfBirth`, `workNumber`, `phoneNumber`, `homeTelephoneNumber`, `ssn`, `typeId`) VALUES
(10, 'foad.osama@hotmail.com', 'foad1998', 'foad', 'osama', 'elamoury', 'Male', 'Egyptian', '2018-12-11', 0, 0, 0, 0, 1),
(17, 'foadosama1@gmail.com', 'foad1998', 'foad', 'osama', 'elamoury', 'Male', 'egyptian', '2018-12-11', 2345554, 1121555635, 9821323, 2, 1),
(21, 'foadsamy@hotmail', 'password123', 'foad', 'ryiiieteoietoiy', 'weriwueroiweur', 'Male', 'egyptian', '2018-12-04', 4337412, 345350934, 2147483647, 749823940, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounting`
--
ALTER TABLE `accounting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parentId` (`parentId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itemId` (`itemId`);

--
-- Indexes for table `marketing`
--
ALTER TABLE `marketing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertisementCost` (`advertisementCost`);

--
-- Indexes for table `medicalinsurance`
--
ALTER TABLE `medicalinsurance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employeeId` (`employeeId`) USING BTREE;

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messagetest`
--
ALTER TABLE `messagetest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `toUserId` (`toUserId`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacherName` (`teacherName`),
  ADD KEY `scheduleId` (`scheduleId`) USING BTREE;

--
-- Indexes for table `scheduletypes`
--
ALTER TABLE `scheduletypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ssn` (`ssn`),
  ADD UNIQUE KEY `ssn_2` (`ssn`),
  ADD KEY `typeId` (`typeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounting`
--
ALTER TABLE `accounting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `child`
--
ALTER TABLE `child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marketing`
--
ALTER TABLE `marketing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicalinsurance`
--
ALTER TABLE `medicalinsurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `messagetest`
--
ALTER TABLE `messagetest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Constraints for table `child`
--
ALTER TABLE `child`
  ADD CONSTRAINT `child_ibfk_1` FOREIGN KEY (`parentId`) REFERENCES `parent` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Constraints for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `maintenance_ibfk_1` FOREIGN KEY (`itemId`) REFERENCES `inventory` (`id`);

--
-- Constraints for table `medicalinsurance`
--
ALTER TABLE `medicalinsurance`
  ADD CONSTRAINT `medicalinsurance_ibfk_1` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`id`);

--
-- Constraints for table `messagetest`
--
ALTER TABLE `messagetest`
  ADD CONSTRAINT `messagetest_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `messagetest_ibfk_2` FOREIGN KEY (`toUserId`) REFERENCES `user` (`id`);

--
-- Constraints for table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `parent_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`scheduleId`) REFERENCES `scheduletypes` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`typeId`) REFERENCES `type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
