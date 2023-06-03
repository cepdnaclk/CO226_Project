<?php
// Retrieve form data
$name = $_POST['username'];
$password = $_POST['password'];

// Database connection details
$servername = "your_servername";
$username = "your_username";
$password = "";
$dbname = "your_dbname";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement
$sql = "INSERT INTO your_table (name, email) VALUES ('$name', '$email')";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
