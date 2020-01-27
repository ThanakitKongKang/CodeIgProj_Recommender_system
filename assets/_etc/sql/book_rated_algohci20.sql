-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2020 at 01:11 PM
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
(66, 'Leif Mejbro', 'Real Functions in One Variable - Integrals...', 'Calculus', NULL, 4.12447, 1),
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
(83, 'Leif Mejbro', 'Spectral Theory', 'Calculus', NULL, NULL, 0),
(84, 'Edward Stull', 'UX Fundamentals for Non-UX Professionals User Experience Principles for Managers, Writers, Designers, and Developers', 'Human computer interaction', NULL, 3.88019, 33),
(85, 'Jaime Levy', 'UX Strategy', 'Human computer interaction', NULL, 3.99554, 70),
(86, 'Eric Ries', 'Lean UX Applying Lean Principles to Improve User Experience', 'Human computer interaction', NULL, 4.23757, 84),
(87, 'Eric Ries', 'UX for Lean Startups_Faster, Smarter User Experience Research and Design', 'Human computer interaction', NULL, 4.21955, 70),
(88, 'Jesmond Allen', 'Smashing UX Design Foundations for Designing Online User Experiences', 'Human computer interaction', NULL, 4.22327, 80),
(89, 'Steve Krug', 'Don\'t Make Me Think A Common Sense Approach to Web Usability', 'Human computer interaction', NULL, 4.09685, 73),
(90, 'W. Craig Tomlin', 'UX Optimization Combining Behavioral UX and Usability Testing Data to Optimize Websites', 'Human computer interaction', NULL, 4.23794, 48),
(91, 'Don norman', 'The Design of Everyday Things Revised and Expanded Edition', 'Human computer interaction', NULL, 4.22703, 48),
(92, 'Russ unger', 'A Project Guide to UX Design for User Experience Designers in the Field or in the Making 2nd edition', 'Human computer interaction', NULL, 4.04249, 47),
(93, 'Susan M. Weinschenk', '100 Things Every Designer Needs to Know About People ', 'Human computer interaction', NULL, 4.16916, 54),
(94, 'David Benyon', 'Designing Interactive Systems A Comprehensive Guide to HCI, UX and Interaction Design', 'Human computer interaction', NULL, 4.17797, 48),
(95, 'Rex Hartson', 'The UX Book Process and Guidelines for Ensuring a Quality User Experience', 'Human computer interaction', NULL, 4.09282, 61),
(96, 'David Travis', 'Think Like a UX Researcher How to Observe Users, Influence Design, and Shape Business Strategy', 'Human computer interaction', NULL, 4.06994, 33),
(97, 'Jenny Preece', 'Interaction Design - Beyond Human-Computer Interaction, 4th Edition', 'Human computer interaction', NULL, 4.11425, 22),
(98, 'Jenny Preece', 'Interaction Design Beyond Human-Computer Interaction, 5th Edition', 'Human computer interaction', NULL, 4.08623, 25),
(99, 'Jesse James Garrett', 'The Elements of User Experience. User-Centered Design for the Web and Beyond', 'Human computer interaction', NULL, 4.08124, 45),
(100, 'Ginny Redish', 'Storytelling for User Experience  Crafting Stories for Better Design', 'Human computer interaction', NULL, 3.95574, 28),
(101, 'James Lang', 'Researching UX User Research', 'Human computer interaction', NULL, 4.19386, 17),
(102, 'Sitepoint', 'Analytics Tools for Optimizing UX', 'Human computer interaction', NULL, 4.13026, 11),
(103, 'Jeff johnson', 'Designing with the Mind in Mind', 'Human computer interaction', NULL, 4.19201, 10),
(104, 'Luke wroblewski', 'Web Form Design Filling in the Blanks', 'Human computer interaction', NULL, 4.12943, 7),
(105, 'Dr.K.Raghava Rao', 'Introduction to Design Analysis of Algorithms - In Simple Way', 'Analysis of Algorithms', 'This book was very useful to easily understand the algorithms. This book is having enough examples in every algorithm. It was written for the sake of students to provide complete knowledge of Algorithms.', NULL, 0),
(106, 'Sanjoy Dasgupta', 'Algorithms', 'Analysis of Algorithms', 'This text, extensively class-tested over a decade at UC Berkeley and UC San Diego, explains the fundamentals of algorithms in a storyline that makes the material enjoyable and easy to digest. Emphasis is placed on understanding the crisp mathematical idea behind each algorithm, in a manner that is intuitive and rigorous without being unduly formal.', NULL, 0),
(107, 'Jurg Nievergelt', 'Algorithms and Data Structures With Applications to Graphics and Geometry', 'Analysis of Algorithms', 'Based on the authors\' extensive teaching of algorithms and data structures, this text aims to show a sample of the intellectual demands required by a computer science curriculum, and to present issues and results of lasting value, ideas that will outlive the current generation of computers. Sample exercises, many with solutions, are included throughout the book.', NULL, 0),
(108, 'Robert Sedgewick ', 'Algorithms 4th Edition', 'Analysis of Algorithms', 'This is the latest version of Sedgewick\'s best-selling series, reflecting an indispensable body of knowledge developed over the past several decades.', NULL, 0),
(109, 'Narasimha Karumanchi', 'Data Structures and Algorithms Made Easy Data Structures and Algorithmic Puzzles', 'Analysis of Algorithms', NULL, NULL, 0),
(110, 'Narasimha Karumanchi', 'Data Structure and Algorithmic Thinking with Python  Data Structure and Algorithmic Puzzles', 'Analysis of Algorithms', NULL, NULL, 0),
(111, 'Michael T. Goodrich', 'Data Structures and Algorithms in Python', 'Analysis of Algorithms', NULL, NULL, 0),
(112, 'S. Dasgupta', 'Algorithms - Mathematics & Computer Science', 'Analysis of Algorithms', NULL, NULL, 0),
(113, 'David Natingga', 'Data Science Algorithms in a Week_ Top 7 algorithms for computing, data analysis, and machine learning', 'Analysis of Algorithms', NULL, NULL, 0),
(114, 'Ernest P. Chan', 'Algorithmic Trading - Trading Software', 'Analysis of Algorithms', NULL, NULL, 0),
(115, 'Sartaj Sahni', 'Data Structures Algorithms and Applications in C++ by sartraj sahani', 'Analysis of Algorithms', NULL, NULL, 0),
(116, 'Mark Allen Weiss', 'Data Structures and Algorithm Analysis in C Mark Allen Weiss', 'Analysis of Algorithms', NULL, NULL, 0),
(117, 'Robert Lafore', 'Teach Yourself Data Structures And Algorithms In 24 hours - Robert Lafore', 'Analysis of Algorithms', NULL, NULL, 0),
(118, 'John Paul Mueller', 'Algorithms For Dummies', 'Analysis of Algorithms', NULL, NULL, 0),
(119, 'Jefff Edmonds', 'How to Think about Algorithms', 'Analysis of Algorithms', NULL, NULL, 0),
(120, 'S.N. Sivanandam', 'Introduction to Genetic Algorithms', 'Analysis of Algorithms', NULL, NULL, 0),
(121, 'Thomas H. Cormen', 'Introduction to Algorithms, Second Edition', 'Analysis of Algorithms', NULL, NULL, 0),
(122, 'Michael McMillan', 'Data Structures and Algorithms with JavaScript', 'Analysis of Algorithms', NULL, NULL, 0),
(123, 'Ellis Horowitz', 'Fundamentals of Computer Algorithms By Ellis Horowitz (1984)', 'Analysis of Algorithms', NULL, NULL, 0),
(124, 'Rod Stephens', 'Essential Algorithms a Practical Approach to Computer Algorithms', 'Analysis of Algorithms', NULL, NULL, 0);

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
