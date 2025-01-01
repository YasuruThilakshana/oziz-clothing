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
<body class="admin_body" onload="lordMannager();">
<!-- navi-bar -->
<?php include "adminNavi.php" ?>
<!-- navi-bar -->
<!-- body -->
<div class="col-10">
    <h1 class="text-center">  Mannager Details</h1>
    <div class="mt-3">
    <table class="table table-hover">
  <thead>
    <tr>
        
      <th scope="col">User ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">email</th>
      <th scope="col">Mobile</th>
    </tr>
  </thead>
  <tbody id="td">
    <!-- Tabel Row -->

    <!-- Tabel Row -->
    
    
  </tbody>
</table>
    </div>
</div>

<!-- body -->
<!-- footer -->
<div class="fixed-bottom col-12 mt-2">
  <?php include "AdminFooter.php" ?>
</div>

<!-- footer -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>
</html>

<?php
}else{
    echo("You are not a Valid Admin ");
}


?>