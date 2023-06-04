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
            header("Location: index.html");
            exit();
        } else {
            $error_message = "Invalid username or password.";
        }
    }
}

// Close database connection
$conn->close();
?>

<!-- HTML code for the login page -->
<!DOCTYPE html>
<html>
<head>
    <title>Login - LearnEdge</title>
</head>
<body>
<!-- Your existing HTML code -->

<div class="container">
    <!-- Your existing HTML code -->
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <!-- Your existing HTML code -->
    </form>

    <?php if (isset($error_message)): ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
</div>

<!-- Your existing HTML code -->
</body>
</html>
