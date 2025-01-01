<?php
include "connection.php";


$pagenumber = 0;
$page = $_POST["p"];

//echo($page);
if (0 != $page) {
    $pagenumber = $page;
} else {
    $pagenumber = 1;
}

$q  = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` ORDER BY `stock`.`stock_id` ASC";
$rs = Database::search($q);
$num = $rs->num_rows;
//echo($num);

$results_per_page = 4;
$num_of_pages = ceil($num / $results_per_page);

$page_result = ($pagenumber - 1) + $results_per_page;
//echo($page_result);

$q2 = $q . " LIMIT $results_per_page OFFSET $page_result";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;


if ($num2 == 0) {
    echo ("Not Avalable Stock");
} else {
    //lord Stock  
    for ($i = 0; $i < $num2; $i++) {
        $d =  $rs2->fetch_assoc();

?>

        <!-- cart -->
        <div class="col-3 mt-4 mb-5 d-flex justify-content-center  ">
            <div class="card ms-5 " style="width: 300px;">
                <img src="<?php echo $d["img_path"] ?>" class="card-img-top">
                <div class="card-body bg-transparent-gray">
                    <h5 class="card-title"><?php echo $d["name"] ?></h5>
                    <p class="card-text"><?php echo $d["descripthin"] ?></p>
                    <p class="card-text"><?php echo $d["price"] ?></p>
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
    <div class="d-flex justify-content-center  mb-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" <?php
                                            if ($pagenumber <= 1) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="lordProduct(<?php echo ($pagenumber - 1) ?>);" <?php
                                                                                                    }


                                                                                                        ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php

                for ($y = 1; $y <= $num_of_pages; $y++) {
                    if ($y = $pagenumber) {
                ?>
                        <li class="page-item active"><a class="page-link" onclick="lordProduct();">
                                <?php echo $y ?></a>
                        </li>

                <?Php
                    } else {
                        ?>
                        <li class="page-item "><a class="page-link" onclick="lordProduct();">
                                <?php echo $y ?></a>
                        </li>
                        <?php
                    }
                }

                ?>
                <li class="page-item">
                    <a class="page-link" <?php
                                            if ($pagenumber >= $num_of_pages) {
                                                echo ("#");
                                            } else {
                                            ?> onclick="lordProduct(<?php echo ($pagenumber + 1) ?>);" <?php
                                                                                                    }


                                                                                                        ?> aria-label="Next">
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