<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "learnedge";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform validation
    if (empty($email) || empty($password)) {
        $error_message = "Please enter both username and password.";
    } else {
        // Prepare SQL query
        $sql = "SELECT * FROM student WHERE email = '$email' AND password = '$password' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Login successful
            // Redirect the user to the desired page or perform any other actions
            header("Location: Student.html");
            exit();
        } else {
            echo "Invalid username or password. Please try again";
            header("Refresh: 2; URL=login.html");
            exit();
        }
    }
}

// Close database connection
$conn->close();
?>