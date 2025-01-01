<?php

include "connection.php";
session_start();

$user = $_SESSION["u"];

$rs = Database::search("SELECT * FROM `wish_list` INNER JOIN `stock` ON `wish_list`.`stock_stock_id` = `stock`.`stock_id`
INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id`
INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id` WHERE `wish_list`.`user_id` = '" . $user['id'] . "'");

$num = $rs->num_rows;

if ($num > 0) {

?>


    <div class="container mt-5">
        <div class="row" id="wishlistbody">
            <!-- wishlistbody -->
            <div>
                <h3 class="text-white">
                    <i class="bi bi-heart-fill"></i>
                    Wishlist
                </h3>
                <h5 class="text-white">
                    <a href="index.php">Home</a>
                </h5>
            </div>
            <?php

            for ($i = 0; $i < $num; $i++) {

                $d =   $rs->fetch_assoc();

            ?>

                <!-- wishlist -->
                <div class="col-12 border-3 rounded-4 p-3 m-2 border-light d-flex justify-content-between bg-dark ">
                    <div class="d-flex align-items-center col-5">
                        <img src="<?php echo $d["img_path"]; ?>" class="rounded-4" width="200px" />
                        <div class="ms-5">
                            <h4 class="text-light"> <?php echo $d["name"]; ?></h4>
                            <p class="text-light"><?php echo $d["color_name"]; ?></p>
                            <p class="text-light">Size: <?php echo $d["size_name"]; ?></p>
                            <h5 class="text-warning">Price: Rs:<?php echo $d["price"]; ?></h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <button class="btn btn-success me-5"><i class="bi bi-cart-fill"></i> ADD TO CART</button>
                        <button class="btn btn-danger me-5" onclick="removeWishlist(<?php echo $d['wish_id']; ?>);"><i class="bi bi-trash-fill"></i> DELETE </button>
                    </div>
                </div>
                <!-- wishlist -->
            <?php
            }

            ?>
        </div>
    </div>

<?php


} else {

?>
    <!-- empty view -->
    <div class="col-12 d-flex flex-column align-items-center justify-content-center vh-100">
        
        <div class="text-center">
            <label class="form-label fs-1 fw-bold">You have no items in your Watchlist yet.</label>
            <div class="d-grid gap-2 col-12 col-lg-6 mx-auto mt-4">
                <a href="index.php" class="btn btn-warning fs-3 fw-bold">Start Shopping</a>
            </div>
        </div>
    </div>
    <!-- empty view -->


<?php


}





?>