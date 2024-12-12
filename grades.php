<?php
/**
 * Grades Page
 *
 * This page displays the student's grades if they are logged in. If not logged in,
 * the user will be redirected to the login page.
 *
 * PHP version 7.1
 *
 * @author Luke Saldanha
 * @date 2024-12-10
 * @title Student Grades
 */

// Include the database connection file
include 'includes/db_connection.php';  // Include the DB connection

// Start the session to check login status
session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['message'] = "You must log in to view your grades.";
    header("Location: login.php");
    exit;
}

// Fetch grades for the logged-in user
function fetchGrades($userId) {
    global $conn;

    // SQL query to fetch grades
    $sql = "SELECT * FROM marks WHERE user_id = $1";
    $result = pg_query_params($conn, $sql, array($userId));

    if (!$result) {
        error_log("Error in query execution: " . pg_last_error($conn)); // Log error for debugging
        return []; // Return an empty array in case of failure
    }

    return pg_fetch_all($result); // Return all rows from the result
}

// Get the logged-in user's ID
$user = $_SESSION['user'];
$userId = $user['user_id'];  // Ensure the session variable is properly set

// Fetch the grades
$grades = fetchGrades($userId);

// Display grades
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Student grades page">
    <title>Student Grades</title>
    <!-- Add any additional styles or scripts -->
</head>
<body>
<!-- Include header -->
<?php require 'includes/header.php'; ?>

<main class="container">
    <h1>Your Grades</h1>

    <?php if (empty($grades)): ?>
        <p>No grades found for your account.</p>
    <?php else: ?>
        <table>
            <thead>
            <tr>
                <th>Course</th>
                <th>Grade</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($grades as $grade): ?>
                <tr>
                    <td><?php echo htmlspecialchars($grade['course_name']); ?></td>
                    <td><?php echo htmlspecialchars($grade['grade']); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</main>

<!-- Include footer -->
<?php require 'includes/footer.php'; ?>
</body>
</html>
