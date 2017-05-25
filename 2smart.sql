-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2017 at 10:12 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2smart`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL DEFAULT '0' COMMENT 'กลุ่ม',
  `question` varchar(50) DEFAULT NULL COMMENT 'คำถาม',
  `answer` enum('A','B','C','D') NOT NULL COMMENT 'คำตอบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='เฉลย';

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `section_id`, `question`, `answer`) VALUES
(1, 11, 'ไก่กับไข่อะไรเกิดก่อน', 'A'),
(2, 11, '', 'B'),
(3, 17, 'อะไรเกิดก่อนไข่', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_code` varchar(50) NOT NULL COMMENT 'รหัสรายวิชา',
  `course_name` varchar(50) NOT NULL COMMENT 'ชื่อรายวิชา',
  `course_name_eng` varchar(50) DEFAULT NULL COMMENT 'Name Course'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_code`, `course_name`, `course_name_eng`) VALUES
(4, '001111', 'ภาษาอังกฤษพื้นฐาน', 'Fundamental  English'),
(5, '005171', 'ชีวิตและสุขภาพ', 'Life  and  Health'),
(6, '005172', 'การจัดการการดำเนินชีวิต', 'Living Management'),
(7, '235011', 'ตรรกะพื้นฐานและการแก้ปัญหา', 'Basic Logic and Problem Solving'),
(8, '241151', 'แคลคูลัส 1', 'Calculus I'),
(9, '244101', 'ฟิสิกส์ 1', 'Physics I'),
(10, '2214', 'ว่ายน้ำ', '');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1488381595),
('m140209_132017_init', 1488381600),
('m140403_174025_create_account_table', 1488381601),
('m140504_113157_update_tables', 1488381605),
('m140504_130429_create_token_table', 1488381606),
('m140830_171933_fix_ip_field', 1488381608),
('m140830_172703_change_account_table_name', 1488381608),
('m141222_110026_update_ip_field', 1488381610),
('m141222_135246_alter_username_length', 1488381610),
('m150614_103145_update_social_account_table', 1488381613),
('m150623_212711_fix_username_notnull', 1488381613),
('m151218_234654_add_timezone_to_profile', 1488381614),
('m160929_103127_add_last_login_at_to_user_table', 1488381614);

-- --------------------------------------------------------

--
-- Table structure for table `opensemester`
--

CREATE TABLE `opensemester` (
  `id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL COMMENT 'ภาคเรียน',
  `year` year(4) NOT NULL COMMENT 'ปีการศึกษา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='เปิดภาคเรียน';

--
-- Dumping data for table `opensemester`
--

