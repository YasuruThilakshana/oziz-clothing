<?php
include "connection.php";

$pagenumber = 0;
$page = isset($_POST["p"]) ? $_POST["p"] : 1;

if ($page != 0) {
    $pagenumber = $page;
} else {
    $pagenumber = 1;
}

$q  = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` ORDER BY `stock`.`stock_id` ASC";
$rs = Database::search($q);
$num = $rs->num_rows;

$results_per_page = 4;
$num_of_pages = ceil($num / $results_per_page);

$page_result = ($pagenumber - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_result";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {
    echo ("Not Available Stock");
} else {
    // load Stock
    for ($i = 0; $i < $num2; $i++) {
        $d =  $rs2->fetch_assoc();
?>

        <!-- cart -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-4 mb-5 d-flex justify-content-center">
    <div class="card bg-dark" style="width: 100%; max-width: 300px;">
        <a href="singalProductView.php?s=<?php echo $d['stock_id'] ?>">
            <img src="<?php echo $d['img_path']; ?>" class="card-img-top" style="width: 100%; height: 200px; object-fit: cover;">
        </a>
        <div class="card-body bg">
            <h5 class="card-title"><?php echo $d['name']; ?></h5>
            <p class="card-text"><?php echo $d['description']; ?></p>
            <p class="card-text"><?php echo $d['price']; ?></p>
            <div class="d-grid gap-2">
            <a href="singalProductView.php?s=<?php echo $d['stock_id'] ?>">
                <button class="btn btn-outline-primary mb-2 col-12 " ><i class="bi bi-eye"></i>   <span>View Product</span>  </button>
                </a>
                <button class="btn btn-outline-warning col-12" onclick="addtoWishlist(<?php echo $d['stock_id'];?>);" ><i class="bi bi-heart"></i> Wish List</button>
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
                    <a class="page-link" <?php if ($pagenumber <= 1) {
                                                echo 'href="#"';
                                            } else { ?> onclick="lordProduct(<?php echo ($pagenumber - 1); ?>);" <?php } ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                for ($y = 1; $y <= $num_of_pages; $y++) {
                    if ($y == $pagenumber) {
                ?>
                        <li class="page-item active"><a class="page-link" onclick="lordProduct(<?php echo $y; ?>);"><?php echo $y; ?></a></li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item"><a class="page-link" onclick="lordProduct(<?php echo $y; ?>);"><?php echo $y; ?></a></li>
                <?php
                    }
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php if ($pagenumber >= $num_of_pages) {
                                                echo 'href="#"';
                                            } else { ?> onclick="lordProduct(<?php echo ($pagenumber + 1); ?>);" <?php } ?> aria-label="Next">
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