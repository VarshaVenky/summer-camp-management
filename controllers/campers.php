<?php
// Include the database connection
include('../config/db.php');

// Function to add a new camper
function addCamper($name, $age, $gender, $address) {
    global $conn;
    $sql = "INSERT INTO campers (camper_name, camper_age, camper_gender, camper_address) VALUES (:name, :age, :gender, :address)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':address', $address);
    return $stmt->execute();
}

// Function to get all campers
function getCampers() {
    global $conn;
    $sql = "SELECT * FROM campers";
    $stmt = $conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to get a specific camper by enroll_id
function getCamperById($id) {
    global $conn;
    $sql = "SELECT * FROM campers WHERE enroll_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Function to update camper information
function updateCamper($id, $name, $age, $gender, $address) {
    global $conn;
    $sql = "UPDATE campers SET camper_name = :name, camper_age = :age, camper_gender = :gender, camper_address = :address WHERE enroll_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':address', $address);
    return $stmt->execute();
}

// Function to delete a camper by enroll_id
function deleteCamper($id) {
    global $conn;
    $sql = "DELETE FROM campers WHERE enroll_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

// Handling form submissions or API requests
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action == 'add') {
            // Add a new camper
            $result = addCamper($_POST['name'], $_POST['age'], $_POST['gender'], $_POST['address']);
            echo $result ? "Camper added successfully." : "Failed to add camper.";

        } elseif ($action == 'update') {
            // Update camper information
            $result = updateCamper($_POST['id'], $_POST['name'], $_POST['age'], $_POST['gender'], $_POST['address']);
            echo $result ? "Camper updated successfully." : "Failed to update camper.";

        } elseif ($action == 'delete') {
            // Delete a camper
            $result = deleteCamper($_POST['id']);
            echo $result ? "Camper deleted successfully." : "Failed to delete camper.";
        }
    }
}

// Fetch campers (for testing or standalone page)
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $campers = getCampers();
    foreach ($campers as $camper) {
        echo "Name: " . $camper['camper_name'] . " - Age: " . $camper['camper_age'] . "<br>";
    }
}
?>
