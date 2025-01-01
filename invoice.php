<?php
session_start();
include "connection.php";

$user = $_SESSION["u"];
$orderHistoryId = $_GET["orderId"];


$rs = Database::search("SELECT * FROM `order_history` WHERE `ohid` = '" . $orderHistoryId . "'");
$num = $rs->num_rows;

if ($num > 0) {
    $d = $rs->fetch_assoc();

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OZIZ-Invoice</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">
        <style>
            body {
                margin-top: 20px;
                background-color: #eee;
                margin-bottom: 100px;
            }

            .card {
                box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
            }

            .card {
                position: relative;
                display: flex;
                flex-direction: column;
                min-width: 0;
                word-wrap: break-word;
                background-color: #fff;
                background-clip: border-box;
                border: 0 solid rgba(0, 0, 0, .125);
                border-radius: 1rem;
            }
        </style>
    </head>

    <body>


        <div class="container">
            <div class="row">
                <a href="index.php"><button class="btn btn-outline-info">Home</button></a>

                <div class="col-lg-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="invoice-title">
                                <h4 class="float-end font-size-15">Invoice <?php echo $d["order_id"] ?> <span class="badge bg-success font-size-12 ms-2">Paid</span></h4>
                                <div class="mb-4">
                                    <h2 class="mb-1 text-muted">OZIZ.com</h2>
                                </div>
                                <div class="text-muted">
                                    <p class="mb-1">NO 07 , OZIZ Clothing Wennappuwa</p>
                                    <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i>OZIZ@gmail.com</p>
                                    <p><i class="uil uil-phone me-1"></i> 012-345-6789</p>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="text-muted">
                                        <h5 class="font-size-16 mb-3">Billed To:</h5>
                                        <h5 class="font-size-15 mb-2"><?php echo $user["no"] ?></h5>
                                        <p class="mb-1"><?php echo $user["address_line_1"] ?> <?php echo $user["address_line_2"] ?></p>
                                        <p class="mb-1"><?php echo $user["email"] ?></p>
                                        <p><?php echo $user["mobile"] ?></p>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-sm-6">
                                    <div class="text-muted text-sm-end">
                                        <div>
                                            <h5 class="font-size-15 mb-1">Invoice No:</h5>
                                            <p><?php echo $d["order_id"] ?></p>
                                        </div>
                                        <div class="mt-4">
                                            <h5 class="font-size-15 mb-1">Invoice Date:</h5>
                                            <p><?php echo $d["order_date"] ?></p>
                                        </div>
                                        <div class="mt-4">
                                            <h5 class="font-size-15 mb-1">Order No:</h5>
                                            <p><?php echo $user["username"] ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="py-2">
                                <h5 class="font-size-15">Order Summary</h5>

                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap table-centered mb-0">
                                        <!-- end thead -->

                                        <thead>
                                            <tr>
                                                <th style="width: 150px;">Name</th>
                                                <th>Item</th>
                                                <th>Price</th>
                                                <th>image</th>
                                                <th>Quantity</th>
                                                <th class="text-end" style="width: 120px;">Total</th>
                                            </tr>
                                        </thead>
                                        <!-- end thead -->
                                        <tbody>

                                            <?php
                                            $rs2 =  Database::search("SELECT * FROM `order_item` INNER JOIN `stock` ON `order_item`.`stock_stock_id` = `stock`.`stock_id` 
                                            INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`brand_id` 
                                            INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id` INNER JOIN `category` ON `product`.`category_id` = `category`.`category_id` 
                                            INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id` WHERE `order_item`.`order_history_ohid` = '" . $orderHistoryId . "'");

                                            $num2 = $rs2->num_rows;

                                            for ($i=0; $i < $num2; $i++) { 
                                                $d2 = $rs2->fetch_assoc();


                                            

                                            ?>

                                            <tr>
                                                <th scope="row"><?php echo $d2["name"] ?></th>
                                                <td>
                                                    <div>
                                                        <h5 class="text-truncate font-size-14 mb-1"><?php echo $d2["name"] ?></h5>
                                                        <p class="text-muted mb-0"><?php echo $d2["category_name"] ?>, <?php echo $d2["color_name"] ?></p>
                                                    </div>
                                                </td>
                                                <td><?php echo $d2["price"] ?></td>
                                                <td><img src="<?php echo $d2["img_path"] ?>" style="height:100px;" ></td>
                                                <td><?php echo $d2["o_qty"] ?></td>
                                                <td class="text-end"><?php echo ($d2["price"] * $d2["o_qty"]) ?></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                            <tr>
                                                <th scope="row" colspan="4" class="border-0 text-end">
                                                    Discount :</th>
                                                <td class="border-0 text-end">10%</td>
                                            </tr>
                                            <!-- end tr -->
                                            <tr>
                                                <th scope="row" colspan="4" class="border-0 text-end">
                                                    Shipping Charge :</th>
                                                <td class="border-0 text-end">500.00</td>
                                            </tr>

                                            <!-- end tr -->
                                            <tr>
                                                <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                                <td class="border-0 text-end">
                                                    <h4 class="m-0 fw-semibold"><?php echo $d["amount"] ?></h4>
                                                </td>
                                            </tr>
                                            <!-- end tr -->
                                        </tbody><!-- end tbody -->
                                    </table><!-- end table -->
                                </div><!-- end table responsive -->
                                <div class="d-print-none mt-4">
                                    <div class="float-end">
                                        <a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
                                        <a href="#" class="btn btn-primary w-md">Send</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
        </div>
<script src="script.js"></script>
    </body>

    </html>


<?php
} else {
    header("location: index.php");
}


?>