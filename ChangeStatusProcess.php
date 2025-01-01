<?php
include "connection.php";

if (isset($_POST['userId'])) {
    $userId = $_POST['userId'];

    // Retrieve current status
    $rs = Database::search("SELECT `status` FROM `user` WHERE `id`='$userId'");
    if ($rs->num_rows == 1) {
        $data = $rs->fetch_assoc();
        $currentStatus = $data['status'];
        
        // Toggle status
        $newStatus = $currentStatus == 1 ? 0 : 1;
        
        // Update status in database
        Database::iud("UPDATE `user` SET `status`='$newStatus' WHERE `id`='$userId'");
        
        echo "Status updated successfully";
    } else {
        echo "User not found";
    }
} else {
    echo "Invalid request";
}
?>
