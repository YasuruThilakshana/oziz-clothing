<?php

include "connection.php";

$clr = $_POST["clr"];

//echo($cat);

if(empty($clr)){
    echo("Please Enter Your Color ");
}else if(strlen($clr) > 20){
    echo("Your category should less than 20 characters");

}else{
   $rs =  Database::search("SELECT * FROM `color` WHERE `color_name`='".$clr."'");
    $num = $rs->num_rows;
    if($num > 0){
        echo("Your color is already exist");
    }else{
        Database::iud("INSERT INTO `color` (`color_name`) VALUES ('".$clr."')");
        echo("Success");
    }
}


?>