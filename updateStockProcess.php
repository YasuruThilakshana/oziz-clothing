<?php
include "connection.php";

$productId = $_POST["pname"];
$qty = $_POST["qty"];
$price = $_POST["unitprice"];


if(empty($qty)){
    echo("Please Enter Qty");
}else if(!is_numeric($qty)){
    echo("Only number can be Enter for qty");
}else if(strlen($qty) > 10){
    echo("your qty should be less than 10 charactars");
}else if($qty < 0){
    echo("invalid qty");
}else if(empty($price)){
    echo("Please Enter Your Price");
}else if(!is_numeric($price)){
    echo("Only number can be Enter for Unit Price");
}else if(strlen($price) > 10){
    echo("your price should be less than 10 charactars");  
}else{
    //echo("Success");

   $rs = Database::search("SELECT * FROM `stock` WHERE `product_id`='".$productId."' AND `price`='".$price."'");
    $num = $rs->num_rows;
     $d =  $rs->fetch_assoc();

    if($num == 1){
    //Update
     $newqty =   $d["qty"] + $qty;
        Database::iud("UPDATE `stock` SET `qty`= '".$newqty."' WHERE `stock_id`='".$d["stock_id"]."'");
       
        echo("Stock Update Successfully");


    }else{

   //Insert
   Database::iud("INSERT INTO `stock` (`price`,`qty`,`product_id`) VALUES ('".$price."','".$qty."','".$productId."')");
    echo("Successful");

    }
}






?>