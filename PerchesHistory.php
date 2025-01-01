<?php

session_start();
$user = $_SESSION["u"];
include "connection.php";

if (isset($user)) {
?>

    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <title>Online Store - Order History</title>
    </head>

    <body>
        <!-- Nav Bar -->
         
        <!-- Nav Bar -->

        <div class="container mt-5 ">
            <div class="row  ">

                <?php
                $rs = Database::search("SELECT * FROM `order_history` WHERE `user_id`='" . $user["id"] . "'");
                $num = $rs->num_rows;

                if ($num > 0) {
                    //Not Empty
                ?>
                    <div class="mb-3">
                        
                            <h3 >Order History</h3>
                            <h3 ><a href="index.php">Home</a> </h3>
    
                       
                    </div>

                    <?php
                    for ($i = 0; $i < $num; $i++) {
                        $d = $rs->fetch_assoc();
                    ?>
                        <!-- order history card -->
                        <div class="p-3 border border-3 rounded-3 bg-body-tertiary mb-5">
                            <div>
                                <h5>Order Id <span class="text-info">#<?php echo $d["order_id"]; ?></span></h5>
                                <p><?php echo $d["order_date"]; ?></p>
                            </div>

                            <div class="ps-5 pe-5">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">product</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $rs2 = Database::search("SELECT * FROM `order_item` INNER JOIN `stock` ON `order_item`.`stock_stock_id` =`stock`.`stock_id` 
                                            INNER JOIN `product` ON `stock`.`product_id`=`product`.`id` WHERE `order_item`.`order_history_ohid`='" . $d["ohid"] . "'");
                                        $num2 = $rs2->num_rows;

                                        for ($x = 0; $x < $num2; $x++) {
                                            $d2 = $rs2->fetch_assoc();

                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $d2["name"]; ?></th>
                                                <td><?php echo $d2["o_qty"]; ?></td>
                                                <td><img src="<?php echo $d2["img_path"]; ?>" height="100" ></td>
                                                <td>Rs.<?php echo ($d2["o_qty"] * $d2["price"]); ?></td>
                                            </tr>
                                        <?php
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex flex-column align-items-end pe-5">
                            <h6>Delivary Fee: <span class="text-muted">500</span></h6>
                                <h4>Net Total: <span class="text-warning"><?php echo $d["amount"]; ?></span></h4>
                            </div>

                        </div>
                        <!-- order history card -->
                    <?php
                    }
                    ?>


                <?php
                } else {
                    //Empty
                ?>
                    <div class="col-12 text-center mt-5">
                        <h2>You have not placed any order yet</h2>
                        <a href="index.php" class="btn btn-primary">Start Shopping</a>
                    </div>
                <?php
                }

                ?>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
    header("location: signIn.php");
}


?>