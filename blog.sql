-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 31, 2015 at 01:39 �
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'kh', '00');

-- --------------------------------------------------------

--
-- Table structure for table `edit`
--

CREATE TABLE IF NOT EXISTS `edit` (
  `id_edit` int(11) NOT NULL AUTO_INCREMENT,
  `main_page_picture` text NOT NULL,
  `aboutus_page_picture` text NOT NULL,
  `connectus_page_picture` text NOT NULL,
  `main_page_title` varchar(300) NOT NULL,
  `aboutus_page_title` varchar(300) NOT NULL,
  `connectus_page_title` varchar(300) NOT NULL,
  `main_page_header` text NOT NULL,
  `aboutus_page_header` text NOT NULL,
  `connectus_page_header` text NOT NULL,
  `aboutus_page_contect` text NOT NULL,
  `connectus_page_contect` text NOT NULL,
  PRIMARY KEY (`id_edit`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `edit`
--

INSERT INTO `edit` (`id_edit`, `main_page_picture`, `aboutus_page_picture`, `connectus_page_picture`, `main_page_title`, `aboutus_page_title`, `connectus_page_title`, `main_page_header`, `aboutus_page_header`, `connectus_page_header`, `aboutus_page_contect`, `connectus_page_contect`) VALUES
(1, 'IMG_20151212_114746.jpg', '331_Amazing_Mixed_Wallpapers_109_akoam_(268).jpg', '12075032_913160185426785_8694587895122272905_n.jpg', '11000', '11', '11', '22', '22', '22', '330', '33');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `mail` varchar(300) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(30) NOT NULL,
  `browser` varchar(100) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `name`, `mail`, `message`, `date`, `browser`) VALUES
(1, '00', '00', '00', '00', '00'),
(2, '11', '11', '11', '11', '11'),
(3, 'fgdfgdfg', 'hbebo9999@gmail.com', 'sfdsdfs', '2015/12/26', ''),
(4, 'khaldd', 'khaled710017@gmail.com', 'Welcome', '2015/12/26', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/45.0.2454.101 Saf'),
(5, '1223334444', 'hbebo9999@gmail.com', 'gggggggggggggggg', '2015/12/26', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `image` text NOT NULL,
  `content` text NOT NULL,
  `blogger` varchar(200) NOT NULL,
  `date` varchar(30) NOT NULL,
  `section_id` int(11) NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_post`, `title`, `image`, `content`, `blogger`, `date`, `section_id`) VALUES
(36, 'newwwwwwwwwww', '12301491_1526925440955733_2292817689683944195_n.jpg', '<h2 style="font-style:italic;">&nbsp;<u>newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww</u>&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;&nbsp;newwwwwwwwwww&nbsp;</h2>\r\n', 'Khaled', '2015/12/22', 13),
(34, '00000', '12342279_1003170596391359_8775276720716278492_n.jpg', '<p>fdgsfgfdbbcvbkhkhkhkhkhkkhkhkhkhkkhkhhkhkkh0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000</p>\r\n', '00 00', '2015/12/13', 4),
(45, 'bbbbbbbbbbbbbbb', 'game-of-thrones-third-season_4303.jpg', '<p>bbbbbbbbbbbbbbbbbbbbbbbbbbbbbb</p>\r\n', 'bbbbbbbbbbbbbbbbbbbb', '2015/12/30', 13),
(46, 'aaaaaaaaaaaaaaaa', 'game-of-thrones-third-season_43032.jpg', '<p>aaaaaaaaaaaaaaaaa</p>\r\n', 'aaaaaaaaa', '2015/12/30', 13),
(38, 'test 1 ', '11990674_171539196513955_7155776919277717800_n1.jpg', '<p><span [removed]><span [removed]>test 1 test 1 test 1</span></span> test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 </p>\r\n\r\n<p>test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 </p>\r\n\r\n<p>test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 </p>\r\n\r\n<p>test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 </p>\r\n\r\n<p>test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test</p>\r\n\r\n<p>1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test</p>\r\n\r\n<p>1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 test 1 </p>\r\n', 'Khaled', '2015/12/24', 13),
(39, 'test 2 updatre000000000 - END', 'game-of-thrones-third-season_43031.jpg', '<p>update </p>\r\n\r\n<p>test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2 </p>\r\n\r\n<p> test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2</p>\r\n\r\n<p> test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2</p>\r\n\r\n<p> test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2</p>\r\n\r\n<p> test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2</p>\r\n\r\n<p> test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2  test 2</p>\r\n', 'Khaled - update', '2015/12/29', 12),
(40, 'test 3', '12366246_1654278651518832_7352180414854339432_n.jpg', '<p> test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3 </p>\r\n\r\n<p> test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3 </p>\r\n\r\n<p> test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3 </p>\r\n\r\n<p> test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3  test 3 </p>\r\n', 'khaled', '2015/12/24', 13),
(49, 'jjjjjjjjjjj', 'game-of-thrones-third-season_43035.jpg', '<p>jjjjjjjjjjjjjjjj</p>\r\n', 'hhh', '2015/12/31', 13),
(50, 'jjjjjjjjjjj', 'game-of-thrones-third-season_43036.jpg', '<p>jjjjjjjjjjjjjjjj</p>\r\n', 'hhh', '2015/12/31', 13);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `name_section` varchar(200) NOT NULL,
  `date` varchar(30) NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_id`, `name_section`, `date`) VALUES
(13, 'section five', '2015/12/19'),
(12, 'Section four', '2015/12/19'),
(4, 'Section three', '2015/10/17'),
(10, 'Section two', '2015/10/24'),
(11, 'Section one', '2015/10/27');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
