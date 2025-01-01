<?php
session_start();

if(isset($_SESSION["m"])){
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OZIZ Staff</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 15px;
            text-align: center;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }

        .sidebar a:hover {
            background-color: #575d63;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
        }

        .navbar h1 {
            margin: 0 auto;
        }
    </style>
</head>

<body onload="loadChart(); loadChart1();  ">
    <div class="sidebar d-flex flex-column">
        <a href="MaddProduct.php" class="mt-5">Add Product</a>
        <a href="MstockManage.php">Stock Management</a>
    </div>

    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <h1 class="navbar-brand mx-auto">Welcome to OZIZ Staff</h1>
            </div>
        </nav>
        <div class="row  ">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 mb-4">
                        <h2 class="text-center">Most Sold Product</h2>
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="col-md-6 mb-4">
                        <h2 class="text-center">Best Customer</h2>
                        <canvas id="bs"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>

</html>
<?php
}else{
    echo("You are not a Valid Manneger ");

}
?>