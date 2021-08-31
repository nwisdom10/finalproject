CREATE TABLE IF NOT EXISTS replies (
    reply_id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    post_id int(11) NOT NULL,
    uid int(11) NOT NULL,
    comment LONGTEXT NOT NULL,
    datePosted date NOT NULL,
    FOREIGN KEY (post_id) REFERENCES posts(post_id),
    FOREIGN KEY (uid) REFERENCES users(uid)
);