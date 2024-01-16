<?php
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['user'];
    $password = $_POST['pass'];

    // Connect to the database (replace these values with your database credentials)
    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "data";

    $conn = new mysqli($servername, $username, $password_db, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Secure way to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Fetch user from the database
    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($query);

    if ($result) {
        if ($result->num_rows == 1) {
            // Valid login, set session variables
            $_SESSION['email'] = $email;

            // Redirect to the dashboard page
            header("Location: dashboard.php");
            exit();
        } else {
            // Invalid login
            echo "Invalid login credentials";
        }
    } else {
        // Error in the SQL query
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>

