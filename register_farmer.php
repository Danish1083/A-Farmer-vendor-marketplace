<?php
// Include your database connection code here
$conn = new mysqli('localhost', 'root', '', 'project');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $farm_location = $_POST["farm_location"];
    $phone_number = $_POST["phone_number"];
    // Hash the password (use a secure hashing algorithm)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into the farmers table
    $sql = "INSERT INTO farmers (username, password, full_name, email, farm_location, phone_number)
    VALUES ('$username', '$hashed_password', '$full_name', '$email', '$farm_location', '$phone_number')";

if ($conn->query($sql) === TRUE) {
// Registration successful
$farmer_id = $conn->insert_id; // Retrieve the last inserted ID
$full_name = $_POST["full_name"]; // Use the input value, not $sql

// Store the farmer_id and full_name in session variables
session_start(); // Make sure to start the session
$_SESSION["user_farmer_id"] = $farmer_id;
$_SESSION["full_name"] = $full_name;

echo "<h3>Registration successful! Redirecting to the farmer dashboard...<h3>";
header("refresh:2; url=farmer_dashboard.php");
} else {
// Handle errors
echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
}
?>
