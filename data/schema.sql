DROP TABLE IF EXISTS user;
CREATE TABLE  user (
  id        INT UNSIGNED NOT NULL AUTO_INCREMENT,
  firstName VARCHAR(64)  NOT NULL,
  lastName  VARCHAR(64)  NOT NULL,
  email     VARCHAR(128) NOT NULL,
  password  VARCHAR(255)  NOT NULL,
  PRIMARY KEY  (id)
);

INSERT INTO user (firstName, lastName, email, password) VALUES ('Ramon',  'Binz',  'ramon.binz@bbcag.ch',   sha2('ramon', 256));
INSERT INTO user (firstName, lastName, email, password) VALUES ('Samuel', 'Wicky', 'samuel.wicky@bbcag.ch', sha2('samuel', 256));
Create VIEW blog_v as
Select b.id, b.blogTitle,b.blogText,b.blogPicturePath,b.user_id,u.username,u.profilePicturePath From blog as b
Join user as u
on u.id = b.user_id;
