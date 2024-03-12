<?php
if (!isset($_POST['id']) || empty($_POST['id'])) {
    die('Missing product ID parameter');
}

$productId = (int)$_POST['id'];

// Connect to the database
$con = mysqli_connect('localhost', 'root');

if (!$con) {
    die('Could not connect: ' . mysqli_error());
}

mysqli_select_db($con, 'project');

// Fetch product and farmer details based on the ID
$sql = "SELECT p.product_id, p.name, p.proposed_price, p.description, f.full_name, f.farm_location, f.phone_number
        FROM products p
        JOIN farmers f ON p.farmer_id = f.farmer_id
        WHERE p.product_id = $productId";

$productDetails = mysqli_query($con, $sql);

if (!$productDetails) {
    die('Error in SQL query: ' . mysqli_error($con));
}

// Always display product and farmer details, whether there are results or not
$product = mysqli_fetch_assoc($productDetails);

// Display product and farmer details as needed
echo '<div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productDetailsModalLabel">' . ($product['name'] ?? 'N/A') . '</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Product ID: ' . ($product['product_id'] ?? 'N/A') . '</p>
                <p>Product Name: ' . ($product['name'] ?? 'N/A') . '</p>
                <p>Category: ' . ($product['category_name'] ?? 'N/A') . '</p>
                <p>Proposed Price: Rs' . ($product['proposed_price'] ?? 'N/A') . '</p>
                <p>Description: ' . ($product['description'] ?? 'N/A') . '</p>
                <p>Farmer Name: ' . ($product['full_name'] ?? 'N/A') . '</p>
                <p>Farm Location: ' . ($product['farm_location'] ?? 'N/A') . '</p>
                <p class="highlighted-phone-number text-center">Phone Number: ' . ($product['phone_number'] ?? 'N/A') . '</p>
                <!-- Add more details as needed -->
            </div>
        </div>
    </div>';

mysqli_close($con);
?>
