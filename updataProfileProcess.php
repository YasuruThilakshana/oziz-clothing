<?php

include "connection.php";
session_start();

$user = $_SESSION['u'];


$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$no = $_POST['no'];
$line1 = $_POST['line1'];
$line2 = $_POST['line2'];

if (empty($fname)) {
    echo ("Please Enter your First Name");
} else if (strlen($fname) > 20) {
    echo ("Your First Name should be less than 20 characters");
} else if (empty($lname)) {
    echo ("Please Enter your Last Name");
} else if (strlen($lname) > 20) {
    echo ("Your Last name should be less than 20 characters");
} else if (empty($email)) {
    echo ("Please Enter your Email");
} else if (strlen($email) > 100) {
    echo ("Your Email Address should be less than 100 Characters");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Your Email Address is Invalid");
} else if (empty($mobile)) {
    echo ("Please Enter your Mobile");
} else if (strlen($mobile) != 10) {
    echo ("Your Mobile number must contain 10 characters");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo ("Your Mobile Number is Invalid");
}  else if (empty($no)) {
    echo ("Please Enter your Address No");
} else if (strlen($no) > 10) {
    echo ("Your Address No should be less than 10 characters");
} else if (empty($line1)) {
    echo ("Please Enter your Address Line 1");
} else if (strlen($line1) > 50) {
    echo ("Your Line 01 should be less than 50 characters");
} else if (empty($line2)) {
    echo ("Please Enter your Address Line 1");
} else if (strlen($line2) > 50) {
    echo ("Your Line 01 should be less than 50 characters");
} else {

    Database::iud("UPDATE `user` SET `fname` = '".$fname."', `lname` = '".$lname."', `email` = '".$email."', `mobile` = '".$mobile."', `no` = '".$no."', `address_line_1` = '".$line1."', `address_line_2` = '".$line2."' WHERE `id` = '".$user['id']."'");


    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '".$user['id']."'");
    $d = $rs->fetch_assoc();

    $_SESSION['u'] = $d;

    echo("Update successful");

}
