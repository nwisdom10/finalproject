-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2021 at 11:12 PM
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
-- Database: `forumdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `communities`
--

CREATE TABLE `communities` (
  `com_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `namee` tinytext NOT NULL,
  `descript` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `communities`
--

INSERT INTO `communities` (`com_id`, `uid`, `namee`, `descript`) VALUES
(2, 10, 'void', 'void'),
(3, 10, 'Sonic Riders', 'This is all about sonic riders and becoming the best rider possible'),
(4, 10, 'Naruto Ultimate Ninja 4', 'This is about speed running naruto ultimate ninja 4'),
(5, 10, 'Super Mario Bros Original', 'This community is about people that speed run super mario original');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` tinytext NOT NULL,
  `content` longtext NOT NULL,
  `video` longtext NOT NULL,
  `views` int(11) NOT NULL,
  `datePosted` date NOT NULL,
  `community` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `uid`, `title`, `content`, `video`, `views`, `datePosted`, `community`) VALUES
(81, 10, 'Sonic Riders Speed Run', 'This was a tough run so I hope that you guys enjoy the run!', 'https://www.youtube.com/watch?v=ND6iW8ETLQc', 8, '2021-08-30', NULL),
(84, 10, 'Sonic Dash', 'This is a post', 'https://www.youtube.com/watch?v=J_6h_8Bj9BQ', 15, '2021-08-31', 'Sonic Riders'),
(85, 10, 'Sonic Runners', 'This was a good match', 'https://www.youtube.com/watch?v=qJ2ve4U12Eo', 2, '2021-08-31', 'Naruto Ultimate Ninja 4'),
(86, 10, 'Mario Kart', 'test ', 'https://www.youtube.com/watch?v=qktchbR-EX4', 2, '2021-08-31', 'Super Mario Bros Original'),
(87, 10, 'Cyber Information Sharing Act (CISA)', 'sdadas', 'https://www.youtube.com/watch?v=qJ2ve4U12Eo', 1, '2021-08-31', 'Super Mario Bros Original'),
(88, 10, 'Sonic Runners', 'dsfdfsdf', 'https://www.youtube.com/watch?v=qJ2ve4U12Eo', 2, '2021-08-31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `reply_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `datePosted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`reply_id`, `post_id`, `uid`, `comment`, `datePosted`) VALUES
(25, 81, 10, 'Man this was a tough run but I am glad that it went well, much better than expected', '2021-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `password` longtext NOT NULL,
  `username` tinytext NOT NULL,
  `firstName` tinytext NOT NULL,
  `lastName` tinytext NOT NULL,
  `email` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `password`, `username`, `firstName`, `lastName`, `email`) VALUES
(3, '$2y$10$QGdaJF.s7Np3z1KUHuv9YOyFd0PXWbvISt7CN0fK7EAz7HU51Ly02', 'nick', 'Nicholas', 'Wisdom', 'nicholas.a.wisdom@gmail.com'),
(6, '$2y$10$BvGmsBgG2J9amrmQxU9ugOOlYWs50ned.pdEtCyO6EmYIIiOEVuMq', 'nick12', 'Nicholas', 'Wisdom', 'nicholas.a.wisdom@gmail.com'),
(7, '$2y$10$bdYUvfLO/pu70nDRKyYw/eJdURxAhOqTiag/o4WI2mzdg4RFBAh9S', 'johnappleseed', 'John', 'Appleseed', 'nicholas.a.wisdom@gmail.com'),
(10, '$2y$10$W1VzJVtAu63rR2gd8u/C/ecNP1x9o8GDwI6EpU59RNAykijyejXAm', 'root', 'Nicholas', 'Wisdom', 'nwmaster6@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `communities`
--
ALTER TABLE `communities`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `communities`
--
ALTER TABLE `communities`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `communities`
--
ALTER TABLE `communities`
  ADD CONSTRAINT `communities_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  ADD CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
