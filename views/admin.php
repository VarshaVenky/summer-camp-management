<?php
// Start the session
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // If not an admin, redirect to login page
    header('Location: login.php');
    exit;
}

// Include the database connection
include('../config/db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Summer Camp Management System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1>Admin Dashboard</h1>
        <p>Welcome, <?php echo $_SESSION['username']; ?>! Use the dashboard to manage the camp.</p>
        <nav>
            <a href="logout.php" class="btn">Logout</a>
        </nav>
    </header>

    <!-- Main Admin Dashboard Section -->
    <main>
        <section class="admin-options">
            <h2>Manage Camp Operations</h2>
            <div class="options">
                <div class="option">
                    <h3>Manage Campers</h3>
                    <p>Add, view, update, or delete camper records.</p>
                    <a href="manage_campers.php" class="btn">Manage Campers</a>
                </div>

                <div class="option">
                    <h3>Manage Staff</h3>
                    <p>Add, view, update, or delete staff records.</p>
                    <a href="manage_staff.php" class="btn">Manage Staff</a>
                </div>

                <div class="option">
                    <h3>Manage Activities</h3>
                    <p>Add, view, update, or delete activity records.</p>
                    <a href="manage_activities.php" class="btn">Manage Activities</a>
                </div>

                <div class="option">
                    <h3>Manage Fees</h3>
                    <p>Add, view, update, or delete fee records.</p>
                    <a href="manage_fees.php" class="btn">Manage Fees</a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer Section -->
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Summer Camp Management System. All rights reserved.</p>
    </footer>
</body>
</html>
