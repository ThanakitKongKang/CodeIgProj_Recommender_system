-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2020 at 01:15 PM
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
-- Database: `test`
--

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
