<?php

include "connection.php";

//SELECT * FROM `user` WHERE `user_type_id` IN (2, 3);
$rs = Database::search("SELECT * FROM `user` WHERE `user_type_id` IN (2, 3);");
$num = $rs-> num_rows;

for($i=0; $i < $num; $i++){
    $d = $rs-> fetch_assoc();
 ?> 
<tr>
    <th scope="row"><?php echo $d["id"]?></th>
    <td><?php echo $d["fname"]?></td>
    <td><?php echo $d["lname"]?></td>
    <td><?php echo $d["email"]?></td>
    <td><?php echo $d["mobile"]?></td>
    <td>
        <?php echo $d["status"] == 1 ? "Active" : "Deactive"; ?>
        <button onclick="changeUserStatus(<?php echo $d['id']; ?>)">Change Status</button>
    </td>
    <td>
        <?php echo $d["user_type_id"] == 2 ? "User" : "Staff"; ?>
        <button onclick="changeUserPromote(<?php echo $d['id']; ?>)">Promote</button>
    </td>
</tr>


<?php
}

?> 