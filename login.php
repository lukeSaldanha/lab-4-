<?php
// Include the database connection file
include 'includes/db_connection.php';

global $conn;  // Ensure global scope for the database connection

// Load SQL query to create the users table if it doesn't exist
$sqlFile = '01_create_users_table.sql';
if (file_exists($sqlFile)) {
    $sql = file_get_contents($sqlFile); // Reads SQL from file
} else {
    die("Error: SQL file '$sqlFile' not found.");
}

// Execute the query to create the table
$result = pg_query($conn, $sql);

// Check if the query executed successfully
if ($result) {
    echo "Table created successfully!";
} else {
    error_log("Error creating table: " . pg_last_error($conn)); // Log error for debugging
    die("Error in creating table. Please check logs for details.");
}

/**
 * Authenticate User
 *
 * Validates a user's credentials against the database.
 *
 * @param string $userId The user's ID (email or username)
 * @param string $password The user's password
 * @return array|null Returns user data on success, or null on failure
 */
function authenticateUser($userId, $password) {
    global $conn;  // Access the global database connection

    // Sanitize inputs (more robust approach)
    $userId = trim($userId);
    $password = trim($password);

    // Validate input types
    if (!is_string($userId) || !is_string($password)) {
        error_log("Invalid input types for authentication.");
        return null;
    }

    // Query to fetch user by user_id (email/username) securely using prepared statements
    $sql = "SELECT * FROM users WHERE user_id = $1"; // Assuming user_id is the email or username
    $result = pg_query_params($conn, $sql, array($userId));

    if (!$result) {
        error_log("Error in query execution: " . pg_last_error($conn)); // Log error for debugging
        return null;
    }

    // Fetch user data
    $user = pg_fetch_assoc($result);

    // Verify password hash
    if ($user && password_verify($password, $user['password_hash'])) {
        return $user;  // Return user data on successful authentication
    }

    // Log failed login attempt
    error_log("Failed login attempt for user ID: $userId");
    return null;  // Return null if authentication fails
}
?>
