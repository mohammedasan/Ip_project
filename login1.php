<?php
// Database credentials
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "university"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = "";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: admin.php");
        exit(); 
    } else {
        echo "Invalid username or password.";
    }
}

$conn->close();
?>
