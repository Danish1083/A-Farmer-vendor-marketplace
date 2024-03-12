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
    $address = $_POST["address"];
    $phone_number = $_POST["phone_number"];
    $email = $_POST["email"];
    
    // Hash the password (use a secure hashing algorithm)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into the vendors table
    $sql = "INSERT INTO vendors (username, password, full_name, address, phone_number, email)
    VALUES ('$username', '$hashed_password', '$full_name', '$address', '$phone_number', '$email')";

    if ($conn->query($sql) === TRUE) {
        // Registration successful
        $vendor_id = $conn->insert_id; // Retrieve the last inserted ID
        $full_name = $_POST["full_name"]; // Use the input value, not $sql

        // Store the vendor_id and full_name in session variables
        session_start(); // Make sure to start the session
        $_SESSION["user_vendor_id"] = $vendor_id;
        $_SESSION["full_name"] = $full_name;

        echo "<h3>Registration successful! Redirecting to the vendor dashboard...<h3>";
        header("refresh:2; url=vendor_dashboard.php");
    } else {
        // Handle errors
        echo "Error: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
