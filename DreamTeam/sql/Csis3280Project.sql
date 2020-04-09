-- Lab07 Solution
-- DROP the database if it exists
DROP DATABASE IF EXISTS Csis3280Project;
-- CREATE THE DATABASE
CREATE DATABASE Csis3280Project;

-- SHOW DATABASES;

-- Use the database
USE Csis3280Project;
DROP TABLE IF EXISTS Course;
-- Create the Employee Table (pick your own Entities for the next part)
CREATE TABLE Course (
    CourseID INT PRIMARY KEY AUTO_INCREMENT,
    CourseShortName TINYTEXT NOT NULL,
    CourseLongName TINYTEXT NOT NULL

);



DROP TABLE IF EXISTS Instructor;
CREATE TABLE Instructor (
    InstructorID INT PRIMARY KEY AUTO_INCREMENT,
    CourseID INT NOT NULL,
    FirstName TINYTEXT NOT NULL,
    LastName TINYTEXT NOT NULL,
    Email VARCHAR(50) NOT NULL,
    
 CONSTRAINT FOREIGN KEY (CourseID) REFERENCES Course(CourseID) ON UPDATE CASCADE
    ON DELETE CASCADE
    

);
DROP TABLE IF EXISTS Instructor_Course;
-- Create the Department_RSi_92039 Table
CREATE TABLE Instructor_Course(
    InstructorID INT NOT NULL,
    CourseID INT NOT NULL,
    
    CONSTRAINT FOREIGN KEY (CourseID) REFERENCES Course(CourseID) ON UPDATE CASCADE
    ON DELETE CASCADE,
     CONSTRAINT FOREIGN KEY (InstructorID) REFERENCES Instructor(InstructorID) ON UPDATE CASCADE
    ON DELETE CASCADE

   
);

DROP TABLE IF EXISTS Rating;
-- Create the Department_RSi_92039 Table
CREATE TABLE Rating(
    RatingID INT PRIMARY KEY AUTO_INCREMENT,
    InstructorID INT NOT NULL,
    Rating INT NOT NULL,
    Review VARCHAR(255),

    CONSTRAINT FOREIGN KEY (InstructorID) REFERENCES Instructor(InstructorID) ON UPDATE CASCADE
    ON DELETE CASCADE

   
);
-- Create the Department_RSi_92039 Table
DROP TABLE IF EXISTS Student;
CREATE TABLE Student(
    StudentID INT PRIMARY KEY AUTO_INCREMENT,
    FirstName TINYTEXT NOT NULL,
    LastName TINYTEXT NOT NULL,
    Email VARCHAR(50) NOT NULL,
    Username VARCHAR(25) NOT NULL,
    Password VARCHAR(255) NOT NULL


   
);


SHOW TABLES;


-- INSERT Course
INSERT INTO Course (CourseShortName,CourseLongName)
VALUES ('CSIS 3280 ','Web Scripting'),
('CSIS 1175 ','Visual C#'),
('CSIS 2200 ','Database 1');

INSERT INTO Instructor(CourseID,FirstName,LastName,Email)
VALUES ('1','Rahim','Virani','rahimvirani@douglascollege.ca'),
('3','Michael','Hrybyk','michealhrybyk@douglascollege.ca');

INSERT INTO Instructor_Course (InstructorID,CourseID)
VALUES ('1','3'),
 ('2','3'),
 ('1','2');

INSERT INTO Rating(InstructorID,Rating,Review)
VALUES ('1','5','awesome'),
('2','5','great');

INSERT INTO Student(FirstName,LastName,Email,Username,Password)
VALUES ('sam','hill','samhill@douglascollege.ca','sam_hill','test'),
('johnie','walker','johniewalkerk@douglascollege.ca','johnie_walker','default');


