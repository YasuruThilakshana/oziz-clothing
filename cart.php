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
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap.css">

        <style>
            .emptyView {
                width: 100%;
                height: 100vh;
                background-repeat: no-repeat;
                background-color: #d2c9ff;
                padding-top: 150px;

            }
        </style>
    </head>

    <body onload="loadCart();" id="cartBody">





        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php
} else {

    header("location: signin.php");
}

?>