-- USE players;

DROP TABLE IF EXISTS `home_page`;
CREATE TABLE `home_page`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `header` text,
    `text` text,
    `creation_date` datetime,
    PRIMARY KEY (`id`)
)ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

INSERT INTO `home_page` (id, header, text, creation_date) VALUES(1, 'At Athletic Prospects', 'Test', NOW());

DROP TABLE IF EXISTS `about_us`;
CREATE TABLE `about_us`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `text` text,
    `creation_date` datetime,
    PRIMARY KEY (`id`)
)ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

INSERT INTO `about_us` (id, text, creation_date) VALUES(1, 'Test', NOW());
