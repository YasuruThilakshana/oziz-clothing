<?php
include "connection.php";

$cat = $_POST["c"];

//echo($cat);

if(empty($cat)){
    echo("Please Enter Your Category Name");
}else if(strlen($cat) > 20){
    echo("Your category should less than 20 characters");

}else{
   $rs =  Database::search("SELECT * FROM `category` WHERE `category_name`='".$cat."'");
    $num = $rs->num_rows;
    if($num > 0){
        echo("Your category is already exist");
    }else{
        Database::iud("INSERT INTO `category` (`category_name`) VALUES ('".$cat."')");
        echo("Success");
    }
}

?>