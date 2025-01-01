<?php
session_start();

include "connection.php";


$username = $_POST["Mun"];
$password = $_POST["Mpw"];

//echo($username);

if(empty($username)){
    echo("Please Enter your User name ");
}else if(empty($password)){
    echo("Please Enter Your Password");
}else{
    $rs = Database::search("SELECT * FROM `user` WHERE `username`='".$username."' AND `password`='".$password."'");
    $num = $rs->num_rows;
    if($num == 1){
       $d = $rs->fetch_assoc();

       if($d["user_type_id"] == 3){
        echo ("Success");

        $_SESSION["m"] = $d;
        
       }else{

        echo ("You don't have an Mannager Account");

       }
    }else{
        echo("Invalid Username Or Password");

    }
}
?>