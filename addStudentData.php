

<?php
// Retrieve form data
$email = $_POST['email'];
$password = $_POST['password'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$telNo = $_POST['telNo'];

// Create a new PDO instance (replace hostname, username, password, and dbname with your MySQL server details)
$pdo = new PDO('mysql:host=localhost;dbname=learnedge', 'root', '');

// Prepare the SQL statement
$sql = "INSERT INTO student (email, password, firstName, lastName, telNo) VALUES (:email, :password, :firstName, :lastName, :telNo)";
$stmt = $pdo->prepare($sql);

// Bind the form data to the prepared statement parameters
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':firstName', $firstName);
$stmt->bindParam(':lastName', $lastName);
$stmt->bindParam(':telNo', $telNo);

// Execute the prepared statement
if ($stmt->execute()) {
    echo "Registration successful! Redirecting to the login page...";
    echo "Please login";
    header("Refresh: 2; URL=login.html");
    exit();
} else {
    // Error occurred
    echo "Error: " . $stmt->errorInfo()[2];
}

?>

