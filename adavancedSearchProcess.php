<?php

include "connection.php";

$pageno = 0;
$page = $_POST["page"];
$category = $_POST["category"];
$brand = $_POST["brand"];
$size = $_POST["size"];
$color = $_POST["color"];
$min = $_POST["min"];
$max = $_POST["max"];


//$query = "SELECT * FROM `product`";
$status = 0;  // no condition 

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = " SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` =`product`.`id` INNER JOIN `brand`
ON `product`.`brand_id` = `brand`.`brand_id` INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id`
INNER JOIN `category` ON `product`.`category_id` =`category`.`category_id` INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id`";

//color
if ($status == 0 && $color != 0) {
    $q .= " WHERE `color`.`color_id` = '" . $color . "'";
    $status = 1;
} else if ($status != 0 && $color != 0) {
    $q .= " AND `color`.`color_id` = '" . $color . "'";
}

//category

if ($status == 0 && $category != 0) {
    $q .= " WHERE `category`.`category_id` = '" . $category . "'";
    $status = 1;
} else if ($status != 0 && $category != 0) {
    $q .= " AND `category`.`category_id` = '" . $category . "'";
}

//brand
if ($status == 0 && $brand != 0) {
    $q .= " WHERE `brand`.`brand_id` = '" . $brand . "'";
    $status = 1;
} else if ($status != 0 && $brand != 0) {
    $q .= " AND `brand`.`brand_id` = '" . $brand . "'";
}

//size

if ($status == 0 && $size != 0) {
    $q .= " WHERE `size`.`size_id` = '" . $size . "'";
    $status = 1;
} else if ($status != 0 && $size != 0) {
    $q .= " AND `size`.`size_id` = '" . $size . "'";
}

//min

if (!empty($min)  && empty($max)) {
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` >= '" . $min . "'ORDER BY `stock`.`price` ASC";
        $status = 1;
    } else if ($status != 0) {
        $q .= " AND `stock`.`price` >= '" . $min . "'ORDER BY `stock`.`price` ASC";
    }
}
//max

if (!empty($max)  && empty($min)) {
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` <= '" . $max . "'ORDER BY `stock`.`price` ASC";
        $status = 1;
    } else if ($status != 0) {
        $q .= " AND `stock`.`price` <= '" . $max . "'ORDER BY `stock`.`price` ASC";
    }
}
if (!empty($min)  && !empty($max)) {
    if ($status == 0) {
        $q .= "WHERE `stock`.`price` BETWEEN '" . $min . "' AND '" . $max . "' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } else if ($status != 0) {
        $q .= " AND `stock`.`price` BETWEEN '" . $min . "' AND '" . $max . "' ORDER BY `stock`.`price` ASC";
    }
}


$rs = Database::search($q);
$num = $rs->num_rows;


$result_per_page = 4;
$num_of_page = ceil($num / $result_per_page);
$page_results = ($pageno - 1) * $result_per_page;

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
        $d2 = $rs2->fetch_assoc();
    ?>
        <div class="col-5 mt-4 mb-5 d-flex justify-content-center">
            <div class="card ms-5" style="width: 300px;">
            <a href="singalProductView.php?s=<?php echo $d2['stock_id'] ?>" ><img src="<?php echo $d2['img_path']; ?>" class="card-img-top" style="width: 100%; height: 200px; object-fit: cover;"></a>  
                <div class="card-body bg-dark">
                    <h5 class="card-title"><?php echo $d2['name']; ?></h5>
                    <p class="card-text"><?php echo $d2['description']; ?></p>
                    <p class="card-text"><?php echo $d2['price']; ?></p>
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
                    <a class="page-link" <?php if ($pageno <= 1) {
                                                echo 'href="#"';
                                            } else { ?> onclick="advancedSearch(<?php echo ($pageno - 1); ?>);" <?php } ?> aria-label="Previous">
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
                    <a class="page-link" <?php if ($pageno >= $num_of_page) {
                                                echo 'href="#"';
                                            } else { ?> onclick="advancedSearch(<?php echo ($pageno + 1); ?>);" <?php } ?> aria-label="Next">
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