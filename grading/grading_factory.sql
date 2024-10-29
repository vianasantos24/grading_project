CREATE DATABASE grade_factory;

USE grade_factory;

-- Students table
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

-- Grades table
CREATE TABLE grades (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(255) NOT NULL,
    final_grade INT(3) NOT NULL
);