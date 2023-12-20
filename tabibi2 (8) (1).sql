-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 03:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tabibi2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `uid`) VALUES
(1, 'admin samir', 1);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `Appid` int(50) NOT NULL,
  `Pid` int(50) DEFAULT NULL,
  `Did` int(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `Cid` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`Appid`, `Pid`, `Did`, `time`, `status`, `Cid`, `price`, `date`) VALUES
(1, 29, 1, '9am', 'reserved', 1, 200, '2023-12-21'),
(7, 17, 1, '7:30am', 'reserved', 1, 290, '2023-12-27'),
(8, 29, 12, '10am', 'reserved', 1, 2, '2023-12-28'),
(12, NULL, 12, '10am', 'available', 4, 250, '2023-12-21'),
(13, NULL, 12, '10am', 'available', 4, 800, '2023-12-22'),
(14, NULL, 12, '6am', 'available', 4, 800, '2023-12-21'),
(15, NULL, 12, '10pm', 'available', 4, 502, '2023-12-21'),
(16, NULL, 12, '9pm', 'available', 4, 200, '2023-12-29'),
(17, NULL, 15, '10am', 'available', 1, 2000, '2023-12-22'),
(18, NULL, 15, '9am', 'available', 1, 5155, '2023-12-28'),
(19, NULL, 15, '2 am', 'available', 1, 20202, '2023-12-28'),
(20, NULL, 15, '6:20am', 'available', 1, 202202, '2023-12-27'),
(21, NULL, 12, '10 am', 'available', 4, 2000, '2023-12-28'),
(22, NULL, 12, '8pm', 'available', 4, 115, '2023-12-28'),
(23, NULL, 14, '10pm', 'available', 4, 41, '2023-12-27'),
(24, NULL, 14, '6pm', 'available', 4, 55, '2023-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `Bid` int(50) NOT NULL,
  `Pid` int(50) NOT NULL,
  `Appid` int(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `Cid` int(50) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `cloc` varchar(50) NOT NULL,
  `workhrs` varchar(50) NOT NULL,
  `reviews` varchar(50) NOT NULL,
  `cnumber` varchar(50) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`Cid`, `cname`, `cloc`, `workhrs`, `reviews`, `cnumber`, `uid`) VALUES
(0, 'default', '[value-3]', '[value-4]', '[value-5]', '[value-6]', 54),
(1, 'elhedayaa', 'sefarat', '12', 'good', '01286749530', 52),
(4, 'huda', 'nasr city', '', '', '01286749530', 51);

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `diagnosis_id` int(100) NOT NULL,
  `diagnosis_name` varchar(500) NOT NULL,
  `treat_id` int(100) NOT NULL,
  `uid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dr`
--

CREATE TABLE `dr` (
  `Did` int(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL,
  `educ` varchar(50) NOT NULL,
  `reviews` varchar(50) NOT NULL,
  `uid` int(50) NOT NULL,
  `Cid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dr`
--

INSERT INTO `dr` (`Did`, `firstname`, `lastname`, `specialization`, `number`, `educ`, `reviews`, `uid`, `Cid`) VALUES
(1, 'dr', 'samir', 'neurology', '01286749530', 'miu', 'excellent', 27, 1),
(12, 'Abdelrahman', 'Samir', 'gera7a', '01286749530', 'miu', '', 57, 4),
(13, 'doctor', 'seif', 'eye', '0101029291', 'harvard', '', 58, 0),
(14, 'doc', 'wego', 'eye', '011520525515', 'harvard', '', 62, 4),
(15, 'aly', 'lolly', 'bones', '02051515152', 'miu', '', 64, 1);

-- --------------------------------------------------------

--
-- Table structure for table `d_s_o`
--

CREATE TABLE `d_s_o` (
  `id` int(11) NOT NULL,
  `treat_id` int(11) NOT NULL,
  `opt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `d_s_o`
--

INSERT INTO `d_s_o` (`id`, `treat_id`, `opt_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `d_s_o_v`
--

CREATE TABLE `d_s_o_v` (
  `id` int(100) NOT NULL,
  `diagnosis_id` int(100) NOT NULL,
  `treat_id` int(100) NOT NULL,
  `d_s_o_id` int(100) NOT NULL,
  `value` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `opt_id` int(100) NOT NULL,
  `opt_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`opt_id`, `opt_name`) VALUES
(1, 'period in days'),
(2, 'name , strength(mg)');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pgid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `linkaddress` varchar(50) NOT NULL,
  `icons` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pgid`, `name`, `linkaddress`, `icons`, `class`) VALUES
(2, 'search and delete', 'adminsearch.php', '<iconify-icon icon=\"material-symbols:delete\"></iconify-icon>', ''),
(3, 'overview', 'admin.php', '<i class=\"ri-bar-chart-line\"></i>', 'active'),
(4, 'patientsearch', 'patients.php', '<iconify-icon icon=\"openmoji:patient-clipboard\"></iconify-icon>', ''),
(5, 'permissions', 'permissions.php', '<iconify-icon icon=\"mingcute:user-security-line\"></iconify-icon>', ''),
(6, 'view appointments', 'viewappointments.php', '<iconify-icon icon=\"carbon:view\"></iconify-icon>', ''),
(7, 'add appointments', 'addevent.php', '<iconify-icon icon=\"basil:add-solid\"></iconify-icon>', ''),
(8, 'logout', 'logout.php', '<iconify-icon icon=\"icon-park:logout\"></iconify-icon>', ''),
(9, 'patient home', 'pindex.php', '<i class=\"ri-bar-chart-line\"></i>', 'active'),
(10, 'add users', 'users.php', '<iconify-icon icon=\"mdi:user-add\"></iconify-icon>', ''),
(18, 'add page', 'addpage.php', '<iconify-icon icon=\"iconoir:multiple-pages-add\"></iconify-icon>', ''),
(20, 'booking', 'booking.php', '<iconify-icon icon=\"tabler:brand-booking\"></iconify-icon>', ''),
(21, 'settings', 'settings.php', '<iconify-icon icon=\"uil:setting\"></iconify-icon>', ''),
(22, 'retrievedocs', 'retrievedocs.php', '<iconify-icon icon=\"fontisto:doctor\"></iconify-icon>', ''),
(23, 'admin overview', 'adminmain.php', '<i class=\"ri-bar-chart-line\"></i>', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `Pid` int(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `number` varchar(50) NOT NULL,
  `uid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`Pid`, `firstname`, `lastname`, `age`, `gender`, `address`, `number`, `uid`) VALUES
(5, 'ibrahim', 'wagih', '21', 'm', 'madinaty', '0111111', 20),
(14, 'Abdelrahman', 'Samir', '', '', 'nasr city', '01286749530', 34),
(15, 'abdelrahman', 'samir', '', '', '', '', 35),
(17, 'abdo', 'samir', '20', 'Male', 'Sefarat', '0128674953', 37),
(18, 'seif', 'sherif', '', 'Male', '', '', 39),
(20, 'Abdelrahman', 'Samir', '', '', '', '', 41),
(25, 'Abdelrahman', 'Samir', '', '', '', '', 47),
(26, 'Abdelrahman', 'Samir', '', '', '', '', 48),
(27, 'Abdelrahman', 'Samir', '', '', '', '', 49),
(29, 'seif', 'patient', '12345678', 'M', 'sas', '012251020', 59),
(30, 'doctor', 'conor', '20', 'M', '1_zbdjssdjkw', '010251525', 60),
(31, 'doc', 'seifo', '20', 'M', '1 sdhakk', '010255544', 61),
(32, 'marwan', 'mourad', '20', 'M', '1-madinaty', '0115525151', 63);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `Sid` int(50) NOT NULL,
  `Did` int(50) NOT NULL,
  `Appid` int(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `Cid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `treat_id` int(100) NOT NULL,
  `treat_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`treat_id`, `treat_name`) VALUES
(1, 'casting'),
(2, 'pills');

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `utid` int(11) NOT NULL,
  `name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`utid`, `name`) VALUES
(0, 'default'),
(1, 'admin'),
(2, 'doctor'),
(3, 'clinic'),
(4, 'patient');

-- --------------------------------------------------------

--
-- Table structure for table `usertype_pages`
--

CREATE TABLE `usertype_pages` (
  `upid` int(11) NOT NULL,
  `usertypeid` int(11) NOT NULL,
  `pageid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertype_pages`
--

INSERT INTO `usertype_pages` (`upid`, `usertypeid`, `pageid`) VALUES
(16, 0, 3),
(17, 0, 5),
(120, 2, 3),
(121, 2, 4),
(122, 2, 6),
(123, 2, 8),
(124, 4, 9),
(125, 4, 20),
(126, 4, 21),
(127, 4, 8),
(128, 3, 3),
(129, 3, 4),
(130, 3, 7),
(131, 3, 6),
(132, 3, 8),
(139, 1, 23),
(140, 1, 5),
(141, 1, 10),
(142, 1, 18),
(143, 1, 2),
(144, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_acc`
--

CREATE TABLE `user_acc` (
  `uid` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `usertype_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_acc`
--

INSERT INTO `user_acc` (`uid`, `email`, `pass`, `usertype_id`, `image`) VALUES
(1, 'samirzzz@email.com', '12345678', 1, ''),
(10, 'test12@gmail.com', '1111', 1, ''),
(15, 'abdelrahman2108', '1234', 2, ''),
(20, 'ibrahim2105690@miuegypt.edu.eg', '123', 0, ''),
(27, 'test122@gmail.com', '12345678', 2, 'abdelrahman.200300@gmail.com.jpg'),
(34, 'abdelrahman.200300@gmail.com', '', 0, ''),
(35, 'abdelrahman.20030440@gmail.com', '', 0, ''),
(36, 'abdelrahman.200300@gmail.com', '12345678', 2, ''),
(37, 'abdo@email.com', '12345678', 4, 'abdelrahman.200300@gmail.com.jpg'),
(39, 'seifo@email.com', '', 0, ''),
(41, 'abdelrahman.20030d0@gmail.com', '', 0, ''),
(47, 'abdelrahman.2003@gmail.com', '12345678', 0, ''),
(48, 'abdelrahman.20000@gmail.com', '12345678', 0, ''),
(49, 'abdelrahman.2300@gmail.com', '12345678', 0, ''),
(51, 'elhuda@gmail.com', '12345678', 3, ''),
(52, 'hedaya@gmail.com', '12345678', 3, ''),
(53, 'abdelrahman.200300@gmail.com', '12345678', 2, 'abdelrahman.200300@gmail.com.jpg'),
(54, 'defalut', 'defalut', 3, 'defalut'),
(57, 'samird@gmail.com', '12345678', 2, 'abdelrahman.2003000@gmail.com.jpg'),
(58, 'seifodoc@gmail.com', '12345678', 2, 'seifod@gmail.com.jpg'),
(59, 'aliarafat534@gmail.com', '12345678', 4, 'patient@gmail.com.png'),
(60, 'conorp@gmail.com', '12345678', 4, 'conorp@gmail.com.jpg'),
(61, 'seifop@gmail.com', '12345678', 4, 'seifop@gmail.com.jpg'),
(62, 'wegod@gmail.com', '12345678', 2, 'wegod@gmail.com.jpg'),
(63, 'marop@gmail.com', '12345678', 4, 'marwand@gmail.com.png'),
(64, 'alyd@gmail.com', '12345678', 2, 'alyd@gmail.com.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`Appid`),
  ADD KEY `Did` (`Did`),
  ADD KEY `Pid` (`Pid`),
  ADD KEY `Cid` (`Cid`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`Bid`),
  ADD KEY `Appid` (`Appid`),
  ADD KEY `Pid` (`Pid`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`Cid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`diagnosis_id`),
  ADD KEY `treat_id` (`treat_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `dr`
--
ALTER TABLE `dr`
  ADD PRIMARY KEY (`Did`),
  ADD KEY `uid` (`uid`),
  ADD KEY `Cid` (`Cid`);

--
-- Indexes for table `d_s_o`
--
ALTER TABLE `d_s_o`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opt_id` (`opt_id`),
  ADD KEY `treat_id` (`treat_id`);

--
-- Indexes for table `d_s_o_v`
--
ALTER TABLE `d_s_o_v`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnosis_id` (`diagnosis_id`),
  ADD KEY `d_s_o_id` (`d_s_o_id`),
  ADD KEY `treat_id` (`treat_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`opt_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pgid`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`Pid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`Sid`),
  ADD KEY `Appid` (`Appid`),
  ADD KEY `Cid` (`Cid`),
  ADD KEY `Did` (`Did`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`treat_id`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`utid`);

--
-- Indexes for table `usertype_pages`
--
ALTER TABLE `usertype_pages`
  ADD PRIMARY KEY (`upid`),
  ADD KEY `pageid` (`pageid`),
  ADD KEY `usertypeid` (`usertypeid`);

--
-- Indexes for table `user_acc`
--
ALTER TABLE `user_acc`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `user_id` (`usertype_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `Appid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `Bid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `Cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `diagnosis_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dr`
--
ALTER TABLE `dr`
  MODIFY `Did` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `d_s_o`
--
ALTER TABLE `d_s_o`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `d_s_o_v`
--
ALTER TABLE `d_s_o_v`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `opt_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `Pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `Sid` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `treat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `utid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usertype_pages`
--
ALTER TABLE `usertype_pages`
  MODIFY `upid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `user_acc`
--
ALTER TABLE `user_acc`
  MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user_acc` (`uid`);

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`Did`) REFERENCES `dr` (`Did`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`Pid`) REFERENCES `patient` (`Pid`),
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`Cid`) REFERENCES `clinic` (`Cid`);

--
-- Constraints for table `billing`
--
ALTER TABLE `billing`
  ADD CONSTRAINT `billing_ibfk_1` FOREIGN KEY (`Appid`) REFERENCES `appointments` (`Appid`),
  ADD CONSTRAINT `billing_ibfk_2` FOREIGN KEY (`Pid`) REFERENCES `patient` (`Pid`);

--
-- Constraints for table `clinic`
--
ALTER TABLE `clinic`
  ADD CONSTRAINT `clinic_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user_acc` (`uid`);

--
-- Constraints for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD CONSTRAINT `diagnosis_ibfk_1` FOREIGN KEY (`treat_id`) REFERENCES `treatment` (`treat_id`),
  ADD CONSTRAINT `diagnosis_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user_acc` (`uid`);

--
-- Constraints for table `dr`
--
ALTER TABLE `dr`
  ADD CONSTRAINT `dr_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user_acc` (`uid`),
  ADD CONSTRAINT `dr_ibfk_2` FOREIGN KEY (`Cid`) REFERENCES `clinic` (`Cid`);

--
-- Constraints for table `d_s_o`
--
ALTER TABLE `d_s_o`
  ADD CONSTRAINT `d_s_o_ibfk_1` FOREIGN KEY (`opt_id`) REFERENCES `options` (`opt_id`),
  ADD CONSTRAINT `d_s_o_ibfk_2` FOREIGN KEY (`treat_id`) REFERENCES `treatment` (`treat_id`);

--
-- Constraints for table `d_s_o_v`
--
ALTER TABLE `d_s_o_v`
  ADD CONSTRAINT `d_s_o_v_ibfk_1` FOREIGN KEY (`diagnosis_id`) REFERENCES `diagnosis` (`diagnosis_id`),
  ADD CONSTRAINT `d_s_o_v_ibfk_2` FOREIGN KEY (`d_s_o_id`) REFERENCES `d_s_o` (`id`),
  ADD CONSTRAINT `d_s_o_v_ibfk_3` FOREIGN KEY (`treat_id`) REFERENCES `treatment` (`treat_id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user_acc` (`uid`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`Appid`) REFERENCES `appointments` (`Appid`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`Cid`) REFERENCES `clinic` (`Cid`),
  ADD CONSTRAINT `schedule_ibfk_3` FOREIGN KEY (`Did`) REFERENCES `dr` (`Did`);

--
-- Constraints for table `usertype_pages`
--
ALTER TABLE `usertype_pages`
  ADD CONSTRAINT `usertype_pages_ibfk_1` FOREIGN KEY (`pageid`) REFERENCES `pages` (`pgid`),
  ADD CONSTRAINT `usertype_pages_ibfk_2` FOREIGN KEY (`usertypeid`) REFERENCES `usertypes` (`utid`);

--
-- Constraints for table `user_acc`
--
ALTER TABLE `user_acc`
  ADD CONSTRAINT `user_acc_ibfk_1` FOREIGN KEY (`usertype_id`) REFERENCES `usertypes` (`utid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
