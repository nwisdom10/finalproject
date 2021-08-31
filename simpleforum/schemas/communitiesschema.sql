CREATE TABLE IF NOT EXISTS communities(
    com_id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    uid int(11) NOT NULL,
    namee TINYTEXT NOT NULL,
    descript LONGTEXT NOT NULL,
    FOREIGN KEY(uid) REFERENCES users(uid)
);