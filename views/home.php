<?php
// Include the database connection (if needed for dynamic content)
include('../config/db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summer Camp Management System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1>Welcome to the Summer Camp Management System</h1>
        <p>Your one-stop solution for managing campers, activities, and more!</p>
    </header>

    <!-- Navigation Menu -->
    <nav>
        <a href="register.php" class="btn">Register</a>
        <a href="login.php" class="btn">Login</a>
        <a href="admin.php" class="btn">Admin Panel</a>
    </nav>

    <!-- Main Content Section -->
    <main>
        <section class="intro">
            <h2>About Our Summer Camp</h2>
            <p>Our summer camp offers a wide range of activities designed to foster creativity, teamwork, and personal growth. Whether it's archery, swimming, or arts and crafts, we have something for everyone!</p>
        </section>

        <section class="activities">
            <h2>Camp Activities</h2>
            <p>Here are some of the exciting activities we offer:</p>
            <ul>
                <li>Archery - Learn the art of precision and focus.</li>
                <li>Swimming - Cool off and improve your swimming skills.</li>
                <li>Arts and Crafts - Unleash your creativity with various art projects.</li>
            </ul>
            <p>Check out our full list of activities and join the fun!</p>
        </section>
    </main>

    <!-- Footer Section -->
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Summer Camp Management System. All rights reserved.</p>
    </footer>
</body>
</html>
