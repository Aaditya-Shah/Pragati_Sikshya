-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 29, 2025 at 03:28 AM
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
-- Database: `u443217448_mental`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question_set` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `correct_answer` char(1) NOT NULL CHECK (`correct_answer` in ('A','B','C','D'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_set`, `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer`) VALUES
(1, 1, 'A man has 53 socks in his drawer: 21 blue, 15 black, and 17 red. The lights are out. How many socks must he take out to be sure he has at least 4 of the same color?', '4', '7', '10', '12', 'C'),
(2, 1, 'You have two ropes that each take exactly 1 hour to burn, but they burn unevenly. How can you measure exactly 45 minutes?', 'Light one rope at both ends and the second at one end. When the first burns out, light the other end of the second rope.', 'Cut one rope into three-quarters length and burn it.', 'Burn one rope, then immediately burn the second one.', 'It is impossible to measure exactly 45 minutes.', 'A'),
(3, 1, 'If 5 cats can catch 5 mice in 5 minutes, how long will it take 100 cats to catch 100 mice?', '100 minutes', '50 minutes', '5 minutes', '1 minute', 'C'),
(4, 1, 'A clock shows the time as 3:15. What is the angle between the hour and minute hands?', '0 degrees', '7.5 degrees', '15 degrees', '5 degrees', 'B'),
(5, 1, 'There are three boxes, all mislabeled: one contains only apples, one only oranges, and one both. You can pick one fruit from one box. From which box should you pick to label them all correctly?', 'The box labeled \'Apples\'', 'The box labeled \'Oranges\'', 'The box labeled \'Apples and Oranges\'', 'It doesn\'t matter which box you pick from.', 'C'),
(6, 1, 'You have 8 identical-looking balls, one of which is slightly heavier. Using a balance scale only twice, how do you find the heavier ball?', 'Weigh 4 vs 4, then 2 vs 2 from the heavier group.', 'Weigh 3 vs 3. If they balance, weigh the remaining 2. If not, weigh two from the heavier group of 3.', 'Weigh 2 vs 2 four times.', 'It is impossible to find in only two weighings.', 'B'),
(7, 1, 'A farmer wants to cross a river with a wolf, a goat, and a cabbage. He can only carry one at a time, and the wolf can\'t be left with the goat, nor the goat with the cabbage. What does he take across first?', 'The Wolf', 'The Cabbage', 'The Goat', 'It is impossible to cross without something being eaten.', 'C'),
(8, 1, 'What comes next in the sequence: 2, 6, 12, 20, 30, ...?', '36', '40', '42', '48', 'C'),
(9, 1, 'A man walks into a bar and asks for a glass of water. The bartender pulls out a gun. The man says “Thank you” and leaves. Why?', 'The gun was a water pistol for a joke.', 'The man had the hiccups and the bartender scared them away.', 'It was a secret code between spies.', 'The bartender misunderstood him.', 'B'),
(10, 1, 'You have a 3-liter jug and a 5-liter jug. How do you measure exactly 4 liters of water?', 'Fill 5L, pour to 3L (2L left). Empty 3L, pour 2L in. Fill 5L, top up 3L jug (leaves 4L in 5L jug).', 'Fill 3L, pour into 5L. Fill 3L again, top up 5L jug.', 'Fill 5L jug and estimate just under full.', 'It is impossible.', 'A'),
(11, 2, 'Two fathers and two sons go fishing. They each catch one fish, yet they only bring home three fish in total. How is this possible?', 'One fish got away.', 'There were only three people: a grandfather, a father, and a son.', 'One of them was a father-in-law.', 'They shared one of the fish.', 'B'),
(12, 2, 'A large cube is painted on all its faces and then cut into 27 smaller, equal-sized cubes. How many of these smaller cubes have exactly two painted faces?', '8', '12', '24', '27', 'B'),
(13, 2, 'You have a 7-minute hourglass and an 11-minute hourglass. How can you time exactly 15 minutes?', 'Run the 11-min, then the 7-min, and subtract.', 'Start both. When 7-min ends, flip it. When 11-min ends, the 7-min glass has run for 4 mins. Flip it again to measure the final 4 mins.', 'Run the 7-min twice and add one minute.', 'It is impossible.', 'B'),
(14, 2, 'What number comes next in the sequence: 1, 11, 21, 1211, 111221, ...?', '211211', '1112221', '312211', '13112221', 'C'),
(15, 2, 'A man is looking at a portrait. Someone asks who it is. He replies, “Brothers and sisters, I have none, but that man’s father is my father’s son.” Who is in the portrait?', 'His father', 'Himself', 'His son', 'His grandfather', 'C'),
(16, 2, 'You have 4 coins that add up to 30 cents. One of them is not a nickel (5 cents). What are the coins?', 'A quarter and 5 pennies', 'This is not possible', 'Three nickels and one dime', 'A quarter and three other coins that are not nickels', 'C'),
(17, 2, 'A snail is at the bottom of a 10-meter pole. It climbs 3 meters each day but slips down 2 meters each night. How many days does it take for the snail to reach the top?', '10 days', '9 days', '8 days', '7 days', 'C'),
(18, 2, 'If you multiply this number by any other number, the answer will always be the same number. What number is this?', '1', '100', 'Any number', '0', 'D'),
(19, 2, 'There are 100 doors in a row, all initially closed. You make 100 passes. On pass 1, you toggle every door. On pass 2, you toggle every 2nd door. On pass 3, every 3rd door, and so on. After all 100 passes, how many doors are open?', '1', '10', '50', '100', 'B'),
(20, 2, 'A man has 4 daughters, and each of his daughters has a brother. How many children does the man have in total?', '8', '9', '5', '4', 'C'),
(21, 3, 'On a standard 12-hour clock, how many times do the hour and minute hands overlap in a full 24-hour period?', '24', '12', '22', '11', 'C'),
(22, 3, 'A man has 3 coins that total 30 cents. One of them is not a nickel. What are the coins?', 'This is impossible.', 'A quarter and five pennies.', 'Two dimes and a nickel.', 'Three dimes.', 'D'),
(23, 3, 'What is the next number in the series: 3, 9, 27, 81, ...?', '162', '243', '324', '108', 'B'),
(24, 3, 'A person walks 1 mile south, then 1 mile east, then 1 mile north and ends up exactly where they started. Where on Earth could they be?', 'The Equator', 'The South Pole', 'Anywhere in the Southern Hemisphere', 'The North Pole', 'D'),
(25, 3, '5 pirates have 100 gold coins. The most senior pirate proposes a distribution. If at least half agree, it stands. If not, he is thrown overboard. How many coins can the senior pirate safely claim for himself?', '98', '100', '50', '97', 'A'),
(26, 3, 'What comes next in the sequence: 1, 4, 9, 16, 25, ...?', '36', '35', '49', '32', 'A'),
(27, 3, 'A man has two children. You know that one of them is a boy born on a Tuesday. What is the probability that both children are boys?', '1/2', '1/3', '13/27', '7/14', 'C'),
(28, 3, 'You have 3 light switches outside a room and 3 bulbs inside. You can only enter the room once. How do you determine which switch controls which bulb?', 'Flip one switch on, wait, turn off. Flip another on. Enter room. On bulb = 2nd switch, warm bulb = 1st switch, cold bulb = 3rd switch.', 'Flip all switches on and see which bulbs turn on.', 'It is impossible to know for sure.', 'Enter the room first to see the bulbs.', 'A'),
(29, 3, 'You are in a room with two doors and two guards. One door leads to freedom, one to death. One guard always lies, one always tells the truth. What single question do you ask to find the door to freedom?', 'Which door is freedom?', 'Are you the liar?', 'Which door would the other guard say leads to freedom?', 'Does 1+1=2?', 'C'),
(30, 3, 'What is the smallest positive number that is evenly divisible by all of the numbers from 1 to 10?', '5040', '2520', '7560', '1000', 'B'),
(31, 4, 'You have 9 balls, and one is slightly lighter. Using a balance scale only twice, how do you find the lighter ball?', 'Weigh 4 vs 4. Take the lighter group and weigh 2 vs 2.', 'Weigh 3 vs 3. If balanced, weigh 2 of the remaining 3. If not, take the lighter group and weigh 1 vs 1.', 'It is impossible in two weighings.', 'Weigh all 9 balls to find an average weight.', 'B'),
(32, 4, 'What comes next in the sequence: 1, 2, 6, 24, 120, ...?', '600', '240', '720', '480', 'C'),
(33, 4, 'A man has 53 socks in a drawer: 21 blue, 15 black, 17 red. How many socks must he take out to guarantee he has 3 socks of the same color?', '3', '5', '7', '9', 'C'),
(34, 4, 'You have a 4-liter jug and a 9-liter jug. How can you measure out exactly 6 liters?', 'Fill 9L, pour to 4L twice, leaving 1L. Empty 4L, pour 1L in. Fill 9L, top up 4L (takes 3L), leaving 6L.', 'Fill the 4L jug and pour it into the 9L jug twice.', 'It is impossible.', 'Fill the 9L jug halfway and add 1L from the 4L jug.', 'A'),
(35, 4, 'A man is pushing his car along a road when he stops in front of a hotel. He immediately shouts, “I’m bankrupt!” Why?', 'He crashed into the hotel.', 'His car broke down and he can\'t afford repairs.', 'He just landed on a property with a hotel in a game of Monopoly.', 'The hotel was his last business venture and it failed.', 'C'),
(36, 4, 'What number comes next in the sequence of prime numbers: 2, 3, 5, 7, 11, 13, ...?', '15', '19', '17', '16', 'C'),
(37, 4, 'You have 5 coins that add up to 55 cents. One of them is not a nickel. What are the coins?', 'A half-dollar and a nickel.', 'This is not possible.', 'One quarter, two dimes, and two nickels.', 'Five dimes and a nickel.', 'C'),
(38, 4, 'Using a 5-minute hourglass and a 7-minute hourglass, what is the simplest way to measure exactly 10 minutes?', 'Start both. When the 5-min ends, start cooking.', 'It\'s not possible.', 'Run the 5-minute hourglass twice.', 'Run the 7-min, then add 3 mins from the 5-min.', 'C'),
(39, 4, 'A man has 3 daughters. Each daughter has a brother. How many children does the man have?', '6', '7', '3', '4', 'D'),
(40, 4, 'What is the next number in the series of triangular numbers: 1, 3, 6, 10, 15, ...?', '20', '21', '25', '18', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `rank_category` varchar(50) DEFAULT NULL,
  `time_taken` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `user_id`, `score`, `rank_category`, `time_taken`, `created_at`) VALUES
