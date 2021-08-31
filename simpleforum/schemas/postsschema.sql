CREATE TABLE IF NOT EXISTS posts(
    post_id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    uid int(11) NOT NULL,
    title TINYTEXT NOT NULL,
    content LONGTEXT NOT NULL,
    view int(11) NOT NULL,
    datePosted date NOT NULL,
    FOREIGN KEY(uid) REFERENCES users(uid)
);