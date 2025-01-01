<?php

include "connection.php";

$pagenumber = 0;
$page = $_POST["pg"];
$product = $_POST["p"];

if ($page != 0) {
    $pagenumber = $page;
} else {
    $pagenumber = 1;
}

$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` WHERE `product`.`name` LIKE '%$product%'";
$rs = Database::search($q);
$num = $rs->num_rows;

$result_per_page = 10; // Set a valid number of results per page
$num_of_page = ceil($num / $result_per_page);

$page_results = ($pagenumber - 1) * $result_per_page;

$q2 = $q . " LIMIT $result_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {
?>
    <div class="d-flex flex-column align-items-center mt-5">
        <h5>Search No Result</h5>
        <p>
            <span class="input-group-text" id="basic-addon2">

            <i class="fas fa-search" style="font-size: 70px;"></i>

            </span>
        </p>
    </div>
<?php
} else {
    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();
?>
        <div class="col-3 mt-4 mb-5 d-flex justify-content-center">
            <div class="card ms-5" style="width: 300px;">
            <a href="singalProductView.php?s=<?php echo $d['stock_id'] ?>">
                    <img src="<?php echo $d['img_path']; ?>" class="card-img-top" style="width: 100%; height: 200px; object-fit: cover;">
                </a>
                <div class="card-body bg-dark">
                    <h5 class="card-title"><?php echo $d['name']; ?></h5>
                    <p class="card-text"><?php echo $d['description']; ?></p>
                    <p class="card-text"><?php echo $d['price']; ?></p>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-outline-primary col-6">Add to Cart</button>
                        <button class="btn btn-outline-warning col-6 ms-2">Buy Now</button>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
?>
    <!-- pagination -->
    <div class="d-flex justify-content-center mb-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" <?php if ($pagenumber <= 1) { echo 'href="#"'; } else { ?> onclick="searchProduct(<?php echo ($pagenumber - 1); ?>);" <?php } ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                for ($y = 1; $y <= $num_of_page; $y++) {
                    if ($y == $pagenumber) {
                ?>
                        <li class="page-item active"><a class="page-link" onclick="searchProduct(<?php echo $y; ?>);"><?php echo $y; ?></a></li>
                <?php
                    } else {
                ?>
                        <li class="page-item"><a class="page-link" onclick="searchProduct(<?php echo $y; ?>);"><?php echo $y; ?></a></li>
                <?php
                    }
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php if ($pagenumber >= $num_of_page) { echo 'href="#"'; } else { ?> onclick="searchProduct(<?php echo ($pagenumber + 1); ?>);" <?php } ?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- pagination -->
<?php
}
?>
