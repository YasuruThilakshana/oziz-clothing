<?php

session_start();

include "connection.php";


if (isset($_SESSION["m"])) {

?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Registration</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
        <style>
            body {
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .card {
                border-radius: 15px;
            }

            .form-label {
                font-weight: bold;
            }
        </style>
    </head>

    <body class="bg-secondary">       

        <div class="container-fluid mt-5" id="product">

            <div class="row justify-content-center ">

                <div class="col-md-8 ">
                    <div class="card shadow-lg">


                        <div class="card-header text-yellow text-center">
                            <h2>Product Registration</h2>


                        </div>
                        <div class="card-body p-4 ">
                            <form>
                                <div class="mb-1">
                                    <label for="productName" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="pname" placeholder="Enter product name">
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label for="form-label" class="form-label">Brand</label>
                                        <select class="form-select" id="brand">
                                            <option value="0">Select Brand</option>
                                            <?php

                                            $rs =  Database::search("SELECT * FROM `brand`");
                                            $num = $rs->num_rows;

                                            for ($x = 0; $x < $num; $x++) {
                                                $data = $rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo ($data["brand_id"]); ?>"> <?php echo ($data["brand_name"]); ?></option>
                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label for="form-label" class="form-label">Category</label>
                                        <select class="form-select" id="category">
                                            <option value="0">Select category</option>
                                            <?php

                                            $rs =  Database::search("SELECT * FROM `category`");
                                            $num = $rs->num_rows;

                                            for ($x = 0; $x < $num; $x++) {
                                                $data = $rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo ($data["category_id"]); ?>"> <?php echo ($data["category_name"]); ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label for="form-label" class="form-label">Color</label>
                                        <select class="form-select" id="color">
                                            <option value="0">Select color</option>
                                            <?php

                                            $rs =  Database::search("SELECT * FROM `color`");
                                            $num = $rs->num_rows;

                                            for ($x = 0; $x < $num; $x++) {
                                                $data = $rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo ($data["color_id"]); ?>"> <?php echo ($data["color_name"]); ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label for="form-label" class="form-label">Size</label>
                                        <select class="form-select" id="size">
                                            <option value="0">Select Size</option>
                                            <?php

                                            $rs =  Database::search("SELECT * FROM `size`");
                                            $num = $rs->num_rows;

                                            for ($x = 0; $x < $num; $x++) {
                                                $data = $rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo ($data["size_id"]); ?>"> <?php echo ($data["size_name"]); ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="for-label" class="form-label">Description</label>
                                    <textarea class="form-control" id="description"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="for-label" class="form-label">Product Image</label>
                                    <input type="file" class="form-control" id="file">
                                </div>
                                <div class="text-center mb-2">
                                    <button type="submit" class="btn btn-primary col-12 mt-3" onclick="regProductM();">Register Product</button>
                                </div>
                                <div class="text-center">
                                <a href="MDashbord.php"> <span>Back</span> </a>

                                </div>

                                <div class="d-none" id="msgPReg">
                                    <div class="alert alert-warning" role="alert" id="msgpreg"></div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Bootstrap JS -->
        <script src="script.js"></script>
    </body>

    </html>



<?php

} else {
    echo ("Your Not an Mannager");
}
?>