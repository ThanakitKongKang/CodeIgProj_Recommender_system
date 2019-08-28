-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2019 at 02:09 PM
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
  `post_date` datetime DEFAULT NULL,
  `sub_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `b_rate` float DEFAULT NULL,
  `count_rate` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `author`, `book_name`, `book_type`, `content`, `post_date`, `sub_type`, `b_rate`, `count_rate`) VALUES
(1, 'Muhammad Zain ', 'Certified Management Accountant (CMA), Part 2', 'textbooks', 'CMA Part 2 - Financial Decision Making - 2019', '2018-11-12 01:37:24', 'BS', 4, NULL),
(2, 'Muhammad Zain', 'Certified Management Accountant (CMA), Part 1', 'textbooks', 'CMA Part 1 - Financial Reporting, Planning, Performance and Control - 2019 ', '2018-11-12 01:37:48', 'BS', 5, NULL),
(3, 'George Protonotarios', 'Trading the Decentralization of the Financial Systems', 'textbooks', 'A complete cryptocurrency trading guide for beginners and advanced cryptocurrency traders.    ', '2018-11-12 01:37:48', 'BS', 3.5, NULL),
(4, 'Jeannette Galvanek ', 'The Global Caregiving Gold Rush - Lifeworkx2021', 'textbooks', NULL, '2018-11-12 01:37:48', 'BS', NULL, NULL),
(5, 'Seopromotions5 ', 'Complete SEO Guide for Mucisians', 'textbooks', 'Do you take your music career serious? If so, check out our Music Promotion services created by Seo promotions 5 an expert on SEO PROMO!SEO remains mysterious and challenging for Musicians who which to use Search Engines. To promote their music /song/band. If Search Engine Optimization matters to...', '2018-11-12 01:42:28', 'BS', NULL, NULL),
(6, 'Edet Nsikak Bssey', 'Capital Budgeting', 'textbooks', 'This is an extract of my financial management e-book manuscript, \"A+ in Financial Management\". This section is just on capital budgeting, a key aspect of financial management that seems somewhat challenging for beginners and MBA. Enjoy the simplicity!', '2018-11-12 01:44:22', 'BS', NULL, NULL),
(7, 'Probrand ', 'Evolution of B2B Buying', 'textbooks', 'As 2017 begins to unfold, we’re already seeing how the big trends in technology are impacting day-to-day working lives. Businesses are continuing to embrace the cloud, mobility and data solutions in new and inventive ways.', '2018-11-12 01:44:59', 'BS', NULL, NULL),
(8, 'Rosina S Khan', 'The Dummies\' Guide to Compiler Design', 'textbooks', 'This book is useful for those who are interested in knowing the underlying principles of a Compiler that is used for compiling high-level programming languages. This book actually guides you step by step in a lucid and simple way how to design a compiler ultimately. I am guessing you have...', '2018-11-12 01:48:43', 'CS', 4, NULL),
(9, 'Prometheus MMS', 'Basics with Windows PowerShell V2', 'textbooks', 'Microsoft designed PowerShell to automate system tasks, such as batch processing, and to create systems management tools for commonly implemented processes.', '2018-11-12 01:49:28', 'CS', NULL, NULL),
(10, 'RG Infotech ', 'Whitepaper – How to launch a mobile app successfully!', 'textbooks', NULL, '2018-11-12 01:37:48', 'CS', NULL, NULL),
(11, 'Srinivas R Rao ', 'Bitcoin and Cryptocoin Technologies', 'textbooks', 'A classic disposition of a book which really has put in a great deal of substance in it as an eBook and a real structured book.Please see the contents and read them clearly with the figures given in each chapter clearly and read them . Memorize them , the concepts clearly......then u can easily...', '2018-11-12 01:50:43', 'CS', NULL, NULL),
(12, 'Mehak Bashir', 'Skip a heartbeat: OpenSSL Heartbleed Vulnerability & Prediction of Exploitation', 'textbooks', 'Skip a heartbeat: OpenSSL heartbleed vulnerability & prediction of exploitation based on CVSS using naive bayes algorithm.', '2018-11-12 01:51:17', 'CS', NULL, NULL),
(13, 'Daniel Selman', 'Java 3D Programming', 'textbooks', 'Java 3D is a client−side Java application programming interface (API) developed at Sun Microsystems for rendering interactive 3D graphics using Java. Using Java 3D you will be able to develop richly interactive 3D applications, ranging from immersive games to scientific visualization applications.', '2018-11-12 01:51:56', 'CS', NULL, NULL),
(14, 'Ian Ozsvald', 'High Performance Python (from Training at EuroPython 2011)', 'textbooks', 'Your Python code may run correctly, but you need it to run faster. By exploring the fundamental theory behind design choices, this practical guide helps you gain a deeper understanding of Python’s implementation. You’ll learn how to locate performance bottlenecks and significantly speed up...', '2018-11-12 01:52:48', 'CS', 5, NULL),
(15, 'Ramani Kumar V', 'Basic Electronics', 'textbooks', NULL, '2018-11-12 01:37:48', 'EN', NULL, NULL),
(16, 'Ramani Kumar V ', 'Analog Electronic Circuit Design (AECD)', 'textbooks', 'Why did I write this book? I am from the Industry. I had worked in Telecom R&D for nearly 35 years . I have been part of huge R&D teams of some of the best Telecom institutions of India So what? I had the fortune of working with hundreds of engineers everywhere...fresh engineers straight out of...', '2018-11-12 01:56:30', 'EN', NULL, NULL),
(17, 'Jan Grym', 'Semiconductor Technologies', 'textbooks', 'A study on semiconductor technologies and all aspects of semiconductor technology concerning materials, technological processes, and devices, including their modelling, design, integration, and manufacturing.', '2018-11-12 01:57:41', 'EN', NULL, NULL),
(18, 'Sunil Kumar Sing', 'Electricity and Magnetism', 'textbooks', 'A science textbook about electricity and magnetism that contains subjects on the theory of relativity, circuit laws, laws on electricity and magnetism, magnetic fields, motion, cyclotron, magnetic force and conductors.', '2018-11-12 01:58:17', 'EN', NULL, NULL),
(19, 'Susan Dean and Barbara Illowsky, Ph.D. ', 'Principles of Business Statistics', 'textbooks', 'This is a textbook on the Principles of Business Statistics. It covers topics on Sampling Data, Descriptive Statistics, The Normal Distribution, Confidence Interval, Hypothesis Testing and Linear Regression and Correlation.', '2018-11-12 01:59:56', 'MATH', NULL, NULL),
(20, 'John R. Slate, Ana Rojas-LeBouef.', 'Calculating Advanced Statistics', 'textbooks', 'This textbook will assist readers in conducting the more complicated analyses in the study of Advanced Statistics.', '2018-11-12 02:00:33', 'MATH', NULL, NULL),
(21, 'Charles B. Clapham ', 'Arithmetic for Engineers', 'textbooks', 'This document is the third edition of the series “Arithmetic for Engineers”. Another chapter focusing on Elementary Trigonometry has been added.', '2018-11-12 02:01:06', 'MATH', NULL, NULL),
(22, 'Siyavula', 'Mathematics Grade 2', 'textbooks', NULL, '2018-11-12 01:37:48', 'MATH', NULL, NULL),
(23, 'Rupinder Sekhon, UniqU, LLC ', 'Applied Finite Mathematics', 'textbooks', 'A teacher\'s resource in mathematics containing topics on linear equations, linear programming, mathematics of finance, sets and counting, probability, Markov chains, and game theory.', '2018-11-12 02:02:23', 'MATH', NULL, NULL),
(24, 'Reasonable Basic Algebra', 'Reasonable Basic Algebra', 'textbooks', 'A reference for students in basic Algebra covering topics on counting numbers and phrases, equalities and inequalities, addition, subtraction, signed number phrases, co-multiplication and values among others.', '2018-11-12 02:08:42', 'MATH', NULL, NULL),
(25, 'F H Pritchard ', 'Fifty Stories from UNCLE REMUS', 'childrenAudiobooks', 'A retelling of the famous Joel Chandler Harris\'s children stories of Brer Rabbit and Brer Fox. Adventures abound, amidst moral lessons.', '2018-11-13 23:10:35', 'AA', NULL, NULL),
(26, 'B G Williamson ', 'Dragon Farm', 'childrenAudiobooks', 'A short poem about two emerald dragons discovered in the summer’s heat. The narrator befriends them and builds a farm to tame them.', '2018-11-13 23:11:10', 'AA', NULL, NULL),
(28, 'Rudyard Kipling', 'Undertakers', 'childrenAudiobooks', 'Find out what a man-eating mugger (crocodile), an adjutant crane, and a jackal talk about while relaxing on a river bank one evening.', '2018-11-13 23:12:09', 'AA', NULL, NULL),
(29, 'Rudyard Kipling ', 'Toomai of The Elephants', 'childrenAudiobooks', 'This is about a character from the Jungle Book, Toomai, an elephant handler. His adventures and life lessons unfold in this delightful tale.', '2018-11-13 23:12:35', 'AA', NULL, NULL),
(30, 'Rudyard Kipling ', 'Rikki-Tikki-Tavi', 'childrenAudiobooks', 'Of Jungle Book fame, Rikki-Tikki-Tavi the mongoose lives in India, where he defends a family against venomous cobras', '2018-11-13 23:13:01', 'AA', NULL, NULL),
(31, 'Rudyard Kipling', 'The Jungle Book', 'childrenAudiobooks', NULL, '2018-11-12 01:37:48', 'CC', NULL, NULL),
(32, 'William J Forster ', 'Dragons - Two Dragons', 'childrenAudiobooks', NULL, '2018-11-12 01:37:48', 'CC', NULL, NULL),
(33, 'Arkadi Gaidar ', 'Blue Cup', 'childrenAudiobooks', 'This short story initial describes a tale of family conflict and social injustice, but ends with a message of love and understanding.', '2018-11-13 23:15:16', 'CC', NULL, NULL),
(34, 'Arkadi Gaidar ', 'Malchish Kibalchish', 'childrenAudiobooks', 'A young boy helps the Red Army fight the bourgeoisie. After being betrayed, he’s captured and tortured, but takes a secret to his grave.', '2018-11-13 23:15:59', 'CC', NULL, NULL),
(35, 'John Ruskin', 'King of The Golden River', 'childrenAudiobooks', 'In this fairy tale, the wind is personified and holds great sway over Austria\'s Treasure Valley. Two elders take on a dangerous challenge.', '2018-11-13 23:16:24', 'CC', NULL, NULL),
(36, 'Alexander Pushkin', 'Fisherman and The Goldfish', 'childrenAudiobooks', 'This tale is of a fisherman who catches a goldfish who promises to grant any wish in exchange for its freedom. Be careful what you wish for.', '2018-11-13 23:17:25', 'CC', NULL, NULL),
(37, 'Juliana Horatia Ewing', 'Dragons - Snap-Dragons', 'childrenAudiobooks', ' This forgotten classic is a tale of Christmas Eve, featuring none other than Father Christmas himself – and dragons!', '2018-11-13 23:34:13', 'AA', NULL, NULL),
(38, 'W H Hudson ', 'Little Boy Lost', 'childrenAudiobooks', 'A boy is lost in a jungle and natives steel his clothes. His adventure turns to understanding and acceptance of his new companions.', '2018-11-13 23:36:13', 'FT', NULL, NULL),
(39, 'Marion St John Webb', 'Little Round House', 'childrenAudiobooks', ' This clever fairytale adventure takes place inside a British mailbox. You would never guess what goes on in there.', '2018-11-13 23:37:15', 'FT', NULL, NULL),
(40, 'Saki', 'Story-Teller', 'childrenAudiobooks', 'Saki', '2018-11-13 23:39:29', 'FT', NULL, NULL),
(42, 'Kenneth Grahame', 'Dragons - Reluctant Dragon', 'childrenAudiobooks', 'A boy finds a poetry-loving dragon and befriends it, but the townspeople call St. George to slay it. A plot twist results in a happy ending.', '2018-11-13 23:42:33', 'FS', NULL, NULL),
(64, 'Charles Brockden Brown ', 'Wieland or the Transformation', 'classics', ' In this Gothic thriller, American novelist Charles Brockden Brown (1771-1810), tells the tale of a man beset by religious guilt that erupts into mania, making him an extreme danger to others. Download it now!', '2018-11-14 00:38:20', 'HC', NULL, NULL),
(43, 'Nikolai Gogol', 'Christmas Eve', 'childrenAudiobooks', 'supernatural and humours Ukrainian fairytale', '2018-11-13 23:43:33', 'FS', NULL, NULL),
(44, 'George Bernard Shaw ', 'Mrs. Warren\'s Profession', 'classics', 'The classic book, Mrs. Warren\'s Profession, by George Bernard Shaw.', '2018-11-13 23:44:22', 'DC', NULL, NULL),
(62, 'Carroll Watson Rankin', 'The Castaways of Pete\'s Patch', 'classics', ' The classic book, The Castaways of Pete\'s Patch, by Carroll Watson Rankin.', '2018-11-14 00:36:11', 'FC', NULL, NULL),
(63, 'John William Polidori', 'The Vampyre', 'classics', ' The \"Vampyre\" is a short work of prose fiction written in 1819 by John William Polidori. The work is often viewed as the progenitor of the romantic vampire genre of fantasy fiction. The work is described by Christopher Frayling as \"the first story successfully to fuse the disparate elements of...', '2018-11-14 00:37:43', 'HC', NULL, NULL),
(47, 'Rabindranath Tagore', 'The King of the Dark Chamber', 'classics', 'THE ORIGINAL BOOKS COLLECTION. Rabindranath Tagore (7 May 1861 – 7 August 1941), was a Bengali polymath who reshaped his region\'s literature and music. Author of Gitanjali and its \"profoundly sensitive, fresh and beautiful verse\", he became the first non-European to win the Nobel Prize in...', '2018-11-13 23:46:08', 'DC', NULL, NULL),
(48, 'William Shakespeare', 'Hamlet', 'classics', 'After Hamlet\'s father is killed by his brother, Claudius, Hamlet struggles with his vow to seek revenge by murdering Claudius.', '2018-11-13 23:47:04', 'DC', NULL, NULL),
(61, 'Leona Dalrymple ', 'Jimsy: The Christmas Kid (1915)', 'classics', ' The classic book, Jimsy: The Christmas Kid (1915), by Leona Dalrymple.', '2018-11-14 00:25:40', 'FC', NULL, NULL),
(50, 'Giovanni Boccaccio', 'The Decameron, Volume II', 'classics', ' The classic book, The Decameron, Volume II, by Giovanni Boccaccio.', '2018-11-13 23:48:22', 'FC', NULL, NULL),
(55, 'Giovanni Boccaccio', 'The Decameron, Volume I', 'classics', ' The classic book, The Decameron, Volume I, by Giovanni Boccaccio.', '2018-11-13 23:48:52', 'FC', NULL, NULL),
(65, 'Gaston Leroux', 'The Phantom of the Opera', 'classics', ' A disfigures musical genius haunts the catacombs under the Paris Opera and terrifies the community until he falls in love with Christine, a budding young singer.', '2018-11-14 00:38:47', 'HC', NULL, NULL),
(56, 'John Dewey', 'Democracy and Education: An Introduction to the Philosophy of Education', 'classics', ' The classic book, Democracy and Education: An Introduction to the Philosophy of Education, by John Dewey.', '2018-11-13 23:50:08', 'FC', NULL, NULL),
(66, 'Elizabeth Gaskell ', 'Lois the Witch', 'classics', ' In Salem, Massachusetts, Lois Barclay is charged with being a witch by others who have their own interests at heart', '2018-11-14 00:39:18', 'HC', NULL, NULL),
(67, 'Arthur Machen ', 'The Great God Pan', 'classics', ' This FREE e-Book literally caused a furor in London by readers who believed that the horrific events described within its covers were real. Download it today!', '2018-11-14 00:39:46', 'HC', NULL, NULL),
(68, 'Ann Radcliffe ', ' The Castles of Athlin and Dunbayne', 'classics', ' Years ago, when young Earl Osbert of Castle Athlin was a boy, his father was ambushed and slain by Baron Malcolm of Dunbayne. Now Osbert has come into his majority, and he\'s gone to avenge his father\'s murder. Download this FREE e-Book today!', '2018-11-14 00:40:19', 'HC', NULL, NULL),
(69, 'Nathaniel Hawthorne ', 'An Old Woman\'s Tale', 'classics', ' An Old Woman\'s Tale by Nathaniel Hawthorne.', '2018-11-14 00:40:49', 'HC', NULL, NULL),
(70, 'Bram Stoker', 'The Lady of the Shroud', 'classics', ' Rupert is the outcast in his family and must endure the difficult life of living in a castle in the Blue Mountains in order to inherit a fortune from his uncle.', '2018-11-14 00:41:17', 'HC', NULL, NULL),
(71, 'Matthew Lewis ', 'The Monk', 'classics', ' Ambrosio, a monk, succumbs to the temptations of the young, Antonia.', '2018-11-14 00:41:46', 'HC', NULL, NULL),
(72, 'Oliver Onions', 'The Beckoning Fair One', 'classics', ' Download this FREE e-Book about a novelist who retreats to an abandoned house in London, where he becomes enthralled by an 18th Century spirit; and his contact with the outside world gradually diminishes. Download it now!', '2018-11-14 00:42:16', 'HC', NULL, NULL),
(73, 'Florence L. Barclay ', ' Through the Postern Gate: A Romance in Seven Days', 'classics', ' The classic book, Through the Postern Gate: A Romance in Seven Days, by Florence L. Barclay.', '2018-11-14 00:43:29', 'RC', NULL, NULL),
(74, 'Daisy Ashford', ' The Young Visiters, or Mr. Salteena\'s Plan', 'classics', ' The classic book, The Young Visiters, or Mr. Salteena\'s Plan, by Daisy Ashford.', '2018-11-14 00:44:01', 'RC', NULL, NULL),
(75, 'Elinore Pruitt Stewart', ' Letters of a Woman Homesteader', 'classics', ' The classic book, Letters of a Woman Homesteader, by Elinore Pruitt Stewart.', '2018-11-14 00:44:28', 'RC', NULL, NULL),
(76, 'Ella Cheever Thayer ', ' Wired Love: A Romance of Dots and Dashes', 'classics', ' The classic book, Wired Love: A Romance of Dots and Dashes, by Ella Cheever Thayer.', '2018-11-14 00:44:59', 'RC', NULL, NULL),
(77, 'Florence L. Barclay ', 'The Rosary', 'classics', ' The classic book, The Rosary, by Florence L. Barclay.', '2018-11-14 00:45:37', 'RC', NULL, NULL),
(78, 'grenepages.com ', 'Grenepages issue 18', 'others', ' I am right here on earth, but I can feel heaven\'s presence. I can be here, right here on earth but I live like a king, a son of the Most High.Yes, the world may be full of corruption, but I have been re-born to live a life of RIGHTEOUSNESS; a life of GLORY. There are outbreaks of diseases here and...', '2018-11-14 00:46:59', 'other', NULL, NULL),
(79, 'Audiation Magazine ', 'AM040', 'others', 'September 2017 Issue 40 features an interview with tech-house artist Paul Darey and Coldplay\'s Full of Dreams Tour in photos.', '2018-11-14 00:47:43', 'other', NULL, NULL),
(80, 'Audiation Magazine ', 'AM039', 'others', 'August 2017 Issue 39 features an interview with glam rock star INDYA and festival coverage from Chicago\'s Windy City Smokeout.', '2018-11-14 00:48:13', 'other', NULL, NULL),
(81, 'Luv Gini', 'A New York Kind Of Love', 'others', ' A book about a woman\'s perspective on men in New York City. Strong language and subject matter.', '2018-11-14 00:49:11', 'other', NULL, NULL),
(82, 'Mark Moran ', 'Healthy Heart Remedy', 'others', ' You\'re One Step Closer To Unlocking The Secrets To Vitality And A Healthy Heart...', '2018-11-14 00:49:36', 'other', NULL, NULL),
(83, 'Jakayima Batista ', 'Lost Angels Excerpt', 'others', ' Is there something she does not want to get? I am really doubtful about it. She wants everything and everyone. In this conversation she would be the center of interest. Oh my goodness, does it REALLY matter? I do not think so. For centuries and centuries the big question has always been the same...', '2018-11-14 00:50:03', 'other', NULL, NULL),
(84, 'Sam O\'Rourke ', 'Three Of Swords', 'others', ' Please Note: I will only be publishing half of the book here. The complete book will be available on Amazon.com for $0.99c for anyone interested in finishing the story. :)Nightmares haunt Mia O\'Halloran. Having given birth to two babies in her early teens, one the product of a vicious rape. She...', '2018-11-14 00:50:33', 'other', NULL, NULL),
(85, 'Liz Swann Miller ', 'Red Tea Detox', 'others', ' The Red Tea Detox is a brand-new cleansing program that detoxifies the body and sheds pounds quickly and safely. It allows almost anyone to lose 14lbs in just 14 days. Based on more than a decade of research spanning over 500 medical studies as well as almost three years of real-world testing...', '2018-11-14 00:51:27', 'other', 5, NULL),
(86, 'Srinidhi Ranganathan ', ' 12 Social Media Hacks That Work: Growth Hacker Granny', 'others', ' I am Growth Hacking Granny and I am going to bring in new digital marketing ideas or growth hacks to skyrocket your product through this book series. This first book of 12 social media growth hacks is not a marketing or a growth hacking book for social media ideas; it\'s a step-by-step -hands on...', '2018-11-14 00:51:55', 'other', NULL, NULL),
(87, 'FirstCall - We Add Value', 'Work Smart, Go Virtual', 'others', 'Virtuаl оffiсе ѕоlutiоnѕ have bееn аrоund fоr a whilе nоw, but thе ѕеrviсеѕ thеу оffеr hаvе сhаngеd drаmаtiсаllу over timе аѕ tесhnоlоgу hаѕ сhаngеd. If уоu аrе a new business owner оr entrepreneur, then the wide range of services саn bе a...', '2018-11-14 00:52:25', 'other', NULL, NULL),
(88, 'Ranga Iyer', 'Odyssey Of A Great Lakes Sailor', 'others', ' This odyssey is about my life experiences as a Chief engineer on board -Canadian Lakers as they were called.It is also an expose into the inside workings of a Shipping company where i gave my blood ,sweat and tears to make a living as a new immigrant in a G-8 country.A professional Marine...', '2018-11-14 00:53:02', 'other', NULL, NULL),
(89, 'LA Wilson ', 'Viral Team Builder', 'others', 'Just give away this free e-book...IF you can click a mouse, YOU can earn with this free e-book.Begin earning in just 10 minutes from now.', '2018-11-14 00:53:40', 'other', NULL, NULL),
(90, 'Brian Flatt ', ' The 3 Week Diet Book PDF with Review', 'others', ' The 3 Week Diet is a real new diet promising quick weight loss. It’s creator, Brian Flatt, actually claims that you can lose between 12 and 23 pounds of real fat in just 21 days. The 3 Week Diet Review', '2018-11-14 00:54:22', 'other', NULL, NULL),
(91, 'Dr.Eswara Ramanan', 'CPA Ca$h Magnet', 'others', 'Make money with CPA offers. This is the best and simple guide to understand how the CPA offers work. Download and start making instant cash today. You can not miss this guide if you are a person looking for easy way to make money online in a legitimate way.', '2018-11-14 00:55:08', 'other', NULL, NULL);

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
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
