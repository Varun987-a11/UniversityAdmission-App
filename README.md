🎓 University Enrollment Application System

🌟 Project Overview

This project implements a secure, functional web application designed to demonstrate the full stack process: collecting user data via a responsive form and persisting that data into a relational database. It serves as a comprehensive example of building a basic, production-ready application pipeline.

💻 Technology Stack

Component

Technology

Rationale

Frontend

HTML5, CSS3 (Tailwind utility classes)

Clean, responsive UI design optimized for modern browsers.

Server-Side

PHP (Procedural)

Efficient handling of HTTP POST requests and server-side processing.

Database

MySQL

Robust, reliable, and widely-used relational database management.

Driver

mysqli

Modern PHP extension for secure and efficient database interaction.

✨ Key Features & Security Highlights

Responsive Frontend: A user-friendly, dynamic form (university_enrollment.html) built with basic HTML/CSS, ensuring optimal display on mobile, tablet, and desktop devices.

Secure Data Handling: The backend script (submit.php) utilizes Prepared Statements (mysqli::prepare()) to strictly separate SQL commands from user input, providing robust defense against SQL Injection Attacks.

Live Deployment Proof: The application is hosted on an external server (InfinityFree), proving successful deployment and real-world database connectivity outside of a local environment (e.g., XAMPP).

Credential Separation: The repository uses placeholder credentials in submit.php to maintain security best practices, preventing public exposure of live database passwords.

🌐 Deployment Status

The application is LIVE and currently accepting mock submissions.

Live URL: 

$$Insert Your Live InfinityFree URL Here: http://varunkumars.infinityfreeapp.com/

Status: ✅ Fully functional (HTML → PHP → MySQL)


🛠️ Local Setup Guide

To run this project on a local server (like XAMPP or MAMP), follow these steps:

1. Database Creation

You must create a database named university_db and define the necessary table structure for the application.

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


2. Update Credentials in submit.php

Before running locally, ensure you update the placeholders in the submit.php file with your local environment's credentials (e.g., localhost, root, empty password).

// Example for XAMPP
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "university_db"; 
