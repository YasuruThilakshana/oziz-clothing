<?php


include "connection.php";

$stockId = $_GET['s'];

//echo($stockId);
if (isset($stockId)) {


$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.product_id = `product`.id INNER JOIN `brand` ON `product`.brand_id
INNER JOIN `color` ON `product`.color_id = `color`.color_id INNER JOIN `category` ON `product`.category_id = `category`.category_id
INNER JOIN `size` ON `product`.size_id = `size`.size_id WHERE `stock`.`stock_id` = '".$stockId."'";

$rs = Database::search($q);
$d = $rs->fetch_assoc();

?>


    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Single Product View - Clothing Shop</title>
        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
    </head>

    <body>
        <div class="mb-5">
            <?php
            include "header.php";
            ?>
        </div>
        <div class="admin_body mt-5 display-flex ">
            <div class="container mt-5 ">
                <div class="row bg-body-tertiary ">
                    <!-- Product Image -->
                    <div class="col-md-6 mt-3">
                        <img src="<?php echo $d['img_path']; ?>" class="img-fluid" alt="Product Image" style="height: 400px;">
                    </div>
                    <!-- Product Details -->
                    <div class="col-md-6">
                        <h1 class="product-title"><?php echo $d['name']; ?></h1>
                        <p class="product-price ">Price:<?php echo $d['price']; ?></p>
                        <p class="product-color ">Color:<?php echo $d['color_name']; ?></p>
                        <p class="product-color ">Category:<?php echo $d['category_name']; ?></p>
                        <p class="product-color ">Brand:<?php echo $d['brand_name']; ?></p>
                        <p class="product-color ">Size:<?php echo $d['size_name']; ?></p>
                        
                        <div class="row mt-3">
                        <div class="col-3">
                            <input type="text" placeholder="Qty" class="form-control" id="qty">
                        </div>
                        <div class="col-6 mt-2">
                            <h6 class="text-warning">Available Quantity : <?php echo $d['qty']; ?></h6>
                        </div>
                    </div>
                        <div class="product-description">
                            <p><?php  echo $d['description']; ?></p>
                        </div>
                        <h1 class="product-color"> 10% Discount</h1>

                        <button class="btn btn-primary btn-lg add-to-cart-btn mb-3 ms-2" onclick="addtoCart(<?php echo $d['stock_id'];?>);">Add to Cart</button>
                        <button class="btn btn-primary btn-lg add-to-cart-btn mb-3 ms-2">Wish List</button>
                        <button class="btn btn-primary btn-lg add-to-cart-btn mb-3 ms-2" onclick="buyNow(<?php echo $d['stock_id'];?>);">Buy Now</button>
                    </div>
                </div>
            </div>

        </div>



        </div>
        <?php include "footer.php"; ?>
        </div>
        <!-- Bootstrap JS and dependencies -->
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="script.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </body>

    </html>


<?php






} else {
    header("location: index.php");
}


?>