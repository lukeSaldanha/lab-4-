<?php
/**
 * Acceptable Use Policy Page
 * This page outlines the terms and guidelines for acceptable use of the platform.
 * Users are required to adhere to these policies to ensure a safe and respectful environment.
 *
 * PHP version 7.1
 *
 * @author Luke Saldaha
 * @date 2024-12-10
 * @title Lab 4
 */

// Include the database connection file (if needed for tracking)
include 'includes/db_connection.php';  // Use the correct path to the file if needed
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata for the Acceptable Use Policy Page -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Learn about the terms and guidelines for acceptable use of our platform.">
    <title>Acceptable Use Policy</title>
    <!-- Add stylesheets or scripts here if needed -->
</head>
<body>
<!-- Include the header -->
<?php require 'includes/header.php'; ?>

<!-- Main Content Area -->
<main class="container">
    <!-- Page Title -->
    <h1>Acceptable Use Policy</h1>

    <!-- Policy Statement -->
    <p>
        This policy outlines the guidelines for using our platform. Users must ensure their activities are
        in compliance with our terms to maintain a safe and respectful environment.
    </p>

    <p>
        Prohibited activities include, but are not limited to:
    </p>
    <ul>
        <li>Engaging in unlawful or harmful activities.</li>
        <li>Harassing or threatening other users.</li>
        <li>Posting inappropriate or offensive content.</li>
        <li>Attempting to gain unauthorized access to the platform.</li>
    </ul>

    <p>
        Violation of these policies may result in account suspension or termination. For detailed information,
        please <a href="contact.php">contact us</a>.
    </p>
</main>

<!-- Include the footer -->
<?php require 'includes/footer.php'; ?>
</body>
</html>
