-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2017 at 01:07 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emax`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activityId` int(10) NOT NULL,
  `ipAddress` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `logTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answerId` int(10) NOT NULL,
  `questionId` int(10) NOT NULL,
  `answer` varchar(500) NOT NULL,
  `answerTrue` tinyint(1) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `answer_user`
--

CREATE TABLE `answer_user` (
  `answer_userId` int(10) NOT NULL,
  `form_userId` int(10) NOT NULL,
  `answerId` int(10) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE `auction` (
  `auctionId` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL,
  `auction_categoryId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auction_category`
--

CREATE TABLE `auction_category` (
  `auction_categoryId` int(10) NOT NULL,
  `title` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `bidId` int(10) NOT NULL,
  `price` float NOT NULL,
  `userId` int(10) NOT NULL,
  `itemId` int(10) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `competition`
--

CREATE TABLE `competition` (
  `competitionId` int(10) NOT NULL,
  `title` varchar(500) NOT NULL,
  `display` tinyint(1) NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `formId` int(10) NOT NULL,
  `title` varchar(500) NOT NULL,
  `competitionId` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form_user`
--

CREATE TABLE `form_user` (
  `form_userId` int(10) NOT NULL,
  `formId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `galleryId` int(10) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `eventName` varchar(500) NOT NULL,
  `imageLink` varchar(1000) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `imageId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `imageLink` varchar(1000) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `galleryId` int(10) NOT NULL,
  `reportStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image_comment`
--

CREATE TABLE `image_comment` (
  `image_commentId` int(10) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `imageId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reportStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemId` int(10) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `startingPrice` int(10) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `auctionId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `messageId` int(10) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `createdOn` datetime NOT NULL,
  `reportStatus` tinyint(1) NOT NULL,
  `userId` int(10) NOT NULL,
  `threadId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notificationId` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `questionId` int(10) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `questionNo` int(1) NOT NULL,
  `formId` int(10) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `responseId` int(10) NOT NULL,
  `messageId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reportStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `topicId` int(10) NOT NULL,
  `thread_subcategoryId` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `title` varchar(500) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `view` int(10) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thread_category`
--

CREATE TABLE `thread_category` (
  `thread_categoryId` int(10) NOT NULL,
  `title` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thread_subcategory`
--

CREATE TABLE `thread_subcategory` (
  `therad_subCategoryId` int(10) NOT NULL,
  `thread_categoryId` int(10) NOT NULL,
  `title` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(10) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `email` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activityId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answerId`),
  ADD KEY `questionId` (`questionId`);

--
-- Indexes for table `answer_user`
--
ALTER TABLE `answer_user`
  ADD PRIMARY KEY (`answer_userId`);

--
-- Indexes for table `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`auctionId`);

--
-- Indexes for table `auction_category`
--
ALTER TABLE `auction_category`
  ADD PRIMARY KEY (`auction_categoryId`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`bidId`),
  ADD KEY `auctionId` (`itemId`);

--
-- Indexes for table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`competitionId`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`formId`),
  ADD KEY `competitionId` (`competitionId`) USING BTREE;

--
-- Indexes for table `form_user`
--
ALTER TABLE `form_user`
  ADD PRIMARY KEY (`form_userId`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`galleryId`),
  ADD KEY `eventId` (`eventName`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`imageId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `galleryId` (`galleryId`) USING BTREE;

--
-- Indexes for table `image_comment`
--
ALTER TABLE `image_comment`
  ADD PRIMARY KEY (`image_commentId`),
  ADD KEY `imageId` (`imageId`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageId`),
  ADD KEY `threadId` (`threadId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notificationId`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`questionId`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`responseId`),
  ADD KEY `messageId` (`messageId`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`topicId`),
  ADD KEY `subCategoryId` (`thread_subcategoryId`);

--
-- Indexes for table `thread_category`
--
ALTER TABLE `thread_category`
  ADD PRIMARY KEY (`thread_categoryId`);

--
-- Indexes for table `thread_subcategory`
--
ALTER TABLE `thread_subcategory`
  ADD PRIMARY KEY (`therad_subCategoryId`),
  ADD KEY `categoryId` (`thread_categoryId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activityId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answerId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `answer_user`
--
ALTER TABLE `answer_user`
  MODIFY `answer_userId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `auction`
--
ALTER TABLE `auction`
  MODIFY `auctionId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `auction_category`
--
ALTER TABLE `auction_category`
  MODIFY `auction_categoryId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `bidId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `competition`
--
ALTER TABLE `competition`
  MODIFY `competitionId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `formId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `form_user`
--
ALTER TABLE `form_user`
  MODIFY `form_userId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `galleryId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `imageId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image_comment`
--
ALTER TABLE `image_comment`
  MODIFY `image_commentId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notificationId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `questionId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `responseId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `topicId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thread_category`
--
ALTER TABLE `thread_category`
  MODIFY `thread_categoryId` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thread_subcategory`
--
ALTER TABLE `thread_subcategory`
  MODIFY `therad_subCategoryId` int(10) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`questionId`) REFERENCES `question` (`questionId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`itemId`) REFERENCES `auction` (`auctionId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `form`
--
ALTER TABLE `form`
  ADD CONSTRAINT `form_ibfk_1` FOREIGN KEY (`competitionId`) REFERENCES `competition` (`competitionId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`galleryId`) REFERENCES `gallery` (`galleryId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `image_comment`
--
ALTER TABLE `image_comment`
  ADD CONSTRAINT `image_comment_ibfk_1` FOREIGN KEY (`imageId`) REFERENCES `image` (`imageId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `response`
--
ALTER TABLE `response`
  ADD CONSTRAINT `response_ibfk_1` FOREIGN KEY (`messageId`) REFERENCES `message` (`messageId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `thread_subcategory`
--
ALTER TABLE `thread_subcategory`
  ADD CONSTRAINT `thread_subcategory_ibfk_1` FOREIGN KEY (`therad_subCategoryId`) REFERENCES `thread` (`thread_subcategoryId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `thread_subcategory_ibfk_2` FOREIGN KEY (`thread_categoryId`) REFERENCES `thread_category` (`thread_categoryId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
