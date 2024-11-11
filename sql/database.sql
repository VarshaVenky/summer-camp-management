-- Create database
CREATE DATABASE IF NOT EXISTS summer_camp_management;
USE summer_camp_management;

-- Create campers table
CREATE TABLE campers (
    enroll_id INT AUTO_INCREMENT PRIMARY KEY,
    camper_name VARCHAR(50) NOT NULL,
    camper_age INT NOT NULL,
    camper_gender ENUM('Male', 'Female', 'Other') NOT NULL,
    camper_address VARCHAR(100),
    activity_id INT,
    FOREIGN KEY (activity_id) REFERENCES activities(activity_id) ON DELETE SET NULL
);

-- Create staff table
CREATE TABLE staff (
    staff_id INT AUTO_INCREMENT PRIMARY KEY,
    staff_name VARCHAR(50) NOT NULL,
    staff_gender ENUM('Male', 'Female', 'Other') NOT NULL,
    staff_number VARCHAR(15) NOT NULL,
    staff_salary DECIMAL(10, 2) NOT NULL
);

-- Create activities table
CREATE TABLE activities (
    activity_id INT AUTO_INCREMENT PRIMARY KEY,
    activity_name VARCHAR(50) NOT NULL,
    activity_duration VARCHAR(20),
    activity_batch VARCHAR(20)
);

-- Create fees table
CREATE TABLE fees (
    fees_id INT AUTO_INCREMENT PRIMARY KEY,
    activity_id INT,
    activity_fees DECIMAL(10, 2) NOT NULL,
    payment_mode ENUM('Cash', 'Card', 'Online') NOT NULL,
    installment_1 DECIMAL(10, 2),
    installment_2 DECIMAL(10, 2),
    FOREIGN KEY (activity_id) REFERENCES activities(activity_id) ON DELETE CASCADE
);

-- Create parents table
CREATE TABLE parents (
    parent_id INT AUTO_INCREMENT PRIMARY KEY,
    enroll_id INT,
    parent_name VARCHAR(50) NOT NULL,
    parent_relation VARCHAR(20),
    parent_number VARCHAR(15) NOT NULL,
    FOREIGN KEY (enroll_id) REFERENCES campers(enroll_id) ON DELETE CASCADE
);

-- Insert sample data into activities table
INSERT INTO activities (activity_name, activity_duration, activity_batch) VALUES
('Archery', '2 hours', 'Morning'),
('Swimming', '1 hour', 'Afternoon'),
('Arts and Crafts', '1.5 hours', 'Morning');

-- Insert sample data into campers table
INSERT INTO campers (camper_name, camper_age, camper_gender, camper_address, activity_id) VALUES
('Alice Johnson', 12, 'Female', '123 Main St', 1),
('Bob Smith', 14, 'Male', '456 Elm St', 2);

-- Insert sample data into staff table
INSERT INTO staff (staff_name, staff_gender, staff_number, staff_salary) VALUES
('John Doe', 'Male', '555-1234', 3000.00),
('Jane Roe', 'Female', '555-5678', 3200.00);

-- Insert sample data into fees table
INSERT INTO fees (activity_id, activity_fees, payment_mode, installment_1, installment_2) VALUES
(1, 100.00, 'Cash', 50.00, 50.00),
(2, 150.00, 'Card', 75.00, 75.00);

-- Insert sample data into parents table
INSERT INTO parents (enroll_id, parent_name, parent_relation, parent_number) VALUES
(1, 'Michael Johnson', 'Father', '555-6789'),
(2, 'Susan Smith', 'Mother', '555-4321');
