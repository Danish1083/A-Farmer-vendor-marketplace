<?php
// Start the session
session_start();

// Your database connection code here
$conn = mysqli_connect('localhost', 'root', '', 'project');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST['password'];

    // Check the farmers table
    $sqlFarmer = "SELECT farmer_id, username, password, full_name FROM farmers WHERE username = '$username'";
    $resultFarmer = $conn->query($sqlFarmer);
    $rowFarmer = $resultFarmer->fetch_assoc();

    // Check the vendors table
    $sqlVendor = "SELECT vendor_id, username, password, full_name FROM vendors WHERE username = '$username'";
    $resultVendor = $conn->query($sqlVendor);
    $rowVendor = $resultVendor->fetch_assoc();

    if ($rowFarmer) {
        $storedPassword = $rowFarmer["password"];
        if (password_verify($password, $storedPassword)) {
            $farmer_id = $rowFarmer["farmer_id"];
            $full_name = $rowFarmer["full_name"];

            // Store the farmer_id and full_name in session variables
            $_SESSION["user_farmer_id"] = $farmer_id;
            $_SESSION["full_name"] = $full_name;

            // Redirect to farmer_dashboard.php
            header("Location: farmer_dashboard.php");
            exit();
        }
    } else if ($rowVendor) {
        $storedPassword = $rowVendor["password"];
        if (password_verify($password, $storedPassword)) {
            $vendor_id = $rowVendor["vendor_id"];
            $full_name = $rowVendor["full_name"];

            // Store the vendor_id and full_name in session variables
            $_SESSION["user_vendor_id"] = $vendor_id;
            $_SESSION["full_name"] = $full_name;

            // Redirect to vendor_dashboard.php
            header("Location: vendor_dashboard.php");
            exit();
        }
    }

    // If no matching records found
    echo "Authentication failed. Invalid username or password.";
}

// Close the connection
mysqli_close($conn);
?>
