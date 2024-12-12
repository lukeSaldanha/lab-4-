<?php
/**
 * Home Page - Student Portal
 *
 * PHP version 7.1
 *
 * @author Luke Saldaha
 * @date 2024-12-10
 * @title Lab 4
 */

// Declare page-specific variables
$title = "Welcome to the Student Portal";
$file = "index.php";
$description = "Home page for the Student Portal, providing a welcoming design and navigation links to log in or register.";
$date = "2024-12-10";
$banner = "Student Portal";

// Include the header for the website layout and navigation
require 'includes/header.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $description; ?>">
    <title><?php echo $title; ?></title>

    <!-- Inline CSS for Styling -->
    <style>
        /* Body Styling - Background and Font */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #4facfe, #00f2fe); /* Gradient background for a vibrant look */
            color: #333;
        }

        /* Main Container Styling */
        main.container {
            text-align: center;
            padding: 50px;
            background: #ffffff;
            margin: 50px auto;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }

        /* Heading Style */
        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #0066cc;
        }

        /* Paragraph Text Style */
        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        /* Link Buttons Styling */
        a {
            text-decoration: none;
            color: white;
            background-color: #0066cc;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 10px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        /* Hover Effect for Links */
        a:hover {
            background-color: #004a99;
        }
    </style>
</head>
<body>
<!-- Main Content Area -->
<main class="container">
    <!-- Welcome Message -->
    <h1><?php echo $banner; ?></h1>
    <p>
        This portal is your gateway to managing grades, assignments, and more.
        Please <a href="login.php">Log In</a> or <a href="register.php">Register</a> to get started.
    </p>
</main>

<!-- Include the footer for consistent layout -->
<?php require 'includes/footer.php'; ?>
</body>
</html>
