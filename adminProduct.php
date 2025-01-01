<?php
session_start();
if(isset($_SESSION["a"])){
?>



<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="bootstrap.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">

</head>
<body class="admin_body">
<?php 
include "adminNavi.php";
?>

<div class="col-10">
    <h2 class="text-center">Product Manager</h2>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Brand Name</th>
      <th scope="col">Category Name</th>
      <th scope="col">Color</th>
      <th scope="col">Size</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"> <input type="text" class="form-control" placeholder="Add Brand NAme" id="brand"></th>
      <td><input type="text" class="form-control" placeholder="Add Category Name" id="category"></td>
      <td><input type="text" class="form-control" placeholder="Add Color" id="color"></td>
      <td><input type="text" class="form-control" placeholder="Add Size" id="size"></td>
    </tr>
    <tr>
      <th scope="row"> <button type="button" class="btn btn-secondary col-12" onclick="brandReg();">Add Brand</button></th>
      <td> <button type="button" class="btn btn-secondary col-12" onclick="categoryReg();" >Add Category</button></td>
      <td> <button type="button" class="btn btn-secondary col-12" onclick="colorReg();">Add Color</button></td>
      <td> <button type="button" class="btn btn-secondary col-12" onclick="sizeReg();">Add Size</button></td>
    </tr>
    <tr>
      <th scope="row"><div class="d-none" id="msgBrand" onclick="relord();"><div class="alert alert-warning" role="alert" id="msgbrand"></div></div></th>
      <td> <div class="d-none" id="msgCategory" onclick="relord();"><div class="alert alert-warning" role="alert" id="msgcategory"></div></div> </td>
      <td><div class="d-none" id="msgColor" onclick="relord();"><div class="alert alert-warning" role="alert" id="msgcolor"></div></div> </td>
      <td> <div class="d-none" id="msgSize" onclick="relord();"><div class="alert alert-warning" role="alert" id="msgsize"></div></div></td>
    </tr>
   
  </tbody>
</table>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="script.js"></script>

</body>
</html>
<?php

}

else{
    echo("You are Not A valid Admin");
}

?>