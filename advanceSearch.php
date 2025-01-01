<?php

session_start();
include "connection.php";






?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Advanced Search | OZIZ</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />


</head>

<body class="bg-light">
  

    <div class="container-fluid">
   
        <div class="row bg-dark bg-opacity-75">


            <div class="mask d-flex align-items-center h-100 p-2" style="background-color: rgba(0,0,0,.43);">

                <div class="container ">
    
                <a href="index.php"><button class="bg-warning">
            <i class="bi bi-arrow-left"></i> Back
        </button></a>
                    <div class="row ">
                        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto ">

                            <div class="card bg-black ">
                                <div class="card-body p-4 ">
                                    <h6 class="text-white mt-3 mb-4 text-bg-dark text-center">Advanced search</h6>
                                    <div class="row align-items-center">
                                        <div class="col-12 col-lg-4 mb-3">
                                            <select class="form-select btn btn-outline-light " id="c1">
                                                <option value="0">Select Category</option>
                                                <?php
                                                $category_rs = Database::search("SELECT * FROM `category`");
                                                $category_num = $category_rs->num_rows;

                                                for ($x = 0; $x < $category_num; $x++) {
                                                    $category_data = $category_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $category_data["category_id"] ?>"><?php echo $category_data["category_name"] ?></option>
                                                <?php
                                                }
                                                ?>


                                            </select>
                                        </div>
                                        <div class="col-12 col-lg-4 mb-3">
                                            <select class="form-select btn btn-outline-light" id="b1">
                                                <option value="0">Select Brand</option>
                                                <?php
                                                $brand_rs = Database::search("SELECT * FROM `brand`");
                                                $brand_num = $brand_rs->num_rows;

                                                for ($x = 0; $x < $brand_num; $x++) {
                                                    $brand_data = $brand_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $brand_data["brand_id"] ?>"><?php echo $brand_data["brand_name"] ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="col-12 col-lg-4 mb-3">
                                            <select class="form-select btn btn-outline-light" id="s1">
                                                <option value="0">Select size</option>
                                                <?php
                                                $size_rs = Database::search("SELECT * FROM `size`");
                                                $size_num = $size_rs->num_rows;

                                                for ($x = 0; $x < $size_num; $x++) {
                                                    $size_data = $size_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $size_data["size_id"] ?>"><?php echo $size_data["size_name"] ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                        </div>

                                        <div class="col-12 col-lg-4 mb-3">
                                            <select class="form-select btn btn-outline-light" id="cl1">
                                                <option value="0">Select Colour</option>
                                                <?php
                                                $color_rs = Database::search("SELECT * FROM `color`");
                                                $color_num = $color_rs->num_rows;

                                                for ($x = 0; $x < $color_num; $x++) {
                                                    $color_data = $color_rs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $color_data["color_id"] ?>"><?php echo $color_data["color_name"] ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                        </div>
                                       
                                        <div class="col-12 col-lg-4 mb-3">
                                            <input type="text" class="form-control" placeholder="Minimum Price" id="min" />
                                        </div>

                                        <div class="col-12 col-lg-4 mb-3">
                                            <input type="text" class="form-control" placeholder="Maximum Price" id="max" />
                                        </div>




                                        <div class="d-flex justify-content-between align-items-center mt-3">

                                            <div class="offset-lg-9">
                                                <button type="button" class="btn btn-link text-white" onclick="resetad();" data-mdb-ripple-color="dark">
                                                    Reset
                                                </button>
                                                <button type="button" class="btn btn-warning" onclick="advancedSearch(0);">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <div class="offset-lg-2 col-12 col-lg-8 bg-body rounded mb-3">
            <div class="row">
                <div class="offset-lg-1 col-12 col-lg-12 text-center">
                    <div class="row" id="view_area">
                        <div class="offset-5 col-2 mt-5">
                            <span class="fw-bold text-black-50"><i class="bi bi-search h1" style="font-size: 100px;"></i></span>
                        </div>
                        <div class="offset-3 col-6 mt-3 mb-5">
                            <span class="h1 text-black-50 fw-bold">No Items Searched Yet...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include "footer.php"; ?>
    </div>
    <script src="script.js"></script>
</body>

</html>