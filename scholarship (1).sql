-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 05:18 AM
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
-- Database: `scholarship`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `Application_Id` int(11) NOT NULL,
  `scholarship_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `apply_date` date NOT NULL,
  `cgpa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`Application_Id`, `scholarship_id`, `user_id`, `apply_date`, `cgpa`) VALUES
(52, 113, 10, '2024-03-10', 5),
(53, 111, 10, '2024-03-10', 5),
(54, 113, 6, '2024-03-10', 6),
(55, 109, 6, '2024-03-10', 6),
(56, 112, 6, '2024-03-10', 6),
(57, 111, 6, '2024-03-11', 8);

--
-- Triggers `applications`
--
DELIMITER $$
CREATE TRIGGER `auto_update_status` AFTER INSERT ON `applications` FOR EACH ROW BEGIN
    INSERT INTO application_status (Application_Id, user_id, approval_status, Amount)
    VALUES (NEW.Application_Id, NEW.user_id, 'pending', 0);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `application_status`
--

CREATE TABLE `application_status` (
  `status_id` int(11) NOT NULL,
  `Application_Id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `approval_status` varchar(40) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application_status`
--

INSERT INTO `application_status` (`status_id`, `Application_Id`, `user_id`, `approval_status`, `Amount`) VALUES
(35, 52, 10, 'rejected', 0),
(36, 53, 10, 'approved', 5000),
(37, 54, 6, 'approved', 15000),
(38, 55, 6, 'rejected', 0),
(39, 56, 6, 'approved', 1500),
(40, 57, 6, 'pending', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `approved_scholarships`
-- (See below for the actual view)
--
CREATE TABLE `approved_scholarships` (
`scholarship_id` int(11)
,`scholarship_name` varchar(40)
,`threshold_cgpa` int(11)
,`organization` varchar(40)
,`last_date` date
,`status_id` int(11)
,`approval_status` varchar(40)
,`Amount` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `registration_data`
--

CREATE TABLE `registration_data` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `user_type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration_data`
--

INSERT INTO `registration_data` (`user_id`, `username`, `email`, `password`, `user_type`) VALUES
(6, 'pratap', 'b@gmail.com', '92eb5ffee6ae2fec3ad71c777531578f', 'student'),
(7, 'admin', 'a@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'admin'),
(10, 'kiran', 'k@gmail.com', '8ce4b16b22b58894aa86c421e8759df3', 'student'),
(11, 'gagan', 'g@gmail.com', 'b2f5ff47436671b6e533d8dc3614845d', 'student'),
(12, 'karn', 'kn@gmail.com', '8c7e6965b4169689a88b313bbe7450f9', 'student');

-- --------------------------------------------------------

--
-- Stand-in structure for view `rejected_scholarships`
-- (See below for the actual view)
--
CREATE TABLE `rejected_scholarships` (
`scholarship_id` int(11)
,`scholarship_name` varchar(40)
,`threshold_cgpa` int(11)
,`organization` varchar(40)
,`last_date` date
,`status_id` int(11)
,`approval_status` varchar(40)
,`Amount` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `scholarship_id` int(11) NOT NULL,
  `scholarship_name` varchar(40) NOT NULL,
  `threshold_cgpa` int(11) NOT NULL,
  `organization` varchar(40) NOT NULL,
  `last_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scholarships`
--

INSERT INTO `scholarships` (`scholarship_id`, `scholarship_name`, `threshold_cgpa`, `organization`, `last_date`) VALUES
(109, 'nsp', 9, 'national', '2024-03-15'),
(110, 'ssp', 8, 'state', '2024-03-25'),
(111, 'hdfc scholarship', 9, 'private', '2024-04-02'),
(112, 'vidyalakshmi', 8, 'central', '2024-04-23'),
(113, 'vidyasiri', 8, 'Backward department', '2024-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `annual_income` bigint(20) NOT NULL,
  `course` varchar(40) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `email`, `phone_no`, `annual_income`, `course`, `user_id`) VALUES
('Praveen', 'b@gmail.com', 741852963, 74185, 'CSE', 6),
('kiran', 'k@gmail.com', 741852963, 100000, 'AIML', 10),
('Gagan H A', 'g@gmail.com', 741852963, 90000, 'AIDS', 11),
('Karna', 'kn@gmail.com', 7894561238, 120000, 'EEE', 12);

-- --------------------------------------------------------

--
-- Structure for view `approved_scholarships`
--
DROP TABLE IF EXISTS `approved_scholarships`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `approved_scholarships`  AS SELECT `s`.`scholarship_id` AS `scholarship_id`, `s`.`scholarship_name` AS `scholarship_name`, `s`.`threshold_cgpa` AS `threshold_cgpa`, `s`.`organization` AS `organization`, `s`.`last_date` AS `last_date`, `ast`.`status_id` AS `status_id`, `ast`.`approval_status` AS `approval_status`, `ast`.`Amount` AS `Amount` FROM ((`scholarships` `s` join `applications` `a` on(`s`.`scholarship_id` = `a`.`scholarship_id`)) join `application_status` `ast` on(`a`.`Application_Id` = `ast`.`Application_Id`)) WHERE `ast`.`approval_status` = 'Approved' ;

-- --------------------------------------------------------

--
-- Structure for view `rejected_scholarships`
--
DROP TABLE IF EXISTS `rejected_scholarships`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rejected_scholarships`  AS SELECT `s`.`scholarship_id` AS `scholarship_id`, `s`.`scholarship_name` AS `scholarship_name`, `s`.`threshold_cgpa` AS `threshold_cgpa`, `s`.`organization` AS `organization`, `s`.`last_date` AS `last_date`, `ast`.`status_id` AS `status_id`, `ast`.`approval_status` AS `approval_status`, `ast`.`Amount` AS `Amount` FROM ((`scholarships` `s` join `applications` `a` on(`s`.`scholarship_id` = `a`.`scholarship_id`)) join `application_status` `ast` on(`a`.`Application_Id` = `ast`.`Application_Id`)) WHERE `ast`.`approval_status` = 'rejected' ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`Application_Id`),
  ADD KEY `z` (`user_id`),
  ADD KEY `y` (`scholarship_id`);

--
-- Indexes for table `application_status`
--
ALTER TABLE `application_status`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `b` (`Application_Id`),
  ADD KEY `n` (`user_id`);

--
-- Indexes for table `registration_data`
--
ALTER TABLE `registration_data`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD PRIMARY KEY (`scholarship_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `Application_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `application_status`
--
ALTER TABLE `application_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `registration_data`
--
ALTER TABLE `registration_data`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `scholarships`
--
ALTER TABLE `scholarships`
  MODIFY `scholarship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `y` FOREIGN KEY (`scholarship_id`) REFERENCES `scholarships` (`scholarship_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `z` FOREIGN KEY (`user_id`) REFERENCES `registration_data` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `application_status`
--
ALTER TABLE `application_status`
  ADD CONSTRAINT `b` FOREIGN KEY (`Application_Id`) REFERENCES `applications` (`Application_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `n` FOREIGN KEY (`user_id`) REFERENCES `registration_data` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk` FOREIGN KEY (`user_id`) REFERENCES `registration_data` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
