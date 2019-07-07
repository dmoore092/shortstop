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
  `username` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `pass` varchar(900) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `gender` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `cellphone` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `homephone` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `state` varchar(8) CHARACTER SET utf8 DEFAULT NULL,
  `zip` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `highschool` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `weight` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `height` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `gradYear` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `sport` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `sport2` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `primaryPosition` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `secondaryPosition` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `travelTeam` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `gpa` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `sat` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `act` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `ref1Name` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `ref1JobTitle` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `ref1Email` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `ref1Phone` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `ref2Name` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `ref2JobTitle` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `ref2Email` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `ref2Phone` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `ref3Name` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `ref3Jobtitle` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `ref3Email` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `ref3Phone` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `persStatement` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `commitment` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `service` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `profileImage` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `showcase1` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `showcase2` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `showcase3` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `persontype` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `college` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `twitter` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `facebook` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `instagram` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `website` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `characteristics` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `velocity` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `gpareq` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `satactreq` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `major` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `reset` varchar(150) DEFAULT NULL,
  `resetExpires` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
INSERT INTO `players` VALUES (1,'dmoore092','$2y$10$rlMTq2cfXg5Ffq2zhEPehe.coVqLucURVdbVa9bbmdXyEVyERYf92','Dale Moore',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'kprestano','$2y$10$jSgZpj8bx6PDzZ4tmtb1KeIgAyHGqbuqrDP6uA8b/MdXThFkdheIW','Keith Prestano',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'frankmccabefrank','$2y$10$dMAFuFRZy62witgm2TT/KuKaL1GjDeoNycdt5kU.sIHEylU3rluum','Frank McCabe','male','frankmccabefrank@aol.com','585-857-5493',NULL,'118 campus drive','Rochester','New York','14623','Rush Henrietta','155','5 foot 10 inches',NULL,'Baseball',NULL,'Center Field','Shortstop, Catcher','Rush Henrietta travel',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'bobbysellers','$2y$10$41Fe7E97uWgGHWDDCq9Diufx1ORD/uyy2Yv9h5DryOVAzyGHWb3Ou','Bobby Sellers','male','bobbysellers@gmail.com','5857734002','5852784478','14 Clooney Dr','Henrietta','New York','14467','Rush Henrietta Senior High School','165','5 foot 10 inches',NULL,'Baseball',NULL,'Pitcher','Shortstop, Left Field','RH Comets 17U',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'aaronshoemaker611','$2y$10$FPJzGwC1Ix8X16ePa9gSQ.XMYU43EZIDM1ajRg.cR3F7qqGnpYoYu','Aaron Shoemaker','male','aaronshoemaker611@yahoo.com','5854901607','5853594829','22 Edmar Court','Henrietta','New York','14467','Rush-Henrietta','185','5 foot 10 inches',NULL,'Baseball',NULL,'Catcher',NULL,'ICBL Monarchs',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'ben.hintz10','$2y$10$UkHUN.G/jxHeStXKmXO3quu0ITdXJa1WlW9/yDTT.nXfoEU92DN2C','Ben Hintz','male','ben.hintz10@gmail.com','(585)766-5411','(585)586-3334','5 Duxbury Way','Rochester','New York','14618','McQuaid Jesuit','225','6 foot 7 inches',NULL,'Baseball',NULL,'LHP',NULL,'Team Diamond Pro',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'bdsmith9710','$2y$10$mZ3Q.xiZzIvSczEinztogOMFrGE0XLcfkxyJHJS.9PlKBGs/mRU0C','Brennen Smith','male','bdsmith9710@gmail.com','5855450602',NULL,'890 Joylene Drive','Webster','New York','14580','Webster Thomas','195','6 foot 0 inches','2016','Baseball',NULL,'Pitcher','Outfield',NULL,'2.8',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'gshelmer4','$2y$10$01H8gbU6Zh495QhokoMYxu72TswFIgtJFD4vZIxxD7s3LWPWByL4.','Kaden Helmer','male','gshelmer4@rochester.rr.com','5854414540',NULL,'7190 Lane Rd','Victor','New York','14564','Victor High School','160','5 foot 10 inches','2020','Baseball',NULL,'Catcher',NULL,NULL,'3.7',NULL,NULL,'Jon Schlesling',NULL,NULL,'585-489-1521',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'cmprestano','$2y$10$zgbQuuJKHlNktf6eaN9yJ.Yp6ZRJ7yw/ZnjUlJ9reMyLAtseLqmTm','Caroline Prestano','female','cmprestano@gmail.com','15854061386','15854061386','101 Park Ave','Canandaigua','New York','14424',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'jfernand','$2y$10$Y9K/2TXMFCpfTxPByMtJ0.1Vd13885GwYTTLs3OEOvkALKO08Dpze','Frank Fernandes','male','jfernand@rochester.rr.com','585-770-8049',NULL,'16 Oakbend Ln.','Rochester','New York','14617','West Irondequoit','125','5 foot 7 inches','2019','Baseball',NULL,'Short Stop','Second Base, Outfield','Rochester Cougars, Rochester Raiders, Gro2Pro, American Legion','3','NA','NA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,'lweiss','$2y$10$DEyRQ4FrhNqWdENFAuoev.2GNuvqf8Gh5.kV5hfeVqAO9E5NPswde','Lucien Weiss','male','lweiss@millenniumbrooklynhs.org','9178383593',NULL,'22 Fort Greene Place','Brooklyn','New York','11217','Millennium Brooklyn High School',NULL,NULL,'2022','Baseball',NULL,'Pitcher',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,'njohnson','$2y$10$IKzDrAZcZrKMAyXGH5Yd7.8NlkisYPfVSpoIR79ytANOZ2h5b.RHG','Nolan Johnson','male','njohnson@millenniumbrooklynhs.org','347-860-3415',NULL,'175 carroll street','Brooklyn','New York','11231','Millennium highschool','176','6 foot 1 inch','2021','Baseball','Basketball','Pitcher',NULL,NULL,'3.75',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'jkudlack','$2y$10$F4Ab2AZSSpN.vU2iShyfhuDM9oxZ9WYELyjYb.gXmP0DprQ0ifZV6','Julian Kudlack','male','jkudlack@millenniumbrooklynhs.org','718-971-3647',NULL,'14 east 7th street','Brooklyn','New York','11218','Millennium Brooklyn High School','160','6 foot 3 inches','2019',NULL,NULL,'MIF, First',NULL,'Brooklyn Bulldogs, Wrath Baseball','3.7','1450',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(14,'sbeaver','$2y$10$GVQ7n4bRdSGoLcFMV2P0EOiJo7HD1vkp62FUVI3iDuiiLss4EbQ9O','Shane Beaver','male','sbeaver@millenniumbrooklynhs.org','718-687-0122','646-285-6308','111 Wyckoff Street #1 ','Brooklyn','New York','11201','Millennium Brooklyn High School','168','6 foot 0 inches','2022','Baseball',NULL,'First base','Pitcher, 3rd Base, Outfield','SFX Huskies',NULL,NULL,NULL,'Brian Friedman','Athletic Director - Millennium Brooklyn High School','bfriedman@millenniumbrooklynhs.org','347-463-6900','Melvin Martinez','Coach SFX Huskies and Grand Street Campus Brooklyn','melvincoachm@aol.com','917-749-1969',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,'karlbb0709','$2y$10$6HkVXhHr5usmhYRZ4iHX/.D4SmwOdhN58mzeH4Y7pFM6jKxTEDI5W','Karl Basile-Baehr','male','karlbb0709@gmail.com','9177516546',NULL,'170 west end avenue Apt 19p ','New York','New York','10023','Millennium high school','165','5 foot 10 inches','2020','Baseball',NULL,'Pitcher only',NULL,NULL,'Roughly 88',NULL,NULL,'Brian friedman','Coach for Millennium’s varsity team',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,'egonzalez','$2y$10$w.4uk3koviv4P20joZnXlecLLIGNppcrHvRovfo91ABLm0Z3W9bh6','Elijah Gonzalez','male','egonzalez@millenniumbrooklynhs.org','9177492359',NULL,'116 Hall Street','Brooklyn','New York','11205','Millennium Brooklyn High School','190','6 foot 3 inches','2019','Baseball',NULL,'SS','2b','Brooklyn Wrath','3.7','1110',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,'gtraincf','$2y$10$q/PED2MwDwicEnev8NlKi.kVY9B1upLDEbcOfeBI/0/p8BLs9cCJy','Graeme Lauterbach-Mason','male','gtraincf@gmail.com','917-474-0749',NULL,'179 ocean parkway apt. 3i','New York City','New York','11218','Millennium Brooklyn high school','125','5 foot 7 inches','2021','Baseball','Lacrosse','Center Field','Second Base, shortstop, pitcher ','Huskies baseball 15 U','93.25 out of 100',NULL,NULL,'Brian Friedman','High school baseball coach','bfriedman@millenniumbrooklynhs.org','(347) 463-6900','Tom Blozy','Travel baseball coach','tommyab1@aol.com','718-757-7099',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,'agarcia040','$2y$10$yAPqFG9PpEIzFwkSVOuLuucMV2rrQgdhNcVREkK02BG4QXTLCCWwm','Ethan Garcia','male','agarcia040@msn.com','9173755584',NULL,'8565 111th St','RICHMOND HILL','New York','11418','Millennium Brooklyn high school','155','5 foot 9 inches','2020','Baseball',NULL,'IN/P',NULL,'Wrath Baseball',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,'aidangp66','$2y$10$xmAlXmb/pmVNeq6gtgOFNuMuvK6YixHhZ/qF75daSE2dQkVVpMWCq','Aidan Pawlak','male','aidangp66@gmail.com','646-539-8456',NULL,'601 6th street','Brooklyn','New York','11215','Millennium Brooklyn HS','105','5 foot 4 inches','2022','Baseball',NULL,'CF/LHP',NULL,'DHAA Knights/ Brooklyn Falcons',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,'hbernard','$2y$10$USDc8Ab7XxLdvXnjEho/E.VC73YRzYSaTS3of5X.g2XqbNF89bBk2','Hayden Bernard','male','hbernard@millenniumbrooklynhs.org','347-407-2699','718-499-0166','165 Prospect Park West apt 3L Brooklyn, New York 11215','New York City','New York','11215','Millennium Brooklyn Highschool','143','5 foot 11 inches','2022','Baseball',NULL,'2nd base',', Short Stop.','Brooklyn Huskies','95%',NULL,NULL,'Margarita Bernard','Mother','mcbernard@me.com','917-699-3205','James Bernard','Father','jamesbernard@mac.com','718-360-6175',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(21,'jarod.albizu','$2y$10$CtZFoANrP5MVf64oZC7uqOTVjetesx14hWmY2YTL.iqdNMj5tuA4i','Jarod Albizu','male','jarod.albizu@gmail.com','917-902-4759','917-991-2538','577 Prospect Avenue Apt 3B ','Brooklyn','New York','11215','Millennium High School','135','5 foot 6 inches','2022','Baseball',NULL,'Catcher',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,'elishiffman1','$2y$10$liH7f13aR583sC09FCrE9ugi1WFRQKJIQTH/m/YGwVgcVR2oHyVWC','Eli Shiffman','male','elishiffman1@gmail.com','7187880414','7187880414','468 14th street','Brooklyn','New York','11215','Millennium Brooklyn High School','128','5 foot 8 inches','2021','Baseball',NULL,'Pitcher',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'7187880414',NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(23,'awesome.baltimore','$2y$10$ynNtWQhGkV4rq1M2Yv3CkuCkUe0hZePxjcFEQbM1AAuQB9DU9yh6m','Sam Sinder','male','awesome.baltimore@gmail.com','9178829389',NULL,'254 West 82nd street NYC, NY','New York City','New York','10024','Millennium Manhattan','135','6 foot 1 inch','2022','Baseball',NULL,'Outfield',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,'ckg2adv','$2y$10$EnWMZsnANfxe0cudPgAQuuPgJluAWqH9r9vjt.Me6cQ/jWDUESe8G','Clifton Genge','male','ckg2adv@yahoo.com','585-370-6658',NULL,'43 Fawn Ridge Rd.','Henrietta','New York','14467','Rush-Henrietta','195','6 foot 2 inches','2020','Baseball','football','Pitcher','Catcher, Third','Rush Henrietta/Grow @ Pro','85',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(25,'christianblatter22','$2y$10$7rJanRTD67ZdWT7AcfMzJumB7thjchykhqpBebVF0oIIOb9RKyx6S','Christian Blatter','male','christianblatter22@gmail.com','(585) 305-8432','(585) 321-0172','222 Branchbrook Drive','Rochester','New York','14467','McQuaid Jesuit','165','6 foot 4 inches','2020','Baseball',NULL,'1B','Pitcher, 3rd Base, Outfield','Daimond Pro Orange, Rush Henrietta Royal Comets','3.8',NULL,NULL,'Tony Fuller','Head Varsity Baseball Coach','daimondprobaseball@gmail.com','(585) 381-2273','Joe Bianchi','Upstate Baseball League President','joebianchi16@hotmail.com','(585) 749-8503','Jeff Tirabassi','RH Royal Comets Coach','apecorn@aol.com','(585) 733-8571',NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,'wiletaylor','$2y$10$RqXXVCNPxeENa/ZX4gPj9.SBqEzg./ejMBlk8jX5rE03mxvBbbPRG','Wile Schwarz-Couse','male','wiletaylor@gmail.com','6465678118',NULL,'172 CLIFTON PL','BROOKLYN','New York','11238-1409','Millennium Brooklyn High School',NULL,NULL,'2022','Baseball',NULL,'Pitcher','Infield','SFX Huskies',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'black.JPG',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
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
