DROP TABLE IF EXISTS players;
CREATE TABLE IF NOT EXISTS players (
    `id` INT AUTO_INCREMENT,
    `username` VARCHAR(50) CHARACTER SET utf8,
    `pass` VARCHAR(900) CHARACTER SET utf8,
    `name` VARCHAR(100) CHARACTER SET utf8,
    `gender` VARCHAR(20) CHARACTER SET utf8,
    `email` VARCHAR(150) CHARACTER SET utf8,
    `cellphone` VARCHAR(20) CHARACTER SET utf8,
    `homephone` VARCHAR(20) CHARACTER SET utf8,
    `address` VARCHAR(200) CHARACTER SET utf8,
    `city` VARCHAR(200) CHARACTER SET utf8,
    `state` VARCHAR(8) CHARACTER SET utf8,
    `zip` VARCHAR(20) CHARACTER SET utf8,
    `highschool` VARCHAR(150) CHARACTER SET utf8,
    `weight` VARCHAR(20) CHARACTER SET utf8,
    `height` VARCHAR(50) CHARACTER SET utf8,
    `gradYear` VARCHAR(50) CHARACTER SET utf8,
    `sport` VARCHAR(50) CHARACTER SET utf8,
    `sport2` VARCHAR(50) CHARACTER SET utf8,
    `primaryPosition` VARCHAR(50) CHARACTER SET utf8,
    `secondaryPosition` VARCHAR(50) CHARACTER SET utf8,
    `travelTeam` VARCHAR(150) CHARACTER SET utf8,
    `gpa` VARCHAR(20) CHARACTER SET utf8,
    `sat` VARCHAR(20) CHARACTER SET utf8,
    `act` VARCHAR(20) CHARACTER SET utf8,
    `ref1Name` VARCHAR(150) CHARACTER SET utf8,
    `ref1JobTitle` VARCHAR(150) CHARACTER SET utf8,
    `ref1Email` VARCHAR(150) CHARACTER SET utf8,
    `ref1Phone` VARCHAR(150) CHARACTER SET utf8,
    `ref2Name` VARCHAR(150) CHARACTER SET utf8,
    `ref2JobTitle` VARCHAR(150) CHARACTER SET utf8,
    `ref2Email` VARCHAR(150) CHARACTER SET utf8,
    `ref2Phone` VARCHAR(150) CHARACTER SET utf8,
    `ref3Name` VARCHAR(150) CHARACTER SET utf8,
    `ref3Jobtitle` VARCHAR(150) CHARACTER SET utf8,
    `ref3Email` VARCHAR(150) CHARACTER SET utf8,
    `ref3Phone` VARCHAR(150) CHARACTER SET utf8,
    `persStatement` VARCHAR(300) CHARACTER SET utf8,
    `commitment` VARCHAR(150) CHARACTER SET utf8,
    `service` VARCHAR(50) CHARACTER SET utf8,
    `profileImage` VARCHAR(150) CHARACTER SET utf8,
    `showcase1` VARCHAR(50) CHARACTER SET utf8,
    `showcase2` VARCHAR(50) CHARACTER SET utf8,
    `showcase3` VARCHAR(50) CHARACTER SET utf8,
    `persontype` VARCHAR(20) CHARACTER SET utf8,
    `college` VARCHAR(150) CHARACTER SET utf8,
    `twitter` VARCHAR(50) CHARACTER SET utf8,
    `facebook` VARCHAR(50) CHARACTER SET utf8,
    `instagram` VARCHAR(50) CHARACTER SET utf8,
    `website` VARCHAR(50) CHARACTER SET utf8,
    `characteristics` VARCHAR(250) CHARACTER SET utf8,
    `velocity` VARCHAR(50) CHARACTER SET utf8,
    `gpareq` VARCHAR(50) CHARACTER SET utf8,
    `satactreq` VARCHAR(50) CHARACTER SET utf8,
    `major` VARCHAR(50) CHARACTER SET utf8,
    PRIMARY KEY (id)
);
INSERT INTO players VALUES
    (1,'dmoore092','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Dale Moore',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (2,'kprestano','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Keith Prestano',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'admin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (3,'frankmccabefrank','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Frank McCabe','male','frankmccabefrank@aol.com','585-857-5493',NULL,'118 campus drive','Rochester','New York','14623','Rush Henrietta',155,'5 foot 10 inches',NULL,'Baseball',NULL,'Center Field','Shortstop, Catcher','Rush Henrietta travel',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (4,'bobbysellers','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Bobby Sellers','male','bobbysellers@gmail.com','5857734002','5852784478','14 Clooney Dr','Henrietta','New York','14467','Rush Henrietta Senior High School',165,'5 foot 10 inches',NULL,'Baseball',NULL,'Pitcher','Shortstop, Left Field','RH Comets 17U',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (5,'aaronshoemaker611','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Aaron Shoemaker','male','aaronshoemaker611@yahoo.com','5854901607','5853594829','22 Edmar Court','Henrietta','New York','14467','Rush-Henrietta',185,'5 foot 10 inches',NULL,'Baseball',NULL,'Catcher',NULL,'ICBL Monarchs',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (6,'ben.hintz10','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Ben Hintz','male','ben.hintz10@gmail.com','(585)766-5411','(585)586-3334','5 Duxbury Way','Rochester','New York','14618','McQuaid Jesuit',225,'6 foot 7 inches',NULL,'Baseball',NULL,'LHP',NULL,'Team Diamond Pro',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (7,'bdsmith9710','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Brennen Smith','male','bdsmith9710@gmail.com','5855450602',NULL,'890 Joylene Drive','Webster','New York','14580','Webster Thomas',195,'6 foot 0 inches',2016,'Baseball',NULL,'Pitcher','Outfield',NULL,'2.8',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (8,'gshelmer4','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Kaden Helmer','male','gshelmer4@rochester.rr.com','5854414540',NULL,'7190 Lane Rd','Victor','New York','14564','Victor High School',160,'5 foot 10 inches',2020,'Baseball',NULL,'Catcher',NULL,NULL,'3.7',NULL,NULL,'Jon Schlesling',NULL,NULL,'585-489-1521',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (9,'cmprestano','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Caroline Prestano','female','cmprestano@gmail.com','15854061386','15854061386','101 Park Ave','Canandaigua','New York','14424',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (10,'jfernand','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Frank Fernandes','male','jfernand@rochester.rr.com','585-770-8049',NULL,'16 Oakbend Ln.','Rochester','New York','14617','West Irondequoit',125,'5 foot 7 inches',2019,'Baseball',NULL,'Short Stop','Second Base, Outfield','Rochester Cougars, Rochester Raiders, Gro2Pro, American Legion','3','NA','NA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (11,'lweiss','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Lucien Weiss','male','lweiss@millenniumbrooklynhs.org','9178383593',NULL,'22 Fort Greene Place','Brooklyn','New York','11217','Millennium Brooklyn High School',NULL,NULL,2022,'Baseball',NULL,'Pitcher',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (12,'njohnson','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Nolan Johnson','male','njohnson@millenniumbrooklynhs.org','347-860-3415',NULL,'175 carroll street','Brooklyn','New York','11231','Millennium highschool',176,'6 foot 1 inch',2021,'Baseball','Basketball','Pitcher',NULL,NULL,'3.75',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (13,'jkudlack','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Julian Kudlack','male','jkudlack@millenniumbrooklynhs.org','718-971-3647',NULL,'14 east 7th street','Brooklyn','New York','11218','Millennium Brooklyn High School',160,'6 foot 3 inches',2019,NULL,NULL,'MIF, First',NULL,'Brooklyn Bulldogs, Wrath Baseball','3.7','1450',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (14,'sbeaver','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Shane Beaver','male','sbeaver@millenniumbrooklynhs.org','718-687-0122','646-285-6308','111 Wyckoff Street #1 ','Brooklyn','New York','11201','Millennium Brooklyn High School',168,'6 foot 0 inches',2022,'Baseball',NULL,'First base','Pitcher, 3rd Base, Outfield','SFX Huskies',NULL,NULL,NULL,'Brian Friedman','Athletic Director - Millennium Brooklyn High School','bfriedman@millenniumbrooklynhs.org','347-463-6900','Melvin Martinez','Coach SFX Huskies and Grand Street Campus Brooklyn','melvincoachm@aol.com','917-749-1969',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (15,'karlbb0709','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Karl Basile-Baehr','male','karlbb0709@gmail.com','9177516546',NULL,'170 west end avenue Apt 19p ','New York','New York','10023','Millennium high school',165,'5 foot 10 inches',2020,'Baseball',NULL,'Pitcher only',NULL,NULL,'Roughly 88',NULL,NULL,'Brian friedman','Coach for Millennium’s varsity team',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (16,'egonzalez','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Elijah Gonzalez','male','egonzalez@millenniumbrooklynhs.org','9177492359',NULL,'116 Hall Street','Brooklyn','New York','11205','Millennium Brooklyn High School',190,'6 foot 3 inches',2019,'Baseball',NULL,'SS','2b','Brooklyn Wrath','3.7','1110',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (17,'gtraincf','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Graeme Lauterbach-Mason','male','gtraincf@gmail.com','917-474-0749',NULL,'179 ocean parkway apt. 3i','New York City','New York','11218','Millennium Brooklyn high school',125,'5 foot 7 inches',2021,'Baseball','Lacrosse','Center Field','Second Base, shortstop, pitcher ','Huskies baseball 15 U','93.25 out of 100',NULL,NULL,'Brian Friedman','High school baseball coach','bfriedman@millenniumbrooklynhs.org','(347) 463-6900','Tom Blozy','Travel baseball coach','tommyab1@aol.com','718-757-7099',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (18,'agarcia040','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Ethan Garcia','male','agarcia040@msn.com','9173755584',NULL,'8565 111th St','RICHMOND HILL','New York','11418','Millennium Brooklyn high school',155,'5 foot 9 inches',2020,'Baseball',NULL,'IN/P',NULL,'Wrath Baseball',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (19,'aidangp66','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Aidan Pawlak','male','aidangp66@gmail.com','646-539-8456',NULL,'601 6th street','Brooklyn','New York','11215','Millennium Brooklyn HS',105,'5 foot 4 inches',2022,'Baseball',NULL,'CF/LHP',NULL,'DHAA Knights/ Brooklyn Falcons',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (20,'hbernard','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Hayden Bernard','male','hbernard@millenniumbrooklynhs.org','347-407-2699','718-499-0166','165 Prospect Park West apt 3L Brooklyn, New York 11215','New York City','New York','11215','Millennium Brooklyn Highschool',143,'5 foot 11 inches',2022,'Baseball',NULL,'2nd base',', Short Stop.','Brooklyn Huskies','95%',NULL,NULL,'Margarita Bernard','Mother','mcbernard@me.com','917-699-3205','James Bernard','Father','jamesbernard@mac.com','718-360-6175',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (21,'jarod.albizu','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Jarod Albizu','male','jarod.albizu@gmail.com','917-902-4759','917-991-2538','577 Prospect Avenue Apt 3B ','Brooklyn','New York','11215','Millennium High School',135,'5 foot 6 inches',2022,'Baseball',NULL,'Catcher',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (22,'elishiffman1','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Eli Shiffman','male','elishiffman1@gmail.com','7187880414','7187880414','468 14th street','Brooklyn','New York','11215','Millennium Brooklyn High School',128,'5 foot 8 inches',2021,'Baseball',NULL,'Pitcher',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'7187880414',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (23,'awesome.baltimore','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Sam Sinder','male','awesome.baltimore@gmail.com','9178829389',NULL,'254 West 82nd street NYC, NY','New York City','New York','10024','Millennium Manhattan',135,'6 foot 1 inch',2022,'Baseball',NULL,'Outfield',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (24,'ckg2adv','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Clifton Genge','male','ckg2adv@yahoo.com','585-370-6658',NULL,'43 Fawn Ridge Rd.','Henrietta','New York','14467','Rush-Henrietta',195,'6 foot 2 inches',2020,'Baseball','football','Pitcher','Catcher, Third','Rush Henrietta/Grow @ Pro','85',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (25,'christianblatter22','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Christian Blatter','male','christianblatter22@gmail.com','(585) 305-8432','(585) 321-0172','222 Branchbrook Drive','Rochester','New York','14467','McQuaid Jesuit',165,'6 foot 4 inches',2020,'Baseball',NULL,'1B','Pitcher, 3rd Base, Outfield','Daimond Pro Orange, Rush Henrietta Royal Comets','3.8',NULL,NULL,'Tony Fuller','Head Varsity Baseball Coach','daimondprobaseball@gmail.com','(585) 381-2273','Joe Bianchi','Upstate Baseball League President','joebianchi16@hotmail.com','(585) 749-8503','Jeff Tirabassi','RH Royal Comets Coach','apecorn@aol.com','(585) 733-8571',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'player',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
    (26,'wiletaylor','$2y$10$eXKLYvQjd4g0.zehRtk59O52J8LV.Q.uWtpn6q8.azJtU2OfJqn/6','Wile Schwarz-Couse','male','wiletaylor@gmail.com','6465678118',NULL,'172 CLIFTON PL','BROOKLYN','New York','11238-1409','Millennium Brooklyn High School',NULL,NULL,2022,'Baseball',NULL,'Pitcher','Infield','SFX Huskies',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
