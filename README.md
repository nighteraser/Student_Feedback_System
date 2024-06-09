# Student Feedback System

## Motivation

The Student Feedback System is an automatic feedback generation system that provides the proper feedback to the teachers and the courses as per the categories like always, poor, usually, very often, sometimes. In the existing system, students can give feedback about the lecturers by doing manually.

The purpose of feedback in the assessment and learning process is to improve a student's performance. Students often use these portals to pick courses and create timetables.  It is essential that the process of providing feedback is a positive, or at least a neutral, learning experience for the student. We referenced some of the existing websites, such as “ratemyprofessor.com”.

## Functions

- Feedback Management
	- **Submit Feedback**: Allows students to provide feedback on courses they have taken.
		- **Rating**: A numerical or star rating system to rate the course.
		- **Comment**: A text field for detailed feedback and suggestions.
	- **View Feedback**: Allows users to view all feedback for a specific course.
	- **Edit Feedback**: Permits users to modify their previously submitted feedback.
	- **Delete Feedback**: Allows users to remove their feedback if necessary.

## How to run? (Linux)

1. download it
``` sh
git clone https://github.com/nighteraser/Student_Feedback_System.git
```
2. move to Student_Feedback_System
``` sh
cd Student_Feedback_System folder
```
3. give permission 
``` sh
sudo chmod +x *.sh
```
4. install apache2 mariadb-server php
``` sh
sudo ./setup_env.sh
```
5. load database
``` sh
sudo ./load_db.sh
```
6. move folder to apache workplace
``` sh
sudo ./mv2apache.sh
```
7. open your browser

## Categorization

- database 4111850257
- front-end 411850141 411855678 
- back-end 411850257
- installation manual 411850257
