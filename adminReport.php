<?php

session_start();

include "connection.php";

if(isset($_SESSION["a"])){

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">

</head>

<body class="admin_body">

    <?php
    include "adminNavi.php";
    ?>


<div class="row col-12">
    <h2 class="text-center">Report Generate</h2>
    <div class="col-4 mt-4">
       <a href="AdminReportStock.php" ><button class="btn btn-outline-secondary col-12">
            <i class="bi bi-graph-up"></i><br>
            Stock Report
        </button></a>
    </div>
    <div class="col-4 mt-4">
        <a href="AdminReportProduct.php"><button class="btn btn-outline-secondary col-12">
            <i class="bi bi-box-seam"></i><br>
            Product Report
        </button></a>
    </div>
    <div class="col-4 mt-4">
        <a href="AdminReportUser.php"><button class="btn btn-outline-secondary col-12">
            <i class="bi bi-people"></i><br>
            User Report
        </button></a>
    </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGKtLmoGL9g6N7mA3eB6tIDb9O4F4tvvOJOhGxVi5SlkScK3wOMp1pLWKdK" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>
<?php

}else{
    echo("Your Not a valid Admin");
}

?>