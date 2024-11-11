<?php
// Include the database connection
include('../config/db.php');

// Function to add a new activity
function addActivity($name, $duration, $batch) {
    global $conn;
    $sql = "INSERT INTO activities (activity_name, activity_duration, activity_batch) VALUES (:name, :duration, :batch)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':duration', $duration);
    $stmt->bindParam(':batch', $batch);
    return $stmt->execute();
}

// Function to get all activities
function getActivities() {
    global $conn;
    $sql = "SELECT * FROM activities";
    $stmt = $conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to get a specific activity by activity_id
function getActivityById($id) {
    global $conn;
    $sql = "SELECT * FROM activities WHERE activity_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Function to update activity information
function updateActivity($id, $name, $duration, $batch) {
    global $conn;
    $sql = "UPDATE activities SET activity_name = :name, activity_duration = :duration, activity_batch = :batch WHERE activity_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':duration', $duration);
    $stmt->bindParam(':batch', $batch);
    return $stmt->execute();
}

// Function to delete an activity by activity_id
function deleteActivity($id) {
    global $conn;
    $sql = "DELETE FROM activities WHERE activity_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

// Handling form submissions or API requests
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action == 'add') {
            // Add a new activity
            $result = addActivity($_POST['name'], $_POST['duration'], $_POST['batch']);
            echo $result ? "Activity added successfully." : "Failed to add activity.";

        } elseif ($action == 'update') {
            // Update activity information
            $result = updateActivity($_POST['id'], $_POST['name'], $_POST['duration'], $_POST['batch']);
            echo $result ? "Activity updated successfully." : "Failed to update activity.";

        } elseif ($action == 'delete') {
            // Delete an activity
            $result = deleteActivity($_POST['id']);
            echo $result ? "Activity deleted successfully." : "Failed to delete activity.";
        }
    }
}

// Fetch all activities (for testing or standalone page)
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $activities = getActivities();
    foreach ($activities as $activity) {
        echo "Name: " . $activity['activity_name'] . " - Duration: " . $activity['activity_duration'] . " - Batch: " . $activity['activity_batch'] . "<br>";
    }
}
?>
