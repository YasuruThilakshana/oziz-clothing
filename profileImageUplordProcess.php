<?php

include "connection.php";

session_start();

$user = $_SESSION['u'];

if (empty($_FILES['i'])) {

    echo ("empty");

} else {
    // Upload image
    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user['id'] . "'");
    $d = $rs->fetch_assoc();

    if (!empty($d['path'])) {
        unlink($d['path']);     // Delete from the project
    }

    $path = "resources//profileimage//" . uniqid() . ".png";
    move_uploaded_file($_FILES['i']['tmp_name'], $path);
    Database::iud("UPDATE `user` SET `path` = '".$path."' WHERE `id`='".$user['id']."'");
    echo($path);
}


?>