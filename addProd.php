<?php
// Your database connection code here
$conn = mysqli_connect('localhost', 'root', '', 'project');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Start the session to get the logged-in farmer's ID
session_start();

// Check if the farmer_id session variable exists
if (isset($_SESSION["user_farmer_id"])) {
    $farmer_id = $_SESSION["user_farmer_id"];

    // Process the form submission
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Get the form data
        $productName = $_POST["productName"];
        $productDescription = $_POST["productDescription"];
        $productProposedPrice = $_POST["productProposedPrice"];
        $productCategory = $_POST["productCategory"]; // Assuming the input name is "productCategory"
        
        // Handle the uploaded file (product picture)
        $productPicture = $_FILES["productPicture"]["name"];
        $productPictureTemp = $_FILES["productPicture"]["tmp_name"];
        $productPicturePath = 'F:\Xampp\htdocs\farmerform' . $productPicture; // Adjust the path to your desired directory
        
        // Move the uploaded file to the desired directory
        move_uploaded_file($productPictureTemp, $productPicturePath);

        // Fetch the category_id based on the selected category_name
        $categoryQuery = "SELECT category_id FROM category WHERE category_name = ?";
        $stmt = mysqli_prepare($conn, $categoryQuery);
        mysqli_stmt_bind_param($stmt, "s", $productCategory);
        mysqli_stmt_execute($stmt);
        $categoryResult = mysqli_stmt_get_result($stmt);

        if ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
            $category_id = $categoryRow["category_id"];

            // Insert the data into the database using prepared statements
            $insertQuery = "INSERT INTO products (name, proposed_price, picture, description, category_id, farmer_id) 
                            VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $insertQuery);
            mysqli_stmt_bind_param($stmt, "ssssii", $productName, $productProposedPrice, $productPicture, $productDescription, $category_id, $farmer_id);

            if (mysqli_stmt_execute($stmt)) {
                echo "Product added successfully!";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Error: Category not found.";
        }
        
        mysqli_stmt_close($stmt);
    }
} else {
    // Redirect if the session variable is not set
    header("Location: login.php");
    exit();
}

header("Location: farmer_dashboard.php");
mysqli_close($conn);
?>
