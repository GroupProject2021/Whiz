-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2021 at 06:19 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `whiz_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `phone_number`, `user_role`) VALUES
(1, 'whizweblk@gmail.com', 114555544, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `adminoffersgovernmentcourse`
--

CREATE TABLE `adminoffersgovernmentcourse` (
  `admin_id` int(11) NOT NULL,
  `gov_course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aladmissiblestreamsubject`
--

CREATE TABLE `aladmissiblestreamsubject` (
  `stream_sbj_id` int(11) NOT NULL,
  `sub1_id` int(11) NOT NULL,
  `sub2_id` int(11) NOT NULL,
  `sub3_id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aladmissiblestreamsubjectselected`
--

CREATE TABLE `aladmissiblestreamsubjectselected` (
  `stu_id` int(11) NOT NULL,
  `stream_sbj_id` int(11) NOT NULL,
  `ol_sub1_id` int(11) NOT NULL,
  `ol_sub2_id` int(11) NOT NULL,
  `ol_sub3_id` int(11) NOT NULL,
  `ol_sub1_grade` char(1) NOT NULL,
  `ol_sub2_grade` char(1) NOT NULL,
  `ol_sub3_grade` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `alqualifiedstudent`
--

CREATE TABLE `alqualifiedstudent` (
  `stu_id` int(11) NOT NULL,
  `al_school` varchar(255) NOT NULL,
  `stream` varchar(20) NOT NULL,
  `z_score` decimal(5,4) DEFAULT NULL,
  `al_district` varchar(100) NOT NULL,
  `al_general_test_grade` int(11) NOT NULL,
  `al_general_english_grade` char(1) NOT NULL,
  `al_sub1_id` int(11) NOT NULL,
  `al_sub1_grade` char(1) NOT NULL,
  `al_sub2_id` int(11) NOT NULL,
  `al_sub2_grade` char(1) NOT NULL,
  `al_sub3_id` int(11) NOT NULL,
  `al_sub3_grade` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alqualifiedstudent`
--

