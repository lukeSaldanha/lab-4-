<?php
/**
 * Logout Page
 *
 * This page logs out the user by destroying their session and redirecting to the login page.
 *
 * PHP version 7.1
 *
 * @author Luke Saldanha
 * @date 2024-12-10
 * @title Logout
 */

// Include the database connection (if necessary)
include 'includes/db_connection.php';

// Start the session to manage session data
session_start();

// Regenerate session ID to prevent session fixation attacks (optional)
session_regenerate_id(true);

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Set a message to notify the user about the successful logout
$_SESSION['message'] = "You have been logged out successfully.";

// Redirect to the login page with the session message
header("Location: login.php");
exit();
?>
