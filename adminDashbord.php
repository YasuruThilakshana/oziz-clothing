<?php
session_start();

if(isset($_SESSION["a"])){
?>

<!-- Lording Page  -->
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OZIZ Store - Admin Dashbord</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="bootstrap.css"/>
</head>
<body class="admin_body" onload="loadChart(); loadChart1();  ">
<!-- navi-bar -->
<?php include "adminNavi.php" ?>
<!-- navi-bar -->
<!-- chart -->
<div style="width: 400px;" class="ms-5">
  <h2 class="text-center">Most Sold Product</h2>
  <canvas id="myChart"></canvas>
</div>


 <div style="width: 400px;">
  <h2 class="text-center">Best Customer</h2>
  <canvas id="bs"></canvas>
</div> 


<!-- chart -->
<!-- footer -->
<div class="fixed-bottom col-12 mt-2">
  <?php include "AdminFooter.php" ?>
</div>

<!-- footer -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>

<?php
}else{
    echo("You are not a Valid Admin ");
}


?>