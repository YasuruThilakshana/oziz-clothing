<?php
session_start();
include "connection.php";

$username = $_POST["u"];
$password = $_POST["p"];
$rememberme = $_POST["r"];

if(empty($username)){
    echo("Please Enter Your UserName");
}else if(empty($password)){
    echo("Please Enter Your Password");
}else{
   $rs = Database::search("SELECT * FROM `user` WHERE `username` ='".$username."'AND `password`='".$password."'");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();

    if($num == 1){ 
        //Home
        if($d["status"] == 1){
            echo ("Success");

            $_SESSION["u"] = $d;
            if($rememberme == "true"){
                setcookie("username",$username,time() + (60*60*24*365));
                setcookie("password",$password,time() + (60*60*24*365));
            }else{
                setcookie("username","",-1);
                setcookie("password","",-1);
            }
        }else{
            echo("Inactive usar");
        }
    }else{
        echo ("Invalid UserName Or Password");
    }
}
?>