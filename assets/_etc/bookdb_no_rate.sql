-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2019 at 12:01 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookdb`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `soundex_match` (`needle` VARCHAR(128), `haystack` TEXT, `splitChar` VARCHAR(1)) RETURNS TINYINT(4) begin
    declare spacePos int;
    declare searchLen int default length(haystack);
    declare curWord varchar(128) default '';
    declare tempStr text default haystack;
    declare tmp text default '';
    declare soundx1 varchar(64) default soundex(needle);
    declare soundx2 varchar(64) default '';

    set spacePos = locate(splitChar, tempStr);

    while searchLen > 0 do
      if spacePos = 0 then
        set tmp = tempStr;
        select soundex(tmp) into soundx2;
        if soundx1 = soundx2 then
          return 1;
        else
          return 0;
        end if;
      end if;

      if spacePos != 0 then
        set tmp = substr(tempStr, 1, spacePos-1);
        set soundx2 = soundex(tmp);
        if soundx1 = soundx2 then
          return 1;
        end if;
        set tempStr = substr(tempStr, spacePos+1);
        set searchLen = length(tempStr);
      end if;

      set spacePos = locate(splitChar, tempStr);

    end while;

    return 0;

  end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `b_rate` float DEFAULT NULL,
  `count_rate` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `author`, `book_name`, `book_type`, `content`, `b_rate`, `count_rate`) VALUES
(1, 'William John Teahan', 'Artificial Intelligence - Agent Behaviour', 'Artificial Intelligence', NULL, NULL, 0),
(2, 'William John Teahan', 'Artificial Intelligence - Agents and Environments', 'Artificial Intelligence', NULL, NULL, 0),
(3, 'William John Teahan', 'Artificial Intelligence - Exercises I', 'Artificial Intelligence', NULL, NULL, 0),
(4, 'William John Teahan', 'Artificial Intelligence - Exercises II', 'Artificial Intelligence', NULL, NULL, 0),
(5, 'David Haskins', 'C Programming in Linux', 'Programming', NULL, NULL, 0),
(6, 'Poul Klausen', 'C# 1', 'Programming', 'Introduction to programming and the C# language', NULL, 0),
(7, 'Kjell Backman', 'Structured Programming with C++', 'Programming', '', NULL, 0),
(8, 'Poul Klausen', 'Introduction to Web Services with Java', 'Java Programming', NULL, NULL, 0),
(9, 'Poul Klausen', 'Java 1_ Basic syntax and semantics', 'Java Programming', NULL, NULL, 0),
(10, 'Poul Klausen', 'Java 2_ Programs with a graphical user interface', 'Java Programming', NULL, NULL, 0),
(11, 'Poul Klausen', 'Java 3_ Object-oriented programming', 'Java Programming', NULL, NULL, 0),
(12, 'Poul Klausen', 'Java 4_ Java\'s type system and collection classes', 'Java Programming', NULL, NULL, 0),
(13, 'Poul Klausen', 'Java 5_ Files and Java IO', 'Java Programming', NULL, NULL, 0),
(14, 'Poul Klausen', 'Java 6_ JDBC and database applications', 'Java Programming', NULL, NULL, 0),
(15, 'Poul Klausen', 'Java 7_ About system development', 'Java Programming', NULL, NULL, 0),
(16, 'Poul Klausen', 'Java 8_ Multithreaded programs', 'Java Programming', NULL, NULL, 0),
(17, 'Poul Klausen', 'Java 9_ Swing, Documents and printing', 'Java Programming', NULL, NULL, 0),
(18, 'Poul Klausen', 'Java 10_ Java2D, Drawing of the window', 'Java Programming', NULL, NULL, 0),
(19, 'Poul Klausen', 'Java 11_ Web applications and Java EE', 'Java Programming', NULL, NULL, 0),
(20, 'Poul Klausen', 'Java 12_ WWW and development of the client part', 'Java Programming', NULL, NULL, 0),
(21, 'Poul Klausen', 'Java 13_ Distributed programming and Java EE', 'Java Programming', NULL, NULL, 0),
(22, 'Poul Klausen', 'Java 14_ Development of applications with JavaFX', 'Java Programming', NULL, NULL, 0),
(23, 'Poul Klausen', 'Java 15_ More about JavaFX', 'Java Programming', NULL, NULL, 0),
(24, 'Poul Klausen', 'Java 16_ Mobile phones and Android', 'Java Programming', NULL, NULL, 0),
(25, 'Poul Klausen', 'Java 17_ More about Java and Android', 'Java Programming', NULL, NULL, 0),
(26, 'Poul Klausen', 'Java 18_ Algorithms and data structures', 'Java Programming', NULL, NULL, 0),
(27, 'Poul Klausen', 'Java 19_ More algorithms and data structures', 'Java Programming', NULL, NULL, 0),
(28, 'Poul Klausen', 'Java 20_ About the system development process', 'Java Programming', NULL, NULL, 0),
(29, 'Christopher Fox', 'Java Data Structures and Algorithms', 'Java Programming', NULL, NULL, 0),
(30, 'David Etheridge', 'Java_ Classes in Java Applications', 'Java Programming', NULL, NULL, 0),
(31, 'David Etheridge', 'Java_ Graphical User Interfaces', 'Java Programming', NULL, NULL, 0),
(32, 'David Etheridge', 'Java_ The Fundamentals of Objects and Classes', 'Java Programming', NULL, NULL, 0),
(33, 'Simon Kendal', 'Object Oriented Programming using Java', 'Java Programming', NULL, NULL, 0),
(34, 'Norbert Euler', 'A First Course in Ordinary Differential Equations', 'Calculus', NULL, NULL, 0),
(35, 'Fredric Mynard', 'A youtube Calculus Workbook (Part I)', 'Calculus', NULL, NULL, 0),
(36, 'Fredric Mynard', 'A youtube Calculus Workbook (Part II)', 'Calculus', NULL, NULL, 0),
(37, 'Nicholas Nsowah-Nuamah', 'Advanced Topics In Introductory Probability', 'Calculus', NULL, NULL, 0),
(38, 'Albert Brontein', 'Calculus II YouTube Workbook', 'Calculus', NULL, NULL, 0),
(39, 'Leif Mejbro', 'Calculus of Residua', 'Calculus', NULL, NULL, 0),
(40, 'Lars-Ake Lindahl', 'Convexity', 'Calculus', NULL, NULL, 0),
(41, 'Mqondisi Bhebhe', 'Decision-Making using Financial Ratios', 'Calculus', NULL, NULL, 0),
(42, 'Lars-Ake Lindahl', 'Descent and Interior-point Methods', 'Calculus', NULL, NULL, 0),
(43, 'Larissa Fradkin', 'Elementary Algebra and Calculus', 'Calculus', NULL, NULL, 0),
(44, 'Christopher C. Tisdell', 'Engineering Mathematics_ YouTube Workbook', 'Calculus', NULL, NULL, 0),
(45, 'Leif Mejbro', 'Examples of Applications of The Power Series', 'Calculus', NULL, NULL, 0),
(46, 'Leif Mejbro', 'Examples of Differential Equations of Second', 'Calculus', NULL, NULL, 0),
(47, 'Leif Mejbro', 'Examples of Eigenvalue Problems', 'Calculus', NULL, NULL, 0),
(48, 'Leif Mejbro', 'Examples of Fourier series', 'Calculus', NULL, NULL, 0),
(49, 'Leif Mejbro', 'Examples of General Elementary Series', 'Calculus', NULL, NULL, 0),
(50, 'Leif Mejbro', 'Examples of Power Series', 'Calculus', NULL, NULL, 0),
(51, 'Leif Mejbro', 'Examples of Sequences', 'Calculus', NULL, NULL, 0),
(52, 'Leif Mejbro', 'Examples of Systems of Differential Equations', 'Calculus', NULL, NULL, 0),
(53, 'Frederic Mynard', 'Exercises for A youtube Calculus Workbook Part II', 'Calculus', NULL, NULL, 0),
(54, 'Leif Mejbro', 'Fourier Series and Systems of Differential', 'Calculus', NULL, NULL, 0),
(55, 'Christopher C. Tisdell', 'Introduction to Complex Numbers', 'Calculus', NULL, NULL, 0),
(56, 'Christopher C. Tisdell', 'Learn Calculus 2 on Your Mobile Device', 'Calculus', NULL, NULL, 0),
(57, 'Kenneth Kuttler', 'Linear Algebra II', 'Calculus', NULL, NULL, 0),
(58, 'Lars-Ake Lindahl', 'Linear and Convex Optimization', 'Calculus', NULL, NULL, 0),
(59, 'Wynand S. Verwoerd', 'Matrix Methods and Differential Equations', 'Calculus', NULL, NULL, 0),
(60, 'Leif Mejbro', 'Methods for finding Zeros in Polynomials', 'Calculus', NULL, NULL, 0),
(61, 'Leif Mejbro', 'My Horror Chamber', 'Calculus', NULL, NULL, 0),
(62, 'Leif Mejbro', 'Ordinary differential equations of first order', 'Calculus', NULL, NULL, 0),
(63, 'Marianna Euler', 'Problems, Theory and Solutions in Linear Algebra', 'Calculus', NULL, NULL, 0),
(64, 'Leif Mejbro', 'Real Functions in One Variable - Complex...', 'Calculus', NULL, NULL, 0),
(65, 'Leif Mejbro', 'Real Functions in One Variable - Elementary...', 'Calculus', NULL, NULL, 0),
(66, 'Leif Mejbro', 'Real Functions in One Variable - Integrals...', 'Calculus', NULL, NULL, 0),
(67, 'Leif Mejbro', 'Real Functions in One Variable - Simple 1...', 'Calculus', NULL, NULL, 0),
(68, 'Leif Mejbro', 'Real Functions in One Variable - Simple 2...', 'Calculus', NULL, NULL, 0),
(69, 'Leif Mejbro', 'Real Functions in One Variable - Taylor\'s...', 'Calculus', NULL, NULL, 0),
(70, 'Leif Mejbro', 'Real Functions in One Variable', 'Calculus', NULL, NULL, 0),
(71, 'Leif Mejbro', 'Real Functions in Several Variables_ Volume I', 'Calculus', NULL, NULL, 0),
(72, 'Leif Mejbro', 'Real Functions in Several Variables_ Volume II', 'Calculus', NULL, NULL, 0),
(73, 'Leif Mejbro', 'Real Functions in Several Variables_ Volume III', 'Calculus', NULL, NULL, 0),
(74, 'Leif Mejbro', 'Real Functions in Several Variables_ Volume IV', 'Calculus', NULL, NULL, 0),
(75, 'Leif Mejbro', 'Real Functions in Several Variables_ Volume IX', 'Calculus', NULL, NULL, 0),
(76, 'Leif Mejbro', 'Real Functions in Several Variables_ Volume V', 'Calculus', NULL, NULL, 0),
(77, 'Leif Mejbro', 'Real Functions in Several Variables_ Volume VI', 'Calculus', NULL, NULL, 0),
(78, 'Leif Mejbro', 'Real Functions in Several Variables_ Volume VII', 'Calculus', NULL, NULL, 0),
(79, 'Leif Mejbro', 'Real Functions in Several Variables_ Volume VIII', 'Calculus', NULL, NULL, 0),
(80, 'Leif Mejbro', 'Real Functions in Several Variables_ Volume X', 'Calculus', NULL, NULL, 0),
(81, 'Leif Mejbro', 'Real Functions in Several Variables_ Volume XI', 'Calculus', NULL, NULL, 0),
(82, 'Leif Mejbro', 'Sequences and Power Series', 'Calculus', NULL, NULL, 0),
(83, 'Leif Mejbro', 'Spectral Theory', 'Calculus', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `book_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saved_book`
--

CREATE TABLE `saved_book` (
  `book_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `first_name`, `last_name`) VALUES
('nam', 'nam', 'nam', 'nam'),
('golf', 'golf', 'thanakit', 'awdawd'),
('thanakit', 'thanakit', 'test', 'test'),
('admin', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`book_id`,`username`);

--
-- Indexes for table `saved_book`
--
ALTER TABLE `saved_book`
  ADD PRIMARY KEY (`book_id`,`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
