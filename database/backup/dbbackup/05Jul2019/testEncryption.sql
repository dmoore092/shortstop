-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: sports
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.18.04.1

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
-- Table structure for table `about_us`
--

DROP TABLE IF EXISTS `about_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `about_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header` text,
  `text` text,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about_us`
--

LOCK TABLES `about_us` WRITE;
/*!40000 ALTER TABLE `about_us` DISABLE KEYS */;
INSERT INTO `about_us` VALUES (1,'test','Test','2019-07-05 03:19:01'),(28,'Our Mission','Athletic Prospects\' mission is to guide each player in bridging the gap between high school and collegiate athletics. College coaches are looking for the commitment of the player and that\'s where we come into play.\r\n\r\n Bi-weekly, we will help our athletes stand out in the recruiting process by guiding them in their personal communication with coaches. Through our experience, we\'ve learned one of the greatest tools to have in the recruiting process is communication.  Athletic Prospects goes beyond just getting the player recognized; we get the player involved. And, with our individualized process, players will be seen as a committed and motivated player that wants to play college ball. \r\n\r\nWe want serve our athletes the top notch recruitment experience that they deserve. Our focus is on the student-athlete\'s future. That means we\'ll work with them to find academic scholarships, athletic scholarships, and their dream school.\r\n\r\nOur team wants to see Athletic Prospects\' athletes grow into responsible, hardworking adults by giving them the skills they need to achieve their dreams.','2019-07-05 03:19:41');
/*!40000 ALTER TABLE `about_us` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aboutinfo`
--

DROP TABLE IF EXISTS `aboutinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aboutinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header` varchar(1000) DEFAULT NULL,
  `p1` text,
  `p2` text,
  `p3` text,
  `p4` text,
  `p5` text,
  `p6` text,
  `p7` text,
  `p8` text,
  `p9` text,
  `p10` text,
  `date` datetime DEFAULT NULL,
  `editedby` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aboutinfo`
--

LOCK TABLES `aboutinfo` WRITE;
/*!40000 ALTER TABLE `aboutinfo` DISABLE KEYS */;
INSERT INTO `aboutinfo` VALUES (1,'About Us','Athletic Prospects\' mission is to guide each player in bridging the gap between high school and collegiate athletics. College coaches are looking for the commitment of the player and that\'s where we come into play. ','Bi-weekly, we will help our athletes stand out in the recruiting process by guiding them in their personal communication with coaches. Through our experience, we\'ve learned one of the greatest tools to have in the recruiting process is communication. Athletic Prospects goes beyond just getting the player recognized; we get the player involved. And, with our individualized process, players will be seen as a committed and motivated player that wants to play college ball. ','We want serve our athletes the top notch recruitment experience that they deserve. Our focus is on the student-athlete\'s future. That means we\'ll work with them to find academic scholarships, athletic scholarships, and their dream school. ','Our team wants to see Athletic Prospects\' athletes grow into responsible, hardworking adults by giving them the skills they need to achieve their dreams. ','','','','','','','2019-07-04 21:53:22','dmoore092');
/*!40000 ALTER TABLE `aboutinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_posts`
--

DROP TABLE IF EXISTS `blog_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `text` text,
  `tags` varchar(150) DEFAULT NULL,
  `post_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_posts`
--

LOCK TABLES `blog_posts` WRITE;
/*!40000 ALTER TABLE `blog_posts` DISABLE KEYS */;
INSERT INTO `blog_posts` VALUES (1,'First Post','This is the first blog post for testing','Football, Self improvement','2019-07-04 21:53:05'),(2,'Second Post','This is the second blog post for testing','Baseball, College, Scholarship','2019-07-04 21:53:05'),(3,'Third Post','This is the third blog post for testing','Sports, College, Sportsmanship','2019-07-04 21:53:05'),(4,'Fourth Post','This is the fourth blog post for testing','Volleyball, Highschool, Teamwork','2019-07-04 21:53:05');
/*!40000 ALTER TABLE `blog_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_page`
--

DROP TABLE IF EXISTS `home_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `home_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header` text,
  `text` text,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_page`
--

LOCK TABLES `home_page` WRITE;
/*!40000 ALTER TABLE `home_page` DISABLE KEYS */;
INSERT INTO `home_page` VALUES (1,'At Athletic Prospects','Test','2019-07-05 03:19:01'),(28,'At Athletic Prospects','We strive to provide High School and JUCO athletes the tools to successfully promote themselves to college coaches by assisting athletes through the recruiting process. Our goal is to be a mentor-leader to athletes to teach them the importance of academics and athletics while showing strong leadership characteristics to be successful on and off the field.','2019-07-05 03:20:08');
/*!40000 ALTER TABLE `home_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `homeinfo`
--

DROP TABLE IF EXISTS `homeinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `homeinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header` varchar(1000) NOT NULL DEFAULT 'At Athletic Prospects',
  `content` varchar(10000) NOT NULL DEFAULT 'We strive to provide High School and JUCO athletes the tools to successfully promote themselves to college coaches by assisting athletes through the recruiting process. Our goal is to be a mentor-leader to athletes to teach them the importance of academics and athletics while showing strong leadership characteristics to be successful on and off the field. ',
  `date` datetime DEFAULT NULL,
  `editedby` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `homeinfo`
--

LOCK TABLES `homeinfo` WRITE;
/*!40000 ALTER TABLE `homeinfo` DISABLE KEYS */;
INSERT INTO `homeinfo` VALUES (1,'At Athletic Prospects','We strive to provide High School and JUCO athletes the tools to successfully promote themselves to college coaches by assisting athletes through the recruiting process. Our goal is to be a mentor-leader to athletes to teach them the importance of academics and athletics while showing strong leadership characteristics to be successful on and off the field. ','2019-07-04 21:53:22','dmoore092');
/*!40000 ALTER TABLE `homeinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` VARBINARY(100),
  `pass` varchar(900) CHARACTER SET utf8 DEFAULT NULL,
  `name` VARBINARY(100),
  `gender` VARBINARY(100),
  `email` VARBINARY(100),
  `cellphone` VARBINARY(100),
  `homephone` VARBINARY(100),
  `address` VARBINARY(100),
  `city` VARBINARY(100),
  `state` VARBINARY(100),
  `zip` VARBINARY(100),
  `highschool` VARBINARY(100),
  `weight` VARBINARY(100),
  `height` VARBINARY(100),
  `gradYear` VARBINARY(100),
  `sport` VARBINARY(100),
  `sport2` VARBINARY(100),
  `primaryPosition` VARBINARY(100),
  `secondaryPosition` VARBINARY(100),
  `travelTeam`VARBINARY(100),
  `gpa` VARBINARY(100),
  `sat` VARBINARY(100),
  `act` VARBINARY(100),
  `ref1Name` VARBINARY(100),
  `ref1JobTitle`VARBINARY(100),
  `ref1Email` VARBINARY(100),
  `ref1Phone` VARBINARY(100),
  `ref2Name` VARBINARY(100),
  `ref2JobTitle`VARBINARY(100),
  `ref2Email` VARBINARY(100),
  `ref2Phone` VARBINARY(100),
  `ref3Name` VARBINARY(100),
  `ref3Jobtitle`VARBINARY(100),
  `ref3Email` VARBINARY(100),
  `ref3Phone` VARBINARY(100),
  `persStatement` VARBINARY(600),
  `commitment`VARBINARY(100),
  `service` VARBINARY(100),
  `profileImage`VARBINARY(100),
  `showcase1` VARBINARY(200),
  `showcase2` VARBINARY(200),
  `showcase3` VARBINARY(200),
  `persontype` VARBINARY(100),
  `college`VARBINARY(100),
  `twitter` VARBINARY(100),
  `facebook` VARBINARY(100),
  `instagram` VARBINARY(100),
  `website` VARBINARY(100),
  `characteristics` VARBINARY(100),
  `velocity` VARBINARY(100),
  `gpareq` VARBINARY(100),
  `satactreq` VARBINARY(100),
  `major` VARBINARY(100),
  `reset` varchar(150) DEFAULT NULL,
  `resetExpires` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--
-- AES_ENCRYPT(`student_email`, 'mykey')
LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
INSERT INTO `players` VALUES 
(1,AES_ENCRYPT('dmoore092','!trN8xLnaHcA@cKu'),'$2y$10$rlMTq2cfXg5Ffq2zhEPehe.coVqLucURVdbVa9bbmdXyEVyERYf92',AES_ENCRYPT('Dale Moore','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(2,AES_ENCRYPT('kprestano','!trN8xLnaHcA@cKu'),'$2y$10$jSgZpj8bx6PDzZ4tmtb1KeIgAyHGqbuqrDP6uA8b/MdXThFkdheIW',AES_ENCRYPT('Keith Prestano','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(3,AES_ENCRYPT('frankmccabefrank','!trN8xLnaHcA@cKu'),'$2y$10$dMAFuFRZy62witgm2TT/KuKaL1GjDeoNycdt5kU.sIHEylU3rluum',AES_ENCRYPT('Frank McCabe','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Male','!trN8xLnaHcA@cKu'),AES_ENCRYPT('frankmccabefrank@aol.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('585-857-5493','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('118 campus drive','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Rochester','!trN8xLnaHcA@cKu'),AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),AES_ENCRYPT('14623','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Rush Henrietta','!trN8xLnaHcA@cKu'),AES_ENCRYPT('155','!trN8xLnaHcA@cKu'),AES_ENCRYPT('5 foot 10 inches','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('Baseball','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('Center Field','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Shortstop, Catcher','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Rush Henrietta Travel','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,AES_ENCRYPT('black.png','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(4,AES_ENCRYPT('bobbysellers','!trN8xLnaHcA@cKu'),'$2y$10$41Fe7E97uWgGHWDDCq9Diufx1ORD/uyy2Yv9h5DryOVAzyGHWb3Ou',AES_ENCRYPT('Bobby Sellers','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Male','!trN8xLnaHcA@cKu'),AES_ENCRYPT('bobbysellers@gmail.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('5857734002','!trN8xLnaHcA@cKu'),AES_ENCRYPT('5852784478','!trN8xLnaHcA@cKu'),AES_ENCRYPT('14 Clooney Dr','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Henrietta','!trN8xLnaHcA@cKu'),AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),AES_ENCRYPT('14467','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Rush Henrietta Senior High School','!trN8xLnaHcA@cKu'),AES_ENCRYPT('165','!trN8xLnaHcA@cKu'),AES_ENCRYPT('5 foot 10 inches','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('Baseball','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('Pitcher','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Shortstop, Left field','!trN8xLnaHcA@cKu'),'RH Comets 17U',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,AES_ENCRYPT('black.png','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(5,AES_ENCRYPT('aaronshoemaker611','!trN8xLnaHcA@cKu'),'$2y$10$FPJzGwC1Ix8X16ePa9gSQ.XMYU43EZIDM1ajRg.cR3F7qqGnpYoYu',AES_ENCRYPT('Aaron Shoemaker','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Male','!trN8xLnaHcA@cKu'),AES_ENCRYPT('aaronshoemaker611@yahoo.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('5854901607','!trN8xLnaHcA@cKu'),AES_ENCRYPT('5853594829','!trN8xLnaHcA@cKu'),AES_ENCRYPT('22 Edmar Court','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Henrietta','!trN8xLnaHcA@cKu'),AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),AES_ENCRYPT('14467','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Rush Henrietta','!trN8xLnaHcA@cKu'),'185',AES_ENCRYPT('5 foot 10 inches','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('Baseball','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('Catcher','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('ICBL Monarchs','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,AES_ENCRYPT('black.png','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(6,AES_ENCRYPT('ben.hintz10','!trN8xLnaHcA@cKu'),'$2y$10$UkHUN.G/jxHeStXKmXO3quu0ITdXJa1WlW9/yDTT.nXfoEU92DN2C',AES_ENCRYPT('Ben Hintz','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Male','!trN8xLnaHcA@cKu'),AES_ENCRYPT('ben.hintz10@gmail.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('(585)766-5411','!trN8xLnaHcA@cKu'),AES_ENCRYPT('(585)586-3334','!trN8xLnaHcA@cKu'),AES_ENCRYPT('5 Duxbury Way','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Rochester','!trN8xLnaHcA@cKu'),AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),AES_ENCRYPT('14618','!trN8xLnaHcA@cKu'),AES_ENCRYPT('McQuaid Jesiut','!trN8xLnaHcA@cKu'),AES_ENCRYPT('225','!trN8xLnaHcA@cKu'),AES_ENCRYPT('6 foot 7 inches','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('Baseball','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('LHP','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('Team Diamond Pro','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,AES_ENCRYPT('black.png','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(7,AES_ENCRYPT('bdsmith9710','!trN8xLnaHcA@cKu'),'$2y$10$mZ3Q.xiZzIvSczEinztogOMFrGE0XLcfkxyJHJS.9PlKBGs/mRU0C',AES_ENCRYPT('Brennen Smith','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Male','!trN8xLnaHcA@cKu'),AES_ENCRYPT('bdsmith9710@gmail.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('5855450602','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('890 Joylene Drive','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Webster','!trN8xLnaHcA@cKu'),AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),AES_ENCRYPT('14580','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Webster Thomas','!trN8xLnaHcA@cKu'),AES_ENCRYPT('195','!trN8xLnaHcA@cKu'),AES_ENCRYPT('6 foot 0 inches','!trN8xLnaHcA@cKu'),AES_ENCRYPT('2016','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Baseball','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('Pitcher','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Outfield','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('2.8','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,AES_ENCRYPT('black.png','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(8,AES_ENCRYPT('gshelmer4','!trN8xLnaHcA@cKu'),'$2y$10$01H8gbU6Zh495QhokoMYxu72TswFIgtJFD4vZIxxD7s3LWPWByL4.',AES_ENCRYPT('Kaden Helmer','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Male','!trN8xLnaHcA@cKu'),AES_ENCRYPT('gshelmer4@rochester.rr.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('5854414540','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('7190 Lane Rd','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Victor','!trN8xLnaHcA@cKu'),AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),AES_ENCRYPT('14564','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Victor High School','!trN8xLnaHcA@cKu'),AES_ENCRYPT('160','!trN8xLnaHcA@cKu'),AES_ENCRYPT('5 foot 10 inches','!trN8xLnaHcA@cKu'),AES_ENCRYPT('2020','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Baseball','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('Catcher','!trN8xLnaHcA@cKu'),NULL,NULL,AES_ENCRYPT('3.7','!trN8xLnaHcA@cKu'),NULL,NULL,AES_ENCRYPT('Jon Shlesling','!trN8xLnaHcA@cKu'),NULL,NULL,'585-489-1521',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,AES_ENCRYPT('black.png','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(9,AES_ENCRYPT('cmprestano','!trN8xLnaHcA@cKu'),'$2y$10$zgbQuuJKHlNktf6eaN9yJ.Yp6ZRJ7yw/ZnjUlJ9reMyLAtseLqmTm',AES_ENCRYPT('Caroline Prestano','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Female','!trN8xLnaHcA@cKu'),AES_ENCRYPT('cmprestano@gmail.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('15854061386','!trN8xLnaHcA@cKu'),AES_ENCRYPT('15854061386','!trN8xLnaHcA@cKu'),AES_ENCRYPT('101 Park Ave','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Canandaigua','!trN8xLnaHcA@cKu'),AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),AES_ENCRYPT('11424','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,AES_ENCRYPT('black.png','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(10,AES_ENCRYPT('jfernand','!trN8xLnaHcA@cKu'),'$2y$10$Y9K/2TXMFCpfTxPByMtJ0.1Vd13885GwYTTLs3OEOvkALKO08Dpze',AES_ENCRYPT('Frank Fernandes','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Male','!trN8xLnaHcA@cKu'),AES_ENCRYPT('jfernand@rochester.rr.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('585-770-8049','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('16 Oakbend Ln.','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Rochester','!trN8xLnaHcA@cKu'),AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),AES_ENCRYPT('14617','!trN8xLnaHcA@cKu'),AES_ENCRYPT('West Irondequoit','!trN8xLnaHcA@cKu'),AES_ENCRYPT('125','!trN8xLnaHcA@cKu'),AES_ENCRYPT('5 foot 7 inches','!trN8xLnaHcA@cKu'),AES_ENCRYPT('2019','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Baseball','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('Shortstop','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Second Base, Outfield','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Rochester Cougars, Rochester Raiders, Gro2Pro, American Legion','!trN8xLnaHcA@cKu'),AES_ENCRYPT('3','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,AES_ENCRYPT('black.png','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(11,AES_ENCRYPT('lweiss','!trN8xLnaHcA@cKu'),'$2y$10$DEyRQ4FrhNqWdENFAuoev.2GNuvqf8Gh5.kV5hfeVqAO9E5NPswde',AES_ENCRYPT('Lucien Weiss','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Male','!trN8xLnaHcA@cKu'),AES_ENCRYPT('lweiss@millenniumbrooklynhs.org','!trN8xLnaHcA@cKu'),AES_ENCRYPT('9178383593','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('22 Fort Greene Place','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Brooklyn','!trN8xLnaHcA@cKu'),AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),AES_ENCRYPT('11217','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Millenium Brooklyn High School','!trN8xLnaHcA@cKu'),NULL,NULL,AES_ENCRYPT('2022','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Baseball','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('Pitcher','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,AES_ENCRYPT('black.png','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(12,AES_ENCRYPT('njohnson','!trN8xLnaHcA@cKu'),'$2y$10$IKzDrAZcZrKMAyXGH5Yd7.8NlkisYPfVSpoIR79ytANOZ2h5b.RHG',AES_ENCRYPT('Nolan Johnson','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Male','!trN8xLnaHcA@cKu'),AES_ENCRYPT('njohnson@millenniumbrooklynhs.org','!trN8xLnaHcA@cKu'),AES_ENCRYPT('347-860-3415','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('175 carroll street','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Brooklyn','!trN8xLnaHcA@cKu'),AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),AES_ENCRYPT('11231','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Millenium High School','!trN8xLnaHcA@cKu'),AES_ENCRYPT('176','!trN8xLnaHcA@cKu'),AES_ENCRYPT('6 foot 1 inch','!trN8xLnaHcA@cKu'),'2021',AES_ENCRYPT('Baseball','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Basketball','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Pitcher','!trN8xLnaHcA@cKu'),NULL,NULL,AES_ENCRYPT('3.75','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,AES_ENCRYPT('black.png','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(13,AES_ENCRYPT('jkudlack','!trN8xLnaHcA@cKu'),'$2y$10$F4Ab2AZSSpN.vU2iShyfhuDM9oxZ9WYELyjYb.gXmP0DprQ0ifZV6',AES_ENCRYPT('Julian Kudlack','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Male','!trN8xLnaHcA@cKu'),AES_ENCRYPT('jkudlack@millenniumbrooklynhs.org','!trN8xLnaHcA@cKu'),AES_ENCRYPT('718-971-3647','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('14 east 7th street','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Brooklyn','!trN8xLnaHcA@cKu'),AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),AES_ENCRYPT('11218','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Millenium Brooklyn High School','!trN8xLnaHcA@cKu'),AES_ENCRYPT('160','!trN8xLnaHcA@cKu'),AES_ENCRYPT('6 foot 3 inches','!trN8xLnaHcA@cKu'),AES_ENCRYPT('2019','!trN8xLnaHcA@cKu'),NULL,NULL,'MIF, First',NULL,AES_ENCRYPT('Brooklyn Baseball, Wrath Huskies','!trN8xLnaHcA@cKu'),AES_ENCRYPT('3.7','!trN8xLnaHcA@cKu'),AES_ENCRYPT('1450','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,AES_ENCRYPT('black.png','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(14,AES_ENCRYPT('sbeaver','!trN8xLnaHcA@cKu'),'$2y$10$GVQ7n4bRdSGoLcFMV2P0EOiJo7HD1vkp62FUVI3iDuiiLss4EbQ9O',AES_ENCRYPT('Shane Beaver','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Male','!trN8xLnaHcA@cKu'),AES_ENCRYPT('sbeaver@millenniumbrooklynhs.org','!trN8xLnaHcA@cKu'),AES_ENCRYPT('718-687-0122','!trN8xLnaHcA@cKu'),AES_ENCRYPT('646-285-6308','!trN8xLnaHcA@cKu'),AES_ENCRYPT('111 Wyckoff Street #1 ','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Brooklyn','!trN8xLnaHcA@cKu'),AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),'11201',AES_ENCRYPT('Millenium Brooklyn High School','!trN8xLnaHcA@cKu'),'168',AES_ENCRYPT('6 foot 0 inches','!trN8xLnaHcA@cKu'),AES_ENCRYPT('2022','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Baseball','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('First Base','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Pitcher Third Base Outfield','!trN8xLnaHcA@cKu'),AES_ENCRYPT('SFX huskies','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,AES_ENCRYPT('Brian Friedman','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Athletic Director - Millenium Brooklyn High School','!trN8xLnaHcA@cKu'),AES_ENCRYPT('bfriedman@millenniumbrooklynhs.org','!trN8xLnaHcA@cKu'),AES_ENCRYPT('347-463-6900','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Melvin Martinez','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Coach SFX Huskies and grand street brooklyn','!trN8xLnaHcA@cKu'),AES_ENCRYPT('melvincoachm@aol.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('917-749-1969','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,NULL,NULL,NULL,NULL,AES_ENCRYPT('black.png','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(15,AES_ENCRYPT('karlbb0709','!trN8xLnaHcA@cKu'),'$2y$10$6HkVXhHr5usmhYRZ4iHX/.D4SmwOdhN58mzeH4Y7pFM6jKxTEDI5W',AES_ENCRYPT('Karl Basile-Baehr','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Male','!trN8xLnaHcA@cKu'),AES_ENCRYPT('karlbb0709@gmail.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('9177516546','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('170 west end avenue Apt 19p ','!trN8xLnaHcA@cKu'),AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),AES_ENCRYPT('10023','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Millenium High School','!trN8xLnaHcA@cKu'),AES_ENCRYPT('165','!trN8xLnaHcA@cKu'),AES_ENCRYPT('5 foot 10 inches','!trN8xLnaHcA@cKu'),AES_ENCRYPT('2020','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Baseball','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('Pitcher Only','!trN8xLnaHcA@cKu'),NULL,NULL,'Roughly 88',NULL,NULL,AES_ENCRYPT('Brian friedman','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Coach for millenium varisty team','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,AES_ENCRYPT('black.png','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(16,AES_ENCRYPT('egonzalez','!trN8xLnaHcA@cKu'),'$2y$10$w.4uk3koviv4P20joZnXlecLLIGNppcrHvRovfo91ABLm0Z3W9bh6',AES_ENCRYPT('Elijah Gonzalez','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Male','!trN8xLnaHcA@cKu'),AES_ENCRYPT('egonzalez@millenniumbrooklynhs.org','!trN8xLnaHcA@cKu'),AES_ENCRYPT('9177492359','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('116 Hall Street','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Brooklyn','!trN8xLnaHcA@cKu'),AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),AES_ENCRYPT('11205','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Millenium Brooklyn High School','!trN8xLnaHcA@cKu'),AES_ENCRYPT('190','!trN8xLnaHcA@cKu'),AES_ENCRYPT('6 foot 3 inches','!trN8xLnaHcA@cKu'),AES_ENCRYPT('2019','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Baseball','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('SS','!trN8xLnaHcA@cKu'),AES_ENCRYPT('2b','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Brooklyn Wrath','!trN8xLnaHcA@cKu'),AES_ENCRYPT('3.7','!trN8xLnaHcA@cKu'),AES_ENCRYPT('1110','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,AES_ENCRYPT('black.png','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(17,AES_ENCRYPT('gtraincf','!trN8xLnaHcA@cKu'),'$2y$10$q/PED2MwDwicEnev8NlKi.kVY9B1upLDEbcOfeBI/0/p8BLs9cCJy',AES_ENCRYPT('Graeme Lauterbach-Mason','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Male','!trN8xLnaHcA@cKu'),AES_ENCRYPT('gtraincf@gmail.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('917-474-0749','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('179 ocean parkway apt. 3i','!trN8xLnaHcA@cKu'),'New York City',AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),AES_ENCRYPT('11218','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Millenium Brooklyn High School','!trN8xLnaHcA@cKu'),AES_ENCRYPT('125','!trN8xLnaHcA@cKu'),AES_ENCRYPT('5 foot 7 inches','!trN8xLnaHcA@cKu'),'2021',AES_ENCRYPT('Baseball','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Lacrosse','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Center Field','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Second base, shortstop, pitcher','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Huskies Baseball 15U','!trN8xLnaHcA@cKu'),AES_ENCRYPT('93.25 out of 100','!trN8xLnaHcA@cKu'),NULL,NULL,AES_ENCRYPT('Brian Friedman','!trN8xLnaHcA@cKu'),AES_ENCRYPT('High school baseball coach','!trN8xLnaHcA@cKu'),AES_ENCRYPT('bfriedman@millenniumbrooklynhs.org','!trN8xLnaHcA@cKu'),AES_ENCRYPT('(347) 463-6900','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Tom Blozy','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Travel baseball coach','!trN8xLnaHcA@cKu'),AES_ENCRYPT('tommyab1@aol.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('718-757-7099','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,NULL,NULL,NULL,NULL,AES_ENCRYPT('black.png','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(18,AES_ENCRYPT('agarcia040','!trN8xLnaHcA@cKu'),'$2y$10$yAPqFG9PpEIzFwkSVOuLuucMV2rrQgdhNcVREkK02BG4QXTLCCWwm',AES_ENCRYPT('Ethan Garcia','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Male','!trN8xLnaHcA@cKu'),AES_ENCRYPT('agarcia040@msn.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('9173755584','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('8565 111th St','!trN8xLnaHcA@cKu'),'RICHMOND HILL',AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),AES_ENCRYPT('11418','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Millenium Brooklyn High School','!trN8xLnaHcA@cKu'),AES_ENCRYPT('155','!trN8xLnaHcA@cKu'),AES_ENCRYPT('5 foot 9 inches','!trN8xLnaHcA@cKu'),AES_ENCRYPT('2020','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Baseball','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('IN/P','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('Wrath Baseball','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,AES_ENCRYPT('black.png','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(19,AES_ENCRYPT('aidangp66','!trN8xLnaHcA@cKu'),'$2y$10$xmAlXmb/pmVNeq6gtgOFNuMuvK6YixHhZ/qF75daSE2dQkVVpMWCq',AES_ENCRYPT('Aidan Pawlak','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Male','!trN8xLnaHcA@cKu'),AES_ENCRYPT('aidangp66@gmail.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('646-539-8456','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('601 6th street','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Brooklyn','!trN8xLnaHcA@cKu'),AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),AES_ENCRYPT('11215','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Millenium Brooklyn High School','!trN8xLnaHcA@cKu'),AES_ENCRYPT('105','!trN8xLnaHcA@cKu'),AES_ENCRYPT('5 foot 4 inches','!trN8xLnaHcA@cKu'),AES_ENCRYPT('2022','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Baseball','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('CF/LHP','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('DHAA Knights/ Brooklyn Falcons','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,AES_ENCRYPT('black.png','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(20,AES_ENCRYPT('hbernard','!trN8xLnaHcA@cKu'),'$2y$10$USDc8Ab7XxLdvXnjEho/E.VC73YRzYSaTS3of5X.g2XqbNF89bBk2',AES_ENCRYPT('Hayden Bernard','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Male','!trN8xLnaHcA@cKu'),AES_ENCRYPT('hbernard@millenniumbrooklynhs.org','!trN8xLnaHcA@cKu'),AES_ENCRYPT('347-407-2699','!trN8xLnaHcA@cKu'),AES_ENCRYPT('718-499-0166','!trN8xLnaHcA@cKu'),AES_ENCRYPT('165 Prospect Park West apt 3L Brooklyn, New York 11215','!trN8xLnaHcA@cKu'),AES_ENCRYPT('New York City','!trN8xLnaHcA@cKu'),AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),AES_ENCRYPT('11215','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Millenium Brooklyn High School','!trN8xLnaHcA@cKu'),'143','5 foot 11 inches',AES_ENCRYPT('2022','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Baseball','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('2nd Base','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Short stop','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Brooklyn Huskies','!trN8xLnaHcA@cKu'),AES_ENCRYPT('95%','!trN8xLnaHcA@cKu'),NULL,NULL,AES_ENCRYPT('Margarita Bernard','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Mother','!trN8xLnaHcA@cKu'),AES_ENCRYPT('mcbernard@me.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('917-699-3205','!trN8xLnaHcA@cKu'),AES_ENCRYPT('James Bernard','!trN8xLnaHcA@cKu'),'Father',AES_ENCRYPT('jamesbernard@mac.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('718-360-6175','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,NULL,NULL,NULL,NULL,AES_ENCRYPT('black.png','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(21,AES_ENCRYPT('jarod.albizu','!trN8xLnaHcA@cKu'),'$2y$10$CtZFoANrP5MVf64oZC7uqOTVjetesx14hWmY2YTL.iqdNMj5tuA4i',AES_ENCRYPT('Jarod Albizu','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Male','!trN8xLnaHcA@cKu'),AES_ENCRYPT('jarod.albizu@gmail.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('917-902-4759','!trN8xLnaHcA@cKu'),AES_ENCRYPT('917-991-2538','!trN8xLnaHcA@cKu'),AES_ENCRYPT('577 Prospect Avenue Apt 3B ','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Brooklyn','!trN8xLnaHcA@cKu'),AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),AES_ENCRYPT('11215','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Millenium High School','!trN8xLnaHcA@cKu'),AES_ENCRYPT('135','!trN8xLnaHcA@cKu'),AES_ENCRYPT('5 foot 6 inches','!trN8xLnaHcA@cKu'),AES_ENCRYPT('2022','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Baseball','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('Catcher','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,AES_ENCRYPT('black.png','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(22,AES_ENCRYPT('elishiffman1','!trN8xLnaHcA@cKu'),'$2y$10$liH7f13aR583sC09FCrE9ugi1WFRQKJIQTH/m/YGwVgcVR2oHyVWC',AES_ENCRYPT('Eli Shiffman','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Male','!trN8xLnaHcA@cKu'),AES_ENCRYPT('elishiffman1@gmail.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('7187880414','!trN8xLnaHcA@cKu'),AES_ENCRYPT('7187880414','!trN8xLnaHcA@cKu'),AES_ENCRYPT('468 14th street','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Brooklyn','!trN8xLnaHcA@cKu'),AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),AES_ENCRYPT('11215','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Millenium Brooklyn High School','!trN8xLnaHcA@cKu'),AES_ENCRYPT('128','!trN8xLnaHcA@cKu'),AES_ENCRYPT('5 foot 8 inches','!trN8xLnaHcA@cKu'),'2021',AES_ENCRYPT('Baseball','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('Pitcher','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,AES_ENCRYPT('7187880414','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,AES_ENCRYPT('black.png','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(23,AES_ENCRYPT('awesome.baltimore','!trN8xLnaHcA@cKu'),'$2y$10$ynNtWQhGkV4rq1M2Yv3CkuCkUe0hZePxjcFEQbM1AAuQB9DU9yh6m',AES_ENCRYPT('Sam Sinder','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Male','!trN8xLnaHcA@cKu'),AES_ENCRYPT('awesome.baltimore@gmail.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('9178829389','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('254 West 82nd street NYC, NY','!trN8xLnaHcA@cKu'),'New York City',AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),AES_ENCRYPT('11024','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Millenium Manhattan','!trN8xLnaHcA@cKu'),AES_ENCRYPT('135','!trN8xLnaHcA@cKu'),AES_ENCRYPT('6 foot 1 inch','!trN8xLnaHcA@cKu'),AES_ENCRYPT('2022','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Baseball','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('Outfield','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,AES_ENCRYPT('black.png','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(24,AES_ENCRYPT('ckg2adv','!trN8xLnaHcA@cKu'),'$2y$10$EnWMZsnANfxe0cudPgAQuuPgJluAWqH9r9vjt.Me6cQ/jWDUESe8G',AES_ENCRYPT('Clifton Genge','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Male','!trN8xLnaHcA@cKu'),AES_ENCRYPT('ckg2adv@yahoo.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('585-370-6658','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('43 Fawn Ridge Rd.','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Henrietta','!trN8xLnaHcA@cKu'),AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),AES_ENCRYPT('14467','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Rush Henrietta','!trN8xLnaHcA@cKu'),AES_ENCRYPT('195','!trN8xLnaHcA@cKu'),AES_ENCRYPT('6 foot 2 inches','!trN8xLnaHcA@cKu'),AES_ENCRYPT('2020','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Baseball','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Football','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Pitcher','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Catcher third','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Rush Henrietta/ Grow @ Pro','!trN8xLnaHcA@cKu'),AES_ENCRYPT('85','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,AES_ENCRYPT('black.png','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(25,AES_ENCRYPT('christianblatter22','!trN8xLnaHcA@cKu'),'$2y$10$7rJanRTD67ZdWT7AcfMzJumB7thjchykhqpBebVF0oIIOb9RKyx6S',AES_ENCRYPT('Christian Blatter','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Male','!trN8xLnaHcA@cKu'),AES_ENCRYPT('christianblatter22@gmail.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('(585) 305-8432','!trN8xLnaHcA@cKu'),AES_ENCRYPT('(585) 321-0172','!trN8xLnaHcA@cKu'),AES_ENCRYPT('222 Branchbrook Drive','!trN8xLnaHcA@cKu'),'Rochester',AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),AES_ENCRYPT('14467','!trN8xLnaHcA@cKu'),AES_ENCRYPT('McQuaid Jesiut','!trN8xLnaHcA@cKu'),AES_ENCRYPT('165','!trN8xLnaHcA@cKu'),AES_ENCRYPT('6 foot 4 inches','!trN8xLnaHcA@cKu'),AES_ENCRYPT('2020','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Baseball','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('1B','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('Diamond Pro Orange/ Rush Henrietta Comets','!trN8xLnaHcA@cKu'),AES_ENCRYPT('3.8','!trN8xLnaHcA@cKu'),NULL,NULL,AES_ENCRYPT('Tony Fuller','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Head Varisty Baseball Coach','!trN8xLnaHcA@cKu'),AES_ENCRYPT('daimondprobaseball@gmail.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('(585) 381-2273','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Joe Bianchi','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Upsate Baseball League President','!trN8xLnaHcA@cKu'),AES_ENCRYPT('joebianchi16@hotmail.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('(585) 749-8503','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Jeff Tirabassi','!trN8xLnaHcA@cKu'),AES_ENCRYPT('RH Comets Coach','!trN8xLnaHcA@cKu'),AES_ENCRYPT('apecorn@aol.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('(585) 733-8571','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,AES_ENCRYPT('black.png','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(26,AES_ENCRYPT('wiletaylor','!trN8xLnaHcA@cKu'),'$2y$10$RqXXVCNPxeENa/ZX4gPj9.SBqEzg./ejMBlk8jX5rE03mxvBbbPRG',AES_ENCRYPT('Wile Schwarz-Couse','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Male','!trN8xLnaHcA@cKu'),AES_ENCRYPT('wiletaylor@gmail.com','!trN8xLnaHcA@cKu'),AES_ENCRYPT('6465678118','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('172 CLIFTON PL','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Brooklyn','!trN8xLnaHcA@cKu'),AES_ENCRYPT('New York','!trN8xLnaHcA@cKu'),AES_ENCRYPT('11238','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Millenium Brooklyn High School','!trN8xLnaHcA@cKu'),NULL,NULL,AES_ENCRYPT('2022','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Baseball','!trN8xLnaHcA@cKu'),NULL,AES_ENCRYPT('Pitcher','!trN8xLnaHcA@cKu'),AES_ENCRYPT('Infield','!trN8xLnaHcA@cKu'),AES_ENCRYPT('SFX huskies','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,AES_ENCRYPT('black.png','!trN8xLnaHcA@cKu'),NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-05  3:27:11
