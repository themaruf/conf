-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2019 at 05:29 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `confmag_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `dob` datetime NOT NULL,
  `address_line_1` varchar(100) DEFAULT NULL,
  `address_line_2` varchar(100) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `affiliation` varchar(1000) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `first_name`, `last_name`, `phone_number`, `dob`, `address_line_1`, `address_line_2`, `city`, `country`, `website`, `affiliation`, `description`, `email`, `password`, `deleted`) VALUES
(1, 'test', 'name', '3281983201', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'maruf@gmail.com', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `address_line_1` varchar(100) DEFAULT NULL,
  `address_line_2` varchar(100) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `affiliation` varchar(1000) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `recovery_identity` varchar(40) DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `first_name`, `last_name`, `phone_number`, `dob`, `address_line_1`, `address_line_2`, `city`, `country`, `website`, `affiliation`, `description`, `email`, `password`, `recovery_identity`, `deleted`) VALUES
(1, 'test', 'name', '91832798389', '2019-04-09', 'Address Line 1', 'Address Line 2', 'City', 'Country', 'http://google.com', '', '', 'ahmed.maruff@gmail.com', '123', 'omBMVfX63raU0Pz85cce0ece13196', 0),
(2, 'test', 'uiqwhuiqw', '91832798389', '2019-04-09', 'Address Line 1', 'Address Line 2', 'City', 'Country', '', '', '', 'black.dmond143@gmail.com', '123', NULL, 0),
(7, 'sadad', 'jadjkhas', '981723981293', '2019-04-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'maruf.hh007@gmail.com', '123', NULL, 0),
(8, 'H.M', 'Maruf', '0167629565667', '2019-03-15', 'Address Line 1', 'Address Line 2', 'City', 'Country', '', '', '', 'author@gmail.com', '123', NULL, 0),
(10, 'test', 'name', '91832798389', '2019-04-09', 'Address Line 1', 'Address Line 2', 'City', 'Country', 'http://google.com', '', '', 'maruf@gmail.com', '123', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `paper_id` varchar(30) NOT NULL,
  `paper_name` varchar(200) NOT NULL,
  `paper_keywords` varchar(200) NOT NULL,
  `abstract` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `review_id` int(11) DEFAULT NULL,
  `added_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`paper_id`, `paper_name`, `paper_keywords`, `abstract`, `status`, `review_id`, `added_time`, `deleted`) VALUES