INSERT INTO `alqualifiedstudent` (`stu_id`, `al_school`, `stream`, `z_score`, `al_district`, `al_general_test_grade`, `al_general_english_grade`, `al_sub1_id`, `al_sub1_grade`, `al_sub2_id`, `al_sub2_grade`, `al_sub3_id`, `al_sub3_grade`) VALUES
(4, 'Ananda College', '4', '3.1088', 'Colombo', 89, 'A', 44, 'A', 45, 'A', 47, 'A'),
(5, 'Ananda college', '4', '3.8970', 'Colombo', 93, 'A', 44, 'A', 45, 'A', 47, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `alsubject`
--

CREATE TABLE `alsubject` (
  `al_sub_id` int(11) NOT NULL,
  `al_sub_name` varchar(255) NOT NULL,
  `al_stream_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alsubject`
--

INSERT INTO `alsubject` (`al_sub_id`, `al_sub_name`, `al_stream_id`) VALUES
(1, 'Arabic', 1),
(2, 'Art', 1),
(3, 'Bharatha Natayam', 1),
(4, 'Buddhism', 1),
(5, 'Buddhist Civilization', 1),
(6, 'Chinese', 1),
(7, 'Christian Civilization', 1),
(8, 'Christianity', 1),
(9, 'Communication and Media Studies', 1),
(10, 'Dance', 1),
(11, 'Economics', 1),
(12, 'English', 1),
(13, 'French', 1),
(14, 'Geography', 1),
(15, 'German', 1),
(16, 'Greek and Roman Civilization', 1),
(17, 'Hindi Language', 1),
(18, 'Hindu Civilization', 1),
(19, 'Hinduism', 1),
(20, 'History', 1),
(21, 'Home Economics', 1),
(22, 'Islam', 1),
(23, 'Islamic Civilization', 1),
(24, 'Japan Language', 1),
(25, 'Logic and Scientific Method', 1),
(26, 'Oriental Music', 1),
(27, 'Pali Language', 1),
(28, 'Political Science', 1),
(29, 'Russia', 1),
(30, 'Sanskrit', 1),
(31, 'Sinhala', 1),
(32, 'Tamil', 1),
(33, 'Western Music', 1),
(34, 'Accounting', 2),
(35, 'Business', 2),
(36, 'Statistics Business', 2),
(37, 'Studies Economics', 2),
(38, 'Agriculture', 3),
(39, 'Bio System Technology', 3),
(40, 'Biology', 3),
(41, 'Chemistry', 3),
(42, 'Physics', 3),
(43, 'Science for Technology', 3),
(44, 'Chemistry', 4),
(45, 'Combine Mathematics', 4),
(46, 'Higher Mathematics', 4),
(47, 'Physics', 4),
(48, 'Agro Technology', 5),
(49, 'Engineering Technology', 5),
(50, 'General Information Technology', 5),
(51, 'Information & Communication Technology', 5);

-- --------------------------------------------------------

--
-- Table structure for table `applicablecourcesforjobs`
--

CREATE TABLE `applicablecourcesforjobs` (
  `course_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `applicablestreamsforcourses`
--

CREATE TABLE `applicablestreamsforcourses` (
  `st_sub_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `beginnerstudent`
--

CREATE TABLE `beginnerstudent` (
  `stu_id` int(11) NOT NULL,
  `school` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commentinteractions`
--

CREATE TABLE `commentinteractions` (
  `comment_interaction_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `comment_interaction` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentinteractions`
--

INSERT INTO `commentinteractions` (`comment_interaction_id`, `user_id`, `comment_id`, `comment_interaction`) VALUES
(1, 4, 1, 'liked'),
(2, 5, 2, 'liked'),
(3, 2, 4, 'liked'),
(4, 3, 4, 'liked'),
(5, 3, 6, 'liked'),
(6, 4, 4, 'liked'),
(7, 4, 7, 'disliked');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` text NOT NULL,
  `ups` int(11) DEFAULT NULL,
  `downs` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `content`, `ups`, `downs`, `created_at`) VALUES
(1, 2, 4, 'Sir can you do sessions for java as well?', 1, 0, '2021-10-24 19:06:19'),
(2, 1, 5, 'Do companies participate in this session?', 1, 0, '2021-10-24 19:07:13'),
(3, 2, 4, 'Sir can we have record permissions for your sessions or recorded video of session?', 0, 0, '2021-10-24 19:10:12'),
(4, 4, 2, 'What kind of jobs can get from this course?', 3, 0, '2021-10-24 19:31:08'),
(6, 4, 3, 'What is the duration of this course?', 1, 0, '2021-10-24 19:32:45'),
(7, 4, 4, 'Will be java covered by this course?', 0, 1, '2021-10-24 19:33:34'),
(8, 3, 5, 'Do you expect previous experience for this job?', 0, 0, '2021-10-24 19:36:21');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `current_emplyee_amount` int(11) NOT NULL,
  `company_size` int(11) NOT NULL,
  `registered` varchar(3) NOT NULL,
  `overview` varchar(255) NOT NULL,
  `services` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `current_emplyee_amount`, `company_size`, `registered`, `overview`, `services`) VALUES
(7, 200, 1000, 'Yes', 'We are one of the leading IT comppany in the island', 'Web development, Industrial Computer system design, Network administation');

-- --------------------------------------------------------

--
-- Table structure for table `connections`
--

CREATE TABLE `connections` (
  `connection_id` int(11) NOT NULL,
  `from_user_id` int(11) DEFAULT NULL,
  `to_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `connections`
--

INSERT INTO `connections` (`connection_id`, `from_user_id`, `to_user_id`) VALUES
(1, 2, 6),
(2, 2, 7),
(3, 2, 8),
(4, 3, 6),
(5, 3, 7),
(6, 3, 8),
(7, 4, 6),
(8, 4, 7),
(9, 4, 8),
(10, 4, 9),
(11, 5, 7),
(12, 5, 8),
(13, 8, 4),
(14, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_content` varchar(500) NOT NULL,
  `provide_degree` varchar(100) NOT NULL,
  `course_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`district_id`, `district_name`) VALUES
(1, 'Colombo'),
(2, 'Gampaha'),
(3, 'Kalutara'),
(4, 'Kandy'),
(5, 'Matale'),
(6, 'Nuwara Eliya'),
(7, 'Galle'),
(8, 'Matara'),
(9, 'Hambanthota'),
(10, 'Jaffna'),
(11, 'Mannar'),
(12, 'Vauniya'),
(13, 'Mulathivu'),
(14, 'Kilinochchi'),
(15, 'Batticaloa'),
(16, 'Ampara'),
(17, 'Trincomalee'),
(18, 'Kurunegala'),
(19, 'Puttalam'),
(20, 'Anuradhapura'),
(21, 'Polonnaruwa'),
(22, 'Badulla'),
(23, 'Monaragala'),
(24, 'Rathnapura'),
(25, 'Kegalle'),
(26, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `govermentuniversity`
--

CREATE TABLE `govermentuniversity` (
  `gov_uni_id` int(11) NOT NULL,
  `uni_name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `world_rank` int(11) DEFAULT NULL,
  `student_amount` int(11) DEFAULT NULL,
  `graduate_job_rate` int(11) DEFAULT NULL,
  `uni_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `govermentuniversity`
--

INSERT INTO `govermentuniversity` (`gov_uni_id`, `uni_name`, `description`, `world_rank`, `student_amount`, `graduate_job_rate`, `uni_type`) VALUES
(1, 'University of Colombo', NULL, NULL, NULL, NULL, NULL),
(2, 'University of Peradeniya', NULL, NULL, NULL, NULL, NULL),
(3, 'University of Sri Jayawardenepura', NULL, NULL, NULL, NULL, NULL),
(4, 'University of Kelaniya', NULL, NULL, NULL, NULL, NULL),
(5, 'University of Moratuwa', NULL, NULL, NULL, NULL, NULL),
(6, 'University of Jaffna', NULL, NULL, NULL, NULL, NULL),
(7, 'University of Ruhuna', NULL, NULL, NULL, NULL, NULL),
(8, 'Eastern University, Sri Lanka', NULL, NULL, NULL, NULL, NULL),
(9, 'South Eastern University of Sri Lanka ', NULL, NULL, NULL, NULL, NULL),
(10, 'Rajarata University of Sri Lanka ', NULL, NULL, NULL, NULL, NULL),
(11, 'Sabaragamuwa University of Sri Lanka', NULL, NULL, NULL, NULL, NULL),
(12, 'Wayamba University of Sri Lanka', NULL, NULL, NULL, NULL, NULL),
(13, 'Uva Wellassa University of Sri Lanka', NULL, NULL, NULL, NULL, NULL),
(14, 'University of the Visual & Performing Arts', NULL, NULL, NULL, NULL, NULL),
(15, 'Sripalee Campus, University of Colombo', NULL, NULL, NULL, NULL, NULL),
(16, 'Trincomalee Campus, Eastern University, Sri Lanka', NULL, NULL, NULL, NULL, NULL),
(17, 'Vavuniya Campus, University of Jaffna', NULL, NULL, NULL, NULL, NULL),
(18, 'Institute of Indigenous Medicine, University of Colombo', NULL, NULL, NULL, NULL, NULL),
(19, 'Gampaha Wickramaarachchi Ayurveda Institute, University of Colombo', NULL, NULL, NULL, NULL, NULL),
(20, 'University of Colombo School of Computing', NULL, NULL, NULL, NULL, NULL),
(21, 'Swami Vipulananda Institure of Aesthetic Studies, Eastern University, Sri Lanka', NULL, NULL, NULL, NULL, NULL),
(22, 'Ramanathan Academy of Fine Arts, University of Jaffna', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `governmentcourse`
--

CREATE TABLE `governmentcourse` (
  `gov_course_id` int(11) NOT NULL,
  `gov_course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `governmentcourse`
--

INSERT INTO `governmentcourse` (`gov_course_id`, `gov_course_name`) VALUES
(1, 'Medicine'),
(2, 'Dental Surgery'),
(3, 'Veterinary Science'),
(4, 'Agriculture'),
(5, 'Food Science & Nutrition'),
(6, 'Biological Science'),
(7, 'Applied Sciences(Biological Science)'),
(8, 'Engineering'),
(9, 'Engineering(EM)'),
(10, 'Engineering(TM)'),
(11, 'Quantity Surveying'),
(12, 'Computer Science'),
(13, 'Physical Science'),
(14, 'Surveying Science'),
(15, 'Applied Sciences(Physical Science)'),
(16, 'Management'),
(17, 'Estate Management & Valuation'),
(18, 'Commerce'),
(19, 'Arts'),
(20, 'Arts(SP) - Mass Media'),
(21, 'Arts(SAB)'),
(22, 'Management Studies(TV)'),
(23, 'Architecture'),
(24, 'Design'),
(25, 'Law'),
(26, 'Information Technology(IT)'),
(27, 'Management and Information Technology(MIT)'),
(28, 'Management(Public) Special'),
(29, 'Communication Studies'),
(30, 'Town & Country Planning'),
(31, 'Peace and Conflict Resolution'),
(32, 'Ayurvedic Medicine and Surgery'),
(33, 'Unani Medicine and Surgery'),
(34, 'Fashion Design & Product Development'),
(35, 'Food Science & Technology'),
(36, 'Siddha Medicine & Surgery'),
(37, 'Nursing'),
(38, 'Information and Communication Technology(ICT)'),
(39, 'Agricultural Technology & Management'),
(41, 'Arts(SP) - Performing Arts'),
(50, 'Health Promotion'),
(51, 'Pharmacy'),
(52, 'Medical Laboratory Sciences'),
(53, 'Radiography'),
(54, 'Physiotherapy'),
(55, 'Environmental Conversation & Management'),
(56, 'Facilities Management'),
(57, 'Transport & Logistics Management'),
(58, 'Molecular Biology & Biochemistry'),
(59, 'Industrial Statistics & Mathematical Finance'),
(60, 'Statistics & Operations Research'),
(61, 'Computation & Management'),
(62, 'Fisheries & Marine Sciences'),
(63, 'Islamic Studies'),
(64, 'Science and Technology'),
(65, 'Computer Science & Technology'),
(66, 'Entrepreneuship & Management'),
(67, 'Animal Science'),
(68, 'Music'),
(69, 'Dance'),
(70, 'Art & Design'),
(71, 'Drama & Theatre'),
(72, 'Visual & Technological Arts'),
(73, 'Export Agriculture'),
(74, 'Tea Technology & Value Addition'),
(75, 'Industrial Information Technology'),
(76, 'Mineral Resources and Technology'),
(77, 'Business Information Systems(Special)(BIS)'),
(79, 'Management and Information Technology(SEUSL)'),
(80, 'Computing & Information Systems'),
(81, 'Physical Education'),
(82, 'Sports Science & Management'),
(83, 'Speech ad Hearing Sciences'),
(84, 'Arabic Language)'),
(85, 'Visual Arts'),
(86, 'Animal Science & Fisheries'),
(87, 'Food Production & Technology Management'),
(88, 'Aquatic Resources Technology'),
(89, 'Palm and Latex Technology & Value Addition'),
(90, 'Hospitiality, Tourism and Events Management'),
(91, 'Information Technology & Management'),
(92, 'Tourism & Hospitality Management'),
(93, 'Agricultural Resource Management & Technology'),
(94, 'Agribusiness Management'),
(95, 'Green Technology'),
(96, 'Information Systems'),
(97, 'Landscape Architecture'),
(98, 'Translation Studies'),
(99, 'Software Engineering'),
(100, 'Film & Television Studies'),
(101, 'Project Management'),
(102, 'Engineering Technology(ET)'),
(103, 'Biosystems Technology(BST)'),
(104, 'Information Communication Technology'),
(105, 'Teaching English as a Second Language(TESL)'),
(106, 'Marine and Freshwater Sciences'),
(107, 'Food Business Management'),
(108, 'Physical Science - ICT'),
(109, 'Business Science'),
(110, 'Financial Engineering'),
(111, 'Geographical Information Science'),
(112, 'Social Work'),
(113, 'Financial Mathematics and Industrial Statistics'),
(114, 'Human Resource Development'),
(115, 'Arts - Information Technology'),
(116, 'Accounting Information Systems'),
(117, 'Ocuupational Therapy'),
(118, 'Optometry'),
(119, 'Applied Chemistry'),
(120, 'Indigenous Medicinal Resources'),
(121, 'Aquatic Bioresources'),
(122, 'Urban Bioresources'),
(123, 'Computing & Information Systems'),
(124, 'Artificial Intelligence'),
(125, 'Electronics and Computer Science'),
(126, 'Health Information and Communication Technology'),
(127, 'Health Tourism and Hospitality Management'),
(128, 'Biomedical Technology'),
(129, 'Indigenous Pharmaceutical Technology'),
(130, 'Yoga and Parapsychology'),
(131, 'Social studeis in Indigenous Knowledge');

-- --------------------------------------------------------

--
-- Table structure for table `governmentcourseminimumeligibilityrequsingalsubjects`
--

CREATE TABLE `governmentcourseminimumeligibilityrequsingalsubjects` (
  `min_req_id` int(11) NOT NULL,
  `gov_course_id` int(11) NOT NULL,
  `al_sub1_id` int(11) NOT NULL,
  `minimum_al_sub1_grade` char(1) NOT NULL,
  `al_sub2_id` int(11) NOT NULL,
  `minimum_al_sub2_grade` char(1) NOT NULL,
  `al_sub3_id` int(11) NOT NULL,
  `minimum_al_sub3_grade` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `governmentcourseofferedbygovermentuniversity`
--

CREATE TABLE `governmentcourseofferedbygovermentuniversity` (
  `id` int(11) NOT NULL,
  `gov_course_id` int(11) NOT NULL,
  `gov_uni_id` int(11) NOT NULL,
  `purposed_intake` int(11) NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `unicode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `governmentcourseofferedbygovermentuniversity`
--

INSERT INTO `governmentcourseofferedbygovermentuniversity` (`id`, `gov_course_id`, `gov_uni_id`, `purposed_intake`, `duration`, `description`, `unicode`) VALUES
(1, 19, 1, -1, -1, '-1', '019A'),
(2, 19, 4, -1, -1, '-1', '019D'),
(3, 19, 3, -1, -1, '-1', '019C'),
(4, 19, 7, -1, -1, '-1', '019F'),
(5, 19, 2, -1, -1, '-1', '019B'),
(6, 19, 6, -1, -1, '-1', '019E'),
(7, 19, 8, -1, -1, '-1', '019H'),
(8, 19, 9, -1, -1, '-1', '019J'),
(9, 19, 10, -1, -1, '-1', '019K'),
(10, 20, 15, -1, -1, '-1', '020S'),
(11, 21, 11, -1, -1, '-1', '021L'),
(12, 29, 16, -1, -1, '-1', '029W'),
(13, 31, 4, -1, -1, '-1', '031D'),
(14, 63, 9, -1, -1, '-1', '063J'),
(15, 84, 9, -1, -1, '-1', '084J'),
(16, 105, 4, -1, -1, '-1', '105D'),
(17, 105, 3, -1, -1, '-1', '105C'),
(18, 112, 2, -1, -1, '-1', '112B'),
(19, 68, 14, -1, -1, '-1', '068Z'),
(20, 68, 21, -1, -1, '-1', '068Y'),
(21, 68, 22, -1, -1, '-1', '068X'),
(22, 69, 14, -1, -1, '-1', '069Z'),
(23, 69, 21, -1, -1, '-1', '069Y'),
(24, 69, 22, -1, -1, '-1', '069X'),
(25, 71, 14, -1, -1, '-1', '071Z'),
(26, 71, 21, -1, -1, '-1', '071Y'),
(27, 85, 14, -1, -1, '-1', '085Z'),
(28, 72, 21, -1, -1, '-1', '072Y'),
(29, 70, 22, -1, -1, '-1', '070X'),
(30, 16, 1, -1, -1, '-1', '016A'),
(31, 16, 2, -1, -1, '-1', '016B'),
(32, 16, 3, -1, -1, '-1', '016C'),
(33, 16, 4, -1, -1, '-1', '016D'),
(34, 16, 6, -1, -1, '-1', '016E'),
(35, 16, 7, -1, -1, '-1', '016F'),
(36, 16, 8, -1, -1, '-1', '016H'),
(37, 16, 9, -1, -1, '-1', '016J'),
(38, 16, 10, -1, -1, '-1', '016K'),
(39, 16, 11, -1, -1, '-1', '016L'),
(40, 16, 12, -1, -1, '-1', '016M'),
(41, 28, 3, -1, -1, '-1', '028C'),
(42, 17, 3, -1, -1, '-1', '017C'),
(43, 18, 3, -1, -1, '-1', '018C'),
(44, 18, 4, -1, -1, '-1', '018D'),
(45, 18, 6, -1, -1, '-1', '018E'),
(46, 18, 8, -1, -1, '-1', '018H'),
(47, 18, 9, -1, -1, '-1', '018J'),
(48, 22, 16, -1, -1, '-1', '022W'),
(49, 22, 17, -1, -1, '-1', '022R'),
(50, 77, 3, -1, -1, '-1', '077C'),
(51, 1, 1, -1, -1, '-1', '001A'),
(52, 1, 2, -1, -1, '-1', '001B'),
(53, 1, 3, -1, -1, '-1', '001C'),
(54, 1, 4, -1, -1, '-1', '001D'),
(55, 1, 6, -1, -1, '-1', '001E'),
(56, 1, 7, -1, -1, '-1', '001F'),
(57, 1, 8, -1, -1, '-1', '001H'),
(58, 1, 10, -1, -1, '-1', '001K'),
(59, 1, 12, -1, -1, '-1', '001M'),
(60, 1, 11, -1, -1, '-1', '001L'),
(61, 1, 5, -1, -1, '-1', '001G'),
(62, 2, 2, -1, -1, '-1', '002B'),
(63, 2, 3, -1, -1, '-1', '002C'),
(64, 3, 2, -1, -1, '-1', '003B'),
(65, 39, 2, -1, -1, '-1', '039B'),
(66, 4, 6, -1, -1, '-1', '004E'),
(67, 4, 8, -1, -1, '-1', '004H'),
(68, 4, 10, -1, -1, '-1', '004K'),
(69, 4, 11, -1, -1, '-1', '004L'),
(70, 4, 12, -1, -1, '-1', '004M'),
(71, 5, 12, -1, -1, '-1', '005M'),
(72, 35, 2, -1, -1, '-1', '035B'),
(73, 35, 3, -1, -1, '-1', '035C'),
(74, 35, 11, -1, -1, '-1', '035L'),
(75, 32, 18, -1, -1, '-1', '032N'),
(76, 32, 19, -1, -1, '-1', '032P'),
(77, 33, 18, -1, -1, '-1', '033N'),
(78, 36, 6, -1, -1, '-1', '036E'),
(79, 36, 16, -1, -1, '-1', '036W'),
(80, 6, 1, -1, -1, '-1', '006A'),
(81, 6, 2, -1, -1, '-1', '006B'),
(82, 6, 3, -1, -1, '-1', '006C'),
(83, 6, 4, -1, -1, '-1', '006D'),
(84, 6, 6, -1, -1, '-1', '006E'),
(85, 6, 7, -1, -1, '-1', '006F'),
(86, 6, 8, -1, -1, '-1', '006H'),
(87, 6, 9, -1, -1, '-1', '006J'),
(88, 7, 10, -1, -1, '-1', '007K'),
(89, 7, 11, -1, -1, '-1', '007L'),
(90, 7, 17, -1, -1, '-1', '007R'),
(91, 50, 10, -1, -1, '-1', '050K'),
(92, 37, 2, -1, -1, '-1', '037B'),
(93, 37, 3, -1, -1, '-1', '037C'),
(94, 37, 6, -1, -1, '-1', '037E'),
(95, 37, 7, -1, -1, '-1', '037F'),
(96, 37, 8, -1, -1, '-1', '037H'),
(97, 37, 1, -1, -1, '-1', '037A'),
(98, 51, 2, -1, -1, '-1', '051B'),
(99, 51, 3, -1, -1, '-1', '051C'),
(100, 51, 6, -1, -1, '-1', '051E'),
(101, 51, 7, -1, -1, '-1', '051F'),
(102, 53, 2, -1, -1, '-1', '053B'),
(103, 54, 1, -1, -1, '-1', '054A'),
(104, 54, 2, -1, -1, '-1', '054B'),
(105, 58, 1, -1, -1, '-1', '058A'),
(106, 62, 7, -1, -1, '-1', '062F'),
(107, 55, 4, -1, -1, '-1', '055D'),
(108, 86, 2, -1, -1, '-1', '086B'),
(109, 87, 12, -1, -1, '-1', '087M'),
(110, 93, 7, -1, -1, '-1', '093F'),
(111, 94, 7, -1, -1, '-1', '094F'),
(112, 95, 7, -1, -1, '-1', '095F'),
(113, 67, 13, -1, -1, '-1', '067U'),
(114, 73, 13, -1, -1, '-1', '073U'),
(115, 88, 13, -1, -1, '-1', '088U'),
(116, 8, 2, -1, -1, '-1', '008B'),
(117, 8, 6, -1, -1, '-1', '008E'),
(118, 8, 7, -1, -1, '-1', '008F'),
(119, 8, 5, -1, -1, '-1', '008G'),
(120, 8, 9, -1, -1, '-1', '008J'),
(121, 8, 3, -1, -1, '-1', '008C'),
(122, 9, 5, -1, -1, '-1', '009G'),
(123, 10, 5, -1, -1, '-1', '010G'),
(124, 13, 1, -1, -1, '-1', '013A'),
(125, 13, 2, -1, -1, '-1', '013B'),
(126, 13, 3, -1, -1, '-1', '013C'),
(127, 13, 4, -1, -1, '-1', '013D'),
(128, 13, 6, -1, -1, '-1', '013E'),
(129, 13, 7, -1, -1, '-1', '013F'),
(130, 13, 8, -1, -1, '-1', '013H'),
(131, 13, 9, -1, -1, '-1', '013J'),
(132, 12, 6, -1, -1, '-1', '012E'),
(133, 12, 7, -1, -1, '-1', '012F'),
(134, 12, 20, -1, -1, '-1', '012T'),
(135, 12, 16, -1, -1, '-1', '012W'),
(136, 12, 4, -1, -1, '-1', '012D'),
(137, 15, 10, -1, -1, '-1', '015K'),
(138, 15, 11, -1, -1, '-1', '015L'),
(139, 15, 12, -1, -1, '-1', '015M'),
(140, 15, 17, -1, -1, '-1', '015R'),
(141, 15, 16, -1, -1, '-1', '015W'),
(142, 57, 5, -1, -1, '-1', '057G'),
(143, 59, 1, -1, -1, '-1', '059A'),
(144, 60, 2, -1, -1, '-1', '060B'),
(145, 108, 3, -1, -1, '-1', '108C'),
(146, 108, 4, -1, -1, '-1', '108D'),
(147, 102, 3, -1, -1, '-1', '102C'),
(148, 102, 4, -1, -1, '-1', '102D'),
(149, 102, 6, -1, -1, '-1', '102E'),
(150, 102, 7, -1, -1, '-1', '102F'),
(151, 102, 10, -1, -1, '-1', '102K'),
(152, 102, 13, -1, -1, '-1', '102U'),
(153, 102, 12, -1, -1, '-1', '102M'),
(154, 102, 1, -1, -1, '-1', '102A'),
(155, 102, 11, -1, -1, '-1', '102L'),
(156, 103, 3, -1, -1, '-1', '103C'),
(157, 103, 6, -1, -1, '-1', '103E'),
(158, 103, 8, -1, -1, '-1', '103H'),
(159, 103, 10, -1, -1, '-1', '103K'),
(160, 103, 9, -1, -1, '-1', '103J'),
(161, 103, 13, -1, -1, '-1', '103U'),
(162, 103, 12, -1, -1, '-1', '103M'),
(163, 103, 1, -1, -1, '-1', '103A'),
(164, 103, 11, -1, -1, '-1', '103L'),
(165, 103, 7, -1, -1, '-1', '103F'),
(166, 38, 3, -1, -1, '-1', '104C'),
(167, 38, 4, -1, -1, '-1', '104D'),
(168, 38, 7, -1, -1, '-1', '104F'),
(170, 38, 9, -1, -1, '-1', '104J'),
(171, 38, 17, -1, -1, '-1', '104R'),
(172, 38, 1, -1, -1, '-1', '104A'),
(173, 38, 13, -1, -1, '-1', '104U'),
(174, 26, 5, -1, -1, '-1', '026G'),
(175, 27, 4, -1, -1, '-1', '027D'),
(176, 11, 5, -1, -1, '-1', '011G'),
(177, 14, 11, -1, -1, '-1', '014L'),
(178, 30, 5, -1, -1, '-1', '030G'),
(179, 23, 5, -1, -1, '-1', '023G'),
(180, 34, 5, -1, -1, '-1', '034G'),
(181, 97, 5, -1, -1, '-1', '097G'),
(182, 24, 5, -1, -1, '-1', '024G'),
(183, 25, 1, -1, -1, '-1', '025A'),
(184, 25, 2, -1, -1, '-1', '025B'),
(185, 25, 6, -1, -1, '-1', '025E'),
(186, 56, 5, -1, -1, '-1', '056G'),
(187, 79, 9, -1, -1, '-1', '079J'),
(188, 64, 13, -1, -1, '-1', '064U'),
(189, 65, 13, -1, -1, '-1', '065U'),
(190, 66, 13, -1, -1, '-1', '066U'),
(191, 74, 13, -1, -1, '-1', '074U'),
(192, 75, 13, -1, -1, '-1', '075U'),
(193, 76, 13, -1, -1, '-1', '076U'),
(194, 89, 13, -1, -1, '-1', '089U'),
(195, 90, 13, -1, -1, '-1', '090U'),
(196, 81, 11, -1, -1, '-1', '081L'),
(197, 81, 6, -1, -1, '-1', '081E'),
(198, 82, 3, -1, -1, '-1', '082C'),
(199, 82, 11, -1, -1, '-1', '082L'),
(200, 82, 4, -1, -1, '-1', '082D'),
(201, 83, 4, -1, -1, '-1', '083D'),
(202, 91, 5, -1, -1, '-1', '091G'),
(203, 92, 10, -1, -1, '-1', '092K'),
(204, 92, 11, -1, -1, '-1', '092L'),
(205, 96, 20, -1, -1, '-1', '096T'),
(206, 98, 4, -1, -1, '-1', '098D'),
(207, 98, 6, -1, -1, '-1', '098E'),
(208, 98, 11, -1, -1, '-1', '098L'),
(209, 98, 8, -1, -1, '-1', '098H'),
(210, 100, 4, -1, -1, '-1', '100D'),
(211, 101, 17, -1, -1, '-1', '101R'),
(212, 38, 10, -1, -1, '-1', '038K'),
(213, 38, 17, -1, -1, '-1', '038R'),
(214, 99, 4, -1, -1, '-1', '099D'),
(215, 99, 11, -1, -1, '-1', '099L'),
(216, 107, 11, -1, -1, '-1', '107L'),
(217, 106, 7, -1, -1, '-1', '106F'),
(218, 109, 5, -1, -1, '-1', '109G'),
(219, 110, 4, -1, -1, '-1', '110D'),
(220, 111, 2, -1, -1, '-1', '111B'),
(221, 113, 7, -1, -1, '-1', '113F'),
(222, 114, 13, -1, -1, '-1', '114U'),
(223, 115, 3, -1, -1, '-1', '128C'),
(224, 116, 4, -1, -1, '-1', '127D'),
(225, 117, 4, -1, -1, '-1', '115D'),
(226, 118, 3, -1, -1, '-1', '116C'),
(227, 119, 4, -1, -1, '-1', '118D'),
(228, 120, 19, -1, -1, '-1', '120P'),
(229, 121, 3, -1, -1, '-1', '129C'),
(230, 122, 3, -1, -1, '-1', '130C'),
(231, 123, 11, -1, -1, '-1', '080L'),
(232, 124, 5, -1, -1, '-1', '117G'),
(233, 125, 4, -1, -1, '-1', '119D'),
(234, 126, 19, -1, -1, '-1', '121P'),
(235, 127, 19, -1, -1, '-1', '122P'),
(236, 128, 19, -1, -1, '-1', '123P'),
(237, 130, 19, -1, -1, '-1', '125P'),
(238, 129, 19, -1, -1, '-1', '124P'),
(239, 131, 19, -1, -1, '-1', '126P'),
(240, 41, 15, -1, -1, '-1', '041S'),
(241, 52, 2, -1, -1, '-1', '052B'),
(242, 52, 3, -1, -1, '-1', '052C'),
(243, 52, 6, -1, -1, '-1', '052E'),
(244, 52, 7, -1, -1, '-1', '052F'),
(245, 38, 10, -1, -1, '-1', '104K');

-- --------------------------------------------------------

--
-- Table structure for table `intakenotices`
--

CREATE TABLE `intakenotices` (
  `notice_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `paid_date` date NOT NULL,
  `uni_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jobapplicants`
--

CREATE TABLE `jobapplicants` (
  `job_apply_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `interaction` varchar(100) DEFAULT NULL,
  `applied_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobapplicants`
--

INSERT INTO `jobapplicants` (`job_apply_id`, `user_id`, `post_id`, `interaction`, `applied_date`) VALUES
(1, 4, 3, 'apply removed', '0000-00-00'),
(2, 5, 3, 'apply removed', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `content` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE `mentor` (
  `mentor_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phn_no` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `mentor_type` varchar(20) NOT NULL,
  `institute` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`mentor_id`, `email`, `phn_no`, `address`, `gender`, `mentor_type`, `institute`, `password`) VALUES
(8, 'tharindu4151@gmail.com', 361486291, 'No 30, Esplanade Rd Uyanwatta, Matara', 'Male', 'Professional Guider', 'abc Institute', '$2y$10$12phD6pcClHASfsQMtqSPeX4TWIgxXfaDsKZ7gKSD4Srmomz2Qo1G'),
(9, 'pubudu4151@gmail.com', 768913423, 'No 57, Lake, Circular Rd, Kurunegala', 'Male', 'Teacher', NULL, '$2y$10$nEZIakq8bBS7oZhDbsYrxO3.5IoAjM2ZFs9xKN/3NsYGTUm9NMKGm');

-- --------------------------------------------------------

--
-- Table structure for table `olqualifiedstudent`
--

CREATE TABLE `olqualifiedstudent` (
  `stu_id` int(11) NOT NULL,
  `ol_school` varchar(255) NOT NULL,
  `ol_district` varchar(100) NOT NULL,
  `ol_sub1_id` int(11) NOT NULL,
  `ol_sub1_grade` char(1) NOT NULL,
  `ol_sub2_id` int(11) NOT NULL,
  `ol_sub2_grade` char(1) NOT NULL,
  `ol_sub3_id` int(11) NOT NULL,
  `ol_sub3_grade` char(1) NOT NULL,
  `ol_sub4_id` int(11) NOT NULL,
  `ol_sub4_grade` char(1) NOT NULL,
  `ol_sub5_id` int(11) NOT NULL,
  `ol_sub5_grade` char(1) NOT NULL,
  `ol_sub6_id` int(11) NOT NULL,
  `ol_sub6_grade` char(1) NOT NULL,
  `ol_sub7_id` int(11) NOT NULL,
  `ol_sub7_grade` char(1) NOT NULL,
  `ol_sub8_id` int(11) NOT NULL,
  `ol_sub8_grade` char(1) NOT NULL,
  `ol_sub9_id` int(11) NOT NULL,
  `ol_sub9_grade` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `olqualifiedstudent`
--

INSERT INTO `olqualifiedstudent` (`stu_id`, `ol_school`, `ol_district`, `ol_sub1_id`, `ol_sub1_grade`, `ol_sub2_id`, `ol_sub2_grade`, `ol_sub3_id`, `ol_sub3_grade`, `ol_sub4_id`, `ol_sub4_grade`, `ol_sub5_id`, `ol_sub5_grade`, `ol_sub6_id`, `ol_sub6_grade`, `ol_sub7_id`, `ol_sub7_grade`, `ol_sub8_id`, `ol_sub8_grade`, `ol_sub9_id`, `ol_sub9_grade`) VALUES
(3, 'Mahanama College', 'Colombo', 1, 'A', 6, 'A', 8, 'A', 9, 'A', 10, 'A', 11, 'A', 12, 'A', 28, 'A', 39, 'A'),
(4, 'C.W.W. Kannangara Vidyalaya', 'Colombo', 1, 'A', 6, 'A', 8, 'A', 9, 'A', 10, 'A', 11, 'A', 12, 'A', 28, 'A', 39, 'A'),
(5, 'Carey College, Borella', 'Colombo', 1, 'A', 6, 'A', 8, 'A', 9, 'A', 10, 'A', 11, 'A', 12, 'A', 28, 'A', 39, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `olsubject`
--

CREATE TABLE `olsubject` (
  `ol_sub_id` int(11) NOT NULL,
  `ol_sub_name` varchar(255) NOT NULL,
  `ol_category` varchar(255) NOT NULL,
  `ol_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `olsubject`
--

INSERT INTO `olsubject` (`ol_sub_id`, `ol_sub_name`, `ol_category`, `ol_type`) VALUES
(1, 'Buddhism', 'Main', 'Religion'),
(2, 'Saivaneri (Hinduism / Shaivism)', 'Main', 'Religion'),
(3, '(Roman)Catholicim(RC)', 'Main', 'Religion'),
(4, 'Christianity(Non RC)', 'Main', 'Religion'),
(5, 'Islam', 'Main', 'Religion'),
(6, 'Sinhala Language and Literature', 'Main', 'Primary Language'),
(7, 'Tamil Language and Literature', 'Main', 'Primary Language'),
(8, 'English', 'Main', 'Secondary Language'),
(9, 'History', 'Main', 'History'),
(10, 'Science', 'Main', 'Science'),
(11, 'Mathematics', 'Main', 'Mathematics'),
(12, 'Business & Accounting Studies', 'Basket 1', 'Commerce'),
(13, 'Geography', 'Basket 1', 'Geography'),
(14, 'Civic Education', 'Basket 1', 'Education'),
(15, 'Entrepreneurship Studies', 'Basket 1', 'Entrepreneurship'),
(16, 'Second Language(Sinhala)', 'Basket 1', 'Language'),
(17, 'Second Language(Tamil)', 'Basket 1', 'Language'),
(18, 'Pali', 'Basket 1', 'Language'),
(19, 'Sanskrit', 'Basket 1', 'Language'),
(20, 'French', 'Basket 1', 'Language'),
(21, 'German', 'Basket 1', 'Language'),
(22, 'Hindi', 'Basket 1', 'Language'),
(23, 'Japanese', 'Basket 1', 'Language'),
(24, 'Arabic', 'Basket 1', 'Language'),
(25, 'Korean', 'Basket 1', 'Language'),
(26, 'Chinese', 'Basket 1', 'Language'),
(27, 'Russian', 'Basket 1', 'Language'),
(28, 'Oriental Music', 'Basket 2', 'Music'),
(29, 'Western Music', 'Basket 2', 'Music'),
(30, 'Carnatic Music', 'Basket 2', 'Music'),
(31, 'Oriental Dancing', 'Basket 2', 'Dance'),
(32, 'Bharatha Dancing', 'Basket 2', 'Dance'),
(33, 'Art', 'Basket 2', 'Art'),
(34, 'Appreciation of English Literary Texts', 'Basket 2', 'Literary Texts'),
(35, 'Appreciation of Sinhala Literary Texts', 'Basket 2', 'Literary Texts'),
(36, 'Appreciation of Tamil Literary Texts', 'Basket 2', 'Literary Texts'),
(37, 'Appreciation of Arabic Literary Texts', 'Basket 2', 'Literary Texts'),
(38, 'Drama and Theatre', 'Basket 2', 'Drama'),
(39, 'Information & Communication Technology', 'Basket 3', 'IT'),
(40, 'Agriculture & Food Technology', 'Basket 3', 'Agriculture'),
(41, 'Aquatic Vio-resources Technology', 'Basket 3', 'Aquatics'),
(42, 'Art & Crafts', 'Basket 3', 'Art'),
(43, 'Home Economics', 'Basket 3', 'Economics'),
(44, 'Health & Physical Education', 'Basket 3', 'Health'),
(45, 'Communication & Media Studies', 'Basket 3', 'Technology(Communicaiton)'),
(46, 'Design & Construction Technology', 'Basket 3', 'Technology(Communicaiton)'),
(47, 'Design & Mechanical Technology', 'Basket 3', 'Technology(Communicaiton)'),
(48, 'Design, Electrical & Electronic Technology', 'Basket 3', 'Technology(Communicaiton)'),
(49, 'Electronic Writing & Shorthand', 'Basket 3', 'Technology(Communicaiton)');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `org_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_no` char(10) NOT NULL,
  `website_address` varchar(255) NOT NULL,
  `founder` varchar(255) NOT NULL,
  `founded_year` int(11) NOT NULL,
  `org_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`org_id`, `address`, `email`, `password`, `phone_no`, `website_address`, `founder`, `founded_year`, `org_type`) VALUES
(6, '123, Jasmine Road, Colombo 3', 'unisliitlk@gmail.com', '$2y$10$O19mMmhglJxRpBT.r50/3OnCnFt1xD7qGFoNc8BS5gWCu5G7HpQYS', '0714526390', 'www.sliit.lk', 'Mandila wimalasiri', 2004, 'University'),
(7, '456, Galle road, Colombo', 'abcgroup202@gmail.com', '$2y$10$vEj1uPZ6zkXyoSdo4xP6OeoElHAqhcRHVkcWVtag27WzyIacDWh/K', '0112345678', 'www.abc.com', 'Mark perera', 2004, 'Company');

-- --------------------------------------------------------

--
-- Table structure for table `postinteractions`
--

CREATE TABLE `postinteractions` (
  `interaction_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `interaction` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `postinteractions`
--

INSERT INTO `postinteractions` (`interaction_id`, `user_id`, `post_id`, `interaction`) VALUES
(1, 4, 2, 'liked'),
(2, 5, 1, 'liked'),
(3, 3, 1, 'liked'),
(4, 2, 4, 'liked'),
(5, 4, 4, 'liked');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `body` text DEFAULT NULL,
  `applied` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `ups` int(11) DEFAULT NULL,
  `downs` int(11) DEFAULT NULL,
  `shares` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `type`, `image`, `title`, `body`, `applied`, `capacity`, `ups`, `downs`, `shares`, `views`, `created_at`) VALUES
(1, 8, 'banner', '1635070084_d9c61564-8d38-45de-9b99-68f47f4d7f8d.jpg', 'Career Counselling', 'For school, College students and Graduates. Enroll with us today', 2, 50, 2, 0, 0, 0, '2021-10-24 15:38:04'),
(2, 9, 'poster', '1635070173_80eb2485-e32e-42a6-b684-f9de305b8d8f.jpg', 'Learn Python from the beginning', 'Classes will be held on Sunday and Wednesday 11.00 a.m to 2.00 p.m via zoom.', 1, 100, 1, 0, 0, 0, '2021-10-24 15:39:33'),
(3, 7, 'advertisement', '1635070272_7fe802d5-0d9f-4c8b-8f4c-dfd427a81bfa.jpg', 'We are hiring now !!!', 'Send your CV and latest photograph to us', 0, 10, 0, 0, 0, 0, '2021-10-24 15:41:12'),
(4, 6, 'coursepost', '1635070328_9c865896-9f9f-43cb-9a46-846d0577c75f.jpg', 'SLIIT - September Intake', 'Admissions are now open for 2021 September intake. Apply Now', 0, 0, 2, 0, 0, 0, '2021-10-24 15:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `privatecourses`
--

CREATE TABLE `privatecourses` (
  `privatecourse_id` int(11) NOT NULL,
  `course_fee` varchar(50) DEFAULT NULL,
  `private_uni_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `privateuniversity`
--

CREATE TABLE `privateuniversity` (
  `privateuni_id` int(11) NOT NULL,
  `ugc_approval` varchar(3) NOT NULL,
  `world_rank` int(11) NOT NULL,
  `student_amount` int(11) NOT NULL,
  `graduate_job_rate` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `uni_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privateuniversity`
--

INSERT INTO `privateuniversity` (`privateuni_id`, `ugc_approval`, `world_rank`, `student_amount`, `graduate_job_rate`, `description`, `uni_type`) VALUES
(6, 'Yes', 2422, 7790, 98, 'We are a leading non-state degree awarding institute approved by the University Grants Commission (UGC)', 'Private');

-- --------------------------------------------------------

--
-- Table structure for table `profguide`
--

CREATE TABLE `profguide` (
  `guider_id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `institute` varchar(255) NOT NULL,
  `subject1` varchar(255) NOT NULL,
  `subject2` varchar(255) DEFAULT NULL,
  `subject3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `profguiderenrollments`
--

CREATE TABLE `profguiderenrollments` (
  `enroll_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `interaction` varchar(100) DEFAULT NULL,
  `applied_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profguiderenrollments`
--

INSERT INTO `profguiderenrollments` (`enroll_id`, `user_id`, `post_id`, `interaction`, `applied_date`) VALUES
(1, 4, 1, 'applied', '0000-00-00'),
(2, 5, 1, 'applied', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `post_id`, `user_id`, `rate`, `review`, `created_at`) VALUES
(1, 1, 3, 5, 'Everything on this session was goldmine.', '2021-10-24 19:08:21'),
(2, 1, 2, 4, 'This session proved to be an overall great knowledge booster.', '2021-10-24 19:09:17'),
(3, 2, 4, 4, 'If you can cover all application cases it would be easy.', '2021-10-24 19:10:39'),
(4, 2, 4, 5, 'If you can cover all application cases it would be easy.', '2021-10-24 19:11:04'),
(5, 4, 3, 3, 'Good course. High demand in IT job field for this course.', '2021-10-24 19:32:25'),
(7, 4, 4, 4, 'Good course and fair course fee from respectable university.', '2021-10-24 19:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_id`, `name`, `type`, `district_id`) VALUES
(1, 'Ananda Balika Vidayalaya, Colombo 10', 'National', 1),
(2, 'Ananda College', 'National', 1),
(3, 'Ananda Sastralaya, Kotte', 'National', 1),
(4, 'Asoka Vidyalaya, Colombo 10', 'National', 1),
(5, 'Anula Vidyalaya', 'National', 1),
(6, 'Colombo Hindu College', 'National', 1),
(7, 'Defence Services School, Colombo', 'National', 1),
(8, 'Devi Balika Vidyalaya', 'National', 1),
(9, 'Dharmapala Vidyalaya, Pannipitiya', 'National', 1),
(10, 'D.S.Senanayake College', 'National', 1),
(11, 'Gothami Balika Vidyalaya, Colombo 10', 'National', 1),
(12, 'Hameed Al Hussainie College', 'National', 1),
(13, 'Isipathana College', 'National', 1),
(14, 'Lindsay Collage', 'National', 1),
(15, 'Mahanama College', 'National', 1),
(16, 'Mahamaya Balika Vidyalaya, Nugegoda', 'National', 1),
(17, 'Muslim Ladies College', 'National', 1),
(18, 'Nalanda College', 'National', 1),
(19, 'Presbyterian Girls\' National School, Dehiwala', 'National', 1),
(20, 'President\'s College (Sri Lanka)', 'National', 1),
(21, 'Prince of Wales\' Maha Vidayalaya, Moratuwa', 'National', 1),
(22, 'Princess of Wales\' Maha Vidayalaya, Moratuwa', 'National', 1),
(23, 'Royal College Colombo', 'National', 1),
(24, 'Sirimavo Balika Vidyalaya', 'National', 1),
(25, 'St. Lucia\'s College (Maha Vidyalaya), Kotahena, Colombo - 13', 'National', 1),
(26, 'St. Pauls Girls\' School, Milagiriya', 'National', 1),
(27, 'Thurstan College', 'National', 1),
(28, 'Veluwana Vidyalaya, Colombo 09', 'National', 1),
(29, 'Visakha Vidyalaya', 'National', 1),
(30, 'Vivekananda College', 'National', 1),
(31, 'Yasodara Balika Vidyalaya', 'National', 1),
(32, 'Beravats College Ampitiya -Kandy', 'National', 4),
(33, 'Dharmaraja College', 'National', 4),
(34, 'Girls\' High School', 'National', 4),
(35, 'Kingswood College', 'National', 4),
(36, 'Mahamaya Girls\' College, Kandy', 'National', 4),
(37, 'Nugawela Boys\' College, Kandy', 'National', 4),
(38, 'Pushpadana Girls\' College', 'National', 4),
(39, 'St/Sylvester\'s College', 'National', 4),
(40, 'Vidyartha College, Kandy', 'National', 4),
(41, 'Zahira Muslim Mahavidyalayas, Gampola', 'National', 4),
(42, 'Ananda Central College', 'National', 7),
(43, 'Anurudda kumara maha vidyalaya', 'National', 7),
(44, 'Dharmasoka College', 'National', 7),
(45, 'Good Shepherd Convent', 'National', 7),
(46, 'Mahinda College', 'National', 7),
(47, 'Richmond College', 'National', 7),
(48, 'Sacred Heart Convent', 'National', 7),
(49, 'Sangamitta Balika Vidyalaya', 'National', 7),
(50, 'Southlands College', 'National', 7),
(51, 'Sri Kalyanatissa Vidyalaya,Batapola', 'National', 7),
(52, 'St.Aloysius College', 'National', 7),
(53, 'Vidyaloka College', 'National', 7),
(54, 'G/Zahira college', 'National', 7),
(55, 'Hindu College, Chavakachcheri', 'National', 10),
(56, 'Jaffna Central College', 'National', 10),
(57, 'Jaffna Hindu College', 'National', 10),
(58, 'Kokuvil Hindu College', 'National', 10),
(59, 'Tellippalai Union College', 'National', 10),
(60, 'J/Thuraiyappa Vithiyalayam, Columbuthurai, Jaffna', 'National', 10),
(61, 'Vembady Girls High School', 'National', 10),
(62, 'Holy Family Convent', 'National', 18),
(63, 'Maliyadeva Balika Vidyalaya', 'National', 18),
(64, 'Maliyadeva College', 'National', 18),
(65, 'St. Anne\'s College', 'National', 18),
(66, 'Ajmeer Madhya Maha Vidyalaya', 'National', 5),
(67, 'Amina Maha Vidyalaya', 'National', 5),
(68, 'Christ Church College, Matale', 'National', 5),
(69, 'Matale Hindu College', 'National', 5),
(70, 'Sri Naga National College', 'National', 5),
(71, 'Sri Sangamitta Balika Madhya Vidyalaya, Matale', 'National', 5),
(72, 'St Thomas\' College, Matale', 'National', 5),
(73, 'Vijaya College, Matale', 'National', 5),
(74, 'Zahira College, Matale', 'National', 5),
(75, 'Narandeniya Central College, Kamburupitiya', 'National', 8),
(76, 'Rahula College', 'National', 8),
(77, 'St Chearch College', 'National', 8),
(78, 'St Sevatious College', 'National', 8),
(79, 'St Thomas\' College, Matara', 'National', 8),
(80, 'Sujatha Vidyalaya, Matara', 'National', 8),
(81, 'Thihagoda M.M.V', 'National', 8),
(82, 'Anuradhapura Central College', 'National', 20),
(83, 'Swarnapali Balika Maha Vidyalaya', 'National', 20),
(84, 'Ananda Balika Vidyala', 'National', 21),
(85, 'Aralaganvila Vilayaya Central College', 'National', 21),
(86, 'Madirigiriya Central College', 'National', 21),
(87, 'Minnariya Central college', 'National', 21),
(88, 'Polonnaruwa Royal Central College', 'National', 21),
(89, 'Kalutara Balika National School Kalutara', 'National', 3),
(90, 'Kalutara Vidyalaya, Kalutara', 'National', 3),
(91, 'Kalutara muslim maha vidyalaya kalutara', 'National', 3),
(92, 'Miriswatta Maha Vidyalaya,Dodangoda', 'National', 3),
(93, 'K/Sri Devananda Vidyalaya kalutara', 'National', 3),
(94, 'Tissa Vidyalaya, Kalutara', 'National', 3),
(95, 'Bandaranayaka College', 'National', 2),
(96, 'Nalanda Boy\'s School, Minuwangoda', 'National', 2),
(97, 'Sri Dharmaloka College', 'National', 2),
(98, 'Dudley Senanayake Central College - Tholangamuwa', 'National', 25),
(99, 'Kegalu Balika Maha Vidyalaya', 'National', 25),
(100, 'Kegalu Vidyalaya', 'National', 25),
(101, 'St Joseph\'s Convent', 'National', 25),
(102, 'St Mary\'s College', 'National', 25),
(103, 'Zahira College, Mawanella', 'National', 25),
(104, 'Ananda National School, Chilaw', 'National', 19),
(105, 'Anamaduwa National College, Anamaduwa', 'National', 19),
(106, 'Andre College, Puttalam', 'National', 19),
(107, 'Al/Aqza National School, Kalpitiya', 'National', 19),
(108, 'Dankotuwa Balika, Dankotuwa', 'National', 19),
(109, 'Dhammissara National College, Nattandiya', 'National', 19),
(110, 'Holy Family Girls School, Wennappuwa', 'National', 19),
(111, 'Joseph Vaz College, Wennappuwa', 'National', 19),
(112, 'Senanayake National College,Madampe', 'National', 19),
(113, 'Zahira National School, Puttalam', 'National', 19),
(114, 'Ambadandegama Maha Vidyalaya, Bandarawela', 'National', 22),
(115, 'Badulla Central College, Badulla', 'National', 22),
(116, 'Badulla Dharmadutha College, Badulla', 'National', 22),
(117, 'Bandarawela Central college', 'National', 22),
(118, 'Dharmapala Maha Vidyalaya, Bandarawela', 'National', 22),
(119, 'Halpe National School, Halpe', 'National', 22),
(120, 'Kahagolla National School, Diyatalawa, Bandarawela', 'National', 22),
(121, 'B/Kuda Kusum Balika Maha Vidyalaya, Bandarawela', 'National', 22),
(122, 'Naulla Central College, Demodara', 'National', 22),
(123, 'Sri Janananda National School, Kadurugamuwa', 'National', 22),
(124, 'St. Joseph\'s College, Bandarawela', 'National', 22),
(125, 'Vishaka Balika Vidyalaya, Bandarawela', 'National', 22),
(126, 'Ananda Balika Vidyalaya, Kotte', 'Provincial', 1),
(127, 'C.W.W. Kannangara Vidyalaya', 'Provincial', 1),
(128, 'Good Shepherd Convent, Colombo-13', 'Provincial', 1),
(129, 'Gothami Balika Vidyalaya', 'Provincial', 1),
(130, 'Janadhipathi Balika Vidyalaya, Nawala', 'Provincial', 1),
(131, 'Lumbini Vidyalaya', 'Provincial', 1),
(132, 'Sri Rahula Balika Vidyalaya, Malabe', 'Provincial', 1),
(133, 'Meegoda Dharmaraja Vidyalaya, Meegoda', 'Provincial', 1),
(134, 'St. Johns College, Nugegoda', 'Provincial', 1),
(135, 'Yashodara Balika Vidyalaya', 'Provincial', 1),
(136, 'Gohagoda Maha Vidyalaya', 'Provincial', 4),
(137, 'Halloluwa Navodya Maha Vidyalaya', 'Provincial', 4),
(138, 'Nugawela Boys\' College', 'Provincial', 4),
(139, 'Pushpadana Balika Vidyalaya', 'Provincial', 4),
(140, 'Ranabima Royal College', 'Provincial', 4),
(141, 'Sarasavi Uyana Maha Vidyalaya,kandy', 'Provincial', 4),
(142, 'Vidyartha College', 'Provincial', 4),
(143, 'Viharamaha Devi Balika Vidyalaya', 'Provincial', 4),
(144, 'Wariyapola Sri Sumangala College', 'Provincial', 4),
(145, 'G/Ananda Central Collage', 'Provincial', 4),
(146, 'Batapola Central Collage', 'Provincial', 4),
(147, 'Karandeniya Central Collage', 'Provincial', 4),
(148, 'G/P.De.S.Kularathna Maha Vidyalaya', 'Provincial', 4),
(149, 'G/Thunduwa Muslim Maha Vidyala', 'Provincial', 4),
(150, 'Jaffna Hindu Ladies College', 'Provincial', 10),
(151, 'Jaffna Hindu Primary (JHP)', 'Provincial', 10),
(152, 'Mahajana College, Tellippalai', 'Provincial', 10),
(153, 'Manipay Hindu College', 'Provincial', 10),
(154, 'Manipay Hindu Ladies College', 'Provincial', 10),
(155, 'Manipay Memorial English school', 'Provincial', 10),
(156, 'Sri Somaskanda College, Puttur', 'Provincial', 10),
(157, 'Skandavarodaya College', 'Provincial', 10),
(158, 'Uduvil Girls High School', 'Provincial', 10),
(159, 'Ambanpola Central College, Ambanpola', 'Provincial', 18),
(160, 'Ambanpola Kanista Vidyalaya, Ambanpola', 'Provincial', 18),
(161, 'Central College Kuliyapitiya', 'Provincial', 18),
(162, 'Sir John Kotalawala Vidyalaya', 'Provincial', 18),
(163, 'Maliyadeva Model School', 'Provincial', 18),
(164, 'Wayamba Royal Central College College', 'Provincial', 18),
(165, 'Government Science College, Matale', 'Provincial', 5),
(166, 'Sangamiththa Balika Maha vidyalaya', 'Provincial', 5),
(167, 'Al-Adhan Muslim Mahavidyalaya', 'Provincial', 22),
(168, 'Sujatha Vidyalaya', 'Provincial', 22),
(169, 'Uva College', 'Provincial', 22),
(170, 'Viharamahadevi Girls school', 'Provincial', 22),
(171, 'Vishaka Vidyalaya', 'Provincial', 22),
(172, 'Bandarawela Dharmapala Maha Vidyalaya', 'Provincial', 21),
(173, 'Hingurakdamana Maha vidyalaya', 'Provincial', 21),
(174, 'Lankapura Maha vidyalaya', 'Provincial', 21),
(175, 'Vigitha Maha vidyalaya', 'Provincial', 21),
(176, 'Thopawawa Maha vidyalaya', 'Provincial', 21),
(177, 'Sewamuktha Maha vidyalaya', 'Provincial', 21),
(178, 'Ferguson high School,Ratnapura', 'Provincial', 24),
(179, 'Mihindu Vidyalaya, Ratnapura', 'Provincial', 24),
(180, 'Nawanagara Vidyalaya, Ratnapura', 'Provincial', 24),
(181, 'Sumana Balika Vidyalaya, Ratnapura', 'Provincial', 24),
(182, 'Sivali Central College, Ratnapura', 'Provincial', 24),
(183, 'Kinniya Central College', 'Provincial', 17),
(184, 'Orr\'s Hill Vivekananda College', 'Provincial', 17),
(185, 'Ramakrishna Mission Sri Koneswara Hindu College', 'Provincial', 17),
(186, 'St Mary\'s College, Trincomalee', 'Provincial', 17),
(187, 'Trincomalee Hindu College', 'Provincial', 17),
(188, 'Agamathi Balika Vidyalaya, Panadura', 'Provincial', 26),
(189, 'Arafa National College, Weligama', 'Provincial', 26),
(190, 'Annor Muslim Balika National College, Weligama', 'Provincial', 26),
(191, 'Al-hilal Maha Vidyalaya, Sainthamaruthu', 'Provincial', 26),
(192, 'Al Yaseen Vidyalaya, Bandarawela', 'Provincial', 26),
(193, 'As-Safa Muslim School, Madurapura, Denipitiya', 'Provincial', 26),
(194, 'Atapattukanda K.V, Deiyandara', 'Provincial', 26),
(195, 'Bandaranaike Vidyalaya, Gampaha', 'Provincial', 26),
(196, 'Darmapala Maha Vidyalaya, Bandarawela', 'Provincial', 26),
(197, 'Darmashoka Maha Vidyalaya, Bandarawela', 'Provincial', 26),
(198, 'De Mazenod College, Kandana', 'Provincial', 26),
(199, 'Debaraweva Madhya Maha Vidyalaya, Tissamaharamaya', 'Provincial', 26),
(200, 'Deiyandara M.M.V,Deiyandara', 'Provincial', 26),
(201, 'Dhammissara national College, Nattandiya', 'Provincial', 26),
(202, 'Bd/Haputale Tamil Central College, Haputale', 'Provincial', 26),
(203, 'Joseph Vaz College, Wennapuwa', 'Provincial', 26),
(204, 'Kegalle Balika Vidyalaya, Kegalle', 'Provincial', 26),
(205, 'Ketiyape M.V, Deiyandara', 'Provincial', 26),
(206, 'Kilinochchi Madya Maha Vidyalayam, Kilinochchi', 'Provincial', 26),
(207, 'B/ Kuda Kusum Balika Maha Vidyalaya, Bandarawela', 'Provincial', 26),
(208, 'Kudakusum Maha Vidyalaya, Bandarawela', 'Provincial', 26),
(209, 'Mahumoos Ladies College, Kalmunai', 'Provincial', 26),
(210, 'Mawala Vidyalaya, Wadduwa', 'Provincial', 26),
(211, 'Mallavi Central College, Mallavi', 'Provincial', 26),
(212, 'Malharu Sams School, Sainthamaruthu', 'Provincial', 26),
(213, 'MR/Kongala M.M.V, Hakmana', 'Provincial', 26),
(214, 'MR/Gagodagama jayawardana M.V, Hakmana', 'Provincial', 26),
(215, 'MR/Buddhajayanthi K.V, Hakmana', 'Provincial', 26),
(216, 'Nalanda Girl\'s School, Minuwangoda', 'Provincial', 26),
(217, 'Narandeniya M.M.V, kamburupitiya', 'Provincial', 26),
(218, 'Piliyandala Central College, Piliyandala', 'Provincial', 26),
(219, 'Panadura Royal College, Panadura', 'Provincial', 26),
(220, 'Rathanawali Balika Vidyalaya, Gampaha', 'Provincial', 26),
(221, 'Seevali Navodya Maha Vidyalaya, Bandarawela', 'Provincial', 26),
(222, 'Sitthartha College, Weligama', 'Provincial', 26),
(223, 'Sripali Maha Vidyalaya, Horana', 'Provincial', 26),
(224, 'Sir Rasik Fareed Maha Vidyalaya, Bandarawela', 'Provincial', 26),
(225, 'Sri Sangamitta Balika Vidyalaya, Matale', 'Provincial', 26),
(226, 'St. Anne\'s M.M.V, Vankalai, Mannar', 'Provincial', 26),
(227, 'St. Josophs College, Bandarawela', 'Provincial', 26),
(228, 'St. Mary\'s Maha vidayalaya, Bandarawela', 'Provincial', 26),
(229, 'St. Pauls Balika Maha Vidyalaya,Kelaniya', 'Provincial', 26),
(230, 'Sumagale Balika National College, Weligama', 'Provincial', 26),
(231, 'warnapali Balika Vidyalaya, Anuradhapura', 'Provincial', 26),
(232, 'Taxila Central College, Horana', 'Provincial', 26),
(233, 'Telijjawila Central College, Matara', 'Provincial', 26),
(234, 'Thihagoda M.M.V,Thihagoda', 'Provincial', 26),
(235, 'Tumpane Central College', 'Provincial', 26),
(236, 'Vishaka Maha Vidyalaya, Bandarawela', 'Provincial', 26),
(237, 'Vayavilan Central College, Vayavilan', 'Provincial', 26),
(238, 'Zahira College, Kalmunai', 'Provincial', 26),
(239, 'Alexcendra Collage, Maradana', 'Private', 1),
(240, 'Bishop\'s College', 'Private', 1),
(241, 'Buddhist Ladies College', 'Private', 1),
(242, 'Carey College, Borella', 'Private', 1),
(243, 'Good Shepherd Convent', 'Private', 1),
(244, 'Highlands College, Nugegoda', 'Private', 1),
(245, 'Holy Family Convent, Colombo 4', 'Private', 1),
(246, 'Holy Family Convent, Dehiwela', 'Private', 1),
(247, 'Ladies College, Colombo', 'Private', 1),
(248, 'Karlshrue College', 'Private', 1),
(249, 'Methodist College, Colombo', 'Private', 1),
(250, 'Musaeus College', 'Private', 1),
(251, 'Our Lady of Victories Convent, Moratuwa', 'Private', 1),
(252, 'St. Benedict\'s College, Coombo', 'Private', 1),
(253, 'St Bridget\'s Convent, Colombo', 'Private', 1),
(254, 'St. Joseph\'s College', 'Private', 1),
(255, 'St. Paul\'s Girls School, Milagiriya', 'Private', 1),
(256, 'St. Peter\'s College', 'Private', 1),
(257, 'St. Sebastian\'s College, Moratuwa', 'Private', 1),
(258, 'St. Thomas College, Mount Lavinia', 'Private', 1),
(259, 'S. Thomas\' Preparatory School,Kollupitiya', 'Private', 1),
(260, 'Sujatha Vidyalaya - Nugegoda', 'Private', 1),
(261, 'The School For The Blind', 'Private', 1),
(262, 'Wesley College', 'Private', 1),
(263, 'Zahira College, Colombo', 'Private', 1),
(264, 'Ave Maria Convent, Negombo', 'Private', 1),
(265, 'Maris Stella College, Negombo', 'Private', 1),
(266, 'Newstead College, Negombo', 'Private', 1),
(267, 'St. Mary\'s College, Negombo', 'Private', 1),
(268, 'Hillwood College', 'Private', 4),
(269, 'St Anthony\'s Balika Vidyalaya', 'Private', 4),
(270, 'St Anthony\'s College, Katugastota', 'Private', 4),
(271, 'Trinity College', 'Private', 4),
(272, 'Rippon Girls\' College', 'Private', 7),
(273, 'Chundikuli Girls High School', 'Private', 10),
(274, 'Hartley College', 'Private', 10),
(275, 'Jaffna College', 'Private', 10),
(276, 'Jaffna Convent', 'Private', 10),
(277, 'St. John\'s College, Jaffna', 'Private', 10),
(278, 'St. Patrick\'s College', 'Private', 10),
(279, 'Maliyadeva College', 'Private', 18),
(280, 'Holy Family Convent', 'Private', 18),
(281, 'St. Anne\'s College', 'Private', 18),
(282, 'St Thomas\' Girls School, Matale', 'Private', 5),
(283, 'St. Mary\'s Convent, Matara', 'Private', 8),
(284, 'St. Servatius\'College, Matara', 'Private', 8),
(285, 'St. Thomas Girl\'s School, Matara', 'Private', 8),
(286, 'St. Thomas\' College, Bandarawela', 'Private', 22),
(287, 'St. Thomas\' College, Guruthalawa', 'Private', 22),
(288, 'Child Jesus\'s Convent, Ratnapura', 'Private', 24),
(289, 'Ferguson High School, Ratnapura', 'Private', 24),
(290, 'St. Aloysius College, Ratnapura', 'Private', 24),
(291, 'St. Luke\'s College, Ratnapura', 'Private', 24),
(292, 'Holy Cross College, Gampaha', 'Private', 26),
(293, 'Holy Cross College, Kalutara', 'Private', 26),
(294, 'Mn.Vellankulam G.T.M.S, Mannar', 'Private', 26),
(295, 'St. Michael\'s College, Batticaloa', 'Private', 26),
(296, 'St. John\'s College, Panadura', 'Private', 26),
(297, 'St. Joseph\'s College, Trincomalee', 'Private', 26),
(298, 'St. John Bosco\'s College, Hatton', 'Private', 26),
(299, 'St. Thomas College, Guruthalawa', 'Private', 26),
(300, 'St. Thomas\'s College, Matale', 'Private', 26),
(301, 'St. Xavier Boy\'s National School, Mannar', 'Private', 26),
(302, 'Ceylinco Sussex College Network, Colombo', 'Private', 26),
(303, 'Ceylinco Sussex College Kandy Branch, Kandy', 'Private', 26),
(304, 'Ceylinco Sussex College Galle Branch, Galle', 'Private', 26),
(305, 'Ceylinco Sussex College Ratnapura Branch, Ratnapura', 'Private', 26),
(306, 'Minhal Boys\' School, Kotahena', 'Private', 26),
(307, 'Vajira College, Colombo', 'Private', 26),
(308, 'Vidura College, Colombo', 'Private', 26),
(309, 'Aba Beel International College', 'International', 1),
(310, 'American International School', 'International', 1),
(311, 'Alethea International School', 'International', 1),
(312, 'Amal International School', 'International', 1),
(313, 'Asian International School', 'International', 1),
(314, 'Belvoir College International', 'International', 1),
(315, 'Buddhist Ladies College International', 'International', 1),
(316, 'The British School in Colombo', 'International', 1),
(317, 'College Of World Education', 'International', 1),
(318, 'Colombo International School', 'International', 1),
(319, 'Colombo South International School', 'International', 1),
(320, 'Crescent Schools International', 'International', 1),
(321, 'Elizabeth Moir School', 'International', 1),
(322, 'Gateway College, Colombo', 'International', 1),
(323, 'Highlands College', 'International', 1),
(324, 'Ikra International School', 'International', 1),
(325, 'Ilma International School', 'International', 1),
(326, 'J.M.C. International School', 'International', 1),
(327, 'Lakeland Inter-American School', 'International', 1),
(328, 'Leighton Park International School', 'International', 1),
(329, 'Lyceum International School', 'International', 1),
(330, 'The Overseas School of Colombo', 'International', 1),
(331, 'Oxford College International', 'International', 1),
(332, 'Rotary International School', 'International', 1),
(333, 'Royal Institute', 'International', 1),
(334, 'Stafford International School', 'International', 1),
(335, 'Willesden College International', 'International', 1),
(336, 'Wycherley International School', 'International', 1),
(337, 'Winway International School', 'International', 1),
(338, 'Ecole Internationale', 'International', 4),
(339, 'Gateway College, Kandy (formally Kandy International School)', 'International', 4),
(340, 'Netherfield International School', 'International', 4),
(341, 'Vision International School', 'International', 4),
(342, 'Cambridge International, Matale', 'International', 26),
(343, 'Eureka International school, Kiribathgoda', 'International', 26),
(344, 'Gateway College, Negombo', 'International', 26),
(345, 'Leeds International School, Panadura', 'International', 26),
(346, 'Lyceum International School, Gampaha', 'International', 26),
(347, 'Lyceum International School, Kandana', 'International', 26),
(348, 'Lyceum International School, Panadura', 'International', 26),
(349, 'Lyceum International School, Ratnapura', 'International', 26),
(350, 'Lyceum International School, Wattala', 'International', 26),
(351, 'Negombo International School, Negombo', 'International', 26),
(352, 'Negombo South International School, Negombo', 'International', 26),
(353, 'Noor International School, Kalutara', 'International', 26),
(354, 'Royal International, Matale', 'International', 26),
(355, 'OKI International School, Wattala', 'International', 26),
(356, 'Sri Bodhiraja International College, Embilipitiya', 'International', 26),
(357, 'Ward International School, Gampaha', 'International', 26);

-- --------------------------------------------------------

--
-- Table structure for table `steamselectedbyalqualifiedstudent`
--

CREATE TABLE `steamselectedbyalqualifiedstudent` (
  `stu_id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stream`
--

CREATE TABLE `stream` (
  `stream_id` int(11) NOT NULL,
  `stream_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stream`
--

INSERT INTO `stream` (`stream_id`, `stream_name`) VALUES
(1, 'Arts'),
(2, 'Commerce'),
(3, 'Biological Science'),
(4, 'Physical Science (Maths)'),
(5, 'Engineering Technology'),
(6, 'Biosystems Technology (BST)'),
(7, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stu_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phn_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `address`, `gender`, `date_of_birth`, `email`, `phn_no`) VALUES
(2, '12/a, Kahahena, Waga', 'Male', '2002-05-15', 'denethchamodya03@gmail.com', '0714526390'),
(3, '34/c, Meepe, Padukka', 'Male', '2001-03-17', 'disaladivanjana@gmail.com', '0719236558'),
(4, '34/e, Kotikawatta, Padukka', 'Male', '2000-05-20', 'gimanthaanupama008@gmail.com', '0763399475'),
(5, '131/c, Kahatapitiya, Hanwella', 'Male', '1999-11-12', 'dhanushkasandakelum711@gmail.com', '0775642956');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `school` varchar(255) NOT NULL,
  `subjects` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `teacherenrollments`
--

CREATE TABLE `teacherenrollments` (
  `enroll_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `interaction` varchar(100) DEFAULT NULL,
  `applied_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacherenrollments`
--

INSERT INTO `teacherenrollments` (`enroll_id`, `user_id`, `post_id`, `interaction`, `applied_date`) VALUES
(1, 4, 2, 'applied', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `undergraduategraduate`
--

CREATE TABLE `undergraduategraduate` (
  `stu_id` int(11) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `uni_type` varchar(255) NOT NULL,
  `uni_name` varchar(255) NOT NULL,
  `gpa` decimal(5,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `undergraduategraduate`
--

INSERT INTO `undergraduategraduate` (`stu_id`, `degree`, `uni_type`, `uni_name`, `gpa`) VALUES
(5, 'Computer Science', 'Government', 'University of Colombo School of Computing', '3.8888');

-- --------------------------------------------------------

--
-- Table structure for table `unicodes`
--

CREATE TABLE `unicodes` (
  `uni_code` char(4) NOT NULL,
  `gov_uni_id` int(11) NOT NULL,
  `gov_course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `universitytype`
--

CREATE TABLE `universitytype` (
  `uni_type_id` int(11) NOT NULL,
  `uni_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `universitytype`
--

INSERT INTO `universitytype` (`uni_type_id`, `uni_type_name`) VALUES
(1, 'Government'),
(2, 'Semi-Goverment'),
(3, 'Private');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `actor_type` varchar(255) NOT NULL,
  `specialized_actor_type` varchar(255) NOT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profile_image`, `first_name`, `last_name`, `email`, `password`, `actor_type`, `specialized_actor_type`, `status`) VALUES
(1, '1635067735_adminwhiz.png', 'Admin', NULL, 'whizweblk@gmail.com', '$2y$10$83r9z7UOUd6140lFb0CK6eX3Eblo3MR8fwMc3yxBNb7S1yaFNnscq', 'Admin', 'Admin', 'verified'),
(2, '1635067869_deneth76619278_544743686322459_5761430540020350976_n.jpg', 'Deneth', 'Chamodya', 'denethchamodya03@gmail.com', '$2y$10$uDBbU2KJkUxfubpcdbTJx.LEQFxse3Da922BDBp3DuGzOg5B7Nx8O', 'Student', 'Beginner', 'verified'),
(3, '1635068007_divanjana175432290_2988468581430438_8059759429240737324_n.jpg', 'Divanjana', 'Disala', 'disaladivanjana@gmail.com', '$2y$10$uxVa.M2.bCb7VjVKOn3joeuyeyUj3tHcd4rzwxfUsOmmhsud1utce', 'Student', 'OL qualified', 'verified'),
(4, '1635068262_gimantha57104149_2292669454124047_8613897447199997952_n.jpg', 'Gimantha', 'Anupama', 'gimanthaanupama008@gmail.com', '$2y$10$5xUqEBL4Byx/Ekv8WyjZReVwlzrLqXJ8QA7RcbcuaW8H8Xj6PJF2e', 'Student', 'AL qualified', 'verified'),
(5, '1635068606_Dhanushka_pic.jpg', 'Dhanushka', 'Sandakelum', 'dhanushkasandakelum711@gmail.com', '$2y$10$RKo12K3g7GQ9zDk/d7fWrOc5hcR7NmnXhdhfaz5Tgoh3FLsn4glmO', 'Student', 'Undergraduate Graduate', 'verified'),
(6, '1635069017_sliitfd61a3b2-fbf1-4d5b-9b0f-8702058bdd5c.jpg', 'SLIIT', NULL, 'unisliitlk@gmail.com', '$2y$10$O19mMmhglJxRpBT.r50/3OnCnFt1xD7qGFoNc8BS5gWCu5G7HpQYS', 'Organization', 'University', 'verified'),
(7, '1635069224_abc2296d3db-eac7-4616-aae0-65ee01127d26.jpg', 'ABC', NULL, 'abcgroup202@gmail.com', '$2y$10$vEj1uPZ6zkXyoSdo4xP6OeoElHAqhcRHVkcWVtag27WzyIacDWh/K', 'Organization', 'Company', 'verified'),
(8, '1635069584_tharindu82271b09-b13a-46fa-9e8d-a55f1aa64186.jpg', 'Tharindu', 'Amarasekara', 'tharindu4151@gmail.com', '$2y$10$12phD6pcClHASfsQMtqSPeX4TWIgxXfaDsKZ7gKSD4Srmomz2Qo1G', 'Mentor', 'Professional Guider', 'verified'),
(9, '1635069687_pubudu73f7e870-17f5-4f53-a479-570d74961101.jpg', 'Pubudu', 'Pathirana', 'pubudu4151@gmail.com', '$2y$10$nEZIakq8bBS7oZhDbsYrxO3.5IoAjM2ZFs9xKN/3NsYGTUm9NMKGm', 'Mentor', 'Teacher', 'verified');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_complete_posts`
-- (See below for the actual view)
--
CREATE TABLE `v_complete_posts` (
`postId` int(11)
,`userId` int(11)
,`type` varchar(20)
,`image` varchar(255)
,`actor_type` varchar(255)
,`specialized_actor_type` varchar(255)
,`profile_image` varchar(255)
,`first_name` varchar(255)
,`last_name` varchar(255)
,`status` varchar(15)
,`postCreated` datetime
,`title` varchar(255)
,`body` text
,`applied` int(11)
,`capacity` int(11)
,`ups` int(11)
,`downs` int(11)
,`comment_count` bigint(21)
,`rate1` bigint(21)
,`rate2` bigint(21)
,`rate3` bigint(21)
,`rate4` bigint(21)
,`rate5` bigint(21)
,`review_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_enrol_student_list`
-- (See below for the actual view)
--
CREATE TABLE `v_enrol_student_list` (
`post_id` int(11)
,`user_id` int(11)
,`first_name` varchar(255)
,`last_name` varchar(255)
,`profile_image` varchar(255)
,`actor_type` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_gov_course_and_university`
-- (See below for the actual view)
--
CREATE TABLE `v_gov_course_and_university` (
`id` int(11)
,`gov_course_name` varchar(255)
,`uni_name` varchar(255)
,`unicode` varchar(255)
,`purposed_intake` int(11)
,`duration` int(11)
,`description` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_posts_rate1`
-- (See below for the actual view)
--
CREATE TABLE `v_posts_rate1` (
`postId` int(11)
,`rate1` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_posts_rate2`
-- (See below for the actual view)
--
CREATE TABLE `v_posts_rate2` (
`postId` int(11)
,`rate2` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_posts_rate3`
-- (See below for the actual view)
--
CREATE TABLE `v_posts_rate3` (
`postId` int(11)
,`rate3` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_posts_rate4`
-- (See below for the actual view)
--
CREATE TABLE `v_posts_rate4` (
`postId` int(11)
,`rate4` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_posts_rate5`
-- (See below for the actual view)
--
CREATE TABLE `v_posts_rate5` (
`postId` int(11)
,`rate5` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_posts_rates`
-- (See below for the actual view)
--
CREATE TABLE `v_posts_rates` (
`postId` int(11)
,`rate1` bigint(21)
,`rate2` bigint(21)
,`rate3` bigint(21)
,`rate4` bigint(21)
,`rate5` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_posts_with_comments`
-- (See below for the actual view)
--
CREATE TABLE `v_posts_with_comments` (
`postId` int(11)
,`comment_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_posts_with_rates`
-- (See below for the actual view)
--
CREATE TABLE `v_posts_with_rates` (
`postId` int(11)
,`rate1` bigint(21)
,`rate2` bigint(21)
,`rate3` bigint(21)
,`rate4` bigint(21)
,`rate5` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_posts_with_reviews`
-- (See below for the actual view)
--
CREATE TABLE `v_posts_with_reviews` (
`postId` int(11)
,`review_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_posts_with_users`
-- (See below for the actual view)
--
CREATE TABLE `v_posts_with_users` (
`image` varchar(255)
,`type` varchar(20)
,`first_name` varchar(255)
,`last_name` varchar(255)
,`profile_image` varchar(255)
,`actor_type` varchar(255)
,`specialized_actor_type` varchar(255)
,`status` varchar(15)
,`postId` int(11)
,`userId` int(11)
,`postCreated` datetime
,`title` varchar(255)
,`body` text
,`applied` int(11)
,`capacity` int(11)
,`ups` int(11)
,`downs` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `zscoretable`
--

CREATE TABLE `zscoretable` (
  `z_id` int(11) NOT NULL,
  `z_score` decimal(5,4) DEFAULT NULL,
  `district_id` int(11) NOT NULL,
  `gov_course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure for view `v_complete_posts`
--
DROP TABLE IF EXISTS `v_complete_posts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_complete_posts`  AS SELECT `v_posts_with_users`.`postId` AS `postId`, `v_posts_with_users`.`userId` AS `userId`, `v_posts_with_users`.`type` AS `type`, `v_posts_with_users`.`image` AS `image`, `v_posts_with_users`.`actor_type` AS `actor_type`, `v_posts_with_users`.`specialized_actor_type` AS `specialized_actor_type`, `v_posts_with_users`.`profile_image` AS `profile_image`, `v_posts_with_users`.`first_name` AS `first_name`, `v_posts_with_users`.`last_name` AS `last_name`, `v_posts_with_users`.`status` AS `status`, `v_posts_with_users`.`postCreated` AS `postCreated`, `v_posts_with_users`.`title` AS `title`, `v_posts_with_users`.`body` AS `body`, `v_posts_with_users`.`applied` AS `applied`, `v_posts_with_users`.`capacity` AS `capacity`, `v_posts_with_users`.`ups` AS `ups`, `v_posts_with_users`.`downs` AS `downs`, `v_posts_with_comments`.`comment_count` AS `comment_count`, ifnull(`v_posts_with_rates`.`rate1`,0) AS `rate1`, ifnull(`v_posts_with_rates`.`rate2`,0) AS `rate2`, ifnull(`v_posts_with_rates`.`rate3`,0) AS `rate3`, ifnull(`v_posts_with_rates`.`rate4`,0) AS `rate4`, ifnull(`v_posts_with_rates`.`rate5`,0) AS `rate5`, `v_posts_with_reviews`.`review_count` AS `review_count` FROM (((`v_posts_with_users` join `v_posts_with_rates` on(`v_posts_with_users`.`postId` = `v_posts_with_rates`.`postId`)) join `v_posts_with_reviews` on(`v_posts_with_users`.`postId` = `v_posts_with_reviews`.`postId`)) join `v_posts_with_comments` on(`v_posts_with_reviews`.`postId` = `v_posts_with_comments`.`postId`)) ORDER BY `v_posts_with_users`.`postCreated` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `v_enrol_student_list`
--
DROP TABLE IF EXISTS `v_enrol_student_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_enrol_student_list`  AS SELECT `profguiderenrollments`.`post_id` AS `post_id`, `profguiderenrollments`.`user_id` AS `user_id`, `users`.`first_name` AS `first_name`, `users`.`last_name` AS `last_name`, `users`.`profile_image` AS `profile_image`, `users`.`actor_type` AS `actor_type` FROM (`profguiderenrollments` join `users` on(`profguiderenrollments`.`user_id` = `users`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_gov_course_and_university`
--
DROP TABLE IF EXISTS `v_gov_course_and_university`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_gov_course_and_university`  AS SELECT `governmentcourseofferedbygovermentuniversity`.`id` AS `id`, `governmentcourse`.`gov_course_name` AS `gov_course_name`, `govermentuniversity`.`uni_name` AS `uni_name`, `governmentcourseofferedbygovermentuniversity`.`unicode` AS `unicode`, `governmentcourseofferedbygovermentuniversity`.`purposed_intake` AS `purposed_intake`, `governmentcourseofferedbygovermentuniversity`.`duration` AS `duration`, `governmentcourseofferedbygovermentuniversity`.`description` AS `description` FROM ((`governmentcourseofferedbygovermentuniversity` join `governmentcourse` on(`governmentcourseofferedbygovermentuniversity`.`gov_course_id` = `governmentcourse`.`gov_course_id`)) join `govermentuniversity` on(`governmentcourseofferedbygovermentuniversity`.`gov_uni_id` = `govermentuniversity`.`gov_uni_id`)) ORDER BY `governmentcourseofferedbygovermentuniversity`.`id` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `v_posts_rate1`
--
DROP TABLE IF EXISTS `v_posts_rate1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_posts_rate1`  AS SELECT `review`.`post_id` AS `postId`, count(`review`.`review_id`) AS `rate1` FROM `review` WHERE `review`.`rate` = 1 GROUP BY `review`.`post_id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_posts_rate2`
--
DROP TABLE IF EXISTS `v_posts_rate2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_posts_rate2`  AS SELECT `review`.`post_id` AS `postId`, count(`review`.`review_id`) AS `rate2` FROM `review` WHERE `review`.`rate` = 2 GROUP BY `review`.`post_id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_posts_rate3`
--
DROP TABLE IF EXISTS `v_posts_rate3`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_posts_rate3`  AS SELECT `review`.`post_id` AS `postId`, count(`review`.`review_id`) AS `rate3` FROM `review` WHERE `review`.`rate` = 3 GROUP BY `review`.`post_id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_posts_rate4`
--
DROP TABLE IF EXISTS `v_posts_rate4`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_posts_rate4`  AS SELECT `review`.`post_id` AS `postId`, count(`review`.`review_id`) AS `rate4` FROM `review` WHERE `review`.`rate` = 4 GROUP BY `review`.`post_id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_posts_rate5`
--
DROP TABLE IF EXISTS `v_posts_rate5`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_posts_rate5`  AS SELECT `review`.`post_id` AS `postId`, count(`review`.`review_id`) AS `rate5` FROM `review` WHERE `review`.`rate` = 5 GROUP BY `review`.`post_id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_posts_rates`
--
DROP TABLE IF EXISTS `v_posts_rates`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_posts_rates`  AS SELECT `posts`.`id` AS `postId`, `v_posts_rate1`.`rate1` AS `rate1`, `v_posts_rate2`.`rate2` AS `rate2`, `v_posts_rate3`.`rate3` AS `rate3`, `v_posts_rate4`.`rate4` AS `rate4`, `v_posts_rate5`.`rate5` AS `rate5` FROM (((((`posts` left join `v_posts_rate1` on(`posts`.`id` = `v_posts_rate1`.`postId`)) left join `v_posts_rate2` on(`posts`.`id` = `v_posts_rate2`.`postId`)) left join `v_posts_rate3` on(`posts`.`id` = `v_posts_rate3`.`postId`)) left join `v_posts_rate4` on(`posts`.`id` = `v_posts_rate4`.`postId`)) left join `v_posts_rate5` on(`posts`.`id` = `v_posts_rate5`.`postId`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_posts_with_comments`
--
DROP TABLE IF EXISTS `v_posts_with_comments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_posts_with_comments`  AS SELECT `posts`.`id` AS `postId`, count(`comments`.`comment_id`) AS `comment_count` FROM (`posts` left join `comments` on(`posts`.`id` = `comments`.`post_id`)) GROUP BY `posts`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_posts_with_rates`
--
DROP TABLE IF EXISTS `v_posts_with_rates`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_posts_with_rates`  AS SELECT `posts`.`id` AS `postId`, `v_posts_rates`.`rate1` AS `rate1`, `v_posts_rates`.`rate2` AS `rate2`, `v_posts_rates`.`rate3` AS `rate3`, `v_posts_rates`.`rate4` AS `rate4`, `v_posts_rates`.`rate5` AS `rate5` FROM (`posts` left join `v_posts_rates` on(`posts`.`id` = `v_posts_rates`.`postId`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_posts_with_reviews`
--
DROP TABLE IF EXISTS `v_posts_with_reviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_posts_with_reviews`  AS SELECT `posts`.`id` AS `postId`, count(`review`.`review_id`) AS `review_count` FROM (`posts` left join `review` on(`posts`.`id` = `review`.`post_id`)) GROUP BY `posts`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_posts_with_users`
--
DROP TABLE IF EXISTS `v_posts_with_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_posts_with_users`  AS SELECT `posts`.`image` AS `image`, `posts`.`type` AS `type`, `users`.`first_name` AS `first_name`, `users`.`last_name` AS `last_name`, `users`.`profile_image` AS `profile_image`, `users`.`actor_type` AS `actor_type`, `users`.`specialized_actor_type` AS `specialized_actor_type`, `users`.`status` AS `status`, `posts`.`id` AS `postId`, `users`.`id` AS `userId`, `posts`.`created_at` AS `postCreated`, `posts`.`title` AS `title`, `posts`.`body` AS `body`, `posts`.`applied` AS `applied`, `posts`.`capacity` AS `capacity`, `posts`.`ups` AS `ups`, `posts`.`downs` AS `downs` FROM (`posts` join `users` on(`posts`.`user_id` = `users`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `adminoffersgovernmentcourse`
--
ALTER TABLE `adminoffersgovernmentcourse`
  ADD PRIMARY KEY (`admin_id`,`gov_course_id`),
  ADD KEY `gov_course_id` (`gov_course_id`);

--
-- Indexes for table `aladmissiblestreamsubject`
--
ALTER TABLE `aladmissiblestreamsubject`
  ADD PRIMARY KEY (`stream_sbj_id`),
  ADD KEY `sub1_id` (`sub1_id`),
  ADD KEY `sub2_id` (`sub2_id`),
  ADD KEY `sub3_id` (`sub3_id`),
  ADD KEY `stream_id` (`stream_id`);

--
-- Indexes for table `aladmissiblestreamsubjectselected`
--
ALTER TABLE `aladmissiblestreamsubjectselected`
  ADD PRIMARY KEY (`stu_id`,`stream_sbj_id`),
  ADD KEY `stream_sbj_id` (`stream_sbj_id`),
  ADD KEY `ol_sub1_id` (`ol_sub1_id`),
  ADD KEY `ol_sub2_id` (`ol_sub2_id`),
  ADD KEY `ol_sub3_id` (`ol_sub3_id`);

--
-- Indexes for table `alqualifiedstudent`
--
ALTER TABLE `alqualifiedstudent`
  ADD PRIMARY KEY (`stu_id`),
  ADD KEY `al_sub1_id` (`al_sub1_id`),
  ADD KEY `al_sub2_id` (`al_sub2_id`),
  ADD KEY `al_sub3_id` (`al_sub3_id`);

--
-- Indexes for table `alsubject`
--
ALTER TABLE `alsubject`
  ADD PRIMARY KEY (`al_sub_id`),
  ADD KEY `al_stream_id` (`al_stream_id`);

--
-- Indexes for table `applicablecourcesforjobs`
--
ALTER TABLE `applicablecourcesforjobs`
  ADD PRIMARY KEY (`course_id`,`job_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `applicablestreamsforcourses`
--
ALTER TABLE `applicablestreamsforcourses`
  ADD PRIMARY KEY (`st_sub_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `beginnerstudent`
--
ALTER TABLE `beginnerstudent`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `commentinteractions`
--
ALTER TABLE `commentinteractions`
  ADD PRIMARY KEY (`comment_interaction_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `comment_id` (`comment_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `connections`
--
ALTER TABLE `connections`
  ADD PRIMARY KEY (`connection_id`),
  ADD KEY `from_user_id` (`from_user_id`),
  ADD KEY `to_user_id` (`to_user_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `govermentuniversity`
--
ALTER TABLE `govermentuniversity`
  ADD PRIMARY KEY (`gov_uni_id`);

--
-- Indexes for table `governmentcourse`
--
ALTER TABLE `governmentcourse`
  ADD PRIMARY KEY (`gov_course_id`);

--
-- Indexes for table `governmentcourseminimumeligibilityrequsingalsubjects`
--
ALTER TABLE `governmentcourseminimumeligibilityrequsingalsubjects`
  ADD PRIMARY KEY (`min_req_id`),
  ADD KEY `al_sub1_id` (`al_sub1_id`),
  ADD KEY `al_sub2_id` (`al_sub2_id`),
  ADD KEY `al_sub3_id` (`al_sub3_id`);

--
-- Indexes for table `governmentcourseofferedbygovermentuniversity`
--
ALTER TABLE `governmentcourseofferedbygovermentuniversity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gov_course_id` (`gov_course_id`),
  ADD KEY `gov_uni_id` (`gov_uni_id`);

--
-- Indexes for table `intakenotices`
--
ALTER TABLE `intakenotices`
  ADD PRIMARY KEY (`notice_id`),
  ADD KEY `uni_id` (`uni_id`);

--
-- Indexes for table `jobapplicants`
--
ALTER TABLE `jobapplicants`
  ADD PRIMARY KEY (`job_apply_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `mentor`
--
ALTER TABLE `mentor`
  ADD PRIMARY KEY (`mentor_id`);

--
-- Indexes for table `olqualifiedstudent`
--
ALTER TABLE `olqualifiedstudent`
  ADD PRIMARY KEY (`stu_id`),
  ADD KEY `ol_sub1_id` (`ol_sub1_id`),
  ADD KEY `ol_sub2_id` (`ol_sub2_id`),
  ADD KEY `ol_sub3_id` (`ol_sub3_id`),
  ADD KEY `ol_sub4_id` (`ol_sub4_id`),
  ADD KEY `ol_sub5_id` (`ol_sub5_id`),
  ADD KEY `ol_sub6_id` (`ol_sub6_id`),
  ADD KEY `ol_sub7_id` (`ol_sub7_id`),
  ADD KEY `ol_sub8_id` (`ol_sub8_id`),
  ADD KEY `ol_sub9_id` (`ol_sub9_id`);

--
-- Indexes for table `olsubject`
--
ALTER TABLE `olsubject`
  ADD PRIMARY KEY (`ol_sub_id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `postinteractions`
--
ALTER TABLE `postinteractions`
  ADD PRIMARY KEY (`interaction_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privatecourses`
--
ALTER TABLE `privatecourses`
  ADD PRIMARY KEY (`privatecourse_id`),
  ADD KEY `private_uni_Id` (`private_uni_Id`);

--
-- Indexes for table `privateuniversity`
--
ALTER TABLE `privateuniversity`
  ADD PRIMARY KEY (`privateuni_id`);

--
-- Indexes for table `profguide`
--
ALTER TABLE `profguide`
  ADD PRIMARY KEY (`guider_id`),
  ADD KEY `mentor_id` (`mentor_id`);

--
-- Indexes for table `profguiderenrollments`
--
ALTER TABLE `profguiderenrollments`
  ADD PRIMARY KEY (`enroll_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `steamselectedbyalqualifiedstudent`
--
ALTER TABLE `steamselectedbyalqualifiedstudent`
  ADD PRIMARY KEY (`stu_id`,`stream_id`),
  ADD KEY `stream_id` (`stream_id`);

--
-- Indexes for table `stream`
--
ALTER TABLE `stream`
  ADD PRIMARY KEY (`stream_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `mentor_id` (`mentor_id`);

--
-- Indexes for table `teacherenrollments`
--
ALTER TABLE `teacherenrollments`
  ADD PRIMARY KEY (`enroll_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `undergraduategraduate`
--
ALTER TABLE `undergraduategraduate`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `unicodes`
--
ALTER TABLE `unicodes`
  ADD PRIMARY KEY (`uni_code`),
  ADD KEY `gov_uni_id` (`gov_uni_id`),
  ADD KEY `gov_course_id` (`gov_course_id`);

--
-- Indexes for table `universitytype`
--
ALTER TABLE `universitytype`
  ADD PRIMARY KEY (`uni_type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zscoretable`
--
ALTER TABLE `zscoretable`
  ADD PRIMARY KEY (`z_id`),
  ADD KEY `district_id` (`district_id`),
  ADD KEY `gov_course_id` (`gov_course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alsubject`
--
ALTER TABLE `alsubject`
  MODIFY `al_sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `commentinteractions`
--
ALTER TABLE `commentinteractions`
  MODIFY `comment_interaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `connections`
--
ALTER TABLE `connections`
  MODIFY `connection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `govermentuniversity`
--
ALTER TABLE `govermentuniversity`
  MODIFY `gov_uni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `governmentcourseminimumeligibilityrequsingalsubjects`
--
ALTER TABLE `governmentcourseminimumeligibilityrequsingalsubjects`
  MODIFY `min_req_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `governmentcourseofferedbygovermentuniversity`
--
ALTER TABLE `governmentcourseofferedbygovermentuniversity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `intakenotices`
--
ALTER TABLE `intakenotices`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobapplicants`
--
ALTER TABLE `jobapplicants`
  MODIFY `job_apply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mentor`
--
ALTER TABLE `mentor`
  MODIFY `mentor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `olsubject`
--
ALTER TABLE `olsubject`
  MODIFY `ol_sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `postinteractions`
--
ALTER TABLE `postinteractions`
  MODIFY `interaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profguide`
--
ALTER TABLE `profguide`
  MODIFY `guider_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profguiderenrollments`
--
ALTER TABLE `profguiderenrollments`
  MODIFY `enroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=358;

--
-- AUTO_INCREMENT for table `stream`
--
ALTER TABLE `stream`
  MODIFY `stream_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacherenrollments`
--
ALTER TABLE `teacherenrollments`
  MODIFY `enroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `universitytype`
--
ALTER TABLE `universitytype`
  MODIFY `uni_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `zscoretable`
--
ALTER TABLE `zscoretable`
  MODIFY `z_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminoffersgovernmentcourse`
--
ALTER TABLE `adminoffersgovernmentcourse`
  ADD CONSTRAINT `adminoffersgovernmentcourse_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `adminoffersgovernmentcourse_ibfk_2` FOREIGN KEY (`gov_course_id`) REFERENCES `governmentcourse` (`gov_course_id`);

--
-- Constraints for table `aladmissiblestreamsubject`
--
ALTER TABLE `aladmissiblestreamsubject`
  ADD CONSTRAINT `aladmissiblestreamsubject_ibfk_1` FOREIGN KEY (`sub1_id`) REFERENCES `alsubject` (`al_sub_id`),
  ADD CONSTRAINT `aladmissiblestreamsubject_ibfk_2` FOREIGN KEY (`sub2_id`) REFERENCES `alsubject` (`al_sub_id`),
  ADD CONSTRAINT `aladmissiblestreamsubject_ibfk_3` FOREIGN KEY (`sub3_id`) REFERENCES `alsubject` (`al_sub_id`),
  ADD CONSTRAINT `aladmissiblestreamsubject_ibfk_4` FOREIGN KEY (`stream_id`) REFERENCES `stream` (`stream_id`);

--
-- Constraints for table `aladmissiblestreamsubjectselected`
--
ALTER TABLE `aladmissiblestreamsubjectselected`
  ADD CONSTRAINT `aladmissiblestreamsubjectselected_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `alqualifiedstudent` (`stu_id`),
  ADD CONSTRAINT `aladmissiblestreamsubjectselected_ibfk_2` FOREIGN KEY (`stream_sbj_id`) REFERENCES `aladmissiblestreamsubject` (`stream_sbj_id`),
  ADD CONSTRAINT `aladmissiblestreamsubjectselected_ibfk_3` FOREIGN KEY (`ol_sub1_id`) REFERENCES `olsubject` (`ol_sub_id`),
  ADD CONSTRAINT `aladmissiblestreamsubjectselected_ibfk_4` FOREIGN KEY (`ol_sub2_id`) REFERENCES `olsubject` (`ol_sub_id`),
  ADD CONSTRAINT `aladmissiblestreamsubjectselected_ibfk_5` FOREIGN KEY (`ol_sub3_id`) REFERENCES `olsubject` (`ol_sub_id`);

--
-- Constraints for table `alqualifiedstudent`
--
ALTER TABLE `alqualifiedstudent`
  ADD CONSTRAINT `alqualifiedstudent_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `student` (`stu_id`),
  ADD CONSTRAINT `alqualifiedstudent_ibfk_2` FOREIGN KEY (`al_sub1_id`) REFERENCES `alsubject` (`al_sub_id`),
  ADD CONSTRAINT `alqualifiedstudent_ibfk_3` FOREIGN KEY (`al_sub2_id`) REFERENCES `alsubject` (`al_sub_id`),
  ADD CONSTRAINT `alqualifiedstudent_ibfk_4` FOREIGN KEY (`al_sub3_id`) REFERENCES `alsubject` (`al_sub_id`);

--
-- Constraints for table `alsubject`
--
ALTER TABLE `alsubject`
  ADD CONSTRAINT `alsubject_ibfk_1` FOREIGN KEY (`al_stream_id`) REFERENCES `stream` (`stream_id`);

--
-- Constraints for table `applicablecourcesforjobs`
--
ALTER TABLE `applicablecourcesforjobs`
  ADD CONSTRAINT `applicablecourcesforjobs_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `applicablecourcesforjobs_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`);

--
-- Constraints for table `applicablestreamsforcourses`
--
ALTER TABLE `applicablestreamsforcourses`
  ADD CONSTRAINT `applicablestreamsforcourses_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `applicablestreamsforcourses_ibfk_2` FOREIGN KEY (`st_sub_id`) REFERENCES `aladmissiblestreamsubject` (`stream_sbj_id`);

--
-- Constraints for table `beginnerstudent`
--
ALTER TABLE `beginnerstudent`
  ADD CONSTRAINT `beginnerstudent_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `student` (`stu_id`);

--
-- Constraints for table `commentinteractions`
--
ALTER TABLE `commentinteractions`
  ADD CONSTRAINT `commentinteractions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `commentinteractions_ibfk_2` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`comment_id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `organization` (`org_id`);

--
-- Constraints for table `connections`
--
ALTER TABLE `connections`
  ADD CONSTRAINT `connections_ibfk_1` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `connections_ibfk_2` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `governmentcourseminimumeligibilityrequsingalsubjects`
--
ALTER TABLE `governmentcourseminimumeligibilityrequsingalsubjects`
  ADD CONSTRAINT `governmentcourseminimumeligibilityrequsingalsubjects_ibfk_1` FOREIGN KEY (`al_sub1_id`) REFERENCES `alsubject` (`al_sub_id`),
  ADD CONSTRAINT `governmentcourseminimumeligibilityrequsingalsubjects_ibfk_2` FOREIGN KEY (`al_sub2_id`) REFERENCES `alsubject` (`al_sub_id`),
  ADD CONSTRAINT `governmentcourseminimumeligibilityrequsingalsubjects_ibfk_3` FOREIGN KEY (`al_sub3_id`) REFERENCES `alsubject` (`al_sub_id`);

--
-- Constraints for table `governmentcourseofferedbygovermentuniversity`
--
ALTER TABLE `governmentcourseofferedbygovermentuniversity`
  ADD CONSTRAINT `governmentcourseofferedbygovermentuniversity_ibfk_1` FOREIGN KEY (`gov_course_id`) REFERENCES `governmentcourse` (`gov_course_id`),
  ADD CONSTRAINT `governmentcourseofferedbygovermentuniversity_ibfk_2` FOREIGN KEY (`gov_uni_id`) REFERENCES `govermentuniversity` (`gov_uni_id`);

--
-- Constraints for table `intakenotices`
--
ALTER TABLE `intakenotices`
  ADD CONSTRAINT `intakenotices_ibfk_1` FOREIGN KEY (`uni_id`) REFERENCES `privateuniversity` (`privateuni_id`);

--
-- Constraints for table `jobapplicants`
--
ALTER TABLE `jobapplicants`
  ADD CONSTRAINT `jobapplicants_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `jobapplicants_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`);

--
-- Constraints for table `olqualifiedstudent`
--
ALTER TABLE `olqualifiedstudent`
  ADD CONSTRAINT `olqualifiedstudent_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `student` (`stu_id`),
  ADD CONSTRAINT `olqualifiedstudent_ibfk_10` FOREIGN KEY (`ol_sub9_id`) REFERENCES `olsubject` (`ol_sub_id`),
  ADD CONSTRAINT `olqualifiedstudent_ibfk_2` FOREIGN KEY (`ol_sub1_id`) REFERENCES `olsubject` (`ol_sub_id`),
  ADD CONSTRAINT `olqualifiedstudent_ibfk_3` FOREIGN KEY (`ol_sub2_id`) REFERENCES `olsubject` (`ol_sub_id`),
  ADD CONSTRAINT `olqualifiedstudent_ibfk_4` FOREIGN KEY (`ol_sub3_id`) REFERENCES `olsubject` (`ol_sub_id`),
  ADD CONSTRAINT `olqualifiedstudent_ibfk_5` FOREIGN KEY (`ol_sub4_id`) REFERENCES `olsubject` (`ol_sub_id`),
  ADD CONSTRAINT `olqualifiedstudent_ibfk_6` FOREIGN KEY (`ol_sub5_id`) REFERENCES `olsubject` (`ol_sub_id`),
  ADD CONSTRAINT `olqualifiedstudent_ibfk_7` FOREIGN KEY (`ol_sub6_id`) REFERENCES `olsubject` (`ol_sub_id`),
  ADD CONSTRAINT `olqualifiedstudent_ibfk_8` FOREIGN KEY (`ol_sub7_id`) REFERENCES `olsubject` (`ol_sub_id`),
  ADD CONSTRAINT `olqualifiedstudent_ibfk_9` FOREIGN KEY (`ol_sub8_id`) REFERENCES `olsubject` (`ol_sub_id`);

--
-- Constraints for table `postinteractions`
--
ALTER TABLE `postinteractions`
  ADD CONSTRAINT `postinteractions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `postinteractions_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `privatecourses`
--
ALTER TABLE `privatecourses`
  ADD CONSTRAINT `privatecourses_ibfk_1` FOREIGN KEY (`privatecourse_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `privatecourses_ibfk_2` FOREIGN KEY (`private_uni_Id`) REFERENCES `privateuniversity` (`privateuni_id`);

--
-- Constraints for table `privateuniversity`
--
ALTER TABLE `privateuniversity`
  ADD CONSTRAINT `privateuniversity_ibfk_1` FOREIGN KEY (`privateuni_id`) REFERENCES `organization` (`org_id`);

--
-- Constraints for table `profguide`
--
ALTER TABLE `profguide`
  ADD CONSTRAINT `profguide_ibfk_1` FOREIGN KEY (`mentor_id`) REFERENCES `mentor` (`mentor_id`);

--
-- Constraints for table `profguiderenrollments`
--
ALTER TABLE `profguiderenrollments`
  ADD CONSTRAINT `profguiderenrollments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `profguiderenrollments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `school`
--
ALTER TABLE `school`
  ADD CONSTRAINT `school_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `district` (`district_id`);

--
-- Constraints for table `steamselectedbyalqualifiedstudent`
--
ALTER TABLE `steamselectedbyalqualifiedstudent`
  ADD CONSTRAINT `steamselectedbyalqualifiedstudent_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `alqualifiedstudent` (`stu_id`),
  ADD CONSTRAINT `steamselectedbyalqualifiedstudent_ibfk_2` FOREIGN KEY (`stream_id`) REFERENCES `stream` (`stream_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`mentor_id`) REFERENCES `mentor` (`mentor_id`);

--
-- Constraints for table `teacherenrollments`
--
ALTER TABLE `teacherenrollments`
  ADD CONSTRAINT `teacherenrollments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `teacherenrollments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `undergraduategraduate`
--
ALTER TABLE `undergraduategraduate`
  ADD CONSTRAINT `undergraduategraduate_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `student` (`stu_id`);

--
-- Constraints for table `unicodes`
--
ALTER TABLE `unicodes`
  ADD CONSTRAINT `unicodes_ibfk_1` FOREIGN KEY (`gov_uni_id`) REFERENCES `govermentuniversity` (`gov_uni_id`),
  ADD CONSTRAINT `unicodes_ibfk_2` FOREIGN KEY (`gov_course_id`) REFERENCES `governmentcourse` (`gov_course_id`);

--
-- Constraints for table `zscoretable`
--
ALTER TABLE `zscoretable`
  ADD CONSTRAINT `zscoretable_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `district` (`district_id`),
  ADD CONSTRAINT `zscoretable_ibfk_2` FOREIGN KEY (`gov_course_id`) REFERENCES `governmentcourse` (`gov_course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
