CREATE DATABASE IF NOT EXISTS mydb;
USE mydb;

CREATE TABLE IF NOT EXISTS Professor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    professorName VARCHAR(100) NOT NULL,
    department VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS Course (
    id INT AUTO_INCREMENT PRIMARY KEY,
    courseName VARCHAR(100) NOT NULL,
    professorid INT NOT NULL,
    FOREIGN KEY (professorid) REFERENCES Professor(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS Student (
    id INT AUTO_INCREMENT PRIMARY KEY,
    studentName VARCHAR(100) NOT NULL UNIQUE,
    passwd VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Review (
    id INT AUTO_INCREMENT PRIMARY KEY,
    studentid INT NOT NULL,
    professorid INT NOT NULL,
    courseid INT NOT NULL,
    rTimestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
    comment TEXT,
    rate INT NOT NULL CHECK (rate >= 1 AND rate <= 5),
    difficulty INT NOT NULL CHECK (difficulty >= 1 AND difficulty <= 5),
    takeAgain BOOLEAN NOT NULL,
    textbook BOOLEAN NOT NULL,
    attendence BOOLEAN NOT NULL,
    grade CHAR(1) CHECK (grade IN ('A', 'B', 'C', 'D', 'E', 'F')),
    FOREIGN KEY (studentid) REFERENCES Student(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (professorid) REFERENCES Professor(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (courseid) REFERENCES Course(id) ON DELETE CASCADE ON UPDATE CASCADE,
    UNIQUE(studentid, professorid, courseid)
);

-- Add indexes to improve query performance
CREATE INDEX IF NOT EXISTS idx_professor_department ON professor(department);
CREATE INDEX IF NOT EXISTS idx_course_professorid ON course(professorid);
CREATE INDEX IF NOT EXISTS idx_review_studentid ON review(studentid);
CREATE INDEX IF NOT EXISTS idx_review_professorid ON review(professorid);
CREATE INDEX IF NOT EXISTS idx_review_courseid ON review(courseid);

-- Insert sample data into Professor
INSERT INTO Professor (professorName, department) VALUES
('John Smith', 'Computer Science'),
('Jane Doe', 'Mathematics'),
('Alice Johnson', 'Physics'),
('Bob Brown', 'Chemistry'),
('Carol White', 'Biology'),
('David Green', 'Economics'),
('Eve Black', 'Psychology'),
('Frank Blue', 'Sociology'),
('Grace Pink', 'History'),
('Hank Grey', 'Philosophy');

-- Insert sample data into Course
INSERT INTO Course (courseName, professorid) VALUES
('Introduction to Programming', 1),
('Calculus I', 2),
('Classical Mechanics', 3),
('Organic Chemistry', 4),
('Genetics', 5),
('Microeconomics', 6),
('Cognitive Psychology', 7),
('Social Theory', 8),
('World History', 9),
('Ethics', 10);

-- Insert sample data into Student
INSERT INTO Student (studentName, passwd) VALUES
('Student One', 'password1'),
('Student Two', 'password2'),
('Student Three', 'password3'),
('Student Four', 'password4'),
('Student Five', 'password5'),
('Student Six', 'password6'),
('Student Seven', 'password7'),
('Student Eight', 'password8'),
('Student Nine', 'password9'),
('Student Ten', 'password10');

-- Insert sample data into Review
INSERT INTO Review (studentid, professorid, courseid, comment, rate, difficulty, takeAgain, textbook, attendence, grade) VALUES
(1, 1, 1, 'Great course!', 5, 3, TRUE, TRUE, TRUE, 'A'),
(2, 2, 2, 'Challenging but rewarding.', 4, 4, FALSE, TRUE, FALSE, 'B'),
(3, 3, 3, 'Difficult material.', 3, 5, FALSE, FALSE, TRUE, 'C'),
(4, 4, 4, 'Interesting subject.', 4, 3, TRUE, TRUE, TRUE, 'A'),
(5, 5, 5, 'Well taught.', 5, 2, TRUE, FALSE, FALSE, 'B'),
(6, 6, 6, 'Good professor.', 4, 3, FALSE, TRUE, TRUE, 'A'),
(7, 7, 7, 'Too hard.', 2, 5, FALSE, FALSE, FALSE, 'D'),
(8, 8, 8, 'Loved it.', 5, 2, TRUE, TRUE, TRUE, 'A'),
(9, 9, 9, 'Boring.', 2, 4, FALSE, FALSE, TRUE, 'C'),
(10, 10, 10, 'Very informative.', 4, 3, TRUE, TRUE, TRUE, 'B');
