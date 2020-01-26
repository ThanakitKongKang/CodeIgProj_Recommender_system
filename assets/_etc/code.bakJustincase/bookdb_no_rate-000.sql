-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2019 at 06:07 PM
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
--
-- Database: `id11095585_bookdb`
--

drop function if exists soundex_match;
delimiter $$
create function soundex_match (needle varchar(128), haystack text, splitChar varchar(1)) returns tinyint
  deterministic
  begin
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

  end
$$
delimiter ;
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

-- --------------------------------------------------------

--
-- Table structure for table `registered_course`
--

CREATE TABLE `registered_course` (
  `course_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `saved_book_collection`
--

CREATE TABLE `saved_book_collection` (
  `collection_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
