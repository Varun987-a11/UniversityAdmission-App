University Admission Application Form (PHP/MySQL)

This is a simple web application designed to demonstrate the submission of form data from an HTML frontend to a MySQL database backend using PHP.

Key Features

Frontend: Responsive HTML/CSS form.

Backend Logic: PHP script (submit.php) handles data collection.

Database: Uses the mysqli extension for database connection and data storage.

Security: Implements Prepared Statements to prevent SQL Injection attacks.

Deployment Status

The live, deployed version of this application can be found here:
"http://varunkumars.infinityfreeapp.com/"


Database Setup

To run this project locally, you must first create a database named university_db and a table named applications.

SQL Schema for the applications table:

CREATE TABLE applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    degree VARCHAR(100) NOT NULL,
    branch VARCHAR(100) NOT NULL,
    fullname VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    gender VARCHAR(10),
    address TEXT,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
