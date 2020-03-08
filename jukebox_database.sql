CREATE TABLE juser(
    user_id VARCHAR(45),
    password VARCHAR(45),
    name VARCHAR(45),
    email VARCHAR(90)
);

CREATE TABLE jprofile(
    user_id VARCHAR(45),
    displayname VARCHAR(45),
    bio VARCHAR(2000),
    genres VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES juser(user_id)
);

CREATE TABLE jalbum(
    album_id INT(9),
    title VARCHAR(45),
    artist VARCHAR(45)
);