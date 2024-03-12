<?php include('server.php') ?>
<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FarmerVendorMarketPlace</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhraoNzaMhw06U4dUnwd9wYGmSYkMYzgE&callback=initMap"
        defer></script>
    defer></script>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
        }

        #map {
            height: 400px;
            margin-bottom: 20px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
    <link rel="stylesheet"
        href="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==">
</head>

<body>
    <br><br><br>
    <form method="post" action="register.php" id="registerForm" class="good-form" style="margin-top: 30px; display: block">
        <?php include('errors.php'); ?>
        <div class="input-field">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="input-field">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="input-field">
            <label>Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-field">
            <label>Confirm password</label>
            <input type="password" name="password_2">
        </div>
        <br>
        <div class="input-field">
            <button type="submit" class="btn" name="reg_user">Register</button>
        </div>
        <p>
            Already a member? <a href="login.php">Sign in</a>
        </p>
        <span class="close-btn" id="closeBtn" onclick="returntologin()">&times; </span>
    </form>
    <header>

        <div class="container-fluid" style="height: 100vh; ">
            <video src="backvid.mp4" height="100%" width="100%" autoplay muted onended="playNext() "
                style=" object-fit: fill; z-index: -1;"></video>
        </div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary  border-bottom  px-5 "
            style="position: fixed; top: 0px; width: 100%; opacity: 0.7; z-index: 1; " id="L">
            <div class="container-fluid">
                <a class="navbar-brand fs-2" href="#"><img src="wheat.png" alt="" width="30px" height="30px"><span
                        class="text-primary">Farket</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fs-5 text-center">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">MARKET</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">HOW IT WORKS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ABOUT US</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">CONTACT US</a>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-primary" id="loginButton"  onclick="formpopup()">Log In</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>
    <section class="services text-center">
        <div class="container">
            <div class="text-center my-5">
                <h1 data-aos="fade-down-right " data-aos-offset="200">Our <span class="text-primary">Products</span>
                </h1>
                <hr class="w-25 m-auto">
            </div>
            <div class="row" data-aos="zoom-in-up" data-aos-offset="200">
                <div class=" col-md-3 col-lg-3">
                    <div class="card" style="width: 18rem;">
                        <img src="Wheat.jpg" class="card-img-top border-primary p-2" alt="..." height="200px">
                        <div class="card-body">
                            <h5 class="card-title">Wheat</h5>

                        </div>
                    </div>

                </div>
                <div class=" col-md-3 col-lg-3">
                    <div class="card" style="width: 18rem;">
                        <img src="Apple.jpg" class="card-img-top border-primary p-2" alt="..." height="200px">
                        <div class="card-body">
                            <h5 class="card-title">Apple</h5>

                        </div>
                    </div>

                </div>
                <div class=" col-md-3 col-lg-3">
                    <div class="card" style="width: 18rem;">
                        <img src="Corn.jpg" class="card-img-top border-primary p-2" alt="..." height="200px">
                        <div class="card-body">
                            <h5 class="card-title">Corn</h5>

                        </div>
                    </div>

                </div>
                <div class=" col-md-3 col-lg-3">
                    <div class="card" style="width: 18rem;">
                        <img src="Rice.jpg" class="card-img-top border-primary p-2" alt="..." height="200px">
                        <div class="card-body">
                            <h5 class="card-title">Rice</h5>

                        </div>
                    </div>

                </div>
            </div>
            <div class="row mt-5" data-aos="zoom-in-down" data-aos-offset="200">
                <div class=" col-md-3 col-lg-3">
                    <div class="card" style="width: 18rem;">
                        <img src="Corn.jpg" class="card-img-top border-primary p-2" alt="..." height="200px">
                        <div class="card-body">
                            <h5 class="card-title">Corn</h5>

                        </div>
                    </div>

                </div>
                <div class=" col-md-3 col-lg-3">
                    <div class="card" style="width: 18rem;">
                        <img src="Corn.jpg" class="card-img-top border-primary p-2" alt="..." height="200px">
                        <div class="card-body">
                            <h5 class="card-title">Corn</h5>

                        </div>
                    </div>

                </div>
                <div class=" col-md-3 col-lg-3">
                    <div class="card" style="width: 18rem;">
                        <img src="Corn.jpg" class="card-img-top border-primary p-2" alt="..." height="200px">
                        <div class="card-body">
                            <h5 class="card-title">Corn</h5>

                        </div>
                    </div>

                </div>
                <div class=" col-md-3 col-lg-3">
                    <div class="card" style="width: 18rem;">
                        <img src="Corn.jpg" class="card-img-top border-primary p-2" alt="..." height="200px">
                        <div class="card-body">
                            <h5 class="card-title">Corn</h5>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>





    <section class="MAP">
        <div style="padding: 2%;">
            <label for="locationInput">Enter Your Location:</label>
            <input type="text" id="locationInput" placeholder="Enter your location">
            <button onclick="findNearestMarker()">Find Nearest Marker</button>
        </div>
        <div id="map"></div>

        <script>
            let map;
            let markers = [];
            let userMarker;
            let directionsService;
            let directionsRenderer;
            let nearestMarker;

            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: { lat: 30.3753, lng: 69.3451 }, // Default center for Pakistan
                    zoom: 6,
                });

                directionsService = new google.maps.DirectionsService();
                directionsRenderer = new google.maps.DirectionsRenderer({
                    map: map,
                });

                // Markers for predefined locations (Lahore, Karachi, Islamabad, Rawalpindi)
                addMarker({ lat: 31.5497, lng: 74.3436 }, "Lahore");
                addMarker({ lat: 24.8607, lng: 67.0011 }, "Karachi");
                addMarker({ lat: 33.6844, lng: 73.0479 }, "Islamabad");
                addMarker({ lat: 33.6844, lng: 73.0479 }, "Rawalpindi");

                // User marker
                userMarker = new google.maps.Marker({
                    map: map,
                    label: "You",
                });
            }

            function addMarker(location, label) {
                const marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    label: label,
                });
                markers.push(marker);
            }

            function findNearestMarker() {
                const userLocationInput = document.getElementById("locationInput").value;

                if (!userLocationInput) {
                    alert("Please enter your location first.");
                    return;
                }

                const geocoder = new google.maps.Geocoder();

                geocoder.geocode({ address: userLocationInput }, (results, status) => {
                    if (status === "OK" && results.length > 0) {
                        const userLocation = results[0].geometry.location;

                        // Set user marker position
                        userMarker.setPosition(userLocation);

                        // Reset style for previous nearest marker
                        if (nearestMarker) {
                            nearestMarker.setIcon(null);
                        }

                        // Find the nearest marker
                        let nearestDistance = Number.MAX_VALUE;

                        markers.forEach((marker) => {
                            const distance = google.maps.geometry.spherical.computeDistanceBetween(
                                userLocation,
                                marker.getPosition()
                            );

                            if (distance < nearestDistance) {
                                nearestDistance = distance;
                                nearestMarker = marker;
                            }
                        });

                        // Highlight the nearest marker and show directions
                        if (nearestMarker) {
                            nearestMarker.setIcon({
                                path: google.maps.SymbolPath.CIRCLE,
                                fillColor: 'Blue',
                                fillOpacity: 1,
                                strokeWeight: 0,
                                scale: 10,  // Increase the size of the marker
                            });

                            alert("The nearest marker is: " + nearestMarker.getLabel());

                            const request = {
                                origin: userLocation,
                                destination: nearestMarker.getPosition(),
                                travelMode: 'DRIVING',
                            };

                            directionsService.route(request, (response, status) => {
                                if (status === 'OK') {
                                    directionsRenderer.setDirections(response);
                                } else {
                                    alert('Error getting directions: ' + status);
                                }
                            });

                        } else {
                            alert("No markers found.");
                        }

                    } else {
                        alert("Geocode was not successful for the following reason: " + status);
                    }
                });
            }
        </script>
    </section>





    <footer class="bg-dark text-white pt-5 pb-4 mt-5 " data-aos="fade-up" data-aos-anchor-placement="top-center">
        <div class="container text-center text-md-left">

            <div class="row text-center text-md-left">
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Company Names</h5>
                    <p>Lorem ipsum, d et quis saepe consectetur, architecto optio, molestiae incidunt
                        ipsa reprehenderit voluptas iure veritatis.</p>
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-2">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Products</h5>
                    <p><a href="" class="text-white" style="text-decoration: none;">The Providers</a>
                    </p>
                    <p><a href="" class="text-white" style="text-decoration: none;">Creativity</a>
                    </p>
                    <p><a href="" class="text-white" style="text-decoration: none;">SourceFiles</a>
                    </p>
                    <p><a href="" class="text-white" style="text-decoration: none;">LLLL</a>
                    </p>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Useful Names</h5>
                    <p><a href="" class="text-white" style="text-decoration: none;">The Providers</a>
                    </p>
                    <p><a href="" class="text-white" style="text-decoration: none;">Creativity</a>
                    </p>
                    <p><a href="" class="text-white" style="text-decoration: none;">SourceFiles</a>
                    </p>
                    <p><a href="" class="text-white" style="text-decoration: none;">LLLL</a>
                    </p>
                </div>


                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contact</h5>
                    <p>
                        <i class="fas fa-home mr-3"></i>IPakistan, Islamabad NUST H-12
                    </p>
                    <p>
                        <i class="fas fa-phone mr-3"></i>Noor@gmail.com
                    </p>
                    <p>
                        <i class="fas fa-home mr-3"></i>+923244509550
                    </p>
                </div>
            </div>
            <hr class="mb-4">
            <div class="row align-items-center">
                <div class="col-md-7 col-lg-8">
                    <p>Copyright @2020 All rights are reserved.
                        <a href="" style="text-decoration: none;"><strong class="text-warning"></strong></a>
                    </p>
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="text-center text-md-right">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item">
                                <a href="" class="btn-floating btn-sm text-white" style="font-size: 23px;"> <i class="fab
                                     fa-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="btn-floating btn-sm text-white" style="font-size: 23px;"> <i class="fab
                                             fa-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="" class="btn-floating btn-sm text-white" style="font-size: 23px;"> <i class="fab
                                                     fa-facebook"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <div style="width: 100%; height: 40px;"></div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <script>
        AOS.init();
    </script>
    <script src="script/script.js"></script>

</body>

</html>