<?php

include "connection.php";

$size = $_POST["s"];


 
if(empty($size)){
    echo("Please Enter Your size ");
}else if(strlen($size) > 20){
    echo("Your size should less than 20 characters");

}else{
   $rs =  Database::search("SELECT * FROM `size` WHERE `size_name`='".$size."'");
    $num = $rs->num_rows;
    if($num > 0){
        echo("Your size is already exist");
    }else{
        Database::iud("INSERT INTO `size` (`size_name`) VALUES ('".$size."')");
        echo("Success");
    }
}

?>