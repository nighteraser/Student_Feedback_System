# Student Feedback System

## Motivation

The Student Feedback System is an automatic feedback generation system that provides the proper feedback to the teachers and the courses as per the categories like always, poor, usually, very often, sometimes. In the existing system, students can give feedback about the lecturers by doing manually.

The purpose of feedback in the assessment and learning process is to improve a student's performance. Students often use these portals to pick courses and create timetables.  It is essential that the process of providing feedback is a positive, or at least a neutral, learning experience for the student. 

## Functions

- Feedback Management
	- **Submit Feedback**: Allows students to provide feedback on courses they have taken.
		- **Rating**: A numerical or star rating system to rate the course.
		- **Comment**: A text field for detailed feedback and suggestions.
		- **Difficulty**: An indicator of how challenging the course was.
		- **Take again**: Whether the student would take the course again.
		- **Textbook**: Whether a textbook was used in the course.
		- **Attendence**: Whether attendance was required or important.
		- **Grade**: The grade the student received in the course.
	- **View Feedback**: Allows users to view all feedback for a specific course.
- Authentication
	- **Login**: Allows users to log in to the system.
	- **Logout**: Allows users to log out of the system.
	- **Register**: Allows new users to create an account.


## How to run? (Linux)

1. Download the code
``` sh
git clone https://github.com/nighteraser/Student_Feedback_System.git
```
2. Move to the Student_Feedback_System directory
``` sh
cd Student_Feedback_System 
```
3. Give execution permission to shell scripts
``` sh
sudo chmod +x *.sh
```
4. Install Apache2, MariaDB server, and PHP
``` sh
sudo ./setup_env.sh
```
5. Load the database
``` sh
sudo ./load_db.sh
```
6. Move the folder to the Apache workspace
``` sh
sudo ./mv2apache.sh
```
7. Open your browser and navigate to the application

## Categorization

- database 4111850257
- front-end 411850141 411855678 
- back-end 411850257
- installation manual 411850257
