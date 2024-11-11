<?php
// Include the database connection
include('../config/db.php');

// Function to add a new fee entry
function addFee($activity_id, $activity_fees, $payment_mode, $installment_1, $installment_2) {
    global $conn;
    $sql = "INSERT INTO fees (activity_id, activity_fees, payment_mode, installment_1, installment_2) 
            VALUES (:activity_id, :activity_fees, :payment_mode, :installment_1, :installment_2)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':activity_id', $activity_id);
    $stmt->bindParam(':activity_fees', $activity_fees);
    $stmt->bindParam(':payment_mode', $payment_mode);
    $stmt->bindParam(':installment_1', $installment_1);
    $stmt->bindParam(':installment_2', $installment_2);
    return $stmt->execute();
}

// Function to get all fees entries
function getFees() {
    global $conn;
    $sql = "SELECT * FROM fees";
    $stmt = $conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to get a specific fee entry by fees_id
function getFeeById($id) {
    global $conn;
    $sql = "SELECT * FROM fees WHERE fees_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Function to update fee entry information
function updateFee($id, $activity_id, $activity_fees, $payment_mode, $installment_1, $installment_2) {
    global $conn;
    $sql = "UPDATE fees SET activity_id = :activity_id, activity_fees = :activity_fees, 
            payment_mode = :payment_mode, installment_1 = :installment_1, installment_2 = :installment_2 
            WHERE fees_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':activity_id', $activity_id);
    $stmt->bindParam(':activity_fees', $activity_fees);
    $stmt->bindParam(':payment_mode', $payment_mode);
    $stmt->bindParam(':installment_1', $installment_1);
    $stmt->bindParam(':installment_2', $installment_2);
    return $stmt->execute();
}

// Function to delete a fee entry by fees_id
function deleteFee($id) {
    global $conn;
    $sql = "DELETE FROM fees WHERE fees_id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}

// Handling form submissions or API requests
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        if ($action == 'add') {
            // Add a new fee entry
            $result = addFee($_POST['activity_id'], $_POST['activity_fees'], $_POST['payment_mode'], $_POST['installment_1'], $_POST['installment_2']);
            echo $result ? "Fee entry added successfully." : "Failed to add fee entry.";

        } elseif ($action == 'update') {
            // Update fee entry information
            $result = updateFee($_POST['id'], $_POST['activity_id'], $_POST['activity_fees'], $_POST['payment_mode'], $_POST['installment_1'], $_POST['installment_2']);
            echo $result ? "Fee entry updated successfully." : "Failed to update fee entry.";

        } elseif ($action == 'delete') {
            // Delete a fee entry
            $result = deleteFee($_POST['id']);
            echo $result ? "Fee entry deleted successfully." : "Failed to delete fee entry.";
        }
    }
}

// Fetch all fees entries (for testing or standalone page)
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $fees = getFees();
    foreach ($fees as $fee) {
        echo "Activity ID: " . $fee['activity_id'] . " - Fees: $" . $fee['activity_fees'] . " - Payment Mode: " . $fee['payment_mode'] . "<br>";
    }
}
?>
