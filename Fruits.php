<?php
$con = mysqli_connect('localhost', 'root');
if (!$con) {
    die('Could not connect: ' . mysqli_error());
}

mysqli_select_db($con, 'farket');

$sql = "SELECT * FROM products WHERE Featured = 2";

$featured = $con->query($sql);
if (!$featured) {
    die('Error in SQL query: ' . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .product-image {
            max-width: 50%; /* Set the maximum width to 100% of its container */
            height: auto; /* Allow the height to adjust proportionally */
        }
    </style>
    <title>Document</title>
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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Products
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Vegetables</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="Fruits.php">Fruits</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="Index.php">Grains</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
        <h2 class="text-center mb-4 col-12">Top Products</h2>

        <?php while ($product = mysqli_fetch_assoc($featured)) : ?>
    <div class="col-md-4 mb-4">
        <div class="card">
            <img class="card-img-top product-image" src="<?= $product['Picture']; ?>" alt="<?= $product['Name']; ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $product['Name']; ?></h5>
                <p class="card-text">Rs<?= $product['Proposed Price']; ?></p>
                <a href="details.php?id=<?= $product['product_id']; ?>" data-toggle="modal" data-target="#details-1">
                    <button type="button" class="btn btn-success">More</button>
                </a>
            </div>
        </div>
    </div>
<?php endwhile; ?>
    </div>
    </div>
</body>
</html>
