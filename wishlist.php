<?php
session_start();
include "connection.php";

$user = $_SESSION["u"];

if (isset($user)) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm7uG6JM6kMR8M7xC/7tB7NfEXR4RKE05kph7YfEZGq5m3l7Q" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    </head>

    <body class="bg-secondary" onload="lordwishlist();" id="wishlistbody">
        <!-- navibar -->
        <!-- navibar -->

      
 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
    header("location: signin.php");
}
?>
