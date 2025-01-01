<?php

include "connection.php";


$wishId = $_POST["c"];

Database::iud("DELETE FROM `wish_list` WHERE `wish_id`='".$wishId."'");

echo("Item successfully remove from wishlist.");

?>