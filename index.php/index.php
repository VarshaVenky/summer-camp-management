<?php
// Start the session
session_start();

// Check if a user is already logged in and redirect based on role
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        header('Location: views/admin.php');
        exit;
    } elseif ($_SESSION['role'] == 'staff') {
        header('Location: views/staff_dashboard.php');
        exit;
    } else {
        header('Location: views/camper_dashboard.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Summer Camp Management System</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1>Welcome to the Summer Camp Management System</h1>
        <p>Manage campers, staff, activities, and fees all in one place!</p>
    </header>

    <!-- Navigation Links -->
    <nav>
        <a href="views/register.php" class="btn">Register</a>
        <a href="views/login.php" class="btn">Login</a>
        <a href="views/admin.php" class="btn">Admin Dashboard</a>
    </nav>

    <!-- Introduction Section -->
    <main>
        <section class="intro">
            <h2>About Our System</h2>
            <p>Our Summer Camp Management System is designed to simplify camp operations. Whether you’re a camper, staff member, or admin, you’ll find everything you need to manage camp activities, track fees, and keep records up-to-date.</p>
        </section>

        <!-- Features Section -->
        <section class="features">
            <h2>Key Features</h2>
            <ul>
                <li>Register campers and assign them to activities.</li>
                <li>Manage staff roles, schedules, and salaries.</li>
                <li>Organize camp activities and track participation.</li>
                <li>Efficiently handle camp fees with payment tracking.</li>
            </ul>
        </section>
    </main>

    <!-- Footer Section -->
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Summer Camp Management System. All rights reserved.</p>
    </footer>
</body>
</html>
