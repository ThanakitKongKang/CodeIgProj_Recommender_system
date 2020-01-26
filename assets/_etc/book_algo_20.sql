-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2020 at 12:14 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

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
  `count_rate` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `author`, `book_name`, `book_type`, `content`, `b_rate`, `count_rate`) VALUES
(124, 'Rod Stephens', 'Essential Algorithms a Practical Approach to Computer Algorithms', 'Analysis of Algorithms', NULL, NULL, 0),
(123, 'Ellis Horowitz', 'Fundamentals of Computer Algorithms By Ellis Horowitz (1984)', 'Analysis of Algorithms', NULL, NULL, 0),
(122, 'Michael McMillan', 'Data Structures and Algorithms with JavaScript', 'Analysis of Algorithms', NULL, NULL, 0),
(121, 'Thomas H. Cormen', 'Introduction to Algorithms, Second Edition', 'Analysis of Algorithms', NULL, NULL, 0),
(120, 'S.N. Sivanandam', 'Introduction to Genetic Algorithms', 'Analysis of Algorithms', NULL, NULL, 0),
(119, 'Jefff Edmonds', 'How to Think about Algorithms', 'Analysis of Algorithms', NULL, NULL, 0),
(118, 'John Paul Mueller', 'Algorithms For Dummies', 'Analysis of Algorithms', NULL, NULL, 0),
(117, 'Robert Lafore', 'Teach Yourself Data Structures And Algorithms In 24 hours - Robert Lafore', 'Analysis of Algorithms', NULL, NULL, 0),
(116, 'Mark Allen Weiss', 'Data Structures and Algorithm Analysis in C Mark Allen Weiss', 'Analysis of Algorithms', NULL, NULL, 0),
(115, 'Sartaj Sahni', 'Data Structures Algorithms and Applications in C++ by sartraj sahani', 'Analysis of Algorithms', NULL, NULL, 0),
(114, 'Ernest P. Chan', 'Algorithmic Trading - Trading Software', 'Analysis of Algorithms', NULL, NULL, 0),
(113, 'David Natingga', 'Data Science Algorithms in a Week_ Top 7 algorithms for computing, data analysis, and machine learning', 'Analysis of Algorithms', NULL, NULL, 0),
(112, 'S. Dasgupta', 'Algorithms - Mathematics & Computer Science', 'Analysis of Algorithms', NULL, NULL, 0),
(111, 'Michael T. Goodrich', 'Data Structures and Algorithms in Python', 'Analysis of Algorithms', NULL, NULL, 0),
(110, 'Narasimha Karumanchi', 'Data Structure and Algorithmic Thinking with Python  Data Structure and Algorithmic Puzzles', 'Analysis of Algorithms', NULL, NULL, 0),
(109, 'Narasimha Karumanchi', 'Data Structures and Algorithms Made Easy Data Structures and Algorithmic Puzzles', 'Analysis of Algorithms', NULL, NULL, 0),
(108, 'Robert Sedgewick ', 'Algorithms 4th Edition', 'Analysis of Algorithms', 'This is the latest version of Sedgewick\'s best-selling series, reflecting an indispensable body of knowledge developed over the past several decades.', NULL, 0),
(107, 'Jurg Nievergelt', 'Algorithms and Data Structures With Applications to Graphics and Geometry', 'Analysis of Algorithms', 'Based on the authors\' extensive teaching of algorithms and data structures, this text aims to show a sample of the intellectual demands required by a computer science curriculum, and to present issues and results of lasting value, ideas that will outlive the current generation of computers. Sample exercises, many with solutions, are included throughout the book.', NULL, 0),
(106, 'Sanjoy Dasgupta', 'Algorithms', 'Analysis of Algorithms', 'This text, extensively class-tested over a decade at UC Berkeley and UC San Diego, explains the fundamentals of algorithms in a storyline that makes the material enjoyable and easy to digest. Emphasis is placed on understanding the crisp mathematical idea behind each algorithm, in a manner that is intuitive and rigorous without being unduly formal.', NULL, 0),
(105, 'Dr.K.Raghava Rao', 'Introduction to Design Analysis of Algorithms - In Simple Way', 'Analysis of Algorithms', 'This book was very useful to easily understand the algorithms. This book is having enough examples in every algorithm. It was written for the sake of students to provide complete knowledge of Algorithms.', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
