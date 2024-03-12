<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Farmer Dashboard</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .jumbotron {
            background-color: #28a745;
            color: #fff;
        }
        .card {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <!-- Welcome Message -->
    <div class="jumbotron">
        <?php
        // Start the session
        session_start();

        // Check if the user_farmer_id session variable exists and display the farmer information
        if (isset($_SESSION["user_farmer_id"]) && isset($_SESSION["full_name"])) {
            $farmer_id = $_SESSION["user_farmer_id"];
            $full_name = $_SESSION["full_name"];
            echo "<h1 class='display-4'>Welcome: $full_name</h1>";
        } else {
            // Redirect if the session variable is not set
            header("Location: login.php");
            exit();
        }
        ?>
        <p class="lead">Your dashboard for managing products.</p>
    </div>

    <!-- Product List -->
 
    <div class="card">
    <div class="card-header bg-success text-white">
        <h2>Your Products</h2>
    </div>
    <div class="card-body">
        <!-- Product List -->
        <ul class="list-group" id="productList">
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'project');

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

       

            // Check if the farmer_id session variable exists
            if (isset($_SESSION["user_farmer_id"])) {
                $farmer_id = $_SESSION["user_farmer_id"];

                // Fetch products associated with the logged-in farmer from the database
                $productQuery = "SELECT * FROM products WHERE farmer_id = $farmer_id";
                $productResult = mysqli_query($conn, $productQuery);

                // Display products in list items
                while ($productRow = mysqli_fetch_assoc($productResult)) {
                    echo '<li class="list-group-item d-flex justify-content-between align-items-center">';
                    echo $productRow["name"];
                    echo '<span class="badge badge-primary badge-pill">Rs' . $productRow["proposed_price"] . '</span>';
                    echo '</li>';
                }
            } else {
                // Redirect if the session variable is not set
                header("Location: login.php");
                exit();
            }
            ?>
        </ul>
    </div>
</div>

    <!-- Add New Product Form -->
    <div class="card mt-4">
    <div class="card-header bg-primary text-white">
        <h2>Add New Product</h2>
    </div>
    <div class="card-body">
        <form method="POST" action="addProd.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter product name" required>
            </div>
            <div class="form-group">
                <label for="productDescription">Product Description</label>
                <textarea class="form-control" id="productDescription" name="productDescription" placeholder="Enter product description" required></textarea>
            </div>
            <div class="form-group">
                <label for="productProposedPrice">Proposed Price (Rs)</label>
                <input type="number" class="form-control" id="productProposedPrice" name="productProposedPrice" placeholder="Enter proposed price" required>
            </div>
            <div class="form-group">
                <label for="productCategory">Product Category</label>
                <select class="form-control" id="productCategory" name="productCategory" required>
                    <option value="Grains">Grains</option>
                    <option value="Fruits">Fruits</option>
                    <option value="Vegetables">Vegetables</option>
                    <option value="Fiber and Textile Products">Fiber and Textile Products</option>
                    <option value="Nursery and Floriculture">Nursery and Floriculture</option>
                </select>
            </div>
            <div class="form-group">
                <label for="productPicture">Product Picture</label>
                <input type="file" class="form-control-file" id="productPicture" name="productPicture">
            </div>
            <button type="submit" class="btn btn-success">Add Product</button>
        </form>
    </div>
        </div>
<br>
<div class="text-center">
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
    <br>
<!-- Add Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</body>
</html>