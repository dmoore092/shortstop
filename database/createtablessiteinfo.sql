DROP TABLE IF EXISTS homeinfo;
CREATE TABLE homeinfo(
id INT AUTO_INCREMENT,
header VARCHAR(1000)NOT NULL DEFAULT 'At Athletic Prospects',
content VARCHAR(10000) NOT NULL DEFAULT 'We strive to provide High School and JUCO athletes the tools to successfully promote themselves to college coaches by assisting athletes through the recruiting process. Our goal is to be a mentor-leader to athletes to teach them the importance of academics and athletics while showing strong leadership characteristics to be successful on and off the field. ',
date DATETIME,
editedby VARCHAR(150),
CONSTRAINT homeinfo PRIMARY KEY(id)
);

INSERT INTO homeinfo(header, content, date, editedby
)
VALUES(
    'At Athletic Prospects',
    'We strive to provide High School and JUCO athletes the tools to successfully promote themselves to college coaches by assisting athletes through the recruiting process. Our goal is to be a mentor-leader to athletes to teach them the importance of academics and athletics while showing strong leadership characteristics to be successful on and off the field. ',
    NOW(),
    'dmoore092'
);

SELECT 'DONE WITH homeinfo';

DROP TABLE IF EXISTS aboutinfo;
CREATE TABLE aboutinfo(
id INT AUTO_INCREMENT,
header VARCHAR(1000),
p1 TEXT(6000),
p2 TEXT(6000),
p3 TEXT(6000),
p4 TEXT(6000),
p5 TEXT(6000),
p6 TEXT(6000),
p7 TEXT(6000),
p8 TEXT(6000),
p9 TEXT(6000),
p10 TEXT(6000),
date DATETIME,
editedby VARCHAR(150),
CONSTRAINT aboutinfo PRIMARY KEY(id)
);

INSERT INTO aboutinfo(header, p1, p2, p3, p4, p5, p6, p7, p8, p9, p10, date, editedby
)
VALUES(
    'About Us',
    'Athletic Prospects'' mission is to guide each player in bridging the gap between high school and collegiate athletics. College coaches are looking for the commitment of the player and that''s where we come into play. ',
    'Bi-weekly, we will help our athletes stand out in the recruiting process by guiding them in their personal communication with coaches. Through our experience, we''ve learned one of the greatest tools to have in the recruiting process is communication. Athletic Prospects goes beyond just getting the player recognized; we get the player involved. And, with our individualized process, players will be seen as a committed and motivated player that wants to play college ball. ',
    'We want serve our athletes the top notch recruitment experience that they deserve. Our focus is on the student-athlete''s future. That means we''ll work with them to find academic scholarships, athletic scholarships, and their dream school. ',
    'Our team wants to see Athletic Prospects'' athletes grow into responsible, hardworking adults by giving them the skills they need to achieve their dreams. ',
    '',
    '',
    '',
    '',
    '',
    '',
    NOW(),
    'dmoore092'
);