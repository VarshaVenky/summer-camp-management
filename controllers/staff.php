<?php
// Include the database connection
include('../config/db.php');

// Function to add a new staff member
function addStaff($name, $gender, $number, $salary) {
    global $conn;
    $sql = "INSERT INTO staff (staff_name, staff_gender, staff_number, staff_salary) VALUES (:name, :gender, :number, :salary)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':number', $number);
    $stmt->bindParam(':salary', $salary);
    return $stmt->execute();
}

// Function to get all staff members
function getStaff() {
    global $conn;
    $sql = "SELECT * FROM staff";
    $stmt = $conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to get a specific staff member by staff_id
function getStaffById($id) {
    global $conn;
    $sql = "SELECT * FROM staff WHERE staff_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Function to update staff member information
function updateStaff($id, $name, $gender, $number, $salary) {
    global $conn;
    $sql = "UPDATE staff SET staff_name = :name, staff_gender = :gender, staff_number = :number, staff_salary = :salary WHERE staff_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':number', $number);
    $stmt->bindParam(':salary', $salary);
    return $stmt->execute();
}

// Function to delete a staff member by staff_id
function deleteStaff($id) {
    global $conn;
    $sql = "DELETE FROM staff WHERE staff_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

// Handling form submissions or API requests
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action == 'add') {
            // Add a new staff member
            $result = addStaff($_POST['name'], $_POST['gender'], $_POST['number'], $_POST['salary']);
            echo $result ? "Staff member added successfully." : "Failed to add staff member.";

        } elseif ($action == 'update') {
            // Update staff member information
            $result = updateStaff($_POST['id'], $_POST['name'], $_POST['gender'], $_POST['number'], $_POST['salary']);
            echo $result ? "Staff member updated successfully." : "Failed to update staff member.";

        } elseif ($action == 'delete') {
            // Delete a staff member
            $result = deleteStaff($_POST['id']);
            echo $result ? "Staff member deleted successfully." : "Failed to delete staff member.";
        }
    }
}

// Fetch all staff members (for testing or standalone page)
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $staff = getStaff();
    foreach ($staff as $member) {
        echo "Name: " . $member['staff_name'] . " - Gender: " . $member['staff_gender'] . "<br>";
    }
}
?>
