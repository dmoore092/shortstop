-- USE players;

DROP TABLE IF EXISTS `blog_posts`;
CREATE TABLE `blog_posts`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(500),
    `post_date` datetime,
    `text` text,
    PRIMARY KEY (`id`)
)ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;


INSERT INTO `blog_posts` (id, title, post_date, text) VALUES
(1, 'First Post', NOW(), 'This is the first blog post for testing'),
(2, 'Second Post', NOW(), 'This is the second blog post for testing');