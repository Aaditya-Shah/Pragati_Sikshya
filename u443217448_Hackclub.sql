-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 29, 2025 at 03:29 AM
-- Server version: 11.8.3-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u443217448_Hackclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `session_date` date NOT NULL,
  `status` enum('Present','Absent') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `start_year` year(4) NOT NULL,
  `end_year` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `name`, `start_year`, `end_year`, `created_at`) VALUES
(1, 'Batch 2025', '2024', '2025', '2025-07-19 02:12:27'),
(2, 'Homepage', '2002', '2003', '2025-07-19 02:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `batch_enrollments`
--

CREATE TABLE `batch_enrollments` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch_enrollments`
--

INSERT INTO `batch_enrollments` (`id`, `student_id`, `batch_id`) VALUES
(1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sent_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `sender_id`, `receiver_id`, `message`, `sent_at`) VALUES
(9, 18, 5, 'kire uncle?', '2025-09-28 20:07:19'),
(10, 23, 18, 'gf', '2025-09-28 20:07:27'),
(11, 23, 18, 'gf', '2025-09-28 20:07:27'),
(12, 23, 18, 'dg', '2025-09-28 20:07:28'),
(13, 23, 18, 'fd', '2025-09-28 20:07:29'),
(14, 23, 18, 'df', '2025-09-28 20:07:30'),
(15, 23, 18, 'df', '2025-09-28 20:07:30'),
(16, 23, 18, 'df', '2025-09-28 20:07:31'),
(17, 23, 18, 'f', '2025-09-28 20:07:32'),
(18, 23, 18, 'fg', '2025-09-28 20:07:32'),
(19, 23, 18, 'fg', '2025-09-28 20:07:33'),
(20, 23, 18, 'gf', '2025-09-28 20:07:33'),
(21, 23, 18, 'f', '2025-09-28 20:07:33'),
(22, 23, 18, 'f', '2025-09-28 20:07:33'),
(23, 23, 18, 'fsplgpjkbigdmo,jo', '2025-09-28 20:07:35'),
(24, 18, 3, 'yes', '2025-09-28 20:08:45'),
(25, 25, 4, 'hello', '2025-09-28 20:22:48'),
(26, 25, 1, 'hey bro \\', '2025-09-28 20:23:23'),
(27, 26, 27, 'okok', '2025-09-29 00:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `instructor_id`, `category`, `image_url`, `created_at`) VALUES
(1, 'Hackathon Starter By NexHunter', 'Hackanthon', 26, 'Entrance Preparation', 'uploads/thumbnails/owl.png', '2025-07-19 15:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `course_enrollments`
--

CREATE TABLE `course_enrollments` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `enrollment_date` timestamp NULL DEFAULT current_timestamp(),
  `progress` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_enrollments`
--

INSERT INTO `course_enrollments` (`id`, `student_id`, `course_id`, `enrollment_date`, `progress`) VALUES
(1, 5, 1, '2025-07-19 15:16:37', 10),
(13, 18, 1, '2025-09-28 18:29:52', 0),
(14, 19, 1, '2025-09-28 18:33:16', 0),
(15, 20, 1, '2025-09-28 18:48:26', 0),
(16, 21, 1, '2025-09-28 18:50:54', 0),
(17, 22, 1, '2025-09-28 18:53:16', 0),
(18, 23, 1, '2025-09-28 19:23:43', 0),
(19, 24, 1, '2025-09-28 20:12:33', 0),
(20, 25, 1, '2025-09-28 20:17:08', 0),
(21, 26, 1, '2025-09-28 20:23:07', 0),
(22, 27, 1, '2025-09-28 23:25:31', 0),
(23, 28, 1, '2025-09-29 00:07:51', 0),
(24, 29, 1, '2025-09-29 00:35:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_instructors`
--

CREATE TABLE `course_instructors` (
  `course_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_instructors`
--

INSERT INTO `course_instructors` (`course_id`, `instructor_id`) VALUES
(1, 2),
(1, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `live_classes`
--

CREATE TABLE `live_classes` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `class_time` datetime NOT NULL,
  `class_type` enum('Zoom','Native') NOT NULL,
  `meeting_url` varchar(255) DEFAULT NULL,
  `meeting_password` varchar(100) DEFAULT NULL,
  `thumbnail_url` varchar(255) DEFAULT NULL,
  `is_recorded` tinyint(1) DEFAULT 0,
  `recording_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `live_classes`
--

INSERT INTO `live_classes` (`id`, `course_id`, `instructor_id`, `title`, `class_time`, `class_type`, `meeting_url`, `meeting_password`, `thumbnail_url`, `is_recorded`, `recording_url`, `created_at`) VALUES
(5, 1, 19, 'Arjan class', '2025-09-18 00:26:00', 'Zoom', 'https://hackclub.yantraiot.com/instructor/live_class.php?tab=live', '', NULL, 0, NULL, '2025-09-28 18:42:18'),
(6, 1, 19, 'wer', '2025-09-19 00:34:00', 'Native', 'https://hackclub.yantraiot.com/instructor/live_class.php?tab=live', 'rew', NULL, 0, NULL, '2025-09-28 18:50:03'),
(7, 1, 26, 'Hack Club Official', '2025-09-29 02:32:00', 'Zoom', 'https://www.youtube.com/watch?v=AnG56HUDzdI', 'ghhgf', NULL, 0, NULL, '2025-09-28 20:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `uploaded_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plugins`
--

CREATE TABLE `plugins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `icon` varchar(50) DEFAULT 'toy-brick',
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `role_access` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`role_access`)),
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plugins`
--

INSERT INTO `plugins` (`id`, `name`, `icon`, `is_active`, `role_access`, `description`) VALUES
(1, 'Zoom Integration', 'video', 1, '[\"Admin\", \"Instructor\"]', 'Allows instructors to schedule and manage Zoom classes.'),
(2, 'Mock Tests', 'file-text', 1, '[\"Admin\", \"Instructor\", \"Student\"]', 'Enable creation and participation in mock tests.'),
(3, 'Live Chat', 'message-square', 1, '[\"Admin\", \"Instructor\", \"Student\"]', 'Real-time chat with other users.');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`options`)),
  `correct_option` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `test_id`, `question_text`, `options`, `correct_option`) VALUES
(1, 1, 'What is the unit of force?', '[\"Watt\", \"Joule\", \"Newton\"]', 2),
(2, 1, 'What is the formula for water?', '[\"H₂O\", \"CO₂\", \"O₂\"]', 0),
(3, 2, 'js', '[\"j\",\"yes\",\"yes\",\"yes\"]', 0),
(4, 3, 'What is apple', '[\"Mjnfc\",\"wfe34\",\"345\",\"35\"]', 0),
(5, 4, 'The unit of force in SI is:', '[\"Dyne\",\"Newton\",\"Joule\",\"Pascal\"]', 1),
(6, 4, 'A body of mass 2 kg is moving with velocity 4 m/s. Its kinetic energy is:', '[\"4 J\",\"8 J\",\"12J\",\"16J\"]', 3),
(7, 4, 'The speed of light in vacuum is:', '[\"3 \\u00d7 10^8 m\\/s\",\"2.33\\u00d7 10^8 m\\/s\",\"2 \\u00d7 10^8 m\\/s\",\"7\\u00d7 10^8 m\\/s\"]', 0),
(8, 4, 'The SI unit of capacitance is:', '[\"Farad\",\"Henry\",\"Tesla\",\"Ki re bauwa?\"]', 0),
(9, 4, 'De Broglie wavelength is inversely proportional to:', '[\"Momentum \",\"Energy\",\"Radius\",\"None\"]', 0),
(10, 5, '1. Which of the following has the highest electronegativity?', '[\"Oxygen\",\"Fluorine\",\"Chlorine\",\"Nitrogen\"]', 1),
(11, 5, 'Avogadro’s law states that equal volumes of gases under the same conditions of temperature and pressure contain:', '[\"Equal Masses\",\"Equal Molecules\",\"Equal Atoms \",\"Equal Densities\"]', 1),
(12, 5, 'The pH of 0.001 M HCl solution is:', '[\"1\",\"2\",\"3\",\"4\"]', 2),
(13, 5, 'Which orbital has a spherical shape?', '[\"s-orbital\",\"p-orbital\",\"d-orbital\",\"f-orbital\"]', 0),
(14, 5, 'Which gas is liberated when zinc reacts with dilute HCl?', '[\"Oxygen\",\"Hydrogen\",\"Chlorine\",\"Sukkiem\"]', 1),
(15, 2, 'yesd', '[\"Dyne\",\"Momentum \",\"Farad\",\"Farad\"]', 2);

-- --------------------------------------------------------

--
-- Table structure for table `recorded_classes`
--

CREATE TABLE `recorded_classes` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `video_url` varchar(255) NOT NULL,
  `thumbnail_url` varchar(255) DEFAULT NULL,
  `video_platform` varchar(50) DEFAULT 'YouTube',
  `recording_password` varchar(100) DEFAULT NULL,
  `recording_date` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL COMMENT 'Duration in minutes',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `duration_minutes` int(11) NOT NULL DEFAULT 30,
  `start_time` datetime DEFAULT NULL,
  `status` enum('Draft','Published') NOT NULL DEFAULT 'Draft',
  `test_type` enum('MCQ','PDF') NOT NULL DEFAULT 'MCQ',
  `pdf_url` varchar(255) DEFAULT NULL,
  `answer_key` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`answer_key`)),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `course_id`, `title`, `duration_minutes`, `start_time`, `status`, `test_type`, `pdf_url`, `answer_key`, `created_at`) VALUES
(1, 1, 'Physics Mock Test 1 (Published)', 1000, '2023-09-28 20:22:04', 'Published', 'MCQ', NULL, NULL, '2025-07-19 15:16:37'),
(2, 1, 'Mock Test Weekly - 1', 119, '2023-09-28 22:58:06', 'Published', 'MCQ', NULL, NULL, '2025-07-20 11:46:20'),
(3, 1, 'nex', 31, '2023-09-28 20:22:03', 'Published', 'MCQ', NULL, NULL, '2025-09-28 20:15:02'),
(4, 1, 'Physics', 30, '2023-09-29 00:41:15', 'Published', 'MCQ', NULL, NULL, '2025-09-28 20:27:42'),
(5, 1, 'Chemistry ', 30, '2023-09-29 00:07:13', 'Published', 'MCQ', NULL, NULL, '2025-09-28 20:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `test_results`
--

CREATE TABLE `test_results` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `score` decimal(5,2) NOT NULL,
  `answers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`answers`)),
  `submitted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_results`
