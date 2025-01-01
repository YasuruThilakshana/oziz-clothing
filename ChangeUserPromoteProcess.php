<?php
include "connection.php";

if (isset($_POST['userId'])) {
    $userId = $_POST['userId'];

    // Retrieve current status
    $rs = Database::search("SELECT `user_type_id` FROM `user` WHERE `id`='$userId'");
    if ($rs->num_rows == 1) {
        $data = $rs->fetch_assoc();
        $currentuserType = $data['user_type_id'];
        
        // Toggle status
        $newType = $currentuserType == 2 ? 3 : 2;
        
        // Update status in database
        Database::iud("UPDATE `user` SET `user_type_id`='$newType' WHERE `id`='$userId'");
        
        echo "User Type  updated successfully";
    } else {
        echo "User not found";
    }
} else {
    echo "Invalid request";
}
?>
