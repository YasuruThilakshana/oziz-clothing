<?php

include "connection.php";

$pageno = isset($_POST["page"]) ? intval($_POST["page"]) : 1;
$category = intval($_POST["category"]);
$brand = intval($_POST["brand"]);
$size = intval($_POST["size"]);
$color = intval($_POST["color"]);
$min = !empty($_POST["min"]) ? floatval($_POST["min"]) : null;
$max = !empty($_POST["max"]) ? floatval($_POST["max"]) : null;

$q = "SELECT * FROM `stock`
      INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
      INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`brand_id`
      INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id`
      INNER JOIN `category` ON `product`.`category_id` = `category`.`category_id`
      INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id`";

$conditions = [];

if ($color != 0) {
    $conditions[] = "`color`.`color_id` = $color";
}

if ($category != 0) {
    $conditions[] = "`category`.`category_id` = $category";
}

if ($brand != 0) {
    $conditions[] = "`brand`.`brand_id` = $brand";
}

if ($size != 0) {
    $conditions[] = "`size`.`size_id` = $size";
}

if ($min !== null && $max !== null) {
    $conditions[] = "`stock`.`price` BETWEEN $min AND $max";
} elseif ($min !== null) {
    $conditions[] = "`stock`.`price` >= $min";
} elseif ($max !== null) {
    $conditions[] = "`stock`.`price` <= $max";
}

if (count($conditions) > 0) {
    $q .= " WHERE " . implode(' AND ', $conditions);
}

$rs = Database::search($q);
$num = $rs->num_rows;

$result_per_page = 10; // Set your number of results per page
$num_of_page = ceil($num / $result_per_page);
$page_results = ($pageno - 1) * $result_per_page;

$q2 = $q . " LIMIT $result_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {
?>
    <div class="d-flex flex-column align-items-center mt-5">
        <h5>No Results Found</h5>
        <p>
            <span class="input-group-text" id="basic-addon2">
                <i class="fas fa-search" style="font-size: 70px;"></i>
            </span>
        </p>
    </div>
<?php
} else {
    while ($d = $rs2->fetch_assoc()) {
?>
        <div class="col-3 mt-4 mb-5 d-flex justify-content-center">
            <div class="card ms-5" style="width: 300px;">
                <img src="<?php echo $d['img_path']; ?>" class="card-img-top" style="width: 100%; height: 200px; object-fit: cover;">
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
    <div class="d-flex justify-content-center mb-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" <?php if ($pageno <= 1) { echo 'href="#"'; } else { ?> onclick="advancedSearch(<?php echo ($pageno - 1); ?>);" <?php } ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                for ($y = 1; $y <= $num_of_page; $y++) {
                    if ($y == $pageno) {
                ?>
                        <li class="page-item active"><a class="page-link" onclick="advancedSearch(<?php echo $y; ?>);"><?php echo $y; ?></a></li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item"><a class="page-link" onclick="advancedSearch(<?php echo $y; ?>);"><?php echo $y; ?></a></li>
                <?php
                    }
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php if ($pageno >= $num_of_page) { echo 'href="#"'; } else { ?> onclick="advancedSearch(<?php echo ($pageno + 1); ?>);" <?php } ?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
<?php
}
?>
