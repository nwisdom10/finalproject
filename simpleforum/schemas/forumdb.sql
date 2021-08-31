-- MySQL dump 10.13  Distrib 5.7.25, for osx10.9 (x86_64)
--
-- Host: localhost    Database: forumdb
-- ------------------------------------------------------
-- Server version	5.7.25

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `title` tinytext NOT NULL,
  `content` longtext NOT NULL,
  `views` int(11) NOT NULL,
  `datePosted` date NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `uid` (`uid`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,2,'Lorem Ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed arcu libero, dapibus at mi non, dictum vulputate nibh. Nulla ut vestibulum quam. Nam auctor turpis vel urna feugiat, pellentesque congue mauris fermentum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla orci id scelerisque dictum. Suspendisse iaculis orci purus, eget luctus odio tincidunt eu. Mauris tortor quam, ultrices eleifend laoreet eget, malesuada id enim. Aenean condimentum sem sed venenatis convallis. Nam sagittis faucibus orci, dapibus porta sem. Donec maximus augue eu sem consequat, id ultricies ipsum scelerisque. Vivamus quis quam et ipsum iaculis molestie.',1,'2019-05-12'),(2,2,'Lorem Ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed arcu libero, dapibus at mi non, dictum vulputate nibh. Nulla ut vestibulum quam. Nam auctor turpis vel urna feugiat, pellentesque congue mauris fermentum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla orci id scelerisque dictum. Suspendisse iaculis orci purus, eget luctus odio tincidunt eu. Mauris tortor quam, ultrices eleifend laoreet eget, malesuada id enim. Aenean condimentum sem sed venenatis convallis. Nam sagittis faucibus orci, dapibus porta sem. Donec maximus augue eu sem consequat, id ultricies ipsum scelerisque. Vivamus quis quam et ipsum iaculis molestie.',4,'2019-05-12'),(3,2,'Lorem Ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed arcu libero, dapibus at mi non, dictum vulputate nibh. Nulla ut vestibulum quam. Nam auctor turpis vel urna feugiat, pellentesque congue mauris fermentum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla orci id scelerisque dictum. Suspendisse iaculis orci purus, eget luctus odio tincidunt eu. Mauris tortor quam, ultrices eleifend laoreet eget, malesuada id enim. Aenean condimentum sem sed venenatis convallis. Nam sagittis faucibus orci, dapibus porta sem. Donec maximus augue eu sem consequat, id ultricies ipsum scelerisque. Vivamus quis quam et ipsum iaculis molestie.',3,'2019-05-12'),(4,1,'Lorem Ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed arcu libero, dapibus at mi non, dictum vulputate nibh. Nulla ut vestibulum quam. Nam auctor turpis vel urna feugiat, pellentesque congue mauris fermentum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla orci id scelerisque dictum. Suspendisse iaculis orci purus, eget luctus odio tincidunt eu. Mauris tortor quam, ultrices eleifend laoreet eget, malesuada id enim. Aenean condimentum sem sed venenatis convallis. Nam sagittis faucibus orci, dapibus porta sem. Donec maximus augue eu sem consequat, id ultricies ipsum scelerisque. Vivamus quis quam et ipsum iaculis molestie.',3,'2019-05-12'),(5,1,'Lorem Ipsum','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed arcu libero, dapibus at mi non, dictum vulputate nibh. Nulla ut vestibulum quam. Nam auctor turpis vel urna feugiat, pellentesque congue mauris fermentum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla orci id scelerisque dictum. Suspendisse iaculis orci purus, eget luctus odio tincidunt eu. Mauris tortor quam, ultrices eleifend laoreet eget, malesuada id enim. Aenean condimentum sem sed venenatis convallis. Nam sagittis faucibus orci, dapibus porta sem. Donec maximus augue eu sem consequat, id ultricies ipsum scelerisque. Vivamus quis quam et ipsum iaculis molestie.',3,'2019-05-12');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `replies` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `datePosted` date NOT NULL,
  PRIMARY KEY (`reply_id`),
  KEY `post_id` (`post_id`),
  KEY `uid` (`uid`),
  CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`),
  CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `replies`
--

LOCK TABLES `replies` WRITE;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;
INSERT INTO `replies` VALUES (1,2,1,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed arcu libero, dapibus at mi non, dictum vulputate nibh. Nulla ut vestibulum quam.','2019-05-12'),(2,3,1,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed arcu libero, dapibus at mi non, dictum vulputate nibh. Nulla ut vestibulum quam.	','2019-05-12'),(3,4,2,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed arcu libero, dapibus at mi non, dictum vulputate nibh. Nulla ut vestibulum quam.	','2019-05-12'),(4,5,2,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed arcu libero, dapibus at mi non, dictum vulputate nibh. Nulla ut vestibulum quam.	','2019-05-12');
/*!40000 ALTER TABLE `replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `password` longtext NOT NULL,
  `username` tinytext NOT NULL,
  `firstName` tinytext NOT NULL,
  `lastName` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'$2y$10$mH9y7M7q9cabon8EyrdUyunhHMha9HJCma4Daww1aoHeyLU7rIl.m','johndoe','John','Doe','johndoe@email.com'),(2,'$2y$10$DSIpaRsKjheXbC0t6kHBFOusZcmQM642QSn/97URmz7KCLHeKoU4O','janedoe','Jane','Doe','janedoe@email.com');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-12 23:04:25
