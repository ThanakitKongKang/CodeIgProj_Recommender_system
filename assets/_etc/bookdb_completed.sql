-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2020 at 05:57 PM
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
-- Table structure for table `activity_search`
--

CREATE TABLE `activity_search` (
  `search_id` int(11) NOT NULL,
  `search_keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activity_view`
--

CREATE TABLE `activity_view` (
  `view_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(13, 'Poul Klausen', 'Java 5_ Files and Java IO', 'Java Programming', NULL, 4.15889, 4),
(14, 'Poul Klausen', 'Java 6_ JDBC and database applications', 'Java Programming', NULL, NULL, 0),
(15, 'Poul Klausen', 'Java 7_ About system development', 'Java Programming', NULL, NULL, 0),
(16, 'Poul Klausen', 'Java 8_ Multithreaded programs', 'Java Programming', NULL, NULL, 0),
(17, 'Poul Klausen', 'Java 9_ Swing, Documents and printing', 'Java Programming', NULL, NULL, 0),
(18, 'Poul Klausen', 'Java 10_ Java2D, Drawing of the window', 'Java Programming', NULL, NULL, 0),
(19, 'Poul Klausen', 'Java 11_ Web applications and Java EE', 'Java Programming', NULL, NULL, 0),
(20, 'Poul Klausen', 'Java 12_ WWW and development of the client part', 'Java Programming', NULL, NULL, 0),
(21, 'Poul Klausen', 'Java 13_ Distributed programming and Java EE', 'Java Programming', NULL, NULL, 0),
(22, 'Poul Klausen', 'Java 14_ Development of applications with JavaFX', 'Java Programming', NULL, NULL, 0),
(23, 'Poul Klausen', 'Java 15_ More about JavaFX', 'Java Programming', NULL, 4.08147, 2),
(24, 'Poul Klausen', 'Java 16_ Mobile phones and Android', 'Java Programming', NULL, NULL, 0),
(25, 'Poul Klausen', 'Java 17_ More about Java and Android', 'Java Programming', NULL, 4.06903, 1),
(26, 'Poul Klausen', 'Java 18_ Algorithms and data structures', 'Java Programming', NULL, NULL, 0),
(27, 'Poul Klausen', 'Java 19_ More algorithms and data structures', 'Java Programming', NULL, NULL, 0),
(28, 'Poul Klausen', 'Java 20_ About the system development process', 'Java Programming', NULL, NULL, 0),
(29, 'Christopher Fox', 'Java Data Structures and Algorithms', 'Java Programming', NULL, NULL, 0),
(30, 'David Etheridge', 'Java_ Classes in Java Applications', 'Java Programming', NULL, NULL, 0),
(31, 'David Etheridge', 'Java_ Graphical User Interfaces', 'Java Programming', NULL, 4.10724, 3),
(32, 'David Etheridge', 'Java_ The Fundamentals of Objects and Classes', 'Java Programming', NULL, 4.10431, 4),
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
(53, 'Frederic Mynard', 'Exercises for A youtube Calculus Workbook Part II', 'Calculus', NULL, 4.11361, 1),
(54, 'Leif Mejbro', 'Fourier Series and Systems of Differential', 'Calculus', NULL, NULL, 0),
(55, 'Christopher C. Tisdell', 'Introduction to Complex Numbers', 'Calculus', NULL, NULL, 0),
(56, 'Christopher C. Tisdell', 'Learn Calculus 2 on Your Mobile Device', 'Calculus', NULL, NULL, 0),
(57, 'Kenneth Kuttler', 'Linear Algebra II', 'Calculus', NULL, NULL, 0),
(58, 'Lars-Ake Lindahl', 'Linear and Convex Optimization', 'Calculus', NULL, 4.1392, 2),
(59, 'Wynand S. Verwoerd', 'Matrix Methods and Differential Equations', 'Calculus', NULL, 4.12155, 3),
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
(81, 'Leif Mejbro', 'Real Functions in Several Variables_ Volume XI', 'Calculus', NULL, 4.08389, 1),
(82, 'Leif Mejbro', 'Sequences and Power Series', 'Calculus', NULL, 4.15467, 5),
(83, 'Leif Mejbro', 'Spectral Theory', 'Calculus', NULL, NULL, 0),
(84, 'Edward Stull', 'UX Fundamentals for Non-UX Professionals User Experience Principles for Managers, Writers, Designers, and Developers', 'Human computer interaction', NULL, 4.20442, 27),
(85, 'Jaime Levy', 'UX Strategy', 'Human computer interaction', NULL, 4.14243, 30),
(86, 'Eric Ries', 'Lean UX Applying Lean Principles to Improve User Experience', 'Human computer interaction', NULL, 4.08505, 19),
(87, 'Eric Ries', 'UX for Lean Startups_Faster, Smarter User Experience Research and Design', 'Human computer interaction', NULL, 4.10101, 26),
(88, 'Jesmond Allen', 'Smashing UX Design Foundations for Designing Online User Experiences', 'Human computer interaction', NULL, 4.16922, 28),
(89, 'Steve Krug', 'Don\'t Make Me Think A Common Sense Approach to Web Usability', 'Human computer interaction', NULL, 4.05819, 16),
(90, 'W. Craig Tomlin', 'UX Optimization Combining Behavioral UX and Usability Testing Data to Optimize Websites', 'Human computer interaction', NULL, 4.17855, 39),
(91, 'Don norman', 'The Design of Everyday Things Revised and Expanded Edition', 'Human computer interaction', NULL, 4.10065, 27),
(92, 'Russ unger', 'A Project Guide to UX Design for User Experience Designers in the Field or in the Making 2nd edition', 'Human computer interaction', NULL, 4.0822, 27),
(93, 'Susan M. Weinschenk', '100 Things Every Designer Needs to Know About People ', 'Human computer interaction', NULL, 3.99546, 24),
(94, 'David Benyon', 'Designing Interactive Systems A Comprehensive Guide to HCI, UX and Interaction Design', 'Human computer interaction', NULL, 4.18127, 44),
(95, 'Rex Hartson', 'The UX Book Process and Guidelines for Ensuring a Quality User Experience', 'Human computer interaction', NULL, 4.20464, 64),
(96, 'David Travis', 'Think Like a UX Researcher How to Observe Users, Influence Design, and Shape Business Strategy', 'Human computer interaction', NULL, 4.18936, 77),
(97, 'Jenny Preece', 'Interaction Design - Beyond Human-Computer Interaction, 4th Edition', 'Human computer interaction', NULL, 4.19064, 63),
(98, 'Jenny Preece', 'Interaction Design Beyond Human-Computer Interaction, 5th Edition', 'Human computer interaction', NULL, 4.07339, 63),
(99, 'Jesse James Garrett', 'The Elements of User Experience. User-Centered Design for the Web and Beyond', 'Human computer interaction', NULL, 4.04126, 60),
(100, 'Ginny Redish', 'Storytelling for User Experience  Crafting Stories for Better Design', 'Human computer interaction', NULL, 4.11232, 68),
(101, 'James Lang', 'Researching UX User Research', 'Human computer interaction', NULL, 4.11219, 74),
(102, 'Sitepoint', 'Analytics Tools for Optimizing UX', 'Human computer interaction', NULL, 4.11213, 77),
(103, 'Jeff johnson', 'Designing with the Mind in Mind', 'Human computer interaction', NULL, 4.13318, 77),
(104, 'Luke wroblewski', 'Web Form Design Filling in the Blanks', 'Human computer interaction', NULL, 3.97042, 69),
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
(108, 'Robert Sedgewick ', 'Algorithms 4th Edition', 'Analysis of Algorithms', NULL, NULL, 0),
(107, 'Jurg Nievergelt', 'Algorithms and Data Structures With Applications to Graphics and Geometry', 'Analysis of Algorithms', NULL, NULL, 0),
(106, 'Sanjoy Dasgupta', 'Algorithms', 'Analysis of Algorithms', NULL, NULL, 0),
(105, 'Dr.K.Raghava Rao', 'Introduction to Design Analysis of Algorithms - In Simple Way', 'Analysis of Algorithms', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `upvote_count` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `book_id`, `created`, `modified`, `content`, `upvote_count`, `fullname`) VALUES
(36, 10, '2020-01-26 16:29:26', '2020-01-26 16:29:26', 'test', 0, 'admin'),
(37, 10, '2020-01-26 16:29:27', '2020-01-26 16:29:27', 'test2', 0, 'admin'),
(39, 124, '2020-01-30 07:50:06', '2020-01-30 07:50:06', 'test commenting 2', 0, 'nam'),
(40, 122, '2020-01-30 07:56:04', '2020-01-30 07:56:04', 'test commenting', 0, 'signuptest');

-- --------------------------------------------------------

--
-- Table structure for table `comment_enabling`
--

CREATE TABLE `comment_enabling` (
  `book_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment_enabling`
--

INSERT INTO `comment_enabling` (`book_id`, `status`) VALUES
(10, 1),
(14, 1),
(120, 1),
(123, 0),
(124, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment_liking`
--

CREATE TABLE `comment_liking` (
  `comment_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `book_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course_name_th` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name_th`, `course_name_en`) VALUES
('000101', 'ภาษาอังกฤษ 1', 'English I'),
('000102', 'ภาษาอังกฤษ 2', 'English II'),
('000103', 'ภาษาอังกฤษ 3', 'English III'),
('000104', 'ภาษาอังกฤษ 4', 'English IV'),
('000145', 'ภาวะผู้นำและการจัดการ', 'Leadership and Management'),
('000174', 'ทักษะการเรียนรู้', 'Learning Skills'),
('000175', 'การคิดเชิงสร้างสรรค์และการแก้ปัญหา', 'Creative Thinking and Problem Solving'),
('000176', 'ผู้ประกอบการสร้างสรรค์', 'Creative Entrepreneurs'),
('411224', 'ภาษาอังกฤษเทคนิคสำหรับวิทยาศาสตร์และเทคโนโลยี 2', 'Technical English for Science and Technology II\r\n'),
('777100', 'ความรู้เบื้องต้นเกี่ยวกับกฎหมายทั่วไป', 'Introduction to Law'),
('967261', 'หลักการจัดการ', 'Principles of Management\r\n'),
('967262', 'การจัดการทรัพยากรมนุษย์', 'Human Resource Management'),
('967363', 'การจัดการธุรกิจขนาดกลางและขนาดย่อม', 'Small and Medium Enterprises Management\r\n'),
('SC001002', 'วิทยาศาสตร์ เทคโนโลยีและนวัตกรรมเพื่อการพัฒนาที่ยั่งยืน', 'Science , technology and innovation\r\nFor sustainable development'),
('SC001003', 'การสื่อสารทางวิทยาศาสตร์', 'Science Communication'),
('SC002001', 'การเตรียมความพร้อมก่อนปฏิบัติงานสหกิจศึกษา สำหรับนักศึกษาคณะวิทยาศาสตร์', 'Orientation to Co-Operative\r\nEducation for Science\r\nStudent'),
('SC002104', 'วิทยาศาสตร์กายภาพ', 'Physical Science'),
('SC311001 ', 'วิทยาการคอมพิวเตอร์หลักมูล', 'Fundamentals of Computer Science'),
('SC311002', 'การเขียนโปรแกรมเชิงโครงสร้างสำหรับวิทยาการคอมพิวเตอร์\r\n', 'Structured Programming for Computer Science'),
('SC311003', 'การเขียนโปรแกรมเชิงวัตถุ', 'Object – Oriented Programming'),
('SC311004', 'สถาปัตยกรรมระบบคอมพิวเตอร์', 'Computer Systems Architecture'),
('SC311201', 'ภาพเคลื่อนไหวคอมพิวเตอร์ 2 มิติ', '2D Computer Animation'),
('SC311301', 'การพัฒนาโปรแกรมประยุกต์บนเว็บ', 'Web Application Development'),
('SC311501', 'การเขียนโปรแกรมภาษาจาวา', 'Programming in Java'),
('SC311502', 'การเขียนโปรแกรมเชลล์', 'Shell Programming'),
('SC311503', 'การเขียนโปรแกรมสคริปต์', 'Script Programming'),
('SC312001', 'โครงสร้างข้อมูล', 'Data Structures'),
('SC312002', 'การโต้ตอบระหว่างมนุษย์และคอมพิวเตอร์', 'Human Computer Interaction'),
('SC312003', 'ระบบจัดการฐานข้อมูลและการออกแบบฐานข้อมูล', 'Database Management System\r\nAnd Database Design'),
('SC312004', 'ปฏิบัติการระบบฐานข้อมูลและการออกแบบ', 'Database System and Design Laboratory'),
('SC312005', 'เครือข่ายคอมพิวเตอร์ ', 'Computer Networks'),
('SC312006', 'การวิเคราะห์ขั้นตอนวิธี', 'Analysis of Algorithm'),
('SC312101', 'การเรียนรู้เชิงเครื่องจักรสำหรับวิทยาการข้อมูล', 'Machine Learning for Data Science'),
('SC312102', 'การจัดการความรู้', 'Knowledge Management'),
('SC312103', 'การค้นคืนสารสนเทศ', 'Information Retrieval'),
('SC312201', 'พื้นฐานการเขียนโปรแกรมเกม', 'Basic of Game Programming'),
('SC312301', 'เครือข่ายการสื่อสารไร้สายและอุปกรณ์เคลื่อนที', 'Wireless and Mobile Communication Networks'),
('SC312302', 'เทคโนโลยีการออกแบบเว็บ', 'Web Design Technologies'),
('SC312303', 'การพัฒนาแอปพลิเคชันบนอุปกรณ์เคลื่อนที่', 'Advance Web Application Development'),
('SC312401', 'การพาณิชย์อิเล็กทรอนิกส์', 'Electronic Commerce'),
('SC312402', 'กลยุทธ์และการจัดการเทคโนโลยีดิจิทัล', 'Digital Technology Management and Strategies'),
('SC312501', 'การเขียนโปรแกรมภาษาจาวาขั้นสูง', 'Advance Programming in Java'),
('SC312502', 'ฝึกปฏิบัติการสำหรับวิทยาการคอมพิวเตอร์', 'Computer Programming Contest'),
('SC313001', 'ระบบปฏิบัติการและการเขียนโปรแกรมซีสเต็มคอล', 'Operating Systems and System Calls Programming'),
('SC313002', 'หลักการออกแบบพัฒนาซอฟต์แวร์', 'Principles of Software Design and Development'),
('SC313003', 'การวิเคราะห์และออกแบบระบบ', 'System Analysis and Design'),
('SC313004', 'วิศวกรรมซอฟต์แวร์', 'Software Engineering'),
('SC313005', 'ทฤษฎีการคำนวณ', 'Theory of Computation'),
('SC313006', 'ปัญญาประดิษฐ์', 'Artificial Intelligence'),
('SC313101', 'วิทยาการคำนวณ', 'Computational Science'),
('SC313102', 'โครงข่ายประสาท', 'Neural Networks'),
('SC313103', 'การวิเคราะห์วิทยาข้อมูลและการทำเหมืองข้อมูล', 'Data Analytics and Mining'),
('SC313104', 'ชีวสารสนเทศศาสตร์เบื้องต้น', 'Fundamental of Bioinformatics'),
('SC313105 ', 'การประมวลผลภาษาธรรมชาติ', 'Natural Language Processing\r\n'),
('SC313106', 'ตัวแบบกระบวนการหาค่าเหมาะที่สุด', 'Optimization and Modeling'),
('SC313107', 'การวิเคราะห์ข้อมูลขนาดใหญ่', 'Big Data Analytics'),
('SC313201', 'การประมวลผลภาพดิจิทัล', 'Digital Image Processing'),
('SC313202', 'การเขียนโปรแกรมเกมขั้นสูง', 'Advance Game Programming'),
('SC313301', 'สถาปัตยกรรมเครือข่าย', 'Network Architecture'),
('SC313302', 'การเชื่อมต่ออินเทอร์เน็ต', 'Internetworking'),
('SC313303', 'การพัฒนาโปรแกรมประยุกต์สำหรับองค์กร', 'Enterprise Application Development'),
('SC313304', 'เครือข่ายเซ็นเซอร์ไร้สาย ', 'Wireless Sensor Networks'),
('SC313305', 'คลาวด์คอมพิวติ้งขั้นนำ', 'Introduction to Cloud Computing'),
('SC313306', 'อินเทอร์เน็ตของสรรพสิ่ง', 'Internet of Things'),
('SC313402', 'การเข้ารหัสและความมั่นคงระบบเครือข่าย', 'Cryptography and Network Security'),
('SC313403', 'ความมั่นคงสารสนเทศและไซเบอร์', 'Information and Cyber Security'),
('SC313404', 'การบริหารระบบคอมพิวเตอร์และเครือข่าย', 'Computer System and Network Administration'),
('SC313501', 'หลักภาษาโปรแกรม', 'Principles of Programming Languages'),
('SC313502', 'การออกแบบภาษาโปรแกรม', 'Programming Language Design'),
('SC313503', 'การเขียนซอฟต์แวร์อัตโนมัติ', 'Automatic Programming'),
('SC313504', 'การประกันคุณภาพซอฟต์แวร์', 'Software Quality Assurance'),
('SC313505', 'การปรับปรุงและประเมินกระบวนการซอฟต์แวร์', 'Software Process Appraisals and Improvement'),
('SC313761', 'สัมมนาทางวิทยาการคอมพิวเตอร์', 'Seminar in Computer Science'),
('SC313762', 'ระเบียบวิธีวิจัย', 'Research Methodology'),
('SC314774', 'โครงงานวิทยาการคอมพิวเตอร์ 1', 'Computer Science Project I'),
('SC314775', 'โครงงานวิทยาการคอมพิวเตอร์ 2', 'Computer Science Project II'),
('SC314785', 'สหกิจศึกษาทางวิทยาการคอมพิวเตอร', 'Co-operative Education in Computer Science'),
('SC322301', 'ตรรกะดิจิทัลและระบบฝังตัว', 'Digital Logic and Embedded Systems'),
('SC323004', 'การบริหารโครงการ', 'Project Management'),
('SC323107', 'การเป็นผู้ประกอบการเทคโนโลยีสารสนเทศ', 'Information Technology Entrepreneurship'),
('SC332002', 'ระบบสารสนเทศภูมิศาสตร์ขั้นแนะนำ ', 'Introduction to Geographic Information System'),
('SC332011', 'หลักมูลการรับรู้จากระยะไกล', 'Fundamentals of Remote Sensing'),
('SC332101', 'ภูมิสารสนเทศศาสตร์สำหรับชีวิตประจำวัน', 'Geo-informatics for Daily Life'),
('SC333302 ', 'การประยุกต์ทำแผนที่บนเว็บ', 'Web Mapping Application'),
('SC401201', 'แคลคูลัสสำหรับวิทยาศาสตร์กายภาพ 1', 'Calculus for Physical Science I'),
('SC401202', 'แคลคูลัสสำหรับวิทยาศาสตร์กายภาพ 2', 'Calculus for Physical Science II'),
('SC402101', 'พีชคณิตเชิงเส้น 1', 'Linear Algebra I'),
('SC402401 ', 'วิยุตคณิตและการประยุกต์', 'Discrete Mathematics and Applications'),
('SC403602', 'วิธีเชิงตัวเลขสำหรับวิทยาการคอมพิวเตอร์', 'Numerical Methods for Computer Science'),
('SC602005', 'ความน่าจะเป็นและสถิติ', 'Probability and Statistics');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `book_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate` float DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`book_id`, `username`, `rate`, `date`) VALUES
(103, 'nam', 4.5, '2019-10-25 16:20:05'),
(102, 'nam', 4, '2019-10-25 16:20:03'),
(85, '613020605-1', 3.5, '2019-10-25 16:19:59'),
(101, 'nam', 3.5, '2019-11-07 16:30:00'),
(98, '613020597-4', 5, '2019-10-25 16:19:54'),
(85, '613020218-8', 3.5, '2019-10-25 16:19:54'),
(100, 'nam', 3.5, '2019-11-07 16:29:22'),
(101, '613020218-8', 3, '2019-10-25 16:19:36'),
(99, 'nam', 1.5, '2019-10-25 16:19:36'),
(104, 'nam', 3.5, '2019-11-05 16:07:51'),
(95, '613020218-8', 4, '2019-10-25 16:21:00'),
(84, '613020605-1', 3.5, '2019-10-25 16:20:14'),
(95, '613020597-4', 5, '2019-10-25 16:20:15'),
(97, 'nam', 5, '2019-10-25 16:20:16'),
(86, '613020605-1', 3.5, '2019-10-25 16:20:21'),
(103, '613021002-6', 4, '2019-10-25 16:20:30'),
(96, '613020995-2', 5, '2019-10-25 16:20:22'),
(96, 'nam', 3, '2019-10-25 16:20:25'),
(94, '613020597-4', 4, '2019-10-25 16:20:27'),
(86, '613020218-8', 3.5, '2019-10-25 16:20:27'),
(87, '613020605-1', 3.5, '2019-10-25 16:20:28'),
(97, '613020992-8', 3, '2019-10-25 16:20:29'),
(88, '613020218-8', 3, '2019-10-25 16:20:36'),
(90, '613020995-2', 5, '2019-10-25 16:20:36'),
(98, 'nam', 2.5, '2019-10-25 16:20:38'),
(100, '613020992-8', 2.5, '2019-10-25 16:20:41'),
(103, '613020605-1', 4, '2019-10-25 16:20:42'),
(93, 'nam', 3, '2019-10-25 16:20:44'),
(91, '613020218-8', 4, '2019-10-25 16:20:46'),
(102, '613020605-1', 3.5, '2019-10-25 16:20:50'),
(92, '613020995-2', 4, '2019-10-25 16:20:51'),
(90, '613020597-4', 5, '2019-10-25 16:20:53'),
(92, '613020218-8', 3.5, '2019-10-25 16:21:24'),
(104, '613020238-2', 5, '2019-10-25 16:20:58'),
(104, '613020605-1', 3.5, '2019-10-25 16:20:55'),
(93, '613020992-8', 1, '2019-10-25 16:20:55'),
(99, '613021002-6', 3.5, '2019-10-25 16:20:56'),
(95, '613020995-2', 4, '2019-10-25 16:20:57'),
(88, '613020597-4', 5, '2019-10-25 16:21:43'),
(101, '613020605-1', 3.5, '2019-10-25 16:21:00'),
(100, '613020605-1', 3.5, '2019-10-25 16:21:05'),
(86, '613020597-4', 3, '2019-10-25 16:21:06'),
(98, '613020218-8', 4, '2019-10-25 16:21:08'),
(104, '613020992-8', 3, '2019-10-25 16:21:07'),
(97, '613020995-2', 4.5, '2019-10-25 16:21:10'),
(103, '613020238-2', 5, '2019-10-25 16:21:15'),
(96, '613020218-8', 3, '2019-10-25 16:21:13'),
(96, '613020580-1', 4, '2019-10-25 16:21:15'),
(103, '613020995-2', 5, '2019-10-25 16:21:17'),
(99, '613020605-1', 3.5, '2019-10-25 16:21:18'),
(96, '613021002-6', 5, '2019-10-25 16:21:23'),
(102, '613020992-8', 4, '2019-10-25 16:21:22'),
(102, '613020995-2', 4, '2019-10-25 16:21:23'),
(102, '613020238-2', 5, '2019-10-25 16:21:26'),
(95, '613020572-0', 4.5, '2019-10-25 16:21:28'),
(100, '613020995-2', 4.5, '2019-10-25 16:21:28'),
(99, '613020992-8', 3.5, '2019-10-25 16:21:31'),
(92, '613020597-4', 3, '2019-10-25 16:21:31'),
(94, '613020995-2', 5, '2019-10-25 16:21:34'),
(87, '613020218-8', 2.5, '2019-10-25 16:21:35'),
(94, '613020572-0', 4, '2019-10-25 16:21:37'),
(89, '613020597-4', 4, '2019-10-25 16:21:49'),
(103, '613020580-1', 4, '2019-10-25 16:21:38'),
(95, '613021002-6', 3.5, '2019-10-25 16:21:38'),
(96, '613020992-8', 3, '2019-10-25 16:21:39'),
(86, '613020995-2', 4, '2019-10-25 16:21:42'),
(96, '613020207-3', 4, '2019-10-25 16:21:44'),
(104, '613020029-1​', 4.5, '2019-10-25 16:21:45'),
(101, '613020580-1', 4, '2019-10-25 16:21:45'),
(90, '613021002-6', 4, '2019-10-25 16:21:48'),
(104, '613020596-6', 3.5, '2019-10-25 16:21:51'),
(92, '613020992-8', 3, '2019-10-25 16:21:52'),
(91, '613020597-4', 3, '2019-10-25 16:21:55'),
(103, '613020572-0', 3.5, '2019-10-25 16:21:55'),
(91, '613020207-3', 2.5, '2019-10-25 16:21:56'),
(103, '613020596-6', 3.5, '2019-10-25 16:21:58'),
(85, 'nam', 4, '2019-10-25 16:23:31'),
(101, '613020238-2', 5, '2019-10-25 16:21:59'),
(84, '613021002-6', 4, '2019-10-25 16:22:01'),
(98, '613020029-1​', 3.5, '2019-10-25 16:22:02'),
(90, '613020992-8', 2, '2019-10-25 16:22:10'),
(93, '613020597-4', 3, '2019-10-25 16:22:04'),
(85, '613020207-3', 4, '2019-10-25 16:22:06'),
(99, '613020580-1', 3, '2019-10-25 16:22:09'),
(88, '613021002-6', 3.5, '2019-10-25 16:22:11'),
(104, '613020572-0', 4.5, '2019-10-25 16:22:13'),
(102, '613020207-3', 3.5, '2019-10-25 16:22:15'),
(99, '613020238-2', 4.5, '2019-10-25 16:22:15'),
(90, '613020029-1​', 4.5, '2019-10-25 16:23:03'),
(87, '613020992-8', 3, '2019-10-25 16:22:25'),
(104, '613020207-3', 3, '2019-10-25 16:22:25'),
(85, '613021002-6', 3, '2019-10-25 16:22:33'),
(98, '613020238-2', 5, '2019-10-25 16:22:40'),
(98, '613020207-3', 3.5, '2019-10-25 16:22:36'),
(82, '613020580-1', 3.5, '2019-10-25 16:22:41'),
(95, '613020207-3', 4, '2019-10-25 16:22:45'),
(97, '613020238-2', 5, '2019-10-25 16:22:49'),
(101, '613020572-0', 4, '2019-10-25 16:22:52'),
(93, '613020207-3', 3, '2019-10-25 16:22:53'),
(101, '613021002-6', 4.5, '2019-10-25 16:22:55'),
(93, '613020238-2', 5, '2019-10-25 16:22:55'),
(95, '613020596-6', 4.5, '2019-10-25 16:22:56'),
(90, '613020207-3', 2.5, '2019-10-25 16:23:01'),
(92, '613020238-2', 5, '2019-10-25 16:23:03'),
(89, '613020207-3', 4, '2019-10-25 16:23:08'),
(96, '613020572-0', 4.5, '2019-10-25 16:23:11'),
(90, '613020596-6', 5, '2019-10-25 16:23:17'),
(88, '613020238-2', 5, '2019-10-25 16:23:21'),
(102, '613021002-6', 4, '2019-10-25 16:23:31'),
(92, '613020580-1', 4, '2019-10-25 16:23:34'),
(90, '613020572-0', 4.5, '2019-10-25 16:23:47'),
(101, '613020596-6', 3, '2019-10-25 16:24:35'),
(85, '613020580-1', 4, '2019-10-25 16:24:46'),
(100, '613020596-6', 3.5, '2019-10-25 16:24:44'),
(98, '613020596-6', 4, '2019-10-25 16:24:52'),
(96, '613020596-6', 4.5, '2019-10-25 16:24:58'),
(88, '613020596-6', 4, '2019-10-25 16:25:08'),
(86, '613020572-0', 3, '2019-10-25 16:25:11'),
(85, '613020596-6', 3.5, '2019-10-25 16:25:15'),
(104, '613020230-8', 3.5, '2019-10-25 16:25:21'),
(84, '613020572-0', 4, '2019-10-25 16:25:22'),
(94, '613020580-1', 3.5, '2019-10-25 16:25:23'),
(103, '613020230-8', 4, '2019-10-25 16:25:30'),
(93, '613020572-0', 2, '2019-10-25 16:25:35'),
(100, '613020029-1​', 5, '2019-10-25 16:25:38'),
(102, '613020230-8', 3.5, '2019-10-25 16:25:39'),
(100, '613020580-1', 3.5, '2019-10-25 16:25:48'),
(101, '613020230-8', 4, '2019-10-25 16:25:52'),
(100, '613020230-8', 4, '2019-10-25 16:25:57'),
(104, '613020580-1', 3.5, '2019-10-25 16:26:02'),
(99, '613020230-8', 4, '2019-10-25 16:26:05'),
(102, '613020580-1', 4, '2019-10-25 16:26:15'),
(98, '613020230-8', 4, '2019-10-25 16:26:15'),
(94, '613020029-1​', 4, '2019-10-25 16:26:18'),
(97, '613020230-8', 4, '2019-10-25 16:26:25'),
(92, '613020029-1​', 3.5, '2019-10-25 16:26:28'),
(96, '613020230-8', 4, '2019-10-25 16:26:29'),
(95, '613020230-8', 4, '2019-10-25 16:26:37'),
(96, '613020029-1​', 4, '2019-10-25 16:27:37'),
(95, '613020029-1​', 4.5, '2019-10-25 16:27:49'),
(87, '613020029-1​', 4.5, '2019-10-25 16:28:15'),
(84, '613020029-1​', 5, '2019-10-25 16:29:14'),
(86, '613021122-6', 4.5, '2019-10-29 13:58:26'),
(99, '613020032-2', 4.5, '2019-10-29 16:02:55'),
(94, '613021054-7', 3, '2019-10-29 13:58:51'),
(104, '613020646-7', 3.5, '2019-10-29 13:58:51'),
(97, '613021054-7', 3, '2019-10-29 13:58:59'),
(99, '613020646-7', 4.5, '2019-10-29 13:59:12'),
(100, '613020646-7', 5, '2019-10-29 13:59:08'),
(99, '613021054-7', 3.5, '2019-10-29 13:59:06'),
(102, '593021591-7', 3.5, '2019-10-29 13:59:10'),
(100, '613020032-2', 4.5, '2019-10-29 16:02:48'),
(92, '613021054-7', 3.5, '2019-10-29 13:59:14'),
(100, '613021054-7', 4, '2019-10-29 13:59:22'),
(97, '613020646-7', 4.5, '2019-10-29 13:59:23'),
(98, '613020646-7', 4.5, '2019-10-29 13:59:30'),
(84, '613021054-7', 4.5, '2019-10-29 13:59:32'),
(32, '613021054-7', 4, '2019-10-29 13:59:37'),
(94, '613020646-7', 3.5, '2019-10-29 13:59:39'),
(103, '613021009-2', 5, '2019-10-29 16:02:44'),
(88, '613020646-7', 4.5, '2019-10-29 13:59:47'),
(13, '613021054-7', 4, '2019-10-29 13:59:49'),
(101, '613020646-7', 4.5, '2019-10-29 13:59:54'),
(103, '593021591-7', 5, '2019-10-29 13:59:54'),
(101, '613020032-2', 5, '2019-10-29 16:02:43'),
(87, '613020646-7', 4.5, '2019-10-29 13:59:59'),
(102, '613020032-2', 5, '2019-10-29 16:02:36'),
(86, '613020646-7', 4.5, '2019-10-29 14:00:08'),
(104, '613021000-0', 4, '2019-10-29 16:02:33'),
(87, '593021591-7', 4, '2019-10-29 14:00:14'),
(92, '613021122-6', 5, '2019-10-29 14:00:18'),
(103, '613020032-2', 4.5, '2019-10-29 16:02:26'),
(96, '593021591-7', 4.5, '2019-10-29 14:00:25'),
(85, '613021054-7', 3.5, '2019-10-29 14:00:28'),
(94, 'patiphan', 4, '2019-10-29 14:00:29'),
(104, '613020599-0', 4.5, '2019-10-29 16:02:32'),
(101, '613021122-6', 5, '2019-10-29 14:00:35'),
(104, '613020032-2', 5, '2019-10-29 16:01:55'),
(102, '613021054-7', 4, '2019-10-29 14:00:39'),
(95, '593021591-7', 4, '2019-10-29 14:00:42'),
(87, 'patiphan', 5, '2019-10-29 14:00:43'),
(102, '613020250-2', 4.5, '2019-11-04 18:53:37'),
(101, '613021054-7', 4, '2019-10-29 14:00:48'),
(93, '593021591-7', 4, '2019-10-29 14:00:56'),
(91, '613021122-6', 5, '2019-10-29 14:01:00'),
(90, '613021054-7', 3.5, '2019-10-29 14:01:09'),
(102, '613021122-6', 5, '2019-10-29 14:01:10'),
(90, '593021591-7', 4, '2019-10-29 14:01:11'),
(85, '613021122-6', 5, '2019-10-29 14:01:20'),
(86, 'patiphan', 4, '2019-10-29 14:01:21'),
(91, '593021591-7', 3.5, '2019-10-29 14:01:24'),
(84, '613021122-6', 5, '2019-10-29 14:01:31'),
(101, 'patiphan', 4.5, '2019-10-29 14:01:35'),
(94, '613021051-3', 3.5, '2019-10-29 14:01:39'),
(89, '593021591-7', 3, '2019-10-29 14:01:42'),
(88, '613021122-6', 5, '2019-10-29 14:01:45'),
(94, '613020647-5', 4.5, '2019-10-29 14:01:54'),
(85, '593021591-7', 4, '2019-10-29 14:01:57'),
(103, '613021122-6', 4.5, '2019-10-29 14:01:58'),
(89, '613021122-6', 5, '2019-10-29 14:02:14'),
(84, 'patiphan', 4, '2019-10-29 14:02:34'),
(90, '613021051-3', 3, '2019-10-29 14:02:38'),
(96, '613020647-5', 4.5, '2019-10-29 14:02:56'),
(85, '613020647-5', 3.5, '2019-10-29 14:03:11'),
(103, '613021051-3', 4, '2019-10-29 14:03:26'),
(103, 'patiphan', 5, '2019-10-29 14:03:26'),
(90, '613020647-5', 4.5, '2019-10-29 14:03:46'),
(85, 'patiphan', 3, '2019-10-29 14:03:47'),
(101, '613021051-3', 3.5, '2019-10-29 14:03:51'),
(98, '613021051-3', 4, '2019-10-29 14:04:06'),
(91, 'patiphan', 3.5, '2019-10-29 14:04:05'),
(82, 'patiphan', 4.5, '2019-10-29 14:04:11'),
(89, 'patiphan', 4, '2019-10-29 14:04:25'),
(101, '613020647-5', 4.5, '2019-10-29 14:04:28'),
(84, '613021051-3', 4, '2019-10-29 14:04:37'),
(96, 'patiphan', 4.5, '2019-10-29 14:04:38'),
(88, '613020647-5', 4.5, '2019-10-29 14:04:40'),
(87, '613020647-5', 3, '2019-10-29 14:05:06'),
(85, '613021051-3', 4, '2019-10-29 14:05:29'),
(92, '613020647-5', 4, '2019-10-29 14:05:27'),
(84, '613020647-5', 4, '2019-10-29 14:05:39'),
(96, '613021051-3', 3.5, '2019-10-29 14:06:01'),
(32, '613020647-5', 3, '2019-10-29 14:06:19'),
(100, '613021051-3', 3.5, '2019-10-29 14:06:44'),
(100, '613020647-5', 3.5, '2019-10-29 14:06:48'),
(92, '613021051-3', 4, '2019-10-29 14:07:09'),
(103, '613020599-0', 4.5, '2019-10-29 16:03:06'),
(98, '613020032-2', 4.5, '2019-10-29 16:03:11'),
(102, '613020205-7', 4.5, '2019-10-29 16:03:13'),
(102, 'natnarinmuii09@gmail.com', 5, '2019-10-29 16:03:14'),
(103, '613020569-9', 4.5, '2019-10-29 16:03:17'),
(97, '613020032-2', 5, '2019-10-29 16:03:24'),
(96, '613020032-2', 4.5, '2019-10-29 16:03:32'),
(103, '613020205-7', 4, '2019-10-29 16:03:33'),
(102, '613021001-8', 4.5, '2019-10-29 16:03:36'),
(102, '613020599-0', 4, '2019-10-29 16:03:40'),
(95, '613020032-2', 5, '2019-10-29 16:03:40'),
(103, '613021000-0', 4, '2019-10-29 16:03:40'),
(102, '613021000-0', 4.5, '2019-10-29 16:03:46'),
(101, '613020599-0', 4, '2019-10-29 16:03:49'),
(94, '613020205-7', 5, '2019-10-29 16:03:55'),
(103, '613021010-7', 3.5, '2019-10-29 16:03:56'),
(100, '613020599-0', 4, '2019-10-29 16:03:56'),
(101, '613021000-0', 5, '2019-10-29 16:04:00'),
(95, '613020205-7', 4, '2019-10-29 16:04:02'),
(99, '613020599-0', 5, '2019-10-29 16:04:03'),
(88, 'natnarinmuii09@gmail.com', 4, '2019-10-29 16:04:11'),
(90, '613020205-7', 4, '2019-10-29 16:04:12'),
(98, '613020599-0', 4.5, '2019-10-29 16:04:13'),
(97, '613020599-0', 4.5, '2019-10-29 16:04:18'),
(100, '613020222-7', 4, '2019-10-29 16:04:20'),
(101, '613020570-4', 3.5, '2019-10-29 16:04:37'),
(96, '613020599-0', 4.5, '2019-10-29 16:04:23'),
(91, '613020205-7', 4, '2019-10-29 16:04:25'),
(100, '613021000-0', 4.5, '2019-10-29 16:04:26'),
(95, '613020599-0', 4.5, '2019-10-29 16:04:30'),
(88, '613020205-7', 4.5, '2019-10-29 16:04:32'),
(99, '613021000-0', 4, '2019-10-29 16:04:33'),
(102, '613020199-6', 3.5, '2019-10-29 16:04:36'),
(102, '613021010-7', 4, '2019-10-29 16:04:38'),
(96, '613020205-7', 5, '2019-10-29 16:04:38'),
(98, '613021000-0', 4.5, '2019-10-29 16:04:40'),
(101, '613020205-7', 4, '2019-10-29 16:04:44'),
(97, '613021000-0', 4.5, '2019-10-29 16:04:45'),
(101, '613020199-6', 4.5, '2019-10-29 16:04:46'),
(100, '613020205-7', 4, '2019-10-29 16:04:50'),
(96, '613021000-0', 4.5, '2019-10-29 16:04:50'),
(94, '613021000-0', 4.5, '2019-10-29 16:05:06'),
(98, '613020199-6', 4, '2019-10-29 16:05:08'),
(85, 'natnarinmuii09@gmail.com', 4, '2019-10-29 16:05:20'),
(97, '613020199-6', 4, '2019-10-29 16:05:13'),
(102, '613020222-7', 4.5, '2019-10-29 16:05:16'),
(96, '613020199-6', 4.5, '2019-10-29 16:05:20'),
(102, '613021006-8', 3.5, '2019-10-29 16:05:25'),
(102, '613020570-4', 4, '2019-10-29 16:05:26'),
(96, '613021001-8', 3, '2019-10-29 16:05:27'),
(90, '613020199-6', 4.5, '2019-10-29 16:05:29'),
(94, '613020997-8', 4, '2019-10-29 16:05:30'),
(103, '613020570-4', 3.5, '2019-10-29 16:05:34'),
(88, '613020199-6', 4.5, '2019-10-29 16:05:39'),
(104, '613020570-4', 2.5, '2019-10-29 16:05:43'),
(87, 'natnarinmuii09@gmail.com', 3, '2019-10-29 16:05:45'),
(99, '613021004-2', 4, '2019-10-29 16:05:46'),
(84, '613020199-6', 4.5, '2019-10-29 16:05:48'),
(100, '613020569-9', 4.5, '2019-10-29 16:07:01'),
(85, '613021006-8', 5, '2019-10-29 16:06:02'),
(97, '613021009-2', 3.5, '2019-10-29 16:06:11'),
(100, '613020570-4', 3, '2019-10-29 16:05:52'),
(87, '613020199-6', 4.5, '2019-10-29 16:05:57'),
(92, '613020997-8', 4, '2019-10-29 16:05:59'),
(95, '613021004-2', 5, '2019-10-29 16:05:59'),
(95, '613020222-7', 4, '2019-10-29 16:06:01'),
(99, '613020570-4', 3.5, '2019-10-29 16:06:03'),
(94, '613021004-2', 5, '2019-10-29 16:06:05'),
(84, 'natnarinmuii09@gmail.com', 5, '2019-10-29 16:06:10'),
(103, '613021006-8', 3.5, '2019-10-29 16:06:11'),
(91, '613021004-2', 4, '2019-10-29 16:06:12'),
(98, '613020570-4', 4, '2019-10-29 16:06:15'),
(91, '613020199-6', 4.5, '2019-10-29 16:06:15'),
(88, '613021004-2', 5, '2019-10-29 16:06:17'),
(97, '613020570-4', 4, '2019-10-29 16:06:22'),
(84, '613021004-2', 4.5, '2019-10-29 16:06:26'),
(96, '613020570-4', 4, '2019-10-29 16:06:32'),
(96, '613021004-2', 3.5, '2019-10-29 16:06:36'),
(31, 'natnarinmuii09@gmail.com', 3, '2019-10-29 16:06:51'),
(96, '613021006-8', 3.5, '2019-10-29 16:06:39'),
(91, '613020222-7', 4.5, '2019-10-29 16:06:43'),
(95, '613021006-8', 3, '2019-10-29 16:08:46'),
(93, '613021004-2', 4, '2019-10-29 16:06:44'),
(95, '613020570-4', 4, '2019-10-29 16:06:46'),
(89, '613021004-2', 4, '2019-10-29 16:06:53'),
(87, '613021001-8', 3.5, '2019-10-29 16:06:56'),
(99, '613021010-7', 2.5, '2019-10-29 16:07:15'),
(102, '613021004-2', 4, '2019-10-29 16:07:21'),
(88, '613020222-7', 4.5, '2019-10-29 16:07:22'),
(100, 'natnarinmuii09@gmail.com', 3, '2019-10-29 16:07:23'),
(82, 'natnarinmuii09@gmail.com', 5, '2019-10-29 16:07:36'),
(97, '613021010-7', 2, '2019-10-29 16:07:36'),
(99, '613021001-8', 3.5, '2019-10-29 16:07:38'),
(59, '613020997-8', 5, '2019-10-29 16:07:58'),
(91, '613020570-4', 4, '2019-10-29 16:07:52'),
(85, '613020222-7', 4.5, '2019-10-29 16:07:57'),
(95, 'natnarinmuii09@gmail.com', 5, '2019-10-29 16:07:59'),
(88, '613021009-2', 3, '2019-10-29 16:11:31'),
(86, '613021006-8', 3, '2019-10-29 16:08:15'),
(84, '613020222-7', 5, '2019-10-29 16:08:23'),
(103, '613020997-8', 4.5, '2019-10-29 16:08:25'),
(94, '613020569-9', 4.5, '2019-10-29 16:09:18'),
(101, '613020997-8', 4.5, '2019-10-29 16:08:34'),
(96, 'natnarinmuii09@gmail.com', 5, '2019-10-29 16:08:47'),
(89, '613020222-7', 4, '2019-10-29 16:08:46'),
(90, '613020222-7', 4.5, '2019-10-29 16:08:53'),
(95, '613021001-8', 4, '2019-10-29 16:08:54'),
(93, '613020997-8', 4.5, '2019-10-29 16:08:55'),
(93, '613020222-7', 4, '2019-10-29 16:09:01'),
(88, '613020997-8', 4.5, '2019-10-29 16:09:04'),
(84, '613020997-8', 4.5, '2019-10-29 16:09:10'),
(88, '613021006-8', 2.5, '2019-10-29 16:09:16'),
(104, 'natnarinmuii09@gmail.com', 2, '2019-10-29 16:09:19'),
(85, '613020997-8', 5, '2019-10-29 16:09:20'),
(99, 'natnarinmuii09@gmail.com', 4, '2019-10-29 16:09:29'),
(91, '613020997-8', 4.5, '2019-10-29 16:09:39'),
(82, '613020997-8', 5, '2019-10-29 16:09:47'),
(103, '613020983-9', 5, '2019-10-29 16:09:54'),
(102, '613020983-9', 5, '2019-10-29 16:10:01'),
(89, '613020997-8', 4.5, '2019-10-29 16:10:01'),
(101, '613020983-9', 5, '2019-10-29 16:10:10'),
(95, '613021010-7', 3, '2019-10-29 16:10:13'),
(94, '613021010-7', 3.5, '2019-10-29 16:10:19'),
(100, '613020983-9', 5, '2019-10-29 16:10:33'),
(99, '613020983-9', 4.5, '2019-10-29 16:10:38'),
(95, '613021009-2', 3, '2019-10-29 16:10:43'),
(88, '613021001-8', 2.5, '2019-10-29 16:10:45'),
(104, '613020983-9', 5, '2019-10-29 16:10:46'),
(93, '613021006-8', 3.5, '2019-10-29 16:10:47'),
(97, '613020569-9', 4.5, '2019-10-29 16:10:48'),
(93, '613021009-2', 4, '2019-10-29 16:10:52'),
(91, '613021006-8', 3, '2019-10-29 16:10:56'),
(86, '613021001-8', 4, '2019-10-29 16:10:57'),
(96, '613020983-9', 5, '2019-10-29 16:10:57'),
(95, '613020569-9', 5, '2019-10-29 16:10:58'),
(90, '613021009-2', 3, '2019-10-29 16:11:03'),
(97, '613020983-9', 5, '2019-10-29 16:11:03'),
(90, '613020569-9', 5, '2019-10-29 16:11:06'),
(90, '613021010-7', 4, '2019-10-29 16:11:07'),
(98, '613020983-9', 5, '2019-10-29 16:11:07'),
(89, '613021001-8', 3.5, '2019-10-29 16:11:08'),
(91, '613021009-2', 2.5, '2019-10-29 16:11:11'),
(89, '613021006-8', 3, '2019-10-29 16:11:13'),
(88, '613020569-9', 4.5, '2019-10-29 16:11:13'),
(94, '613020983-9', 5, '2019-10-29 16:11:14'),
(92, '613021001-8', 4, '2019-10-29 16:11:18'),
(85, '613020569-9', 5, '2019-10-29 16:11:21'),
(86, '613020569-9', 5, '2019-10-29 16:11:26'),
(84, '613020569-9', 5, '2019-10-29 16:11:32'),
(103, '613021001-8', 3.5, '2019-10-29 16:11:35'),
(84, '613021009-2', 3.5, '2019-10-29 16:11:42'),
(86, '613021009-2', 2.5, '2019-10-29 16:11:49'),
(104, '613021010-7', 3, '2019-10-29 16:11:49'),
(92, '613021009-2', 2, '2019-10-29 16:11:58'),
(96, '613021010-7', 4, '2019-10-29 16:12:52'),
(100, '613021010-7', 4, '2019-10-29 16:13:20'),
(104, 'Nattarika ', 3.5, '2019-10-31 15:04:58'),
(103, 'Nattarika ', 5, '2019-10-31 15:05:16'),
(91, 'Nattarika ', 5, '2019-10-31 15:05:40'),
(101, 'Nattarika ', 3.5, '2019-10-31 15:05:52'),
(102, 'Nattarika ', 4.5, '2019-10-31 15:06:21'),
(97, 'Nattarika ', 5, '2019-10-31 15:06:38'),
(98, 'Nattarika ', 4, '2019-10-31 15:06:46'),
(96, 'Nattarika ', 5, '2019-10-31 15:06:57'),
(99, 'Nattarika ', 5, '2019-10-31 15:07:07'),
(100, 'Nattarika ', 4.5, '2019-10-31 15:07:37'),
(104, '622222222-2', 5, '2019-10-31 16:15:05'),
(103, '613020601-9', 4, '2019-10-31 16:16:52'),
(98, '613020210-4', 4, '2019-10-31 16:14:39'),
(96, '613020213-8', 3.5, '2019-10-31 16:14:39'),
(97, '613020608-5', 5, '2019-10-31 16:15:20'),
(89, '613020213-8', 3, '2019-10-31 16:15:30'),
(94, '613020601-9', 5, '2019-10-31 16:15:34'),
(85, '613020213-8', 3.5, '2019-10-31 16:15:37'),
(104, '613020210-4', 4, '2019-10-31 16:15:37'),
(104, '613020224-3', 4.5, '2019-10-31 16:16:09'),
(88, '613020213-8', 5, '2019-10-31 16:15:44'),
(102, '613020574-6', 5, '2019-10-31 16:15:45'),
(97, '613020601-9', 3.5, '2019-10-31 16:15:47'),
(103, '622222222-2', 3.5, '2019-10-31 16:15:52'),
(104, '613020606-9', 3.5, '2019-10-31 16:18:14'),
(103, '613020986-3', 4, '2019-10-31 16:15:58'),
(102, '622222222-2', 5, '2019-10-31 16:15:59'),
(103, '613020210-4', 4, '2019-10-31 16:16:02'),
(103, '613020224-3', 4.5, '2019-10-31 16:16:03'),
(101, '613021008-4', 4.5, '2019-10-31 16:21:50'),
(104, '613020236-6', 3.5, '2019-10-31 16:16:07'),
(102, '613020210-4', 4.5, '2019-10-31 16:16:10'),
(104, '613020990-2', 3.5, '2019-10-31 16:16:10'),
(102, '613020224-3', 5, '2019-10-31 16:16:15'),
(104, '613020203-1', 3.5, '2019-10-31 16:16:15'),
(13, '613020601-9', 4.5, '2019-10-31 16:16:17'),
(101, '613020210-4', 4, '2019-10-31 16:16:17'),
(104, '613020204-9', 3.5, '2019-10-31 16:16:19'),
(103, '613020236-6', 3, '2019-10-31 16:16:23'),
(103, '613020203-1', 4, '2019-10-31 16:16:23'),
(100, '613020210-4', 5, '2019-10-31 16:16:24'),
(101, '613020224-3', 4, '2019-10-31 16:16:25'),
(102, '613020203-1', 4.5, '2019-10-31 16:16:27'),
(103, '613020990-2', 2, '2019-10-31 16:16:28'),
(100, '613020224-3', 5, '2019-10-31 16:16:29'),
(99, '613020210-4', 4, '2019-10-31 16:16:31'),
(104, '613020608-5', 4.5, '2019-10-31 16:16:32'),
(91, '613020601-9', 4, '2019-10-31 16:16:35'),
(101, '613020203-1', 3, '2019-10-31 16:16:33'),
(99, '613020224-3', 4, '2019-10-31 16:16:34'),
(102, '613020990-2', 4, '2019-10-31 16:16:34'),
(102, '613020236-6', 4, '2019-10-31 16:16:34'),
(100, '613020203-1', 4.5, '2019-10-31 16:16:38'),
(13, '613020213-8', 4.5, '2019-10-31 16:16:40'),
(103, '613020204-9', 4.5, '2019-10-31 16:16:43'),
(99, '613020203-1', 3.5, '2019-10-31 16:16:44'),
(101, '613020236-6', 3.5, '2019-10-31 16:16:47'),
(97, '613020210-4', 4.5, '2019-10-31 16:16:48'),
(103, '613020608-5', 4, '2019-10-31 16:16:54'),
(97, '613020224-3', 5, '2019-10-31 16:16:54'),
(100, '613020236-6', 3.5, '2019-10-31 16:16:54'),
(101, '613020990-2', 4, '2019-10-31 16:16:55'),
(98, '613020203-1', 3, '2019-10-31 16:16:56'),
(96, '613020210-4', 4, '2019-10-31 16:16:57'),
(102, '613020608-5', 4.5, '2019-10-31 16:16:58'),
(100, '613020990-2', 5, '2019-10-31 16:16:59'),
(97, '613020203-1', 4, '2019-10-31 16:17:01'),
(98, '613020224-3', 4, '2019-10-31 16:17:01'),
(99, '613020236-6', 4, '2019-10-31 16:17:01'),
(99, '613020990-2', 2.5, '2019-10-31 16:17:03'),
(100, '613020608-5', 4, '2019-10-31 16:17:04'),
(102, '613020232-4', 4, '2019-10-31 16:17:05'),
(95, '613020210-4', 4.5, '2019-10-31 16:17:05'),
(96, '613020203-1', 4.5, '2019-10-31 16:17:05'),
(101, '613020204-9', 4, '2019-10-31 16:17:06'),
(32, '613020213-8', 4.5, '2019-10-31 16:17:07'),
(101, '613020608-5', 5, '2019-10-31 16:17:09'),
(98, '613020990-2', 1, '2019-10-31 16:17:10'),
(104, '613020574-6', 2.5, '2019-10-31 16:17:10'),
(96, '613020224-3', 5, '2019-10-31 16:17:11'),
(95, '613020203-1', 3.5, '2019-10-31 16:17:13'),
(99, '613020608-5', 5, '2019-10-31 16:17:13'),
(98, '613020236-6', 3.5, '2019-10-31 16:17:17'),
(97, '613020990-2', 4, '2019-10-31 16:17:14'),
(95, '613020224-3', 4.5, '2019-10-31 16:17:17'),
(96, '613020990-2', 3, '2019-10-31 16:17:19'),
(104, '613020601-9', 4, '2019-10-31 16:17:20'),
(103, '613020574-6', 3, '2019-10-31 16:17:24'),
(94, '613020608-5', 5, '2019-10-31 16:17:24'),
(96, '613020204-9', 4.5, '2019-10-31 16:17:26'),
(94, '613020990-2', 4, '2019-10-31 16:17:26'),
(96, '613020232-4', 3.5, '2019-10-31 16:17:27'),
(97, '613020236-6', 4, '2019-10-31 16:17:30'),
(98, '613020601-9', 4.5, '2019-10-31 16:17:32'),
(93, '613020608-5', 5, '2019-10-31 16:17:34'),
(96, '613020236-6', 5, '2019-10-31 16:17:35'),
(94, '613020204-9', 4.5, '2019-10-31 16:17:35'),
(90, '613020232-4', 5, '2019-10-31 16:17:37'),
(96, '613020601-9', 4, '2019-10-31 16:17:38'),
(101, '613020574-6', 3.5, '2019-10-31 16:17:39'),
(59, '613020213-8', 4, '2019-10-31 16:17:43'),
(95, '613020236-6', 5, '2019-10-31 16:17:44'),
(95, '613020608-5', 5, '2019-10-31 16:17:44'),
(90, '613020204-9', 4, '2019-10-31 16:17:45'),
(95, '613020601-9', 5, '2019-10-31 16:17:45'),
(88, '613020232-4', 4.5, '2019-10-31 16:17:47'),
(100, '613020574-6', 4, '2019-10-31 16:17:49'),
(88, '613020204-9', 5, '2019-10-31 16:17:51'),
(93, '613020601-9', 4.5, '2019-10-31 16:17:52'),
(87, '613020232-4', 5, '2019-10-31 16:17:54'),
(99, '613020574-6', 4, '2019-10-31 16:17:57'),
(85, '613020232-4', 4, '2019-10-31 16:18:00'),
(92, '613020601-9', 4, '2019-10-31 16:18:00'),
(98, '613020574-6', 4, '2019-10-31 16:18:04'),
(85, '613020204-9', 4.5, '2019-10-31 16:18:04'),
(97, '613020574-6', 4, '2019-10-31 16:18:10'),
(101, '613020232-4', 4.5, '2019-10-31 16:18:11'),
(104, '613020607-7', 4.5, '2019-10-31 16:18:12'),
(87, '613020204-9', 3.5, '2019-10-31 16:18:15'),
(96, '613020574-6', 4, '2019-10-31 16:18:17'),
(104, '613020232-4', 4, '2019-10-31 16:18:18'),
(92, '613020204-9', 4, '2019-10-31 16:18:24'),
(98, '613020232-4', 5, '2019-10-31 16:18:24'),
(94, '613020574-6', 5, '2019-10-31 16:18:27'),
(97, '613020232-4', 5, '2019-10-31 16:18:28'),
(103, '613020607-7', 4, '2019-10-31 16:18:29'),
(103, '613020606-9', 4, '2019-10-31 16:18:32'),
(102, '613020607-7', 3.5, '2019-10-31 16:18:35'),
(96, '613020986-3', 4, '2019-10-31 16:18:38'),
(102, '613020606-9', 3, '2019-10-31 16:18:40'),
(101, '613020607-7', 4.5, '2019-10-31 16:18:41'),
(97, '613020213-8', 5, '2019-10-31 16:18:45'),
(100, '613020607-7', 5, '2019-10-31 16:18:47'),
(101, '613020606-9', 4, '2019-10-31 16:18:47'),
(98, '613020986-3', 4, '2019-10-31 16:18:48'),
(99, '613020607-7', 3, '2019-10-31 16:18:53'),
(95, '613020213-8', 2.5, '2019-10-31 16:18:53'),
(100, '613020606-9', 3, '2019-10-31 16:18:55'),
(98, '613020213-8', 1.5, '2019-10-31 16:18:59'),
(90, '613020213-8', 4.5, '2019-10-31 16:19:04'),
(99, '613020606-9', 5, '2019-10-31 16:19:05'),
(96, '613020607-7', 4.5, '2019-10-31 16:19:07'),
(97, '613020986-3', 4, '2019-10-31 16:19:07'),
(92, '613020213-8', 5, '2019-10-31 16:19:10'),
(98, '613020606-9', 4, '2019-10-31 16:19:13'),
(94, '613020986-3', 4, '2019-10-31 16:19:16'),
(87, '613020213-8', 5, '2019-10-31 16:19:21'),
(97, '613020606-9', 4, '2019-10-31 16:19:23'),
(95, '613020986-3', 4, '2019-10-31 16:19:23'),
(94, '613020607-7', 3.5, '2019-10-31 16:19:27'),
(90, '613020986-3', 4, '2019-10-31 16:19:31'),
(90, '613020606-9', 5, '2019-10-31 16:19:33'),
(91, '613020986-3', 4, '2019-10-31 16:19:38'),
(85, '613020607-7', 4, '2019-10-31 16:19:39'),
(104, '613020220-1', 3.5, '2019-10-31 16:19:42'),
(92, '613020986-3', 4, '2019-10-31 16:19:44'),
(84, '613020606-9', 5, '2019-10-31 16:19:45'),
(84, '613020607-7', 0.5, '2019-10-31 16:19:50'),
(99, '613020220-1', 5, '2019-10-31 16:19:59'),
(89, '613020986-3', 4, '2019-10-31 16:19:55'),
(84, '613020986-3', 4, '2019-10-31 16:20:12'),
(100, '613020220-1', 4, '2019-10-31 16:20:13'),
(87, '613020220-1', 4, '2019-10-31 16:21:03'),
(86, '613020220-1', 4.5, '2019-10-31 16:20:55'),
(102, '613021008-4', 4, '2019-10-31 16:21:08'),
(96, '613021008-4', 4, '2019-10-31 16:21:15'),
(95, '613021008-4', 4, '2019-10-31 16:21:20'),
(95, '613020220-1', 4.5, '2019-10-31 16:21:36'),
(88, '613021008-4', 4, '2019-10-31 16:21:33'),
(89, '613021008-4', 4, '2019-10-31 16:21:40'),
(104, '613021008-4', 4.5, '2019-10-31 16:21:56'),
(103, '613021008-4', 5, '2019-10-31 16:22:01'),
(84, '613020220-1', 4.5, '2019-10-31 16:22:06'),
(94, '613021008-4', 3.5, '2019-10-31 16:22:11'),
(90, '613021008-4', 4, '2019-10-31 16:22:18'),
(32, '613020220-1', 4.5, '2019-10-31 16:22:23'),
(25, '613020220-1', 2.5, '2019-10-31 16:22:41'),
(23, '613020220-1', 3, '2019-10-31 16:23:05'),
(87, '613020986-3', 4.5, '2019-10-31 16:25:15'),
(93, '613020986-3', 4.5, '2019-10-31 16:25:44'),
(102, '613020220-1', 4, '2019-10-31 16:26:17'),
(90, '613020220-1', 4, '2019-10-31 16:26:39'),
(98, '613020220-1', 4, '2019-10-31 16:27:22'),
(103, '613020250-2', 5, '2019-11-04 18:53:31'),
(104, '613020217-0', 5, '2019-11-01 16:16:18'),
(104, '613020200-7', 3, '2019-11-01 16:16:21'),
(104, '613020991-0', 5, '2019-11-01 16:16:22'),
(103, '613020200-7', 3, '2019-11-01 16:16:26'),
(103, '613020217-0', 5, '2019-11-01 16:16:28'),
(102, '613020200-7', 2, '2019-11-01 16:16:32'),
(101, '613020200-7', 3, '2019-11-01 16:16:38'),
(102, '613020217-0', 5, '2019-11-01 16:16:38'),
(103, '613020991-0', 5, '2019-11-01 16:16:39'),
(100, '613020200-7', 2.5, '2019-11-01 16:16:42'),
(104, '613020250-2', 5, '2019-11-04 18:53:25'),
(96, '599999999-9', 5, '2019-11-01 16:16:46'),
(99, '613020200-7', 3, '2019-11-01 16:16:47'),
(102, '613020991-0', 5, '2019-11-01 16:16:48'),
(103, '613020994-4', 4, '2019-11-01 16:16:48'),
(101, '613020217-0', 5, '2019-11-01 16:16:51'),
(94, '599999999-9', 4, '2019-11-01 16:16:49'),
(95, '599999999-9', 4.5, '2019-11-01 16:16:53'),
(93, '599999999-9', 4, '2019-11-01 16:16:56'),
(101, '613020991-0', 3.5, '2019-11-01 16:16:59'),
(92, '599999999-9', 4, '2019-11-01 16:17:00'),
(100, '613020217-0', 5, '2019-11-01 16:17:00'),
(96, '613020994-4', 4.5, '2019-11-01 16:17:01'),
(98, '613020200-7', 2.5, '2019-11-01 16:17:04'),
(91, '599999999-9', 5, '2019-11-01 16:17:02'),
(104, '613020598-2​', 5, '2019-11-01 16:17:02'),
(90, '599999999-9', 3.5, '2019-11-01 16:17:05'),
(100, '613020991-0', 5, '2019-11-01 16:17:06'),
(99, '613020217-0', 5, '2019-11-01 16:17:11'),
(97, '613020200-7', 3, '2019-11-01 16:17:12'),
(104, '613020225-1', 5, '2019-11-01 16:17:13'),
(96, '613020200-7', 3, '2019-11-01 16:17:17'),
(96, '613020217-0', 5, '2019-11-01 16:17:25'),
(95, '613020200-7', 3, '2019-11-01 16:17:23'),
(95, '613020991-0', 4.5, '2019-11-01 16:17:30'),
(103, '613020225-1', 5, '2019-11-01 16:17:32'),
(103, '613020598-2​', 5, '2019-11-01 16:17:34'),
(101, '613020994-4', 5, '2019-11-01 16:17:40'),
(97, '613020217-0', 5, '2019-11-01 16:17:43'),
(101, '613020225-1', 5, '2019-11-01 16:17:50'),
(90, '613020991-0', 5, '2019-11-01 16:17:51'),
(81, '613020994-4', 3, '2019-11-01 16:17:57'),
(98, '613020217-0', 5, '2019-11-01 16:17:59'),
(102, '613020598-2​', 5, '2019-11-01 16:18:01'),
(96, '613020225-1', 5, '2019-11-01 16:18:06'),
(58, '613020994-4', 4, '2019-11-01 16:18:09'),
(104, '613020028-3', 4, '2019-11-01 16:18:10'),
(94, '613020217-0', 5, '2019-11-01 16:18:11'),
(86, '613020991-0', 4.5, '2019-11-01 16:18:11'),
(101, '613020598-2​', 5, '2019-11-01 16:18:12'),
(103, '613020028-3', 4, '2019-11-01 16:18:17'),
(53, '613020994-4', 4, '2019-11-01 16:18:18'),
(100, '613020598-2​', 5, '2019-11-01 16:18:19'),
(87, '613020991-0', 5, '2019-11-01 16:18:23'),
(102, '613020028-3', 4, '2019-11-01 16:18:24'),
(91, '613020994-4', 4, '2019-11-01 16:18:25'),
(97, '613020225-1', 5, '2019-11-01 16:18:26'),
(99, '613020598-2​', 5, '2019-11-01 16:18:26'),
(84, '613020991-0', 5, '2019-11-01 16:18:30'),
(101, '613020028-3', 4, '2019-11-01 16:18:31'),
(98, '613020225-1', 5, '2019-11-01 16:18:36'),
(100, '613020028-3', 4, '2019-11-01 16:18:37'),
(95, '613020994-4', 3.5, '2019-11-01 16:18:37'),
(99, '613020028-3', 4, '2019-11-01 16:18:45'),
(98, '613020598-2​', 5, '2019-11-01 16:18:46'),
(98, '613020028-3', 4, '2019-11-01 16:18:53'),
(102, '613020994-4', 3, '2019-11-01 16:18:54'),
(100, '613020225-1', 5, '2019-11-01 16:18:55'),
(97, '613020028-3', 4, '2019-11-01 16:18:59'),
(100, '613020994-4', 4, '2019-11-01 16:19:01'),
(96, '613020028-3', 4, '2019-11-01 16:19:05'),
(102, '613020225-1', 5, '2019-11-01 16:19:06'),
(94, '613020994-4', 4, '2019-11-01 16:19:10'),
(95, '613020028-3', 4, '2019-11-01 16:19:11'),
(97, '613020598-2​', 5, '2019-11-01 16:19:19'),
(89, '613020994-4', 4, '2019-11-01 16:19:18'),
(96, '613020598-2​', 5, '2019-11-01 16:19:27'),
(84, '613020994-4', 5, '2019-11-01 16:19:31'),
(95, '613020598-2​', 5, '2019-11-01 16:19:34'),
(102, '613020223-5', 5, '2019-11-01 16:19:49'),
(103, '613020223-5', 5, '2019-11-01 16:19:54'),
(104, '613020223-5', 5, '2019-11-01 16:20:00'),
(99, '613020223-5', 5, '2019-11-01 16:20:07'),
(100, '613020223-5', 5, '2019-11-01 16:20:12'),
(101, '613020223-5', 5, '2019-11-01 16:20:17'),
(96, '613020223-5', 5, '2019-11-01 16:20:25'),
(97, '613020223-5', 5, '2019-11-01 16:20:35'),
(103, '599999999-9', 3, '2019-11-01 16:20:40'),
(98, '613020223-5', 5, '2019-11-01 16:20:41'),
(104, '613020600-1', 4.5, '2019-11-01 16:20:51'),
(95, '613020223-5', 5, '2019-11-01 16:20:56'),
(95, '613020225-1', 5, '2019-11-01 16:21:04'),
(103, '613020600-1', 4.5, '2019-11-01 16:21:04'),
(84, '613020225-1', 5, '2019-11-01 16:21:16'),
(102, '613020600-1', 4.5, '2019-11-01 16:21:32'),
(101, '613020600-1', 4.5, '2019-11-01 16:22:18'),
(100, '613020600-1', 5, '2019-11-01 16:22:49'),
(88, '613020600-1', 5, '2019-11-01 16:23:28'),
(96, '613020600-1', 5, '2019-11-01 16:23:50'),
(23, '613020600-1', 4, '2019-11-01 16:24:06'),
(90, '613020600-1', 5, '2019-11-01 16:24:29'),
(59, '613020600-1', 3.5, '2019-11-01 16:24:43'),
(94, '613020600-1', 5, '2019-11-01 16:25:02'),
(31, '613020600-1', 4.5, '2019-11-01 16:25:51'),
(99, '613020600-1', 5, '2019-11-01 16:26:10'),
(104, '613020644-1', 3, '2019-11-01 23:21:04'),
(103, '613020644-1', 4, '2019-11-01 23:21:11'),
(101, '613020644-1', 3, '2019-11-01 23:23:19'),
(102, '613020644-1', 3.5, '2019-11-01 23:23:12'),
(100, '613020644-1', 4, '2019-11-01 23:23:25'),
(99, '613020644-1', 3.5, '2019-11-01 23:23:34'),
(98, '613020644-1', 4.5, '2019-11-01 23:23:42'),
(97, '613020644-1', 4.5, '2019-11-01 23:23:47'),
(94, '613020644-1', 3.5, '2019-11-01 23:23:54'),
(91, '613020644-1', 4.5, '2019-11-01 23:24:01'),
(101, '613021055-5', 4, '2019-11-02 13:25:14'),
(100, '613021055-5', 3.5, '2019-11-02 13:25:36'),
(99, '613021055-5', 4, '2019-11-02 13:28:15'),
(98, '613021055-5', 4, '2019-11-02 13:28:28'),
(97, '613021055-5', 4, '2019-11-02 13:28:35'),
(96, '613021055-5', 4, '2019-11-02 13:28:43'),
(95, '613021055-5', 4, '2019-11-02 13:28:55'),
(94, '613021055-5', 3.5, '2019-11-02 13:29:10'),
(93, '613021055-5', 3.5, '2019-11-02 13:29:20'),
(92, '613021055-5', 4, '2019-11-02 13:29:26'),
(104, '613021052-1', 3.5, '2019-11-02 13:37:55'),
(103, '613021052-1', 3.5, '2019-11-02 13:38:05'),
(102, '613021052-1', 3.5, '2019-11-02 13:38:14'),
(101, '613021052-1', 3, '2019-11-02 13:38:25'),
(100, '613021052-1', 3.5, '2019-11-02 13:38:37'),
(99, '613021052-1', 3, '2019-11-02 13:38:49'),
(98, '613021052-1', 3.5, '2019-11-02 13:39:00'),
(97, '613021052-1', 3.5, '2019-11-02 13:39:09'),
(96, '613021052-1', 3.5, '2019-11-02 13:39:18'),
(95, '613021052-1', 3, '2019-11-02 13:39:28'),
(104, '613020634-4', 3, '2019-11-02 13:55:24'),
(103, '613020634-4', 4, '2019-11-02 13:56:02'),
(102, '613020634-4', 2.5, '2019-11-02 13:58:43'),
(101, '613020634-4', 2, '2019-11-02 14:10:08'),
(100, '613020634-4', 2, '2019-11-02 14:10:16'),
(99, '613020634-4', 2.5, '2019-11-02 14:10:24'),
(98, '613020634-4', 3.5, '2019-11-02 14:10:35'),
(97, '613020634-4', 3.5, '2019-11-02 14:10:56'),
(96, '613020634-4', 4, '2019-11-02 14:11:59'),
(95, '613020634-4', 3, '2019-11-02 14:12:12'),
(101, '613020250-2', 5, '2019-11-04 18:53:44'),
(100, '613020250-2', 5, '2019-11-04 18:53:48'),
(99, '613020250-2', 5, '2019-11-04 18:53:51'),
(98, '613020250-2', 4.5, '2019-11-04 18:54:00'),
(97, '613020250-2', 5, '2019-11-04 18:54:04'),
(96, '613020250-2', 4.5, '2019-11-04 18:54:09'),
(95, '613020250-2', 4.5, '2019-11-04 18:54:15'),
(102, '613020231-6', 4, '2019-11-05 16:07:10'),
(100, '613020231-6', 4, '2019-11-05 16:07:29'),
(104, '613020573-8', 2.5, '2019-11-05 16:07:24'),
(102, '613020577-0', 5, '2019-11-05 16:07:29'),
(102, '613020215-4', 4, '2019-11-05 16:07:36'),
(103, '613020573-8', 3, '2019-11-05 16:07:45'),
(87, '613020982-1', 5, '2019-11-05 16:08:02'),
(104, '6130202196', 4.5, '2019-11-05 16:07:53'),
(102, '613020573-8', 3, '2019-11-05 16:08:00'),
(97, '613020231-6', 4, '2019-11-05 16:08:06'),
(101, '613020573-8', 3, '2019-11-05 16:08:24'),
(99, '613020577-0', 5, '2019-11-05 16:08:16'),
(95, '613020231-6', 5, '2019-11-05 16:08:16'),
(101, '613020215-4', 4, '2019-11-05 16:08:21'),
(91, '613020231-6', 5, '2019-11-05 16:08:22'),
(101, '613020577-0', 5, '2019-11-05 16:08:23'),
(85, '613020231-6', 4.5, '2019-11-05 16:08:31'),
(84, '613020231-6', 5, '2019-11-05 16:08:38'),
(100, '613020577-0', 4.5, '2019-11-05 16:08:43'),
(89, '613020231-6', 5, '2019-11-05 16:08:43'),
(90, '613020231-6', 5, '2019-11-05 16:08:49'),
(100, '613020573-8', 3, '2019-11-05 16:08:49'),
(103, '613020577-0', 3, '2019-11-05 16:08:50'),
(96, '613020215-4', 4, '2019-11-05 16:08:50'),
(99, '6130202196', 4.5, '2019-11-05 16:08:53'),
(94, '613020231-6', 5, '2019-11-05 16:08:58'),
(104, '613020577-0', 3, '2019-11-05 16:08:58'),
(97, '6130202196', 5, '2019-11-05 16:09:04'),
(94, '613020577-0', 5, '2019-11-05 16:09:05'),
(99, '613020215-4', 4, '2019-11-05 16:09:07'),
(95, '613020577-0', 3, '2019-11-05 16:09:10'),
(99, '613020573-8', 3, '2019-11-05 16:09:13'),
(98, '6130202196', 5, '2019-11-05 16:09:13'),
(96, '613020577-0', 5, '2019-11-05 16:09:15'),
(103, '613020221-9', 3.5, '2019-11-05 16:09:16'),
(94, '6130202196', 4.5, '2019-11-05 16:09:23'),
(91, '613020577-0', 5, '2019-11-05 16:09:23'),
(94, '613020215-4', 4, '2019-11-05 16:09:28'),
(98, '613020573-8', 2.5, '2019-11-05 16:09:32'),
(92, '6130202196', 5, '2019-11-05 16:09:34'),
(90, '613020215-4', 4, '2019-11-05 16:09:37'),
(97, '613020573-8', 2.5, '2019-11-05 16:09:44'),
(87, '6130202196', 4, '2019-11-05 16:09:45'),
(92, '613020215-4', 4, '2019-11-05 16:09:45'),
(102, '613020206-5', 4, '2019-11-05 16:09:50'),
(101, '6130202196', 4.5, '2019-11-05 16:09:52'),
(88, '613020215-4', 3.5, '2019-11-05 16:09:54'),
(87, '613020215-4', 4, '2019-11-05 16:09:59'),
(90, '613020221-9', 3, '2019-11-05 16:10:00'),
(96, '613020573-8', 2.5, '2019-11-05 16:10:03'),
(85, '6130202196', 4.5, '2019-11-05 16:10:01'),
(96, '6130202196', 5, '2019-11-05 16:10:08'),
(104, '613020234-0', 3.5, '2019-11-05 16:10:13'),
(85, '613020215-4', 4.5, '2019-11-05 16:10:14'),
(95, '613020573-8', 2.5, '2019-11-05 16:10:14'),
(103, '613020234-0', 4, '2019-11-05 16:10:20'),
(102, '613020234-0', 3, '2019-11-05 16:10:26'),
(103, '613020206-5', 5, '2019-11-05 16:10:30'),
(100, '613020221-9', 2.5, '2019-11-05 16:10:30'),
(101, '613020234-0', 3.5, '2019-11-05 16:10:31'),
(100, '613020234-0', 4, '2019-11-05 16:10:35'),
(99, '613020234-0', 4, '2019-11-05 16:10:39'),
(98, '613020234-0', 4, '2019-11-05 16:10:43'),
(104, '613020206-5', 3.5, '2019-11-05 16:10:48'),
(97, '613020234-0', 3.5, '2019-11-05 16:10:48'),
(96, '613020234-0', 4, '2019-11-05 16:10:54'),
(95, '613020234-0', 4.5, '2019-11-05 16:10:58'),
(99, '613020206-5', 3.5, '2019-11-05 16:11:00'),
(104, '613020221-9', 2, '2019-11-05 16:11:01'),
(100, '613020206-5', 4.5, '2019-11-05 16:11:08'),
(101, '613020206-5', 2.5, '2019-11-05 16:11:26'),
(102, '613020221-9', 3, '2019-11-05 16:11:31'),
(96, '613020206-5', 4, '2019-11-05 16:11:38'),
(97, '613020206-5', 4.5, '2019-11-05 16:11:46'),
(101, '613020221-9', 3, '2019-11-05 16:11:55'),
(98, '613020206-5', 4, '2019-11-05 16:11:56'),
(90, '613020206-5', 4.5, '2019-11-05 16:12:08'),
(99, '613020221-9', 3, '2019-11-05 16:12:14'),
(98, '613020221-9', 2.5, '2019-11-05 16:12:28'),
(97, '613020221-9', 3.5, '2019-11-05 16:12:39'),
(96, '613020221-9', 3, '2019-11-05 16:12:53'),
(104, '613020593-2', 3, '2019-11-07 16:30:23'),
(103, '613020593-2', 5, '2019-11-07 16:30:29'),
(104, '613020989-7', 3.5, '2019-11-07 16:30:34'),
(102, '613020593-2', 3, '2019-11-07 16:30:37'),
(101, '613020593-2', 4, '2019-11-07 16:30:43'),
(104, '613020228-5', 4, '2019-11-07 16:30:44'),
(103, '613020233-2', 5, '2019-11-07 16:30:45'),
(98, '613021012', 3.5, '2019-11-07 16:31:42'),
(100, '613020593-2', 5, '2019-11-07 16:30:49'),
(99, '613020593-2', 5, '2019-11-07 16:30:55'),
(103, '613020228-5', 3.5, '2019-11-07 16:31:01'),
(103, '613020989-7', 4, '2019-11-07 16:31:02'),
(98, '613020593-2', 4.5, '2019-11-07 16:31:03'),
(102, '613020228-5', 4, '2019-11-07 16:31:11'),
(102, '613020989-7', 4.5, '2019-11-07 16:31:17'),
(101, '613020233-2', 5, '2019-11-07 16:31:18'),
(101, '613020228-5', 5, '2019-11-07 16:31:19'),
(100, '613020228-5', 4, '2019-11-07 16:31:25'),
(99, '613020228-5', 4, '2019-11-07 16:31:31'),
(58, '613020593-2', 5, '2019-11-07 16:31:32'),
(101, '613020989-7', 4.5, '2019-11-07 16:31:36'),
(98, '613020228-5', 4, '2019-11-07 16:31:40'),
(94, '613020233-2', 5, '2019-11-07 16:31:42'),
(100, '613020989-7', 4.5, '2019-11-07 16:31:43'),
(97, '613020228-5', 5, '2019-11-07 16:31:45'),
(13, '613020593-2', 5, '2019-11-07 16:31:45'),
(99, '613020989-7', 4.5, '2019-11-07 16:31:51'),
(31, '613020593-2', 4.5, '2019-11-07 16:31:52'),
(96, '613020228-5', 4, '2019-11-07 16:31:53'),
(97, '613021012', 4, '2019-11-07 16:31:54'),
(98, '613020989-7', 5, '2019-11-07 16:32:28'),
(104, '613020233-2', 5, '2019-11-07 16:31:59'),
(95, '613020228-5', 5, '2019-11-07 16:31:59'),
(103, '613021011-5', 3.5, '2019-11-07 16:32:03'),
(97, '613020989-7', 4.5, '2019-11-07 16:32:05'),
(96, '613020989-7', 4, '2019-11-07 16:32:11'),
(92, '613020578-8', 4.5, '2019-11-07 16:32:12'),
(101, '613021012', 4, '2019-11-07 16:32:16'),
(96, '613020593-2', 3, '2019-11-07 16:32:19'),
(96, '613020233-2', 5, '2019-11-07 16:32:20'),
(104, '613020592-4', 3.5, '2019-11-07 16:32:21'),
(90, '613020578-8', 5, '2019-11-07 16:32:21'),
(100, '613021012', 5, '2019-11-07 16:32:21'),
(99, '613021012', 4.5, '2019-11-07 16:32:27'),
(87, '613020578-8', 5, '2019-11-07 16:32:30'),
(90, '613020593-2', 4, '2019-11-07 16:32:32'),
(102, '613021012', 3.5, '2019-11-07 16:32:37'),
(85, '613020593-2', 5, '2019-11-07 16:32:38'),
(98, '613020233-2', 5, '2019-11-07 16:32:40'),
(103, '613021012', 3.5, '2019-11-07 16:32:42'),
(86, '613020578-8', 4.5, '2019-11-07 16:32:42'),
(95, '613020989-7', 5, '2019-11-07 16:32:43'),
(104, '613021012', 3.5, '2019-11-07 16:32:47'),
(95, '613020233-2', 5, '2019-11-07 16:32:49'),
(85, '613020578-8', 4.5, '2019-11-07 16:32:51'),
(94, '613021012', 4.5, '2019-11-07 16:32:55'),
(103, '613020581-9 ', 4.5, '2019-11-07 16:32:59'),
(92, '613020233-2', 5, '2019-11-07 16:33:00'),
(95, '613021012', 4, '2019-11-07 16:33:00'),
(84, '613020578-8', 5, '2019-11-07 16:33:02'),
(85, '613020233-2', 5, '2019-11-07 16:33:09'),
(94, '613020578-8', 4.5, '2019-11-07 16:33:16'),
(86, '613020233-2', 5, '2019-11-07 16:33:18'),
(102, '613020592-4', 3.5, '2019-11-07 16:33:20'),
(102, '613020581-9 ', 4, '2019-11-07 16:33:20'),
(95, '613020578-8', 5, '2019-11-07 16:33:23'),
(101, '613020229-3', 4, '2019-11-07 16:33:29'),
(97, '613020578-8', 5, '2019-11-07 16:33:32'),
(96, '613020581-9 ', 5, '2019-11-07 16:33:33'),
(103, '613020592-4', 3, '2019-11-07 16:33:42'),
(102, '613021011-5', 3.5, '2019-11-07 16:33:36'),
(101, '613020578-8', 4.5, '2019-11-07 16:33:42'),
(96, '613020229-3', 4, '2019-11-07 16:33:44'),
(104, '613021011-5', 4, '2019-11-07 16:33:46'),
(95, '613020581-9 ', 5, '2019-11-07 16:34:02'),
(93, '613020229-3', 4, '2019-11-07 16:34:04'),
(96, '613021011-5', 4.5, '2019-11-07 16:34:05'),
(94, '613020592-4', 3.5, '2019-11-07 16:34:10'),
(98, '613021011-5', 4, '2019-11-07 16:34:17'),
(87, '613020592-4', 4, '2019-11-07 16:34:22'),
(94, '613020581-9 ', 3, '2019-11-07 16:34:23'),
(97, '613021011-5', 4, '2019-11-07 16:34:23'),
(90, '613020581-9 ', 5, '2019-11-07 16:34:33'),
(92, '613020229-3', 4, '2019-11-07 16:34:39'),
(92, '613021011-5', 4, '2019-11-07 16:34:43'),
(87, '613020581-9 ', 3, '2019-11-07 16:34:44'),
(91, '613021011-5', 4, '2019-11-07 16:34:49'),
(103, '613020229-3', 3.5, '2019-11-07 16:34:52'),
(84, '613020581-9 ', 3.5, '2019-11-07 16:34:56'),
(90, '613021011-5', 4, '2019-11-07 16:34:56'),
(95, '613020229-3', 4, '2019-11-07 16:35:01'),
(90, '613020229-3', 4, '2019-11-07 16:35:12'),
(93, '613020581-9 ', 4, '2019-11-07 16:35:12'),
(84, '613021011-5', 4, '2019-11-07 16:35:17'),
(88, '613020229-3', 4, '2019-11-07 16:35:18'),
(93, '613020592-4', 3.5, '2019-11-07 16:35:21'),
(99, '613020581-9 ', 4, '2019-11-07 16:35:24'),
(86, '613020229-3', 4, '2019-11-07 16:35:25'),
(102, '613020229-3', 4, '2019-11-07 16:35:33'),
(95, '613020592-4', 4, '2019-11-07 16:35:35'),
(101, '613021011-5', 3.5, '2019-11-07 16:35:50'),
(91, '613020592-4', 4, '2019-11-07 16:35:57'),
(97, '613020592-4', 3.5, '2019-11-07 16:36:12'),
(98, '613020592-4', 3.5, '2019-11-07 16:36:25'),
(104, '6130202146', 4, '2019-11-07 16:36:50'),
(101, '6130202146', 3.5, '2019-11-07 16:37:33'),
(102, '6130202146', 5, '2019-11-07 16:38:31'),
(96, '6130202146', 4, '2019-11-07 16:39:01'),
(100, '6130202146', 3.5, '2019-11-07 16:39:47'),
(94, '6130202146', 4.5, '2019-11-07 16:39:57'),
(85, '6130202146', 4, '2019-11-07 16:40:14'),
(82, '6130202146', 4, '2019-11-07 16:40:48'),
(97, '6130202146', 4, '2019-11-07 16:41:04'),
(98, '6130202146', 4, '2019-11-07 16:41:10'),
(99, '6130202146', 3.5, '2019-11-07 16:41:16'),
(104, '613020575-4', 4, '2019-11-07 17:07:02'),
(103, '613020575-4', 3.5, '2019-11-07 17:07:08'),
(102, '613020575-4', 4, '2019-11-07 17:07:15'),
(101, '613020575-4', 4, '2019-11-07 17:07:25'),
(100, '613020575-4', 4, '2019-11-07 17:07:31'),
(99, '613020575-4', 4, '2019-11-07 17:07:37'),
(98, '613020575-4', 4.5, '2019-11-07 17:07:46'),
(97, '613020575-4', 3.5, '2019-11-07 17:07:52'),
(96, '613020575-4', 4, '2019-11-07 17:07:59'),
(95, '613020575-4', 5, '2019-11-07 17:08:05'),
(104, '613020594-0', 4, '2019-11-07 19:38:23'),
(103, '613020594-0', 4, '2019-11-07 19:38:32'),
(102, '613020594-0', 4, '2019-11-07 19:38:39'),
(101, '613020594-0', 4, '2019-11-07 19:38:48'),
(100, '613020594-0', 4, '2019-11-07 19:38:54'),
(99, '613020594-0', 4, '2019-11-07 19:39:00'),
(98, '613020594-0', 4, '2019-11-07 19:39:10'),
(97, '613020594-0', 4, '2019-11-07 19:39:16'),
(96, '613020594-0', 4, '2019-11-07 19:39:22'),
(95, '613020594-0', 4, '2019-11-07 19:39:32'),
(104, '613020209-9', 5, '2019-11-07 21:35:11'),
(103, '613020209-9', 5, '2019-11-08 00:09:29'),
(102, '613020209-9', 5, '2019-11-08 00:09:36'),
(101, '613020209-9', 5, '2019-11-08 00:09:44'),
(100, '613020209-9', 5, '2019-11-08 00:09:49'),
(99, '613020209-9', 5, '2019-11-08 00:09:55'),
(98, '613020209-9', 5, '2019-11-08 00:10:03'),
(97, '613020209-9', 5, '2019-11-08 00:10:09'),
(96, '613020209-9', 5, '2019-11-08 00:10:15'),
(95, '613020209-9', 5, '2019-11-08 00:10:21'),
(104, 'joe13phuu', 4.5, '2019-11-08 01:00:05'),
(103, 'joe13phuu', 4.5, '2019-11-08 01:00:09'),
(102, 'joe13phuu', 5, '2019-11-08 01:00:14'),
(100, 'joe13phuu', 3, '2019-11-08 01:00:21'),
(101, 'joe13phuu', 5, '2019-11-08 01:00:25'),
(99, 'joe13phuu', 3.5, '2019-11-08 01:00:29'),
(98, 'joe13phuu', 4.5, '2019-11-08 01:00:36'),
(88, 'joe13phuu', 5, '2019-11-08 01:00:42'),
(87, 'joe13phuu', 4.5, '2019-11-08 01:00:47'),
(86, 'joe13phuu', 4.5, '2019-11-08 01:00:53'),
(103, '613020586-9', 5, '2019-11-08 05:40:35'),
(93, '613020586-9', 4.5, '2019-11-08 05:42:11'),
(95, '613020586-9', 5, '2019-11-08 05:42:51'),
(87, '613020586-9', 4.5, '2019-11-08 05:43:09'),
(98, '613020586-9', 4.5, '2019-11-08 05:43:18'),
(97, '613020586-9', 5, '2019-11-08 05:43:28'),
(96, '613020586-9', 5, '2019-11-08 05:43:37'),
(99, '613020586-9', 5, '2019-11-08 05:43:48'),
(104, '613020586-9', 5, '2019-11-08 05:44:07'),
(100, '613020586-9', 5, '2019-11-08 05:44:19'),
(90, '613020586-9', 5, '2019-11-08 05:49:14'),
(104, '613020988-9', 4, '2019-11-08 15:29:24'),
(103, '613020988-9', 5, '2019-11-08 15:29:35'),
(102, '613020988-9', 4, '2019-11-08 15:29:48'),
(88, '613020988-9', 4, '2019-11-08 15:30:04'),
(100, '613020988-9', 4, '2019-11-08 15:30:14'),
(97, '613020988-9', 4, '2019-11-08 15:30:26'),
(96, '613020988-9', 5, '2019-11-08 15:30:34'),
(91, '613020988-9', 4.5, '2019-11-08 15:30:44'),
(93, '613020988-9', 4.5, '2019-11-08 15:31:06'),
(85, '613020988-9', 5, '2019-11-08 15:31:16'),
(94, '613020589-3', 3.5, '2019-11-10 22:43:59'),
(93, '613020589-3', 4, '2019-11-10 22:44:06'),
(95, '613020589-3', 4, '2019-11-10 22:44:13'),
(96, '613020589-3', 4, '2019-11-10 22:44:19'),
(97, '613020589-3', 4, '2019-11-10 22:44:24'),
(98, '613020589-3', 4, '2019-11-10 22:44:30'),
(100, '613020589-3', 4, '2019-11-10 22:44:38'),
(101, '613020589-3', 4, '2019-11-10 22:44:44'),
(102, '613020589-3', 4, '2019-11-10 22:44:52'),
(103, '613020589-3', 4, '2019-11-10 22:44:57'),
(104, '613020987-1', 4, '2019-11-12 17:20:52'),
(103, '613020987-1', 4.5, '2019-11-12 17:20:59'),
(102, '613020987-1', 4, '2019-11-12 17:21:04'),
(101, '613020987-1', 4.5, '2019-11-12 17:21:14'),
(100, '613020987-1', 4.5, '2019-11-12 17:21:20'),
(99, '613020987-1', 4, '2019-11-12 17:21:25'),
(98, '613020987-1', 4.5, '2019-11-12 17:21:33'),
(97, '613020987-1', 4, '2019-11-12 17:21:38'),
(96, '613020987-1', 4, '2019-11-12 17:21:43'),
(95, '613020987-1', 4.5, '2019-11-12 17:21:50'),
(94, '613020982-1', 5, '2019-11-15 14:54:56'),
(101, '613020982-1', 5, '2019-11-15 14:59:24'),
(104, '613020982-1', 5, '2019-11-15 14:59:35'),
(103, '613020982-1', 5, '2019-11-15 14:59:42'),
(102, '613020982-1', 5, '2019-11-15 14:59:51'),
(100, '613020982-1', 5, '2019-11-15 15:00:10'),
(99, '613020982-1', 5, '2019-11-15 15:00:19'),
(98, '613020982-1', 5, '2019-11-15 15:00:28'),
(97, '613020982-1', 5, '2019-11-15 15:00:38'),
(96, '613020982-1', 5, '2019-11-15 15:00:47'),
(95, '613020982-1', 5, '2019-11-15 15:00:57'),
(93, '613020982-1', 5, '2019-11-15 15:01:16'),
(92, '613020982-1', 5, '2019-11-15 15:01:29'),
(91, '613020982-1', 4.5, '2019-11-15 15:01:41'),
(90, '613020982-1', 5, '2019-11-15 15:01:52'),
(88, '613020982-1', 4.5, '2019-11-15 15:02:12'),
(86, '613020982-1', 5, '2019-11-15 15:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `registered_course`
--

CREATE TABLE `registered_course` (
  `course_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registered_course`
--

INSERT INTO `registered_course` (`course_id`, `username`, `date`) VALUES
('000101', 'nam', '2019-12-16 13:47:19'),
('000102', 'admin', '2019-12-15 12:02:14'),
('411224', 'admin', '2020-02-18 17:07:56'),
('777100', 'admin', '2020-02-18 17:18:00'),
('SC312002', 'admin', '2020-01-26 03:41:22'),
('SC312002', 'signuptest', '2020-01-30 08:30:09'),
('SC312006', 'admin', '2020-01-26 03:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `saved_book`
--

CREATE TABLE `saved_book` (
  `book_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `collection_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `saved_book`
--

INSERT INTO `saved_book` (`book_id`, `username`, `date`, `collection_name`) VALUES
(116, 'signuptest', '2020-01-30 06:51:13', 'Algo'),
(101, 'signuptest', '2020-01-30 06:39:17', 'none'),
(124, 'signuptest', '2020-01-30 06:51:11', 'none'),
(123, 'signuptest', '2020-01-30 06:51:12', 'none'),
(117, 'signuptest', '2020-01-30 06:51:15', 'Algo'),
(115, 'signuptest', '2020-01-30 06:51:17', 'none'),
(114, 'signuptest', '2020-01-30 06:51:18', 'Algo');

-- --------------------------------------------------------

--
-- Table structure for table `saved_book_collection`
--

CREATE TABLE `saved_book_collection` (
  `collection_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `saved_book_collection`
--

INSERT INTO `saved_book_collection` (`collection_name`, `username`) VALUES
('Algo', 'signuptest');

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
('admin', 'admin', 'admin', 'admin'),
('ura', 'ura', 'ura', 'ura'),
('613020605-1', '0883024944', 'Autthapong', 'Lakkam'),
('613020218-8', '6130202188', 'ธนภัทร', 'กิ่งสาร'),
('613020603-5', 'oat111222', 'สุรเชษฐ์', 'ทองประสงค์'),
('613020238-2', '123456', 'เอกรัฐ', 'อาสนานิ'),
('613020207-3', 'tongzapan16482', 'Natchapon', 'Chotklang'),
('613020029-1​', 'AAbb1234', 'Sittipong', 'Bubpan'),
('613020597-4', 'Sadaharu123', 'Warangkana', 'Khemphila'),
('613020995-2', '2459900033488', 'tarit', 'Natuntong'),
('613020992-8', 'Tin121121121', 'ติณณภพ', 'มาสบดี'),
('613021002-6', 'jaem8055', 'มุทิตา', 'เดชยสดี'),
('613020580-1', '08335779280hk', 'thanawat', 'yothachai'),
('613020596-6', 'c2aa0419', 'Ratthanan', 'Thamsimma'),
('613020572-0', 'asdk1234', 'Kittichai', 'Saenburan'),
('613020230-8', '789741456mhee', 'Wongwit', 'Sriewnit'),
('613021056-3', '02042542', 'ปฏิภาณ', 'ประกิระนะ'),
('613020200-7', 'Ping12345566', 'Kornkanok', 'Khosungnoen'),
('613020647-5', 'pool123456mgk', 'uta', 'beta'),
('613020646-7', '12345678', 'josh', 'kub'),
('613021122-6', '0981618236', 'กนกพร', 'พูลผล'),
('613021051-3', '159632', 'จักรพงษ์', 'ฦๅชา'),
('593021591-7', 'Mikey131998', 'supapong', 'sakulkhu'),
('613021054-7', 'afourdy21', 'Nateriver', 'Nate'),
('613021001-8', 'phitFang42', 'fang', 'phit'),
('613021000-0', 'loself087', 'พลกฤต', 'ทองสุขแก้ง'),
('613020569-9', '0883088961chat', 'Chat', 'Got7'),
('613020222-7', '34690854112p', 'nipapon', 'liangwatthanakhon'),
('natnarinmuii09@gmail.com', '613020211-2', 'natnarin', 'polpraput'),
('613020032-2', 'jumbojb43117', 'อภิวัฒน์', 'พรมผลัด'),
('613021004-2', 'ip19022015', 'Waranya', 'Saenrat'),
('613021009-2', '199920', 'supa', 'dks'),
('613021010-7', '1409901768491', 'Neungrutai', 'Deemeewong'),
('613020199-6', '1469900493791', 'kamontip', 'pattanapongjaras'),
('613020997-8', '1400701278778', 'Terapat', 'Sanee'),
('613020599-0', '1450300122963', 'ศุภโชค', 'แย้มศรี'),
('613020570-4', 'Kritsakorn083', 'Kritsakorn', 'Buikwang'),
('613020205-7', '123456789ผฟ', 'yannapat', 'yolpan'),
('613021006-8', 'Ha66Y-$w33t!e', 'sasithorn', 'wongsanuthat'),
('613020983-9', 'tiger667gg', 'kittipong', 'savisai'),
('Nattarika ', '798228', 'Nattarika ', 'Paingeon '),
('613020601-9', '043513341', 'supijarn', 'wilailak'),
('613020224-3', '0818772184', 'Puntorn', 'Wutiarporn'),
('622222222-2', 'testtest', 'ชื่อจริง', 'นามสกุล'),
('613020213-8', 'darunee12', 'Darunee', 'Sangunurai'),
('613020990-2', '043815340', 'Nutchayapha', 'Srimamat'),
('613020608-5', 'CatdogGG2542', 'Archawatip', 'Seeneha'),
('613020210-4', 'natthida123', 'natthida', 'wiangsima'),
('613021008-4', 'sarinsattaya12142', 'Sarin', 'Songkarin'),
('613020203-1', '1479900422001', 'Chatchai', 'charungkiatsakon'),
('613020232-4', 'WinterIsComing7', 'Warunyu', 'Pinyopornsawat'),
('613020606-9', '123456', 'อรัญ', 'แซ่ตั้ง'),
('613020204-9', 'sayuri', 'sayuri', 'tokuhara'),
('613020607-7', '0877209844', 'อรรถพล', 'แน่นดี'),
('613020986-3', '1409902976292', 'ชาคริต', 'น้อยดวงศรี'),
('613020236-6', 'najaemin13', 'siriyakorn', 'dononchom'),
('613020574-6', '6130205746', 'chanoknan', 'somfan'),
('613020220-1', '12345678', 'Thanapoom', 'Srila-Ong'),
('613020217-0', 'Thanapat10', 'Thanapat', 'Phuangpila'),
('613020250-2', '221afd13', 'phatsakron', 'kwansuk'),
('613020994-4', 'Aof12345678', 'Thanakorn', 'Thongdee'),
('pxxnzz', '249011', 'Siriwan', 'Chaisawat'),
('613020991-0', '24022542', 'Nuput', 'Artsunthorn'),
('613020598-2​', '0957059855', 'Wipada', 'Silarach'),
('613020225-1', 'ifclan2542', 'Pacharaphong', 'Ratchamaitree'),
('613020028-3', '249011', 'Siriwan', 'Chaisawat'),
('613020223-5', 'bri60377', 'bryan', 'huang'),
('613020600-1', 'soda160996', 'Sittinan', 'Sarapoke'),
('613020231-6', 'pattaiky', 'wanida', 'klinsawat'),
('613020644-1', '123456789', 'ภูมิวรินทร์', 'สุรสิทธิ์ภัทรกุล'),
('613021055-5', 'Scourge123', 'นพิดา', 'เหลาสุภาพ'),
('613021052-1', '141204', 'ชนากานต์', 'ชนากลาง'),
('613020634-4', 'adsirn0000', 'จุฑามาศ', 'ภูยวงศ์'),
('613020221-9', 'reungnut27521', 'Thanet', 'Ruangnoot'),
('613020573-8', 'life21%', 'Kiettipong', 'Thongtud'),
('613020982-1', '886458468a', 'Korawit', 'Thotabutr'),
('613020577-0', '123456', 'Thikamporn', 'Tantiamornchaikul'),
('613020215-4', '1103702769258', 'Thukdanai', 'Puangsantea'),
('6130202196', '8854', 'Thanaphat', 'Phungamkuew'),
('613020234-0', '123456789', 'Suppawit', 'Siriwirot'),
('613020206-5', 'wwer98765', 'Napat', 'Khamsing'),
('613020989-7', 'hci1618', 'natchapon', 'phuedphud'),
('613021012', 'apisit26745', 'Apisit', 'Kraiyaso'),
('613020233-2', 'geng0846865950', 'Watchara', 'Sritonwong'),
('613020593-2', '1409901802878', 'ภูวดล', 'ราชบรรจบ'),
('613020228-5', '1309902756463', 'Pokin', 'Muangkham'),
('613020592-4', '0933278454', 'Phumin', 'Tienchaisitthi'),
('613020578-8', '1409901832858', 'Nichaphat', 'Ma-ui'),
('613020229-3', 'Dea23chow', 'Monton', 'Somton'),
('613021011-5', 'perfectpluk1', 'Apiwat', 'Punsungnoen'),
('613020581-9 ', 'Bass04003', 'Thanawat', 'Sawangwong'),
('6130202146', 'dabsomsyi22', 'Tulakan', 'Unsiri'),
('613020575-4', 'fong23062542', 'ชนาพร', 'พันธิอั้ว'),
('613020594-0', '1412101093167', 'มีชัย', 'หนูพิศ'),
('613020209-9', '0898493349', 'Natthawan', 'Siripat'),
('joe13phuu', 'jo0887449123', 'Phuthanet', 'Surachatpitak'),
('613020586-9', '1103100630286', 'พชร', 'หทัยทิพรัตน์'),
('613020988-9', '1480300174009', 'ณชธฤต', 'ขยายกิจการ'),
('613020589-3', '1309902726807', 'ภัทรนันท์', 'นราพินิจ'),
('613020987-1', '0876376743', 'ชาลิสา', 'ยศราวาส');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_search`
--
ALTER TABLE `activity_search`
  ADD PRIMARY KEY (`search_id`);

--
-- Indexes for table `activity_view`
--
ALTER TABLE `activity_view`
  ADD PRIMARY KEY (`view_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_enabling`
--
ALTER TABLE `comment_enabling`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `comment_liking`
--
ALTER TABLE `comment_liking`
  ADD PRIMARY KEY (`comment_id`,`book_id`,`username`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`book_id`,`username`);

--
-- Indexes for table `registered_course`
--
ALTER TABLE `registered_course`
  ADD PRIMARY KEY (`course_id`,`username`);

--
-- Indexes for table `saved_book`
--
ALTER TABLE `saved_book`
  ADD PRIMARY KEY (`book_id`,`username`),
  ADD KEY `fk_collection_name` (`collection_name`);

--
-- Indexes for table `saved_book_collection`
--
ALTER TABLE `saved_book_collection`
  ADD PRIMARY KEY (`collection_name`,`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_search`
--
ALTER TABLE `activity_search`
  MODIFY `search_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity_view`
--
ALTER TABLE `activity_view`
  MODIFY `view_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
