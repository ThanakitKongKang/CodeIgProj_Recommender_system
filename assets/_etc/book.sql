-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2019 at 01:48 AM
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
(83, 'Leif Mejbro', 'Spectral Theory', 'Calculus', NULL, NULL, 0),
(84, 'Edward Stull', 'UX Fundamentals for Non-UX Professionals User Experience Principles for Managers, Writers, Designers, and Developers', 'Human computer interaction', NULL, NULL, 0),
(85, 'Jaime Levy', 'UX Strategy', 'Human computer interaction', NULL, NULL, 0),
(86, 'Marcin Treder', 'UX DESIGN FOR STARTUPS', 'Human computer interaction', NULL, NULL, 0),
(87, 'Eric Ries', 'Lean UX Applying Lean Principles to Improve User Experience', 'Human computer interaction', NULL, NULL, 0),
(88, 'Eric Ries', 'UX for Lean Startups_Faster, Smarter User Experience Research and Design', 'Human computer interaction', NULL, NULL, 0),
(89, 'Jesmond Allen', 'Smashing UX Design Foundations for Designing Online User Experiences', 'Human computer interaction', NULL, NULL, 0),
(90, 'Steve Krug', 'Dont Make Me Think A Common Sense Approach to Web Usability', 'Human computer interaction', NULL, NULL, 0),
(91, 'James Cabrera', 'Modular Design Frameworks _ A Projects-based Guide for UI_UX Designers', 'Human computer interaction', NULL, NULL, 0),
(92, 'W. Craig Tomlin', 'UX Optimization Combining Behavioral UX and Usability Testing Data to Optimize Websites', 'Human computer interaction', NULL, NULL, 0),
(93, 'Rebecca Baker', 'Agile UX Storytelling _ Crafting Stories for Better Software Development', 'Human computer interaction', NULL, NULL, 0),
(94, 'Jaime Levy', 'UX Strategy How to Devise Innovative Digital Products that People Want', 'Human computer interaction', NULL, NULL, 0),
(95, 'Don norman', 'The Design of Everyday Things Revised and Expanded Edition', 'Human computer interaction', NULL, NULL, 0),
(96, 'Dan Saffer', 'Designing for Interaction', 'Human computer interaction', NULL, NULL, 0),
(97, 'Russ unger', 'A Project Guide to UX Design for User Experience Designers in the Field or in the Making 2nd edition', 'Human computer interaction', NULL, NULL, 0),
(98, 'Jesse James Garrett', 'the Elements of User Experience', 'Human computer interaction', NULL, NULL, 0),
(99, 'Lukas Mathis', 'Designed for Use', 'Human computer interaction', NULL, NULL, 0),
(100, 'Alan Cooper', 'About Face The Essentials of Interaction Design (4th Edition)', 'Human computer interaction', NULL, NULL, 0),
(101, 'Susan M. Weinschenk', '100 Things Every Designer Needs to Know About People ', 'Human computer interaction', NULL, NULL, 0),
(102, 'William Lidwell', 'Universal Principles of Design', 'Human computer interaction', NULL, NULL, 0),
(103, 'Robert Mckee', 'the War of Art', 'Human computer interaction', NULL, NULL, 0),
(104, 'David Benyon', 'Designing Interactive Systems A Comprehensive Guide to HCI, UX and Interaction Design', 'Human computer interaction', NULL, NULL, 0),
(105, 'Rex Hartson', 'The UX Book Process and Guidelines for Ensuring a Quality User Experience', 'Human computer interaction', NULL, NULL, 0),
(106, 'Claire Rowland', 'Designing Connected Products UX for the Consumer Internet of Things', 'Human computer interaction', NULL, NULL, 0),
(107, 'Simon King', 'Understanding Industrial Design Principles for UX and Interaction Design', 'Human computer interaction', NULL, NULL, 0),
(108, 'David Travis', 'Think Like a UX Researcher How to Observe Users, Influence Design, and Shape Business Strategy', 'Human computer interaction', NULL, NULL, 0),
(109, 'Greg Nudelman', 'Designing Search UX Strategies for eCommerce Success', 'Human computer interaction', NULL, NULL, 0),
(110, 'Dino Esposito', 'Modern Web Development Understanding domains, technologies, and user experience', 'Human computer interaction', NULL, NULL, 0),
(111, 'Sarah Drasner', 'SVG Animations From Common UX Implementations to Complex Responsive Animation', 'Human computer interaction', NULL, NULL, 0),
(112, 'Jeremy Osborn', 'web design with html and css digital classroom', 'Human computer interaction', NULL, NULL, 0),
(113, 'Richard Mansfield', 'CSS Web Design For Dummies', 'Human computer interaction', NULL, NULL, 0),
(114, 'Michael Bowers', 'Pro HTML5 and CSS3 Design Patterns', 'Human computer interaction', NULL, NULL, 0),
(115, 'Rachel Hewes', 'The Best of Letterhead & Logo Design', 'Human computer interaction', NULL, NULL, 0),
(116, 'Wilbert O. Galitz', 'The Essential Guide to User Interface Design', 'Human computer interaction', NULL, NULL, 0),
(117, 'David A. Patterson', 'Computer Organization and Design The Hardware_Software Interface', 'Human computer interaction', NULL, NULL, 0),
(118, 'Alan dix', 'Human-computer interaction', 'Human computer interaction', NULL, NULL, 0),
(119, 'Jenny Preece', 'Interaction Design - Beyond Human-Computer Interaction, 4th Edition', 'Human computer interaction', NULL, NULL, 0),
(120, 'Jenny Preece', 'Interaction Design Beyond Human-Computer Interaction, 5th Edition', 'Human computer interaction', NULL, NULL, 0),
(121, 'Theodor Wyeld', 'Computer-Human Interaction. Cognitive Effects of Spatial Interaction, Learning, and Ability', 'Human computer interaction', NULL, NULL, 0),
(122, 'Springer', 'Human-Computer Interaction Human Interface and the Management', 'Human computer interaction', NULL, NULL, 0),
(123, 'Andrew Sears', 'The Human-Computer Interaction Handbook Fundamentals, Evolving Technologies and Emerging Applications, Second Edition (Human Factors and Ergonomics)', 'Human computer interaction', NULL, NULL, 0),
(124, 'Richard Harper', 'Being Human Human-Computer Interaction in the year 2020', 'Human computer interaction', NULL, NULL, 0),
(125, 'Lewin A.R.W. Edwards', 'Open-Source Robotics and Process Control Cookbook Designing and Building Robust, Dependable Real-time Systems', 'Human computer interaction', NULL, NULL, 0),
(126, 'Jesse James Garrett', 'The Elements of User Experience. User-Centered Design for the Web and Beyond', 'Human computer interaction', NULL, NULL, 0),
(127, 'Dennis Sheppard', 'Beginning Progressive Web App Development Creating a Native App Experience on the Web', 'Human computer interaction', NULL, NULL, 0),
(128, 'Springer', 'Advances in Usability and User Experience', 'Human computer interaction', NULL, NULL, 0),
(129, 'Ian G. Clifton', 'Android User Interface Design Implementing Material Design for Developers', 'Human computer interaction', NULL, NULL, 0),
(130, 'Suzanne Ginsburg', 'Designing the IPhone User Experience A User-Centered Approach to Sketching and Prototyping IPhone Apps', 'Human computer interaction', NULL, NULL, 0),
(131, 'Ginny Redish', 'Storytelling for User Experience  Crafting Stories for Better Design', 'Human computer interaction', NULL, NULL, 0),
(132, 'Michiel Heijmans', 'UX & Conversion', 'Human computer interaction', NULL, NULL, 0),
(133, 'James Lang', 'Researching UX User Research', 'Human computer interaction', NULL, NULL, 0),
(134, 'Sitepoint', 'Analytics Tools for Optimizing UX', 'Human computer interaction', NULL, NULL, 0),
(135, 'Thomas Burkert', 'Mastering Photoshop for Web Design', 'Human computer interaction', NULL, NULL, 0),
(136, 'ken pender', 'Digital Colour in Graphic Design', 'Human computer interaction', NULL, NULL, 0),
(137, 'Kristin cullen', 'Design Elements, Typography Fundamentals_ A Graphic Style Manual for Understanding How Typography Affects Design', 'Human computer interaction', NULL, NULL, 0),
(138, 'Adams Morioka', 'Color Design Workbook A Real World Guide to Using Color in Graphic Design', 'Human computer interaction', NULL, NULL, 0),
(139, 'Amy graver', 'Best Practices for Graphic Designers, Grids and Page Layouts_ An Essential Guide for Understanding and Applying Page Design Principles', 'Human computer interaction', NULL, NULL, 0),
(140, 'Julian Shapiro', 'Web Animation using JavaScript_ Develop & Design', 'Human computer interaction', NULL, NULL, 0),
(141, 'Lisa sabin-wilson', 'WordPress Web Design For Dummies', 'Human computer interaction', NULL, NULL, 0),
(142, 'Adrian McEwen', 'Designing the Internet of Things', 'Human computer interaction', NULL, NULL, 0),
(143, 'Michael Bierut', 'How to use graphic design to sell things, explain things, make things look better, make people laugh, make people cry, and (every once in a while) change the world', 'Human computer interaction', NULL, NULL, 0),
(144, 'Rob Huddleston', 'visual web design', 'Human computer interaction', NULL, NULL, 0),
(145, 'Helen Armstrong', 'graphic design theory', 'Human computer interaction', NULL, NULL, 0),
(146, 'Lisa Lopuck', 'Web design for dummies', 'Human computer interaction', NULL, NULL, 0),
(147, 'Matt Ward', 'What Is Graphic Design', 'Human computer interaction', NULL, NULL, 0),
(148, 'Poppy Evans', 'The Graphic Design Reference & Specification Book  Everything Graphic Designers Need to Know Every Day', 'Human computer interaction', NULL, NULL, 0),
(149, 'Nigel cross', 'Design Thinking_ Understanding How Designers Think and Work', 'Human computer interaction', NULL, NULL, 0),
(150, 'Jennifer Niederst robbins', 'Learning Web Design _ A Beginner’s Guide to HTML, CSS, JavaScript, and Web Graphics', 'Human computer interaction', NULL, NULL, 0),
(151, 'Cheryl Dangel Cullen', 'Graphic Design That Works  Secrets for Successful Logo, Magazine, Brochure, Promotion, and Identity Design', 'Human computer interaction', NULL, NULL, 0),
(152, 'Everett N. McKay', 'UI is Communication How to Design Intuitive, User Centered Interfaces by Focusing on Effective Communication', 'Human computer interaction', NULL, NULL, 0),
(153, 'Theresa Neil', 'Mobile Design Pattern Gallery_ UI Patterns for Mobile Applications', 'Human computer interaction', NULL, NULL, 0),
(154, 'Theresa Neil', 'Mobile Design Pattern Gallery_ UI Patterns for Smartphone Apps', 'Human computer interaction', NULL, NULL, 0),
(155, 'Steven F. Daniel', 'Mastering Xamarin UI Development', 'Human computer interaction', NULL, NULL, 0),
(156, 'Dave wood', 'Interface Design. An introduction to visual communication in UI design', 'Human computer interaction', NULL, NULL, 0),
(157, 'Steven Heller', 'Design Literacy understanding graphic design', 'Human computer interaction', NULL, NULL, 0),
(158, 'John Clifford', 'Graphic Icons visionaries who shaped modern graphic design', 'Human computer interaction', NULL, NULL, 0),
(159, 'Steven Heller', 'Stop, Think, Go, Do_ How Typography and Graphic Design Influence Behavior', 'Human computer interaction', NULL, NULL, 0),
(160, 'Eddie Opara', 'Best Practices for Graphic Designers, Color Works_ Right Ways of Applying Color in Branding, Wayfinding, Information Design, Digital Environments and Pretty Much Everywhere Else', 'Human computer interaction', NULL, NULL, 0),
(161, 'Alex W. White', 'The Elements of Graphic Design', 'Human computer interaction', NULL, NULL, 0),
(162, 'Jennifer Inston', 'Graphic Design_ A Beginners Guide To Mastering The Art Of Graphic Design, Second Edition', 'Human computer interaction', NULL, NULL, 0),
(163, 'Sarah Dougher', '100 Habits of Successful Graphic Designers_ Insider Secrets from Top Designers on Working Smart and Staying Creative', 'Human computer interaction', NULL, NULL, 0),
(164, 'Timothy Samara', 'Typography workbook_ a real-world guide to using type in graphic design', 'Human computer interaction', NULL, NULL, 0),
(165, 'Timothy Samara', 'Graphic Designer\'s Essential Reference_ Visual Elements, Techniques, and Layout Strategies for Busy Designers', 'Human computer interaction', NULL, NULL, 0),
(166, 'Jan Murphy', 'Color A Practical Guide to Color and Its Uses in Art', 'Human computer interaction', NULL, NULL, 0),
(167, 'Patti Mollica', 'Special Subjects_ Basic Color Theory_ An Introduction to Color for Beginning Artists', 'Human computer interaction', NULL, NULL, 0),
(168, 'Bride M. Whelan', 'The Complete Color Harmony_ Expert Color Information for Professional Color Results', 'Human computer interaction', NULL, NULL, 0),
(169, 'Joseph stoddard', 'Expressive Painting_ Tips and Techniques for Practical Applications in Watercolor, Including Color Theory, Color Mixing, and Understanding Color Relationships', 'Human computer interaction', NULL, NULL, 0);

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
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
