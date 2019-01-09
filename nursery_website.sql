-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 09, 2019 at 08:45 PM
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
  `total` int(11) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'Cairo', 'street', 22, 2, 20, 717295, 22),
(4, 'Cairo', 'street', 10, 1, 10, 19073219, 27);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`) VALUES
(1, 'Fulltime'),
(2, 'Partime');

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
  `gender` varchar(100) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `userId` int(11) NOT NULL,
  `scheduleTypeId` int(11) NOT NULL,
  `photo` longblob NOT NULL,
  `photoExtension` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `departmentName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `departmentName`) VALUES
(1, 'Accounting'),
(2, 'HR'),
(3, 'IT'),
(4, 'Marketing'),
(5, 'Medical'),
(6, 'PR'),
(7, 'Security'),
(8, 'Teaching'),
(9, 'Transportation');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `workingHours` int(11) NOT NULL,
  `workingDays` int(11) NOT NULL,
  `departmentId` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `incomeMethod` varchar(100) NOT NULL,
  `universityDegree` varchar(100) NOT NULL,
  `positionId` int(100) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `bankAccount` varchar(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `medicalTestId` int(11) NOT NULL COMMENT 'medicalTest id referencing uploads id',
  `categoryId` int(100) NOT NULL COMMENT 'Is the employee partime or full time',
  `yearOfGraduation` year(4) NOT NULL,
  `university` varchar(100) NOT NULL,
  `skills` varchar(100) NOT NULL,
  `cvId` int(11) NOT NULL COMMENT 'cv id referencing uploads id',
  `medicalInsuranceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `maximumInsuranceCost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicalinsurance`
--

INSERT INTO `medicalinsurance` (`id`, `disease`, `medicineType`, `medicalCardNumber`, `medicinePrice`, `maximumInsuranceCost`) VALUES
(1, 'none', 'none', 0, 0, 0);

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
(3, 27, 'none', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `positionName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `positionName`) VALUES
(1, 'Head'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `timeFrom` time NOT NULL,
  `timeTo` time NOT NULL,
  `room` varchar(100) NOT NULL,
  `maxChildren` int(11) NOT NULL COMMENT 'limit of the children in the schedule',
  `scheduleTypeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `statusName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `statusName`) VALUES
(1, 'Pending'),
(2, 'Active'),
(3, 'Declined');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subjectName` int(11) NOT NULL,
  `teacherId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'Parent'),
(3, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `extension` varchar(100) NOT NULL,
  `data` longblob NOT NULL,
  `userId` int(11) NOT NULL COMMENT 'id of child or id of employee or id of user referencing employee id or referencing child id'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `dateJoined` datetime NOT NULL,
  `statusId` int(11) NOT NULL,
  `ssn` int(11) NOT NULL,
  `typeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `firstName`, `lastName`, `familyName`, `gender`, `nationality`, `dateOfBirth`, `workNumber`, `phoneNumber`, `homeTelephoneNumber`, `dateJoined`, `statusId`, `ssn`, `typeId`) VALUES
(22, 'manager@gmail.com', 'pass', 'Manager', 'Last', 'Family', 'Male', 'Egyptian', '1988-12-08', 2646888, 122657377, 22746255, '2019-01-04 16:05:14', 2, 2147483647, 1),
(27, 'parent@gmail.com', 'pass', 'Parent', 'Last', 'Family', 'Female', 'Egyptian', '2019-01-01', 138180, 896966689, 986698, '2019-01-06 19:03:00', 2, 1873612876, 2);

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
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scheduleId` (`scheduleTypeId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `departmentId` (`departmentId`,`positionId`),
  ADD KEY `positionId` (`positionId`),
  ADD KEY `medicalInsuranceId` (`medicalInsuranceId`),
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `cvId` (`cvId`),
  ADD KEY `medicalTestId` (`medicalTestId`);

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scheduleId` (`scheduleTypeId`),
  ADD KEY `subjectId` (`subjectId`);

--
-- Indexes for table `scheduletypes`
--
ALTER TABLE `scheduletypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ssn` (`ssn`),
  ADD UNIQUE KEY `ssn_2` (`ssn`),
  ADD KEY `typeId` (`typeId`),
  ADD KEY `statusId` (`statusId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounting`
--
ALTER TABLE `accounting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `child`
--
ALTER TABLE `child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marketing`
--
ALTER TABLE `marketing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicalinsurance`
--
ALTER TABLE `medicalinsurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messagetest`
--
ALTER TABLE `messagetest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `scheduletypes`
--
ALTER TABLE `scheduletypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  ADD CONSTRAINT `child_ibfk_2` FOREIGN KEY (`scheduleTypeId`) REFERENCES `scheduletypes` (`id`),
  ADD CONSTRAINT `child_ibfk_3` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`departmentId`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`positionId`) REFERENCES `position` (`id`),
  ADD CONSTRAINT `employee_ibfk_4` FOREIGN KEY (`medicalInsuranceId`) REFERENCES `medicalinsurance` (`id`),
  ADD CONSTRAINT `employee_ibfk_5` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `employee_ibfk_6` FOREIGN KEY (`cvId`) REFERENCES `uploads` (`id`),
  ADD CONSTRAINT `employee_ibfk_7` FOREIGN KEY (`medicalTestId`) REFERENCES `uploads` (`id`);

--
-- Constraints for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `maintenance_ibfk_1` FOREIGN KEY (`itemId`) REFERENCES `inventory` (`id`);

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
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`scheduleTypeId`) REFERENCES `scheduletypes` (`id`);

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`typeId`) REFERENCES `type` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`statusId`) REFERENCES `status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
