CREATE DATABASE thandihlaya;

USE thandihlaya;

CREATE TABLE Users (
    id INT (6) NOT NULL PRIMARY KEY auto_increment,
    email VARCHAR (50),
    pword VARCHAR (25) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Jokes (
    id INT (6) NOT NULL PRIMARY KEY auto_increment,
    type VARCHAR (50),
    setup VARCHAR (255),
    punchline VARCHAR (255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

);

CREATE TABLE Reviews (
    id INT (6) NOT NULL PRIMARY KEY auto_increment, 
    user_id INT (6) NOT NULL,
    joke_id INT (6) NOT NULL,
    rating INT (6) NOT NULL,

    FOREIGN KEY (user_id) REFERENCES user(id),
    FOREIGN KEY (joke_id) REFERENCES Jokes(id)

);

INSERT INTO user (name, email, password)
VALUES ('thandi', 'thandi@gmail.com', 'p@ssw0rd');