(1, 3, 0, 'Poor', 34, '2025-09-28 19:54:31'),
(2, 2, 0, 'Poor', 18, '2025-09-28 19:57:33'),
(3, 2, 0, 'Poor', 4, '2025-09-28 20:19:05'),
(4, 2, 5, 'Poor', 72, '2025-09-28 21:10:48'),
(5, 2, 0, 'Poor', 51, '2025-09-28 21:28:31'),
(6, 2, 0, 'Poor', 53, '2025-09-28 21:28:32'),
(7, 2, 0, 'Poor', 53, '2025-09-28 21:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `email`, `created_at`) VALUES
(1, 'Aaditya Shah', 'Jogbani', 'vedant@hack.com', '2025-09-28 19:31:30'),
(2, 'lala', 'asdDFA', 'DASAfdFA@CSMNDCN.VOM', '2025-09-28 19:31:48'),
(3, 'Aaditya Shah', 'Biratnagar -9 , morang', 'aadityavid@gmail.com', '2025-09-28 19:53:54'),
(4, 'nfwjkf', 'wrqtrqtew', 'Vedant@gmail.com', '2025-09-28 23:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `id` int(11) NOT NULL,
  `result_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_answer` char(1) DEFAULT NULL CHECK (`user_answer` in ('A','B','C','D'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_answers`
--

INSERT INTO `user_answers` (`id`, `result_id`, `question_id`, `user_answer`) VALUES
(1, 1, 6, 'C'),
(2, 1, 1, NULL),
(3, 1, 3, 'B'),
(4, 1, 8, NULL),
(5, 1, 10, 'C'),
(6, 1, 5, NULL),
(7, 1, 7, 'B'),
(8, 1, 2, NULL),
(9, 1, 4, 'A'),
(10, 1, 9, 'D'),
(11, 2, 14, NULL),
(12, 2, 11, NULL),
(13, 2, 12, NULL),
(14, 2, 17, NULL),
(15, 2, 19, NULL),
(16, 2, 16, NULL),
(17, 2, 20, NULL),
(18, 2, 13, NULL),
(19, 2, 18, NULL),
(20, 2, 15, NULL),
(21, 3, 23, 'A'),
(22, 3, 26, NULL),
(23, 3, 30, NULL),
(24, 3, 22, NULL),
(25, 3, 21, NULL),
(26, 3, 25, NULL),
(27, 3, 27, NULL),
(28, 3, 29, NULL),
(29, 3, 28, NULL),
(30, 3, 24, NULL),
(31, 4, 6, 'C'),
(32, 4, 1, NULL),
(33, 4, 3, NULL),
(34, 4, 7, 'A'),
(35, 4, 2, NULL),
(36, 4, 8, NULL),
(37, 4, 10, 'C'),
(38, 4, 4, 'A'),
(39, 4, 9, 'B'),
(40, 4, 5, 'A'),
(41, 5, 39, 'A'),
(42, 5, 40, NULL),
(43, 5, 38, NULL),
(44, 5, 37, NULL),
(45, 5, 31, NULL),
(46, 5, 34, NULL),
(47, 5, 35, NULL),
(48, 5, 33, NULL),
(49, 5, 36, NULL),
(50, 5, 32, 'A'),
(51, 6, 39, 'A'),
(52, 6, 40, NULL),
(53, 6, 38, NULL),
(54, 6, 37, NULL),
(55, 6, 31, NULL),
(56, 6, 34, NULL),
(57, 6, 35, NULL),
(58, 6, 33, NULL),
(59, 6, 36, NULL),
(60, 6, 32, 'A'),
(61, 7, 39, 'A'),
(62, 7, 40, NULL),
(63, 7, 38, NULL),
(64, 7, 37, NULL),
(65, 7, 31, NULL),
(66, 7, 34, NULL),
(67, 7, 35, NULL),
(68, 7, 33, NULL),
(69, 7, 36, NULL),
(70, 7, 32, 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `result_id` (`result_id`),
  ADD KEY `question_id` (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD CONSTRAINT `user_answers_ibfk_1` FOREIGN KEY (`result_id`) REFERENCES `results` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
