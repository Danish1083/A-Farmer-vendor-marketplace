<?php
$con = mysqli_connect('localhost', 'root');
if (!$con) {
    die('Could not connect: ' . mysqli_error());
}

mysqli_select_db($con, 'project');

// Check if a specific category_id is provided in the URL
$categoryFilter = isset($_GET['category_id']) ? (int)$_GET['category_id'] : null;

// Modify the SQL query based on the category_id filter
$sql = "SELECT * FROM products";
if (!is_null($categoryFilter)) {
    $sql .= " WHERE category_id = $categoryFilter";
}

$featured = $con->query($sql);

if (!$featured) {
    die('Error in SQL query: ' . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Your existing styles */
    </style>
    <title>Farket - Top Products</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Farket</a>
    <img src="Wheat.png" alt="Logo" height="50px" width="50px">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto mb-2 mb-lg-2">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="toggleDropdown()">
                    Products
                </a>

                <!-- Inside the navbar's dropdown menu -->
                <div class="dropdown-menu" id="productsDropdown">
                    <a class="dropdown-item" href="Index.php">All Products</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="Index.php?category_id=1">Grains</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="Index.php?category_id=3">Fruits</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="Index.php?category_id=4">Vegetables</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="Index.php?category_id=5">Fiber and Textile Products</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="Index.php?category_id=6">Nursery and Floriculture</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<script>
    function toggleDropdown() {
        var dropdown = document.getElementById('productsDropdown');
        dropdown.classList.toggle('show');
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropdown-toggle')) {
            var dropdowns = document.getElementsByClassName('dropdown-menu');
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>

<div class="container mt-4"> <!-- Reduced container height -->
    <h2 class="center-text mb-4">Top Products</h2>
    <div class="mt-2x"></div> <!-- Two lines of space -->

    <div class="row">
        <?php while ($product = mysqli_fetch_assoc($featured)) : ?>
            <div class="col-md-3 mb-4">
                <div class="card" style="height: 350px;"> <!-- Adjusted card height -->
                    <img class="card-img-top product-image" src="<?= $product['picture']; ?>" alt="<?= $product['name']; ?>" style="height: 200px; width: 100%;"> <!-- Fixed picture height and width -->
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $product['name']; ?></h5>
                        <p class="card-text">Rs<?= $product['proposed_price']; ?></p>
                        <button type="button" class="btn btn-success" onclick="openModal(<?= $product['product_id']; ?>)">More</button>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<!-- Product Details Modal -->
<div class="modal fade" id="productDetailsModal" tabindex="-1" role="dialog" aria-labelledby="productDetailsModalLabel" aria-hidden="true">
    <!-- Modal content will be loaded dynamically here using JavaScript -->
</div>

<script>
    function openModal(productId) {
        $.ajax({
            type: 'POST',
            url: 'details.php',
            data: { id: productId }, // Ensure the parameter name is 'id'
            success: function(response) {
                $('#productDetailsModal').html(response);
                $('#productDetailsModal').modal('show');
            }
        });
    }
</script>

</body>

</html>

<?php
mysqli_close($con);
?>
