<?php
session_start();
include "connection.php";

$rs = Database::search("SELECT * FROM `product` INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`brand_id` INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id`
INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id` INNER JOIN `category` ON `product`.`category_id` = `category`.`category_id` ORDER BY `product`.`id` ASC ");
$num = $rs->num_rows;


if (isset($_SESSION["a"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">


    </head>

    <body>
        <a href="adminReport.php"><button class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Back
            </button></a>

        <div class="container mt-3">
            <h2 class="text-center mb-5">Product Report</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Brand Name</th>
                            <th>Category</th>
                            <th>color</th>
                            <th>size</th>
                            <th>Description</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        for ($i = 0; $i < $num; $i++) {

                            $d = $rs->fetch_assoc();
                        ?>
                            <tr>
                                <td><?php echo $d["id"] ?></td>
                                <td><?php echo $d["name"] ?></td>
                                <td><?php echo $d["brand_name"] ?></td>
                                <td><?php echo $d["category_name"] ?></td>
                                <td><?php echo $d["color_name"] ?></td>
                                <td><?php echo $d["size_name"] ?></td>
                                <td><?php echo $d["description"] ?></td>
                                <td><img src="<?php echo $d["img_path"] ?>" height="100" /></td>
                            </tr>
                        <?php
                        }


                        ?>

                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end container-fluid mt-5">
                <button class="btn btn-outline-info col-3" onclick="window.print()">Print</button>
            </div>
        </div>





        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlYkR0x0jdZtEz54uU7e4Pb6C2mnpfF+6bQuq6PpVgE4qJZA7y/s4ZOjtN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGKtLmoGL9g6N7mA3eB6tIDb9O4F4tvvOJOhGxVi5SlkScK3wOMp1pLWKdK" crossorigin="anonymous"></script>
        <script src="script.js"></script>

    </body>

    </html>




<?php
} else {
    echo ("You are not a valid admin");
}

?>