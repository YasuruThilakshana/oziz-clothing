<?php


include "connection.php";
session_start();
$user = $_SESSION["u"];
$netTotal = 0;

$rs = Database::search("SELECT * FROM `cart` INNER JOIN `stock` ON `cart`.`stock_stock_id` = `stock`.stock_id
INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id`
INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id` WHERE `cart`.`user_id` = '" . $user['id'] . "'");

$num = $rs->num_rows;

if ($num > 0) {

?>

    <section class="h-100 h-custom  " style="background-color: #d2c9ff;">
        <div class="container py-5 h-100 ">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 ">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0  ">
                                <div class="col-lg-8 ">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                            <h6 class="mb-0 text-muted"><?php echo $num ?></h6>
                                        </div>


                                        <?php

                                        for ($i = 0; $i < $num; $i++) {

                                            $d =   $rs->fetch_assoc();
                                            $total = $d["price"] * $d["cart_qty"];
                                            $netTotal += $total;
                                        ?>

                                            <!-- cart item -->
                                            <hr class="my-4 ">

                                            <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                <div class="col-md-2 col-lg-2 col-xl-2">
                                                    <img src="<?php echo $d["img_path"]; ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-3">
                                                    <h6 class="text-black mb-0"><?php echo $d["name"]; ?></h6>
                                                    <h6 class="text-muted"><?php echo $d["color_name"]; ?></h6>
                                                    <h6 class="text-muted"><?php echo $d["size_name"]; ?></h6>
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">

                                                    <button class="btn btn-light btn-sm" onclick="decrementQty(<?php echo $d['cart_id']; ?>);">-</button>
                                                    <input type="number" id="qty<?php echo $d['cart_id']; ?>" class="form-control form-control-sm text-center" style="max-width: 100px;"   value="<?php echo $d['cart_qty']; ?>" disabled>
                                                    <button class="btn btn-light btn-sm" onclick="incrementQty(<?php echo $d['cart_id']; ?>);">+</button>

                                                </div>



                                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                    <h6 class="mb-0"><?php echo $d["price"]; ?></h6>
                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                    <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                    <button class="btn btn-danger" onclick="removeCart(<?php echo $d['cart_id']; ?>);">Delete</button>
                                                </div>
                                            </div>

                                            <hr class="my-4">

                                            <!-- cart item -->

                                        <?php

                                        }

                                        ?>




                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="index.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-4">
                                            <h5 class="text-uppercase">Item : <?php echo $num ?></h5>
                                        </div>

                                        <h5 class="text-uppercase mb-3">Shipping</h5>
                                        <select>
                                            <option>Colombo : 500</option>
                                            <option>Out of Colombo : 500</option>
                                        </select>







                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase"> price</h5>
                                            <h5><?php echo ($netTotal + 500) ?></h5>
                                        </div>
                                        <hr class="my-4">
                                        <h1>10 % Discount </h1>
                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase">Total price</h5>
                                            <h5><?php echo ($netTotal + 500) - (($netTotal + 500) * 0.10); ?></h5>
                                        </div>


                                        <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark" onclick="chechOut();">CHECKOUT</button>

                                    </div>

                                </div>

                            </div>


                        </div>

                    </div>

                </div>

            </div>

        </div>


    </section>



<?php



} else {

?>
    <!-- Empty View -->
    <div class="emptyView ">
        <div class="row mb-5">
            <div class="col-12 emptyCart mb-5"></div>
            <div class="col-12 text-center mt-5 mx-auto p-2 ">
                <label class="form-label fs-1 fw-bold">
                    You have no items in your Cart yet.
                </label>
            </div>
            <div class="h-100">
                <spam> <i class="bi bi-cart"></i></spam>
            </div>
            <div class="offset-lg-4 col-12 col-lg-4 mb-4 d-grid">
                <a href="index.php" class="btn btn-outline-info fs-3 fw-bold">
                    Start Shopping
                </a>
            </div>
        </div>
    </div>
    <!-- Empty View -->


<?php
}

?>