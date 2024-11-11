Summer Camp Management System

Table of Contents
Overview
Features
Technologies Used
Database Structure
Setup and Installation
Usage
Screenshots
Future Enhancements
Contributors
License
Overview
The Summer Camp Management System is a web-based application designed to streamline the operations of a summer camp. The system allows camp administrators to manage campers, staff, activities, and fees easily and efficiently. This project replaces traditional manual record-keeping with a structured database system and user-friendly interface, accessible to both staff and administrators.

Features
User Management: Register and authenticate campers, staff, and administrators.
Campers Management: Admins can add, view, edit, and delete camper records.
Staff Management: Manage staff details, including roles and salaries.
Activities Management: Create and assign camp activities for campers.
Fees Management: Manage fee records, including payment mode and installments.
Admin Dashboard: An interface for administrators to manage camp operations and access important data.
Technologies Used
Frontend: HTML, CSS, JavaScript
Backend: PHP
Database: MySQL
Server: Apache (via XAMPP or WAMP for local development)
Database Structure
The database includes the following tables:

users: Stores user credentials and roles.
campers: Holds camper information such as name, age, gender, and assigned activities.
staff: Contains staff information including salary and contact details.
activities: Lists available camp activities with details.
fees: Manages fee records with details like payment mode and installments.
parents: Stores contact details of parents/guardians associated with campers.
Refer to sql/database.sql for the full schema and sample data.

Setup and Installation
Prerequisites
XAMPP/WAMP: A local Apache server with PHP and MySQL.
MySQL: For database management.
Installation Steps
Clone the Repository:

bash
Copy code
git clone https://github.com/yourusername/summer-camp-management.git
Database Setup:

Create a new MySQL database named summer_camp_management.
Import the SQL file provided (sql/database.sql) into your database.
Configure Database Connection:

Edit config/db.php and update the database connection details:
php
Copy code
$host = "localhost";
$db_name = "summer_camp_management";
$username = "root"; // MySQL username
$password = "";      // MySQL password
Run the Application:

Place the project folder in your server’s root directory (htdocs for XAMPP).
Open your browser and navigate to http://localhost/summer-camp-management/views/home.php.
Usage
Home Page:

Access the homepage at http://localhost/summer-camp-management/views/home.php.
User Registration:

Campers, staff, and administrators can register by navigating to the Register page.
Login:

Users log in via login.php to access their respective dashboards.
Admin Dashboard:

Administrators can manage campers, staff, activities, and fees through the Admin Dashboard.
Screenshots
Home Page
![Home Page](https://github.com/VarshaVenky/summer-camp-management/blob/master/assets/images/Homepage.png)

Admin Dashboard
![Admin Dashboard](https://github.com/VarshaVenky/summer-camp-management/blob/master/assets/images/Adminhomepage.png)
Camper Management
![Camper Management](https://github.com/VarshaVenky/summer-camp-management/blob/master/assets/images/Camperenrollment.png)
Future Enhancements
Attendance Tracking: Add a system to track camper attendance daily.
Payment Integration: Integrate online payment systems for fee management.
Reporting System: Generate and export reports for administrative use.
Contributors
Varsha V. - varshavenkatesh3798@gmail.com
License
This project is licensed under the MIT License - see the LICENSE file for details.

