CREATE TABLE Users(
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    UserName VARCHAR(255) NOT NULL,
    UserPassword VARCHAR(255) NOT NULL
);

CREATE TABLE Teachers (
    TeacherID INT AUTO_INCREMENT PRIMARY KEY,
    TeacherName VARCHAR(255) NOT NULL,
    Department VARCHAR(255)
);

CREATE TABLE Reviews (
    ReviewID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT,
    TeacherID INT,
    Rating INT CHECK (Rating BETWEEN 1 AND 5),
    StudentComment TEXT,
    RTimestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (TeacherID) REFERENCES Teachers(TeacherID)
);
-- Inserting data into Users table
INSERT INTO Users (UserName, UserPassword)
VALUES ('JohnDoe', '$2b$12$KIXnK1e8sJktKHrNfEwIseOlc8OQ5B0I5DFpXWgAFLbOj7tpXlBCK'),
       ('JaneSmith', '$2b$12$E5M8O9/9CrGz7VuvxD7kEei9WZBPq0P.LLrG6klwYm3tkVcE4v82W'),
       ('AliceJohnson', '$2b$12$7vKJPSM9Zx/epKXyT6Pe/uKX5xv6lZrtg2R6K2j6U.9HKqg9T1HLi');

-- Inserting data into Teachers table
INSERT INTO Teachers (TeacherName, Department)
VALUES ('Professor Anderson', 'Computer Science'),
       ('Dr. Ramirez', 'Physics'),
       ('Ms. Roberts', 'Mathematics');

-- Inserting data into Reviews table
INSERT INTO Reviews (UserID, TeacherID, Rating, StudentComment)
VALUES (1, 1, 4, 'Great teacher, very knowledgeable.'),
       (2, 2, 5, 'Absolutely fantastic experience, highly recommend!'),
       (3, 3, 3, 'Decent teacher, could improve on explaining complex topics.'),
       (1, 1, 1, 'SO BADDDDD!.');

SELECT Reviews.StudentComment
FROM Reviews
JOIN Teachers ON Reviews.TeacherID = Teachers.TeacherID
WHERE Teachers.TeacherName = 'Professor Anderson';

DROP TABLE IF EXISTS Reviews;
DROP TABLE IF EXISTS Teachers;
DROP TABLE IF EXISTS Users;