('115563011811', 'test paper', 'test', '<p>test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;</p><p>test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;test papr&nbsp;</p>', 1, NULL, '2019-04-26 17:53:01', 1),
('115563015851', 'test unique id file', 'test,unique', '<p>test unique id file new</p>', 1, NULL, '2019-04-26 17:59:45', 0),
('115563887731', 'jhjksha', 'askdhj,test', '<p>zkdjhasjdhj&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;dasdasd</p>', 1, NULL, '2019-04-27 18:12:53', 0),
('115564712161', 'uasdkjads', 'askdh,dhkas', '<p>asjdkahsdkhahashdk&nbsp;</p><p>&nbsp;</p>', 1, NULL, '2019-04-28 17:06:56', 0),
('115564713441', 'hkfdsdjfs', 'hdsdhk,kjfhsdkjh,jdfsk', '<p>jhfjkdshkfj</p>', 1, NULL, '2019-04-28 17:09:04', 0),
('115564714761', 'hasdhaskj', 'hsajdhak', '<p>haskak</p>', 1, NULL, '2019-04-28 17:11:16', 0),
('115564714931', 'kjdhkasjhd', 'adhkdhaj', '<p>hdaskdhkjas</p><p>asjhdkasjhd</p>', 1, NULL, '2019-04-28 17:11:33', 0),
('115564718711', 'test unique id file', 'test', '<p>this is a test abstract</p>', 1, NULL, '2019-04-28 17:17:51', 0),
('115564794221', 'test varchar paper id', 'test varchar paper id', '<p>test varchar paper id</p>', 1, NULL, '2019-04-28 19:23:42', 1),
('215563039592', 'test paper 2', 'dkjsdk,jashdkhas,ashdkash,jhsdkahsd', '<p>adgashdjjashdsad</p><p>adkjahsdkjhaksd</p><p>adkjhaskdhas</p>', 1, NULL, '2019-04-26 18:39:19', 1),
('CONFMAG-115564795891', 'test varchar paper id', 'test varchar paper id', '<p>test varchar paper id</p>', 1, NULL, '2019-04-28 19:26:29', 0),
('CONFMAG-115564864571', 'test unique id file', 'sss', '<p>sadasd</p>', 1, NULL, '2019-04-28 21:20:57', 0),
('CONFMAG-815569948828', 'E-Conf: A Conference Management System', 'Conferences,Management,System', '<p>Conferences are an essential channel for researchers to exchange information. Nowadays, there are<br />hundreds of thousands of conferences every year, each with its own characteristics. However, organizing<br />one is a difficult and time-consuming process, involving hundreds of people. There are currently many<br />Conference Management Systems to help with this process, some of them analysed in this document,<br />but they can be too complex or lack some needed features.<br />This work introduces E-Conf, a web based Conference Management System designed and developed<br />to help an organizer planning a conference, automating a great part of the organizing process. The<br />features of E-Conf are divided in four main categories - main app, submissions, reviews and program<br />management - which became the system modules.<br />E-Conf also includes two algorithms for automatic assignment: AREA, to assign submissions to<br />reviewers, and Chronos, to assign submissions to sessions. When evaluated, both algorithms proof<br />themselves capable, with AREA achieving pretty good results in the used metrics.</p>', 1, NULL, '2019-05-04 18:34:42', 1),
('CONFMAG-815569960588', 'E-Conf: A Conference Management System', 'econf,mgt,system,Conference management,Abstract management.,Paper management', '<p>Conferences are an essential channel for researchers to exchange information. Nowadays, there are<br />hundreds of thousands of conferences every year, each with its own characteristics. However, organizing<br />one is a difficult and time-consuming process, involving hundreds of people. There are currently many<br />Conference Management Systems to help with this process, some of them analysed in this document,<br />but they can be too complex or lack some needed features.<br />This work introduces E-Conf, a web based Conference Management System designed and developed<br />to help an organizer planning a conference, automating a great part of the organizing process. The<br />features of E-Conf are divided in four main categories - main app, submissions, reviews and program<br />management - which became the system modules.</p><p>test</p><p><br />E-Conf also includes two algorithms for automatic assignment: AREA, to assign submissions to<br />reviewers, and Chronos, to assign submissions to sessions. When evaluated, both algorithms proof<br />themselves capable, with AREA achieving pretty good results in the used metrics.</p>', 1, NULL, '2019-05-04 18:54:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `paper_author`
--

CREATE TABLE `paper_author` (
  `paper_author_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `paper_id` varchar(30) NOT NULL,
  `co_author_name0` varchar(30) DEFAULT NULL,
  `co_author_email0` varchar(30) DEFAULT NULL,
  `co_author_name1` varchar(30) DEFAULT NULL,
  `co_author_email1` varchar(30) DEFAULT NULL,
  `co_author_name2` varchar(30) DEFAULT NULL,
  `co_author_email2` varchar(30) DEFAULT NULL,
  `co_author_name3` varchar(30) DEFAULT NULL,
  `co_author_email3` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paper_author`
--

INSERT INTO `paper_author` (`paper_author_id`, `author_id`, `paper_id`, `co_author_name0`, `co_author_email0`, `co_author_name1`, `co_author_email1`, `co_author_name2`, `co_author_email2`, `co_author_name3`, `co_author_email3`) VALUES
(57, 1, '115563015851', 'a2', 'haskdj3@khsadk.com', 'a3', 'haskdj3@khsadk.com', NULL, NULL, NULL, NULL),
(58, 1, '115563887731', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 1, '115564712161', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 1, '115564713441', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 1, '115564714761', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 1, '115564714931', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 1, '115564718711', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 1, 'CONFMAG-115564795891', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 1, 'CONFMAG-115564864571', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 8, 'CONFMAG-815569960588', 'Prof. Jos´e Manuel da Costa Al', 'costa@mail.com', 'Prof. Alberto Manuel Ramos da ', 'alberto@mail.co', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paper_files`
--

CREATE TABLE `paper_files` (
  `paper_file_id` int(11) NOT NULL,
  `paper_id` varchar(30) NOT NULL,
  `file_name` varchar(30) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paper_files`
--

INSERT INTO `paper_files` (`paper_file_id`, `paper_id`, `file_name`, `upload_time`) VALUES
(7, '115563015851', '115563015851.pdf', '2019-04-26 17:59:45'),
(8, '115563015851', '1155630158511.pdf', '2019-04-26 18:02:01'),
(9, '115563015851', '1155630158512.pdf', '2019-04-26 18:02:18'),
(10, '115563887731', '115563887731.pdf', '2019-04-27 18:12:53'),
(11, '115563887731', '1155638877311.pdf', '2019-04-27 18:13:50'),
(12, '115564712161', '115564712161.pdf', '2019-04-28 17:06:56'),
(13, '115564713441', '115564713441.pdf', '2019-04-28 17:09:04'),
(14, '115564714761', '115564714761.pdf', '2019-04-28 17:11:16'),
(15, '115564714931', '115564714931.pdf', '2019-04-28 17:11:33'),
(16, '115564718711', '115564718711.pdf', '2019-04-28 17:17:51'),
(18, 'CONFMAG-115564795891', 'CONFMAG-115564795891.pdf', '2019-04-28 19:26:29'),
(19, 'CONFMAG-115564864571', 'CONFMAG-115564864571.pdf', '2019-04-28 21:20:57'),
(22, 'CONFMAG-815569960588', 'CONFMAG-815569960588.pdf', '2019-05-04 18:54:18'),
(23, 'CONFMAG-815569960588', 'CONFMAG-8155699605881.pdf', '2019-05-04 19:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `paper_reviewer`
--

CREATE TABLE `paper_reviewer` (
  `paper_reviewer_id` int(11) NOT NULL,
  `reviewer_id` int(11) NOT NULL,
  `paper_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paper_reviewer`
--

INSERT INTO `paper_reviewer` (`paper_reviewer_id`, `reviewer_id`, `paper_id`) VALUES
(67, 21, '115563015851'),
(68, 21, 'CONFMAG-115564795891'),
(69, 22, 'CONFMAG-115564795891'),
(70, 21, 'CONFMAG-815569960588'),
(71, 22, 'CONFMAG-815569960588');

-- --------------------------------------------------------

--
-- Table structure for table `reviewers`
--

CREATE TABLE `reviewers` (
  `reviewer_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `dob` datetime NOT NULL,
  `address_line_1` varchar(100) DEFAULT NULL,
  `address_line_2` varchar(100) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `affiliation` varchar(1000) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `cv_url` varchar(500) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviewers`
--

INSERT INTO `reviewers` (`reviewer_id`, `first_name`, `last_name`, `phone_number`, `dob`, `address_line_1`, `address_line_2`, `city`, `country`, `website`, `affiliation`, `description`, `keywords`, `cv_url`, `email`, `password`, `deleted`) VALUES
(21, 'test', 'rev', '91832798389', '0000-00-00 00:00:00', 'Address Line 1', '', '', '', 'http://google.com', '', '', '', 'http://google.com/new', 'rev1@gmail.com', '123', 0),
(22, 'test', 'rev2', '91832798389', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rev2@gmail.com', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviewer_invitations`
--

CREATE TABLE `reviewer_invitations` (
  `reviewer_invitation_id` bigint(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviewer_invitations`
--

INSERT INTO `reviewer_invitations` (`reviewer_invitation_id`, `email`) VALUES
(115564726131, ''),
(115564727411, 'test'),
(115564727811, 'shs@gm.com');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `review_comments` varchar(500) NOT NULL,
  `review_score` tinyint(4) NOT NULL,
  `reply` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `review_comments`, `review_score`, `reply`) VALUES
(6, 'test', 0, ''),
(7, 'Accepted', 2, ''),
(8, 'test reh', -1, ''),
(9, 'hghjg kj h', -1, ''),
(10, 'gjhgjgjh', 1, ''),
(11, 'weakly ac', 1, ''),
(12, 'rejected', -2, ''),
(13, 'this paper is weakly accepted', 1, ''),
(14, 'this paper is weakly accepted', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `review_history`
--

CREATE TABLE `review_history` (
  `review_history_id` int(11) NOT NULL,
  `paper_id` varchar(30) NOT NULL,
  `reviewer_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review_history`
--

INSERT INTO `review_history` (`review_history_id`, `paper_id`, `reviewer_id`, `review_id`, `timestamp`) VALUES
(1, '115563015851', 21, 6, '2019-04-27 00:10:06'),
(2, '115563015851', 21, 7, '2019-04-27 00:17:06'),
(3, '115563015851', 21, 8, '2019-04-27 00:22:16'),
(4, 'CONFMAG-115564795891', 21, 11, '2019-04-29 02:47:29'),
(5, 'CONFMAG-115564795891', 21, 12, '2019-04-29 02:47:49'),
(6, 'CONFMAG-815569960588', 21, 13, '2019-05-05 00:59:50'),
(7, 'CONFMAG-815569960588', 22, 14, '2019-05-05 01:00:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`paper_id`),
  ADD KEY `review_id` (`review_id`);

--
-- Indexes for table `paper_author`
--
ALTER TABLE `paper_author`
  ADD PRIMARY KEY (`paper_author_id`);

--
-- Indexes for table `paper_files`
--
ALTER TABLE `paper_files`
  ADD PRIMARY KEY (`paper_file_id`);

--
-- Indexes for table `paper_reviewer`
--
ALTER TABLE `paper_reviewer`
  ADD PRIMARY KEY (`paper_reviewer_id`);

--
-- Indexes for table `reviewers`
--
ALTER TABLE `reviewers`
  ADD PRIMARY KEY (`reviewer_id`);

--
-- Indexes for table `reviewer_invitations`
--
ALTER TABLE `reviewer_invitations`
  ADD PRIMARY KEY (`reviewer_invitation_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `review_history`
--
ALTER TABLE `review_history`
  ADD PRIMARY KEY (`review_history_id`),
  ADD KEY `review_id` (`review_id`),
  ADD KEY `paper_id` (`paper_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `paper_author`
--
ALTER TABLE `paper_author`
  MODIFY `paper_author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `paper_files`
--
ALTER TABLE `paper_files`
  MODIFY `paper_file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `paper_reviewer`
--
ALTER TABLE `paper_reviewer`
  MODIFY `paper_reviewer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `reviewers`
--
ALTER TABLE `reviewers`
  MODIFY `reviewer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `review_history`
--
ALTER TABLE `review_history`
  MODIFY `review_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `papers`
--
ALTER TABLE `papers`
  ADD CONSTRAINT `papers_ibfk_3` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`review_id`);

--
-- Constraints for table `review_history`
--
ALTER TABLE `review_history`
  ADD CONSTRAINT `review_history_ibfk_2` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`review_id`),
  ADD CONSTRAINT `review_history_ibfk_3` FOREIGN KEY (`paper_id`) REFERENCES `papers` (`paper_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
