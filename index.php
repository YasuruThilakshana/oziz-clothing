<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm7uG6JM6kMR8M7xC/7tB7NfEXR4RKE05kph7YfEZGq5m3l7Q" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <style>
        .bg-transparent-gray {
            background-color: rgba(128, 128, 128, 0.5);
            /* 50% transparent gray */

        }
        .carousel-item img {
            width: 100%;
            height: auto;
            max-height: 500px; /* Adjust this value as needed */
            object-fit: cover; /* Ensure the image covers the container */
        }
    </style>


</head>

<body class="bg-secondary" onload="lordProduct(0);">
    <div class="bg-secondary  mb-3" style="color:white;">

        <div class=" col-12 mt-2 bg-black">
            <?php
            include "header.php";
            ?>
        </div>
        <!-- basic search -->
        <div class="container d-flex justify-content-center mt-5 mb-3">

            <div class="row col-12 mt-3 justify-content-center">

                <input type="text" class="form-control col-6 mt-1 " placeholder="Product Name" id="product" onkeyup="searchProduct(0);" />
                <button class="btn btn-info col-3  ms-2 mt-1" onclick="openADsearch();"> Advance Search</button>
            </div>
        </div>
        <!-- basic search -->
       
    </div>

    <!-- carousel -->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="3000">
                <img src="resources/carouselimage/1 .jpg" class="d-block w-100 " style="height: 300px;" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="resources/carouselimage/2.jpg" class="d-block w-100 " style="height: 300px;" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="resources/carouselimage/3.jpg" class="d-block w-100" style="height: 300px;" alt="...">
            </div>
        </div>
    </div>
    <!-- carousel -->

    <!-- lord product -->
    <div class="row col-10 offset-1 mt-3 mb-5  " id="pid">



    </div>


    <!-- lord product -->

    <!-- footer -->
    <div>

        <?Php
        include "footer.php";
        ?>
    </div>

    <!-- footer -->







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>