INSERT INTO `opensemester` (`id`, `semester_id`, `year`) VALUES
(2, 1, 2016),
(3, 2, 2016),
(4, 3, 2016),
(5, 4, 2016),
(6, 1, 2017),
(7, 2, 2017),
(8, 3, 2017),
(9, 4, 2017),
(10, 1, 2018),
(11, 2, 2018),
(12, 3, 2018),
(13, 4, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '0' COMMENT 'สถานะ',
  `person_code` varchar(50) NOT NULL DEFAULT '0' COMMENT 'รหัส',
  `person_title` enum('นาย','นางสาว') NOT NULL COMMENT 'คำนำหน้า',
  `person_name` varchar(50) NOT NULL DEFAULT '0' COMMENT 'ชื่อ',
  `person_lastname` varchar(50) NOT NULL DEFAULT '0' COMMENT 'นามสกุล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `status_id`, `person_code`, `person_title`, `person_name`, `person_lastname`) VALUES
(3, 1, '57022220', 'นาย', 'เกียรติศักดิ์', 'พุ่่มพวง'),
(4, 2, '1231', 'นางสาว', 'วชิระ', 'มโนกุล');

-- --------------------------------------------------------

--
-- Table structure for table `person_status`
--

CREATE TABLE `person_status` (
  `id` int(11) NOT NULL,
  `status_thai` varchar(50) NOT NULL DEFAULT '0' COMMENT 'สถานะ',
  `status_eng` varchar(50) NOT NULL DEFAULT '0' COMMENT 'status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `person_status`
--

INSERT INTO `person_status` (`id`, `status_thai`, `status_eng`) VALUES
(1, 'นักเรียน', 'student'),
(2, 'อาจารย์', 'teaher');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'เกียรติศักดิ์ พุ่มพวง', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'ป่าซาง', '', '', 'Pacific/Kiritimati'),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `section_value` varchar(50) NOT NULL DEFAULT '0' COMMENT 'กลุ่ม',
  `create` date NOT NULL DEFAULT '0000-00-00' COMMENT 'สร้างเมื่อ',
  `course_id` int(11) NOT NULL,
  `opensemester_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `section_value`, `create`, `course_id`, `opensemester_id`) VALUES
(11, 'sec5', '2017-04-23', 4, 3),
(12, 'sec5', '2017-04-23', 4, 3),
(13, 'ม.3/2', '2017-04-25', 8, 10),
(14, 'asd', '2017-04-26', 7, 6),
(15, 'gg', '2017-04-26', 6, 7),
(16, 'ป.6/2', '2017-04-27', 10, 5),
(17, 'sec9', '2017-04-30', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `section_person`
--

CREATE TABLE `section_person` (
  `id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL DEFAULT '0' COMMENT 'รหัสบุคคล',
  `section_id` int(11) NOT NULL DEFAULT '0' COMMENT 'กลุ่ม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section_person`
--

INSERT INTO `section_person` (`id`, `person_id`, `section_id`) VALUES
(1, 3, 11),
(2, 3, 12),
(3, 4, 14);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `semester_thai` varchar(45) NOT NULL COMMENT 'ภาคเรียนภาษาไทย',
  `semester_eng` varchar(45) NOT NULL COMMENT 'ภาคเรียนภาษาอังกฤษ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ภาคเรียน';

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester_thai`, `semester_eng`) VALUES
(1, 'กลางภาค', 'Midterm'),
(2, 'ปลายภาค', 'Final'),
(3, 'ภาคฤดูร้อน', 'Summer'),
(4, 'คะแนนเก็บ', 'Score');

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `social_account`
--

INSERT INTO `social_account` (`id`, `user_id`, `provider`, `client_id`, `data`, `code`, `created_at`, `email`, `username`) VALUES
(7, 9, 'google', '111401711651848465404', '{"kind":"plus#person","etag":"\\"Sh4n9u6EtD24TM0RmWv7jTXojqc/D74pHHtclRNe8U1WHBbg0F9k1yE\\"","gender":"male","emails":[{"value":"keattisak.phompoung@gmail.com","type":"account"}],"objectType":"person","id":"111401711651848465404","displayName":"NETnaJA eiei","name":{"familyName":"eiei","givenName":"NETnaJA"},"url":"https://plus.google.com/111401711651848465404","image":{"url":"https://lh4.googleusercontent.com/-0PcDSpHnsBo/AAAAAAAAAAI/AAAAAAAAAV0/p7a-gDf7PYk/photo.jpg?sz=50","isDefault":false},"organizations":[{"name":"มหาวิทยาลัยพะเยา","title":"วิศวะซอพแวร์","type":"school","startDate":"2014","primary":true}],"placesLived":[{"value":"จังหวัด พะเยา ประเทศไทย","primary":true},{"value":"จังหวัดลำพูน"}],"isPlusUser":true,"language":"th","circledByCount":1,"verified":false,"cover":{"layout":"banner","coverPhoto":{"url":"https://lh3.googleusercontent.com/WBbAF5FduGRZwT8wyfvMUeZnIZKipYFoj8OMaDTZWvoWHX6DkRlTZM42GPemGhKk2T-AZJo9=s630-fcrop64=1,41480000ff7bac09","height":587,"width":940},"coverInfo":{"topImageOffset":0,"leftImageOffset":0}}}', NULL, NULL, 'keattisak.phompoung@gmail.com', NULL),
(9, NULL, 'google', '115711208548225075544', '{"kind":"plus#person","etag":"\\"Sh4n9u6EtD24TM0RmWv7jTXojqc/eWv5j7o32JLkhqxF-xgHgJS6o7c\\"","emails":[{"value":"57022220@up.ac.th","type":"account"}],"objectType":"person","id":"115711208548225075544","displayName":"เกียรติศักดิ์ พุ่มพวง","name":{"familyName":"พุ่มพวง","givenName":"เกียรติศักดิ์"},"url":"https://plus.google.com/115711208548225075544","image":{"url":"https://lh6.googleusercontent.com/-sNW0V6kFzA4/AAAAAAAAAAI/AAAAAAAAAB0/HiJKzhPkKEo/photo.jpg?sz=50","isDefault":false},"isPlusUser":true,"language":"th","circledByCount":0,"verified":false,"domain":"up.ac.th"}', '13284cabbb344bd32b29728785f9bbd6', NULL, '57022220@up.ac.th', NULL),
(10, 10, 'google', '102503051079621501175', '{"kind":"plus#person","etag":"\\"Sh4n9u6EtD24TM0RmWv7jTXojqc/I5edjS9oTimOQBCDgE6xoy4qzZo\\"","emails":[{"value":"smartpongvarid@gmail.com","type":"account"}],"objectType":"person","id":"102503051079621501175","displayName":"พงษ์วริษฐ์ มณีวรรณ์","name":{"familyName":"มณีวรรณ์","givenName":"พงษ์วริษฐ์"},"image":{"url":"https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=50","isDefault":true},"isPlusUser":false,"language":"en","verified":false}', NULL, NULL, NULL, NULL),
(11, 11, 'facebook', '1250128885073283', '{"name":"Keattisak Phompoung","email":"one_piece51120@hotmail.com","id":"1250128885073283"}', NULL, NULL, NULL, NULL),
(12, 12, 'google', '111642334282943919174', '{"kind":"plus#person","etag":"\\"Sh4n9u6EtD24TM0RmWv7jTXojqc/0Yyi_l9KfVNxmGQMLG4xP6budrU\\"","emails":[{"value":"pongvarid@gmail.com","type":"account"}],"objectType":"person","id":"111642334282943919174","displayName":"พงษ์วริษฐ์ มณีวรรณ์","name":{"familyName":"มณีวรรณ์","givenName":"พงษ์วริษฐ์"},"url":"https://plus.google.com/111642334282943919174","image":{"url":"https://lh3.googleusercontent.com/-p2L9_a7mGzg/AAAAAAAAAAI/AAAAAAAAABA/jtbHvVfbX2A/photo.jpg?sz=50","isDefault":false},"placesLived":[{"value":"ขาณุวรลักษบุรี","primary":true}],"isPlusUser":true,"language":"th","circledByCount":6,"verified":false}', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(5, '-cst5mV1wYYlwrL0b-_osVxyPExsIRyu', 1488391150, 0),
(9, 'Lc9Kjm3JNM0Ef9wikCI0ZjH8oU_GyXJ4', 1492542616, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `last_login_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`) VALUES
(5, 'user', 'axcxzas@asd.com', '$2y$12$dZXBm8WT/w96fJOTdibypu843iNaWtJF8HI3jAO.0i90I.RTV/lrO', 'zGddl9jGO7SML8am4I62x1yA97Qhe2pA', NULL, NULL, 1493109754, '::1', 1488391150, 1488391150, 0, NULL),
(6, 'net', 'zxcvb@asd.com', '$2y$12$V72Cc9tUZl/gCP1fYmELLu4HCbQ3Qhn35cn42kFW2/9A3rx3nmRBi', 'g9g_kH1mOloW-f2lZePIVOaE1_vnd7fK', 1488395047, NULL, NULL, '::1', 1488395047, 1488395047, 0, 1488395057),
(9, 'admin', 'keattisak.phompoung@gmail.com', '$2y$12$2ws5TcdXIyeZsmoOuQYvU.agiTynrp4MNsF4dI7oZ/DDHk/Qlo/JC', 'wfud54G8D3wzSz13K-2OD03cwEPy0t98', 1492542718, NULL, NULL, '::1', 1492542616, 1492542616, 0, 1495676554),
(10, 'test', 'smartpongvarid@gmail.com', '$2y$12$Pc.uJmC40faV5Yd5EwNzx.6oK2xtLH3If3iZvkAZPqnV6Glg50X7m', 'bDxG2O7VTHzfqRMMv8jLNYDtGEJ9BqbS', 1492939045, NULL, NULL, '::1', 1492939045, 1492939045, 0, NULL),
(11, 'NesKub', 'one_piece51120@hotmail.com', '$2y$12$k3iGkM.WJd40uqkzzHfTT.oPxPhbXRutlYYdWFUnEcp/m2oYLOn8C', 'hXqN-qMZFgqQEko-u0cVpnqBN3Xuu8Nb', 1492939112, NULL, NULL, '::1', 1492939112, 1492939112, 0, NULL),
(12, 'pongvarid', 'pongvarid@gmail.com', '$2y$12$StBuI0ex/WTFZlVq7zxFIu0X1vRY1df/wyqI70YGToqaUUns3ZCqO', 'rMcr2QfM7EOK67G2SoRtwdKkYm0bhvTW', 1492958953, NULL, NULL, '::1', 1492958952, 1492958952, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_answer_section` (`section_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `opensemester`
--
ALTER TABLE `opensemester`
  ADD PRIMARY KEY (`id`,`semester_id`),
  ADD KEY `fk_opensemester_semester_idx` (`semester_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_person_person_status` (`status_id`);

--
-- Indexes for table `person_status`
--
ALTER TABLE `person_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_section_course` (`course_id`),
  ADD KEY `FK_section_opensemester` (`opensemester_id`);

--
-- Indexes for table `section_person`
--
ALTER TABLE `section_person`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_section_person_person` (`person_id`),
  ADD KEY `FK_section_person_section` (`section_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `opensemester`
--
ALTER TABLE `opensemester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `person_status`
--
ALTER TABLE `person_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `section_person`
--
ALTER TABLE `section_person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `FK_answer_section` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `opensemester`
--
ALTER TABLE `opensemester`
  ADD CONSTRAINT `fk_opensemester_semester` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `FK_person_person_status` FOREIGN KEY (`status_id`) REFERENCES `person_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `FK_section_course` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_section_opensemester` FOREIGN KEY (`opensemester_id`) REFERENCES `opensemester` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `section_person`
--
ALTER TABLE `section_person`
  ADD CONSTRAINT `FK_section_person_person` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_section_person_section` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
