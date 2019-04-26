-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2019 at 06:00 PM
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
(1, 'test', 'name', '8789', '0000-00-00 00:00:00', '1', '2', 'city', 'country', 'web.com', 'ahdkajhs  kshdkas s hsa ', 'ashd askd \r\ns asd ha\r\n', 'maruf@gmail.com', '123', 0),
(2, 'admin', 'mars', '981723981293', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin@gmail.com', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
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
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `first_name`, `last_name`, `phone_number`, `dob`, `address_line_1`, `address_line_2`, `city`, `country`, `website`, `affiliation`, `description`, `email`, `password`, `deleted`) VALUES
(1, 'test', 'name', '91832798389', '0000-00-00 00:00:00', 'Address Line 1', 'Address Line 2', 'City', 'Country', 'test.com', 'Affiliationsk ksad kjas d\r\nd kjas hd\r\nasd kjash d', 'About Me hsdkjaskd \r\nd jksa hdkas\r\nhsadkjh \r\nAbout Me hsdkjaskd \r\nd jksa hdkas\r\nhsadkjh \r\nAbout Me hsdkjaskd \r\nd jksa hdkas\r\nhsadkjh \r\nAbout Me hsdkjaskd \r\nd jksa hdkas\r\nhsadkjh About Me hsdkjaskd \r\nd jksa hdkas\r\nhsadkjh \r\nAbout Me hsdkjaskd \r\nd jksa hdkas\r\nhsadkjh \r\nAbout Me hsdkjaskd \r\nd jksa hdkas\r\nhsadkjh \r\nAbout Me hsdkjaskd \r\nd jksa hdkas\r\nhsadkjh \r\nAbout Me hsdkjaskd \r\nd jksa hdkas\r\nhsadkjh ', 'ahmed.maruff@gmail.com', '123', 0),
(2, 'test2', 'name', '91832798389', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'maruf.hh007@gmail.com', '123', 0),
(3, 'test3', 'name', '91832798389', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'maruf.hh0@gmail.com', '123', 0),
(4, 'test4', 'name', '91832798389', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'maruf.hh@gmail.com', '123', 0),
(5, 'test5', 'name', '91832798389', '0000-00-00 00:00:00', '1', '2', '3', '4', 'jd jas dh.com', 'a hdkashd\r\nj hdaskhd', ' dh sdsajhdksahdkad\r\nd askdh', 'black.dmond143@gmail.com', '123', 0),
(6, 'test6', 'test', '981723981293', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'o11233784@nwytg.net', '123', 0),
(7, 'test', 'name', '981723981293', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'maruf@gmail.com', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `paper_id` bigint(20) NOT NULL,
  `paper_name` varchar(200) NOT NULL,
  `paper_keywords` varchar(200) NOT NULL,
  `abstract` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `file_url` varchar(100) NOT NULL,
  `review_id` int(11) DEFAULT NULL,
  `added_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`paper_id`, `paper_name`, `paper_keywords`, `abstract`, `status`, `file_url`, `review_id`, `added_time`, `deleted`) VALUES
(1, '_EXAM_-Contents_List.pdf', 'ios android mobile', '', 1, '_EXAM_-Contents_List.pdf', NULL, '2019-04-04 20:41:01', 0),
(2, '_EXAM_-Contents_List.pdf', 'iot machine learning', '', 1, '_EXAM_-Contents_List.pdf', NULL, '2019-04-05 20:41:01', 0),
(2147483647, 'my paper', 'keywords', 'abstracts', 1, '', NULL, '2019-04-05 21:12:08', 1),
(15544993711, 'my paper', 'keywords', 'abstracts', 1, '', NULL, '2019-04-05 21:22:51', 1),
(115545019361, '', '', '', 1, '', NULL, '2019-04-05 22:05:36', 1),
(115545019371, 'my paper', 'keywords', 'abstracts', 1, '', NULL, '2019-04-05 21:23:35', 0),
(115545019381, 'test paper ', 'wwqdqwj', 'alkdjdkljaslkd', 1, '', NULL, '2019-04-05 21:24:26', 0),
(115545019391, '', '', '', 1, '', NULL, '2019-04-05 21:38:25', 0),
(115545724601, '', '', '', 1, '', NULL, '2019-04-06 17:41:00', 1),
(115545724891, 'test', 'dhasjdh', 'ADSHKJDH', 1, '', NULL, '2019-04-06 17:41:29', 1),
(115545742161, '', 'lorem', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy te', 1, '', NULL, '2019-04-06 18:10:16', 1),
(115546290981, 'test', 'iot,ios,android,freeze,food,mankind,new', '<p>new new test paper</p>', 1, '11554629098111.pdf', NULL, '2019-04-25 16:34:33', 0),
(115546305161, '', '', '', 1, '', NULL, '2019-04-07 09:48:36', 1),
(115547230921, '', '', '', 1, '', NULL, '2019-04-08 11:31:32', 1),
(115547238591, '', '', '', 1, '', NULL, '2019-04-08 11:44:19', 1),
(115547239361, '', '', '', 1, '', NULL, '2019-04-08 11:45:36', 1),
(115547239531, 'test', 'test', 's', 1, '', NULL, '2019-04-08 11:45:53', 1),
(115547239721, 'test', 'test', '<p>s</p>', 1, '115547239721.pdf', NULL, '2019-04-08 11:46:12', 0),
(115547291721, 'title paper', 'key,word', 'abs tract', 1, 'COXDA.pdf', NULL, '2019-04-08 13:12:52', 0),
(115547296671, '', '', '', 1, 'COXDA1.pdf', NULL, '2019-04-08 13:21:07', 0),
(115547297641, '', '', '', 1, 'COXDA2.pdf', NULL, '2019-04-08 13:22:44', 0),
(115547298361, 'new ', 'dsjha,asdasd,sadasd,sadsad', 'sadsajdn shsadhsjahahd kashd\r\nczx chchhdkas d\r\na sdksadudiqdjask\r\njsa sa das d', 1, 'COXDA3.pdf', NULL, '2019-04-08 13:23:56', 0),
(115547298761, 'new ', 'dsjha,asdasd,sadasd,sadsad', 'sadsajdn shsadhsjahahd kashd\r\nczx chchhdkas d\r\na sdksadudiqdjask\r\njsa sa das d', 1, 'COXDA4.pdf', NULL, '2019-04-08 13:24:36', 0),
(115547299081, '', '', '', 1, 'COXDA5.pdf', NULL, '2019-04-08 13:25:08', 0),
(115547368821, 'test', 'jsahj,shadh', 'jhsakhdh', 1, '', NULL, '2019-04-08 15:21:22', 0),
(115547368891, 'test', 'jsahj,shadh', 'jhsakhdh', 1, '', NULL, '2019-04-08 15:21:29', 0),
(115547369631, 'test', 'jsahj,shadh', 'jhsakhdh', 1, 'test.pdf', NULL, '2019-04-08 15:22:43', 0),
(115547413881, '', '', '', 1, 'test1.pdf', NULL, '2019-04-08 16:36:28', 0),
(115548944721, 'gf', 'rgr,hhj,ghgh jjiji ', 'test abstract here', 1, 'asp_net_mvc_tutorial.pdf', NULL, '2019-04-10 11:07:52', 0),
(115548956331, 't', 'jhjkhhkjhjh , hjjg jhg,g g', 'vhfhfh', 1, 'notice_30-Oct-2018.pdf', NULL, '2019-04-10 11:27:13', 0),
(115548957181, 's', 'ss', 's', 1, 'publishedpaper.pdf', NULL, '2019-04-10 11:28:38', 0),
(115549170841, 'form', 'form', 'ghjgjgj  jhjg j', 1, 'notice_30-Oct-20181.pdf', NULL, '2019-04-10 17:24:44', 0),
(115550025551, 'test abstract', 'test,abstract', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<hr />\r\n			<p>@</p>\r\n			</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 1, '115550025551.pdf', NULL, '2019-04-11 17:09:15', 0),
(115550997781, 'test co authors', 'test,co,authors', '<p>ajldsjasld js dlkj</p>\r\n\r\n<p>&nbsp;asjdajsd</p>\r\n\r\n<p>sd ajsldjas</p>\r\n\r\n<p>dj asjd</p>\r\n', 1, '115550997781.pdf', NULL, '2019-04-12 20:09:38', 0),
(115551004921, 'test co authors', 'test,co,authors', '<p>ajldsjasld js dlkj</p>\r\n\r\n<p>&nbsp;asjdajsd</p>\r\n\r\n<p>sd ajsldjas</p>\r\n\r\n<p>dj asjd</p>\r\n', 1, '115551004921.pdf', NULL, '2019-04-12 20:21:32', 0),
(115551006791, 'test co ', 'test ,co', '<p>hasdk jhajka</p>\r\n\r\n<p>sahdksahd</p>\r\n\r\n<p>sajkdh sakj d</p>\r\n\r\n<p>adsah dkja</p>\r\n', 1, '115551006791.pdf', NULL, '2019-04-12 20:24:39', 0),
(115551008621, 'test co2', 'asnxkj,xsax', '<p>sahkx&nbsp;</p>\r\n\r\n<p>ashkhas</p>\r\n\r\n<p>asjhaksj</p>\r\n\r\n<p>akjd a</p>\r\n\r\n<p>adkja</p>\r\n', 1, '', NULL, '2019-04-12 20:27:42', 0),
(115556882071, 'test new', 'hsadhsa,jashdsa ,hsakjdhsa,jshdkjash,sahdkashd', '<p>hdkasjhd ashdkjhaskd</p>\r\n\r\n<p>dhkjsakd</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 1, '115556882071.pdf', NULL, '2019-04-19 15:36:47', 0),
(115561366991, 'test unique id file new test unique id file new', 'test unique id file new', '<p>test unique id file new</p><p>test unique id file new</p><p>test unique id file new</p><p>test unique id file new</p><p>test unique id file new</p><p>test unique id file new</p><p>&nbsp;</p>', 1, '115561366991.pdf', NULL, '2019-04-24 20:11:39', 0),
(115562087221, 'test', 'iot,ios,android,freeze,food,mankind', '<p>test paper new</p>', 1, '115562087221.pdf', NULL, '2019-04-25 16:12:02', 0),
(115562093601, 'test', 'iot,ios,android,freeze,food,mankind,new', '<p>test paper new</p>', 1, '115562093601.pdf', NULL, '2019-04-25 16:22:40', 0),
(115562093981, 'test', 'iot,ios,android,freeze,food,mankind,new', '<p>test paper new</p>', 1, '115562093981.pdf', NULL, '2019-04-25 16:23:18', 0),
(115562094901, 'test', 'iot,ios,android,freeze,food,mankind,new', '<p>test paper new</p>', 1, '115562094901.pdf', NULL, '2019-04-25 16:24:50', 0),
(115562095501, 'test', 'iot,ios,android,freeze,food,mankind,new', '<p>test paper new</p>', 1, '115562095501.pdf', NULL, '2019-04-25 16:25:50', 0),
(115562095821, 'test', 'iot,ios,android,freeze,food,mankind,new', '<p>test paper new</p>', 1, '115562095821.pdf', NULL, '2019-04-25 16:26:22', 0),
(115562098841, 'test', 'iot,ios,android,freeze,food,mankind,new', '<p>test paper new</p>', 1, '115562098841.pdf', NULL, '2019-04-25 16:31:24', 0),
(215547510642, 'maruf hh mail paper', 'maruf,hh,mail,paper', 'daskjdhashd ldjdkjas\r\nsa daskd\r\nsad ksjlsld jasd\r\ns sjsldas d\r\ndsl', 1, 'test3.pdf', NULL, '2019-04-08 19:17:44', 0),
(515547509885, 'black dmond mail paper', 'black,dmond,paper', 'skjdhkjhsa dsah h khd\r\ndsak hskdk\r\ndsd sakjdskd \r\nasd sdj', 1, 'test2.pdf', NULL, '2019-04-08 19:16:28', 0),
(615549800026, 'test unique id file', 'kdkkdkdkdkd', 'test unique id file', 1, 'ae84e0c55607bd53034c0350a998829e.pdf', NULL, '2019-04-11 10:53:22', 1),
(615549802546, 'test unique id file', 's', 's\r\n\r\n', 1, '000de0f44bc4221de508d3c85751ac9c.pdf', NULL, '2019-04-11 10:57:34', 1),
(615549803316, 'test unique id file', 'sasas', 'adsa', 1, '615549803316.pdf', NULL, '2019-04-11 10:58:51', 0),
(615549804226, 'test unique id file new', 'ghf', 'hh', 1, '615549804226.pdf', NULL, '2019-04-11 11:00:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `paper_author`
--

CREATE TABLE `paper_author` (
  `paper_author_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `paper_id` bigint(20) NOT NULL,
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
(3, 1, 604201911554499415, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, 604201911554499466, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1, 604201911554500305, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 1, 115546290981, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 1, 115547239721, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 1, 115547291721, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 1, 115547296671, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 1, 115547297641, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 1, 115547298361, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 1, 115547298761, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 1, 115547299081, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 1, 115547368821, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 1, 115547368891, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 1, 115547369631, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 1, 115547413881, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 5, 515547509885, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 2, 215547510642, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 1, 115548944721, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 1, 115548956331, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 1, 115548957181, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 1, 115549170841, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 6, 615549803316, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 6, 615549804226, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 1, 115550025551, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 1, 115550997781, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 1, 115550997781, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 1, 115550997781, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 1, 115551004921, 'a0', 'ajsdj0@jdask.com', 'jaskd1', 'haskdj1@khsadk.com', NULL, NULL, NULL, NULL),
(45, 1, 115551006791, 'a0', 'akklj0@shkjdak.com', 'a1', 'akklj1@shkjdak.com', 'a2', 'akklj2@shkjdak.com', NULL, NULL),
(46, 1, 115551008621, 'a0', 'haskdj3@khsadk.com', 'a3', 'haskdj3@khsadk.com', 'a3', 'haskdj3@khsadk.com', 'a3', 'haskdj3@khsadk.com'),
(47, 1, 115556882071, 'a3', 'haskdj3@khsadk.com', 'a2', 'haskdj2@khsadk.com', '1', 'wqe@gmail.com', 'sa', 'sdadsdasd@gmail.com'),
(48, 1, 115561366991, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 1, 115562087221, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 1, 115562093601, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 1, 115562093981, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 1, 115562094901, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 1, 115562095501, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 1, 115562095821, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 1, 115562098841, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paper_files`
--

CREATE TABLE `paper_files` (
  `paper_file_id` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL,
  `file_url` varchar(30) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paper_reviewer`
--

CREATE TABLE `paper_reviewer` (
  `paper_reviewer_id` int(11) NOT NULL,
  `reviewer_id` int(11) NOT NULL,
  `paper_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paper_reviewer`
--

INSERT INTO `paper_reviewer` (`paper_reviewer_id`, `reviewer_id`, `paper_id`) VALUES
(1, 1, 615549804226),
(2, 1, 615549803316),
(3, 2, 615549803316),
(51, 2, 115546290981),
(52, 20, 115546290981),
(55, 1, 115547239721),
(56, 1, 115551004921),
(57, 2, 115551004921),
(58, 2, 115556882071),
(59, 3, 115556882071),
(60, 4, 115556882071),
(61, 20, 115556882071);

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
(1, 'test', '1', 'asdasd', '2019-04-01 00:00:00', 'Address Line 1', 'Address Line 2', 'city new', 'country new ', 'newweb.com', 'new \r\nahdkajhs  kshdkas s hsa ', 'new \r\nashd askd \r\ns asd ha\r\n', 'jhas,asd,sdasa,new ,tag,new tag', 'http://google.com/new', 'rev1@gmail.com', '123', 0),
(2, 'test', '2', '63812638621', '2019-04-02 00:00:00', NULL, NULL, NULL, NULL, NULL, 'asda sdsdhsadahk', 'sah dkashkd', 'ah,asdh,dsa', 'gmail.com', 'rev2@gmail.com', '123', 0),
(3, 'test', 'reviewer', '81231298', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', 'testrev@gmail.com', '123', 0),
(4, 'test', 'rev', '4234432', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, '', '', '', '', 'rev3@gmail.com', '123', 0),
(20, 'rev', 'rev20', '63812638621', '2019-04-02 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rev20@gmail.com', '123', 0);

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
(115553487471, 'maruf.hh007@gmail.com'),
(115553489761, 'black.dmond143@gmail.com'),
(115553489911, 'black.dmond143@gmail.com'),
(115553492641, 'black.dmond143@gmail.com'),
(115553510451, 'black.dmond143@gmail.com'),
(115553512461, 'black.dmond143@gmail.com'),
(115553520811, 'black.dmond143@gmail.com'),
(115555152811, 'ahmed.maruff@gmail.com'),
(115560136771, 'saeedsiddik@gmail.com');

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
(1, 'this paper is weakly rejected', -1, ''),
(2, 'this paper is neutral', 0, ''),
(3, 'this paper is weakly accepted', 1, ''),
(4, 'this paper is rejected', -2, ''),
(5, 'this paper is accepted', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `review_history`
--

CREATE TABLE `review_history` (
  `review_history_id` int(11) NOT NULL,
  `paper_id` bigint(20) NOT NULL,
  `reviewer_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review_history`
--

INSERT INTO `review_history` (`review_history_id`, `paper_id`, `reviewer_id`, `review_id`, `timestamp`) VALUES
(1, 115556882071, 1, 1, '2019-04-21 01:44:57'),
(2, 115556882071, 1, 2, '2019-04-21 01:45:44'),
(3, 115556882071, 1, 3, '2019-04-21 03:17:08'),
(4, 115556882071, 1, 4, '2019-04-21 03:28:14'),
(5, 115556882071, 2, 5, '2019-04-21 03:28:35');

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `paper_author`
--
ALTER TABLE `paper_author`
  MODIFY `paper_author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `paper_files`
--
ALTER TABLE `paper_files`
  MODIFY `paper_file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paper_reviewer`
--
ALTER TABLE `paper_reviewer`
  MODIFY `paper_reviewer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `reviewers`
--
ALTER TABLE `reviewers`
  MODIFY `reviewer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `review_history`
--
ALTER TABLE `review_history`
  MODIFY `review_history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
