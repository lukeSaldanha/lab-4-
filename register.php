<?php
/**
 * User Registration Page
 *
 * This page allows new users to register by creating an account and adding their
 * details to both the users and students tables in the database.
 *
 * PHP version 7.1
 *
 * @author Luke Saldanha
 * @date 2024-12-10
 * @title User Registration
 */

// Include the database connection file
include 'includes/db_connection.php';  // Include the DB connection

// Start the session to store messages
session_start();

// Function to register a new user
function registerUser($email, $firstName, $lastName, $password, $program) {
    global $conn;

    // Hash the password using bcrypt
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // SQL query to insert the user into the users table
    $sql = "INSERT INTO users (email, first_name, last_name, password_hash, enrol_date, last_access)
            VALUES ($1, $2, $3, $4, NOW(), NOW()) RETURNING user_id";
    $result = pg_query_params($conn, $sql, array($email, $firstName, $lastName, $passwordHash));

    if (!$result) {
        die("Error in query execution: " . pg_last_error());
    }

    // Fetch the user ID of the newly inserted user
    $user = pg_fetch_assoc($result);
    $userId = $user['user_id'];

    // Insert the user into the students table
    $sql = "INSERT INTO students (user_id, program) VALUES ($1, $2)";
    pg_query_params($conn, $sql, array($userId, $program));

    return $userId;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $firstName = trim($_POST['first_name']);
    $lastName = trim($_POST['last_name']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);
    $program = $_POST['program'];

    // Validate the input data
    $errorMessage = "";

    // Ensure required fields are filled
    if (empty($email) || empty($firstName) || empty($lastName) || empty($password) || empty($confirmPassword) || empty($program)) {
        $errorMessage = "All fields are required.";
    } elseif ($password !== $confirmPassword) {
        $errorMessage = "Passwords do not match.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = "Invalid email format.";
    } elseif (strlen($password) < 6) {
        $errorMessage = "Password must be at least 6 characters long.";
    }

    if (empty($errorMessage)) {
        // Register the user if no validation errors
        $userId = registerUser($email, $firstName, $lastName, $password, $program);
        $_SESSION['message'] = "Registration successful. Please log in.";
        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="User registration page to create a new account.">
    <meta name="author" content="Luke Saldanha">
    <title>User Registration</title>
    <!-- Include additional CSS files here -->
</head>
<body>
<!-- Include the header -->
<?php require 'includes/header.php'; ?>

<main class="container">
    <h1>User Registration</h1>

    <!-- Display error or success messages -->
    <?php if (!empty($errorMessage)) : ?>
        <div class="alert alert-danger"><?= $errorMessage; ?></div>
    <?php endif; ?>
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="alert alert-success"><?= $_SESSION['message']; unset($_SESSION['message']); ?></div>
    <?php endif; ?>

    <!-- Registration Form -->
    <form action="" method="POST">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>
        </div>
        <div>
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <div>
            <label for="program">Program:</label>
            <input type="text" id="program" name="program" required>
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
    </form>
</main>

<!-- Include the footer -->
<?php require 'includes/footer.php'; ?>
</body>
</html>
