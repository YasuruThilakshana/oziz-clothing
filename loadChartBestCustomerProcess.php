<?php

include "connection.php";

$rs = Database::search("SELECT `user`.`id`, `user`.`username`, COUNT(`order_history`.`order_id`) AS `total_orders` FROM `user` JOIN `order_history` ON `user`.`id` = `order_history`.`user_id`
GROUP BY `user`.`id`, `user`.`username` ORDER BY `total_orders` DESC LIMIT 3");

$num = $rs->num_rows;

$labels = array();
$data = array();

for ($i = 0; $i < $num; $i++) {
    $d = $rs->fetch_assoc();
    $labels[] = $d["username"];
    $data[] = $d["total_orders"];
}

$json = array();
$json["labels"] = $labels;
$json["data"] = $data;

echo json_encode($json);

?>


