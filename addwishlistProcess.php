<?php
include "connection.php";
session_start();


$user = $_SESSION["u"];
$stockId = $_POST["s"];

//echo($stockId);
$rs = Database::search("SELECT * FROM `stock` WHERE `stock_id` = '" . $stockId . "'");
$num = $rs->num_rows;

if($num > 0){
   
   $d =  $rs->fetch_assoc();

   $rs2 = Database::search("SELECT * FROM `wish_list` WHERE `user_id` = '".$user["id"]."' AND `stock_stock_id` = '".$stockId."' ");
   $num2 = $rs2->num_rows;


    if($num2 > 0){
        echo("ALlready Exist");
    }else{
        Database::iud("INSERT INTO `wish_list`(`user_id`,`stock_stock_id`) VALUES ('".$user["id"]."','".$stockId."')");

        echo("WishList Added Successfully");
    }




}else{
    echo("Your Stock is not Found");
}




?>