--

INSERT INTO `test_results` (`id`, `test_id`, `student_id`, `score`, `answers`, `submitted_at`) VALUES
(4, 1, 5, 50.00, '{\"1\":\"2\",\"2\":\"1\"}', '2025-07-20 09:09:24'),
(5, 3, 18, 100.00, '{\"4\":\"0\"}', '2025-09-28 20:19:31'),
(6, 1, 18, 50.00, '{\"1\":\"2\",\"2\":\"1\"}', '2025-09-28 20:21:14'),
(7, 4, 28, 20.00, '{\"5\":\"0\",\"6\":\"1\",\"7\":\"0\",\"8\":\"1\",\"9\":\"3\"}', '2025-09-29 00:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','Instructor','Student') NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `status` enum('Active','Suspended') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `avatar_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `avatar`, `status`, `created_at`, `avatar_url`) VALUES
(1, 'Admin Panel', 'admin@arniko.yantraiot.com', '$2y$10$VW8E2d4ja51sRaT0a6VI/OEndr00iPRDoOybg9sz.VLZouh8aBNZq', 'Admin', 'uploads/default.png', 'Active', '2025-07-19 15:16:37', NULL),
(2, 'Vedant', 'KM@arniko.yantraiot.com', '$2y$10$SPZUprK1u3txf7BgOrAPwOxYaYuqrkOeBIZotJnu7XCM/DUdgLPvK', 'Instructor', 'uploads/default.png', 'Active', '2025-07-19 15:16:37', NULL),
(3, 'Anik', 'AKY@arniko.yantraiot.com', '$2y$10$WVx81Py/sKJKWjXzgS4R1ezFVi7Dr4BHFEzy9FjhFlm9PeXnaBfku', 'Instructor', 'uploads/default.png', 'Active', '2025-07-19 15:16:37', NULL),
(4, 'Shaksham', 'PA@arniko.yantraiot.com', '$2y$10$cR7e8oUDcy6VmGkRVq3EveB7oPzAa4r3yESj8TujrF07IyHzgnkx2', 'Instructor', 'uploads/default.png', 'Active', '2025-07-19 15:16:37', NULL),
(5, 'Arjan Chaudary', 'hacker@glowwtech.com', '$2y$10$ti6a/gKDYTTBrbbh6vANSui356w1uJOGe9J8yji..T1FFWwfpsQVe', 'Student', 'uploads/default.png', 'Active', '2025-07-19 15:16:37', '../uploads/avatars/avatar_68d9951da7c5b.jpeg'),
(18, 'iwdaw', '111@gmail.com', '$2y$10$KyQFGLjgQP6W3AusSEdYnO8z/OE/D/4ajxYKINTJ5pHRIDhW53R.q', 'Student', 'uploads/default.png', 'Active', '2025-09-28 18:29:52', NULL),
(19, 'Aaditya@arnikofoundation.edu.np', 'Aaditya@arnikofoundation.edu.np', '$2y$10$0AQbw/NvaqdB310F2oLnYurebUVl.3/Bund1FxYQsgG4KIEo77igu', 'Instructor', 'uploads/default.png', 'Active', '2025-09-28 18:33:16', '../uploads/avatars/avatar_68d9f34ee88a0.png'),
(20, 'student@example.comm', 'student@example.comm', '$2y$10$jYljXPdmHBTGVPnRU4Upvu71p.DPBpLFt2K2zvmdD7D3RxXpeklUS', 'Student', 'uploads/default.png', 'Active', '2025-09-28 18:48:26', NULL),
(21, 'admin@gmail.com', 'admin@gmail.com', '$2y$10$mqKbR60coz38pKs.gwcRXOGICcX/ZO9jssUjQMriDlgKzJvbbWJki', 'Student', 'uploads/default.png', 'Active', '2025-09-28 18:50:54', NULL),
(22, 'abcd@gmail.com', 'abcd@gmail.com', '$2y$10$sgKCbK5Sig31HOaxg/bsQePcoxfxwkmj7P1NGDHEKZTAL7EGmJz8C', 'Student', 'uploads/default.png', 'Active', '2025-09-28 18:53:16', NULL),
(23, 'aadityavid@gmail.com', 'aadityavid@gmail.com', '$2y$10$LFD5QUMjpvmIwEfaay0JkexaAS/uLlkZ3iMsZSY2D..lMNnHjOxu2', 'Student', 'uploads/default.png', 'Active', '2025-09-28 19:23:43', NULL),
(24, 'instructor@gmail.com', 'instructor@gmail.com', '$2y$10$Fv2/hOAF7jpQeuy0Ta4t/OPPd5JPQPa2Km2Wv605IpfuZ1A0E7Fmm', 'Instructor', 'uploads/default.png', 'Active', '2025-09-28 20:12:33', NULL),
(25, 'Stundent@gamdfsiojdfm.cofm', 'Stundent@gamdfsiojdfm.cofm', '$2y$10$RL0zAjlPJBMyv980eNKB1.cdXTUgEP4pWSNa964T9q.FjNfSlPsxi', 'Student', 'uploads/default.png', 'Active', '2025-09-28 20:17:08', NULL),
(26, 'Vedant hacker', 'Vedant@gmail.com', '$2y$10$CYvTl5qdngQ6alcovPumGut96s1jYoEUCvZUH72dS6xis7.JxYB62', 'Instructor', 'uploads/default.png', 'Active', '2025-09-28 20:23:07', NULL),
(27, 'Anik Mandal', '018anik@gmail.com', '$2y$10$p5/Cc5elTjmzQmmd5.S4HOnbHeqKXSOB1ZZys9cTXECWN7MWeCdOW', 'Student', 'uploads/default.png', 'Active', '2025-09-28 23:25:31', NULL),
(28, 'sakhsyam', '12345@123.com', '$2y$10$PS5Z2KbCj41AYkb29nEp4.krnK5TF9D9mth1fQdhp6/CtCg9mfSX2', 'Student', 'uploads/default.png', 'Active', '2025-09-29 00:07:51', NULL),
(29, 'hacker@gmail.com', 'hacker@gmail.com', '$2y$10$ve5TtTsjf0yyQNzPX45Nre0t1dlQuLZia2sW3CyzyqQOSNQxhN5GK', 'Student', 'uploads/default.png', 'Active', '2025-09-29 00:35:08', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `batch_enrollments`
--
ALTER TABLE `batch_enrollments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_batch` (`student_id`,`batch_id`),
  ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `course_enrollments`
--
ALTER TABLE `course_enrollments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_course` (`student_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `course_instructors`
--
ALTER TABLE `course_instructors`
  ADD PRIMARY KEY (`course_id`,`instructor_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `live_classes`
--
ALTER TABLE `live_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `plugins`
--
ALTER TABLE `plugins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `recorded_classes`
--
ALTER TABLE `recorded_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `test_results`
--
ALTER TABLE `test_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `batch_enrollments`
--
ALTER TABLE `batch_enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_enrollments`
--
ALTER TABLE `course_enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `live_classes`
--
ALTER TABLE `live_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plugins`
--
ALTER TABLE `plugins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `recorded_classes`
--
ALTER TABLE `recorded_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test_results`
--
ALTER TABLE `test_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `batch_enrollments`
--
ALTER TABLE `batch_enrollments`
  ADD CONSTRAINT `batch_enrollments_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `batch_enrollments_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD CONSTRAINT `chat_messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `course_enrollments`
--
ALTER TABLE `course_enrollments`
  ADD CONSTRAINT `course_enrollments_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_enrollments_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_instructors`
--
ALTER TABLE `course_instructors`
  ADD CONSTRAINT `course_instructors_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_instructors_ibfk_2` FOREIGN KEY (`instructor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `live_classes`
--
ALTER TABLE `live_classes`
  ADD CONSTRAINT `live_classes_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `live_classes_ibfk_2` FOREIGN KEY (`instructor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notices`
--
ALTER TABLE `notices`
  ADD CONSTRAINT `notices_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recorded_classes`
--
ALTER TABLE `recorded_classes`
  ADD CONSTRAINT `recorded_classes_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `recorded_classes_ibfk_2` FOREIGN KEY (`instructor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `test_results`
--
ALTER TABLE `test_results`
  ADD CONSTRAINT `test_results_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_results_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
