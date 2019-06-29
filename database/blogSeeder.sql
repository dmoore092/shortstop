-- USE players;

DROP TABLE IF EXISTS `blog_posts`;
CREATE TABLE `blog_posts`(
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(500),
    `text` text,
    `tags` VARCHAR(150),
    `post_date` datetime,
    PRIMARY KEY (`id`)
)ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;


INSERT INTO `blog_posts` (id, title, text, tags, post_date) VALUES
(1, 'First Post', 'This is the first blog post for testing', 'Football, Self improvement' , NOW()),
(2, 'Second Post', 'This is the second blog post for testing', 'Baseball, College, Scholarship', NOW());