<?php

include "connection.php";

$pname = $_POST["pname"];
$brand = $_POST["brand"];
$category = $_POST["category"];
$color = $_POST["color"];
$size = $_POST["size"];
$description = $_POST["description"];


if (empty($pname)) {
    echo ("Please Enter your Product Name");
}else if(strlen($pname) > 30){
    echo("Your Product Name Sholuld be less than 30");
} else if (empty($description)) {
    echo ("Please Enter your Description");
}else if(strlen($description) > 100 ){
    echo("Your description  Sholuld be less than 100");
} else if (empty($_FILES["image"])) {
    echo ("Please Enter your Product image");
} else {
    $rs = Database::search("SELECT * FROM `product` WHERE `name` = '" . $pname . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your Product Name is Already Exist");
    } else {

        $path = "resources/productimage//" . uniqid() . ".png";
        move_uploaded_file($_FILES["image"]["tmp_name"], $path);
        
        Database::iud("INSERT INTO `product`(`name`,`description`,`img_path`,`brand_id`,`category_id`,`size_id`,`color_id`)
             VALUES ('" . $pname . "','" . $description . "','" . $path . "','" . $brand . "','" . $category . "','" . $size . "','" . $color . "')");
             
        echo("Success");
    }
}

?>