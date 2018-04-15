 <?php
$servername = "localhost";
$username = "root";
$password = "Login4cs405!";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

mysqli_select_db($conn, "bookstore_test4") or die(mysql_error());
?> 