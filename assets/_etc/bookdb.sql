-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2019 at 09:41 AM
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
  `count_rate` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `author`, `book_name`, `book_type`, `content`, `b_rate`, `count_rate`) VALUES
(1, 'William John Teahan', 'Artificial Intelligence – Agent Behaviour', 'Artificial Intelligence', NULL, 4.3, NULL),
(2, 'William John Teahan', 'Artificial Intelligence – Agents and Environments', 'Artificial Intelligence', NULL, 4.3, NULL),
(3, 'William John Teahan', 'Artificial Intelligence_ Exercises I', 'Artificial Intelligence', NULL, 5, NULL),
(4, 'William John Teahan', 'Artificial Intelligence_ Exercises II', 'Artificial Intelligence', NULL, 4.2, NULL),
(5, 'David Haskins', 'C Programming in Linux', 'Programming', NULL, 4.2, NULL),
(6, 'Poul Klausen', 'C# 1', 'Programming', 'Introduction to programming and the C# language', 3.8, NULL),
(7, 'Kjell Backman', 'Structured Programming with C++', 'Programming', '', 4.5, NULL),
(8, 'Poul Klausen', 'Introduction to Web Services with Java', 'Java Programming', NULL, 4.2, NULL),
(9, 'Poul Klausen', 'Java 1_ Basic syntax and semantics', 'Java Programming', NULL, 4.8, NULL),
(10, 'Poul Klausen', 'Java 2_ Programs with a graphical user interface', 'Java Programming', NULL, 4.1, NULL),
(11, 'Poul Klausen', 'Java 3_ Object-oriented programming', 'Java Programming', NULL, 4.8, NULL),
(12, 'Poul Klausen', 'Java 4_ Java’s type system and collection classes', 'Java Programming', NULL, 4.1, NULL),
(13, 'Poul Klausen', 'Java 5_ Files and Java IO', 'Java Programming', NULL, 4.1, NULL),
(14, 'Poul Klausen', 'Java 6_ JDBC and database applications', 'Java Programming', NULL, 4.9, NULL),
(15, 'Poul Klausen', 'Java 7_ About system development', 'Java Programming', NULL, 4.9, NULL),
(16, 'Poul Klausen', 'Java 8_ Multithreaded programs', 'Java Programming', NULL, 4.8, NULL),
(17, 'Poul Klausen', 'Java 9_ Swing, Documents and printing', 'Java Programming', NULL, 4.6, NULL),
(18, 'Poul Klausen', 'Java 10_ Java2D, Drawing of the window', 'Java Programming', NULL, 4.5, NULL),
(19, 'Poul Klausen', 'Java 11_ Web applications and Java EE', 'Java Programming', NULL, 4.5, NULL),
(20, 'Poul Klausen', 'Java 12_ WWW and development of the client part', 'Java Programming', NULL, 5, NULL),
(21, 'Poul Klausen', 'Java 13_ Distributed programming and Java EE', 'Java Programming', NULL, 4.4, NULL),
(22, 'Poul Klausen', 'Java 14_ Development of applications with JavaFX', 'Java Programming', NULL, 3.7, NULL),
(23, 'Poul Klausen', 'Java 15_ More about JavaFX', 'Java Programming', NULL, 4.1, NULL),
(24, 'Poul Klausen', 'Java 16_ Mobile phones and Android', 'Java Programming', NULL, 3.1, NULL),
(25, 'Poul Klausen', 'Java 17_ More about Java and Android', 'Java Programming', NULL, 3.2, NULL),
(26, 'Poul Klausen', 'Java 18_ Algorithms and data structures', 'Java Programming', NULL, NULL, NULL),
(27, 'Poul Klausen', 'Java 19_ More algorithms and data structures', 'Java Programming', NULL, NULL, NULL),
(28, 'Poul Klausen', 'Java 20_ About the system development process', 'Java Programming', NULL, NULL, NULL),
(29, 'Christopher Fox', 'Java Data Structures and Algorithms', 'Java Programming', NULL, NULL, NULL),
(30, 'David Etheridge', 'Java_ Classes in Java Applications', 'Java Programming', NULL, NULL, NULL),
(31, 'David Etheridge', 'Java_ Graphical User Interfaces', 'Java Programming', NULL, NULL, NULL),
(32, 'David Etheridge', 'Java_ The Fundamentals of Objects and Classes', 'Java Programming', NULL, NULL, NULL),
(33, 'Simon Kendal', 'Object Oriented Programming using Java', 'Java Programming', NULL, NULL, NULL),
(34, 'Christopher Fox', 'Java Data Structures and Algorithms', 'Java Programming', NULL, NULL, NULL),
(35, 'David Etheridge', 'Java_ Classes in Java Applications', 'Java Programming', NULL, NULL, NULL),
(36, 'David Etheridge', 'Java_ Graphical User Interfaces', 'Java Programming', NULL, NULL, NULL),
(37, 'David Etheridge', 'Java_ The Fundamentals of Objects and Classes', 'Java Programming', NULL, NULL, NULL),
(38, 'Simon Kendal', 'Object Oriented Programming using Java', 'Java Programming', NULL, NULL, NULL),
(39, 'Norbert Euler, Lulea University of Technology', 'A First Course in Ordinary Differential Equations', 'Calculus', NULL, NULL, NULL),
(40, 'Fredric Mynard', 'A youtube Calculus Workbook (Part I)', 'Calculus', NULL, NULL, NULL),
(41, 'Fredric Mynard', 'A youtube Calculus Workbook (Part II)', 'Calculus', NULL, NULL, NULL),
(42, 'Nicholas N.N. Nsowah-Nuamah', 'Advanced Topics In Introductory Probability', 'Calculus', NULL, NULL, NULL),
(43, 'Albert Brontein', 'Calculus II YouTube Workbook', 'Calculus', NULL, NULL, NULL),
(44, 'Leif Mejlbro', 'Calculus of Residua', 'Calculus', NULL, NULL, NULL),
(45, 'Lars-Ake Lindahl', 'Convexity', 'Calculus', NULL, NULL, NULL),
(46, 'Mqondisi Bhebhe', 'Decision-Making using Financial Ratios', 'Calculus', NULL, NULL, NULL),
(47, 'Lars-Ake Lindahl', 'Descent and Interior-point Methods', 'Calculus', NULL, NULL, NULL),
(48, 'Larissa Fradkin', 'Elementary Algebra and Calculus', 'Calculus', NULL, NULL, NULL),
(49, 'Christopher C. Tisdell', 'Engineering Mathematics_ YouTube Workbook', 'Calculus', NULL, NULL, NULL),
(50, 'Leif Mejlbro', 'Examples of Applications of The Power Series...', 'Calculus', NULL, NULL, NULL),
(51, 'Leif Mejlbro', 'Examples of Differential Equations of Second...', 'Calculus', NULL, NULL, NULL),
(52, 'Leif Mejbro', 'Examples of Eigenvalue Problems', 'Calculus', NULL, NULL, NULL),
(53, 'Leif Mejbro', 'Examples of Fourier series', 'Calculus', NULL, NULL, NULL),
(54, 'Leif Mejbro', 'Examples of General Elementary Series', 'Calculus', NULL, NULL, NULL),
(55, 'Leif Mejbro', 'Examples of Power Series', 'Calculus', NULL, NULL, NULL),
(56, 'Leif Mejbro', 'Examples of Sequences', 'Calculus', NULL, NULL, NULL),
(57, 'Leif Mejbro', 'Examples of Systems of Differential Equations...', 'Calculus', NULL, NULL, NULL),
(58, 'Frederic Mynard', 'Exercises for A youtube Calculus Workbook Part II', 'Calculus', NULL, NULL, NULL),
(59, 'Leif Mejbro', 'Fourier Series and Systems of Differential...', 'Calculus', NULL, NULL, NULL),
(60, 'Christopher C. Tisdell', 'Introduction to Complex Numbers', 'Calculus', NULL, NULL, NULL),
(61, 'Christopher C. Tisdell', 'Learn Calculus 2 on Your Mobile Device', 'Calculus', NULL, NULL, NULL),
(62, 'Kenneth Kuttler', 'Linear Algebra II', 'Calculus', NULL, NULL, NULL),
(63, 'Lars-Ake Lindahl', 'Linear and Convex Optimization', 'Calculus', NULL, NULL, NULL),
(64, 'Wynand S. Verwoerd', 'Matrix Methods and Differential Equations', 'Calculus', NULL, NULL, NULL),
(65, 'Leif Mejbro', 'Methods for finding Zeros in Polynomials', 'Calculus', NULL, NULL, NULL),
(66, 'Leif Mejbro', 'My Horror Chamber', 'Calculus', NULL, NULL, NULL),
(67, 'Leif Mejbro', 'Ordinary differential equations of first order', 'Calculus', NULL, NULL, NULL),
(68, 'Marianna Euler; Norbert Euler, Lulea University of Technology', 'Problems, Theory and Solutions in Linear Algebra', 'Calculus', NULL, NULL, NULL),
(69, 'Leif Mejbro', 'Real Functions in One Variable - Complex...', 'Calculus', NULL, NULL, NULL),
(70, 'Leif Mejbro', 'Real Functions in One Variable - Elementary...', 'Calculus', NULL, NULL, NULL),
(71, 'Leif Mejbro', 'Real Functions in One Variable - Integrals...', 'Calculus', NULL, NULL, NULL),
(72, 'Leif Mejbro', 'Real Functions in One Variable - Simple 1...', 'Calculus', NULL, NULL, NULL),
(73, 'Leif Mejbro', 'Real Functions in One Variable - Simple 2...', 'Calculus', NULL, NULL, NULL),
(74, 'Leif Mejbro', 'Real Functions in One Variable - Taylor\'s...', 'Calculus', NULL, NULL, NULL),
(75, 'Leif Mejbro', 'Real Functions in One Variable', 'Calculus', NULL, NULL, NULL),
(76, 'Leif Mejbro', 'Real Functions in Several Variables_ Volume I', 'Calculus', NULL, NULL, NULL),
(77, 'Leif Mejbro', 'Real Functions in Several Variables_ Volume II', 'Calculus', NULL, NULL, NULL),
(78, 'Leif Mejbro', 'Real Functions in Several Variables_ Volume III', 'Calculus', NULL, NULL, NULL),
(79, 'Leif Mejbro', 'Real Functions in Several Variables_ Volume IV', 'Calculus', NULL, NULL, NULL),
(80, 'Leif Mejbro', 'Real Functions in Several Variables_ Volume IX', 'Calculus', NULL, NULL, NULL),
(81, 'Leif Mejbro', 'Real Functions in Several Variables_ Volume V', 'Calculus', NULL, NULL, NULL),
(82, 'Leif Mejbro', 'Real Functions in Several Variables_ Volume VI', 'Calculus', NULL, NULL, NULL),
(83, 'Leif Mejbro', 'Real Functions in Several Variables_ Volume VII', 'Calculus', NULL, NULL, NULL),
(84, 'Leif Mejbro', 'Real Functions in Several Variables_ Volume VIII', 'Calculus', NULL, NULL, NULL),
(85, 'Leif Mejbro', 'Real Functions in Several Variables_ Volume X', 'Calculus', NULL, NULL, NULL),
(86, 'Leif Mejbro', 'Real Functions in Several Variables_ Volume XI', 'Calculus', NULL, NULL, NULL),
(87, 'Leif Mejbro', 'Sequences and Power Series', 'Calculus', NULL, NULL, NULL),
(88, 'Leif Mejbro', 'Spectral Theory', 'Calculus', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `book_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`book_id`, `username`, `rate`) VALUES
(1, 'admin', 4),
(3, 'admin', 4),
(8, 'nam', 4),
(1, 'nam', 5),
(2, 'golf', 5),
(1, 'golf', 5),
(3, 'nam', 3),
(14, 'admin', 5),
(6, 'thanakit', 4),
(85, 'admin', 5);

-- --------------------------------------------------------

--
-- Table structure for table `saved_book`
--

CREATE TABLE `saved_book` (
  `book_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `saved_book`
--

INSERT INTO `saved_book` (`book_id`, `username`) VALUES
(1, 'admin'),
(1, 'golf'),
(1, 'nam'),
(3, 'nam'),
(7, 'nam'),
(8, 'golf'),
(14, 'admin'),
(90, 'nam');

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
('admin', 'admin', 'admin', 'admin'),
('awdawd', 'awdaw!Qd5', 'awd', 'add'),
('awdawdawdawd', 'awdawdQd1', 'awdawd', 'dawdwawd'),
('awdawdwad', 'awdwadQ1', 'awdawd', 'daddd'),
('awwadawd', 'awdwawdD1d', 'awdwad', 'dddwa'),
('awdwad', 'awdawdawdAdawd1', 'awdawd', 'awdwad'),
('golf', 'Sawaddee12', 'thanakit', 'awdawd'),
('thanakit', 'awdawdawdawdQq1', 'awdawdawd', 'dawdawdawd'),
('testRegistration', 'awdawdawdawQq1', 'aawawdAwd', 'awdawdawd'),
('admintestRegis', 'awdawdQQqqqq111', 'qweqwdawd', 'aww'),
('adminawdadawdawdawdaw', 'admindwwQqqq11', 'wdawdwa', 'dwww');

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
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
